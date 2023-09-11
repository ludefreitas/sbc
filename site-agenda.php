<?php

use \Sbc\Page;
use \Sbc\Model\Agenda;
use \Sbc\Model\User;
use \Sbc\Model\Local;
use \Sbc\Model\Pessoa;
use \Sbc\Model\Saude;
use \Sbc\Model\Cart;

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

$app->get("/locaisnatacao-avaliacao", function() {

	//User::verifyLogin(false);

	$locais = Local::listAllCrecAtivo();

	$page = new Page();

	$page->setTpl("locaisnatacao-avaliacao", [
		'locais'=>$locais,
		'error'=>Agenda::getMsgError(),
	]);	
});

$app->get("/agenda/:idlocal/:data", function($idlocal, $data) {

	User::verifyLogin(false);

	$local = new Local();
	$user = User::getFromSession();
	$agenda = new Agenda();

	$todasMsgs = Agenda::selectAllAgendaMsgLocal($idlocal);

	for ($i = 0; $i < count($todasMsgs); $i++){
		
		$datainicial = $todasMsgs[$i]['dtinitmsg'];
		$datafinal = $todasMsgs[$i]['dtfimmsg'];
		$texto = $todasMsgs[$i]['msgtexto'];
		$idusermsg = $todasMsgs[$i]['iduser'];

		$usuario = User::getUserNameById($idusermsg);
		$usuario = $usuario[0]['desperson'];

		if($data >= $datainicial && $data <= $datafinal){

			if($_SESSION['User']['inadmin'] == 1){
				echo "<script>alert('Mensagem: ".$texto." - Criada por: ".$usuario."');";
				echo "javascript:history.go(-1)</script>";
				exit();
			}else{
				echo "<script>alert('".$texto."');";
				echo "javascript:history.go(-1)</script>";
				exit();
			}		
		}
	}

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

	//User::verifyLogin(false);

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
	
	$titulo = $_POST['titulo'];

	$idlocal = $_POST['idlocal'];

	$dataSemSemana= $_POST['dataSemSemana'];

	$idhoradiasemana = $_POST['idhoradiasemana'];

	$horarioinicial = $agenda->getHoraInicialDiaSemana($idhoradiasemana);
	$horariofinal = $agenda->getHoraFinalDiaSemana($idhoradiasemana);

	$horarioinicialdate = $horarioinicial[0]['horamarcadainicial'];
	$horariofinaldate = $horariofinal[0]['horamarcadafinal'];

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
	
	$nomepess = $pessoa->getnomepess();
	
	$saude = new Saude();

	$countParq = $saude->getCountParqByIdPess($idpess);

	if($countParq < 1){

		Cart::setMsgError("Para prosseguir, você dever responder abaixo o Questionário de Prontidão para Atividade Física (PAR-Q) do(a) ".$nomepess."! ");
			//header("Location: /cart");
		header("Location: /par-q/".$idpess."");
		exit();

	}

	$dtnasc = $pessoa->getdtnasc();

	$anoNasc = date('Y', strtotime($dtnasc));
	$anoAtual = date('Y');

	$anoDiferença = (int)$anoAtual - (int)$anoNasc;

	if($anoDiferença < 18){
		Agenda::setMsgError("O agendamento para a natação espontânea só e permitido para maiores de 18 anos");
		header("Location: /agenda/".$_POST['idlocal']."/".$_POST['dataSemSemana']."");
		exit;
	}
	
	$selecionaagenda = $agenda->selecionaAgendaPorPessoaDiaTitulo($idpess, $titulo);

	$selecionaagendadia = $selecionaagenda[0]['dia'];

	if($selecionaagendadia > $hoje){

		$qtdAgendamento = Agenda::countAgendaPorPessoaDiaTitulo($idpess, $titulo);

		if((int)$qtdAgendamento[0]['count(*)'] >= 2){

		echo "<script>alert('".$nomepess." já tem, no mínimo, 02 agendamentos para natação espontânea reservados para esta semana!!!.');";
		echo "javascript:history.go(-1)</script>";
		exit();
		}
	}
	
	$qtdAgendamento = Agenda::countAgendaPorPessoaLocalDia($idpess, $idlocal, $dataSemSemana);

	if((int)$qtdAgendamento[0]['count(*)'] >= 2){

		Agenda::setMsgError($nomepess." já tem agendamento completo com 02 horários reservados para esta data!");
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
			//exit;

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
	
	//if( ($hojeDiaHoraMaisDuas >= $horarioinicial) || ($hojeDiaHoraAtual > $horarioinicial) ){

		Agenda::setMsgError("A agenda para o horário das ".$horarioinicialdate." às ".$horariofinaldate." já foi fechada!");
		header("Location: /agenda/".$_POST['idlocal']."/".$_POST['dataSemSemana']."");
		exit;

	}
	
	if($idlocal == 3){	
		if(($dataSemSemana > '2023-07-03') && ($dataSemSemana < '2023-07-15')){
			if( 
				$horarioinicial[0]['horamarcadainicial'] == '08:00' ||
				$horarioinicial[0]['horamarcadainicial'] == '08:30' ||
				$horarioinicial[0]['horamarcadainicial'] == '09:00' ||
				$horarioinicial[0]['horamarcadainicial'] == '09:30' ||
				$horarioinicial[0]['horamarcadainicial'] == '10:00' ||
				$horarioinicial[0]['horamarcadainicial'] == '10:30' || 		
				$horarioinicial[0]['horamarcadainicial'] == '11:00' ||
				$horarioinicial[0]['horamarcadainicial'] == '13:30' ||
				$horarioinicial[0]['horamarcadainicial'] == '14:00' ||
				$horarioinicial[0]['horamarcadainicial'] == '14:30' ||
				$horarioinicial[0]['horamarcadainicial'] == '15:00' ||
				$horarioinicial[0]['horamarcadainicial'] == '15:30' ||
			    $horarioinicial[0]['horamarcadainicial'] == '16:00' ||
			    $horarioinicial[0]['horamarcadainicial'] == '16:30'
		    ){
		        
		   	echo "<script>alert('A agenda para o horário a partir das ".$horarioinicial[0]['horamarcadainicial']." não está disponível');";
		   	echo "javascript:history.go(-1)</script>";
		   	exit();			
			}
		}
	}
	
	
	/*
	
	if( $horarioinicial[0]['horamarcadainicial'] == '08:30' ||
		//$horarioinicial[0]['horamarcadainicial'] == '09:00' ||
		//$horarioinicial[0]['horamarcadainicial'] == '09:30' ||
		//$horarioinicial[0]['horamarcadainicial'] == '10:00' ||
		//$horarioinicial[0]['horamarcadainicial'] == '10:30' || 		
		$horarioinicial[0]['horamarcadainicial'] == '11:00' ||
		$horarioinicial[0]['horamarcadainicial'] == '13:30' ||
		//$horarioinicial[0]['horamarcadainicial'] == '14:00' ||
		//$horarioinicial[0]['horamarcadainicial'] == '14:30' ||
		//$horarioinicial[0]['horamarcadainicial'] == '15:00' ||
		//$horarioinicial[0]['horamarcadainicial'] == '15:30' ||
	    $horarioinicial[0]['horamarcadainicial'] == '16:00'){
	        
	   echo "<script>alert('A agenda para o horário a partir das ".$horarioinicial[0]['horamarcadainicial']." não está disponível');";
	   echo "javascript:history.go(-1)</script>";
	   exit();
		
	}
	*/

    //var_dump($dataPost." - Dia Semana ".$nomediasemana." - DT limite ".$maisumasemana." - Diferença ".$anoDiferença." - nome ".$nomepess." - DT ".$dtnasc." - Local ".$idlocal." - Presente ".$ispresente." - Horainicial ".$horarioinicial." - Horafinal ".$horariofinal);

   //exit;
	

	$page = new Page();
	
	$page->setTpl("hora-agenda", [
		'dataSemSemana'=>$dataSemSemana,		
		'dataPost'=>$dataPost,		
		'idhoradiasemana'=>$idhoradiasemana,
		'nomeDiaSemana'=>$nomediasemana,
		'idpess'=>$idpess,
		'titulo'=>$titulo,
		'nomepess'=>$nomepess,
		'dtnasc'=>$dtnasc,
		'ispresente'=>$ispresente,
		'idlocal'=>$idlocal,
		'horarioinicial'=>$horarioinicialdate,
		'horariofinal'=>$horariofinaldate,
		'error'=>Agenda::getMsgError()
	]);		
});


