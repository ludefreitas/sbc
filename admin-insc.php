<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Insc;
use \Sbc\Model\Pessoa;
use \Sbc\Model\Turma;
use \Sbc\Model\Temporada;
use \Sbc\Model\InscStatus;
use \Sbc\Model\Sorteio;

$app->get("/admin/insc", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Insc::getPageSearchInsc($search, $page);

	} else {

		$pagination = Insc::getPageInsc($page, $itemsPerPage = 10);
	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/insc?'.http_build_query([
			'page'=>$x+1,
			'search'=>$search
			]),
			'text'=>$x+1
		]);

	}
	//$insc = insc::listAll();

	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("insc", array( // aqui temos um array com muitos arrays
		"insc"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>User::getError()
	));
});

$app->get("/admin/insc/:idtemporada", function($idtemporada) {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Insc::getPageSearchInscTemporada($search, $page, $idtemporada);


	} else {

		$pagination = Insc::getPageInscTemporada($page, $itemsPerPage = 10, $idtemporada);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>"/admin/insc/".$idtemporada."?".http_build_query([
			'page'=>$x+1,
			'search'=>$search
			]),
			'text'=>$x+1
		]);

	}

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$desctemporada = $temporada->getdesctemporada();

	
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("insc-temporada", array( // aqui temos um array com muitos arrays
		"temporada"=>$desctemporada,
		"insc"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>User::getError()
	));
});



$app->get("/admin/insc/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("insc-create");
});

$app->post("/admin/insc/create", function() {

	User::verifyLogin();

	$insc = new Insc();

	$insc->setData($_POST);

	$insc->save();

	header("Location: /admin/insc");
	exit();
});

$app->get("/admin/insc/:idinsc/delete", function($idinsc) {

	User::verifyLogin();

	$insc = new Insc();

	$insc->get((int)$idinsc);

	$insc->delete();

	header("Location: /admin/insc");
	exit();
	
});

/*
$app->get("/admin/insc/:idinsc", function($idinsc) {

	User::verifyLogin();

	$insc = new Insc();

	$insc->get((int)$idinsc);

	$page = new PageAdmin();

	$page->setTpl("insc-update", [
		'insc'=>$insc->getValues()
	]);	
	
});
*/

/*
$app->post("/admin/insc/:idinsc", function($idinsc) {

	User::verifyLogin();

	$insc = new Insc();

	$insc->get((int)$idinsc);

	$insc->setData($_POST);

	$insc->save();

	header("Location: /admin/insc");
	exit();		
});
*/

/*
$app->get("/insc/:idinsc", function($idinsc) {

	$insc = new Insc();

	$insc->get((int)$idinsc);

	$page = new Page();

	$page->setTpl("insc", [
		'insc'=>$insc->getValues()
	]);	

});
*/

$app->get("/admin/profile/insc/:idinsc/:idpess/:idturma", function($idinsc, $idpess, $idturma){

	User::verifyLogin();

	$insc = new Insc();

	$insc->get((int)$idinsc);

	if( !$insc->getidinsc()){

		User::setError("Inscrição selecionada não existe!");
		header("Location: /admin/insc");
		exit();			
	}

	if( $insc->getidpess() != $idpess){

		User::setError("Aluno selecionado não está relacionado para esta inscrição!");
		header("Location: /admin/insc");
		exit();			
	}

	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);	

	//$insc = Insc::getFromId($idinsc);

	$page = new PageAdmin();

	$page->setTpl("insc-detail", [
		'insc'=>$insc->getValues(),
		'idturma'=>$idturma,
		'pessoa'=>$pessoa->getValues()
	]);	
});

/*

$app->get("/admin/insc/pessoa/:idpess", function($idpess){

	User::verifyLogin();

	$insc = new Insc();

	$insc->get((int)$idpess);
	//$insc->get((int)$idpess);		

	echo '<pre>';
	print_r($insc);
	echo '</pre>';
	exit();

	$page = new PageAdmin();

	$page->setTpl("insc-pessoa", [
		'insc'=>$insc->getValues()
	]);	

});

*/

$app->get("/admin/insc/pessoa/:idepess", function($idpess){

	User::verifyLogin();

	$pessoa = new Pessoa;

	$pessoa->get((int)$idpess);

	$inscricoes = $pessoa->getInsc();

	//var_dump($inscricoes[0]['idinsc']);
	//exit();

	$page = new PageAdmin();

	$page->setTpl("insc-pessoa", [
		'insc'=>$inscricoes,
		'pessoa'=>$pessoa->getValues()
	]);

});

