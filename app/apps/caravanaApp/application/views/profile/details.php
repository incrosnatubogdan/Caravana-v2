<?php

  $patient = $form->getPatient();
  $fields  = $form->getFields();

?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">Consultatii pacient <?=$patient->firstName?> <?=$patient->lastName?></h4>
</div>
<div class="modal-body">

  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php $i=0; foreach ($fields as $field): $values = $field->getValue();
      $valueAdded = ((is_array($field->getValue()) && $field->getValueFlag()==2) || (!is_array($field->getValue()) && $field->getValueFlag() == 1));

      $label1 = $field->getProperties()->get(Field_Properties::PROPERTY_LABEL1);
      $label2 = $field->getProperties()->get(Field_Properties::PROPERTY_LABEL2);
    ?>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>" aria-expanded="false" aria-controls="collapse<?=$i?>">
              <? if($valueAdded):?><strong><? endif; ?>
                <?=$field->getTheLabel()?>

                <? if (is_array($field->getValue()) && $field->getValueFlag()==2): ?>
                  - efectuata
                <? elseif (is_array($field->getValue()) && $field->getValueFlag()==1): ?>
                  - recomandata
                <? endif; ?>

              <? if($valueAdded):?></strong><? endif; ?>
            </a>
          </h4>
        </div>
        <div id="collapse<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">

            <?
               if (!empty($values['textarea']))
               {
                echo '<strong>' . $label1->getValue() . '</strong> ';
                echo $values['textarea'].'<br>';
               }
            ?>

            <?
               if (!empty($values['textarea_sec']))
               {
                echo '<strong>' . $label2->getValue() . '</strong> ';
                echo $values['textarea_sec'].'<br>';
               }
            ?>
            <br>  
            <a target="_blank" href="<?=$form->getEditLink($field->getPage(), $field->getId())?>" class="btn btn-default btn-xs">Consulta</a>
          </div>
        </div>
      </div>
    <?php $i++; endforeach; ?>
  </div>

      <div class="modal-footer">
        <a target="_blank" href="<?=$form->getEditLink()?>" class="btn btn-primary">Consulta pacientul</a>
      </div>
</div>
