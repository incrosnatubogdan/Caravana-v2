<section class="container">
<div class="patients">
	<? if (count($events)): ?>
				<h2 class="bar orange bebas">Lista de pacienti - <?=$event->name?></h2>

				<div class="form-group clearfix row patients-filters">
					<form id="filterForm" method="get" action="<?=url::link('profile/patients/' . $event->id . '/1')?>">
						<div class="filter-option event">
							<input type="hidden" name="eventId" id="eventIdInput" value="<?=$event->id?>">
							<div class="btn-group btn-block" role="group">
								<button type="button" class="btn btn-default btn-block text-left dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span id="eventLabel" class="text-overflow"><?=$event->name?></span>
								</button>
								<ul class="dropdown-menu">
									<? foreach ($events as $id=>$name): ?>
										<li>
											<a class="<?= ($event->id == $id) ? 'selected' : '' ?>" href="javascript:;" onclick="selectEvent(this, '<?=$id?>')"><?=$name?></a>
										</li>
									<? endforeach; ?>
								</ul>
							</div>
						</div>

						<div class="filter-option">
							<input type="text" class="form-control" name="lastName" value="<?=(!empty($filters['lastName']))?$filters['lastName']:''?>" placeholder="Nume">
						</div>

						<div class="filter-option">
							<input type="text" class="form-control" name="firstName" value="<?=(!empty($filters['firstName']))?$filters['firstName']:''?>" placeholder="Prenume">
						</div>

						<div class="filter-option">
							<input type="text" id="filterBirthDate" class="form-control" name="birthDate" value="<?=(!empty($filters['birthDate']))?$filters['birthDate']:''?>" placeholder="Data nasterii">
						</div>

						<div class="filter-option">
							<input type="tel" class="form-control" name="phoneNumber" value="<?=(!empty($filters['phoneNumber']))?$filters['phoneNumber']:''?>" placeholder="Telefon">
						</div>

						<div class="filter-option">
							<select name="seen" class="form-control">
							  <option <?=(!isset($filters['seen']) || $filters['seen']==-1)? 'selected' : ''?> value="-1">Alege</option>
							  <option <?=(isset($filters['seen']) && $filters['seen']==0)? 'selected' : ''?> value="0">Neconsultati de un doctor generalist</option>
							  <option <?=(isset($filters['seen']) && $filters['seen']==1)? 'selected' : ''?> value="1">Vazuti de un doctor generalist</option>
							</select>
						</div>

						<? if (!empty($filterFields)):
								$defaultLabel = 'Consultatii';
								$label = NULL;

								foreach ($filterFields as $field)
								{
									$label = (isset($filters['field'], $filters['field_value']) && $filters['field_value']==1 && $filters['field'] == $field->getId()) ? $field->getTheLabel() . ' recomandata': NULL;
									if($label) { break; }
									$label = (isset($filters['field'], $filters['field_value']) && $filters['field_value']==2 && $filters['field'] == $field->getId()) ? $field->getTheLabel() . ' efectuata': NULL;
									if($label) { break; }
								}

								$label = ($label !== NULL) ? $label : $defaultLabel;
							?>
							<div class="filter-option">
								<div class="btn-group btn-block" role="group">
									<button type="button" class="btn btn-default btn-block text-left dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span id="filterValue" class="text-overflow" placeHolder="<?=$defaultLabel?>"><?=$label?></span>
									</button>
									<input type="hidden" id="filterFieldId" name="field" value="<?=(!empty($filters['field']))?$filters['field']:''?>">
									<input type="hidden" id="filterFieldValue" name="field_value" value="<?=(!empty($filters['field_value']))?$filters['field_value']:''?>">
									<ul class="dropdown-menu dropdown-menu-form">
										<? foreach ($filterFields as $field): ?>
											<li><a class="<?=(isset($filters['field'], $filters['field_value']) && $filters['field_value']==1 && $filters['field'] == $field->getId())?'selected':''?>" href="javascript:;" onclick="return toggleEvent(this, '<?=$field->getId()?>', 1);"><?=$field->getTheLabel()?> recomandata</a></li>
											<li><a class="<?=(isset($filters['field'], $filters['field_value']) && $filters['field_value']==2 && $filters['field'] == $field->getId())?'selected':''?>" href="javascript:;" onclick="return toggleEvent(this, '<?=$field->getId()?>', 2);"><?=$field->getTheLabel()?> efectuata</a></li>
									  <? endforeach; ?>
									</ul>
								</div>
							</div>
							<script>

								function printPatient(id){
									window.open("<?= url::link('profile/printPatient/')?>" + id,'','width=720,location=no,menubar=no,resizable,scrollbars=no,toolbar=no,titlebar=no');
								}

							  $(function() {
										$('.dropdown-menu').on('click', function(e){
													if($(this).hasClass('dropdown-menu-form')){
															e.stopPropagation();
													}
										});
								});
							</script>

						<? endif; ?>

						<div class="filter-option">
							<button type="button" onclick="$('#filterForm').submit()" class="btn btn-primary btn-block">Aplica</button>
						</div>
					</form>
				</div>

				<div>

					<? if (count($patients) == 0): ?>
						<div class="alert alert-warning">
							<span class="alert-content">Nu sunt pacienti adaugati in caravana aleasa!</span>
							<a href="<?= url::link('profile/addPatient/' . $event->id) ?>" class="btn btn-primary">Adauga un pacient</a>
						</div>
					<? else: ?>

						<div class="alert alert-info clearfix" role="alert">

								<span class="alert-content">
								<? if ($pagination->total_items > 1): ?>
									Exista <?= $pagination->total_items ?> pacienti in caravana <?= $event->name ?>.
								<? else: ?>
									Exista 1 pacient in caravana <?= $event->name ?>.
								<? endif; ?>
							</span>


								<a href="<?= url::link('profile/addPatient/' . $event->id) ?>" class="btn btn-primary pull-right">Adauga un pacient nou</a>

						</div>

						<table class="table table-hover table-bordered">
							<thead>
							<tr>
								<th>#</th>
								<th>Nume</th>
								<th>Data nasterii</th>
								<th>Numar telefon</th>
								<th class="col-md-5">Optiuni</th>
							</tr>
							</thead>
							<tbody>

							<? $i = 1;
							foreach ($patients as $patient): ?>
								<tr>
									<th scope="row"><?= ($pagination->offset + $i) ?></th>
									<td><?= $patient->lastName ?> <?= $patient->firstName ?></td>
									<td><?= date('d.m.Y', $patient->birthDate) ?></td>
									<td><?= $patient->phoneNumber ?></td>
									<td class="text-center patient-actions">



										<a target="_blank" class="btn btn-primary pull-right" href="<?=url::link('/profile/editPatient/'.$patient->id)?>" role="button">
											<span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
											Consulta
										</a>

										<a class="btn btn-primary btn-orange pull-right" data-toggle="modal" data-target="#myModal" href="<?=url::link('/profile/details/'.$patient->id)?>" role="button">
											<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
											Consultatii
										</a>

										<a class="btn btn-success pull-right" onclick="printPatient('<?=$patient->id?>');"  role="button">
											<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
											Print
										</a>
								</tr>
								<? $i++; endforeach; ?>
							</tbody>
						</table>

						<!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      	<!-- content is loaded with AJAX -->
						    </div>
						  </div>
						</div>

						<?= $pagination->render(); ?>

					<? endif; ?>

				</div>
	<? else: ?>
		<div class="alert alert-warning">
			Nu sunt caravane active.
		</div>
	<? endif; ?>

</div>
</div>
