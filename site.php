<?php

use \Sbc\Page;
use \Sbc\Model\Turma;
use \Sbc\Model\Espaco;
use \Sbc\Model\Horario;
use \Sbc\Model\Local;
use \Sbc\Model\Atividade;



$app->get('/', function() {

	$turma = Turma::listAllTurmaTemporada();

	$page = new Page();

	$page->setTpl("index", [
		'turma'=>Turma::checkList($turma)
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


$app->get("/local/:idlocal", function($idlocal){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$local = new Local();

	$local->get((int)$idlocal);

	$pagination = $local->getTurmaPage($page);

	$pages = [];

	//$espaco->setPhoto($_FILES["file"]);

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
		//'espaco'=>$espaco
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


?>