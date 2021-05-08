<!DOCTYPE html>
<html lang="en">
	<?= (!empty($main)) ? $main : ''; ?>

	<body>
		<?= (!empty($header)) ? $header : ''; ?>
		<div>
			<?= (!empty($content)) ? $content : ''; ?>
		</div>
		<?= (!empty($footer)) ? $footer : ''; ?>
	</body>

	<? if ($user == NULL) :?>
		<?=view::factory('components/login')?>
	<? endif; ?>
</html>
