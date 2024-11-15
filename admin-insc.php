<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Insc;
use \Sbc\Model\Pessoa;
use \Sbc\Model\Turma;
use \Sbc\Model\Temporada;
use \Sbc\Model\InscStatus;
use \Sbc\Model\Sorteio;
use \Sbc\Model\Agenda;
use \Sbc\Model\Modalidade;
use \Sbc\Model\Local;

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

	$locais = Local::listAll();

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>"/admin/insc/".$idtemporada."?".http_build_query([
			'page'=>$x+1,
			'search'=>$search,
			'idtemporada'=>$idtemporada,
			'locais'=>$locais
			]),
			'text'=>$x+1
		]);
	}

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$insc = new Insc();

	//$totalinscmatriculadastemporada = $insc->GetInscMatriculadasTemporada($idtemporada);
	$totalinscmatriculadastemporada = Insc::GetInscMatriculadasTemporada($idtemporada);

	$desctemporada = $temporada->getdesctemporada();

	$SomaDeVagasByTemporada = (int)Turma::getSomaVagasByDescTemporada($desctemporada);	
	$SomaDeVagasPcdByTemporada = (int)Turma::getSomaVagasPcdByDescTemporada($desctemporada);	
	$SomaDeVagasLaudoByTemporada = (int)Turma::getSomaVagasLaudoByDescTemporada($desctemporada);
	$SomaDeVagasPvsByTemporada = (int)Turma::getSomaVagasPvsByDescTemporada($desctemporada);
	
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("insc-temporada", array( // aqui temos um array com muitos arrays
		"temporada"=>$desctemporada,
		"insc"=>$pagination['data'],
		"total"=>$pagination['total'],
		"totalmatriculados"=>$totalinscmatriculadastemporada[0]['count(*)'],
		"somadevagas"=>$SomaDeVagasByTemporada,
		"somadevagaspcd"=>$SomaDeVagasPcdByTemporada,
		"somadevagaslaudo"=>$SomaDeVagasLaudoByTemporada,
		"somadevagaspvs"=>$SomaDeVagasPvsByTemporada,
		"search"=>$search,
		"pages"=>$pages,
		"idtemporada"=>$idtemporada,
		"locais"=>$locais,
		"error"=>User::getError()
	));
});

	$app->get("/admin/insc-local/:idtemporada/:idlocal", function($idtemporada, $idlocal) {

		User::verifyLogin();
		// na linha abaixo retorna um array com todos os dados do usuário

		$search = (isset($_GET['search'])) ? $_GET['search'] : "";

		$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

		if ($search != '') {

			$pagination = Insc::getPageSearchInscTemporadaLocal($search, $page, $idtemporada, $idlocal);


		} else {

			$pagination = Insc::getPageInscTemporadaLocal($page, $itemsPerPage = 10, $idtemporada, $idlocal);

		}

		$locais = Local::listAll();

		$pages = [];

		for ($x = 0; $x < $pagination['pages']; $x++)
		{

			array_push($pages, [
				'href'=>"/admin/insc-local/".$idtemporada."/".$idlocal."?".http_build_query([
				'page'=>$x+1,
				'search'=>$search,
				'idtemporada'=>$idtemporada,
				'locais'=>$locais,
				]),
				'text'=>$x+1
			]);
		}

		$temporada = new Temporada();
		$local = new Local();

		$temporada->get((int)$idtemporada);
		$local->get((int)$idlocal);

		$insc = new Insc();
		$totalinscmatriculadaslocal = $insc->GetInscMatriculadasTemporadaLocal($idtemporada, $idlocal);

		//var_dump($totalinscmatriculadaslocal[0]['count(*)']);

		$desctemporada = $temporada->getdesctemporada();
		$apelidolocal = $local->getapelidolocal();

		$SomaDeVagasByLocalTemporada = (int)Turma::getSomaVagasByLocalDescTemporada($idlocal, $desctemporada);
		$SomaDeVagasPcdByLocalTemporada = (int)Turma::getSomaVagasPcdByLocalDescTemporada($idlocal, $desctemporada);	
		$SomaDeVagasLaudoByLocalTemporada = (int)Turma::getSomaVagasLaudoByLocalDescTemporada($idlocal, $desctemporada);
		$SomaDeVagasPvsByLocalTemporada = (int)Turma::getSomaVagasPvsByLocalDescTemporada($idlocal, $desctemporada);
		
		$page = new PageAdmin();

		// envia para a página o array retornado pelo listAll
		$page->setTpl("insc-temporada-local", array( // aqui temos um array com muitos arrays
			"temporada"=>$desctemporada,
			"local"=>$apelidolocal,
			"idlocal"=>$idlocal,
			"insc"=>$pagination['data'],
			"total"=>$pagination['total'],
			"totalmatriculados"=>$totalinscmatriculadaslocal[0]['count(*)'],
			"somadevagas"=>$SomaDeVagasByLocalTemporada,
			"somadevagaspcd"=>$SomaDeVagasPcdByLocalTemporada,
			"somadevagaslaudo"=>$SomaDeVagasLaudoByLocalTemporada,
			"somadevagaspvs"=>$SomaDeVagasPvsByLocalTemporada,
			"search"=>$search,
			"pages"=>$pages,
			"idtemporada"=>$idtemporada,
			"locais"=>$locais,
			"error"=>User::getError()
		));
	});

$app->get("/admin/insc-pcd/:idtemporada", function($idtemporada) {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Insc::getPageSearchInscTemporadaPcd($search, $page, $idtemporada);


	} else {

		$pagination = Insc::getPageInscTemporadaPcd($page, $itemsPerPage = 10, $idtemporada);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>"/admin/insc-pcd/".$idtemporada."?".http_build_query([
			'page'=>$x+1,
			'search'=>$search,
			'idtemporada'=>$idtemporada,
			]),
			'text'=>$x+1
		]);

	}

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$insc = new Insc();

	//$totalinscmatriculadastemporada = $insc->GetInscMatriculadasTemporada($idtemporada);
	$totalinscmatriculadastemporada = Insc::GetInscPcdMatriculadasTemporada($idtemporada);

	$desctemporada = $temporada->getdesctemporada();

	//$SomaDeVagasByTemporada = new Turma();

	$SomaDeVagasPcdByTemporada = (int)Turma::getSomaVagasPcdByDescTemporada($desctemporada);
	
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("insc-temporada-pcd", array( // aqui temos um array com muitos arrays
		"temporada"=>$desctemporada,
		"insc"=>$pagination['data'],
		"total"=>$pagination['total'],
		"totalmatriculados"=>$totalinscmatriculadastemporada[0]['count(*)'],
		"somadevagaspcd"=>$SomaDeVagasPcdByTemporada,
		"search"=>$search,
		"pages"=>$pages,
		"idtemporada"=>$idtemporada,
		"error"=>User::getError()
	));
});

$app->get("/admin/listapessoas-insc-temporada/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);	


	$listapessoas = Insc::listaPessoasInscPorTemporada($idtemporada);

	if(!isset($listapessoas) || $listapessoas == NULL){
		echo "<script>alert('Não há inscritos para esta temporada');";
		echo "javascript:history.go(-1)</script>";
	}else{

		$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
		]);

		$page->setTpl("listapessoasinscportemporada", [
		'listapessoas'=>$listapessoas
		]);
	}
	
});

