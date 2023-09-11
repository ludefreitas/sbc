<?php

use \Sbc\Page;
use \Sbc\Model\Turma;
use \Sbc\Model\Temporada;
use \Sbc\Model\Modalidade;
use \Sbc\Model\Cart;
use \Sbc\Model\Local;
use \Sbc\Model\Insc;

$app->get("/modalidade/:idmodal", function($idmodal) {

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	$turma = Turma::listAllTurmaTemporadaModalidade($idmodal);

	if(!isset($turma) || $turma == NULL){

		Cart::setMsgError("Não existem turmas para a modalidade ".$modalidade->getdescmodal()." nesta temporada. Aguarde! ");
	}	
	
	
	$desctemporada  = isset($turma[0]['desctemporada']) ? $turma[0]['desctemporada'] : '';

	// Aqui verifica se a temporada ��� igual ao ano atual
	// Se n���o for acrescenta (1). Supondo que a inscri������o est��� sendo feita no ano anterior
	if( (int)date('Y')  == (int)$desctemporada ){

		$anoAtual = (int)date('Y');	

	}else{

		$anoAtual = (int)date('Y') + 1;		
	}		
	
	$page = new Page();    

	$page->setTpl("modalidade", [
		'turma'=>Turma::checkList($turma),
		'anoAtual'=>$anoAtual,
		'modalidade'=>$modalidade->getValues(),
		'error'=>Cart::getMsgError()
	]);
});

$app->get("/modalidades", function() {

	$modalidades = Modalidade::listAll();

	if(!isset($modalidades) || $modalidades == NULL){

		Cart::setMsgError("Não existe modalidades para esta temporada. A temporada pode não estar iniciada, estar em processo de sorteio ou foi encerrada. Aguarde, ou entre em contato com o Centro Esportivo mais próximo a sua casa. ");
	}	

	$page = new Page();

	$page->setTpl("modalidades", array(
		'modalidades'=>$modalidades,
		'error'=>Cart::getMsgError()
	));
});

$app->get("/modalidade/:idmodal/:local", function($idmodal, $local) {

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	$turma = Turma::listAllTurmaTemporadaModalidadeLocal($idmodal, $local);

	if(!isset($turma) || $turma == NULL){

		Cart::setMsgError("Não existem turmas para a modalidade ".$modalidade->getdescmodal()." nesta temporada. Aguarde! ");
	}	

	$desctemporada  = isset($turma[0]['desctemporada']) ? $turma[0]['desctemporada'] : '';

	// Aqui verifica se a temporada é igual ao ano atual
	// Se não for acrescenta (1). Supondo que a inscrião está sendo feita no ano anterior
	if( (int)date('Y')  == (int)$desctemporada ){

		$anoAtual = (int)date('Y');	

	}else{

		$anoAtual = (int)date('Y') + 1;		
	}		
	
	$page = new Page();    

	$page->setTpl("modalidade", [
		'turma'=>Turma::checkList($turma),
		'anoAtual'=>$anoAtual,
		'modalidade'=>$modalidade->getValues(),
		'error'=>Cart::getMsgError()
	]);
});

$app->get("/modalidades/local/:idlocal", function($idlocal) {

	$modalidades = Modalidade::listAllToLocal($idlocal);

	$local = new Local();

	$local->get((int)$idlocal);

	$apelidolocal = $local->getapelidolocal();	

	if(!isset($modalidades) || $modalidades == NULL){

		Cart::setMsgError("Nãoo existe modalidades para esta temporada. A temporada pode não estar iniciada, estar em processo de sorteio ou foi encerrada. Aguarde, ou entre em contato com o Centro Esportivo mais próximo a sua casa. ");
	}	

	$page = new Page();

	$page->setTpl("modalidades-por-local", array(
		'idlocal'=>$idlocal,
		'apelidolocal'=>$apelidolocal,
		'modalidades'=>$modalidades,
		'error'=>Cart::getMsgError()
	));
});


