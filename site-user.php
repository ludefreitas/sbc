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

		User::setErrorRegister("Os emails digitados são diferentes!");
		header("Location: /user-create");
		exit;
	}	

	if (!isset($_POST['password']) || $_POST['password'] == '') {

		User::setErrorRegister("Preencha a senha.");
		header("Location: /user-create");
		exit;
	}

	if ($_POST['password'] != $_POST['passwordrepeat']) {

		User::setErrorRegister("As senhas digitadas são diferentes!");
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

$app->get("/user/profile", function(){

	User::verifyLogin(false);

	$user = new User();

	$iduser = $_SESSION['User']['iduser'];

	$user->get((int)$iduser);

	/*
	echo '<pre>';
	print_r($user);
	echo '</pre>';
	exit;
	*/

	$page = new Page();

	$page->setTpl("user-profile", [
		'user'=>$user->getValues(),
		'profileMsg'=>User::getSuccess(),
		'profileError'=>User::getError()
	]);

});

$app->post("/user/profile", function(){

	User::verifyLogin(false);

	if (!isset($_POST['desperson']) || $_POST['desperson'] === '') {
		User::setError("Preencha o seu nome.");
		header('Location: /user/profile');
		exit;
	}

	if (!isset($_POST['desemail']) || $_POST['desemail'] === '') {
		User::setError("Preencha o seu e-mail.");
		header('Location: /user/profile');
		exit;
	}

	if (!isset($_POST['nrphone']) || $_POST['nrphone'] === '') {
		User::setError("Preencha o seu telefone.");
		header('Location: /user/profile');
		exit;
	}

	$user = User::getFromSession();

	if ($_POST['desemail'] !== $user->getdesemail()) {

		if (User::checkLoginExist($_POST['desemail']) === true) {

			User::setError("Este endereço de e-mail já está cadastrado.");
			header('Location: /user/profile');
			exit;

		}

	}

	$_POST['iduser'] = $_SESSION['User']['iduser'];
	$_POST['apelidoperson'] = $user->getapelidoperson();
	$_POST['inadmin'] = $user->getinadmin();
	$_POST['isprof'] = $user->getisprof();
	$_POST['statususer'] = 1;
	$_POST['despassword'] = $user->getdespassword();
	$_POST['deslogin'] = $_POST['desemail'];

	$user->setData($_POST);

	//echo '<pre>';
	//print_r($_POST);
	//echo '<pre>';
	//exit;

	$user->update();

	User::setSuccess("Dados alterados com sucesso!");

	header('Location: /user/profile');
	exit;

});


$app->get("/user-change-password", function(){

	User::verifyLogin(false);

	$page = new Page();

	$page->setTpl("user-change-password", [
		'changePassError'=>User::getError(),
		'changePassSuccess'=>User::getSuccess()
	]);

});

$app->post("/user-change-password", function(){

	User::verifyLogin(false);

	if (!isset($_POST['current_pass']) || $_POST['current_pass'] === '') {

		User::setError("Digite a senha atual.");
		header("Location: /user-change-password");
		exit;

	}

	if (!isset($_POST['new_pass']) || $_POST['new_pass'] === '') {

		User::setError("Digite a nova senha.");
		header("Location: /user-change-password");
		exit;

	}

	if (!isset($_POST['new_pass_confirm']) || $_POST['new_pass_confirm'] === '') {

		User::setError("Confirme a nova senha.");
		header("Location: /user-change-password");
		exit;

	}

	if ($_POST['current_pass'] === $_POST['new_pass']) {

		User::setError("A sua nova senha deve ser diferente da atual.");
		header("Location: /user-change-password");
		exit;		

	}

	//$user = User::getFromSession();

	$user = new User();

	$iduser = $_SESSION['User']['iduser'];

	$user->get((int)$iduser);

	if (!password_verify($_POST['current_pass'], $user->getdespassword())) {

		User::setError("A senha está inválida.");
		header("Location: /user-change-password");
		exit;			

	}

	$user->setdespassword($_POST['new_pass']);

	$user->updatePassword();

	User::setSuccess("Senha alterada com sucesso!");

	header('Location: /user/profile');
	exit;

});


?>