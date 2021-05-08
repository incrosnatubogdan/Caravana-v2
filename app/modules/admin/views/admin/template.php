<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?=(!empty($main))?$main:'';?>
</head>
<body>

<?=(!empty($header))?$header:'';?>

<?php //hide menu on some pages
	
	if(empty($hideMenu))
	{
		echo View::factory('admin/components/menu');
	} 

?>
<?=(!empty($content))?$content:'';?>


<?=(!empty($footer))?$footer:'';?>
</body>
</html>