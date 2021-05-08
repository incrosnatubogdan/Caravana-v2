<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Static_Pages extends Controller_Base {
	var $status = 200;
	adasd
	public function action_show()
	{	
		$this->template->content = 'not found';
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	public function setStatus($status=200){
		return $this->status = $status;
	}
	
}