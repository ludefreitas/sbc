<?php

use \Sbc\PageProf;
use \Sbc\Model\User;
use \Sbc\Model\Turma;
use \Sbc\Model\Pessoa;
use \Sbc\Model\Insc;
use \Sbc\Model\Temporada;

$app->get("/prof/turma/create/token/:idturma", function($idturma) {

	User::verifyLoginProf();

	$turma = new Turma();

	$token = time();
	$token = substr($token, 4);

	$_POST['idturma'] = $idturma;
	$_POST['numcpf'] = (isset($_POST['numcpf'])) ? $_POST['numcpf'] : "";
	$_POST['token'] = $token;
	$_POST['isused'] = 0;

	$turma->setData($_POST);

	$turma->saveToken();

    echo "<script>alert('Token ".$turma->gettoken()." criado com sucesso!');";
	echo "javascript:history.go(-1)</script>";
});

$app->get("/prof/turma/create/token/:idturma/:idtemporada/:numcpf", function($idturma, $idtemporada, $numcpf) {

	User::verifyLoginProf();

	$turma = new Turma();
	$user = new User();

	$token = time();
	$token = substr($token, 4);
	
	$iduserSession = (int)$_SESSION[User::SESSION]['iduser'];

	$iduserTurmaTemporada = $user->getIdUseInTurmaTemporada($idturma, $idtemporada);
	
	$iduserTurmaTemporada = (int)$iduserTurmaTemporada['iduser'];
	
	if($iduserTurmaTemporada !== $iduserSession){
	    
	    echo '<script>alert("VocÍ deve solicitar ao professor desta turma para que ele gere o token!");';
	  	echo 'javascript:history.go(-1)</script>';
	   	exit;
	   
	}

	$_POST['idturma'] = $idturma;
	$_POST['numcpf'] = $numcpf;
	$_POST['token'] = $token;
	$_POST['isused'] = 0;
	$_POST['creator'] = $iduserSession;

	$turma->setData($_POST);

	if(!Turma::temTokenCpf($idturma, $numcpf)){

		$turma->saveToken();
	    echo "<script>alert('Token ".$turma->gettoken()." criado com sucesso!');";
		echo "javascript:history.go(-1)</script>";
	}else{

		echo "<script>alert('J· existe um token para este aluno nesta turma!');";
		echo "javascript:history.go(-1)</script>";
	}
	
});

$app->get("/estagiario/turma/create/token/:idturma/:idtemporada/:numcpf", function($idturma, $idtemporada, $numcpf) {

	User::verifyLoginEstagiario();

	$turma = new Turma();
	$user = new User();

	$token = time();
	$token = substr($token, 4);
	
	$iduserSession = (int)$_SESSION[User::SESSION]['iduser'];

	$iduserTurmaTemporada = $user->getIdUseInTurmaTemporada($idturma, $idtemporada);
	
	$iduserTurmaTemporada = (int)$iduserTurmaTemporada['iduser'];
	
	if($iduserTurmaTemporada !== $iduserSession){
	    
	    echo '<script>alert("VocÍ deve solicitar ao professor desta turma para que ele gere o token!");';
	  	echo 'javascript:history.go(-1)</script>';
	   	exit;
	   
	}

	$_POST['idturma'] = $idturma;
	$_POST['numcpf'] = $numcpf;
	$_POST['token'] = $token;
	$_POST['isused'] = 0;
	$_POST['creator'] = $iduserSession;

	$turma->setData($_POST);

	if(!Turma::temTokenCpf($idturma, $numcpf)){

		$turma->saveToken();
	    echo "<script>alert('Token ".$turma->gettoken()." criado com sucesso!');";
		echo "javascript:history.go(-1)</script>";
	}else{

		echo "<script>alert('J· existe um token para este aluno nesta turma!');";
		echo "javascript:history.go(-1)</script>";
	}
	
});

