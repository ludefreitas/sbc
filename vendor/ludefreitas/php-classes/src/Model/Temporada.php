<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Temporada extends Model {


	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("
			SELECT * 
			FROM tb_temporada
			INNER JOIN tb_statustemporada
			using(idstatustemporada)
			ORDER BY desctemporada");
	}	
	
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_temporada_save (:idtemporada, :desctemporada, :idstatustemporada, :dtinicinscricao, :dtterminscricao, :dtinicmatricula, :dttermmatricula)", array(
			":idtemporada"=>$this->getidtemporada(),
			":desctemporada"=>$this->getdesctemporada(),
			":idstatustemporada"=>$this->getidstatustemporada(),
			":dtinicinscricao"=>$this->getdtinicinscricao(),
			":dtterminscricao"=>$this->getdtterminscricao(),
			":dtinicmatricula"=>$this->getdtinicmatricula(),
			":dttermmatricula"=>$this->getdttermmatricula()
		));

		$this->setData($results[0]);

		Temporada::updateFile();
	}

	public function get($idtemporada)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_temporada WHERE idtemporada = :idtemporada", [
			':idtemporada'=>$idtemporada 
		]);

		$this->setData($results[0]);		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_temporada WHERE idtemporada = :idtemporada", [
			':idtemporada'=>$this->getidtemporada()
		]);		

		Temporada::updateFile();
	}

	// atualiza lista de temporada no site (no rodapé) temporada-menu.html
	public static function updateFile()	
	{
		$temporada = Temporada::listAll();

		$html = [];

		foreach ($temporada as $row) {
			array_push($html, '<li><a href="/temporada/'.$row['idtemporada'].'">'.$row['desctemporada'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."temporada-menu.html", implode('', $html));
	}

	public function getTurma($related = true)
	{
		$sql = new Sql();

		if ($related === true) {

			return $sql->select("
				SELECT * FROM tb_turma
				INNER JOIN tb_modalidade 
				using(idmodal)
                INNER JOIN tb_espaco 
				using(idespaco)
                INNER JOIN tb_users 
				using(iduser) 
				INNER JOIN tb_local 
				using(idlocal)
				INNER JOIN tb_horario 
				using(idhorario)				
					WHERE idturma IN(
					SELECT a.idturma
					FROM tb_turma a
					INNER JOIN tb_turmatemporada b ON a.idturma = b.idturma
					WHERE b.idtemporada = :idtemporada ORDER BY a.descturma
				);
			", [
				':idtemporada'=>$this->getidtemporada()
			]);

		} else {

			return $sql->select("
				SELECT * FROM tb_turma
				INNER JOIN tb_modalidade 
				using(idmodal)
                INNER JOIN tb_espaco 
				using(idespaco)
                INNER JOIN tb_users 
				using(iduser) 	
				INNER JOIN tb_local 
				using(idlocal) 
				INNER JOIN tb_horario 
				using(idhorario)							
				WHERE idturma NOT IN(
					SELECT a.idturma
					FROM tb_turma a
					INNER JOIN tb_turmatemporada b ON a.idturma = b.idturma
					WHERE b.idtemporada = :idtemporada ORDER BY a.descturma
				);
			", [
				':idtemporada'=>$this->getidtemporada()
			]);
		}		
	}

	public function addTurma(Turma $turma)
	{

		$sql = new Sql();

		$sql->query("INSERT INTO tb_turmatemporada (idtemporada, idturma) VALUES(:idtemporada, :idturma)", [
			':idtemporada'=>$this->getidtemporada(),
			':idturma'=>$turma->getidturma()
		]);

	}

	public function removeTurma(Turma $turma)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_turmatemporada WHERE idtemporada = :idtemporada AND idturma = :idturma", [
			':idtemporada'=>$this->getidtemporada(),
			':idturma'=>$turma->getidturma()
		]);

	}


}
?>