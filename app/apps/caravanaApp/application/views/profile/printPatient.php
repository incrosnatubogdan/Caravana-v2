<?php

  $patient = $form->getPatient();
  $fields = $form->getFields();

 ?>

 <div class="container" style="padding-top:45px;">
   <?php foreach ($fields as $field):
     if ($field->isHeader() || !$field->getValueFlag()) { continue; }

     $values = $field->getValue();

     $cols = (in_array($field->getType(), [8, 9, 4])) ? 12 : 6;
   ?>
       <div id="field<?=$field->getId()?>" class="col-md-<?=$cols?> col-sm-<?=$cols?> col-xs-<?=$cols?>">
          <div class="form-group">

              <?php

              switch ($field->getType()) {
                case 4: ?>
                  <label class="control-label">
                    <?=$field->getTheLabel();?>
                  </label><br>

                  <? echo $values;
                  break;
                case 6:
                  $count       = $field->getProperties()->get(Field_Properties::PROPERTY_INPUT_COUNT);
                  $inputsCount = $count == NULL ? 1 : $count->getValue();
                  $properties  = $field->getProperties(); ?>

                  <label class="control-label">
                    <?=$field->getTheLabel();?>
                  </label>

                  <?
                  for ($j = 1; $j < $inputsCount+1; $j++)
                  {
                    $label1 = $properties->get('inputLabel' . $j . '1') ? $properties->get('inputLabel' . $j . '1')->getValue() : NULL;
                    $label2 = $properties->get('inputLabel' . $j . '2') ? $properties->get('inputLabel' . $j . '2')->getValue() : NULL;

                    echo '<div>'.$label1.' ' . ($values['field' . $j] ? : NULL) . ' ' . $label2 . '<div>';
                  }

                  break;
                case 7: ?>
                   <label class="control-label">
                     <?=$field->getTheLabel();?>
                   </label>
               <?

                    $count       = $field->getProperties()->get(Field_Properties::PROPERTY_INPUT_COUNT);
                    $inputsCount = $count == NULL ? 2 : $count->getValue();
                    $properties  = $field->getProperties();
                    $fieldValue  = $field->getValue() == NULL ? 0 : $field->getValue();
                    $rowValue    = '';

                    for ($j = 1; $j < $inputsCount + 1; $j++)
                    {
                      $label      = $properties->get('inputLabel' . $j);
                      $value      = $label == NULL ? NULL : $label->getValue();

                      if ($fieldValue == $j)
                      {
                        $rowValue = $value;
                        break;
                      }
                    }

                    echo $rowValue;

                    break;
                case 8: ?>
                <label class="control-label">
                  <?=$field->getTheLabel();?>
                </label><br>

                <?=!empty($values['textarea']) ? $values['textarea'] : '';?>
                <?  break;
                case 9:

                    $label1 = $field->getProperties()->get(Field_Properties::PROPERTY_LABEL1);
                    $label2 = $field->getProperties()->get(Field_Properties::PROPERTY_LABEL2);

                    ?>
                      <label class="control-label">
                        <?=$field->getTheLabel();?>
                      </label><br>
                    <?

                    if ($label1)
                    {
                      echo $label1->getValue().'<br>';
                      echo !empty($values['textarea']) ? $values['textarea'] : '-';
                      echo '<br><br>';
                    }

                    if ($label2)
                    {
                      echo $label2->getValue().'<br>';
                      echo !empty($values['textarea_sec']) ? $values['textarea_sec'] : '-';
                    }

                    break;
                default: ?>
                  <label class="control-label">
                    <?=$field->getTheLabel();?>
                  </label>

                <?
                  echo $values;
                  break;
                }

               ?>



          </div>
       </div>
   <?php endforeach; ?>
</div>
