<?php

	if(!isset($item_type))  $item_type = 0;
	if(!isset($item_id))  $item_id = 0;

	$pictures =  ORM::factory('Picture')->where('item_id', '=', $item_id)->where('item_type', '=', $item_type)->order_by('order','asc')->find_all();

	if($item_type==0)
	{
		$main = ORM::factory('Article', $item_id);
	}

	if(empty($main->id))
	{
		$main = new stdClass;
		$main->picture_id = 0;
	}
?>

<? if(!empty($pictures)):?>
	<ul class="list picture_container">
	<? foreach($pictures as $item):?>

					<li id="item_<?=$item->id?>">
						<div style="width:150px">
							<img style="width:150px; margin:auto; display:block;" src="<?=$img?><?=$item->path?>" />
						</div>
						<br />
						<input name="main" onclick="setMain(<?=$item->id?>)" <?=HTML::checked($item->id, $main->picture_id)?> value="<?=$item->id?>" type="checkbox" /> Poza principala<br />
						<a href="javascript:;" onclick="deletePicture(<?=$item->id?>)"><span class="ui-icon ui-icon-trash gridIcon "></span>Sterge</a> <br />
					</li>

	<? endforeach;?>
	</ul>
<? endif; ?>

<script>

		$(function() {
			$( ".picture_container" ).sortable({stop: function(event, ui) { setPicturesOrder($('.picture_container').sortable('serialize')); }});
			$( ".picture_container" ).disableSelection();
		});


		function setPicturesOrder(order){
			$.ajax({
				type: "GET",
				url: url_base + 'administration/pictures/set_order/?' + order,
				success: function(){
					messageAdmin('Am salvat ordinea pozelor.');
				}
			});
		}

		function setMain(id){
			$('.picture_container input').removeAttr('checked');
			$('#item_'+id).find('input').attr('checked','checked');

			$.ajax({
				type: "GET",
				url: url_base + 'administration/articles/set_main/<?=$main->id?>/' + id,
				success: function(){

					}
			});
		}

		function deletePicture(id){
			$.ajax({
			type: "GET",
			url: url_base + 'administration/pictures/delete/' + id,
			success: function(){
					$('#item_'+id).fadeOut();
				}
			});

		}

</script>
