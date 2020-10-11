<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Espaco extends Model {


	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("
			SELECT * 
			FROM tb_espaco
			INNER JOIN tb_local
			using(idlocal)
			INNER JOIN tb_horario
			using(idhorario)
			ORDER BY nomeespaco, diasemana, horainicio");

	}	
	
	// esta função é usada para salvar e editar Espaço
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_espaco_save(:idespaco, :idlocal, :idhorario, :nomeespaco, :descespaco, :observacao, :areaespaco)", array(
			":idespaco"=>$this->getidespaco(),
			":idlocal"=>$this->getidlocal(),
			":idhorario"=>$this->getidhorario(),
			":nomeespaco"=>$this->getnomeespaco(),
			":descespaco"=>$this->getdescespaco(),
			":observacao"=>$this->getobservacao(),
			":areaespaco"=>$this->getareaespaco()
		));

		$this->setData($results[0]);

		Espaco::updateFile();

	}

	public function get($idespaco)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_espaco WHERE idespaco = :idespaco", [
			':idespaco'=>$idespaco 
		]);

		$this->setData($results[0]);
		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_espaco WHERE idespaco = :idespaco", [
			':idespaco'=>$this->getidespaco()
		]);		

		Espaco::updateFile();
	}

	// atualiza lista de espaco no site (no rodapé) espaco-menu.html
	public static function updateFile()	
	{
		$espaco = Espaco::listAll();

		$html = [];

		foreach ($espaco as $row) {
			array_push($html, '<li><a href="/espaco/'.$row['idespaco'].'">'.$row['nomeespaco'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."espaco-menu.html", implode('', $html));
	}

	public function getHorario($related = true)
	{
		$sql = new Sql();

		if ($related === true) {

			return $sql->select("
				SELECT * FROM tb_horario WHERE idhorario IN(
					SELECT a.idhorario
					FROM tb_horario a
					INNER JOIN tb_horarioespaco b ON a.idhorario = b.idhorario
					WHERE b.idespaco = :idespaco ORDER BY a.diasemana
				);
			", [
				':idespaco'=>$this->getidespaco()
			]);

		} else {

			return $sql->select("
				SELECT * FROM tb_horario WHERE idhorario NOT IN(
					SELECT a.idhorario
					FROM tb_horario a
					INNER JOIN tb_horarioespaco b ON a.idhorario = b.idhorario
					WHERE b.idespaco = :idespaco ORDER BY a.diasemana
				);
			", [
				':idespaco'=>$this->getidespaco()
			]);
		}

		
	}

	public function addHorario(Horario $horario)
	{

		$sql = new Sql();

		$sql->query("INSERT INTO tb_horarioespaco (idespaco, idhorario) VALUES(:idespaco, :idhorario)", [
			':idespaco'=>$this->getidespaco(),
			':idhorario'=>$horario->getidhorario()
		]);

	}

	public function removeHorario(Horario $horario)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_horarioespaco WHERE idespaco = :idespaco AND idhorario = :idhorario", [
			':idespaco'=>$this->getidespaco(),
			':idhorario'=>$horario->getidhorario()
		]);

	}


}
?>