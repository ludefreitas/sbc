<?php 

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Model\Cart;
use \Sbc\Mailer;

class Insc extends Model {

	const SUCCESS = "Insc-Success";
	const ERROR = "Insc-Error";

	public function save()
	{
		$sql = new Sql();												        
		$results = $sql->select("CALL sp_insc_save1(:idinsc, :idinscstatus, :idcart, :idturma, :idtemporada, :numordem, :numsorte, :laudo, :inscpcd, :inscpvs)", [
			':idinsc'=>$this->getidinsc(),
			':idinscstatus'=>$this->getidinscstatus(),
			':idcart'=>$this->getidcart(),
			':idturma'=>$this->getidturma(),
			':idtemporada'=>$this->getidtemporada(),
			':numordem'=>$this->getnumordem(),
			':numsorte'=>$this->getnumsorte(),
			':laudo'=>$this->getlaudo(),
			':inscpcd'=>$this->getinscpcd(),
			':inscpvs'=>$this->getinscpvs()
		]);

		if (count($results) > 0) {
			$this->setData($results[0]);
		}
	}	

	public function moveInscSave($idturmadestino, $idturmaorigem, $idinscdestino, $idinscorigem, $idtemporadadestino, $idtemporadaorigem, $tipomove, $observacao, $dtinscorigem, $dtmatricorigem, $dtmovimentacao){

		$idmoveinsc = 0;

		$sql = new Sql();												        
		$results = $sql->select("CALL sp_moveinsc_save(:idmoveinsc, :idturmadestino, :idturmaorigem, :idinscdestino, :idinscorigem, :idtemporadadestino, :idtemporadaorigem, :tipomove, :observacao, :dtinscorigem, :dtmatricorigem, :dtmovimentacao)", [
			':idmoveinsc'=>$idmoveinsc,
			':idturmadestino'=>$idturmadestino,
			':idturmaorigem'=>$idturmaorigem,
			':idinscdestino'=>$idinscdestino,
			':idinscorigem'=>$idinscorigem,
			':idtemporadadestino'=>$idtemporadadestino,
			':idtemporadaorigem'=>$idtemporadaorigem,
			':tipomove'=>$tipomove,
			':observacao'=>$observacao,
			':dtinscorigem'=>$dtinscorigem,
			':dtmatricorigem'=>$dtmatricorigem,
			':dtmovimentacao'=>$dtmovimentacao
		]);
	}

	public function save_presenca($idinsc, $statuspresenca, $data)
	{
		$idpresenca = 0;
		$sql = new Sql();							        

		$results = $sql->select("CALL sp_presenca_save(:idpresenca, :idinsc, :statuspresenca, :dtpresenca)", [
			':idpresenca'=>$idpresenca,
			':idinsc'=>$idinsc,
			':statuspresenca'=>$statuspresenca,
			':dtpresenca'=>$data
		]);
	}

