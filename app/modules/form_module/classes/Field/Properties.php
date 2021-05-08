<?php

/**
 * Class Field_Properties
 */
class Field_Properties
{
	/**\
	 * Properties list
	 */
	const PROPERTY_ADMIN_VIEW = 'adminView';
	const PROPERTY_INPUT_COUNT = 'count';
	const PROPERTY_FRONTEND_VIEW = 'view';
	const PROPERTY_LABEL = 'label';
	const PROPERTY_LABEL1 = 'label1';
	const PROPERTY_LABEL2 = 'label2';
	const PROPERTY_NAME = 'name';

	/**
	 * Target serializations
	 */
	const DEFAULT_SERIALIZATION = 'defaultSerialization';
	const PROPERTY_VALIDATIONS = 'validations';
	const PROPERTY_FIELD_VALUE = 'value';


	/**
	 * Field property
	 *
	 * @var Field_Property[]
	 */
	protected $list = [];

	/**
	 * Properties type
	 *
	 * @var int
	 */
	protected $type;

	/**
	 * Make properties for a given field type
	 *
	 * @param int $type
	 *
	 * @return Field_Properties
	 */
	public static function makeFromType($type = 0)
	{
		$properties       = new self;
		$properties->type = $type;
		$properties->setProperties(Config::vars('fields.properties.' . $type, []));

		return $properties;
	}

	/**
	 * Set the field properties
	 *
	 * @param $vars
	 *
	 * @return $this
	 */
	public function setProperties($vars)
	{
		$this->list = [];

		foreach ($vars as $key => $var)
		{
			$this->list[$key] = Field_Property::make($key, $var);
		}

		return $this;
	}

	/**
	 * Get the property
	 *
	 * @param $property
	 *
	 * @return Field_Property|null
	 */
	public function get($property)
	{
		return array_key_exists($property, $this->list) ? $this->list[$property] : NULL;
	}

	/**
	 * List of admin visible properties
	 *
	 * @return Field_Property[]
	 */
	public function getAdminProperties()
	{
		$list = [];

		foreach ($this->list as $property)
		{
			if ($property->showToAdmin())
			{
				$list[] = $property;
			}
		}

		return $list;
	}

	/**
	 * Populate properties value
	 *
	 * @param array $values
	 *
	 * @return $this
	 */
	public function populateValues($values = [])
	{
		foreach ($values as $key => $value)
		{
			if (array_key_exists($key, $this->list))
			{
				$this->list[$key]->setValue($value);
			}
		}

		return $this;
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
		$ret = [];
		foreach ($this->list as $property)
		{
			$ret[$property->getName()] = $property->targetSerialize($target, $params);
		}

		return $ret;
	}
}
