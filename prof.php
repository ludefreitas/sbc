<?php

use \Sbc\PageProf;
use \Sbc\Model\User;
use \Sbc\Model\Temporada;
use \Sbc\Model\Pessoa;
use \Sbc\Model\Insc;

$app->get("/prof", function() {

	User::verifyLoginProf();
	
	$userOnline = User::pega_totalUsuariosOnline();

	$visitOnline = User::pega_totalVisitantesOnline();
	
	$temporada = Temporada::listAll();
	
	$idtemporada = Temporada::selecionaTemporadaMatriEncerrada();

	$idtemporada = $idtemporada[0]['idtemporada'];
	
	$pagina = 1;
	$todosUsuarios = User::getPage($pagina);
	$todosAlunos = Pessoa::getPage($pagina);
	$todosProfessores = User::getPageProf($pagina);
	$todasInscrições = Insc::getPageInsc($pagina);
	
	$matriculadosTemporada = Insc::numMatriculadosTemporada($idtemporada);

	$matriculadosTemporada = $matriculadosTemporada[0]['matriculados'];

	$page = new PageProf();

	$page->setTpl("index", [
		'useronline'=>$userOnline,
		'visitante'=>$visitOnline,
		'temporada'=>$temporada,
		'totalUsuarios'=>$todosUsuarios['total'],
		'totalAlunos'=>$todosAlunos['total'],
		'totalProfessores'=>$todosProfessores['total'],
		'totalInscricoes'=>$todasInscrições['total'],
		'matriculadosTemporada'=>$matriculadosTemporada,
	]);
});

$app->get("/prof/dadostemporada/:desctemporada", function($desctemporada) {

	User::verifyLoginProf();

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

	$page = new PageProf();

	$page->setTpl("dadostemporada", [
		'useronline'=>$userOnline,
		'visitante'=>$visitOnline,
		'temporada'=>$temporada,
		'idtemporada'=>$idtemporada,
		'desctemporada'=>$desctemporada,
		'totalUsuarios'=>$todosUsuarios['total'],
		'totalAlunos'=>$todosAlunos['total'],
		'totalProfessores'=>$todosProfessores['total'],
		'totalInscricoes'=>$todasInscrições['total'],
		//'matriculadosTemporada'=>$matriculadosTemporada,
	
	]);
});

$app->get("/prof-estagiario", function() {

	User::verifyLoginEstagiario();
	
	$userOnline = User::pega_totalUsuariosOnline();

	$visitOnline = User::pega_totalVisitantesOnline();
	
	$temporada = Temporada::listAll();
	
	$idtemporada = Temporada::selecionaTemporadaMatriEncerrada();

	$idtemporada = $idtemporada[0]['idtemporada'];
	
	$pagina = 1;
	$todosUsuarios = User::getPage($pagina);
	$todosAlunos = Pessoa::getPage($pagina);
	$todosProfessores = User::getPageProf($pagina);
	$todasInscrições = Insc::getPageInsc($pagina);
	
	$matriculadosTemporada = Insc::numMatriculadosTemporada($idtemporada);

	$matriculadosTemporada = $matriculadosTemporada[0]['matriculados'];

	$page = new PageProf();

	$page->setTpl("index-estagiario", [
		'useronline'=>$userOnline,
		'visitante'=>$visitOnline,
		'temporada'=>$temporada,
		'totalUsuarios'=>$todosUsuarios['total'],
		'totalAlunos'=>$todosAlunos['total'],
		'totalProfessores'=>$todosProfessores['total'],
		'totalInscricoes'=>$todasInscrições['total'],
		'matriculadosTemporada'=>$matriculadosTemporada,
	]);
});

$app->get("/prof/dadostemporada-estagiario/:desctemporada", function($desctemporada) {

	User::verifyLoginEstagiario();

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

	$page = new PageProf();

	$page->setTpl("dadostemporada-estagiario", [
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