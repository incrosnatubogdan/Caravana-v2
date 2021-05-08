<head>
	<title><?= $meta->get('title') ?></title>
	<meta name="description" content="<?= $meta->get('description') ?>"/>
	<meta name="keywords" content="<?= $meta->get('keywords') ?>"/>
	<? if ($meta->get('canonical')): ?>
		<link rel="canonical" href="<?= $meta->get('canonical') ?>"/>
	<? endif; ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?
		//<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"></link>
	?>
	<?=HTML::loadCss($templateCss,$css)?>

	<script src="/media/js/jquery.min.js"></script>
	<script src="/media/js/bootstrap.min.js"></script>
	<?=HTML::loadJs($templateJs,$js)?>
</head>
