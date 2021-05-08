<?
	/**
	 * @var Field $field
	 */
	$count       = $field->getProperties()->get(Field_Properties::PROPERTY_INPUT_COUNT);
	$inputsCount = $count == NULL ? 1 : $count->getValue();
	$cols        = ($inputsCount == 1) ? 6 : 4;
	$properties  = $field->getProperties();
	$values 		 = $field->getValue();


?>

<div class="row">

	<div class="my-col-<?= $cols ?> pull-left">
		<div class="checkbox">
			<label> <input type="checkbox" <?if(!empty($values['checkbox'])): ?>checked="checked"<? endif; ?> name="form[<?=$field->getTheName()?>][value][checkbox]" value="1">
				<?= $field->getTheLabel() ?>
			</label>
		</div>
	</div>

	<?php for ($j = 1; $j < $inputsCount+1; $j++):
		$label1 = $properties->get('inputLabel' . $j . '1') ? $properties->get('inputLabel' . $j . '1')->getValue() : NULL;
		$label2 = $properties->get('inputLabel' . $j . '2') ? $properties->get('inputLabel' . $j . '2')->getValue() : NULL;
	?>
		<div class="my-col-<?= $cols ?> pull-left">
			<? if ($label1): ?>
				<span class="text-right formBlock"><?=$label1?></span>
			<? endif; ?>

			<input type="text" value="<? if(!empty($values['field' . $j])){ echo $values['field' . $j]; } ?>" name="form[<?=$field->getTheName()?>][value][field<?=$j?>]" class="dotted-control formBlock">

			<? if ($label2): ?>
				<span class="text-left formBlock"><?=$label2?></span>
			<? endif; ?>
		</div>
	<? endfor; ?>

</div>
