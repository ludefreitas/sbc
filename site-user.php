<?php

use \Sbc\Page;
use \Sbc\Model\Turma;
use \Sbc\Model\User;
use \Sbc\Model\Endereco;
use \Sbc\Model\Pessoa;


$app->get("/user-create", function(){

	$page = new Page();
	
	$page->setTpl("user-create", [
		'error'=>User::getError(),
		'success'=>Pessoa::getSuccess(),
		'errorRegister'=>User::getErrorRegister(),
		'errorRegisterSendmail'=>User::getErrorRegisterSendmail(),
		'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'','emailconfirme'=>'', 'phone'=>''],		
		'registerpessoaValues'=>(
				isset($_SESSION['registerpessoaValues'])) 
				    ? $_SESSION['registerpessoaValues'] 
			        : ['nomepess'=>'', 'dtnasc'=>'', 'numcpf'=>'', 'numrg'=>'', 'numsus'=>'', 'cadunico'=>'', 'nomemae'=>'', 'cpfmae'=>'', 'nomepai'=>'', 'cpfpai'=>'', 'sexo'=>'', 'vulnsocial'=>'', 'cep'=>'', 'rua'=>'', 'numero'=>'', 'complemento'=>'', 'bairro'=>'', 'cidade'=>'', 'estado'=>'', 'telres'=>'', 'contato'=>'', 'telemer'=>'', 'pcd'=>'', 'cid'=>'', 'dadosDoenca'=>'']
	]);
});

