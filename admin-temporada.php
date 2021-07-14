<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Temporada;
use \Sbc\Model\StatusTemporada;
use \Sbc\Model\Turma;
use \Sbc\Model\Sorteio;

$app->get("/professor/temporada", function() {

	User::verifyLogin();

	$temporada = Temporada::listAll();

	$page = new PageAdmin();

	$page->setTpl("temporada", array(
		'temporada'=>$temporada,
		'error'=>Temporada::getError()
	));
});

$app->get("/professor/temporada/create", function() {

	User::verifyLogin();

	$temporada = Temporada::listAll();

	$statustemporada = StatusTemporada::listAll();

	$page = new PageAdmin();

	$page->setTpl("temporada-create", [
		'temporada'=>$temporada,
		'statustemporada'=>$statustemporada,
		'error'=>Temporada::getError(),
		'createTemporadaValues'=>(isset($_SESSION['createTemporadaValues'])) ? $_SESSION['createTemporadaValues'] : ['destemporada'=>'', 'dtinicinscricao'=>'', 'dtterminscricao'=>'', 'dtinicmatricula'=>'', 'dttermmatricula'=>'', 'idstatustemporada'=>'']
	]);
});

$app->get("/professor/professor-temporada/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);


	$proftemporada = Temporada::listaProf($idtemporada);

	if(!$proftemporada){
		Temporada::setError("Não há professores para esta turma, você precisa relacionar turmas a esta temporada!");
	}

	$page = new PageAdmin();

	$page->setTpl("prof-temporada", array(
		'prof'=>$proftemporada,
		'temporada'=>$temporada->getValues(),
		'error'=>Temporada::getError()
	));
});


$app->post("/professor/temporada/create", function() {

	User::verifyLogin();

	$_SESSION['createTemporadaValues'] = $_POST;

	$temporada = new Temporada();

	if (!isset($_POST['desctemporada']) || $_POST['desctemporada'] == '') {
		Temporada::setError("Descreva a temporada.");
		header("Location: /professor/temporada/create");
		exit;		
	}

	if (!isset($_POST['dtinicinscricao']) || $_POST['dtinicinscricao'] == '') {
		Temporada::setError("Informe quando começarão as inscrições.");
		header("Location: /professor/temporada/create");
		exit;		
	}

	if (!isset($_POST['dtterminscricao']) || $_POST['dtterminscricao'] == '') {
		Temporada::setError("Informe quando terminarão as inscrições.");
		header("Location: /professor/temporada/create");
		exit;		
	}

	if (!isset($_POST['dtinicmatricula']) || $_POST['dtinicmatricula'] == '') {
		Temporada::setError("Informe quando começarão as matrículas.");
		header("Location: /professor/temporada/create");
		exit;		
	}

	if (!isset($_POST['dttermmatricula']) || $_POST['dttermmatricula'] == '') {
		Temporada::setError("Informe quando terminarão as matrículas.");
		header("Location: /professor/temporada/create");
		exit;		
	}	

	if (!isset($_POST['idstatustemporada']) || $_POST['idstatustemporada'] == '') {
		Temporada::setError("Informe o status da temporada.");
		header("Location: /professor/temporada/create");
		exit;		
	}

	$temporada->setData($_POST);

	$desctemporada = $_POST['desctemporada'];
	$idstatustemporada = $_POST['idstatustemporada'];

	Temporada::temporadaExiste($desctemporada);
	//Temporada::temporadaStatusIniciadaExiste($idstatustemporada);

	if($idstatustemporada == 6){

		$idStatusTemporadaMatriculaIniciada = Temporada::temporadaStatusMatriculaIniciadaExiste();	
	
		if($idStatusTemporadaMatriculaIniciada){
			Temporada::setError("Já existe uma temporada com matrícula iniciada. Não pode existir mais de uma temporada com inscrição ou matrícula iniciada.");
			header("Location: /professor/temporada");
			exit;
		}
	}

	if($idstatustemporada == 4){

			$idStatusTemporadaInscricaoIniciada = Temporada::temporadaStatusInscricaoIniciadaExiste();

			if($idStatusTemporadaInscricaoIniciada){
				Temporada::setError("Já existe uma temporada com inscrição iniciada. Não pode existir mais de uma temporada com inscrição ou matrícula iniciada.");
				header("Location: /professor/temporada");
				exit;
			}		
	}					

	$temporada->save();

	header("Location: /professor/temporada");
	exit();	

});


$app->get("/professor/temporada/:idtemporada/delete", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$sorteio = new Sorteio();

	$temporada->get((int)$idtemporada);

	$desctemporada = $temporada->getdesctemporada();

	$temporada->delete();
	$sorteio->excluiTabelaSorteio($desctemporada);

	header("Location: /professor/temporada");
	exit();	
});

