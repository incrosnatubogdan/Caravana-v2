<?php
class editor{
	
	public static function init($object,$inline=false,$box='false'){
		if(!empty($_GET['wyswig'])) return false;
		$view = new View('admin/components/editor');
		$view->object = $object;
		$view->inline = $inline;
		$view->config = self::config($box);
		return $view->render();
	}
	
	public static function config($box='false'){
		
		return "{
				 focus: true,
				 adminAuthentication: false,
				 autoformat: false,			 
				 convertDivs: false,
				 removeClasses: false,
				 autoresize: false,
				 box:" . $box . "
				}";			
	}
}