<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-02-29 21:07:08 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '?>' ~ APPPATH\views\profile\patients.php [ 80 ] in file:line
2016-02-29 21:07:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-02-29 22:12:08 --- CRITICAL: ErrorException [ 4096 ]: Object of class Field_Property could not be converted to string ~ APPPATH\views\profile\printPatient.php [ 61 ] in E:\webRoot\localapp.dev\apps\caravanaApp\application\views\profile\printPatient.php:61
2016-02-29 22:12:08 --- DEBUG: #0 E:\webRoot\localapp.dev\apps\caravanaApp\application\views\profile\printPatient.php(61): Kohana_Core::error_handler(4096, 'Object of class...', 'E:\\webRoot\\loca...', 61, Array)
#1 E:\webRoot\localapp.dev\system\classes\Kohana\View.php(61): include('E:\\webRoot\\loca...')
#2 E:\webRoot\localapp.dev\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\webRoot\\loca...', Array)
#3 E:\webRoot\localapp.dev\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\webRoot\localapp.dev\apps\caravanaApp\application\views\print_template.php(8): Kohana_View->__toString()
#5 E:\webRoot\localapp.dev\system\classes\Kohana\View.php(61): include('E:\\webRoot\\loca...')
#6 E:\webRoot\localapp.dev\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\\webRoot\\loca...', Array)
#7 E:\webRoot\localapp.dev\apps\caravanaApp\application\classes\Controller\Base.php(80): Kohana_View->render()
#8 E:\webRoot\localapp.dev\system\classes\Kohana\Controller.php(87): Controller_Base->after()
#9 [internal function]: Kohana_Controller->execute()
#10 E:\webRoot\localapp.dev\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Profile))
#11 E:\webRoot\localapp.dev\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 E:\webRoot\localapp.dev\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#13 E:\webRoot\localapp.dev\apps\caravanaApp\public_html\index.php(117): Kohana_Request->execute()
#14 {main} in E:\webRoot\localapp.dev\apps\caravanaApp\application\views\profile\printPatient.php:61
2016-02-29 22:15:10 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Field::hasValue() ~ APPPATH\views\profile\printPatient.php [ 49 ] in file:line
2016-02-29 22:15:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-02-29 23:24:06 --- CRITICAL: Database_Exception [ 1292 ]: Incorrect date value: '' for column 'date' at row 1 [ INSERT INTO `kr_articles` (`title`, `active`, `date`) VALUES ('Prima ediție Caravana cu Medici din 2016', '1', '') ] ~ MODPATH\database\classes\Kohana\Database\MySQLi.php [ 185 ] in E:\webRoot\localapp.dev\modules\database\classes\Kohana\Database\Query.php:251
2016-02-29 23:24:06 --- DEBUG: #0 E:\webRoot\localapp.dev\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQLi->query(2, 'INSERT INTO `kr...', false, Array)
#1 E:\webRoot\localapp.dev\modules\orm\classes\Kohana\ORM.php(1333): Kohana_Database_Query->execute(Object(Database_MySQLi))
#2 E:\webRoot\localapp.dev\modules\orm\classes\Kohana\ORM.php(1430): Kohana_ORM->create(NULL)
#3 E:\webRoot\localapp.dev\modules\admin\classes\Controller\Admin.php(281): Kohana_ORM->save()
#4 E:\webRoot\localapp.dev\system\classes\Kohana\Controller.php(84): Controller_Admin->action_edit()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\webRoot\localapp.dev\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Administration_Articles))
#7 E:\webRoot\localapp.dev\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\webRoot\localapp.dev\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 E:\webRoot\localapp.dev\apps\caravanaApp\public_html\index.php(117): Kohana_Request->execute()
#10 {main} in E:\webRoot\localapp.dev\modules\database\classes\Kohana\Database\Query.php:251