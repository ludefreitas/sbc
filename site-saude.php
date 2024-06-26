<?php

use \Sbc\Page;
use \Sbc\Model\Saude;
use \Sbc\Model\Pessoa;
use \Sbc\Model\User;
use \Sbc\Model\Cart;

$app->get("/saude-atualiza/:idpess/:nomepess", function($idpess, $nomepess) {

	User::verifyLogin(false);

	$saude = new Saude();
	
	$countParq = $saude->getCountParqByIdPess($idpess);

	$idperson = (int)$_SESSION[User::SESSION]["idperson"];

	$pessoa = new Pessoa();
	
	$pessoa->get((int)$idpess);
	
	$deficiente = $pessoa->getpcd();

	$doenca = isset($_SESSION['doenca']) ? $_SESSION['doenca'] : 'Dados de doença não encontrados';
	$codigo = isset($_SESSION['codigo']) ? $_SESSION['codigo'] : '';
	$idcid = isset($_SESSION['idcid']) ? $_SESSION['idcid'] : '';	

	$page = new Page();

	$page->setTpl("saude-create", [
		"doenca"=>$doenca,
		"codigo"=>$codigo,
		"idcid"=>$idcid,
		'nomepess'=>$nomepess,
		'deficiente'=>$deficiente,
		'idpess'=>$idpess,
		'countParq'=>$countParq,
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

    /*
	if(!isset($_POST['cid']) || $_POST['cid'] == ''){

		Saude::setError("Informe o número do CID.");
		header("Location: /saude-atualiza/".$idpess."/".$nomepess."");
		exit;
	}
	*/

	$codigo = $_POST['cid'];

    if(!$saude->obtemDoencaCid($codigo)){

    	$_SESSION['doenca'] =  '';
		$_SESSION['codigo'] = '';
		$_SESSION['idcid'] = '';

    	Saude::setError("Dados de doença não encontrado! Verifique se o CID foi digitado corretamente.");
    	echo "<script>window.location.href = '/saude-atualiza/".$idpess."/".$nomepess."'</script>";
		//header("Location: /saude-atualiza/".$idpess."/".$nomepess."");
		exit;

    }else{

		$dadosDeonca = $saude->obtemDoencaCid($codigo);

		$_SESSION['doenca'] =  $dadosDeonca[0]['doenca'];
		$_SESSION['codigo'] = $dadosDeonca[0]['codigo'];
		$_SESSION['idcid'] = $dadosDeonca[0]['idcid'];

		echo "<script>window.location.href = '/saude-atualiza/".$idpess."/".$nomepess."'</script>";
		//header("Location: /saude-atualiza/".$idpess."/".$nomepess."");
		exit;
	}
});

$app->post("/registersaude", function(){

	User::verifyLogin(false);

	$saude = new Saude();
	$pessoa = new Pessoa();	

	$_SESSION['registersaudeValues'] = $_POST;

	$iduser = (int)$_SESSION[User::SESSION]["iduser"];
	
	$idpess = $_POST['idpess'];

	$pessoa->get((int)$idpess);

	$codigo = $_POST['codigo'];

	$nomepess = $pessoa->getnomepess();
	
	if($pessoa->getpcd() == 1){
    	if(!isset($_POST['auditiva']) && !isset($_POST['visual']) && !isset($_POST['fisica']) && !isset($_POST['intelectual']) && !isset($_POST['autismo']) && !isset($_POST['tea'])){
    		Saude::setError('No cadastro é declarado que esta pessoa é PCD. Então, selecione a opção "Sim" e informe pelo menos um tipo de deficiência');
    		echo "<script>window.location.href = '/saude-atualiza/".$_POST['idpess']."/".$_POST['nomepess']."'</script>";
    		//header("Location: /saude-atualiza/".$_POST['idpess']."/".$_POST['nomepess']."");
    		exit;
    	}
	}

	$auditiva = isset($_POST['auditiva']) ? $_POST['auditiva'] : 0;
	$visual = isset($_POST['visual']) ? $_POST['visual'] : 0;
	$fisica = isset($_POST['fisica']) ? $_POST['fisica'] : 0;
	$intelectual = isset($_POST['intelectual']) ? $_POST['intelectual'] : 0;
	$autismo = isset($_POST['autismo']) ? $_POST['autismo'] : 0;
	$tea = isset($_POST['tea']) ? $_POST['tea'] : 0;

    if($pessoa->getpcd() == 1){
        
    	if (!isset($_POST['codigo']) || $_POST['codigo'] == '') {
    
    		Saude::setError("No cadastro é declarado que esta pessoa é PCD. Então, é necessário irformar o CID! Digite o número do CID.");
    		echo "<script>window.location.href = '/saude-atualiza/".$_POST['idpess']."/".$_POST['nomepess']."'</script>";
    		//header("Location: /saude-atualiza/".$_POST['idpess']."/".$_POST['nomepess']."");
    		exit;
    	}
    	
    	if(!$saude->obtemDoencaCid($codigo) || $codigo = ''){

	    	$_SESSION['doenca'] =  '';
			$_SESSION['codigo'] = '';
			$_SESSION['idcid'] = '';

	    	Saude::setError("Dados de doença não encontrado! Verifique se o CIDs foi digitado corretamente.");
	    	echo "<script>window.location.href = '/saude-atualiza/".$_POST['idpess']."/".$_POST['nomepess']."'</script>";
			//header("Location: /saude-atualiza/".$idpess."/".$nomepess."");
			exit;

    		}else{    			

			$dadosDeonca = $saude->obtemDoencaCid($_POST['codigo']);

			$_SESSION['doenca'] = $dadosDeonca[0]['doenca'];
			$_SESSION['codigo'] = $dadosDeonca[0]['codigo'];
			$_SESSION['idcid'] = $dadosDeonca[0]['idcid'];

			//header("Location: /saude-atualiza/".$idpess."/".$nomepess."");
			//exit;
		}
    }else{
		$_SESSION['doenca'] =  '';
		$_SESSION['codigo'] = '';
		$_SESSION['idcid'] = '';
	}

    /*
	if (!isset($_POST['doenca']) || $_POST['doenca'] == '' || $_POST['doenca'] == 'undefined'){

		Saude::setError("Informe a descrição do CID.");
		header("Location: /saude-atualiza/".$_POST['idpess']."/".$_POST['nomepess']."");
		exit;
	}	
	*/

	$saude->setData([
		'idpess'=>$_POST['idpess'],
		'idcid'=>$_SESSION['idcid'],
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
	    echo "<script>window.location.href = '/user/pessoas'</script>";
		//header('Location: /user/pessoas');
		exit;	
});

$app->get("/user/saude/pessoa/:idpess", function($idpess) {

	User::verifyLogin(false);

	$pessoa = new Pessoa();	

	if( $pessoa->getidpess() != $idpess){

		Pessoa::setErrorRegister("Pessoa não encontrado!!!");
		echo "<script>window.location.href = '/user/pessoas'</script>";
		//header("Location: /user/pessoas");
		exit();			
	}
	
	$page = new Page();

	$page->setTpl("saude-update", array(
		"pessoa"=>$pessoa->getValues(),
		"error"=>Pessoa::getErrorRegister()
	));
});

$app->get("/par-q/:idpess", function($idpess) {

	User::verifyLogin(false);

	$pessoa = new Pessoa();	

	$pessoa->get((int)$idpess);
	
	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("par-q", array(
		"pessoa"=>$pessoa->getValues(),
		"msgError"=>Cart::getMsgError()
	));
});

$app->post("/par-q/enviar", function() {

	User::verifyLogin(false);

	$saude = new Saude();

	$nomepess = $_POST['nomepess'];

	$idpess = $_POST['idpess'];
	$questaoum = $_POST['C1'];
	$questaodois = $_POST['C2'];
	$questaotres = $_POST['C3'];
	$questaoquatro = $_POST['C4'];
	$questaocinco = $_POST['C5'];
	$questaoseis = $_POST['C6'];
	$questaosete = $_POST['C7'];
	$dtcreateparq = date('Y-m-d');

	$saude->setData([
		'idpess'=>$idpess,
		'questaoum'=>$questaoum,
		'questaodois'=>$questaodois,
		'questaotres'=>$questaotres,
		'questaoquatro'=>$questaoquatro,
		'questaocinco'=>$questaocinco,
		'questaoseis'=>$questaoseis,
		'questaosete'=>$questaosete	
	]);	

	$saude->saveparq();
	
	echo "<script>alert('Questionário respondido com sucesso!!');";
    echo "javascript:history.go(-2)</script>";	

	//header("Location: /saude-atualiza/".$idpess."/".$nomepess."");
			//exit();			
	
});

$app->get("/par-q/pessoa/:idpess", function($idpess) {

	User::verifyLogin(false);

	$saude = new Saude();
	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);

	$saude->getParqUltimoByIdPess($idpess);

	/*
	echo '<pre>';
	print_r($saude);
	echo '</pre>';
	exit;
	*/
	
	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("par-q-pessoa", array(
		"pessoa"=>$pessoa->getValues(),
		"saude"=>$saude->getValues()
	));
});

$app->get("/atestado-upload", function() {

	User::verifyLogin(false);

	$user = User::getFromSession();	
	
	$page = new Page();

	$page->setTpl("atestado-upload", [		
		'pessoa'=>$user->getPessoa()	
	]);
});

$app->get("/saude/atulizaatestadoderma/:idpess/:data/:arquivotipo/:arquivoname/:arquivosize", function($idpess, $data, $arquivotipo, $arquivoname, $arquivosize) {

	User::verifyLogin(false);
	
	$pessoa = new Pessoa();

	$saude = new Saude();

	$iduser = $_SESSION['User']['iduser'];

	$data = strtotime($data);

	$maisUmAno = $data + (365 * 24 * 60 * 60);

	$validade = $maisUmAno;

	$data = date('Y-m-d', $data);

	$validade = date('Y-m-d', $validade);
	
	$cpf = $pessoa->getNumcpfByIdpess($idpess);

	//$saude->saveatestadoderma();

	echo 'Atestado Dermatológico atualizado com sucesso!!!';
	
});

$app->post("/saude/atulizaatestadoarquivopdf", function() {

	User::verifyLogin(false);		

	$pessoa = new Pessoa();

	$saude = new Saude();


	if(!isset($_POST['idpess']) || $_POST['idpess'] <= 0){	
		echo "<script>alert('Você precisa selecionar uma pessoa!');";
		echo "javascript:history.go(-1)</script>";
		exit();		
	}	

	if(!isset($_POST['tipoatestado']) || $_POST['tipoatestado'] == ''){	
		echo "<script>alert('Você precisa selecionar um tipo de atestado (Clínico ou Dermatológico)!');";
		echo "javascript:history.go(-1)</script>";
		exit();		
	}	

	$tipoatestadoselecionado = $_POST['tipoatestado'];

	$idpess = $_POST['idpess'];

	$pessoa->get($idpess);

	$arquivo = $_FILES;	

	if($arquivo['arquivo']['size'] == '') {
		echo "<script>alert('Nenhum arquivo selecionado! Selecione um arquivo tipo PDF !!');";
    	echo "javascript:history.go(-1)</script>";
    	exit();
	}

	if($arquivo['arquivo']['type'] != 'application/pdf'){
		echo "<script>alert('O arquivo selecionado não tem o formato PDF. Selecione um arquivo com terminação ( .pdf ) !!');";
    	echo "javascript:history.go(-1)</script>";
    	exit();
	}

	$renomear_arquivo = date('Ymd').$idpess.'-'.md5(time()).'.pdf';

	$caminho_upload = 'res/site/atestadoderma/';
	
	if(move_uploaded_file($arquivo['arquivo']['tmp_name'], $caminho_upload . $renomear_arquivo)){

    	$nomearquivopdf = $renomear_arquivo;
    	
    	$cpf = $pessoa->getNumcpfByIdpess($idpess);
    
    	if($tipoatestadoselecionado == 'clinico'){ $tipoatestado = 1; }
    	if($tipoatestadoselecionado == 'dermatologico'){ $tipoatestado = 2; }     
    
    	$saude->setData([
    		'idpess'=>$idpess,
    		'cpf'=>$cpf,
    		'tipoatestado'=>$tipoatestado,
    		'nomearquivo'=>$nomearquivopdf
    	]);

    	$caminho_remover = 'res/site/atestadoderma/';

    	$nomeArquivoRemover = $saude->getArquivoPdfAnteriorByCpf($cpf, $tipoatestado); 

    	if(!isset($nomeArquivoRemover[0]['nomearquivo']) ||  $nomeArquivoRemover[0]['nomearquivo'] == 0){

    		$nomeArquivoRemover = '';

    	}else{  		
    		
    		$nomeArquivoRemover = $nomeArquivoRemover[0]['nomearquivo'];
    		$caminhoArquivoRemover = $caminho_remover . $nomeArquivoRemover; 

    		$idatestadoarquivo = $saude->selectIdByNomeArquivo($nomeArquivoRemover);
    		
    		if(!isset($idatestadoarquivo[0]['idatestadoarquivo']) ||  $idatestadoarquivo[0]['idatestadoarquivo'] == 0){

    			$idatestadoarquivo = 0;
    		}else{
    			$idatestadoarquivo = $idatestadoarquivo[0]['idatestadoarquivo'];
    		}

    		unlink($caminhoArquivoRemover);
    		$saude->deleteArquivoPdfAnteriorById($idatestadoarquivo); 
    	}

    	$saude->atestadoarquivosave();   	    	

	    	if($tipoatestado == 1){	    	
	    		echo "<script>alert('Arquivo de atestado Clínico inserido com sucesso.');";
	        	echo "javascript:history.go(-1)</script>";
	    		exit();
	    	}    	
    
	    	if($tipoatestado == 2){	    		
	    		echo "<script>alert('Arquivo de atestado Dermatológico inserido com sucesso.');";
	    		echo "javascript:history.go(-1)</script>";
	        	exit();	    		    		
	    	}
    	
	}else{
		echo "<script>alert('Arquivo não foi inserido !!');";
    	echo "javascript:history.go(-1)</script>";
    	exit();
	}
	
});


?>