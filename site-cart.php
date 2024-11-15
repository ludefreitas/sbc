<?php

use \Sbc\Page;
use \Sbc\Model\Turma;
use \Sbc\Model\Cart;
use \Sbc\Model\Pessoa;
use \Sbc\Model\User;
use \Sbc\Model\Temporada;
use \Sbc\Model\Insc;
use \Sbc\Model\Saude;
use \Sbc\Model\Modalidade;

//$app->get("/cart", function(){
    
    /*
    $httpResponse = http_response_code();
    
    //if($httpResponse == 200 || $httpResponse == 200){
	if($httpResponse == 505 || $httpResponse == 500){
	    
	    echo "<script>window.location.href = '/redirecionando'</script>";

		//header('Location: /redirecionando');
		exit();
	}
	*/
    
    /*
	$cart = Cart::getFromSession();
	$user = User::getFromSession();
	
	$idcartcart = $cart->getidcart();
	$sessionidcart = $cart->getdessessionid();
	$idpesscart = $cart->getidpess();
	*/
	
	/*
	echo '<pre>';
	//var_dump($cart->getidcart());
	//var_dump($cart->getdessessionid());
	var_dump($cart->getidpess());
	echo '<pre>';
	exit();
	*/
	

	/*
	if(isset($_SESSION['Cart']['idturma'])){
		$idturma = $_SESSION['Cart']['idturma'];
	}else{
		$idturma = 0;
	}
	
	if( !isset($_SESSION['User']['iduser']) || $_SESSION['User']['iduser'] != 89){
	    $turma = $cart->getTurmaByIdturma($idturma);
	}else{
	    $turma = $cart->getTurmaFullByIdturma($idturma);
	}
	*/	
	/*
	if($_SESSION['User']['iduser'] != 89){
	    $turma = $cart->getTurma();
	}else{
	    $turma = $cart->getTurmaFull();
	}
	*/
	
	/*
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

	$_SESSION['Cart']['oldturma'] = $turma;

	$_SESSION['Cart']['idturma'] = $idturma;
	
	$page = new Page();

	$page->setTpl("cart", [
	    'idcartcart'=>$idcartcart,
	    'sessionidcart'=>$sessionidcart,
	    'idpesscart'=>$idpesscart,
		'cart'=>$cart->getValues(),
		'temtoken'=>$temtoken,
		'anoAtual'=>$anoAtual,
		'turma'=>$turma,
		'pessoa'=>$user->getPessoa(),
		'error'=>Cart::getMsgError(),
		'msgError'=>Cart::getMsgError(),
		'msgSuccess'=>Cart::getMsgSuccess()
	]);

	*/
	
//});		

