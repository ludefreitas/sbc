<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Temporada;
use \Sbc\Model\Sorteio;
use \Sbc\Model\Insc;
use \Sbc\Model\Turma;

$app->get("/admin/sorteio/:idtemporada", function($idtemporada) {

	User::verifyLogin();
	
	$iduser = $_SESSION['User']['iduser'];

	$temporada = new Temporada();
	$sorteio = new Sorteio();	

	$sorteio = Sorteio::listAll($idtemporada);

	$maxIncritos = Temporada::numMaxInscritos($idtemporada);

	$temporada->get((int)$idtemporada);
	
	Temporada::setError("Não há inscrições para realizar o sorteio!");	

	$page = new PageAdmin();

	$page->setTpl("sorteio", [
		'sorteio'=>$sorteio,
		'iduser'=>$iduser,
		'maxIncritosTemporada'=>$maxIncritos[0],
		'temporada'=>$temporada->getValues(),
		'error'=>Temporada::getError(),
		'errorSorteio'=>Sorteio::getError()
	]);
});

$app->post("/admin/sortear", function() {

	User::verifyLogin();

	$temporada = new Temporada();
	$sorteio = new Sorteio();	
	$idtemporada = $_POST['idtemporada'];
	$maxIncritos = $_POST['maxIncritosTemporada'];
	
	if(!Sorteio::listAll($idtemporada)){

			Sorteio::sortear($maxIncritos, $maxIncritos, $idtemporada);

			$sorteio = Sorteio::listAll($idtemporada);
			
			$turma = new Turma();

			for ($x = 0; $x<count($sorteio); $x++) {

				$numerosorteado = $sorteio[$x]['numerosortear'];

				$numeroordenado = $sorteio[$x]['numerodeordem'];

				Sorteio::setNumeroDeOrdem($numeroordenado, $numerosorteado);

				/*
				$inscricao = Sorteio::selecionaInscByNumordemNumsorte($idtemporada, $numeroordenado, $numerosorteado);				
				for ($y = 0; $y<count($inscricao); $y++) {	

					$email = $inscricao[$y]['desemail'];
					$nomepess = $inscricao[$y]['nomepess'];
					$desperson = $inscricao[$y]['desperson'];
					$status = $inscricao[$y]['descstatus'];
					$desctemporada = $inscricao[$y]['desctemporada'];
					$idinsc = $inscricao[$y]['idinsc'];
					$idturma = $inscricao[$y]['idturma'];

					$turma->get((int)$idturma);

					Sorteio::sorteioEmail($email, $nomepess, $desperson, $numerosorteado, $status, $numeroordenado, $desctemporada, $idinsc, $turma);
				}
				*/
			}
			
			Insc::alteraStatusInscricaoParaSorteadaGeral($idtemporada);
			Insc::alteraStatusInscricaoParaSorteadaPcd($idtemporada);
			Insc::alteraStatusInscricaoParaSorteadaPlm($idtemporada);
			Insc::alteraStatusInscricaoParaSorteadaPvs($idtemporada);
			Insc::alteraStatusInscricaoParaFilaDeEspera($idtemporada);

			echo "<script>window.location.href = '/admin/sorteio/".$idtemporada."'</script>";
			//header("Location: /admin/sorteio/".$idtemporada."");
			exit();	

	}else{

		Sorteio::setError("Sorteio Já realizado! Você precisa excluir o sorteio atual para realizar novo sorteio.");
		echo "<script>window.location.href = '/admin/sorteio/".$idtemporada."'</script>";
			//header("Location: /admin/sorteio/".$idtemporada."");
		exit();
	}	

});

/*
$app->get("/admin/sorteio:desctemporada/:idtemporada", function($desctemporada, $idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$sorteio = new Sorteio();	

	$sorteio = Sorteio::listAll($desctemporada);

	$maxIncritos = Temporada::numMaxInscritos($idtemporada);

	$temporada->get((int)$idtemporada);

	//var_dump($temporada);
	//exit;
	
	Temporada::setError("Não há inscrições para realizar o sorteio!");	

	$page = new PageAdmin();

	$page->setTpl("sorteio", [
		'sorteio'=>$sorteio,
		'maxIncritosTemporada'=>$maxIncritos[0],
		'temporada'=>$temporada->getValues(),
		'error'=>Temporada::getError()
	]);
});
*/

/*
$app->post("/admin/sortear", function() {

	User::verifyLogin();

	$temporada = new Temporada();
	$sorteio = new Sorteio();	

	

	$desctemporada = $_POST['desctemporada'];
	$idtemporada = $_POST['idtemporada'];
	$maxIncritos = $_POST['maxIncritosTemporada'];


	//var_dump($_POST['idtemporada'].' - '.$_POST['desctemporada'].' - '.$_POST['maxIncritosTemporada']);
	//exit();

	//$sorteio = Sorteio::listAll($desctemporada);

	//$temporada = Temporada::numMaxInscritos($idtemporada);


	$sort = Sorteio::sortear(1, $maxIncritos, $maxIncritos, $desctemporada, $idtemporada);

	header("Location: /admin/sorteio".$desctemporada."/".$idtemporada."");
	exit();		
	

});
*/

?>