<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Controller_Administration_Fields
 */
class Controller_Administration_Fields extends Controller_Admin
{

	/**
	 * The available field types
	 *
	 * @var array
	 */
	protected $fieldTypes = [];

	/**
	 * The model name
	 *
	 * @var string
	 */
	protected $modelName = 'Model_Field';

	/**
	 * Before action
	 */
	public function before()
	{
		$this->fieldTypes = Config::vars('fields.types', []);
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
			->edit('settings', 'hidden', TRUE)
			->edit('order', 'width', 5)
			->edit('page', 'width', 5)
			->edit('filter', 'width', 5)
			->edit('visible', 'width', 5)
			->edit('type', 'width', 10)
			->edit('filter', 'width', 10)
			->move('name', 1)
			->move('filter', 2)
			->edit('visible', 'stype', 'select')
			->edit('visible', 'editoptions', $this->activeStatuses)
			->edit('visible', 'edittype', 'select')

			->edit('filter', 'stype', 'select')
			->edit('filter', 'editoptions', $this->activeStatuses)
			->edit('filter', 'edittype', 'select')

			->edit('type', 'stype', 'select')
			->edit('type', 'editoptions', $this->fieldTypes)
			->edit('type', 'edittype', 'select')

			->edit('actions', 'width', 5)
			->edit('actions', 'name', 'actions')
			->edit('actions', 'title', 'Actions')
			->edit('actions', 'search', false)
			->edit('actions', 'editable', false)
			->edit('actions', 'align', 'center')
			->edit('actions', 'sortable', false)
			->edit('actions', 'index', 'actions')
			->edit('actions', 'buttons', array (
				             array (
					             'key'    => 'id',
					             'url'    => 'administration/fields/settings/',
					             'icon'   => 'wrench',
					             'ajax'   => TRUE,
					             'reload' => TRUE,
				             ),
			             )
			);;
	}

	/**
	 * Settings action
	 * NOTE: the settings are administrated using this action
	 */
	public function action_settings()
	{
		$this->autoRender = FALSE;
		$id               = $this->request->param('id', NULL);

		$model = Model_Field::make($id);
		$field = Field::makeFromFieldModel($model);

		if ($post = $this->request->post())
		{
			$field->populateValues($post['properties']);
			$model->setSettings($field->getProperties()->targetSerialize())
			      ->save();
		}

		echo View::factory($field->getAdminView())
		         ->set('field', $field)
		         ->render();
	}
}
