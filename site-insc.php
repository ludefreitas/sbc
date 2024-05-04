<?php

use \Sbc\Page;
use \Sbc\Model\Pessoa;
use \Sbc\Model\User;
use \Sbc\Model\Insc;
use \Sbc\Model\Turma;
use \Sbc\Model\Temporada;
use \Sbc\Model\Local;

$app->get("/profile/insc", function(){

	User::verifyLogin(false);

	$user = User::getFromSession();
	$anoAtual = (int)date('Y');

	$page = new Page();

	$page->setTpl("profile-insc", [
		'anoAtual'=>$anoAtual,
		'insc'=>$user->getInsc()
	]);

});

$app->get("/profile/insc/:idinsc/:idepess", function($idinsc, $idpess){

	User::verifyLogin(false);

	$insc = new Insc();

	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess); 

	$insc->get((int)$idinsc);

	$page = new Page();

	$page->setTpl("profile-insc-detail", [
		'insc'=>$insc->getValues(),
		'pessoa'=>$pessoa->getValues(),
		'erroInsc'=>Insc::getError(),
		'success'=>Insc::getSuccess()
	]);	
});

$app->get("/insc/:idinsc/statusCancelada", function($idinsc){

	$insc = new Insc();
	$temporada = new Temporada();

	$insc->get((int)$idinsc);
	$idtemporada = $insc->getidtemporada();
	$temporada->get((int)$idtemporada);
	$desctemporada = (int)$temporada->getdesctemporada();
	$desctemporadaAtual = (int)date('Y');

	if($desctemporada < $desctemporadaAtual){
		echo "<script>alert('Não é permitido excluir esta inscrição. Turma e temporada encerradas!!');";
        echo "javascript:history.go(-1)</script>";	
        exit;	
	}

	$insc->alteraStatusInscricaoCancelada($idinsc);

	echo "<script>window.location.href = '/profile/insc'</script>";
	//header('Location: /profile/insc');
	exit();

});

$app->get("/insc-turma-temporada-valida/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	//User::verifyLogin(false);

	$insc = new Insc();
	$turma = new Turma();
	$user = new User();
	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);
	$turma->get((int)$idturma);

	$idusersessao = (int)$_SESSION['User']['iduser'];

	$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);	
	
	$insc->getInscByTurmaTemporadaValida($idturma, $idtemporada);

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);
	
	$page->setTpl("insc-turma-temporada-valida", [
		'iduserprof'=>$iduserprof,
		'insc'=>$insc->getValues(),
		'turma'=>$turma->getValues(),
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError(),
		'success'=>User::getSuccess()
	]);	
});

$app->get("/insc-turma-temporada-para-sorteio/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	//User::verifyLogin(false);

	$insc = new Insc();
	$inscAmp= new Insc();
	$inscPcd = new Insc();
	$inscPlm = new Insc();
	$inscPvs = new Insc();
	$turma = new Turma();
	$user = new User();
	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);
	$turma->get((int)$idturma);

	$idusersessao = (int)$_SESSION['User']['iduser'];

	$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);	
	
	$insc->getInscByTurmaTemporadaParaSorteio($idturma, $idtemporada);
	$inscAmp->getInscByTurmaTemporadaParaSorteioAmpla($idturma, $idtemporada);
	$inscPcd->getInscByTurmaTemporadaParaSorteioPcd($idturma, $idtemporada);
	$inscPlm->getInscByTurmaTemporadaParaSorteioPlm($idturma, $idtemporada);
	$inscPvs->getInscByTurmaTemporadaParaSorteioPvs($idturma, $idtemporada);

	//$totalinsc = $insc->countInscByTurmaTemporadaValida($idturma, $idtemporada);

	//$total = $totalinsc[0]['total'];

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);
	
	$page->setTpl("insc-turma-temporada-para-sorteio", [
		'iduserprof'=>$iduserprof,
		//'total'=>$total,
		'insc'=>$insc->getValues(),
		'inscAmp'=>$inscAmp->getValues(),
		'inscPcd'=>$inscPcd->getValues(),
		'inscPlm'=>$inscPlm->getValues(),
		'inscPvs'=>$inscPvs->getValues(),
		'turma'=>$turma->getValues(),
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError(),
		'success'=>User::getSuccess()
	]);	
});

