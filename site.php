<?php

use \Sbc\Page;
use \Sbc\Model\Turma;
use \Sbc\Model\Espaco;
use \Sbc\Model\Horario;
use \Sbc\Model\Local;
use \Sbc\Model\Atividade;
use \Sbc\Model\Temporada;
use \Sbc\Model\Cart;
use \Sbc\Model\Pessoa;
use \Sbc\Model\User;
use \Sbc\Model\Modalidade;

$app->get('/', function() {

	$turma = Turma::listAllTurmaTemporada();
	
	$page = new Page();
    
	$page->setTpl("index", [
		'turma'=>Turma::checkList($turma),
		//'temporada'=>$turma->getTemporada()

	]);
});

$app->get("/cart", function(){

	$cart = Cart::getFromSession();
	$user = User::getFromSession();
	
	//var_dump($user->getPessoas());
	//exit();

	$page = new Page();

	$page->setTpl("cart", [
		'cart'=>$cart->getValues(),
		'turma'=>$cart->getTurma(),
		'pessoa'=>$user->getPessoas(),
		'error'=>Cart::getMsgError(),
		'msgError'=>Cart::getMsgError(),
		'msgSuccess'=>Cart::getMsgSuccess()
	]);

});

$app->post("/cart", function() {

	User::verifyLogin(false);

	$cart = new Cart();

	$_POST['idcart'] = (int)$_SESSION[Cart::SESSION]["idcart"];
	$_POST['iduser'] = (int)$_SESSION[User::SESSION]["iduser"];

	//var_dump($_POST);
	//exit();



	$cart->setData($_POST);


	$cart->save([
		'idcart'=>$_POST['idcart'],
		':iduser'=>$_POST['iduser'],		
		':idpess'=>$_POST['idpess'],
		':dessessionid'
	]);

	header("Location: /checkout");
	exit();
});

$app->get("/checkout", function(){

	User::verifyLogin(false);	

	$cart = Cart::getFromSession();

	$user = User::getFromSession();

	$idpess = $_GET['idpess'];

	//$idpess->getidpess();

	$cart->save();
		

	$page = new Page();

	$page->setTpl("checkout", [
		'cart'=>$cart->getValues(),
		//'pessoa'=>$cart->getPessoa(),
		'pessoa'=>$pessoa->getValues(),
		'turma'=>$cart->getTurma(),
		'error'=>Cart::getError(),
	]);
});

$app->get("/cart/:idturma/add", function($idturma){

	$turma = new Turma();

	$turma->get((int)$idturma);

	$cart = Cart::getFromSession();

	$idcart = (int)$_SESSION[Cart::SESSION]["idcart"];

	if( Cart::cartIsEmpty($idcart) > 0){

		var_dump("Você já selecionou uma turma! remova a atual para continuar.");
		exit();

	}else{
				
			$cart->addTurma($turma);
	}		
	
	header("Location: /cart");
	exit;

});

$app->get("/cart/:idturma/minus", function($idturma){

	$turma = new Turma();

	$turma->get((int)$idturma);

	$cart = Cart::getFromSession();

	$cart->removeTurma($turma);

	header("Location: /cart");
	exit;

});

$app->get("/cart/:idturma/remove", function($idturma){

	$turma = new Turma();

	$turma->get((int)$idturma);

	$cart = Cart::getFromSession();

	$cart->removeTurma($turma, true);

	header("Location: /cart");
	exit;

});


$app->get("/temporada/:idtemporada", function($idtemporada){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);


	$pagination = $temporada->getTurmaTemporadaPage($page);	

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/temporada/'.$temporada->getidtemporada().'?page='.$i,
			'page'=>$i
		]);
	}
	$page = new Page();

	$page->setTpl("temporada", [
		'temporada'=>$temporada->getValues(),
		'turma'=>$pagination["data"],
		'pages'=>$pages
	]);
});

$app->get("/locais", function() {

	$locais = Local::listAll();

	$page = new Page();

	$page->setTpl("locais", array(
		'locais'=>$locais
	));
});

$app->get("/local/:idlocal", function($idlocal){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$local = new Local();

	$local->get((int)$idlocal);

	$pagination = $local->getTurmaPage($page);

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/local/'.$local->getidlocal().'?page='.$i,
			'page'=>$i
		]);
	}
	$page = new Page();

	$page->setTpl("local", [
		'local'=>$local->getValues(),
		'turma'=>$pagination["data"],
		'pages'=>$pages
	]);
});


$app->get("/espaco/:idespaco", function($idespaco) {

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$page = new Page();

	$page->setTpl("espaco", [
		'espaco'=>$espaco->getValues(),
		'horario'=>$espaco->getHorario()
	]);	

});

$app->get("/local/:idlocal", function($idlocal) {

	$local = new Local();

	$local->get((int)$idlocal);

	$page = new Page();

	$page->setTpl("local", [
		'local'=>$local->getValues(),
		'espaco'=>$local->getEspaco()
	]);	

});

$app->get("/atividade/:idativ", function($idativ){

	$atividade = new Atividade();

	$atividade->getFromId($idativ);

	//var_dump($atividade);
	//exit();

	$page = new Page();

	$page->setTpl("atividade-detail", [
		'atividade'=>$atividade->getValues(),
		// Implementar método
		//'local'=>$atividade->getLocal()
	]);

});

$app->get("/turma/:idturma", function($idturma){

	$turma = new Turma();

	$turma->getFromId($idturma);

	//var_dump($turma);
	//exit();

	$page = new Page();

	$page->setTpl("turma-detail", [
		'turma'=>$turma->getValues(),
		// Implementar método
		//'local'=>$turma->getLocal()
	]);

});


