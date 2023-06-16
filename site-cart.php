<?php

use \Sbc\Page;
use \Sbc\Model\Turma;
use \Sbc\Model\Cart;
use \Sbc\Model\Pessoa;
use \Sbc\Model\User;
use \Sbc\Model\Temporada;
use \Sbc\Model\Insc;
use \Sbc\Model\Saude;

$app->get("/cart", function(){
    
	$cart = Cart::getFromSession();
	$user = User::getFromSession();
	
	
	$turma = $cart->getTurma();
	
	if(!$turma){
		echo "<script>alert('Não há inscrições a confirmar! Selecione um local; uma modalidade; em seguida selecione uma turma!');";
		echo "javascript:history.go(-1)</script>";
		exit();
	}
	
	$idturma  = isset($turma[0]['idturma']) ? $turma[0]['idturma'] : '';
	$desctemporada  = isset($turma[0]['desctemporada']) ? $turma[0]['desctemporada'] : '';
	
	// Aqui verifica se a temporada é igual ao ano atual
	// Se não for acrescenta (1). Supondo que a inscrição está sendo feita no ano anterior
	if( (int)date('Y')  == (int)$desctemporada ){

		$anoAtual = (int)date('Y');	

	}else{

		$anoAtual = (int)date('Y') + 1;		
	}	
	
	if(Turma::turmatemToken($idturma)){
		$temtoken = 1;
	}else{
		$temtoken = 0;
	}
	
	$page = new Page();

	$page->setTpl("cart", [
		'cart'=>$cart->getValues(),
		'temtoken'=>$temtoken,
		'anoAtual'=>$anoAtual,
		'turma'=>$cart->getTurma(),
		'pessoa'=>$user->getPessoa(),
		'error'=>Cart::getMsgError(),
		'msgError'=>Cart::getMsgError(),
		'msgSuccess'=>Cart::getMsgSuccess()
	]);
	
});