/*
$app->post("/register", function(){

	$_SESSION['registerValues'] = $_POST;
	$_SESSION['registerpessoaValues'] = $_POST;

	if (!isset($_POST['name']) || $_POST['name'] == '') {

		User::setErrorRegister("Preencha o seu nome.");
		header("Location: /user-create");
		exit;
	}

	if (!isset($_POST['phone']) || $_POST['phone'] == '') {

		User::setErrorRegister("Informe o número de seu tefefone celular.");
		header("Location: /user-create");
		exit;
	}
	
	$_POST['phone'] = preg_replace('/[^\p{L}\p{N}\s]/', '', $_POST['phone'] );
	$_POST['phone'] = str_replace(' ', '',$_POST['phone']);

	if(strlen($_POST['phone']) !== 11){

		User::setError("Número de telefone inválido! Digite o número do tefefone celular com DDD. Ex.: (11)98765-4321");
		header("Location: /user-create");
		exit;
	}

	if (!isset($_POST['email']) || $_POST['email'] == '') {

		User::setErrorRegister("Preencha o seu e-mail.");
		header("Location: /user-create");
		exit;
	}

	if (!User::validaEmail($_POST['email'])) {

		User::setErrorRegister("Email digitado é inválido!!");
		header("Location: /user-create");
		exit;
	}	

	if (User::checkLoginExist($_POST['email']) === true) {

		User::setErrorRegisterSendmail("Este endereço de e-mail já está sendo usado por outro usuário.");
		header("Location: /user-create");
		exit;
	}

	if ($_POST['email'] != $_POST['emailconfirme']) {

		User::setErrorRegister("Os emails digitados são diferentes!");
		header("Location: /user-create");
		exit;
	}	

	if (!isset($_POST['password']) || $_POST['password'] == '') {

		User::setErrorRegister("Preencha a senha.");
		header("Location: /user-create");
		exit;
	}

	if ($_POST['password'] != $_POST['passwordrepeat']) {

		User::setErrorRegister("As senhas digitadas são diferentes!");
		header("Location: /user-create");
		exit;
	}		

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;
	$_POST["isprof"] = (isset($_POST["isprof"]))?1:0;
	$_POST["statususer"] = 1;

	$user->setData([
		'desperson'=>$_POST['name'],
		'deslogin'=>$_POST['email'],
		'despassword'=>$_POST['password'],
		'desemail'=>$_POST['email'],		
		'nrphone'=>$_POST['phone'],
		'inadmin'=>$_POST["inadmin"],
		'isprof'=>$_POST["isprof"],
		'statususer'=>$_POST["statususer"]		
	]);

	if (!isset($_POST['dtnasc']) || $_POST['dtnasc'] == '') {

		User::setErrorRegister("Informe a data de nascimento.");
		header("Location: /user-create");
		exit;
	}

	if (!isset($_POST['sexo']) || $_POST['sexo'] == '') {

		User::setErrorRegister("Informe o sexo.");
		header("Location: /user-create");
		exit;
	}

	if (!isset($_POST['numcpf']) || $_POST['numcpf'] == '') {

		User::setErrorRegister("Informe o número do CPF.");
		header("Location: /user-create");
		exit;
	}

	if(!Pessoa::validaCPF($_POST['numcpf'])){

		User::setErrorRegister("Informe um número de CPF válido para a pessoa!");
		header("Location: /user-create");
		exit;

	}
	
	if (Pessoa::checkCpfExist($_POST['numcpf']) === true) {

		User::setErrorRegister("Este CPF pertence a outro usuário.");
		header("Location: /user-create");
		exit;
	}

	/*
	if (!isset($_POST['numrg']) || $_POST['numrg'] == '') {

		User::setErrorRegister("Informe o número do RG.");
		header("Location: /user-create");
		exit;
	}	
	*/
	/*

	if (!isset($_POST['numsus']) || $_POST['numsus'] == '') {

		User::setErrorRegister("Informe o número do Cartão do SUS.");
		header("Location: /user-create");
		exit;
	}	

	if (!isset($_POST['vulnsocial']) || $_POST['vulnsocial'] == '') {

		User::setErrorRegister("Informe se a pessoa participa de programas sociais.");
		header("Location: /user-create");
		exit;
	}	
	
	if ($_POST['vulnsocial'] === '1' && (!isset($_POST['cadunico']) || $_POST['cadunico'] == '')) {

		User::setErrorRegister("Informe o número do Cadastro Único (cadunico)");
		header("Location: /user-create");
		exit;
	}	

	if (!isset($_POST['pcd']) || $_POST['pcd'] == '') {

		User::setErrorRegister("Informe se a pessoa é portador de  deficiência (PCD).");
		header("Location: /user-create");
		exit;
	}	

	if(calcularIdade($_POST['dtnasc']) < 18){

	
		if ((!isset($_POST['nomemae']) || $_POST['nomemae'] == '') && (!isset($_POST['nomepai']) || $_POST['nomepai'] == '')) {

			User::setErrorRegister("Informe pelo menos o nome ou da mãe, ou do pai ou do responsável.");
			header("Location: /user-create");
			exit;
		}
		

		if($_POST['nomemae'] !== '' && $_POST['cpfmae'] === ''){

			User::setErrorRegister("Informe um número do CPF da mãe!");
			header("Location: /user-create");
			exit;
		}

		if($_POST['cpfmae'] === $_POST['numcpf']){

			User::setErrorRegister("CPF da mãe não pode ser igual ao do(a) menor!");
			header("Location: /user-create");
			exit;
		}

		if($_POST['cpfpai'] === $_POST['numcpf']){

			User::setErrorRegister("CPF do pai não pode ser igual ao do(a) menor!");
			header("Location: /user-create");
			exit;
		}			

		if($_POST['cpfmae'] === $_POST['cpfpai']){

			User::setErrorRegister("CPF da mãe não pode ser igual ao do pai!");
			header("Location: /user-create");
			exit;
		}			

		if($_POST['cpfmae'] !== '' && !Pessoa::validaCPF($_POST['cpfmae'])){

			User::setErrorRegister("Informe um número de CPF válido para a mãe da pessoa!");
			header("Location: /user-create");
			exit;
		}

		if($_POST['nomepai'] !== '' && $_POST['cpfpai'] === ''){

			User::setErrorRegister("Informe um número do CPF do pai!");
			header("Location: /user-create");
			exit;
		}	

		if($_POST['cpfpai'] !== '' && !Pessoa::validaCPF($_POST['cpfpai'])){

			User::setErrorRegister("Informe um número de CPF válido para o pai da pessoa!");
			header("Location: /user-create");
			exit;
		}

		if ((!isset($_POST['cpfmae']) || $_POST['cpfmae'] == '') && (!isset($_POST['cpfpai']) || $_POST['cpfpai'] == '')) {

			User::setErrorRegister("Informe pelo menos o CPF ou da mãe, ou do pai ou do responsável.");
			header("Location: /user-create");
			exit;

		}	
	}	

	$user->save();

	User::login($_POST['email'], $_POST['password']);

	$_SESSION['registerValues'] = NULL;	

	$iduser = (int)$_SESSION[User::SESSION]["iduser"];	

	$_POST['statuspessoa'] = 1;

	$pessoa = new Pessoa();

	$pessoa->getPessoaExist();

	$pessoa->setData([
		'iduser'=>$iduser, 		
		//'nomepess'=>$_POST['nomepess'],
		'nomepess'=>$_POST['name'],
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

	$pessoa->save();

	$endereco = new Endereco(); 

	$cepMenor = '09600000';
	$cepMaior = '09899999';	

	if (!isset($_POST['cep']) || $_POST['cep'] == '') {
		Pessoa::setErrorRegister("Digite o número do cep.");
		header("Location: /user-create");
		exit;		
	}

	if (($_POST['cep']) < $cepMenor || ($_POST['cep']) > $cepMaior){

		Pessoa::setErrorRegister("As inscrições nos cursos esportivos são exclusivas para os moradores de São B. do Campo. Ou o CEP que você digitou é inválido");
		header("Location: /user-create");
		exit;		
	}

	if (!isset($_POST['rua']) || $_POST['rua'] == '') {
		Pessoa::setErrorRegister("Informe o nome da rua, avenida ou logradouro.");
		header("Location: /user-create");
		exit;		
	}	

	if (!isset($_POST['numero']) || $_POST['numero'] == '') {
		Pessoa::setErrorRegister("Informe o número do local.");
		header("Location: /user-create");
		exit;		
	}

	if (!isset($_POST['bairro']) || $_POST['bairro'] == '') {
		Pessoa::setErrorRegister("Informe o nome do bairro.");
		header("Location: /user-create");
		exit;		
	}	
		
	if (!isset($_POST['cidade']) || $_POST['cidade'] == '') {
		Pessoa::setErrorRegister("Informe o nome da cidade.");
		header("Location: /user-create");
		exit;		
	}	

	if (!isset($_POST['estado']) || $_POST['estado'] == '') {
		Pessoa::setErrorRegister("Informe o nome da estado.");
		header("Location: /user-create");
		exit;		
	}

	if (!isset($_POST['telres']) || $_POST['telres'] == '') {
		Pessoa::setErrorRegister("Informe um número de telefone residencial ou celular.");
		header("Location: /user-create");
		exit;		
	}
	$_POST['telres'] = preg_replace('/[^\p{L}\p{N}\s]/', '', $_POST['telres'] );
	$_POST['telres'] = str_replace(' ', '',$_POST['telres']);

	if(strlen($_POST['telres']) !== 10 && strlen($_POST['telres']) !== 11 ){

		Pessoa::setErrorRegister("Número de telefone inválido! Digite o número de um tefefone celular ou residencial com DDD.");
		header("Location: /user-create");
		exit;
	}
	if (!isset($_POST['contato']) || $_POST['contato'] == '') {
		Pessoa::setErrorRegister("Informe um nome para entrar em contato, em caso de emergência!");
		header("Location: /user-create");
		exit;		
	}
	if (!isset($_POST['telemer']) || $_POST['telemer'] == '') {
		Pessoa::setErrorRegister("Informe um número de telefone para ligar em caso de emergência!");
		header("Location: /user-create");
		exit;		
	}
	$_POST['telemer'] = preg_replace('/[^\p{L}\p{N}\s]/', '', $_POST['telemer'] );
	$_POST['telemer'] = str_replace(' ', '',$_POST['telemer']);
	if(strlen($_POST['telemer']) !== 10 && strlen($_POST['telemer']) !== 11 ){

		Pessoa::setErrorRegister("Número de telefone inválido! Digite o número de um tefefone celular ou residencial com DDD.");
		header("Location: /user-create");
		exit;
	}	

	$_POST['idperson'] = (int)$_SESSION[User::SESSION]["idperson"];

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

	header('Location: /');
	exit;
});
*/