$app->post("/horaagendada", function() {

	User::verifyLogin(false);

	$agenda = new Agenda();
	
	$pessoa = new Pessoa();

	$idlocal = $_POST['idlocal'];
	$idpess = $_POST['idpess'];
	$idhoradiasemana = $_POST['idhoradiasemana'];
	$titulo = $_POST['titulo'];
	$dia = $_POST['dataSemSemana'];
	$horainicial = $_POST['horarioinicial'];
	$horafinal = $_POST['horariofinal'];
	$observacao = 'natação';
	$ispresente = $_POST['ispresente'];
	
	$pessoa->get($idpess);	
	$nomepess = $pessoa->getnomepess();
	
	$hoje = Date('Y-m-d');

	$selecionaagenda = $agenda->selecionaAgendaPorPessoaDiaTitulo($idpess, $titulo);

	$selecionaagendadia = $selecionaagenda[0]['dia'];

	if($selecionaagendadia > $hoje){

		$qtdAgendamento = Agenda::countAgendaPorPessoaDiaTitulo($idpess, $titulo);

		if((int)$qtdAgendamento[0]['count(*)'] >= 2){

		echo "<script>alert('".$nomepess." já tem agendamento para natação espontânea reservados para esta semana!!');";
		echo "javascript:history.go(-2)</script>";
		exit();
		}
	}

	$qtdAgendamento = Agenda::countAgendaPorPessoaLocalDia($idpess, $idlocal, $dia);

	if((int)$qtdAgendamento[0]['count(*)'] >= 2){

		echo "<script>alert('".$nomepess." já tem agendamento completo com 02 horários reservados para esta data!');";
		echo "javascript:history.go(-2)</script>";
	   exit();
	
	}

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
	
	if(!$agenda->getAgendaExist($idpess, $idhoradiasemana, $dia, $idlocal)){
			$agenda->save();
	}

	//$agenda->save();
	
	if($titulo == 'avaliacao'){

		Agenda::setMsgSuccess("Agendamento para avaliação da natação realizada com sucesso");
		header('Location: /minhaagenda-avaliacao');
		exit;

	}else{

		Agenda::setMsgSuccess("Agendamento para natação espontânea realizada com sucesso");
		header('Location: /minhaagenda');
		exit;
	}

});

