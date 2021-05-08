<?php

/**
 * Class CustomForm
 */
class CustomForm
{

	/**
	 * The patient model
	 *
	 * @var Model_Patient
	 */
	protected $patient;
	/**
	 * The list of fields
	 *
	 * @var Field[]
	 */
	protected $fields = [];

	/**
	 * The list of errors
	 *
	 * @var
	 */
	protected $errors = [];

	/**
	 * Make the form's first page
	 * NOTE: this is used when adding new items, not when editing items
	 *
	 * @return CustomForm
	 */
	public static function makeFirstPage()
	{
		$form = new self;
		$form->addFields(Model_Field::make()->getFirstPage());

		return $form;
	}

	public static function makeForPrint($id = 0)
	{
		$form = new self;
		$form->patient = Model_Patient::make($id);

		$form->addFields(Model_Patient_Information::make()->getPatientFields($id, 1)); // Contact info
		$form->addFields(Model_Patient_Information::make()->getPatientFilterFields($id)); // Filter information
		$form->addFields(Model_Patient_Information::make()->getPatientFields($id, 7)); // Recommandations

		return $form;
	}

	/**
	 * Make a form from patient fields
	 *
	 * @param     $id
	 * @param int $page
	 *
	 * @return CustomForm
	 */
	public static function makeFromPatient($id, $page = NULL)
	{
		$form          = new self;
		$form->patient = Model_Patient::make($id);

		$form->addFields(Model_Patient_Information::make()->getPatientFields($id, $page));

		return $form;
	}

	public static function makeEntireForm($patient)
	{
		$form          = new self;
		$form->patient = $patient;

		$form->addFields(Model_Patient_Information::make()->getPatientFields($patient->id));

		return $form;
	}

	/**
	 * Make a form patient filter fields
	 *
	 * @param     $id
	 * @param int $page
	 *
	 * @return CustomForm
	 */
	public static function makeFromPatientFilters($id)
	{
		$form          = new self;
		$form->patient = Model_Patient::make($id);

		$form->addFields(Model_Patient_Information::make()->getPatientFilterFields($id));

		return $form;
	}

	/**
	 * Make a custom form
	 *
	 * @return CustomForm
	 */
	public static function make()
	{
		$form          = new self;
		$form->patient = Model_Patient::make();

		return $form;
	}

	/**
	 * Init the fields
	 *
	 * @param Model_Field[]|Model_Patient_Information[] $fields
	 *
	 * @return $this
	 */
	public function addFields($fields)
	{
		foreach ($fields as $field)
		{
			$f = Field::makeFromFieldModel($field);

			if ($f->getTheName())
			{
				$this->fields[$f->getTheName()] = $f;
			}
			else
			{
				$this->fields[] = $f;
			}
		}

		return $this;
	}


	/**
	 * Populate form values
	 *
	 * @param array $list
	 * @param bool  $validate
	 *
	 * @return $this
	 */
	public function populateValues($list = [], $validate = FALSE)
	{
		foreach ($list as $key => $values)
		{
			if (array_key_exists($key, $this->fields))
			{
				$field = $this->fields[$key];
				$field->populateValues($values);

				if ($validate)
				{
					if (!$field->validate())
					{
						$this->addError($key);
					}
				}
			}
		}

		return $this;
	}

	/**
	 * Load other fields
	 *
	 * @return $this
	 */
	public function loadOtherFields()
	{
		$this->addFields(Model_Field::make()->getOtherPages());

		return $this;
	}

	/**
	 * Insert a patient
	 *
	 * @param int $eventId
	 *
	 * @return $this
	 */
	public function insert($eventId = 0)
	{
		$this->patient           = Model_Patient::make();
		$this->patient->date_in  = time();
		$this->patient->event_id = (int) $eventId;
		$this->patient->save();

		foreach ($this->fields as $field)
		{
			$information             = Model_Patient_Information::make();
			$information->patient_id = $this->patient->id;
			$information->fieldId    = $field->getId();
			$information->hasValue   = $field->getValueFlag();
			$information->filter     = $field->isFilter() ? 1 : 0;
			$information->order      = $field->getOrder();
			$information->page       = $field->getPage();
			$information->type       = $field->getType();
			$information->setSettings($field->getProperties()->targetSerialize());
			$information->save();

			$this->patient->setCustomFields($field);
		}

		$this->patient->save();

		return $this;
	}

	/**
	 * Save the fields
	 *
	 * @return $this
	 */
	public function save()
	{
		foreach ($this->fields as $field)
		{
			if($field->getValue() === NULL)
			{
				continue;
			}

			$information = Model_Patient_Information::make($field->getId());
			$information->hasValue   = $field->getValueFlag();
			$information->filter     = $field->isFilter() ? 1 : 0;
			$information->setSettings($field->getProperties()->targetSerialize());
			$information->save();

			$this->patient->setCustomFields($field);
		}

		$this->patient->save();

		return $this;
	}

	/**
	 * Get patient id
	 *
	 * @return mixed
	 */
	public function getPatientId()
	{
		return $this->patient->id;
	}

	/**
	 * Get patient event id
	 *
	 * @return int
	 */
	public function getPatientEventId()
	{
		return $this->patient->event_id;
	}

	/**
	 * The the form fields
	 *
	 * @return Field[]
	 */
	public function getFields()
	{
		return $this->fields;
	}

	/**
	 * Add an error
	 *
	 * @param $key
	 *
	 * @return $this
	 */
	private function addError($key)
	{
		$this->errors[$key] = $key;

		return $this;
	}

	/**
	 * Return TRUE if the form has errors
	 *
	 * @return boolean
	 */
	public function hasErrors()
	{
		return count($this->errors) > 0;
	}

	/**
	 * Target serialize the form
	 *
	 * @param string $target
	 * @param null   $params
	 *
	 * @return stdClass
	 */
	public function targetSerialize($target = Field::DEFAULT_SERIALIZATION, $params = NULL)
	{
		$ret = new stdClass;

		$ret->fields = [];
		foreach ($this->fields as $key => $field)
		{
			$ret->fields[$key] = $field->targetSerialize($target, $params);
		}

		return $ret;
	}

	/**
	 * Get patient model
	 *
	 * @return Model_Patient
	 */
	public function getPatient()
	{
		return $this->patient;
	}

	/**
	 * Get form edit link
	 *
	 * @param int $page
	 * @param int $fieldId
	 *
	 * @return string
	 */
	public function getEditLink($page = NULL, $fieldId = NULL)
	{
		$link = url::link('/profile/editPatient/'.$this->patient->id . '/' . $page);

		if ($fieldId)
		{
			$link .= '#field' . $fieldId;
		}

		return $link;
	}
}
