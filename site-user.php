<?php

use \Sbc\Page;
use \Sbc\Model\Turma;
use \Sbc\Model\User;
use \Sbc\Model\Endereco;


$app->get("/user-create", function(){

	$page = new Page();
	
	$page->setTpl("user-create", [
		'error'=>User::getError(),
		'errorRegister'=>User::getErrorRegister(),
		'errorRegisterSendmail'=>User::getErrorRegisterSendmail(),
		'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'','emailconfirme'=>'', 'phone'=>'']
	]);
});

$app->post("/register", function(){

	$_SESSION['registerValues'] = $_POST;

	if (!isset($_POST['name']) || $_POST['name'] == '') {

		User::setErrorRegister("Preencha o seu nome.");
		header("Location: /user-create");
		exit;
	}

	if (!isset($_POST['phone']) || $_POST['phone'] == '') {

		User::setErrorRegister("Informe o número de seu tefefone celular.");
		header("Location: /user-create");
		exit;
	}

	if (!isset($_POST['email']) || $_POST['email'] == '') {

		User::setErrorRegister("Preencha o seu e-mail.");
		header("Location: /user-create");
		exit;
	}

	if ($_POST['email'] != $_POST['emailconfirme']) {

		User::setErrorRegister("O email digitados são diferentes!");
		header("Location: /user-create");
		exit;
	}	

	if (!isset($_POST['password']) || $_POST['password'] == '') {

		User::setErrorRegister("Preencha a senha.");
		header("Location: /user-create");
		exit;
	}

	if (User::checkLoginExist($_POST['email']) === true) {

		User::setErrorRegisterSendmail("Este endereço de e-mail já está sendo usado por outro usuário.");
		header("Location: /user-create");
		exit;
	}

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;
	$_POST["isprof"] = (isset($_POST["isprof"]))?1:0;
	$_POST["statususer"] = 1;

	$user->setData([
		'desperson'=>$_POST['name'],
		'deslogin'=>$_POST['email'],
		'despassword'=>$_POST['password'],
		'desemail'=>$_POST['email'],		
		'nrphone'=>$_POST['phone'],
		'inadmin'=>$_POST["inadmin"],
		'isprof'=>$_POST["isprof"],
		'statususer'=>$_POST["statususer"]		
	]);

	$user->save();

	User::login($_POST['email'], $_POST['password']);

	$_SESSION['registerValues'] = NULL;

	header('Location: /endereco');
	exit;
});

?>