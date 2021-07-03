<?php

use \Sbc\Page;
use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Horario;

$app->get("/professor/horario", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Horario::getPageSearch($search, $page);

	} else {

		$pagination = Horario::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/professor/horario?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}
	//$horario = Horario::listAll();

	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("horario", array( // aqui temos um array com muitos arrays
		"horario"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>Horario::getMsgError()
	));
});


$app->get("/professor/horario/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("horario-create");
});

$app->post("/professor/horario/create", function() {

	User::verifyLogin();

	$horario = new Horario();

	$horario->setData($_POST);

	$horario->save();

	header("Location: /professor/horario");
	exit();
});

$app->get("/professor/horario/:idhorario/delete", function($idhorario) {

	User::verifyLogin();

	$horario = new Horario();

	$horario->get((int)$idhorario);

	$horario->delete();

	header("Location: /professor/horario");
	exit();
	
});

$app->get("/professor/horario/:idhorario", function($idhorario) {

	User::verifyLogin();

	$horario = new Horario();

	$horario->get((int)$idhorario);

	$page = new PageAdmin();

	$page->setTpl("horario-update", [
		'horario'=>$horario->getValues()
	]);	
	
});

$app->post("/professor/horario/:idhorario", function($idhorario) {

	User::verifyLogin();

	$horario = new Horario();

	$horario->get((int)$idhorario);

	$horario->setData($_POST);

	$horario->save();

	header("Location: /professor/horario");
	exit();		
});

$app->get("/horario/:idhorario", function($idhorario) {

	$horario = new Horario();

	$horario->get((int)$idhorario);

	$page = new Page();

	$page->setTpl("horario", [
		'horario'=>$horario->getValues()
	]);	

});


?>