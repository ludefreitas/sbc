<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Local;
use \Sbc\Model\Espaco;

use \Sbc\Page;

$app->get("/professor/local", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Local::getPageSearch($search, $page);

	} else {

		$pagination = Local::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/professor/local?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}
	//$local = Local::listAll();

	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("local", array( // aqui temos um array com muitos arrays
		"local"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>Local::getMsgError()
	));
});


$app->get("/professor/local/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("local-create");
});

$app->post("/professor/local/create", function() {

	User::verifyLogin();

	$local = new Local();

	$local->setData($_POST);

	$local->save();

	header("Location: /professor/local");
	exit();
});

$app->get("/professor/local/:idlocal/delete", function($idlocal) {

	User::verifyLogin();

	$local = new Local();

	$local->get((int)$idlocal);

	$local->delete();

	header("Location: /professor/local");
	exit();
	
});

$app->get("/professor/local/:idlocal", function($idlocal) {

	User::verifyLogin();

	$local = new Local();

	$local->get((int)$idlocal);

	$page = new PageAdmin();

	$page->setTpl("local-update", [
		'local'=>$local->getValues()
	]);	
	
});

$app->post("/professor/local/:idlocal", function($idlocal) {

	User::verifyLogin();

	$local = new Local();

	$local->get((int)$idlocal);

	$local->setData($_POST);

	$local->save();

	header("Location: /professor/local");
	exit();		
});

$app->get("/local/:idlocal", function($idlocal) {

	$local = new Local();

	$local->get((int)$idlocal);

	$page = new Page();

	$page->setTpl("local", [
		'local'=>$local->getValues()
	]);	

});


/*
$app->get("/professor/local/:idlocal/espaco", function($idlocal) {

	User::verifyLogin();

	$local = new Local();

	$local->get((int)$idlocal);

	$page = new PageAdmin();	

	$page->setTpl("espaco-local", [
		'local'=>$local->getValues(),
		'espacoRelated'=> $local->getEspaco(true),
		'espacoNotRelated'=>$local->getEspaco(false)
	]);	
});

$app->get("/professor/local/:idlocal/espaco/:idespaco/add", function($idlocal, $idespaco) {

	User::verifyLogin();

	$local = new Local();

	$local->get((int)$idlocal);

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$local->addEspaco($espaco);

	header("Location: /professor/local/".$idlocal."/espaco");
	exit;
});

$app->get("/professor/local/:idlocal/espaco/:idespaco/remove", function($idlocal, $idespaco) {

	User::verifyLogin();

	$local = new Local();

	$local->get((int)$idlocal);

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$local->removeEspaco($espaco);

	header("Location: /professor/local/".$idlocal."/espaco");
	exit;

});
*/

?>
