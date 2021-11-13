<?php

use \Sbc\Page;
use \Sbc\Model\Turma;
use \Sbc\Model\Temporada;
use \Sbc\Model\Modalidade;
use \Sbc\Model\Cart;

$app->get("/modalidade/:idmodal", function($idmodal) {

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	$turma = Turma::listAllTurmaTemporadaModalidade($idmodal);

	if(!isset($turma) || $turma == NULL){

		Cart::setMsgError("Não existem turmas para a modalidade ".$modalidade->getdescmodal()." nesta temporada. Aguarde! ");
	}	

	$desctemporada  = isset($turma[0]['desctemporada']) ? $turma[0]['desctemporada'] : '';

	// Aqui verifica se a temporada é igual ao ano atual
	// Se não for acrescenta (1). Supondo que a inscrição está sendo feita no ano anterior
	if( (int)date('Y')  == (int)$desctemporada ){

		$anoAtual = (int)date('Y');	

	}else{

		$anoAtual = (int)date('Y') + 1;		
	}		
	
	$page = new Page();    

	$page->setTpl("modalidade", [
		'turma'=>Turma::checkList($turma),
		'anoAtual'=>$anoAtual,
		'modalidade'=>$modalidade->getValues(),
		'error'=>Cart::getMsgError()
	]);
});

$app->get("/modalidades", function() {

	$modalidades = Modalidade::listAll();

	if(!isset($modalidades) || $modalidades == NULL){

		Cart::setMsgError("Não existe modalidades para esta temporada. A temporada pode não estar iniciada, estar em processo de sorteio ou foi encerrada. Aguarde, ou entre em contato com o Centro Esportivo mais próximo a sua casa. ");
	}	

	$page = new Page();

	$page->setTpl("modalidades", array(
		'modalidades'=>$modalidades,
		'error'=>Cart::getMsgError()
	));
});

/*
$app->get("/modalidade/:idmodal", function($idmodal){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	//var_dump($modalidade);
	//exit();

	$pagination = $modalidade->getTurmaModalidadePage($page);	

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, 
		[
			'link'=>'/modalidade/'.$modalidade->getidmodal().'?page='.$i,
			'page'=>$i
		]);
	}
	$page = new Page();

	$page->setTpl("modalidade", [
		'modalidade'=>$modalidade->getValues(),
		'turma'=>$pagination["data"],
		'pages'=>$pages
	]);
});
*/

/*
$app->get("/modalidade/:idmodal", function($idmodal){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	$pagination = $modalidade->getTurmaPage($page);

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/modalidade/'.$modalidade->getidmodal().'?page='.$i,
			'page'=>$i
		]);
	}
	//var_dump($modalidades);
	//exit();
	$page = new Page();

	$page->setTpl("modalidade", [
		'modalidade'=>$modalidade->getValues(),
		'turma'=>$pagination["data"],
		'pages'=>$pages
	]);
});
*/



?>