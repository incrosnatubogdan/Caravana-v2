<? if(!empty($roles)): ?>
	<div style="width:200px;">
		<form method="post" id="adminForm" action="<?=url::base(true)?>administration/users/roles/<?=$user->id?>">
			<input type="hidden" value="1" name="save" />

			<table class="adminTable" cellspacing="0" cellpadding="0" border="0" style="width:100%;">
			  <tbody>
				<? $i = 0; foreach($roles as $item):?>
					<tr class="<?=(Num::isEven($i))?'ui-state-hover':''?>">
					  <td align="left" ><?=UTF8::ucfirst($item->name)?></td>
					  <td align="left" ><input type="checkbox" <?=HTML::checked($item->id, $activeRoles)?> value="<?=$item->id?>" name="roles[]" /></td>
					</tr>
				<? $i++; endforeach; ?>

			  </tbody>
			</table>

			<button onclick="submitForm($('#adminForm'), false, false)" type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-admin-button" role="button" aria-disabled="false"><span class="ui-button-text">Save</span></button>

		</form>

	</div>
<? endif; ?>
