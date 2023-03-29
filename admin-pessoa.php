<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Pessoa;
//use \Sbc\Model\Insc;

// Rota para listar todos usuários da classe 
$app->get("/admin/pessoas", function() {

	//$insc = new Insc();

	$pessoa = new Pessoa();

	User::verifyLogin();
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
			'href'=>'/admin/pessoas?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}	

	//$pessoa = User::listAll();
	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("pessoas", array( // aqui temos um array com muitos arrays
		"pessoas"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>User::getError()
	));
});

$app->get("/admin/pessoas-audi", function() {

	User::verifyLoginAudi();

	//$insc = new Insc();

	$pessoa = new Pessoa();

	User::verifyLogin();
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
			'href'=>'/admin/pessoas-audi?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}	

	//$pessoa = User::listAll();
	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("pessoas-audi", array( // aqui temos um array com muitos arrays
		"pessoas"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>User::getError()
	));
});

$app->get("/admin/pessoas/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("pessoas-create");
});

$app->get("/admin/pessoas/:idpess/delete", function($idpess) {

	User::verifyLogin();

	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);

	$pessoa->delete();

	header("Location: /admin/pessoas");
	exit();
});

/*
$app->get("/admin/pessoas/:idpess", function($idpess) {

	User::verifyLogin();

	$pessoa = new Pessoa();

	$pessoa->get((int)$idpess);

	$page = new PageAdmin();

	$page->setTpl("pessoas-update", array(
		"pessoa"=>$pessoa->getValues()
	));
});
*/

$app->post("/admin/pessoas/create", function() {

	User::verifyLogin();

	$pessoa = new Pessoa();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;
	$_POST["isprof"] = (isset($_POST["isprof"]))?1:0;
	$_POST["statususer"] = 1;

	//$_POST['despassword'] = User::getPasswordHash($_POST['despassword']);

	$pessoa->setData($_POST);

	$pessoa->save();

	header("Location: /admin/pessoas");
	exit();
});

/*
$app->post("/admin/pessoas/:idpess", function($idpess) {

	User::verifyLogin();

	$pessoa = new Pessoa();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;
	$_POST["isprof"] = (isset($_POST["isprof"]))?1:0;
	$_POST["statususer"] = (isset($_POST["statususer"]))?1:0;

	$pessoa->get((int)$idpess);

	$pessoa->setData($_POST);
	
	$pessoa->update();

	header("Location: /admin/pessoas");
	exit();
});
*/

?>