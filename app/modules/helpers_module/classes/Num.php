<?php defined('SYSPATH') OR die('No direct script access.');

class Num extends Kohana_Num {

	/**
	* Round a number to the nearest nth
	*
	* @param   integer  number to round
	* @param   integer  number to round to
	* @return  integer
	*/
	 
	public static function isEven($number){
		if($number%2==0){
			return TRUE;
		}else{
			return false;
		}
	}

}
