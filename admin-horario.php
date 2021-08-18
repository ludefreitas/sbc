<?php

use \Sbc\Page;
use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Horario;

$app->get("/admin/horario", function() {

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
			'href'=>'/admin/horario?'.http_build_query([
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
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>Horario::getMsgError()
	));
});


$app->get("/admin/horario/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("horario-create", [
		"error"=>Horario::getMsgError(),
		"createHorarioValues"=>(isset($_SESSION['createHorarioValues'])) ? $_SESSION['createHorarioValues'] : ['horainicio'=>'', 'horatermino'=>'', 'diasemana'=>'', 'periodo'=>'']
	]);
});

$app->post("/admin/horario/create", function() {

	User::verifyLogin();

	$_SESSION['createHorarioValues'] = $_POST;

	$horario = new Horario();

	if (!isset($_POST['horainicio']) || $_POST['horainicio'] == '') {
		Horario::setMsgError("Informe o horário de início.");
		header("Location: /admin/horario/create");
		exit;		
	}	

	if (!isset($_POST['horatermino']) || $_POST['horatermino'] == '') {
		Horario::setMsgError("Informe o horário de término.");
		header("Location: /admin/horario/create");
		exit;		
	}

	if (!isset($_POST['diasemana']) || $_POST['diasemana'] == '') {
		Horario::setMsgError("Informe os dias da semana.");
		header("Location: /admin/horario/create");
		exit;		
	}						

	if (!isset($_POST['periodo']) || $_POST['periodo'] == '') {
		Horario::setMsgError("Informe o período.");
		header("Location: /admin/horario/create");
		exit;		
	}

	$horario->setData($_POST);

	$_SESSION['createHorarioValues'] = NULL;

	$horario->save();

	header("Location: /admin/horario");
	exit();
});

$app->get("/admin/horario/:idhorario/delete", function($idhorario) {

	User::verifyLogin();

	$horario = new Horario();

	$horario->get((int)$idhorario);

	$horario->delete();

	header("Location: /admin/horario");
	exit();
	
});

$app->get("/admin/horario/:idhorario", function($idhorario) {

	User::verifyLogin();

	$horario = new Horario();

	$horario->get((int)$idhorario);

	$page = new PageAdmin();

	$page->setTpl("horario-update", [
		'horario'=>$horario->getValues(),
		"error"=>Horario::getMsgError()
	]);	
	
});

$app->post("/admin/horario/:idhorario", function($idhorario) {

	User::verifyLogin();

	$horario = new Horario();

	$horario->get((int)$idhorario);

	$horario->setData($_POST);

	if (!isset($_POST['horainicio']) || $_POST['horainicio'] == '') {
		Horario::setMsgError("Informe o horário de início.");
		header("Location: /admin/horario/".$idhorario."");
		exit;		
	}	

	if (!isset($_POST['horatermino']) || $_POST['horatermino'] == '') {
		Horario::setMsgError("Informe o horário de término.");
		header("Location: /admin/horario/".$idhorario."");
		exit;		
	}

	if (!isset($_POST['diasemana']) || $_POST['diasemana'] == '') {
		Horario::setMsgError("Informe os dias da semana.");
		header("Location: /admin/horario/".$idhorario."");
		exit;		
	}						

	if (!isset($_POST['periodo']) || $_POST['periodo'] == '') {
		Horario::setMsgError("Informe o período.");
		header("Location: /admin/horario/".$idhorario."");
		exit;		
	}

	$horario->save();

	header("Location: /admin/horario");
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