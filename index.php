<?php 

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Sbc\Page;
use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Faixaetaria;

$app = new Slim();

$app->config('ebug', true);

$app->get("/", function() {

	$page = new Page();

	$page->setTpl("index");
});

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

	$page->setTpl("login");
});

$app->post("/professor/login", function() {

	User::login($_POST["login"], $_POST["password"]);

	header("Location: /professor");
	exit;
});

$app->get("/professor/logout", function(){

	User::logout();

	session_destroy();

	header("Location: /professor/login");
	exit;
});

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

/************** Faixa Estária *******************/

$app->get("/professor/faixaetaria", function() {

	User::verifyLogin();

	$faixaetaria = Faixaetaria::listAll();

	$page = new PageAdmin();

	$page->setTpl("faixaetaria", array(
		'faixaetaria'=>$faixaetaria
	));
});

$app->get("/professor/faixaetaria/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("faixaetaria-create");
});

$app->post("/professor/faixaetaria/create", function() {

	User::verifyLogin();

	$faixaetaria = new Faixaetaria();

	$faixaetaria->setData($_POST);

	$faixaetaria->save();

	header("Location: /professor/faixaetaria");
	exit();
});

$app->get("/professor/faixaetaria/:idfxetaria/delete", function($idfxetaria) {

	User::verifyLogin();

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	$faixaetaria->delete();

	header("Location: /professor/faixaetaria");
	exit();
	
});

$app->get("/professor/faixaetaria/:idfxetaria", function($idfxetaria) {

	User::verifyLogin();

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	$page = new PageAdmin();

	$page->setTpl("faixaetaria-update", [
		'faixaetaria'=>$faixaetaria->getValues()
	]);	
	
});

$app->post("/professor/faixaetaria/:idfxetaria", function($idfxetaria) {

	User::verifyLogin();

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	$faixaetaria->setData($_POST);

	$faixaetaria->save();

	header("Location: /professor/faixaetaria");
	exit();		
});

$app->get("/faixaetaria/:idfxetaria", function($idfxetaria) {

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	$page = new Page();

	$page->setTpl("faixaetaria", [
		'faixaetaria'=>$faixaetaria->getValues(),
		'modalidades'=>[]
	]);	

});


$app->run();

?>
