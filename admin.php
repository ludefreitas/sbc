<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Pessoa;
use \Sbc\Model\Insc;
use \Sbc\Model\Temporada;


$app->get("/admin", function() {

	User::verifyLogin();

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

	//var_dump($matriculadosTemporada);
	//	exit();

	$page = new PageAdmin();

	$page->setTpl("index", [
		'useronline'=>$userOnline,
		'visitante'=>$visitOnline,
		'totalUsuarios'=>$todosUsuarios['total'],
		'totalAlunos'=>$todosAlunos['total'],
		'totalProfessores'=>$todosProfessores['total'],
		'totalInscricoes'=>$todasInscrições['total'],
		//'matriculadosTemporada'=>$matriculadosTemporada,
	
	]);
});

$app->get("/admin/login", function() {

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login", [
		'error'=>User::getError()
	
	]);
});

$app->post("/admin/login", function() {

	try {

		User::login($_POST['login'], $_POST['password']);

		//var_dump($_SESSION[User::SESSION]["inadmin"]);
		//exit();

		if((int)$_SESSION[User::SESSION]["inadmin"] === 1){

			header("Location: /admin");
			exit;

		}else{			

			header("Location: /");
			exit;
		
		}

	} catch(Exception $e) {

		User::setError($e->getMessage());
		header("Location: /admin/login");
		exit;
	}

	
});

$app->get("/admin/logout", function(){

	User::logout();

	session_destroy();

	header("Location: /admin/login");
	exit;
});


$app->get("/admin/forgot", function() {

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot");
});

$app->post("/admin/forgot", function(){

	$user = User::getForgot($_POST["email"]);

	header("Location: /admin/forgot/sent");
	exit();
});

$app->get("/admin/forgot/sent", function() {

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-sent");
});

$app->get("/admin/forgot/reset", function() {

	$user = User::validForgotDecrypt($_GET["code"]);

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-reset", array(
		"name"=>$user["desperson"],
		"code"=>$_GET["code"]
	));
});

$app->post("/admin/forgot/reset", function() {

	$forgot = User::validForgotDecrypt($_POST["code"]);

	User::setForgotUsed($forgot["idrecovery"]);

	$user = new User();

	$user->get((int)$forgot["iduser"]);

	$user->setPassword($_POST["password"]);

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-reset-success");	
});


?>