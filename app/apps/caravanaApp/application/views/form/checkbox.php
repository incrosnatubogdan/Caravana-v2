<div class="checkbox">
	<label>
		<input type="hidden" name="form[<?=$field->getTheName()?>][value]" value="0">
		<input type="checkbox" <?if($field->getValue()): ?>checked="checked"<? endif; ?> name="form[<?=$field->getTheName()?>][value]" value="1">
		<?=$field->getTheLabel()?>
	</label>
</div>
