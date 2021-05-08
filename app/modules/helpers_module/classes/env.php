<?php
/**
 * Environment methods
 */
class env{

  /**
   * Return true if running in development environment
   *
   * @return boolean
   */
	public static function isDev(){
    return Kohana::$environment == Kohana::DEVELOPMENT;
	}

}
