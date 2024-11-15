<?php

use \Sbc\PageProf;
use \Sbc\Model\User;
use \Sbc\Model\Temporada;
use \Sbc\Model\Turma;
use \Sbc\Model\Local;
use \Sbc\Model\Modalidade;

$app->get("/prof/turma-temporada/:idtemporada", function($idtemporada) {

	User::verifyLoginProf();

	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	$temporada = new Temporada();
	$turma = new Turma();
	$modalidade = new Modalidade();
	
	$local = new Local();

	$locais = Local::listAllCoord($iduser);

	$temporada->get((int)$idtemporada);
	
	$local = $local->setapelidolocal('');

	$page = new PageProf();	

	$page->setTpl("turmas-por-temporada", [	
	    'local'=>$local,
		'locais'=>$locais,  
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		//'turmas'=>Temporada::listAllTurmatemporada($idtemporada),
		'turmas'=>Temporada::listAllTurmatemporadaProfessor($idtemporada, $iduser),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});

$app->get("/prof/turma-temporada/:idtemporada/:idlocal", function($idtemporada, $idlocal) {

	User::verifyLoginProf();

	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	$temporada = new Temporada();
	$turma = new Turma();
	$modalidade = new Modalidade();

	$temporada->get((int)$idtemporada);

	// script dos locais relacionado ao coordenador
	//$local = new Local();
	//$locais = Local::listAllCoord($iduser);	
	//$local = $local->setapelidolocal('');

	// script dos locais relacionado ao professor
	$localaula = new Local();
	$localaula->get((int)$idlocal);
	$localdaaula = $localaula->getapelidolocal();

	$modalidades = $modalidade->getModalidadesTemporadaLocalByIdUser($idtemporada, $idlocal, $iduser);

	//var_dump($modalidades);
	//exit();

	$page = new PageProf();	

	$page->setTpl("turmas-por-temporada", [	
	    //'local'=>$local,
		//'locais'=>$locais, 
		'idlocal'=>$idlocal, 
		'localdaaula'=>$localdaaula,  
		'modalidades'=>$modalidades,
		'temporada'=>$temporada->getValues(),
		'turmas'=>Temporada::listAllTurmatemporadaProfessorLocal($idtemporada, $iduser, $idlocal),
		'error'=>User::getError()
	]);	
});

$app->get("/estagiario/turma-temporada/:idtemporada/:idlocal", function($idtemporada, $idlocal) {

	User::verifyLoginEstagiario();

	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	$temporada = new Temporada();
	$turma = new Turma();
	$modalidade = new Modalidade();

	$temporada->get((int)$idtemporada);

	// script dos locais relacionado ao coordenador
	//$local = new Local();
	//$locais = Local::listAllCoord($iduser);	
	//$local = $local->setapelidolocal('');

	// script dos locais relacionado ao professor
	$localaula = new Local();
	$localaula->get((int)$idlocal);
	$localdaaula = $localaula->getapelidolocal();

	$modalidades = $modalidade->getModalidadesTemporadaLocalByIdUser($idtemporada, $idlocal, $iduser);

	$page = new PageProf();	

	$page->setTpl("turmas-por-temporada-estagiario", [	
	    //'local'=>$local,
		//'locais'=>$locais, 
		'idlocal'=>$idlocal, 
		'localdaaula'=>$localdaaula,  
		'modalidades'=>$modalidades,
		'temporada'=>$temporada->getValues(),
		'turmas'=>Temporada::listAllTurmatemporadaProfessorLocal($idtemporada, $iduser, $idlocal),
		'error'=>User::getError()
	]);	
});

$app->get("/prof/local-por-turma-temporada/:idtemporada", function($idtemporada) {

	User::verifyLoginProf();

	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	$temporada = new Temporada();

	$locaiscoord = Local::listAllCoord($iduser);

	$locais = Local::listLocalturmasPorTemporadaByIdUser($idtemporada, $iduser);

	$temporada->get((int)$idtemporada);

	$page = new PageProf();	

	$page->setTpl("local-por-turma-temporada", [	
		'locais'=>$locais,  
		'locaiscoord'=>$locaiscoord,  
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError()
	]);	
});

$app->get("/estagiario/local-por-turma-temporada/:idtemporada", function($idtemporada) {

	User::verifyLoginEstagiario();

	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	$temporada = new Temporada();

	$locais = Local::listLocalturmasPorTemporadaByIdUserEstagiario($idtemporada, $iduser);

	$temporada->get((int)$idtemporada);

	$page = new PageProf();	

	$page->setTpl("local-por-turma-temporada-estagiario", [	
		'locais'=>$locais,  
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError()
	]);	
});

$app->get("/estagiario/turma-temporada/:idtemporada", function($idtemporada) {

	User::verifyLoginEstagiario();

	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();

	$locais = Local::listAllCoord($iduser);

	$temporada->get((int)$idtemporada);

	$local = $local->setapelidolocal('');

	$page = new PageProf();	

	$page->setTpl("turmas-por-temporada-estagiario", [	
		'local'=>$local,
		'locais'=>$locais,
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		//'turmas'=>Temporada::listAllTurmatemporada($idtemporada),
		'turmas'=>Temporada::listAllTurmatemporadaEstagiario($idtemporada, $iduser),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});


$app->get("/prof/turma-temporada/:idtemporada/local/:idlocal", function($idtemporada, $idlocal) {

	User::verifyLoginProf();

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();
	$modalidade = new Modalidade();
	$temporada->get((int)$idtemporada);
	$local->get((int)$idlocal);
	
	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	$modalidades = $modalidade->getModalidadesTemporadaLocalByIdUser($idtemporada, $idlocal, $iduser);

	$locaiscoord = Local::listAllCoord($iduser);

	//var_dump($local);
	//exit();

	$page = new PageProf();	

	$page->setTpl("turmas-por-temporada", [
		'local'=>$local->getValues(),
		//'locais'=>Local::listAll(),
		'locaiscoord'=>$locaiscoord,
		'modalidades'=>$modalidades,
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmaTemporadaLocalByIdUser($idtemporada, $idlocal, $iduser),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});

$app->get("/prof/turma-temporada-coordenador/:idtemporada/local/:idlocal", function($idtemporada, $idlocal) {

	User::verifyLoginProf();

	$temporada = new Temporada();
	$local = new Local();
	$modalidade = new Modalidade();
	$temporada->get((int)$idtemporada);
	$local->get((int)$idlocal);
	
	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	$locaiscoord = Local::listAllCoord($iduser);

	$iduserlocal = $local->getIdUserByLocal($iduser, $idlocal);

	if($iduserlocal !== $iduser){
		echo "<script>alert('Não há turmas para listar');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}

	$modalidades = $modalidade->getModalidadesTemporadaByLocal($idtemporada, $idlocal);

	$page = new PageProf();	

	$page->setTpl("turmas-por-temporada-coordenador", [
		'local'=>$local->getValues(),
		'idlocal'=>$idlocal,
		'locaiscoord'=>$locaiscoord,
		'modalidades'=>$modalidades,
		'temporada'=>$temporada->getValues(),
		'turmas'=>Temporada::listAllTurmaTemporadaLocal($idtemporada, $idlocal),
		'error'=>User::getError()
	]);	
});

$app->get("/estagiario/turma-temporada/:idtemporada/local/:idlocal", function($idtemporada, $idlocal) {

	User::verifyLoginEstagiario();

	$temporada = new Temporada();
	$turma = new Turma();
	$local = new Local();
	$temporada->get((int)$idtemporada);
	$local->get((int)$idlocal);

	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	//var_dump($local);
	//exit();

	$page = new PageProf();	

	$page->setTpl("turmas-por-temporada-estagiario", [
		'local'=>$local->getValues(),
		//'locais'=>Local::listAll(),
		'locais'=>Local::listAllCoord($iduser),
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmatemporadaLocal($idtemporada, $idlocal),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});

$app->get("/prof/atualiza/turmatemporada/:idturma/:idtemporada/:desctemporada/:status", function($idturma, $idtemporada, $desctemporada, $status) {

	User::verifyLoginProf();
	
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

$app->get("/prof/controle-frequencia-por-modalidade-local/:idtemporada/:idmodal/:idlocal", function($idtemporada, $idmodal, $idlocal) {

	User::verifyLoginProf();

	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	$temporada = new Temporada();
	$turma = new Turma();
	$modalidade = new Modalidade();
	$local = new Local();
	$temporada->get((int)$idtemporada);
	$modalidade->get((int)$idmodal);
	$local->get((int)$idlocal);

	$modalidade = $modalidade->getdescmodal();

	$modalidades = Modalidade::getModalidadesTemporadaLocalByIdUser($idtemporada, $idlocal, $iduser);

	$local = $local->getapelidolocal();

	$page = new PageProf([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("controle-frequencia-modalidades-local", [
		'modalidade'=>$modalidade,
		'idlocal'=>$idlocal,
		'local'=>$local,
		'modalidades'=>$modalidades,
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmaTemporadaControleFrequenciaModalLocalUser($idtemporada, $idmodal, $idlocal, $iduser),
		//'turmas'=>Temporada::listAllTurmaTemporadaControleFrequenciaModalLocal($idtemporada, $idmodal, $idlocal),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		//'countIncricoesJan'=>$countIncricoesJan,
		'error'=>User::getError()
	]);	
});

$app->get("/prof/controle-frequencia-coordenador-por-modalidade-local/:idtemporada/:idmodal/:idlocal", function($idtemporada, $idmodal, $idlocal) {

	User::verifyLoginProf();

	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	$temporada = new Temporada();
	$turma = new Turma();
	$modalidade = new Modalidade();
	$local = new Local();
	$temporada->get((int)$idtemporada);
	$modalidade->get((int)$idmodal);
	$local->get((int)$idlocal);

	$modalidade = $modalidade->getdescmodal();

	//$modalidades = Modalidade::getModalidadesTemporadaLocalByIdUser($idtemporada, $idlocal, $iduser);
	$modalidades = Modalidade::getModalidadesTemporadaByLocal($idtemporada, $idlocal);

	$local = $local->getapelidolocal();

	$page = new PageProf([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("controle-frequencia-coordenador-modalidades-local", [
		'modalidade'=>$modalidade,
		'idlocal'=>$idlocal,
		'local'=>$local,
		'modalidades'=>$modalidades,
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'turmas'=>Temporada::listAllTurmaTemporadaControleFrequenciaModalLocal($idtemporada, $idmodal, $idlocal),
		//'turmaNotRelated'=>$temporada->getTurma(false)
		//'countIncricoesJan'=>$countIncricoesJan,
		'error'=>User::getError()
	]);	
});

$app->get("/prof/turmatemporada/datas-inicio-fim/:idturma/:idtemporada/:iddata/:novadata", function($idturma, $idtemporada, $iddata, $novadata){


		if($iddata == 1){
			Temporada::AlteraDataInicioInsc($idturma, $idtemporada, $novadata);
				$texto = "Data Inicio das Inscrições alterado!";
		}

		if($iddata == 2){
			Temporada::AlteraDataFimInsc($idturma, $idtemporada, $novadata);
				$texto = "Data Inicio das Inscrições alterado!";
		}

		if($iddata == 3){
			Temporada::AlteraDataInicioMatr($idturma, $idtemporada, $novadata);
				$texto = "Data Inicio das Inscrições alterado!";
		}

		if($iddata == 4){
			Temporada::AlteraDataFimMatr($idturma, $idtemporada, $novadata);
				$texto = "Data Inicio das Inscrições alterado!";
		}

		if($iddata == 5){
			Temporada::AlteraDataInicioAula($idturma, $idtemporada, $novadata);
				$texto = "Data Inicio das Inscrições alterado!";
		}

		if($iddata == 6){
			Temporada::AlteraDataFimAula($idturma, $idtemporada, $novadata);
				$texto = "Data Inicio das Inscrições alterado!";
		}



		
});







?>