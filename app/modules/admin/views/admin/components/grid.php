<?php
	$colnames = array();
	$colModels = array();
	if(!empty($properties))
	{
		foreach($properties as $item)
		{	if(empty($item['title'])){ echo debug::vars($item); die(); }
			$colnames[] = $item['title'];
			if(!empty($item['editoptions']) && is_array($item['editoptions']))
			{
				$item['editoptions'] = grid::getSelectList($item['editoptions']);
			}
			$colModels[] = $item;
		}
	}
?>

<table id="jqgajax"></table>
<div id="grid_pager" class="scroll" style=" text-align: center;"></div>


<script language="javascript" type="text/javascript">
	var model  = '<?=$modelName?>';
	$(document).ready(function(){
		var grid_h = window.innerHeight - $('#tabs').height() - 160;

		jQuery("#jqgajax").jqGrid({
			ajaxGridOptions : {type:"GET"},
			serializeGridData : function(postdata) {
				return postdata;
			},
			url:'<?=$grid_url?>get_items',
			editurl:'<?=$grid_url?>edit',
			datatype: "json",
			colNames:<?=json_encode($colnames)?>,
			colModel:<?=grid::injectJSFunctions(json_encode($colModels));?>,
			rowNum:30,
			autowidth: true,
			height: grid_h,
			loadonce: false,
			rowList:[30,60,90],
			pager: '#grid_pager',
			sortname: '<?=$sortField?>',
			sortorder: '<?=$sortMode?>',
			viewrecords: true,
			jsonReader: {
                			repeatitems: false,
                			id: "0"
						}
		}).navGrid("#grid_pager",<?=json_encode($gridNavigation) ?>)<?=(!empty($buttons))?$buttons:''?>.filterToolbar();

	});
</script>
