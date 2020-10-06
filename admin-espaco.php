<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Espaco;

$app->get("/professor/espaco", function() {

	User::verifyLogin();

	$espaco = Espaco::listAll();

	$page = new PageAdmin();

	$page->setTpl("espaco", array(
		'espaco'=>$espaco
	));
});

$app->get("/professor/espaco/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("espaco-create");
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

	$espaco->get((int)$idespaco);

	$page = new PageAdmin();

	$page->setTpl("espaco-update", array(
		'espaco'=>$espaco->getValues()
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

$app->get("/espaco/:idespaco", function($idespaco) {

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$page = new Page();

	$page->setTpl("espaco", [
		'espaco'=>$espaco->getValues()
	]);	

});

$app->get("/professor/espaco/:idespaco/horario", function($idespaco) {

	User::verifyLogin();

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$page = new PageAdmin();

	//var_dump($page);	exit();



	$page->setTpl("horario-espaco", [
		'espaco'=>$espaco->getValues(),
		'horarioRelated'=> [],
		'horarioNotRelated'=>[]
	]);	

});


?>