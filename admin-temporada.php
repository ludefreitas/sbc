<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Temporada;
use \Sbc\Model\StatusTemporada;
use \Sbc\Model\Turma;
use \Sbc\Model\Sorteio;
use \Sbc\Model\Local;
use \Sbc\Model\Modalidade;
use \Sbc\Model\Insc;

$app->get("/admin/temporada", function() {

	User::verifyLogin();

	$temporada = Temporada::listAll();

	$total = count($temporada);
	$page = new PageAdmin();
	
	$page->setTpl("temporada", array(
		'temporada'=>$temporada,
		'total'=>$total,
		'error'=>Temporada::getError()
	));
});

$app->get("/admin/temporada-audi", function() {

	User::verifyLoginAudi();

	$temporada = Temporada::listAll();

	$total = count($temporada);
	$page = new PageAdmin();
	
	$page->setTpl("temporada-audi", array(
		'temporada'=>$temporada,
		'total'=>$total,
		'error'=>Temporada::getError()
	));
});

$app->get("/admin/temporada/create", function() {

	User::verifyLogin();

	$temporada = Temporada::listAll();

	$statustemporada = StatusTemporada::listAll();

	$page = new PageAdmin();

	$page->setTpl("temporada-create", [
		'temporada'=>$temporada,
		'statustemporada'=>$statustemporada,
		'error'=>Temporada::getError(),
		'createTemporadaValues'=>(isset($_SESSION['createTemporadaValues'])) ? $_SESSION['createTemporadaValues'] : ['desctemporada'=>'', 'dtinicinscricao'=>'', 'dtterminscricao'=>'', 'dtinicmatricula'=>'', 'dttermmatricula'=>'', 'idstatustemporada'=>'']
	]);
});

$app->get("/admin/professor-temporada/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);


	$setturmatemporadaexiste = Temporada::seTurmaTemporadaExiste($idtemporada);

	if(!$setturmatemporadaexiste){
		Temporada::setError("Não há professores para esta turma, você precisa relacionar pelo menos uma turma a esta temporada!");
	}

	$page = new PageAdmin();

	$page->setTpl("prof-temporada", array(
		'prof'=>User::listAllProf(),
		'temporada'=>$temporada->getValues(),
		'error'=>Temporada::getError()
	));
});


$app->post("/admin/temporada/create", function() {

	User::verifyLogin();

	$_SESSION['createTemporadaValues'] = $_POST;

	$temporada = new Temporada();

	if (!isset($_POST['desctemporada']) || $_POST['desctemporada'] == '') {
		Temporada::setError("Descreva a temporada.");
		header("Location: /admin/temporada/create");
		exit;		
	}

	if (!isset($_POST['dtinicinscricao']) || $_POST['dtinicinscricao'] == '') {
		Temporada::setError("Informe quando começarão as inscrições.");
		header("Location: /admin/temporada/create");
		exit;		
	}
	$_POST['dtinicinscricao'] = str_replace('T', ' ', $_POST['dtinicinscricao']);

	if (!isset($_POST['dtterminscricao']) || $_POST['dtterminscricao'] == '') {
		Temporada::setError("Informe quando terminarão as inscrições.");
		header("Location: /admin/temporada/create");
		exit;		
	}
	$_POST['dtterminscricao'] = str_replace('T', ' ', $_POST['dtinicinscricao']);

	if (!isset($_POST['dtinicmatricula']) || $_POST['dtinicmatricula'] == '') {
		Temporada::setError("Informe quando começarão as matrículas.");
		header("Location: /admin/temporada/create");
		exit;		
	}
	$_POST['dtinicmatricula'] = str_replace('T', ' ', $_POST['dtinicmatricula']);

	if (!isset($_POST['dttermmatricula']) || $_POST['dttermmatricula'] == '') {
		Temporada::setError("Informe quando terminarão as matrículas.");
		header("Location: /admin/temporada/create");
		exit;		
	}
	$_POST['dttermmatricula'] = str_replace('T', ' ', $_POST['dttermmatricula']);

	if (!isset($_POST['idstatustemporada']) || $_POST['idstatustemporada'] == '') {
		Temporada::setError("Informe o status da temporada.");
		header("Location: /admin/temporada/create");
		exit;		
	}

	$temporada->setData($_POST);

	$desctemporada = $_POST['desctemporada'];
	$idstatustemporada = $_POST['idstatustemporada'];

	Temporada::temporadaExiste($desctemporada);
	//Temporada::temporadaStatusIniciadaExiste($idstatustemporada);

	/*
	if($idstatustemporada == 6){
	
		if(Temporada::temporadaStatusMatriculaIniciadaExiste()){
			Temporada::setError("Já existe uma temporada com MATRÍCULAS INICIADAS. Não pode existir mais de uma temporada com INSCRIÇÕES ou MATRÍCULAS INICIADAS.");
			header("Location: /admin/temporada/create");
			exit;
		}
	} 

	if($idstatustemporada == 4){

			if(Temporada::temporadaStatusInscricaoIniciadaExiste()){
				Temporada::setError("Já existe uma temporada com INSCRIÇÕES INICIADAS. Não pode existir mais de uma temporada com INSCRIÇÕES ou MATRÍCULAS INICIADAS.");
				header("Location: /admin/temporada/create");
				exit;
			}		
	}	
	*/	

	if($idstatustemporada == 2 || $idstatustemporada == 4 || $idstatustemporada == 5 || $idstatustemporada == 6 ){

		//if(!Temporada::statusTemporadaIsIniciadaMatricula($idtemporada)){
		//if($temporada->getidstatustemporada() != 2 && $temporada->getidstatustemporada() != 4 && $temporada->getidstatustemporada() != 6){

			$idStatusTemporadaMatriculaIniciada = Temporada::temporadaStatusIniciadaExiste();	
		
			if($idStatusTemporadaMatriculaIniciada){
				Temporada::setError("Já existe uma temporada com o status selecionado. Não pode existir mais de uma temporada com status de TEMPORADA, INSCRIÇÕES, MATRÍCULAS INICIADAS ou MATRÍCULAS ENCERRADAS.");
				header("Location: /admin/temporada/create");
				exit;
			}
		//}
	}			

	$temporada->save();

	$_SESSION['createTemporadaValues'] = NULL;

	header("Location: /admin/temporada");
	exit();	

});


