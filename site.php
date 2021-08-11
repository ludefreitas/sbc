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

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Turma::getPageSearchTurmaTemporada($search, $page);
		
	} else {

		$pagination = Turma::getPageTurmaTemporada();
	}

	$temporada = new Temporada();

	if(!isset($pagination['data']) || $pagination['data'] == NULL){

		if(!isset($search) || $search == NULL){

			Cart::setMsgError("Não existe turmas para esta temporada. A temporada pode não estar iniciada, estar em processo de sorteio ou foi encerrada. Aguarde, ou entre em contato com o Centro Esportivo mais próximo a sua casa. ");

		}else{

			Cart::setMsgError("Não encontramos nenhuma turma com a palavra '".$search."' nesta temporada! A temporada pode não estar iniciada, estar em processo de sorteio ou foi encerrada. Aguarde, ou entre em contato com o Centro Esportivo mais próximo à sua casa.");
		}		

	}else{

		if(isset($search) && $search != NULL){
			Cart::setMsgError("Encontramos ".$pagination['total']." turmas com a palavra '".$search."' para esta temporada! ");
		}

		$idtemporada = $pagination['data'][0]['idtemporada']; 

		$temporada->get((int)$idtemporada);

		$dtInicinscricao = $temporada->getdtinicinscricao(); 
		$dtTerminscricao = $temporada->getdtterminscricao();
		$dtInicmatricula = $temporada->getdtinicmatricula();
		$dtTermmatricula = $temporada->getdttermmatricula();

		if($temporada->getidstatustemporada() == 2){ // statustemporada = Temporada iniciada

			//Altera status para idstatustemporada = 4
			Temporada::alterarStatusTemporadaParaIncricoesIniciadas($dtInicinscricao, $idtemporada);
		}	
		
		if($temporada->getidstatustemporada() == 4){ // statustemporada = Inscrições iniciadas

			//Altera status para idstatustemporada = 3
			Temporada::alterarStatusTemporadaParaInscricoesEncerradas($dtTerminscricao, $idtemporada);
		}		

		/*
		if($temporada->getidstatustemporada() == 3){ // statustemporada = Inscrições encerradas

			//Altera status para idstatustemporada = 6 --> Será feito ao fazer o sorteio
			Temporada::alterarStatusTemporadaParaMatriculasIniciadas($dtInicmatricula, $idtemporada);
		}
		*/	

		if($temporada->getidstatustemporada() == 6){ // statustemporada = Matrículas iniciadas

			//Altera status para idstatustemporada = 5
			Temporada::alterarStatusTemporadaParaMatriculasEncerradas($dtTermmatricula, $idtemporada);
		}		
	}	
		
	$page = new Page(); 

	$page->setTpl("index", array(
		'turma'=>Turma::checkList($pagination['data']),
		"search"=>$search,
		//"pages"=>$pages,
		'error'=>Cart::getMsgError()
	));
});


/*
$app->get('/', function() {

	$turma = Turma::listAllTurmaTemporada();
	$temporada = new Temporada();

	if(!isset($turma) || $turma == NULL){

		Cart::setMsgError("Não existe turmas para esta temporada. Aguarde! ");

	}else{

		$idtemporada = $turma[0]['idtemporada']; 

		$temporada->get((int)$idtemporada);

		$dtInicinscricao = $temporada->getdtinicinscricao();
		$dtTerminscricao = $temporada->getdtterminscricao();
		$dtTermmatricula = $temporada->getdttermmatricula();

		if($temporada->getidstatustemporada() == 2){

			Temporada::alterarStatusTemporadaParaIncricoesIniciadas($dtInicinscricao, $idtemporada);

		}	

		if($temporada->getidstatustemporada() == 4){

			Temporada::alterarStatusTemporadaParaMatriculasIniciadas($dtTerminscricao, $idtemporada);

		}	

		if($temporada->getidstatustemporada() == 6){

			Temporada::alterarStatusTemporadaParaMatriculasEncerradas($dtTermmatricula, $idtemporada);

		}				

	}	
		
	$page = new Page();  	

	$page->setTpl("index", [
		'turma'=>Turma::checkList($turma),
		'error'=>Cart::getMsgError()
	]);
});
*/

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

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);
	
	if($temporada->getidstatustemporada() == 5){

		if(!isset($_POST['laudo']) || $_POST['laudo'] == NULL){

			Pessoa::setError("Informe se você irá fazer uma inscrição com laudo ou não! ");
			header("Location: /checkout");
			exit();
		}
	}	

	$laudo = isset($_POST['laudo']) ? (int)$_POST['laudo'] : 1;

	$cartsturmas = CartsTurmas::getCartsTurmasFromId($idcart);

	$turma = new Turma();

	$pessoa = new Pessoa();
	
	$insc = new Insc();	

	$desctemporada = $temporada->getdesctemporada();

	$idpess= $cart->getidpess();

	$pessoa->get((int)$idpess);

	$nomepess = $pessoa->getnomepess();

	$email = $user->getdesemail();	

	$desperson = $user->getdesperson();		

	//if(Insc::statusTemporadaMatriculaIniciada($idtemporada)){
		//$InscStatus = InscStatus::AGUARDANDO_MATRICULA;

	//}

	if(Insc::statusTemporadaMatriculasEncerradas($idtemporada)){

		$InscStatus = InscStatus::AGUARDANDO_MATRICULA;

	}else{

		$InscStatus = InscStatus::AGUARDANDO_SORTEIO;
	}
	
		$insc->setData([
			'idcart'=>$idcart,
			'idinscstatus'=>$InscStatus,
			'numordem'=>0,
			'laudo'=>$laudo,
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

	if(
		$turma->getidstatustemporada() != 4 
	   	AND $turma->getidstatustemporada() != 5 
	    AND $turma->getidstatustemporada() != 6
		)
	{

		Turma::setMsgError("Não é possivel Inscrever-se na turma selecionada. A temporada pode não estar iniciada, estar em processo de sorteio ou ainda, a temporada foi encerrada. Aguarde, ou entre em contato com o Centro Esportivo mais próximo a sua casa. ");

	}

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
		'errorRegister'=>User::getErrorRegister()
		//'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'', 'phone'=>'']
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