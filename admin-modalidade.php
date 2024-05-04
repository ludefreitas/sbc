<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Modalidade;
use \Sbc\Model\Faixaetaria;

$app->get("/admin/modalidades", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Modalidade::getPageSearch($search, $page);

	} else {

		$pagination = Modalidade::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/modalidades?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}

	//$modalidade = modalidade::listAll();
	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("modalidades", array( // aqui temos um array com muitos arrays
		"modalidade"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>Modalidade::getMsgError()
	));
});


$app->get("/admin/modalidades/create", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("modalidades-create", [
		"error"=>Modalidade::getMsgError(),
		"createModalidadeValues"=>(isset($_SESSION['createModalidadeValues'])) ? $_SESSION['createModalidadeValues'] : ['descmodal'=>'']
	]);
});

$app->post("/admin/modalidades/create", function() {

	User::verifyLogin();

	$_SESSION['createModalidadeValues'] = $_POST;

	$modalidade = new Modalidade();

	if (!isset($_POST['descmodal']) || $_POST['descmodal'] == '') {
		Horario::setMsgError("Informe o nome da modalidade.");
		echo "<script>window.location.href = '/admin/modalidade/create'</script>";
		//header("Location: /admin/modalidade/create");
		exit;		
	}	

	$modalidade->setData($_POST);

	$modalidade->save();

	$_SESSION['createModalidadeValues'] = NULL;

	echo "<script>window.location.href = '/admin/modalidades'</script>";
	//header("Location: /admin/modalidades");
	exit();	
});

$app->get("/admin/modalidades/:idmodal/delete", function($idmodal) {

	User::verifyLogin();

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	$modalidade->delete();

	echo "<script>window.location.href = '/admin/modalidadeS'</script>";
	//header("Location: /admin/modalidades");
	exit();
	
});


$app->get("/admin/modalidades/:idmodal", function($idmodal) {

	User::verifyLogin();

	$modalidade = new Modalidade;

	$modalidade->get((int)$idmodal);

	$page = new PageAdmin();

	$page->setTpl("modalidades-update", array(
		"error"=>Modalidade::getMsgError(),
		'modalidade'=>$modalidade->getValues()
	));
});

$app->post("/admin/modalidades/:idmodal", function($idmodal) {

	User::verifyLogin();

	$modalidade = new Modalidade;

	if (!isset($_POST['descmodal']) || $_POST['descmodal'] == '') {
		Horario::setMsgError("Informe o nome da modalidade.");
		echo "<script>window.location.href = '/admin/modalidade/".$idmodal."'</script>";
		//header("Location: /admin/modalidade/".$idmodal."");
		exit;		
	}	

	$modalidade->get((int)$idmodal);

	$modalidade->setData($_POST);

	$modalidade->save();

	echo "<script>window.location.href = '/admin/modalidades'</script>";
	//header("Location: /admin/modalidades");
	exit();	
});

$app->get("/modalidades/:idmodal", function($idmodal) {

	$modalidade = new Modalidade();

	$modalidade->get((int)$idmodal);

	$page = new Page();

	$page->setTpl("modalidades", [
		'modalidade'=>$modalidade->getValues()
	]);	

});


?>