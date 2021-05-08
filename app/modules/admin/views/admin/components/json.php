<?php

$responce = new StdClass;
$responce->page    = $page;
$responce->total   = $total;
$responce->records = $count;

$i = 0;

foreach($data as $item){

	$tmpProperties = $properties;
	$row = new stdClass();
	foreach($item->as_array() as $key=>$value){

		$propertyKey = strtolower($modelName).$key;

		if(empty($properties[$propertyKey]))
		{
			continue;
		}
		$property = $properties[$propertyKey];

		switch ($properties[$propertyKey]['stype'])
		{
			case 'select':
				if(!empty($property['editoptions'][$value]))
				{
					$row->$property['index'] = $property['editoptions'][$value];
				}elseif($value==0)
				{
					$row->$property['index'] = 'Alege';
				}else
				{
					$row->$property['index'] = $value;
				}

				break;
			default:
				switch ($property['search_type'])
				{
					case 'date':
					case 'end_of_month':
						$row->$property['index'] = date('Y-m-d H:i', $value);
						break;
					case 'like':
						$row->$property['index'] = (!empty($value)) ? substr(UTF8::transliterate_to_ascii(strip_tags($value)), 0, 15) . ' ...' : '';
						break;
					default:
					   $row->$property['index'] = strip_tags($value);
				}
		}

		if(!empty($property['buttons']))
		{
			$row->$property['index'] = grid::drawModalActions($item->as_array(),$property['buttons']).$row->$property['index'];
		}

		unset($tmpProperties[$propertyKey]);
	}

	if(!empty($tmpProperties))
	{
		foreach($tmpProperties as $key=>$p)
		{
			if(!empty($p['buttons']))
			{
				$row->$p['index'] = ( !empty($row->$p['index']) ? $row->$p['index'] : '' ) . grid::drawModalActions($item->as_array(), $p['buttons']);
			}
		}
	}


	$responce->rows[$i] = (array)$row;

	$i++;
}

	if(empty($export))
	{
 		echo json_encode($responce, JSON_UNESCAPED_UNICODE);
	}
	else
	{


		$titles = array();
		foreach($properties as $key=>$p){

			if(empty($p['export'])) //if export is empty ignore coloumn
			{
				unset($properties[$key]);
				continue;
			}

			$titles[] = $p['title'];
		}

		$rows = array();
		foreach($responce->rows as $row){ //set the rows for remaining cols
			$tmp = array();

			foreach($properties as $key=>$p){
				$tmp[] = (!empty($row[$p['index']]))?$row[$p['index']]:'';
			}

			$rows[] = $tmp;
		}

		array_unshift($rows, $titles);

		$excel = new Excel();
		if($excel->arrayToCsv($rows))
		{
			$excel->download();
		}
		else
		{
			echo 'A aparut o eroare la exportul datelor.';
		}

	}

?>
