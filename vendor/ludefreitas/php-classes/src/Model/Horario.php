<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Horario extends Model {


	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_horario ORDER BY diasemana, horainicio");
	}	

	// esta função é usada para salvar e editar Horario
	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_horario_save(:idhorario, :horainicio, :horatermino, :diasemana, :periodo)", array(
			":idhorario"=>$this->getidhorario(),
			":horainicio"=>$this->gethorainicio(),
			":horatermino"=>$this->gethoratermino(),
			":diasemana"=>$this->getdiasemana(),
			":periodo"=>$this->getperiodo()
		));

		$this->setData($results[0]);

		Horario::updateFile();

	}
	
	public function get($idhorario)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_horario WHERE idhorario = :idhorario", [
			':idhorario'=>$idhorario 
		]);

		$this->setData($results[0]);
		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_horario WHERE idhorario = :idhorario", [
			':idhorario'=>$this->getidhorario()
		]);		

		Horario::updateFile();
	}

	// atualiza lista de faixa etária no site (no rodapé) horario-menu.html
	public static function updateFile()	
	{
		$horario = Horario::listAll();

		$html = [];

		foreach ($horario as $row) {
			array_push($html, '<li><a href="/horario/'.$row['idhorario'].'">'.$row['horainicio'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."horario-menu.html", implode('', $html));
	}

}


?>