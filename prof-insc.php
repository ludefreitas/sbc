<?php

use \Sbc\PageProf;
use \Sbc\Model\User;
use \Sbc\Model\Insc;
use \Sbc\Model\Turma;
use \Sbc\Model\Temporada;
use \Sbc\Model\Pessoa;
use \Sbc\Model\InscStatus;
use \Sbc\Model\Agenda;
use \Sbc\Model\Endereco;


$app->get("/prof/insc-turma-temporada/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	User::verifyLoginProf();
	
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

	//$idusersessao = (int)$_SESSION['User']['iduser'];

	$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);
	
	$inscTodas->getInscByTurmaTemporadaTodas($idturma, $idtemporada);
	$insc->getInscByTurmaTemporada($idturma, $idtemporada);
	$inscPcd->getInscByTurmaTemporadaPcd($idturma, $idtemporada);
	$inscPlm->getInscByTurmaTemporadaPlm($idturma, $idtemporada);
	$inscPvs->getInscByTurmaTemporadaPvs($idturma, $idtemporada);
	
	$vagas = (int)$turma->getvagas();

	$numMatriculados = $temporada->setNummatriculadosTemporada($idtemporada, $idturma);	

	$numMatriculados= $numMatriculados['nummatriculados'];
	
	$page = new PageProf();	

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

$app->get("/estagiario/insc-turma-temporada/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	User::verifyLoginEstagiario();
	
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

	//$idusersessao = (int)$_SESSION['User']['iduser'];

	$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);
	
	$inscTodas->getInscByTurmaTemporadaTodas($idturma, $idtemporada);
	$insc->getInscByTurmaTemporada($idturma, $idtemporada);
	$inscPcd->getInscByTurmaTemporadaPcd($idturma, $idtemporada);
	$inscPlm->getInscByTurmaTemporadaPlm($idturma, $idtemporada);
	$inscPvs->getInscByTurmaTemporadaPvs($idturma, $idtemporada);
	
	$vagas = (int)$turma->getvagas();

	$numMatriculados = $temporada->setNummatriculadosTemporada($idtemporada, $idturma);	

	$numMatriculados= $numMatriculados['nummatriculados'];
	
	$page = new PageProf();	

	$page->setTpl("insc-turma-temporada-estagiario", [
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

$app->get("/prof/insc/:idtemporada", function($idtemporada) {

	User::verifyLoginProf();
	// na linha abaixo retorna um array com todos os dados do usuário

	$iduser = (int)$_SESSION[User::SESSION]['iduser'];

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Insc::getPageSearchInscTemporadaUser($search, $page, $itemsPerPage = 10, $idtemporada, $iduser);

	} else {

		$pagination = Insc::getPageInscTemporadaUser($page, $itemsPerPage = 10, $idtemporada, $iduser);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>"/prof/insc/".$idtemporada."?".http_build_query([
			'page'=>$x+1,
			'search'=>$search
			]),
			'text'=>$x+1
		]);

	}

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);

	$desctemporada = $temporada->getdesctemporada();

	// carrega uma pagina das páginas do admin
	$page = new PageProf();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("insc-temporada", array( // aqui temos um array com muitos arrays
		"temporada"=>$desctemporada,
		"idtemporada"=>$idtemporada,
		"insc"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>User::getError()
	));
});

$app->get("/prof/insc/pessoa/:idepess", function($idpess){

	User::verifyLoginProf();

	$pessoa = new Pessoa;

	$pessoa->get((int)$idpess);

	$inscricoes = $pessoa->getInsc();

	//var_dump($inscricoes[0]['idinsc']);
	//exit();

	$page = new PageProf();

	$page->setTpl("insc-pessoa", [
		'insc'=>$inscricoes,
		'pessoa'=>$pessoa->getValues()
	]);

});

$app->get("/estagiario/insc/pessoa/:idepess", function($idpess){

	User::verifyLoginEstagiario();

	$pessoa = new Pessoa;

	$pessoa->get((int)$idpess);

	$inscricoes = $pessoa->getInsc();

	//var_dump($inscricoes[0]['idinsc']);
	//exit();

	$page = new PageProf();

	$page->setTpl("insc-pessoa-estagiario", [
		'insc'=>$inscricoes,
		'pessoa'=>$pessoa->getValues()
	]);

});

