<?php

/** @var Field $field */
$properties      = $field->getProperties();
$adminProperties = $field->getAdminProperties();
$inputsCount     = $properties->get(Field_Properties::PROPERTY_INPUT_COUNT);
//echo debug::vars($inputsCount); die();
?>
<div style="width:500px; min-height: 300px;">
	<form method="post" id="adminForm" action="<?= url::base(TRUE) ?>administration/fields/settings/<?= $field->getId() ?>">
		<table class="adminTable" cellspacing="0" cellpadding="0" border="0" style="width:100%;">
			<tbody>
			<?
			$i = 0;
			foreach ($adminProperties as $property):

				?>
				<tr class="<? if (num::isEven($i)) : ?>ui-state-hover<? endif; ?> ">
					<td align="left"><?= ucfirst($property->getName()); ?></td>
					<td align="left">
						<input type="text" value="<?= $property->getValue() ?>" name="properties[<?= $property->getName() ?>]"/>
					</td>
				</tr>

				<? $i++; endforeach; ?>

			<tr class="<? if (num::isEven($i)) : ?>ui-state-hover<? endif; ?> ">
				<td align="left">Numar inputuri:</td>
				<td align="left">
					<select onchange="toggleRadioInputs($(this).val());" name="properties[<?= $inputsCount->getName() ?>]">
						<?php for ($j = 1; $j < 5; $j++): ?>
							<option <?php if ($inputsCount->getValue() == $j + 1): ?>selected<?php endif; ?> value="<?= $j + 1 ?>"><?= $j + 1 ?></option>
						<?php endfor; ?>
					</select>
				</td>
			</tr>

			<?php for ($j = 1; $j < 6; $j++):

				$label = $properties->get('inputLabel' . $j);
				$value = $label == NULL ? NULL : $label->getValue();


				?>
				<tr class="<? if (num::isEven($i + 1)) : ?>ui-state-hover<? endif; ?> <? if ($inputsCount->getValue() < $j) : ?>hidden<? endif; ?> input<?= $j ?>">
					<td align="left">Label <?= $j ?>:</td>
					<td align="left">
						<input type="text" value="<?= $value ?>" name="properties[inputLabel<?= $j ?>]"/>
					</td>
				</tr>

				<?php $i++; endfor; ?>

			</tbody>
		</table>
		<button onclick="submitForm($('#adminForm'), false, false)" type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-admin-button" role="button" aria-disabled="false">
			<span class="ui-button-text">Salveaza</span>
		</button>
	</form>
</div>

<script type="text/javascript">
	function toggleRadioInputs(value) {
		console.log('the value', value);

		for (var i = 1; i < 6; i++) {
			$('.input' + i).addClass('hidden');

			if (parseInt(value) >= i) {
				$('.input' + i ).removeClass('hidden');
			}
		}
	}
</script>




