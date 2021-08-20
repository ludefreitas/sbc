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

		$results = $sql->select("CALL sp_insc_save(:idinsc, :idinscstatus, :idcart, :idturma, :idtemporada, :numordem, :numsorte, :laudo)", [
			':idinsc'=>$this->getidinsc(),
			':idinscstatus'=>$this->getidinscstatus(),
			':idcart'=>$this->getidcart(),
			':idturma'=>$this->getidturma(),
			':idtemporada'=>$this->getidtemporada(),
			':numordem'=>$this->getnumordem(),
			':numsorte'=>$this->getnumsorte(),
			':laudo'=>$this->getlaudo()
		]);

		if (count($results) > 0) {
			$this->setData($results[0]);
		}

	}

	public static function inscricaoEmail($idinsc, $numsorte, $idpess, $nomepess, $email, $desperson, $desctemporada){

		//$email = "lulufreitas08@hotmail.com";
		//$user = "Luciano Freitas";
		$assunto = "Inscrição Cursos Esportivos ".$desctemporada."";
		$tplName = "comprovante-insc";
		$link = "http://www.cursosesportivossbc.com.br/profile/insc/".$idinsc."/".$idpess."";

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
                 "numsorte"=>$numsorte
        )); 
             
        $emailEnviado = $mailer->send();        

        if (!$emailEnviado)
     	{

        	Insc::setError("Não foi possivel enviar email, no entanto, a incrição abaixo foi efetuada!");
        	header("Location: /profile/insc/".$idinsc."/".$idpess."");
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
            INNER JOIN tb_turma d USING(idturma) 
			INNER JOIN tb_temporada g USING(idtemporada) 	
			INNER JOIN tb_turmatemporada h ON h.idtemporada = g.idtemporada		
			INNER JOIN tb_users e ON e.iduser = h.iduser
			INNER JOIN tb_persons f ON f.idperson = e.idperson
			INNER JOIN tb_horario USING(idhorario)
			INNER JOIN tb_espaco USING(idespaco)
			INNER JOIN tb_local USING(idlocal)
			INNER JOIN tb_statustemporada USING(idstatustemporada)
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
			-- ORDER BY a.dtinsc DESC
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
			OR b.descstatus LIKE :search 
			OR g.desctemporada LIKE :search 
			OR d.nomepess LIKE :search
			OR h.descturma LIKE :search 
			OR i.descespaco LIKE :search 
			OR j.apelidolocal LIKE :search 
			-- ORDER BY a.dtinsc DESC
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
			WHERE idtemporada = :idtemporada
			-- ORDER BY a.dtinsc DESC
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
			INNER JOIN tb_turmatemporada i
			WHERE idtemporada = :idtemporada AND (a.idinsc LIKE :search
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
	
	public function getInscByTurmaTemporada($idturma, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_insc a
			INNER JOIN tb_carts b ON b.idcart = a.idcart
			INNER JOIN tb_pessoa c ON c.idpess = b.idpess
			INNER JOIN tb_users d ON d.iduser = c.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			INNER JOIN tb_inscstatus f ON f.idinscstatus = a.idinscstatus			
			WHERE idturma = :idturma AND idtemporada = :idtemporada
			ORDER BY a.idinscstatus, a.numordem
		", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

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

	/*
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
	*/

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
	}

	public function alteraStatusInscricaoAguardandoMatricula($idinsc){

		$idStatusMatriculada = 2;

		$sql = new Sql();

		$sql->query("UPDATE tb_insc SET idinscstatus = :idStatusMatriculada WHERE idinsc = :idinsc", array(
			":idinsc"=>$idinsc,
			"idStatusMatriculada"=>$idStatusMatriculada
		));

	}

	public function alteraStatusInscricaoCancelada($idinsc){

		$idStatusCancelada = 9;

		$sql = new Sql();

		$sql->query("UPDATE tb_insc SET idinscstatus = :idStatusCancelada WHERE idinsc = :idinsc", array(
			":idinsc"=>$idinsc,
			"idStatusCancelada"=>$idStatusCancelada
		));

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
			$idStatusCancelada = InscStatus::CANCELADA;
			$idtemporada = $results[$i]['idtemporada'];
			$idturma = $results[$i]['idturma'];
			$vagas = $results[$i]['vagas'];

			$sql = new Sql();		

			$sql->query("UPDATE tb_insc SET idinscstatus = :idInscStatusFilaDeEspera WHERE idinscstatus != :idStatusCancelada AND idtemporada = :idtemporada AND idturma = :idturma AND numordem > :vagas", array(
				":idInscStatusFilaDeEspera"=>$idInscStatusFilaDeEspera,
				":idStatusCancelada"=>$idStatusCancelada,
				"idtemporada"=>$idtemporada,
				"idturma"=>$idturma,
				"vagas"=>$vagas
			));
		}		
	}
	

}

?>