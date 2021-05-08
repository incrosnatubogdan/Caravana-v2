<?php

/**
 * Class Field_Property
 */
class Field_Property
{
	/**
	 * List of serializations
	 */
	const DEFAULT_SERIALIZATION = 'default';

	/**
	 * Field property value
	 *
	 * @var mixed
	 */
	protected $value;

	/**
	 * Flag to decide if admin should be able to see it in admin panel or not
	 *
	 * @var bool
	 */
	protected $showToAdmin = FALSE;

	/**
	 * The property name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * Allow admin/user to change this value
	 *
	 * @var bool
	 */
	protected $editable = TRUE;

	/**
	 * Make a field property
	 *
	 * @param $name
	 * @param $values
	 *
	 * @return Field_Property
	 */
	public static function make($name, $values)
	{
		$property = new self;

		$property->value       = $values['value'];
		$property->name        = $name;
		$property->showToAdmin = !empty($values['showToAdmin']);
		$property->editable    = array_key_exists('editable', $values) && $values['editable'] === FALSE ? FALSE : TRUE;

		return $property;
	}

	/**
	 * Get the property value
	 *
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * Show to admin
	 *
	 * @return bool
	 */
	public function showToAdmin()
	{
		return $this->showToAdmin;
	}

	/**
	 * Get property name
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set value
	 *
	 * @param $value
	 *
	 * @return $this
	 */
	public function setValue($value)
	{
		if (!$this->isEditable())
		{
			return $this;
		}

		$this->value = $value;

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
	public function targetSerialize(/** @noinspection PhpUnusedParameterInspection */
		$target = self::DEFAULT_SERIALIZATION, $params = NULL)
	{
		return $this->value;
	}

	/**
	 * Return TRUE if property can be edited
	 *
	 * @return bool
	 */
	public function isEditable()
	{
		return $this->editable;
	}
}
