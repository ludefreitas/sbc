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

		$results = $sql->select("CALL sp_carts_save(:idcart, :dessessionid, :iduser, :idpess)", [
			':idcart'=>$this->getidcart(),
			':dessessionid'=>$this->getdessessionid(),
			':iduser'=>$this->getiduser(),
			':idpess'=>$this->getidpess()
		]);

		$this->setData($results[0]);

	}

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

		$this->getCalculateTotal();

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

		$sql = new Sql();

		$rows = $sql->select("
			SELECT * 
			FROM tb_turmatemporada a 
			INNER JOIN tb_cartsturmas b ON b.idturma = a.idturma
			INNER JOIN tb_turma c ON c.idturma = b.idturma 
            INNER JOIN tb_espaco d ON d.idespaco = c.idespaco
            INNER JOIN tb_atividade e ON e.idativ = c.idativ
			INNER JOIN tb_fxetaria f ON f.idfxetaria = e.idfxetaria
			INNER JOIN tb_horario g ON g.idhorario = c.idhorario
			INNER JOIN tb_local h ON h.idlocal = d.idlocal
			INNER JOIN tb_users i ON i.iduser = c.iduser
			INNER JOIN tb_persons j ON j.idperson = i.idperson
			INNER JOIN tb_temporada k ON k.idtemporada = a.idtemporada
			WHERE b.idcart = :idcart AND b.dtremoved IS NULL 
			-- GROUP BY b.idturma, b.descturma
			-- ORDER BY b.descturma
		", [
			':idcart'=>$this->getidcart()
		]);

		return Turma::checkList($rows);

	}

	public function getPessoa()
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT * 
			FROM tb_pessoa a 
			INNER JOIN tb_users b ON b.iduser = a.iduser
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




}

 ?>