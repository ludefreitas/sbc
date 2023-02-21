<?php

use \Sbc\PageProf;
use \Sbc\Model\User;
use \Sbc\Model\Temporada;
use \Sbc\Model\Turma;
use \Sbc\Model\Local;

$app->get("/prof/turma-temporada/:idtemporada", function($idtemporada) {

	User::verifyLoginProf();

	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();

	$locais = Local::listAllCoord($iduser);

	$temporada->get((int)$idtemporada);

	$local = $local->setapelidolocal('');

	$page = new PageProf();	

	$page->setTpl("turmas-por-temporada", [	
		'local'=>$local,
		'locais'=>$locais,
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		//'turmas'=>Temporada::listAllTurmatemporada($idtemporada),
		'turmas'=>Temporada::listAllTurmatemporadaProfessor($idtemporada, $iduser),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});

$app->get("/prof/turma-temporada/:idtemporada/local/:idlocal", function($idtemporada, $idlocal) {

	User::verifyLoginProf();

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();
	$temporada->get((int)$idtemporada);
	$local->get((int)$idlocal);

	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	//var_dump($local);
	//exit();

	$page = new PageProf();	

	$page->setTpl("turmas-por-temporada", [
		'local'=>$local->getValues(),
		//'locais'=>Local::listAll(),
		'locais'=>Local::listAllCoord($iduser),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmatemporadaLocal($idtemporada, $idlocal),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});


?>