<? if(!$inline):?>
	<script language="javascript">
		$(document).ready(function(){
<? endif; ?>
		$('<?=$object?>').redactor(<?=$config?>);
<? if(!$inline):?>
			});
	</script>
<? endif; ?>