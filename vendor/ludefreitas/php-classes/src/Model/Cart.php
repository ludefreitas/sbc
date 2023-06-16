<?php 

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;
use \Sbc\Model\User;

class Cart extends Model {

	const SESSION = "Cart";
	const SESSION_ERROR = "CartError";
	const ERROR = "CartError";
	const ERROR_REGISTER = "CartErrorRegister";
	const SUCCESS = "CartSucesss";	

	public static function getFromSession()
	{
		$cart = new Cart();

		if (isset($_SESSION[Cart::SESSION]) && (int)$_SESSION[Cart::SESSION]['idcart'] > 0) {

			$cart->get((int)$_SESSION[Cart::SESSION]['idcart']);

		} else {

			$cart->getFromSessionID();

			if (!(int)$cart->getidcart() > 0) {

				$data = [
					'dessessionid'=>session_id()
				];

				if (User::checkLogin(false)) {

					$user = User::getFromSession();
					
					$data['iduser'] = $user->getiduser();	

				}

				$cart->setData($data);

				$cart->save();

				$cart->setToSession();


			}

		}

		return $cart;

	}

	public function setToSession()
	{
		$_SESSION[Cart::SESSION] = $this->getValues();
	}

	public function getFromSessionID()
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_carts WHERE dessessionid = :dessessionid", [
			':dessessionid'=>session_id()
		]);

		if (count($results) > 0) {

			$this->setData($results[0]);

		}
	}

	public static function removeFromSession(){

		$_SESSION[Cart::SESSION] = NULL;
	}	

	public function get(int $idcart)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_carts WHERE idcart = :idcart", [
			':idcart'=>$idcart
		]);

		if (count($results) > 0) {

			$this->setData($results[0]);

		}

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_cart_save(:idcart, :dessessionid, :idpess)", [
			':idcart'=>$this->getidcart(),
			':dessessionid'=>$this->getdessessionid(),
			':idpess'=>$this->getidpess()
		]);

		$this->setData($results[0]);

	}
	/*
	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_carts_save(:idcart, :dessessionid, :iduser, :idpess)", [
			':idcart'=>$this->getidcart(),
			':dessessionid'=>$this->getdessessionid(),
			':iduser'=>$this->getiduser(),
			':idpess'=>$this->getidpess()
		]);

		$this->setData($results[0]);

	}
	*/

	public function addTurma(Turma $turma)
	{

		$sql = new Sql();

		$sql->query("INSERT INTO tb_cartsturmas (idcart, idturma) VALUES(:idcart, :idturma)", [
			':idcart'=>$this->getidcart(),
			':idturma'=>$turma->getidturma()
		]);
	}
	

	public function removeTurma(Turma $turma, $all = false)
	{

		$sql = new Sql();

		if ($all) {

			$sql->query("UPDATE tb_cartsturmas SET dtremoved = NOW() WHERE idcart = :idcart AND idturma = :idturma AND dtremoved IS NULL", [
				':idcart'=>$this->getidcart(),
				':idturma'=>$turma->getidturma()
			]);

		} else {

			$sql->query("UPDATE tb_cartsturmas SET dtremoved = NOW() WHERE idcart = :idcart AND idturma = :idturma AND dtremoved IS NULL LIMIT 1", [
				':idcart'=>$this->getidcart(),
				':idturma'=>$turma->getidturma()
			]);

		}

		//$this->getCalculateTotal();

	}

	public function getTurmaTemporada()
	{

		$sql = new Sql();

		$rows = $sql->select("
			SELECT * 
			FROM tb_turmatemporada a 
			INNER JOIN tb_cartsturmas b ON b.idturma = a.idturma
			INNER JOIN tb_turma c ON c.idturma = b.idturma 
			INNER JOIN tb_temporada k ON k.idtemporada = a.idtemporada
			WHERE b.idcart = :idcart AND b.dtremoved IS NULL 
			-- GROUP BY b.idturma, b.descturma
			-- ORDER BY b.descturma
		", [
			':idcart'=>$this->getidcart()
		]);
	}

	public function getTurma()
	{
		$idStatustemporadaTemporadaIniciada = 2;
		$statusTemporadaInscricoesEncerradas = 3;
		$idStatustemporadaInscricaoIniciada = 4;
		$idStatusTemporadaMatriculaIniciada = 6;
		$idstatustemporadaMatriculaEncerrada = 5;
		$sql = new Sql();

		$rows = $sql->select("
			SELECT * 
			FROM tb_turmatemporada a 
			INNER JOIN tb_cartsturmas b ON b.idturma = a.idturma
			INNER JOIN tb_turma c ON c.idturma = a.idturma 
            INNER JOIN tb_espaco d ON d.idespaco = c.idespaco
            INNER JOIN tb_atividade e ON e.idativ = c.idativ
			INNER JOIN tb_fxetaria f ON f.idfxetaria = e.idfxetaria
			INNER JOIN tb_horario g ON g.idhorario = c.idhorario
			INNER JOIN tb_local h ON h.idlocal = d.idlocal
			INNER JOIN tb_users i ON i.iduser = a.iduser
			INNER JOIN tb_persons j ON j.idperson = i.idperson
			INNER JOIN tb_temporada k ON k.idtemporada = a.idtemporada
            INNER JOIN tb_statustemporada l ON l.idstatustemporada = k.idstatustemporada
            -- INNER JOIN tb_tokenturma m ON m.idturma = a.idturma
            WHERE b.idcart = :idcart AND b.dtremoved IS NULL
            AND (k.idstatustemporada = :idStatustemporadaTemporadaIniciada 
            OR k.idstatustemporada = :idStatustemporadaInscricaoIniciada 
            OR k.idstatustemporada = :statusTemporadaInscricoesEncerradas 
            OR k.idstatustemporada = :idStatusTemporadaMatriculaIniciada
            OR k.idstatustemporada = :idstatustemporadaMatriculaEncerrada)          
			-- GROUP BY b.idturma, b.descturma
			-- ORDER BY b.descturma
		", [
			':idcart'=>$this->getidcart(),
			'idStatustemporadaTemporadaIniciada'=>$idStatustemporadaTemporadaIniciada,
			'idStatustemporadaInscricaoIniciada'=>$idStatustemporadaInscricaoIniciada,
			'statusTemporadaInscricoesEncerradas'=>$statusTemporadaInscricoesEncerradas,
			'idStatusTemporadaMatriculaIniciada'=>$idStatusTemporadaMatriculaIniciada,
			'idstatustemporadaMatriculaEncerrada'=>$idstatustemporadaMatriculaEncerrada
		]);

		return Turma::checkList($rows);

	}
	
	public static function getIdturmaByCart($idcart){

		$sql = new Sql();

		$results = $sql->select("
			SELECT idturma 
			FROM tb_cartsturmas 			
			WHERE idcart = :idcart
		", [
			':idcart'=>$idcart
		]);		

		return $results[0]['idturma'];
	}

	public function getPessoa()
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT * 
			FROM tb_pessoa a 
			-- INNER JOIN tb_users b ON b.iduser = a.iduser
            INNER JOIN tb_carts c ON c.idpess = a.idpess
			WHERE c.idcart = :idcart
			-- GROUP BY b.idturma, b.descturma
			-- ORDER BY b.descturma
		", [
			':idcart'=>$this->getidcart()
		]);

		if (count($results) > 0) {

			return $results[0];
		}
	}	

	public static function setError($msg)
	{
		$_SESSION[Cart::ERROR] = $msg;

	}
	public static function getError()
	{
		$msg = (isset($_SESSION[Cart::ERROR]) && $_SESSION[Cart::ERROR]) ? $_SESSION[Cart::ERROR] : '';

		Cart::clearError();

		return $msg;
	}

	public static function clearError()
	{
		$_SESSION[Cart::ERROR] = NULL;
	}

	public static function setSuccess($msg)
	{
		$_SESSION[Cart::SUCCESS] = $msg;
	}

	public static function getSuccess()
	{
		$msg = (isset($_SESSION[Cart::SUCCESS]) && $_SESSION[Cart::SUCCESS]) ? $_SESSION[Cart::SUCCESS] : '';

		Cart::clearSuccess();

		return $msg;
	}

	public static function clearSuccess()
	{

		$_SESSION[Cart::SUCCESS] = NULL;

	}


	public static function setMsgError($msg)
	{
		$_SESSION[Cart::SESSION_ERROR] = $msg;
	}

	public static function getMsgError()	{

		$msg = (isset($_SESSION[Cart::SESSION_ERROR])) ? $_SESSION[Cart::SESSION_ERROR] : "";

		Cart::clearMsgError();

		return $msg;
	}

	public static function clearMsgError()
	{
		$_SESSION[Cart::SESSION_ERROR] = NULL;
	}

	public static function setMsgSuccess($msg)
	{
		$_SESSION[Cart::SUCCESS] = $msg;
	}

	public static function getMsgSuccess()
	{
		$msg = (isset($_SESSION[Cart::SUCCESS]) && $_SESSION[Cart::SUCCESS]) ? $_SESSION[Cart::SUCCESS] : '';

		Cart::clearMsgSuccess();

		return $msg;
	}

	public static function clearMsgSuccess()
	{

		$_SESSION[Cart::SUCCESS] = NULL;

	}

	public static function cartIsEmpty($idcart)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_cartsturmas WHERE idcart = :idcart AND dtremoved IS NULL", [
			':idcart'=>$idcart
		]);

		return (count($results) > 0);

	}	

	public function getCartsTurmasFromId($idcart)
	{

		$sql = new Sql();

		$rows = $sql->select(
			"SELECT * FROM tb_cartsturmas
			INNER JOIN 	tb_carts USING(idcart)
			
			WHERE idcart = :idcart ", [
			':idcart'=>$idcart
		]);

		return $rows;
	}
	
	public function getCountInscExistTemporada($numcpf, $idtemporada) {

		$sql = new Sql();

		$results = $sql->select(
			"SELECT count(*) FROM tb_insc a
			INNER JOIN tb_carts b USING(idcart)
			INNER JOIN tb_pessoa c USING(idpess)
			INNER JOIN tb_temporada h USING(idtemporada)  
            WHERE a.idinscstatus != 8 
            AND a.idinscstatus != 9
			AND c.numcpf = :numcpf 
            AND h.idtemporada = :idtemporada            
			", [
			':numcpf'=>$numcpf,
			':idtemporada'=>$idtemporada
		]);
		return $results[0]['count(*)'];

		if(count($results) === 0)
		{
			throw new \Exception("Esta pessoa já tem mais de uma inscrição para esta temporada!", 1);	
		}
	}

	public function getInscExist($numcpf, $idpess, $idturma, $idtemporada) {

		$sql = new Sql();

		$results = $sql->select(
			"SELECT * FROM tb_insc a
			INNER JOIN tb_carts b USING(idcart)
			INNER JOIN tb_pessoa c USING(idpess)
			INNER JOIN tb_turma d USING(idturma)  
			INNER JOIN tb_espaco e USING(idespaco)  
			INNER JOIN tb_local f USING(idlocal)  
			INNER JOIN tb_atividade g USING(idativ)    
			INNER JOIN tb_temporada h USING(idtemporada)  
            WHERE a.idinscstatus != 8 
            AND a.idinscstatus != 9
			AND c.numcpf = :numcpf 
            -- AND c.idpess = :idpess
            AND d.idturma = :idturma      
            AND h.idtemporada = :idtemporada            
			", [
			':numcpf'=>$numcpf,
			//':idpess'=>$idpess,
			'idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);

		return $results;

		if(count($results) === 0)
		{
			throw new \Exception("Esta pessoa já está inscrita nesta turma!", 1);			
		}

	}
	
	public function getInscDesistenteExist($numcpf, $idpess, $idturma, $idtemporada) {

		$sql = new Sql();

		$results = $sql->select(
			"SELECT * FROM tb_insc a
			INNER JOIN tb_carts b USING(idcart)
			INNER JOIN tb_pessoa c USING(idpess)
			INNER JOIN tb_turma d USING(idturma)  
			INNER JOIN tb_espaco e USING(idespaco)  
			INNER JOIN tb_local f USING(idlocal)  
			INNER JOIN tb_atividade g USING(idativ)    
			INNER JOIN tb_temporada h USING(idtemporada)  
            WHERE a.idinscstatus = 8 
			AND c.numcpf = :numcpf 
            -- AND c.idpess = :idpess
            AND d.idturma = :idturma      
            AND h.idtemporada = :idtemporada            
			", [
			':numcpf'=>$numcpf,
			//':idpess'=>$idpess,
			'idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);

		return $results;

		if(count($results) === 0)
		{
			throw new \Exception("Esta pessoa já está inscrita nesta turma!", 1);			
		}

	}

	public function getInscExistAquaticLocal($numcpf, $idpess, $idturma, $idtemporada, $idlocal, $tipoativ) {
	    
		$sql = new Sql();

		$results = $sql->select(
			"SELECT * FROM tb_insc a
			INNER JOIN tb_carts b USING(idcart)
			INNER JOIN tb_pessoa c USING(idpess)
			INNER JOIN tb_turma d USING(idturma)  
			INNER JOIN tb_espaco e USING(idespaco)  
			INNER JOIN tb_local f USING(idlocal)  
			INNER JOIN tb_atividade g USING(idativ)    
			INNER JOIN tb_temporada h USING(idtemporada)  
            WHERE a.idinscstatus != 8 
            AND a.idinscstatus != 9
			AND c.numcpf = :numcpf
			-- AND c.idpess = :idpess
			AND f.idlocal = :idlocal 
            AND g.tipoativ = :tipoativ
            AND h.idtemporada = :idtemporada
            ", [
			':numcpf'=>$numcpf,
			// ':idpess'=>$idpess,
			':idlocal'=>$idlocal,
			':tipoativ'=>$tipoativ,
			':idtemporada'=>$idtemporada
		]);

		return $results;

		if(count($results) === 0)
		{
			throw new \Exception("Esta pessoa já está inscrita para uma turma do tipo AQUÁTICA neste local", 1);			
		}

	}
	
}

 ?>