<?php

use \Sbc\Page;

use \Sbc\Model\Endereco;
use \Sbc\Model\Pessoa;
use \Sbc\Model\User;

$app->get("/pessoa-create", function() {

	User::verifyLogin(false);

	//$endereco = new Endereco;
	$idperson = (int)$_SESSION[User::SESSION]["idperson"];

	Endereco::seEnderecoExiste($idperson);

		$page = new Page();

		$page->setTpl("pessoa-create", [
			'errorRegister'=>User::getErrorRegister(),
			'registerpessoaValues'=>(
				isset($_SESSION['registerpessoaValues'])) 
				    ? $_SESSION['registerpessoaValues'] 
			        : ['nomepess'=>'', 'dtnasc'=>'', 'numcpf'=>'', 'numrg'=>'', 'numsus'=>'', 'cadunico'=>'', 'nomemae'=>'', 'cpfmae'=>'', 'nomepai'=>'', 'cpfpai'=>'']
		]);	

});

$app->post("/registerpessoa", function(){

	User::verifyLogin(false);

	$_SESSION['registerpessoaValues'] = $_POST;

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

	if ((!isset($_POST['nomemae']) || $_POST['nomemae'] == '') && (!isset($_POST['nomepai']) || $_POST['nomepai'] == '')) {

		Pessoa::setErrorRegister("Informe pelo menos o nome ou da mãe, ou do pai ou do responsável.");
		header("Location: /pessoa-create");
		exit;
	}

	if ((!isset($_POST['cpfmae']) || $_POST['cpfmae'] == '') && (!isset($_POST['cpfpai']) || $_POST['cpfpai'] == '')) {

		Pessoa::setErrorRegister("Informe pelo menos o CPF ou da mãe, ou do pai ou do responsável.");
		header("Location: /pessoa-create");
		exit;
	}

	$_POST['statuspessoa'] = 1;

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

	$_SESSION['registerpessoaValues'] = NULL;

	header('Location: /cart');
	exit;
});

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



?>