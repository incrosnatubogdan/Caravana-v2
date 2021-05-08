
	<div style="width:700px;">

		<form method="post" id="adminForm" action="<?=url::link('administration/sections/duplicate/' . $section->id)?>">
			<input type="hidden" value="1" name="save" />

			<table class="adminTable" cellspacing="0" cellpadding="0" border="0" style="width:100%;">
			  <tbody>

				<tr class="ui-state-hover">
				  <td align="left" >Duplicate section <b><?=$section->name?></b></td>
				</tr>

				<tr>
				  <td align="left" >
					Select language
				  </td>
				</tr>

				<tr class="ui-state-hover">
				  <td align="left" >
					<?=Form::select('language', $languages, $section->language)?>
				  </td>
				</tr>

			  </tbody>
			</table>

			<button onclick="submitForm($('#adminForm'), false, true)" type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-admin-button" role="button" aria-disabled="false"><span class="ui-button-text">Save</span></button>

		</form>

	</div>

	<?=editor::init('.editor');?>