$app->get("/admin/listapessoas-insc-temporada-pcd/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);	


	$listapessoas = Insc::listaPessoasInscPorTemporadaPcd($idtemporada);

	if(!isset($listapessoas) || $listapessoas == NULL){
		echo "<script>alert('Não há inscritos para esta temporada');";
		echo "javascript:history.go(-1)</script>";
	}else{

		$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
		]);

		$page->setTpl("listapessoasinscportemporada", [
		'listapessoas'=>$listapessoas
		]);
	}
	
});

$app->get("/admin/insc-pessoa-vazio/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$insc = new Insc;
	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);	
	$desctemporada = $temporada->getdesctemporada();

	$inscvazio = $insc->inscPessoaVazioTbCarts($idtemporada);

	$page = new PageAdmin();

	$page->setTpl("insc-pessoa-vazio", array( 
		"insc"=>$inscvazio,
		"desctemporada"=>$desctemporada,
		"idtemporada"=>$idtemporada,
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

	echo "<script>window.location.href = '/admin/insc'</script>";
	//header("Location: /admin/insc");
	exit();
});

$app->get("/admin/insc/:idinsc/delete", function($idinsc) {

	User::verifyLogin();

	$insc = new Insc();

	$insc->get((int)$idinsc);

	$insc->delete();

	echo "<script>window.location.href = '/admin/insc'</script>";
	//header("Location: /admin/insc");
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
		echo "<script>window.location.href = '/admin/insc'</script>";
		//header("Location: /admin/insc");
		exit();			
	}

	if( $insc->getidpess() != $idpess){

		User::setError("Aluno selecionado não está relacionado para esta inscrição!");
		echo "<script>window.location.href = '/admin/insc'</script>";
		//header("Location: /admin/insc");
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

$app->get("/admin/profile/insc-audi/:idinsc/:idpess/:idturma", function($idinsc, $idpess, $idturma){

	User::verifyLoginAudi();

	$insc = new Insc();

	$insc->get((int)$idinsc);

	if( !$insc->getidinsc()){

		echo "<script>alert('Inscrição selecionada não existe!');";
    			echo "javascript:history.go(-1)</script>";	
	}

	if( $insc->getidpess() != $idpess){

		echo "<script>alert('Aluno selecionado não está relacionado para esta inscrição!');";
    			echo "javascript:history.go(-1)</script>";	
	}

	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);	

	//$insc = Insc::getFromId($idinsc);

	$page = new PageAdmin();

	$page->setTpl("insc-detail-audi", [
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

$app->get("/admin/insc/pessoa/:idepess/:numcpf", function($idpess, $numcpf){

	User::verifyLogin();

	$pessoa = new Pessoa;

	$pessoa->get((int)$idpess);

	//$inscricoes = $pessoa->getInsc();
	$inscricoes = $pessoa->getInscNumCpf($numcpf);

    /*
	if(!$inscricoes){

		User::setError("Inscrição(ões) não encontrada(s)!!!");
		header("Location: /admin/pessoas");
		exit();			
	}
	*/

	//var_dump($inscricoes[0]['idinsc']);
	//exit();

	$page = new PageAdmin();

	$page->setTpl("insc-pessoa", [
		'insc'=>$inscricoes,
		'pessoa'=>$pessoa->getValues()
	]);

});

$app->get("/admin/insc/pessoa-audi/:idepess", function($idpess){

	User::verifyLoginAudi();

	$pessoa = new Pessoa;

	$pessoa->get((int)$idpess);

	$inscricoes = $pessoa->getInsc();

	//var_dump($inscricoes[0]['idinsc']);
	//exit();

	$page = new PageAdmin();

	$page->setTpl("insc-pessoa-audi", [
		'insc'=>$inscricoes,
		'pessoa'=>$pessoa->getValues()
	]);

});

$app->get("/admin/insc-turma-temporada/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	User::verifyLogin();
	
	$inscTodas = new Insc();
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
	
	$inscTodas->getInscByTurmaTemporadaTodas($idturma, $idtemporada);
	$insc->getInscByTurmaTemporada($idturma, $idtemporada);
	$inscPcd->getInscByTurmaTemporadaPcd($idturma, $idtemporada);
	$inscPlm->getInscByTurmaTemporadaPlm($idturma, $idtemporada);
	$inscPvs->getInscByTurmaTemporadaPvs($idturma, $idtemporada);

	/*
	$idinscInscTodas = Insc::getIdinscInscByTurmaTemporadaTodas($idturma, $idtemporada); 

	//$idinscInscTodas = Insc::getIdinscInscByTemporadaTodas($idtemporada); 

	//var_dump(count($idinscInscTodas));
	//exit();

	for ($x = 0; $x < count($idinscInscTodas); $x++){

		$idinsc = $idinscInscTodas[''.$x.'']['idinsc'];
			$idturma = $idinscInscTodas[''.$x.'']['idturma'];
			$idtemporada = $idinscInscTodas[''.$x.'']['idtemporada'];
			$numcpf = $idinscInscTodas[''.$x.'']['numcpf'];

			//var_dump($numcpf);
	        //exit();
			
			//Insc::updateCpfByIdinscIdturmaIdtemporada($idinsc, $idturma, $idtemporada);
			//Insc::updateIdpessoaByIdinscIdturmaIdtemporada($idinsc, $idturma, $idtemporada);
			Insc::updateIdpessoaByIdinscIdturmaIdtemporadaComCpf($idinsc, $idturma, $idtemporada, $numcpf);
		    
	}
	*/
	
	
	$vagas = (int)$turma->getvagas();

	$numMatriculados = $temporada->setNummatriculadosTemporada($idtemporada, $idturma);	

	$numMatriculados= $numMatriculados['nummatriculados'];
	
	$page = new PageAdmin();	

	$page->setTpl("insc-turma-temporada", [
		'iduserprof'=>$iduserprof,
		'insc'=>$insc->getValues(),
		'inscTodas'=>$inscTodas->getValues(),
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

$app->get("/admin/insc-turma-temporada-audi/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	User::verifyLoginAudi();

	$inscTodas = new Insc();
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
	
	$inscTodas->getInscByTurmaTemporadaTodas($idturma, $idtemporada);
	$insc->getInscByTurmaTemporada($idturma, $idtemporada);
	$inscPcd->getInscByTurmaTemporadaPcd($idturma, $idtemporada);
	$inscPlm->getInscByTurmaTemporadaPlm($idturma, $idtemporada);
	$inscPvs->getInscByTurmaTemporadaPvs($idturma, $idtemporada);

	$vagas = (int)$turma->getvagas();

	$numMatriculados = $temporada->setNummatriculadosTemporada($idtemporada, $idturma);	

	$numMatriculados= $numMatriculados['nummatriculados'];
	
	$page = new PageAdmin();	

	$page->setTpl("insc-turma-temporada-audi", [
		'iduserprof'=>$iduserprof,
		'insc'=>$insc->getValues(),
		'inscTodas'=>$inscTodas->getValues(),
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
    
    User::verifyLoginProf();

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();
	$user = new User();
	
	$insc->get((int)$idinsc);	

	$idturma = (int)$idturma;
	$idtemporada = $insc->getidtemporada();
	$iduser = (int)$iduserprof;

	$turma->get((int)$idturma);

	$idturmastatus = $temporada->getStatusTurmaTemporada($idturma, $idtemporada);

	if($idturmastatus == 6){
		echo "<script>alert('Você precisa alterar o status da turma, nesta temporada, para ( 3 - Inscrições abertas ) e assim alterar o status da inscrição.');";
		echo "javascript:history.go(-1)</script>";	
		exit;	
	}
	
	$dtInicmatricula = $insc->getdtinicmatricula();
	$hoje = date('Y-m-d H:i:s');

	$temporada->get((int)$idtemporada);
	$desctemporada = (int)$temporada->getdesctemporada();
	$desctemporadaAtual = (int)date('Y');

	if($desctemporada < $desctemporadaAtual){
		echo "<script>alert('Não é permitido fazer a matrícua desta inscrição. Turma e temporada encerradas!!');";
        echo "javascript:history.go(-1)</script>";	
        exit;	
	}

	if($hoje < $dtInicmatricula){
	    
	    $turma->get((int)$idturma);
	    $idmodal = (int)$turma->getidmodal();
	    
	    if($idmodal != 60){

	     	$dtInicmatricula = date('d-m-Y H:i:s', strtotime($dtInicmatricula));
    
    		echo "<script>alert('A matrícula só poderá ser efetuada a partir de ".$dtInicmatricula."!!');";
    		echo "javascript:history.go(-1)</script>";
    		exit();

	    }
	}
	
    $turma->get((int)$idturma);
        
    $vagas = (int)$turma->getvagas();
        
    $numMatriculados = $temporada->setNummatriculadosTemporada($idtemporada, $idturma);	
        
    if($numMatriculados['nummatriculados'] >= $vagas){
        
       	$numcpf = $insc->getnumcpf();
       		
       	$tokencpf = Turma::getTokenPorCpfeTurma($numcpf, $idturma);	
        
       	if(Turma::temTokenCpf($idturma, $numcpf)){
        
       		$insc->alteraStatusInscricaoMatriculada($idinsc, $idturma, $idtemporada);
        	Turma::setUsedTokenCpf($idturma, $tokencpf);
       		echo "<script>alert('Aluno matriculado com sucesso!');";
        	echo "javascript:history.go(-1)</script>";
        
        }else{
        
        	echo "<script>alert('Número de vagas insuficiente para efetuar matrícula! Gere um token para autorizar a matrícula.');";
        	echo "javascript:history.go(-1)</script>";	
        	exit();	
        
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

	$temporada->get((int)$idtemporada);
	$desctemporadaAtual = (int)date('Y');

	if($desctemporada < $desctemporadaAtual){
		echo "<script>alert('Não é permitido altrar o stautus desta inscrição. Turma e temporada encerradas!!');";
        echo "javascript:history.go(-1)</script>";	
        exit;	
	}
	
	$idturmastatus = $temporada->getStatusTurmaTemporada($idturma, $idtemporada);
	
	if($idturmastatus == 6){
		echo "<script>alert('Você precisa alterar o status da turma, nesta temporada, para ( 3  - Inscrições abertas ) e assim alterar o status da inscrição.');";
        			echo "javascript:history.go(-1)</script>";	
        			exit;	
	}

	$insc->alteraStatusInscricaoAguardandoMatricula($idinsc);

	$insc->emailIformarVagaDisponivel($idinsc, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $idtemporada, $iduser);
	
	// Alterar essa linha quando email for enviado.
	//$insc->alteraStatusInscricaoAguardandoMatricula($idinsc);

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
	$sorteio = new Sorteio();	
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

	$temporada->get((int)$idtemporada);
	$desctemporada = (int)$temporada->getdesctemporada();
	$desctemporadaAtual = (int)date('Y');

	if($desctemporada != $desctemporadaAtual){
		echo "<script>alert('Não é permitido marcar como desistente uma inscrição que não seja da temporada atual.');";
        echo "javascript:history.go(-1)</script>";	
        exit;	
	}	

	$insc->alteraStatusInscricaoDesistente($idinsc, $idturma, $idtemporada);
    echo '<script>javascript:history.go(-1)</script>';
	//header("Location: /admin/profile/insc/".$idinsc."/".$idpess."/".$idturma."");
	//exit();

});

$app->get("/admin/insc/:idinsc/:idturma/:idpess/statusSuspensaDesistente", function($idinsc, $idturma, $idpess){

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();
	$user = new User();
	$pessoa = new Pessoa();
	
	$insc->get((int)$idinsc);

	$idturma = (int)$idturma;
	$idtemporada = $insc->getidtemporada();
	$idpess = (int)$idpess;

	$temporada->get((int)$idtemporada);
	$desctemporada = (int)$temporada->getdesctemporada();
	$desctemporadaAtual = (int)date('Y');

	if($desctemporada != $desctemporadaAtual){
		echo "<script>alert('Não é permitido marcar como desistente uma inscrição que não seja da temporada atual.');";
        echo "javascript:history.go(-1)</script>";	
        exit;	
	}	

	$insc->alteraStatusInscricaoSuspensaParaDesistente($idinsc, $idturma, $idtemporada);
	
	echo '<script>javascript:history.go(-1)</script>';

});

$app->get("/admin/insc/:idinsc/:idturma/:idpess/statusSuspender", function($idinsc, $idturma, $idpess){

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();
	$user = new User();
	$pessoa = new Pessoa();
	
	$insc->get((int)$idinsc);

	$idturma = (int)$idturma;
	$idtemporada = $insc->getidtemporada();
	$idpess = (int)$idpess;

	$temporada->get((int)$idtemporada);
	$desctemporada = (int)$temporada->getdesctemporada();
	$desctemporadaAtual = (int)date('Y');

	if($desctemporada != $desctemporadaAtual){
        echo "Não é permitido suspender uma inscrição que não seja da temporada atual!";
        exit;        	
	}	

	//Atualizar arquivos do admin e do estagiário com a função suspender matricula e rematricular

	$insc->alteraStatusInscricaoSuspender($idinsc, $idturma, $idtemporada);
	
	echo 'Inscrição '.$idinsc.' suspensa! Atualize a lista.';

});

$app->get("/admin/insc/:idinsc/:idturma/:idpess/statusRematricular", function($idinsc, $idturma, $idpess){

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();
	$user = new User();
	$pessoa = new Pessoa();
	
	$insc->get((int)$idinsc);

	$idturma = (int)$idturma;
	$idtemporada = $insc->getidtemporada();
	$idpess = (int)$idpess;

	$temporada->get((int)$idtemporada);
	$desctemporada = (int)$temporada->getdesctemporada();
	$desctemporadaAtual = (int)date('Y');

	if($desctemporada != $desctemporadaAtual){
        echo "Não é permitido rematricular uma inscrição que não seja da temporada atual!";
        exit;        	
	}	

	$insc->alteraStatusInscricaoRematricular($idinsc, $idturma, $idtemporada);
	
	echo '['.$idinsc.']Rematricula efetuada com sucesso! Atualize a lista.';

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

$app->get("/admin/calendario-lista-presenca/:idtemporada/:idturma", function($idtemporada, $idturma) {

	User::verifyLogin(false);

	$turma = new Turma();
	$insc = new Insc();

	$turma->get((int)$idturma);	

	$descturma = $turma->getdescturma();

	$dias_da_semana = $turma->getdiasemana();

	$dias_da_semana = explode(" ", $dias_da_semana);

	for($i = 0; $i < count($dias_da_semana); $i ++) {

		$dia1 = $dias_da_semana[0];

		if(isset($dias_da_semana[2])){
			$dia2 = $dias_da_semana[2];
		}else{
			$dia2 = "";
		}	

		if(isset($dias_da_semana[1])){
			$dias_da_semana[1] = $dias_da_semana[1];
		}else{
			$dias_da_semana[1] = "";
		}	
	}

	if($dias_da_semana[1] === 'a'){
	    
	    if(($dia1 === "Segunda") AND ($dia2 === "Quinta")){
			$unicodiasemana = 99;			
			$primeirodiasemana = 0;
			$segundodiasemana = 1;		
			$terceirodiasemana = 2;
			$quartodiasemana = 3;
			$quintodiasemana = 99 ;
		}				

		if(($dia1 === "Segunda") AND ($dia2 === "Sexta")){
			$unicodiasemana = 99;			
			$primeirodiasemana = 0;
			$segundodiasemana = 1;		
			$terceirodiasemana = 2;
			$quartodiasemana = 3;
			$quintodiasemana = 4 ;
		}

		if(($dia1 === "Terça") AND ($dia2 === "Sexta")){
			$unicodiasemana = 99;			
			$primeirodiasemana = 99;
			$segundodiasemana = 1;		
			$terceirodiasemana = 2;
			$quartodiasemana = 3;
			$quintodiasemana = 4 ;
		}				

	}else{	

		if(($dia1 === "Segunda") AND ($dia2 === "Quarta")){
			$unicodiasemana = 99;
			$primeirodiasemana = 0;
			$segundodiasemana = 2;	
			$terceirodiasemana = 99;
			$quartodiasemana = 99;
			$quintodiasemana = 99 ;	
		}
		if(($dia1 === "Segunda") AND ($dia2 === "Quinta")){
			$unicodiasemana = 99;
			$primeirodiasemana = 0;
			$segundodiasemana = 3;	
			$terceirodiasemana = 99;
			$quartodiasemana = 99;
			$quintodiasemana = 99 ;		
		}
		if(($dia1 === "Segunda") AND ($dia2 === "Sexta")){
			$unicodiasemana = 99;
			$primeirodiasemana = 0;
			$segundodiasemana = 4;	
			$terceirodiasemana = 99;
			$quartodiasemana = 99;
			$quintodiasemana = 99 ;		
		}
		if(($dia1 === "Terça") AND ($dia2 === "Quinta")){
			$unicodiasemana = 99;
			$primeirodiasemana = 1;
			$segundodiasemana = 3;	
			$terceirodiasemana = 99;
			$quartodiasemana = 99;
			$quintodiasemana = 99 ;		
		}
		if(($dia1 === "Quarta") AND ($dia2 === "Sexta")){
			$unicodiasemana = 99;
			$primeirodiasemana = 2;
			$segundodiasemana = 4;		
			$terceirodiasemana = 99;
			$quartodiasemana = 99;
			$quintodiasemana = 99 ;	
		}
		if(($dia1 === "Segunda") AND ($dia2 === "")){
			$unicodiasemana = 0;
			$primeirodiasemana = 99;
			$segundodiasemana = 99;		
			$terceirodiasemana = 99;
			$quartodiasemana = 99;
			$quintodiasemana = 99 ;			
		}
		if(($dia1 === "Terça") AND ($dia2 === "")){
			$unicodiasemana = 1;
			$primeirodiasemana = 99;
			$segundodiasemana = 99;	
			$terceirodiasemana = 99;
			$quartodiasemana = 99;
			$quintodiasemana = 99 ;				
		}
		if(($dia1 === "Quarta") AND ($dia2 === "")){
			$unicodiasemana = 2;
			$primeirodiasemana = 99;
			$segundodiasemana = 99;	
			$terceirodiasemana = 99;
			$quartodiasemana = 99;
			$quintodiasemana = 99 ;		
		}
		if(($dia1 === "Quinta") AND ($dia2 === "")){
			$unicodiasemana = 3;
			$primeirodiasemana = 99;
			$segundodiasemana = 99;	
			$terceirodiasemana = 99;
			$quartodiasemana = 99;
			$quintodiasemana = 99 ;		
		}
		if(($dia1 === "Sexta") AND ($dia2 === "")){
			$unicodiasemana = 4;
			$primeirodiasemana = 99;
			$segundodiasemana = 99;	
			$terceirodiasemana = 99;
			$quartodiasemana = 99;
			$quintodiasemana = 99 ;		
		}
		if(($dia1 === "Sábado") AND ($dia2 === "")){
			$unicodiasemana = 5;
			$primeirodiasemana = 99;
			$segundodiasemana = 99;	
			$terceirodiasemana = 99;
			$quartodiasemana = 99;
			$quintodiasemana = 99 ;		
		}
		if(($dia1 === "Domingo") AND ($dia2 === "")){
			$unicodiasemana = 6;
			$primeirodiasemana = 99;
			$segundodiasemana = 99;	
			$terceirodiasemana = 99;
			$quartodiasemana = 99;
			$quintodiasemana = 99 ;		
		}
	}	

	$page = new PageAdmin();

	$page->setTpl("calendario-lista-presenca", [
		'idturma'=>$idturma,
		'descturma'=>$descturma,
		'dia1'=>$dia1,
		'dia2'=>$dia2,
		'primeirodiasemana'=>$primeirodiasemana,
		'segundodiasemana'=>$segundodiasemana,
		'terceirodiasemana'=>$terceirodiasemana,
		'quartodiasemana'=>$quartodiasemana,
		'quintodiasemana'=>$quintodiasemana,
		'unicodiasemana'=>$unicodiasemana,
		'idtemporada'=>$idtemporada,
		'error'=>Agenda::getMsgError()
	]);	
});

$app->get("/admin/insc-turma-temporada-fazer-chamada/:idtemporada/:idturma/:data/:diasemana/:iduser", function($idtemporada, $idturma, $data, $diasemana, $iduser) {

	User::verifyLogin(false);
	$turma = new Turma();
	$turma->get((int)$idturma);
	$insc = new Insc();
	$temporada = new Temporada;

	$mesRetrasado = date('m', strtotime('-2 month'));

	Insc::deleteAusencia_aulaMesRetrasado($mesRetrasado);

	$temporada->get((int)$idtemporada);
	$desctemporada = $temporada->getdesctemporada();	

	if( Insc::getInscByTurmaTemporadaMatriculadosDataListaChamada($idturma, $idtemporada, $data) != NULL ){

		$insc = Insc::getInscByTurmaTemporadaMatriculadosDataListaChamada($idturma, $idtemporada, $data);
			
	}else{

		$insc = Insc::getInscByTurmaTemporadaMatriculados($idturma, $idtemporada);	
	}	

	if( Insc::getInscByTurmaTemporadaMatriculadosSuspensoDataListaChamada($idturma, $idtemporada, $data) != NULL ){

		$inscMatrSusp = Insc::getInscByTurmaTemporadaMatriculadosSuspensoDataListaChamada($idturma, $idtemporada, $data);

	}else{

		$inscMatrSusp = Insc::getInscByTurmaTemporadaMatriculadosSuspenso($idturma, $idtemporada);	
	}

	if( Insc::getInscByTurmaTemporadaExcluidoFaltaDataListaChamada($idturma, $idtemporada, $data) != NULL ){

		$inscExclFalta = Insc::getInscByTurmaTemporadaExcluidoFaltaDataListaChamada($idturma, $idtemporada, $data);

	}else{

		$inscExclFalta = Insc::getInscByTurmaTemporadaExcluidoFalta($idturma, $idtemporada);	
	}

	$statuspresenca = 4;

	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);

	if(!Insc::temChamadaData($data, $idturma)){	    

		for($x = 0; $x<count($insc); $x++){				
			$idinsc = (int)$insc[$x]['idinsc'];
			Insc::save_presenca($idinsc, $statuspresenca, $data);
		}	

		$insc = Insc::getInscByTurmaTemporadaMatriculadosDataListaChamada($idturma, $idtemporada, $data);

		for($x = 0; $x < count($inscMatrSusp); $x++){				
    		$idinsc = (int)$inscMatrSusp[$x]['idinsc'];
    		Insc::save_presenca($idinsc, $statuspresenca, $data);
    	}    	

    	$inscMatrSusp = Insc::getInscByTurmaTemporadaMatriculadosSuspensoDataListaChamada($idturma, $idtemporada, $data);

    	for($x = 0; $x < count($inscExclFalta); $x++){				
    		$idinsc = (int)$inscExclFalta[$x]['idinsc'];
    		Insc::save_presenca($idinsc, $statuspresenca, $data);
    	}    	

    	$inscExclFalta = Insc::getInscByTurmaTemporadaExcluidoFaltaDataListaChamada($idturma, $idtemporada, $data);

		$mes = date('m', strtotime($data));
		$dias_do_mes = new Insc();
		$dias_do_mes = Insc::GetDiasDoMesPresenca((int)$idtemporada,(int)$idturma,(int)$mes);	

		$nomemes = 'JANEIRO';
		if($mes == '02'){
			$nomemes = 'FEVEREIRO';
		}
		if($mes == '03'){
			$nomemes = 'MARÇO';
		}
		if($mes == '04'){
			$nomemes = 'ABRIL';
		}
		if($mes == '05'){
			$nomemes = 'MAIO';
		}
		if($mes == '06'){
			$nomemes = 'JUNHO';
		}
		if($mes == '07'){
			$nomemes = 'JULHO';
		}
		if($mes == '08'){
			$nomemes = 'AGOSTO';
		}
		if($mes == '09'){
			$nomemes = 'SETEMBRO';
		}
		if($mes == '10'){
			$nomemes = 'OUTUBRO';
		}
		if($mes == '11'){
			$nomemes = 'NOVEMBRO';
		}
		if($mes == '12'){
			$nomemes = 'DEZEMBRO';
		}	

		if($diasemana == '0'){
			$nomediasemana = 'Segunda-feira';
		}
		if($diasemana == '1'){
			$nomediasemana = 'Terça-feira';
		}
		if($diasemana == '2'){
			$nomediasemana = 'Quarta-feira';
		}
		if($diasemana == '3'){
			$nomediasemana = 'Quinta-feira';
		}
		if($diasemana == '4'){
			$nomediasemana = 'Sexta-feira';
		}
		if($diasemana == '5'){
			$nomediasemana = 'Sábado';
		}
		if($diasemana == '6'){
			$nomediasemana = 'Domingo';
		}

		for ($i=0; $i < count($insc) ; $i++) { 
			//$insc[$i]['hoje_mes_dia'] = date('m-d');

			$insc[$i]['data_mes_dia'] = substr($data, 5);

			$mesDiaNiver = $insc[$i]['dtnasc'];

			$insc[$i]['mes_dia_niver'] = substr($mesDiaNiver, 5);
		}

		$page->setTpl("insc-turma-temporada-fazer-chamada", [
			'iduser'=>$iduser,
			'turma'=>$turma->getValues(),
			'data'=>$data,
			'idtemporada'=>$idtemporada,
			'desctemporada'=>$desctemporada,
			'insc'=>$insc,
			'inscMatrSusp'=>$inscMatrSusp,
    		'inscExclFalta'=>$inscExclFalta,
			'diasemana'=>$diasemana,
			'nomediasemana'=>$nomediasemana,
			'dias_do_mes'=>$dias_do_mes,
			'mes'=>$mes,
			'nomemes'=>$nomemes,
			'error'=>Agenda::getMsgError()
		]);		

	}else{

		$mes = date('m', strtotime($data));
		$dias_do_mes = new Insc();
		$dias_do_mes = Insc::GetDiasDoMesPresenca((int)$idtemporada,(int)$idturma,(int)$mes);	

		$nomemes = 'JANEIRO';
	
		if($mes == '02'){
			$nomemes = 'FEVEREIRO';
		}
		if($mes == '03'){
			$nomemes = 'MARÇO';
		}
		if($mes == '04'){
			$nomemes = 'ABRIL';
		}
		if($mes == '05'){
			$nomemes = 'MAIO';
		}
		if($mes == '06'){
			$nomemes = 'JUNHO';
		}
		if($mes == '07'){
			$nomemes = 'JULHO';
		}
		if($mes == '08'){
			$nomemes = 'AGOSTO';
		}
		if($mes == '09'){
			$nomemes = 'SETEMBRO';
		}
		if($mes == '10'){
			$nomemes = 'OUTUBRO';
		}
		if($mes == '11'){
			$nomemes = 'NOVEMBRO';
		}
		if($mes == '12'){
			$nomemes = 'DEZEMBRO';
		}

		if($diasemana == '0'){
			$nomediasemana = 'Segunda-feira';
		}
		if($diasemana == '1'){
			$nomediasemana = 'Terça-feira';
		}
		if($diasemana == '2'){
			$nomediasemana = 'Quarta-feira';
		}
		if($diasemana == '3'){
			$nomediasemana = 'Quinta-feira';
		}
		if($diasemana == '4'){
			$nomediasemana = 'Sexta-feira';
		}
		if($diasemana == '5'){
			$nomediasemana = 'Sábado';
		}
		if($diasemana == '6'){
			$nomediasemana = 'Domingo';
		}

		for ($i=0; $i < count($insc) ; $i++) { 
			//$insc[$i]['hoje_mes_dia'] = date('m-d');

			$insc[$i]['data_mes_dia'] = substr($data, 5);

			$mesDiaNiver = $insc[$i]['dtnasc'];

			$insc[$i]['mes_dia_niver'] = substr($mesDiaNiver, 5);
		}
	
		$page->setTpl("insc-turma-temporada-fazer-chamada", [
			'iduser'=>$iduser,
			'turma'=>$turma->getValues(),
			'data'=>$data,
			'idtemporada'=>$idtemporada,
			'desctemporada'=>$desctemporada,
			'insc'=>$insc,
			'inscMatrSusp'=>$inscMatrSusp,
    		'inscExclFalta'=>$inscExclFalta,
			'diasemana'=>$diasemana,
			'nomediasemana'=>$nomediasemana,
			'dias_do_mes'=>$dias_do_mes,
			'mes'=>$mes,
			'nomemes'=>$nomemes,
			'error'=>Agenda::getMsgError()
		]);	
	}
});

$app->get("/admin/insc-turma-temporada-mes-chamada-atualizada/:idtemporada/:idturma/:mes", function($idtemporada, $idturma, $mes) {

	User::verifyLogin();
	$turma = new Turma();
	$turma->get((int)$idturma);
	$insc = new Insc();
	$temporada = new Temporada;
	$temporada->get((int)$idtemporada);
	$desctemporada = $temporada->getdesctemporada();	
	//$insc = Insc::getInscByTurmaTemporadaMatriculados($idturma, $idtemporada);
	//$insc = Insc::getInscByTurmaTemporadaMatriculadosDesistentes($idturma, $idtemporada);	
	//$insc = Insc::getInscByTurmaTemporadaMatriculadosDesistentesSuspensas($idturma, $idtemporada);	
	$insc = Insc::getInscByTurmaTemporadaMatriculadosDesistentesSuspensasExcPorFalta($idturma, $idtemporada);
	
	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);
	    $dias_do_mes = new Insc();
	    $dias_do_mes = Insc::GetDiasDoMesPresencaDescTemporada((int)$idtemporada,(int)$idturma,(int)$mes, $desctemporada);	

	    $nomemes = 'JANEIRO';
		if($mes == '02'){ $nomemes = 'FEVEREIRO'; }
		if($mes == '03'){ $nomemes = 'MARÇO'; }
		if($mes == '04'){ $nomemes = 'ABRIL'; }
		if($mes == '05'){ $nomemes = 'MAIO'; }
		if($mes == '06'){ $nomemes = 'JUNHO'; }
		if($mes == '07'){ $nomemes = 'JULHO'; }
		if($mes == '08'){ $nomemes = 'AGOSTO'; }
		if($mes == '09'){ $nomemes = 'SETEMBRO'; } 
		if($mes == '10'){ $nomemes = 'OUTUBRO'; }
		if($mes == '11'){ $nomemes = 'NOVEMBRO'; }
		if($mes == '12'){ $nomemes = 'DEZEMBRO'; }
		
    	$page->setTpl("insc-turma-temporada-mes-chamada-atualizada", [
    		'turma'=>$turma->getValues(),
    		'idtemporada'=>$idtemporada,
    		'desctemporada'=>$desctemporada,
    		'insc'=>$insc,
    		'dias_do_mes'=>$dias_do_mes,
    		'mes'=>$mes,
    		'nomemes'=>$nomemes,
    		'error'=>Agenda::getMsgError()
    	]);	    
});

$app->get("/admin/insc-turma-temporada-chamada-mensal/:idtemporada/:idturma/:data", function($idtemporada, $idturma, $data) {

	User::checkLoginProf();
	$turma = new Turma();
	$turma->get((int)$idturma);
	$insc = new Insc();
	$temporada = new Temporada;
	$temporada->get((int)$idtemporada);
	$desctemporada = $temporada->getdesctemporada();	

	if( Insc::getInscByTurmaTemporadaMatriculadosDataListaChamada($idturma, $idtemporada, $data) != NULL ){

		$insc = Insc::getInscByTurmaTemporadaMatriculadosDataListaChamada($idturma, $idtemporada, $data);
			
	}else{

		$insc = Insc::getInscByTurmaTemporadaMatriculados($idturma, $idtemporada);	
	}	

	$statuspresenca = 4;

	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);
	
	/*

	if(!Insc::temChamadaData($data, $idturma)){	    

		for($x = 0; $x<count($insc); $x++){				
			$idinsc = (int)$insc[$x]['idinsc'];
			Insc::save_presenca($idinsc, $statuspresenca, $data);
		}	

		$insc = Insc::getInscByTurmaTemporadaMatriculadosDataListaChamada($idturma, $idtemporada, $data);

		$mes = date('m', strtotime($data));
		$dias_do_mes = new Insc();
		$dias_do_mes = Insc::GetDiasDoMesPresenca((int)$idtemporada,(int)$idturma,(int)$mes);	

		$nomemes = 'JANEIRO';
		if($mes == '02'){
			$nomemes = 'FEVEREIRO';
		}
		if($mes == '03'){
			$nomemes = 'MARÇO';
		}
		if($mes == '04'){
			$nomemes = 'ABRIL';
		}
		if($mes == '05'){
			$nomemes = 'MAIO';
		}
		if($mes == '06'){
			$nomemes = 'JUNHO';
		}
		if($mes == '07'){
			$nomemes = 'JULHO';
		}
		if($mes == '08'){
			$nomemes = 'AGOSTO';
		}
		if($mes == '09'){
			$nomemes = 'SETEMBRO';
		}
		if($mes == '10'){
			$nomemes = 'OUTUBRO';
		}
		if($mes == '11'){
			$nomemes = 'NOVEMBRO';
		}
		if($mes == '12'){
			$nomemes = 'DEZEMBRO';
		}	

		$page->setTpl("insc-turma-temporada-chamada-mensal", [
			'turma'=>$turma->getValues(),
			'data'=>$data,
			'idtemporada'=>$idtemporada,
			'desctemporada'=>$desctemporada,
			'insc'=>$insc,
			'dias_do_mes'=>$dias_do_mes,
			'mes'=>$mes,
			'nomemes'=>$nomemes,
			'error'=>Agenda::getMsgError()
		]);		

	}else{
	
	*/

        
		$mes = date('m', strtotime($data));
		$dias_do_mes = new Insc();
		$dias_do_mes = Insc::GetDiasDoMesPresenca((int)$idtemporada,(int)$idturma,(int)$mes);	

		$nomemes = 'JANEIRO';
	
		if($mes == '02'){
			$nomemes = 'FEVEREIRO';
		}
		if($mes == '03'){
			$nomemes = 'MARÇO';
		}
		if($mes == '04'){
			$nomemes = 'ABRIL';
		}
		if($mes == '05'){
			$nomemes = 'MAIO';
		}
		if($mes == '06'){
			$nomemes = 'JUNHO';
		}
		if($mes == '07'){
			$nomemes = 'JULHO';
		}
		if($mes == '08'){
			$nomemes = 'AGOSTO';
		}
		if($mes == '09'){
			$nomemes = 'SETEMBRO';
		}
		if($mes == '10'){
			$nomemes = 'OUTUBRO';
		}
		if($mes == '11'){
			$nomemes = 'NOVEMBRO';
		}
		if($mes == '12'){
			$nomemes = 'DEZEMBRO';
		}
	
		$page->setTpl("insc-turma-temporada-chamada-mensal", [
			'turma'=>$turma->getValues(),
			'data'=>$data,
			'idtemporada'=>$idtemporada,
			'desctemporada'=>$desctemporada,
			'insc'=>$insc,
			'dias_do_mes'=>$dias_do_mes,
			'mes'=>$mes,
			'nomemes'=>$nomemes,
			'error'=>Agenda::getMsgError()
		]);	
	//}
});


$app->get("/admin/insc-turma-temporada-presente/:idtemporada/:idturma/:data/:idinsc", function($idtemporada, $idturma, $data, $idinsc) {

	//User::checkLoginProf();
	$insc = new Insc();	
	$insc->update_presente($idinsc, $data);

	/*
	if(Insc::existeAusenciaData($idinsc, $data) > 0){

		$is_ausencia_aula = 1;

		Insc::update_ausencia_aula($idinsc, $data, $is_ausencia_aula);

	}else{
		$is_ausencia_aula = 1;

		Insc::save_ausencia($idinsc, $data, $is_ausencia_aula);

	}
	*/

	//$fallback = "/prof/insc-turma-temporada-fazer-chamada/".$idtemporada."/".$idturma."/".$data."";

	//$anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;

	echo '<script>javascript:history.go(-1)</script>';

	//header("Location: /prof/insc-turma-temporada-fazer-chamada/".$idtemporada."/".$idturma."/".$data."");
		//exit();				
});

$app->get("/admin/insc-turma-temporada-ausente/:idtemporada/:idturma/:data/:idinsc", function($idtemporada, $idturma, $data, $idinsc) {

	//User::checkLoginProf();
	$insc = new Insc();
	$insc->update_ausente($idinsc, $data);

	/*
	if(Insc::existeAusenciaData($idinsc, $data) > 0){

		$is_ausencia_aula = 0;

		Insc::update_ausencia_aula($idinsc, $data, $is_ausencia_aula);

	}else{
		$is_ausencia_aula = 0;

		Insc::save_ausencia($idinsc, $data, $is_ausencia_aula);

	}
	*/	

	$isAusenciaAula = Insc::selectIsStatuspresencaAusente($idinsc);

	for ($i=0; $i < count($isAusenciaAula) ; $i++) { 
		
		if($isAusenciaAula[$i]['statuspresenca'] == 0){

			$AusenciaSim[] = array($isAusenciaAula[$i]['statuspresenca']);

		}
		
	}

	$countAusenciaSim = (int)count($AusenciaSim);

	if($countAusenciaSim === 4){
		
		$insc->alteraStatusInscricaoExcluirPorFalta($idinsc, $idturma, $idtemporada);
	}

	/*
	$isAusenciaAula = Insc::selectIsAusenciaAula($idinsc);

	for ($i=0; $i < count($isAusenciaAula) ; $i++) { 
		
		if($isAusenciaAula[$i]['is_ausencia_aula'] == 0){

			$AusenciaSim[] = array($isAusenciaAula[$i]['is_ausencia_aula']);

		}
		
	}

	$countAusenciaSim = (int)count($AusenciaSim);

	if($countAusenciaSim === 4){

		$insc->alteraStatusInscricaoExcluirPorFalta($idinsc, $idturma, $idtemporada);
		
	}
	*/

	echo '<script>javascript:history.go(-1)</script>';

	//header("Location: /prof/insc-turma-temporada-fazer-chamada/".$idtemporada."/".$idturma."/".$data."");
		//exit();				
});

$app->get("/admin/insc-turma-temporada-justificar/:idtemporada/:idturma/:data/:idinsc", function($idtemporada, $idturma, $data, $idinsc) {

	//User::checkLoginProf();
	$insc = new Insc();
	$insc->update_justificar($idinsc, $data);

	echo '<script>javascript:history.go(-1)</script>';

	//header("Location: /prof/insc-turma-temporada-fazer-chamada/".$idtemporada."/".$idturma."/".$data."");
		//exit();				
});

$app->get("/admin/insc-altera-turma-temporada/:idmodal/:idturma/:idtemporada/user/:iduser", function($idmodal, $idturma, $idtemporada, $iduser) {

	User::verifyLogin();
	
	$inscTodas = new Insc();
	$turma = new Turma();
	$user = new User();
	$temporada = new Temporada();
	$modalidade = new Modalidade();
	$temporada->get((int)$idtemporada);
	$turma->get((int)$idturma);
	$modalidade->get((int)$idmodal);

	$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);
	
	$inscTodas->getInscByTurmaTemporadaTodas($idturma, $idtemporada);
	
	
	$vagas = (int)$turma->getvagas();

	$numMatriculados = $temporada->setNummatriculadosTemporada($idtemporada, $idturma);	

	$numMatriculados= $numMatriculados['nummatriculados'];
	
	$page = new PageAdmin();	

	$page->setTpl("insc-altera-turma-temporada", [
		'iduserprof'=>$iduserprof,	
		'inscTodas'=>$inscTodas->getValues(),
		'turma'=>$turma->getValues(),
		'modalidade'=>$modalidade->getValues(),
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError(),
		'success'=>User::getSuccess(),
		'vagas'=>$vagas,
		'numMatriculados'=>$numMatriculados
	]);	
});

$app->post("/admin/insc/altera/turma", function(){

	User::verifyLogin();

	$listaidinsc = null;

	$iduser = (int)$_SESSION['User']['iduser'];

	if (isset($_POST['listaInsc'])){
	    $listaidinsc = $_POST['listaInsc'];
	}else{
		echo "<script>alert('Selecione uma ou mais inscricões.');";
		echo "javascript:history.go(-1)</script>";
		exit();    
	}

	if (!isset($_POST['desctemporadadestino']) || $_POST['desctemporadadestino'] == NULL){
		echo "<script>alert('Informe a temporada da turma de destino.');";
		echo "javascript:history.go(-1)</script>";
		exit();    
	}else{
	    $desctemporadadestino = $_POST['desctemporadadestino'];

	    $idtemporadadestino = Temporada::getIdTemporadaByDesctemporada($desctemporadadestino);

	    if($idtemporadadestino == 0){
	    	echo "<script>alert('Temporada informada não existe!');";
		echo "javascript:history.go(-1)</script>";
		exit();    
	    }
	}

	if (!isset($_POST['idturmadestino']) || $_POST['idturmadestino'] == NULL){
		echo "<script>alert('Informe a turma de destino.');";
		echo "javascript:history.go(-1)</script>";
		exit();    
	}else{
	    $idturmadestino = $_POST['idturmadestino'];	
	    $getidturmadestino = Temporada::getTurmaByIdturmaTemporada($idturmadestino, $idtemporadadestino);

	    if($getidturmadestino != $idturmadestino){

	    	echo "<script>alert('Turma de destino não existe.');";
			echo "javascript:history.go(-1)</script>";
			exit();    
		}
	}

	if (!isset($_POST['observacao']) || $_POST['observacao'] == NULL){

		echo "<script>alert('Informe o motivo da mudança de turma.');";
		echo "javascript:history.go(-1)</script>";
		exit();    
	}else{
	    $observacao = $_POST['observacao'];	
	}

	if (!isset($_POST['tipomove']) || $_POST['tipomove'] == NULL){

		echo "<script>alert('Informe o tipo da movimentação!');";
		echo "javascript:history.go(-1)</script>";
		exit();    
	}else{
	    $tipomove = $_POST['tipomove'];	
	}

	if ($listaidinsc !== null){

	    for ($i = 0; $i < count($listaidinsc); $i++){

	    	$insc = new Insc();
	    	$insc->get($listaidinsc[$i]);
	    	$insc = $insc->getValues();
	    	
	    	$idinscorigem = $insc['idinsc'];
	    	$idinscstatus = $insc['idinscstatus'];
	    	$idcart = $insc['idcart'];
	    	$idpessoa = $insc['idpessoa'];
	    	$numsorte = $insc['numsorte'];
	    	$laudo = $insc['laudo'];
	    	$inscpcd = $insc['inscpcd'];
	    	$inscpvs = $insc['inscpvs'];
	    	$idturmaorigem = $insc['idturma'];
	    	$idtemporadaorigem = $insc['idtemporada'];
	    	$desctemporadaorigem = $insc['desctemporada'];
	    	$idmodalorigem = $insc['idmodal'];
	    	$dtinscorigem = $insc['dtinsc'];
	    	$dtmatricorigem = $insc['dtmatric'];
	    	$numcpf = (isset($insc['numcpf'])) ? $insc['numcpf'] : '';

	    	$inscPresencaExiste = Insc::getPresencaExisteByIdinsc($idinscorigem);

	    	if(($_POST['tipomove']	== "substituir") && ($inscPresencaExiste > 0)){	    		
		    	echo "<script>alert('Você não pode substituir uma inscrição que já está na lista de chamada da turma atual, você só pode copiar. Copie e, se necessário, marque a inscrição da turma atual como desistente.');";
				echo "javascript:history.go(-1)</script>";
				exit();    	    		
	    	}	    	

	    	$idmodaldestino = Turma::getIdmodalByIdturma($idturmadestino);

	    	if((int)$desctemporadaorigem == (int)$desctemporadadestino){
	    		if(($_POST['tipomove']	== "substituir") && ($idmodalorigem != $idmodaldestino)){
		    		echo "<script>alert('Ao substituir, você não pode mover uma inscrição para uma turma de modalidade diferente da atual.');";
					echo "javascript:history.go(-1)</script>";
					exit();    
	    		}
	    	}	    	

	    	if((int)$desctemporadaorigem > (int)$desctemporadadestino){
	    		echo "<script>alert('Você não pode movimentar esta inscrição datemporada atual para a temporada passada.');";
				echo "javascript:history.go(-1)</script>";
				exit();    
	    	}

	    	if($idturmaorigem == $idturmadestino && $idtemporadaorigem == $idtemporadadestino){
	    		echo "<script>alert('Turma de destino não pode ser a mesma da origem.');";
				echo "javascript:history.go(-1)</script>";
				exit();    
	    	}

	      	$numOrdemMax = Insc::numMaxNumOrdem($idtemporadadestino, $idturmadestino);
			$numordem = $numOrdemMax[0]['maxNumOrdem'] + 1;		

	    	$insc = new Insc();

	    	$insc->setData([
				'idcart'=>$idcart,
				'idinscstatus'=>$idinscstatus,
				'numordem'=>$numordem,
				'laudo'=>$laudo,
				'inscpcd'=>$inscpcd,
				'inscpvs'=>$inscpvs,
				'idturma'=>$idturmadestino,
				'idtemporada'=>$idtemporadadestino,
				'numcpf'=>$numcpf,	
				'idpessoa'=>$idpessoa
			]);	

			$insc->save();	

	    	if($tipomove == 'substituir'){
	    		Insc::deleteInscByIdinsc($idinscorigem);
	    		if($idinscstatus == 1){
					Temporada::updateNumMatriculadosMenos($idturmaorigem, $idtemporadaorigem);
				}
				Temporada::updateNumInscritosMenos($idturmaorigem, $idtemporadaorigem);
	    	}
	    	Temporada::updateNumMatriculadosMais($idturmadestino, $idtemporadadestino);	
				
			$observacao = $_POST['observacao'];
			$idinscdestino = $insc->getidinsc();
			$dtmovimentacao = date('Y-m-d h:i:s');
			
	    	Insc::moveInscSave($idturmadestino, $idturmaorigem, $idinscdestino, $idinscorigem, $idtemporadadestino, $idtemporadaorigem, $tipomove, $observacao, $dtinscorigem, $dtmatricorigem, $dtmovimentacao);

	    	//echo 'Movimentação efetuada com sucesso!';
	    	//header("Location: /admin/insc-altera-turma-temporada/".$idturmaorigem."/".$idtemporadaorigem."/user/".$iduser);
			//exit();	
	   	}
	   	echo "<script>alert('Movimentação efetuada com sucesso!');";
	    echo "javascript:history.go(-1)</script>";

	}
});

$app->get("/admin/insc/delete/:idinsc/:idturma/:idtemporada/:idcart", function($idinsc, $idturma, $idtemporada, $idcart){

	User::verifyLogin();

	$insc = new Insc();

	$iduser = (int)$_SESSION['User']['iduser'];

	$insc->deleteInscWhereIdPessIsNull($idinsc, $idcart, $idturma, $idtemporada);

	Temporada::updateNumInscritosMenos($idturma, $idtemporada);

	echo "<script>alert('Exclusão efetuada com sucesso!');";
	 echo "javascript:history.go(-1)</script>";
	
});	

$app->get("/admin/insc-pessoas-temporada-pesquisa", function() {

	User::verifyLogin();

	$modalidade = Modalidade::listAll();
	$temporada = Temporada::listAll();

	$page = new PageAdmin();

	$page->setTpl("insc-pessoas-temporada-pesquisa", [
		'modalidade'=>$modalidade,
		'temporada'=>$temporada
	]);
});

$app->post("/admin/lista-pessoas-pesquisa", function() {

	User::verifyLogin();

	$initidade = $_POST['idadeinicial'];
	$fimidade = $_POST['idadefinal'];
	$descmodal = $_POST['descmodal'];
	$desctemporada = $_POST['desctemporada'];

	if (!isset($_POST['idadeinicial']) || $_POST['idadeinicial'] == '') {
		echo "<script>alert('informe a idade inicial');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}

	if (!isset($_POST['idadefinal']) || $_POST['idadefinal'] == '') {
		echo "<script>alert('Informe a idade final');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}

	if (!isset($_POST['descmodal']) || $_POST['descmodal'] == '') {
		echo "<script>alert('Informe a modalidade');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}

	if (!isset($_POST['desctemporada']) || $_POST['desctemporada'] == '') {
		echo "<script>alert('Informe a temporada');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}

	if ($initidade > $fimidade) {
		echo "<script>alert('A idade inicial não pode ser maior do que a idade final');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}
	
	$insc = new Insc();

	$listapessoas = Insc::getInscByTurmaTemporadaModalidadeMatriculados($desctemporada, $descmodal, $initidade, $fimidade);

	if(!isset($listapessoas) || $listapessoas == NULL){
		echo "<script>alert('Não há pessoas com relacionadas com os dados informados');";
		echo "javascript:history.go(-1)</script>";
	}else{

		$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
		]);

		$page->setTpl("listapessoaspesquisa", [
		'listapessoas'=>$listapessoas,
		'idadeinicial'=>$initidade,
		'idadefinal'=>$fimidade,
		'descmodal'=>$descmodal,
		'desctemporada'=>$desctemporada
		]);
	}
	
});

?>
