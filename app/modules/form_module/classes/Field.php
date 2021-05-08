<?php

/**
 * Class Form
 */
class Field
{
	/**
	 * Serializations
	 */
	const DEFAULT_SERIALIZATION = 'defaultSerialization';

	/**
	 * Field type
	 * NOTE: this is very important
	 *
	 * @var int
	 */
	protected $type;

	/**
	 * Field properties
	 *
	 * @var Field_Properties
	 */
	protected $properties;

  /**
   * Flag to show if field is used as filter
   * @var boolean
   */
	protected $filter = false;

	/**
	 * The field id from the DB
	 *
	 * @var int
	 */
	protected $id = 0;

	/**
	 * The field order
	 *
	 * @var int
	 */
	protected $order = 0;

	/**
	 * List of errors
	 *
	 * @var array
	 */
	protected $errors = [];

	/**
	 * The field page
	 *
	 * @var int
	 */
	protected $page = 1;

	/**
	 * Make a field from a certain type given as parameter
	 *
	 * @param $type
	 *
	 * @return Field
	 */
	public static function makeFromType($type = 0)
	{
		$field       = new self;
		$field->type = $type;
		$field->loadConfigListOfProperties();

		return $field;
	}

	/**
	 * Returns TRUE if the field si title or subtitle
	 *
	 * @return boolean
	 */
	public function isHeader()
	{
			return in_array($this->type, array(1, 2, 10));
	}

	public function isTextArea()
	{
			return in_array($this->type, array(4));
	}

	/**
	 * Load config list of properties
	 * NOTE: do not use this when getting fields from DB, the properties can change during the time ;)
	 *
	 * @return $this
	 */
	protected function loadConfigListOfProperties()
	{
		$this->properties = Field_Properties::makeFromType($this->type);

		return $this;
	}

	/**
	 * Make field from field model
	 *
	 * @param Model_Field|Model_Patient_Information $model
	 *
	 * @return Field
	 */
	public static function makeFromFieldModel($model)
	{
		$field       = new self;
		$field->type = $model->type;
		$field->order = $model->order;
		$field->page = $model->page;
		$field->filter = $model->filter;
		$field->loadConfigListOfProperties();
		$field->id = $model->id;

		if (!empty($model->settings)) // The field has settings defined
		{
			$field->populateValues($model->decode());
		}

		return $field;
	}

	/**
	 * Get admin view property
	 *
	 * @return mixed|null
	 */
	public function getAdminView()
	{
		$property = $this->properties->get(Field_Properties::PROPERTY_ADMIN_VIEW);

		return $property == NULL ? 'admin/fields/label' : $property->getValue();
	}

	/**
	 * Get frontend view for this field
	 *
	 * @return mixed|null
	 */
	public function getFrontendView()
	{
		$property = $this->properties->get(Field_Properties::PROPERTY_FRONTEND_VIEW);

		return $property == NULL ? 'form/blank' : $property->getValue();
	}

	/**
	 * Get the field label
	 * NOTE: radio lists and checkboxes with inputs have other methods
	 *
	 * @return mixed|null
	 */
	public function getTheLabel()
	{
		$property = $this->properties->get(Field_Properties::PROPERTY_LABEL);

		return $property == NULL ? 'form/blank' : $property->getValue();
	}

	/**
	 * Get the field name
	 *
	 * @return mixed|null
	 */
	public function getTheName()
	{
		$property = $this->properties->get(Field_Properties::PROPERTY_NAME);

		return $property == NULL ? NULL : $property->getValue();
	}

	/**
	 * Get the validation rules
	 *
	 * @return mixed|null
	 */
	public function getValidationRules()
	{
		$property = $this->properties->get(Field_Properties::PROPERTY_VALIDATIONS);

		return $property == NULL ? '' : $property->getValue();
	}

	/**
	 * Get the value for the hasValue field
	 *
	 * @return int
	 */
	public function getValueFlag()
	{
		$value = 0;

		switch ($this->type)
		{
			case 8:
				$values = $this->getValue();
				if(!empty($values['checkbox']))
				{
					$value = !empty($values['textarea']) ? 2 : 1;
				}

				break;
			case 9:
					$values = $this->getValue();
					if(!empty($values['checkbox']))
					{
						$value = !empty($values['textarea_sec']) ? 2 : 1;
					}

					break;
			default:
					$value = $this->getValue() ? 1 : 0;
				break;
		}

		return $value;
	}

	/**
	 * Get field value
	 *
	 * @return mixed|null
	 */
	public function getValue()
	{
		$property = $this->properties->get(Field_Properties::PROPERTY_FIELD_VALUE);

		return $property == NULL ? NULL : $property->getValue();
	}

	/**
	 * Get admin visible properties
	 *
	 * @return Field_Property[]
	 */
	public function getAdminProperties()
	{
		return $this->properties->getAdminProperties();
	}

	/**
	 * Populate values
	 *
	 * @param $values
	 *
	 * @return $this
	 */
	public function populateValues($values)
	{
		$this->properties->populateValues($values);

		return $this;
	}

	/**
	 * Get field DB id
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Serialize the properties
	 *
	 * @param string $target
	 * @param null   $params
	 *
	 * @return stdClass
	 */
	public function targetSerialize($target = self::DEFAULT_SERIALIZATION, $params = NULL)
	{
		$ret             = new stdClass();
		$ret->properties = $this->properties->targetSerialize($target, $params);

		return $ret;
	}

	/**
	 * Get the field properties
	 *
	 * @return Field_Properties
	 */
	public function getProperties()
	{
		return $this->properties;
	}

	/**
	 * Validate the field value
	 *
	 * @return bool
	 */
	public function validate()
	{
		$rules = array_filter(explode(',', $this->getValidationRules()));

		if ($rules)
		{
			$valid = Validation::factory(array ('field' => $this->getValue()));

			foreach ($rules as $rule)
			{
				$valid->rule('field', trim($rule));
			}

			if (!$valid->check())
			{
				$this->addError($rule);
				return FALSE;
			}
		}


		return TRUE;
	}

	/**
	 * Return the order
	 *
	 * @return int
	 */
	public function getOrder()
	{
		return $this->order;
	}

	/**
	 * Return the page
	 *
	 * @return int
	 */
	public function getPage()
	{
		return $this->page;
	}

	/**
	 * Return the field type
	 *
	 * @return int
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Return TRUE if this field is set as filter
	 *
	 * @return boolean
	 */
	public function isFilter()
	{
		return $this->filter;
	}

	/**
	 * Add an error
	 *
	 * @param $rule
	 *
	 * @return $this
	 */
	public function addError($rule)
	{
		$this->errors[] = $rule;

		return $this;
	}

	/**
	 * Return TRUE if there are errors
	 *
	 * @return bool
	 */
	public function hasErrors()
	{
		return count($this->errors) > 0;
	}

}
