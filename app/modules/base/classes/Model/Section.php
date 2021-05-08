<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Section extends ORM implements JsonSerializable
{
	protected $_table_name = 'sections';

	/**
	 * The sections' types
	 *
	 * @var array
	 */
	static $types =  array( 0 => 'Section', 1 => 'Tag');

	/**
	 * Get the available section types
	 *
	 * @return array
	 */
	public function getTypes()
	{
		return self::$types;
	}

	/**
	 * Return the serialized object
	 *
	 * @return mixed|stdClass
	 */
	public function jsonSerialize()
	{
		$ret = [];

		$ret['name'] = $this->name;
		$ret['language'] = $this->language;
		$ret['section_id'] = $this->section_id;
		$ret['parent_id'] = $this->parent_id;

		return $ret;
	}
}