$app->get("/insc-turma-temporada-para-sorteio-geral/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	//User::verifyLogin(false);

	$insc = new Insc();
	//$inscAmp= new Insc();
	//$inscPcd = new Insc();
	//$inscPlm = new Insc();
	//$inscPvs = new Insc();
	$turma = new Turma();
	$user = new User();
	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);
	$turma->get((int)$idturma);

	$idusersessao = (int)$_SESSION['User']['iduser'];

	$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);	
	
	$insc->getInscByTurmaTemporadaParaSorteioGeral($idturma, $idtemporada);
	//$inscAmp->getInscByTurmaTemporadaParaSorteioAmpla($idturma, $idtemporada);
	//$inscPcd->getInscByTurmaTemporadaParaSorteioPcd($idturma, $idtemporada);
	//$inscPlm->getInscByTurmaTemporadaParaSorteioPlm($idturma, $idtemporada);
	//$inscPvs->getInscByTurmaTemporadaParaSorteioPvs($idturma, $idtemporada);

	//$totalinsc = $insc->countInscByTurmaTemporadaValida($idturma, $idtemporada);

	//$total = $totalinsc[0]['total'];

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);
	
	$page->setTpl("insc-turma-temporada-para-sorteio-geral", [
		'iduserprof'=>$iduserprof,
		//'total'=>$total,
		'insc'=>$insc->getValues(),
		//'inscAmp'=>$inscAmp->getValues(),
		//'inscPcd'=>$inscPcd->getValues(),
		//'inscPlm'=>$inscPlm->getValues(),
		//'inscPvs'=>$inscPvs->getValues(),
		'turma'=>$turma->getValues(),
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError(),
		'success'=>User::getSuccess()
	]);	
});

$app->get("/insc-turma-temporada-classificadas/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	//User::verifyLogin(false);

	$insc = new Insc();
	$inscAmp= new Insc();
	$inscPcd = new Insc();
	$inscPlm = new Insc();
	$inscPvs = new Insc();
	$inscCountAmp = new Insc();
	$inscCountPlm = new Insc();
	$inscCountPcd = new Insc();
	$inscCountPvs = new Insc();
	$turma = new Turma();
	$user = new User();
	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);
	$turma->get((int)$idturma);

	$idusersessao = (int)$_SESSION['User']['iduser'];

	$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);	
	
	//$insc->getInscByTurmaTemporadaClassificadasGeral($idturma, $idtemporada);
	$inscAmp->getInscByTurmaTemporadaClassificadasAmpla($idturma, $idtemporada);
	$inscPcd->getInscByTurmaTemporadaClassificadasPcd($idturma, $idtemporada);
	$inscPlm->getInscByTurmaTemporadaClassificadasPlm($idturma, $idtemporada);
	$inscPvs->getInscByTurmaTemporadaClassificadasPvs($idturma, $idtemporada);
	
	$inscCountAmp->getInscByTurmaTemporadaCountClassificadasAmpla($idturma, $idtemporada);
	$inscCountPlm->getInscByTurmaTemporadaCountClassificadasPlm($idturma, $idtemporada);
	$inscCountPcd->getInscByTurmaTemporadaCountClassificadasPcd($idturma, $idtemporada);
	$inscCountPvs->getInscByTurmaTemporadaCountClassificadasPvs($idturma, $idtemporada);

	//$totalinsc = $insc->countInscByTurmaTemporadaValida($idturma, $idtemporada);

	//$total = $totalinsc[0]['total'];

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);
	
	$page->setTpl("insc-turma-temporada-classificadas", [
		'iduserprof'=>$iduserprof,
		//'total'=>$total,
		//'insc'=>$insc->getValues(),
		'inscAmp'=>$inscAmp->getValues(),
		'inscPcd'=>$inscPcd->getValues(),
		'inscPlm'=>$inscPlm->getValues(),
		'inscPvs'=>$inscPvs->getValues(),
		'inscCountAmp'=>$inscCountAmp->getValues(),
		'inscCountPlm'=>$inscCountPlm->getValues(),
		'inscCountPcd'=>$inscCountPcd->getValues(),
		'inscCountPvs'=>$inscCountPvs->getValues(),
		'turma'=>$turma->getValues(),
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError(),
		'success'=>User::getSuccess()
	]);	
});

