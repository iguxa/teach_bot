<?php session_start();

define('ROOT',dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/db.php');

$router = new Router();
$router -> run();