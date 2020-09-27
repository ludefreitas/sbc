<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Faixaetaria extends Model {


	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_fxetaria ORDER BY descrfxetaria");
	}	

	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_faixaetaria_save(:idfxetaria, :descrfxetaria, :initidade, :fimidade)", array(
			":idfxetaria"=>$this->getidfxetaria(),
			":descrfxetaria"=>$this->getdescrfxetaria(),
			":initidade"=>$this->getinitidade(),
			":fimidade"=>$this->getfimidade()
		));

		$this->setData($results[0]);

	}

	public function get($idfxetaria)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * 
			FROM tb_fxetaria 
			WHERE idfxetaria = :idfxetaria", 
			[':idfxetaria'=>$idfxetaria 
		]);

		$this->setData($results[0]);
		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_fxetaria WHERE idfxetaria = :idfxetaria", [
			':idfxetaria'=>$this->getidfxetaria()
		]);

		
	}

}

?>