<?php 

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;

class InscStatus extends Model {

	const MATRICULADA = 1;
	const AGUARDANDO_MATRICULA = 2;
	const SORTEADA = 3;
	const NAO_SORTEADA = 4;
	const SUSPENSA = 5;	
	const AGUARDANDO_SORTEIO = 6;
	const CANCELADA = 7;
	
}

?>