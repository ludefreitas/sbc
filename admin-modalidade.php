<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Modalidade;
use \Sbc\Model\Faixaetaria;

$app->get("/professor/modalidades", function() {

	User::verifyLogin();

	$modalidade = Modalidade::listAll();

	$page = new PageAdmin();

	$page->setTpl("modalidades", array(
		'modalidades'=>Modalidade::checkList($modalidade)
	));
});

$app->get("/professor/modalidades/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("modalidades-create");
});

$app->post("/professor/modalidades/create", function() {

	User::verifyLogin();

	$modalidade = new Modalidade();

	$modalidade->setData($_POST);

	$modalidade->save();

	header("Location: /professor/modalidades");
	exit();	
});

$app->get("/professor/modalidades/:idmodal/delete", function($idmodal) {

	User::verifyLogin();

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	$modalidade->delete();

	header("Location: /professor/modalidades");
	exit();
	
});


$app->get("/professor/modalidades/:idmodal", function($idmodal) {

	User::verifyLogin();

	$modalidade = new Modalidade;

	$modalidade->get((int)$idmodal);

	$page = new PageAdmin();

	$page->setTpl("modalidades-update", array(
		'modalidades'=>$modalidade->getValues()
	));
});

$app->post("/professor/modalidades/:idmodal", function($idmodal) {

	User::verifyLogin();

	$modalidade = new Modalidade;

	$modalidade->get((int)$idmodal);

	$modalidade->setData($_POST);

	$modalidade->save();

	header("Location: /professor/modalidades");
	exit();	
});

$app->get("/modalidades/:idmodal", function($idmodal) {

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	$page = new Page();

	$page->setTpl("modalidades", [
		'modalidades'=>$modalidade->getValues()
	]);	

});




?>