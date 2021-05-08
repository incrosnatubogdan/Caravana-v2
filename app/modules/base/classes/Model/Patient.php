<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Class Model_Patient
 * @property mixed id
 * @property int   date_in
 * @property int   birthDate
 * @property int   event_id
 */
class Model_Patient extends ORM
{

	/**
	 * Set custom fields
	 *
	 * @param Field $field
	 */
	public function setCustomFields(Field $field)
	{
		switch ($field->getTheName())
		{
			case 'birthDate':
				$this->birthDate = strtotime($field->getValue());
				break;
			case 'seen':
					$this->seen = ($field->getValue()) ? 1 : 0;
					break;
			case 'address';
			case 'settlement';
			case 'county';
			case 'lastName':
			case 'phoneNumber':
			case 'firstName':
				$this->{$field->getTheName()} = $field->getValue();
				break;
			default:

				break;
		}
	}

	/**
	 * Set some conditions based on a list
	 *
	 * @param $params
	 *
	 * @return $this
	 */
	public function setWhere($params)
	{
		$join = FALSE;

		foreach($params as $key=>$value)
		{
			if($value == '')
			{
					continue;
			}

			switch($key)
			{
				case 'birthDate':
						$this->where($key, '=', strtotime($value));
						break;
				case 'phoneNumber':
				case 'lastName':
				case 'firstName':
					$this->where($key, 'like', DB::expr("'$value%'"));
					break;
				case 'seen':
					if ($value!=-1)
					{
						$this->where($key, '=', (int) $value);
					}
				break;
				case 'field':
					if ($value)
					{
						$this->where('fieldId','=', (int) $value);
						$join = TRUE;
					}
					break;
				case 'field_value':
					if ($value!='')
					{
						$this->where('hasValue', '=', (int) $value);
						$join = TRUE;
					}
					break;
			}
		}

		if ($join == TRUE)
		{
			$this->join('patient_informations', 'LEFT');
			$this->on('patient.id', '=', 'patient_id');
		}

		return $this;
	}

	/**
	 * Get the form pages count for a patient
	 *
	 * @return int
	 * @throws Kohana_Exception
	 */
	public function getPagesCount()
	{
		/** @var Model_Patient_Information $information */
		$information = Model_Patient_Information::make()
		                                        ->where('patient_id', '=', $this->id)
		                                        ->order_by('page', 'desc')
		                                        ->find();
		return $information->page;
	}
}
