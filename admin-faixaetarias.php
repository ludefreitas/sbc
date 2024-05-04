<?php

use \Sbc\Page;
use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Faixaetaria;

$app->get("/admin/faixaetaria", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Faixaetaria::getPageSearch($search, $page);

	} else {

		$pagination = Faixaetaria::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/faixaetaria?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}
	//$faixaetaria = Faixaetaria::listAll();

	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("faixaetaria", array( // aqui temos um array com muitos arrays
		"faixaetaria"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>Faixaetaria::getMsgError()
	));
});

$app->get("/admin/faixaetaria/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("faixaetaria-create", array(
		"error"=>Faixaetaria::getMsgError(),
		"createFaixaetariaValues"=>(
				isset($_SESSION['createFaixaetariaValues'])) 
				    ? $_SESSION['createFaixaetariaValues'] 
			        : ['initidade'=>'', 'fimidade'=>'', 'descrfxetaria'=>'']
	));
});

$app->post("/admin/faixaetaria/create", function() {

	User::verifyLogin();

	$_SESSION['createFaixaetariaValues'] = $_POST;

	$faixaetaria = new Faixaetaria();

	if (!isset($_POST['initidade']) || $_POST['initidade'] == '') {
		Faixaetaria::setMsgError("Informe a idade inicial.");
		echo "<script>window.location.href = '/admin/faixaetaria/create'</script>";
		//header("Location: /admin/faixaetaria/create");
		exit;		
	}	

	if (!isset($_POST['fimidade']) || $_POST['fimidade'] == '') {
		Faixaetaria::setMsgError("Informe a idade final.");
		echo "<script>window.location.href = '/admin/faixaetaria/create'</script>";
		//header("Location: /admin/faixaetaria/create");
		exit;		
	}

	if ($_POST['initidade'] >= $_POST['fimidade']) {
		Faixaetaria::setMsgError("Idade final deve ser maior que a idade inicial.");
		echo "<script>window.location.href = '/admin/faixaetaria/create'</script>";
		//header("Location: /admin/faixaetaria/create");
		exit;		
	}	

	if (!isset($_POST['descrfxetaria']) || $_POST['descrfxetaria'] == '') {
		Faixaetaria::setMsgError("descreva a faixa etária.");
		echo "<script>window.location.href = '/admin/faixaetaria/create'</script>";
		//header("Location: /admin/faixaetaria/create");
		exit;		
	}						

	$faixaetaria->setData($_POST);

	$faixaetaria->save();

	$_SESSION['createFaixaetariaValues'] = NULL;

	echo "<script>window.location.href = '/admin/faixaetaria'</script>";
	//header("Location: /admin/faixaetaria");
	exit();
});

$app->get("/admin/faixaetaria/:idfxetaria/delete", function($idfxetaria) {

	User::verifyLogin();

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	$faixaetaria->delete();

	echo "<script>window.location.href = '/admin/faixaetaria'</script>";
	//header("Location: /admin/faixaetaria");
	exit();
	
});

$app->get("/admin/faixaetaria/:idfxetaria", function($idfxetaria) {

	User::verifyLogin();

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	$page = new PageAdmin();

	$page->setTpl("faixaetaria-update", [
		'faixaetaria'=>$faixaetaria->getValues(),
		"error"=>Faixaetaria::getMsgError()
	]);	
	
});

$app->post("/admin/faixaetaria/:idfxetaria", function($idfxetaria) {

	User::verifyLogin();

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	if (!isset($_POST['initidade']) || $_POST['initidade'] == '') {
		Faixaetaria::setMsgError("Informe a idade inicial.");
		echo "<script>window.location.href = '/admin/faixaetaria/".$idfxetaria."'</script>";
		//header("Location: /admin/faixaetaria/".$idfxetaria."");
		exit;		
	}	

	if (!isset($_POST['fimidade']) || $_POST['fimidade'] == '') {
		Faixaetaria::setMsgError("Informe a idade final.");
		echo "<script>window.location.href = '/admin/faixaetaria/".$idfxetaria."'</script>";
		//header("Location: /admin/faixaetaria/".$idfxetaria."");
		exit;		
	}

	if ($_POST['initidade'] >= $_POST['fimidade']) {
		Faixaetaria::setMsgError("Idade final deve ser maior que a idade inicial.");
		echo "<script>window.location.href = '/admin/faixaetaria/".$idfxetaria."'</script>";
		//header("Location: /admin/faixaetaria/".$idfxetaria."");
		exit;		
	}	

	if (!isset($_POST['descrfxetaria']) || $_POST['descrfxetaria'] == '') {
		Faixaetaria::setMsgError("descreva a faixa etária.");
		echo "<script>window.location.href = '/admin/faixaetaria/".$idfxetaria."'</script>";
		//header("Location: /admin/faixaetaria/".$idfxetaria."");
		exit;		
	}						

	$faixaetaria->setData($_POST);

	$faixaetaria->save();

	echo "<script>window.location.href = '/admin/faixaetaria'</script>";
	//header("Location: /admin/faixaetaria");
	
	exit();		
});

$app->get("/faixaetaria/:idfxetaria", function($idfxetaria) {

	$faixaetaria = new Faixaetaria();

	$faixaetaria->get((int)$idfxetaria);

	$page = new Page();

	$page->setTpl("faixaetaria", [
		'faixaetaria'=>$faixaetaria->getValues()
	]);	

});


?>