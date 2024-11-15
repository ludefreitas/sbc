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
   
	$httpResponse = http_response_code();
	
	//if($httpResponse == 200 || $httpResponse == 200){
	if($httpResponse == 505 || $httpResponse == 500){

		//header('Location: /redirecionando');
		echo "<script>window.location.href = '/redirecionando'</script>";
		exit();
	}
    
    $_SESSION['User'] = isset($_SESSION['User']) ? $_SESSION['User'] : $_SESSION['User'] = NULL;
    
    //if(isset($_SESSION['User']) && (($_SESSION['User']['inadmin'] != 1) || ($_SESSION['User']['isprof'] != 1))) {
    
    /*
	if(isset($_SESSION['User']) && $_SESSION['User']['inadmin'] != 1) {
	    
	    $userVisitante = User::pega_totalVisitantesOnline();
		if($userVisitante > 200){

			User::logout();
			User::forgotUserPass();
			User::setError('Limite de usuários online excedido! TTENTE NOVAMENTE MAIS TARDE');
			header('Location: /redirecionando');
		}
	}
	*/

	if(isset($_SESSION['User']) && (($_SESSION['User']['inadmin'] != 1) || ($_SESSION['User']['isprof'] != 1))) {
	//if(isset($_SESSION['User']) && $_SESSION['User']['inadmin'] != 1) {

		$userOnline = User::pega_totalUsuariosOnline();

		if($userOnline > 1000){
		    //User::logout();
			//User::forgotUserPass();
			//User::setError('Limite de usuários online excedido! TENTE NOVAMENTE MAIS TARDE.');
			echo "<script>window.location.href = '/redirecionando'</script>";
			//header('Location: /redirecionando');
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
			//header("Location: /login");
			echo "<script>window.location.href = '/login'</script>";
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

			Cart::setMsgError("Não existem turmas diponíveis para se fazer inscrições, no momento! Aguarde. Inscrições somente a partir de 15/01/2024");
			
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

			//Altera status para idstatustemporada = 4 - Incrições iniciadas
			Temporada::alterarStatusTemporadaParaIncricoesIniciadas($dtInicinscricao, $idtemporada);
		}	
		
		if($temporada->getidstatustemporada() == 4){ // statustemporada = Inscrições iniciadas

			//Altera status para idstatustemporada = 3 - Incrições encerradas
			Temporada::alterarStatusTemporadaParaInscricoesEncerradas($dtTerminscricao, $idtemporada);
		}		
		
		if($temporada->getidstatustemporada() == 3){ // statustemporada = Inscrições encerradas

			//Altera status para idstatustemporada = 6 - Matrícula iniciada
			Temporada::alterarStatusTemporadaParaMatriculasIniciadas($dtInicmatricula, $idtemporada);
		}

		if($temporada->getidstatustemporada() == 6){ // statustemporada = Matrículas iniciadas

			//Altera status para idstatustemporada = 5 - Matrículas Encerradas
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
			//header("Location: /");
			echo "<script>window.location.href = '/'</script>";
			exit();
	}

	if(isset($search) && $search != NULL){

		Cart::setMsgError("Encontramos ".$pagination['total']." turmas com a palavra '".$search."' para esta temporada! ");
		
		$desctemporada = $pagination['data'][0]['desctemporada']; 

		if( (int)date('Y')  == (int)$desctemporada ){
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
	
	if($_SESSION['User']['iduser'] != 89){
	    $turma = $cart->getTurma();
	}else{
	    $turma = $cart->getTurmaFull();
	}
	
	if($_SESSION['User']['iduser'] != 89){
	    $idtemporada = $cart->getTurma()[0]['idtemporada'];
	    $idmodal = $cart->getTurma()[0]['idmodal'];
	}else{
	    $idtemporada = $cart->getTurmaFull()[0]['idtemporada'];
	    $idmodal = $cart->getTurmaFull()[0]['idmodal'];
	}				

	$cart = Cart::getFromSession();
	$user = User::getFromSession();
	$insc = new Insc();

	$idperson = (int)$_SESSION[User::SESSION]['idperson'];
	Endereco::seEnderecoExiste($idperson);
	
	$_SESSION['token'] = isset($_SESSION['token']) ? $_SESSION['token'] : '';
	$_SESSION['tokencpf'] = isset($_SESSION['tokencpf']) ? $_SESSION['tokencpf'] : 0;

	$token = $_SESSION['token'];
	$tokencpf = $_SESSION['tokencpf'];
	
	/*
	if(Cart::cartIsEmpty((int)$_SESSION[Cart::SESSION]['idcart']) === false){
		Cart::setMsgError("Selecione uma turma e a pessoa que irá fazer a aula! ");
		//header("Location: /cart");
		echo "<script>window.location.href = '/cart'</script>";
		exit();
	}
	*/
	
	$idcart = (int)$cart->getidcart();
	$idturma = (int)Cart::getIdturmaByCart($idcart);
	//$idtemporada = $cart->getTurma()[0]['idtemporada'];
	//$idmodal = $cart->getTurma()[0]['idmodal'];
	$vagas = (int)Turma::getVagasByIdTurma($idturma);
	
	$vagasGeral = (int)Turma::getVagasByIdTurma($idturma);
	$vagasPlm = (int)Turma::getVagasLaudoByIdTurma($idturma);
	$vagasPcd = (int)Turma::getVagasPcdByIdTurma($idturma);
	$vagasPvs = (int)Turma::getVagasPvsByIdTurma($idturma);
	$pegainscGeral = Insc::getNumInscPublicoGeralValidaTurmaTemporada($idtemporada, $idturma);
	//$pegainscGeral = (int)$insc->pegaInscGeral($idturma, $idtemporada);
	$pegainscPlm = Insc::getNumInscPublicoLaudoValidaTurmaTemporada($idtemporada, $idturma);
	//$pegainscPlm = (int)$insc->pegaInscPlm($idturma, $idtemporada);
	$pegainscPcd = Insc::getNumInscPublicoPcdValidaTurmaTemporada($idtemporada, $idturma);
	//$pegainscPcd = (int)$insc->pegaInscPcd($idturma, $idtemporada);
	$pegainscPvs = Insc::getNumInscPublicoPvsValidaTurmaTemporada($idtemporada, $idturma);
	//$pegainscPvs = (int)$insc->pegaInscPvs($idturma, $idtemporada);
	
	$vagasListaEsperaGeral = (int)ceil($vagasGeral * 0.2);
	$vagasListaEsperaPlm = (int)ceil($vagasPlm * 0.2);
	$vagasListaEsperaPcd = (int)ceil($vagasPcd * 0.2);
	$vagasListaEsperaPvs = (int)ceil($vagasPvs * 0.2);

	$vagasMenosInscritosGeral = $vagasGeral - $pegainscGeral + $vagasListaEsperaGeral;
	$vagasMenosInscritosPlm = $vagasPlm - $pegainscPlm + $vagasListaEsperaPlm;
	$vagasMenosInscritosPcd = $vagasPcd - $pegainscPcd + $vagasListaEsperaPcd;
	$vagasMenosInscritosPvs = $vagasPvs - $pegainscPvs + $vagasListaEsperaPvs;

	$idturmastatus = $turma[0]['idturmastatus'];
	
	if($idturmastatus == 3){			
		$vagasListaEsperaGeral = $vagasMenosInscritosGeral;
		$vagasListaEsperaPlm = $vagasMenosInscritosPlm;
		$vagasListaEsperaPcd = $vagasMenosInscritosPcd;
		$vagasListaEsperaPvs = $vagasMenosInscritosPvs;			
	}else{
		if($idmodal == 25){
				$vagasListaEsperaGeral = (int)ceil($vagasGeral * 0.5);
				$vagasListaEsperaPlm = (int)ceil($vagasPlm * 0.5);
				$vagasListaEsperaPcd = (int)ceil($vagasPcd * 0.5);
				$vagasListaEsperaPvs = (int)ceil($vagasPvs * 0.5);	
			}else{
				$vagasListaEsperaGeral = (int)ceil($vagasGeral * 0.2);
				$vagasListaEsperaPlm = (int)ceil($vagasPlm * 0.2);
				$vagasListaEsperaPcd = (int)ceil($vagasPcd * 0.2);
				$vagasListaEsperaPvs = (int)ceil($vagasPvs * 0.2);		
			}			
	}		
	
	$numinscListaEsperaPublicoGeral = Insc::getNumInscListaEsperaPubGeralTurmaTemporada($idtemporada, $idturma);
	$numinscListaEsperaPublicoLaudo = Insc::getNumInscListaEsperaPubLaudoTurmaTemporada($idtemporada, $idturma);
	$numinscListaEsperaPublicoPcd = Insc::getNumInscListaEsperaPubPcdTurmaTemporada($idtemporada, $idturma);
	$numinscListaEsperaPublicoPvs = Insc::getNumInscListaEsperaPubPvsTurmaTemporada($idtemporada, $idturma);
	
	// Verifica se token é usado ou não. se for usado retorna 1, se não retorna 0.
	// se não existir retorna 1
	$tokencpf = Turma::tokemValido($tokencpf, $idturma);
	
	if($tokencpf == true){
	    
	    $tokencpf = 0;
	    
	}else{
	    $tokencpf = 1;
	}

	//$page = new Page();

	$page->setTpl("checkout", [
		'token'=>$token,
		'tokencpf'=>$tokencpf,
		'cart'=>$cart->getValues(),
		'pessoa'=>$cart->getPessoa(),
		'turma'=>$turma,
		'cid'=>$cid = Saude::listAllCid(),
		'vagasGeral'=>$vagasGeral,
		'inscGeral'=>$pegainscGeral,
		'vagasPlm'=>$vagasPlm,
		'inscPlm'=>$pegainscPlm,
		'vagasPcd'=>$vagasPcd,
		'inscPcd'=>$pegainscPcd,
		'vagasPvs'=>$vagasPvs,
		'inscPvs'=>$pegainscPvs,
		'vagasListaEsperaGeral'=>$vagasListaEsperaGeral,
		'vagasListaEsperaPlm'=>$vagasListaEsperaPlm,
		'vagasListaEsperaPcd'=>$vagasListaEsperaPcd,
		'vagasListaEsperaPvs'=>$vagasListaEsperaPvs,
		'numinscListaEsperaPublicoGeral'=>$numinscListaEsperaPublicoGeral,
		'numinscListaEsperaPublicoLaudo'=>$numinscListaEsperaPublicoLaudo,
		'numinscListaEsperaPublicoPcd'=>$numinscListaEsperaPublicoPcd,
		'numinscListaEsperaPublicoPvs'=>$numinscListaEsperaPublicoPvs,
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
		//header("Location: /checkout");
		echo "<script>window.location.href = '/checkout'</script>";
		exit();
	}
	/*
	if(!isset($_POST['laudo']) || $_POST['laudo'] == NULL){

		Pessoa::setError("Informe se você irá confirmar uma inscrição para pessoa com indicação médica! ");
		//header("Location: /checkout");
		echo "<script>window.location.href = '/checkout'</script>";
		exit();
	}
	*/
	
    if(isset($_POST['tipoinsc']) && $_POST['tipoinsc'] == 3 && $_POST['temlaudo'] == NULL){

		Pessoa::setError("A inscrição NÃO foi finalizada!!! Você está confirmando uma inscrição com laudo médico. Então, informe o CID que consta no laudo! ");
		//header("Location: /checkout");
		echo "<script>window.location.href = '/checkout'</script>";
		exit();
	}
	
	if(isset($_POST['tipoinsc']) && $_POST['tipoinsc'] == 3 && $_POST['temlaudo'] != NULL){

		$codigolaudo = $_POST['temlaudo'];

		if(!$saude->obtemDoencaCid($codigolaudo)){

    		Pessoa::setError("A inscrição NÃO foi finalizada!!! CID não encontrado! Verifique se o CID foi digitado corretamente. O CID deve ser igual ao que consta no laudo médico. Exemplo: A00.0 ou A00");
			//header("Location: /checkout");
			echo "<script>window.location.href = '/checkout'</script>";
			exit;

		}
		
	}
	
	/*
	if(!isset($_POST['inscpcd']) || $_POST['inscpcd'] == NULL){

			Pessoa::setError("Informe se você irá confirmar uma inscrição para pessoa com deficiência! ");
			//header("Location: /checkout");
			echo "<script>window.location.href = '/checkout'</script>";
			exit();
	}
	*/
	
	if(isset($_POST['tipoinsc']) && $_POST['tipoinsc'] == 4 && $_POST['deficiente'] == NULL){

		Pessoa::setError("A inscrição NÃO foi finalizada!!! Você está confirmando uma inscrição para Pessoa Com Deficiência. Então, informe o CID da doença, igual ao que você informou nos dados de saúde da pessoa que você está inscrevendo nesta turma! Exemplo: A00.0 ou A00 ");
		//header("Location: /checkout");
		echo "<script>window.location.href = '/checkout'</script>";
		exit();
	}
	
	if(isset($_POST['tipoinsc']) && $_POST['tipoinsc'] == 4 && $_POST['deficiente'] != NULL){

		$codigodeficiencia = $_POST['deficiente'];

		if(!$saude->obtemDoencaCid($codigodeficiencia)){

    		Pessoa::setError("A inscrição NÃO foi finalizada!!! Dados de doença não encontrado! Verifique se o CID foi digitado corretamente e informe o CID da doença, igual ao que você informou nos dados de saude da pessoa que você está inscrevendo na turma");
				//header("Location: /checkout");
				echo "<script>window.location.href = '/checkout'</script>";
			exit;

    	}
	}
	
	/*
	if(!isset($_POST['inscvuln']) || $_POST['inscvuln'] == NULL){

			Pessoa::setError("Informe se você irá confirmar uma inscrição para pessoa em condições de vulnerabiliade social (Sim ou Não)! ");
			header("Location: /checkout");
			//echo "<script>window.location.href = '/checkout'</script>";
			exit();
	}
	*/

	if(!isset($_POST['edital']) || $_POST['edital'] == NULL){

		Pessoa::setError("A inscrição NÃO foi finalizada!!! Assinale que você leu os termos para as inscrições! ");
		//header("Location: /checkout");
		echo "<script>window.location.href = '/checkout'</script>";
		exit();
	}

	if(!isset($_POST['ciente']) || $_POST['ciente'] == NULL){

		Pessoa::setError("A inscrição NÃO foi finalizada!!! Marque, logo abaixo, que você está ciente das regras para finalizar a inscrição! ");
		//header("Location: /checkout");
		echo "<script>window.location.href = '/checkout'</script>";
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
	    
		Pessoa::setError("A inscrição NÃO foi finalizada!!! Você informou que esta inscrição é para pessoa em condições de vulnerabiliade social (que participa de programas sociais do governo). Para prosseguir, você precisa atualizar/alterar o cadastro do(a) ".$pessoa->getnomepess().", informado o número do CadÚnico/NIS.");
				//header("Location: /checkout");
				echo "<script>window.location.href = '/checkout'</script>";
				exit();
	}	
	
	// idade 40 para idade inicial das hidros da pauliceia
	// idlocal 21 para comparar com local pauliceia
	// idmodal para para comparar com modalidade hidroginástica
	
    if($laudo == 0){

		//if($idlocal == 21 && $idmodal == 6){
		if($idmodal == 6){

			if(($anoAtual - $anoNasc) < 40){

				Pessoa::setError("A inscrição NÃO foi finalizada!!! Você deve marcar a opçãp 'Sim' em: Esta é uma  inscrição para pessoa com laudo médico (Solicitação Médica). Para menores de 40 anos, que queiram se inscrever na Hidroginática, é obrigatório a apresentação do Laudo Médico.");
				//header("Location: /checkout");
				echo "<script>window.location.href = '/checkout'</script>";
				exit();
		   }
	    }	
	}

	$nomepess = $pessoa->getnomepess();

	$email = $user->getdesemail();	

	$desperson = $user->getdesperson();		
	
	$origativ = $_POST['origativ'];

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
		$vagasGeral = (int)Turma::getVagasByIdTurma($idturma);
		$vagasPlm = (int)Turma::getVagasLaudoByIdTurma($idturma);
		$vagasPcd = (int)Turma::getVagasPcdByIdTurma($idturma);
		$vagasPvs = (int)Turma::getVagasPvsByIdTurma($idturma);

		$pegainscGeral = (int)Insc::pegaInscGeral($idturma, $idtemporada);
		$pegainscPlm = (int)Insc::pegaInscPlm($idturma, $idtemporada);
		$pegainscPcd = (int)Insc::pegaInscPcd($idturma, $idtemporada);
		$pegainscPvs = (int)Insc::pegaInscPvs($idturma, $idtemporada);
		
	    //$InscStatus = InscStatus::FILA_DE_ESPERA;
	    
	    if ($_POST['idturmastatus'] == 6) {

			if($laudo === 0 AND $inscpcd === 0 AND $inscpvs === 0 ){
				if($pegainscGeral >= $vagasGeral){
					$InscStatus = InscStatus::FILA_DE_ESPERA;
				}else{
					$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
				}
			}else{
				if($laudo === 1 AND $inscpcd === 0 AND $inscpvs === 0 ){

					if($pegainscPlm >= $vagasPlm){
						$InscStatus = InscStatus::FILA_DE_ESPERA;
					}else{
						$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
					}
				}elseif($laudo === 0 AND $inscpcd === 1 AND $inscpvs === 0 ){

					if($pegainscPcd >= $vagasPcd){
						$InscStatus = InscStatus::FILA_DE_ESPERA;
					}else{
						$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
					}
				}elseif($laudo === 0 AND $inscpcd === 0 AND $inscpvs === 1 ){

					if($pegainscPvs >= $vagasPvs){
						$InscStatus = InscStatus::FILA_DE_ESPERA;
					}else{
						$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
					}
				}
			}			
		}else{

			$InscStatus = InscStatus::FILA_DE_ESPERA;
		}

		$numOrdemMax = Insc::numMaxNumOrdem($idtemporada, $idturma);
		$mumMatriculados = Insc::numMatriculados($idtemporada, $idturma);

		$numordem = $numOrdemMax[0]['maxNumOrdem'] + 1;
		$matriculados = $mumMatriculados[0]['nummatriculados'];

		$turma->get((int)$idturma);
		
		$vagas = $turma->getvagas();

		//$token = $_POST['token'];
		$tokencpf = $_SESSION['tokencpf'];

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
		
		if(!$cart->getInscExist($numcpf, $idturma, $idtemporada)){
			$insc->save();
		}

		//$insc->save();

		//Turma::setUsedToken($idturma, $token);
		Turma::setUsedTokenCpf($idturma, $tokencpf);

		$idinsc = $insc->getidinsc();	

		$numsorte = $insc->getnumsorte();	

		$_SESSION['token'] = NULL;	
		$_SESSION['tokencpf'] = NULL;	

		$cart->removeTurma($turma, true);
		Cart::removeFromSession();
	    //session_regenerate_id();

	    /*
	    ### Envio de Email desativado
	    $insc->inscricaoEmailPosSorteio($idinsc, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $posicao, $matriculados, $vagas);
	    */

	    if($InscStatus == 2){

		    Insc::setSuccess("Inscrição EFETUADA COM SUCESSO! Leia atentamente os detalhes da turma e leia também as observações da turma!");
			//header("Location: /profile/insc/".$insc->getidinsc()."/".$idpess."");
			echo "<script>window.location.href = '/profile/insc/".$insc->getidinsc()."/".$idpess."'</script>";
	        exit;
        }

        if($InscStatus == 7){

	    	Insc::setSuccess("Inscrição EFETUADA COM SUCESSO! Lembre-se: Se o status desta inscrição é 'Lista de Espera', não há vagas para esta turma. Esta inscrição está em uma lista de espera, aguardando o comunicado de uma eventual vaga. Mantenha atualizado, neste site, seu número de telefone celular, com whatsapp, para receber o comunicado.");        	
			//header("Location: /profile/insc/".$insc->getidinsc()."/".$idpess."");
			echo "<script>window.location.href = '/profile/insc/".$insc->getidinsc()."/".$idpess."'</script>";
        	exit;

        }

	}else{

		/*
		Status da inscrição, sem sorteio é aguardando matrícula ou fila de espera
		conforme 'if' abaixo

		$InscStatus = InscStatus::AGUARDANDO_SORTEIO;

		*/
		
		$vagas = (int)Turma::getVagasByIdTurma($idturma);
		$vagasGeral = (int)Turma::getVagasByIdTurma($idturma);
		$vagasPlm = (int)Turma::getVagasLaudoByIdTurma($idturma);
		$vagasPcd = (int)Turma::getVagasPcdByIdTurma($idturma);
		$vagasPvs = (int)Turma::getVagasPvsByIdTurma($idturma);

		$pegainscGeral = (int)Insc::pegaInscGeral($idturma, $idtemporada);
		$pegainscPlm = (int)Insc::pegaInscPlm($idturma, $idtemporada);
		$pegainscPcd = (int)Insc::pegaInscPcd($idturma, $idtemporada);
		$pegainscPvs = (int)Insc::pegaInscPvs($idturma, $idtemporada);
		
		if($laudo === 0 AND $inscpcd === 0 AND $inscpvs === 0 ){
			if($pegainscGeral >= $vagasGeral){
				$InscStatus = InscStatus::FILA_DE_ESPERA;
			}else{
				$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
			}
		}else{
			if($laudo === 1 AND $inscpcd === 0 AND $inscpvs === 0 ){

				if($pegainscPlm >= $vagasPlm){
					$InscStatus = InscStatus::FILA_DE_ESPERA;
				}else{
					$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
				}
			}elseif($laudo === 0 AND $inscpcd === 1 AND $inscpvs === 0 ){

				if($pegainscPcd >= $vagasPcd){
					$InscStatus = InscStatus::FILA_DE_ESPERA;
				}else{
					$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
				}
			}elseif($laudo === 0 AND $inscpcd === 0 AND $inscpvs === 1 ){

				if($pegainscPvs >= $vagasPvs){
					$InscStatus = InscStatus::FILA_DE_ESPERA;
				}else{
					$InscStatus = InscStatus::AGUARDANDO_MATRICULA;
				}
			}
		}
		
		//$token = $_POST['token'];
		$tokencpf = $_SESSION['tokencpf'];
		
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
		
		if(!$cart->getInscExist($numcpf, $idturma, $idtemporada)){
			$insc->save();
		}

		//$insc->save();

		//Turma::setUsedToken($idturma, $token);
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

	    	 Insc::setSuccess("Inscrição EFETUADA COM SUCESSO! Leia atentamente os detalhes da turma e leia também as observações da turma!");
			//header("Location: /profile/insc/".$insc->getidinsc()."/".$idpess."");
			echo "<script>window.location.href = '/profile/insc/".$insc->getidinsc()."/".$idpess."'</script>";
        	exit;

        }

        if($InscStatus == 7){

	    	Insc::setSuccess("Inscrição EFETUADA COM SUCESSO! Lembre-se: Se o status desta inscrição é 'Lista de Espera', não há vagas para esta turma. Esta inscrição está em uma lista de espera, aguardando o comunicado de uma eventual vaga. Mantenha atualizado, neste site, seu número de telefone celular, com whatsapp, para receber o comunicado.");        	
			//header("Location: /profile/insc/".$insc->getidinsc()."/".$idpess."");
			echo "<script>window.location.href = '/profile/insc/".$insc->getidinsc()."/".$idpess."'</script>";
        	exit;

        }
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
    
    $httpResponse = http_response_code();
    //if($httpResponse == 200 || $httpResponse == 200){
	if($httpResponse == 505 || $httpResponse == 500){

		//header('Location: /redirecionando');
		echo "<script>window.location.href = '/redirecionando'</script>";
		exit();
	}
	
	if(isset($_SESSION['User']) || $_SESSION['User'] != NULL){
		//header("Location: /");
		echo "<script>window.location.href = '/'</script>";
		 exit();
	}

	//var_dump($_SERVER);
	//exit;

	$page = new Page();

	/*
	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);
	*/

	isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $_SERVER['HTTP_REFERER'] = '/';

	$paginaAnterior = $_SERVER['HTTP_REFERER'];

	$page->setTpl("login", [
		'paginaAnterior'=>$paginaAnterior,
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
		echo "<script>window.location.href = '/login'</script>";
			//echo "<script>javascript:history.go(-2)</script>"
		//header("Location: /login");
		//exit;
	}
	
	if(!isset($_POST['pagina'])){
	        echo "<script>window.location.href = '/'</script>";
			//echo "<script>javascript:history.go(-2)</script>"
			//header("Location: /");
			exit;
		}

	$paginaAnterior = $_POST['pagina'];
	
	if($paginaAnterior == "https://cursosesportivossbc.com/login" || $paginaAnterior == "https://cursosesportivossbc.com/forgot-site"){
	    echo "<script>window.location.href = '/'</script>";
			//echo "<script>javascript:history.go(-2)</script>"
		//header("Location: /");
		//exit;
	}else{
	    echo "<script>window.location.href = ".$paginaAnterior."</script>";
		//header("Location: ".$paginaAnterior."");
		echo "<script>javascript:history.go(-2)</script>";
		//exit;
	}
	
});

$app->get("/logout", function(){

	User::logout();

	//User::forgotUserPass();

	Cart::removeFromSession();
	
	//session_regenerate_id();
	
	echo "<script>window.location.href = '/login'</script>";
    //header("Location: /login");
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

	//User::getForgotSite($_POST["email"]);
	
	$pontoUm = substr($_POST['numcpf'], 3, 1);
	$pontoDois = substr($_POST['numcpf'], 7, 1);
	$traco = substr($_POST['numcpf'], 11, 1);
	if($pontoUm != '.' || $pontoDois != '.' || $traco != '-'){
	  	echo "<script>alert('Formato de CPF inválido!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}
	
	User::getForgotSiteEmailCpf($_POST["email"], $_POST["numcpf"] );

	if($_POST['novasenha'] != $_POST['repetesenha']){
		echo "<script>alert('As senhas digitadas são  diferentes');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}	

	User::setPasswordSite($_POST["novasenha"], $_POST["email"]);
	
	User::login($_POST["email"], $_POST["novasenha"]);

	echo "<script>alert('Senha alterada com sucesso!');";
		echo "location.href='/login'</script>";
		exit();	
});



/*

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
*/

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
    
    $httpResponse = http_response_code();
    //if($httpResponse == 200 || $httpResponse == 200){
	if($httpResponse == 505 || $httpResponse == 500){

		//header('Location: /redirecionando');
		echo "<script>window.location.href = '/redirecionando'</script>";
		exit();
	}
    
    
    if(isset($_SESSION['User']) && (($_SESSION['User']['inadmin'] != 1) || ($_SESSION['User']['isprof'] != 1))) {
	//if(isset($_SESSION['User']) && $_SESSION['User']['inadmin'] != 1) {

		$userOnline = User::pega_totalUsuariosOnline();

		if($userOnline < 200){
		    User::logout();
			User::forgotUserPass();
			User::setError('Limite de usuários online excedido! TENTE NOVAMENTE MAIS TARDE.');
			echo "<script>window.location.href = '/login'</script>";
			//header('Location: /login');
			exit();
		}
		
	}	

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







?>