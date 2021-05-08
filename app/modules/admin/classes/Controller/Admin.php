<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Controller_Admin
 */
class Controller_Admin extends Controller_Base
{

	/**
	 * Edit/delete/add operations for the grid
	 */
	const OPERATION_ADD = 'add';
	const OPERATION_EDIT = 'edit';
	const OPERATION_DELETE = 'del';

	/**
	 * The model name from which the model is init
	 *
	 * @var string
	 */
	protected $modelName = '';

	/**
	 * The model for the grid
	 *
	 * @var ORM
	 */
	protected $model;

	/**
	 * The list of properties for the grid
	 *
	 * @var Library_Properties
	 */
	protected $properties;

	/**
	 * The grid url
	 *
	 * @var string
	 */
	protected $grid_url = '';

	/**
	 * The sorting field
	 *
	 * @var string
	 */
	protected $sortField = 'id';

	/**
	 * The sorting mode
	 *
	 * @var string
	 */
	protected $sortMode = 'desc';
	protected $colIndicator = FALSE;

	/**
	 * The view that renders the response in json format
	 *
	 * @var string
	 */
	protected $jsonView = 'admin/components/json';

	/**
	 * The default per page limit
	 *
	 * @var int
	 */
	protected $limit = 30;

	/**
	 * The page number
	 * NOTE: default it is 1
	 *
	 * @var int
	 */
	protected $page = 1;

	/**
	 * The login flag
	 *
	 * @var bool
	 */
	protected $login = TRUE;

	/**
	 * Export flag
	 *
	 * @var bool
	 */
	protected $export = FALSE;

	/**
	 * The css for the template
	 *
	 * @var array
	 */
	protected $templateCss = [
		'../admin/css/jquery-ui-1.8.2.custom.css',
		'../admin/css/ui.jqgrid.css',
		'../admin/js/redactorjs/css/redactor.css',
		'../admin/css/admin.css',
	];

	protected $activeStatuses = [
		0 => 'Nu',
		1 => 'Da'
	];

	/**
	 * The template js
	 *
	 * @var array
	 */
	protected $templateJs = [
		'../admin/js/jquery-1.7.2.min.js',
		'../admin/js/jquery-ui-1.10.1.custom.min.js',
		'../admin/js/jqGrid/js/i18n/grid.locale-en.js',
		'../admin/js/jqGrid/js/jquery.jqGrid.src.js',
		'../admin/js/jqGrid/src/grid.filter.js',
		'../admin/js/redactorjs/redactorEditor.js',
		'../admin/js/admin.js',
		'../admin/js/jquery.ui/jquery-ui-timepicker-addon.js',
		'../admin/js/swfuploader/swfupload.js',
		'../admin/js/swfuploader/swfupload.queue.js',
		'../admin/js/swfuploader/fileprogress.js',
		'../admin/js/swfuploader/handlers.js',


	];

	/**
	 * The used template
	 *
	 * @var string|View
	 */
	protected $template = 'admin/template';

	/**
	 * The grid grid navigation options
	 *
	 * @var array
	 */
	protected $gridNavigation = array (
		'edit'    => TRUE,
		'add'     => TRUE,
		'del'     => TRUE,
		'search'  => FALSE,
		'refresh' => FALSE,
	);

	/**
	 * Grid navigation options
	 */
	const NAVIGATION_GRID_EDIT_OPTION = 'edit';
	const NAVIGATION_GRID_ADD_OPTION = 'add';
	const NAVIGATION_GRID_DEL_OPTION = 'del';
	const NAVIGATION_GRID_SEARCH_OPTION = 'search';
	const NAVIGATION_GRID_REFRESH_OPTION = 'refresh';

	/**
	 * The grid object
	 *
	 * @var View
	 */
	protected $grid;

	/**
	 * The json view
	 *
	 * @var View
	 */
	protected $json_view;

	/**
	 * Before executing and action
	 */
	public function before()
	{

		$this->user = Auth::instance()->get_user();


		if ($this->login && (empty($this->user->id) || !$this->user->isAdmin()))
		{
			$this->redirect('administration/authentification', 302);
		}


		$this->grid_url = URL::link(strtolower($this->request->directory()) . '/' . strtolower($this->request->controller()) . '/');

		$this->loadModel();
		$this->changeProperties();
		$this->template = View::factory($this->template);
		$this->setGlobals();
	}

	/**
	 * Toggle navigation grid
	 *
	 * @param      $key
	 * @param bool $flag
	 *
	 * @return $this
	 */
	protected function toggleNavigationGrid($key, $flag = FALSE)
	{
		$this->gridNavigation[$key] = $flag;

		return $this;
	}

	/**
	 * Get the grid
	 *
	 * @param string $grid
	 *
	 * @return Kohana_View|View
	 */
	public function getGrid($grid = 'admin/components/grid')
	{
		$this->grid = View::factory($grid);
		$this->grid->set('gridNavigation', $this->gridNavigation);
		$this->grid->set('buttons', View::factory('admin/components/buttons'));

		return $this->grid;
	}

