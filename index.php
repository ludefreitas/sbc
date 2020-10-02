<?php 

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Sbc\Page;
use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Faixaetaria;
use \Sbc\Model\Modalidade;
use \Sbc\Model\Local;

$app = new Slim();

$app->config('ebug', true);

require_once("site.php");
require_once("admin.php");
require_once("admin-faixaetarias.php");
require_once("admin-users.php");
require_once("admin-modalidades.php");
require_once("admin-local.php");



$app->run();

?>