$app->get("/minhaagenda", function() {

	User::verifyLogin(false);

	$agenda = new Agenda();
	$user = User::getFromSession();	

	$iduser = $user->getiduser();
	
	$titulo = 'raia';

	$data = new DateTime();

	$data = date('Y-m-d');
	
	$agenda = $agenda->getAgendaByIduser($iduser, $titulo);
	//$agenda = $agenda->getAgendaAll();

	//var_dump($agenda);
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
    
    User::verifyLogin(false);

	$agenda = new Agenda();


	$agenda->delete($idagen);

	echo "<script>alert('Exclusão efetuada com sucesso');";
	echo "javascript:history.go(-1)</script>";
	exit();
});


$app->get("/agenda-avaliacao/:idlocal", function($idlocal) {

	//User::verifyLogin(false);

	$local = new Local();
	$user = User::getFromSession();
	$agenda = new Agenda();
	//$data = "2022-04-01";

	$datalimite = date('Y-m-d l', strtotime('+4 week'));
	$dataatual = date('Y-m-d');
	
	$local->get($idlocal);

	$idlocal = $local->getidlocal();

	$page = new Page();

	$page->setTpl("agenda-avaliacao", [		
		'idlocal'=>$idlocal,		
		'error'=>Agenda::getMsgError(),
		'pessoa'=>$user->getPessoa(),
	]);	
});

