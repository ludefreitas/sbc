<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Espaco;
use \Sbc\Model\Horario;
use \Sbc\Model\Local;

$app->get("/admin/espaco", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Espaco::getPageSearch($search, $page);

	} else {

		$pagination = Espaco::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/espaco?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}
	//$espaco = Espaco::listAll();

	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("espaco", array( // aqui temos um array com muitos arrays
		"espaco"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>Espaco::getMsgError()		
	));
});

$app->get("/admin/espaco/create", function() {

	User::verifyLogin();

	$local = Local::listAll();

	$horario = Horario::listAll();

	$page = new PageAdmin();

	$page->setTpl("espaco-create", array(
		'local'=>$local,
		'horario'=>$horario,
		"error"=>Espaco::getMsgError(),
		"createEspacoValues"=>(
				isset($_SESSION['createEspacoValues'])) 
				    ? $_SESSION['createEspacoValues'] 
			        : ['nomeespaco'=>'', 'descespaco'=>'', 'areaespaco'=>'', 'observacao'=>'']
	));
});


$app->post("/admin/espaco/create", function() {

	User::verifyLogin();

	$_SESSION['createEspacoValues'] = $_POST;

	$espaco = new Espaco();

	if (!isset($_POST['nomeespaco']) || $_POST['nomeespaco'] == '') {
		Espaco::setMsgError("Informe o nome do espaço.");
		header("Location: /admin/espaco/create");
		exit;		
	}	

	if (!isset($_POST['descespaco']) || $_POST['descespaco'] == '') {
		Espaco::setMsgError("Informe uma descrição para o espaço.");
		header("Location: /admin/espaco/create");
		exit;		
	}

	if (!isset($_POST['areaespaco']) || $_POST['areaespaco'] == '') {
		Espaco::setMsgError("Informe a área em (m²) a medida do espaço.");
		header("Location: /admin/espaco/create");
		exit;		
	}						

	if (!isset($_POST['observacao']) || $_POST['observacao'] == '') {
		Espaco::setMsgError("Descreva uma observação para o espaço.");
		header("Location: /admin/espaco/create");
		exit;		
	}

	if (!isset($_POST['idlocal']) || $_POST['idlocal'] == '') {
		Espaco::setMsgError("Informe onde está localizado este espaço.");
		header("Location: /admin/espaco/create");
		exit;		
	}												

	$espaco->setData($_POST);

	$espaco->save();

	$_SESSION['createEspacoValues'] = NULL;

	header("Location: /admin/espaco");
	exit();	
});

$app->get("/admin/espaco/:idespaco/delete", function($idespaco) {

	User::verifyLogin();

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$espaco->delete();

	header("Location: /admin/espaco");
	exit();
	
});


$app->get("/admin/espaco/:idespaco", function($idespaco) {

	User::verifyLogin();

	$espaco = new Espaco;

	//$local = Local::listAll();
	
	//$horario = Horario::listAll();

	$espaco->get((int)$idespaco);

	$page = new PageAdmin();

	$page->setTpl("espaco-update", array(
		'espaco'=>$espaco->getValues(),
		'local'=>Local::listAll(),
		'horario'=>Horario::listAll()
	));
});

$app->post("/admin/espaco/:idespaco", function($idespaco) {

	User::verifyLogin();

	$espaco = new Espaco;

	$espaco->get((int)$idespaco);

	$espaco->setData($_POST);

	$espaco->save();

	header("Location: /admin/espaco");
	exit();	
});

$app->post("/admin/espaco/:idespaco", function($idespaco){

	User::verifyLogin();

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$espaco->setData($_POST);

	$espaco->save();

	$espaco->setPhoto($_FILES["file"]);

	header('Location: /admin/espaco');
	exit;

});

/*
$app->get("/admin/espaco/:idespaco/horario", function($idespaco) {

	User::verifyLogin();

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$page = new PageAdmin();

	//var_dump($page);	exit();

	$page->setTpl("horario-espaco", [
		'espaco'=>$espaco->getValues(),
		'horarioRelated'=> $espaco->getHorario(true),
		'horarioNotRelated'=>$espaco->getHorario(false)
	]);	
});

$app->get("/admin/espaco/:idespaco/horario/:idhorario/add", function($idespaco, $idhorario) {

	User::verifyLogin();

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$horario = new Horario();

	$horario->get((int)$idhorario);

	$espaco->addHorario($horario);

	header("Location: /admin/espaco/".$idespaco."/horario");
	exit;
});

$app->get("/admin/espaco/:idespaco/horario/:idhorario/remove", function($idespaco, $idhorario) {

	User::verifyLogin();

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$horario = new Horario();

	$horario->get((int)$idhorario);

	$espaco->removeHorario($horario);

	header("Location: /admin/espaco/".$idespaco."/horario");
	exit;
});

*/

?>