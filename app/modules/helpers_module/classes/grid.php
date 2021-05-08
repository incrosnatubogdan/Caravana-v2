<?php
class grid{

	public static function drawModalActions($item = array(), $options = array()){
		if(defined('ADMIN_EXPORT')) return false;

		$html = '';
		if(empty($options)) return false;

		foreach($options as $o)
		{
			$iconClass  = (!empty($o['icon']))?'ui-icon-'.$o['icon']:'ui-icon-wrench'; //info,help,plus,trash,cart
			$url 	    = (!empty($o['url']))?$o['url']:false;
			$reloadGrid = (!empty($o['reload']))?1:0;
			$ajax		= (!empty($o['ajax']))?1:0;
			if(empty($url)) continue;
			if(!empty($o['key']) & !empty($item[$o['key']]))
			{
				$url = rtrim($url,'/').'/'.$item[$o['key']];
			}

			$html .= '<span class="ui-icon '.$iconClass.' gridIcon " onclick="showModalFromUrl(\''.$url.'\','.$ajax.','.$reloadGrid.')"></span>';

		}

		return $html;
	}

	public static function getSelectList($fields=false){

		$values[] = "FALSE:Alege";
		foreach($fields as $key=>$item)
		{
			$values[] = $key.':'.$item;
		}

		$values = join(';',$values);
		return array('value'=>$values);

	}

	public static function injectJSFunctions($json){

		$functions=array(
			'JS_FUNCTION_SEARCH'=>'{dataInit:function(el){}}',
			'JS_FUNCTION_AUTOCOMPLETE'=>'{dataInit:function(el){AddAutocomplete(el);}}',
	        'JS_FUNCTION_DATEPICKER'=>"{dataInit:function(el){\$(el).val('');\$(el).datepicker({
			dateFormat:'yy-mm-dd',
			beforeShow:function(){
				$(this).val('');
			},
			onClose:function(){
				var sgrid = \$('#jqgajax')[0];
				sgrid.triggerToolbar();
			},
			onSelect: function(dateText, inst) {

			}
				});} }",

			'JS_FUNCTION_DATEPICKER_EDIT'=>"{dataInit:function(el){\$(el).datepicker({
			dateFormat:'yy-mm-dd',

			onSelect: function(dateText, inst) {

			}
				});} }",
			'JS_FUNCTION_DATEPICKER_YEAR_SELECTOR'=>"{dataInit:function(el){\$(el).datepicker({
			dateFormat:'yy-mm-dd',
			changeMonth: true,
			changeYear: true,
			yearRange: '-120:+0',
			onSelect: function(dateText, inst) {
				var sgrid = \$('#jqgajax')[0];
				sgrid.triggerToolbar();
			}
			});} }",
			'JS_FUNCTION_DATEPICKER_EDIT_YEAR_SELECTOR'=>"{dataInit:function(el){\$(el).datepicker({
			dateFormat:'yy-mm-dd',
			changeMonth: true,
			changeYear: true,
			yearRange: '-120:+0',
			onSelect: function(dateText, inst) {

			}
			});} }",
            'JS_FUNCTION_TIMEPICKER'=>"{dataInit:function(el){\$(el).timepicker();} }",
            'JS_FUNCTION_TIMEPICKER_EDIT'=>"{dataInit:function(el){\$(el).timepicker();} }",
            'JS_FUNCTION_DATETIMEPICKER'=>"{dataInit:function(el){\$(el).datetimepicker({dateFormat:'yy-mm-dd'});} }",
            'JS_FUNCTION_DATETIMEPICKER_EDIT'=>"{dataInit:function(el){\$(el).datetimepicker({dateFormat:'yy-mm-dd'});} }",
            'JS_FUNCTION_DATEPICKER_FORMAT'=>"{dataInit:function(el){\$(el).val('');\$(el).datepicker({dateFormat:'yy-mm-dd'});} }",
		);



		$result = $json;
		foreach($functions as $function => $implementation){
			$result = str_replace('"'.$function.'"',$implementation,$result);
		}

		return $result;
	}

}
