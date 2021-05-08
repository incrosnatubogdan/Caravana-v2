<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Controller_Base
 */
class Controller_Base extends Controller_AbstractBase{

	/**
	 * The list of CSS files to load
	 *
	 * @var array
	 */
	protected $templateCss = array('bootstrap.css', 'style.css', 'bootstrap-datepicker3.min.css');

	/**
	 * The list of JS files to load
	 *
	 * @var array
	 */
	protected $templateJs = array('custom.js', 'bootstrap-datepicker.min.js');

	/**
	 * Before action handler
	 */
	public function before()
	{
		$this->user = Auth::instance()->get_user();

		parent::before();

		$this->setMenu();
	}

	protected function setMenu()
	{
		$menu = Config::vars('menus.menu');

		$sections = Model_Section::make()
		->where('active', '=', 1)
		->order_by('order', 'desc')
		->find_all();

		$i = 1;
		foreach($sections as $section)
		{

					array_unshift(
					$menu,
					[
							'name' => $section->name,
							'link' => (count($sections) == $i) ? url::link() : url::link('categorie/'.URL::title($section->name)),
					]
				);

				$i++;
		}

		$this->template->set_global('menu', $menu);
	}

	/**
	 * Returns TRUE when profiler should be enabled
	 * @return boolean
	 */
	protected function showProfiler()
	{
		return $this->request->query('profilerOn') && $this->user && $this->user->isAdmin();
	}

	/**
	 * Render the template
	 */
	public function after()
	{
		$profiler = !$this->showProfiler() ? NULL : View::factory('profiler/stats')->render();

		if ($this->autoRender)
		{
			$this->loadMainComponents();
			$body = $this->template->render();

			$this->response->body($body . $profiler);
		}
		elseif ($profiler)
		{
				$this->response->body($profiler);
		}
	}
}
