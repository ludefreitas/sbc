<?php 

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;
use \Sbc\Model\User;

class Cart extends Model {

	const SESSION = "Cart";
	const SESSION_ERROR = "CartError";

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

	public function getTurma()
	{

		$sql = new Sql();

		$rows = $sql->select("
			SELECT * 
			FROM tb_cartsturmas a 
			INNER JOIN tb_turma b ON a.idturma = b.idturma 
            INNER JOIN tb_espaco c ON c.idespaco = b.idespaco
            INNER JOIN tb_atividade d ON d.idativ = b.idativ
			INNER JOIN tb_fxetaria e ON e.idfxetaria = d.idfxetaria
			INNER JOIN tb_horario f ON f.idhorario = c.idhorario
			INNER JOIN tb_local g ON g.idlocal = c.idlocal
			INNER JOIN tb_users h ON h.iduser = b.iduser
			INNER JOIN tb_persons i ON i.idperson = h.idperson
			WHERE a.idcart = :idcart AND a.dtremoved IS NULL 
			-- GROUP BY b.idturma, b.descturma
			-- ORDER BY b.descturma
		", [
			':idcart'=>$this->getidcart()
		]);

		return Turma::checkList($rows);

	}
	

	public static function setMsgError($msg)
	{

		$_SESSION[Cart::SESSION_ERROR] = $msg;

	}

	public static function getMsgError()
	{

		$msg = (isset($_SESSION[Cart::SESSION_ERROR])) ? $_SESSION[Cart::SESSION_ERROR] : "";

		Cart::clearMsgError();

		return $msg;

	}

	public static function clearMsgError()
	{

		$_SESSION[Cart::SESSION_ERROR] = NULL;

	}	

	
	

}

 ?>