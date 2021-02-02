<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Insc;



$app->get("/professor/insc", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Insc::getPageSearch($search, $page);

	} else {

		$pagination = Insc::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/professor/insc?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}
	//$insc = insc::listAll();

	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("insc", array( // aqui temos um array com muitos arrays
		"insc"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
	));
});


$app->get("/professor/insc/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("insc-create");
});

$app->post("/professor/insc/create", function() {

	User::verifyLogin();

	$insc = new Insc();

	$insc->setData($_POST);

	$insc->save();

	header("Location: /professor/insc");
	exit();
});

$app->get("/professor/insc/:idinsc/delete", function($idinsc) {

	User::verifyLogin();

	$insc = new Insc();

	$insc->get((int)$idinsc);

	$insc->delete();

	header("Location: /professor/insc");
	exit();
	
});

$app->get("/professor/insc/:idinsc", function($idinsc) {

	User::verifyLogin();

	$insc = new Insc();

	$insc->get((int)$idinsc);

	$page = new PageAdmin();

	$page->setTpl("insc-update", [
		'insc'=>$insc->getValues()
	]);	
	
});

$app->post("/professor/insc/:idinsc", function($idinsc) {

	User::verifyLogin();

	$insc = new Insc();

	$insc->get((int)$idinsc);

	$insc->setData($_POST);

	$insc->save();

	header("Location: /professor/insc");
	exit();		
});

$app->get("/insc/:idinsc", function($idinsc) {

	$insc = new Insc();

	$insc->get((int)$idinsc);

	$page = new Page();

	$page->setTpl("insc", [
		'insc'=>$insc->getValues()
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
