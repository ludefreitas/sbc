<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Modalidade;
use \Sbc\Model\Faixaetaria;

$app->get("/professor/modalidade", function() {

	User::verifyLogin();

	$modalidade = Modalidade::listAll();

	$page = new PageAdmin();

	$page->setTpl("modalidade", array(
		'modalidade'=>Modalidade::checkList($modalidade)
	));
});

$app->get("/professor/modalidade/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("modalidade-create");
});

$app->post("/professor/modalidade/create", function() {

	User::verifyLogin();

	$modalidade = new Modalidade();

	$modalidade->setData($_POST);

	$modalidade->save();

	header("Location: /professor/modalidade");
	exit();	
});

$app->get("/professor/modalidade/:idmodal/delete", function($idmodal) {

	User::verifyLogin();

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	$modalidade->delete();

	header("Location: /professor/modalidade");
	exit();
	
});


$app->get("/professor/modalidade/:idmodal", function($idmodal) {

	User::verifyLogin();

	$modalidade = new Modalidade;

	$modalidade->get((int)$idmodal);

	$page = new PageAdmin();

	$page->setTpl("modalidade-update", array(
		'modalidade'=>$modalidade->getValues()
	));
});

$app->post("/professor/modalidade/:idmodal", function($idmodal) {

	User::verifyLogin();

	$modalidade = new Modalidade;

	$modalidade->get((int)$idmodal);

	$modalidade->setData($_POST);

	$modalidade->save();

	header("Location: /professor/modalidade");
	exit();	
});

$app->get("/modalidade/:idmodal", function($idmodal) {

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	$page = new Page();

	$page->setTpl("modalidade", [
		'modalidade'=>$modalidade->getValues()
	]);	

});




?>