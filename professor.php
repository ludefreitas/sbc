<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;


$app->get("/admin", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index");
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

			//header("Location: /admin");
			echo "<script>window.location.href = '/admin'</script>";
			exit;

		}else{			

			//header("Location: /");
			echo "<script>window.location.href = '/'</script>";
			exit;
		
		}

	} catch(Exception $e) {

		User::setError($e->getMessage());
		//header("Location: /admin/login");
		echo "<script>window.location.href = '/admin/login'</script>";
		exit;
	}

	
});

$app->get("/admin/logout", function(){

	User::logout();

	session_destroy();

	//header("Location: /admin/login");
	echo "<script>window.location.href = '/admin/login'</script>";
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

	//header("Location: /admin/forgot/sent");
	echo "<script>window.location.href = '/admin/forgot/sent'</script>";
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