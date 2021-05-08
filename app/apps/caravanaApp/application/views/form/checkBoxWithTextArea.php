<?

  $values = $field->getValue();

?>

<div class="form-group <?=($field->hasErrors()) ? 'has-error': '';?>">
  <input type="hidden" name="form[<?=$field->getTheName()?>][value][checkbox]" value="0">
  <div class="checkbox">
  	<label>
  		<input type="checkbox" <?if(!empty($values['checkbox'])): ?>checked="checked"<? endif; ?> name="form[<?=$field->getTheName()?>][value][checkbox]" onclick="toggleDisabled(this, '#checkboxTextareaId<?=$field->getId()?>')" value="1">
  		<strong><?=$field->getTheLabel()?></strong>
  	</label>
  </div>
  <textarea name="form[<?=$field->getTheName()?>][value][textarea]" id="checkboxTextareaId<?=$field->getId()?>" class="form-control" <? if(empty($values['checkbox'])): ?>disabled<? endif; ?> rows="3"><? if(!empty($values['textarea'])){ echo $values['textarea']; } ?></textarea>
</div>
