<?
/**
 * @var Field $field
 */
$count       = $field->getProperties()->get(Field_Properties::PROPERTY_INPUT_COUNT);
$inputsCount = $count == NULL ? 2 : $count->getValue();
$cols        = ($inputsCount == 1) ? 6 : 4;
$properties  = $field->getProperties();
$fieldValue  = $field->getValue() == NULL ? 0 : $field->getValue();
?>

<div class="form-group">
	<label><?= $field->getTheLabel() ?></label>
	<div>
		<?php for ($j = 1; $j < $inputsCount + 1; $j++):

			$label      = $properties->get('inputLabel' . $j);
			$value      = $label == NULL ? NULL : $label->getValue();
		?>
			<label class="radio-inline" for="<?= $field->getTheName() ?>Radio<?= $j ?>">
				<input type="radio" name="form[<?= $field->getTheName() ?>][value]" value="<?= $j ?>" <? if ($fieldValue == $j): ?> checked<? endif; ?> id="<?= $field->getTheName() ?>Radio<?= $j ?>" value="option1">
				<?= $value ?>
			</label>
		<? endfor; ?>

	</div>
</div>
