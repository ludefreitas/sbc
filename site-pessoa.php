<?php

use \Sbc\Page;

use \Sbc\Model\Endereco;
use \Sbc\Model\Pessoa;
use \Sbc\Model\User;
use \Sbc\Model\Cart;

$app->get("/pessoa-create", function() {

	User::verifyLogin(false);

	//$endereco = new Endereco;
	$idperson = (int)$_SESSION[User::SESSION]["idperson"];

	//Endereco::seEnderecoExiste($idperson);

		$page = new Page();

		$page->setTpl("pessoa-create", [
			'success'=>Pessoa::getSuccess(),
			'errorRegister'=>User::getErrorRegister(),
			'registerpessoaValues'=>(
				isset($_SESSION['registerpessoaValues'])) 
				    ? $_SESSION['registerpessoaValues'] 
			        : ['nomepess'=>'', 'dtnasc'=>'', 'numcpf'=>'', 'numrg'=>'', 'numsus'=>'', 'cadunico'=>'', 'nomemae'=>'', 'cpfmae'=>'', 'nomepai'=>'', 'cpfpai'=>'', 'sexo'=>'', 'vulnsocial'=>'', 'pcd'=>'', 'cep'=>'', 'rua'=>'', 'numero'=>'', 'complemento'=>'', 'bairro'=>'', 'cidade'=>'', 'estado'=>'', 'telres'=>'', 'contato'=>'', 'telemer'=>'']
		]);	

});

