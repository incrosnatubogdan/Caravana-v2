<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Class Library_Properties
 */
class Library_Properties
{

	/**
	 * The list of properties
	 *
	 * @var array
	 */
	protected $properties;

	/**
	 * The model name
	 *
	 * @var string
	 */
	var $modelName = '';

	/**
	 * Column indicator
	 * NOTE: this is used especially when grid shows info from multiple tables
	 *
	 * @var string
	 */
	var $colIndicator = '-rowIndicator-';

	/**
	 * Library_Properties constructor.
	 *
	 * @param        $columns
	 * @param string $modelName
	 */
	public function __construct($columns, $modelName = '')
	{
		$this->modelName = strtolower($modelName);
		if (!empty($columns))
		{
			foreach ($columns as $key => $col)
			{
				$this->properties[$this->modelName . $key] = array (
					'title'       => ucfirst($key),
					'name'        => $this->modelName . $this->colIndicator . $key,
					'index'       => $this->modelName . $this->colIndicator . $key,
					'width'       => ($key == 'id') ? 5 : 20,
					'hidden'      => FALSE,
					'export'      => TRUE,
					'sortable'    => TRUE,
					'editable'    => ($key == 'id') ? FALSE : TRUE,
					'search'      => TRUE,
					'search_type' => "where",
					'align'       => 'center',
					'stype'       => 'text',
					//'searchoptions' => 'NO_FUNCTION',
				);
			}
		}
	}

	/**
	 * Edit a property
	 *
	 * @param      $key
	 * @param bool $index
	 * @param bool $value
	 * @param bool $modelName
	 *
	 * @return $this
	 */
	public function edit($key, $index = FALSE, $value = FALSE, $modelName = FALSE)
	{
		$keyName = $this->getKeyName($key, $modelName);

		if ($index !== FALSE)
		{
			$this->properties[$keyName][$index] = $value;
		}
		else
		{
			$this->properties[$keyName] = $value;
		}

		return $this;
	}

	/**
	 * Get key name
	 *
	 * @param      $key
	 * @param bool $modelName
	 *
	 * @return string
	 */
	public function getKeyName($key, $modelName = FALSE)
	{
		return $this->getModelName($modelName) . $key;
	}

	/**
	 * Get model name
	 *
	 * @param bool $modelName
	 *
	 * @return string
	 */
	protected function getModelName($modelName = FALSE)
	{
		return !$modelName ? $this->modelName : strtolower($modelName);
	}

	/**
	 * Move a column to the suggested position
	 *
	 * @param      $key
	 * @param      $position
	 * @param bool $modelName
	 *
	 * @return $this
	 */
	public function move($key, $position, $modelName = FALSE)
	{
		$keyName    = $this->getKeyName($key, $modelName);
		$properties = $this->properties[$keyName];
		unset($this->properties[$keyName]);

		$removedElements = array_splice($this->properties, $position);

		$this->properties[$keyName] = $properties;
		$this->properties           = array_merge($this->properties, $removedElements);

		return $this;
	}

	/**
	 * Get column indicator
	 *
	 * @return string
	 */
	public function getIndicator()
	{
		return $this->colIndicator;
	}

	/**
	 * Get the grid properties
	 *
	 * @return array
	 */
	public function get()
	{
		return $this->properties;
	}

}

