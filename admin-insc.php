<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Insc;
use \Sbc\Model\Pessoa;
use \Sbc\Model\Turma;
use \Sbc\Model\Temporada;
use \Sbc\Model\InscStatus;

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

$app->get("/admin/profile/insc/:idinsc/:idpess", function($idinsc, $idpess){

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

	if(!$inscricoes){

		User::setError("Inscrição(ões) não encontrada(s)!!!");
		header("Location: /admin/pessoas");
		exit();			
	}

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
	$turma = new Turma();
	$user = new User();
	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);
	$turma->get((int)$idturma);

	$idusersessao = (int)$_SESSION['User']['iduser'];

	$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);	
	
	$insc->getInscByTurmaTemporada($idturma, $idtemporada);
	
	$page = new PageAdmin();	

	$page->setTpl("insc-turma-temporada", [
		'iduserprof'=>$iduserprof,
		'insc'=>$insc->getValues(),
		'turma'=>$turma->getValues(),
		'temporada'=>$temporada->getValues()
	]);	
});

$app->get("/insc/:idinsc/:iduserprof/:idturma/statusMatriculada", function($idinsc, $iduserprof, $idturma){

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();
	$user = new User();
	
	$insc->get((int)$idinsc);

	$idturma = (int)$idturma;
	$idtemporada = $insc->getidtemporada();
	$iduser = (int)$iduserprof;

	$insc->alteraStatusInscricaoMatriculada($idinsc, $idturma, $idtemporada);

	header("Location: /admin/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduser."");
	exit();

});

$app->get("/insc/:idinsc/:iduserprof/:idturma/statusAguardandoMatricula", function($idinsc, $iduserprof, $idturma){

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();
	$user = new User();
	
	$insc->get((int)$idinsc);

	$idturma = (int)$idturma;
	$idtemporada = $insc->getidtemporada();
	$iduser = (int)$iduserprof;

	$insc->alteraStatusInscricaoAguardandoMatricula($idinsc);

	header("Location: /admin/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduser."");
	exit();

});

$app->get("/insc/:idinsc/:iduserprof/:idturma/statusDesistente", function($idinsc, $iduserprof, $idturma){

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();
	$user = new User();
	
	$insc->get((int)$idinsc);

	$idturma = (int)$idturma;
	$idtemporada = $insc->getidtemporada();
	$iduser = (int)$iduserprof;

	$insc->alteraStatusInscricaoDesistente($idinsc, $idturma, $idtemporada);

	header("Location: /admin/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduser."");
	exit();

});

?>
