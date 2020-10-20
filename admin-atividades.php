<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Atividade;
use \Sbc\Model\Faixaetaria;

$app->get("/professor/atividade", function() {

	User::verifyLogin();

	$atividade = Atividade::listAll();

	$page = new PageAdmin();

	$page->setTpl("atividade", array(
		'atividade'=>$atividade
	));
});

$app->get("/professor/atividade/create", function() {

	User::verifyLogin();

	$faixaetaria = Faixaetaria::listAll();

	$page = new PageAdmin();

	$page->setTpl("atividade-create", array(
		'faixaetaria'=>$faixaetaria
	));
});

$app->post("/professor/atividade/create", function() {

	User::verifyLogin();

	$atividade = new Atividade();

	$atividade->setData($_POST);

	$atividade->save();

	header("Location: /professor/atividade");
	exit();	
});

$app->get("/professor/atividade/:idativ/delete", function($idativ) {

	User::verifyLogin();

	$atividade = new Atividade();

	$atividade->get((int)$idativ);

	$atividade->delete();

	header("Location: /professor/atividade");
	exit();
	
});


$app->get("/professor/atividade/:idativ", function($idativ) {

	User::verifyLogin();

	$atividade = new Atividade;

	$atividade->get((int)$idativ);

	$page = new PageAdmin();

	$page->setTpl("atividade-update", array(
		'atividade'=>$atividade->getValues(),
		'faixaetaria'=>Faixaetaria::listAll()
	));
});

$app->post("/professor/atividade/:idativ", function($idativ) {

	User::verifyLogin();

	$atividade = new Atividade;

	$atividade->get((int)$idativ);

	$atividade->setData($_POST);

	$atividade->save();

	header("Location: /professor/atividade");
	exit();	
});

$app->get("/atividade/:idativ", function($idativ) {

	$atividade = new Atividade();

	$atividade->get((int)$idativ);

	$page = new Page();

	$page->setTpl("atividade", [
		'atividade'=>$atividade->getValues()
	]);	

});




?>