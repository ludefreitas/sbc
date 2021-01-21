<?php 

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;

class InscStatus extends Model {

	const CANCELADA = 1;
	const NAO_SORTEADA = 2;
	const SORTEADA = 3;
	const AGURADANDO_MATRICULA = 4;
	const SUSPENSA = 5;
	const REMOVIDA = 6;
	const AGUARDANDO_SORTEIO = 7;
	
}

?>