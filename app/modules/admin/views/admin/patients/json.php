<?php

  $responce = new StdClass;
  $responce->page    = $page;
  $responce->total   = $total;
  $responce->records = $count;
  $responce->rows    = [];

  $i = 0;
  $rows = [];
  foreach($data as $item)
  {
    $form = CustomForm::makeEntireForm($item);
    $fields = $form->getFields();



    foreach($fields as $field)
    {
      if($field->isHeader())
      {
        continue;
      }

      if ($i == 0)
      {
        switch ($field->getType()) {
          case 6:
            $count       = $field->getProperties()->get(Field_Properties::PROPERTY_INPUT_COUNT);
            $inputsCount = $count == NULL ? 1 : $count->getValue();
            $properties  = $field->getProperties();

            $rows[$i-1][] = $field->getTheLabel();

            for ($j = 1; $j < $inputsCount+1; $j++)
            {
              $label1 = $properties->get('inputLabel' . $j . '1') ? $properties->get('inputLabel' . $j . '1')->getValue() : NULL;
              $label2 = $properties->get('inputLabel' . $j . '2') ? $properties->get('inputLabel' . $j . '2')->getValue() : NULL;

              $rows[$i-1][] = implode(' ', array_filter([$label1,  $label2]));
            }

            break;
          case 8:
            $rows[$i-1][] = $field->getTheLabel();
            $rows[$i-1][] = 'Recomandari';
            break;
          case 9:
              $label1 = $field->getProperties()->get(Field_Properties::PROPERTY_LABEL1);
              $label2 = $field->getProperties()->get(Field_Properties::PROPERTY_LABEL2);

              $rows[$i-1][] = $field->getTheLabel();
              $rows[$i-1][] = ($label1) ? $label1->getValue() : '';
              $rows[$i-1][] = ($label2) ? $label2->getValue() : '';
              break;
          default:
            $rows[$i-1][] = $field->getTheLabel();
            break;
        }
      }

      $values = $field->getValue();

      switch ($field->getType()) {
        case 5:
              $rows[$i][] = !empty($values) ? 1 : 0;
          break;
        case 6:
          $count       = $field->getProperties()->get(Field_Properties::PROPERTY_INPUT_COUNT);
          $inputsCount = $count == NULL ? 1 : $count->getValue();
          $values 		 = $field->getValue();

          $rows[$i][] = !empty($values['checkbox']) ? 1 : 0;

          for ($j = 1; $j < $inputsCount+1; $j++)
          {
            $rows[$i][] = !empty($values['field' . $j]) ? $values['field' . $j] : NULL;
          }

          break;
        case 7:
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

          $rows[$i][] = $rowValue;

          break;
        case 8:
          $rows[$i][] = !empty($values['checkbox']) ? 1 : 0;
          $rows[$i][] = !empty($values['textarea']) ? $values['textarea'] : '';
          break;
        default:
        case 9:
          $rows[$i][] = !empty($values['checkbox']) ? 1 : 0;
          $rows[$i][] = !empty($values['textarea']) ? $values['textarea'] : '';
          $rows[$i][] = !empty($values['textarea_sec']) ? $values['textarea_sec'] : '';
          break;
        default:
          $rows[$i][] = $values;
          break;
      }
    }

    $responce->rows = $rows;
    $i++;
  }

  // echo debug::vars($responce->rows);
  //
  // echo View::factory('profiler/stats')->render();
  //
  // die();

  $excel = new Excel();
  if($excel->arrayToCsv($responce->rows))
  {
    $excel->download();
  }