$app->get("/admin/temporada/:idtemporada/delete", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$sorteio = new Sorteio();

	$temporada->get((int)$idtemporada);

	$desctemporada = $temporada->getdesctemporada();

	$temporada->delete();
	$sorteio->excluiTabelaSorteio($desctemporada);

	header("Location: /admin/temporada");
	exit();	
});

$app->get("/admin/temporada/:idtemporada", function($idtemporada) {

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

$app->post("/admin/temporada/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada;

	$temporada->get((int)$idtemporada);
	if (!isset($_POST['desctemporada']) || $_POST['desctemporada'] == '') {
		Temporada::setError("Descreva a temporada.");
		header("Location: /admin/temporada/".$idtemporada."");
		exit;		
	}

	if (!isset($_POST['dtinicinscricao']) || $_POST['dtinicinscricao'] == '') {
		Temporada::setError("Informe quando começarão as inscrições.");
		header("Location: /admin/temporada/".$idtemporada."");
		exit;		
	}

	if (!isset($_POST['dtterminscricao']) || $_POST['dtterminscricao'] == '') {
		Temporada::setError("Informe quando terminarão as inscrições.");
		header("Location: /admin/temporada/".$idtemporada."");
		exit;		
	}

	if (!isset($_POST['dtinicmatricula']) || $_POST['dtinicmatricula'] == '') {
		Temporada::setError("Informe quando começarão as matrículas.");
		header("Location: /admin/temporada/".$idtemporada."");
		exit;		
	}

	if (!isset($_POST['dttermmatricula']) || $_POST['dttermmatricula'] == '') {
		Temporada::setError("Informe quando terminarão as matrículas.");
		header("Location: /admin/temporada/".$idtemporada."");
		exit;		
	}	

	if (!isset($_POST['idstatustemporada']) || $_POST['idstatustemporada'] == '') {
		Temporada::setError("Informe o status da temporada.");
		header("Location: /admin/temporada/".$idtemporada."");
		exit;		
	}

	$idstatustemporada = $_POST['idstatustemporada'];

	if($idstatustemporada == 2 || $idstatustemporada == 4 || $idstatustemporada == 5 || $idstatustemporada == 6){

		//if(!Temporada::statusTemporadaIsIniciadaMatricula($idtemporada)){
		if($temporada->getidstatustemporada() != 2 && $temporada->getidstatustemporada() != 4 && $temporada->getidstatustemporada() != 5 && $temporada->getidstatustemporada() != 6){

			$idStatusTemporadaMatriculaIniciada = Temporada::temporadaStatusIniciadaExiste();	
		
			if($idStatusTemporadaMatriculaIniciada){
				Temporada::setError("Já existe uma temporada com o status selecionado. Não pode existir mais de uma temporada com status de TEMPORADA, INSCRIÇÕES, MATRÍCULAS INICIADAS ou MATRÍCULAS ENCERRADAS.");
				header("Location: /admin/temporada/".$idtemporada."");
				exit;
			}
		}
	}

	//$temporadadaIniciada = Temporada::StatusTemporadaIsIniciada($idtemporada, $idstatustemporada);

	/*
	if($idstatustemporada == 6){

		//if(!Temporada::statusTemporadaIsIniciadaMatricula($idtemporada)){
		if($temporada->getidstatustemporada() != 6){

			$idStatusTemporadaMatriculaIniciada = Temporada::temporadaStatusMatriculaIniciadaExiste();	
		
			if($idStatusTemporadaMatriculaIniciada){
				Temporada::setError("Já existe uma temporada com matrícula iniciada. Não pode existir mais de uma temporada com inscrição ou matrícula iniciada.");
				header("Location: /admin/temporada");
				exit;
			}
		}
	}


	if($idstatustemporada == 4){

		//if(!Temporada::statusTemporadaIsIniciadaInscricao($idtemporada)){		
		if($temporada->getidstatustemporada() != 4){

			$idStatusTemporadaInscricaoIniciada = Temporada::temporadaStatusInscricaoIniciadaExiste();

			if($idStatusTemporadaInscricaoIniciada){
				Temporada::setError("Já existe uma temporada com inscrição iniciada. Não pode existir mais de uma temporada com inscrição ou matrícula iniciada.");
				header("Location: /admin/temporada");
				exit;
			}		
		}

	}	
	*/				
	//}	

	$temporada->setData($_POST);

	$temporada->save();

	header("Location: /admin/temporada");
	exit();	
});

$app->get("/admin/turma-temporada/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();
	$modalidade = new Modalidade();

	$temporada->get((int)$idtemporada);

	$local = $local->setapelidolocal('');
	$modalidade = $modalidade->setdescmodal('');

	$page = new PageAdmin();

	$page->setTpl("turmas-por-temporada", [
		'local'=>$local,
		'modalidade'=>$modalidade,
		'locais'=>Local::listAll(),
		'modalidades'=>Modalidade::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmatemporada($idtemporada),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});

$app->get("/admin/turma-temporada-local/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();
	$temporada->get((int)$idtemporada);

	$local = $local->setapelidolocal('');

	$page = new PageAdmin();

	$page->setTpl("turmas-por-temporada-por-local", [
		'local'=>$local,
		'locais'=>Local::listAll(),
		'modalidades'=>Modalidade::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmatemporada($idtemporada),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});

$app->get("/admin/turma-temporada-modalidade/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();

	$modalidade = new Modalidade();

	$temporada->get((int)$idtemporada);

	$modalidade = $modalidade->setdescmodal('');

	$page = new PageAdmin();

	$page->setTpl("turmas-por-temporada-por-modalidade", [
		'modalidade'=>$modalidade,
		'locais'=>Local::listAll(),
		'modalidades'=>Modalidade::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmatemporada($idtemporada),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});

$app->get("/admin/controle-frequencia/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();

	$temporada->get((int)$idtemporada);

	$local = $local->setapelidolocal('');

	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("controle-frequencia", [
		'local'=>$local,
		'locais'=>Local::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmaTemporadaControleFrequencia($idtemporada),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});

$app->get("/admin/controle-frequencia-locais/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();

	$temporada->get((int)$idtemporada);

	$idlocaldefault = 6;
	
	$local->get((int)$idlocaldefault);
	
	$local = $local->getapelidolocal();

	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("controle-frequencia-locais", [
		'local'=>$local,
		'locais'=>Local::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmaTemporadaControleFrequencia($idtemporada),
		'turmas'=>Temporada::listAllTurmaTemporadaControleFrequenciaLocal($idtemporada, $idlocaldefault),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		//'countIncricoesJan'=>$countIncricoesJan,
		'error'=>User::getError()
	]);	
});

$app->get("/admin/controle-frequencia-locais-audi/:idtemporada", function($idtemporada) {

	User::verifyLoginAudi();

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();

	$temporada->get((int)$idtemporada);

	$idlocaldefault = 6;
	
	$local->get((int)$idlocaldefault);
	
	$local = $local->getapelidolocal();

	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("controle-frequencia-locais-audi", [
		'local'=>$local,
		'locais'=>Local::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		//'turmas'=>Temporada::listAllTurmaTemporadaControleFrequencia($idtemporada),
		'turmas'=>Temporada::listAllTurmaTemporadaControleFrequenciaLocal($idtemporada, $idlocaldefault),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		//'countIncricoesJan'=>$countIncricoesJan,
		'error'=>User::getError()
	]);	
});

$app->get("/admin/controle-frequencia-por-local/:idtemporada/:idlocal", function($idtemporada, $idlocal) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();
	$local->get((int)$idlocal);

	$temporada->get((int)$idtemporada);
	$local->get((int)$idlocal);

	$local = $local->getapelidolocal();

	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("controle-frequencia-locais", [
		'local'=>$local,
		'locais'=>Local::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmaTemporadaControleFrequenciaLocal($idtemporada, $idlocal),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		//'countIncricoesJan'=>$countIncricoesJan,
		'error'=>User::getError()
	]);	
});

$app->get("/admin/controle-frequencia-por-local-audi/:idtemporada/:idlocal", function($idtemporada, $idlocal) {

	User::verifyLoginAudi();

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();

	$temporada->get((int)$idtemporada);
	$local->get((int)$idlocal);

	$local = $local->setapelidolocal('');

	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("controle-frequencia-locais-audi", [
		'local'=>$local,
		'locais'=>Local::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmaTemporadaControleFrequenciaLocal($idtemporada, $idlocal),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		//'countIncricoesJan'=>$countIncricoesJan,
		'error'=>User::getError()
	]);	
});


$app->get("/admin/controle-frequencia-modalidades/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();
	$modalidade = new Modalidade();

	$temporada->get((int)$idtemporada);

	$idmodaldefault = 23;

	$modalidade->get((int)$idmodaldefault);
	
	$modalidade = $modalidade->getdescmodal();

	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("controle-frequencia-modalidades", [
		'modalidade'=>$modalidade,
		'modalidades'=>Modalidade::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		//'turmas'=>Temporada::listAllTurmaTemporadaControleFrequencia($idtemporada),
		'turmas'=>Temporada::listAllTurmaTemporadaControleFrequenciaModalidade($idtemporada, $idmodaldefault),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		//'countIncricoesJan'=>$countIncricoesJan,
		'error'=>User::getError()
	]);	
});

$app->get("/admin/controle-frequencia-modalidades-audi/:idtemporada", function($idtemporada) {

	User::verifyLoginAudi();

	$temporada = new Temporada();
	$turma = new Turma();
	$modalidade = new Modalidade();

	$temporada->get((int)$idtemporada);

	$idmodaldefault = 23;

	$modalidade->get((int)$idmodaldefault);
	
	$modalidade = $modalidade->getdescmodal();

	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("controle-frequencia-modalidades-audi", [
		'modalidade'=>$modalidade,
		'modalidades'=>Modalidade::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		//'turmas'=>Temporada::listAllTurmaTemporadaControleFrequencia($idtemporada),
		'turmas'=>Temporada::listAllTurmaTemporadaControleFrequenciaModalidade($idtemporada, $idmodaldefault),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		//'countIncricoesJan'=>$countIncricoesJan,
		'error'=>User::getError()
	]);	
});

$app->get("/admin/controle-frequencia-por-modalidade/:idtemporada/:idmodal", function($idtemporada, $idmodal) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();
	$modalidade = new Modalidade();
	$temporada->get((int)$idtemporada);
	$modalidade->get((int)$idmodal);

	$modalidade = $modalidade->getdescmodal();

	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("controle-frequencia-modalidades", [
		'modalidade'=>$modalidade,
		'modalidades'=>Modalidade::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmaTemporadaControleFrequenciaModalidade($idtemporada, $idmodal),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		//'countIncricoesJan'=>$countIncricoesJan,
		'error'=>User::getError()
	]);	
});

$app->get("/admin/controle-frequencia-por-modalidade-audi/:idtemporada/:idmodal", function($idtemporada, $idmodal) {

	User::verifyLoginAudi();

	$temporada = new Temporada();
	$turma = new Turma();
	$modalidade = new Modalidade();
	$temporada->get((int)$idtemporada);
	$modalidade->get((int)$idmodal);

	$modalidade = $modalidade->setdescmodal('');

	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("controle-frequencia-modalidades-audi", [
		'modalidade'=>$modalidade,
		'modalidades'=>Modalidade::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmaTemporadaControleFrequenciaModalidade($idtemporada, $idmodal),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		//'countIncricoesJan'=>$countIncricoesJan,
		'error'=>User::getError()
	]);	
});

$app->get("/admin/turma-temporada/:idtemporada/local/:idlocal", function($idtemporada, $idlocal) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();
	$modalidade = new Modalidade();
	$temporada->get((int)$idtemporada);
	$local->get((int)$idlocal);

	//var_dump($local);
	//exit();

	$modalidades = $modalidade->getModalidadesTemporadaByLocal($idtemporada, $idlocal);

	$turmasTemporada = Temporada::listAllTurmatemporadaLocal($idtemporada, $idlocal);

	$page = new PageAdmin();	

	$page->setTpl("turmas-por-temporada", [
		'local'=>$local->getValues(),
		'locais'=>Local::listAll(),
		'modalidades'=>$modalidades,
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>$turmasTemporada,
		//'turmas'=>Temporada::listAllTurmatemporadaLocal($idtemporada, $idloca
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});

$app->get("/admin/turma-temporada-hoje-icon/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();
	$modalidade = new Modalidade();

	$temporada->get((int)$idtemporada);

	$local = $local->setapelidolocal('');
	//$modalidade = $modalidade->setdescmodal('');

	$numeroDiaSemana = date('w');

	 if(!isset($_GET['data']) || $_GET['data'] == ''){

	 }else{

		 $traco1 = substr($_GET['data'], 2,1);
	     $traco2 = substr($_GET['data'], 5,1);
	     $datadia = substr($_GET['data'], 0,2);
	     $datames = substr($_GET['data'], 3,2);
	     $dataano = substr($_GET['data'], 6,4); 

	            
	     if(($traco1 != '-') || ($traco2 != '-') || (strlen($dataano) < 4)){

	     	echo "<script>alert('Formato da data inválida!');";
			echo "javascript:history.go(-1)</script>";
			exit();         

	     }else{

	     	if(($datadia > 31) || ($datadia == 0) || ($datames > 12) || ($datames == 0)){

	     		echo "<script>alert('data inválida!');";
				echo "javascript:history.go(-1)</script>";
				exit();            	
	                    
	    	}
		}
	}

	if (!isset($_GET['data']) || $_GET['data'] == '') {
		$data = date('Y-m-d');
		$data = getdate(strtotime($data));
	}else{
		$data = new DateTime($_GET['data']);
		$data = $data->format('Y-m-d');
		$data = getdate(strtotime($data));
	}

	$dia = (int)$data['mday'];
	if($dia < 10){ $dia = '0'.$dia; }
	$mes = (int)$data['mon'];
	if($mes < 10){ $mes = '0'.$mes; }
	$ano = (int)$data['year'];		

	$dataformatada = $ano.'-'.$mes.'-'.$dia;

	$nameweekday = $data['weekday'];

	if($nameweekday == 'Monday'){
		$nomeDiasemana = 'Segunda';
	}
	if($nameweekday == 'Tuesday'){
		$nomeDiasemana = 'Terça';
	}
	if($nameweekday == 'Wednesday'){
		$nomeDiasemana = 'Quarta';
	}
	if($nameweekday == 'Thursday'){
		$nomeDiasemana = 'Quinta';
	}
	if($nameweekday == 'Friday'){
		$nomeDiasemana = 'Sexta';
	}
	if($nameweekday == 'Saturday'){
		$nomeDiasemana = 'Sábado';
	}
	if($nameweekday == 'Sunday'){
		$nomeDiasemana = 'Domingo';
	}

	//$modalidades = $modalidade->getModalidadesTemporadaByLocal($idtemporada, $idlocal);

	$modalidades = $modalidade->getModalidadesTemporadaDiaSemana($idtemporada, $nomeDiasemana);

	$turmasTemporada = Temporada::listAllTurmatemporadaDiaSemana($idtemporada, $nomeDiasemana);
	//$turmasTemporada = Temporada::listAllTurmatemporada($idtemporada, $nomeDiasemana);

	$page = new PageAdmin();

	$page->setTpl("turmas-por-temporada-hoje-icon", [
		'dia'=>$dia,
		'mes'=>$mes,
		'ano'=>$ano,
		'local'=>$local,
		'modalidade'=>$modalidade,
		'locais'=>Local::listAll(),
		'modalidades'=>$modalidades,
		'temporada'=>$temporada->getValues(),
		'turmas'=>$turmasTemporada,
		'error'=>User::getError()
	]);	
});

$app->get("/admin/turma-temporada-hoje/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();
	$modalidade = new Modalidade();

	$temporada->get((int)$idtemporada);

	$local = $local->setapelidolocal('');
	//$modalidade = $modalidade->setdescmodal('');

	$numeroDiaSemana = date('w');

	 if(!isset($_GET['data']) || $_GET['data'] == ''){

	 }else{

		 $traco1 = substr($_GET['data'], 2,1);
	     $traco2 = substr($_GET['data'], 5,1);
	     $datadia = substr($_GET['data'], 0,2);
	     $datames = substr($_GET['data'], 3,2);
	     $dataano = substr($_GET['data'], 6,4); 

	            
	     if(($traco1 != '-') || ($traco2 != '-') || (strlen($dataano) < 4)){

	     	echo "<script>alert('Formato da data inválida!');";
			echo "javascript:history.go(-1)</script>";
			exit();         

	     }else{

	     	if(($datadia > 31) || ($datadia == 0) || ($datames > 12) || ($datames == 0)){

	     		echo "<script>alert('data inválida!');";
				echo "javascript:history.go(-1)</script>";
				exit();            	
	                    
	    	}
		}
	}

	if (!isset($_GET['data']) || $_GET['data'] == '') {
		$data = date('Y-m-d');
		$data = getdate(strtotime($data));
	}else{
		$data = new DateTime($_GET['data']);
		$data = $data->format('Y-m-d');
		$data = getdate(strtotime($data));
	}

	$dia = (int)$data['mday'];
	if($dia < 10){ $dia = '0'.$dia; }
	$mes = (int)$data['mon'];
	if($mes < 10){ $mes = '0'.$mes; }
	$ano = (int)$data['year'];		

	$dataformatada = $ano.'-'.$mes.'-'.$dia;

	$nameweekday = $data['weekday'];

	if($nameweekday == 'Monday'){
		$nomeDiasemana = 'Segunda';
	}
	if($nameweekday == 'Tuesday'){
		$nomeDiasemana = 'Terça';
	}
	if($nameweekday == 'Wednesday'){
		$nomeDiasemana = 'Quarta';
	}
	if($nameweekday == 'Thursday'){
		$nomeDiasemana = 'Quinta';
	}
	if($nameweekday == 'Friday'){
		$nomeDiasemana = 'Sexta';
	}
	if($nameweekday == 'Saturday'){
		$nomeDiasemana = 'Sábado';
	}
	if($nameweekday == 'Sunday'){
		$nomeDiasemana = 'Domingo';
	}

	//$modalidades = $modalidade->getModalidadesTemporadaByLocal($idtemporada, $idlocal);

	$modalidades = $modalidade->getModalidadesTemporadaDiaSemana($idtemporada, $nomeDiasemana);

	$turmasTemporada = Temporada::listAllTurmatemporadaDiaSemana($idtemporada, $nomeDiasemana);
	//$turmasTemporada = Temporada::listAllTurmatemporada($idtemporada, $nomeDiasemana);

	$page = new PageAdmin();

	$page->setTpl("turmas-por-temporada-hoje", [
		'dia'=>$dia,
		'mes'=>$mes,
		'ano'=>$ano,
		'local'=>$local,
		'modalidade'=>$modalidade,
		'locais'=>Local::listAll(),
		'modalidades'=>$modalidades,
		'temporada'=>$temporada->getValues(),
		'turmas'=>$turmasTemporada,
		'error'=>User::getError()
	]);	
});

