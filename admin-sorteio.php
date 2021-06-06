<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Temporada;
use \Sbc\Model\Sorteio;


$app->get("/professor/sorteio:desctemporada", function($desctemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$sorteio = new Sorteio();

	//$idtemporada = $temporada->getidtemporada();

	$sorteio = Sorteio::listAll($desctemporada);	

	//var_dump($sorteio);
	//exit;

	//Criar função getSorteio($desctemporada) na classe soretio


	$sort = Sorteio::sortear(3, 10, 5);


	//echo '<pre>';
	//print_r($sort);
	//echo '</pre';

	$page = new PageAdmin();

	$page->setTpl("sorteio", [
		'sorteio'=>$sorteio,

	
	]);
});

?>