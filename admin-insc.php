<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Insc;
use \Sbc\Model\Pessoa;
use \Sbc\Model\Turma;
use \Sbc\Model\Temporada;



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

/*
$app->get("/professor/insc/:idinsc", function($idinsc) {

	User::verifyLogin();

	$insc = new Insc();

	$insc->get((int)$idinsc);

	$page = new PageAdmin();

	$page->setTpl("insc-update", [
		'insc'=>$insc->getValues()
	]);	
	
});
*/

$app->post("/professor/insc/:idinsc", function($idinsc) {

	User::verifyLogin();

	$insc = new Insc();

	$insc->get((int)$idinsc);

	$insc->setData($_POST);

	$insc->save();

	header("Location: /professor/insc");
	exit();		
});

/*
$app->get("/insc/:idinsc", function($idinsc) {

	$insc = new Insc();

	$insc->get((int)$idinsc);

	$page = new Page();

	$page->setTpl("insc", [
		'insc'=>$insc->getValues()
	]);	

});
*/

$app->get("/professor/profile/insc/:idinsc/:idpess", function($idinsc, $idpess){

	User::verifyLogin();

	$insc = new Insc();

	$insc->get((int)$idinsc);	

	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);	

	//$insc = Insc::getFromId($idinsc);

	$page = new PageAdmin();

	$page->setTpl("insc-detail", [
		'insc'=>$insc->getValues(),
		'pessoa'=>$pessoa->getValues()
	]);	

});

/*

$app->get("/professor/insc/pessoa/:idpess", function($idpess){

	User::verifyLogin();

	$insc = new Insc();

	$insc->get((int)$idpess);
	//$insc->get((int)$idpess);		

	echo '<pre>';
	print_r($insc);
	echo '</pre>';
	exit();

	$page = new PageAdmin();

	$page->setTpl("insc-pessoa", [
		'insc'=>$insc->getValues()
	]);	

});

*/

$app->get("/professor/insc/pessoa/:idepess", function($idpess){

	User::verifyLogin();

	$pessoa = new Pessoa;

	$pessoa->get((int)$idpess);

	//var_dump($pessoa);
	//exit();

	$page = new PageAdmin();

	$page->setTpl("insc-pessoa", [
		'insc'=>$pessoa->getInsc(),
		'pessoa'=>$pessoa->getValues()
	]);

});

$app->get("/professor/insc-turma-temporada/:idturma/:idtemporada", function($idturma, $idtemporada) {

	User::verifyLogin();

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);
	$turma->get((int)$idturma);

	$insc->getInscByTurmaTemporada($idturma, $idtemporada);

	/*
	echo '<pre>';
	print_r($insc->getValues());
	echo '</pre>';
	exit();
	*/

	$page = new PageAdmin();	

	$page->setTpl("insc-turma-temporada", [
		'insc'=>$insc->getValues(),
		'turma'=>$turma->getValues(),
		'temporada'=>$temporada->getValues()
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
