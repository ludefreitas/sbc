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
use \Sbc\Model\Horario;
use \Sbc\Model\Espaco;
use \Sbc\Model\Turma;
use \Sbc\Model\Temporada;



$app = new Slim();

$app->config('ebug', true);

require_once("site.php");
require_once("admin.php");
require_once("admin-faixaetarias.php");
require_once("admin-users.php");
require_once("admin-modalidades.php");
require_once("admin-local.php");
require_once("admin-horario.php");
require_once("admin-espaco.php");
require_once("admin-turma.php");
require_once("admin-temporada.php");


$app->run();

?>
