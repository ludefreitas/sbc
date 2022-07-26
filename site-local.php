<?php

use \Sbc\Page;
use \Sbc\Model\Turma;
use \Sbc\Model\Local;
use \Sbc\Model\Cart;

$app->get("/local/:idlocal", function($idlocal) {

	$local = new local();

	$local->get((int)$idlocal);	

	$turma = Turma::listAllTurmaTemporadaLocal($idlocal);

	if(!isset($turma) || $turma == NULL){

		Cart::setMsgError("Não existem turmas para o Crec ".$local->getapelidolocal()." nesta temporada. Aguarde! ");
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

	$page->setTpl("local", [
		'turma'=>Turma::checkList($turma),
		'anoAtual'=>$anoAtual,
		'local'=>$local->getValues(),
		'error'=>Cart::getMsgError()
	]);
});

$app->get("/locais", function() {

	//$locais = Local::listAll();
	$locais = Local::listAllCrecAtivo();

	if(!isset($locais) || $locais == NULL){

		Cart::setMsgError("Não existe Crecs Cadastrados para esta temporada. A temporada pode n達o estar iniciada, estar em processo de sorteio ou foi encerrada. Aguarde, ou entre em contato com o Centro Esportivo mais pr坦ximo a sua casa. ");
	}	

	$page = new Page();

	$page->setTpl("locais", array(
		'locais'=>$locais,
		'error'=>Cart::getMsgError()
	));
});



?>