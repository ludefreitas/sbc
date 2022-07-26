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

	$nameweekday = date('l', strtotime($data));

	if($nameweekday == 'Sunday'){

		$nomediadasemana = 'Domingo';
	}

	if($nameweekday == 'Monday'){

		$nomediadasemana = 'Segunda-feira';
	}

	if($nameweekday == 'Tuesday'){

		$nomediadasemana = 'Terça-feira';
	}

	if($nameweekday == 'Wednesday'){

		$nomediadasemana = 'Quarta-feira';
	}

	if($nameweekday == 'Thursday'){

		$nomediadasemana = 'Quinta-feira';
	}

	if($nameweekday == 'Friday'){

		$nomediadasemana = 'Sexta-feira';
	}

	if($nameweekday == 'Saturday'){

		$nomediadasemana = 'Sábado';
	}

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
		'nomediadasemana'=>$nomediadasemana,
		'error'=>Agenda::getMsgError(),
	]);	
});

$app->get("/agendamarcarpresenca/:idagen/:idlocal/:data", function($idagen, $idlocal, $data) {

	$agenda = new Agenda();

	$hoje = new DateTime();

	$hoje = date('Y-m-d');

	if($hoje != $data){
		Agenda::setMsgError("Você não pode confirmar presença para dia posterior!");
		header("Location: /prof/listaagendapordata/".$idlocal."/".$data);
		exit;
	}

	$agenda->marcarPresença($idagen);

	Agenda::setMsgError("Presença confirmada com sucesso");
	header("Location: /prof/listaagendapordata/".$idlocal."/".$data);
	exit;
});



?>