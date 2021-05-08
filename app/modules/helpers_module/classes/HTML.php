<?php defined('SYSPATH') OR die('No direct script access.');

class Html extends Kohana_HTML {


	public static function checked($value, $list){
		if(is_array($list))
		{
			return (!empty($list) && in_array($value, $list))?'checked="checked"':'';
		}
		else
		{
			return (!empty($list) && $value==$list)?'checked="checked"':'';
		}
	}

	public static function loadJs($js, $path, $ct = TRUE)
	{
		$responce='';

		foreach($js as $key=>$value)
		{
			if(!strchr($value,'://'))
			{
				if($ct&&file_exists(DOCROOT.'media/js/'.$value))
				{
					$value=$value.'?ct='.filemtime(DOCROOT.'media/js/'.$value);
				}

				$responce.=html::script($path.$value);
			}
		    else
		    {
			   	 $responce.=html::script($value);
		    }
		}

        return $responce;
	}
	
	public static function loadCss($css,$path,$ct=TRUE,$link=FALSE){

		$responce='';

		foreach($css as $key=>$value){

			if($ct&&file_exists(DOCROOT.'media/css/'.$value)){
				$value=$value.'?ct='.filemtime(DOCROOT.'media/css/'.$value).'&v=feb14';
			}elseif($ct&&file_exists(DOCROOT.'media/css_parent/'.$value)){
				$value=$value.'?ct='.filemtime(DOCROOT.'media/css_parent/'.$value);
			}

			if($link){
				$responce[] = $path.$value;
			}else{
		        $responce.='<link rel="stylesheet" type="text/css" href='.$path.$value.' />';
			}

		}

        		return $responce;
	}

}