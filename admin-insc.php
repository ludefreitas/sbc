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

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();
	$user = new User();
	
	$insc->get((int)$idinsc);	

	$idturma = (int)$idturma;
	$idtemporada = $insc->getidtemporada();
	$iduser = (int)$iduserprof;

	$dtInicmatricula = $insc->getdtinicmatricula();
	$hoje = date('Y-m-d H:i:s');

	if($hoje > $dtInicmatricula){
	    
	    //if($idturma != 756){
	        /*
    	    $dtInicmatricula = date('Y-m-d H:i:s', strtotime($dtInicmatricula));
    
    		echo "<script>alert('A matrícula só poderá ser efetuada a partir de ".$dtInicmatricula."!');";
    			echo "javascript:history.go(-1)</script>";
    		*/
    
    	//}else{		

        	$turma->get((int)$idturma);
        
        	$vagas = (int)$turma->getvagas();
        
        	$numMatriculados = $temporada->setNummatriculadosTemporada($idtemporada, $idturma);	
        
        	if($numMatriculados['nummatriculados'] >= $vagas){
        
        		$numcpf = $insc->getnumcpf();
        		
        		$tokencpf = Turma::getTokenPorCpfeTurma($numcpf, $idturma);	
        
        		if(Turma::temTokenCpf($idturma, $numcpf)){
        
        			$insc->alteraStatusInscricaoMatriculada($idinsc, $idturma, $idtemporada);
        			Turma::setUsedTokenCpf($idturma, $tokencpf);
        			//User::setSuccess("Aluno matriculado com sucesso!");		
        			echo "<script>alert('Aluno matriculado com sucesso!');";
        			echo "javascript:history.go(-1)</script>";
        			//header("Location: /prof/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduser."");
        			//exit();
        
        		}else{
        
        			//User::setError("Número de vagas insuficiente para efetuar matrícula!");
        			echo "<script>alert('Número de vagas insuficiente para efetuar matrícula! Gere um token para autorizar a matrícula.');";
        			echo "javascript:history.go(-1)</script>";	
        			exit;	
        			//header("Location: /prof/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduser."");
        			//exit();
        		}	
        	}else{
        
        		$insc->alteraStatusInscricaoMatriculada($idinsc, $idturma, $idtemporada);
        		echo "<script>alert('Aluno matriculado com sucesso!');";
        			echo "javascript:history.go(-1)</script>";
        	}
        	
	}else{
	    
	     $dtInicmatricula = date('d-m-Y H:i:s', strtotime($dtInicmatricula));
    
    		echo "<script>alert('A matrícula só poderá ser efetuada a partir de ".$dtInicmatricula."!');";
    			echo "javascript:history.go(-1)</script>";
	}
    	//}	
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

	$dtInicmatricula = $temporada->getdtinicmatricula();

	var_dump($dtInicmatricula);
	exit();

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


$app->get("/admin/insc-turma-temporada-fazer-chamada/:idtemporada/:idturma/:data", function($idtemporada, $idturma, $data) {

	User::verifyLogin(false);
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

		$page->setTpl("insc-turma-temporada-fazer-chamada", [
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
	
		$page->setTpl("insc-turma-temporada-fazer-chamada", [
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
	}
});

$app->get("/admin/insc-turma-temporada-presente/:idtemporada/:idturma/:data/:idinsc", function($idtemporada, $idturma, $data, $idinsc) {

	//User::checkLoginProf();
	$insc = new Insc();	
	$insc->update_presente($idinsc, $data);

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

?>