$app->get("/admin/turma-temporada-hoje/:idtemporada/local/:idlocal", function($idtemporada, $idlocal) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();
	$modalidade = new Modalidade();
	$temporada->get((int)$idtemporada);
	$local->get((int)$idlocal);

	$numeroDiaSemana = date('w');

	if(!isset($_GET['data']) || $_GET['data'] == ''){

	 }else{

		 $traco1 = substr($_GET['data'], 2,1);
	     $traco2 = substr($_GET['data'], 5,1);
	     $datadia = substr($_GET['data'], 0,2);
	     $datames = substr($_GET['data'], 3,2);
	     $dataano = substr($_GET['data'], 6,4); 

	            
	     if(($traco1 != '-') || ($traco2 != '-') || (strlen($dataano) < 4)){

	     	echo "<script>alert('Formato da data inválida!');";
			echo "javascript:history.go(-1)</script>";
			exit();         

	     }else{

	     	if(($datadia > 31) || ($datadia == 0) || ($datames > 12) || ($datames == 0)){

	     		echo "<script>alert('data inválida!');";
				echo "javascript:history.go(-1)</script>";
				exit();            	
	                    
	    	}
		}
	}

	if (!isset($_GET['data']) || $_GET['data'] == '') {
		$data = date('Y-m-d');
		$data = getdate(strtotime($data));
	}else{
		$data = new DateTime($_GET['data']);
		$data = $data->format('Y-m-d');
		$data = getdate(strtotime($data));
	}

	$dia = (int)$data['mday'];
	if($dia < 10){ $dia = '0'.$dia; }
	$mes = (int)$data['mon'];
	if($mes < 10){ $mes = '0'.$mes; }
	$ano = (int)$data['year'];		

	$dataformatada = $ano.'-'.$mes.'-'.$dia;

	$nameweekday = $data['weekday'];

	if($nameweekday == 'Monday'){
		$nomeDiasemana = 'Segunda';
	}
	if($nameweekday == 'Tuesday'){
		$nomeDiasemana = 'Terça';
	}
	if($nameweekday == 'Wednesday'){
		$nomeDiasemana = 'Quarta';
	}
	if($nameweekday == 'Thursday'){
		$nomeDiasemana = 'Quinta';
	}
	if($nameweekday == 'Friday'){
		$nomeDiasemana = 'Sexta';
	}
	if($nameweekday == 'Saturday'){
		$nomeDiasemana = 'Sábado';
	}
	if($nameweekday == 'Sunday'){
		$nomeDiasemana = 'Domingo';
	}

	//$modalidades = $modalidade->getModalidadesTemporadaByLocal($idtemporada, $idlocal);

	$modalidades = $modalidade->getModalidadesTemporadaByLocalDiaSemana($idtemporada, $idlocal, $nomeDiasemana);

	$turmasTemporada = Temporada::listAllTurmatemporadaLocalDiaSemana($idtemporada, $idlocal, $nomeDiasemana);
	//$turmasTemporada = Temporada::listAllTurmatemporadaLocal($idtemporada, $idlocal);

	$page = new PageAdmin();	

	$page->setTpl("turmas-por-temporada-local-hoje", [
		'dia'=>$dia,
		'mes'=>$mes,
		'ano'=>$ano,
		'local'=>$local->getValues(),
		'locais'=>Local::listAll(),
		'modalidades'=>$modalidades,
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>$turmasTemporada,
		//'turmas'=>Temporada::listAllTurmatemporadaLocal($idtemporada, $idloca
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});

$app->get("/admin/turma-temporada-audi/:idtemporada/local/:idlocal", function($idtemporada, $idlocal) {

	User::verifyLoginAudi();

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();
	$temporada->get((int)$idtemporada);
	$local->get((int)$idlocal);

	//var_dump($local);
	//exit();

	$page = new PageAdmin();	

	$page->setTpl("turmas-por-temporada-local-audi", [
		'local'=>$local->getValues(),
		'locais'=>Local::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmatemporadaLocal($idtemporada, $idlocal),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});

$app->get("/admin/turma-temporada/:idtemporada/modalidade/:idmodal", function($idtemporada, $idmodal) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();
	$modalidade = new Modalidade();
	$local = new Local();
	$temporada->get((int)$idtemporada);
	$modalidade->get((int)$idmodal);

	$locais = $local->getLocalTemporadaByModalidades($idtemporada, $idmodal);

	$page = new PageAdmin();	

	$page->setTpl("turmas-por-temporada-modalidade", [
		'modalidade'=>$modalidade->getValues(),
		'modalidades'=>Modalidade::listAll(),
		'locais'=>$locais,
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmaTemporadaModalidade($idtemporada, $idmodal),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});

$app->get("/admin/turma-temporada-audi/:idtemporada/modalidade/:idmodal", function($idtemporada, $idmodal) {

	User::verifyLoginAudi();

	$temporada = new Temporada();
	$turma = new Turma();
	$modalidade = new Modalidade();
	$temporada->get((int)$idtemporada);
	$modalidade->get((int)$idmodal);

	$page = new PageAdmin();	

	$page->setTpl("turmas-por-temporada-modalidade-audi", [
		'modalidade'=>$modalidade->getValues(),
		'modalidades'=>Modalidade::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmaTemporadaModalidade($idtemporada, $idmodal),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});

$app->get("/admin/turma-temporada/:idtemporada/user/:iduser", function($idtemporada, $iduser) {
    
    User::verifyLogin();

	//$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();

	$locais = Local::listAllCoord($iduser);

	$temporada->get((int)$idtemporada);

	$local = $local->setapelidolocal('');

	$page = new PageAdmin();	

	$page->setTpl("professor-turmas-por-temporada", [	
		'local'=>$local,
		'locais'=>$locais,
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		//'turmas'=>Temporada::listAllTurmatemporada($idtemporada),
		'turmas'=>Temporada::listAllTurmatemporadaProfessor($idtemporada, $iduser),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);
    
    /*
	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();
	$user = new User();
	$local = new Local();

	$temporada->get((int)$idtemporada);
	$user->get((int)$iduser);
	$local = $local->setapelidolocal('');


	//var_dump($temporada->getTurma(true)); exit();

	$page = new PageAdmin();	

	$page->setTpl("professor-turmas-por-temporada", [
		'user'=>$user->getValues(),
		'local'=>$local,
		'locais'=>Local::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmatemporadaProfessor($idtemporada, $iduser),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
	*/
});

$app->get("/admin/temporada/:idtemporada/turma", function($idtemporada) {

	User::verifyLogin();

	$local = new Local();
	$locais = $local->listAll();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);	

	$page = new PageAdmin();	

	$page->setTpl("turma-temporada", [
		'temporada'=>$temporada->getValues(),
		'locais'=>$locais,
		'turmaRelated'=>$temporada->getTurma(true),
		'turmaNotRelated'=>$temporada->getTurma(false),
		'error'=>User::getError(),
		'msgError'=>Temporada::getError()
	]);	
});

$app->get("/admin/temporada/:idtemporada/turma/:idturma/add", function($idtemporada, $idturma) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$temporada->addTurma($turma);

	//header("Location: /admin/temporada/".$idtemporada."/turma");
	//exit;
	echo '<script>javascript:history.go(-1)</script>';
});

$app->get("/admin/temporada/:idtemporada/turma/:idturma/remove", function($idtemporada, $idturma) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$temprofrelacionado = Temporada::professorRelacionadoTurmatemporadaExiste($idtemporada, $idturma);
	
	$inscRelacionada = Temporada::inscRelacionadoTurmatemporadaExiste($idtemporada, $idturma);

	if($inscRelacionada){

		Temporada::setError("Já existem inscrições para esta temporada. Você não pode remover. altere o status da turma para suspensa ou cancelada.");
		header("Location: /admin/temporada/".$idtemporada."/turma");
		exit;
	}
	
	if($temprofrelacionado){

		Temporada::setError("Para remover esta turma da temporada ".$temporada->getdesctemporada().", você precisa antes, remover o professor desta turma para a temporadada! ");
		header("Location: /admin/temporada/".$idtemporada."/turma");
		exit;

	}

	$temporada->removeTurma($turma);

	//header("Location: /admin/temporada/".$idtemporada."/turma");
	//exit;
	echo '<script>javascript:history.go(-1)</script>';

});

$app->get("/admin/turmatemporada/:iduser/turma/:idtemporada", function($iduser, $idtemporada) {

	User::verifyLogin();

	$user = new User();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);	

	$user->get((int)$iduser);	
	
	/*
	echo '<pre>';
	print_r($user->getTurmaTemporada(false, $idtemporada, $iduser));
	echo '</pre>';
	exit;
	*/
	

	$page = new PageAdmin();	

	$page->setTpl("turma-temporada-professor", [
		'locais'=>Local::listAll(),
		'temporada'=>$temporada->getValues(),
		'user'=>$user->getValues(),
		'turmaRelated'=>$user->getTurmaTemporada(true, $idtemporada, $iduser),
		'turmaNotRelated'=>$user->getTurmaTemporada(false, $idtemporada, $iduser),
		'error'=>User::getError()
	]);	
});

$app->get("/admin/turmatemporada/:iduser/turma/:idtemporada/:idlocal", function($iduser, $idtemporada, $idlocal) {

	User::verifyLogin();

	$user = new User();
	$user->get((int)$iduser);	

	$local = new Local();
	$local->get((int)$idlocal);

	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);		

	$page = new PageAdmin();	

	$page->setTpl("turma-temporada-local-professor", [
		'locais'=>Local::listAll(),
		'local'=>$local->getValues(),
		'temporada'=>$temporada->getValues(),
		'user'=>$user->getValues(),
		'turmaRelated'=>$user->getTurmaTemporadaLocal(true, $idtemporada, $iduser, $idlocal),
		'turmaNotRelated'=>$user->getTurmaTemporadaLocal(false, $idtemporada, $iduser, $idlocal),
		'error'=>User::getError()
	]);	
});

$app->get("/admin/estagiario-temporada/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);


	$setturmatemporadaexiste = Temporada::seTurmaTemporadaExiste($idtemporada);

	if(!$setturmatemporadaexiste){
		Temporada::setError("Não há professores para esta turma, você precisa relacionar pelo menos uma turma a esta temporada!");
	}

	$page = new PageAdmin();

	$page->setTpl("estagiario-temporada", array(
		'prof'=>User::listAllEstagiario(),
		'temporada'=>$temporada->getValues(),
		'error'=>Temporada::getError()
	));
});

$app->get("/admin/turma-temporada-estagiario/:idtemporada/user/:iduser", function($idtemporada, $iduser) {

	User::verifyLogin();

	$temporada = new Temporada();
	$turma = new Turma();
	$user = new User();
	$local = new Local();

	$temporada->get((int)$idtemporada);
	$user->get((int)$iduser);
	$local = $local->setapelidolocal('');


	//var_dump($temporada->getTurma(true)); exit();

	$page = new PageAdmin();	

	$page->setTpl("estagiario-turmas-por-temporada", [
		'user'=>$user->getValues(),
		'local'=>$local,
		'locais'=>Local::listAll(),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmatemporadaEstagiario($idtemporada, $iduser),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});


$app->get("/admin/turmatemporada-estagiario/:iduser/turma/:idtemporada", function($iduser, $idtemporada) {

	User::verifyLogin();

	$user = new User();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);	

	$user->get((int)$iduser);		

	$page = new PageAdmin();	

	$page->setTpl("turma-temporada-estagiario", [
		'locais'=>Local::listAll(),
		'temporada'=>$temporada->getValues(),
		'user'=>$user->getValues(),
		'turmaRelated'=>$user->getTurmaTemporadaEstagiario(true, $idtemporada, $iduser),
		'turmaNotRelated'=>$user->getTurmaTemporadaEstagiario(false, $idtemporada, $iduser),
		'error'=>User::getError()
	]);	
});

$app->get("/admin/turmatemporada-estagiario/:iduser/turma/:idtemporada/:idlocal", function($iduser, $idtemporada, $idlocal) {

	User::verifyLogin();

	$user = new User();
	$user->get((int)$iduser);	

	$local = new Local();
	$local->get((int)$idlocal);

	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);		

	$page = new PageAdmin();	

	$page->setTpl("turma-temporada-local-estagiario", [
		'locais'=>Local::listAll(),
		'local'=>$local->getValues(),
		'temporada'=>$temporada->getValues(),
		'user'=>$user->getValues(),
		'turmaRelated'=>$user->getTurmaTemporadaLocalEstagiario(true, $idtemporada, $iduser, $idlocal),
		'turmaNotRelated'=>$user->getTurmaTemporadaLocalEstagiario(false, $idtemporada, $iduser, $idlocal),
		'error'=>User::getError()
	]);	
});

$app->get("/admin/turmatemporada/:idtemporada/turma/:idturma/user/:iduser/add", function($idtemporada, $idturma, $iduser) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$user = new User();

	$user->get((int)$iduser);
	/*
	var_dump($iduser." - ".$idturma." - ".$idtemporada);
	exit;
	*/

	$temporada->addTurmaTemporadaUser($idtemporada, $idturma, $iduser);

	//header("Location: /admin/turmatemporada/".$iduser."/turma/".$idtemporada."");
	//exit;
	echo '<script>javascript:history.go(-1)</script>';
});

