<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Class Model_Patient_Information
 * @property mixed  id
 * @property int    patient_id
 * @property int    page
 * @property int    order
 * @property int    type
 * @property string settings
 */
class Model_Patient_Information extends ORM
{

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

	/**
	 * Get patient fields
	 *
	 * @param $patientId
	 * @param $page
	 *
	 * @return Model_Patient_Information[]
	 */
	public function getPatientFields($patientId, $page = NULL)
	{
			$this->where('patient_id', '=', (int) $patientId);

			if ( $page != NULL )
			{
				$this->where('page', '=', (int) $page);
			}

			return $this->order_by('page', 'asc')
			->order_by('order', 'desc')
			->find_all();
	}

	/**
	 * Get the patient filter fields
	 *
	 * @param $patientId
	 *
	 * @return Model_Patient_Information[]
	 */
	public function getPatientFilterFields($patientId)
	{
		return $this
			->where('patient_id', '=', $patientId)
			->where('filter', '=', 1)
			->order_by('order', 'desc')
			->find_all();
	}
}
