<?php

use \Sbc\PageAdmin;
use \Sbc\Model\Evento;
use \Sbc\Model\Temporada;
use \Sbc\Model\local;
use \Sbc\Model\Espaco;
use \Sbc\Model\User;

$app->get("/admin/evento", function() {

	$vento = new Evento();

	$evento = Evento::listAll();

	$page = new PageAdmin();

	$page->setTpl("eventos", [
		'evento'=>$evento,
		'error'=>Evento::getError()
		
	]);
});

$app->get("/admin/evento/create", function() {

	$evento = new Evento();

	$temporada = Temporada::listAll();
	$local = Local::listAll();
	$espaco = Espaco::listAll();

	$evento = Evento::listAll();

	$eventoStatsu = Evento::listEventoStatus();
	$profestagiario = User::listAllProfEstagiario();

	//var_dump($prof);
	//exit();

	$page = new PageAdmin();

	$page->setTpl("evento-create", [
		'evento'=>$evento,
		'eventoStatsu'=>$eventoStatsu,
		'profestagiario'=>$profestagiario,
		'espaco'=>$espaco,
		'temporada'=>$temporada,
		'error'=>Evento::getError(),
		'createEventoValues'=>(isset($_SESSION['createEventoValues'])) ? $_SESSION['createEventoValues'] : ['desc_evento'=>'', 'idespaco'=>'', 'idtemporada'=>'', 'idstatus_evento'=>'', 'vagas'=>'', 'desperson'=>'', 'desperson2'=>'', 'programa_evento'=>'','tipo_resultado_evento'=>'',  'origem_evento'=>'', 'tipo_evento'=>'', 'dt_inicio_divulgacao_evento'=>'', 'dt_final_divulgacao_evento'=>'', 'dt_comeco_insc_evento'=>'', 'dt_termino_insc_evento'=>'', 'dia_inicio_evento'=>'', 'dia_termino_evento'=>'', 'hora_inicio_evento'=>'', 'hora_termino_evento'=>'', 'dt_saida_transporte_evento'=>'', 'dt_retorno_transporte_evento'=>'', 'hora_saida_transporte_evento'=>'', 'hora_retorno_transporte_evento'=>'', 'tem_transporte'=>'', 'divDiaFinalEvento'=>'', 'obs_evento'=>'', 'telef_inform_evento'=>'', 'relac_equip_evento'=>'', 'dia_final_evento'=>'', 'so_para_alunos'=>'']
		
	]);
	
});

