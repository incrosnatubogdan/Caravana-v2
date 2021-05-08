<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administration_Home extends Controller_Admin {

	public function action_index()
	{
		$this->template->content = 'Bine ai venit '.$this->user->username.'!!!';
	}

} // End Welcome
