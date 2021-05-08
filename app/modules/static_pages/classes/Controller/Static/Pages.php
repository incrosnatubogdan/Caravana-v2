<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Static_Pages extends Controller_Base {
	var $status = 200;
	var $not_found = 'not_found';

	public function action_show($id = false)
	{	$link = $this->request->param('id', $id);

		$static = new Static_Pages_Core($link);

		if(!$static->isLoaded() || !$static->isActive())
		{
			$static->getByLink($this->not_found);
		}

		if($static->getLink() == $this->not_found)
		{
			$this->setStatus(404);
		}

		$this->meta->setTitle($static->getTitle().' - caravanacumedici.ro')
				   ->setDescription($static->getText())
				   ->setKeywords()
				   ->set('canonical',url::link($static->getLink()))
		;

		$this->template->content = View::factory('static_pages/show')->set('text',$static->getText());
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status = 200){
		$this->status = $status;
	}
}
