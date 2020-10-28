<?php

use \Sbc\Page;
use \Sbc\Model\Turma;
use \Sbc\Model\Espaco;
use \Sbc\Model\Horario;
use \Sbc\Model\Local;
use \Sbc\Model\Atividade;
use \Sbc\Model\Temporada;
use \Sbc\Model\Cart;



$app->get('/', function() {

	$turma = Turma::listAllTurmaTemporada();
	
	$page = new Page();
    
	$page->setTpl("index", [
		'turma'=>Turma::checkList($turma),
		//'temporada'=>$turma->getTemporada()

	]);
});

// TESTE 
$app->get('/login', function() {

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("login");
});


$app->get("/cart", function(){

	$cart = Cart::getFromSession();

	$page = new Page();

	$page->setTpl("cart", [
		'cart'=>$cart->getValues(),
		'turma'=>$cart->getTurma(),
		'error'=>Cart::getMsgError()
	]);

});

$app->get("/cart/:idturma/add", function($idturma){

	$turma = new Turma();

	$turma->get((int)$idturma);

	$cart = Cart::getFromSession();

	$cart->addTurma($turma);
	
	header("Location: /cart");
	exit;

});

$app->get("/cart/:idturma/minus", function($idturma){

	$turma = new Turma();

	$turma->get((int)$idturma);

	$cart = Cart::getFromSession();

	$cart->removeTurma($turma);

	header("Location: /cart");
	exit;

});

$app->get("/cart/:idturma/remove", function($idturma){

	$turma = new Turma();

	$turma->get((int)$idturma);

	$cart = Cart::getFromSession();

	$cart->removeTurma($turma, true);

	header("Location: /cart");
	exit;

});


$app->get("/temporada/:idtemporada", function($idtemporada){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);


	$pagination = $temporada->getTurmaTemporadaPage($page);	

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/temporada/'.$temporada->getidtemporada().'?page='.$i,
			'page'=>$i
		]);
	}
	$page = new Page();

	$page->setTpl("temporada", [
		'temporada'=>$temporada->getValues(),
		'turma'=>$pagination["data"],
		'pages'=>$pages
	]);
});

$app->get("/locais", function() {

	$locais = Local::listAll();

	$page = new Page();

	$page->setTpl("locais", array(
		'locais'=>$locais
	));
});

$app->get("/local/:idlocal", function($idlocal){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$local = new Local();

	$local->get((int)$idlocal);

	$pagination = $local->getTurmaPage($page);

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/local/'.$local->getidlocal().'?page='.$i,
			'page'=>$i
		]);
	}
	$page = new Page();

	$page->setTpl("local", [
		'local'=>$local->getValues(),
		'turma'=>$pagination["data"],
		'pages'=>$pages
	]);
});


$app->get("/espaco/:idespaco", function($idespaco) {

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$page = new Page();

	$page->setTpl("espaco", [
		'espaco'=>$espaco->getValues(),
		'horario'=>$espaco->getHorario()
	]);	

});

$app->get("/local/:idlocal", function($idlocal) {

	$local = new Local();

	$local->get((int)$idlocal);

	$page = new Page();

	$page->setTpl("local", [
		'local'=>$local->getValues(),
		'espaco'=>$local->getEspaco()
	]);	

});

$app->get("/atividade/:idativ", function($idativ){

	$atividade = new Atividade();

	$atividade->getFromId($idativ);

	//var_dump($atividade);
	//exit();

	$page = new Page();

	$page->setTpl("atividade-detail", [
		'atividade'=>$atividade->getValues(),
		// Implementar método
		//'local'=>$atividade->getLocal()
	]);

});

$app->get("/turma/:idturma", function($idturma){

	$turma = new Turma();

	$turma->getFromId($idturma);

	//var_dump($turma);
	//exit();

	$page = new Page();

	$page->setTpl("turma-detail", [
		'turma'=>$turma->getValues(),
		// Implementar método
		//'local'=>$turma->getLocal()
	]);

});



?>