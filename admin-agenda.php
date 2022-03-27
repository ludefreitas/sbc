<?php

use \Sbc\PageAdmin;
use \Sbc\Model\Agenda;
use \Sbc\Model\User;
use \Sbc\Model\Local;
use \Sbc\Model\Pessoa;

$app->get("/calendarioagendabaetao/:idlocal", function($idlocal) {

	User::verifyLogin();

	$agenda = new Agenda();
	$local = new Local();

	$page = new PageAdmin();

	$page->setTpl("calendarioagendabaetao", [
		'idlocal'=>$idlocal,
		'error'=>Agenda::getMsgError(),
	]);	
});

$app->get("/calendarioagendapauliceia/:idlocal", function($idlocal) {

	User::verifyLogin();

	$agenda = new Agenda();
	$local = new Local();

	$page = new PageAdmin();

	$page->setTpl("calendarioagendapauliceia", [
		'idlocal'=>$idlocal,
		'error'=>Agenda::getMsgError(),
	]);	
});



?>