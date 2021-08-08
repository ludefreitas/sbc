<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Atividade;
use \Sbc\Model\Faixaetaria;

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

	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("atividade", array( // aqui temos um array com muitos arrays
		"atividade"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>Atividade::getMsgError()
	));
});

$app->get("/professor/atividade/create", function() {

	User::verifyLogin();

	$faixaetaria = Faixaetaria::listAll();

	$page = new PageAdmin();

	$page->setTpl("atividade-create", array(
		"faixaetaria"=>$faixaetaria,
		"error"=>Atividade::getMsgError(),
		"createAtivValues"=>(
				isset($_SESSION['createAtivValues'])) 
				    ? $_SESSION['createAtivValues'] 
			        : ['nomeativ'=>'', 'descativ'=>'', 'prograativ'=>'', 'tipoativ'=>'', 'origativ'=>'', 'geneativ'=>'', 'idfxetaria'=>'']
	));	
});

$app->post("/professor/atividade/create", function() {

	User::verifyLogin();

	$_SESSION['createAtivValues'] = $_POST;

	$atividade = new Atividade();

	if (!isset($_POST['nomeativ']) || $_POST['nomeativ'] == '') {
		Atividade::setMsgError("Informe o nome da atividade.");
		header("Location: /professor/atividade/create");
		exit;		
	}	

	if (!isset($_POST['descativ']) || $_POST['descativ'] == '') {
		Atividade::setMsgError("Informe uma descrição para a atividade.");
		header("Location: /professor/atividade/create");
		exit;		
	}

	if (!isset($_POST['prograativ']) || $_POST['prograativ'] == '') {
		Atividade::setMsgError("Informe a que programa pertence a atividade.");
		header("Location: /professor/atividade/create");
		exit;		
	}						

	if (!isset($_POST['tipoativ']) || $_POST['tipoativ'] == '') {
		Atividade::setMsgError("Informe qual o tipo da atividade (Terrestre ou Aquática).");
		header("Location: /professor/atividade/create");
		exit;		
	}						

	if (!isset($_POST['origativ']) || $_POST['origativ'] == '') {
		Atividade::setMsgError("Informe é a origem desta atividade.");
		header("Location: /professor/atividade/create");
		exit;		
	}
	/*
	if (!isset($_POST['geneativ']) || $_POST['geneativ'] == '') {
		Atividade::setMsgError("Informe o genêro para esta atividade.");
		header("Location: /professor/atividade/create");
		exit;		
	}
	*/

	if (!isset($_POST['idfxetaria']) || $_POST['idfxetaria'] == '') {
		Atividade::setMsgError("Informe a faixa etária para esta atividade.");
		header("Location: /professor/atividade/create");
		exit;		
	}

	$atividade->setData($_POST);

	$atividade->save();

	$_SESSION['createAtivValues'] = NULL;

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
		'faixaetaria'=>Faixaetaria::listAll(),
		"error"=>Atividade::getMsgError()
	));
});

$app->post("/professor/atividade/:idativ", function($idativ) {

	User::verifyLogin();

	$atividade = new Atividade;

	$atividade->get((int)$idativ);

	if (!isset($_POST['nomeativ']) || $_POST['nomeativ'] == '') {
		Atividade::setMsgError("Informe o nome da atividade.");
		header("Location: /professor/atividade/".$idativ."");
		exit;		
	}	

	if (!isset($_POST['descativ']) || $_POST['descativ'] == '') {
		Atividade::setMsgError("Informe uma descrição para a atividade.");
		header("Location: /professor/atividade/".$idativ."");
		exit;		
	}

	if (!isset($_POST['prograativ']) || $_POST['prograativ'] == '') {
		Atividade::setMsgError("Informe a que programa pertence a atividade.");
		header("Location: /professor/atividade/".$idativ."");
		exit;		
	}						

	if (!isset($_POST['tipoativ']) || $_POST['tipoativ'] == '') {
		Atividade::setMsgError("Informe qual o tipo da atividade (Terrestre ou Aquática).");
		header("Location: /professor/atividade/".$idativ."");
		exit;		
	}						

	if (!isset($_POST['origativ']) || $_POST['origativ'] == '') {
		Atividade::setMsgError("Informe é a origem desta atividade.");
		header("Location: /professor/atividade/".$idativ."");
		exit;		
	}
	/*
	if (!isset($_POST['geneativ']) || $_POST['geneativ'] == '') {
		Atividade::setMsgError("Informe o genêro para esta atividade.");
		header("Location: /professor/atividade/".$idativ."");
		exit;		
	}
	*/

	if (!isset($_POST['idfxetaria']) || $_POST['idfxetaria'] == '') {
		Atividade::setMsgError("Informe a faixa etária para esta atividade.");
		header("Location: /professor/atividade/".$idativ."");
		exit;		
	}
	

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