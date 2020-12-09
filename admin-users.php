<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Turma;



// Rota para listar todos usuários da classe 
$app->get("/professor/users", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = User::getPageSearch($search, $page);

	} else {

		$pagination = User::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/professor/users?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}

	//$users = User::listAll();
	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("users", array( // aqui temos um array com muitos arrays
		"users"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
	));
});

$app->get("/professor/prof", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário
	$users = User::listAllProf();
	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("prof", array( // aqui temos um array com muitos arrays
		"users"=>$users
	));
});

$app->get("/professor/cliente", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário
	$users = User::listAllCliente();
	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("cliente", array( // aqui temos um array com muitos arrays
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
	$_POST["statususer"] = 1;

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
	$_POST["statususer"] = (isset($_POST["statususer"]))?1:0;

	$user->get((int)$iduser);

	$user->setData($_POST);
	
	$user->update();

	header("Location: /professor/users");
	exit();
});


$app->get("/professor/turma-users/:iduser", function($iduser) {

	User::verifyLogin();

	$users = new User();
	$turma = new Turma();

	$users->get((int)$iduser);	

	//var_dump($users->getTurma(true)); exit();

	$page = new PageAdmin();	

	$page->setTpl("turmas-por-professor", [
		'users'=>$users->getValues(),
		'turmaRelated'=>$users->getTurma(true),
		//'turmaNotRelated'=>$users->getTurma(false)
	]);	
});

$app->get("/professor/users/:iduser/turma", function($iduser) {

	User::verifyLogin();

	$users = new User();

	$users->get((int)$iduser);	

	$page = new PageAdmin();	

	$page->setTpl("turma-users", [
		'users'=>$users->getValues(),
		'turmaRelated'=>$users->getTurma(true),
		'turmaNotRelated'=>$users->getTurma(false)
	]);	
});


$app->get("/professor/users/:iduser/turma/:idturma/add", function($iduser, $idturma) {

	User::verifyLogin();

	$users = new User();

	$users->get((int)$iduser);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$users->addTurma($turma);

	header("Location: /professor/users/".$iduser."/turma");
	exit;
});

$app->get("/professor/users/:iduser/turma/:idturma/remove", function($iduser, $idturma) {

	User::verifyLogin();

	$users = new User();

	$users->get((int)$iduser);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$users->removeTurma($turma);

	header("Location: /professor/users/".$iduser."/turma");
	exit;

});



?>