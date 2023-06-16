<?php

use \Sbc\PageCursos;
use \Sbc\Model\Turma;
use \Sbc\Model\Temporada;
use \Sbc\Model\Cart;
use \Sbc\Model\Pessoa;
use \Sbc\Model\User;
use \Sbc\Model\Insc;
use \Sbc\Model\InscStatus;
use \Sbc\Model\CartsTurmas;
use \Sbc\Model\Endereco;
use \Sbc\Model\Local;
use \Sbc\Model\Saude;

$app->get('/cursos', function() {

	if(isset($_COOKIE['sisgen_user']) && isset($_COOKIE['sisgen_pass'])){

		$login = base64_decode($_COOKIE['sisgen_user']);
		$password = base64_decode($_COOKIE['sisgen_pass']);

		try {

			User::login($login, $password);

		} catch(Exception $e) {

			User::setError($e->getMessage());
			header("Location: /cursos/login");
			exit;
		}	

	}

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

			Cart::setMsgError("Não existem inscrições diponíveis para esta temporada!.");
			//Cart::setMsgError("Não existem inscrições diponíveis para esta temporada!. Para a temporada 2021 o período de inscrições foi de xx/xx/xxxx a xx/xx/xxxx conforme resolução (xxxxx) publicada no jornal Notícias do Município de xx/xx/xxxx. O sorteio acontecerá dia xx/xx/xxxx. A partir do dia xx/xx/xxxx iniciar-se-a a etapa de matrículas, para os contemplados, no Centro Esportivo no dia e horário de sua aula. Acompanhe o status da sua inscrição, clicando aqui.");

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

	// Aqui verifica se a temporada é igual ao ano atual
	// Se não for acrescenta (1). Supondo que a inscrição está sendo feita no ano anterior
	if( (int)date('Y')  == (int)$temporada->getdesctemporada() ){

		$anoAtual = (int)date('Y');	

	}else{

		$anoAtual = (int)date('Y') + 1;		
	}

	$locais = Local::listAllCrecAtivo();

	if(!isset($locais) || $locais == NULL){

		Cart::setMsgError("Não existe Crecs Cadastrados para esta temporada. A temporada pode não estar iniciada, estar em processo de sorteio ou foi encerrada. Aguarde, ou entre em contato com o Centro Esportivo mais próximo a sua casa. ");
	}		
		
	$page = new PageCursos(); 

	$page->setTpl("index", array(
		'turma'=>Turma::checkList($pagination['data']),
		'idtemporada'=>$temporada->getidtemporada(),
		'search'=>$search,
		'anoAtual'=>$anoAtual,
		'profileMsg'=>User::getSuccess(),
		'error'=>Cart::getMsgError(),
		'locais'=>$locais,
	));
});

$app->get('/cursos/busca', function() {

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

		$pagination = Turma::getPageSearchTurmaTemporada($search, $page);

	$temporada = new Temporada();

	if(!isset($search) || $search == ''){

		Cart::setMsgError("Não foram encontradas turmas com a palavra digitada!");	
			header("Location: /cursos");
			exit();
	}

	if(isset($search) && $search != NULL){

		Cart::setMsgError("Encontramos ".$pagination['total']." turmas com a palavra '".$search."' para esta temporada! ");			

		if( (int)date('Y')  == (int)$temporada->getdesctemporada() ){
			$anoAtual = (int)date('Y');	
		}else{
			$anoAtual = (int)date('Y') + 1;		
		}

		$page = new PageCursos(); 

		$page->setTpl("busca", array(
			'turma'=>Turma::checkList($pagination['data']),
			"search"=>$search,
			'anoAtual'=>$anoAtual,
			'profileMsg'=>User::getSuccess(),
			'error'=>Cart::getMsgError(),
		));	
	}		
});

