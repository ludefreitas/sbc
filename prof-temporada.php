<?php

use \Sbc\PageProf;
use \Sbc\Model\User;
use \Sbc\Model\Temporada;
use \Sbc\Model\Turma;

$app->get("/prof/turma-temporada/:idtemporada", function($idtemporada) {

	User::verifyLoginProf();

	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	$temporada = new Temporada();
	$turma = new Turma();

	$temporada->get((int)$idtemporada);

	

	$page = new PageProf();	

	$page->setTpl("turmas-por-temporada", [	
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		//'turmas'=>Temporada::listAllTurmatemporada($idtemporada),
		'turmas'=>Temporada::listAllTurmatemporadaProfessor($idtemporada, $iduser),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});


?>