$app->get("/admin/turmatemporada/:idtemporada/turma/:idturma/user/:iduser/remove", function($idtemporada, $idturma, $iduser) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$user = new User();

	$user->get((int)$iduser);
	/*
	var_dump($iduser." - ".$idturma." - ".$idtemporada);
	exit;
	*/

	$temporada->removeTurmaTemporadaUser($idtemporada, $idturma, $iduser);

	//header("Location: /admin/turmatemporada/".$iduser."/turma/".$idtemporada."");
	//exit;
	echo '<script>javascript:history.go(-1)</script>';
});

$app->get("/admin/turmatemporada-estagiario/:idtemporada/turma/:idturma/user/:iduser/add", function($idtemporada, $idturma, $iduser) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$user = new User();

	$user->get((int)$iduser);

	//print_r('Em manutenção');
	//exit;

	$temporada->addTurmaTemporadaUserEstagiario($idtemporada, $idturma, $iduser);

	echo '<script>javascript:history.go(-1)</script>';
});

$app->get("/admin/turmatemporada-estagiario/:idtemporada/turma/:idturma/user/:iduser/remove", function($idtemporada, $idturma, $iduser) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$user = new User();

	$user->get((int)$iduser);

	//print_r('Em manutenção');
	//exit;
	
	$temporada->removeTurmaTemporadaUserEstagiario($idtemporada, $idturma, $iduser);

	echo '<script>javascript:history.go(-1)</script>';
});

