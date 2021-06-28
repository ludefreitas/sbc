<?php 

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;

class InscStatus extends Model {

	const MATRICULADA = 1;
	const AGURADANDO_MATRICULA = 2;
	const SORTEADA = 3;
	const NAO_SORTEADA = 4;
	const SUSPENSA = 5;
	const CANCELADA = 6;
	const AGUARDANDO_SORTEIO = 7;
	
}

?>