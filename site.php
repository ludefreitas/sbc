<?php

use \Sbc\Page;
use \Sbc\Model\Turma;
use \Sbc\Model\Espaco;
use \Sbc\Model\Horario;



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


?>