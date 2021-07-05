<?php

use \Sbc\Page;
use \Sbc\Model\Turma;
use \Sbc\Model\Temporada;
use \Sbc\Model\Cart;
use \Sbc\Model\Pessoa;
use \Sbc\Model\User;
use \Sbc\Model\Insc;
use \Sbc\Model\InscStatus;
use \Sbc\Model\CartsTurmas;
use \Sbc\Model\Endereco;

$app->get('/', function() {

	$turma = Turma::listAllTurmaTemporada();
	
	$page = new Page();    

	$page->setTpl("index", [
		'turma'=>Turma::checkList($turma),
	]);
});

$app->get("/checkout", function(){

	User::verifyLogin(false);

	$cart = Cart::getFromSession();
	$user = User::getFromSession();

	$idperson = (int)$_SESSION[User::SESSION]['idperson'];
	Endereco::seEnderecoExiste($idperson);

	//$insc = new Insc;

	if(Cart::cartIsEmpty((int)$_SESSION[Cart::SESSION]['idcart']) === false){
		Cart::setMsgError("Selecione uma turma e a pessoa que irá fazer a aula! ");
		header("Location: /cart");
		exit();
	}	

	$page = new Page();

	$page->setTpl("checkout", [
		'cart'=>$cart->getValues(),
		'pessoa'=>$cart->getPessoa(),
		'turma'=>$cart->getTurma(),
		'error'=>Pessoa::getError()
	]);
});

$app->post("/checkout", function(){

	User::verifyLogin(false);

	$user = User::getFromSession();
	$cart = Cart::getFromSession();

	$idcart = (int)$cart->getidcart();

	$idtemporada = $_POST['idtemporada'];
	$idturma = $_POST['idturma'];	

	$cartsturmas = CartsTurmas::getCartsTurmasFromId($idcart);

	$turma = new Turma();

	$pessoa = new Pessoa();

	$temporada = new Temporada();
	
	$insc = new Insc();	

	$temporada->get((int)$idtemporada);

	$desctemporada = $temporada->getdesctemporada();

	$idpess= $cart->getidpess();

	$pessoa->get((int)$idpess);

	$nomepess = $pessoa->getnomepess();

	$email = $user->getdesemail();	

	$desperson = $user->getdesperson();		

	if(Insc::statusTemporadaMatriculaIniciada($idtemporada)){
		$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
	}else{
		$InscStatus = InscStatus::AGUARDANDO_SORTEIO;
	}
	
		$insc->setData([
			'idcart'=>$idcart,
			'idinscstatus'=>$InscStatus,
			'idturma'=>$idturma,
			'idtemporada'=>$idtemporada	
		]);

		$insc->save();

		$idinsc = $insc->getidinsc();	

		$numsorte = $insc->getnumsorte();	
		
		$cart->removeTurma($turma, true);
		Cart::removeFromSession();
	    session_regenerate_id();

	    $insc->inscricaoEmail($idinsc, $numsorte, $idpess, $nomepess, $email, $desperson, $desctemporada);
		
		header("Location: /profile/insc/".$insc->getidinsc()."/".$idpess."");
		exit;	
});


$app->get("/turma/:idturma/:idtemporada", function($idturma, $idtemporada){

	$turma = new Turma();

	$turma->getFromIdTurmaTemporada($idturma, $idtemporada);

	$page = new Page(); 

	$page->setTpl("turma-detail", [
		'turma'=>$turma->getValues(),
		'error'=>Turma::getMsgError(),
	]);
});

$app->get("/login", function(){

	$page = new Page();

	/*
	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);
	*/

	$page->setTpl("login", [
		'error'=>User::getError(),
		'errorRegister'=>User::getErrorRegister(),
		'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'', 'phone'=>'']
	]);
});


$app->post("/login", function(){

	try {

		User::login($_POST['login'], $_POST['password']);

	} catch(Exception $e) {

		User::setError($e->getMessage());
		header("Location: /login");
		exit;
	}

	header("Location: /");
	exit;
});

$app->get("/logout", function(){

	User::logout();

	Cart::removeFromSession();
	
	session_regenerate_id();

	header("Location: /login");
	exit;
});

$app->post("/register", function(){

	$_SESSION['registerValues'] = $_POST;

	//$endereco = new Endereco;

	//Endereco::seEnderecoExiste();

	if (!isset($_POST['name']) || $_POST['name'] == '') {

		User::setErrorRegister("Preencha o seu nome.");
		header("Location: /login");
		exit;
	}

	if (!isset($_POST['email']) || $_POST['email'] == '') {

		User::setErrorRegister("Preencha o seu e-mail.");
		header("Location: /login");
		exit;
	}

	if (!isset($_POST['password']) || $_POST['password'] == '') {

		User::setErrorRegister("Preencha a senha.");
		header("Location: /login");
		exit;
	}

	if (User::checkLoginExist($_POST['email']) === true) {

		User::setErrorRegister("Este endereço de e-mail já está sendo usado por outro usuário.");
		header("Location: /login");
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

	//var_dump($user);
	//exit();

	$user->save();

	User::login($_POST['email'], $_POST['password']);

	header('Location: /endereco');
	exit;
});

$app->get("/forgot", function() {


	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot");	
});


$app->post("/forgot", function($email){

	$user = User::getForgot($_POST["email"], false);

	header("Location: /forgot/sent");
	exit;
});

$app->get("/forgot/sent", function(){

	$page = new Page();

	$page->setTpl("forgot-sent");	
});


$app->get("/forgot/reset", function(){

	$user = User::validForgotDecrypt($_GET["code"]);

	$page = new Page();

	$page->setTpl("forgot-reset", array(
		"name"=>$user["desperson"],
		"code"=>$_GET["code"]
	));
});

$app->post("/forgot/reset", function(){

	$forgot = User::validForgotDecrypt($_POST["code"]);	

	User::setFogotUsed($forgot["idrecovery"]);

	$user = new User();

	$user->get((int)$forgot["iduser"]);

	$password = User::getPasswordHash($_POST["password"]);

	$user->setPassword($password);

	$page = new Page();

	$page->setTpl("forgot-reset-success");
});

$app->get("/comprovante", function() {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("comprovante-insc");	
});




?>