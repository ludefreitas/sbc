<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class CartsTurmas extends Model {


	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_cartsturmas ORDER BY idcartsturmas");
	}	

	public function get($idcartsturmas)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_cartsturmas WHERE idcartsturmas = :idcartsturmas", [':idcartsturmas'=>$idcartsturmas 
		]);

		$this->setData($results[0]);
		
	}

	public static function getCartsTurmasFromId($idcart)
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