$app->post("/hora-agenda-avaliacao", function() {

	//User::verifyLogin(false);

	$pessoa = new Pessoa();
	$agenda = new Agenda();
	$local = new Local();		
	
	if(!isset($_POST['datahoramarcada']) || $_POST['datahoramarcada'] == ''){			
		echo "<script>alert('Selecione um horário!');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}	

	if(!isset($_POST['idpess']) || $_POST['idpess'] <= 0){			
		echo "<script>alert('Selecione uma pessoa!');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}		

	$dados = $_POST['datahoramarcada'];

	$data = Date(substr($dados, 7, 10));
	$diasemana = substr($dados, 0, 6);
	$horarioinicial = substr($dados, 18, 5);
	$horariofinal = substr($dados, 24, 5);
	$vagas = substr($dados, 35, 2);
	$idlocal = $_POST['idlocal'];
	$titulo = $_POST['titulo'];
	$idhoradiasemana = '71';

	$hoje = Date('Y-m-d');

	if($data < $hoje){	
		echo "<script>alert('A data não pode ser anterior ao dia de hoje! ');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}	


	$qtdagendamentopordata = $agenda->contaQtdAgendamPorDataHorarioTitulo($data, $idlocal, $titulo, $horarioinicial);

	$qtdagendamentopordata = $qtdagendamentopordata[0]['count(*)'];	

	if($qtdagendamentopordata >= $vagas){

		echo "<script>alert('Não há mais vagas para avaliação neste horário! Escolha outro ');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}
	

	$idlocal = (int)$_POST['idlocal'];
	$dataPost = $data;
	$idpess = (int)$_POST['idpess'];
	$ispresente = (int)$_POST['ispresente'];

	$titulo = $_POST['titulo'];

	$pessoa->get($idpess);
	
	$nomepess = $pessoa->getnomepess();

	$dtnasc = $pessoa->getdtnasc();


	$anoNasc = date('Y', strtotime($dtnasc));
	$anoAtual = date('Y');

	$anoDiferença = (int)$anoAtual - (int)$anoNasc;

	if($anoDiferença < 12 ){
		echo "<script>alert('O agendamento para a avaliação só e permitido para maiores de 12 anos');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}
	
	$saude = new Saude();

	$countParq = $saude->getCountParqByIdPess($idpess);

	if($countParq < 1){

		Cart::setMsgError("Você dever responder abaixo o Questionário de Prontidão para Atividade Física da ".$nomepess."! ");
			//header("Location: /cart");
		header("Location: /saude-atualiza/".$idpess."/".$nomepess."");
		exit();

	}

	$selecionaagenda = $agenda->selecionaAgendaPorPessoaDiaTitulo($idpess, $titulo);

	$selecionaagendadia = $selecionaagenda[0]['dia'];

	if($selecionaagendadia > $hoje){

		$qtdAgendamento = Agenda::countAgendaPorPessoaDiaTitulo($idpess, $titulo);

		if((int)$qtdAgendamento[0]['count(*)'] >= 1){

		echo "<script>alert('".$nomepess." já tem agendamento para avaliação reservados para esta temporada');";
		echo "javascript:history.go(-1)</script>";
		exit();

		}
	}

	/*
	//$qtdAgendamento = Agenda::countAgendaPorPessoaLocalDiaTitulo($idpess, $idlocal, $titulo);
	$qtdAgendamento = Agenda::countAgendaPorPessoaDiaTitulo($idpess, $titulo);

	if((int)$qtdAgendamento[0]['count(*)'] >= 1){

		echo "<script>alert('".$nomepess." já tem agendamento para avaliação reservados para esta temporada');";
		echo "javascript:history.go(-1)</script>";
		exit();

	}
	*/
	
	$selecionaagenda = $agenda->selecionaAgendaPorPessoaDiaTitulo($idpess, $titulo);

	$selecionaagendadia = $selecionaagenda[0]['dia'];

	if($selecionaagendadia > $hoje){

		$qtdAgendamento = Agenda::countAgendaPorPessoaDiaTitulo($idpess, $titulo);

		if((int)$qtdAgendamento[0]['count(*)'] >= 1){

		echo "<script>alert('".$nomepess." já tem agendamento para avaliação reservados para esta temporada');";
		echo "javascript:history.go(-1)</script>";
		exit();

		}
	}

	/*
	//$qtdAgendamento = Agenda::countAgendaPorPessoaLocalDiaTitulo($idpess, $idlocal, $titulo);
	$qtdAgendamento = Agenda::countAgendaPorPessoaDiaTitulo($idpess, $titulo);

	if((int)$qtdAgendamento[0]['count(*)'] >= 1){

		echo "<script>alert('".$nomepess." já tem agendamento para avaliação reservados para esta temporada');";
		echo "javascript:history.go(-1)</script>";
		exit();

	}
	*/

	$maisumasemana = date('Y-m-d', strtotime('+8 week'));

	
	if($diasemana == "Quinta"){
		$nomediasemana = "Quinta-feira";
	}
	if($diasemana == "Sexta-"){
		$nomediasemana = "Sexta-feira";
	}
	

	$nomepess = $pessoa->getnomepess();

	if($dataPost > $maisumasemana){

		echo "<script>alert('A agenda para este dia ainda não foi aberta');";
		echo "javascript:history.go(-1)</script>";
		exit();

	}
	
	$hojeDiaHoraMaisDuas = date('H:i', strtotime('+2 hours'));
	$hojeDiaHoraAtual = date('H:i');

	$horarioinicialdate = $horarioinicial;
	$horariofinaldate = $horariofinal;

	$dataDiaAgendado = Date('Y-m-d', strtotime($data));	

	//var_dump($horarioinicialdate.' - '. $dataDiaAgendado.' - '. $hojeDiaHoraMaisDuas.' - '.$hojeDiaHoraAtual);
	//exit;
	
	if(($dataDiaAgendado == $hoje) && (($hojeDiaHoraMaisDuas >= $horarioinicialdate) || ($hojeDiaHoraAtual > $horarioinicialdate))){
	
	//if( ($hojeDiaHoraMaisDuas >= $horarioinicial) || ($hojeDiaHoraAtual > $horarioinicial) ){

		echo "<script>alert('A agenda para o horário das ".$horarioinicialdate." às ".$horariofinaldate." já foi fechada!');";
		echo "javascript:history.go(-1)</script>";
		exit();

	}
	

	$page = new Page();
	
	$page->setTpl("hora-agenda-avaliacao", [
		'dataSemSemana'=>$data,		
		'dataPost'=>$dataPost,		
		'idhoradiasemana'=>$idhoradiasemana,
		'nomeDiaSemana'=>$nomediasemana,
		'idpess'=>$idpess,
		'nomepess'=>$nomepess,
		'dtnasc'=>$dtnasc,
		'titulo'=>$titulo,
		'ispresente'=>$ispresente,
		'idlocal'=>$idlocal,
		'horarioinicial'=>$horarioinicialdate,
		'horariofinal'=>$horariofinaldate,
		'error'=>Agenda::getMsgError()
	]);		
});

$app->get("/minhaagenda-avaliacao", function() {

	User::verifyLogin(false);

	$agenda = new Agenda();
	$user = User::getFromSession();	

	$iduser = $user->getiduser();

	$titulo = 'avaliacao';

	$data = new DateTime();

	$data = date('Y-m-d');
	
	$agenda = $agenda->getAgendaAvaliacaoByIduser($iduser, $titulo);

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("minhaagenda-avaliacao", [
		'agenda'=>$agenda,
		'data'=>$data,
		'error'=>Agenda::getMsgError(),
		'success'=>Agenda::getMsgSuccess()
	]);	
});



?>