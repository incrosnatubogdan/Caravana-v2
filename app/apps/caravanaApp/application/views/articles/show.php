<?php

	$title = HTML::chars($article->title);

?>

<?=view::factory('components/top_gallery')?>

<article id="article" class="container article-display">

		<h2 class="bar orange bebas"><?=$article->title?></h2>

		<?php

			if(!empty($pictures) && count($pictures)>0)
			{
				$gallery = View::factory('pictures/gallery_element');
				$gallery->set('pictures', $pictures);
				echo $gallery->render();
			}

		?>
		<div class="extra-info">
			<span class="glyphicon glyphicon-calendar"></span> <?=date('d.m.Y', strtotime($article->date))?>
		</div>

		<div class="text">
			<?=$article->text?>
		</div>

	</div>
</article>