	/**
	 * Edit item using the grid
	 */
	public function action_edit($post = NULL)
	{
		$this->autoRender = FALSE;

		$post = ($post) ? $post : $this->request->post();
		$oper = $post['oper'];

		$id = (empty($post['id'])) ? FALSE : $post['id'];

		$this->model = new $this->modelName($id);
		/** @noinspection PhpUndefinedFieldInspection */
		if (empty($this->model->id) && $oper != 'add') die('Please provide a good id');

		$modelName  = strtolower($this->modelName);
		$properties = $this->properties->get();

		if (in_array($oper, array ('edit', 'add')))
		{
			$values = array ();
			foreach ($post as $key => $value)
			{
				if (strpos($key, $this->colIndicator) !== FALSE)
				{
					$parts = explode($this->colIndicator, $key);

					if (!empty($parts[0]) && !empty($parts[1]))
					{
						$values[$parts[0]][$parts[1]] = $value;
					}
				}
			}

			if (!empty($values[$modelName]))
			{

				foreach ($values[$modelName] as $key => $value)
				{
					if (!empty($properties[$modelName . $key]['search_type']) && in_array($properties[$modelName . $key]['search_type'], array ('date', 'end_of_month')))
					{
						$this->model->$key = strtotime($value);
					}
					else
					{
						$this->model->$key = $value;
					}
				}

				$this->model->save();
			}
		}
		elseif ($oper == 'del')
		{
			$this->model->delete();
		}


		die('finished editing');
	}

	/**
	 * Load the model
	 *
	 * @return bool
	 */
	public function loadModel()
	{
		if (!$this->modelName) return FALSE;

		$this->model        = new $this->modelName;
		$this->properties   = new Library_Properties($this->model->list_columns(), $this->modelName);
		$this->colIndicator = $this->properties->getIndicator();

		return TRUE;
	}

	/**
	 * Change properties
	 * NOTE: this should be used to overwrite default properties
	 */
	public function changeProperties()
	{
		/*
			ex	$this->properties
				->edit('id','width',100)
				->edit('test','search',false)
				->edit('logins','stype','select')->edit('logins','editoptions',array(0 => 'No logins', 8 => '8 logins'))
				->edit('logins','edittype','select');
		*/
	}

	/**
	 * Get the items for the grid
	 *
	 * @throws Kohana_Exception
	 */
	public function action_get_items()
	{
		$this->autoRender = FALSE;

		if ($this->request->query('rows'))
		{
			$this->limit = $this->request->query('rows');
		}

		if ($this->request->query('page'))
		{
			$this->page = $this->request->query('page');
		}

		if ($this->request->query('sidx'))
		{
			$this->sortField = $this->request->query('sidx');
		}

		if ($this->request->query('sord'))
		{
			$this->sortMode = $this->request->query('sord');
		}

		if ($this->request->query('csv'))
		{
			if (!defined('ADMIN_EXPORT'))
			{
				define('ADMIN_EXPORT', TRUE);
			}
			$this->export = TRUE;
		}

		$properties = $this->properties->get();

		foreach ($properties as $column)
		{

			if (!empty($column['search_type']) && $this->request->query($column['name']) != 'FALSE' && $this->request->query($column['name']) !== NULL)
			{

				$field = $this->removeColIndicator($column['name']);

				$value = $this->request->query($column['name']);

				switch ($column['search_type'])
				{
					case 'like':
						$this->model->where($field, 'LIKE', $value);
						break;
					case 'date':
						$this->model->where($field, '>=', strtotime($value));
						$this->model->where($field, '<=', strtotime($value) + 60 * 60 * 24);
						break;
					case 'end_of_month':
						$this->model->where($field, '>=', strtotime($value));
						$this->model->where($field, '<=', strtotime(date('Y-m-d', strtotime('first day of next month', strtotime($value)))));

						break;
					case 'none':

						break;
					default:
						$this->model->where($field, '=', $value);
						break;
				}
			}
		}

		$offset = ($this->page - 1) * $this->limit;
		$offset = ($offset < 0) ? 0 : $offset;


		$this->model->limit($this->limit)->offset($offset);

		$this->sortField = $this->removeColIndicator($this->sortField);

		$data = $this->model->order_by($this->sortField, $this->sortMode)->find_all();
		
		$total       = $this->model->count_all();
		$total_pages = ($total > 0) ? ceil($total / $this->limit) : 0;

		$this->json_view = View::factory($this->jsonView);
		$this->json_view->set('colIndicator', $this->colIndicator);
		$this->json_view->set('properties', $this->properties->get());
		$this->json_view->set('modelName', $this->modelName);
		$this->json_view->set('data', $data);
		$this->json_view->set('page', $this->page);
		$this->json_view->set('total', $total_pages);
		$this->json_view->set('count', $total);
		$this->json_view->set('export', $this->export);
		$this->json_view->set('records', $total);

		//$this->response->headers('Content-Type', 'application/json');
		$this->response->body($this->json_view);
	}

	/**
	 * Replace column indicator
	 *
	 * @param $fieldName
	 *
	 * @return mixed
	 */
	public function removeColIndicator($fieldName)
	{
		return str_replace(array ('model_', $this->colIndicator), '.', $fieldName);
	}

	/**
	 * Load main template components
	 */
	public function loadMainComponents()
	{
		parent::loadMainComponents();

		if ($this->properties)
		{
			$this->template->set_global('properties', $this->properties->get());
		}
		$this->template->set_global('adminMenuItems', Config::vars('panels.panels'));

		View::bind_global('sortField', $this->sortField);
		View::bind_global('sortMode', $this->sortMode);
		View::bind_global('model', $this->model);
		View::bind_global('modelName', $this->modelName);
		View::bind_global('grid_url', $this->grid_url);

		$this->template->set('hideMenu', (!$this->login) ? TRUE : FALSE);
		$this->template->set('main', View::factory('admin/components/main')
		                                 ->set('templateCss', $this->templateCss)
		                                 ->set('templateJs', $this->templateJs)
		                                 ->set('js', $this->js)
		                                 ->set('css', $this->css)
		                                 ->set('meta', $this->meta)
		);
		$this->template->set('header', View::factory('admin/components/header'));
		$this->template->set('footer', View::factory('admin/components/footer'));
	}

}
