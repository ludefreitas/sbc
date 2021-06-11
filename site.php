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

$app->get("/cart", function(){

	$cart = Cart::getFromSession();
	$user = User::getFromSession();
	$page = new Page();

	$page->setTpl("cart", [
		'cart'=>$cart->getValues(),
		'turma'=>$cart->getTurma(),
		'pessoa'=>$user->getPessoa(),
		'error'=>Cart::getMsgError(),
		'msgError'=>Cart::getMsgError(),
		'msgSuccess'=>Cart::getMsgSuccess()
	]);
});

$app->post("/cart", function() {

	User::verifyLogin(false);

	if(Cart::cartIsEmpty((int)$_SESSION[Cart::SESSION]['idcart']) === false){
		Cart::setMsgError("Selecione uma turma! ");
		header("Location: /cart");
		exit();
	}	

	if($_POST['idpess'] <= 0){	
		Cart::setMsgError("Você precisa selecionar uma pessoa! ");
		header("Location: /cart");
		exit();

	}else{

		$cart = new Cart();

		$_POST['idcart'] = (int)$_SESSION[Cart::SESSION]["idcart"];
		//$_POST['iduser'] = (int)$_SESSION[User::SESSION]["iduser"];
		$_POST['dessessionid'] = $_SESSION[Cart::SESSION]["dessessionid"];

		$pessoa = new Pessoa();


		$idpess = $_POST['idpess'];

		$pessoa->get((int)$idpess);

		

		//$numcpf = $pessoa->getcpf();
		$numcpf = $pessoa->getnumcpf();
		$idade = User::calcularIdade($pessoa->getdtnasc());
		$nomepess = $pessoa->getnomepess();

		//var_dump($numcpf.' - '.$idade.' - '.$nomepess);
		//exit();
		
		$idturma = $_POST['idturma'];
		$idtemporada = $_POST['idtemporada'];
		
		$initidade = $_POST['initidade'];
		$fimidade = $_POST['fimidade']; 


		if(($idade < $initidade) || ($idade > $fimidade)){
		

		Cart::setMsgError('Esta turma é exclusiva para pessoas que tem idade entre '.$initidade.' e '.$fimidade.' anos! Remova a turma atual e escolha outra turma compatível com a idade do(a) '.$nomepess.'.');
		header("Location: /cart");
		exit();

		}	

		if ($cart->getInscExist($numcpf, $idpess, $idturma, $idtemporada)){

			Cart::setMsgError('O(A) '.$nomepess.' já está inscrita nesta turma para esta temporada!');
			header("Location: /cart");
			exit();

		}else{				

			$cart->setData($_POST);

			$cart->save([
				'idcart'=>$_POST['idcart'],
				//':iduser'=>$_POST['iduser'],		
				':idpess'=>$_POST['idpess'],
				':dessessionid'=>$_POST['dessessionid']
			]);

			header("Location: /checkout");
			exit();
		}
	}
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
		'error'=>Pessoa::getError(),
		'erroInsc'=>Insc::getError()
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
	
		$insc->setData([
			'idcart'=>$idcart,
			'idinscstatus'=>InscStatus::AGUARDANDO_SORTEIO,
			'idturma'=>$idturma,
			'idtemporada'=>$idtemporada	
		]);

		$insc->save();

		$idinsc = $insc->getidinsc();	

		$numsorte = $insc->getnumsorte();	

		//var_dump($numsorte." - ".$email." - ".$idpess." - ".$nomepess." - ".$idinsc);
		//exit;

		$insc->inscricaoEmail($idinsc, $numsorte, $idpess, $nomepess, $email, $desperson, $desctemporada);

		//Turma::atualizaNumInscritos($idturma);
		
		$cart->removeTurma($turma, true);
		Cart::removeFromSession();
	    session_regenerate_id();
		
		header("Location: /profile/insc/".$insc->getidinsc());
		exit;	
});

/*
$app->get("/insc", function(){

	User::verifyLogin(false);

	$insc = new Insc();

	$page = new Page();

	$page->setTpl("insc", [
		'insc'=>$insc->getValues()
	]);
});
*/

/*
$app->get("/insc/:idinsc", function($idinsc){

	User::verifyLogin(false);

	$insc = new Insc();

	$insc->get((int)$idinsc);

	//$page = new Page();

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("insc", [
		'insc'=>$insc->getValues()
	]);

});
*/

$app->get("/profile/insc", function(){

	User::verifyLogin(false);

	$user = User::getFromSession();

	$page = new Page();

	$page->setTpl("profile-insc", [
		'insc'=>$user->getInsc()
	]);

});
	

$app->get("/profile/insc/:idinsc", function($idinsc){

	User::verifyLogin(false);

	$insc = new Insc();

	$insc->get((int)$idinsc);	

	//$insc = Insc::getFromId($idinsc);

	$page = new Page();

	$page->setTpl("profile-insc-detail", [
		'insc'=>$insc->getValues()
	]);	

});
/*
$app->get("/cart/:idturma/add", function($idturma){

	$turma = new Turma();

	$turma->get((int)$idturma);

	$cart = Cart::getFromSession();

	$idcart = (int)$_SESSION[Cart::SESSION]["idcart"];


	//var_dump($turma);
	//exit();

	if( Cart::cartIsEmpty($idcart) > 0){

		var_dump("Você já selecionou uma turma! remova a atual para continuar.");
		exit();

	}else{
				
			$cart->addTurma($turma);
	}		
	
	header("Location: /cart");
	exit;
});
*/