$app->post("/cart", function() {

	User::verifyLogin(false);

	/*
	if($_SESSION['User']['inadmin'] != 1){
	    
	    Cart::setMsgError("As inscrições para esta turma somente estarão disponíveis somente a partir de 15 de janeiro 2024, aguarde !!!");
		header("Location: /cart");
		exit();
	}
	*/

    /*
	if(Cart::cartIsEmpty((int)$_SESSION[Cart::SESSION]['idcart']) === false){
		Cart::setMsgError("Não há inscrições a confirmar! selecione uma turma ");
		header("Location: /cart");
		exit();
	}	
	*/

	if(!isset($_POST['idpess']) || $_POST['idpess'] <= 0){	
		echo "<script>alert('Você precisa selecionar uma pessoa! Se não há pessoas inseridas, você precisa fazer o login, se você já fez o cadastro. Se você ainda não tem o cadastro, cadastre-se. ');";
		echo "javascript:history.go(-1)</script>";
		exit();
		
	}else{

		$cart = new Cart();

		//$_POST['idcart'] = (int)$_SESSION[Cart::SESSION]["idcart"];
		//$_POST['dessessionid'] = $_SESSION[Cart::SESSION]["dessessionid"];

		$pessoa = new Pessoa();

		$idpess = $_POST['idpess'];

		$pessoa->get((int)$idpess);	
		$nomepess = $pessoa->getnomepess();	
		
		if($pessoa->getpcd() && !Saude::getSaudeExist($idpess)){

    		Cart::setMsgError("Para prosseguir com a inscrição, você deve inserir ou atualizar os dados de saúde do(a) ".$nomepess."! ");
    		echo "<script>window.location.href = '/saude-atualiza/".$idpess."/".$nomepess."'</script>";
			//header("Location: /saude-atualiza/".$idpess."/".$nomepess."");
			exit();
		}
		
		$saude = new Saude();

		$countParq = $saude->getCountParqByIdPess($idpess);

		if($countParq <= 0){

			Cart::setMsgError("Para prosseguir, você dever responder abaixo o Questionário de Prontidão para Atividade Física do(a) ".$nomepess."! ");
			echo "<script>window.location.href = '/par-q/".$idpess."'</script>";
			//header("Location: /par-q/".$idpess."");
			exit();

		}
		
		$numcpf = $pessoa->getnumcpf();
		$anoNasc = date('Y',  strtotime($pessoa->getdtnasc()));
		$nomepess = $pessoa->getnomepess();
		$sexodeclarado = $pessoa->getsexo();
		
		$idturma = $_POST['idturma'];
		$idtemporada = $_POST['idtemporada'];		
		$initidade = (int)$_POST['initidade'];
		$fimidade = (int)$_POST['fimidade']; 
		$idlocal = $_POST['idlocal']; 
		$local = $_POST['apelidolocal']; 
		$sexoTurma = $_POST['sexo'];
		$tipoativ = $_POST['tipoativ'];
		$idmodal = (int)$_POST['idmodal'];

		$modalidade = new Modalidade();

		$modalidade->get((int)$idmodal);

		$descmodal = $modalidade->getdescmodal();
		
		$temporada = new Temporada();

		$temporada->get((int)$idtemporada);

		$turma = new Turma();

		$turma->get((int)$idturma);

		$desctemporada = $temporada->getdesctemporada();
		//$inicioInscTemporada = formatDate($temporada->getdtinicinscricao());
		$inicioInscTemporada = date('d/m/Y H:i:s', strtotime($temporada->getdtinicinscricao()));
		//$terminoInscTemporada = formatDate($temporada->getdtterminscricao());
		$terminoInscTemporada = date('d/m/Y H:i:s', strtotime($temporada->getdtterminscricao()));
		$inicioMatriculaTemporada = formatDate($temporada->getdtinicmatricula());
		$termimoMatriculaTemporada = formatDate($temporada->getdttermmatricula());
		$dataSorteioTemporada = date('d/m/Y', strtotime($temporada->getdtterminscricao().' + 12 days'));
		//$dataEdital = date('d/m/Y', strtotime($temporada->getdtinicinscricao().' - 1 month'));
		$dataEdital = "15/12/2023";
		$numeroResolucao = "006";

		if(Insc::statusTemporadaIniciada($idtemporada)){

      
			Cart::setMsgError("As inscrições para os Cursos Esportivos para a temporada ".$desctemporada." não estão disponíveis no momento. Para a temporada ".$desctemporada." o período de inscrições será a partir do dia ".$inicioInscTemporada." até o dia ".$terminoInscTemporada.", conforme resolução SESP Nº ".$numeroResolucao." publicada no jornal Notícias do Município de São Bernardo do Campo de ".$dataEdital.". A partir do dia ".$inicioMatriculaTemporada." iniciar-se-á a etapa de matrículas (PRESENCIAL) nos Centros Esportivos.");
			echo "<script>window.location.href = '/cart'</script>";
			//header("Location: /cart");
			exit();
			
			
		}

		if(Insc::statusTemporadaMatriculaIniciada($idtemporada)){
		    
			if($idmodal == 25){

			
			}else{

    			Cart::setMsgError("As inscrições para os Cursos Esportivos para a temporada ".$desctemporada." não estão disponíveis no momento. Para a temporada ".$desctemporada." o período de inscrições foi de ".$inicioInscTemporada." a ".$terminoInscTemporada." conforme resolução SESP Nº ".$numeroResolucao." publicada no jornal Notícias do Município de ".$dataEdital.". A partir do dia ".$inicioMatriculaTemporada." iniciar-se-á a etapa de matrículas (PRESENCIAL) nos Centros Esportivos. A partir do dia ".$termimoMatriculaTemporada." você poderá fazer novas inscrições aqui mesmo no site para uma lista de espera das turmas ou para fazer matrícula caso a turma de sua escolha tenha vagas disponíveis");
    			echo "<script>window.location.href = '/cart'</script>";
    			//header("Location: /cart");
    			exit();
			}
		}

		if(Insc::statusTemporadaInscricoesEncerradas($idtemporada)){

			Cart::setMsgError("As inscrições para os Cursos Esportivos para a temporada ".$desctemporada." não estão disponíveis no momento. Para a temporada ".$desctemporada." o período de inscrições foi de ".$inicioInscTemporada." a ".$terminoInscTemporada." conforme resolução SESP Nº ".$numeroResolucao." publicada no jornal Notícias do Município de ".$dataEdital.". A partir do dia ".$inicioMatriculaTemporada." iniciar-se-á a etapa de matrículas (PRESENCIAL) nos Centros Esportivos. A partir do dia ".$termimoMatriculaTemporada." você poderá fazer novas inscrições aqui mesmo no site para uma lista de espera das turmas ou para fazer matrícula caso a turma de sua escolha tenha vagas disponíveis");
			echo "<script>window.location.href = '/cart'</script>";
			//header("Location: /cart");
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
				    echo "<script>alert('Conforme Resolução SESP Nº 006 de 15/12/2023 Art.2º §2º, os interessados em participar das turmas de inclusão para Pessoas com Deficiência (PCD) e/ou laudo médico do CREEBA, deverão comparecer pessoalmente (interessado ou representante legal) no CREEBA');";
				    echo "javascript:history.go(-1)</script>";
			        exit;
				}
			}else{

    			if($_POST['idlocal'] == 3){
    				if(!isset($_POST['tokencpf'])){
    				    echo "<script>alert('Para fazer a inscrição nas turmas de natação intermediário, avançado e aperfeiçoamento para o ano de 2024 é necessário ser egresso das turmas do ano de 2023 e ter autorização fornecida pelo professor.');";
    			        echo "javascript:history.go(-1)</script>";
    			        exit;
    				}
    			}else{
    			
        			if($_POST['idlocal'] == 21){
        				if(!isset($_POST['tokencpf'])){
        				    echo "<script>alert('Para fazer a inscrição nas turmas de natação intermediário, avançado e aperfeiçoamento para o ano de 2024 é necessário ser egresso das turmas do ano de 2023 e ter autorização fornecida pelo professor.');";
        			        echo "javascript:history.go(-1)</script>";
        			        exit;
        				}
        			}else{
        			    if(!isset($_POST['tokencpf'])){
						    echo "<script>alert('Para fazer a inscrição nesta turma é necessário ter autorização fornecida pelo professor. Leia a descrição e a observação da turma.');";
					        echo "javascript:history.go(-1)</script>";
					        exit;
						}
        			}
    			}
			}
		}
		
		//$anoAtual = date('Y');
		
		if( (int)date('Y')  == (int)$desctemporada ){

			$anoAtual = (int)date('Y');	

		}else{

			$anoAtual = (int)date('Y') + 1;		
		}
		
		$anoFinal = ($anoAtual - $fimidade);
		$anoInicial = ($anoAtual - $initidade);
		
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
			}else{

				if(!Turma::temTokenCpf($idturma, $numcpf)){	
			        
			    }else{

    				if(!Turma::comparaCpfToken($idturma, $_POST['tokencpf'], $numcpf)){
    
    				echo "<script>alert('Este TOKEN não pertence ao CPF da pessoa selecionada');";
    				echo "javascript:history.go(-1)</script>";
    				exit();
    				}
			    }

			}	
			

			$_SESSION['tokencpf'] = $_POST['tokencpf'];		

		}else{
		    
		    if(($anoNasc > $anoInicial) || ($anoNasc < $anoFinal)){		
		    //if(($idade < $initidade) || ($idade > $fimidade)){		

			    Cart::setMsgError('Esta turma é exclusiva para pessoas nascidas entre os anos de '.$anoFinal.' e '.$anoInicial.'. Remova a turma atual e escolha outra turma compatível com o ano de nascimento do(a) '.$nomepess.'. Ele(a) nasceu no ano de '.$anoNasc.'.');
			    echo "<script>window.location.href = '/cart'</script>";
			    //header("Location: /cart");
		    	exit();
		    }
		    
		    $insc = new Insc();	
		    
		    /*
		    $idcart = $_POST['idcart'];
			$cart->get((int)$idcart);
			*/

			$idturma = $_POST['idturma'];
			//$idtemporada = $cart->getTurma()[0]['idtemporada'];
			$idtemporada = $_POST['idtemporada'];
			$vagas = $_POST['vagas'];

			$inscGeral = (int)Insc::getInscGeral($idturma, $idtemporada);
			$inscPlm = (int)Insc::pegaInscPlm($idturma, $idtemporada);
			$inscPcd = (int)Insc::pegaInscPcd($idturma, $idtemporada);
			$inscPvs = (int)Insc::pegaInscPvs($idturma, $idtemporada);

			$vagasGeral = (int)Turma::getVagasByIdTurma($idturma);
			$vagasPlm = (int)Turma::getVagasLaudoByIdTurma($idturma);
			$vagasPcd = (int)Turma::getVagasPcdByIdTurma($idturma);
			$vagasPvs = (int)Turma::getVagasPvsByIdTurma($idturma);

			$maxListaEsperaGeral = round($vagasGeral * 1.2);
			$maxListaEsperaPlm = round($vagasPlm * 1.2);
			$maxListaEsperaPcd = round($vagasPcd * 1.2);
			$maxListaEsperaPvs = round($vagasPvs * 1.2);			
	
			if($idmodal == 14 || $idmodal == 56 || $idmodal == 57 || $idmodal == 58 || $idmodal == 59 || $idmodal == 60 || $idmodal == 64){
			
    			if ($cart->getInscDesistenteExist($numcpf, $idpess, $idturma, $idtemporada)){
    
    			echo "<script>alert('".$nomepess." é desistente desta turma. Assim, não poderá fazer uma nova inscrição para esta turma, nesta temporada.');";
    				echo "javascript:history.go(-1)</script>";
    				exit();
    		    }
			}		    

    		$inscmodalidadeexiste = $cart->getInscModalidadeExist($numcpf, $idmodal, $idtemporada);

		    if ($inscmodalidadeexiste > 0){

			    Cart::setMsgError($nomepess.' já está inscrito(a) em turma da modalidade '.$descmodal.' para esta temporada! Só é permitido uma inscrição por modalidade!');
			    //echo "<script>window.location.href = '/cart'</script>";
			    echo "<script>window.location.href = '/cart/".$idturma."/".$idtemporada."/add'</script>";
			exit();
			    //header("Location: /cart");
			    //exit();
	    	}

	    	$inscmodalidadeexiste = $cart->getInscModalidadeExistNew($numcpf, $idmodal, $idtemporada);

		    if ($inscmodalidadeexiste > 0){

			    Cart::setMsgError($nomepess.' já está inscrito(a) em turma da modalidade '.$descmodal.' para esta temporada! Só é permitido uma inscrição por modalidade! [2]');
			    //echo "<script>window.location.href = '/cart'</script>";
			    echo "<script>window.location.href = '/cart/".$idturma."/".$idtemporada."/add'</script>";
			    exit();
			    //header("Location: /cart");
			    //exit();
	    	}
		}
		
		if($sexodeclarado != $sexoTurma && $sexoTurma != ''){		

			Cart::setMsgError('Esta turma é exclusiva para pessoas do sexo '.$sexoTurma.'. Verifique, no perfil do(a) '.$nomepess.', em "Minha Família" o sexo declarado dele(a). Se for necessário faça a alteração.');
			echo "<script>window.location.href = '/cart/".$idturma."/".$idtemporada."/add'</script>";
			//header("Location: /cart");
			exit();
		}
		
		if( (int)date('Y')  == (int)$desctemporada ){

		    $anoAtual = (int)date('Y');	

        	}else{

		    $anoAtual = (int)date('Y') + 1;		
	    }
	    
	    $horaAtual = (int)date('H', strtotime('now'));	    	

	    if(($tipoativ ==="Terrestre") && (date('Y-m-d') == "2024-01-15") && ($horaAtual < 16) ){

			Cart::setMsgError(' A inscrição para esta turma estará disponpivel somente a partir das 16:00h, agurade!');
			echo "<script>window.location.href = '/logout'</script>";
			//header("Location: /logout");
			exit();

		}
		
		if($idmodal == 6 || $idmodal == 14 || $idmodal == 56 || $idmodal == 57 || $idmodal == 58 || $idmodal == 59 || $idmodal == 60 || $idmodal == 64){
		    
		    if ($cart->getInscExistAquaticLocal($numcpf, $idpess, $idturma, $idtemporada, $idlocal, $tipoativ)){

			    $getinscexistaquaticlocal = $cart->getInscExistAquaticLocal($numcpf, $idpess, $idturma, $idtemporada, $idlocal, $tipoativ);

		    	if(!isset($getinscexistaquaticlocal) || $getinscexistaquaticlocal == NULL || $getinscexistaquaticlocal == 0 ){
		    		$getidmodainscexistaquaticlocal = 0;	
		    	}else{
		    		$getidmodainscexistaquaticlocal = (int)$getinscexistaquaticlocal[0]['idmodal'];
		    	}

				// Aqui verifica se a inscrição é para o projeto Perdendo o Medo de Nadar
				// e se existe inscrição válida para hidroginástica, libera mesmo assim
				if($getidmodainscexistaquaticlocal == 6 && $idmodal == 60) {

				}else{

					Cart::setMsgError($nomepess.' já está inscrito(a) para uma turma do tipo '.$tipoativ.' no '.$local.'!');
			    	echo "<script>window.location.href = '/cart/".$idturma."/".$idtemporada."/add'</script>";
			    	//header("Location: /cart");
			    	exit();
				}					    
		    }

		    if ($cart->getInscExistAquaticLocalNew($numcpf, $idpess, $idturma, $idtemporada, $idlocal, $tipoativ)){

			    $getinscexistaquaticlocalnew = $cart->getInscExistAquaticLocalNew($numcpf, $idpess, $idturma, $idtemporada, $idlocal, $tipoativ);

		    	if(!isset($getinscexistaquaticlocalnew) || $getinscexistaquaticlocalnew == NULL || $getinscexistaquaticlocalnew == 0 ){
		    		$getidmodainscexistaquaticlocalnew = 0;	
		    	}else{
		    		$getidmodainscexistaquaticlocalnew = (int)$getinscexistaquaticlocalnew[0]['idmodal'];
		    	}

				// Aqui verifica se a inscrição é para o projeto Perdendo o Medo de Nadar
				// e se existe inscrição válida para hidroginástica, libera mesmo assim
				if($getidmodainscexistaquaticlocalnew == 6 && $idmodal == 60) {

				}else{

					Cart::setMsgError($nomepess.' já está inscrito(a) para uma turma do tipo '.$tipoativ.' no '.$local.'!');
			    	echo "<script>window.location.href = '/cart/".$idturma."/".$idtemporada."/add'</script>";
			    	//header("Location: /cart");
			    	exit();
				}					    
		    }
		}
		
		$mesCorrente = (int)date('m', strtotime('now'));
		$diaAtual = (int)date('d', strtotime('now'));
		$horaAtual = (int)date('H', strtotime('now'));
		
		if( ($mesCorrente === 1) || ($mesCorrente === 2 && $diaAtual < 15) || ($diaAtual === 15 && $horaAtual < 10) ){

			$inscPorTemporada = (int)$cart->getCountInscExistTemporada($numcpf, $idtemporada);

			if($inscPorTemporada === 1){

				echo "<script>alert(' ".$nomepess." já tem uma inscrição válida para a temporada ".$desctemporada."! A partir de 15 de fevereiro de ".$desctemporada.", a partir das 10:00h, você poderá fazer mais uma inscrição.');";
				echo "javascript:history.go(-1)</script>";
				exit();
			}

			$inscPorTemporada = (int)$cart->getCountInscExistTemporadaNew($numcpf, $idtemporada);

			if($inscPorTemporada === 1){

				echo "<script>alert(' ".$nomepess." já tem uma inscrição válida para a temporada ".$desctemporada."! A partir de 15 de fevereiro de ".$desctemporada.", a partir das 10:00h, você poderá fazer mais uma inscrição.[2]');";
				echo "javascript:history.go(-1)</script>";
				exit();
			}
		}

		if( ($mesCorrente === 2) || ($mesCorrente === 3 && $diaAtual < 15) || ($diaAtual === 15 && $horaAtual < 10) ){

			$inscPorTemporada = (int)$cart->getCountInscExistTemporada($numcpf, $idtemporada);
			
			if($inscPorTemporada >= 2){

				echo "<script>alert(' ".$nomepess." já tem 02 inscrições válidas para a temporada ".$desctemporada."! A partir de 15 de março de ".$desctemporada.", a partir das 10:00h, você poderá fazer mais uma inscrição.');";
				echo "javascript:history.go(-1)</script>";
				exit();
			}

			$inscPorTemporada = (int)$cart->getCountInscExistTemporadaNew($numcpf, $idtemporada);
			
			if($inscPorTemporada >= 2){

				echo "<script>alert(' ".$nomepess." já tem 02 inscrições válidas para a temporada ".$desctemporada."! A partir de 15 de março de ".$desctemporada.", a partir das 10:00h, você poderá fazer mais uma inscrição.[2]');";
				echo "javascript:history.go(-1)</script>";
				exit();
			}
		}

		/*
		if ($insc->getInscExistByCpf($numcpf, $idturma, $idtemporada)){

			$descturma = $turma->getdescturma();

			Cart::setMsgError($nomepess.' já está inscrito(a) nesta '.$descturma.' para a temporada de '.$desctemporada.' Clique acima em "Inscrições" e confira!');
			//header("Location: /cart");
			echo "<script>window.location.href = 'http://www.cursosesportivos.com.br'</script>";
			exit();

		}
		*/
		
		$insc = new Insc();

		//if ($cart->getInscExist($numcpf, $idturma, $idtemporada)){
		//if ($cart->getInscExist($numcpf, $idturma, $idtemporada) || $insc->getInscExistByCpf($numcpf, $idturma, $idtemporada)){
		if ($insc->getInscExistByCpf($numcpf, $idturma, $idtemporada)){

			Cart::setMsgError($nomepess.' já está inscrito(a) nesta turma para esta temporada!');
			//header("Location: /cart");
			//echo "<script>window.location.href = '/modalidade/".$idmodal."/".$idlocal."'</script>";
			echo "<script>window.location.href = '/cart/".$idturma."/".$idtemporada."/add'</script>";
			exit();

		}else{	

			if(!isset($_POST['dessessionid']) || $_POST['dessessionid'] == NULL ){
				$_POST['dessessionid'] = NULL;
			}else{
				$_POST['dessessionid'] = $_POST['dessessionid'];
			}

			
		    
		    $cart->setData($_POST);
			
			$cart->save([
				//'idcart'=>$_POST['idcart'],
				//':iduser'=>$_POST['iduser'],		
				':idpess'=>$idpess,
				':dessessionid'=>$_POST['dessessionid']
			]);

			//--------------------------------------------------------------

			$turma = new Turma();

			$idturma = $cart->getidturma();

			if($_SESSION['User']['iduser'] != 89){
	    		$turma = $cart->getTurmaByIdturma($idturma);
			}else{
	    		$turma = $cart->getTurmaFullByIdturma($idturma);
			}

			$_SESSION['token'] = isset($_SESSION['token']) ? $_SESSION['token'] : '';
			$_SESSION['tokencpf'] = isset($_SESSION['tokencpf']) ? $_SESSION['tokencpf'] : 0;

			$token = $_SESSION['token'];
			$tokencpf = $_SESSION['tokencpf'];
			//$tokencpf = $_POST['tokencpf'];

			//var_dump($_POST);
			//exit();

			$vagasGeral = (int)Turma::getVagasByIdTurma($idturma);
			$vagasPlm = (int)Turma::getVagasLaudoByIdTurma($idturma);
			$vagasPcd = (int)Turma::getVagasPcdByIdTurma($idturma);
			$vagasPvs = (int)Turma::getVagasPvsByIdTurma($idturma);
			$pegainscGeral = Insc::getNumInscPublicoGeralValidaTurmaTemporada($idtemporada, $idturma);
			//$pegainscGeral = (int)$insc->pegaInscGeral($idturma, $idtemporada);
			$pegainscPlm = Insc::getNumInscPublicoLaudoValidaTurmaTemporada($idtemporada, $idturma);
			//$pegainscPlm = (int)$insc->pegaInscPlm($idturma, $idtemporada);
			$pegainscPcd = Insc::getNumInscPublicoPcdValidaTurmaTemporada($idtemporada, $idturma);
			//$pegainscPcd = (int)$insc->pegaInscPcd($idturma, $idtemporada);
			$pegainscPvs = Insc::getNumInscPublicoPvsValidaTurmaTemporada($idtemporada, $idturma);
			//$pegainscPvs = (int)$insc->pegaInscPvs($idturma, $idtemporada);

			$vagasListaEsperaGeral = (int)ceil($vagasGeral * 0.2);
			$vagasListaEsperaPlm = (int)ceil($vagasPlm * 0.2);
			$vagasListaEsperaPcd = (int)ceil($vagasPcd * 0.2);
			$vagasListaEsperaPvs = (int)ceil($vagasPvs * 0.2);

			$vagasMenosInscritosGeral = $vagasGeral - $pegainscGeral + $vagasListaEsperaGeral;
			$vagasMenosInscritosPlm = $vagasPlm - $pegainscPlm + $vagasListaEsperaPlm;
			$vagasMenosInscritosPcd = $vagasPcd - $pegainscPcd + $vagasListaEsperaPcd;
			$vagasMenosInscritosPvs = $vagasPvs - $pegainscPvs + $vagasListaEsperaPvs;

			$idturmastatus = $turma[0]['idturmastatus'];
			
			if($idturmastatus == 3){			
				$vagasListaEsperaGeral = $vagasMenosInscritosGeral;
				$vagasListaEsperaPlm = $vagasMenosInscritosPlm;
				$vagasListaEsperaPcd = $vagasMenosInscritosPcd;
				$vagasListaEsperaPvs = $vagasMenosInscritosPvs;			
			}else{
				if($idmodal == 25){
						$vagasListaEsperaGeral = (int)ceil($vagasGeral * 0.5);
						$vagasListaEsperaPlm = (int)ceil($vagasPlm * 0.5);
						$vagasListaEsperaPcd = (int)ceil($vagasPcd * 0.5);
						$vagasListaEsperaPvs = (int)ceil($vagasPvs * 0.5);	
					}else{
						$vagasListaEsperaGeral = (int)ceil($vagasGeral * 0.2);
						$vagasListaEsperaPlm = (int)ceil($vagasPlm * 0.2);
						$vagasListaEsperaPcd = (int)ceil($vagasPcd * 0.2);
						$vagasListaEsperaPvs = (int)ceil($vagasPvs * 0.2);		
					}			
			}		
			
			$numinscListaEsperaPublicoGeral = Insc::getNumInscListaEsperaPubGeralTurmaTemporada($idtemporada, $idturma);
			$numinscListaEsperaPublicoLaudo = Insc::getNumInscListaEsperaPubLaudoTurmaTemporada($idtemporada, $idturma);
			$numinscListaEsperaPublicoPcd = Insc::getNumInscListaEsperaPubPcdTurmaTemporada($idtemporada, $idturma);
			$numinscListaEsperaPublicoPvs = Insc::getNumInscListaEsperaPubPvsTurmaTemporada($idtemporada, $idturma);


			//var_dump($turma->getValues());
			//exit;

			$page = new Page();

			$page->setTpl("checkout", [
			'token'=>$token,
			'tokencpf'=>$tokencpf,
			//'cart'=>$cart->getValues(),
			'pessoa'=>$pessoa->getValues(),
			'turma'=>$turma,
			//'cid'=>$cid = Saude::listAllCid(),
			'vagasGeral'=>$vagasGeral,
			'inscGeral'=>$pegainscGeral,
			'vagasPlm'=>$vagasPlm,
			'inscPlm'=>$pegainscPlm,
			'vagasPcd'=>$vagasPcd,
			'inscPcd'=>$pegainscPcd,
			'vagasPvs'=>$vagasPvs,
			'inscPvs'=>$pegainscPvs,
			'vagasListaEsperaGeral'=>$vagasListaEsperaGeral,
			'vagasListaEsperaPlm'=>$vagasListaEsperaPlm,
			'vagasListaEsperaPcd'=>$vagasListaEsperaPcd,
			'vagasListaEsperaPvs'=>$vagasListaEsperaPvs,
			'numinscListaEsperaPublicoGeral'=>$numinscListaEsperaPublicoGeral,
			'numinscListaEsperaPublicoLaudo'=>$numinscListaEsperaPublicoLaudo,
			'numinscListaEsperaPublicoPcd'=>$numinscListaEsperaPublicoPcd,
			'numinscListaEsperaPublicoPvs'=>$numinscListaEsperaPublicoPvs,
			'error'=>Pessoa::getError()
			]);

			//------------------------------------------------------------
            
            //echo "<script>window.location.href = '/checkout'</script>";
			//exit();
		}
	}
});

