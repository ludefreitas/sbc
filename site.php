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
use \Sbc\Model\Local;
use \Sbc\Model\Saude;

$app->get('/', function() {

	$_SESSION['User'] = isset($_SESSION['User']) ? $_SESSION['User'] : $_SESSION['User'] = NULL;

	
	//if(isset($_SESSION['User']) && ($_SESSION['User']['inadmin'] != 1) && ($_SESSION['User']['isprof'] != 1)) {

	

	if(isset($_SESSION['User']) && $_SESSION['User']['inadmin'] != 1) {
	    
	    $userVisitante = User::pega_totalVisitantesOnline();
		if($userVisitante > 200){

			User::logout();
			User::forgotUserPass();
			User::setError('Limite de usuários online excedido! TTENTE NOVAMENTE MAIS TARDE');
			header('Location: /redirecionando');
		}
	}
	
	if(isset($_SESSION['User']) && $_SESSION['User']['inadmin'] != 1) {

		$userOnline = User::pega_totalUsuariosOnline();

		if($userOnline > 50){
		    User::logout();
			User::forgotUserPass();
			User::setError('Limite de usuários online excedido! TENTE NOVAMENTE MAIS TARDE.');
			header('Location: /redirecionando');
			exit();
		}
		
	}	

	

	if(!$_SESSION['User']){
		$sessao = NULL;
	}else{
		$sessao = session_id();
	}	

	$ip = $_SERVER['REMOTE_ADDR'];
	date_default_timezone_set('America/Sao_Paulo');
	$time = time();	
	$tempo  = $time - (60 * 10);

	User::grava_ip_online($ip, $tempo, $sessao);

	if(isset($_COOKIE['sisgen_user']) && isset($_COOKIE['sisgen_pass'])){

		$login = base64_decode($_COOKIE['sisgen_user']);
		$password = base64_decode($_COOKIE['sisgen_pass']);

		try {

			User::login($login, $password);

		} catch(Exception $e) {

			User::setError($e->getMessage());
			header("Location: /login");
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
		
	$page = new Page(); 

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

$app->get('/busca', function() {

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

		$pagination = Turma::getPageSearchTurmaTemporada($search, $page);

	$temporada = new Temporada();

	if(!isset($search) || $search == ''){

		Cart::setMsgError("Não foram encontradas turmas com a palavra digitada!");	
			header("Location: /");
			exit();
	}

	if(isset($search) && $search != NULL){

		Cart::setMsgError("Encontramos ".$pagination['total']." turmas com a palavra '".$search."' para esta temporada! ");			

		if( (int)date('Y')  == (int)$temporada->getdesctemporada() ){
			$anoAtual = (int)date('Y');	
		}else{
			$anoAtual = (int)date('Y') + 1;		
		}

		$page = new Page(); 

		$page->setTpl("busca", array(
			'turma'=>Turma::checkList($pagination['data']),
			"search"=>$search,
			'anoAtual'=>$anoAtual,
			'profileMsg'=>User::getSuccess(),
			'error'=>Cart::getMsgError(),
		));	
	}		
});

$app->get("/checkout", function(){

	User::verifyLogin(false);

	$cart = Cart::getFromSession();
	$user = User::getFromSession();	

	$idperson = (int)$_SESSION[User::SESSION]['idperson'];
	Endereco::seEnderecoExiste($idperson);

	$_SESSION['token'] = isset($_SESSION['token']) ? $_SESSION['token'] : '';
	$_SESSION['tokencpf'] = isset($_SESSION['tokencpf']) ? $_SESSION['tokencpf'] : 0;

	$token = $_SESSION['token'];
	$tokencpf = $_SESSION['tokencpf'];
	
	if(Cart::cartIsEmpty((int)$_SESSION[Cart::SESSION]['idcart']) === false){
		Cart::setMsgError("Selecione uma turma e a pessoa que irá fazer a aula! ");
		header("Location: /cart");
		exit();
	}

	$idcart = (int)$cart->getidcart();
	$idturma = (int)Cart::getIdturmaByCart($idcart);
	$idtemporada = $cart->getTurma()[0]['idtemporada'];
	$idmodal = $cart->getTurma()[0]['idmodal'];
	$vagas = (int)Turma::getVagasByIdTurma($idturma);

	//$pegainscGeral = (int)Insc::getInscGeral($idturma, $idtemporada);
	$pegainscGeral = 50;
	$pegainscPlm = (int)Insc::pegaInscPlm($idturma, $idtemporada);
	$pegainscPcd = (int)Insc::pegaInscPcd($idturma, $idtemporada);
	$pegainscPvs = (int)Insc::pegaInscPvs($idturma, $idtemporada);

	if($idturma == 598 || $idturma == 599 || $idturma == 600 || $idturma == 601){
		$vagasGeral = round($vagas * 0.0);
		$vagasPlm = round($vagas * 0.8);
		$vagasPcd = round($vagas * 0.1);
		$vagasPvs = round($vagas * 0.1);
	}else{
		$vagasGeral = round($vagas * 0.7);
		$vagasPlm = round($vagas * 0.1);
		$vagasPcd = round($vagas * 0.1);
		$vagasPvs = round($vagas * 0.1);
	}

	if($idmodal == 25){

		$maxListaEsperaGeral = round($vagasGeral * 2);
		$maxListaEsperaPlm = round($vagasPlm * 2);
		$maxListaEsperaPcd = round($vagasPcd * 2);
		$maxListaEsperaPvs = round($vagasPvs * 2);

	}else{

		$maxListaEsperaGeral = round($vagasGeral * 1.2);
		$maxListaEsperaPlm = round($vagasPlm * 1.2);
		$maxListaEsperaPcd = round($vagasPcd * 1.2);
		$maxListaEsperaPvs = round($vagasPvs * 1.2);
	}

	//var_dump($maxListaEsperaGeral);
	//var_dump($tokencpf);


	$page = new Page();

	$page->setTpl("checkout", [
		'token'=>$token,
		'tokencpf'=>$tokencpf,
		'cart'=>$cart->getValues(),
		'pessoa'=>$cart->getPessoa(),
		'turma'=>$cart->getTurma(),
		'cid'=>$cid = Saude::listAllCid(),
		'vagasGeral'=>$vagasGeral,
		'inscGeral'=>$pegainscGeral,
		'vagasPlm'=>$vagasPlm,
		'inscPlm'=>$pegainscPlm,
		'vagasPcd'=>$vagasPcd,
		'inscPcd'=>$pegainscPcd,
		'vagasPvs'=>$vagasPvs,
		'inscPvs'=>$pegainscPvs,
		'maxListaEsperaGeral'=>$maxListaEsperaGeral,
		'maxListaEsperaPlm'=>$maxListaEsperaPlm,
		'maxListaEsperaPcd'=>$maxListaEsperaPcd,
		'maxListaEsperaPvs'=>$maxListaEsperaPvs,
		'error'=>Pessoa::getError()
	]);
});

$app->post("/checkout", function(){

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
		header("Location: /checkout");
		exit();
	}
	/*
	if(!isset($_POST['laudo']) || $_POST['laudo'] == NULL){

		Pessoa::setError("Informe se você irá confirmar uma inscrição para pessoa com inscicação médica! ");
		header("Location: /checkout");
		exit();
	}
	*/

	if(isset($_POST['tipoinsc']) && $_POST['tipoinsc'] == 3 && $_POST['temlaudo'] == NULL){

		Pessoa::setError("Você está confirmando uma inscrição com laudo médico. Então, informe o CID que consta no laudo! ");
		header("Location: /checkout");
		exit();
	}

	if(isset($_POST['tipoinsc']) && $_POST['tipoinsc'] == 3 && $_POST['temlaudo'] != NULL){

		$codigolaudo = $_POST['temlaudo'];

		if(!$saude->obtemDoencaCid($codigolaudo)){

    		Pessoa::setError("CID não encontrado! Verifique se o CID foi digitado corretamente. O CID deve ser igual ao que consta no laudo médico. Exemplo: A00.0 ou A00");
			header("Location: /checkout");
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
		header("Location: /checkout");
		exit();
	}

	if(isset($_POST['tipoinsc']) && $_POST['tipoinsc'] == 4 && $_POST['deficiente'] != NULL){

		$codigodeficiencia = $_POST['deficiente'];

		if(!$saude->obtemDoencaCid($codigodeficiencia)){

    		Pessoa::setError("Dados de doença não encontrado! Verifique se o CID foi digitado corretamente e informe o CID da doença, igual ao que você informou nos dados de saude da pessoa que você está inscrevendo na turma");
				header("Location: /checkout");
			exit;

    	}
	}

    /*
	if(!isset($_POST['inscvuln']) || $_POST['inscvuln'] == NULL){

			Pessoa::setError("Informe se você irá confirmar uma inscrição para pessoa em condições de vulnerabiliade social (Sim ou Não)! ");
			header("Location: /checkout");
			exit();
	}
	*/
	
	if(!isset($_POST['edital']) || $_POST['edital'] == NULL){

		Pessoa::setError("Assinale que você leu os termos para as inscrições! ");
		header("Location: /checkout");
		exit();
	}

	if(!isset($_POST['ciente']) || $_POST['ciente'] == NULL){

		Pessoa::setError("Marque, logo abaixo, que você está ciente das regras para finalizar a inscrição! ");
		header("Location: /checkout");
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

	if($_POST['tipoinsc'] == 5){
		$inscpvs = 1;
	}else{
		$inscpvs = 0;
	}

	//$laudo = isset($_POST['laudo']) ? (int)$_POST['laudo'] : 0;
	//$inscpcd = isset($_POST['inscpcd']) ? (int)$_POST['inscpcd'] : 0;

	$cartsturmas = CartsTurmas::getCartsTurmasFromId($idcart);

	$turma = new Turma();

	$pessoa = new Pessoa();
	
	$insc = new Insc();	

	$desctemporada = $temporada->getdesctemporada();

	$idpess= $cart->getidpess();

	$pessoa->get((int)$idpess);

	$numcpf = $pessoa->getnumcpf();
	
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
				header("Location: /checkout");
				exit();
	}
	
	// idade 40 para idade inicial das hidros da pauliceia
	// idlocal 21 para comparar com local pauliceia
	// idmodal para para comparar com modalidade hidroginástica	
	
    if($laudo == 0){

		if($idlocal == 21 && $idmodal == 6){

			if(($anoAtual - $anoNasc) < 40){

				Pessoa::setError("Você deve marcar a opçãp 'Sim' em: Esta é uma inscrição para pessoa com laudo médico (Solicitação Médica) ");
				header("Location: /checkout");
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

		/*
		Status da inscrição, sem sorteio é aguardando matrícula ou fila de espera
		conforme 'if' abaixo

		$InscStatus = InscStatus::FILA_DE_ESPERA;
		*/

		$vagas = (int)Turma::getVagasByIdTurma($idturma);
		$pegainscGeral = (int)Insc::getInscGeral($idturma, $idtemporada);
		$pegaInscPlm = (int)Insc::pegaInscPlm($idturma, $idtemporada);
		$pegaInscPcd = (int)Insc::pegaInscPcd($idturma, $idtemporada);
		$pegaInscPvs = (int)Insc::pegaInscPvs($idturma, $idtemporada);
		if($idturma == 598 || $idturma == 599 || $idturma == 600 || $idturma == 601){
    		$vagasGeral = round($vagas * 0.0);
    		$vagasPlm = round($vagas * 0.8);
    		$vagasPcd = round($vagas * 0.1);
    		$vagasPvs = round($vagas * 0.1);
    	}else{
    		$vagasGeral = round($vagas * 0.7);
    		$vagasPlm = round($vagas * 0.1);
    		$vagasPcd = round($vagas * 0.1);
    		$vagasPvs = round($vagas * 0.1);
    	}

    	

		if($laudo === 0 AND $inscpcd === 0 AND $inscpvs === 0 ){
			if($pegainscGeral >= $vagasGeral){
				$InscStatus = InscStatus::FILA_DE_ESPERA;
			}else{
				$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
			}
		}else{
			if($laudo === 1 AND $inscpcd === 0 AND $inscpvs === 0 ){

				if($pegaInscPlm >= $vagasPlm){
					$InscStatus = InscStatus::FILA_DE_ESPERA;
				}else{
					$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
				}
			}elseif($laudo === 0 AND $inscpcd === 1 AND $inscpvs === 0 ){

				if($pegaInscPcd >= $vagasPcd){
					$InscStatus = InscStatus::FILA_DE_ESPERA;
				}else{
					$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
				}
			}elseif($laudo === 0 AND $inscpcd === 0 AND $inscpvs === 1 ){

				if($pegaInscPvs >= $vagasPvs){
					$InscStatus = InscStatus::FILA_DE_ESPERA;
				}else{
					$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
				}
			}
		}
		

		/*****/

		$InscStatus = InscStatus::FILA_DE_ESPERA;

		/*****/

		$numOrdemMax = Insc::numMaxNumOrdem($idtemporada, $idturma);
		$mumMatriculados = Insc::numMatriculados($idtemporada, $idturma);

		$numordem = $numOrdemMax[0]['maxNumOrdem'] + 1;
		$matriculados = $mumMatriculados[0]['nummatriculados'];

		$turma->get((int)$idturma);
		
		$vagas = $turma->getvagas();

		$token = $_POST['token'];
		$tokencpf = $_POST['tokencpf'];

		$posicao = $numordem - $vagas;

		$insc->setData([
			'idcart'=>$idcart,
			'idinscstatus'=>$InscStatus,
			'numordem'=>$numordem,
			'laudo'=>$laudo,
			'inscpcd'=>$inscpcd,
			'inscpvs'=>$inscpvs,
			'idturma'=>$idturma,
			'idtemporada'=>$idtemporada	
		]);

		if(!$cart->getInscExist($numcpf, $idpess, $idturma, $idtemporada)){
			$insc->save();
		}

		Turma::setUsedToken($idturma, $token);
		Turma::setUsedTokenCpf($idturma, $tokencpf);

		$idinsc = $insc->getidinsc();	

		$numsorte = $insc->getnumsorte();	

		$_SESSION['token'] = NULL;	
		$_SESSION['tokencpf'] = NULL;	

		$cart->removeTurma($turma, true);
		Cart::removeFromSession();
	    session_regenerate_id();

	    /*
	    ### Envio de Email desativado
	    $insc->inscricaoEmailPosSorteio($idinsc, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $posicao, $matriculados, $vagas);
	    */

	    if($InscStatus == 2){

	    	Insc::setSuccess("Inscrição EFETUADA COM SUCESSO! Lembre-se: As aulas já começaram. Então você deve comprarecer com os documentos pessoais, sem falta, já na próxima aula, no Centro Esportivo no dia e horário da aula escolhida.");        	
			header("Location: /profile/insc/".$insc->getidinsc()."/".$idpess."");
        	exit;

        }

        if($InscStatus == 7){

	    	Insc::setSuccess("Inscrição EFETUADA COM SUCESSO! Lembre-se: Não há vagas para esta turma. Esta inscrição está em uma lista de espera, aguardando o comunicado de uma eventual vaga. Mantenha atualizado, neste site, seu número de telefone celular, com whatsapp, para receber o comunicado.");        	
			header("Location: /profile/insc/".$insc->getidinsc()."/".$idpess."");
        	exit;

        }

	    /*
	    Insc::setSuccess("Inscrição EFETUADA COM SUCESSO! Clique, logo abaixo, em 'Detalhes' e depois em 'Minhas inscrições', para saber mais.");        	
		header("Location: /profile/insc/".$insc->getidinsc()."/".$idpess."");
        exit;	
        */

	}else{

		/*
		Status da inscrição, sem sorteio é aguardando matrícula ou fila de espera
		conforme 'if' abaixo

		$InscStatus = InscStatus::AGUARDANDO_SORTEIO;

		*/

		$vagas = (int)Turma::getVagasByIdTurma($idturma);
		$inscGeral = (int)Insc::getInscGeral($idturma, $idtemporada);
		$pegaInscPlm = (int)Insc::pegaInscPlm($idturma, $idtemporada);
		$pegaInscPcd = (int)Insc::pegaInscPcd($idturma, $idtemporada);
		$pegaInscPvs = (int)Insc::pegaInscPvs($idturma, $idtemporada);
		if($idturma == 598 || $idturma == 599 || $idturma == 600 || $idturma == 601){
    		$vagasGeral = round($vagas * 0.0);
    		$vagasPlm = round($vagas * 0.8);
    		$vagasPcd = round($vagas * 0.1);
    		$vagasPvs = round($vagas * 0.1);
    	}else{
    		$vagasGeral = round($vagas * 0.7);
    		$vagasPlm = round($vagas * 0.1);
    		$vagasPcd = round($vagas * 0.1);
    		$vagasPvs = round($vagas * 0.1);
    	}

		if($laudo === 0 AND $inscpcd === 0 AND $inscpvs === 0 ){
			if($pegainscGeral >= $vagasGeral){
				$InscStatus = InscStatus::FILA_DE_ESPERA;
			}else{
				$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
			}
		}else{
			if($laudo === 1 AND $inscpcd === 0 AND $inscpvs === 0 ){

				if($pegaInscPlm >= $vagasPlm){
					$InscStatus = InscStatus::FILA_DE_ESPERA;
				}else{
					$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
				}
			}elseif($laudo === 0 AND $inscpcd === 1 AND $inscpvs === 0 ){

				if($pegaInscPcd >= $vagasPcd){
					$InscStatus = InscStatus::FILA_DE_ESPERA;
				}else{
					$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
				}
			}elseif($laudo === 0 AND $inscpcd === 0 AND $inscpvs === 1 ){

				if($pegaInscPvs >= $vagasPvs){
					$InscStatus = InscStatus::FILA_DE_ESPERA;
				}else{
					$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
				}
			}
		}

		$token = $_POST['token'];
		$tokencpf = $_POST['tokencpf'];
		
		$numordem = 0;	

		$insc->setData([
			'idcart'=>$idcart,
			'idinscstatus'=>$InscStatus,
			'numordem'=>$numordem,
			'laudo'=>$laudo,
			'inscpcd'=>$inscpcd,
			'inscpvs'=>$inscpvs,
			'idturma'=>$idturma,
			'idtemporada'=>$idtemporada	
		]);

		if(!$cart->getInscExist($numcpf, $idpess, $idturma, $idtemporada)){
			$insc->save();
		}

		Turma::setUsedToken($idturma, $token);		
		Turma::setUsedTokenCpf($idturma, $tokencpf);		

		$idinsc = $insc->getidinsc();	

		$numsorte = $insc->getnumsorte();

		$turma->get((int)$idturma);

		$_SESSION['token'] = NULL;
		$_SESSION['tokencpf'] = NULL;

		$cart->removeTurma($turma, true);
		Cart::removeFromSession();
	    session_regenerate_id();

	    /*
	     ### Envio de Email desativado

	    $insc->inscricaoEmail($idinsc, $numsorte, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma);
	    */

	    if($InscStatus == 2){

	    	Insc::setSuccess("Inscrição EFETUADA COM SUCESSO! Lembre-se: As aulas já começaram. Então você deve comprarecer com os documentos pessoais, sem falta, já na próxima aula, no Centro Esportivo no dia e horário da aula escolhida.");        	
			header("Location: /profile/insc/".$insc->getidinsc()."/".$idpess."");
        	exit;

        }

        if($InscStatus == 7){

	    	Insc::setSuccess("Inscrição EFETUADA COM SUCESSO! Lembre-se: Não há vagas para esta turma. Esta inscrição está em uma lista de espera, aguardando o comunicado de uma eventual vaga. Mantenha atualizado, neste site, seu número de telefone celular, com whatsapp, para receber o comunicado.");        	
			header("Location: /profile/insc/".$insc->getidinsc()."/".$idpess."");
        	exit;

        }

        /*
	    Insc::setSuccess("Inscrição EFETUADA COM SUCESSO! Clique, logo abaixo, em 'Detalhes' e depois em 'Minhas inscrições', para saber mais.");        	
		header("Location: /profile/insc/".$insc->getidinsc()."/".$idpess."");
        exit;	
        */
	}	
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

		Turma::setMsgError("Não existem inscrições diponíveis para esta temporada. Para a temporada 2021 o período de inscrições foi de xx/xx/xxxx a xx/xx/xxxx conforme resolução (xxxxx) publicada no jornal Notícias do Município de xx/xx/xxxx. O sorteio acontecerá dia xx/xx/xxxx. A partir do dia xx/xx/xxxx iniciar-se-a a etapa de matrículas, para os contemplados, no Centro Esportivo no dia e horário de sua aula. Acompanhe o status da sua inscrição, clicando aqui.");

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
		'profileMsg'=>User::getSuccess(),
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
	//echo "<script>javascript:history.go(-2)</script>";
	exit;
});

$app->get("/logout", function(){

	User::logout();

	User::forgotUserPass();

	Cart::removeFromSession();
	
	session_regenerate_id();

	header("Location: /login");
	exit;
});

$app->get("/forgot/site", function() {


	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-site");	
});

$app->post("/forgot-site", function(){

	User::getForgotSite($_POST["email"]);

	if($_POST['novasenha'] != $_POST['repetesenha']){
		echo "<script>alert('As senhas digitadas são  diferentes');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}	

	User::setPasswordSite($_POST["novasenha"], $_POST["email"]);

	echo "<script>alert('Senha alterada com sucesso!');";
		echo "location.href='/login'</script>";
		exit();	
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


$app->get("/tutorial", function() {

	$page = new Page();

	$page->setTpl("tutorial");	
});


$app->get("/enderecolocais", function() {

	$local = new Local();

	$local = $local->listAll();

	$page = new Page();

	$page->setTpl("enderecolocais", array(
		"locais"=>$local
		));
});

$app->get("/redirecionando", function() {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("redirecionando");
});

$app->get("/transparent", function() {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("transparent");
});

$app->get("/par-q", function() {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("par-q");
});

$app->post("/par-q/enviar", function() {

	var_dump($_POST);
	
});

$app->get("/craquesdofuturo", function() {

	$page = new Page();

	$page->setTpl("craquesdofuturo");
});

$app->get("/endereco-craques", function() {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("endereco-craques");
});

$app->get("/judo", function() {

	$page = new Page();

	$page->setTpl("judo");
});

$app->get("/zumba", function() {

	$page = new Page();

	$page->setTpl("zumba");
});

/*
$app->get("/calendario", function() {

	User::verifyLogin(false);

	$page = new Page();

	$page->setTpl("calendario");	
});
*/




?>