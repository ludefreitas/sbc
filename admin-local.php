<?php

use \Sbc\PageAdmin;
use \Sbc\Model\User;
use \Sbc\Model\Local;
use \Sbc\Model\Espaco;

use \Sbc\Page;

$app->get("/admin/local", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Local::getPageSearch($search, $page);

	} else {

		$pagination = Local::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/local?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}
	//$local = Local::listAll();

	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("local", array( // aqui temos um array com muitos arrays
		"local"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>Local::getMsgError()
	));
});

$app->get("/admin/local-audi", function() {

	User::verifyLoginAudi();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Local::getPageSearch($search, $page);

	} else {

		$pagination = Local::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{

		array_push($pages, [
			'href'=>'/admin/local-audi?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);

	}
	//$local = Local::listAll();

	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("local-audi", array( // aqui temos um array com muitos arrays
		"local"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>Local::getMsgError()
	));
});


$app->get("/admin/local/create", function() {

	User::verifyLogin();

	$user = new User();

	$page = new PageAdmin();

	$page->setTpl("local-create", [
		"prof"=>$user->listAllProf(),
		"error"=>Local::getMsgError(),
		"createLocalValues"=>(isset($_SESSION['createLocalValues'])) ? $_SESSION['createLocalValues'] : ['apelidolocal'=>'', 'nomelocal'=>'', 'cep'=>'', 'rua'=>'', 'numero'=>'','complemento'=>'', 'bairro'=>'', 'cidade'=>'', 'estado'=>'', 'telefone'=>'']
	]);
});

$app->post("/admin/local/create", function() {

	User::verifyLogin();

	$_SESSION['createLocalValues'] = $_POST;

	$local = new Local();

	if (!isset($_POST['apelidolocal']) || $_POST['apelidolocal'] == '') {
		Local::setMsgError("Informe o nome de como é conhecido o local.");
		echo "<script>window.location.href = '/admin/local/create'</script>";
		//header("Location: /admin/local/create");
		exit;		
	}	

	if (!isset($_POST['nomelocal']) || $_POST['nomelocal'] == '') {
		Local::setMsgError("Informe o nome completo do local.");
		echo "<script>window.location.href = '/admin/local/create'</script>";
		//header("Location: /admin/local/create");
		exit;		
	}
	
		if (!isset($_POST['rua']) || $_POST['rua'] == '') {
		Local::setMsgError("Informe em qual rua que está o local.");
		echo "<script>window.location.href = '/admin/local/create'</script>";
		//header("Location: /admin/local/create");
		exit;		
	}

	if (!isset($_POST['numero']) || $_POST['numero'] == '') {
		Local::setMsgError("Informe número, em que está o local, na rua.");
		echo "<script>window.location.href = '/admin/local/create'</script>";
		//header("Location: /admin/local/create");
		exit;		
	}	

	if (!isset($_POST['bairro']) || $_POST['bairro'] == '') {
		Local::setMsgError("Informe o bairro onde está localizado este espaço.");
		echo "<script>window.location.href = '/admin/local/create'</script>";
		//header("Location: /admin/local/create");
		exit;		
	}																			

	if (!isset($_POST['cidade']) || $_POST['cidade'] == '') {
		Local::setMsgError("Informe em qual cidade está o local.");
		echo "<script>window.location.href = '/admin/local/create'</script>";
		//header("Location: /admin/local/create");
		exit;		
	}																			

	if (!isset($_POST['estado']) || $_POST['estado'] == '') {
		Local::setMsgError("Informe o estado.");
		echo "<script>window.location.href = '/admin/local/create'</script>";
		//header("Location: /admin/local/create");
		exit;		
	}

	if (!isset($_POST['telefone']) || $_POST['telefone'] == '') {
		Local::setMsgError("Informe o número do telefone.");
		echo "<script>window.location.href = '/admin/local/create'</script>";
		//header("Location: /admin/local/create");
		exit;		
	}
	
	if (!isset($_POST['cep']) || $_POST['cep'] == '') {
		Local::setMsgError("Informe o cep do local.");
		echo "<script>window.location.href = '/admin/local/create'</script>";
		//header("Location: /admin/local/create");
		exit;		
	}
	
	$_POST['statuslocal'] = isset($_POST['statuslocal']) ? 1 : 0;

	if (!isset($_POST['iduser']) || $_POST['iduser'] == '') {
		Local::setMsgError("Informe o nome do professor coordenador.");
		echo "<script>window.location.href = '/admin/local/create'</script>";
		//header("Location: /admin/local/create");
		exit;		
	}

	$local->setData($_POST);

	$local->save();

	$_SESSION['createLocalValues'] = NULL;

	echo "<script>window.location.href = '/admin/local'</script>";
	//header("Location: /admin/local");
	exit();
});

$app->get("/admin/local/:idlocal/delete", function($idlocal) {

	User::verifyLogin();

	$local = new Local();

	$local->get((int)$idlocal);

	$local->delete();

	echo "<script>window.location.href = '/admin/local'</script>";
	//header("Location: /admin/local");
	exit();
	
});

$app->get("/admin/local/:idlocal", function($idlocal) {

	User::verifyLogin();

	$user = new User();

	$local = new Local();

	$local->get((int)$idlocal);

	$page = new PageAdmin();

	$page->setTpl("local-update", [
		"prof"=>$user->listAllProf(),
		"error"=>Local::getMsgError(),
		'local'=>$local->getValues()
	]);	
	
});

$app->post("/admin/local/:idlocal", function($idlocal) {

	User::verifyLogin();

	$local = new Local();

	$local->get((int)$idlocal);

	if (!isset($_POST['apelidolocal']) || $_POST['apelidolocal'] == '') {
		Local::setMsgError("Informe o nome de como é conhecido o local.");
		echo "<script>window.location.href = '/admin/local/".$idlocal."'</script>";
		//header("Location: /admin/local/".$idlocal."");
		exit;		
	}	

	if (!isset($_POST['nomelocal']) || $_POST['nomelocal'] == '') {
		Local::setMsgError("Informe o nome completo do local.");
		echo "<script>window.location.href = '/admin/local/".$idlocal."'</script>";
		//header("Location: /admin/local/".$idlocal."");
		exit;		
	}

	if (!isset($_POST['cep']) || $_POST['cep'] == '') {
		Local::setMsgError("Informe o cep do local.");
		echo "<script>window.location.href = '/admin/local/".$idlocal."'</script>";
		//header("Location: /admin/local/".$idlocal."");
		exit;		
	}						

	if (!isset($_POST['rua']) || $_POST['rua'] == '') {
		Local::setMsgError("Informe em qual rua que está o local.");
		echo "<script>window.location.href = '/admin/local/".$idlocal."'</script>";
		//header("Location: /admin/local/".$idlocal."");
		exit;		
	}

	if (!isset($_POST['numero']) || $_POST['numero'] == '') {
		Local::setMsgError("Informe número, em que está o local, na rua.");
		echo "<script>window.location.href = '/admin/local/".$idlocal."'</script>";
		//header("Location: /admin/local/".$idlocal."");
		exit;		
	}	

	if (!isset($_POST['bairro']) || $_POST['bairro'] == '') {
		Local::setMsgError("Informe o bairro onde está localizado este espaço.");
		echo "<script>window.location.href = '/admin/local/".$idlocal."'</script>";
		//header("Location: /admin/local/".$idlocal."");
		exit;		
	}																							

	if (!isset($_POST['cidade']) || $_POST['cidade'] == '') {
		Local::setMsgError("Informe em qual cidade está o local.");
		echo "<script>window.location.href = '/admin/local/".$idlocal."'</script>";
		//header("Location: /admin/local/".$idlocal."");
		exit;		
	}																							

	if (!isset($_POST['estado']) || $_POST['estado'] == '') {
		Local::setMsgError("Informe o estado.");
		echo "<script>window.location.href = '/admin/local/".$idlocal."'</script>";
		//header("Location: /admin/local/".$idlocal."");
		exit;		
	}

	if (!isset($_POST['telefone']) || $_POST['telefone'] == '') {
		Local::setMsgError("Informe o número do telefone.");
		echo "<script>window.location.href = '/admin/local/".$idlocal."'</script>";
		//header("Location: /admin/local/".$idlocal."");
		exit;		
	}	

	if (!isset($_POST['iduser']) || $_POST['iduser'] == '') {
		Local::setMsgError("Informe o nome do professor coordenador.");
		echo "<script>window.location.href = '/admin/local/".$idlocal."'</script>";
		//header("Location: /admin/local/".$idlocal."");
		exit;		
	}		

	$_POST['statuslocal'] = isset($_POST['statuslocal']) ? 1 : 0;

	$local->setData($_POST);

	$local->save();

	echo "<script>window.location.href = '/admin/local'</script>";
	//header("Location: /admin/local");
	exit();		
});

/*
$app->get("admin/local/:idlocal", function($idlocal) {

	$local = new Local();

	$local->get((int)$idlocal);

	$page = new Page();

	$page->setTpl("local", [
		'local'=>$local->getValues()
	]);	

});
*/


/*
$app->get("/admin/local/:idlocal/espaco", function($idlocal) {

	User::verifyLogin();

	$local = new Local();

	$local->get((int)$idlocal);

	$page = new PageAdmin();	

	$page->setTpl("espaco-local", [
		'local'=>$local->getValues(),
		'espacoRelated'=> $local->getEspaco(true),
		'espacoNotRelated'=>$local->getEspaco(false)
	]);	
});

$app->get("/admin/local/:idlocal/espaco/:idespaco/add", function($idlocal, $idespaco) {

	User::verifyLogin();

	$local = new Local();

	$local->get((int)$idlocal);

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$local->addEspaco($espaco);

	header("Location: /admin/local/".$idlocal."/espaco");
	exit;
});

$app->get("/admin/local/:idlocal/espaco/:idespaco/remove", function($idlocal, $idespaco) {

	User::verifyLogin();

	$local = new Local();

	$local->get((int)$idlocal);

	$espaco = new Espaco();

	$espaco->get((int)$idespaco);

	$local->removeEspaco($espaco);

	header("Location: /admin/local/".$idlocal."/espaco");
	exit;

});
*/

?>
