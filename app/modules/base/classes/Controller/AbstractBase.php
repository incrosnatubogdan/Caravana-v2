<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Controller_AbstractBase
 */
class Controller_AbstractBase extends Controller
{

	/**
	 * @var string|View
	 */
	protected $template = 'template';

	/**
	 * List of js files to load
	 *
	 * @var array
	 */
	protected $templateJs = array ();

	/**
	 * List of css files to load
	 *
	 * @var array
	 */
	protected $templateCss = array ();

	/**
	 * Flag if template should be auto rendered
	 *
	 * @var bool
	 */
	protected $autoRender = TRUE;

	/**
	 * The user model
	 *
	 * @var Model_User
	 */
	protected $user;

	/**
	 * Path to img media folder
	 *
	 * @var string
	 */
	protected $img;

	/**
	 * Path to out of framework php files
	 * NOTE: this are not vendor libraries but standalone files that make things faster
	 *
	 * @var string
	 */
	protected $php;

	/**
	 * Path to js media folder
	 *
	 * @var string
	 */
	protected $js;

	/**
	 * Path to css media folder
	 *
	 * @var string
	 */
	protected $css;

	/**
	 * Meta information library
	 *
	 * @var Meta_Informations
	 */
	protected $meta;

	/**
	 * Before action handler
	 */
	public function before()
	{
		$this->user     = Auth::instance()->get_user();
		$this->template = View::factory($this->template);
		$this->setGlobals();
		$this->meta = new Meta_Informations();
	}

	public function isDevelopment() {
		return Kohana::$environment == Kohana::DEVELOPMENT;
	}

	/**
	 * After action handler
	 */
	public function after()
	{
		if ($this->autoRender)
		{
			$this->loadMainComponents();
			$this->response->body($this->template);
		}
	}

	/**
	 * Set global variables
	 */
	public function setGlobals()
	{
		$media     = URL::base(TRUE) . 'media/';
		$this->img = $media . 'img/';
		$this->php = $media . 'php/';
		$this->js  = $media . 'js/';
		$this->css = $media . 'css/';
	}

	/**
	 * Load main template's components
	 */
	public function loadMainComponents()
	{
		View::bind_global('img', $this->img);
		View::bind_global('user', $this->user);

		$this->template->set('main', View::factory('components/main')
		                                 ->set('templateCss', $this->templateCss)
		                                 ->set('templateJs', $this->templateJs)
		                                 ->set('js', $this->js)
		                                 ->set('css', $this->css)
		                                 ->set('meta', $this->meta)
		);
		$this->template->set('header', View::factory('components/header'));
		$this->template->set('footer', View::factory('components/footer'));

	}

}