$app->get("/cursos/verifica", function(){

	User::verifyLogin(false);

	$cart = Cart::getFromSession();
	$user = User::getFromSession();	

	$idperson = (int)$_SESSION[User::SESSION]['idperson'];
	Endereco::seEnderecoExiste($idperson);

	$_SESSION['token'] = isset($_SESSION['token']) ? $_SESSION['token'] : '';

	$token = $_SESSION['token'];
	
	if(Cart::cartIsEmpty((int)$_SESSION[Cart::SESSION]['idcart']) === false){
		Cart::setMsgError("Selecione uma turma e a pessoa que irá fazer a aula! ");
		header("Location: /cursos/cart");
		exit();
	}
	
	$idcart = (int)$cart->getidcart();
	$idturma = (int)Cart::getIdturmaByCart($idcart);
	$idtemporada = $cart->getTurma()[0]['idtemporada'];
	$vagas = (int)Turma::getVagasByIdTurma($idturma);

	$inscGeral = (int)Insc::getInscGeral($idturma, $idtemporada);
	$inscPlm = (int)Insc::pegaInscPlm($idturma, $idtemporada);
	$inscPcd = (int)Insc::pegaInscPcd($idturma, $idtemporada);
	$inscPvs = (int)Insc::pegaInscPvs($idturma, $idtemporada);

	$vagasGeral = round($vagas * 0.7);
	$vagasPlm = round($vagas * 0.1);
	$vagasPcd = round($vagas * 0.1);
	$vagasPvs = round($vagas * 0.1);

	$maxListaEsperaGeral = round($vagasGeral * 1.2);
	$maxListaEsperaPlm = round($vagasPlm * 1.2);
	$maxListaEsperaPcd = round($vagasPcd * 1.2);
	$maxListaEsperaPvs = round($vagasPvs * 1.2);

	$page = new PageCursos(); 

	$page->setTpl("verifica", [
		'token'=>$token,
		'cart'=>$cart->getValues(),
		'pessoa'=>$cart->getPessoa(),
		'turma'=>$cart->getTurma(),
		'cid'=>$cid = Saude::listAllCid(),
		'error'=>Pessoa::getError()
	]);
});

