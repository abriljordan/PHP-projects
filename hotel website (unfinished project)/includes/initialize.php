<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'wamp'.DS.'www'.DS.'thesis_v2');
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');
// load config file first
require_once(LIB_PATH.DS.'config.php');
// load basic functions next so that everything after can use them
require_once(LIB_PATH.DS.'functions.php');
// load core objects
require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database.php');
require_once(LIB_PATH.DS.'database_object.php');
// load database-related classes
require_once(LIB_PATH.DS.'staff.php');
require_once(LIB_PATH.DS.'admin.php');
require_once(LIB_PATH.DS.'photograph.php');
require_once(LIB_PATH.DS.'smartUrl.php');
require_once(LIB_PATH.DS.'reservation_classes.php');
?>