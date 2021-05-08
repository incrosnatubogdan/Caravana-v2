<?php
	
	$recent_articles = ORM::factory('article')->where('active','=',1)->order_by('id','desc')->limit(5)->find_all();

?>
<? if(!empty($recent_articles)):?>
	<aside>
		<h3>Articole recente</h3>
		<ul>
		<? foreach($recent_articles as $item): 			
			$link	  = url::link('articol/'.URL::title($item->title).'-'.$item->id.'.html');
			$title 	  = HTML::chars($item->title);
		?>
			<li><a href="<?=$link?>" title="<?=$title?>"><?=$item->title?></a></li>
		<? endforeach; ?>
		</ul>
	</aside>	
<? endif; ?>