$app->post("/admin/evento/create", function() {

	$evento = new Evento();

	/*

	if(!isset($_POST['desc_evento']) || $_POST['desc_evento'] == ""){
		echo "<script>alert('Informe o nome do evento!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if(!isset($_POST['idespaco']) || $_POST['idespaco'] == ""){
		echo "<script>alert('Selecione o local e o espaço onde o evento irá acontecer!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}
	
	
	if(!isset($_POST['idtemporada']) || $_POST['idtemporada'] == ""){
		echo "<script>alert('Selecione a qual temporada pertence este evento!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if(!isset($_POST['iduser']) || $_POST['iduser'] == ""){
		echo "<script>alert('Selecione a pessoa responsável pelo evento!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if(!isset($_POST['iduser2']) || $_POST['iduser2'] == ""){
		echo "<script>alert('Selecione uma segunda pessoa responsável ou selecione novamente, neste campo, o responsável pelo evento!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if(!isset($_POST['idstatus_evento']) || $_POST['idstatus_evento'] == ""){
		echo "<script>alert('Selecione qual o status do evento!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if(!isset($_POST['tipo_evento']) || $_POST['tipo_evento'] == ""){
		echo "<script>alert('Selecione qual o tipo de evento!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if(!isset($_POST['programa_evento']) || $_POST['programa_evento'] == ""){
		echo "<script>alert('Selecione a qual programa pertence este evento!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if(!isset($_POST['origem_evento']) || $_POST['origem_evento'] == ""){
		echo "<script>alert('Selecione a origem do evento!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if(!isset($_POST['tipo_resultado_evento']) || $_POST['tipo_resultado_evento'] == ""){
		echo "<script>alert('Selecione qual tipo de resultado terá as competições do evento!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if(!isset($_POST['telef_inform_evento']) ||$_POST['telef_inform_evento'] == ""){
		echo "<script>alert('Informe o número de telefone com whatsapp para que o interessado, no evento, obtenha mais informações!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if(!isset($_POST['dia_inicio_evento']) || $_POST['dia_inicio_evento'] == ""){
		echo "<script>alert('Informe o dia em que vai acontecer o evento!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}	

	if(!isset($_POST['termina_mesmo_dia']) || $_POST['termina_mesmo_dia'] == ""){
		echo "<script>alert('Informe se o evento irá terminar no mesmo dia ou não!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if($_POST['termina_mesmo_dia'] == 0){

		if(!isset($_POST['dia_final_evento']) || $_POST['dia_final_evento'] == ""){
			echo "<script>alert('Informe o dia em que vai terminar o evento. Se o evento for terminar no mesmo dia, repita, neste campo, a dia de inicio!');";
	  		echo "javascript:history.go(-1)</script>";
	   		exit;
		}
	}


	if(!isset($_POST['hora_inicio_evento']) || $_POST['hora_inicio_evento'] == ""){
		echo "<script>alert('Informe a hora de início do evento!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}	

	if(!isset($_POST['tem_hora_termino']) || $_POST['tem_hora_termino'] == ""){
		echo "<script>alert('Informe se tem hora para acabar o evento!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if($_POST['tem_hora_termino'] == 1){

		if(!isset($_POST['hora_termino_evento']) || $_POST['hora_termino_evento'] == ""){
			echo "<script>alert('Informe a hora em que vai acabar o evento!');";
	  		echo "javascript:history.go(-1)</script>";
	   		exit;
		}
	}

	if(!isset($_POST['tem_divulgacao']) || $_POST['tem_divulgacao'] == ""){
		echo "<script>alert('Informe se o evento será divulgado na página inicial do site, para todos os usuários ou não!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}	

	if($_POST["tem_divulgacao"] == 1){
	
		if(!isset($_POST['dt_inicio_divulgacao_evento']) ||$_POST['dt_inicio_divulgacao_evento'] == ""){
			echo "<script>alert('Informe a data para iniciar a divulgação do evento!');";
		  	echo "javascript:history.go(-1)</script>";
		   	exit;
		}

		if(!isset($_POST['dt_final_divulgacao_evento']) ||$_POST['dt_final_divulgacao_evento'] == ""){
			echo "<script>alert('Informe a data para parar a divulgação do evento!');";
		  	echo "javascript:history.go(-1)</script>";
		   	exit;
		}

	}

	if(!isset($_POST['tem_transporte']) ||$_POST['tem_transporte'] == ""){
			echo "<script>alert('Informe se será necessário tranporte para o evento!');";
	  		echo "javascript:history.go(-1)</script>";
	   		exit;
		}

	if($_POST["tem_transporte"] == 1){

		if(!isset($_POST['dt_saida_transporte_evento']) ||$_POST['dt_saida_transporte_evento'] == ""){
			echo "<script>alert('Informe a data de saída do tranporte para o evento!');";
	  		echo "javascript:history.go(-1)</script>";
	   		exit;
		}

		if(!isset($_POST['dt_retorno_transporte_evento']) ||$_POST['dt_retorno_transporte_evento'] == ""){
			echo "<script>alert('Informe a data de retorno do tranporte para o evento, se for no mesmo dia, repita a data de saída!');";
	  		echo "javascript:history.go(-1)</script>";
	   		exit;
		}

		if(!isset($_POST['hora_saida_transporte_evento']) ||$_POST['hora_saida_transporte_evento'] == ""){
			echo "<script>alert('Informe a hora da saída do tranporte para o evento!');";
	  		echo "javascript:history.go(-1)</script>";
	   		exit;
		}

		if(!isset($_POST['hora_retorno_transporte_evento']) ||$_POST['hora_retorno_transporte_evento'] == ""){
			echo "<script>alert('Informe a hora do retorno do tranporte para o evento!');";
	  		echo "javascript:history.go(-1)</script>";
	   		exit;
		}

	}	

	if(!isset($_POST['tem_insc']) ||$_POST['tem_insc'] == ""){
		echo "<script>alert('Informe se o evento terá inscrição prévia!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if($_POST["tem_insc"] == 1){

		if(!isset($_POST['dt_comeco_insc_evento']) ||$_POST['dt_comeco_insc_evento'] == ""){
			echo "<script>alert('Informe a data para o início das inscrição para o evento!');";
	  		echo "javascript:history.go(-1)</script>";
	   		exit;
		}

		if(!isset($_POST['dt_termino_insc_evento']) ||$_POST['dt_termino_insc_evento'] == ""){
			echo "<script>alert('Informe a data para o término das inscrição para o evento!');";
	  		echo "javascript:history.go(-1)</script>";
	   		exit;
		}

		if(!isset($_POST['tem_token']) ||$_POST['tem_token'] == ""){
			echo "<script>alert('Informe se será necessário token para se inscrever no evento!');";
	  		echo "javascript:history.go(-1)</script>";
	   		exit;
		}
	}

	*/

	$_POST["tem_regras"] = 0;
	$_POST["pdf_regras_evento"] = '';
	
	/*
	if(!isset($_POST['so_para_alunos']) ||$_POST['so_para_alunos'] == ""){
		echo "<script>alert('Informe se o evento é somente para alunos inscritos nas turmas dos cursos esportivos ou é aberto ao público!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if(!isset($_POST['tem_categoria_unica']) ||$_POST['tem_categoria_unica'] == ""){
		echo "<script>alert('Informe se o evento terá somente uma categoria!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if(!isset($_POST['tem_premiacao']) ||$_POST['tem_premiacao'] == ""){
		echo "<script>alert('Informe se o evento terá premiação ou não!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	*/

	$_POST["tem_imagem"] = 0;
	$_POST['imagem_arquivo_evento'] = '';

	/*

	if(!isset($_POST['tem_equipamento']) ||$_POST['tem_equipamento'] == ""){
		echo "<script>alert('Informe se o evento precisará de equipamentos e/ou outros materiais como cadeiras, som, projetor, notebook...!');";
	  	echo "javascript:history.go(-1)</script>";
	   	exit;
	}

	if($_POST["tem_equipamento"] == 1){

		if(!isset($_POST['relac_equip_evento']) ||$_POST['relac_equip_evento'] == ""){
			echo "<script>alert('Faça uma relação dos equipamentos que será utilizado no evento!');";
	  		echo "javascript:history.go(-1)</script>";
	   		exit;
		}
	}

	*/	

	var_dump($_POST);
	exit();

	//inserir pergunta divulgar agora?
	//COLOCAR IMAGEM PADRÃO, DE ACORDO COM O PROGRMA, SE CRIADOR DE EVENTO NÃO COLOCAR IMAGEM

	$idespaco = $_POST['idespaco'];
	$idtemporada = $_POST['idtemporada'];
	$idstatus_evento = $_POST['idstatus_evento'];
	$iduser = $_POST['iduser'];
	$iduser2 = $_POST['iduser2'];
	$desc_evento = $_POST['desc_evento'];
	$obs_evento = $_POST['obs_evento'];
	$relac_equip_evento = $_POST['relac_equip_evento'];
	$imagem_arquivo_evento = $_POST['imagem_arquivo_evento']; 
	$pdf_regras_evento = $_POST['pdf_regras_evento']; 
	$telef_inform_evento = $_POST['telef_inform_evento']; 
	$so_para_alunos = $_POST['so_para_alunos']; 
	$tem_insc = $_POST['tem_insc']; 
	$tem_premiacao = $_POST['tem_premiacao']; 
	$tem_categoria_unica = $_POST['tem_categoria_unica']; 
	$tem_imagem = $_POST['tem_imagem'];
	$tem_regras = $_POST['tem_regras'];
	$tem_token = $_POST['tem_token'];
	$tem_divulgacao = $_POST['tem_divulgacao'];
	$tem_transporte = $_POST['tem_transporte'];
	$tem_equipamento = $_POST['tem_equipamento'];
	$termina_mesmo_dia = $_POST['termina_mesmo_dia'];
	$tem_hora_termino = $_POST['tem_hora_termino'];
	$tipo_resultado_evento = $_POST['tipo_resultado_evento'];
	$programa_evento = $_POST['programa_evento'];
	$origem_evento = $_POST['origem_evento'];
	$tipo_evento = $_POST['tipo_evento'];
	$dia_inicio_evento = $_POST['dia_inicio_evento'];
	$dia_final_evento = $_POST['dia_final_evento'];
	$hora_inicio_evento = $_POST['hora_inicio_evento'];
	$hora_termino_evento = $_POST['hora_termino_evento'];
	$dt_saida_transporte_evento = $_POST['tem_categoria_unica'];
	$dt_retorno_transporte_evento = $_POST['dt_saida_transporte_evento'];
	$hora_saida_transporte_evento = $_POST['hora_saida_transporte_evento'];
	$hora_retorno_transporte_evento = $_POST['hora_retorno_transporte_evento'];
	$dt_inicio_divulgacao_evento = $_POST['tem_categoria_unica'];
	$dt_final_divulgacao_evento = $_POST['dt_inicio_divulgacao_evento'];
	$dt_comeco_insc_evento = $_POST['dt_comeco_insc_evento'];
	$dt_termino_insc_evento = $_POST['dt_termino_insc_evento'];
	$dt_criacao_evento = date('Y-m-d h:i:s');

	//$evento->setData($_POST);

	$evento->EventoCreate($idespaco, $idtemporada, $idstatus_evento, $iduser, $iduser2, $desc_evento, $obs_evento, $relac_equip_evento, $imagem_arquivo_evento, $pdf_regras_evento, $telef_inform_evento, $so_para_alunos, $tem_insc, $tem_premiacao, $tem_categoria_unica, $tem_imagem, $tem_regras, $tem_token, $tem_divulgacao, $tem_transporte, $tem_equipamento, $termina_mesmo_dia, $tem_hora_termino, $tipo_resultado_evento, $programa_evento, $origem_evento, $tipo_evento, $dia_inicio_evento, $dia_final_evento, $hora_inicio_evento, $hora_termino_evento, $dt_saida_transporte_evento, $dt_retorno_transporte_evento, $hora_saida_transporte_evento, $hora_retorno_transporte_evento, $dt_inicio_divulgacao_evento, $dt_final_divulgacao_evento, $dt_comeco_insc_evento, $dt_termino_insc_evento, $dt_criacao_evento);


	//var_dump($_POST);
	//exit();	

});

