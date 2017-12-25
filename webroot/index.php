<?php

/*
    http://localhost/pages
    http://localhost/admin
    http://localhost/admin/users/login
*/

session_start();

if (!defined('DS')) {
   define('DS', DIRECTORY_SEPARATOR);
}
if (!defined('ROOT')) {
   define('ROOT', dirname(dirname(__FILE__)));
}
if (!defined('VIEWS_PATH')) {
   define('VIEWS_PATH', ROOT.DS.'views');
}
if (!defined('WEBROOT_PATH')) {
    define('WEBROOT_PATH', ROOT.DS.'webroot');
}

require_once(ROOT.DS.'init'.DS.'init.php');

App::run($_SERVER['REQUEST_URI']);


