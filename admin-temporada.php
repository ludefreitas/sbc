<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Temporada;
use \Sbc\Model\StatusTemporada;
use \Sbc\Model\Turma;

$app->get("/professor/temporada", function() {

	User::verifyLogin();

	$temporada = Temporada::listAll();

	$page = new PageAdmin();

	$page->setTpl("temporada", array(
		'temporada'=>$temporada
	));
});


$app->get("/professor/temporada/create", function() {

	User::verifyLogin();

	$temporada = Temporada::listAll();

	$statustemporada = StatusTemporada::listAll();

	$page = new PageAdmin();

	$page->setTpl("temporada-create", array(
		'temporada'=>$temporada,
		'statustemporada'=>$statustemporada
	));
});


$app->post("/professor/temporada/create", function() {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->setData($_POST);

	$temporada->save();

	header("Location: /professor/temporada");
	exit();	
});


$app->get("/professor/temporada/:idtemporada/delete", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$temporada->delete();

	header("Location: /professor/temporada");
	exit();	
});

$app->get("/professor/temporada/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada;	

	$temporada->get((int)$idtemporada);

	$page = new PageAdmin();

	$page->setTpl("temporada-update", array(
		'temporada'=>$temporada->getValues(),
		'statustemporada'=>StatusTemporada::listAll()		
	));
});

$app->post("/professor/temporada/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada;

	$temporada->get((int)$idtemporada);

	$temporada->setData($_POST);

	$temporada->save();

	header("Location: /professor/temporada");
	exit();	
});

$app->get("/professor/turma-temporada/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();

	$temporada->get((int)$idtemporada);	

	//var_dump($temporada->getTurma(true)); exit();

	$page = new PageAdmin();	

	$page->setTpl("turmas-por-temporada", [
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmaRelated'=>Temporada::listAllTurmatemporada($idtemporada),
		//'turmaNotRelated'=>$temporada->getTurma(false)
	]);	
});

$app->get("/professor/temporada/:idtemporada/turma", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);	

	$page = new PageAdmin();	

	$page->setTpl("turma-temporada", [
		'temporada'=>$temporada->getValues(),
		'turmaRelated'=>$temporada->getTurma(true),
		'turmaNotRelated'=>$temporada->getTurma(false)
	]);	
});

$app->get("/professor/temporada/:idtemporada/turma/:idturma/add", function($idtemporada, $idturma) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$temporada->addTurma($turma);

	header("Location: /professor/temporada/".$idtemporada."/turma");
	exit;
});

$app->get("/professor/temporada/:idtemporada/turma/:idturma/remove", function($idtemporada, $idturma) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$temporada->removeTurma($turma);

	header("Location: /professor/temporada/".$idtemporada."/turma");
	exit;

});














?>