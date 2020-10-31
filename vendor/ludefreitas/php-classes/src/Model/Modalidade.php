<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Modalidade extends Model {


	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_modalidade			
			ORDER BY descmodal");
	}	

	public static function checkList($list)
	{

		foreach ($list as &$row) {
			
			$p = new Modalidade();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}
	// esta função é usada para salvar e editar Atividade
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_modalidade_save(:idmodal, :descmodal)", array(
			":idmodal"=>$this->getidmodal(),
			":descmodal"=>$this->getdescmodal()
		));

		$this->setData($results[0]);

		Modalidade::updateFile();

	}

	public function get($idmodal)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_modalidade WHERE idmodal = :idmodal", [
			':idmodal'=>$idmodal 
		]);

		if (count($results) > 0) {

			$this->setData($results[0]);

		}		
		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_modalidade WHERE idmodal = :idmodal", [
			':idmodal'=>$this->getidmodal()
		]);		

		Modalidade::updateFile();
	}

	// atualiza lista de Atividade no site (no rodapé) Modalidade-menu.html
	public static function updateFile()	
	{
		$modalidade = Modalidade::listAll();

		$html = [];

		foreach ($modalidade as $row) {
			array_push($html, '<li><a href="/modalidade/'.$row['idmodal'].'">'.$row['descmodal'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."modalidade-menu.html", implode('', $html));
	}

	public function getFromId($idmodal)
	{

		$sql = new Sql();

		$rows = $sql->select("SELECT * FROM tb_modalidade WHERE idmodal = :idmodal LIMIT 1", [
			':idmodal'=>$idmodal
		]);

		if (count($results) > 0) {

			$this->setData($results[0]);

		}		

	}

}


?>