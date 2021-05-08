<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Controller_Administration_Authentification
 */
class Controller_Administration_Authentification extends Controller_Admin
{

	/**
	 * Flag if user is logged in
	 *
	 * @var bool
	 */
	protected $login = FALSE;

	public function action_index()
	{    //$this->autoRender = false;

		//show login form
		$this->template->content = new View('admin/authentification/login');

	}

	public function action_login()
	{

		$this->auth = Auth::instance();

		$valid = Validation::factory($this->request->post());
		$valid->rule('username', 'not_empty')
		      ->rule('password', 'max_length', array (':value', 100))
		      ->rule('password', 'not_empty')
		      ->rule('password', 'min_length', array (':value', 6))
		      ->rule('password', 'max_length', array (':value', 100));

		if ($valid->check())
		{
			$values = $valid->data();

			$remember = $this->request->post('auto_login') ? TRUE : FALSE;

			$this->auth->login($values['username'], $values['password'], $remember);
			$this->user = $this->auth->get_user();

			if (!empty($this->user->id) && $this->user->isAdmin())
			{
				$this->redirect('administration/home');
			}
			else
			{
				//header('Location:'.url::base(FALSE,'http').'administration/authentication');
				$this->redirect('administration/authentification/index/');
			}
		}
		else
		{
			$this->redirect('administration/authentification/');
		}

	}

	function action_logout()
	{

		$this->auth = Auth::instance();
		$this->auth->logout(TRUE);

		$this->redirect('administration/home/');
	}


} // End Welcome
