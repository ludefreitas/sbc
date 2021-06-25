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
		'error'=>Temporada::getError()
	]);
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

$app->post("/professor/sortear", function() {

	User::verifyLogin();

	$temporada = new Temporada();
	$sorteio = new Sorteio();	

	//$desctemporada = $_POST['desctemporada'];
	$idtemporada = $_POST['idtemporada'];
	$maxIncritos = $_POST['maxIncritosTemporada'];


	//var_dump($_POST['idtemporada'].' - '.$_POST['desctemporada'].' - '.$_POST['maxIncritosTemporada']);
	//exit();

	//$sorteio = Sorteio::listAll($desctemporada);

	//$temporada = Temporada::numMaxInscritos($idtemporada);


	$sort = Sorteio::sortear($maxIncritos, $maxIncritos, $idtemporada);

	header("Location: /professor/sorteio/".$idtemporada."");
	exit();		
	

});
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