$app->get("/admin/evento/regras-update/:id_evento", function($id_evento) {

	$page = new PageAdmin();

	$page->setTpl("evento-regras-update", [

		'id_evento'=>$id_evento,
		'error'=>Evento::getError()

	]);

});

$app->post("/admin/evento/regras-upload", function() {

		$evento = new Evento();

		if(!isset($_FILES['pdf_regras_evento']) || $_FILES['pdf_regras_evento'] == ""){
			echo "<script>alert('Selecione o arquivo em pdf, das regras, para disponibilizar no site!');";
	  		echo "javascript:history.go(-1)</script>";
	   		exit;
		}

		$arquivo = $_FILES;			
	
		if($arquivo['pdf_regras_evento']['size'] == 0) {
			echo "<script>alert('Nenhum arquivo selecionado! Selecione um arquivo tipo PDF !!');";
	    	echo "javascript:history.go(-1)</script>";
	    	exit();
		}

		if($arquivo['pdf_regras_evento']['type'] != 'application/pdf'){
			echo "<script>alert('O arquivo selecionado não tem o formato pdf. Selecione um arquivo com terminação ( .pdf ) !!');";
	    	echo "javascript:history.go(-1)</script>";
	    	exit();
		}

	$renomear_arquivo = date('Ymd').'-'.$_POST['id_evento'].'-'.md5(time()).'.pdf';

	$caminho_upload = 'res/admin/eventos/regras/';
	
	if(move_uploaded_file($arquivo['pdf_regras_evento']['tmp_name'], $caminho_upload . $renomear_arquivo)){

    	$nomearquivopdf = $renomear_arquivo;
    	
    	$caminho_remover = 'res/admin/eventos/regras/';

    	$nomeArquivoRemover = $evento->getCaminhoArquivoRegrasPdf($_POST['id_evento']);


    	if(!isset($nomeArquivoRemover[0]['pdf_regras_evento']) ||  $nomeArquivoRemover[0]['pdf_regras_evento'] == 0 || $nomeArquivoRemover[0]['pdf_regras_evento'] == ''){

    		$nomeArquivoRemover = '';
    		$evento->updateCaminhoArquivoRegrasPdf($_POST['id_evento'], $renomear_arquivo); 

    		$tem_regras = 1;
    		$evento->updateTemRegras($_POST['id_evento'], $tem_regras);

    		echo "<script>alert('Upload do arquivo de regras realizado com sucesso !!');";
	    	echo "javascript:history.go(-1)</script>";

    	}else{  	

    		$nomeArquivoRemover = $nomeArquivoRemover[0]['pdf_regras_evento'];
    		$caminhoArquivoRemover = $caminho_remover . $nomeArquivoRemover; 

    		unlink($caminhoArquivoRemover);
    		$evento->updateCaminhoArquivoRegrasPdf($_POST['id_evento'], $renomear_arquivo); 

    		$tem_regras = 1;
    		$evento->updateTemRegras($_POST['id_evento'], $tem_regras);

    		echo "<script>alert('Upload do arquivo de regras realizado com sucesso !!');";
	    	echo "javascript:history.go(-1)</script>";

    	}
    }

});

