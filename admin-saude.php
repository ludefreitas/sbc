<?php

use \Sbc\PageAdmin;
use \Sbc\Model\Saude;
use \Sbc\Model\User;
use \Sbc\Model\Pessoa;

$app->get("/admin/par-q/pessoa/:idpess", function($idpess) {

	User::verifyLogin();

	$saude = new Saude();
	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);

	$saude->getParqUltimoByIdPess($idpess);
	
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("par-q-pessoa", array(
		"pessoa"=>$pessoa->getValues(),
		"saude"=>$saude->getValues()
	));
});

$app->get("/admin/cid", function() {

	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {
		$pagination = Saude::getPageSearchCid($search, $page);
	} else {
		$pagination = Saude::getPageCid($page);
	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{
		array_push($pages, [
			'href'=>'/admin/cid?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);
	}

	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("cid", array( // aqui temos um array com muitos arrays
		"cid"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>Saude::getError()
	));
});

$app->get("/admin/saude/atualizaatestado/:idpess/:data/:observ/:iduser", function($idpess, $data, $observ, $iduser) {
	
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

$app->get("/admin/saude/dadosatestado/:idpess", function($idpess) {

	//User::verifyLogin();

	$saude = new Saude();
	$user = new User();
	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);

	$nomepess = $pessoa->getnomepess();

	$saude->getAtestadoUltimoByIdPess($idpess);

	if($saude->getdataatualizacao() == NULL){
		$texto = 'Atestado Clínico de '.$nomepess.' não encontrado!!!'."\r\n".'';
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

			$texto = 'Atestado Clínico de '.$nomepess.' não encontrado!!'."\r\n".'';

		}else{
			 if($hoje > $validade){
			 	$validade = new DateTime($validade);
			 	$validade = $validade->format('d-m-Y');
	            $texto = ''.$nomepess."\r\n".'Observação: '.$observ."\r\n".'Validade Atestado Clínico: '.$validade.''."\r\n".' >>>  VENCIDO  <<< '."\r\n".'Atualizado por: '.$nome."\r\n".'';
	        }else{
	        	$validade = new DateTime($validade);
	        	$validade = $validade->format('Y-m-d');

	        	$data_validade_menos_2meses = date('Y-m-d', strtotime("-2 month", strtotime($validade))); 

	        	if ($hoje > $data_validade_menos_2meses) {
	        		$validade = new DateTime($validade);
	        		$validade = $validade->format('d-m-Y');
	        		$texto = ''.$nomepess."\r\n".'Observação: '.$observ."\r\n".'Atestado CLÍNICO está prestes a VENCER! '."\r\n".'Validade Atestado Clínico: '.$validade.''."\r\n".'Atualizado por: '.$nome."\r\n".'';
	        		
	        	}else{
	        		$validade = new DateTime($validade);
	        		$validade = $validade->format('d-m-Y');
	        		$texto = ''.$nomepess."\r\n".'Observação: '.$observ."\r\n".'Validade Atestado Clínico: '.$validade.''."\r\n".'Atualizado por: '.$nome."\r\n".'';

	        	}

	            
	        } 		
		}
	}
	echo  $texto;
	
});

$app->get("/admin/saude/atualizaatestadoderma/:idpess/:data/:observ/:iduser", function($idpess, $data, $observ, $iduser) {
	
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

$app->get("/admin/saude/dadosatestadoderma/:idpess", function($idpess) {

	//User::verifyLogin();

	$saude = new Saude();
	$user = new User();
	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);

	$nomepess = $pessoa->getnomepess();

	$saude->getAtestadoDermaUltimoByIdPess($idpess);	
	
	if($saude->getdataatualizacao() == NULL){
		$texto = 'Atestado Dermatológico de '.$nomepess.' não encontrado!!!'."\r\n".'';
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

			$texto = 'Atestado Dermatológico de '.$nomepess.' não encontrado!!'."\r\n".'';

		}else{
			 if($hoje > $validade){
			 	$validade = new DateTime($validade);
			 	$validade = $validade->format('d/m/Y');
	            $texto = ''.$nomepess."\r\n".'Observação: '.$observ."\r\n".'Validade Atestado Dermatológico: '.$validade.''."\r\n".' >>>  VENCIDO  <<< '."\r\n".'Atualizado por: '.$nome."\r\n".'';
	        }else{

	        	$validade = new DateTime($validade);
	        	$validade = $validade->format('Y-m-d');

	        	$data_validade_menos_2meses = date('Y-m-d', strtotime("-2 month", strtotime($validade))); 

	        	if ($hoje > $data_validade_menos_2meses) {
	        		$validade = new DateTime($validade);
	        		$validade = $validade->format('d-m-Y');
	        		$texto = ''.$nomepess."\r\n".'Observação: '.$observ."\r\n".'Atestado DERMATOLÓGICO está prestes a VENCER! '."\r\n".'Validade Atestado Dermatológico: '.$validade.''."\r\n".'Atualizado por: '.$nome."\r\n".'';
	        		
	        	}else{
	        		$validade = new DateTime($validade);
	        		$validade = $validade->format('d-m-Y');
	        		$texto = ''.$nomepess."\r\n".'Observação: '.$observ."\r\n".'Validade Atestado Dermatológico: '.$validade.''."\r\n".'Atualizado por: '.$nome."\r\n".'';

	        	}
	        } 		
		}
	}

	echo  $texto;
	
});

?>