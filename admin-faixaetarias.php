<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Faixaetaria;

$app->get("/professor/faixaetaria", function() {

	User::verifyLogin();

	$faixaetaria = Faixaetaria::listAll();

	$page = new PageAdmin();

	$page->setTpl("faixaetaria", array(
		'faixaetaria'=>$faixaetaria
	));
});

$app->get("/professor/faixaetaria/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("faixaetaria-create");
});

$app->post("/professor/faixaetaria/create", function() {

	User::verifyLogin();

	$faixaetaria = new Faixaetaria();

	$faixaetaria->setData($_POST);

	$faixaetaria->save();

	header("Location: /professor/faixaetaria");
	exit();
});

$app->get("/professor/faixaetaria/:idfxetaria/delete", function($idfxetaria) {

	User::verifyLogin();

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	$faixaetaria->delete();

	header("Location: /professor/faixaetaria");
	exit();
	
});

$app->get("/professor/faixaetaria/:idfxetaria", function($idfxetaria) {

	User::verifyLogin();

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	$page = new PageAdmin();

	$page->setTpl("faixaetaria-update", [
		'faixaetaria'=>$faixaetaria->getValues()
	]);	
	
});

$app->post("/professor/faixaetaria/:idfxetaria", function($idfxetaria) {

	User::verifyLogin();

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	$faixaetaria->setData($_POST);

	$faixaetaria->update();

	header("Location: /professor/faixaetaria");
	exit();		
});

$app->get("/faixaetaria/:idfxetaria", function($idfxetaria) {

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	$page = new Page();

	$page->setTpl("faixaetaria", [
		'faixaetaria'=>$faixaetaria->getValues(),
		'modalidades'=>[]
	]);	

});


?>