$app->get("/cart/:idturma/:idtemporada/add", function($idturma, $idtemporada){

	$turma = new Turma();

	$turma->get((int)$idturma);

	$cart = Cart::getFromSession();

	$idcart = (int)$_SESSION[Cart::SESSION]["idcart"];


	if( Cart::cartIsEmpty($idcart) > 0){


		Cart::setMsgError("Você já selecionou uma turma! remova a atual, se você quiser selecionar uma outra.");
		header("Location: /cart");
		exit();

		//var_dump("Você já selecionou uma turma! remova a atual para continuar.");
		//exit();

	}else{
				
			$cart->addTurma($turma);
	}		
	
	header("Location: /cart");
	exit;
});

$app->get("/cart/:idturma/remove", function($idturma){

	$turma = new Turma();

	$turma->get((int)$idturma);

	$cart = Cart::getFromSession();

	$cart->removeTurma($turma, true);

	Cart::removeFromSession();
    session_regenerate_id();

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

$app->get("/local/:idlocal", function($idlocal){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$local = new Local();

	$local->get((int)$idlocal);

	$pagination = $local->getTurmaLocalPage($page);	

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

$app->get("/locais", function() {

	$locais = Local::listAll();

	$page = new Page();

	$page->setTpl("locais", array(
		'locais'=>$locais
	));
});

/*
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
*/

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

	$page = new Page();

	$page->setTpl("atividade-detail", [
		'atividade'=>$atividade->getValues()
	]);
});

/*
$app->get("/turma/:idturma", function($idturma){

	$turma = new Turma();

	$turma->getFromId($idturma);

	$page = new Page();

	$page->setTpl("turma-detail", [
		'turma'=>$turma->getValues()
	]);
});
*/
$app->get("/turma/:idturma/:idtemporada", function($idturma, $idtemporada){

	$turma = new Turma();

	$turma->getFromIdTurmaTemporada($idturma, $idtemporada);

	/*
	if($turma->getFromIdTurmaTemporada($idturma, $idtemporada)){
		Turma::setMsgError('Desculpe, não foi possível selecionar esta turma e/ou temporada! Selecione outra.');
		header("Location: /turma/".$idturma."/".$idtemporada);
			//exit();
	}
	*/
	//var_dump($turma);
	//exit();

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


$app->get("/pessoa-create", function() {

	User::verifyLogin(false);

	//$endereco = new Endereco;
	$idperson = (int)$_SESSION[User::SESSION]["idperson"];

	Endereco::seEnderecoExiste($idperson);

		$page = new Page();

		$page->setTpl("pessoa-create", [
			'error'=>User::getError(),
			'errorRegister'=>User::getErrorRegister(),
			'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['nomepess'=>'', 'dtnasc'=>'', 'numcpf'=>'', 'numrg'=>'', 'numsus'=>'', 'cadunico'=>'', 'nomemae'=>'', 'cpfmae'=>'', 'nomepai'=>'', 'cpfpai'=>'']
		]);
	
});

$app->post("/registerpessoa", function(){

	User::verifyLogin(false);

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

	if (!isset($_POST['sexo']) || $_POST['sexo'] == '') {

		Pessoa::setErrorRegister("Informe o sexo.");
		header("Location: /pessoa-create");
		exit;
	}

	if (!isset($_POST['numcpf']) || $_POST['numcpf'] == '') {

		Pessoa::setErrorRegister("Informe o número do CPF.");
		header("Location: /pessoa-create");
		exit;
	}
	/*
	if (Pessoa::checkCpfExist($_POST['numcpf']) === true) {

		Pessoa::setErrorRegister("Este CPF pertence a outro usuário.");
		header("Location: /pessoa-create");
		exit;
	}
	*/

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

	if (!isset($_POST['vulnsocial']) || $_POST['vulnsocial'] == '') {

		Pessoa::setErrorRegister("Informe se a pessoa participa de programas sociais.");
		header("Location: /pessoa-create");
		exit;
	}	
	
	if ($_POST['vulnsocial'] === '1' && (!isset($_POST['cadunico']) || $_POST['cadunico'] == '')) {

		Pessoa::setErrorRegister("Informe o número do Cadastro Único (cadunico)");
		header("Location: /pessoa-create");
		exit;
	}

	if (!isset($_POST['nomemae']) || $_POST['nomemae'] == '') {

		Pessoa::setErrorRegister("Informe o nome da mãe.");
		header("Location: /pessoa-create");
		exit;
	}

	$_POST['statuspessoa'] = 1;

	//var_dump($_POST);
	//exit();


	$pessoa = new Pessoa();

	$pessoa->getPessoaExist();

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
		'statuspessoa'=>$_POST['statuspessoa']
	]);

	$pessoa->save();

	$_SESSION['registerValues'] = NULL;

	header('Location: /cart');
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

	//var_dump($user->getPessoa());
	//exit();

	$page = new Page();

	$page->setTpl("user-pessoas", [
		'errorRegister'=>User::getErrorRegister(),
		'pessoas'=>$user->getPessoa()
	]);

});

/*
$app->get("/modalidade/:idmodal", function($idmodal){

	$turma = new Turma();

	$turma->getFromIdTurmaModalidade($idmodal);

	//var_dump($turma);
	//exit();

	$page = new Page();

	$page->setTpl("modalidade", [
		'turma'=>$turma->getValues()
	]);
});
*/

$app->get("/modalidade/:idmodal", function($idmodal){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	//var_dump($modalidade);
	//exit();

	$pagination = $modalidade->getTurmaModalidadePage($page);	

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/modalidade/'.$modalidade->getidmodal().'?page='.$i,
			'page'=>$i
		]);
	}
	$page = new Page();

	$page->setTpl("modalidade", [
		'modalidade'=>$modalidade->getValues(),
		'turma'=>$pagination["data"],
		'pages'=>$pages
	]);
});

