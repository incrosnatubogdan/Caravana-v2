<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administration_Static_Pages extends Controller_Admin {
	protected $modelName = 'Model_Static_Page';

	public function action_index()
	{
		$this->template->content = $this->getGrid();
	}

	public function changeProperties(){
		$this->properties

			->edit('active','stype','select')
			->edit('active','editoptions',array(0 => 'Inactiva', 1 => 'Activa'))
			->edit('active','edittype','select')
			->edit('title','search',false)
			->edit('text','search',false)
			->edit('text','search_type','like')
			->edit('text','export', false)
			->edit('text','sortable',false)
			->edit('text','editable',false)
			->edit('text','buttons',array(
										array(
											'key' => 'id',
											'url' => 'administration/static_pages/edit_text/',
											'icon' => 'wrench',
											'ajax' => false,
											'reload' => false,
											),
										)
			)
		;

	}

	public function action_edit_text($id = false){
		$id = $this->request->param('id', $id);

		$static = ORM::factory('static_page', $id);

		if($this->request->post('save'))
		{
			$post = $this->request->post('static');
			//echo debug::vars($post); die();
			if(!empty($post))
			{
				foreach($post as $key=>$value)
				{
					$static->$key = str_replace(['&nbsp;'], '', $value);
				}

				$static->save();
			}
		}

		$this->template->content = View::factory('admin/static_pages/edit')->set('static',$static);
	}

}
