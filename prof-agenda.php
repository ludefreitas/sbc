<?php

use \Sbc\PageProf;
use \Sbc\Model\Agenda;
use \Sbc\Model\User;
use \Sbc\Model\Local;
use \Sbc\Model\Pessoa;

$app->get("/prof/calendarioagendabaetao/:idlocal", function($idlocal) {

	User::checkLoginProf();

	$agenda = new Agenda();
	$local = new Local();

	$page = new PageProf();

	$page->setTpl("calendarioagendabaetao", [
		'idlocal'=>$idlocal,
		'error'=>Agenda::getMsgError(),
	]);	
});

$app->get("/prof/calendarioagendapauliceia/:idlocal", function($idlocal) {

	User::checkLoginProf();

	$agenda = new Agenda();
	$local = new Local();

	$page = new PageProf();

	$page->setTpl("calendarioagendapauliceia", [
		'idlocal'=>$idlocal,
		'error'=>Agenda::getMsgError(),
	]);	
});

$app->get("/prof/listaagendapordata/:idlocal/:data", function($idlocal, $data) {

	User::checkLoginProf();

	$agenda = new Agenda();
	$local = new Local();

	$agenda = $agenda->getAgendaByLocalData($idlocal, $data);

	$local->get((int)$idlocal);

	$apelidolocal = $local->getapelidolocal();

	$page = new PageProf([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("listaagendapordata", [
		'idlocal'=>$idlocal,
		'apelidolocal'=>$apelidolocal,
		'agenda'=>$agenda,
		'data'=>$data,
		'error'=>Agenda::getMsgError(),
	]);	
});



?>