$app->get("/admin/turmatemporada/:idtemporada/turma/:idturma/user/:iduser/:idlocal/addlocal", function($idtemporada, $idturma, $iduser, $idlocal) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$user = new User();

	$user->get((int)$iduser);

	$temporada->addTurmaTemporadaUser($idtemporada, $idturma, $iduser);

	header("Location: /admin/turmatemporada/".$iduser."/turma/".$idtemporada."/".$idlocal."");
	exit;
});

$app->get("/admin/turmatemporada/:idtemporada/turma/:idturma/user/:iduser/:idlocal/removelocal", function($idtemporada, $idturma, $iduser, $idlocal) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$user = new User();

	$user->get((int)$iduser);
	
	$temporada->removeTurmaTemporadaUser($idtemporada, $idturma, $iduser);

	header("Location: /admin/turmatemporada/".$iduser."/turma/".$idtemporada."/".$idlocal."");
	exit;
});

$app->get("/admin/turmatemporada-estagiario/:idtemporada/turma/:idturma/user/:iduser/:idlocal/addlocal", function($idtemporada, $idturma, $iduser, $idlocal) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$user = new User();

	$user->get((int)$iduser);
	
	$temporada->addTurmaTemporadaUserEstagiario($idtemporada, $idturma, $iduser);

	header("Location: /admin/turmatemporada-estagiario/".$iduser."/turma/".$idtemporada."/".$idlocal."");
	exit;
});

