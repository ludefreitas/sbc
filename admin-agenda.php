<?php

use \Sbc\PageAdmin;
use \Sbc\Model\Agenda;
use \Sbc\Model\User;
use \Sbc\Model\Local;
use \Sbc\Model\Pessoa;

$app->get("/admin/calendarioagendabaetao/:idlocal", function($idlocal) {

	User::verifyLogin();

	$agenda = new Agenda();
	$local = new Local();

	$page = new PageAdmin();

	$page->setTpl("calendarioagendabaetao", [
		'idlocal'=>$idlocal,
		'error'=>Agenda::getMsgError(),
	]);	
});

$app->get("/admin/calendarioagendapauliceia/:idlocal", function($idlocal) {

	User::verifyLogin();

	$agenda = new Agenda();
	$local = new Local();

	$page = new PageAdmin();

	$page->setTpl("calendarioagendapauliceia", [
		'idlocal'=>$idlocal,
		'error'=>Agenda::getMsgError(),
	]);	
});

$app->get("/admin/calendarioagenda-avaliacao/:idlocal", function($idlocal) {

	User::verifyLogin();

	$agenda = new Agenda();
	$local = new Local();

	$page = new PageAdmin();

	$page->setTpl("calendarioagenda-avaliacao", [
		'idlocal'=>$idlocal,
		'error'=>Agenda::getMsgError()
	]);	
});

$app->get("/admin/listaagendapordata-avaliacao/:idlocal/:data", function($idlocal, $data) {

	//User::verifyLogin();

	$agenda = new Agenda();
	$local = new Local();

	$titulo = "avaliacao";

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

	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("listaagendapordata-avaliacao", [
		'idlocal'=>$idlocal,
		'apelidolocal'=>$apelidolocal,
		'agenda'=>$agenda,
		'data'=>$data,
		'nomediadasemana'=>$nomediadasemana,
		'error'=>Agenda::getMsgError()
	]);	
});

