
<div style="width:50%;">
	<form method="post" id="adminForm" action="<?=url::base(true)?>administration/static_pages/edit_text/<?=$static->id?>">
		<input type="hidden" value="1" name="save" />

		<table class="adminTable" cellspacing="0" cellpadding="0" border="0" style="width:100%;">
		  <tbody>

			<tr class="ui-state-hover">
			  <td align="left" >Titlu</td>
			  <td align="left" ><input type="text" value="<?=$static->title?>" name="static[title]" /></td>
			</tr>
			<tr>
			  <td align="left" >Link</td>
			  <td align="left" ><input type="text" value="<?=$static->link?>" name="static[link]" /></td>
			</tr>
			<tr class="ui-state-hover">
			  <td align="left" >Continut</td>
			  <td align="left" ><textarea class="editor" name="static[text]" style="width:75%" rows="20" cols="20"><?=$static->text?></textarea></td>
			</tr>


		  </tbody>
		</table>

		<button onclick="$('#adminForm').submit()" type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-admin-button" role="button" aria-disabled="false"><span class="ui-button-text">Save</span></button>

	</form>

</div>

<?=editor::init('.editor');?>
