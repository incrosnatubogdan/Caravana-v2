<?php

/** @var CustomForm $form */

$fields = $form->getFields();

?>

<section class="container">
	<div class="patients">
		<form method="post" id="editPatientForm" autocomplete="off">
			<input type="hidden" value="1" name="redirect" id="redirectForm">

				<div class="clearfix col-md-12">
					<?php foreach ($fields as $field): ?>
							<div id="field<?=$field->getId()?>" class="col-md-<?=($field->isHeader() || $field->isTextArea())? 12 : 6 ?>">
								<?php echo view::factory($field->getFrontendView())->set('field', $field); ?>
							</div>
					<?php endforeach; ?>
			  </div>

				<?= $pagination->render(); ?>


			<div class="text-center actions">
				<button type="submit" onclick="$('#redirectForm').val(1); $('#addPatientForm').submit();" class="btn btn-primary"> Salveaza, si continua consultul</button>
				<button type="submit" onclick="$('#redirectForm').val(0); $('#addPatientForm').submit();" class="btn btn-default"> Salveaza, return to patients list</button>
				<a href="<?= url::link('/profile/patients/' . $form->getPatientEventId()) ?>" class="btn with-corners btn-default"> Return to patients list</a>
			</div>

		</form>
	</div>
</section>