$app->get("/login", function(){

	$page = new Page();

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

	}

	header("Location: /checkout");
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

	$user->setData([
		'inadmin'=>0,
		'isprof'=>0,
		'status'=>1,
		'deslogin'=>$_POST['email'],
		'desperson'=>$_POST['name'],
		'desemail'=>$_POST['email'],
		'despassword'=>$_POST['password'],
		'nrphone'=>$_POST['phone']
	]);

	$user->save();

	User::login($_POST['email'], $_POST['password']);

	header('Location: /checkout');
	exit;

});

$app->get("/forgot", function() {

	$page = new Page();

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

$app->get("/pessoa-create", function() {

	User::verifyLogin(false);

	$page = new Page();

	$page->setTpl("pessoa-create", [
		'error'=>User::getError(),
		'errorRegister'=>User::getErrorRegister(),
		'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['nomepess'=>'', 'dtnasc'=>'', 'numcpf'=>'', 'numrg'=>'', 'numsus'=>'', 'cadunico'=>'', 'nomemae'=>'', 'cpfmae'=>'', 'nomepai'=>'', 'cpfpai'=>'']
	]);
});

$app->post("/registerpessoa", function(){

	$_SESSION['registerValues'] = $_POST;

	$iduser = (int)$_SESSION[User::SESSION]["iduser"];

	if (!isset($_POST['nomepess']) || $_POST['nomepess'] == '') {

		Pessoa::setErrorRegister("Preencha o nome completo da pessoa.");
		header("Location: /pessoa-create");
		exit;
	}

	if (!isset($_POST['dtnasc']) || $_POST['dtnasc'] == '') {

		Pessoa::setErrorRegister("Preencha informe da data de nascimento.");
		header("Location: /pessoa-create");
		exit;
	}

	if (!isset($_POST['numcpf']) || $_POST['numcpf'] == '') {

		Pessoa::setErrorRegister("Informe o número do CPF.");
		header("Location: /pessoa-create");
		exit;
	}

	if (Pessoa::checkCpfExist($_POST['numcpf']) === true) {

		Pessoa::setErrorRegister("Este CPF pertence a outro usuário.");
		header("Location: /pessoa-create");
		exit;
	}

	if (!isset($_POST['numrg']) || $_POST['numrg'] == '') {

		Pessoa::setErrorRegister("Informe o número do RG.");
		header("Location: /pessoa-create");
		exit;
	}	

	if (!isset($_POST['numsus']) || $_POST['numsus'] == '') {

		Pessoa::setErrorRegister("Informe o número do Cartão do SUS.");
		header("Location: /pessoa-create");
		exit;
	}	

	if (!isset($_POST['cadunico']) || $_POST['cadunico'] == '') {

		Pessoa::setErrorRegister("Informe o número do Cartão CadUnico.");
		header("Location: /pessoa-create");
		exit;
	}

	$pessoa = new Pessoa();

	$pessoa->setData([
		'iduser'=>$iduser, 		
		'nomepess'=>$_POST['nomepess'],
		'dtnasc'=>$_POST['dtnasc'],
		'sexo'=>$_POST['sexo'],
		'numcpf'=>$_POST['numcpf'],
		'numrg'=>$_POST['numrg'],
		'numsus'=>$_POST['numsus'],
		'vulnsocial'=>$_POST['vulnsocial'],
		'cadunico'=>$_POST['cadunico'],
		'nomemae'=>$_POST['nomemae'],
		'cpfmae'=>$_POST['cpfmae'],
		'nomepai'=>$_POST['nomepai'],
		'cpfpai'=>$_POST['cpfpai'],
		'statuspessoa'=>1		
	]);

	//var_dump($pessoa);
	//exit();

	$pessoa->save();

	header('Location: /checkout');
	exit;

});

/*
$app->get("/pessoa/:idpess/status", function($idpess) {

	User::verifyLogin(false);

	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);

	$pessoa->setStatus();

	header("Location: /user-pessoas");
	exit();	
});
*/
$app->get("/user/:idpess/status", function($idpess){

	User::verifyLogin(false);	

	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);

	$pessoa->setData($_POST);

	// setstatuspessoa --> 0 = pessoa não ativa   -  1 = pessoa ativa (default)
	$pessoa->setstatuspessoa(0);

	$pessoa->save();

	Pessoa::setSuccess("Status atualizado.");

	header("Location: /user/pessoas");
	exit;

});




$app->get("/pessoa/:idpess", function($idpess){

	User::verifyLogin(false);

	$pessoa = new Pessoa();

	$pessoa->getFromId($idpess);

	//var_dump($pessoa);
	//exit();

	$page = new Page();

	$page->setTpl("pessoa", [
		'pessoa'=>$pessoa->getValues(),
		// Implementar método
		//'local'=>$user->getUser()
	]);

});


$app->get("/user/pessoas", function(){

	User::verifyLogin(false);

	$user = User::getFromSession();

	//var_dump($user->getPessoas());
	//exit();

	$page = new Page();

	$page->setTpl("user-pessoas", [
		'pessoas'=>$user->getPessoas()
	]);

});

$app->get("/modalidade/:idmodal", function($idmodal){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	$pagination = $modalidade->getTurmaPage($page);

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/modalidade/'.$modalidade->getidmodal().'?page='.$i,
			'page'=>$i
		]);
	}
	//var_dump($modalidades);
	//exit();
	$page = new Page();

	$page->setTpl("modalidade", [
		'modalidade'=>$modalidade->getValues(),
		'turma'=>$pagination["data"],
		'pages'=>$pages
	]);
});

$app->get("/modalidades", function() {

	$modalidades = Modalidade::listAll();

	$page = new Page();

	$page->setTpl("modalidades", array(
		'modalidades'=>$modalidades
	));
});






?>