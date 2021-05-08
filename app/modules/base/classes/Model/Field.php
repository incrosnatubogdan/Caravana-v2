<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Class Model_Field
 * @property mixed id
 * @property mixed settings
 */
class Model_Field extends ORM
{
	/**
	 * Get the first page of fields
	 *
	 * @return Model_Field[]
	 */
	public function getFirstPage()
	{
		return $this
			->where('visible', '=', 1)
			->where('page', '=', 1)
			->order_by('order', 'desc')
			->find_all();
	}

	/**
	 * The the fields from other pages
	 *
	 * @return Model_Field[]
	 * @throws Kohana_Exception
	 */
	public function getOtherPages()
	{
		return $this
			->where('visible', '=', 1)
			->where('page', '>', 1)
			->order_by('order', 'desc')
			->find_all();
	}

	/**
	 * Decode the value
	 * NOTE: this uses json_decode
	 *
	 * @return mixed
	 */
	public function decode()
	{
		return $this->_unserialize_value($this->settings);
	}

	/**
	 * Set the settings
	 *
	 * @param $value
	 *
	 * @return $this
	 */
	public function setSettings($value)
	{
		$this->settings = $this->_serialize_value($value);

		return $this;
	}

}