$app->get("/admin/evento/regras-delete/:id_evento", function($id_evento) {

	$evento = new Evento();

	$caminho_remover = 'res/admin/eventos/regras/';
	$nomeArquivoRemover = $evento->getCaminhoArquivoRegrasPdf($id_evento);

	if(!isset($nomeArquivoRemover[0]['pdf_regras_evento']) ||  $nomeArquivoRemover[0]['pdf_regras_evento'] == 0 || $nomeArquivoRemover[0]['pdf_regras_evento'] == ''){

		echo "<script>alert('Não há arquivo de regras para remover!!');";
		echo "javascript:history.go(-1)</script>";
		exit();
		
	}

	$nomeArquivoRemover = $nomeArquivoRemover[0]['pdf_regras_evento'];
    $caminhoArquivoRemover = $caminho_remover . $nomeArquivoRemover; 

    unlink($caminhoArquivoRemover);

    $renomear_arquivo = '';

	$evento->updateCaminhoArquivoRegrasPdf($id_evento, $renomear_arquivo); 
	$tem_regras = 0;
    $evento->updateTemRegras($id_evento, $tem_regras);

	echo "<script>alert('Arquivo PDF de regras removido com sucesso!!');";
	echo "javascript:history.go(-1)</script>";
	exit();

});

