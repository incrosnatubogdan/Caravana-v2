<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administration_Contact_Messages extends Controller_Admin {
	protected $modelName = 'Model_Contact_Message';

	public function action_index()
	{
		$this->template->content = $this->getGrid();
	}

}
