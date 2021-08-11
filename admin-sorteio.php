<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Temporada;
use \Sbc\Model\Sorteio;

$app->get("/professor/sorteio/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$sorteio = new Sorteio();	

	$sorteio = Sorteio::listAll($idtemporada);

	/*
	for ($x = 0; $x<count($sorteio); $x++) {

		$numerosorteado = $sorteio[$x]['numerosortear'];

		var_dump($numerosorteado);

	}
	*/

	$maxIncritos = Temporada::numMaxInscritos($idtemporada);

	$temporada->get((int)$idtemporada);

	//var_dump($sorteio);
	//exit;
	
	Temporada::setError("Não há inscrições para realizar o sorteio!");	

	$page = new PageAdmin();

	$page->setTpl("sorteio", [
		'sorteio'=>$sorteio,
		'maxIncritosTemporada'=>$maxIncritos[0],
		'temporada'=>$temporada->getValues(),
		'error'=>Temporada::getError(),
		'errorSorteio'=>Sorteio::getError()
	]);
});


$app->post("/professor/sortear", function() {

	User::verifyLogin();

	$temporada = new Temporada();
	$sorteio = new Sorteio();	
	$idtemporada = $_POST['idtemporada'];
	$maxIncritos = $_POST['maxIncritosTemporada'];
	

	if(!Sorteio::listAll($idtemporada)){

			$sort = Sorteio::sortear($maxIncritos, $maxIncritos, $idtemporada);

			$sorteio = Sorteio::listAll($idtemporada);

			for ($x = 0; $x<count($sorteio); $x++) {

				$numerosorteado = $sorteio[$x]['numerosortear'];

				$numeroordenado = $sorteio[$x]['numerodeordem'];

				var_dump($numeroordenado);

				Sorteio::setNumeroDeOrdem($numeroordenado, $numerosorteado);

				Sorteio::updateStatusInscricaosSorteada($numerosorteado);
			}

			header("Location: /professor/sorteio/".$idtemporada."");
			exit();	

	}else{

		Sorteio::setError("Sorteio Já realizado! Você precisa excluir o sorteio atual para realizar novo sorteio.");
		header("Location: /professor/sorteio/".$idtemporada."");
		exit();
	}	

});
/*
$app->get("/professor/sorteio:desctemporada/:idtemporada", function($desctemporada, $idtemporada) {

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
$app->post("/professor/sortear", function() {

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

	header("Location: /professor/sorteio".$desctemporada."/".$idtemporada."");
	exit();		
	

});
*/

?>