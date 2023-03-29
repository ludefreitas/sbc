<?php

use \Sbc\PageProf;
use \Sbc\Model\User;
use \Sbc\Model\Pessoa;
//use \Sbc\Model\Insc;

// Rota para listar todos usuários da classe 
$app->get("/prof/pessoas", function() {

	//$insc = new Insc();

	$pessoa = new Pessoa();

	User::verifyLoginProf();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Pessoa::getPageSearch($search, $page);

	} else {

		$pagination = Pessoa::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/prof/pessoas?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}	

	// $pessoa = User::listAll();
	// carrega uma pagina das páginas do admin
	$page = new PageProf();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("pessoas", array( // aqui temos um array com muitos arrays
		"pessoas"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>1,
		"error"=>User::getError()
	));
});


?>