$app->post("/prof/turma/create/token", function() {

	User::verifyLoginProf();

	$turma = new Turma();
	$user = new User();
	
	$idtemporada = $_POST['idtemporada'];
	$idturma = $_POST['idturma'];
	
	$iduserSession = (int)$_SESSION[User::SESSION]['iduser'];

	$iduserTurmaTemporada = $user->getIdUseInTurmaTemporada($idturma, $idtemporada);
	
	$iduserTurmaTemporada = (int)$iduserTurmaTemporada['iduser'];
	
	if($iduserTurmaTemporada !== $iduserSession){

		$isprof = User::getFromSession();

    	if ($isprof->getisprof() != 1){
        	echo '<script>alert("VocÍ deve solicitar ao professor desta turma para que ele gere o token!");';
	  		echo 'javascript:history.go(-1)</script>';
	   		exit;
    	}  
	   
	}

	$token = time();
	$token = substr($token, 4);

	if(isset($_POST['numcpf']) && $_POST['numcpf'] == ""){
		echo "<script>alert('Informe o nè´‚mero do CPF!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if(!Pessoa::validaCPF($_POST['numcpf'])){
		echo "<script>alert('Informe um nè´‚mero de cpf vè´°lido!');";
	    echo "javascript:history.go(-1)</script>";
		exit;
	}

	$_POST['idturma'] = $_POST['idturma'];
	$_POST['numcpf'] = $_POST['numcpf'];
	$_POST['token'] = $token;
	$_POST['isused'] = 0;
	$_POST['creator'] = $iduserSession;

	$turma->setData($_POST);
	
	$idturma = $_POST['idturma'];
	$numcpf = $_POST['numcpf'];

	if(!Turma::temTokenCpf($idturma, $numcpf)){

		$turma->saveToken();
	    echo "<script>alert('Token ".$turma->gettoken()." criado com sucesso!');";
		echo "javascript:history.go(-1)</script>";
	}else{

		if($numcpf != ""){
			echo "<script>alert('J· existe um token para este aluno nesta turma!');";
			echo "javascript:history.go(-1)</script>";
		}else{
			$turma->saveToken();
	   		echo "<script>alert('Token ".$turma->gettoken()." criado com sucesso!');";
			echo "javascript:history.go(-1)</script>";
		}		
	}
});

$app->get("/prof/token/:idturma/:idtemporada", function($idturma, $idtemporada) {

	User::verifyLoginProf();

	$turma = new Turma();

	$turma->get((int)$idturma);	

	$tokens = Turma::listAlltokenTurma($idturma);

	if(!isset($turma) || $turma == NULL){

		Turma::setMsgError("N√£o existem tokens para esta turma.");
	}
	
	$page = new PageProf();    

	$page->setTpl("token-turma", [
		'tokens'=>$tokens,
		'idtemporada'=>$idtemporada,
		'turma'=>$turma->getValues(),
		"error"=>Turma::getMsgError()	
	]);
});

$app->get("/prof/listapessoasporturma/:idturma/:idtemporada", function($idturma, $idtemporada) {

	User::verifyLoginProf();

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();

	$turma->get((int)$idturma);	
	$temporada->get((int)$idtemporada);	

	$descturma = $turma->getdescturma();

	$listapessoas = Insc::listaPessoasPorTurmaTemporada($idturma, $idtemporada);

	if(!isset($listapessoas) || $listapessoas == NULL){
		echo "<script>alert('Nè´™o hè´° inscritos para esta turma');";
		echo "javascript:history.go(-1)</script>";
	}else{

		$page = new PageProf([
		"header"=>false,
		"footer"=>false
		]);

		$page->setTpl("listapessoasporturma", [
		'listapessoas'=>$listapessoas,
		'descturma'=>$descturma	,
		'idturma'=>$idturma	
		]);
	}
	
});

