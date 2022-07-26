<?php

use \Sbc\PageCursos;
use \Sbc\Model\Turma;
use \Sbc\Model\Temporada;
use \Sbc\Model\Modalidade;
use \Sbc\Model\Cart;
use \Sbc\Model\Local;

$app->get("/cursos/modalidade/:idmodal", function($idmodal) {

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
	
	$page = new PageCursos();    

	$page->setTpl("modalidade", [
		'turma'=>Turma::checkList($turma),
		'anoAtual'=>$anoAtual,
		'modalidade'=>$modalidade->getValues(),
		'error'=>Cart::getMsgError()
	]);
});

$app->get("/cursos/modalidades", function() {

	$modalidades = Modalidade::listAll();
	//$modalidades = Modalidade::listAllToLocal();

	if(!isset($modalidades) || $modalidades == NULL){

		Cart::setMsgError("Não existe modalidades para esta temporada. A temporada pode não estar iniciada, estar em processo de sorteio ou foi encerrada. Aguarde, ou entre em contato com o Centro Esportivo mais próximo a sua casa. ");
	}	

	$page = new PageCursos();

	$page->setTpl("/cursos/modalidades", array(
		'modalidades'=>$modalidades,
		'error'=>Cart::getMsgError()
	));
});

$app->get("/cursos/modalidade/:idmodal/:idlocal", function($idmodal, $idlocal) {

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	$turma = Turma::listAllTurmaTemporadaModalidadeLocal($idmodal, $idlocal);

	$local = new Local();


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
	
	$page = new PageCursos();    

	$page->setTpl("modalidade", [
		'turma'=>Turma::checkList($turma),
		'anoAtual'=>$anoAtual,
		'modalidade'=>$modalidade->getValues(),
		'error'=>Cart::getMsgError()
	]);
});

$app->get("/cursos/modalidades/local/:idlocal", function($idlocal) {

	$modalidades = Modalidade::listAllToLocal($idlocal);

	$local = new Local();

	$local->get((int)$idlocal);

	$apelidolocal = $local->getapelidolocal();	

	if(!isset($modalidades) || $modalidades == NULL){

		Cart::setMsgError("Não existe modalidades para esta temporada. A temporada pode não estar iniciada, estar em processo de sorteio ou foi encerrada. Aguarde, ou entre em contato com o Centro Esportivo mais próximo a sua casa. ");
	}	

	$page = new PageCursos();

	$page->setTpl("modalidades-por-local", array(
		'idlocal'=>$idlocal,
		'apelidolocal'=>$apelidolocal,
		'modalidades'=>$modalidades,
		'error'=>Cart::getMsgError()
	));
});

?>