<?php defined('SYSPATH') or die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/Kohana/Core'.EXT;

if (is_file(APPPATH.'classes/Kohana'.EXT))
{
	// Application extends the core
	require APPPATH.'classes/Kohana'.EXT;
}
else
{
	// Load empty core extension
	require SYSPATH.'classes/Kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/timezones
 */
date_default_timezone_set('Europe/Bucharest');

/**
 * Set the default locale.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/function.setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @link http://kohanaframework.org/guide/using.autoloading
 * @link http://www.php.net/manual/function.spl-autoload-register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Optionally, you can enable a compatibility auto-loader for use with
 * older modules that have not been updated for PSR-0.
 *
 * It is recommended to not enable this unless absolutely necessary.
 */
//spl_autoload_register(array('Kohana', 'auto_load_lowercase'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @link http://www.php.net/manual/function.spl-autoload-call
 * @link http://www.php.net/manual/var.configuration#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
I18n::lang('en-us');

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV']))
{
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - integer  cache_life  lifetime, in seconds, of items cached              60
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 * - boolean  expose      set the X-Powered-By header                        FALSE
 */

Kohana::init(array(
	'profile' => Kohana::$environment == Kohana::DEVELOPMENT,
	'cache_life' => 180,
	'caching' => Kohana::$environment != Kohana::DEVELOPMENT,
	'expose'  => FALSE,
	'index_file' => '/',
	'base_url'   => NULL,
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
	'auth'       => MODPATH.'auth',       // Basic authentication
	'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	'database'   => MODPATH.'database',   // Database access
	'image'      => MODPATH.'image',      // Image manipulation
	// 'minion'     => MODPATH.'minion',     // CLI Tasks
	'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	// 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
	'helpers'	 => MODPATH.'helpers_module',
	'libraries'	 => MODPATH.'libraries_module',
	'static_pages' => MODPATH.'static_pages',
	'base'		 => MODPATH.'base',
	'image'		 => MODPATH.'image',
	'admin'		 => MODPATH.'admin',
	'form_module'	 => MODPATH.'form_module',
	'pagination_module'	 => MODPATH.'pagination_module',
	));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */


Route::set('administration', '<directory>(/<controller>(/<action>(/<id>)))',
    array(
        'directory' => '(administration)'
    ))
    ->defaults(array(
        'action'     => 'index',
        'controller' => 'home',
    ));

		Route::set('administration', '<directory>(/<controller>(/<action>(/<id>(/<id2>))))',
		           array(
			           'directory' => '(administration)'
		           ))
		     ->defaults(array(
			                'directory'  => 'administration',
			                'action'     => 'index',
			                'controller' => 'home',
		                ));

Route::set('article_link', 'articol/<slug>-<id>.html',array('slug'=>'[a-z0-9\-]+', 'id'=>'[0-9]*'))->defaults(array(
        'action'     => 'show',
        'controller' => 'articles',
	));

Route::set('section_page', 'categorie/<id>(/<page>)',array('id'=>'[A-Za-z0-9\-]+', 'page'=>'[0-9]*'))->defaults(array(
        'action'     => 'show',
        'controller' => 'sections',
	));

Route::set('contact', 'contact', [])->defaults(array(
	        'action'     => 'contact',
	        'controller' => 'welcome',
		));

Route::set('galerie_foto_link', 'galerie_foto')->defaults(array(
        'action'     => 'index',
        'controller' => 'pictures',
    ));

Route::set('2_params_first_string', '<directory>(/<controller>(/<action>(/<field>)(/<id>)))', array('directory' => '(administration)'));

Route::set('pictures_resize_link', '<controller>/<action>/<width>/<height>/<mode>/<path>', array('controller' => 'pictures','action' => 'resize','path' => '.*'));



Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' => 'welcome',
		'action'     => 'index',
	));

Route::set('list_with_pagination', '(<controller>(/<action>(/<id>(/<page>))))');

Cookie::$salt = 'secretSaltKeySALTSTRING';
