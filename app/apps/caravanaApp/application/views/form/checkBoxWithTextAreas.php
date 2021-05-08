<?

  $values = $field->getValue();
  $label1 = $field->getProperties()->get(Field_Properties::PROPERTY_LABEL1);
  $label2 = $field->getProperties()->get(Field_Properties::PROPERTY_LABEL2);

  //echo debug::vars($field);

?>

<div class="form-group <?=($field->hasErrors()) ? 'has-error': '';?>">
  <input type="hidden" name="form[<?=$field->getTheName()?>][value][checkbox]" value="0">
  <div class="checkbox">
  	<label>
  		<input type="checkbox" <?if(!empty($values['checkbox'])): ?>checked="checked"<? endif; ?> name="form[<?=$field->getTheName()?>][value][checkbox]" onclick="toggleDisabled(this, '.checkboxTextareaId<?=$field->getId()?>')" value="1">
  		<strong><?=$field->getTheLabel()?></strong>
  	</label>
  </div>
</div>

<div class="form-group">
	<? if ($label1): ?>
		<label for="exampleInputEmail1"><?=$label1->getValue()?></label>
	<? endif; ?>

  <textarea name="form[<?=$field->getTheName()?>][value][textarea]" class="form-control checkboxTextareaId<?=$field->getId()?>" <? if(empty($values['checkbox'])): ?>disabled<? endif; ?> rows="3"><? if(!empty($values['textarea'])){ echo $values['textarea']; } ?></textarea>
</div>

<div class="form-group">
	<? if ($label2): ?>
		<label for="exampleInputEmail1"><?=$label2->getValue()?></label>
	<? endif; ?>

  <textarea name="form[<?=$field->getTheName()?>][value][textarea_sec]" class="form-control supersize checkboxTextareaId<?=$field->getId()?>" <? if(empty($values['checkbox'])): ?>disabled<? endif; ?> rows="3"><? if(!empty($values['textarea_sec'])){ echo $values['textarea_sec']; } ?></textarea>
</div>
