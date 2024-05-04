<?php

use \Sbc\PageProf;
use \Sbc\Model\Saude;
use \Sbc\Model\User;
use \Sbc\Model\Pessoa;

$app->get("/prof/par-q/pessoa/:idpess", function($idpess) {

	User::verifyLoginProf();

	$saude = new Saude();
	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);

	$saude->getParqUltimoByIdPess($idpess);
	
	$page = new PageProf([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("par-q-pessoa", array(
		"pessoa"=>$pessoa->getValues(),
		"saude"=>$saude->getValues()
	));
});

$app->get("/prof/saude/atualizaatestadoform/:idpess", function($idpess) {

	//User::verifyLoginProf();
	
	$pessoa = new Pessoa();

	$saude = new Saude();

	$iduser = $_SESSION['User']['iduser'];
	
		$page = new PageProf([
		"header"=>false,
		"footer"=>false
	]);
	
	$page->setTpl("atualizaatestadoform", array(
		"idpess"=>$idpess
	));
	
});

$app->post("/prof/saude/atulizaatestado", function() {

	$user = User::getFromSession();

	//var_dump($user);
	//exit;

	if(!isset($_POST['idpess']) || $_POST['idpess'] == ''){
		echo "<script>alert('Selecione uma pessoa.');";
		echo "javascript:history.go(-1)</script>";
		exit();    
	}

	if(!isset($_POST['data']) || $_POST['data'] == ''){
		echo "<script>alert('Informe a data de emissão do atestado!');";
		echo "javascript:history.go(-1)</script>";
		exit();    
	}

	if(!isset($_POST['observ']) || $_POST['observ'] == ''){
		echo "<script>alert('Faça observação sobre o atestado!');";
		echo "javascript:history.go(-1)</script>";
		exit();    
	}

	if(!isset($_POST['iduser']) || $_POST['iduser'] == ''){
		echo "<script>alert('Para esta ação você deve estar logado');";
		echo "javascript:history.go(-1)</script>";
		exit();    
	}

	$idpess = $_POST['idpess'];
	$data = $_POST['data'];
	$observ = $_POST['observ'];
	$iduser = $_POST['iduser'];

	$pessoa = new Pessoa();

	$saude = new Saude();

	$data = strtotime($data);

	$maisUmAno = $data + (365 * 24 * 60 * 60);

	$validade = $maisUmAno;

	$data = date('Y-m-d', $data);

	$validade = date('Y-m-d', $validade);
	
	$cpf = $pessoa->getNumcpfByIdpess($idpess);

	$saude->setData([
		'idpess'=>$idpess,
		'iduser'=>$iduser,
		'cpf'=>$cpf,
		'dataemissao'=>$data,
		'datavalidade'=>$validade,
		'observ'=>$observ
	]);

	$saude->saveatestado();

	echo "<script>alert('Atestado Clínico atualizado com sucesso!!!');";
		echo "javascript:history.go(-2)</script>";
		exit();    
	
});

$app->get("/prof/saude/atualizaatestadodermaform/:idpess", function($idpess) {

	//User::verifyLoginProf();
	
	$pessoa = new Pessoa();

	$saude = new Saude();

	$iduser = $_SESSION['User']['iduser'];

	$page = new PageProf([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("atualizaatestadodermaform", array(
		"idpess"=>$idpess
	));
	
});

$app->post("/prof/saude/atulizaatestadoderma", function() {

	if(!isset($_POST['idpess']) || $_POST['idpess'] == ''){
		echo "<script>alert('Selecione uma pessoa.');";
		echo "javascript:history.go(-1)</script>";
		exit();    
	}

	if(!isset($_POST['dataderma']) || $_POST['dataderma'] == ''){
		echo "<script>alert('Informe a data de emissão do atestado!');";
		echo "javascript:history.go(-1)</script>";
		exit();    
	}

	if(!isset($_POST['observderma']) || $_POST['observderma'] == ''){
		echo "<script>alert('Faça observação sobre o atestado!');";
		echo "javascript:history.go(-1)</script>";
		exit();    
	}

	if(!isset($_POST['iduserderma']) || $_POST['iduserderma'] == ''){
		echo "<script>alert('Para esta ação você deve estar logado');";
		echo "javascript:history.go(-1)</script>";
		exit();    
	}

	$idpess = $_POST['idpess'];
	$data = $_POST['dataderma'];
	$observ = $_POST['observderma'];
	$iduser = $_POST['iduserderma'];
	
	$pessoa = new Pessoa();

	$saude = new Saude();

	$data = strtotime($data);

	$maisUmAno = $data + (365 * 24 * 60 * 60);

	$validade = $maisUmAno;

	$data = date('Y-m-d', $data);

	$validade = date('Y-m-d', $validade);
	
	$cpf = $pessoa->getNumcpfByIdpess($idpess);
	
	$saude->setData([
		'idpess'=>$idpess,
		'iduser'=>$iduser,
		'cpf'=>$cpf,
		'dataemissao'=>$data,
		'datavalidade'=>$validade,
		'observ'=>$observ
	]);

	$saude->savedermaatestado();

	echo "<script>alert('Atestado Dermatológico atualizado com sucesso!!!');";
		echo "javascript:history.go(-2)</script>";
		exit();    
	
});

$app->get("/prof/saude/atulizaatestado/:idpess/:data/:observ/:iduser", function($idpess, $data, $observ, $iduser) {
	
	$pessoa = new Pessoa();

	$saude = new Saude();

	$data = strtotime($data);

	$maisUmAno = $data + (365 * 24 * 60 * 60);

	$validade = $maisUmAno;

	$data = date('Y-m-d', $data);

	$validade = date('Y-m-d', $validade);
	
	$cpf = $pessoa->getNumcpfByIdpess($idpess);

	$saude->setData([
		'idpess'=>$idpess,
		'iduser'=>$iduser,
		'cpf'=>$cpf,
		'dataemissao'=>$data,
		'datavalidade'=>$validade,
		'observ'=>$observ
	]);

	$saude->saveatestado();

	echo 'Atestado Clínico atualizado com sucesso!!!';
	
});

$app->get("/prof/saude/dadosatestado/:idpess", function($idpess) {

	//User::verifyLoginProf();

	$saude = new Saude();
    $user = new User();
	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);

	$nomepess = $pessoa->getnomepess();

	$saude->getAtestadoUltimoByIdPess($idpess);
	
	if($saude->getdataatualizacao() == NULL){
		$texto = '+Atestado Clínico de '.$nomepess.' +Não encontrado!!!'."\r\n".'';
	}else{

    	$validade = $saude->getdatavalidade();
    	$validade = new DateTime($validade);
    	$validade = $validade->format('Y-m-d');
    	$hoje = date('Y-m-d');
    	
    	$iduser = $saude->getiduser();
    
    	$nome = $user->getUserNameById($iduser);
    
    	$nome = $nome[0]['desperson'];
    
    	$observ = $saude->getobserv();
    	
    	$dataatualizacao = $saude->getdataatualizacao();
    
    	if($dataatualizacao == ''){
    
    		$texto = '+Atestado clínico de '.$nomepess.' +Não encontrado!!'."\r\n".'';
    
    	}else{
    
    		if($hoje > $validade){
    		 	$validade = new DateTime($validade);
    		 	$validade = $validade->format('d/m/Y');
                $texto = ''.$nomepess."\r\n".'+Observação: '.$observ."\r\n".'++Val. Atest. Clínico: '.$validade.''."\r\n".'+>>> VENCIDO <<< '."\r\n".'+Atualizado por: '.$nome."\r\n".'';
            }else{
            	$validade = new DateTime($validade);
	        	$validade = $validade->format('Y-m-d');

	        	$data_validade_menos_2meses = date('Y-m-d', strtotime("-2 month", strtotime($validade))); 

	        	if ($hoje > $data_validade_menos_2meses) {
	        		$validade = new DateTime($validade);
	        		$validade = $validade->format('d-m-Y');
	        		$texto = ''.$nomepess."\r\n".'+Observação: '.$observ."\r\n".'+Atest. CLÍNICO está prestes a VENCER! '."\r\n".'+Val. Atest. Clínico: '.$validade.''."\r\n".'Atualizado por: '.$nome."\r\n".'';
	        		
	        	}else{
	        		$validade = new DateTime($validade);
	        		$validade = $validade->format('d-m-Y');
	        		$texto = ''.$nomepess."\r\n".'+Observação: '.$observ."\r\n".'+Val. Atest. Clínico: '.$validade.''."\r\n".'+Atualizado por: '.$nome."\r\n".'';

	        	}	            
            }
    	}
	}
	$texto = str_replace('+', '<br>', $texto);
	echo  $texto;
	
});

$app->get("/prof/saude/atulizaatestadoderma/:idpess/:data/:observ/:iduser", function($idpess, $data, $observ, $iduser) {
	
	$pessoa = new Pessoa();

	$saude = new Saude();

	$data = strtotime($data);

	$maisUmAno = $data + (365 * 24 * 60 * 60);

	$validade = $maisUmAno;

	$data = date('Y-m-d', $data);

	$validade = date('Y-m-d', $validade);
	
	$cpf = $pessoa->getNumcpfByIdpess($idpess);

	$saude->setData([
		'idpess'=>$idpess,
		'iduser'=>$iduser,
		'cpf'=>$cpf,
		'dataemissao'=>$data,
		'datavalidade'=>$validade,
		'observ'=>$observ
	]);

	$saude->savedermaatestado();

	echo 'Atestado Dermatológico atualizado com sucesso!!!';
	
});

$app->get("/prof/saude/dadosatestadoderma/:idpess", function($idpess) {

	//User::verifyLoginProf();

	$saude = new Saude();
	$user = new User();
	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);

	$nomepess = $pessoa->getnomepess();

	$saude->getAtestadoDermaUltimoByIdPess($idpess);	
	
	if($saude->getdataatualizacao() == NULL){
		$texto = '+Atestado Dermatológico de '.$nomepess.' +Não encontrado!!!'."\r\n".'';
	}else{

		$validade = $saude->getdatavalidade();
		$validade = new DateTime($validade);
		$validade = $validade->format('Y-m-d');
		$hoje = date('Y-m-d');

		$iduser = $saude->getiduser();

		$nome = $user->getUserNameById($iduser);

		$nome = $nome[0]['desperson'];

		$observ = $saude->getobserv();
		
		$dataatualizacao = $saude->getdataatualizacao();

		if($dataatualizacao == ''){

			$texto = '+Atestado Dermatológico de '.$nomepess.' +Não encontrado!!'."\r\n".'';

		}else{
			 if($hoje > $validade){
			 	$validade = new DateTime($validade);
			 	$validade = $validade->format('d/m/Y');
	            $texto = ''.$nomepess."\r\n".'+Observação: '.$observ."\r\n".'++Val. Atest. Dermatológico: '.$validade.''."\r\n".' +>>>  VENCIDO  <<< '."\r\n".'+Atualizado por: '.$nome."\r\n".'';
	        }else{
	        	$validade = new DateTime($validade);
	        	$validade = $validade->format('Y-m-d');

	        	$data_validade_menos_2meses = date('Y-m-d', strtotime("-2 month", strtotime($validade))); 

	        	if ($hoje > $data_validade_menos_2meses) {
	        		$validade = new DateTime($validade);
	        		$validade = $validade->format('d-m-Y');
	        		$texto = ''.$nomepess."\r\n".'+Observação: '.$observ."\r\n".'+Atest. DERMATOLÓGICO está prestes a VENCER! '."\r\n".'+Val. Atest. Dermatológico: '.$validade.''."\r\n".'Atualizado por: '.$nome."\r\n".'';
	        		
	        	}else{
	        		$validade = new DateTime($validade);
	        		$validade = $validade->format('d-m-Y');
	        		$texto = ''.$nomepess."\r\n".'+Observação: '.$observ."\r\n".'++Val. Atest. Dermatológico: '.$validade.''."\r\n".'+Atualizado por: '.$nome."\r\n".'';

	        	}
	        } 		
		}
	}
	$texto = str_replace('+', '<br>', $texto);
	echo  $texto;
	
});

?>