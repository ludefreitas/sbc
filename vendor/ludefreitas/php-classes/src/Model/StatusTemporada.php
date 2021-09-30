<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class StatusTemporada extends Model {

	const TEMPORADA_NAO_INICIADA = 1;
	const TEMPORADA_INICIADA = 2;
	const INSCRICOES_ENCERRADAS = 3;
	const INSCRICOES_INICIADAS = 4;
	const MATRICULAS_ENCERRADAS = 5;
	const MATRICULAS_INICIADAS = 6;	
	const TEMPORADA_SUSPENSA = 7;
	const TEMPORADA_ENCERRADA = 8;	

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("
			SELECT * 
			FROM tb_statustemporada
			ORDER BY idstatustemporada");
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