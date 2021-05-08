<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administration_Pictures extends Controller_Admin {
	var $modelName = 'Model_Picture';
	var $path;

	public function action_index()
	{
		$this->template->content = $this->getGrid();
	}

	public function before(){
		if($this->request->action()=='upload')
		{
			$this->login = false;
		}
		$this->path = DOCROOT . 'media/img/';
		parent::before();
	}

	public function changeProperties(){
		$this->properties
			->edit('item_type','hidden', true)
			->edit('item_id','hidden', true)
			->edit('active','stype','select')
			->edit('active','editoptions',array(0 => 'Inactiva', 1 => 'Activa'))
			->edit('active','edittype','select')

		;

	}


	public function action_set_order(){
		$items = $this->request->query('item');
		if(!empty($items))
		{
			foreach($items as $key=>$item)
			{
				$picture = ORM::factory('Picture',$item);
				if(empty($picture->id)) continue;

				$picture->order = $key;
				$picture->save();
			}

		}

		die();
	}

	public function action_list($item_id = 0, $item_type = 0){
		$item_id   = $this->request->param('id', $item_id);
		$item_type = $this->request->param('id2', $item_type);

		echo View::factory('admin/pictures/list')->set('item_id',$item_id)
				->set('img', $this->img)
				->set('item_type', $item_type);

		die();
	}

	public function action_delete($id = 0){
		$this->autoRender = false;

		$id = $this->request->param('id', $id);
		$picture = ORM::factory('Picture', $id);

		$item = $this->getItem($picture->item_id, $picture->item_type);

		if(!empty($picture->id))
		{

			//set new main if main is deleted
			if($item->picture_id == $picture->id && !empty($item->id))
			{
				$newMain = ORM::factory('Picture')->where('item_id', '=', $picture->item_id)->where('item_type', '=', $picture->item_type)->where('id', '!=', $picture->id)->find_all()->current();
				if(!empty($newMain->id))
				{
					$item->picture_id = $newMain->id;
					$item->save();
				}
				else
				{
					$item->picture_id = 0;
					$item->save();
				}
			}

			unlink($this->path.$picture->path);
			$picture->delete();

		}

		die();
	}

	public function getItem($item_id = 0, $item_type = 0){

		if($item_type==0){
			$item = ORM::factory('Article', $item_id);
		}

		return $item;
	}

	public function action_upload($item_id = 0, $item_type = 0){
		$this->autoRender = false;

		$item_id   = $this->request->param('id', $item_id);
		$item_type = $this->request->param('id2', $item_type);

		$directory = $this->path.'pictures/upload/'.date('Y/m/');

		if(!is_dir($directory)){
			mkdir($directory, 0755, TRUE);
		}

		$item = $this->getItem($item_id, $item_type);

		if(!empty($_FILES))
		{
			foreach ($_FILES as $file => $fileData)
			{


				$tempFile = $fileData['tmp_name'];
				$urlParts = explode('.',$fileData['name']);
				$ext = $urlParts[count($urlParts)-1];
				$targetFile =  $directory .substr(md5(time()),0,6).'_'. URL::title(substr($fileData['name'],0,-(strlen($ext)+1))).'.'.$ext;

				 $filename = strtolower(Text::random('alnum', 20)).'.jpg';

				Image::factory($tempFile)
					->resize(950, 630, Image::WIDTH)
					->save($targetFile);
				//move_uploaded_file($tempFile, $targetFile);
				// Delete the temporary file
				unlink($tempFile);

				$picture = ORM::factory('Picture');
				$picture->item_id = $item_id;
				$picture->item_type = $item_type;
				$picture->path = str_replace($this->path, '', $targetFile);
				$picture->active = 1;
				$picture->save();

				if(isset($item->picture_id) && empty($item->picture_id)  && !empty($item->id))
				{
					$item->picture_id = $picture->id;
					$item->save();
				}

			}
		}
	}

}