$app->get("/admin/evento/imagem-update/:id_evento", function($id_evento) {

	$page = new PageAdmin();

	$page->setTpl("evento-imagem-update", [

		'id_evento'=>$id_evento,
		'error'=>Evento::getError()

	]);

});

$app->post("/admin/evento/imagem-upload", function() {

		$evento = new Evento();

		if(!isset($_FILES['imagem_arquivo_evento']) || $_FILES['imagem_arquivo_evento'] == ""){
			echo "<script>alert('Selecione o arquivo da imagem em jpeg ou png, para disponibilizar no site!');";
	  		echo "javascript:history.go(-1)</script>";
	   		exit;
		}
		
		$arquivo = $_FILES;			
	
		if($arquivo['imagem_arquivo_evento']['size'] == 0) {
			echo "<script>alert('Nenhum arquivo selecionado! Selecione um arquivo tipo PNG ou JPEG !!');";
	    	echo "javascript:history.go(-1)</script>";
	    	exit();
		}

		if(($arquivo['imagem_arquivo_evento']['type'] != 'image/png') && ($arquivo['imagem_arquivo_evento']['type'] != 'image/jpeg')){
			echo "<script>alert('O arquivo selecionado não tem o formato png ou jpeg. Selecione um arquivo com terminação ( .png ou .jpeg ) !!');";
	    	echo "javascript:history.go(-1)</script>";
	    	exit();
		}

	$renomear_arquivo = date('Ymd').'-'.$_POST['id_evento'].'-'.md5(time()).'.png';

	$caminho_upload = 'res/admin/eventos/img/';
	
	if(move_uploaded_file($arquivo['imagem_arquivo_evento']['tmp_name'], $caminho_upload . $renomear_arquivo)){

    	$nomearquivoimagem = $renomear_arquivo;
    	
    	$caminho_remover = 'res/admin/eventos/img/';

    	$nomeArquivoRemover = $evento->getCaminhoArquivoImagem($_POST['id_evento']);

    	if(!isset($nomeArquivoRemover[0]['imagem_arquivo_evento']) ||  $nomeArquivoRemover[0]['imagem_arquivo_evento'] == 0 || $nomeArquivoRemover[0]['imagem_arquivo_evento'] == ''){

    		$nomeArquivoRemover = '';
    		$evento->updateCaminhoArquivoImagem($_POST['id_evento'], $renomear_arquivo); 

    		$tem_imagem = 1;
    		$evento->updateTemImagem($_POST['id_evento'], $tem_imagem);

    		echo "<script>alert('Upload do arquivo de imagem realizado com sucesso !!');";
	    	echo "javascript:history.go(-1)</script>";

    	}else{  		
    		
    		$nomeArquivoRemover = $nomeArquivoRemover[0]['imagem_arquivo_evento'];
    		$caminhoArquivoRemover = $caminho_remover . $nomeArquivoRemover; 

    		unlink($caminhoArquivoRemover);
    		$evento->updateCaminhoArquivoImagem($_POST['id_evento'], $renomear_arquivo); 

    		$tem_imagem = 1;
    		$evento->updateTemImagem($_POST['id_evento'], $tem_imagem);

    		echo "<script>alert('Upload do arquivo de imagem realizado com sucesso !!');";
	    	echo "javascript:history.go(-1)</script>";

    	}
    }

});

