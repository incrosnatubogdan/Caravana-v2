<?php
	
	if(empty($url))
	{
		$url = url::link('administration/authentification/login');
	}

?>

<script>
	$(function() {
		
		 $( "#dialog-form" ).dialog({
			autoOpen: true,
			height: 400,
			width: 350,
			modal: true,
			buttons: {
			"Login": function() {
				$('#login_form').submit();
			}
			},
			close: function() {
				$( "#dialog-form" ).dialog('open')
				$('.ui-dialog').effect("shake", { times:3 }, 300);
			}
			});

		
	});
</script>
<style>
	label, input { display:block; }
	input.text { margin-bottom:12px; width:95%; padding: .4em; }
	fieldset { padding:0; border:0; margin-top:25px; }
	h1 { font-size: 1.2em; margin: .6em 0; }
	div#users-contain { width: 350px; margin: 20px 0; }
	div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
	div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
	.ui-dialog .ui-state-error { padding: .3em; }
	.validateTips { border: 1px solid transparent; padding: 0.3em; }
</style>

<div id="dialog-form" title="Login">
	
	<form id="login_form" method="post" autocomplete="off" action="<?=$url?>">
		<fieldset>		
			<label for="email">User</label>
			<input type="text" name="username" id="username" value="" class="text ui-widget-content ui-corner-all" />
			<label for="password">Password</label>
			<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
		</fieldset>
	</form>
	
</div>