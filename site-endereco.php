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

		Endereco::setMsgError("As inscrições nos cursos esportivos são exclusivas para os moradores de São B. do Campo. Ou o CEP que você digitou é inválido");
		header("Location: /endereco");
		exit;		
	}

	if (!isset($_POST['rua']) || $_POST['rua'] == '') {
		Endereco::setMsgError("Informe o nome da rua, avenida ou logradouro.");
		header("Location: /endereco");
		exit;		
	}	

	if (!isset($_POST['numero']) || $_POST['numero'] == '') {
		Endereco::setMsgError("Informe o número do local.");
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

	if (!isset($_POST['telres']) || $_POST['telres'] == '') {
		Endereco::setMsgError("Informe um número de telefone residencial ou celular.");
		header("Location: /endereco");
		exit;		
	}
	$_POST['telres'] = preg_replace('/[^\p{L}\p{N}\s]/', '', $_POST['telres'] );
	$_POST['telres'] = str_replace(' ', '',$_POST['telres']);

	if(strlen($_POST['telres']) !== 10 && strlen($_POST['telres']) !== 11 ){

		Endereco::setMsgError("Número de telefone inválido! Digite o número de um tefefone celular ou residencial com DDD.");
		header("Location: /endereco");
		exit;
	}
	if (!isset($_POST['contato']) || $_POST['contato'] == '') {
		Endereco::setMsgError("Informe um nome para entrar em contato, em caso de emergência!");
		header("Location: /endereco");
		exit;		
	}
	if (!isset($_POST['telemer']) || $_POST['telemer'] == '') {
		Endereco::setMsgError("Informe um número de telefone para ligar em caso de emergência!");
		header("Location: /endereco");
		exit;		
	}
	$_POST['telemer'] = preg_replace('/[^\p{L}\p{N}\s]/', '', $_POST['telemer'] );
	$_POST['telemer'] = str_replace(' ', '',$_POST['telemer']);
	if(strlen($_POST['telemer']) !== 10 && strlen($_POST['telemer']) !== 11 ){

		Endereco::setMsgError("Número de telefone inválido! Digite o número de um tefefone celular ou residencial com DDD.");
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

	header("Location: /");
	exit();
});

$app->get("/user/endereco/update", function(){

	User::verifyLogin(false);

	$idperson = (int)$_SESSION[User::SESSION]["idperson"];

	$endereco = new Endereco();

	if(!Endereco::seEnderecoExiste($idperson)){
		Endereco::setMsgError('Você ainda não tem um endereço cadastrad0, Cadastre um endereço abaixo!');
			header("Location: /endereco");
			exit();			
	}

	$endereco = Endereco::getEndereco($idperson);

	/*
	echo '<pre>';
	print_r($endereco);
	echo '</pre>';
	exit();
	*/

	

	$page = new Page();

	$page->setTpl("user-change-address", [
		'endereco'=>$endereco,
		'changeAddressError'=>Endereco::getMsgError(),
		'changeAddressSuccess'=>Endereco::getSuccess(),
		'enderecoUpdateValues'=>(
			isset($_SESSION['enderecoUpdateValues'])) 
		        ? $_SESSION['enderecoUpdateValues'] 
		        : ['cep'=>'','rua'=>'', 'numero'=>'', 'complemento'=>'', 'bairro'=>'' , 'cidade'=>'', 'estado'=>'', 'telres'=>'', 'telemer'=>'', 'contato'=>'']
	]);

});

$app->post("/endereco/update", function() {

	User::verifyLogin(false);

	$idperson = (int)$_SESSION[User::SESSION]["idperson"];

	$_SESSION['enderecoUpdateValues'] = $_POST;

	$endereco = new Endereco(); 

	$cepMenor = '09600000';
	$cepMaior = '09899999';	

	if (!isset($_POST['cep']) || $_POST['cep'] == '') {
		Endereco::setMsgError("Digite o número do cep.");
		header("Location: /user/endereco/update");
		exit;		
	}

	if (($_POST['cep']) < $cepMenor || ($_POST['cep']) > $cepMaior){

		Endereco::setMsgError("As inscrições nos cursos esportivos são exclusivas para os moradores de São B. do Campo. Ou o CEP que você digitou é inválido");
		header("Location: /user/endereco/update");
		exit;		
	}

	if (!isset($_POST['rua']) || $_POST['rua'] == '') {
		Endereco::setMsgError("Informe o nome da rua, avenida ou logradouro.");
		header("Location: /user/endereco/update");
		exit;		
	}	

	if (!isset($_POST['numero']) || $_POST['numero'] == '') {
		Endereco::setMsgError("Informe o número do local.");
		header("Location: /user/endereco/update");
		exit;		
	}

	if (!isset($_POST['bairro']) || $_POST['bairro'] == '') {
		Endereco::setMsgError("Informe o nome do bairro.");
		header("Location: /user/endereco/update");
		exit;		
	}	
		
	if (!isset($_POST['cidade']) || $_POST['cidade'] == '') {
		Endereco::setMsgError("Informe o nome da cidade.");
		header("Location: /user/endereco/update");
		exit;		
	}	

	if (!isset($_POST['estado']) || $_POST['estado'] == '') {
		Endereco::setMsgError("Informe o nome da estado.");
		header("Location: /user/endereco/update");
		exit;		
	}

	if (!isset($_POST['telres']) || $_POST['telres'] == '') {
		Endereco::setMsgError("Informe um número de telefone residencial ou celular.");
		header("Location: /user/endereco/update");
		exit;		
	}
	$_POST['telres'] = preg_replace('/[^\p{L}\p{N}\s]/', '', $_POST['telres'] );
	$_POST['telres'] = str_replace(' ', '',$_POST['telres']);

	if(strlen($_POST['telres']) !== 10 && strlen($_POST['telres']) !== 11 ){

		Endereco::setMsgError("Número de telefone inválido! Digite o número de um tefefone celular ou residencial com DDD.");
		header("Location: /user/endereco/update");
		exit;
	}

	if (!isset($_POST['contato']) || $_POST['contato'] == '') {
		Endereco::setMsgError("Informe um nome para entrar em contato, em caso de emergência");
		header("Location: /user/endereco/update");
		exit;		
	}

	if (!isset($_POST['telemer']) || $_POST['telemer'] == '') {
		Endereco::setMsgError("Informe um número de telefone para ligar, em caso de emergência.");
		header("Location: /user/endereco/update");
		exit;		
	}
	$_POST['telemer'] = preg_replace('/[^\p{L}\p{N}\s]/', '', $_POST['telemer'] );
	$_POST['telemer'] = str_replace(' ', '',$_POST['telemer']);

	if(strlen($_POST['telemer']) !== 10 && strlen($_POST['telemer']) !== 11 ){

		Endereco::setMsgError("Número de telefone inválido! Digite o número de um tefefone celular ou residencial com DDD.");
		header("Location: /user/endereco/update");
		exit;
	}

	$_POST['idperson'] = $idperson;

	$endereco = new Endereco();	

	$endereco->setData([
		//'idender'=>0,
		//'idperson'=>$_POST['idperson'], 			
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

	$endereco->update($idperson);

	User::setSuccess("Seus dados de endereço foram atualizados com sucesso!");

	$_SESSION['enderecoUpdateValues'] = NULL;															

	header("Location: /");
	exit();
});


?>