$app->get("/prof/profile/insc/:idinsc/:idpess/:idturma", function($idinsc, $idpess, $idturma){

	User::verifyLoginProf();

	$insc = new Insc();

	$insc->get((int)$idinsc);

	if( !$insc->getidinsc()){

		User::setError("Inscrição selecionada não existe!");
		header("Location: /prof/insc");
		exit();			
	}

	if( $insc->getidpess() != $idpess){

		User::setError("Aluno selecionado não está relacionado para esta inscrição!");
		header("Location: /prof/insc");
		exit();			
	}

	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);	

	//$insc = Insc::getFromId($idinsc);

	$page = new PageProf();

	$page->setTpl("insc-detail", [
		'insc'=>$insc->getValues(),
		'idturma'=>$idturma,
		'pessoa'=>$pessoa->getValues()
	]);	
});

$app->get("/estagiario/profile/insc/:idinsc/:idpess/:idturma", function($idinsc, $idpess, $idturma){

	User::verifyLoginEstagiario();

	$insc = new Insc();

	$insc->get((int)$idinsc);

	if( !$insc->getidinsc()){

		User::setError("Inscrição selecionada não existe!");
		header("Location: /prof/insc");
		exit();			
	}

	if( $insc->getidpess() != $idpess){

		User::setError("Aluno selecionado não está relacionado para esta inscrição!");
		header("Location: /prof/insc");
		exit();			
	}

	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);	

	//$insc = Insc::getFromId($idinsc);

	$page = new PageProf();

	$page->setTpl("insc-detail-estagiario", [
		'insc'=>$insc->getValues(),
		'idturma'=>$idturma,
		'pessoa'=>$pessoa->getValues()
	]);	
});

