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

$app->get("/estagiario/calendarioagendabaetao/:idlocal", function($idlocal) {

	User::checkLoginEstagiario();

	$agenda = new Agenda();
	$local = new Local();

	$page = new PageProf();

	$page->setTpl("calendarioagendabaetao-estagiario", [
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

$app->get("/estagiario/calendarioagendapauliceia/:idlocal", function($idlocal) {

	User::checkLoginEstagiario();

	$agenda = new Agenda();
	$local = new Local();

	$page = new PageProf();

	$page->setTpl("calendarioagendapauliceia-estagiario", [
		'idlocal'=>$idlocal,
		'error'=>Agenda::getMsgError(),
	]);	
});

$app->get("/prof/listaagendapordata/:idlocal/:data/:iduser", function($idlocal, $data, $iduser) {

	User::checkLoginProf();

	$agenda = new Agenda();
	$local = new Local();
	$titulo = 'raia';

	$agenda = $agenda->getAgendaByLocalData($idlocal, $data, $titulo);

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
		'iduser'=>$iduser,
		'idlocal'=>$idlocal,
		'apelidolocal'=>$apelidolocal,
		'agenda'=>$agenda,
		'data'=>$data,
		'nomediadasemana'=>$nomediadasemana,
		'error'=>Agenda::getMsgError(),
	]);	
});

$app->get("/estagiario/listaagendapordata/:idlocal/:data/:iduser", function($idlocal, $data, $iduser) {

	User::checkLoginEstagiario();

	$agenda = new Agenda();
	$local = new Local();
	$titulo = 'raia';

	$agenda = $agenda->getAgendaByLocalData($idlocal, $data, $titulo);

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

	$page->setTpl("listaagendapordata-estagiario", [
		'iduser'=>$iduser,
		'idlocal'=>$idlocal,
		'apelidolocal'=>$apelidolocal,
		'agenda'=>$agenda,
		'data'=>$data,
		'nomediadasemana'=>$nomediadasemana,
		'error'=>Agenda::getMsgError(),
	]);	
});

$app->get("/prof/agendamarcarpresenca/:idagen/:idlocal/:data", function($idagen, $idlocal, $data) {

	$agenda = new Agenda();

	$hoje = new DateTime();

	$hoje = date('Y-m-d');

	if($hoje != $data){
	    
	    echo "<script>alert('Você não pode confirmar presença para data que não seja a data de hoje!');";
		echo "javascript:history.go(-1)</script>";
		exit;
	}

	$agenda->marcarPresença($idagen);
	
	 echo "<script>alert('Presença confirmada com sucesso');";
		echo "javascript:history.go(-1)</script>";
		exit;
});

$app->get("/estagiario/agendamarcarpresenca/:idagen/:idlocal/:data", function($idagen, $idlocal, $data) {

	$agenda = new Agenda();

	$hoje = new DateTime();

	$hoje = date('Y-m-d');

	if($hoje != $data){
	    
	    echo "<script>alert('Você não pode confirmar presença para data que não seja a data de hoje!');";
		echo "javascript:history.go(-1)</script>";
		exit;
	}

	$agenda->marcarPresença($idagen);
	
	 echo "<script>alert('Presença confirmada com sucesso');";
		echo "javascript:history.go(-1)</script>";
		exit;
});

$app->get("/prof/calendarioagendabaetaoavaliacao/:idlocal", function($idlocal) {

	User::checkLoginProf();

	$agenda = new Agenda();
	$local = new Local();

	$page = new PageProf();

	$page->setTpl("calendarioagendabaetaoavaliacao", [
		'idlocal'=>$idlocal,
		'error'=>Agenda::getMsgError(),
	]);	
});

$app->get("/prof/avaliacaolistaagendapordata/:idlocal/:data", function($idlocal, $data) {

	User::checkLoginProf();
	
	$agenda = new Agenda();
	$local = new Local();
	$titulo = 'raia';

	$agenda = $agenda->getAgendaByLocalData($idlocal, $data, $titulo);

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

	$page->setTpl("avaliacaolistaagendapordata", [
		'idlocal'=>$idlocal,
		'apelidolocal'=>$apelidolocal,
		'agenda'=>$agenda,
		'data'=>$data,
		'nomediadasemana'=>$nomediadasemana,
		'error'=>Agenda::getMsgError(),
	]);	
});






?>