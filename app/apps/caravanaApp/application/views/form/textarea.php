<div class="form-group">
	<? if ($field->getTheLabel()): ?>
		<label for="exampleInputEmail1"><?=$field->getTheLabel()?></label>
	<? endif; ?>

	<textarea name="form[<?=$field->getTheName()?>][value]" class="form-control" rows="3"><?=$field->getValue()?></textarea>
</div>