$app->post("/registerpessoa", function(){

	User::verifyLogin(false);

	$_SESSION['registerpessoaValues'] = $_POST;

	$iduser = (int)$_SESSION[User::SESSION]["iduser"];

	if (!isset($_POST['nomepess']) || $_POST['nomepess'] == '') {

		User::setErrorRegister("Preencha o nome completo da pessoa.");
		header("Location: /pessoa-create");
		exit;
	}

	if (!isset($_POST['dtnasc']) || $_POST['dtnasc'] == '') {

		user::setErrorRegister("Informe a data de nascimento.");
		header("Location: /pessoa-create");
		exit;
	}

	if (!isset($_POST['sexo']) || $_POST['sexo'] == '') {

		User::setErrorRegister("Informe o sexo.");
		header("Location: /pessoa-create");
		exit;
	}

	if (!isset($_POST['numcpf']) || $_POST['numcpf'] == '') {

		Pessoa::setErrorRegister("Informe o número do CPF.");
		header("Location: /pessoa-create");
		exit;
	}

	if(!Pessoa::validaCPF($_POST['numcpf'])){

		Pessoa::setErrorRegister("Informe um número de CPF válido para a pessoa!");
		header("Location: /pessoa-create");
		exit;

	}
	
	if (Pessoa::checkCpfExist($_POST['numcpf']) === true) {

		Pessoa::setErrorRegister("Este CPF pertence a outro usuário.");
		header("Location: /pessoa-create");
		exit;
	}

	/*
	if (!isset($_POST['numrg']) || $_POST['numrg'] == '') {

		Pessoa::setErrorRegister("Informe o número do RG.");
		header("Location: /pessoa-create");
		exit;
	}	
	*/
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

	if (!isset($_POST['pcd']) || $_POST['pcd'] == '') {

		Pessoa::setErrorRegister("Informe se a pessoa é portador de  deficiência (PCD).");
		header("Location: /pessoa-create");
		exit;
	}	

	if(calcularIdade($_POST['dtnasc']) < 18){

	
		if ((!isset($_POST['nomemae']) || $_POST['nomemae'] == '') && (!isset($_POST['nomepai']) || $_POST['nomepai'] == '')) {

			Pessoa::setErrorRegister("Informe pelo menos o nome ou da mãe, ou do pai ou do responsável.");
			header("Location: /pessoa-create");
			exit;
		}		

		if($_POST['nomemae'] !== '' && $_POST['cpfmae'] === ''){

			Pessoa::setErrorRegister("Informe um número do CPF da mãe!");
			header("Location: /pessoa-create");
			exit;
		}

		if($_POST['cpfmae'] === $_POST['numcpf']){

			Pessoa::setErrorRegister("CPF da mãe não pode ser igual ao do(a) menor!");
			header("Location: /pessoa-create");
			exit;
		}

		if($_POST['cpfpai'] === $_POST['numcpf']){

			Pessoa::setErrorRegister("CPF do pai não pode ser igual ao do(a) menor!");
			header("Location: /pessoa-create");
			exit;
		}			

		if($_POST['cpfmae'] === $_POST['cpfpai']){

			Pessoa::setErrorRegister("CPF da mãe não pode ser igual ao do pai!");
			header("Location: /pessoa-create");
			exit;
		}			

		if($_POST['cpfmae'] !== '' && !Pessoa::validaCPF($_POST['cpfmae'])){

			Pessoa::setErrorRegister("Informe um número de CPF válido para a mãe da pessoa!");
			header("Location: /pessoa-create");
			exit;
		}

		if($_POST['nomepai'] !== '' && $_POST['cpfpai'] === ''){

			Pessoa::setErrorRegister("Informe um número do CPF do pai!");
			header("Location: /pessoa-create");
			exit;
		}	

		if($_POST['cpfpai'] !== '' && !Pessoa::validaCPF($_POST['cpfpai'])){

			Pessoa::setErrorRegister("Informe um número de CPF válido para o pai da pessoa!");
			header("Location: /pessoa-create");
			exit;
		}

		if ((!isset($_POST['cpfmae']) || $_POST['cpfmae'] == '') && (!isset($_POST['cpfpai']) || $_POST['cpfpai'] == '')) {

			Pessoa::setErrorRegister("Informe pelo menos o CPF ou da mãe, ou do pai ou do responsável.");
			header("Location: /pessoa-create");
			exit;
		}	
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
		//'numrg'=>$_POST['numrg'],
		'numsus'=>$_POST['numsus'],
		'vulnsocial'=>$_POST['vulnsocial'],
		'pcd'=>$_POST['pcd'],
		'cadunico'=>$_POST['cadunico'],
		'nomemae'=>$_POST['nomemae'],
		'cpfmae'=>$_POST['cpfmae'],
		'nomepai'=>$_POST['nomepai'],
		'cpfpai'=>$_POST['cpfpai'],
		'statuspessoa'=>$_POST['statuspessoa'],
		'dtaltetacao'=>date('d/m/Y')
	]);

	$endereco = new Endereco(); 

	$cepMenor = '09600000';
	$cepMaior = '09899999';	

	if (!isset($_POST['cep']) || $_POST['cep'] == '') {
		Pessoa::setErrorRegister("Digite o número do cep.");
		header("Location: /pessoa-create");
		exit;		
	}

	if (($_POST['cep']) < $cepMenor || ($_POST['cep']) > $cepMaior){

		Pessoa::setErrorRegister("As inscrições nos cursos esportivos são exclusivas para os moradores de São B. do Campo. Ou o CEP que você digitou é inválido");
		header("Location: /pessoa-create");
		exit;		
	}

	if (!isset($_POST['rua']) || $_POST['rua'] == '') {
		Pessoa::setErrorRegister("Informe o nome da rua, avenida ou logradouro.");
		header("Location: /pessoa-create");
		exit;		
	}	

	if (!isset($_POST['numero']) || $_POST['numero'] == '') {
		Pessoa::setErrorRegister("Informe o número do local.");
		header("Location: /pessoa-create");
		exit;		
	}

	if (!isset($_POST['bairro']) || $_POST['bairro'] == '') {
		Pessoa::setErrorRegister("Informe o nome do bairro.");
		header("Location: /pessoa-create");
		exit;		
	}	
		
	if (!isset($_POST['cidade']) || $_POST['cidade'] == '') {
		Pessoa::setErrorRegister("Informe o nome da cidade.");
		header("Location: /pessoa-create");
		exit;		
	}	

	if (!isset($_POST['estado']) || $_POST['estado'] == '') {
		Pessoa::setErrorRegister("Informe o nome da estado.");
		header("Location: /pessoa-create");
		exit;		
	}

	if (!isset($_POST['telres']) || $_POST['telres'] == '') {
		Pessoa::setErrorRegister("Informe um número de telefone residencial ou celular.");
		header("Location: /pessoa-create");
		exit;		
	}
	$_POST['telres'] = preg_replace('/[^\p{L}\p{N}\s]/', '', $_POST['telres'] );
	$_POST['telres'] = str_replace(' ', '',$_POST['telres']);

	if(strlen($_POST['telres']) !== 10 && strlen($_POST['telres']) !== 11 ){

		Pessoa::setErrorRegister("Número de telefone inválido! Digite o número de um tefefone celular ou residencial com DDD.");
		header("Location: /pessoa-create");
		exit;
	}
	if (!isset($_POST['contato']) || $_POST['contato'] == '') {
		Pessoa::setErrorRegister("Informe um nome para entrar em contato, em caso de emergência!");
		header("Location: /pessoa-create");
		exit;		
	}
	if (!isset($_POST['telemer']) || $_POST['telemer'] == '') {
		Pessoa::setErrorRegister("Informe um número de telefone para ligar em caso de emergência!");
		header("Location: /pessoa-create");
		exit;		
	}
	$_POST['telemer'] = preg_replace('/[^\p{L}\p{N}\s]/', '', $_POST['telemer'] );
	$_POST['telemer'] = str_replace(' ', '',$_POST['telemer']);
	if(strlen($_POST['telemer']) !== 10 && strlen($_POST['telemer']) !== 11 ){

		Pessoa::setErrorRegister("Número de telefone inválido! Digite o número de um tefefone celular ou residencial com DDD.");
		header("Location: /pessoa-create");
		exit;
	}	

	$_POST['idperson'] = (int)$_SESSION[User::SESSION]["idperson"];

	$pessoa->save();

	$idpess = $pessoa->getidpess();
	
	$endereco = new Endereco();	

	$endereco->setData([
		//'idender'=>0,
		'idperson'=>$_POST['idperson'], 
		'idpess'=>$idpess,
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

	$_SESSION['registerpessoaValues'] = NULL;
	
		header('Location: /user/pessoas');
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

$app->get("/user/pessoa/:idpess", function($idpess) {

	User::verifyLogin(false);

	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);

	$endereco = new Endereco();

	$endereco = Endereco::getEnderecoPessoa($idpess);

	if( $pessoa->getidpess() != $idpess){

		Pessoa::setErrorRegister("Pessoa não encontrado!!!");
			header("Location: /user/pessoas");
			exit();			
	}

	//var_dump($endereco);
	//exit();

	$page = new Page();

	$page->setTpl("pessoa-update", array(
		"pessoa"=>$pessoa->getValues(),
		"endereco"=>$endereco,
		"error"=>Pessoa::getErrorRegister()
	));
});

$app->post("/updatepessoa/:idpess", function($idpess){

	User::verifyLogin(false);

	//$_SESSION['registerpessoaValues'] = $_POST;

	$iduser = (int)$_SESSION[User::SESSION]["iduser"];

	if (!isset($_POST['nomepess']) || $_POST['nomepess'] == '') {

		Pessoa::setErrorRegister("Preencha o nome completo da pessoa.");
		header("Location: /user/pessoa/".$idpess."");
		exit;
	}

	if (!isset($_POST['dtnasc']) || $_POST['dtnasc'] == '') {

		Pessoa::setErrorRegister("Informe a data de nascimento.");
		header("Location: /user/pessoa/".$idpess."");
		exit;
	}

	if (!isset($_POST['sexo']) || $_POST['sexo'] == '') {

		Pessoa::setErrorRegister("Informe o sexo.");
		header("Location: /user/pessoa/".$idpess."");
		exit;
	}

	if(!Pessoa::validaCPF($_POST['numcpf'])){

		Pessoa::setErrorRegister("Informe um número de CPF válido para a pessoa!");
		header("Location: /user/pessoa/".$idpess."");
		exit;

	}

	if (!isset($_POST['numcpf']) || $_POST['numcpf'] == '') {

		Pessoa::setErrorRegister("Informe o número do CPF.");
		header("Location: /user/pessoa/".$idpess."");
		exit;
	}
	
	/*
	if (Pessoa::checkCpfExist($_POST['numcpf']) === true) {

		Pessoa::setErrorRegister("Este CPF pertence a outro usuário.");
		header("Location: /user/pessoa/".$idpess."");
		exit;
	}
	*/

	/*
	if (!isset($_POST['numrg']) || $_POST['numrg'] == '') {

		Pessoa::setErrorRegister("Informe o número do RG.");
		header("Location: /user/pessoa/".$idpess."");
		exit;
	}	
	*/

	if (!isset($_POST['numsus']) || $_POST['numsus'] == '') {

		Pessoa::setErrorRegister("Informe o número do Cartão do SUS.");
		header("Location: /user/pessoa/".$idpess."");
		exit;
	}	

	if (!isset($_POST['vulnsocial']) || $_POST['vulnsocial'] == '') {

		Pessoa::setErrorRegister("Informe se a pessoa participa de programas sociais.");
		header("Location: /user/pessoa/".$idpess."");
		exit;
	}	

	//var_dump($_POST['vulnsocial']);
	//exit;
	
	if ($_POST['vulnsocial'] === '1' && (!isset($_POST['cadunico']) || $_POST['cadunico'] == '')) {

		Pessoa::setErrorRegister("Informe o número do Cadastro Único (cadunico)");
		header("Location: /user/pessoa/".$idpess."");
		exit;
	}	
	
	if ($_POST['vulnsocial'] === '0' && $_POST['cadunico'] !== '') {

		$_POST['vulnsocial'] = '1';
	}

	if (!isset($_POST['pcd']) || $_POST['pcd'] == '') {

		Pessoa::setErrorRegister("Informe se a pessoa é portadora de deficiência (PCD).");
		header("Location: /user/pessoa/".$idpess."");
		exit;
	}	

	if(calcularIdade($_POST['dtnasc']) < 18){

	
		if ((!isset($_POST['nomemae']) || $_POST['nomemae'] == '') && (!isset($_POST['nomepai']) || $_POST['nomepai'] == '')) {

			Pessoa::setErrorRegister("Informe pelo menos o nome ou da mãe, ou do pai ou do responsável.");
			header("Location: /user/pessoa/".$idpess."");
			exit;
		}		

		if($_POST['nomemae'] !== '' && $_POST['cpfmae'] === ''){

			Pessoa::setErrorRegister("Informe um número do CPF da mãe!");
			header("Location: /user/pessoa/".$idpess."");
			exit;
		}	

		if($_POST['cpfmae'] !== '' && !Pessoa::validaCPF($_POST['cpfmae'])){

			Pessoa::setErrorRegister("Informe um número de CPF válido para a mãe da pessoa!");
			header("Location: /user/pessoa/".$idpess."");
			exit;
		}

		if($_POST['nomepai'] !== '' && $_POST['cpfpai'] === ''){

			Pessoa::setErrorRegister("Informe um número do CPF do pai!");
			header("Location: /user/pessoa/".$idpess."");
			exit;
		}	

		if($_POST['cpfmae'] === $_POST['numcpf']){

			Pessoa::setErrorRegister("CPF da mãe não pode ser igual ao do(a) menor!");
			header("Location: /user/pessoa/".$idpess."");
			exit;
		}

		if($_POST['cpfpai'] === $_POST['numcpf']){

			Pessoa::setErrorRegister("CPF do pai não pode ser igual ao do(a) menor!");
			header("Location: /user/pessoa/".$idpess."");
			exit;
		}			

		if($_POST['cpfmae'] === $_POST['cpfpai']){

			Pessoa::setErrorRegister("CPF da mãe não pode ser igual ao do pai!");
			header("Location: /user/pessoa/".$idpess."");
			exit;
		}

		if($_POST['cpfpai'] !== '' && !Pessoa::validaCPF($_POST['cpfpai'])){

			Pessoa::setErrorRegister("Informe um número de CPF válido para o pai da pessoa!");
			header("Location: /user/pessoa/".$idpess."");
			exit;
		}

		if ((!isset($_POST['cpfmae']) || $_POST['cpfmae'] === '') && (!isset($_POST['cpfpai']) || $_POST['cpfpai'] === '')) {

			Pessoa::setErrorRegister("Informe pelo menos o CPF ou da mãe, ou do pai ou do responsável.");
			header("Location: /user/pessoa/".$idpess."");
			exit;

		}	
	}

	$endereco = new Endereco(); 

	$cepMenor = '09600000';
	$cepMaior = '09899999';	

	if (!isset($_POST['cep']) || $_POST['cep'] == '') {
		Pessoa::setErrorRegister("Digite o número do cep.");
		header("Location: /user/pessoa/".$idpess."");
		exit;		
	}

	if (($_POST['cep']) < $cepMenor || ($_POST['cep']) > $cepMaior){

		Pessoa::setErrorRegister("As inscrições nos cursos esportivos são exclusivas para os moradores de São B. do Campo. Ou o CEP que você digitou é inválido");
		header("Location: /user/pessoa/".$idpess."");
		exit;		
	}

	if (!isset($_POST['rua']) || $_POST['rua'] == '') {
		Pessoa::setErrorRegister("Informe o nome da rua, avenida ou logradouro.");
		header("Location: /user/pessoa/".$idpess."");
		exit;		
	}	

	if (!isset($_POST['numero']) || $_POST['numero'] == '') {
		Pessoa::setErrorRegister("Informe o número do local.");
		header("Location: /user/pessoa/".$idpess."");
		exit;		
	}

	if (!isset($_POST['bairro']) || $_POST['bairro'] == '') {
		Pessoa::setErrorRegister("Informe o nome do bairro.");
		header("Location: /user/pessoa/".$idpess."");
		exit;		
	}	
		
	if (!isset($_POST['cidade']) || $_POST['cidade'] == '') {
		Pessoa::setErrorRegister("Informe o nome da cidade.");
		header("Location: /user/pessoa/".$idpess."");
		exit;		
	}	

	if (!isset($_POST['estado']) || $_POST['estado'] == '') {
		Pessoa::setErrorRegister("Informe o nome da estado.");
		header("Location: /user/pessoa/".$idpess."");
		exit;		
	}

	if (!isset($_POST['telres']) || $_POST['telres'] == '') {
		Pessoa::setErrorRegister("Informe um número de telefone residencial ou celular.");
		header("Location: /user/pessoa/".$idpess."");
		exit;		
	}
	$_POST['telres'] = preg_replace('/[^\p{L}\p{N}\s]/', '', $_POST['telres'] );
	$_POST['telres'] = str_replace(' ', '',$_POST['telres']);

	if(strlen($_POST['telres']) !== 10 && strlen($_POST['telres']) !== 11 ){

		Pessoa::setErrorRegister("Número de telefone inválido! Digite o número de um tefefone celular ou residencial com DDD.");
		header("Location: /user/pessoa/".$idpess."");
		exit;
	}

	if (!isset($_POST['contato']) || $_POST['contato'] == '') {
		Pessoa::setErrorRegister("Informe um nome para entrar em contato, em caso de emergência!");
		header("Location: /user/pessoa/".$idpess."");
		exit;		
	}
	if (!isset($_POST['telemer']) || $_POST['telemer'] == '') {
		Pessoa::setErrorRegister("Informe um número de telefone para ligar em caso de emergência!");
		header("Location: /user/pessoa/".$idpess."");
		exit;		
	}
	$_POST['telemer'] = preg_replace('/[^\p{L}\p{N}\s]/', '', $_POST['telemer'] );
	$_POST['telemer'] = str_replace(' ', '',$_POST['telemer']);
	if(strlen($_POST['telemer']) !== 10 && strlen($_POST['telemer']) !== 11 ){

		Pessoa::setErrorRegister("Número de telefone inválido! Digite o número de um tefefone celular ou residencial com DDD.");
		header("Location: /user/pessoa/".$idpess."");
		exit;
	}	

	$_POST['idperson'] = (int)$_SESSION[User::SESSION]["idperson"];

	$_POST['statuspessoa'] = 1;

	$pessoa = new Pessoa();

	//$pessoa->getPessoaExist();

	$pessoa->setData([
		'idpess'=>$idpess, 		
		'iduser'=>$iduser, 		
		'nomepess'=>$_POST['nomepess'],
		'dtnasc'=>$_POST['dtnasc'],
		'sexo'=>$_POST['sexo'],
		'numcpf'=>$_POST['numcpf'],
		'numrg'=>$_POST['numrg'],
		'numsus'=>$_POST['numsus'],
		'vulnsocial'=>$_POST['vulnsocial'],
		'pcd'=>$_POST['pcd'],
		'cadunico'=>$_POST['cadunico'],
		'nomemae'=>$_POST['nomemae'],
		'cpfmae'=>$_POST['cpfmae'],
		'nomepai'=>$_POST['nomepai'],
		'cpfpai'=>$_POST['cpfpai'],
		'statuspessoa'=>$_POST['statuspessoa']
	]);

	$pessoa->update($idpess);

	$idpess = $pessoa->getidpess();
	
	$endereco = new Endereco();	

	$endereco->setData([
		//'idender'=>0,
		'idperson'=>$_POST['idperson'], 
		'idpess'=>$idpess,
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

	$endereco->updateEndrecoPessoa($idpess);	

	//$_SESSION['registerpessoaValues'] = NULL;

	header('Location: /user/pessoas');
	exit;
});

?>