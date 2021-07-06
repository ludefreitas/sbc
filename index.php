<?php 

session_start();

require_once("vendor/autoload.php");

use \Sbc\Model\Atividade;
use \Sbc\Model\Cart;
use \Sbc\Model\Espaco;
use \Sbc\Model\Faixaetaria;
use \Sbc\Model\Horario;
use \Sbc\Model\Insc;
use \Sbc\Model\Local;
use \Sbc\Model\Modalidade;
use \Sbc\Model\Sorteio;
use \Sbc\Model\Temporada;
use \Sbc\Model\Turma;
use \Sbc\Model\User;
use \Sbc\Page;
use \Sbc\PageAdmin;
use \Slim\Slim;

$app = new Slim();

$app->config('ebug', true);

require_once("admin-atividades.php");
require_once("admin-espaco.php");
require_once("admin-faixaetarias.php");
require_once("admin-horario.php");
require_once("admin-insc.php");
require_once("admin-local.php");
require_once("admin-modalidade.php");
require_once("admin-pessoa.php");
require_once("admin-sorteio.php");
require_once("admin-temporada.php");
require_once("admin-turma.php");
require_once("admin-users.php");
require_once("admin.php");
require_once("functions.php");
require_once("site-cart.php");
require_once("site-endereco.php");
require_once("site-insc.php");
require_once("site-local.php");
require_once("site-modalidade.php");
require_once("site-pessoa.php");
require_once("site-user.php");
require_once("site.php");

$app->run();

?>
