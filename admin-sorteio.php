<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Temporada;
use \Sbc\Model\Sorteio;


$app->get("/professor/sorteio:desctemporada/:idtemporada", function($desctemporada, $idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$sorteio = new Sorteio();	

	$sorteio = Sorteio::listAll($desctemporada);

	$temporada = Temporada::numMaxInscritos($idtemporada);

	$sort = Sorteio::sortear(3, 10, 5);

	Temporada::setError("Não há inscrições para realizar o sorteio!");	

	$page = new PageAdmin();

	$page->setTpl("sorteio", [
		'sorteio'=>$sorteio,
		'temporada'=>$temporada[0],
		'error'=>Temporada::getError()
	]);
});

/*
$app->post("/professor/sorteio:desctemporada", function($desctemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$sorteio = new Sorteio();


	$sorteio = Sorteio::listAll($desctemporada);	


	$sort = Sorteio::sortear(3, 10, 5);

	$page = new PageAdmin();

	$page->setTpl("sorteio", [
		'sorteio'=>$sorteio,

	
	]);
});

*/

?>