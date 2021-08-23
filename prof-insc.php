<?php

use \Sbc\PageProf;
use \Sbc\Model\User;
use \Sbc\Model\Insc;
use \Sbc\Model\Turma;
use \Sbc\Model\Temporada;
use \Sbc\Model\Pessoa;

$app->get("/prof/insc-turma-temporada/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	User::verifyLoginProf();

	$insc = new Insc();
	$turma = new Turma();
	$user = new User();
	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);
	$turma->get((int)$idturma);

	//$idusersessao = (int)$_SESSION['User']['iduser'];

	$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);	
	
	$insc->getInscByTurmaTemporada($idturma, $idtemporada);
	
	$page = new PageProf();	

	$page->setTpl("insc-turma-temporada", [
		'iduserprof'=>$iduserprof,
		'insc'=>$insc->getValues(),
		'turma'=>$turma->getValues(),
		'temporada'=>$temporada->getValues()
	]);	
});

$app->get("/prof/insc/:idtemporada", function($idtemporada) {

	User::verifyLoginProf();
	// na linha abaixo retorna um array com todos os dados do usuário

	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Insc::getPageSearchInscTemporadaUser($search, $page, $itemsPerPage = 10, $idtemporada, $iduser);

	} else {

		$pagination = Insc::getPageInscTemporadaUser($page, $itemsPerPage = 10, $idtemporada, $iduser);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>"/prof/insc/".$idtemporada."?".http_build_query([
			'page'=>$x+1,
			'search'=>$search
			]),
			'text'=>$x+1
		]);

	}

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$desctemporada = $temporada->getdesctemporada();

	// carrega uma pagina das páginas do admin
	$page = new PageProf();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("insc-temporada", array( // aqui temos um array com muitos arrays
		"temporada"=>$desctemporada,
		"idtemporada"=>$idtemporada,
		"insc"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>User::getError()
	));
});

$app->get("/prof/profile/insc/:idinsc/:idpess", function($idinsc, $idpess){

	User::verifyLogin();

	$insc = new Insc();

	$insc->get((int)$idinsc);

	if( !$insc->getidinsc()){

		User::setError("Inscrição selecionada não existe!");
		header("Location: /prof/insc");
		exit();			
	}

	if( $insc->getidpess() != $idpess){

		User::setError("Aluno selecionado não está relacionado para esta inscrição!");
		header("Location: /prof/insc");
		exit();			
	}

	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);	

	//$insc = Insc::getFromId($idinsc);

	$page = new PageProf();

	$page->setTpl("insc-detail", [
		'insc'=>$insc->getValues(),
		'pessoa'=>$pessoa->getValues()
	]);	
});



?>