$app->get("/vagas-turma/:idturma/:idtemporada/:idmodal/:idturmastatus", function($idturma, $idtemporada, $idmodal, $idturmastatus) {

	$vagasPubGeral = Turma::getVagasByIdTurma($idturma);

    $numinscPublicoGeral = Insc::getNumInscPublicoGeralValidaTurmaTemporada($idtemporada, $idturma);

    $vagasMenosInscritosPubGeral = ($vagasPubGeral - $numinscPublicoGeral);

    if($idmodal == 25){
    	$vagasListaEsperaPubGeral = round($vagasPubGeral * 0.5);
    }else{
    	$vagasListaEsperaPubGeral = round($vagasPubGeral * 0.2);
    }
    $numinscListaEsperaPublicoGeral = Insc::getNumInscListaEsperaPubGeralTurmaTemporada($idtemporada, $idturma);
    $vagasMenosInscritosListaEsperaPubGeral =  ($vagasListaEsperaPubGeral - $numinscListaEsperaPublicoGeral);

    if($numinscPublicoGeral >= $vagasPubGeral){
    	if($numinscListaEsperaPublicoGeral >= $vagasListaEsperaPubGeral){
        	$textVagasPubGeral = 'NÃO HÁ VAGAS para público geral';
    	}else{    		
    		$textVagasPubGeral = ''.$vagasMenosInscritosListaEsperaPubGeral.' de '.$vagasListaEsperaPubGeral.' vagas p/ LISTA DE ESPERA para público geral.';        	
    	}    	
    }else{
    	if($numinscListaEsperaPublicoGeral >= $vagasListaEsperaPubGeral){
        	$textVagasPubGeral = 'NÃO HÁ VAGAS para público geral';
    	}else{    	
	    	if($idturmastatus == 6){
	    		$vagasMenosInscritosPubGeral = ($vagasPubGeral - $numinscListaEsperaPublicoGeral);
	    	}	    	
	    	$textVagasPubGeral = ''.$vagasMenosInscritosPubGeral.' de '.$vagasPubGeral.' vagas p/ público geral.';
    	}    	
        /*
        if($idturmastatus == 6){
    		$vagasMenosInscritosPubGeral = ($vagasPubGeral - $numinscListaEsperaPublicoGeral);
    	}
        
    	$textVagasPubGeral = ''.$vagasMenosInscritosPubGeral.' de '.$vagasPubGeral.' vagas p/ público geral.';   
    	*/
    }

    $vagasPubLaudo = Turma::getVagasLaudoByIdTurma($idturma);
    $numinscPublicoLaudo = Insc::getNumInscPublicoLaudoValidaTurmaTemporada($idtemporada, $idturma);
    $vagasMenosInscritosPubLaudo = ($vagasPubLaudo - $numinscPublicoLaudo);

    if($idmodal == 25){
    	$vagasListaEsperaPubLaudo = round($vagasPubLaudo * 0.5);
    }else{
    	$vagasListaEsperaPubLaudo = round($vagasPubLaudo * 0.2);
    }
    $numinscListaEsperaPublicoLaudo = Insc::getNumInscListaEsperaPubLaudoTurmaTemporada($idtemporada, $idturma);
    $vagasMenosInscritosListaEsperaPubLaudo =  ($vagasListaEsperaPubLaudo - $numinscListaEsperaPublicoLaudo);

	if($numinscPublicoLaudo >= $vagasPubLaudo){
		if($numinscListaEsperaPublicoLaudo >= $vagasListaEsperaPubLaudo){
        	$textVagasPubLaudo = 'NÃO HÁ VAGAS para pessoas com laudo médico.';
    	}else{
    		$textVagasPubLaudo = ''.$vagasMenosInscritosListaEsperaPubLaudo.' de '.$vagasListaEsperaPubLaudo.' vagas p/ LISTA DE ESPERA para pessoas com laudo médico.';        	
    	}       	    	
    }else{
    	if($numinscListaEsperaPublicoLaudo >= $vagasListaEsperaPubLaudo){
        	$textVagasPubLaudo = 'NÃO HÁ VAGAS para pessoas com laudo médico.';
    	}else{
    		if($idturmastatus == 6){
    			$vagasMenosInscritosPubLaudo = ($vagasPubLaudo - $numinscListaEsperaPublicoLaudo);
    		}
    		$textVagasPubLaudo = ''.$vagasMenosInscritosPubLaudo.' de '.$vagasPubLaudo.' vagas p/ pessoas com laudo médico.';        	
    	}       	    	
    	/*
    	if($idturmastatus == 6){
    		$vagasMenosInscritosPubLaudo = ($vagasPubLaudo - $numinscListaEsperaPublicoLaudo);
    	}
    	$textVagasPubLaudo = ''.$vagasMenosInscritosPubLaudo.' de '.$vagasPubLaudo.' vagas p/ pessoas com laudo médico.';
    	*/
    }

    $vagasPubPcd = Turma::getVagasPcdByIdTurma($idturma);
    $numinscPublicoPcd = Insc::getNumInscPublicoPcdValidaTurmaTemporada($idtemporada, $idturma);
    $vagasMenosInscritosPubPcd = ($vagasPubPcd - $numinscPublicoPcd);

    if($idmodal == 25){
    	$vagasListaEsperaPubPcd = round($vagasPubPcd * 0.5);
    }else{
    	$vagasListaEsperaPubPcd = round($vagasPubPcd * 0.2);
    }
    $numinscListaEsperaPublicoPcd = Insc::getNumInscListaEsperaPubPcdTurmaTemporada($idtemporada, $idturma);
    $vagasMenosInscritosListaEsperaPubPcd =  ($vagasListaEsperaPubPcd - $numinscListaEsperaPublicoPcd);

	if($numinscPublicoPcd >= $vagasPubPcd){
    	if($numinscListaEsperaPublicoPcd >= $vagasListaEsperaPubPcd){
        	$textVagasPubPcd = 'NÃO HÁ VAGAS para PCD`s.';
    	}else{
    		$textVagasPubPcd = ''.$vagasMenosInscritosListaEsperaPubPcd.' de '.$vagasListaEsperaPubPcd.' vagas p/ LISTA DE ESPERA para PCD`s';        	
    	}       	
    }else{
    	if($numinscListaEsperaPublicoPcd >= $vagasListaEsperaPubPcd){
        	$textVagasPubPcd = 'NÃO HÁ VAGAS para PCD`s.';
    	}else{
    		if($idturmastatus == 6){
    			$vagasMenosInscritosPubPcd = ($vagasPubPcd - $numinscListaEsperaPublicoPcd);
    		}
    		$textVagasPubPcd = ''.$vagasMenosInscritosPubPcd.' de '.$vagasPubPcd.' vagas para PCD`s.';
    	} 
    	/*      	
    	if($idturmastatus == 6){
    		$vagasMenosInscritosPubPcd = ($vagasPubPcd - $numinscListaEsperaPublicoPcd);
    	}
    	$textVagasPubPcd = ''.$vagasMenosInscritosPubPcd.' de '.$vagasPubPcd.' vagas para PCD`s.';
    	*/
    }

    $vagasPubPvs = Turma::getVagasPvsByIdTurma($idturma);
    $numinscPublicoPvs = Insc::getNumInscPublicoPvsValidaTurmaTemporada($idtemporada, $idturma);
    $vagasMenosInscritosPubPvs = ($vagasPubPvs - $numinscPublicoPvs);

    if($idmodal == 25){
    	$vagasListaEsperaPubPvs = round($vagasPubPvs * 0.5);
    }else{
    	$vagasListaEsperaPubPvs = round($vagasPubPvs * 0.2);
    }
    $numinscListaEsperaPublicoPvs = Insc::getNumInscListaEsperaPubPvsTurmaTemporada($idtemporada, $idturma);
    $vagasMenosInscritosListaEsperaPubPvs =  ($vagasListaEsperaPubPvs - $numinscListaEsperaPublicoPvs);

	if($numinscPublicoPvs >= $vagasPubPvs){
		if($numinscListaEsperaPublicoPvs >= $vagasListaEsperaPubPvs){
			$textVagasPubPvs = 'NÃO HÁ VAGAS p/ pessoas em situação de vulnerabiliade social.';        	
    	}else{    		
    		$textVagasPubPvs = ''.$vagasMenosInscritosListaEsperaPubPvs.' de '.$vagasListaEsperaPubPvs.' vagas p/ LISTA DE ESPERA p/ pessoas em situação de vulnerabiliade social.';        	
    	}           	
    }else{
    	if($numinscListaEsperaPublicoPvs >= $vagasListaEsperaPubPvs){
			$textVagasPubPvs = 'NÃO HÁ VAGAS p/ pessoas em situação de vulnerabiliade social.';        	
    	}else{    		
    		if($idturmastatus == 6){
    			$vagasMenosInscritosPubPvs = ($vagasPubPvs - $numinscListaEsperaPublicoPvs);
    		}
    		$textVagasPubPvs = ''.$vagasMenosInscritosPubPvs.' de '.$vagasPubPvs.' vagas p/ pessoas em situação de vulnerabiliade social.';  
    	}           	
    	/*
    	if($idturmastatus == 6){
    		$vagasMenosInscritosPubPvs = ($vagasPubPvs - $numinscListaEsperaPublicoPvs);
    	}
    	$textVagasPubPvs = ''.$vagasMenosInscritosPubPvs.' de '.$vagasPubPvs.' vagas p/ pessoas em situação de vulnerabiliade social.';  
    	*/  	
    } 

    if($idturmastatus == 6){
    	$textStatusTurmaNaoiniciada = 'Para consultar a quantidade de inscritos e se seu nome está na lista desta turma, clique em "Consulte lista de espera".';
    	echo ''.$textVagasPubGeral."\r\n".$textVagasPubLaudo."\r\n".$textVagasPubPcd."\r\n".$textVagasPubPvs."\r\n".$textStatusTurmaNaoiniciada."\r\n".'[T-'.$idturma.']';
    }else{
    	echo ''.$textVagasPubGeral."\r\n".$textVagasPubLaudo."\r\n".$textVagasPubPcd."\r\n".$textVagasPubPvs."\r\n".'[T-'.$idturma.']';  	
    }       
	
});


/*
$app->get("/modalidade/:idmodal", function($idmodal){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	//var_dump($modalidade);
	//exit();

	$pagination = $modalidade->getTurmaModalidadePage($page);	

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, 
		[
			'link'=>'/modalidade/'.$modalidade->getidmodal().'?page='.$i,
			'page'=>$i
		]);
	}
	$page = new Page();

	$page->setTpl("modalidade", [
		'modalidade'=>$modalidade->getValues(),
		'turma'=>$pagination["data"],
		'pages'=>$pages
	]);
});
*/

/*
$app->get("/modalidade/:idmodal", function($idmodal){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	$pagination = $modalidade->getTurmaPage($page);

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/modalidade/'.$modalidade->getidmodal().'?page='.$i,
			'page'=>$i
		]);
	}
	//var_dump($modalidades);
	//exit();
	$page = new Page();

	$page->setTpl("modalidade", [
		'modalidade'=>$modalidade->getValues(),
		'turma'=>$pagination["data"],
		'pages'=>$pages
	]);
});
*/



?>