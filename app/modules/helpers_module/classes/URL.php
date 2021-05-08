<?php defined('SYSPATH') OR die('No direct script access.');

class URL extends Kohana_URL {
	
	public static function link($link = false){
		return url::base(true).ltrim($link,'/');
	}

}