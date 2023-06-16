<?php

use \Sbc\PageAudi;
use \Sbc\Model\User;
use \Sbc\Model\Pessoa;
use \Sbc\Model\Insc;
use \Sbc\Model\Temporada;

$app->get("/audi", function() {

	User::verifyLoginAudi();

	$temporada = Temporada::listAll();

	$userOnline = User::pega_totalUsuariosOnline();

	$visitOnline = User::pega_totalVisitantesOnline();

	$idtemporada = Temporada::selecionaTemporadaMatriEncerrada();

	$idtemporada = $idtemporada[0]['idtemporada'];

	$pagina = 1;
	$todosUsuarios = User::getPage($pagina);
	$todosAlunos = Pessoa::getPage($pagina);
	$todosProfessores = User::getPageProf($pagina);
	$todasInscrições = Insc::getPageInsc($pagina);
	$matriculadosTemporada = Insc::numMatriculadosTemporada($idtemporada);

	$matriculadosTemporada = $matriculadosTemporada[0]['matriculados'];

	$page = new PageAudi();

	$page->setTpl("index", [
		'useronline'=>$userOnline,
		'visitante'=>$visitOnline,
		'temporada'=>$temporada,
		'totalUsuarios'=>$todosUsuarios['total'],
		'totalAlunos'=>$todosAlunos['total'],
		'totalProfessores'=>$todosProfessores['total'],
		'totalInscricoes'=>$todasInscrições['total'],
		//'matriculadosTemporada'=>$matriculadosTemporada,
	
	]);
});

$app->get("/audi/dadostemporada/:desctemporada", function($desctemporada) {

	User::verifyLoginAudi();

	$temporada = Temporada::listAll();

	$userOnline = User::pega_totalUsuariosOnline();

	$visitOnline = User::pega_totalVisitantesOnline();

	$idtemporada = Temporada::selecionaTemporadaMatriEncerrada();

	$idtemporada = $idtemporada[0]['idtemporada'];

	$pagina = 1;
	$todosUsuarios = User::getPage($pagina);
	$todosAlunos = Pessoa::getPage($pagina);
	$todosProfessores = User::getPageProf($pagina);
	$todasInscrições = Insc::getPageInsc($pagina);
	$matriculadosTemporada = Insc::numMatriculadosTemporada($idtemporada);

	$matriculadosTemporada = $matriculadosTemporada[0]['matriculados'];

	$page = new PageAudi();

	$page->setTpl("dadostemporada", [
		'useronline'=>$userOnline,
		'visitante'=>$visitOnline,
		'temporada'=>$temporada,
		'desctemporada'=>$desctemporada,
		'totalUsuarios'=>$todosUsuarios['total'],
		'totalAlunos'=>$todosAlunos['total'],
		'totalProfessores'=>$todosProfessores['total'],
		'totalInscricoes'=>$todasInscrições['total'],
		//'matriculadosTemporada'=>$matriculadosTemporada,
	
	]);
});


?>