$app->post("/cart", function() {

	User::verifyLogin(false);
	
	/*
	
	if($_SESSION['User']['inadmin'] != 1){
	    
	    Cart::setMsgError("As inscrições para esta turma estarão abertas somente 01 de novembro de 2022, aguarde !!!");
		header("Location: /cart");
		exit();
	}
	*/
	
if($_POST['idturma'] == 264 || $_POST['idturma'] == 265 || $_POST['idturma'] == 266 || $_POST['idturma'] == 267){
		Cart::setMsgError("As inscrições para esta turma estarão abertas somente de 08/07 à 15/07 de 2022, aguarde !!!");
		header("Location: /cart");
		exit();
	}
	
	/*
	if($_POST['idlocal'] != 5 && $_POST['idlocal'] != 21){
		Cart::setMsgError("As inscrições para esta turma estarão abertas somente a partir de 04/07/2022 !!!");
		header("Location: /cart");
		exit();
	}
	*/
	
	/*
	
	if($_POST['idlocal'] != 5 && $_POST['idlocal'] != 21 && ($_POST['idturma'] == 264 || $_POST['idturma'] == 265 || $_POST['idturma'] == 266 || $_POST['idturma'] == 267)){
			Cart::setMsgError("As inscrições para esta turma especial estarão abertas somente de 08/07 à 15/07 de 2022, aguarde !!!");
		header("Location: /cart");
		exit();
	}
	
	if($_POST['idlocal'] != 5 && $_POST['idlocal'] != 21 && ($_POST['idturma'] != 264 && $_POST['idturma'] != 265 && $_POST['idturma'] != 266 && $_POST['idturma'] != 267)){
		Cart::setMsgError("As inscrições para esta turma estarão abertas somente a partir de 04/07/2022 !!!");
		header("Location: /cart");
		exit();
	}
	*/

	if(Cart::cartIsEmpty((int)$_SESSION[Cart::SESSION]['idcart']) === false){
		Cart::setMsgError("Não há inscrições a confirmar! selecione uma turma ");
		header("Location: /cart");
		exit();
	}	

	if(!isset($_POST['idpess']) || $_POST['idpess'] <= 0){	
		echo "<script>alert('Você precisa selecionar uma pessoa! Se não há pessoas inseridas, você precisa fazer o login, se você já fez o cadastro. Se você ainda não tem o cadastro, cadastre-se. ');";
		echo "javascript:history.go(-1)</script>";
		//Cart::setMsgError("Você precisa selecionar uma pessoa! ");
		//header("Location: /cart");
		//exit();

	}else{

		$cart = new Cart();

		$_POST['idcart'] = (int)$_SESSION[Cart::SESSION]["idcart"];
		//$_POST['iduser'] = (int)$_SESSION[User::SESSION]["iduser"];
		$_POST['dessessionid'] = $_SESSION[Cart::SESSION]["dessessionid"];

		$pessoa = new Pessoa();

		$idpess = $_POST['idpess'];

		$pessoa->get((int)$idpess);	
		$nomepess = $pessoa->getnomepess();	
		
		if($pessoa->getpcd() && !Saude::getSaudeExist($idpess)){

    		Cart::setMsgError("Para prosseguir com a inscrição, você deve inserir ou atualizar os dados de saúde do(a) ".$nomepess."! ");
			//header("Location: /cart");
			header("Location: /saude-atualiza/".$idpess."/".$nomepess."");
			exit();
		}
		
		$saude = new Saude();

		$countParq = $saude->getCountParqByIdPess($idpess);

		if($countParq <= 0){

			Cart::setMsgError("Para prosseguir, você dever responder abaixo o Questionário de Prontidão para Atividade Física do(a) ".$nomepess."! ");
			//header("Location: /cart");
			header("Location: /par-q/".$idpess."");
			exit();

		}
	
		//$numcpf = $pessoa->getcpf();
		$numcpf = $pessoa->getnumcpf();
		//$idade = User::calcularIdade($pessoa->getdtnasc());
		$anoNasc = date('Y',  strtotime($pessoa->getdtnasc()));
		$nomepess = $pessoa->getnomepess();
		$sexodeclarado = $pessoa->getsexo();
		
		$idturma = $_POST['idturma'];
		$idtemporada = $_POST['idtemporada'];		
		$initidade = $_POST['initidade'];
		$fimidade = $_POST['fimidade']; 
		$idlocal = $_POST['idlocal']; 
		$local = $_POST['apelidolocal']; 
		$sexoTurma = $_POST['sexo'];
		$tipoativ = $_POST['tipoativ'];
		$idmodal = (int)$_POST['idmodal'];
		
		//$idturma = $_POST['idturma'];
		
		$temporada = new Temporada();

		$temporada->get((int)$idtemporada);

		$desctemporada = $temporada->getdesctemporada();
		//$inicioInscTemporada = formatDate($temporada->getdtinicinscricao());
		$inicioInscTemporada = date('d/m/Y H:i:s', strtotime($temporada->getdtinicinscricao()));
		//$terminoInscTemporada = formatDate($temporada->getdtterminscricao());
		$terminoInscTemporada = date('d/m/Y H:i:s', strtotime($temporada->getdtterminscricao()));
		$inicioMatriculaTemporada = formatDate($temporada->getdtinicmatricula());
		$termimoMatriculaTemporada = formatDate($temporada->getdttermmatricula());
		$dataSorteioTemporada = date('d/m/Y', strtotime($temporada->getdtterminscricao().' + 12 days'));
		//$dataEdital = date('d/m/Y', strtotime($temporada->getdtinicinscricao().' - 1 month'));
		$dataEdital = "28/10/2021";
		$numeroResolucao = "004";

		if(Insc::statusTemporadaIniciada($idtemporada)){

			Cart::setMsgError("As inscrições para os Cursos Esportivos para a temporada ".$desctemporada." não estão disponíveis no momento. Para a temporada ".$desctemporada." o período de inscrições será de ".$inicioInscTemporada." a ".$terminoInscTemporada." conforme resolução SESP Nº ".$numeroResolucao." publicada no jornal Notícias do Município de ".$dataEdital.". O sorteio acontecerá no dia ".$dataSorteioTemporada.". A partir do dia ".$inicioMatriculaTemporada." iniciar-se-á a etapa de matrículas e início das aulas presenciais nos Centros Esportivos, para os inscritos contemplados no sorteio.");
			header("Location: /cart");
			exit();
		}

		if(Insc::statusTemporadaMatriculaIniciada($idtemporada)){

			Cart::setMsgError("As inscrições para os Cursos Esportivos para a temporada ".$desctemporada." não estão disponíveis no momento. Para a temporada ".$desctemporada." o período de inscrições foi de ".$inicioInscTemporada." a ".$terminoInscTemporada." conforme resolução SESP Nº ".$numeroResolucao." publicada no jornal Notícias do Município de ".$dataEdital.". O sorteio aconteceu no dia ".$dataSorteioTemporada.". A partir do dia ".$inicioMatriculaTemporada." iniciar-se-á a etapa de matrículas e início das aulas presenciais nos Centros Esportivos, para os inscritos contemplados no sorteio. A partir do dia ".$termimoMatriculaTemporada." você poderá fazer novas inscrições aqui mesmo no site para uma lista de espera das turmas ou para fazer matrícula caso a turma tenha vagas disponíveis");
			header("Location: /cart");
			exit();
		}

		if(Insc::statusTemporadaInscricoesEncerradas($idtemporada)){

			Cart::setMsgError("As inscrições para os Cursos Esportivos para a temporada ".$desctemporada." não estão disponíveis no momento. Para a temporada ".$desctemporada." o período de inscrições foi de ".$inicioInscTemporada." a ".$terminoInscTemporada." conforme resolução SESP Nº ".$numeroResolucao." publicada no jornal Notícias do Município de ".$dataEdital.". O sorteio aconteceu no dia ".$dataSorteioTemporada.". A partir do dia ".$inicioMatriculaTemporada." iniciar-se-á a etapa de matrículas e início das aulas presenciais nos Centros Esportivos, para os inscritos contemplados no sorteio. A partir do dia ".$termimoMatriculaTemporada." você poderá fazer novas inscrições aqui mesmo no site para uma lista de espera das turmas ou para fazer matrícula caso a turma tenha vagas disponíveis");
			header("Location: /cart");
			exit();
		}
		
		if(isset($_POST['token'])){
		
    		if(Turma::turmatemToken($idturma)){	
    			
    			if($_POST['token'] == ''){
    
                    echo "<script>alert('Você precisa inserir o número do TOKEN que você recebeu do professor quando ele indicou você para inscrever ".$pessoa->getnomepess()." nesta turma!');";
    					echo "javascript:history.go(-1)</script>";
    					exit();
    				//Cart::setMsgError("Você precisa inserir o número do TOKEN que você recebeu do professor quando ele indicou você para inscrever ".$pessoa->getnomepess()." nesta turma!");
    				//header("Location: /cart");
    				//exit();
    			}
    
    			if(!Turma::tokemValido($_POST['token'], $_POST['idturma'])){
    			    
    			    echo "<script>alert('Este TOKEN não é válido ou já foi utilizado!');";
    					echo "javascript:history.go(-1)</script>";
    					exit();
    				//Cart::setMsgError("Este token não é valido ou já foi utilizado!");
    				//header("Location: /cart");
    				//exit();
    			}		
    
    			$_SESSION['token'] = $_POST['token'];
    		}
		}
		
		//var_dump($_POST['idlocal']);
		//exit();

		
		if($_POST['temtoken'] == 1){

			if($_POST['idlocal'] == 5){
				if(!isset($_POST['tokencpf'])){
				echo "<script>alert('Conforme Resolução SESP Nº 004 de 28/10/2021 Art.7º, Os interessados em participar das turmas de inclusão para Pessoas com Deficiência (PCD) e/ou laudo médico do CREEBA, deverão comparecer pessoalmente (interessado ou representante legal) no CREEBA');";
			    echo "javascript:history.go(-1)</script>";
			    exit;
				}
			}

			if($_POST['idlocal'] == 3){
				if(!isset($_POST['tokencpf'])){
				echo "<script>alert('Para fazer a inscrição nas turmas de natação intermediário, avançado e aperfeiçoamento para o ano de 2023 é necessário ser egresso das turmas do ano de 2022 e ter autorização fornecida pelo professor.');";
			    echo "javascript:history.go(-1)</script>";
			    exit;
				}
			}
			
			if($_POST['idlocal'] == 21){
				if(!isset($_POST['tokencpf'])){
				echo "<script>alert('Para fazer a inscrição nas turmas de natação intermediário, avançado e aperfeiçoamento para o ano de 2023 é necessário ser egresso das turmas do ano de 2022 e ter autorização fornecida pelo professor.');";
			    echo "javascript:history.go(-1)</script>";
			    exit;
				}
			}	
		}
		
		//$anoAtual = date('Y');
		
		if( (int)date('Y')  == (int)$desctemporada ){

			$anoAtual = (int)date('Y');	

		}else{

			$anoAtual = (int)date('Y') + 1;		
		}
		
		$anoFinal = $anoAtual - $fimidade;
		$anoInicial = $anoAtual - $initidade;
		
		if(isset($_POST['tokencpf'])){

			if(Turma::temTokenCpf($idturma, $numcpf)){	
				
				if($_POST['tokencpf'] == ''){

					echo "<script>alert('Você precisa inserir o número do TOKEN, associado ao CPF, que você recebeu do professor quando ele indicou você para inscrever ".$pessoa->getnomepess()." nesta turma! Ou então, se mesmo assim não conseguir, tente fazer primeiro a inscrição da última pessoa da sua lista de dependentes, se existir, inserindo o token ');";
					echo "javascript:history.go(-1)</script>";
					exit();
				}

				if(!Turma::tokenValidoCpf((int)$_POST['tokencpf'], $_POST['idturma'], $numcpf)){

					echo "<script>alert('Este TOKEN(cpf) não é válido ou já foi utilizado!');";
					echo "javascript:history.go(-1)</script>";
					exit();
				}			
			}	


			if(!Turma::comparaCpfToken($idturma, $_POST['tokencpf'], $numcpf)){

				echo "<script>alert('Este TOKEN não pertence ao CPF da pessoa selecionada');";
				echo "javascript:history.go(-1)</script>";
				exit();
			}			

			$_SESSION['tokencpf'] = $_POST['tokencpf'];		

		}else{
		    
		    if(($anoNasc > $anoInicial) || ($anoNasc < $anoFinal)){		
		    //if(($idade < $initidade) || ($idade > $fimidade)){		

			    Cart::setMsgError('Esta turma é exclusiva para pessoas nascidas entre os anos de '.$anoFinal.' e '.$anoInicial.'. Remova a turma atual e escolha outra turma compatível com o ano de nascimento do(a) '.$nomepess.'. Ele(a) nasceu no ano de '.$anoNasc.'.');
			    header("Location: /cart");
		    	exit();
		    }
		    
		    $insc = new Insc();	
		    
		    $idcart = $_POST['idcart'];
			$cart->get((int)$idcart);
			$idturma = $_POST['idturma'];
			$idtemporada = $cart->getTurma()[0]['idtemporada'];
			$vagas = $_POST['vagas'];

			$inscGeral = (int)Insc::getInscGeral($idturma, $idtemporada);
			$inscPlm = (int)Insc::pegaInscPlm($idturma, $idtemporada);
			$inscPcd = (int)Insc::pegaInscPcd($idturma, $idtemporada);
			$inscPvs = (int)Insc::pegaInscPvs($idturma, $idtemporada);

			/*
			$vagasGeral = round($vagas * 0.7);
			$vagasPlm = round($vagas * 0.1);
			$vagasPcd = round($vagas * 0.1);
			$vagasPvs = round($vagas * 0.1);
			*/

			$vagasGeral = (int)Turma::getVagasByIdTurma($idturma);
			$vagasPlm = (int)Turma::getVagasLaudoByIdTurma($idturma);
			$vagasPcd = (int)Turma::getVagasPcdByIdTurma($idturma);
			$vagasPvs = (int)Turma::getVagasPvsByIdTurma($idturma);

			$maxListaEsperaGeral = round($vagasGeral * 1.2);
			$maxListaEsperaPlm = round($vagasPlm * 1.2);
			$maxListaEsperaPcd = round($vagasPcd * 1.2);
			$maxListaEsperaPvs = round($vagasPvs * 1.2);			

            /*
			if(($inscGeral >= $maxListaEsperaGeral) 
				&& ($inscPlm >= $maxListaEsperaPlm) 
				&& ($inscPcd >= $maxListaEsperaPcd) 
				&& ($inscPvs >= $maxListaEsperaPvs)){

				 echo "<script>alert('Não há mais vagas para a lista de espera desta turma! Fique atento(a) e continue acompanhando aqui no nosso site para ver se aparecem novas vagas.');";
		    	echo "javascript:history.go(-1)</script>";
		    	exit();

			}
			*/
			
			if($idmodal == 14 || $idmodal == 56 || $idmodal == 57 || $idmodal == 58 || $idmodal == 59 || $idmodal == 60){
			
    			if ($cart->getInscDesistenteExist($numcpf, $idpess, $idturma, $idtemporada)){
    
    			echo "<script>alert('".$nomepess." é desistente desta turma. Assim, não poderá fazer uma nova inscrição para esta turma, nesta temporada.');";
    				echo "javascript:history.go(-1)</script>";
    				exit();
    		    }
			}
		    
		    /*
	    
    	    $porcentVagas = $_POST['vagas'] * 1.20;
    
    		if($insc->countInscTurma($idtemporada, $idturma) >= $porcentVagas){
    
    			 echo "<script>alert('Não há mais vagas para para a lista de espera desta turma! Fique atento(a) e continue acompanhando aqui no nosso site para ver se aparecem novas vagas.');";
    	    	echo "javascript:history.go(-1)</script>";
    	    	exit();
    		}
    		
    		*/
		}
		
		if($sexodeclarado != $sexoTurma && $sexoTurma != ''){		

			Cart::setMsgError('Esta turma é exclusiva para pessoas do sexo '.$sexoTurma.'. Verifique, no perfil do(a) '.$nomepess.', em "Minha Família" o sexo declarado dele(a). Se for necessário faça a alteração.');
			header("Location: /cart");
			exit();
		}
		
		if( (int)date('Y')  == (int)$desctemporada ){

		    $anoAtual = (int)date('Y');	

        	}else{

		    $anoAtual = (int)date('Y') + 1;		
	    }
		
		if($idmodal == 6 || $idmodal == 14 || $idmodal == 56 || $idmodal == 57 || $idmodal == 58 || $idmodal == 59 || $idmodal == 60){
		    
		    if ($cart->getInscExistAquaticLocal($numcpf, $idpess, $idturma, $idtemporada, $idlocal, $tipoativ)){

			    Cart::setMsgError($nomepess.' já está inscrito(a) para uma turma do tipo '.$tipoativ.' no '.$local.'!');
			    header("Location: /cart");
			    exit();

		    }
		}
		
		$mesCorrente = (int)date('m', strtotime('now'));
		
		if($mesCorrente === 11 || $mesCorrente === 12){

			$inscPorTemporada = (int)$cart->getCountInscExistTemporada($numcpf, $idtemporada);

			if($inscPorTemporada === 1){
				echo "<script>alert(' ".$nomepess." já tem uma inscrição válida para a temporada ".$desctemporada."! A partir de janeiro de ".$desctemporada." você poderá fazer mais uma inscrição.');";
				echo "javascript:history.go(-1)</script>";
				exit();
			}		
		}

		if($mesCorrente === 01 || $mesCorrente === 02){

			$inscPorTemporada = (int)$cart->getCountInscExistTemporada($numcpf, $idtemporada);

			if($inscPorTemporada >= 2){
				echo "<script>alert(' ".$nomepess." já tem 02 inscrições válidas para a temporada ".$desctemporada."! A partir de março de ".$desctemporada." você poderá fazer mais uma inscrição.');";
				echo "javascript:history.go(-1)</script>";
				exit();
			}		
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

		Cart::setMsgError("Você já selecionou uma turma! Confirme se é realmente esta turma que você quer fazer a inscrição. Se for, selecione a pessoa que irá fazer a aula e clique no botão CONFIRMAR INSCRIÇÃO. Se não for esta turma clique em 'Selecionar uma outra turma' e selecione a turma que você quer se inscrever.");
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
    
    echo "<script>javascript:history.go(-2)</script>";

	//header("Location: /");
	//exit;
});


?>