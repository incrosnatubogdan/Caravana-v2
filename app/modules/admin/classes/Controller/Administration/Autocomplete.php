<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administration_Autocomplete extends Controller_Admin {

	public function action_index()
	{
		$this->template->content = 'Bine ai venit '.$this->user->username.'!!!';
	}

  public function action_getSuggest()
  {
    $this->autoRender = false;
    //TODO refactor this into a global suggest for admin
      $options = Model_Event::make()->where('name', 'like', $this->request->query('query').'%')->find_all(10);

      $list = [];

      foreach ($options as $option)
      {
        $list[(int)$option->id] = $option->id. '. ' .$option->name .' - ' . date('d.m.Y', $option->date);
      }

      echo json_encode($list);
  }

}
