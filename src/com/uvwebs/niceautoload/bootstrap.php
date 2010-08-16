<?php
// Initial entrance configuration point
error_reporting(E_ALL | E_STRICT);

set_include_path(
	get_include_path()
	. PATH_SEPARATOR . dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR
);

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'lib/AutoLoad.class.php';

niceautoload_lib_AutoLoad::getInstance();
niceautoload_lib_ExceptionAndErrorHandler::getInstance();

