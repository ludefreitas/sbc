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

$app->get("/prof/turma/create/token/:idturma/:numcpf", function($idturma, $numcpf) {

	User::verifyLoginProf();

	$turma = new Turma();

	$token = time();
	$token = substr($token, 4);

	$_POST['idturma'] = $idturma;
	$_POST['numcpf'] = $numcpf;
	$_POST['token'] = $token;
	$_POST['isused'] = 0;

	$turma->setData($_POST);

	if(!Turma::temTokenCpf($idturma, $numcpf)){

		$turma->saveToken();
	    echo "<script>alert('Token ".$turma->gettoken()." criado com sucesso!');";
		echo "javascript:history.go(-1)</script>";
	}else{

		echo "<script>alert('Já existe um token para este aluno nesta turma!');";
		echo "javascript:history.go(-1)</script>";
	}

	
});

$app->post("/prof/turma/create/token", function() {

	User::verifyLoginProf();

	$turma = new Turma();

	$token = time();
	$token = substr($token, 4);

	$idtemporada = $_POST['idtemporada'];
	$idturma = $_POST['idturma'];
	
	$iduserSession = (int)$_SESSION[User::SESSION]['iduser'];

	$iduserTurmaTemporada = $user->getIdUseInTurmaTemporada($idturma, $idtemporada);
	
	$iduserTurmaTemporada = (int)$iduserTurmaTemporada['iduser'];
	
	if($iduserTurmaTemporada === $iduserSession){
	    
	    var_dump("igual -> ".$iduserTurmaTemporada.' = '.$iduserSession);
	    exit;
	}else{
	    
	    var_dump("diferente -> ".$iduserTurmaTemporada.' != '.$iduserSession);
	    exit;
	}
	
	if(isset($_POST['numcpf']) && $_POST['numcpf'] == ""){
		echo "<script>alert('Informe o número d0 CPF!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if(!Pessoa::validaCPF($_POST['numcpf'])){
		echo "<script>alert('Informe um número de cpf válido!');";
	    echo "javascript:history.go(-1)</script>";
		exit;
	}

	$_POST['idturma'] = $_POST['idturma'];
	$_POST['numcpf'] = $_POST['numcpf'];
	$_POST['token'] = $token;
	$_POST['isused'] = 0;

	$turma->setData($_POST);

	$turma->saveToken();

    echo "<script>alert('Token ".$turma->gettoken()." criado com sucesso!');";
	echo "javascript:history.go(-1)</script>";
});

$app->get("/prof/token/:idturma/:idtemporada", function($idturma, $idtemporada) {

	User::verifyLoginProf();

	$turma = new Turma();

	$turma->get((int)$idturma);	

	$tokens = Turma::listAlltokenTurma($idturma);

	if(!isset($turma) || $turma == NULL){

		Turma::setMsgError("Não existem tokens para esta turma.");
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
		echo "<script>alert('Não há inscritos para esta turma');";
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

?>