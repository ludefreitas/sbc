<?php

use \Sbc\Page;
use \Sbc\Model\Agenda;
use \Sbc\Model\User;
use \Sbc\Model\Local;
use \Sbc\Model\Pessoa;

$app->get("/calendariobaetao/:idlocal", function($idlocal) {

	//User::verifyLogin(false);

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

	//User::verifyLogin(false);

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

	//User::verifyLogin(false);

	$locais = Local::listAllCrecAtivo();

	$page = new Page();

	$page->setTpl("locaisnatacao", [
		'locais'=>$locais,
		'error'=>Agenda::getMsgError(),
	]);	
});

$app->get("/agenda/:idlocal/:data", function($idlocal, $data) {

	//User::verifyLogin(false);

	$local = new Local();
	$user = User::getFromSession();
	$agenda = new Agenda();
	$local = new Local();

	$datalimite = date('Y-m-d l', strtotime('+4 week'));
	$dataatual = date('Y-m-d');
	$data = date('Y-m-d l', strtotime($data));

	$nameweekday = date('l', strtotime($data));

	$dataSemSemana = date('Y-m-d', strtotime($data));

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

	$dataformatada = date('d/m/Y', strtotime($data));

	$horariosDiaSemana = $agenda->listAllHoraDiaSemanaLocal($idlocal, $nomediadasemana);

	/*
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
	*/

	$local->get($idlocal);

	$idlocal = $local->getidlocal();

	$page = new Page();

	$page->setTpl("agenda", [		
		//'datalimite'=>$datalimite,
		'idlocal'=>$idlocal,
		'nomediadasemana'=>$nomediadasemana,
		'dataformatada'=>$dataformatada,
		'data'=>$data,
		'dataSemSemana'=>$dataSemSemana,
		'horariosDiaSemana'=>$horariosDiaSemana,
		'error'=>Agenda::getMsgError(),
		'pessoa'=>$user->getPessoa(),
	]);	
});

