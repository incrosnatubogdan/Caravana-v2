<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Controller_Administration_Users
 */
class Controller_Administration_Users extends Controller_Admin {

	/**
	 * Model name
	 *
	 * @var string
	 */
	protected $modelName = 'Model_User';

	/**
	 * Grid action
	 */
	public function action_index()
	{
		$this->template->content = $this->getGrid();
	}

	/**
	 * Change grid properties
	 */
	public function changeProperties(){

		$this->properties
				->edit('last_login','search_type','date')->edit('last_login','searchoptions','JS_FUNCTION_DATEPICKER')
				->edit('actions',false,array(
											 'index' => 'actions',
											 'name'  => 'actions',
											 'title' => 'Setari',
											 'width' => 5,
											 'search' => false,
											 'export' => false,
											 'sortable' => false,
											 'buttons' => array(0 => array(
																		'key' => 'id',
																		'url' => 'administration/users/roles/',
																		'icon' => 'wrench',
																		'ajax' => true,
																		'reload' => false,
																	),
															),
											)
				);

	}

	/**
	 * User roles
	 *
	 * @throws Kohana_Exception
	 * @throws View_Exception
	 */
	public function action_roles(){
		$this->autoRender = false;

		$id = $this->request->param('id', NULL);
		$user = ORM::factory('user', $id);

		if($this->request->post('save'))
		{
			$user->remove('roles');

			$newRoles = $this->request->post('roles');

			if(!empty($newRoles))
			{
				foreach($newRoles as $id)
				{
					$user->add('roles', ORM::factory('Role', $id));
				}
			}
		}

		$activeRoles = array();
		$roles = $user->roles->find_all();
		if(count($roles))
		{
			foreach($roles as $item)
			{
				$activeRoles[$item->id] = $item->id;
			}
		}

		$view = new View('admin/users/roles');
		$view->user = $user;
		$view->activeRoles = $activeRoles;
		$view->roles = ORM::factory('role')->find_all();

		echo $view->render();
	}

}
