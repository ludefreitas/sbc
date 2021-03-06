<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;


$app->get("/professor", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index");
});

$app->get("/professor/login", function() {

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login", [
		'error'=>User::getError()
	
	]);
});

$app->post("/professor/login", function() {

	try {

		User::login($_POST['login'], $_POST['password']);

		//var_dump($_SESSION[User::SESSION]["inadmin"]);
		//exit();

		if((int)$_SESSION[User::SESSION]["inadmin"] === 1){

			header("Location: /professor");
			exit;

		}else{			

			header("Location: /");
			exit;
		
		}

	} catch(Exception $e) {

		User::setError($e->getMessage());
		header("Location: /professor/login");
		exit;
	}

	
});

$app->get("/professor/logout", function(){

	User::logout();

	session_destroy();

	header("Location: /professor/login");
	exit;
});


$app->get("/professor/forgot", function() {

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot");
});

$app->post("/professor/forgot", function(){

	$user = User::getForgot($_POST["email"]);

	header("Location: /professor/forgot/sent");
	exit();
});

$app->get("/professor/forgot/sent", function() {

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-sent");
});

$app->get("/professor/forgot/reset", function() {

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

$app->post("/professor/forgot/reset", function() {

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