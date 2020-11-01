<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Atividade;
use \Sbc\Model\Faixaetaria;

/*
$app->get("/professor/atividade", function() {

	User::verifyLogin();

	$atividade = Atividade::listAll();

	$page = new PageAdmin();

	$page->setTpl("atividade", array(
		'atividade'=>Atividade::checkList($atividade)
	));
});
*/

$app->get("/professor/atividade", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Atividade::getPageSearch($search, $page);

	} else {

		$pagination = Atividade::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/professor/atividade?'.http_build_query([
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
	$page->setTpl("atividade", array( // aqui temos um array com muitos arrays
		"atividade"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
	));
});

$app->get("/professor/atividade/create", function() {

	User::verifyLogin();

	$faixaetaria = Faixaetaria::listAll();

	$page = new PageAdmin();

	$page->setTpl("atividade-create", array(
		'faixaetaria'=>$faixaetaria
	));
});

$app->post("/professor/atividade/create", function() {

	User::verifyLogin();

	$atividade = new Atividade();

	$atividade->setData($_POST);

	$atividade->save();

	header("Location: /professor/atividade");
	exit();	
});

$app->get("/professor/atividade/:idativ/delete", function($idativ) {

	User::verifyLogin();

	$atividade = new Atividade();

	$atividade->get((int)$idativ);

	$atividade->delete();

	header("Location: /professor/atividade");
	exit();
	
});


$app->get("/professor/atividade/:idativ", function($idativ) {

	User::verifyLogin();

	$atividade = new Atividade;

	$atividade->get((int)$idativ);

	$page = new PageAdmin();

	$page->setTpl("atividade-update", array(
		'atividade'=>$atividade->getValues(),
		'faixaetaria'=>Faixaetaria::listAll()
	));
});

$app->post("/professor/atividade/:idativ", function($idativ) {

	User::verifyLogin();

	$atividade = new Atividade;

	$atividade->get((int)$idativ);

	$atividade->setData($_POST);

	$atividade->save();

	header("Location: /professor/atividade");
	exit();	
});

$app->get("/atividade/:idativ", function($idativ) {

	$atividade = new Atividade();

	$atividade->get((int)$idativ);

	$page = new Page();

	$page->setTpl("atividade", [
		'atividade'=>$atividade->getValues()
	]);	

});




?>