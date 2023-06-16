<?php 

if (!isset($_SESSION)) {
  session_start();
}

require_once("vendor/autoload.php");

use \Sbc\Model\Agenda;
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
use \Sbc\Model\Saude;
use \Sbc\Page;
use \Sbc\PageCursos;
use \Sbc\PageAdmin;
use \Sbc\PageAudi;
use \Sbc\PageEstagiario;
use \Sbc\PageProf;
use \Slim\Slim;

$app = new Slim();

$app->config('debug', true);

require_once("admin-agenda.php");
require_once("admin-atividades.php");
require_once("admin-espaco.php");
require_once("admin-faixaetarias.php");
require_once("admin-horario.php");
require_once("admin-insc.php");
require_once("admin-local.php");
require_once("admin-modalidade.php");
require_once("admin-pessoa.php");
require_once("admin-saude.php");
require_once("admin-sorteio.php");
require_once("admin-temporada.php");
require_once("admin-turma.php");
require_once("admin-users.php");
require_once("admin.php");
require_once("audi.php");
require_once("estagiario.php");
require_once("prof.php");
require_once("prof-agenda.php");
require_once("prof-insc.php");
require_once("prof-pessoa.php");
require_once("prof-saude.php");
//require_once("prof-presenca.php");
require_once("prof-temporada.php");
require_once("prof-turma.php");
require_once("prof-users.php");
require_once("cursos.php");
require_once("cursos-cart.php");
require_once("cursos-insc.php");
require_once("cursos-pessoa.php");
require_once("cursos-modalidade.php");
require_once("cursos-saude.php");
require_once("cursos-user.php");
require_once("functions.php");
require_once("site-agenda.php");
require_once("site-cart.php");
require_once("site-endereco.php");
require_once("site-insc.php");
require_once("site-local.php");
require_once("site-modalidade.php");
require_once("site-pessoa.php");
require_once("site-saude.php");
require_once("site-user.php");
require_once("site.php");

$app->run();

?>