$app->get("/admin/insc-turma-temporada/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	User::verifyLogin();

	$insc = new Insc();
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
	
	$insc->getInscByTurmaTemporada($idturma, $idtemporada);
	$inscPcd->getInscByTurmaTemporadaPcd($idturma, $idtemporada);
	$inscPlm->getInscByTurmaTemporadaPlm($idturma, $idtemporada);
	$inscPvs->getInscByTurmaTemporadaPvs($idturma, $idtemporada);

	$vagas = (int)$turma->getvagas();

	$numMatriculados = $temporada->setNummatriculadosTemporada($idtemporada, $idturma);	

	$numMatriculados= $numMatriculados['nummatriculados'];
	
	$page = new PageAdmin();	

	$page->setTpl("insc-turma-temporada", [
		'iduserprof'=>$iduserprof,
		'insc'=>$insc->getValues(),
		'inscPcd'=>$inscPcd->getValues(),
		'inscPlm'=>$inscPlm->getValues(),
		'inscPvs'=>$inscPvs->getValues(),
		'turma'=>$turma->getValues(),
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError(),
		'success'=>User::getSuccess(),
		'vagas'=>$vagas,
		'numMatriculados'=>$numMatriculados
	]);	
});

$app->get("/admin/insc/:idinsc/:iduserprof/:idturma/statusMatriculada", function($idinsc, $iduserprof, $idturma){

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();
	$user = new User();
	
	$insc->get((int)$idinsc);	

	$idturma = (int)$idturma;
	$idtemporada = $insc->getidtemporada();
	$iduser = (int)$iduserprof;

	$turma->get((int)$idturma);

	$vagas = (int)$turma->getvagas();

	$numMatriculados = $temporada->setNummatriculadosTemporada($idtemporada, $idturma);	

	if($numMatriculados['nummatriculados'] >= $vagas){

		$numcpf = $insc->getnumcpf();	

		if(Turma::temTokenCpf($idturma, $numcpf)){

			$insc->alteraStatusInscricaoMatriculada($idinsc, $idturma, $idtemporada);
			Turma::setUsedTokenCpf($idturma, $numcpf);
			//User::setSuccess("Aluno matriculado com sucesso!");		
			echo "<script>alert('Aluno matriculado com sucesso!');";
			echo "javascript:history.go(-1)</script>";
			//header("Location: /admin/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduser."");
			//exit();

		}else{

			//User::setError("Número de vagas insuficiente para efetuar matrícula!");
			echo "<script>alert('Número de vagas insuficiente para efetuar matrícula! Gere um token para autorizar a matrícula.');";
			echo "javascript:history.go(-1)</script>";	
			exit;	
			//header("Location: /admin/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduser."");
			//exit();
		}	
	}else{

		$insc->alteraStatusInscricaoMatriculada($idinsc, $idturma, $idtemporada);
		echo "<script>alert('Aluno matriculado com sucesso!');";
			echo "javascript:history.go(-1)</script>";
	}	

});

$app->get("/admin/insc/:idinsc/:iduserprof/:idturma/statusAguardandoMatricula", function($idinsc, $iduserprof, $idturma){

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();
	$user = new User();
	$pessoa = new Pessoa();
	
	$insc->get((int)$idinsc);
	$idpess = $insc->getidpess();
	$pessoa->get((int)$idpess);
	$nomepess = $pessoa->getnomepess();

	$person = User::getUserIdPess($idpess);
	$desperson = $person[0]['desperson'];
	$email = $person[0]['desemail'];

	$idturma = (int)$idturma;
	$idtemporada = $insc->getidtemporada();
	$desctemporada = $insc->getdesctemporada();
	$iduser = (int)$iduserprof;
	$turma->get((int)$idturma);

	$insc->alteraStatusInscricaoAguardandoMatricula($idinsc);

	$insc->emailIformarVagaDisponivel($idinsc, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $idtemporada, $iduser);

	//header("Location: /admin/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduser."");
	//exit();

});

