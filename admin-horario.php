<?php

use \Sbc\Page;
use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Horario;

$app->get("/professor/horario", function() {

	User::verifyLogin();

	$horario = Horario::listAll();

	$page = new PageAdmin();

	$page->setTpl("horario", array(
		'horario'=>$horario
	));
});

$app->get("/professor/horario/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("horario-create");
});

$app->post("/professor/horario/create", function() {

	User::verifyLogin();

	$horario = new Horario();

	$horario->setData($_POST);

	$horario->save();

	header("Location: /professor/horario");
	exit();
});

$app->get("/professor/horario/:idhorario/delete", function($idhorario) {

	User::verifyLogin();

	$horario = new Horario();

	$horario->get((int)$idhorario);

	$horario->delete();

	header("Location: /professor/horario");
	exit();
	
});

$app->get("/professor/horario/:idhorario", function($idhorario) {

	User::verifyLogin();

	$horario = new Horario();

	$horario->get((int)$idhorario);

	$page = new PageAdmin();

	$page->setTpl("horario-update", [
		'horario'=>$horario->getValues()
	]);	
	
});

$app->post("/professor/horario/:idhorario", function($idhorario) {

	User::verifyLogin();

	$horario = new Horario();

	$horario->get((int)$idhorario);

	$horario->setData($_POST);

	$horario->save();

	header("Location: /professor/horario");
	exit();		
});

$app->get("/horario/:idhorario", function($idhorario) {

	$horario = new Horario();

	$horario->get((int)$idhorario);

	$page = new Page();

	$page->setTpl("horario", [
		'horario'=>$horario->getValues()
	]);	

});


?>