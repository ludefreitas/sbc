<?php

use \Sbc\Page;
use \Sbc\Model\Agenda;
use \Sbc\Model\User;
use \Sbc\Model\Local;
use \Sbc\Model\Pessoa;


$app->get("/calendariobaetao/:idlocal", function($idlocal) {

	User::verifyLogin(false);

	$agenda = new Agenda();
	$local = new Local();

	//Agenda::updateFile();

	$eventos = Agenda::listAll();

	json_encode($eventos);

	$page = new Page();

	$page->setTpl("calendariobaetao", [
		'eventos'=>$eventos,
		'idlocal'=>$idlocal,
		'error'=>Agenda::getMsgError(),
	]);	
});

$app->get("/calendariopauliceia/:idlocal", function($idlocal) {

	User::verifyLogin(false);

	$agenda = new Agenda();
	$local = new Local();

	//Agenda::updateFile();

	$eventos = Agenda::listAll();

	json_encode($eventos);

	$page = new Page();

	$page->setTpl("calendariopauliceia", [
		'eventos'=>$eventos,
		'idlocal'=>$idlocal,
		'error'=>Agenda::getMsgError(),
	]);	
});

$app->get("/locaisnatacao", function() {

	User::verifyLogin(false);

	$locais = Local::listAllCrecAtivo();

	$page = new Page();

	$page->setTpl("locaisnatacao", [
		'locais'=>$locais
	]);	
});

$app->get("/agenda/:idlocal/:data", function($idlocal, $data) {

	User::verifyLogin(false);

	$local = new Local();
	$user = User::getFromSession();
	$agenda = new Agenda();
	$local = new Local();

	//$datamenor = $data - date('YYYY-MM-DD');

	$datalimite = date('Y-m-d l', strtotime('+4 week'));
	$dataatual = date('Y-m-d');
	$data = date('Y-m-d l', strtotime($data));

	$nameweekday = date('l', strtotime($data));

	if($nameweekday == 'Friday'){

		$nomediadasemana = 'Sexta-feira';
	}

	if($nameweekday == 'Saturday'){

		$nomediadasemana = 'Sábado';
	}

	$dataformatada = date('d/m/Y', strtotime($data));

	//var_dump($dataformatada.' - '.$nomediadasemana);
	//exit();



	if($idlocal == 21){
		if($dataatual > $data){

		Agenda::setMsgError("Data escolhida não pode ser anterior ao dia de hoje! ");
		header("Location: /calendariopauliceia/21");
		exit();
		}

		if($data > $datalimite){

		Agenda::setMsgError("Data escolhida não pode ser posterior a 30 dias! ");
		header("Location: /calendariopauliceia/21");
		exit();
		}
	}

	if($idlocal == 3){
		if($dataatual > $data){

		Agenda::setMsgError("Data escolhida não pode ser anterior ao dia de hoje! ");
		header("Location: /calendariobaetao/3");
		exit();
		}

		if($data > $datalimite){

		Agenda::setMsgError("Data escolhida não pode ser posterior a 30 dias! ");
		header("Location: /calendariobaetao/3");
		exit();
		}
	}

	$local->get($idlocal);

	$idlocal = $local->getidlocal();

	$page = new Page();

	$page->setTpl("agenda", [		
		//'datalimite'=>$datalimite,
		'idlocal'=>$idlocal,
		'error'=>Agenda::getMsgError(),
		'pessoa'=>$user->getPessoa(),
	]);	
});

