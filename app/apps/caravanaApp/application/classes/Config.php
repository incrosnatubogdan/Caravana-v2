<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Class Config
 */
class Config extends Kohana_Config
{

	/**
	 * Get some config variables
	 *
	 * @param      $group
	 * @param null $default
	 *
	 * @return null
	 * @throws Kohana_Exception
	 */
	public static function vars($group, $default = NULL)
	{
		$config = Kohana::$config->load($group);

		return $config ? $config : $default;
	}

}
