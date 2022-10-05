<?php

use \Sbc\PageProf;
use \Sbc\Model\User;
use \Sbc\Model\Turma;
use \Sbc\Model\Pessoa;

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

$app->get("/prof/token/:idturma", function($idturma) {

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
		'turma'=>$turma->getValues(),
		"error"=>Turma::getMsgError()	
	]);
});

?>