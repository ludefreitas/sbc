<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Espaco;
use \Sbc\Model\Local;
use \Sbc\Model\Horario;
use \Sbc\Model\Atividade;
use \Sbc\Model\TurmaStatus;
use \Sbc\Model\Turma;
use \Sbc\Model\Modalidade;

/*
$app->get("/professor/turma", function() {

	User::verifyLogin();

	$turma = Turma::listAll();

	$page = new PageAdmin();

	$page->setTpl("turma", array(
		'turma'=>$turma
	));
});
*/
$app->get("/professor/turma", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Turma::getPageSearch($search, $page);

	} else {

		$pagination = Turma::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/professor/turma?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}

	//$users = User::listAll();
	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("turma", array( // aqui temos um array com muitos arrays
		"turma"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
	));
});


$app->get("/professor/turma/create", function() {

	User::verifyLogin();

	$local = Local::listAll();
	$user = User::listAllProf();
	$espaco = Espaco::listAll();	
	$horario = Horario::listAll();
	$atividade = Atividade::listAll();
	$modalidade = Modalidade::listAll();
	$turmastatus = TurmaStatus::listAll();

	$page = new PageAdmin();

	$page->setTpl("turma-create", array(
		'user'=>$user,
		'local'=>$local,
		'espaco'=>$espaco,
		'horario'=>$horario,		
		'atividade'=>$atividade,
		'modalidade'=>$modalidade,
		'turmastatus'=>$turmastatus
	));
});

$app->post("/professor/turma/create", function() {

	User::verifyLogin();

	$turma = new Turma();

	$turma->setData($_POST);

	$turma->save();

	header("Location: /professor/turma");
	exit();	
});

$app->get("/professor/turma/:idturma/delete", function($idturma) {

	User::verifyLogin();

	$turma = new Turma();

	$turma->get((int)$idturma);

	$turma->delete();

	header("Location: /professor/turma");
	exit();
	
});


$app->get("/professor/turma/:idturma", function($idturma) {

	User::verifyLogin();

	$turma = new Turma;

	$turma->get((int)$idturma);

	$page = new PageAdmin();

	$page->setTpl("turma-update", array(
		'turma'=>$turma->getValues(),
		'turmastatus'=>TurmaStatus::listAll(),
		'modalidade'=>Modalidade::listAll(),
		'atividade'=>Atividade::listAll(),
		'modalidade'=>Modalidade::listAll(),
		'users'=>User::listAllProf(),
		'horario'=>Horario::listAll(),
		'espaco'=>Espaco::listAll()
	));
});

$app->post("/professor/turma/:idturma", function($idturma) {

	User::verifyLogin();

	$turma = new Turma;

	$turma->get((int)$idturma);

	$turma->setData($_POST);

	$turma->save();

	$turma->setPhoto($_FILES["file"]);

	header("Location: /professor/turma");
	exit();	
});

$app->get("/turma/:idturma", function($idturma) {

	$turma = new Turma();

	$turma->get((int)$idturma);

	$page = new Page();

	$page->setTpl("turma", [
		'turma'=>$turma->getValues()
	]);	

});


?>