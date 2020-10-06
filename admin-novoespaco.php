<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\NovoEspaco;

$app->get("/professor/novoespaco", function() {

	User::verifyLogin();

	$novoespaco = NovoEspaco::listAll();

	$page = new PageAdmin();

	$page->setTpl("novoespaco", array(
		'novoespaco'=>$novoespaco
	));
});

$app->get("/professor/novoespaco/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("novoespaco-create");
});

$app->post("/professor/novoespaco/create", function() {

	User::verifyLogin();

	$novoespaco = new NovoEspaco();

	$novoespaco->setData($_POST);

	$novoespaco->save();

	header("Location: /professor/novoespaco");
	exit();	
});

$app->get("/professor/novoespaco/:idespaco/delete", function($idespaco) {

	User::verifyLogin();

	$novoespaco = new NovoEspaco();

	$novoespaco->get((int)$idespaco);

	$novoespaco->delete();

	header("Location: /professor/novoespaco");
	exit();
	
});


$app->get("/professor/novoespaco/:idespaco", function($idespaco) {

	User::verifyLogin();

	$novoespaco = new NovoEspaco;

	$novoespaco->get((int)$idespaco);

	$page = new PageAdmin();

	$page->setTpl("novoespaco-update", array(
		'novoespaco'=>$novoespaco->getValues()
	));
});

$app->post("/professor/novoespaco/:idespaco", function($idespaco) {

	User::verifyLogin();

	$novoespaco = new NovoEspaco;

	$novoespaco->get((int)$idespaco);

	$novoespaco->setData($_POST);

	$novoespaco->save();

	header("Location: /professor/novoespaco");
	exit();	
});

$app->get("/novoespaco/:idespaco", function($idespaco) {

	$novoespaco = new NovoEspaco();

	$novoespaco->get((int)$idespaco);

	$page = new Page();

	$page->setTpl("novoespaco", [
		'novoespaco'=>$novoespaco->getValues()
	]);	

});


?>