<?php defined('SYSPATH') OR die('No direct access allowed.');

class Excel {
	var $filePath;
	var $fileName;
	
	public function __construct($file_name = false){
		
		if($file_name===false)
		{
			$file_name = 'admin-export-' . date('Y-m-d-H-i-s') . '.csv';
		}
		
		$this->fileName = $file_name;			
		$this->filePath = APPPATH . 'cache/' . $this->fileName;
	}
	
	public function arrayToCsv($array, $delimeter = ",", $enclosure = '"'){
		if(empty($array)) return false;
		
		$file = fopen($this->filePath, 'w+');

        foreach ($array as $row)
        {
            fputcsv($file, $row, $delimeter, $enclosure);
        }
		
        fclose($file);
		
		return true;
	}
	
	public function download(){
		download::force($this->filePath, null, $this->fileName,'text/csv');
	}
} 