/*
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
*/
$app->get("/modalidades", function() {

	$modalidades = Modalidade::listAll();

	$page = new Page();

	$page->setTpl("modalidades", array(
		'modalidades'=>$modalidades
	));
});

$app->get("/endereco", function() {

	User::verifyLogin(false);

	$idperson = (int)$_SESSION[User::SESSION]["idperson"];

	$page = new Page();

	$page->setTpl("endereco", array(		
		'error'=>Endereco::getMsgError(),
		'enderecoValues'=>(
			isset($_SESSION['enderecoValues'])) 
		        ? $_SESSION['enderecoValues'] 
		        : ['cep'=>'','rua'=>'', 'numero'=>'', 'complemento'=>'', 'bairro'=>'' , 'cidade'=>'', 'estado'=>'', 'telres'=>'', 'telemer'=>'', 'contato'=>'']
	));

});

$app->post("/endereco", function() {

	User::verifyLogin(false);

	$idperson = (int)$_SESSION[User::SESSION]["idperson"];

	$_SESSION['enderecoValues'] = $_POST;

	$endereco = new Endereco(); 

	$menor = '09600000';
	$maior = '09899999';

	

	if (!isset($_POST['cep']) || $_POST['cep'] == '') {
		Endereco::setMsgError("Digite o número do cep.");
		header("Location: /endereco");
		exit;		
	}

	if (($_POST['cep']) < $menor || ($_POST['cep']) > $maior){

		Endereco::setMsgError("Cep inválido ou não cadastrado");
		header("Location: /endereco");
		exit;		
	}

	if (!isset($_POST['rua']) || $_POST['rua'] == '') {
		Endereco::setMsgError("Informe o nome da rua, avenida ou logradouro.");
		header("Location: /endereco");
		exit;		
	}	

	if (!isset($_POST['numero']) || $_POST['numero'] == '') {
		Endereco::setMsgError("Informe o nome da número do local.");
		header("Location: /endereco");
		exit;		
	}		
	if (!isset($_POST['bairro']) || $_POST['bairro'] == '') {
		Endereco::setMsgError("Informe o nome do bairro.");
		header("Location: /endereco");
		exit;		
	}		
	if (!isset($_POST['cidade']) || $_POST['cidade'] == '') {
		Endereco::setMsgError("Informe o nome da cidade.");
		header("Location: /endereco");
		exit;		
	}	

	if (!isset($_POST['estado']) || $_POST['estado'] == '') {
		Endereco::setMsgError("Informe o nome da estado.");
		header("Location: /endereco");
		exit;		
	}

	if (!isset($_POST['telemer']) || $_POST['telemer'] == '') {
		Endereco::setMsgError("Informe um número de telefone para ligar, em caso de emergência.");
		header("Location: /endereco");
		exit;		
	}
	if (!isset($_POST['contato']) || $_POST['contato'] == '') {
		Endereco::setMsgError("Informe um nome para entrar em contato, em caso de emergência");
		header("Location: /endereco");
		exit;		
	}

	$_POST['idperson'] = $idperson;

	//echo '<pre>';
	//var_dump($_POST);
	//echo '</pre>';
	//exit();


	$endereco = new Endereco();	

	$endereco->setData([
		//'idender'=>0,
		'idperson'=>$_POST['idperson'], 			
		'rua'=>$_POST['rua'],
		'numero'=>$_POST['numero'],
		'complemento'=>$_POST['complemento'],
		'bairro'=>$_POST['bairro'],
		'cidade'=>$_POST['cidade'],
		'estado'=>$_POST['estado'],
		'cep'=>$_POST['cep'],	
		'telres'=>$_POST['telres'],
		'telemer'=>$_POST['telemer'],
		'contato'=>$_POST['contato']
		
	]);	

	$endereco->save();

	$_SESSION['enderecoValues'] = NULL;
															

	header("Location: /login");
	exit();
});



?>