$app->get("/estagiario/listapessoasporturma/:idturma/:idtemporada", function($idturma, $idtemporada) {

	User::verifyLoginEstagiario();

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();

	$turma->get((int)$idturma);	
	$temporada->get((int)$idtemporada);	

	$descturma = $turma->getdescturma();

	$listapessoas = Insc::listaPessoasPorTurmaTemporada($idturma, $idtemporada);

	if(!isset($listapessoas) || $listapessoas == NULL){
		echo "<script>alert('Nè´™o hè´° inscritos para esta turma');";
		echo "javascript:history.go(-1)</script>";
	}else{

		$page = new PageProf([
		"header"=>false,
		"footer"=>false
		]);

		$page->setTpl("listapessoasporturma-estagiario", [
		'listapessoas'=>$listapessoas,
		'descturma'=>$descturma	,
		'idturma'=>$idturma	
		]);
	}
	
});

$app->get("/prof/crialispersonalizadaautorizacao/:idturma/:idtemporada", function($idturma, $idtemporada) {

	User::verifyLoginProf();

	$page = new PageProf();

	$page->setTpl("autorizacao-create", [
		'idturma'=>$idturma,
		'idtemporada'=>$idtemporada,
		'createlistaAutorizacaoValues'=>(isset($_SESSION['createlistaAutorizacaoValues'])) ? $_SESSION['createlistaAutorizacaoValues'] : ['textoAutorizacao'=>'', 'destino'=>'', 'dataInicio'=>'', 'dataTermino'=>'']
	]);
});

$app->post("/prof/listapessoasporturmapersonalizada/:idturma/:idtemporada", function($idturma, $idtemporada) {

	User::verifyLoginProf();

	$texto = $_POST['textoAutorizacao'];
	$destino = $_POST['destino'];
	$datainicio = date($_POST['dataInicio']);
	$datatermino = date($_POST['dataTermino']);


	if (!isset($_POST['textoAutorizacao']) || $_POST['textoAutorizacao'] == '') {
		echo "<script>alert('FaÁa uma descriÁ„o da autorizaÁ„o');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}

	if (!isset($_POST['destino']) || $_POST['destino'] == '') {
		echo "<script>alert('Informe o local do evento');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}

	if (!isset($_POST['dataInicio']) || $_POST['dataInicio'] == '') {
		echo "<script>alert('Informe a data de inÌcio do evento');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}

	if (!isset($_POST['dataTermino']) || $_POST['dataTermino'] == '') {
		echo "<script>alert('Informe a data de tÈrmino do evento');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}

	if ($datainicio > $datatermino) {
		echo "<script>alert('Data de tÈrmino n„o pode ser menor do que a data de inÌcio');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}

	$diaUnico = true;
	if($datainicio == $datatermino){		
		$diaUnico = true;
	}else{
		$diaUnico = false;
	}

	$datainicio = date('d/m/Y', strtotime($_POST['dataInicio']));
	$datatermino = date('d/m/Y', strtotime($_POST['dataTermino']));

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();

	$turma->get((int)$idturma);	
	$temporada->get((int)$idtemporada);	

	$descturma = $turma->getdescturma();

	$listapessoas = Insc::getInscByTurmaTemporadaMatriculados($idturma, $idtemporada);

	if(!isset($listapessoas) || $listapessoas == NULL){
		echo "<script>alert('N„o h· inscritos para esta turma');";
		echo "javascript:history.go(-1)</script>";
	}else{

		$page = new PageProf([
		"header"=>false,
		"footer"=>false
		]);

		$page->setTpl("listapessoasporturma-personalizada", [
		'listapessoas'=>$listapessoas,
		'descturma'=>$descturma	,
		'idturma'=>$idturma,
		'texto'=>$texto,
		'destino'=>$destino,
		'diaUnico'=>$diaUnico,
		'datainicio'=>$datainicio,
		'datatermino'=>$datatermino	
		]);
	}
	
});


?>