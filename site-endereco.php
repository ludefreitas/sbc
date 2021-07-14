<?php

use \Sbc\Page;
use \Sbc\Model\Endereco;
use \Sbc\Model\User;


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

	$cepMenor = '09600000';
	$cepMaior = '09899999';	

	if (!isset($_POST['cep']) || $_POST['cep'] == '') {
		Endereco::setMsgError("Digite o número do cep.");
		header("Location: /endereco");
		exit;		
	}

	if (($_POST['cep']) < $cepMenor || ($_POST['cep']) > $cepMaior){

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

	header("Location: /cart");
	exit();
});

?>