$app->get("/cart/:idturma/:idtemporada/add", function($idturma, $idtemporada){

	$turma = new Turma();

	$turma->get((int)$idturma);

	$user = User::getFromSession();

	/*
	$cart = new Cart();

	$sessionid = 1;

	$cart->save2($sessionid);

	$idcart = $cart->getidcart();

	//var_dump($idcart);
	//exit;
	*/

	/*
	$cart = Cart::getFromSession();
	
	$_SESSION[Cart::SESSION]["idturma"] = $idturma;

	$idcart = (int)$_SESSION[Cart::SESSION]["idcart"];

	if( Cart::cartIsEmpty($idcart) > 0){

		Cart::setMsgError("Você já selecionou uma turma! Confirme se é realmente esta turma que você quer fazer a inscrição. Se for, selecione a pessoa que irá fazer a aula e clique no botão CONFIRMAR INSCRIÇÃO. Se não for esta turma clique em 'Selecionar uma outra turma' e selecione a turma que você quer se inscrever.");
		echo "<script>window.location.href = '/cart'</script>";
		//header("Location: /cart");
		exit();

	}else{
				
		$cart->addTurma($turma);
	}	
	*/	

	$cart = new Cart();
	$user = new User();

	if( !isset($_SESSION['User']['iduser']) || $_SESSION['User']['iduser'] != 89){
	    $turma = $cart->getTurmaByIdturma($idturma);
	}else{
	    $turma = $cart->getTurmaFullByIdturma($idturma);
	}	

	//var_dump($turma);
	//exit();

	//$idturma  = isset($turma[0]['idturma']) ? $turma[0]['idturma'] : '';
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

	$iduser = $_SESSION['User']['iduser'];

	$pessoas = $user->getPessoaByIdUser($iduser);

	//var_dump($pessoas);
	//exit();

	$page = new Page();

	$page->setTpl("cart", [
	    //'idcartcart'=>$idcartcart,
	    //'sessionidcart'=>$sessionidcart,
	    //'idpesscart'=>$idpesscart,
		//'cart'=>$cart->getValues(),
		'temtoken'=>$temtoken,
		'anoAtual'=>$anoAtual,
		'turma'=>$turma,
		'pessoa'=>$pessoas,
		'error'=>Cart::getMsgError(),
		'msgError'=>Cart::getMsgError(),
		'msgSuccess'=>Cart::getMsgSuccess()
	]);

	/*
	
	echo "<script>window.location.href = '/cart'</script>";
	//header("Location: /cart");
	exit;

	*/
});

$app->get("/cart/:idturma/remove", function($idturma){

	$turma = new Turma();

	$turma->get((int)$idturma);

	$cart = Cart::getFromSession();

	$cart->removeTurma($turma, true);

	Cart::removeFromSession();
    session_regenerate_id();
    
    echo "<script>window.location.href = '/'</script>";

	//header("Location: /");
	//exit;
});


?>