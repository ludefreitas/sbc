<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Temporada;


// Rota para listar todos usuários da classe 
$app->get("/admin/users", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = User::getPageSearch($search, $page);

	} else {

		$pagination = User::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/users?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1			
		]);

	}

	//$users = User::listAll();
	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("users", array( // aqui temos um array com muitos arrays
		"users"=>$pagination['data'],
		"search"=>$search,
		"total"=>$pagination['total'],
		"pages"=>$pages,
		"error"=>User::getError()
	));	
});

$app->get("/admin/users-audi", function() {

	User::verifyLoginAudi();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = User::getPageSearch($search, $page);

	} else {

		$pagination = User::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/users-audi?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1			
		]);

	}

	//$users = User::listAll();
	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("users-audi", array( // aqui temos um array com muitos arrays
		"users"=>$pagination['data'],
		"search"=>$search,
		"total"=>$pagination['total'],
		"pages"=>$pages,
		"error"=>User::getError()
	));	
});

$app->get("/admin/prof", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = User::getPageSearchProf($search, $page);

	} else {

		$pagination = User::getPageProf($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/prof?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}

	//$users = User::listAll();
	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("prof", array( // aqui temos um array com muitos arrays
		"prof"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages
	));
});

$app->get("/admin/estagiarios", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = User::getPageSearchEstagiarios($search, $page);

	} else {

		$pagination = User::getPageEstagiarios($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/estagiarios?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}

	//$users = User::listAll();
	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("estagiarios", array( // aqui temos um array com muitos arrays
		"estagiarios"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages
	));
});

$app->get("/admin/admins", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = User::getPageSearchAdmins($search, $page);

	} else {

		$pagination = User::getPageAdmins($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/admins?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}

	//$users = User::listAll();
	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("admins", array( // aqui temos um array com muitos arrays
		"prof"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages
	));
});

$app->get("/admin/users-cliente", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = User::getPageSearchCliente($search, $page);

	} else {

		$pagination = User::getPageCliente($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/users-cliente?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}


	//$users = User::listAll();
	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("users-cliente", array( // aqui temos um array com muitos arrays
		"cliente"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>User::getError()
	));
});


$app->get("/admin/users/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("users-create");
});

$app->get("/admin/users/:iduser/delete", function($iduser) {

	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$user->delete();

	echo "<script>window.location.href = '/admin/users'</script>";
	//header("Location: /admin/users");
	exit();
});

$app->get("/admin/users/:iduser", function($iduser) {

	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	if( $user->getiduser() != $iduser){

		User::setError("Usuário não encontrado!!!");
		echo "<script>window.location.href = '/admin/users'</script>";
		//header("Location: /admin/users");
		exit();			
	}

	$page = new PageAdmin();

	$page->setTpl("users-update", array(
		"user"=>$user->getValues(),
		"error"=>User::getError()
	));
});

$app->post("/admin/users/create", function() {

	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;
	$_POST["isprof"] = (isset($_POST["isprof"]))?1:0;
	$_POST["isestagiario"] = (isset($_POST["isestagiario"]))?1:0;
	$_POST["isaudi"] = (isset($_POST["isaudi"]))?1:0;
	$_POST["statususer"] = 1;

	//$_POST['despassword'] = User::getPasswordHash($_POST['despassword']);

	$user->setData($_POST);

	$user->save();

	echo "<script>window.location.href = '/admin/users'</script>";
	//header("Location: /admin/users");
	exit();
});

$app->post("/admin/users/:iduser", function($iduser) {

	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;
	$_POST["isprof"] = (isset($_POST["isprof"]))?1:0;
	$_POST["isestagiario"] = (isset($_POST["isestagiario"]))?1:0;
	$_POST["isaudi"] = (isset($_POST["isaudi"]))?1:0;
    $_POST["statususer"] = 1;
	// admin não alera status do usuário
	//$_POST["statususer"] = (isset($_POST["statususer"]))?1:0;

	if((!$_POST['isprof'] == 0) || (!$_POST['isestagiario'] == 0)){

		if (!isset($_POST['apelidoperson']) || $_POST['apelidoperson'] == '') {
			User::setError("Preencha o campo apelido.");
			echo "<script>window.location.href = '/admin/users/".$iduser."'</script>";
			//header("Location: /admin/users/".$iduser."");
			exit;		
		}
	}

	$user->get((int)$iduser);

	$user->setData($_POST);
	
	$user->update();

	echo "<script>javascript:history.go(-2)</script>";
	//header("Location: /admin/users");
	//exit();
});

/*
$app->get("/admin/turmatemporada/:iduser/turma/:idtemporada", function($iduser, $idtemporada) {

	User::verifyLogin();

	$user = new User();

	$temporada = new Temporada();

	$temporada->get((int)$idtemporada);	

	$user->get((int)$iduser);	

	$page = new PageAdmin();	

	$page->setTpl("turma-temporada-admin", [
		'temporada'=>$temporada->getValues(),
		'user'=>$user->getValues(),
		'turmaRelated'=>$user->getTurmaTemporada(true, $idtemporada, $iduser),
		'turmaNotRelated'=>$user->getTurmaTemporada(false, $idtemporada, $iduser),
		'error'=>User::getError()
	]);	
});
*/


?>