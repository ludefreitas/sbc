<?php

use \Sbc\PageAdmin;
use \Sbc\Model\Evento;
use \Sbc\Model\Temporada;
use \Sbc\Model\local;
use \Sbc\Model\Espaco;
use \Sbc\Model\User;

$app->get("/admin/evento", function() {

	$vento = new Evento();

	$evento = Evento::listAll();

	$page = new PageAdmin();

	$page->setTpl("eventos", [
		'evento'=>$evento,
		'error'=>Evento::getError()
		
	]);
});

$app->get("/admin/evento/create", function() {

	$evento = new Evento();

	$temporada = Temporada::listAll();
	$local = Local::listAll();
	$espaco = Espaco::listAll();

	$evento = Evento::listAll();

	$eventoStatsu = Evento::listEventoStatus();
	$profestagiario = User::listAllProfEstagiario();

	//var_dump($prof);
	//exit();

	$page = new PageAdmin();

	$page->setTpl("evento-create", [
		'evento'=>$evento,
		'eventoStatsu'=>$eventoStatsu,
		'profestagiario'=>$profestagiario,
		'espaco'=>$espaco,
		'temporada'=>$temporada,
		'error'=>Evento::getError(),
		'createEventoValues'=>(isset($_SESSION['createEventoValues'])) ? $_SESSION['createEventoValues'] : ['desc_evento'=>'', 'idespaco'=>'', 'idtemporada'=>'', 'idstatus_evento'=>'', 'vagas'=>'', 'desperson'=>'', 'programa_evento'=>'', 'origem_evento'=>'', 'tipo_evento'=>'', 'dt_inicio_divulgacao_evento'=>'', 'dt_final_divulgacao_evento'=>'', 'dt_comeco_insc_evento'=>'', 'dt_termino_insc_evento'=>'']
		
	]);
	
});


$app->post("/admin/evento/create", function() {

		echo '<pre>';
		var_dump($_POST);
		exit();
		echo '</pre>';

});


$app->get("/admin/eventos-por-temporada/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$evento = new Evento();
	$local = new Local();
	
	//$modalidade = new Modalidade();

	$eventos = $evento->listEventosByIdTemporada($idtemporada);

	//var_dump($evento);
	//exit();

	$temporada->get((int)$idtemporada);

	$local = $local->setapelidolocal('');
	//$modalidade = $modalidade->setdescmodal('');

	$page = new PageAdmin();

	$page->setTpl("eventos-por-temporada", [
		'eventos'=>$eventos,
		'local'=>$local,
		'locais'=>Local::listAll(),
		'temporada'=>$temporada->getValues(),
		'error'=>Evento::getError()
	]);	
});

$app->get("/admin/eventos-por-temporada/:idtemporada/local/:idlocal", function($idtemporada, $idlocal) {

	User::verifyLogin();

	$temporada = new Temporada();
	$evento = new Evento();
	$local = new Local();
	$temporada->get((int)$idtemporada);
	$local->get((int)$idlocal);

	$eventos = $evento->listEventosByIdTemporadaIdlocal($idtemporada, $idlocal);



	//$modalidades = $modalidade->getModalidadesTemporadaByLocal($idtemporada, $idlocal);

	//$turmasTemporada = Temporada::listAllTurmatemporadaLocal($idtemporada, $idlocal);

	$page = new PageAdmin();	

	$page->setTpl("eventos-por-temporada", [
		'local'=>$local->getValues(),
		'locais'=>Local::listAll(),
		'idlocal'=>$idlocal,
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'eventos'=>$eventos,
		//'turmas'=>Temporada::listAllTurmatemporadaLocal($idtemporada, $idloca
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});


$app->get("/admin/atualiza/evento/:id_evento/:idtemporada/:desctemporada/:status", function($id_evento, $idtemporada, $desctemporada, $status) {

	User::verifyLogin();

	if($status != 1 && $status != 2 && $status != 3 && $status != 4 && $status != 5){
		echo 'Valor inválido!';
		exit();
	}

	$evento = new Evento();
	
	Evento::atualizaStatusEventoTemporada($id_evento, $idtemporada, $status);

	$idstatus = Evento::getIdstatusEventoTemporada($id_evento, $idtemporada);

	if($idstatus == 1){ $texto = "Evento Iniciado"; }
	if($idstatus == 2){ $texto = "Evento Encerrado"; }
	if($idstatus == 3){ $texto = "Evento Confirmado"; }
	if($idstatus == 4){ $texto = "Evento Adiado"; }
	if($idstatus == 5){ $texto = "Evento Suspenso"; }

	//$texto = 'Status da turma '.$idturma.' da '.$desctemporada.' alterado com sucesso! Atualize a página para conferir. ';
		
	echo $texto;

});

$app->get("/admin/insc-evento-temporada/:id_evento/:idtemporada/user/:iduser", function($id_evento, $idtemporada, $iduser) {

	User::verifyLogin();
	
	$insc_eventoTodas = new Evento();
	$insc_evento = new Evento();
	$insc_eventoPcd = new Evento();
	$insc_eventoPlm = new Evento();
	$insc_eventoPvs = new Evento();
	$evento = new Evento();
	$user = new User();
	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);

	$evento->get((int)$id_evento);


	$categorias = $evento->getCategoriasByEventoTemporada($id_evento, $idtemporada);

	/*
	echo '<pre>';
	var_dump($categorias);
	exit;
	echo '</pre>';
	*/

	$idusersessao = (int)$_SESSION['User']['iduser'];

	$iduserprof = User::getIdUserInEventoTemporada($id_evento, $idtemporada);
	//$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);


	$insc_eventoTodas->getInscByEventoTemporadaTodas($id_evento, $idtemporada);
	$insc_evento->getInscByEventoTemporada($id_evento, $idtemporada);
	$insc_eventoPcd->getInscByEventoTemporadaPcd($id_evento, $idtemporada);
	$insc_eventoPlm->getInscByEventoTemporadaPlm($id_evento, $idtemporada);
	$insc_eventoPvs->getInscByEventoTemporadaPvs($id_evento, $idtemporada); 
	
	$vagas = (int)$evento->getvagas();
	
	$page = new PageAdmin();	

	$page->setTpl("evento-insc-temporada", [
		'categorias'=>$categorias,
		'iduserprof'=>$iduserprof,
		'insc_evento'=>$insc_evento->getValues(),
		'insc_eventoTodas'=>$insc_eventoTodas->getValues(),
		'insc_eventoPcd'=>$insc_eventoPcd->getValues(),
		'insc_eventoPlm'=>$insc_eventoPlm->getValues(),
		'insc_eventoPvs'=>$insc_eventoPvs->getValues(),
		'evento'=>$evento->getValues(),
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError(),
		'success'=>User::getSuccess(),
		'vagas'=>$vagas,
	]);	
});



// Criar categoria única ao criar evento, se evento tiver inscrição.
// Criar categoria quando se editar evento, mudando para que tenha inscrição.
// ao criar novas categorias editar categoria única
// ao criar categoria, alterar campo "tem_categoria" na tabela tb_evento
// ao criar categoria, se evento tem categoria única, pedir para criador, criar esta categoria única.


?>