$app->get("/admin/insc/:idinsc/:iduserprof/:idturma/statusSorteada", function($idinsc, $iduserprof, $idturma){

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();
	$user = new User();
	
	$insc->get((int)$idinsc);

	$idturma = (int)$idturma;
	$idtemporada = $insc->getidtemporada();
	$iduser = (int)$iduserprof;

	$insc->alteraStatusInscricaoSorteada($idinsc);

	echo '<script>javascript:history.go(-1)</script>';

	//header("Location: /admin/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduser."");
	//exit();

});

$app->get("/admin/insc/:idinsc/:iduserprof/:idturma/enviarEmailASorteado", function($idinsc, $iduserprof, $idturma){

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();
	$user = new User();
	$pessoa = new Pessoa();
	//$sorteio = new Sorteio();	
	$insc->get((int)$idinsc);
	$idturma = (int)$idturma;
	$idtemporada = $insc->getidtemporada();
	$iduserprof = (int)$iduserprof;
	$idpess = $insc->getidpess();
	$pessoa->get((int)$idpess); 

	$insc->alteraStatusInscricaoAguardandoMatricula($idinsc);

	$status = $insc->getdescstatus();
	//$email = $insc->getdeslogin();
	$nomepess = $pessoa->getnomepess();
	$dtnasc = $pessoa->getdtnasc();
	$idade = calcularIdade($dtnasc);
	$person = User::getUserIdPess($idpess);
	$desperson = $person[0]['desperson'];
	$email = $person[0]['desemail'];
	$desctemporada = $insc->getdesctemporada();
	$numerosorteado = $insc->getnumsorte();
	$numeroordenado = $insc->getnumordem();
	$turma->get((int)$idturma);

	//$insc->inscricaoEmail($idinsc, $numerosorteado, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma);

	$insc->sorteioEmail($idinsc, $numerosorteado, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $idade, $numeroordenado, $idtemporada, $iduserprof);

	//header("Location: /admin/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduserprof."");
	//exit();

});

$app->get("/admin/insc/:idinsc/:idturma/:idpess/statusDesistente", function($idinsc, $idturma, $idpess){

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();
	$user = new User();
	$pessoa = new Pessoa();
	
	$insc->get((int)$idinsc);

	//$idturma = (int)$idturma;
	$idtemporada = $insc->getidtemporada();
	$idpess = (int)$idpess;

	$insc->alteraStatusInscricaoDesistente($idinsc, $idturma, $idtemporada);

	echo '<script>javascript:history.go(-1)</script>';
	//header("Location: /admin/profile/insc/".$idinsc."/".$idpess."/".$idturma."");
	//exit();

});

$app->get("/admin/insc-turma-temporada-matricular/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	User::verifyLogin(false);

	$insc = new Insc();
	$turma = new Turma();
	$user = new User();
	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);
	$turma->get((int)$idturma);

	$idusersessao = (int)$_SESSION['User']['iduser'];

	$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);	
	
	$insc->getInscByTurmaTemporadaMatricular($idturma, $idtemporada);

	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);
	
	$page->setTpl("insc-turma-temporada-matricular", [
		'iduserprof'=>$iduserprof,
		//'total'=>$total,
		'insc'=>$insc->getValues(),
		'turma'=>$turma->getValues(),
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError(),
		'success'=>User::getSuccess()
	]);	
});

$app->get("/admin/insc-turma-temporada-chamada/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	User::verifyLogin(false);

	$insc = new Insc();
	$inscCountChamada = new Insc();
	$turma = new Turma();
	$user = new User();
	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);
	$turma->get((int)$idturma);

	$idusersessao = (int)$_SESSION['User']['iduser'];

	$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);	
	
	/*
	if(($idturma == 264) || ($idturma == 265) || ($idturma == 266) || ($idturma == 267) || ($idturma == 447) || ($idturma == 448) || ($idturma == 449)){

		$insc->getInscByTurmaTemporadaChamadaCursos($idturma, $idtemporada);

	}else{
		
		$insc->getInscByTurmaTemporadaChamada($idturma, $idtemporada);
	}
	*/

	$insc->getInscByTurmaTemporadaChamada($idturma, $idtemporada);

	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);
	
	$page->setTpl("insc-turma-temporada-chamada", [
		'iduserprof'=>$iduserprof,
		//'total'=>$total,
		'insc'=>$insc->getValues(),
		'turma'=>$turma->getValues(),
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError(),
		'success'=>User::getSuccess()
	]);	
});

?>
