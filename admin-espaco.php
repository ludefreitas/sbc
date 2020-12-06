<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Espaco;
use \Sbc\Model\Horario;
use \Sbc\Model\Local;


/*
$app->get("/professor/espaco", function() {

	User::verifyLogin();

	$espaco = Espaco::listAll();

	$page = new PageAdmin();

	$page->setTpl("espaco", array(
		'espaco'=>Espaco::checkList($espaco)
	));
});
*/

$app->get("/professor/espaco", function() {

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
			'href'=>'/professor/espaco?'.http_build_query([
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
		"search"=>$search,
		"pages"=>$pages
	));
});


$app->get("/professor/espaco/create", function() {

	User::verifyLogin();

	$local = Local::listAll();

	$horario = Horario::listAll();

	$page = new PageAdmin();

	$page->setTpl("espaco-create", array(
		'local'=>$local,
		'horario'=>$horario
	));
});


$app->post("/professor/espaco/create", function() {

	User::verifyLogin();

	$espaco = new Espaco();

	$espaco->setData($_POST);

	$espaco->save();

	header("Location: /professor/espaco");
	exit();	
});

$app->get("/professor/espaco/:idespaco/delete", function($idespaco) {

	User::verifyLogin();

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$espaco->delete();

	header("Location: /professor/espaco");
	exit();
	
});


$app->get("/professor/espaco/:idespaco", function($idespaco) {

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

$app->post("/professor/espaco/:idespaco", function($idespaco) {

	User::verifyLogin();

	$espaco = new Espaco;

	$espaco->get((int)$idespaco);

	$espaco->setData($_POST);

	$espaco->save();

	header("Location: /professor/espaco");
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
$app->get("/professor/espaco/:idespaco/horario", function($idespaco) {

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

$app->get("/professor/espaco/:idespaco/horario/:idhorario/add", function($idespaco, $idhorario) {

	User::verifyLogin();

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$horario = new Horario();

	$horario->get((int)$idhorario);

	$espaco->addHorario($horario);

	header("Location: /professor/espaco/".$idespaco."/horario");
	exit;
});

$app->get("/professor/espaco/:idespaco/horario/:idhorario/remove", function($idespaco, $idhorario) {

	User::verifyLogin();

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$horario = new Horario();

	$horario->get((int)$idhorario);

	$espaco->removeHorario($horario);

	header("Location: /professor/espaco/".$idespaco."/horario");
	exit;
});

*/

?>