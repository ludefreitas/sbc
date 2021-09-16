<?php

use \Sbc\Page;
use \Sbc\Model\Turma;
use \Sbc\Model\Cart;
use \Sbc\Model\Pessoa;
use \Sbc\Model\User;
use \Sbc\Model\Insc;


$app->get("/cart", function(){

	$cart = Cart::getFromSession();
	$user = User::getFromSession();
	$page = new Page();

	$page->setTpl("cart", [
		'cart'=>$cart->getValues(),
		'turma'=>$cart->getTurma(),
		'pessoa'=>$user->getPessoa(),
		'error'=>Cart::getMsgError(),
		'msgError'=>Cart::getMsgError(),
		'msgSuccess'=>Cart::getMsgSuccess()
	]);
});

$app->post("/cart", function() {

	User::verifyLogin(false);

	if(Cart::cartIsEmpty((int)$_SESSION[Cart::SESSION]['idcart']) === false){
		Cart::setMsgError("Não há inscrições a confirmar! selecione uma turma! ");
		header("Location: /cart");
		exit();
	}	
	
	if($_POST['idpess'] <= 0){	
		Cart::setMsgError("Você precisa selecionar uma pessoa! ");
		header("Location: /cart");
		exit();

	}else{

		$cart = new Cart();

		$_POST['idcart'] = (int)$_SESSION[Cart::SESSION]["idcart"];
		//$_POST['iduser'] = (int)$_SESSION[User::SESSION]["iduser"];
		$_POST['dessessionid'] = $_SESSION[Cart::SESSION]["dessessionid"];

		$pessoa = new Pessoa();

		$idpess = $_POST['idpess'];

		$pessoa->get((int)$idpess);		

		//$numcpf = $pessoa->getcpf();
		$numcpf = $pessoa->getnumcpf();
		$idade = User::calcularIdade($pessoa->getdtnasc());
		$nomepess = $pessoa->getnomepess();

		//var_dump($numcpf.' - '.$idade.' - '.$nomepess);
		//exit();
		
		$idturma = $_POST['idturma'];
		$idtemporada = $_POST['idtemporada'];		
		$initidade = $_POST['initidade'];
		$fimidade = $_POST['fimidade']; 
		$idlocal = $_POST['idlocal']; 
		$local = $_POST['apelidolocal']; 

		if(($idade < $initidade) || ($idade > $fimidade)){		

			Cart::setMsgError('Esta turma é exclusiva para pessoas que tenham idade entre '.$initidade.' e '.$fimidade.' anos! Remova a turma atual e escolha outra turma compatível com a idade do(a) '.$nomepess.'.');
			header("Location: /cart");
			exit();
		}	

		if ($cart->getInscExistAquaticLocal($numcpf, $idpess, $idturma, $idtemporada, $idlocal)){

			Cart::setMsgError($nomepess.' já está inscrito(a) para uma turma do tipo AQUÁTICA no '.$local.'!');
			header("Location: /cart");
			exit();

		}

		if ($cart->getInscExist($numcpf, $idpess, $idturma, $idtemporada)){

			Cart::setMsgError($nomepess.' já está inscrito(a) nesta turma para esta temporada!');
			header("Location: /cart");
			exit();

		}else{				

			$cart->setData($_POST);

			$cart->save([
				'idcart'=>$_POST['idcart'],
				//':iduser'=>$_POST['iduser'],		
				':idpess'=>$_POST['idpess'],
				':dessessionid'=>$_POST['dessessionid']
			]);

			header("Location: /checkout");
			exit();
		}
	}
});

$app->get("/cart/:idturma/:idtemporada/add", function($idturma, $idtemporada){

	$turma = new Turma();

	$turma->get((int)$idturma);

	$cart = Cart::getFromSession();

	$idcart = (int)$_SESSION[Cart::SESSION]["idcart"];

	if( Cart::cartIsEmpty($idcart) > 0){

		Cart::setMsgError("Você já selecionou uma turma! remova a atual, se você quiser selecionar uma outra.");
		header("Location: /cart");
		exit();

	}else{
				
		$cart->addTurma($turma);
	}		
	
	header("Location: /cart");
	exit;
});

$app->get("/cart/:idturma/remove", function($idturma){

	$turma = new Turma();

	$turma->get((int)$idturma);

	$cart = Cart::getFromSession();

	$cart->removeTurma($turma, true);

	Cart::removeFromSession();
    session_regenerate_id();

	header("Location: /cart");
	exit;
});


?>