$app->post("/register", function(){

	$_SESSION['registerValues'] = $_POST;
	$_SESSION['registerpessoaValues'] = $_POST;

	if (!isset($_POST['name']) || $_POST['name'] == '') {

		User::setErrorRegister("Preencha o seu nome.");
		header("Location: /user-create");
		exit;
	}

	if (!isset($_POST['phone']) || $_POST['phone'] == '') {

		User::setErrorRegister("Informe o número de seu tefefone celular.");
		header("Location: /user-create");
		exit;
	}
	
	$_POST['phone'] = preg_replace('/[^\p{L}\p{N}\s]/', '', $_POST['phone'] );
	$_POST['phone'] = str_replace(' ', '',$_POST['phone']);

	if(strlen($_POST['phone']) !== 11){

		User::setError("Número de telefone inválido! Digite o número do tefefone celular com DDD. Ex.: (11)98765-4321");
		header("Location: /user-create");
		exit;
	}

	if (!isset($_POST['email']) || $_POST['email'] == '') {

		User::setErrorRegister("Preencha o seu e-mail.");
		header("Location: /user-create");
		exit;
	}

	if (!User::validaEmail($_POST['email'])) {

		User::setErrorRegister("Email digitado é inválido!!");
		header("Location: /user-create");
		exit;
	}	

	if (User::checkLoginExist($_POST['email']) === true) {

		User::setErrorRegisterSendmail("Este endereço de e-mail já está sendo usado por outro usuário.");
		header("Location: /user-create");
		exit;
	}

	if ($_POST['email'] != $_POST['emailconfirme']) {

		User::setErrorRegister("Os emails digitados são diferentes!");
		header("Location: /user-create");
		exit;
	}	

	if (!isset($_POST['password']) || $_POST['password'] == '') {

		User::setErrorRegister("Preencha a senha.");
		header("Location: /user-create");
		exit;
	}

	if ($_POST['password'] != $_POST['passwordrepeat']) {

		User::setErrorRegister("As senhas digitadas são diferentes!");
		header("Location: /user-create");
		exit;
	}	
	
	if (!isset($_POST['dtnasc']) || $_POST['dtnasc'] == '') {

		User::setErrorRegister("Informe a data de nascimento.");
		header("Location: /user-create");
		exit;
	}

	if (!isset($_POST['sexo']) || $_POST['sexo'] == '') {

		User::setErrorRegister("Informe o sexo.");
		header("Location: /user-create");
		exit;
	}

	if (!isset($_POST['numcpf']) || $_POST['numcpf'] == '') {

		User::setErrorRegister("Informe o número do CPF.");
		header("Location: /user-create");
		exit;
	}

	if(!Pessoa::validaCPF($_POST['numcpf'])){

		User::setErrorRegister("Informe um número de CPF válido para a pessoa!");
		header("Location: /user-create");
		exit;

	}

	/*	
	if (Pessoa::checkCpfExist($_POST['numcpf']) === true) {

		User::setErrorRegister("Este CPF já está cadastrado.");
		header("Location: /user-create");
		exit;
	}
	*/

	/*
	if (!isset($_POST['numrg']) || $_POST['numrg'] == '') {

		User::setErrorRegister("Informe o número do RG.");
		header("Location: /user-create");
		exit;
	}	
	*/

	if (!isset($_POST['numsus']) || $_POST['numsus'] == '') {

		User::setErrorRegister("Informe o número do Cartão do SUS.");
		header("Location: /user-create");
		exit;
	}	

	if (!isset($_POST['vulnsocial']) || $_POST['vulnsocial'] == '') {

		User::setErrorRegister("Informe se a pessoa participa de programas sociais.");
		header("Location: /user-create");
		exit;
	}	
	
	if ($_POST['vulnsocial'] === '1' && (!isset($_POST['cadunico']) || $_POST['cadunico'] == '')) {

		User::setErrorRegister("Informe o número do Cadastro Único (cadunico)");
		header("Location: /user-create");
		exit;
	}	

	if (!isset($_POST['pcd']) || $_POST['pcd'] == '') {

		User::setErrorRegister("Informe se a pessoa é portador de  deficiência (PCD).");
		header("Location: /user-create");
		exit;
	}

	/*

	if(isset($_POST['pcd']) && ($_POST['pcd']) === '1'){	

		if (!isset($_POST['cid']) || $_POST['cid'] == '') {

			User::setErrorRegister("Informe o CID.");
			header("Location: /user-create");
			exit;
		}

		if (!isset($_POST['dadosDoenca']) || $_POST['dadosDoenca'] == '' || $_POST['dadosDoenca'] == 'undefined'){

			User::setErrorRegister("Informe a descrição do CID.");
			header("Location: /user-create");
			exit;
		}		

	}
	*/

	if(calcularIdade($_POST['dtnasc']) < 18){

	
		if ((!isset($_POST['nomemae']) || $_POST['nomemae'] == '') && (!isset($_POST['nomepai']) || $_POST['nomepai'] == '')) {

			User::setErrorRegister("Informe pelo menos o nome ou da mãe, ou do pai ou do responsável.");
			header("Location: /user-create");
			exit;
		}
		

		if($_POST['nomemae'] !== '' && $_POST['cpfmae'] === ''){

			User::setErrorRegister("Informe um número do CPF da mãe!");
			header("Location: /user-create");
			exit;
		}

		if($_POST['cpfmae'] === $_POST['numcpf']){

			User::setErrorRegister("CPF da mãe não pode ser igual ao do(a) menor!");
			header("Location: /user-create");
			exit;
		}

		if($_POST['cpfpai'] === $_POST['numcpf']){

			User::setErrorRegister("CPF do pai não pode ser igual ao do(a) menor!");
			header("Location: /user-create");
			exit;
		}			

		if($_POST['cpfmae'] === $_POST['cpfpai']){

			User::setErrorRegister("CPF da mãe não pode ser igual ao do pai!");
			header("Location: /user-create");
			exit;
		}			

		if($_POST['cpfmae'] !== '' && !Pessoa::validaCPF($_POST['cpfmae'])){

			User::setErrorRegister("Informe um número de CPF válido para a mãe da pessoa!");
			header("Location: /user-create");
			exit;
		}

		if($_POST['nomepai'] !== '' && $_POST['cpfpai'] === ''){

			User::setErrorRegister("Informe um número do CPF do pai!");
			header("Location: /user-create");
			exit;
		}	

		if($_POST['cpfpai'] !== '' && !Pessoa::validaCPF($_POST['cpfpai'])){

			User::setErrorRegister("Informe um número de CPF válido para o pai da pessoa!");
			header("Location: /user-create");
			exit;
		}

		if ((!isset($_POST['cpfmae']) || $_POST['cpfmae'] == '') && (!isset($_POST['cpfpai']) || $_POST['cpfpai'] == '')) {

			User::setErrorRegister("Informe pelo menos o CPF ou da mãe, ou do pai ou do responsável.");
			header("Location: /user-create");
			exit;

		}	
	}		 

	$cepMenor = '09600000';
	$cepMaior = '09899999';	

	if (!isset($_POST['cep']) || $_POST['cep'] == '') {
		Pessoa::setErrorRegister("Digite o número do cep.");
		header("Location: /user-create");
		exit;		
	}

	if (($_POST['cep']) < $cepMenor || ($_POST['cep']) > $cepMaior){

		Pessoa::setErrorRegister("As inscrições nos cursos esportivos são exclusivas para os moradores de São B. do Campo. Ou o CEP que você digitou é inválido");
		header("Location: /user-create");
		exit;		
	}

	if (!isset($_POST['rua']) || $_POST['rua'] == '') {
		Pessoa::setErrorRegister("Informe o nome da rua, avenida ou logradouro.");
		header("Location: /user-create");
		exit;		
	}	

	if (!isset($_POST['numero']) || $_POST['numero'] == '') {
		Pessoa::setErrorRegister("Informe o número do local.");
		header("Location: /user-create");
		exit;		
	}

	if (!isset($_POST['bairro']) || $_POST['bairro'] == '') {
		Pessoa::setErrorRegister("Informe o nome do bairro.");
		header("Location: /user-create");
		exit;		
	}	
		
	if (!isset($_POST['cidade']) || $_POST['cidade'] == '') {
		Pessoa::setErrorRegister("Informe o nome da cidade.");
		header("Location: /user-create");
		exit;		
	}	

	if (!isset($_POST['estado']) || $_POST['estado'] == '') {
		Pessoa::setErrorRegister("Informe o nome da estado.");
		header("Location: /user-create");
		exit;		
	}

	if (!isset($_POST['telres']) || $_POST['telres'] == '') {
		Pessoa::setErrorRegister("Informe um número de telefone residencial ou celular.");
		header("Location: /user-create");
		exit;		
	}
	$_POST['telres'] = preg_replace('/[^\p{L}\p{N}\s]/', '', $_POST['telres'] );
	$_POST['telres'] = str_replace(' ', '',$_POST['telres']);

	if(strlen($_POST['telres']) !== 10 && strlen($_POST['telres']) !== 11 ){

		Pessoa::setErrorRegister("Número de telefone inválido! Digite o número de um tefefone celular ou residencial com DDD.");
		header("Location: /user-create");
		exit;
	}
	if (!isset($_POST['contato']) || $_POST['contato'] == '') {
		Pessoa::setErrorRegister("Informe um nome para entrar em contato, em caso de emergência!");
		header("Location: /user-create");
		exit;		
	}
	if (!isset($_POST['telemer']) || $_POST['telemer'] == '') {
		Pessoa::setErrorRegister("Informe um número de telefone para ligar em caso de emergência!");
		header("Location: /user-create");
		exit;		
	}
	$_POST['telemer'] = preg_replace('/[^\p{L}\p{N}\s]/', '', $_POST['telemer'] );
	$_POST['telemer'] = str_replace(' ', '',$_POST['telemer']);
	if(strlen($_POST['telemer']) !== 10 && strlen($_POST['telemer']) !== 11 ){

		Pessoa::setErrorRegister("Número de telefone inválido! Digite o número de um tefefone celular ou residencial com DDD.");
		header("Location: /user-create");
		exit;
	}

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;
	$_POST["isprof"] = (isset($_POST["isprof"]))?1:0;
	$_POST["statususer"] = 1;

	$user->setData([
		'desperson'=>$_POST['name'],
		'deslogin'=>$_POST['email'],
		'despassword'=>$_POST['password'],
		'desemail'=>$_POST['email'],		
		'nrphone'=>$_POST['phone'],
		'inadmin'=>$_POST["inadmin"],
		'isprof'=>$_POST["isprof"],
		'statususer'=>$_POST["statususer"]		
	]);

	$user->save();

	User::login($_POST['email'], $_POST['password']);

	$_SESSION['registerValues'] = NULL;	

	$iduser = (int)$_SESSION[User::SESSION]["iduser"];	

	$_POST['statuspessoa'] = 1;

	$pessoa = new Pessoa();

	$pessoa->getPessoaExist();

	$pessoa->setData([
		'iduser'=>$iduser, 		
		//'nomepess'=>$_POST['nomepess'],
		'nomepess'=>$_POST['name'],
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

	$pessoa->save();
	
	$pessoa = new Pessoa();

	$endereco = new Endereco();	

	$_POST['idperson'] = (int)$_SESSION[User::SESSION]["idperson"];

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

	header('Location: /');
	exit;
});





$app->get("/user/profile", function(){

	User::verifyLogin(false);

	$user = new User();

	$iduser = $_SESSION['User']['iduser'];

	$user->get((int)$iduser);

	/*
	echo '<pre>';
	print_r($user);
	echo '</pre>';
	exit;
	*/

	$page = new Page();

	$page->setTpl("user-profile", [
		'user'=>$user->getValues(),
		'profileMsg'=>User::getSuccess(),
		'profileError'=>User::getError()
	]);

});

$app->post("/user/profile", function(){

	User::verifyLogin(false);

	if (!isset($_POST['desperson']) || $_POST['desperson'] === '') {
		User::setError("Preencha o seu nome.");
		header('Location: /user/profile');
		exit;
	}

	if (!isset($_POST['desemail']) || $_POST['desemail'] === '') {
		User::setError("Preencha o seu e-mail.");
		header('Location: /user/profile');
		exit;
	}

	if (!isset($_POST['nrphone']) || $_POST['nrphone'] === '') {
		User::setError("Preencha o seu telefone.");
		header('Location: /user/profile');
		exit;
	}

	$_POST['nrphone'] = preg_replace('/[^\p{L}\p{N}\s]/', '', $_POST['nrphone'] );
	$_POST['nrphone'] = str_replace(' ', '',$_POST['nrphone']);

	if(strlen($_POST['nrphone']) !== 11){

		User::setError("Número de telefone inválido! Digite o número do tefefone celular com DDD. Ex.: (11)98765-4321");
		header("Location: /user/profile");
		exit;
	}

	if (!User::validaEmail($_POST['desemail'])) {

		User::setError("Email digitado é inválido!!");
		header("Location: /user/profile");
		exit;
	}	

	$user = User::getFromSession();

	if ($_POST['desemail'] !== $user->getdesemail()) {

		if (User::checkLoginExist($_POST['desemail']) === true) {

			User::setError("Este endereço de e-mail já está cadastrado.");
			header('Location: /user/profile');
			exit;

		}

	}

	$_POST['iduser'] = $_SESSION['User']['iduser'];
	$_POST['apelidoperson'] = $user->getapelidoperson();
	$_POST['inadmin'] = $user->getinadmin();
	$_POST['isprof'] = $user->getisprof();
	$_POST['statususer'] = 1;
	$_POST['despassword'] = $user->getdespassword();
	$_POST['deslogin'] = $_POST['desemail'];
	$_POST['desemail'] = $_POST['desemail'];

	$user->setData($_POST);

	//echo '<pre>';
	//print_r($_POST);
	//echo '<pre>';
	//exit;

	$user->update();

	User::setSuccess("Seus dados foram alterados com sucesso!");

	header('Location: /');
	exit;

});


$app->get("/user-change-password", function(){

	User::verifyLogin(false);

	$page = new Page();

	$page->setTpl("user-change-password", [
		'changePassError'=>User::getError(),
		'changePassSuccess'=>User::getSuccess()
	]);

});

$app->post("/user-change-password", function(){

	User::verifyLogin(false);

	if (!isset($_POST['current_pass']) || $_POST['current_pass'] === '') {

		User::setError("Digite a senha atual.");
		header("Location: /user-change-password");
		exit;

	}

	if (!isset($_POST['new_pass']) || $_POST['new_pass'] === '') {

		User::setError("Digite a nova senha.");
		header("Location: /user-change-password");
		exit;

	}

	if (!isset($_POST['new_pass_confirm']) || $_POST['new_pass_confirm'] === '') {

		User::setError("Confirme a nova senha.");
		header("Location: /user-change-password");
		exit;

	}

	if ($_POST['current_pass'] === $_POST['new_pass']) {

		User::setError("A sua nova senha deve ser diferente da atual.");
		header("Location: /user-change-password");
		exit;		

	}

	//$user = User::getFromSession();

	$user = new User();

	$iduser = $_SESSION['User']['iduser'];

	$user->get((int)$iduser);

	if (!password_verify($_POST['current_pass'], $user->getdespassword())) {

		User::setError("A senha está inválida.");
		header("Location: /user-change-password");
		exit;			

	}

	$user->setdespassword($_POST['new_pass']);

	$user->updatePassword();

	User::setSuccess("Senha alterada com sucesso!");

	header('Location: /');
	exit;

});


?>