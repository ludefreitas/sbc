<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;

class TurmaStatus extends Model {

	//const "COMPLETA" = 1;		
	//const "NAO HA VAGAS" = 2;
	//const "NAO INICIADA" = 3;
	//const "EXCLUIDA" = 4;
	//const "INICIADA" = 6;	
	//const "MATRICULA EM ANDAMENTO" = 7;


	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_turmastatus ORDER BY desstatus");

	}

	public function get($idturmastatus)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_turmastatus WHERE idturmastatus = :idturmastatus", [
			':idturmastatus'=>$idturmastatus 
		]);

		$this->setData($results[0]);
		
	}

}

?>