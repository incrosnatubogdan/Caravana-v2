<?php

	/** @var Field $field */
	$properties = $field->getProperties();
	$adminProperties = $field->getAdminProperties();
	$inputsCount = $properties->get(Field_Properties::PROPERTY_INPUT_COUNT);
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
						<select onchange="toggleInputs($(this).val());" name="properties[<?= $inputsCount->getName() ?>]">
							<?php for($j=0;$j<2;$j++): ?>
							<option <?php if($inputsCount->getValue() == $j+1): ?>selected<?php endif; ?> value="<?=$j+1?>"><?=$j+1?></option>
							<?php endfor; ?>
						</select>
					</td>
				</tr>

				<?php for($j=1;$j<3;$j++):

						$label1 = $properties->get('inputLabel' . $j . '1');
						$label2 = $properties->get('inputLabel' . $j . '2');

						$value1 = $label1 == NULL ? NULL : $label1->getValue();
						$value2 = $label2 == NULL ? NULL : $label2->getValue();

					?>
					<tr class="<? if (num::isEven($i+1)) : ?>ui-state-hover<? endif; ?> <? if ($inputsCount->getValue()<$j) : ?>hidden<? endif; ?> input<?=$j?>">
						<td align="left">Label before input <?=$j?>:</td>
						<td align="left">
							<input type="text" value="<?= $value1 ?>" name="properties[inputLabel<?=$j?>1]"/>
						</td>
					</tr>
					<? $i++; ?>
					<tr class="<? if (num::isEven($i+1)) : ?>ui-state-hover<? endif; ?>  <? if ($inputsCount->getValue()<$j) : ?>hidden<? endif; ?> input<?=$j?>" >
						<td align="left">After input label <?=$j?>:</td>
						<td align="left">
							<input type="text" value="<?= $value2 ?>" name="properties[inputLabel<?=$j?>2]"/>
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
	function toggleInputs(value) {
		if (parseInt(value) == 1)
		{
			$('.input2').addClass('hidden');
		}
		else
		{
			$('.input2').removeClass('hidden');
		}
	}
</script>




