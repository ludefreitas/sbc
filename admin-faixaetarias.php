<?php

use \Sbc\Page;
use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Faixaetaria;

$app->get("/professor/faixaetaria", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Faixaetaria::getPageSearch($search, $page);

	} else {

		$pagination = Faixaetaria::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/professor/faixaetaria?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}
	//$faixaetaria = Faixaetaria::listAll();

	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("faixaetaria", array( // aqui temos um array com muitos arrays
		"faixaetaria"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
	));
});

$app->get("/professor/faixaetaria/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("faixaetaria-create");
});

$app->post("/professor/faixaetaria/create", function() {

	User::verifyLogin();

	$faixaetaria = new Faixaetaria();

	$faixaetaria->setData($_POST);

	$faixaetaria->save();

	header("Location: /professor/faixaetaria");
	exit();
});

$app->get("/professor/faixaetaria/:idfxetaria/delete", function($idfxetaria) {

	User::verifyLogin();

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	$faixaetaria->delete();

	header("Location: /professor/faixaetaria");
	exit();
	
});

$app->get("/professor/faixaetaria/:idfxetaria", function($idfxetaria) {

	User::verifyLogin();

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	$page = new PageAdmin();

	$page->setTpl("faixaetaria-update", [
		'faixaetaria'=>$faixaetaria->getValues()
	]);	
	
});

$app->post("/professor/faixaetaria/:idfxetaria", function($idfxetaria) {

	User::verifyLogin();

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	$faixaetaria->setData($_POST);

	$faixaetaria->save();

	header("Location: /professor/faixaetaria");
	exit();		
});

$app->get("/faixaetaria/:idfxetaria", function($idfxetaria) {

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	$page = new Page();

	$page->setTpl("faixaetaria", [
		'faixaetaria'=>$faixaetaria->getValues()
	]);	

});


?>