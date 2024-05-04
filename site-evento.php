<?php

use \Sbc\Page;
use \Sbc\Model\Evento;

$app->get("/eventos", function() {

	$eventos = new Evento();

	$eventos = Evento::listAll();

	$page = new Page();

	$page->setTpl("eventos", [
		'eventos'=>$eventos,
		'error'=>Evento::getError()
		
	]);
});

$app->get("/evento/:id_evento", function($id_evento) {

	$vento = new Evento();

	$evento = Evento::eventoByIdEvento($id_evento);

	$page = new Page();

	$page->setTpl("evento", [
		'evento'=>$evento,
		'error'=>Evento::getError()
		
	]);
});


?>