$app->post("/cursos/verifica", function(){

	User::verifyLogin(false);

	$user = User::getFromSession();
	$cart = Cart::getFromSession();

	$saude = new Saude();

	$idcart = (int)$cart->getidcart();

	$idtemporada = $_POST['idtemporada'];
	$idturma = $_POST['idturma'];

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	if(!isset($_POST['tipoinsc']) || $_POST['tipoinsc'] == NULL){

		Pessoa::setError("A inscrição NÃO foi finalizada!!! Informe se você irá confirmar uma inscrição para PÚBLICO em GERAL ou COM LAUDO ou para PESSOA COM DEFICIÊNCIA ou PARA PESSOA EM VULNERABILIDADE SOCIAL. ");
		header("Location: /cursos/verifica");
		exit();
	}
	

	if(isset($_POST['tipoinsc']) && $_POST['tipoinsc'] == 3 && $_POST['temlaudo'] == NULL){

		Pessoa::setError("Você está confirmando uma inscrição com laudo médico. Então, informe o CID que consta no laudo! ");
		header("Location: /cursos/verifica");
		exit();
	}

	if(isset($_POST['tipoinsc']) && $_POST['tipoinsc'] == 3 && $_POST['temlaudo'] != NULL){

		$codigolaudo = $_POST['temlaudo'];

		if(!$saude->obtemDoencaCid($codigolaudo)){

    		Pessoa::setError("CID não encontrado! Verifique se o CID foi digitado corretamente. O CID deve ser igual ao que consta no laudo médico. Exemplo: A00.0 ou A00");
			header("Location: /cursos/verifica");
			exit;

		}
		
	}
	
    /*
	if(!isset($_POST['inscpcd']) || $_POST['inscpcd'] == NULL){

			Pessoa::setError("Informe se você irá confirmar uma inscrição para pessoa com deficiência! ");
			header("Location: /checkout");
			exit();
	}
	*/

	if(isset($_POST['tipoinsc']) && $_POST['tipoinsc'] == 4 && $_POST['deficiente'] == NULL){

		Pessoa::setError("Você está confirmando uma inscrição para Pessoa Com Deficiência. Então, informe o CID da doença, igual ao que você informou nos dados de saúde da pessoa que você está inscrevendo nesta turma! Exemplo: A00.0 ou A00 ");
		header("Location: /cursos/verifica");
		exit();
	}

	if(isset($_POST['tipoinsc']) && $_POST['tipoinsc'] == 4 && $_POST['deficiente'] != NULL){

		$codigodeficiencia = $_POST['deficiente'];

		if(!$saude->obtemDoencaCid($codigodeficiencia)){

    		Pessoa::setError("Dados de doença não encontrado! Verifique se o CID foi digitado corretamente e informe o CID da doença, igual ao que você informou nos dados de saude da pessoa que você está inscrevendo na turma");
				header("Location: /cursos/verifica");
			exit;

    	}
	}
	
	if(!isset($_POST['edital']) || $_POST['edital'] == NULL){

		Pessoa::setError("Assinale que você leu os termos para as inscrições! ");
		header("Location: /cursos/verifica");
		exit();
	}

	if(!isset($_POST['ciente']) || $_POST['ciente'] == NULL){

		Pessoa::setError("Marque, logo abaixo, que você está ciente das regras para finalizar a inscrição! ");
		header("Location: /cursos/verifica");
		exit();
	}

	if($_POST['tipoinsc'] == 3){
		$laudo = 1;
	}else{
		$laudo = 0;
	}

	if($_POST['tipoinsc'] == 4){
		$inscpcd = 1;
	}else{
		$inscpcd = 0;
	}

	$cartsturmas = CartsTurmas::getCartsTurmasFromId($idcart);

	$turma = new Turma();

	$pessoa = new Pessoa();
	
	$insc = new Insc();	

	$desctemporada = $temporada->getdesctemporada();

	$idpess= $cart->getidpess();

	$pessoa->get((int)$idpess);
	
	$anoNasc = $pessoa->getdtnasc();
	
	$anoNasc = new DateTime($anoNasc);
	
	$anoNasc = (int)$anoNasc->format('Y');
	
	if( (int)date('Y')  == (int)$desctemporada ){

		$anoAtual = (int)date('Y');	

	}else{

		$anoAtual = (int)date('Y') + 1;		
	}
	
	$idlocal = $_POST['idlocal'];	
	
	$initidade = $_POST['initidade'];
	
	$idmodal = $_POST['idmodal'];

	// Verifica se pessoa possui número CadÚnico cadastrado

	$checkcadunicoexist = Pessoa::checkCadunicoExist($idpess);

	if(empty($checkcadunicoexist) AND $_POST['tipoinsc'] == 5 ){	

		Pessoa::setError("Você informou que esta inscrição é para pessoa em condições de vulnerabiliade social (que participa de programas sociais do governo). Para prosseguir, você precisa atualizar/alterar o cadastro do(a) ".$pessoa->getnomepess().", informado o número do CadÚnico/NIS.");				
				header("Location: /cursos/verifica");
				exit();
	}
	
	// idade 40 para idade inicial das hidros da pauliceia
	// idlocal 21 para comparar com local pauliceia
	// idmodal para para comparar com modalidade hidroginástica	
	
    if($laudo == 0){

		if($idlocal == 21 && $idmodal == 6){

			if(($anoAtual - $anoNasc) < 40){

				Pessoa::setError("Você deve marcar a opçãp 'Sim' em: Esta é uma inscrição para pessoa com laudo médico (Solicitação Médica) ");
				header("Location: /cursos/verifica");
				exit();
		   }
	    }	
	}	

	$nomepess = $pessoa->getnomepess();

	$email = $user->getdesemail();	

	$desperson = $user->getdesperson();		

	//if(Insc::statusTemporadaMatriculaIniciada($idtemporada)){
		//$InscStatus = InscStatus::AGUARDANDO_MATRICULA;

	//}

	if(Insc::statusTemporadaMatriculasEncerradas($idtemporada)){

		$InscStatus = InscStatus::FILA_DE_ESPERA;

		$numOrdemMax = Insc::numMaxNumOrdem($idtemporada, $idturma);
		$mumMatriculados = Insc::numMatriculados($idtemporada, $idturma);

		$numordem = $numOrdemMax[0]['maxNumOrdem'] + 1;
		$matriculados = $mumMatriculados[0]['nummatriculados'];

		$turma->get((int)$idturma);
		
		$vagas = $turma->getvagas();

		$token = $_POST['token'];

		$posicao = $numordem - $vagas;

		$insc->setData([
			'idcart'=>$idcart,
			'idinscstatus'=>$InscStatus,
			'numordem'=>$numordem,
			'laudo'=>$laudo,
			'inscpcd'=>$inscpcd,
			'idturma'=>$idturma,
			'idtemporada'=>$idtemporada	
		]);

		$insc->save();

		Turma::setUsedToken($idturma, $token);

		$idinsc = $insc->getidinsc();	

		$numsorte = $insc->getnumsorte();	

		$_SESSION['token'] = NULL;	

		$cart->removeTurma($turma, true);
		Cart::removeFromSession();
	    session_regenerate_id();

	    $insc->inscricaoEmailPosSorteioCursos($idinsc, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $posicao, $matriculados, $vagas);

		header("Location: /cursos/profile/insc/".$insc->getidinsc()."/".$idpess."");
		
        exit;	

	}else{

		$InscStatus = InscStatus::AGUARDANDO_SORTEIO;

		$token = $_POST['token'];
		
		$numordem = 0;	

		$insc->setData([
			'idcart'=>$idcart,
			'idinscstatus'=>$InscStatus,
			'numordem'=>$numordem,
			'laudo'=>$laudo,
			'inscpcd'=>$inscpcd,
			'idturma'=>$idturma,
			'idtemporada'=>$idtemporada	
		]);

		$insc->save();

		Turma::setUsedToken($idturma, $token);		

		$idinsc = $insc->getidinsc();	

		$numsorte = $insc->getnumsorte();

		$turma->get((int)$idturma);

		$_SESSION['token'] = NULL;

		$cart->removeTurma($turma, true);
		Cart::removeFromSession();
	    session_regenerate_id();

	    $insc->inscricaoEmailCursos($idinsc, $numsorte, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma);

		header("Location: /cursos/profile/insc/".$insc->getidinsc()."/".$idpess."");
		exit;
	}	
});