$app->post("/agendarhorario", function() {

	User::verifyLogin(false);

	$pessoa = new Pessoa();
	$agenda = new Agenda();
	$local = new Local();	

	if(!isset($_POST['idpess']) || $_POST['idpess'] <= 0){	
		Agenda::setMsgError("Selecione uma pessoa! ");
		header("Location: /agenda/".$_POST['idlocal']."");
		exit();
	}

	$hoje = Date('Y-m-d');

	if($_POST['dataagenda'] < $hoje){	
		Agenda::setMsgError("Data não pode ser anterior ao dia de hoje! ");
		header("Location: /agenda/".$_POST['idlocal']."");
		exit();
	}

	if(!isset($_POST['dataagenda']) || $_POST['dataagenda'] <= 0){	
		Agenda::setMsgError("Selecione uma data! ");
		header("Location: /agenda/".$_POST['idlocal']."");
		exit();
	}

	$idlocal = (int)$_POST['idlocal'];
	$dataPost = $_POST['dataagenda'];
	$idpess = (int)$_POST['idpess'];
	$ispresente = (int)$_POST['ispresente'];

	$pessoa->get($idpess);

	$dtnasc = $pessoa->getdtnasc();

	$anoNasc = date('Y', strtotime($dtnasc));
	$anoAtual = date('Y');

	$anoDiferença = (int)$anoAtual - (int)$anoNasc;

	if($anoDiferença < 18 ){
		Agenda::setMsgError("O agendamento para a natação espontânea só e permitido para maiores de 18 anos");
		header("Location: /agenda/".$_POST['idlocal']."");
		exit;
	}

	$diasemana = date('w', strtotime($dataPost));
	$maisumasemana = date('Y-m-d', strtotime('+1 week'));

	if($diasemana == 0){
		$nomediasemana = "Domingo";
	}
	if($diasemana == 1){
		$nomediasemana = "Segunda-feira";
	}
	if($diasemana == 2){
		$nomediasemana = "Terça-feira";
	}
	if($diasemana == 3){
		$nomediasemana = "Quarta-feira";
	}
	if($diasemana == 4){
		$nomediasemana = "Quinta-feira";
	}
	if($diasemana == 5){
		$nomediasemana = "Sexta-feira";
	}
	if($diasemana == 6){
		$nomediasemana = "Sábado";
	}

	$nomepess = $pessoa->getnomepess();
	

	if($dataPost > $maisumasemana){

		Agenda::setMsgError("A agenda para este dia ainda não foi aberta");
		header("Location: /agenda/".$_POST['idlocal']."");
		exit;

	}
	
	# var_dump($dataPost." -Dia Semana ".$nomediasemana." -DT limite ".$maisumasemana." -Diferença ".$anoDiferença." -nome ".$nomepess." -DT ".$dtnasc." - Local ".$idlocal." -Presente ".$ispresente);

	$hora = "07:00:00";	
	$hora700quant = Agenda::temHorario($hora, $dataPost);	
	$raias = 6;
	$i700 = ($raias - $hora700quant['total']);	
	for($i=0; $i < $i700 ;$i++){
		$hora700 [$i] = array();
	}
	$hora = "07:30:00";	
	$hora730quant = Agenda::temHorario($hora, $dataPost);	
	$raias = 6;
	$i730 = ($raias - $hora730quant['total']);	
	for($i=0; $i < $i730 ;$i++){
		$hora730 [$i] = array();
	}
	$hora = "08:00:00";	
	$hora800quant = Agenda::temHorario($hora, $dataPost);	
	$raias = 6;
	$i800 = ($raias - $hora800quant['total']);	
	for($i=0; $i < $i800 ;$i++){
		$hora800 [$i] = array();
	}
	$hora = "08:30:00";	
	$hora830quant = Agenda::temHorario($hora, $dataPost);	
	$raias = 6;
	$i830 = ($raias - $hora830quant['total']);	
	for($i=0; $i < $i830 ;$i++){
		$hora830 [$i] = array();
	}
	$hora = "09:00:00";	
	$hora900quant = Agenda::temHorario($hora, $dataPost);	
	$raias = 6;
	$i900 = ($raias - $hora900quant['total']);	
	for($i=0; $i < $i900 ;$i++){
		$hora900 [$i] = array();
	}
	$hora = "09:30:00";	
	$hora930quant = Agenda::temHorario($hora, $dataPost);	
	$raias = 6;
	$i930 = ($raias - $hora930quant['total']);	
	for($i=0; $i < $i930 ;$i++){
		$hora930 [$i] = array();
	}
	$hora = "10:00:00";	
	$hora1000quant = Agenda::temHorario($hora, $dataPost);	
	$raias = 6;
	$i1000 = ($raias - $hora1000quant['total']);	
	for($i=0; $i < $i1000 ;$i++){
		$hora1000 [$i] = array();
	}
	$hora = "10:30:00";	
	$hora1030quant = Agenda::temHorario($hora, $dataPost);	
	$raias = 6;
	$i1030 = ($raias - $hora1030quant['total']);	
	for($i=0; $i < $i1030 ;$i++){
		$hora1030 [$i] = array();
	}

	$page = new Page();
	
	$page->setTpl("hora-agenda", [		
		'dataPost'=>$dataPost,		
		'nomeDiaSemana'=>$nomediasemana,
		'idpess'=>$idpess,
		'nomepess'=>$nomepess,
		'ispresente'=>$ispresente,
		'idlocal'=>$idlocal,
		'hora700'=>$hora700,
		'hora730'=>$hora730,
		'hora800'=>$hora800,
		'hora830'=>$hora830,
		'hora900'=>$hora900,
		'hora930'=>$hora930,
		'hora1000'=>$hora1000,
		'hora1030'=>$hora1030,
		'error'=>Agenda::getMsgError()

	]);	
	
	


	
});





?>