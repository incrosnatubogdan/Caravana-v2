<?php defined('SYSPATH') OR die('No direct access allowed.');

if (!env::isDev())
{
	return array
	(
		'default' => array
		(
			'type'       => 'MySQLi',
			'connection' => array(
				/**
				 * The following options are available for MySQL:
				 *
				 * string   hostname     server hostname, or socket
				 * string   database     database name
				 * string   username     database username
				 * string   password     database password
				 * boolean  persistent   use persistent connections?
				 * array    variables    system variables as "key => value" pairs
				 *
				 * Ports and sockets may be appended to the hostname.
				 */
				'hostname'   => 'localhost',
				'database'   => 'x28crvnc_caravana_app',
				'username'   => 'x28crvnc_app_use',
				'password'   => 'U8n&X4+m}*Gm',
				'persistent' => true,
			),
			'table_prefix' => 'kr_',
			'charset'      => 'utf8',
			'caching'      => true,
		),
		'alternate' => array(
			'type'       => 'PDO',
			'connection' => array(
				/**
				 * The following options are available for PDO:
				 *
				 * string   dsn         Data Source Name
				 * string   username    database username
				 * string   password    database password
				 * boolean  persistent  use persistent connections?
				 */
				'dsn'        => 'mysql:host=localhost;dbname=kohana',
				'username'   => 'root',
				'password'   => 'r00tdb',
				'persistent' => FALSE,
			),
			/**
			 * The following extra options are available for PDO:
			 *
			 * string   identifier  set the escaping identifier
			 */
			'table_prefix' => '',
			'charset'      => 'utf8',
			'caching'      => FALSE,
		),
	);
}
else
{
	return array
	(
		'default' => array
		(
			'type'       => 'MySQLi',
			'connection' => array(
				/**
				 * The following options are available for MySQL:
				 *
				 * string   hostname     server hostname, or socket
				 * string   database     database name
				 * string   username     database username
				 * string   password     database password
				 * boolean  persistent   use persistent connections?
				 * array    variables    system variables as "key => value" pairs
				 *
				 * Ports and sockets may be appended to the hostname.
				 */
				'hostname'   => 'localhost',
				'database'   => 'caravana_app',
				'username'   => 'bogdan',
				'password'   => '111111',
				'persistent' => true,
			),
			'table_prefix' => 'kr_',
			'charset'      => 'utf8',
			'caching'      => true,
		),
		'alternate' => array(
			'type'       => 'PDO',
			'connection' => array(
				/**
				 * The following options are available for PDO:
				 *
				 * string   dsn         Data Source Name
				 * string   username    database username
				 * string   password    database password
				 * boolean  persistent  use persistent connections?
				 */
				'dsn'        => 'mysql:host=localhost;dbname=kohana',
				'username'   => 'root',
				'password'   => 'r00tdb',
				'persistent' => FALSE,
			),
			/**
			 * The following extra options are available for PDO:
			 *
			 * string   identifier  set the escaping identifier
			 */
			'table_prefix' => '',
			'charset'      => 'utf8',
			'caching'      => FALSE,
		),
	);
}
