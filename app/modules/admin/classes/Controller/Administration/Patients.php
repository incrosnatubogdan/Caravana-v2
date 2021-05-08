<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Controller_Administration_Patients
 */
class Controller_Administration_Patients extends Controller_Admin
{

	/**
	 * The model name
	 *
	 * @var string
	 */
	protected $modelName = 'Model_Patient';

  public function before()
  {
    $this->export = !empty($this->request->query('csv'));

    if ( $this->export )
    {
        $this->jsonView = 'admin/patients/json';
    }

    parent::before();
  }

	/**
	 * The action that displays the grid
	 */
	public function action_index()
	{
		$this->toggleNavigationGrid(self::NAVIGATION_GRID_DEL_OPTION, FALSE);
		$this->template->set('content', $this->getGrid());
	}

	/**
	 * Change properties for grid columns
	 */
	public function changeProperties()
	{
		$this->properties
			->edit('event_id', 'title', 'Caravana')
			->edit('event_id', 'searchoptions', 'JS_FUNCTION_AUTOCOMPLETE')
			->edit('event_id', 'searchoptions', 'JS_FUNCTION_AUTOCOMPLETE')

		;
	}
}
