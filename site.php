<?php

use \Sbc\Page;
use \Sbc\Model\Turma;
use \Sbc\Model\Espaco;
use \Sbc\Model\Horario;
use \Sbc\Model\Local;




$app->get("/", function() {

	$page = new Page();

	//$turma = new Turma::listAll();

	$page->setTpl("index", [
		'turmas'=>Turma::checkList($turma)
	]);
});


$app->get("/espaco/:idespaco", function($idespaco) {

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$page = new Page();

	$page->setTpl("espaco", [
		'espaco'=>$espaco->getValues(),
		'horario'=>$espaco->getHorario()
	]);	

});

$app->get("/local/:idlocal", function($idlocal) {

	$local = new Local();

	$local->get((int)$idlocal);

	$page = new Page();

	$page->setTpl("local", [
		'local'=>$local->getValues(),
		'espaco'=>$local->getEspaco()
	]);	

});


?>