$app->get("/admin/evento/imagem-delete/:id_evento", function($id_evento) {

	$evento = new Evento();

	$caminho_remover = 'res/admin/eventos/img/';
	$nomeArquivoRemover = $evento->getCaminhoArquivoImagem($id_evento);

	if(!isset($nomeArquivoRemover[0]['imagem_arquivo_evento']) ||  $nomeArquivoRemover[0]['imagem_arquivo_evento'] == 0 || $nomeArquivoRemover[0]['imagem_arquivo_evento'] == ''){

		echo "<script>alert('Não há arquivo de imagem para remover!!');";
		echo "javascript:history.go(-1)</script>";
		exit();
		
	}

	$nomeArquivoRemover = $nomeArquivoRemover[0]['imagem_arquivo_evento'];
    $caminhoArquivoRemover = $caminho_remover . $nomeArquivoRemover; 

    unlink($caminhoArquivoRemover);

    $renomear_arquivo = '';

	$evento->updateCaminhoArquivoImagem($id_evento, $renomear_arquivo); 
	$tem_imagem = 0;
    $evento->updateTemImagem($id_evento, $tem_imagem);

	echo "<script>alert('Arquivo de imagem removido com sucesso!!');";
	echo "javascript:history.go(-1)</script>";
	exit();

});


$app->get("/admin/eventos-por-temporada/:idtemporada", function($idtemporada) {

	User::verifyLogin();

	$temporada = new Temporada();
	$evento = new Evento();
	$local = new Local();
	
	//$modalidade = new Modalidade();

	$eventos = $evento->listEventosByIdTemporada($idtemporada);

	//var_dump($evento);
	//exit();

	$temporada->get((int)$idtemporada);

	$local = $local->setapelidolocal('');
	//$modalidade = $modalidade->setdescmodal('');

	$page = new PageAdmin();

	$page->setTpl("eventos-por-temporada", [
		'eventos'=>$eventos,
		'local'=>$local,
		'locais'=>Local::listAll(),
		'temporada'=>$temporada->getValues(),
		'error'=>Evento::getError()
	]);	
});

$app->get("/admin/eventos-por-temporada/:idtemporada/local/:idlocal", function($idtemporada, $idlocal) {

	User::verifyLogin();

	$temporada = new Temporada();
	$evento = new Evento();
	$local = new Local();
	$temporada->get((int)$idtemporada);
	$local->get((int)$idlocal);

	$eventos = $evento->listEventosByIdTemporadaIdlocal($idtemporada, $idlocal);



	//$modalidades = $modalidade->getModalidadesTemporadaByLocal($idtemporada, $idlocal);

	//$turmasTemporada = Temporada::listAllTurmatemporadaLocal($idtemporada, $idlocal);

	$page = new PageAdmin();	

	$page->setTpl("eventos-por-temporada", [
		'local'=>$local->getValues(),
		'locais'=>Local::listAll(),
		'idlocal'=>$idlocal,
		'temporada'=>$temporada->getValues(),
		//'turmaRelated'=>$temporada->getTurma(true)
		'eventos'=>$eventos,
		//'turmas'=>Temporada::listAllTurmatemporadaLocal($idtemporada, $idloca
		//'turmaNotRelated'=>$temporada->getTurma(false)
		'error'=>User::getError()
	]);	
});


