<?php

/** @var Field $field */
$properties = $field->getAdminProperties();

?>
<div style="width:500px;">
	<form method="post" id="adminForm" action="<?= url::base(TRUE) ?>administration/fields/settings/<?= $field->getId() ?>">
		<table class="adminTable" cellspacing="0" cellpadding="0" border="0" style="width:100%;">
			<tbody>
				<?
					$i = 0;
					foreach ($properties as $property):

				?>
					<tr class="<? if (num::isEven($i)) : ?>ui-state-hover<? endif; ?> ">
						<td align="left"><?= ucfirst($property->getName()); ?></td>
						<td align="left">
							<input type="text" value="<?= $property->getValue() ?>" name="properties[<?= $property->getName() ?>]"/>
						</td>
					</tr>

				<? $i++; endforeach; ?>
			</tbody>
		</table>
		<button onclick="submitForm($('#adminForm'), false, false)" type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-admin-button" role="button" aria-disabled="false">
			<span class="ui-button-text">Salveaza</span>
		</button>
	</form>
</div>