$app->post("/hora-agenda", function() {

	User::verifyLogin(false);

	$pessoa = new Pessoa();
	$agenda = new Agenda();
	$local = new Local();	
	
	if(!isset($_POST['idpess']) || $_POST['idpess'] <= 0){	
		Agenda::setMsgError("Selecione uma pessoa! ");
		header("Location: /agenda/".$_POST['idlocal']."/".$_POST['dataSemSemana']."");
		exit();
	}	

	if(!isset($_POST['idhoradiasemana']) || $_POST['idhoradiasemana'] <= 0){	
		Agenda::setMsgError("Selecione um horário! ");
		header("Location: /agenda/".$_POST['idlocal']."/".$_POST['dataSemSemana']."");
		exit();
	}

	$hoje = Date('Y-m-d');

	if($_POST['data'] < $hoje){	
		Agenda::setMsgError("Data não pode ser anterior ao dia de hoje! ");
		header("Location: /agenda/".$_POST['idlocal']."/".$_POST['dataSemSemana']."");
		exit();
	}

	if(!isset($_POST['data']) || $_POST['data'] <= 0){	
		Agenda::setMsgError("Selecione uma data! ");
		header("Location: /agenda/".$_POST['idlocal']."/".$_POST['dataSemSemana']."");
		exit();
	}
	
	$idlocal = $_POST['idlocal'];

	$dataSemSemana = $_POST['dataSemSemana'];

	$idhoradiasemana = $_POST['idhoradiasemana'];

	$horarioinicial = $agenda->getHoraInicialDiaSemana($idhoradiasemana);
	$horariofinal = $agenda->getHoraFinalDiaSemana($idhoradiasemana);

	$horarioinicial = $horarioinicial[0]['horamarcadainicial'];
	$horariofinal = $horariofinal[0]['horamarcadafinal'];

	$horarioinicialdate = date('H:i', strtotime($horarioinicial));
	$horariofinaldate = date('H:i', strtotime($horariofinal));

	$numvagashoradiasemana = $agenda->getNumeroDeVagas($idhoradiasemana);

	$numvagashoradiasemana = $numvagashoradiasemana[0]['vagas'];

	$qtdagendamentopordata = $agenda->contaQtdAgendamPorDataEIdHora($dataSemSemana, $idlocal, $idhoradiasemana);

	$qtdagendamentopordata = $qtdagendamentopordata[0]['count(*)'];	
	
	if($qtdagendamentopordata >= $numvagashoradiasemana){

		Agenda::setMsgError("Não há mais vagas para este horário! Escolha outro ");
		header("Location: /agenda/".$_POST['idlocal']."/".$_POST['dataSemSemana']."");
		exit();
	}

	$idlocal = (int)$_POST['idlocal'];
	$dataPost = $_POST['data'];
	$idpess = (int)$_POST['idpess'];
	$ispresente = (int)$_POST['ispresente'];

	$pessoa->get($idpess);

	$dtnasc = $pessoa->getdtnasc();
	$nomepess = $pessoa->getnomepess();

	$anoNasc = date('Y', strtotime($dtnasc));
	$anoAtual = date('Y');

	$anoDiferença = (int)$anoAtual - (int)$anoNasc;	

	if($anoDiferença < 18 ){
		Agenda::setMsgError("O agendamento para a natação espontânea só e permitido para maiores de 18 anos");
		header("Location: /agenda/".$_POST['idlocal']."/".$_POST['dataSemSemana']."");
		exit;
	}

	$qtdAgendamento = Agenda::countAgendaPorPessoaLocalDia($idpess, $idlocal, $dataSemSemana);

	if((int)$qtdAgendamento[0]['count(*)'] >= 2){

		Agenda::setMsgError($nomepess." já tem agendamento completo com 02 horários reservados para esta data");
		header("Location: /agenda/".$_POST['idlocal']."/".$_POST['dataSemSemana']."");
		exit();	

	}else{

		$horaExistenteinicial = $agenda->getHoraExistenteInicial($idpess, $idlocal, $dataSemSemana);
		$horaExistentefinal = $agenda->getHoraExistenteFinal($idpess, $idlocal, $dataSemSemana);	

		if($horaExistenteinicial && $horaExistentefinal){
		
			$diaexistentehorainicialstrtotime = strtotime($horaExistenteinicial[0]['dia']);					
			$diaexistentehorafinalstrtotime = strtotime($horaExistentefinal[0]['dia']);

			$horarioexistenteinicialstrtotime = strtotime($horaExistenteinicial[0]['horainicial']);
			$horarioexistentefinalstrtotime = strtotime($horaExistentefinal[0]['horafinal']);	

			$dataexistenteinicialcompleta = $horaExistenteinicial[0]['dia'].' '.$horaExistenteinicial[0]['horainicial'];
			$dataexistentefinalcompleta = $horaExistentefinal[0]['dia'].' '.$horaExistentefinal[0]['horafinal'];

			$dataexistenteinicialcompletastrtotime = strtotime($dataexistenteinicialcompleta);
			$dataexistentefinalcompletastrtotime = strtotime($dataexistentefinalcompleta);

			// aqui verifica se o agendamento existente tem menos mais de 30 minutos
			// se tiver avisa que játem agenda se não possibilita o novo agendamento de 30 minutos
			$diferencaHoraexistenteinicialHorafinal = $horarioexistentefinalstrtotime - $horarioexistenteinicialstrtotime;
			
			if($diferencaHoraexistenteinicialHorafinal > 1800){

				if($agenda->getAgendaPorPessoaLocalDia($idpess, $idlocal, $dataSemSemana)){
					Agenda::setMsgError($nomepess." já tem horário reservado para esta data");
					header("Location: /agenda/".$_POST['idlocal']."/".$_POST['dataSemSemana']."");
					exit();
				}
			}

			if($horaExistenteinicial[0]['horainicial'] == $horarioinicialdate){

				$horaExistenteinicial = $agenda->getHoraExistenteInicial($idpess, $idlocal, $dataSemSemana);
				$horaExistentefinal = $agenda->getHoraExistenteFinal($idpess, $idlocal, $dataSemSemana);

				Agenda::setMsgError($nomepess." já tem o horário ".$horaExistenteinicial[0]['horainicial']." às ".$horaExistentefinal[0]['horafinal']."  reservado para esta data, selecione outro");
				header("Location: /agenda/".$_POST['idlocal']."/".$_POST['dataSemSemana']."");
				exit();
			}	

			$horarioinicialstrtotime = strtotime($horarioinicialdate);
			$horaExistenteinicialstrtotime = strtotime($horaExistenteinicial[0]['horainicial']);

			$trintaminutosantesstrtotime = $horaExistenteinicialstrtotime - 1800;
			$trintaminutosdepoisstrtotime = $horaExistenteinicialstrtotime + 1800;
			
			$trintaminutosantes = date('H:i', $trintaminutosantesstrtotime);
			$trintaminutosdepois = date('H:i', $trintaminutosdepoisstrtotime);

			$diferencaHoraExistenteInicialHoraSolicitadaInicial = $horarioinicialstrtotime - $horaExistenteinicialstrtotime;

			//var_dump($diferencaHoraExistenteInicialHoraSolicitadaInicial.' = '.$horarioinicialstrtotime.' - '.$horaExistenteinicialstrtotime);
			//exit();

			if(($diferencaHoraExistenteInicialHoraSolicitadaInicial != -1800) && ($diferencaHoraExistenteInicialHoraSolicitadaInicial != 1800)){

				Agenda::setMsgError('Você já tem um horário agendado iniciando às '.$horaExistenteinicial[0]['horainicial'].'. Agora você só pode agendar, para esta data, um outro horário iniciando às '.$trintaminutosantes.' ou às '.$trintaminutosdepois.', se o horário existir e estiver disponível!' );
				header("Location: /agenda/".$_POST['idlocal']."/".$_POST['dataSemSemana']."");
				exit();	
			}
		}
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
		header("Location: /agenda/".$_POST['idlocal']."/".$_POST['dataSemSemana']."");
		exit;

	}

	$hojeDiaHoraMaisDuas = date('H:i', strtotime('+2 hours'));
	$hojeDiaHoraAtual = date('H:i');
	
	$dataPostSemSemana = Date('Y-m-d', strtotime($dataPost));	
	
	if(($dataPostSemSemana == $hoje) && (($hojeDiaHoraMaisDuas >= $horarioinicialdate) || ($hojeDiaHoraAtual > $horarioinicialdate))){

	//if(($dataPostSemSemana == $hoje) && ($hojeDiaHoraMaisDuas >= $horarioinicial)){
	
	//if( ($hojeDiaHoraMaisDuas >= $horarioinicial) || ($hojeDiaHoraAtual > $horarioinicial) ){

		Agenda::setMsgError("A agenda para o horário das ".$horarioinicialdate." às ".$horariofinaldate." já foi fechada!");
		header("Location: /agenda/".$_POST['idlocal']."/".$_POST['dataSemSemana']."");
		exit;

	}

    //var_dump($dataPost." - Dia Semana ".$nomediasemana." - DT limite ".$maisumasemana." - Diferença ".$anoDiferença." - nome ".$nomepess." - DT ".$dtnasc." - Local ".$idlocal." - Presente ".$ispresente." - Horainicial ".$horarioinicial." - Horafinal ".$horariofinal." - idhoradiasemana ".$idhoradiasemana);

   //exit;
	

	$page = new Page();
	
	$page->setTpl("hora-agenda", [
		'dataSemSemana'=>$dataSemSemana,		
		'dataPost'=>$dataPost,		
		'idhoradiasemana'=>$idhoradiasemana,
		'nomeDiaSemana'=>$nomediasemana,
		'idpess'=>$idpess,
		'nomepess'=>$nomepess,
		'ispresente'=>$ispresente,
		'idlocal'=>$idlocal,
		'horarioinicial'=>$horarioinicial,
		'horariofinal'=>$horariofinal,
		'error'=>Agenda::getMsgError()
	]);		
});