$app->get("/admin/atualiza/evento/:id_evento/:idtemporada/:desctemporada/:status", function($id_evento, $idtemporada, $desctemporada, $status) {

	User::verifyLogin();

	if($status != 1 && $status != 2 && $status != 3 && $status != 4 && $status != 5){
		echo 'Valor inválido!';
		exit();
	}

	$evento = new Evento();
	
	Evento::atualizaStatusEventoTemporada($id_evento, $idtemporada, $status);

	$idstatus = Evento::getIdstatusEventoTemporada($id_evento, $idtemporada);

	if($idstatus == 1){ $texto = "Evento Iniciado"; }
	if($idstatus == 2){ $texto = "Evento Encerrado"; }
	if($idstatus == 3){ $texto = "Evento Confirmado"; }
	if($idstatus == 4){ $texto = "Evento Adiado"; }
	if($idstatus == 5){ $texto = "Evento Suspenso"; }

	//$texto = 'Status da turma '.$idturma.' da '.$desctemporada.' alterado com sucesso! Atualize a página para conferir. ';
		
	echo $texto;

});

$app->get("/admin/insc-evento-temporada/:id_evento/:idtemporada/user/:iduser", function($id_evento, $idtemporada, $iduser) {

	User::verifyLogin();
	
	$insc_eventoTodas = new Evento();
	$insc_evento = new Evento();
	$insc_eventoPcd = new Evento();
	$insc_eventoPlm = new Evento();
	$insc_eventoPvs = new Evento();
	$evento = new Evento();
	$user = new User();
	$temporada = new Temporada();
	$temporada->get((int)$idtemporada);

	$evento->get((int)$id_evento);


	$categorias = $evento->getCategoriasByEventoTemporada($id_evento, $idtemporada);

	/*
	echo '<pre>';
	var_dump($categorias);
	exit;
	echo '</pre>';
	*/

	$idusersessao = (int)$_SESSION['User']['iduser'];

	$iduserprof = User::getIdUserInEventoTemporada($id_evento, $idtemporada);
	//$iduserprof = User::getIdUseInTurmaTemporada($idturma, $idtemporada);


	$insc_eventoTodas->getInscByEventoTemporadaTodas($id_evento, $idtemporada);
	$insc_evento->getInscByEventoTemporada($id_evento, $idtemporada);
	$insc_eventoPcd->getInscByEventoTemporadaPcd($id_evento, $idtemporada);
	$insc_eventoPlm->getInscByEventoTemporadaPlm($id_evento, $idtemporada);
	$insc_eventoPvs->getInscByEventoTemporadaPvs($id_evento, $idtemporada); 
	
	$vagas = (int)$evento->getvagas();
	
	$page = new PageAdmin();	

	$page->setTpl("evento-insc-temporada", [
		'categorias'=>$categorias,
		'iduserprof'=>$iduserprof,
		'insc_evento'=>$insc_evento->getValues(),
		'insc_eventoTodas'=>$insc_eventoTodas->getValues(),
		'insc_eventoPcd'=>$insc_eventoPcd->getValues(),
		'insc_eventoPlm'=>$insc_eventoPlm->getValues(),
		'insc_eventoPvs'=>$insc_eventoPvs->getValues(),
		'evento'=>$evento->getValues(),
		'temporada'=>$temporada->getValues(),
		'error'=>User::getError(),
		'success'=>User::getSuccess(),
		'vagas'=>$vagas,
	]);	
});



// Criar categoria única ao criar evento, se evento tiver inscrição.
// Criar categoria quando se editar evento, mudando para que tenha inscrição.
// ao criar novas categorias editar categoria única
// ao criar categoria, alterar campo "tem_categoria_unica" na tabela tb_evento
// ao criar categoria, se evento tem categoria única, pedir para criador, criar esta categoria única.


?>