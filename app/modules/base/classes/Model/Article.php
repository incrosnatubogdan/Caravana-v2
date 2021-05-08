<?php defined('SYSPATH') OR die('No direct access allowed.');


class Model_Article extends ORM implements JsonSerializable {
	/**@property $language string */
	/**@property $id int */
	/**@property $teaser string */
	/**@property $view int */
	/**@property $text string */

	public function serializeResponse($target = Api_Serializer_Core::DEFAULT_SERIALIZER)
	{
		switch($target)
		{
			case Api_Serializer_Core::ARTICLES_LIST:
			case Api_Serializer_Core::DEFAULT_SERIALIZER:
				return $this->serializeForList($target);
			case Api_Serializer_Core::ARTICLES_DETAILS:
				return $this->serializeDetails();
		}

		throw new Api_Exception_Core('The serializer is not defined', Api_Exception_Codes::WRONG_SERIALIZER);
	}

	/**
	 * (PHP 5 &gt;= 5.4.0)<br/>
	 * Specify data which should be serialized to JSON
	 * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 * which is a value of any type other than a resource.
	 */
	public function jsonSerialize()
	{
		return $this->serializeResponse();
	}

	/**
	 * Serialize the article for search
	 *
	 * @return stdClass
	 */
	private function serializeForList($target)
	{
		$ret = new stdClass;
		$ret->id    = $this->id;
		$ret->title = $this->title;
		$ret->text  = $this->teaser;
		$ret->views = $this->views;

		if(!empty($this->picture_id)) // Get main picture
		{
			$ret->picture = ORM::factory('Picture', $this->picture_id)->serializeResponse($target);
		}

		return $ret;
	}

	/**
	 * Serialize the article for search
	 *
	 * @return stdClass
	 */
	private function serializeDetails()
	{
		$ret = new stdClass;
		$ret->id    = $this->id;
		$ret->title = $this->title;
		$ret->text  = $this->text;
		$ret->views = $this->views;
		
		// Get pictures list ordered
		$ret->pictures = ORM::factory('Picture')
							->where('item_type','=', 0)
							->where('item_id', '=', (int) $this->id)
							->order_by('order', 'asc')
							->find_all()
							->as_array()
		;

		return $ret;
	}
}