$app->get("/cursos/turma/:idturma/:idtemporada", function($idturma, $idtemporada){

	$turma = new Turma();

	$turma->getFromIdTurmaTemporada($idturma, $idtemporada);

	if(
		$turma->getidstatustemporada() != 4 
	   	AND $turma->getidstatustemporada() != 5 
	    AND $turma->getidstatustemporada() != 6
		)
	{

		Turma::setMsgError("Não existem inscrições diponíveis para esta temporada. Para a temporada 2021 o período de inscrições foi de xx/xx/xxxx a xx/xx/xxxx conforme resolução (xxxxx) publicada no jornal Notícias do Município de xx/xx/xxxx. O sorteio acontecerá dia xx/xx/xxxx. A partir do dia xx/xx/xxxx iniciar-se-a a etapa de matrículas, para os contemplados, no Centro Esportivo no dia e horário de sua aula. Acompanhe o status da sua inscrição, clicando aqui.");

	}

	$page = new PageCursos(); 

	$page->setTpl("turma-detail", [
		'turma'=>$turma->getValues(),
		'error'=>Turma::getMsgError(),
	]);
});

$app->get("/cursos/login", function(){

	$page = new PageCursos(); 

	/*
	$page = new PageCursos([
		"header"=>false,
		"footer"=>false
	]);
	*/

	$page->setTpl("login", [
		'error'=>User::getError(),
		'profileMsg'=>User::getSuccess(),
		'errorRegister'=>User::getErrorRegister()
		//'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'', 'phone'=>'']
	]);
});

$app->post("/cursos/login", function(){

	try {

		User::login($_POST['login'], $_POST['password']);

	} catch(Exception $e) {

		User::setError($e->getMessage());
		header("Location: /cursos/login");
		exit;
	}

	header("Location: /cursos");
	exit;
});

$app->get("/cursos/logout", function(){

	User::logout();

	User::forgotUserPass();

	Cart::removeFromSession();
	
	session_regenerate_id();

	header("Location: /cursos/login");
	exit;
});




$app->get("/cursos/forgot", function() {


	$page = new PageCursos([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot");	
});


$app->post("/cursos/forgot", function($email){

	$user = User::getForgot($_POST["email"], false);

	header("Location: /cursos/forgot/sent");
	exit;
});

$app->get("/cursos/forgot/sent", function(){

	$page = new PageCursos(); 

	$page->setTpl("forgot-sent");	
});


$app->get("/cursos/forgot/reset", function(){

	$user = User::validForgotDecrypt($_GET["code"]);

	$page = new PageCursos(); 

	$page->setTpl("forgot-reset", array(
		"name"=>$user["desperson"],
		"code"=>$_GET["code"]
	));
});

$app->post("/cursos/forgot/reset", function(){

	$forgot = User::validForgotDecrypt($_POST["code"]);	

	User::setFogotUsed($forgot["idrecovery"]);

	$user = new User();

	$user->get((int)$forgot["iduser"]);

	$password = User::getPasswordHash($_POST["password"]);

	$user->setPassword($password);

	$page = new PageCursos(); 

	$page->setTpl("forgot-reset-success");
});


$app->get("/cursos/comprovante", function() {

	$page = new PageCursos([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("comprovante-insc");	
});

?>