$app->get("/admin/turmatemporada-estagiario/:idtemporada/turma/:idturma/user/:iduser/:idlocal/removelocal", function($idtemporada, $idturma, $iduser, $idlocal) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$turma = new Turma();

	$turma->get((int)$idturma);

	$user = new User();

	$user->get((int)$iduser);
	
	$temporada->removeTurmaTemporadaUserEstagiario($idtemporada, $idturma, $iduser);

	header("Location: /admin/turmatemporada-estagiario/".$iduser."/turma/".$idtemporada."/".$idlocal."");
	exit;
});

$app->get("/admin/atualiza/turmatemporada/:idturma/:idtemporada/:desctemporada/:status", function($idturma, $idtemporada, $desctemporada, $status) {

	User::verifyLogin();
	
	if($status != 2 && $status != 3 && $status != 4 && $status != 5 && $status != 6){
		echo 'Valor inválido!';
		exit();
	}

	Temporada::atualizaStatusTurmaTemporada($idturma, $idtemporada, $status);

	$temporada = new Temporada();

	//$novoStatus = $temporada->getIdturmastatusTurmaTemporada($idturma, $idtemporada);

	if($status == 2){ $texto = "Inscrições não iniciadas"; }
	if($status == 3){ $texto = "Inscrições abertas"; }
	if($status == 4){ $texto = "Inscrições suspensas"; }
	if($status == 5){ $texto = "Inscrições encerradas"; }
	if($status == 6){ $texto = "Turma não iniciada"; }
	
	//$texto = 'Status da turma '.$idturma.' da '.$desctemporada.' alterado com sucesso! Atualize a página para conferir. ';
		
	echo $texto;

});

$app->get("/admin/dados/turmatemporada/:idturma/:idtemporada/", function($idturma, $idtemporada) {

    
	$turmaTemporada = new Turma();

	$turmaTemporada = $turmaTemporada->selectTurmaTemporadaById($idturma, $idtemporada);

	var_dump($turmaTemporada);
	exit;
	
	echo  $texto;
	
});




?>