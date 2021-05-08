<?php
		$resize = url::link('pictures/resize');
		$big    = $resize.'/1170/600/1/';
		$small  = $resize.'/128/48/1/';
?>

	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
		<? if(count($pictures)>1): ?>
		  <ol class="carousel-indicators">
				<? $i=0; foreach($pictures as $item):?>
		    	<li data-target="#carousel-example-generic" data-slide-to="<?=$i?>" class="<?=($i == 0) ? 'active' : ''?>"></li>
				<? $i++; endforeach; ?>
		  </ol>
		<? endif; ?>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
			<? $i=0; foreach($pictures as $item):?>
	    <div class="item <?=($i == 0) ? 'active' : ''?>">

				<img src="<?=$big.$item->path?>" alt="<?=$item->name?>">
				<? if(!empty($item->name)): ?>
		      <div class="carousel-caption">
						<h3><?=$item->name?></h3
		      </div>
				<? endif; ?>

	    </div>
		<? $i++; endforeach; ?>
	  </div>

	  <!-- Controls -->
		<? if(count($pictures)>1): ?>
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		<? endif; ?>
	
</div>
