<?php
	$resize = url::link('pictures/resize');
	$big    = $resize.'/950/600/1/';
	$small  = $resize.'/128/48/1/';
?>


<? if(!empty($pictures)): ?>
	
<?php	
	
	$gallery = View::factory('pictures/gallery_element');
	$gallery->set('pictures', $pictures);
	echo $gallery->render();
	
?>	
	
<? else: ?>

	<article class="static_pages clearfix">
		<div>
			Galeria nu este disponibila.
		</div>
	</article>
	
<? endif; ?>	

