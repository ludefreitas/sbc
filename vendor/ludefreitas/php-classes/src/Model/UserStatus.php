<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;

class UserStatus extends Model {

	const INATIVO = 0;
	const ATIVO = 1;

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_userstatus ORDER BY desstatus");
	}

}

?>