$app->get("/admin/agendamarcarpresenca-avaliacao/:idagen/:idlocal/:data", function($idagen, $idlocal, $data) {

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

$app->get("/admin/mensagem/agenda/create/:idlocal", function($idlocal) {

	User::verifyLogin();

	$agenda = new Agenda();

	$agenda = Agenda::selectAllAgendaMsgLocal($idlocal);	

	$hoje = date('Y-m-d');

	$page = new PageAdmin();

	$page->setTpl("agenda-mensagem-create", array(
		"idlocal"=>$idlocal,
		"todasMsgs"=>$agenda,
		"hoje"=>$hoje,
		"error"=>Agenda::getMsgError(),
		"success"=>Agenda::getMsgSuccess(),
		"createMsgAgendaValues"=>(
				isset($_SESSION['createMsgAgendaValues'])) 
				    ? $_SESSION['createMsgAgendaValues'] 
			        : ['descmsg'=>'', 'datainicial'=>'', 'datafinal'=>'', 'idlocal'=>'']
	));
});

$app->post("/admin/mensagem/agenda/create", function(){

	User::verifyLogin();

	$idlocal = $_POST['idlocal'];

	$_SESSION['createMsgAgendaValues'] = $_POST;

	if(!isset($_POST['descmsg']) || $_POST['descmsg'] == ''){	
		Agenda::setMsgError("Descreva uma mensagem do período em que não haverá natação espontânea!");
		echo "<script>window.location.href = '/admin/mensagem/agenda/create/".$idlocal."'</script>";
		//header("Location: /admin/mensagem/agenda/create/".$idlocal."");
		exit();
	}	

	if(!isset($_POST['datainicial']) || $_POST['datainicial'] == ''){	
		Agenda::setMsgError("Informe o início do período em que não haverá natação espontânea!");
		echo "<script>window.location.href = '/admin/mensagem/agenda/create/".$idlocal."'</script>";
		//header("Location: /admin/mensagem/agenda/create/".$idlocal."");
		exit();
	}

	if(!isset($_POST['datafinal']) || $_POST['datafinal'] == ''){	
		Agenda::setMsgError("Informe o final do período em que não haverá natação espontânea!");
		echo "<script>window.location.href = '/admin/mensagem/agenda/create/".$idlocal."'</script>";
		//header("Location: /admin/mensagem/agenda/create/".$idlocal."");
		exit();
	}	
	/*
	if(!isset($_POST['idlocal']) || $_POST['idlocal'] == ''){	
		Agenda::setMsgError("Selecione o local da natação espontânea! ");
		echo "<script>window.location.href = '/admin/mensagem/agenda/create/".$idlocal."'</script>";
		//header("Location: /admin/mensagem/agenda/create/".$idlocal."");
		exit();
	}
	*/	

	$idlocal = $_POST['idlocal'];
	$iduser = $_SESSION['User']['iduser'];
	$msgtexto = $_POST['descmsg'];
	$dtinitmsg = $_POST['datainicial'];
	$dtfimmsg = $_POST['datafinal'];
	$statusagendamsg = 1;
	

	$agenda = new Agenda();

	$agenda->setData([
			'idlocal'=>$idlocal,
			'iduser'=>$iduser,
			'msgtexto'=>$msgtexto,
			'dtinitmsg'=>$dtinitmsg,
			'dtfimmsg'=>$dtfimmsg,
			'statusagendamsg'=>$statusagendamsg
		]);


	$agenda->saveMesagemAgenda();

	$_SESSION['createMsgAgendaValues'] = NULL;

	echo "<script>alert('Período sem natação informado com sucesso!');";
	echo "javascript:history.go(-1)</script>";
	exit();

});

$app->get("/admin/mensagem/agenda/excluir/:idagendamsg", function($idagendamsg) {

	$agenda = new Agenda();

	$agenda->deleteAgendaMsg($idagendamsg);

	echo "Mensagem excluída com sucesso!";
	
});

$app->get("/admin/agenda/hora-dia-semana/:idlocal", function($idlocal) {

	User::verifyLogin();

	$local = new Local();
	$user = User::getFromSession();
	$agenda = new Agenda();

	
	$datalimite = date('Y-m-d l', strtotime('+4 week'));
	$dataatual = date('Y-m-d');

	$domingo = 'Domingo';
	$segunda = 'Segunda-feira';
	$terca = 'Terça-feira';
	$quarta = 'Quarta-feira';
	$quinta = 'Quinta-feira';
	$sexta = 'Sexta-feira';
	$sabado = 'Sábado';

	$horariosDiaSemanaDomingo = $agenda->selectAllHoradiaSemanaByLocalDiasemana($idlocal, $domingo);
	$horariosDiaSemanaSegunda = $agenda->selectAllHoradiaSemanaByLocalDiasemana($idlocal, $segunda);
	$horariosDiaSemanaTerca = $agenda->selectAllHoradiaSemanaByLocalDiasemana($idlocal, $terca);
	$horariosDiaSemanaQuarta = $agenda->selectAllHoradiaSemanaByLocalDiasemana($idlocal, $quarta);
	$horariosDiaSemanaQuinta = $agenda->selectAllHoradiaSemanaByLocalDiasemana($idlocal, $quinta);
	$horariosDiaSemanaSexta = $agenda->selectAllHoradiaSemanaByLocalDiasemana($idlocal, $sexta);
	$horariosDiaSemanaSabado = $agenda->selectAllHoradiaSemanaByLocalDiasemana($idlocal, $sabado);

	  
	$local->get($idlocal);

	$idlocal = $local->getidlocal();

	$page = new PageAdmin();

	$page->setTpl("agenda-hora-dia-semana", [		
		'idlocal'=>$idlocal,
		'horariosDiaSemanaDomingo'=>$horariosDiaSemanaDomingo,
		'horariosDiaSemanaSegunda'=>$horariosDiaSemanaSegunda,
		'horariosDiaSemanaTerca'=>$horariosDiaSemanaTerca,
		'horariosDiaSemanaQuarta'=>$horariosDiaSemanaQuarta,
		'horariosDiaSemanaQuinta'=>$horariosDiaSemanaQuinta,
		'horariosDiaSemanaSexta'=>$horariosDiaSemanaSexta,
		'horariosDiaSemanaSabado'=>$horariosDiaSemanaSabado,
		'error'=>Agenda::getMsgError(),
		'pessoa'=>$user->getPessoa(),
	]);	
});

$app->get("/admin/agenda/atulizavagas/:idhoradiasemana/:vagas", function($idhoradiasemana, $vagas){

	//User::verifyLogin();

	$agenda = new Agenda();

	$agenda->atualizaQtdVagasHorarioById($idhoradiasemana, $vagas);	

	if($vagas < 10){
		$vagas = '0'.$vagas;
	}

	$texto = 'Número de vagas atualizado para '.$vagas.' com sucesso! '."\r\n".' Se você já atualizou todos os horários necessários, clique no botão "Atualizar" para verificar as alterações';
	echo $texto;
	
	//echo '<script>javascript:history.go(-1)</script>';

});

$app->get("/admin/agenda/atulizastatushorariodisponivel/:idhoradiasemana", function($idhoradiasemana){

	//User::verifyLogin();

	$agenda = new Agenda();

	$statushora = 1;

	$agenda->atulizaStatusHorarioAgenga($idhoradiasemana, $statushora);	

	//echo '<script>javascript:history.go(-1)</script>';

});

$app->get("/admin/agenda/atulizastatushorarioindisponivel/:idhoradiasemana", function($idhoradiasemana){

	//User::verifyLogin();

	$agenda = new Agenda();

	$statushora = 0;

	$agenda->atulizaStatusHorarioAgenga($idhoradiasemana, $statushora);	

	//echo '<script>javascript:history.go(-1)</script>';

});

$app->get("/admin/agenda/horario-dia-semana/create/:idlocal", function($idlocal) {

	User::verifyLogin();

	$agenda = new Agenda();

	$page = new PageAdmin();

	$page->setTpl("agenda-horario-dia-semana-create", array(
		"idlocal"=>$idlocal,
		"error"=>Agenda::getMsgError(),
		"success"=>Agenda::getMsgSuccess(),
		"createHorarioSemanaValues"=>(
				isset($_SESSION['createHorarioSemanaValues'])) 
				    ? $_SESSION['createHorarioSemanaValues'] 
			        : ['diasemana'=>'', 'horainicial'=>'', 'horafinal'=>'', 'idlocal'=>'', 'vagas'=>'']
	));
});

$app->post("/admin/horario-dia-semana/create", function(){

	User::verifyLogin();
	
	$_SESSION['createHorarioSemanaValues'] = $_POST;

	$idlocal = $_POST['idlocal'];

	if(!isset($_POST['horainicial']) || $_POST['horainicial'] == ''){	
		Agenda::setMsgError("Informe o hora inicial da natação espontânea!");
		echo "<script>window.location.href = '/admin/agenda/horario-dia-semana/create/".$idlocal."'</script>";
		//header("Location: /admin/agenda/horario-dia-semana/create/".$idlocal."");
		exit();
	}	

	if(!isset($_POST['horafinal']) || $_POST['horafinal'] == ''){	
		Agenda::setMsgError("Informe o hora final da natação espontânea!");
		echo "<script>window.location.href = '/admin/agenda/horario-dia-semana/create/".$idlocal."'</script>";
		//header("Location: /admin/agenda/horario-dia-semana/create/".$idlocal."");
		exit();
	}

	if(!isset($_POST['vagas']) || $_POST['vagas'] == ''){	
		Agenda::setMsgError("Informe a quantidade de vagas do horário da natação espontânea!");
		echo "<script>window.location.href = '/admin/agenda/horario-dia-semana/create/".$idlocal."'</script>";
		//header("Location: /admin/agenda/horario-dia-semana/create/".$idlocal."");
		exit();
	}		

	if(!isset($_POST['diasemana']) || $_POST['diasemana'] == ''){	
		Agenda::setMsgError("Informe o dia da semana da natação espontânea!");
		echo "<script>window.location.href = '/admin/agenda/horario-dia-semana/create/".$idlocal."'</script>";
		//header("Location: /admin/agenda/horario-dia-semana/create/".$idlocal."");
		exit();
	}	

	if( $_POST['diasemana'] == 0 ){ $diasemana = 'Domingo'; }
	if( $_POST['diasemana'] == 1 ){ $diasemana = 'Segunda-feira'; }
	if( $_POST['diasemana'] == 2 ){ $diasemana = 'Terça-feira'; }
	if( $_POST['diasemana'] == 3 ){ $diasemana = 'Quarta-feira'; }
	if( $_POST['diasemana'] == 4 ){ $diasemana = 'Quinta-feira'; }
	if( $_POST['diasemana'] == 5 ){ $diasemana = 'Sexta-feira'; }
	if( $_POST['diasemana'] == 6 ){ $diasemana = 'Sábado'; }

	$idlocal = $_POST['idlocal'];
	//$iduser = $_SESSION['User']['iduser'];
	$horamarcadainicial = $_POST['horainicial'];
	$horamarcadainicial = $_POST['horainicial'];
	$horamarcadafinal = $_POST['horafinal'];
	$vagas = $_POST['vagas'];
	$statushora = 0;
	
	$agenda = new Agenda();

	$agenda->setData([
			'idlocal'=>$idlocal,
			//'iduser'=>$iduser,
			'diasemana'=>$diasemana,
			'horamarcadainicial'=>$horamarcadainicial,
			'horamarcadafinal'=>$horamarcadafinal,
			'vagas'=>$vagas,
			'statushora'=>$statushora
		]);

	$agenda->saveHorarioSemana();

	$_SESSION['createHorarioSemanaValues'] = NULL;

	echo "<script>alert('Horário criado com com sucesso!');";
	echo "javascript:history.go(-1)</script>";
	exit();

});


?>
