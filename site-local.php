<?php

use \Sbc\Page;
use \Sbc\Model\Turma;
use \Sbc\Model\Local;

$app->get("/local/:idlocal", function($idlocal) {

	$local = new local();

	$local->get((int)$idlocal);

	$turma = Turma::listAllTurmaTemporadaLocal($idlocal);
	
	$page = new Page();    

	$page->setTpl("local", [
		'turma'=>Turma::checkList($turma),
		'local'=>$local->getValues()
	]);
});

$app->get("/locais", function() {

	$locais = Local::listAll();

	$page = new Page();

	$page->setTpl("locais", array(
		'locais'=>$locais
	));
});



?>