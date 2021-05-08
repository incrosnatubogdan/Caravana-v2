<?php defined('SYSPATH') OR die('No direct access allowed.');

class Static_Pages_Core {
	var $static_page_model;
	var $title;
	var $text;
	var $link;
	var $active;
	var $user;
	var $id;
	var $requestedLink;

	public function __construct($link = false){
		$this->user = Auth::instance()->get_user();

		$this->getByLink($link);
	}

	/**
	 * Create e static page
	 *
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public static function factory($name = NULL)
	{
		return new self($name);
	}

	/**
	 * Render the content
	 * @return string 
	 */
	public function render()
	{
		return $this->getText();
	}

	public function getByLink($link = false){

		if($link===false)
		{
			return false;
		}

		$this->requestedLink = $link;

		$this->static_page_model = ORM::factory('Static_Page');
		$this->static_page_model->where('link', '=', $link)->find();

		$this->populate();
	}

	public function populate($model = false){

		if(!is_object($model))
		{
			$model = $this->static_page_model;
		}

		if(empty($model->id))
		{
			return false;
		}

		foreach($model->as_array() as $key=>$value){
			$this->$key = $value;
		}

	}

	public function getTitle(){
		return (!empty($this->title))?$this->title:false;
	}

	public function getLink(){
		return (!empty($this->link))?$this->link:false;
	}

	public function getText(){
		//echo debug::vars($this);
		if((empty($this->id) || empty($this->text)) && !empty($this->user->id) && $this->user->isAdmin()){
			return 'Adauga '.$this->requestedLink.'<br />';
		}

		if(!$this->isActive()  && !empty($this->user->id) && $this->user->isAdmin())
		{
			return $this->requestedLink.' - nu este activa<br />';
		}

		return $this->text;
	}

	public function isLoaded(){
		return !empty($this->id);
	}

	public function isActive(){
		return $this->active;
	}
}
