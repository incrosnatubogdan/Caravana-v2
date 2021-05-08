<?php defined('SYSPATH') OR die('No direct access allowed.');

class Meta_Informations {
	var $title;
	var $keywords;
	var $description;
	
	
	public function __construct($link = false){
		
	}
	
	public function setTitle($title = false){
		$this->title = $title;
		return $this;
	}
	
	public function setDescription($description = false){
		$this->description = substr(strip_tags(nl2br($description)), 0, 155);
		return $this;
	}
	
	public function setKeywords($keywords = false){
		$this->keywords = $keywords;
		return $this;
	}
	
	public function set($key, $value){
		$this->$key = $value;
		return $this;
	}
	
	public function get($key=false){
		return !empty($this->$key)?$this->$key:false;
	}
} 