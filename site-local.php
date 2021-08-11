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

		Cart::setMsgError("Não existe turmas para o Crec ".$local->getapelidolocal()." nesta temporada. Aguarde! ");
	}	
	
	$page = new Page();    

	$page->setTpl("local", [
		'turma'=>Turma::checkList($turma),
		'local'=>$local->getValues(),
		'error'=>Cart::getMsgError()
	]);
});

$app->get("/locais", function() {

	$locais = Local::listAll();


	if(!isset($locais) || $locais == NULL){

		Cart::setMsgError("Não existe Crecs Cadastrados para esta temporada. A temporada pode não estar iniciada, estar em processo de sorteio ou foi encerrada. Aguarde, ou entre em contato com o Centro Esportivo mais próximo a sua casa. ");
	}	

	$page = new Page();

	$page->setTpl("locais", array(
		'locais'=>$locais,
		'error'=>Cart::getMsgError()
	));
});



?>