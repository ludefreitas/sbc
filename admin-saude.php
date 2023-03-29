<?php

use \Sbc\PageAdmin;
use \Sbc\Model\Saude;
use \Sbc\Model\User;
use \Sbc\Model\Pessoa;

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

$app->get("/admin/saude/atulizaatestado/:idpess/:data/:observ", function($idpess, $data, $observ) {

	User::verifyLogin();

	$saude = new Saude();

	$iduser = $_SESSION['User']['iduser'];

	$data = strtotime($data);

	$maisUmAno = $data + (365 * 24 * 60 * 60);

	$validade = $maisUmAno;

	$data = date('Y-m-d', $data);

	$validade = date('Y-m-d', $validade);


	$saude->setData([
		'idpess'=>$idpess,
		'iduser'=>$iduser,
		'dataemissao'=>$data,
		'datavalidade'=>$validade,
		'observ'=>$observ
	]);

	$saude->saveatestado();

	echo 'Atestado atualizado com sucesso!!!';
	
});

$app->get("/admin/saude/dadosatestado/:idpess", function($idpess) {

	User::verifyLogin();

	$saude = new Saude();
	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);

	$nomepess = $pessoa->getnomepess();

	$saude->getAtestadoUltimoByIdPess($idpess);

	$validade = $saude->getdatavalidade();
	$observ = $saude->getobserv();

	$validade = new Date();

	$validade = $validade->format('d/m/Y');
	
	$dataatualizacao = $saude->getdataatualizacao();

	if($dataatualizacao == ''){
		
		$texto = 'Atestado de '.$nomepess.' não encontrado!!';

	}else{

		$texto = ''.$nomepess."\r\n".'Observação: '.$observ."\r\n".'Validade Atestado: '.$validade.'';		
	}
	echo  $texto;
	
});

?>