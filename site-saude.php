<?php

use \Sbc\Page;
use \Sbc\Model\Saude;
use \Sbc\Model\Pessoa;
use \Sbc\Model\User;
use \Sbc\Model\Cart;

$app->get("/saude-atualiza/:idpess/:nomepess", function($idpess, $nomepess) {

	User::verifyLogin(false);

	$saude = new Saude();

	$idperson = (int)$_SESSION[User::SESSION]["idperson"];

	$pessoa = new Pessoa();

	$doenca = isset($_SESSION['doenca']) ? $_SESSION['doenca'] : 'Dados de doença não encontrados';
	$codigo = isset($_SESSION['codigo']) ? $_SESSION['codigo'] : '';
	$idcid = isset($_SESSION['idcid']) ? $_SESSION['idcid'] : '';	

	$page = new Page();

	$page->setTpl("saude-create", [
		"doenca"=>$doenca,
		"codigo"=>$codigo,
		"idcid"=>$idcid,
		'nomepess'=>$nomepess,
		'idpess'=>$idpess,
		'success'=>Saude::getSuccess(),
		'errorRegister'=>Saude::getError(),
		'errorSaude'=>Cart::getMsgError(),
		'registersaudeValues'=>(
			isset($_SESSION['registersaudeValues'])) 
			    ? $_SESSION['registersaudeValues'] 
		        : ['pcd'=>'', 'cid'=>'', 'dadosDoenca'=>'']
	]);	

});

$app->post("/buscacid/:idpess/:nomepess", function($idpess, $nomepess){

	User::verifyLogin(false);

	$idperson = (int)$_SESSION[User::SESSION]["idperson"];

	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);			

	$saude = new Saude();

	if(!isset($_POST['cid']) || $_POST['cid'] == ''){

		Saude::setError("Informe o número do CID.");
		header("Location: /saude-atualiza/".$idpess."/".$nomepess."");
		exit;
	}

	$codigo = $_POST['cid'];

    if(!$saude->obtemDoencaCid($codigo)){

    	$_SESSION['doenca'] =  '';
		$_SESSION['codigo'] = '';
		$_SESSION['idcid'] = '';

    	Saude::setError("Dados de doença não encontrado! Verifique se o CID foi digitado corretamente.");
		header("Location: /saude-atualiza/".$idpess."/".$nomepess."");
		exit;

    }else{

	$dadosDeonca = $saude->obtemDoencaCid($codigo);

	$_SESSION['doenca'] =  $dadosDeonca[0]['doenca'];
	$_SESSION['codigo'] = $dadosDeonca[0]['codigo'];
	$_SESSION['idcid'] = $dadosDeonca[0]['idcid'];

	header("Location: /saude-atualiza/".$idpess."/".$nomepess."");
		exit;
	}
	
});

$app->post("/registersaude", function(){

	User::verifyLogin(false);

	$saude = new Saude();

	$_SESSION['registersaudeValues'] = $_POST;


	$iduser = (int)$_SESSION[User::SESSION]["iduser"];

	if(!isset($_POST['auditiva']) && !isset($_POST['visual']) && !isset($_POST['fisica']) && !isset($_POST['intelectual']) && !isset($_POST['autismo']) && !isset($_POST['tea'])){
		Saude::setError('Informe pelo menos um tipo de deficiência');
		header("Location: /saude-atualiza/".$_POST['idpess']."/".$_POST['nomepess']."");
		exit;
	}

	$auditiva = isset($_POST['auditiva']) ? $_POST['auditiva'] : 0;
	$visual = isset($_POST['visual']) ? $_POST['visual'] : 0;
	$fisica = isset($_POST['fisica']) ? $_POST['fisica'] : 0;
	$intelectual = isset($_POST['intelectual']) ? $_POST['intelectual'] : 0;
	$autismo = isset($_POST['autismo']) ? $_POST['autismo'] : 0;
	$tea = isset($_POST['tea']) ? $_POST['tea'] : 0;


	if (!isset($_POST['codigo']) || $_POST['codigo'] == '') {

		Saude::setError("É necessário irformar c CID! Digite o número do CID e clieque no botão 'BUSCA CID'");
		header("Location: /saude-atualiza/".$_POST['idpess']."/".$_POST['nomepess']."");
		exit;
	}

	if (!isset($_POST['doenca']) || $_POST['doenca'] == '' || $_POST['doenca'] == 'undefined'){

		Saude::setError("Informe a descrição do CID.");
		header("Location: /saude-atualiza/".$_POST['idpess']."/".$_POST['nomepess']."");
		exit;
	}		
		

	$saude->setData([
		'idpess'=>$_POST['idpess'],
		'idcid'=>$_POST['idcid'],
		'defauditiva'=>$auditiva,
		'defvisual'=>$visual,
		'deffisica'=>$fisica,
		'defintelectual'=>$intelectual,
		'defautismo'=>$autismo,
		'deftea'=>$tea		
	]);	

	if (!Saude::getSaudeExist($_POST['idpess'])){

		$saude->save();

	}else{
		
		$saude->update($_POST['idpess']);		
	}

	    $_SESSION['doenca'] = NULL;
	    $_SESSION['codigo'] = NULL;
	    $_SESSION['idcid'] = NULL;
	
	    Cart::setSuccess("Dados de saúde atualizado com sucesso!!.");
		header('Location: /user/pessoas');
		exit;	
});

$app->get("/user/saude/pessoa/:idpess", function($idpess) {

	User::verifyLogin(false);

	$pessoa = new Pessoa();	

	if( $pessoa->getidpess() != $idpess){

		Pessoa::setErrorRegister("Pessoa não encontrado!!!");
			header("Location: /user/pessoas");
			exit();			
	}
	
	$page = new Page();

	$page->setTpl("saude-update", array(
		"pessoa"=>$pessoa->getValues(),
		"error"=>Pessoa::getErrorRegister()
	));
});


?>