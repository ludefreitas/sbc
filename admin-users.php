<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;


// Rota para listar todos usuários da classe 
$app->get("/professor/users", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário
	$users = User::listAll();
	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("users", array( // aqui temos um array com muitos arrays
		"users"=>$users
	));
});

$app->get("/professor/users/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("users-create");
});

$app->get("/professor/users/:iduser/delete", function($iduser) {

	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$user->delete();

	header("Location: /professor/users");
	exit();
});

$app->get("/professor/users/:iduser", function($iduser) {

	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$page = new PageAdmin();

	$page->setTpl("users-update", array(
		"user"=>$user->getValues()
	));
});

$app->post("/professor/users/create", function() {

	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;
	$_POST["isprof"] = (isset($_POST["isprof"]))?1:0;
	$_POST["status"] = 1;

	//$_POST['despassword'] = User::getPasswordHash($_POST['despassword']);

	$user->setData($_POST);

	$user->save();

	header("Location: /professor/users");
	exit();
});

$app->post("/professor/users/:iduser", function($iduser) {

	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;
	$_POST["isprof"] = (isset($_POST["isprof"]))?1:0;
	$_POST["status"] = (isset($_POST["status"]))?1:0;

	$user->get((int)$iduser);

	$user->setData($_POST);
	
	$user->update();

	header("Location: /professor/users");
	exit();
});

?>