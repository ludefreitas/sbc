<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Modalidade;
use \Sbc\Model\Faixaetaria;

/*
$app->get("/professor/modalidades", function() {

	User::verifyLogin();

	$modalidades = Modalidade::listAll();

	$page = new PageAdmin();

	$page->setTpl("modalidades", array(
		'modalidades'=>Modalidade::checkList($modalidades)
	));
});
*/

$app->get("/professor/modalidades", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Modalidade::getPageSearch($search, $page);

	} else {

		$pagination = Modalidade::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/professor/modalidades?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}

	//$modalidade = modalidade::listAll();
	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("modalidades", array( // aqui temos um array com muitos arrays
		"modalidade"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>Modalidade::getMsgError()
	));
});


$app->get("/professor/modalidades/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("modalidades-create");
});

$app->post("/professor/modalidades/create", function() {

	User::verifyLogin();

	$modalidade = new Modalidade();

	$modalidade->setData($_POST);

	$modalidade->save();

	header("Location: /professor/modalidades");
	exit();	
});

$app->get("/professor/modalidades/:idmodal/delete", function($idmodal) {

	User::verifyLogin();

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	$modalidade->delete();

	header("Location: /professor/modalidades");
	exit();
	
});


$app->get("/professor/modalidades/:idmodal", function($idmodal) {

	User::verifyLogin();

	$modalidade = new Modalidade;

	$modalidade->get((int)$idmodal);

	$page = new PageAdmin();

	$page->setTpl("modalidades-update", array(
		'modalidade'=>$modalidade->getValues()
	));
});

$app->post("/professor/modalidades/:idmodal", function($idmodal) {

	User::verifyLogin();

	$modalidade = new Modalidade;

	$modalidade->get((int)$idmodal);

	$modalidade->setData($_POST);

	$modalidade->save();

	header("Location: /professor/modalidades");
	exit();	
});

$app->get("/modalidades/:idmodal", function($idmodal) {

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	$page = new Page();

	$page->setTpl("modalidades", [
		'modalidade'=>$modalidade->getValues()
	]);	

});


?>