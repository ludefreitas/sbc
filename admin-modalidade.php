<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Modalidade;
use \Sbc\Model\Faixaetaria;

$app->get("/professor/modalidades", function() {

	User::verifyLogin();

	$modalidades = Modalidade::listAll();

	$page = new PageAdmin();

	$page->setTpl("modalidades", array(
		'modalidades'=>Modalidade::checkList($modalidades)
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

	$modalidades->get((int)$idmodal);

	$modalidades->delete();

	header("Location: /professor/modalidades");
	exit();
	
});


$app->get("/professor/modalidades/:idmodal", function($idmodal) {

	User::verifyLogin();

	$modalidades = new Modalidade;

	$modalidades->get((int)$idmodal);

	$page = new PageAdmin();

	$page->setTpl("modalidades-update", array(
		'modalidades'=>$modalidades->getValues()
	));
});

$app->post("/professor/modalidades/:idmodal", function($idmodal) {

	User::verifyLogin();

	$modalidades = new Modalidade;

	$modalidades->get((int)$idmodal);

	$modalidades->setData($_POST);

	$modalidades->save();

	header("Location: /professor/modalidades");
	exit();	
});

$app->get("/modalidades/:idmodal", function($idmodal) {

	$modalidades = new Modalidade();

	$modalidades->get((int)$idmodal);

	$page = new Page();

	$page->setTpl("modalidades", [
		'modalidades'=>$modalidades->getValues()
	]);	

});




?>