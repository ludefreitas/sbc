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

$app->get("/prof/saude/atulizaatestado/:idpess/:data/:observ", function($idpess, $data, $observ) {

	//User::verifyLoginProf();
	
	$pessoa = new Pessoa();

	$saude = new Saude();

	$iduser = $_SESSION['User']['iduser'];

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

	echo 'Atestado atualizado com sucesso!!!';
	
});

$app->get("/prof/saude/dadosatestado/:idpess", function($idpess) {

	//User::verifyLoginProf();

	$saude = new Saude();

	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);

	$nomepess = $pessoa->getnomepess();

	$saude->getAtestadoUltimoByIdPess($idpess);

	$validade = $saude->getdatavalidade();
	$validade = new DateTime($validade);
	$validade = $validade->format('d/m/Y');

	$observ = $saude->getobserv();
	
	$dataatualizacao = $saude->getdataatualizacao();

	if($dataatualizacao == ''){

		$texto = 'Atestado de '.$nomepess.' não encontrado!!'."\r\n".'';

	}else{

		$texto = ''.$nomepess."\r\n".'Observação: '.$observ."\r\n".'Validade Atestado: '.$validade.''."\r\n".'';
	}
	echo  $texto;
	
});

?>