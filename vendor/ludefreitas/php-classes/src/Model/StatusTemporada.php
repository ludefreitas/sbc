<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class StatusTemporada extends Model {

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("
			SELECT * 
			FROM tb_statustemporada
			ORDER BY descstatustemporada");
	}		
	

	public function get($idstatustemporada)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_statustemporada WHERE idstatustemporada = :idstatustemporada", [
			':idstatustemporada'=>$idstatustemporada 
		]);

		$this->setData($results[0]);		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_statustemporada WHERE idstatustemporada = :idstatustemporada", [
			':idstatustemporada'=>$this->getidstatustemporada()
		]);		
	}
}

?>