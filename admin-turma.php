<?php

use \Sbc\PageAdmin;
use \Sbc\Page;
use \Sbc\Model\User;
use \Sbc\Model\Espaco;
use \Sbc\Model\Local;
use \Sbc\Model\Horario;
use \Sbc\Model\Atividade;
use \Sbc\Model\TurmaStatus;
use \Sbc\Model\Turma;
use \Sbc\Model\Modalidade;
use \Sbc\Model\Pessoa;

$app->get("/admin/turma", function() {

	User::verifyLogin();
	// na linha abaixo retorna um array com todos os dados do usuário

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Turma::getPageSearch($search, $page);

	} else {

		$pagination = Turma::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{
		array_push($pages, [
			'href'=>'/admin/turma?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);
	}

	//$idturma = $pagination['data'][0]['idturma'];

	//$tokens = Turma::listTokenTurma($idturma);

	// carrega uma pagina das páginas do admin
	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("turma", array( // aqui temos um array com muitos arrays
		"turma"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages,
		//"tokens"=>$tokens,
		"error"=>Turma::getMsgError()
	));
});


$app->get("/admin/turma/create", function() {

	User::verifyLogin();

	$local = Local::listAll();
	$user = User::listAllProf();
	$espaco = Espaco::listAll();	
	$horario = Horario::listAll();
	$atividade = Atividade::listAll();
	$modalidade = Modalidade::listAll();
	//$turmastatus = TurmaStatus::listAll();

	$page = new PageAdmin();

	$page->setTpl("turma-create", [
		//'user'=>$user,
		'local'=>$local,
		'espaco'=>$espaco,
		'horario'=>$horario,		
		'atividade'=>$atividade,
		'modalidade'=>$modalidade,
		//'turmastatus'=>$turmastatus,
		'error'=>Turma::getMsgError(),
		'createTurmaValues'=>(isset($_SESSION['createTurmaValues'])) ? $_SESSION['createTurmaValues'] : ['descturma'=>'', 'idmodal'=>'', 'idhorario'=>'', 'idativ'=>'', 'idespaco'=>'', 'idturmastatus'=>'', 'vagas'=>'']
	]);
});

$app->post("/admin/turma/create", function() {

	User::verifyLogin();

	$_SESSION['createTurmaValues'] = $_POST;

	$turma = new Turma();

	if (!isset($_POST['descturma']) || $_POST['descturma'] == '') {
		Turma::setMsgError("Informe uam descrição para a turma.");
		header("Location: /admin/turma/create");
		exit;		
	}	

	if (!isset($_POST['idmodal']) || $_POST['idmodal'] == '') {
		Turma::setMsgError("Selecione uma modalidade.");
		header("Location: /admin/turma/create");
		exit;		
	}

	if (!isset($_POST['idhorario']) || $_POST['idhorario'] == '') {
		Turma::setMsgError("Selecione um horário.");
		header("Location: /admin/turma/create");
		exit;		
	}					

	if (!isset($_POST['idativ']) || $_POST['idativ'] == '') {
		Turma::setMsgError("Selecione uma atividade.");
		header("Location: /admin/turma/create");
		exit;		
	}		

	if (!isset($_POST['idespaco']) || $_POST['idespaco'] == '') {
		Turma::setMsgError("Selecione um espaço");
		header("Location: /admin/turma/create");
		exit;		
	}
	/*
	if (!isset($_POST['idturmastatus']) || $_POST['idturmastatus'] == '') {
		Turma::setMsgError("Selecione o status.");
		header("Location: /admin/turma/create");
		exit;		
	}
	*/

	$_POST['obs'] = isset($_POST['obs']) ?  $_POST['obs'] = $_POST['obs'] : $_POST['obs'] = '';


	if (!isset($_POST['vagas']) || $_POST['vagas'] == '') {
		Turma::setMsgError("Informe o número de vagas.");
		header("Location: /admin/turma/create");
		exit;		
	}	

	$_POST['token'] = isset($_POST['token']) ?  1 : 0;

	$turma->setData($_POST);

	$turma->save();

	$_SESSION['createTurmaValues'] = NULL;

	header("Location: /admin/turma");
	exit();	
});

$app->get("/admin/turma/:idturma/delete", function($idturma) {

	User::verifyLogin();

	$turma = new Turma();

	$turma->get((int)$idturma);

	$turma->delete();

	header("Location: /admin/turma");
	exit();
	
});


$app->get("/admin/turma/:idturma", function($idturma) {

	User::verifyLogin();

	$turma = new Turma;

	$turma->get((int)$idturma);

	$page = new PageAdmin();

	$page->setTpl("turma-update", array(
		'turma'=>$turma->getValues(),
		//'turmastatus'=>TurmaStatus::listAll(),
		'modalidade'=>Modalidade::listAll(),
		'atividade'=>Atividade::listAll(),
		'modalidade'=>Modalidade::listAll(),
		//'users'=>User::listAllProf(),
		'horario'=>Horario::listAll(),
		'espaco'=>Espaco::listAll(),
		'error'=>Turma::getMsgError()
	));
});

$app->post("/admin/turma/:idturma", function($idturma) {

	User::verifyLogin();

	$turma = new Turma;

	$turma->get((int)$idturma);

	if (!isset($_POST['descturma']) || $_POST['descturma'] == '') {
		Turma::setMsgError("Informe uma descrição para a turma.");
		header("Location: /admin/turma/".$idturma."");
		exit;		
	}

	$_POST['obs'] = isset($_POST['obs']) ?  $_POST['obs'] = $_POST['obs'] : $_POST['obs'] = '';
	

	if (!isset($_POST['idmodal']) || $_POST['idmodal'] == '') {
		Turma::setMsgError("Selecione uma modalidade.");
		header("Location: /admin/turma/".$idturma."");
		exit;		
	}

	if (!isset($_POST['idhorario']) || $_POST['idhorario'] == '') {
		Turma::setMsgError("Selecione um horário.");
		header("Location: /admin/turma/".$idturma."");
		exit;		
	}						

	if (!isset($_POST['idativ']) || $_POST['idativ'] == '') {
		Turma::setMsgError("Selecione uma atividade.");
		header("Location: /admin/turma/".$idturma."");
		exit;		
	}					

	if (!isset($_POST['idespaco']) || $_POST['idespaco'] == '') {
		Turma::setMsgError("Selecione um espaço");
		header("Location: /admin/turma/".$idturma."");
		exit;		
	}
	/*
	if (!isset($_POST['idturmastatus']) || $_POST['idturmastatus'] == '') {
		Turma::setMsgError("Selecione o status.");
		header("Location: /admin/turma/".$idturma."");
		exit;		
	}
	*/

	if (!isset($_POST['vagas']) || $_POST['vagas'] == '') {
		Turma::setMsgError("Informe o número de vagas.");
		header("Location: /admin/turma/".$idturma."");
		exit;		
	}

	$_POST['token'] = isset($_POST['token']) ?  1 : 0;

	$turma->setData($_POST);

	$turma->save();

	//$turma->setPhoto($_FILES["file"]);

	header("Location: /admin/turma");
	exit();	
});

$app->get("/turma/:idturma", function($idturma) {

	$turma = new Turma();

	$turma->get((int)$idturma);

	$page = new Page();

	$page->setTpl("turma", [
		'turma'=>$turma->getValues()
	]);	

});


$app->get("/admin/turma/create/token/:idturma", function($idturma) {

	User::verifyLogin();

	$turma = new Turma();

	$token = time();
	$token = substr($token, 4);

	$_POST['idturma'] = $idturma;
	$_POST['numcpf'] = (isset($_POST['numcpf'])) ? $_POST['numcpf'] : "";
	$_POST['token'] = $token;
	$_POST['isused'] = 0;

	$turma->setData($_POST);

	$turma->saveToken();

    echo "<script>alert('Token ".$turma->gettoken()." criado com sucesso!');";
	echo "javascript:history.go(-1)</script>";
	//header("Location: /admin/token/".$idturma."");
	//exit();	
});

$app->get("/admin/turma/create/token/:idturma/:numcpf", function($idturma, $numcpf) {

	User::verifyLogin();

	$turma = new Turma();

	$token = time();
	$token = substr($token, 4);

	$_POST['idturma'] = $idturma;
	$_POST['numcpf'] = $numcpf;
	$_POST['token'] = $token;
	$_POST['isused'] = 0;

	$turma->setData($_POST);

	if(!Turma::temTokenCpf($idturma, $numcpf)){

		$turma->saveToken();
	    echo "<script>alert('Token ".$turma->gettoken()." criado com sucesso!');";
		echo "javascript:history.go(-1)</script>";
	}else{

		echo "<script>alert('Já existe um token para este aluno nesta turma!');";
		echo "javascript:history.go(-1)</script>";
	}
});

$app->post("/admin/turma/create/token", function() {

	User::verifyLoginProf();

	$turma = new Turma();

	$token = time();
	$token = substr($token, 4);

	if(isset($_POST['numcpf']) && $_POST['numcpf'] == ""){
		echo "<script>alert('Informe o número do CPF!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if(!Pessoa::validaCPF($_POST['numcpf'])){
		echo "<script>alert('Informe um número de cpf válido!');";
	    echo "javascript:history.go(-1)</script>";
		exit;
	}
	

	$_POST['idturma'] = $_POST['idturma'];
	$_POST['numcpf'] = $_POST['numcpf'];
	$_POST['token'] = $token;
	$_POST['isused'] = 0;

	$turma->setData($_POST);

	$idturma = $_POST['idturma'];
	$numcpf = $_POST['numcpf'];

	if(!Turma::temTokenCpf($idturma, $numcpf)){

		$turma->saveToken();
	    echo "<script>alert('Token ".$turma->gettoken()." criado com sucesso!');";
		echo "javascript:history.go(-1)</script>";

	}else{

		if($numcpf != ""){
			echo "<script>alert('Já existe um token para este aluno nesta turma!');";
			echo "javascript:history.go(-1)</script>";
		}else{
			$turma->saveToken();
	   		echo "<script>alert('Token ".$turma->gettoken()." criado com sucesso!');";
			echo "javascript:history.go(-1)</script>";
		}		
	}
});

$app->get("/admin/token/:idturma", function($idturma) {

	User::verifyLogin();

	$turma = new Turma();

	$turma->get((int)$idturma);	

	$tokens = Turma::listAlltokenTurma($idturma);

	if(!isset($turma) || $turma == NULL){

		Turma::setMsgError("Não existem tokens para esta turma.");
	}
	
	$page = new PageAdmin();    

	$page->setTpl("token-turma", [
		'tokens'=>$tokens,
		'turma'=>$turma->getValues(),
		"error"=>Turma::getMsgError()	
	]);
});





?>