<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Controller_Administration_Events
 */
class Controller_Administration_Events extends Controller_Admin
{
	/**
	 * The model name
	 *
	 * @var string
	 */
	protected $modelName = 'Model_Event';


	/**
	 * The action that displays the grid
	 */
	public function action_index()
	{
		$this->toggleNavigationGrid(self::NAVIGATION_GRID_DEL_OPTION, FALSE);
		$this->template->set('content', $this->getGrid());
	}

	public function changeProperties()
	{

		$this->properties

			->edit('active', 'stype', 'select')
			->edit('active', 'editoptions', $this->activeStatuses)
			->edit('active', 'edittype', 'select')

			->edit('date', 'search_type', 'date')
			->edit('date', 'searchoptions', 'JS_FUNCTION_DATEPICKER')
			->edit('date', 'editoptions', 'JS_FUNCTION_DATEPICKER_EDIT')
		;
	}
}