$app->get("/insc-turma-temporada-listaespera/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	//User::verifyLogin(false);

	$insc = new Insc();
	$inscAmp= new Insc();
	$inscPcd = new Insc();
	$inscPlm = new Insc();
	$inscPvs = new Insc();
	$inscCountAmp = new Insc();
	$inscCountPlm = new Insc();
	$inscCountPcd = new Insc();
	$inscCountPvs = new Insc();
	$turma = new Turma();
	$user = new User();
	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);
	$turma->get((int)$idturma);

	$idusersessao = (int)$_SESSION['User']['iduser'];

	$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);	
	
	$inscAmp->getInscByTurmaTemporadaListaEsperaAmpla($idturma, $idtemporada);
	$inscPcd->getInscByTurmaTemporadaListaEsperaPcd($idturma, $idtemporada);
	$inscPlm->getInscByTurmaTemporadaListaEsperaPlm($idturma, $idtemporada);
	$inscPvs->getInscByTurmaTemporadaListaEsperaPvs($idturma, $idtemporada);

	$inscCountAmp->getInscByTurmaTemporadaCountListaEsperaAmpla($idturma, $idtemporada);
	$inscCountPlm->getInscByTurmaTemporadaCountListaEsperaPlm($idturma, $idtemporada);
	$inscCountPcd->getInscByTurmaTemporadaCountListaEsperaPcd($idturma, $idtemporada);
	$inscCountPvs->getInscByTurmaTemporadaCountListaEsperaPvs($idturma, $idtemporada);

	//var_dump($inscCountAmp->getValues());
	//exit;

	//$totalinsc = $insc->countInscByTurmaTemporadaValida($idturma, $idtemporada);

	//$total = $totalinsc[0]['total'];

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);
	
	$page->setTpl("insc-turma-temporada-listaespera", [
		'iduserprof'=>$iduserprof,
		//'total'=>$total,
		//'insc'=>$insc->getValues(),
		'inscAmp'=>$inscAmp->getValues(),
		'inscPcd'=>$inscPcd->getValues(),
		'inscPlm'=>$inscPlm->getValues(),
		'inscPvs'=>$inscPvs->getValues(),
		'inscCountAmp'=>$inscCountAmp->getValues(),
		'inscCountPlm'=>$inscCountPlm->getValues(),
		'inscCountPcd'=>$inscCountPcd->getValues(),
		'inscCountPvs'=>$inscCountPvs->getValues(),
		'turma'=>$turma->getValues(),
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError(),
		'success'=>User::getSuccess()
	]);	
});


$app->get("/insc-turma-temporada-crec-valida/:idlocal/:idtemporada", function($idlocal, $idtemporada) {

    User::verifyLogin(true);

	$insc = new Insc();
	$local = new Local();
	$turma = new Turma();
	$user = new User();
	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);
	//$turma->get((int)$idturma);
	$local->get((int)$idlocal);

	$idusersessao = (int)$_SESSION['User']['iduser'];

	//$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);	
	
	$insc->getInscByTurmaTemporadaCrecValida($idlocal, $idtemporada);

	//$totalinsc = $insc->countInscByTurmaTemporadaValida($idturma, $idtemporada);

	//$total = $totalinsc[0]['total'];

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);
	
	$page->setTpl("insc-turma-temporada-crec-valida", [
		//'iduserprof'=>$iduserprof,
		//'total'=>$total,
		'insc'=>$insc->getValues(),
		//'turma'=>$turma->getValues(),
		'local'=>$local->getValues(),
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError(),
		'success'=>User::getSuccess()
	]);	
});

/*
$app->get("/insc", function(){

	User::verifyLogin(false);

	$insc = new Insc();

	$page = new Page();

	$page->setTpl("insc", [
		'insc'=>$insc->getValues()
	]);
});
*/

/*
$app->get("/insc/:idinsc", function($idinsc){

	User::verifyLogin(false);

	$insc = new Insc();

	$insc->get((int)$idinsc);

	//$page = new Page();

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("insc", [
		'insc'=>$insc->getValues()
	]);

});
*/	




?>