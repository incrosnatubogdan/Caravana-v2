<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Picture extends ORM implements JsonSerializable
{

	public function serializeResponse($target = Api_Serializer_Core::DEFAULT_SERIALIZER)
	{
		return URL::link($this->path);
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

}
