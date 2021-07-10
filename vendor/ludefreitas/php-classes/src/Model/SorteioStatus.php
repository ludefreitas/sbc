<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;

class SorteioStatus extends Model {

	const NAO_INICIADO = 1;
	const FINALIZADO = 2;
	const CANCELADO = 3;

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_sorteiostatus ORDER BY desstatus");

	}

}

?>
