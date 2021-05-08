
<? if(!empty($adminMenuItems)):  ?>
<div id="tabs">
	<ul id="menu" >
				<? $i=0; foreach($adminMenuItems as $url=>$item):?>
					<li id="menu_tab_<?=$i?>" class="<?=($url==url::link($_SERVER['REQUEST_URI']))?'ui-tabs-active ui-state-active':''?> <?=$item['class']?>">
						<a href="javascript:;" url="<?=$url?>" onclick="location.href='<?=$url?>'"><span><?=$item['name']?></span></a>
					</li>
				<? $i++; endforeach; ?>
	</ul>
</div>
<? endif; ?>

<script>
	var maxModalHeight = window.innerHeight-180;
	var url_base = '<?=url::base(TRUE) ?>';


	$(document).ready(function() {

		$("#tabs").tabs();
		if($('.ui-tabs-active').size()>1){
			$('.ui-tabs-active:first').removeClass('ui-tabs-active ui-state-active');
		}
	});
</script>