$app->post("/horaagendada", function() {

	User::verifyLogin(false);

	$agenda = new Agenda();
	$idlocal = $_POST['idlocal'];
	$idpess = $_POST['idpess'];
	$idhoradiasemana = $_POST['idhoradiasemana'];
	$titulo = 'raia';
	$dia = $_POST['dataSemSemana'];
	$horainicial = $_POST['horarioinicial'];
	$horafinal = $_POST['horariofinal'];
	$observacao = 'natação';
	$ispresente = $_POST['ispresente'];

	$agenda->setData([
			'idlocal'=>$idlocal,
			'idpess'=>$idpess,
			'idhoradiasemana'=>$idhoradiasemana,
			'titulo'=>$titulo,
			'dia'=>$dia,
			'horainicial'=>$horainicial,
			'horafinal'=>$horafinal,
			'observacao'=>$observacao,
			'ispresente'=>$ispresente	
		]);

	//Criar Call no banco de dados



	$agenda->save();

	Agenda::setMsgSuccess("Agendamento para natação espontânea realizada com sucesso");
	header('Location: /minhaagenda');
	exit;

});

$app->get("/minhaagenda", function() {

	User::verifyLogin(false);

	$agenda = new Agenda();
	$user = User::getFromSession();	

	$iduser = $user->getiduser();

	$data = new DateTime();

	$data = date('Y-m-d');

	
	$agenda = $agenda->getAgendaByIduser($iduser);
	//$agenda = $agenda->getAgendaAll();

	//var_dump($data);
	//exit;

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("minhaagenda", [
		'agenda'=>$agenda,
		'data'=>$data,
		'error'=>Agenda::getMsgError(),
		'success'=>Agenda::getMsgSuccess()
	]);	
});

$app->get("/agendadelete/:idagen", function($idagen) {

	$agenda = new Agenda();


	$agenda->delete($idagen);

	Agenda::setMsgError("Exclusão efetuada com sucesso");
	header("Location: /minhaagenda");
	exit;
});


?>