$app->get("/prof/insc/:idinsc/:iduserprof/:idturma/statusMatriculada", function($idinsc, $iduserprof, $idturma){
    
    User::verifyLoginProf();

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

$app->get("/estagiario/insc/:idinsc/:iduserprof/:idturma/statusMatriculada", function($idinsc, $iduserprof, $idturma){
    
     User::verifyLoginEstagiario();

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

$app->get("/prof/insc/:idinsc/:iduserprof/:idturma/statusAguardandoMatricula", function($idinsc, $iduserprof, $idturma){

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
	
	$idturmastatus = $temporada->getStatusTurmaTemporada($idturma, $idtemporada);
	
	if($idturmastatus == 6){
		echo "<script>alert('Você precisa alterar o status da turma, nesta temporada, para ( 3 - Inscrições abertas ) e assim alterar o status da inscrição.');";
        			echo "javascript:history.go(-1)</script>";	
        			exit;	
	}

	$insc->alteraStatusInscricaoAguardandoMatricula($idinsc);

	$insc->emailIformarVagaDisponivelProf($idinsc, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $idtemporada, $iduser);

	//header("Location: /prof/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduser."");
	//exit();

});

$app->get("/estagiario/insc/:idinsc/:iduserprof/:idturma/statusAguardandoMatricula", function($idinsc, $iduserprof, $idturma){

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
	
	$idturmastatus = $temporada->getStatusTurmaTemporada($idturma, $idtemporada);
	
	if($idturmastatus == 6){
		echo "<script>alert('Você precisa alterar o status da turma, nesta temporada, para ( 3  - Inscrições abertas ) e assim alterar o status da inscrição.');";
        			echo "javascript:history.go(-1)</script>";	
        			exit;	
	}

	$insc->alteraStatusInscricaoAguardandoMatricula($idinsc);

	$insc->emailIformarVagaDisponivelProf($idinsc, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $idtemporada, $iduser);

	//echo '<script>javascript:history.go(-1)</script>';

	//header("Location: /prof/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduser."");
	//exit();

});

$app->get("/prof/insc/:idinsc/:iduserprof/:idturma/statusSorteada", function($idinsc, $iduserprof, $idturma){

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

	//header("Location: /prof/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduser."");
	//exit();

});

$app->get("/prof/insc/:idinsc/:iduserprof/:idturma/enviarEmailASorteado", function($idinsc, $iduserprof, $idturma){

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

	$insc->sorteioEmailProf($idinsc, $numerosorteado, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $idade, $numeroordenado, $idtemporada, $iduserprof);

	//header("Location: /prof/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduserprof."");
	//exit();

});


$app->get("/prof/insc/:idinsc/:idturma/:idpess/statusDesistente", function($idinsc, $idturma, $idpess){

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();
	$user = new User();
	$pessoa = new Pessoa();
	
	$insc->get((int)$idinsc);

	$idturma = (int)$idturma;
	$idtemporada = $insc->getidtemporada();
	$idpess = (int)$idpess;

	$insc->alteraStatusInscricaoDesistente($idinsc, $idturma, $idtemporada);
	
	echo '<script>javascript:history.go(-1)</script>';

	//header("Location: /prof/profile/insc/".$idinsc."/".$idpess."/".$idturma."");
	//exit();

});

$app->get("/estagiario/insc/:idinsc/:idturma/:idpess/statusDesistente", function($idinsc, $idturma, $idpess){

	$insc = new Insc();
	$turma = new Turma();
	$temporada = new Temporada();
	$user = new User();
	$pessoa = new Pessoa();
	
	$insc->get((int)$idinsc);

	$idturma = (int)$idturma;
	$idtemporada = $insc->getidtemporada();
	$idpess = (int)$idpess;

	$insc->alteraStatusInscricaoDesistente($idinsc, $idturma, $idtemporada);

	echo '<script>javascript:history.go(-1)</script>';

	//header("Location: /prof/profile/insc/".$idinsc."/".$idpess."/".$idturma."");
	//exit();

});

$app->get("/prof/insc-turma-temporada-matricular/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	User::verifyLoginProf();

	$insc = new Insc();
	$turma = new Turma();
	$user = new User();
	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);
	$turma->get((int)$idturma);

	$idusersessao = (int)$_SESSION['User']['iduser'];

	$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);	
	
	$insc->getInscByTurmaTemporadaMatricular($idturma, $idtemporada);

	$page = new PageProf([
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

$app->get("/prof/insc-turma-temporada-chamada/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	User::verifyLoginProf();

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

	$page = new PageProf([
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

$app->get("/estagiario/insc-turma-temporada-chamada/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	User::verifyLoginEstagiario();

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
	if(($idturma == 16) || ($idturma == 265) || ($idturma == 266) || ($idturma == 267) || ($idturma == 447) || ($idturma == 448) || ($idturma == 449)){

		$insc->getInscByTurmaTemporadaChamadaCursos($idturma, $idtemporada);

	}else{
		
		$insc->getInscByTurmaTemporadaChamada($idturma, $idtemporada);
	}
	*/

	$insc->getInscByTurmaTemporadaChamada($idturma, $idtemporada);

	$page = new PageProf([
		'header'=>false,
		'footer'=>false
	]);
	
	$page->setTpl("insc-turma-temporada-chamada-estagiario", [
		'iduserprof'=>$iduserprof,
		//'total'=>$total,
		'insc'=>$insc->getValues(),
		'turma'=>$turma->getValues(),
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError(),
		'success'=>User::getSuccess()
	]);	
});

$app->get("/prof/calendario-lista-presenca/:idtemporada/:idturma", function($idtemporada, $idturma) {

	User::checkLoginProf();	

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

	$page = new PageProf();

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

$app->get("/estagiario/calendario-lista-presenca/:idtemporada/:idturma", function($idtemporada, $idturma) {

	User::checkLoginEstagiario();	

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

	$page = new PageProf();

	$page->setTpl("calendario-lista-presenca-estagiario", [
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

$app->get("/prof/insc-turma-temporada-fazer-chamada/:idtemporada/:idturma/:data", function($idtemporada, $idturma, $data) {

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
	
	$page = new PageProf([
		'header'=>false,
		'footer'=>false
	]);

	if(!Insc::temChamadaData($data, $idturma)){
	    
	    for($x = 0; $x < count($insc); $x++){				
    		$idinsc = (int)$insc[$x]['idinsc'];
    		Insc::save_presenca($idinsc, $statuspresenca, $data);
    	}	
    	
    	$insc = Insc::getInscByTurmaTemporadaMatriculadosDataListaChamada($idturma, $idtemporada, $data);	
	    
	    $mes = date('m', strtotime($data));
		//$dias_do_mes = new Insc();
		//$dias_do_mes = Insc::GetDiasDoMesPresenca((int)$idtemporada,(int)$idturma,(int)$mes);

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
			//'dias_do_mes'=>$dias_do_mes,
			'mes'=>$mes,
			'nomemes'=>$nomemes,
			'error'=>Agenda::getMsgError()
		]);	
		
	}else{

    	$mes = date('m', strtotime($data));
	    //$dias_do_mes = new Insc();
	    //$dias_do_mes = Insc::GetDiasDoMesPresenca((int)$idtemporada,(int)$idturma,(int)$mes);	

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
    		//'dias_do_mes'=>$dias_do_mes,
    		'mes'=>$mes,
    		'nomemes'=>$nomemes,
    		'error'=>Agenda::getMsgError()
    	]);	
    }
});

$app->get("/prof/insc-turma-temporada-mes-chamada-atualizada/:idtemporada/:idturma/:mes", function($idtemporada, $idturma, $mes) {

	User::checkLoginProf();
	$turma = new Turma();
	$turma->get((int)$idturma);
	$insc = new Insc();
	$temporada = new Temporada;
	$temporada->get((int)$idtemporada);
	$desctemporada = $temporada->getdesctemporada();	
	$insc = Insc::getInscByTurmaTemporadaMatriculados($idturma, $idtemporada);		
	$page = new PageProf([
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

$app->get("/estagiario/insc-turma-temporada-fazer-chamada/:idtemporada/:idturma/:data", function($idtemporada, $idturma, $data) {

	User::checkLoginEstagiario();
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
	
	$page = new PageProf([
		'header'=>false,
		'footer'=>false
	]);

	if(!Insc::temChamadaData($data, $idturma)){
	    
	    for($x = 0; $x < count($insc); $x++){				
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

		$page->setTpl("insc-turma-temporada-fazer-chamada-estagiario", [
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
		
    	$page->setTpl("insc-turma-temporada-fazer-chamada-estagiario", [
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

$app->get("/estagiario/insc-turma-temporada-mes-chamada-atualizada/:idtemporada/:idturma/:mes", function($idtemporada, $idturma, $mes) {

	User::checkLoginEstagiario();
	$turma = new Turma();
	$turma->get((int)$idturma);
	$insc = new Insc();
	$temporada = new Temporada;
	$temporada->get((int)$idtemporada);
	$desctemporada = $temporada->getdesctemporada();	
	$insc = Insc::getInscByTurmaTemporadaMatriculados($idturma, $idtemporada);		
	$page = new PageProf([
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
		
    	$page->setTpl("insc-turma-temporada-mes-chamada-atualizada-estagiario", [
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

$app->get("/prof/insc-turma-temporada-presente/:idtemporada/:idturma/:data/:idinsc", function($idtemporada, $idturma, $data, $idinsc) {

	//User::checkLoginProf();
	$insc = new Insc();	
	$insc->update_presente($idinsc, $data);
	
	echo '<script>javascript:history.go(-1)</script>';

	//header("Location: /prof/insc-turma-temporada-fazer-chamada/".$idtemporada."/".$idturma."/".$data."");
	//	exit();				
});

$app->get("/prof/insc-turma-temporada-ausente/:idtemporada/:idturma/:data/:idinsc", function($idtemporada, $idturma, $data, $idinsc) {

	//User::checkLoginProf();
	$insc = new Insc();
	$insc->update_ausente($idinsc, $data);
	
	echo '<script>javascript:history.go(-1)</script>';

	//header("Location: /prof/insc-turma-temporada-fazer-chamada/".$idtemporada."/".$idturma."/".$data."");
		//exit();				
});

$app->get("/prof/insc-turma-temporada-justificar/:idtemporada/:idturma/:data/:idinsc", function($idtemporada, $idturma, $data, $idinsc) {

	//User::checkLoginProf();
	$insc = new Insc();
	$insc->update_justificar($idinsc, $data);
	
	echo '<script>javascript:history.go(-1)</script>';

	//header("Location: /prof/insc-turma-temporada-fazer-chamada/".$idtemporada."/".$idturma."/".$data."");
		//exit();				
});

$app->get("/prof/insc-turma-temporada-endereco/:idpess", function($idpess) {

	$insc = new Insc();
	$endereco = new Endereco();
	
	$enderecoAluno = $endereco->getEnderecoPessoaInsc($idpess);

	echo 'Endereço: '.$enderecoAluno['rua'].' - '.$enderecoAluno['numero'].' - '.$enderecoAluno['bairro'].' - '.$enderecoAluno['cidade'].' - '.$enderecoAluno['estado'].' - CEP: '.$enderecoAluno['cep'].' - Tel.Res.: '.$enderecoAluno['telres'].' - Contato Emergência: '.$enderecoAluno['contato'].' -  '.$enderecoAluno['telemer'].'';
	//echo '<script>javascript:history.go(-1)</script>';

	//header("Location: /prof/insc-turma-temporada-fazer-chamada/".$idtemporada."/".$idturma."/".$data."");
		//exit();				
});

$app->get("/estagiario/insc-turma-temporada-endereco/:idpess", function($idpess) {

	$insc = new Insc();
	$endereco = new Endereco();
	
	$enderecoAluno = $endereco->getEnderecoPessoaInsc($idpess);

	echo 'Endereço: '.$enderecoAluno['rua'].' - '.$enderecoAluno['numero'].' - '.$enderecoAluno['bairro'].' - '.$enderecoAluno['cidade'].' - '.$enderecoAluno['estado'].' - CEP: '.$enderecoAluno['cep'].' - Tel.Res.: '.$enderecoAluno['telres'].' - Contato Emergência: '.$enderecoAluno['contato'].' -  '.$enderecoAluno['telemer'].'';
	//echo '<script>javascript:history.go(-1)</script>';

	//header("Location: /prof/insc-turma-temporada-fazer-chamada/".$idtemporada."/".$idturma."/".$data."");
		//exit();				
});

$app->get("/prof/insc-altera-turma-temporada/:idturma/:idtemporada/user/:iduser", function($idturma, $idtemporada, $iduser) {

	User::verifyLoginProf();
	
	$inscTodas = new Insc();
	$turma = new Turma();
	$user = new User();
	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);
	$turma->get((int)$idturma);

	$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);
	
	$inscTodas->getInscByTurmaTemporadaTodas($idturma, $idtemporada);
	
	
	$vagas = (int)$turma->getvagas();

	$numMatriculados = $temporada->setNummatriculadosTemporada($idtemporada, $idturma);	

	$numMatriculados= $numMatriculados['nummatriculados'];
	
	$page = new PageProf();	

	$page->setTpl("insc-altera-turma-temporada", [
		'iduserprof'=>$iduserprof,	
		'inscTodas'=>$inscTodas->getValues(),
		'turma'=>$turma->getValues(),
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError(),
		'success'=>User::getSuccess(),
		'vagas'=>$vagas,
		'numMatriculados'=>$numMatriculados
	]);	
});

$app->post("/prof/insc/altera/turma", function(){

	User::verifyLoginProf();

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
	    	$numsorte = $insc['numsorte'];
	    	$laudo = $insc['laudo'];
	    	$inscpcd = $insc['inscpcd'];
	    	$inscpvs = $insc['inscpvs'];
	    	$idturmaorigem = $insc['idturma'];
	    	$idtemporadaorigem = $insc['idtemporada'];
	    	$dtinscorigem = $insc['dtinsc'];
	    	$dtmatricorigem = $insc['dtmatric'];

	    	if($idturmaorigem == $idturmadestino){
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
				'idtemporada'=>$idtemporadadestino	
			]);	

			/*
			echo '<pre>';
			print_r($insc);
			echo '<pre>';
			exit;
			*/

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
	    	//header("Location: /prof/insc-altera-turma-temporada/".$idturmaorigem."/".$idtemporadaorigem."/user/".$iduser);
			//exit();					

	   	}
	   	echo "<script>alert('Movimentação efetuada com sucesso!');";
	    echo "javascript:history.go(-1)</script>";
	}


});

?>