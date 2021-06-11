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

		$results = $sql->select("CALL sp_insc_save(:idinsc, :idinscstatus, :idcart, :idturma, :idtemporada, :numsorte)", [
			':idinsc'=>$this->getidinsc(),
			':idinscstatus'=>$this->getidinscstatus(),
			':idcart'=>$this->getidcart(),
			':idturma'=>$this->getidturma(),
			':idtemporada'=>$this->getidtemporada(),
			':numsorte'=>$this->getnumsorte()
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
		$link = "http://www.cursosesportivossbc.com.br/profile/insc/".$idinsc."";

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

        	Insc::setError("Não foi possivel enviar email");
        	header("Location: /checkout");
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
			INNER JOIN tb_pessoa d ON d.idpess = c.idpess
			INNER JOIN tb_users e ON e.iduser = d.iduser
			INNER JOIN tb_persons f ON f.idperson = e.iduser
			INNER JOIN tb_temporada g USING(idtemporada) 
			INNER JOIN tb_turma h USING(idturma) 
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

	public static function getPage($page = 1, $itemsPerPage = 10)
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
			ORDER BY a.dtinsc DESC
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearch($search, $page = 1, $itemsPerPage = 10)
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
			WHERE a.idinsc LIKE :search
			OR f.desperson LIKE :search 
			OR d.nomepess LIKE :search
			ORDER BY a.dtinsc DESC
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
	
}

?>