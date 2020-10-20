<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Espaco;
use \Sbc\Model\Local;
use \Sbc\Model\Horario;
use \Sbc\Model\Atividade;
use \Sbc\Model\TurmaStatus;
use \Sbc\Model\Turma;

$app->get("/professor/turma", function() {

	User::verifyLogin();

	$turma = Turma::listAll();

	$page = new PageAdmin();

	$page->setTpl("turma", array(
		'turma'=>$turma
	));
});

$app->get("/professor/turma/create", function() {

	User::verifyLogin();

	$local = Local::listAll();
	//$espaco = Espaco::listAll();
	$user = User::listAllProf();
	//$horario = Horario::listAll();
	$atividade = Atividade::listAll();
	$turmastatus = TurmaStatus::listAll();

	$page = new PageAdmin();

	$page->setTpl("turma-create", array(
		'local'=>$local,
		//'horario'=>$horario,
		'user'=>$user,
		'atividade'=>$atividade,
		'espaco'=>Espaco::listAll(),
		'turmastatus'=>$turmastatus
	));
});

$app->post("/professor/turma/create", function() {

	User::verifyLogin();

	$turma = new Turma();

	$turma->setData($_POST);

	$turma->save();

	header("Location: /professor/turma");
	exit();	
});

$app->get("/professor/turma/:idturma/delete", function($idturma) {

	User::verifyLogin();

	$turma = new Turma();

	$turma->get((int)$idturma);

	$turma->delete();

	header("Location: /professor/turma");
	exit();
	
});


$app->get("/professor/turma/:idturma", function($idturma) {

	User::verifyLogin();

	$turma = new Turma;

	$turma->get((int)$idturma);

	$page = new PageAdmin();

	$page->setTpl("turma-update", array(
		'turma'=>$turma->getValues(),
		'turmastatus'=>TurmaStatus::listAll(),
		'atividade'=>Atividade::listAll(),
		'users'=>User::listAllProf(),
		'espaco'=>Espaco::listAll()
	));
});

$app->post("/professor/turma/:idturma", function($idturma) {

	User::verifyLogin();

	$turma = new Turma;

	$turma->get((int)$idturma);

	$turma->setData($_POST);

	$turma->save();

	header("Location: /professor/turma");
	exit();	
});

$app->get("/turma/:idturma", function($idturma) {

	$turma = new Turma();

	$turma->get((int)$idturma);

	$page = new Page();

	$page->setTpl("turma", [
		'turma'=>$turma->getValues()
	]);	

});


?>