$app->get("/professor/temporada/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada;	

	$temporada->get((int)$idtemporada);	

	//echo '<pre>';
	//print_r($temporada);
	//echo '</pre>';
	//exit;

	$page = new PageAdmin();

	$page->setTpl("temporada-update", array(
		'temporada'=>$temporada->getValues(),
		'statustemporada'=>StatusTemporada::listAll(),
		'error'=>Temporada::getError()
		
	));
});

$app->post("/professor/temporada/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada;

	$temporada->get((int)$idtemporada);
	if (!isset($_POST['desctemporada']) || $_POST['desctemporada'] == '') {
		Temporada::setError("Descreva a temporada.");
		header("Location: /professor/temporada/".$idtemporada."");
		exit;		
	}

	if (!isset($_POST['dtinicinscricao']) || $_POST['dtinicinscricao'] == '') {
		Temporada::setError("Informe quando começarão as inscrições.");
		header("Location: /professor/temporada/".$idtemporada."");
		exit;		
	}

	if (!isset($_POST['dtterminscricao']) || $_POST['dtterminscricao'] == '') {
		Temporada::setError("Informe quando terminarão as inscrições.");
		header("Location: /professor/temporada/".$idtemporada."");
		exit;		
	}

	if (!isset($_POST['dtinicmatricula']) || $_POST['dtinicmatricula'] == '') {
		Temporada::setError("Informe quando começarão as matrículas.");
		header("Location: /professor/temporada/".$idtemporada."");
		exit;		
	}

	if (!isset($_POST['dttermmatricula']) || $_POST['dttermmatricula'] == '') {
		Temporada::setError("Informe quando terminarão as matrículas.");
		header("Location: /professor/temporada/".$idtemporada."");
		exit;		
	}	

	if (!isset($_POST['idstatustemporada']) || $_POST['idstatustemporada'] == '') {
		Temporada::setError("Informe o status da temporada.");
		header("Location: /professor/temporada/".$idtemporada."");
		exit;		
	}

	$idstatustemporada = $_POST['idstatustemporada'];

	//$temporadadaIniciada = Temporada::StatusTemporadaIsIniciada($idtemporada, $idstatustemporada);

	//if(!$temporadadaIniciada){

	if($idstatustemporada == 6){

		if(!Temporada::statusTemporadaIsIniciadaMatricula($idtemporada)){

			$idStatusTemporadaMatriculaIniciada = Temporada::temporadaStatusMatriculaIniciadaExiste();	
		
			if($idStatusTemporadaMatriculaIniciada){
				Temporada::setError("Já existe uma temporada com matrícula iniciada. Não pode existir mais de uma temporada com inscrição ou matrícula iniciada.");
				header("Location: /professor/temporada");
				exit;
			}
		}
	}
	if($idstatustemporada == 4){

		if(!Temporada::statusTemporadaIsIniciadaInscricao($idtemporada)){		

			$idStatusTemporadaInscricaoIniciada = Temporada::temporadaStatusInscricaoIniciadaExiste();

			if($idStatusTemporadaInscricaoIniciada){
				Temporada::setError("Já existe uma temporada com inscrição iniciada. Não pode existir mais de uma temporada com inscrição ou matrícula iniciada.");
				header("Location: /professor/temporada");
				exit;
			}		
		}

	}					
	//}	

	$temporada->setData($_POST);

	$temporada->save();

	header("Location: /professor/temporada");
	exit();	
});

$app->get("/professor/turma-temporada/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();

	$temporada->get((int)$idtemporada);

	//var_dump($temporada->getTurma(true)); exit();

	$page = new PageAdmin();	

	$page->setTpl("turmas-por-temporada", [
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmatemporada($idtemporada),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});

$app->get("/professor/turma-temporada/:idtemporada/:iduser", function($idtemporada, $iduser) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();
	$user = new User();

	$temporada->get((int)$idtemporada);
	$user->get((int)$iduser);


	//var_dump($temporada->getTurma(true)); exit();

	$page = new PageAdmin();	

	$page->setTpl("professor-turmas-por-temporada", [
		'user'=>$user->getValues(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmatemporadaProfessor($idtemporada, $iduser),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});

$app->get("/professor/temporada/:idtemporada/turma", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);	

	$page = new PageAdmin();	

	$page->setTpl("turma-temporada", [
		'temporada'=>$temporada->getValues(),
		'turmaRelated'=>$temporada->getTurma(true),
		'turmaNotRelated'=>$temporada->getTurma(false),
		'error'=>User::getError()
	]);	
});

$app->get("/professor/temporada/:idtemporada/turma/:idturma/add", function($idtemporada, $idturma) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$temporada->addTurma($turma);

	header("Location: /professor/temporada/".$idtemporada."/turma");
	exit;
});

$app->get("/professor/temporada/:idtemporada/turma/:idturma/remove", function($idtemporada, $idturma) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$temporada->removeTurma($turma);

	header("Location: /professor/temporada/".$idtemporada."/turma");
	exit;

});


?>