	public function update_presente($idinsc, $data){

		$statuspresenca = 1;

		$sql = new Sql();

		$sql->query("UPDATE tb_presenca SET statuspresenca = :statuspresenca 
			WHERE idinsc = :idinsc
			AND dtpresenca = :data", array(
			":statuspresenca"=>$statuspresenca,
			":idinsc"=>$idinsc,
			"data"=>$data
		));
	}

	public function update_ausente($idinsc, $data){

		$statuspresenca = 0;

		$sql = new Sql();

		$sql->query("UPDATE tb_presenca SET statuspresenca = :statuspresenca 
			WHERE idinsc = :idinsc
			AND dtpresenca = :data", array(
			":statuspresenca"=>$statuspresenca,
			":idinsc"=>$idinsc,
			"data"=>$data
		));
	}

	public function update_justificar($idinsc, $data){

		$statuspresenca = 2;

		$sql = new Sql();

		$sql->query("UPDATE tb_presenca SET statuspresenca = :statuspresenca 
			WHERE idinsc = :idinsc
			AND dtpresenca = :data", array(
			":statuspresenca"=>$statuspresenca,
			":idinsc"=>$idinsc,
			"data"=>$data
		));
	}

	public function getPresencaExisteByIdinsc($idinsc){

		$sql = new Sql();
		$results = $sql->select("SELECT idpresenca FROM tb_presenca 
			WHERE idinsc = :idinsc LIMIT 1", array(
			":idinsc"=>$idinsc
		));

		if($results){
			return (int)$results[0]['idpresenca'];
		}else{
			return 0;
		}		
	}
	
	public function getAlunosPresentesPorData($data){

		$statuspresenca = 1;

		$sql = new Sql();
		$results = $sql->select("SELECT count(*) FROM tb_presenca 
			WHERE dtpresenca = :data
			AND statuspresenca = :statuspresenca", array(
			":data"=>$data,
			":statuspresenca"=>$statuspresenca
		));

		return $results[0]['count(*)'];
	}

	public function getAlunosAusentesPorData($data){

		$statuspresenca = 0;

		$sql = new Sql();
		$results = $sql->select("SELECT count(*) FROM tb_presenca 
			WHERE dtpresenca = :data
			AND statuspresenca = :statuspresenca", array(
			":data"=>$data,
			":statuspresenca"=>$statuspresenca
		));

		return $results[0]['count(*)'];
	}

	public function getAlunosJustificadosPorData($data){

		$statuspresenca = 2;

		$sql = new Sql();
		$results = $sql->select("SELECT count(*) FROM tb_presenca 
			WHERE dtpresenca = :data
			AND statuspresenca = :statuspresenca", array(
			":data"=>$data,
			":statuspresenca"=>$statuspresenca
		));

		return $results[0]['count(*)'];
	}
	
	public function getAlunosPresentesPorDataTurma($data, $idturma){
		
		$statuspresenca = 1;

		$sql = new Sql();
		$results = $sql->select("SELECT count(*) FROM tb_presenca a 
			INNER JOIN tb_insc b ON b.idinsc = a.idinsc
	        INNER JOIN tb_turma d ON d.idturma = b.idturma	
			WHERE d.idturma  = :idturma
			AND dtpresenca = :data
			AND statuspresenca = :statuspresenca", array(
			":idturma"=>$idturma,
			":data"=>$data,
			":statuspresenca"=>$statuspresenca
			));

		return $results[0]['count(*)'];
	}

	public static function temChamadaData($data, $idturma){

		$sql = new Sql();

		$results = $sql->select("
			SELECT *
			FROM tb_presenca a
            INNER JOIN tb_insc b ON b.idinsc = a.idinsc
            INNER JOIN tb_turma c ON c.idturma = b.idturma
			WHERE dtpresenca = :data 
            AND b.idturma = :idturma", [			
			':data'=>$data,	
			':idturma'=>$idturma				
		]);

		return $results;		
	}

	public function getInscByTurmaTemporadaMatriculadosDataListaChamada($idturma, $idtemporada, $data){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_presenca g ON g.idinsc = a.idinsc			
			INNER JOIN tb_carts b ON b.idcart = a.idcart			
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus
			-- INNER JOIN tb_atestado h ON h.idpess = c.idpess /* esta */
			WHERE a.idturma = :idturma 
			AND a.idtemporada = :idtemporada 
			AND g.dtpresenca = :data 
			AND a.dtmatric < g.dtpresenca 
			AND f.idinscstatus = 1
			-- AND h.dataatualizacao = (SELECT  MAX(h.dataatualizacao) FROM tb_atestado h WHERE h.cpf = c.numcpf ) /* esta */
			ORDER BY c.nomepess;
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada,
			':data'=>$data
		]);
		
		return $results;
	}

	public function getInscByTurmaTemporadaMatriculadosListaChamada($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_presenca g ON g.idinsc = a.idinsc			
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus
			WHERE  a.idturma = :idturma
			AND a.idtemporada = :idtemporada 
			-- AND g.dtpresenca = :data
			AND f.idinscstatus = 1
			ORDER BY c.nomepess;
			-- ORDER BY a.inscpcd DESC, a.laudo DESC, a.inscpvs DESC, a.numordem, a.idinscstatus;
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
			//':data'=>$data
		]);
			
		$this->setData($results);
	}

	public function getInscByTurmaTemporadaMatriculados($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus
			-- INNER JOIN tb_atestado h ON h.idpess = c.idpess /* esta */
			-- INNER JOIN tb_presenca g ON g.idinsc = a.idinsc			
			WHERE a.idtemporada = :idtemporada 
			AND a.idturma = :idturma 
			AND f.idinscstatus = 1
			-- AND h.dataatualizacao = (SELECT  MAX(h.dataatualizacao) FROM tb_atestado h WHERE h.cpf = c.numcpf ) /* esta */
			ORDER BY c.nomepess;
			-- ORDER BY a.inscpcd DESC, a.laudo DESC, a.inscpvs DESC, a.numordem, a.idinscstatus;
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		return $results;
	}

	public function GetDiasDoMesPresenca($idtemporada, $idturma, $mes){
		$sql = new Sql();
			$results = $sql->select("CALL sp_select_dias_mes_presenca(:idtemporada, :idturma, :mes)", [
			':idtemporada'=>$idtemporada,
			':idturma'=>$idturma,			
		    ':mes'=>$mes 
		]);
		return $results;
	}

	public function GetDiasDoMesPresencaDescTemporada($idtemporada, $idturma, $mes, $desctemporada){
		$sql = new Sql();
			$results = $sql->select("CALL sp_select_dias_mes_presenca_desctemporada(:idtemporada, :idturma, :mes, :desctemporada)", [
			':idtemporada'=>$idtemporada,
			':idturma'=>$idturma,			
		    ':mes'=>$mes,
		    ':desctemporada'=>$desctemporada 
		]);
		return $results;
	}

	public function getInscByTurmaTemporadaMatriculadosDataListaChamadaCursos($idturma, $idtemporada, $data){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus
			INNER JOIN tb_presenca g ON g.idinsc = a.idinsc			
			WHERE a.idturma = :idturma 
			AND a.idtemporada = :idtemporada 
			AND g.dtpresenca = :data
			AND a.dtmatric < g.dtpresenca 
			AND f.idinscstatus = 1
			ORDER BY c.nomepess;
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada,
			':data'=>$data
		]);
		
		return $results;
	}

	public function getInscByTurmaTemporadaMatriculadosCursos($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus
			-- INNER JOIN tb_presenca g ON g.idinsc = a.idinsc			
			WHERE a.idturma = :idturma 
			AND a.idtemporada = :idtemporada 
			-- AND f.idinscstatus = 1
			ORDER BY c.nomepess;
			-- ORDER BY a.inscpcd DESC, a.laudo DESC, a.inscpvs DESC, a.numordem, a.idinscstatus;
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		return $results;
	}

	public function getStatusPresencaByIdinscIdturmaIdtemporada($dia, $mes, $idinsc, $idturma, $idtemporada){
		$sql = new Sql();
			$results = $sql->select("CALL sp_select_status_presenca(:dia, :mes, :idinsc, :idturma, :idtemporada)", [
			':dia'=>$dia,
			':mes'=>$mes,
			':idinsc'=>$idinsc,
			':idturma'=>$idturma,			
			':idtemporada'=>$idtemporada	    
		]);
		if($results == NULL){
			return 4;
		}else{
			return (int)$results[0]['statuspresenca'];
		}		
	}

	public static function getCountNumeroNaListaDePresençaByIdturmaData($idturma, $data)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT count(*)
			FROM tb_presenca a
            INNER JOIN tb_insc b ON b.idinsc = a.idinsc
            INNER JOIN tb_turma c ON c.idturma = b.idturma
            WHERE c.idturma = :idturma 
			AND a.dtpresenca = :data
		", [
			':idturma'=>$idturma,
			':data'=>$data
		]);
		
		return $results;	

	}

	public static function inscricaoEmail($idinsc, $numsorte, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma){
	
		//$email = "lulufreitas08@hotmail.com";
		//$user = "Luciano Freitas";
		$assunto = "Inscrição Cursos Esportivos ".$desctemporada."";
		$tplName = "comprovante-insc";
		$link = "https://www.cursosesportivossbc.com";

		/*
		$mailer = new Mailer($data['desemail'], $data['desperson'], "Redefinir senha do Cursos Esportivos SBC", "forgot", array(
                 "name"=>$data['desperson'],
                 "link"=>$link
        )); 
		*/
        $mailer = new Mailer($email, $desperson, $assunto, $tplName, array(
                 "nomepess"=>$nomepess,
                 "desperson"=>$desperson,
                 "link"=>$link,
                 "email"=>$email,
                 "idinsc"=>$idinsc,
                 "numsorte"=>$numsorte,
                 "turma"=>$turma->getValues()                
        )); 
             
        $emailEnviado = $mailer->send();        

        if (!$emailEnviado)
     	{
        	Insc::setError("Não foi possivel enviar email, no entanto, a incrição abaixo foi efetuada! Clique, logo abaixo, em 'Detalhes' e depois em 'Minhas inscrições', para saber mais.");        	
        	header("Location: /profile/insc/".$idinsc."/".$idpess."");
        	exit();			

     	}else{
     		Insc::setSuccess("Um email com os dados desta inscrição foi enviado a você, verifique sua caixa de email cadastrado. Guarde-o com você, se necessário apresente-o quando solicitado! Clique, logo abaixo, em 'Detalhes' e depois em 'Minhas inscrições', para saber mais.");
     	}
	}

	public static function inscricaoEmailCursos($idinsc, $numsorte, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma){
	
		//$email = "lulufreitas08@hotmail.com";
		//$user = "Luciano Freitas";
		$assunto = "Inscrição Cursos Esportivos ".$desctemporada."";
		$tplName = "comprovante-insc-cursos";
		$link = "https://www.cursosesportivossbc.com/cursos";

        $mailer = new Mailer($email, $desperson, $assunto, $tplName, array(
                 "nomepess"=>$nomepess,
                 "desperson"=>$desperson,
                 "link"=>$link,
                 "email"=>$email,
                 "idinsc"=>$idinsc,
                 "numsorte"=>$numsorte,
                 "turma"=>$turma->getValues()                
        )); 
             
        $emailEnviado = $mailer->send();        

        if (!$emailEnviado)
     	{
        	Insc::setError("Não foi possivel enviar email, no entanto, a incrição abaixo foi efetuada! Clique, logo abaixo, em 'Detalhes' e depois em 'Minhas inscrições', para saber mais.");        	
        	header("Location: /cursos/profile/insc/".$idinsc."/".$idpess."");
        	exit();			

     	}else{
     		Insc::setSuccess("Um email com os dados desta inscrição foi enviado a você, verifique sua caixa de email cadastrado. Guarde-o com você, se necessário apresente-o quando solicitado! Clique, logo abaixo, em 'Detalhes' e depois em 'Minhas inscrições', para saber mais.");
     	}
	}	

	public static function inscricaoEmailPosSorteio($idinsc, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $posicao, $matriculados, $vagas){
	
		$assunto = "Inscrição Cursos Esportivos ".$desctemporada."";
		$tplName = "comprovante-insc-pos-sorteio";
		$link = "https://www.cursosesportivossbc.com";
		
        $mailer = new Mailer($email, $desperson, $assunto, $tplName, array(
                 "nomepess"=>$nomepess,
                 "desperson"=>$desperson,
                 "link"=>$link,
                 "email"=>$email,
                 "idinsc"=>$idinsc, 
                 "posicao"=>$posicao,  
                 "matriculados"=>$matriculados,
                 "vagas"=>$vagas,            
                 "turma"=>$turma->getValues()                
        )); 
             
        $emailEnviado = $mailer->send();        

        if (!$emailEnviado)
     	{
        	Insc::setError("Não foi possivel enviar email, no entanto, a incrição abaixo foi efetuada! Clique, logo abaixo, em 'Detalhes' e depois em 'Minhas inscrições', para saber mais.");        	
        	header("Location: /profile/insc/".$idinsc."/".$idpess."");
        	exit();			

     	}else{
     		Insc::setSuccess("Um email com os dados desta inscrição foi enviado a você, verifique sua caixa de email cadastrado. Guarde-o com você, se necessário apresente-o quando solicitado! Clique, logo abaixo, em 'Detalhes' e depois em 'Minhas inscrições', para saber mais.");
     	}
	}

	public static function inscricaoEmailPosSorteioCursos($idinsc, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $posicao, $matriculados, $vagas){
	
		$assunto = "Inscrição Cursos Esportivos ".$desctemporada."";
		$tplName = "comprovante-insc-pos-sorteio-cursos";
		$link = "https://www.cursosesportivossbc.com/cursos";	
        $mailer = new Mailer($email, $desperson, $assunto, $tplName, array(
                 "nomepess"=>$nomepess,
                 "desperson"=>$desperson,
                 "link"=>$link,
                 "email"=>$email,
                 "idinsc"=>$idinsc, 
                 "posicao"=>$posicao,  
                 "matriculados"=>$matriculados,
                 "vagas"=>$vagas,            
                 "turma"=>$turma->getValues()                
        )); 
             
        $emailEnviado = $mailer->send();        

        if (!$emailEnviado)
     	{
        	Insc::setError("Não foi possivel enviar email, no entanto, a incrição abaixo foi efetuada! Clique, logo abaixo, em 'Detalhes' e depois em 'Minhas inscrições', para saber mais.");        	
        	header("Location: /cursos/profile/insc/".$idinsc."/".$idpess."");
        	exit();			

     	}else{
     		Insc::setSuccess("Um email com os dados desta inscrição foi enviado a você, verifique sua caixa de email cadastrado. Guarde-o com você, se necessário apresente-o quando solicitado! Clique, logo abaixo, em 'Detalhes' e depois em 'Minhas inscrições', para saber mais.");
     	}
	}

	public static function sorteioEmail($idinsc, $numsorte, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $idade, $numeroordenado, $idtemporada, $iduserprof){

		$idturma = $turma->getidturma();           

		if($idturma == 13){

			$assunto = "Matrícula Yoga Cursos Esportivos SBC Crec Paulicéia ".$desctemporada."";
			$tplName = "cham-matricula-yoga";
			$link = "https://www.cursosesportivossbc.com";

	    }else{	
			$assunto = "Inscrição Cursos Esportivos ".$desctemporada."";
			$tplName = "sorteio-insc";
			$link = "https://www.cursosesportivossbc.com";
	    }
		
        $mailer = new Mailer($email, $desperson, $assunto, $tplName, array(
                 "nomepess"=>$nomepess,
                 "desperson"=>$desperson,
                 "link"=>$link,
                 "email"=>$email,
                 "idinsc"=>$idinsc,
                 "numerosorteado"=>$numsorte,
                 "turma"=>$turma->getValues(), 
                 "idade"=>$idade,
                 "numeroordenado"=>$numeroordenado
        )); 
             
        $emailEnviado = $mailer->send();   

        $idturma = $turma->getidturma();           

        if (!$emailEnviado)
     	{
     	echo "<script>alert('Não foi possivel enviar email, no entanto, o status da inscrição foi atualizada!');";
			echo "javascript:history.go(-1)</script>";
        	//User::setError("Não foi possivel enviar email, no entanto, o status da inscrição foi atualizada!");        	
        	//header("Location: /prof/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduserprof."");
        	//exit();			

     	}else{
     		echo "<script>alert('Email enviado com sucesso!');";
			echo "javascript:history.go(-1)</script>";
     		//User::setSuccess("Email enviado com sucesso!");
     		//header("Location: /prof/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduserprof."");
        	//exit();			
     	}
	}

	public static function sorteioEmailProf($idinsc, $numsorte, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $idade, $numeroordenado, $idtemporada, $iduserprof){

		$idturma = $turma->getidturma();           

		if($idturma == 13){

			$assunto = "Matrícula Yoga Cursos Esportivos SBC Crec Paulicéia ".$desctemporada."";
			$tplName = "cham-matricula-yoga";
			$link = "https://www.cursosesportivossbc.com";

	    }else{
			$assunto = "Inscrição Cursos Esportivos ".$desctemporada."";
			$tplName = "sorteio-insc";
			$link = "https://www.cursosesportivossbc.com";
		}
		
        $mailer = new Mailer($email, $desperson, $assunto, $tplName, array(
                 "nomepess"=>$nomepess,
                 "desperson"=>$desperson,
                 "link"=>$link,
                 "email"=>$email,
                 "idinsc"=>$idinsc,
                 "numerosorteado"=>$numsorte,
                 "turma"=>$turma->getValues(), 
                 "idade"=>$idade,
                 "numeroordenado"=>$numeroordenado
        )); 
             
        $emailEnviado = $mailer->send();   

        $idturma = $turma->getidturma();           

        if (!$emailEnviado)
     	{
     		echo "<script>alert('Não foi possivel enviar email, no entanto, o status da inscrição foi atualizada!');";
			echo "javascript:history.go(-1)</script>";
        	//User::setError("Não foi possivel enviar email, no entanto, o status da inscrição foi atualizada!");        	
        	//header("Location: /prof/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduserprof."");
        	//exit();			

     	}else{
     		echo "<script>alert('Email enviado com sucesso!');";
			echo "javascript:history.go(-1)</script>";
     		//User::setSuccess("Email enviado com sucesso!");
     		//header("Location: /prof/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduserprof."");
        	//exit();			
     	}
	}

	public static function emailIformarVagaDisponivel($idinsc, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $idtemporada, $iduserprof){	

		 $idturma = $turma->getidturma();  

		 if(($idturma == 264) || ($idturma == 265) || ($idturma == 266) || ($idturma == 267) || ($idturma == 447) || ($idturma == 448) || ($idturma == 449) || ($idturma == 452)){

		 	$assunto = "Projeto 'Perca o Medo de Nadar' ".$desctemporada."";
			$tplName = "vaga-dispon-informar-cursos";
			$link = "https://www.cursosesportivossbc.com/cursos";
			
	        $mailer = new Mailer($email, $desperson, $assunto, $tplName, array(
	                 "nomepess"=>$nomepess,
	                 "desperson"=>$desperson,
	                 "link"=>$link,
	                 "email"=>$email,
	                 "idinsc"=>$idinsc,                
	                 "turma"=>$turma->getValues()            
	        )); 

		 }else{

			$assunto = "Vaga Disponível Cursos Esportivos SBC ".$desctemporada."";
			$tplName = "vaga-dispon-informar";
			$link = "https://www.cursosesportivossbc.com";
			
	        $mailer = new Mailer($email, $desperson, $assunto, $tplName, array(
	                 "nomepess"=>$nomepess,
	                 "desperson"=>$desperson,
	                 "link"=>$link,
	                 "email"=>$email,
	                 "idinsc"=>$idinsc,                
	                 "turma"=>$turma->getValues()                 
	        )); 
    	}

        $emailEnviado = $mailer->send();          

        if (!$emailEnviado)
     	{
        	//User::setError("Não foi possivel enviar email, no entanto, o status da inscrição foi atualizada!");        	
        	//header("Location: /admin/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduserprof."");
        	//exit();	
        	echo "<script>alert('Não foi possivel enviar email. Se possível ligue para o aluno ou responsável. No entanto, o status da inscrição foi atualizada!');";
			echo "javascript:history.go(-1)</script>";
     	}else{
     		//User::setSuccess("Email enviado com sucesso!");
     		//header("Location: /admin/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduserprof."");
        	//exit();			
        	echo "<script>alert('Email enviado com sucesso!');";
			echo "javascript:history.go(-1)</script>";
     	}
	}

	public static function emailIformarVagaDisponivelProf($idinsc, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $idtemporada, $iduserprof){	

		$idturma = $turma->getidturma();  

		 if(($idturma == 264) || ($idturma == 265) || ($idturma == 266) || ($idturma == 267) || ($idturma == 447) || ($idturma == 448) || ($idturma == 449) || ($idturma == 452)){

		 	$assunto = "Projeto 'Perca o Medo de Nadar' ".$desctemporada."";
			$tplName = "vaga-dispon-informar-cursos";
			$link = "https://www.cursosesportivossbc.com/cursos";
			
	        $mailer = new Mailer($email, $desperson, $assunto, $tplName, array(
	                 "nomepess"=>$nomepess,
	                 "desperson"=>$desperson,
	                 "link"=>$link,
	                 "email"=>$email,
	                 "idinsc"=>$idinsc,                
	                 "turma"=>$turma->getValues()            
	        )); 

		 }else{

			$assunto = "Vaga Disponível Cursos Esportivos SBC ".$desctemporada."";
			$tplName = "vaga-dispon-informar";
			$link = "https://www.cursosesportivossbc.com";
			
	        $mailer = new Mailer($email, $desperson, $assunto, $tplName, array(
	                 "nomepess"=>$nomepess,
	                 "desperson"=>$desperson,
	                 "link"=>$link,
	                 "email"=>$email,
	                 "idinsc"=>$idinsc,                
	                 "turma"=>$turma->getValues()            
	        )); 
    	}
                     
        $emailEnviado = $mailer->send();   

        if (!$emailEnviado)
     	{
        	//User::setError("Não foi possivel enviar email, no entanto, o status da inscrição foi atualizada!");        	
        	//header("Location: /prof/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduserprof."");
        	//exit();			
        	//echo "<script>alert('Não foi possivel enviar email. Se possível ligue para o aluno ou responsável. No entanto, o status da inscrição foi atualizada!');";
        	echo "<script>alert('Status alterado comsucesso!');";
			echo "javascript:history.go(-1)</script>";
     	}else{
     		//User::setSuccess("Email enviado com sucesso!");
     		//header("Location: /prof/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduserprof."");
        	//exit();
        	//echo "<script>alert('Email enviado com sucesso!');";	
        	echo "<script>alert('Status alterado comsucesso!');";
			echo "javascript:history.go(-1)</script>";

     	}
	}

	public static function emailMatriculYogaProf($idinsc, $numsorte, $idpess, $nomepess, $email, $desperson, $desctemporada, $turma, $idade, $numeroordenado, $idtemporada, $iduserprof){
	

		$assunto = "Matrícula Yoga Cursos Esportivos SBC ".$desctemporada."";
		$tplName = "cham-matricula-yoga";
		$link = "https://www.cursosesportivossbc.com";
		
        $mailer = new Mailer($email, $desperson, $assunto, $tplName, array(
                 "nomepess"=>$nomepess,
                 "desperson"=>$desperson,
                 "link"=>$link,
                 "email"=>$email,
                 "idinsc"=>$idinsc,
                 "numerosorteado"=>$numsorte,
                 "turma"=>$turma->getValues(), 
                 "idade"=>$idade,
                 "numeroordenado"=>$numeroordenado
        )); 
             
        $emailEnviado = $mailer->send();   

        $idturma = $turma->getidturma();           

        if (!$emailEnviado)
     	{

        	User::setError("Não foi possivel enviar email, no entanto, o status da inscrição foi atualizada!");        	
        	header("Location: /prof/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduserprof."");
        	exit();			

     	}else{
     		User::setSuccess("Email enviado com sucesso!");
     		header("Location: /prof/insc-turma-temporada/".$idturma."/".$idtemporada."/user/".$iduserprof."");
        	exit();			
     	}
	}	

	public function get($idinsc)
	{
		$sql = new Sql();

		$results = $sql->select("
			SELECT * 
			FROM tb_insc a 
			INNER JOIN tb_inscstatus b USING(idinscstatus) 
			INNER JOIN tb_carts c USING(idcart)
			INNER JOIN tb_turma g USING(idturma)
			INNER JOIN tb_atividade h ON h.idativ = g.idativ
			INNER JOIN tb_espaco i ON i.idespaco = g.idespaco
			INNER JOIN tb_pessoa d ON d.idpess = c.idpess
			INNER JOIN tb_users e ON e.iduser = d.iduser
			INNER JOIN tb_persons f ON f.idperson = e.idperson
			INNER JOIN tb_temporada j USING(idtemporada)
			INNER JOIN tb_statustemporada n USING(idstatustemporada)
			INNER JOIN tb_inscstatus k USING(idinscstatus)
			INNER JOIN tb_horario l USING(idhorario)
			INNER JOIN tb_local m USING(idlocal)
			WHERE a.idinsc = :idinsc
		", [
			':idinsc'=>$idinsc
		]);

		if (count($results) > 0) {
			$this->setData($results[0]);
		}
	}

	/*
	public function getInscPessoa($idpess)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT * 
			FROM tb_insc a 
			INNER JOIN tb_inscstatus b ON b.idinscstatus = a.idinscstatus 
			INNER JOIN tb_carts c ON c.idcart = a.idcart
			INNER JOIN tb_turma g ON g.idturma = a.idturma
			INNER JOIN tb_atividade h ON h.idativ = g.idativ
			INNER JOIN tb_espaco i ON i.idespaco = g.idespaco
			INNER JOIN tb_pessoa d ON d.idpess = c.idpess
			INNER JOIN tb_users e ON e.iduser = d.iduser
			INNER JOIN tb_persons f ON f.idperson = e.idperson
			INNER JOIN tb_temporada j ON j.idtemporada = a.idtemporada
			WHERE c.idpess = :idpess
		", [
			':idpess'=>$idpess
		]);

		if (count($results) > 0) {
			$this->setData($results[0]);
		}
	}
	*/

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("
			 SELECT * 
			FROM tb_insc a 
			INNER JOIN tb_inscstatus b USING(idinscstatus) 
			INNER JOIN tb_carts c USING(idcart)
			INNER JOIN tb_pessoa d USING(idpess)
			INNER JOIN tb_users e ON e.iduser = d.iduser			
			INNER JOIN tb_persons f ON f.idperson = e.idperson
			ORDER BY a.dtinsc DESC
		");

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_insc WHERE idinsc = :idinsc", [
			':idinsc'=>$this->getidinsc()
		]);

	}

	public function deleteInscByIdinsc($idinsc)
	{
		$sql = new Sql();

		$results = $sql->select("			
			CALL sp_insc_delete(:idinsc)
		", [
			':idinsc'=>$idinsc
		]);
	}

	public function deleteInscWhereIdPessIsNull($idinsc, $idcart, $idturma, $idtemporada)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_insc 
			WHERE idinsc = :idinsc
			AND idcart = :idcart
			AND idturma = :idturma
			AND idtemporada = :idtemporada", [
			':idinsc'=>$idinsc,
			':idcart'=>$idcart,
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
	}

	public function getCart():Cart
	{

		$cart = new Cart();

		$cart->get((int)$this->getidcart());

		return $cart;

	}

	public static function setError($msg)
	{

		$_SESSION[Insc::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[Insc::ERROR]) && $_SESSION[Insc::ERROR]) ? $_SESSION[Insc::ERROR] : '';

		Insc::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Insc::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Insc::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Insc::SUCCESS]) && $_SESSION[Insc::SUCCESS]) ? $_SESSION[Insc::SUCCESS] : '';

		Insc::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Insc::SUCCESS] = NULL;

	}

	public static function getPageInsc($page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_insc a 
			INNER JOIN tb_inscstatus b USING(idinscstatus) 
			INNER JOIN tb_carts c USING(idcart)			
			INNER JOIN tb_pessoa d USING(idpess)
			INNER JOIN tb_users e ON e.iduser = d.iduser
			INNER JOIN tb_persons f ON f.idperson = e.idperson
			INNER JOIN tb_temporada g USING(idtemporada)
			INNER JOIN tb_turma h USING(idturma)
			INNER JOIN tb_espaco i ON i.idespaco = h.idespaco
			INNER JOIN tb_local j ON j.idlocal = i.idlocal
			ORDER BY a.dtinsc 
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearchInsc($search, $page = 1, $itemsPerPage = 5)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_insc a 
			INNER JOIN tb_inscstatus b USING(idinscstatus) 
			INNER JOIN tb_carts c USING(idcart)			
			INNER JOIN tb_pessoa d USING(idpess)
			INNER JOIN tb_users e ON e.iduser = d.iduser
			INNER JOIN tb_persons f ON f.idperson = e.idperson
			INNER JOIN tb_temporada g USING(idtemporada)
			INNER JOIN tb_turma h USING(idturma)
			INNER JOIN tb_espaco i ON i.idespaco = h.idespaco
			INNER JOIN tb_local j ON j.idlocal = i.idlocal
			WHERE a.idinsc LIKE :search
			OR f.desperson LIKE :search
			OR a.dtinsc LIKE :search
			OR b.descstatus LIKE :search 
			OR g.desctemporada LIKE :search 
			OR d.nomepess LIKE :search
			OR h.descturma LIKE :search 
			OR i.descespaco LIKE :search 
			OR j.apelidolocal LIKE :search 
			ORDER BY a.dtinsc
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%',
			':id'=>$search
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageInscTemporada($page = 1, $itemsPerPage = 10, $idtemporada)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_insc a 
			INNER JOIN tb_inscstatus b USING(idinscstatus) 
			INNER JOIN tb_carts c USING(idcart)			
			INNER JOIN tb_pessoa d USING(idpess)
			INNER JOIN tb_users e ON e.iduser = d.iduser
			INNER JOIN tb_persons f ON f.idperson = e.idperson
			INNER JOIN tb_temporada g USING(idtemporada)
			INNER JOIN tb_turma h USING(idturma)
			INNER JOIN tb_espaco i ON i.idespaco = h.idespaco
			INNER JOIN tb_local j ON j.idlocal = i.idlocal
			WHERE idtemporada = :idtemporada
			ORDER BY a.dtinsc DESC
			LIMIT $start, $itemsPerPage;
		", [
			":idtemporada"=>$idtemporada

		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearchInscTemporada($search, $page = 1, $itemsPerPage = 5, $idtemporada)
	{

		$start = ($page - 1) * $itemsPerPage;		

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_insc a 
			INNER JOIN tb_inscstatus b USING(idinscstatus) 
			INNER JOIN tb_carts c USING(idcart)			
			INNER JOIN tb_pessoa d USING(idpess)
			INNER JOIN tb_users e ON e.iduser = d.iduser
			INNER JOIN tb_persons f ON f.idperson = e.idperson
			INNER JOIN tb_temporada g USING(idtemporada)
			INNER JOIN tb_turma h USING(idturma)
			INNER JOIN tb_espaco j ON j.idespaco = h.idespaco
			INNER JOIN tb_local k ON k.idlocal = j.idlocal
			INNER JOIN tb_turmatemporada i
			WHERE idtemporada = :idtemporada 
			AND (a.idinsc LIKE :search
			OR f.desperson LIKE :search
			OR b.descstatus LIKE :search 
			OR g.desctemporada LIKE :search 
			OR d.nomepess LIKE :search
			OR h.descturma LIKE :search) 
			-- ORDER BY a.dtinsc DESC
			LIMIT $start, $itemsPerPage;
		", [
			'idtemporada'=>$idtemporada,
			':search'=>'%'.$search.'%',
			':id'=>$search
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}
	
	public function getInscByTurmaTemporadaTodas($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus		
			-- INNER JOIN tb_endereco g ON g.idpess = c.idpess				
			WHERE a.idturma = :idturma AND a.idtemporada = :idtemporada 
			ORDER BY a.idinsc, a.inscpcd DESC, a.laudo DESC, a.inscpvs DESC, a.numordem, a.idinscstatus;
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}
	
	public function getInscByTurmaTemporada($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus		
			-- INNER JOIN tb_endereco g ON g.idpess = c.idpess
			WHERE a.idturma = :idturma AND a.idtemporada = :idtemporada AND a.laudo = 0 AND a.inscpcd = 0 AND a.inscpvs = 0
			ORDER BY a.idinsc, a.idinscstatus, a.inscpcd DESC, a.laudo DESC, a.inscpvs DESC, a.numordem;
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	public function getInscByTurmaTemporadaPcd($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus		
			-- INNER JOIN tb_endereco g ON g.idpess = c.idpess					
			WHERE a.idturma = :idturma AND a.idtemporada = :idtemporada AND a.inscpcd = 1
			ORDER BY a.idinsc, a.idinscstatus, a.inscpcd DESC, a.laudo DESC, a.inscpvs DESC, a.numordem;
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	public function getInscByTurmaTemporadaPlm($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus	
			-- INNER JOIN tb_endereco g ON g.idpess = c.idpess						
			WHERE a.idturma = :idturma AND a.idtemporada = :idtemporada AND a.laudo = 1
			ORDER BY a.idinsc, a.idinscstatus, a.inscpcd DESC, a.laudo DESC, a.inscpvs DESC, a.numordem;
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	public function getInscByTurmaTemporadaPvs($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus	
			-- INNER JOIN tb_endereco g ON g.idpess = c.idpess						
			WHERE a.idturma = :idturma AND a.idtemporada = :idtemporada AND a.inscpvs = 1
			ORDER BY a.idinsc, a.idinscstatus, a.inscpcd DESC, a.laudo DESC, a.inscpvs DESC, a.numordem;
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	public function getInscByTurmaTemporadaValida($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE idturma = :idturma AND idtemporada = :idtemporada AND a.idinscstatus = 6
			ORDER BY a.idinsc
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	public function getInscByTurmaTemporadaMatricular($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_endereco g ON g.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE idturma = :idturma 
			AND idtemporada = :idtemporada 
			AND (a.idinscstatus = 3 OR a.idinscstatus = 7)
			ORDER BY a.idinscstatus, a.numordem
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	public function getInscByTurmaTemporadaChamada($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("			
			CALL sp_select_insc_chamada(:idturma, :idtemporada);
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}
	/*
	public function getInscByTurmaTemporadaChamadaCursos($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("			
			CALL sp_select_insc_chamada_cursos(:idturma, :idtemporada);
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}
	*/

	public function getInscByTurmaTemporadaChamadaCursos($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("			
			SELECT c.nomepess, a.idinscstatus FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			-- INNER JOIN tb_endereco g ON g.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE idturma = :idturma
			AND idtemporada = :idtemporada
			ORDER BY c.nomepess, a.idinscstatus;
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}		

	public function getInscByTurmaTemporadaParaSorteioGeral($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE idturma = :idturma AND idtemporada = :idtemporada AND a.idinscstatus = 7 
			ORDER BY a.idinsc
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	public function getInscByTurmaTemporadaParaSorteioAmpla($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE idturma = :idturma AND idtemporada = :idtemporada AND a.idinscstatus = 6 AND a.laudo = 0 AND a.inscpcd = 0 AND a.inscpvs = 0
			ORDER BY a.idinsc
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	public function getInscByTurmaTemporadaClassificadasAmpla($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE idturma = :idturma 
			AND idtemporada = :idtemporada 
			AND a.idinscstatus != 9 
			AND a.laudo = 0 
			AND a.inscpcd = 0 
			AND a.inscpvs = 0
			ORDER BY a.numordem
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	public function getInscByTurmaTemporadaCountClassificadasAmpla($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("			
			CALL sp_select_insc_classificacao_geral(:idturma, :idtemporada);
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	public function getInscByTurmaTemporadaClassificadasPcd($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE idturma = :idturma 
			AND idtemporada = :idtemporada 
			AND a.idinscstatus != 9 
			AND a.inscpcd = 1 
			AND (a.laudo = 1 OR a.laudo = 0 OR a.inscpvs = 1 OR a.inscpvs = 0)
			ORDER BY a.numordem
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	public function getInscByTurmaTemporadaCountClassificadasPcd($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("			
			CALL sp_select_insc_classificacao_pcd(:idturma, :idtemporada);
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}                        

	public function getInscByTurmaTemporadaClassificadasPlm($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE idturma = :idturma 
			AND idtemporada = :idtemporada 
			AND a.idinscstatus != 9 
			AND a.laudo = 1 
			AND a.inscpcd = 0 
			AND a.inscpvs = 0
			ORDER BY a.numordem
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	} 

	public function getInscByTurmaTemporadaCountClassificadasPlm($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("			
			CALL sp_select_insc_classificacao_plm(:idturma, :idtemporada);
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}                        

	public function getInscByTurmaTemporadaClassificadasPvs($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE idturma = :idturma 
			AND idtemporada = :idtemporada 
			AND a.idinscstatus != 9 
			AND a.inscpvs = 1 
            AND a.inscpcd = 0
            AND a.laudo = 0 
			ORDER BY a.numordem
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	public function getInscByTurmaTemporadaCountClassificadasPvs($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("			
			CALL sp_select_insc_classificacao_pvs(:idturma, :idtemporada);
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}  

	public function getInscByTurmaTemporadaListaEsperaAmpla($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE idturma = :idturma 
			AND idtemporada = :idtemporada 
			-- AND a.idinscstatus != 9 
			AND a.idinscstatus = 7
			AND a.laudo = 0 
			AND a.inscpcd = 0 
			AND a.inscpvs = 0
			ORDER BY a.numordem
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	} 

	public function getInscByTurmaTemporadaCountListaEsperaAmpla($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("			
			CALL sp_select_insc_listaespera_geral(:idturma, :idtemporada);
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	public function getInscByTurmaTemporadaListaEsperaPcd($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE idturma = :idturma 
			AND idtemporada = :idtemporada 
			-- AND a.idinscstatus != 9 
			AND a.idinscstatus = 7 
			AND a.inscpcd = 1 
			AND (a.laudo = 1 OR a.laudo = 0 OR a.inscpvs = 1 OR a.inscpvs = 0)
			ORDER BY a.numordem
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}  

	public function getInscByTurmaTemporadaCountListaEsperaPcd($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("			
			CALL sp_select_insc_listaespera_pcd(:idturma, :idtemporada);
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}                        

	public function getInscByTurmaTemporadaListaEsperaPlm($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE idturma = :idturma 
			AND idtemporada = :idtemporada 
			-- AND a.idinscstatus != 9 
			AND a.idinscstatus = 7 
			AND a.laudo = 1 
			AND a.inscpcd = 0 
			AND a.inscpvs = 0
			ORDER BY a.numordem
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	} 

	public function getInscByTurmaTemporadaCountListaEsperaPlm($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("			
			CALL sp_select_insc_listaespera_plm(:idturma, :idtemporada);
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}                        

	public function getInscByTurmaTemporadaListaEsperaPvs($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE idturma = :idturma 
			AND idtemporada = :idtemporada 
			-- AND a.idinscstatus != 9 
			AND a.idinscstatus = 7 
			AND a.inscpvs = 1 
            AND a.inscpcd = 0
            AND (a.laudo = 0 OR a.laudo = 1)
			ORDER BY a.numordem
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	} 

	public function getInscByTurmaTemporadaCountListaEsperaPvs($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("			
			CALL sp_select_insc_listaespera_pvs(:idturma, :idtemporada);
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}                    

	public function getInscByTurmaTemporadaCrecValida($idlocal, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart			
			INNER JOIN tb_turma h ON h.idturma = a.idturma
			INNER JOIN tb_modalidade i ON i.idmodal = h.idmodal
			INNER JOIN tb_horario j ON j.idhorario = h.idhorario
			INNER JOIN tb_espaco k ON k.idespaco = h.idespaco
			INNER JOIN tb_local l ON l.idlocal = k.idlocal
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE l.idlocal = :idlocal AND idtemporada = :idtemporada AND a.idinscstatus = 6
			ORDER BY i.descmodal, h.idturma
		", [
			':idlocal'=>$idlocal,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	/*
	public function countInscByTurmaTemporadaValida($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT count(*) as total FROM tb_insc a
			-- INNER JOIN tb_carts b ON b.idcart = a.idcart
			WHERE idturma = :idturma AND idtemporada = :idtemporada AND a.idinscstatus = 6
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);

		return $results;
	}
	*/
	public static function getPageInscTemporadaUser($page = 1, $itemsPerPage = 10, $idtemporada, $iduser)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_turma h ON h.idturma = a.idturma
			INNER JOIN tb_espaco j ON j.idespaco = h.idespaco
			INNER JOIN tb_local k ON k.idlocal = j.idlocal
			INNER JOIN tb_temporada i ON i.idtemporada = a.idtemporada
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus  
			WHERE a.idtemporada = :idtemporada 
            AND a.idturma IN (SELECT idturma FROM tb_turmatemporada g WHERE g.iduser = :iduser AND g.idtemporada = :idtemporada) ORDER BY a.idinsc DESC
			LIMIT $start, $itemsPerPage;
		", [
			":idtemporada"=>$idtemporada,
			":iduser"=>$iduser
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearchInscTemporadaUser($search, $page = 1, $itemsPerPage = 5, $idtemporada, $iduser)
	{

		$start = ($page - 1) * $itemsPerPage;		

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_turma h ON h.idturma = a.idturma
			INNER JOIN tb_espaco j ON j.idespaco = h.idespaco
			INNER JOIN tb_local k ON k.idlocal = j.idlocal
			INNER JOIN tb_temporada i ON i.idtemporada = a.idtemporada
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus  
			WHERE a.idtemporada = :idtemporada 
            AND a.idturma IN (SELECT idturma FROM tb_turmatemporada g WHERE g.iduser = :iduser AND g.idtemporada = :idtemporada) 
            AND (
            a.idinsc LIKE :search	
            OR e.desperson LIKE :search	
            OR f.descstatus LIKE :search 
            OR i.desctemporada LIKE :search 
            OR c.nomepess LIKE :search 
            OR h.descturma LIKE :search
            ) 
            LIMIT $start, $itemsPerPage;
		", [
			'idtemporada'=>$idtemporada,
			'iduser'=>$iduser,
			':search'=>'%'.$search.'%',
			':id'=>$search
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	/*
	public function listAllInscTurmaTemporadaByUser($idtemporada, $user){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus            
			WHERE idtemporada = :idtemporada 
            and idturma  
            IN ( 
            select idturma 
            from tb_turmatemporada g 
            where g.iduser = :iduser )
			ORDER BY a.idinscstatus, a.numordem
		", [			
			':idtemporada'=>$idtemporada,
			':iduser'=>$iduser
		]);
		
		$this->setData($results);
	}
	*/

	public function getIdInscStatusByIdinsc($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT f.idinscstatus FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE idturma = :idturma AND idtemporada = :idtemporada
			ORDER BY a.idinscstatus
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
			return $results;
	}

	// Esta função verifica se a temporada está apenas iniciada 
	// para setar o status da inscrição no site.php
	public function statusTemporadaIniciada($idtemporada){

		$idStatusTemporadaIniciada = StatusTemporada::TEMPORADA_INICIADA;

		$sql = new Sql();

		$results = $sql->select("
			SELECT idstatustemporada
			FROM tb_temporada 					
			WHERE idtemporada = :idtemporada AND idstatustemporada = :idstatustemporada
		", [
			':idtemporada'=>$idtemporada,
			':idstatustemporada'=>$idStatusTemporadaIniciada
		]);

		if (count($results) > 0) {			
			return true;
		}else{
			return false;
		}
	}

	
	// Esta função verifica se a temporada está com a matricula iniciada 
	// para setar o status da inscrição no site.php
	public function statusTemporadaMatriculaIniciada($idtemporada){

		$idStatusTemporadaMatriculaIniciada = StatusTemporada::MATRICULAS_INICIADAS;

		$sql = new Sql();

		$results = $sql->select("
			SELECT idstatustemporada
			FROM tb_temporada 					
			WHERE idtemporada = :idtemporada AND idstatustemporada = :idstatustemporada
		", [
			':idtemporada'=>$idtemporada,
			':idstatustemporada'=>$idStatusTemporadaMatriculaIniciada
		]);

		if (count($results) > 0) {			
			return true;
		}else{
			return false;
		}
	}

	// Esta função verifica se a temporada está com as inscrições encerradas 
	// para setar o status da inscrição no site.php
	public function statusTemporadaInscricoesEncerradas($idtemporada){

		$idStatusTemporadaInscricoesEncerradas = StatusTemporada::INSCRICOES_ENCERRADAS;

		$sql = new Sql();

		$results = $sql->select("
			SELECT idstatustemporada
			FROM tb_temporada 					
			WHERE idtemporada = :idtemporada AND idstatustemporada = :idstatustemporada
		", [
			':idtemporada'=>$idtemporada,
			':idstatustemporada'=>$idStatusTemporadaInscricoesEncerradas
		]);

		if (count($results) > 0) {			
			return true;
		}else{
			return false;
		}
	}
	

	// Esta função verifica se a temporada está com a matrículas encerradas 
	// para setar o status da inscrição no site.php
	public function statusTemporadaMatriculasEncerradas($idtemporada){

		$idStatusTemporadaMatriculasEncerradas = StatusTemporada::MATRICULAS_ENCERRADAS;

		$sql = new Sql();

		$results = $sql->select("
			SELECT idstatustemporada
			FROM tb_temporada 					
			WHERE idtemporada = :idtemporada AND idstatustemporada = :idstatustemporada
		", [
			':idtemporada'=>$idtemporada,
			':idstatustemporada'=>$idStatusTemporadaMatriculasEncerradas
		]);

		if (count($results) > 0) {			
			return true;
		}else{
			return false;
		}
	}

	public function alteraStatusInscricaoMatriculada($idinsc, $idturma, $idtemporada){

		$idStatusMatriculada = 1;

		$sql = new Sql();

		$sql->query("UPDATE tb_insc SET idinscstatus = :idStatusMatriculada WHERE idinsc = :idinsc", array(
			":idinsc"=>$idinsc,
			"idStatusMatriculada"=>$idStatusMatriculada
		));

		Temporada::updateNumMatriculadosMais($idturma, $idtemporada);
		Insc::alteraDataMatriculaInscricao($idinsc);
	}

	public function alteraDataMatriculaInscricao($idinsc){

		$dtmatric = date('Y-m-d H:i:s');

		$sql = new Sql();

		$sql->query("UPDATE tb_insc SET dtmatric = :dtmatric WHERE idinsc = :idinsc", array(
			":idinsc"=>$idinsc,
			"dtmatric"=>$dtmatric
		));
	}

	public function alteraStatusInscricaoAguardandoMatricula($idinsc){

		$idStatusMatriculada = 2;

		$sql = new Sql();

		$sql->query("UPDATE tb_insc SET idinscstatus = :idStatusMatriculada WHERE idinsc = :idinsc", array(
			":idinsc"=>$idinsc,
			"idStatusMatriculada"=>$idStatusMatriculada
		));
	}

	public function alteraStatusInscricaoSorteada($idinsc){

		$idStatusMatriculada = 3;

		$sql = new Sql();

		$sql->query("UPDATE tb_insc SET idinscstatus = :idStatusMatriculada WHERE idinsc = :idinsc", array(
			":idinsc"=>$idinsc,
			"idStatusMatriculada"=>$idStatusMatriculada
		));

	}

	public function alteraStatusInscricaoCancelada($idinsc){

		$idStatusCancelada = 9;
		$sql = new Sql();

		$getIdStatusIdTempIdTurmaInsc = Insc::getIdStatusIdTempIdTurmaInsc($idinsc);

		$idinscstatus = $getIdStatusIdTempIdTurmaInsc[0]['idinscstatus'];
		$idturma = $getIdStatusIdTempIdTurmaInsc[0]['idturma'];
		$idtemporada = $getIdStatusIdTempIdTurmaInsc[0]['idtemporada'];

		if($idinscstatus == 1){

			$sql->query("UPDATE tb_insc SET idinscstatus = :idStatusCancelada WHERE idinsc = :idinsc", array(
				":idinsc"=>$idinsc,
				"idStatusCancelada"=>$idStatusCancelada
			));
			Temporada::updateNumMatriculadosMenos($idturma, $idtemporada);
			
		}else{

			$sql->query("UPDATE tb_insc SET idinscstatus = :idStatusCancelada WHERE idinsc = :idinsc", array(
				":idinsc"=>$idinsc,
				"idStatusCancelada"=>$idStatusCancelada
			));
		}		
	}

	public function getIdStatusIdTempIdTurmaInsc($idinsc){

		$sql = new Sql();			
			$results =  $sql->select("SELECT idinscstatus, idtemporada, idturma FROM tb_insc WHERE idinsc = :idinsc", [
				'idinsc'=>$idinsc
			]);
			return $results;		
	}

	public function alteraStatusInscricaoDesistente($idinsc, $idturma, $idtemporada){

		$idStatusMatriculada = 8;

		$sql = new Sql();

		$sql->query("UPDATE tb_insc SET idinscstatus = :idStatusMatriculada WHERE idinsc = :idinsc", array(
			":idinsc"=>$idinsc,
			"idStatusMatriculada"=>$idStatusMatriculada
		));

		Temporada::updateNumMatriculadosMenos($idturma, $idtemporada);
	}

	public function numMaxNumOrdem($idtemporada, $idturma){

			$sql = new Sql();
			
			$results =  $sql->select("SELECT MAX(numordem) as maxNumOrdem FROM tb_insc WHERE idtemporada = :idtemporada AND idturma = :idturma", [
				'idtemporada'=>$idtemporada,
				'idturma'=>$idturma
			]);

			return $results;			
	}

	public function numMatriculados($idtemporada, $idturma){

		$sql = new Sql();
		
		$results =  $sql->select("SELECT nummatriculados FROM tb_turmatemporada WHERE idtemporada = :idtemporada AND idturma = :idturma", [
			'idtemporada'=>$idtemporada,
			'idturma'=>$idturma
		]);

		return $results;			
	}
	
	public function numMatriculadosTemporada($idtemporada){

		$sql = new Sql();
		
		$results =  $sql->select("SELECT SUM(nummatriculados) as matriculados FROM tb_turmatemporada WHERE idtemporada = :idtemporada", [
			'idtemporada'=>$idtemporada
		]);

		return $results;			
	}
	
	public function numMatriculadosDescTemporada($desctemporada){

		$sql = new Sql();
		
		$results =  $sql->select("SELECT SUM(nummatriculados) as matriculados 
			FROM tb_turmatemporada 
			INNER JOIN 	tb_temporada a USING(idtemporada)
			WHERE a.desctemporada = :desctemporada", [
			':desctemporada'=>$desctemporada
		]);

		return $results[0]['matriculados'];	
	}
	
	public function alteraStatusInscricaoParaFilaDeEspera($idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			SELECT a.vagas, b.idtemporada, b.idturma
			FROM tb_turma a 
			INNER JOIN tb_turmatemporada b
			ON	b.idturma = a.idturma		
			WHERE idtemporada = :idtemporada", [
				":idtemporada"=>$idtemporada
		]);

		for($i=0; $i < count($results); $i++) { 

			$idInscStatusFilaDeEspera = InscStatus::FILA_DE_ESPERA;			
			$idStatusAguardandoSorteio = InscStatus::AGUARDANDO_SORTEIO;
			$idtemporada = $results[$i]['idtemporada'];
			$idturma = $results[$i]['idturma'];			

			$sql = new Sql();		

			$sql->query("UPDATE tb_insc SET idinscstatus = :idInscStatusFilaDeEspera WHERE idinscstatus = :idStatusAguardandoSorteio AND idtemporada = :idtemporada AND idturma = :idturma", array(				
				":idInscStatusFilaDeEspera"=>$idInscStatusFilaDeEspera,
				":idStatusAguardandoSorteio"=>$idStatusAguardandoSorteio,
				"idtemporada"=>$idtemporada,
				"idturma"=>$idturma				
			));
		}		
	}

	public function alteraStatusInscricaoParaSorteadaGeral($idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			SELECT a.vagas, b.idtemporada, b.idturma
			FROM tb_turma a 
			INNER JOIN tb_turmatemporada b
			ON	b.idturma = a.idturma		
			WHERE idtemporada = :idtemporada", [
				":idtemporada"=>$idtemporada
		]);

		for($i=0; $i < count($results); $i++) { 		
			
			$idtemporada = $results[$i]['idtemporada'];
			$idturma = $results[$i]['idturma'];
			$vagas = floor($results[$i]['vagas'] * 0.7);


			$Results2 = $sql->query("CALL sp_insc_update_insc_sorteada_geral(:idturma, :idtemporada, :vagas)", [			
				":idturma"=>$idturma,
				":idtemporada"=>$idtemporada,
				":vagas"=>$vagas
			]);
		
		}		
	}

	public function alteraStatusInscricaoParaSorteadaPcd($idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			SELECT a.vagas, b.idtemporada, b.idturma
			FROM tb_turma a 
			INNER JOIN tb_turmatemporada b
			ON	b.idturma = a.idturma		
			WHERE idtemporada = :idtemporada", [
				":idtemporada"=>$idtemporada
		]);

		for($i=0; $i < count($results); $i++) { 		
			
			$idtemporada = $results[$i]['idtemporada'];
			$idturma = $results[$i]['idturma'];
			$vagas = floor($results[$i]['vagas'] * 0.1);


			$Results2 = $sql->query("CALL sp_insc_update_insc_sorteada_pcd(:idturma, :idtemporada, :vagas)", [			
				":idturma"=>$idturma,
				":idtemporada"=>$idtemporada,
				":vagas"=>$vagas
			]);
		
		}		
	}

	public function alteraStatusInscricaoParaSorteadaPlm($idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			SELECT a.vagas, b.idtemporada, b.idturma
			FROM tb_turma a 
			INNER JOIN tb_turmatemporada b
			ON	b.idturma = a.idturma		
			WHERE idtemporada = :idtemporada", [
				":idtemporada"=>$idtemporada
		]);

		for($i=0; $i < count($results); $i++) { 		
			
			$idtemporada = $results[$i]['idtemporada'];
			$idturma = $results[$i]['idturma'];
			$vagas = floor($results[$i]['vagas'] * 0.1);


			$Results2 = $sql->query("CALL sp_insc_update_insc_sorteada_plm(:idturma, :idtemporada, :vagas)", [			
				":idturma"=>$idturma,
				":idtemporada"=>$idtemporada,
				":vagas"=>$vagas
			]);
		
		}		
	}

	public function alteraStatusInscricaoParaSorteadaPvs($idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			SELECT a.vagas, b.idtemporada, b.idturma
			FROM tb_turma a 
			INNER JOIN tb_turmatemporada b
			ON	b.idturma = a.idturma		
			WHERE idtemporada = :idtemporada", [
				":idtemporada"=>$idtemporada
		]);

		for($i=0; $i < count($results); $i++) { 		
			
			$idtemporada = $results[$i]['idtemporada'];
			$idturma = $results[$i]['idturma'];
			$vagas = floor($results[$i]['vagas'] * 0.1);


			$Results2 = $sql->query("CALL sp_insc_update_insc_sorteada_pvs(:idturma, :idtemporada, :vagas)", [			
				":idturma"=>$idturma,
				":idtemporada"=>$idtemporada,
				":vagas"=>$vagas
			]);
		
		}		
	}	

	public function countInscCursos($idtemporada, $idturma){

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc a			
			WHERE idtemporada = :idtemporada
            AND idturma = :idturma
			-- AND (idinscstatus != 8 
			-- AND idinscstatus != 9)", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);

		return $results[0]['count(*)'];
	}
	
	public function countInscTurma($idtemporada, $idturma){

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc a			
			WHERE idtemporada = :idtemporada
            AND idturma = :idturma
			-- AND (idinscstatus != 8 
			-- AND idinscstatus != 9)", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);

		return $results[0]['count(*)'];
	}
	
	public function getInscGeral($idturma, $idtemporada)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc a			
			WHERE idtemporada = :idtemporada
            AND idturma = :idturma
			AND (idinscstatus != 8 
			AND idinscstatus != 9)
			AND (laudo = 0 
			AND inscpcd = 0
			AND inscpvs = 0)", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		return $results[0]['count(*)'];		
	}
	
	public function getInscGeralDesctemporada($desctemporada)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc 
			INNER JOIN 	tb_temporada USING(idtemporada)
			WHERE desctemporada = :desctemporada
			-- AND (idinscstatus != 8 
			-- AND idinscstatus != 9)", [
				":desctemporada"=>$desctemporada,
		]);
		return $results[0]['count(*)'];		
	}

	public function getInscGeralDesctemporadaValidas($desctemporada)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc 
			INNER JOIN 	tb_temporada USING(idtemporada)
			WHERE desctemporada = :desctemporada
			AND (idinscstatus != 8 
			AND idinscstatus != 9)", [
				":desctemporada"=>$desctemporada,
		]);
		return $results[0]['count(*)'];		
	}
	
	public function getInscTemporadaModalidade($desctemporada, $idmodal)
	{
		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc a		
			INNER JOIN 	tb_temporada b USING(idtemporada)
            INNER JOIN 	tb_turma c USING(idturma)
			WHERE b.desctemporada = :desctemporada
            AND c.idmodal = :idmodal
			AND (idinscstatus != 8 
			AND idinscstatus != 9)", [
				":desctemporada"=>$desctemporada,
				":idmodal"=>$idmodal
		]);
		return $results[0]['count(*)'];		
	}

	public function pegaInscGeral($idturma, $idtemporada)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc a			
			WHERE idtemporada = :idtemporada
            AND idturma = :idturma
            AND (idinscstatus = 1 OR idinscstatus = 2)
			-- AND (idinscstatus != 8 AND idinscstatus != 9)
			AND (laudo = 0 
			AND inscpcd = 0
			AND inscpvs = 0)", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		if($results[0]['count(*)'] <= 0){
		   return 0; 
		}else{
		   return (int)$results[0]['count(*)'];
		}
	}

	public function pegaInscPlm($idturma, $idtemporada)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc a			
			WHERE idtemporada = :idtemporada
            AND idturma = :idturma
			AND (idinscstatus = 1 OR idinscstatus = 2)
			-- AND (idinscstatus != 8 AND idinscstatus != 9)
			AND (laudo = 1
			AND inscpcd = 0
			AND inscpvs = 0)", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		
		if($results[0]['count(*)'] <= 0){
		   return 0; 
		}else{
		   return (int)$results[0]['count(*)'];
		}
		//return $results[0]['count(*)'];		
	}

	public function pegaInscPcd($idturma, $idtemporada)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc a			
			WHERE idtemporada = :idtemporada
            AND idturma = :idturma
			AND (idinscstatus = 1 OR idinscstatus = 2)
			-- AND (idinscstatus != 8 AND idinscstatus != 9)
			AND (inscpcd = 1
			AND laudo = 0
			AND inscpvs = 0)", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		
		if($results[0]['count(*)'] <= 0){
		   return 0; 
		}else{
		   return (int)$results[0]['count(*)'];
		}
		//return $results[0]['count(*)'];		
	}

	public function pegaInscPvs($idturma, $idtemporada)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc a			
			WHERE idtemporada = :idtemporada
            AND idturma = :idturma
			AND (idinscstatus = 1 OR idinscstatus = 2)
			-- AND (idinscstatus != 8 AND idinscstatus != 9)
			AND (inscpvs = 1
			AND laudo = 0
			AND inscpcd = 0)", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		
		if($results[0]['count(*)'] <= 0){
		   return 0; 
		}else{
		   return (int)$results[0]['count(*)'];
		}
		//return $results[0]['count(*)'];		
	}

	public function pegaInscMatricEAguardGeral($idturma, $idtemporada)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc a			
			WHERE idtemporada = :idtemporada
            AND idturma = :idturma
			AND (idinscstatus = 1 OR idinscstatus = 2)
			AND (laudo = 0 
			AND inscpcd = 0
			AND inscpvs = 0)", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		if($results[0]['count(*)'] <= 0){
		   return 0; 
		}else{
		   return (int)$results[0]['count(*)'];
		}
	}

	public function pegaInscMatricEAguardPlm($idturma, $idtemporada)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc a			
			WHERE idtemporada = :idtemporada
            AND idturma = :idturma
			AND (idinscstatus = 1 OR idinscstatus = 2)
			AND (laudo = 1 
			AND inscpcd = 0
			AND inscpvs = 0)", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		if($results[0]['count(*)'] <= 0){
		   return 0; 
		}else{
		   return (int)$results[0]['count(*)'];
		}
	}

	public function pegaInscMatricEAguardPcd($idturma, $idtemporada)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc a			
			WHERE idtemporada = :idtemporada
            AND idturma = :idturma
			AND (idinscstatus = 1 OR idinscstatus = 2)
			AND (laudo = 0 
			AND inscpcd = 1
			AND inscpvs = 0)", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		if($results[0]['count(*)'] <= 0){
		   return 0; 
		}else{
		   return (int)$results[0]['count(*)'];
		}
	}

	public function pegaInscMatricEAguardPvs($idturma, $idtemporada)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc a			
			WHERE idtemporada = :idtemporada
            AND idturma = :idturma
			AND (idinscstatus = 1 OR idinscstatus = 2)
			AND (laudo = 0 
			AND inscpcd = 0
			AND inscpvs = 1)", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		if($results[0]['count(*)'] <= 0){
		   return 0; 
		}else{
		   return (int)$results[0]['count(*)'];
		}
	}
	
	public function listaPessoasPorTurmaTemporada($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a 
			INNER JOIN tb_carts b ON b.idcart = a.idcart 
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess 
			INNER JOIN tb_endereco d ON d.idpess = c.idpess 
			INNER JOIN tb_users e ON e.iduser = c.iduser
			INNER JOIN tb_persons f ON f.idperson = e.idperson
			WHERE a.idturma = :idturma AND a.idtemporada = :idtemporada
			-- AND (idinscstatus != 8 AND idinscstatus != 9)
			ORDER BY a.idinscstatus, c.nomepess;
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);		
		return $results;
	}
	
	public function getNumInscMatriculadaTurmaTemporada($idtemporada, $idturma)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc 
			WHERE idtemporada = :idtemporada
			AND idturma = :idturma
			AND idinscstatus = 1", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		return $results[0]['count(*)'];		
	}

	public function getNumInscAguardandoMatriculaTurmaTemporada($idtemporada, $idturma)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc 
			WHERE idtemporada = :idtemporada
			AND idturma = :idturma
			AND idinscstatus = 2", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		return $results[0]['count(*)'];		
	}

	public function getNumInscListaEsperaTurmaTemporada($idtemporada, $idturma)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc 
			WHERE idtemporada = :idtemporada
			AND idturma = :idturma
			AND idinscstatus = 7", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		return $results[0]['count(*)'];		
	}
	
	public function getNumInscListaEsperaPubGeralTurmaTemporada($idtemporada, $idturma)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc 
			WHERE idtemporada = :idtemporada
			AND idturma = :idturma
			AND idinscstatus = 7 
			AND laudo = 0 
			AND inscpcd = 0 
			AND inscpvs = 0", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		return $results[0]['count(*)'];		
	}

	public function getNumInscListaEsperaPubLaudoTurmaTemporada($idtemporada, $idturma)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc 
			INNER JOIN 	tb_temporada USING(idtemporada)
			WHERE idtemporada = :idtemporada
			AND idturma = :idturma
			AND idinscstatus = 7 
			AND laudo = 1 
			AND inscpcd = 0 
			AND inscpvs = 0", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		return $results[0]['count(*)'];		
	}

	public function getNumInscListaEsperaPubPcdTurmaTemporada($idtemporada, $idturma)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc 
			INNER JOIN 	tb_temporada USING(idtemporada)
			WHERE idtemporada = :idtemporada
			AND idturma = :idturma
			AND idinscstatus = 7 
			AND laudo = 0 
			AND inscpcd = 1 
			AND inscpvs = 0", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		return $results[0]['count(*)'];		
	}

	public function getNumInscListaEsperaPubPvsTurmaTemporada($idtemporada, $idturma)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc 
			WHERE idtemporada = :idtemporada
			AND idturma = :idturma
			AND idinscstatus = 7 
			AND laudo = 0 
			AND inscpcd = 0 
			AND inscpvs = 1", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		return $results[0]['count(*)'];		
	}

	public function getNumInscPublicoGeralValidaTurmaTemporada($idtemporada, $idturma)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc 
			WHERE idtemporada = :idtemporada
			AND idturma = :idturma
			AND (idinscstatus != 8 
			AND idinscstatus != 9)
			AND laudo = 0 
			AND inscpcd = 0 
			AND inscpvs = 0", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		return $results[0]['count(*)'];		
	}

	public function getNumInscPublicoLaudoValidaTurmaTemporada($idtemporada, $idturma)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc 
			WHERE idtemporada = :idtemporada
			AND idturma = :idturma
			AND (idinscstatus != 8 
			AND idinscstatus != 9)
			AND laudo = 1 
			AND inscpcd = 0 
			AND inscpvs = 0", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		return $results[0]['count(*)'];		
	}

	public function getNumInscPublicoPcdValidaTurmaTemporada($idtemporada, $idturma)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc 
			WHERE idtemporada = :idtemporada
			AND idturma = :idturma
			AND (idinscstatus != 8 
			AND idinscstatus != 9)
			AND laudo = 0 
			AND inscpcd = 1 
			AND inscpvs = 0", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		return $results[0]['count(*)'];		
	}

	public function getNumInscPublicoPvsValidaTurmaTemporada($idtemporada, $idturma)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT count(*) FROM tb_insc 
			WHERE idtemporada = :idtemporada
			AND idturma = :idturma
			AND (idinscstatus != 8 
			AND idinscstatus != 9)
			AND laudo = 0 
			AND inscpcd = 0 
			AND inscpvs = 1", [
				":idtemporada"=>$idtemporada,
				":idturma"=>$idturma
		]);
		return $results[0]['count(*)'];		
	}

	public function InscByModalidadeByCpf($numcpf, $idtemporada, $idmodal, $idlocal)
	{

		$sql = new Sql();
		
		$results = $sql->select("
			SELECT  * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart 
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_turma d ON d.idturma = a.idturma 
            INNER JOIN tb_espaco e ON e.idespaco = d.idespaco
            INNER JOIN tb_local f ON f.idlocal = e.idlocal 
			INNER JOIN tb_modalidade g ON g.idmodal = d.idmodal 
			WHERE a.idtemporada = :idtemporada 
			AND c.numcpf = :numcpf
			AND g.idmodal = :idmodal
			AND f.idlocal != :idlocal
			AND a.idinscstatus = 1
			", [
				":idtemporada"=>$idtemporada,
				":numcpf"=>$numcpf,				
				":idmodal"=>$idmodal,
				":idlocal"=>$idlocal
		]);		

			return $results;		
	}

	public function inscPessoaVazioTbCarts($idtemporada)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT * FROM tb_insc a 
			INNER JOIN tb_carts b ON b.idcart = a.idcart 
            INNER JOIN tb_turma c ON c.idturma = a.idturma 
            INNER JOIN tb_espaco d ON d.idespaco = c.idespaco 
            INNER JOIN tb_local e ON e.idlocal = d.idlocal 
            INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus
			WHERE idtemporada = :idtemporada
			AND b.idpess IS NULL 
			AND (a.idinscstatus != 8 AND a.idinscstatus != 9) 
			ORDER BY a.idinsc
		", [
			":idtemporada"=>$idtemporada
		]);
		return $results;		
	}
}


?>