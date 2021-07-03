<?php

use \Sbc\Page;
use \Sbc\Model\Pessoa;
use \Sbc\Model\User;
use \Sbc\Model\Insc;


$app->get("/profile/insc", function(){

	User::verifyLogin(false);

	$user = User::getFromSession();

	$page = new Page();

	$page->setTpl("profile-insc", [
		'insc'=>$user->getInsc()
	]);

});

$app->get("/profile/insc/:idinsc/:idepess", function($idinsc, $idpess){

	User::verifyLogin(false);

	$insc = new Insc();

	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess); 

	$insc->get((int)$idinsc);

	//var_dump($pessoa);
	//exit();

	//$insc = Insc::getFromId($idinsc);

	$page = new Page();

	$page->setTpl("profile-insc-detail", [
		'insc'=>$insc->getValues(),
		'pessoa'=>$pessoa->getValues(),
		'erroInsc'=>Insc::getError()
	]);	
});

/*
$app->get("/insc", function(){

	User::verifyLogin(false);

	$insc = new Insc();

	$page = new Page();

	$page->setTpl("insc", [
		'insc'=>$insc->getValues()
	]);
});
*/

/*
$app->get("/insc/:idinsc", function($idinsc){

	User::verifyLogin(false);

	$insc = new Insc();

	$insc->get((int)$idinsc);

	//$page = new Page();

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("insc", [
		'insc'=>$insc->getValues()
	]);

});
*/	




?>