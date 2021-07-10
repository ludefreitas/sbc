<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Temporada;
use \Sbc\Model\StatusTemporada;
use \Sbc\Model\Turma;
use \Sbc\Model\Sorteio;

$app->get("/professor/temporada", function() {

	User::verifyLogin();

	$temporada = Temporada::listAll();

	$page = new PageAdmin();

	$page->setTpl("temporada", array(
		'temporada'=>$temporada,
		'error'=>Temporada::getError()
	));
});


$app->get("/professor/temporada/create", function() {

	User::verifyLogin();

	$temporada = Temporada::listAll();

	$statustemporada = StatusTemporada::listAll();

	$page = new PageAdmin();

	$page->setTpl("temporada-create", array(
		'temporada'=>$temporada,
		'statustemporada'=>$statustemporada,
		'error'=>Temporada::getError()
	));
});

$app->get("/professor/professor-temporada/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);


	$proftemporada = Temporada::listaProf($idtemporada);

	if(!$proftemporada){
		Temporada::setError("Não há professores para esta turma, você precisa relacionar turmas a esta temporada!");
	}

	$page = new PageAdmin();

	$page->setTpl("prof-temporada", array(
		'prof'=>$proftemporada,
		'temporada'=>$temporada->getValues(),
		'error'=>Temporada::getError()
	));
});


$app->post("/professor/temporada/create", function() {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->setData($_POST);

	$desctemporada = $_POST['desctemporada'];
	$idstatustemporada = $_POST['idstatustemporada'];

	Temporada::temporadaExiste($desctemporada);
	Temporada::temporadaStatusExiste($idstatustemporada);
	/*
	if((bool)Temporada::temporadaStatusIniciadaExiste()){
		Temporada::setError("Já existe uma temporada com inscrição ou matrícula iniciada. Não pode existir mais de ma temporada com inscrição ou matrícula iniciada.");
		header("Location: /professor/temporada");
		exit;
	}
	*/

	$temporada->save();

	header("Location: /professor/temporada");
	exit();	

});


$app->get("/professor/temporada/:idtemporada/delete", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$sorteio = new Sorteio();

	$temporada->get((int)$idtemporada);

	$desctemporada = $temporada->getdesctemporada();

	$temporada->delete();
	$sorteio->excluiTabelaSorteio($desctemporada);

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

	$idstatustemporada = $_POST['idstatustemporada'];

	Temporada::temporadaStatusExiste($idstatustemporada);

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
		'turmas'=>Temporada::listAllTurmatemporada($idtemporada),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
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
		'turmaNotRelated'=>$temporada->getTurma(false),
		'error'=>User::getError()
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