<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Pictures extends Controller_Base {
	var $templateJs = array('jquery.js');
	var $templateCss = array('style.css','gallery.css');
	var $sizes = array(
					   1170=>array(600 => 600),
					   128=>array(48  => 48),
					   150=>array(150 => 150),
					   250=>array(250 => 250),
						 340=>array(210 => 210),
						 340=>array(0 => 0),
				);


	public function action_resize($width = 0, $height = 0, $mode = 1, $path = false){
		$this->autoRender = false;
		$this->read_path  = DOCROOT . 'media/img/';
		$this->save_path  = DOCROOT . 'media/img/tmp';

		$width = $this->request->param('width',$width);
		$height = $this->request->param('height',$height);
		$mode = $this->request->param('mode',$mode);
		$path = $this->request->param('path',$path);

		$picMode = Image::AUTO;
		if($mode == 1)
		{
			$picMode = Image::WIDTH;
		}elseif($mode == 2)
		{
			$picMode = Image::HEIGHT;
		}

		if(!isset($this->sizes[$width][$height]) || !in_array($mode, [0,1,2]))
		{
			//die('Picture doesn\'t exist');
		}

		$targetFile = $this->save_path . '/' . $width . '/' . $height . '/' . $mode . '/' . $path;

		if(!file_exists($targetFile)){

			$image = Image::factory($this->read_path.$path);

			if(!is_dir(dirname($targetFile))){
				mkdir(dirname($targetFile), 0755, TRUE);
			}

			$image->resize($width, $height, $picMode)->crop($width, $height)->save($targetFile);
		}

		$cachedImage = getimagesize($targetFile);
		header ("Pragma: no-cache");
		header("Expires: 0");
		header("Content-Length: " . filesize($targetFile) ."; ");
		header('Content-Type: '.$cachedImage['mime'].";",true);
		ob_clean(); // clean output buffer
		flush(); // flush output buffer
		readfile($targetFile);
		exit;
	}

} // End Welcome
