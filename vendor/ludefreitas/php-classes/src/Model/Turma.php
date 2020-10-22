<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Turma extends Model {

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_turma a 
			INNER JOIN tb_users b
			using(iduser)
			INNER JOIN tb_persons i
			using(idperson)
			INNER JOIN tb_atividade c
			using(idativ)
			INNER JOIN tb_espaco d
			using(idespaco)
			INNER JOIN tb_local e
			using(idlocal)
			INNER JOIN tb_turmastatus f
			using(idturmastatus)
			INNER JOIN tb_horario g
			using(idhorario)
			INNER JOIN tb_fxetaria h
			using(idfxetaria)            
			ORDER BY a.descturma");
	}

	public static function listAllTurmaTemporada()
	{
		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_turma a 
			INNER JOIN tb_users b
			using(iduser)
			INNER JOIN tb_persons l
			using(idperson)
			INNER JOIN tb_atividade c
			using(idativ)
			INNER JOIN tb_espaco d
			using(idespaco)
			INNER JOIN tb_local e
			using(idlocal)
			INNER JOIN tb_turmastatus f
			using(idturmastatus)
			INNER JOIN tb_horario g
			using(idhorario)
			INNER JOIN tb_fxetaria h
			using(idfxetaria)
            INNER JOIN tb_turmatemporada i            
			using(idturma)
            INNER JOIN tb_temporada j           
			using(idtemporada)   
            INNER JOIN tb_statustemporada k          
			using(idstatustemporada)
      		WHERE idstatustemporada = 3
			ORDER BY a.descturma");
	}


	public static function checkList($list)
	{

		foreach ($list as &$row) {
			
			$p = new Turma();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}


	// esta função é usada para salvar e editar turma
	public function save()
	{
		$sql = new Sql();
		$results = $sql->select("CALL sp_turma_save(:idturma, :idativ, :idespaco, :iduser, :idturmastatus, :descturma, :vagas, :numinscritos)", array(
			":idturma"=>$this->getidturma(),
			":idativ"=>$this->getidativ(),
			":idespaco"=>$this->getidespaco(),
			":iduser"=>$this->getiduser(),
			":idturmastatus"=>$this->getidturmastatus(),
			":descturma"=>$this->getdescturma(),
			":vagas"=>$this->getvagas(),
			":numinscritos"=>$this->getnuminscritos(),
		));	

		$this->setData($results[0]);

		Turma::updateFile();
	}

	public function get($idturma)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * 
			FROM tb_turma a 
			INNER JOIN tb_users b
			using(iduser)
			INNER JOIN tb_atividade c
			using(idativ)
			INNER JOIN tb_espaco d
			using(idespaco)
			INNER JOIN tb_local e
			using(idlocal)
			INNER JOIN tb_turmastatus f
			using(idturmastatus)
			INNER JOIN tb_horario g
			using(idhorario)			
			INNER JOIN tb_fxetaria h
			using(idfxetaria)
			WHERE idturma = :idturma", [
			':idturma'=>$idturma 
		]);

		$this->setData($results[0]);		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_turma WHERE idturma = :idturma", [
			':idturma'=>$this->getidturma()
		]);		

		Turma::updateFile();
	}

	// atualiza lista de turma no site (no rodapé) turma-menu.html
	public static function updateFile()	
	{
		$turma = Turma::listAll();

		$html = [];

		foreach ($turma as $row) {
			array_push($html, '<li><a href="/turma/'.$row['idturma'].'">'.$row['descturma'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."turma-menu.html", implode('', $html));
	}
	/*
	public function getTurmaPage($page = 1, $itemsPerPage = 3)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
			FROM tb_turma a
			INNER JOIN tb_turmatemporada b ON a.idturma = b.idturma
            INNER JOIN tb_espaco c ON c.idespaco = a.idespaco
            INNER JOIN tb_horario d ON c.idhorario = d.idhorario
            INNER JOIN tb_atividade e ON a.idativ = e.idativ
            INNER JOIN tb_fxetaria f ON e.idfxetaria = f.idfxetaria
			INNER JOIN tb_users g ON a.iduser = g.iduser
			INNER JOIN tb_persons h ON g.idperson = h.idperson
            INNER JOIN tb_espaco i ON a.idespaco = i.idespaco
			INNER JOIN tb_local j ON j.idlocal = c.idlocal
			WHERE j.idlocal = :idlocal
			LIMIT $start, $itemsPerPage;
			
		", [
			':idlocal'=>$this->getidlocal()
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>Turma::checkList($results),
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];
	}
	*/

	public function checkPhoto()
	{

		if (file_exists(
			$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"img" . DIRECTORY_SEPARATOR . 
			"turma" . DIRECTORY_SEPARATOR . 
			$this->getidturma() . ".jpg"
			)) {

			$url = "/res/site/img/turma/" . $this->getidturma() . ".jpg";

		} else {

			$url = "/res/site/img/turma.jpg";

		}

		return $this->setdesphoto($url);

	}

	public function getValues()
	{

		$this->checkPhoto();

		$values = parent::getValues();

		return $values;

	}

	public function setPhoto($file)
	{

		$extension = explode('.', $file['name']);
		$extension = end($extension);

		switch ($extension) {

			case "jpg":
			case "jpeg":
			$image = imagecreatefromjpeg($file["tmp_name"]);
			break;

			case "gif":
			$image = imagecreatefromgif($file["tmp_name"]);
			break;

			case "png":
			$image = imagecreatefrompng($file["tmp_name"]);
			break;

		}

		$dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"img" . DIRECTORY_SEPARATOR . 
			"turma" . DIRECTORY_SEPARATOR . 
			$this->getidturma() . ".jpg";

		imagejpeg($image, $dist);

		imagedestroy($image);

		$this->checkPhoto();

	}

	public function getFromId($idturma)
	{

		$sql = new Sql();

		$rows = $sql->select(
			"SELECT * FROM tb_turma 
			INNER JOIN 	tb_users USING(iduser)
			INNER JOIN 	tb_persons USING(idperson)	
			INNER JOIN tb_atividade USING(idativ) 
			INNER JOIN tb_fxetaria USING(idfxetaria)
			INNER JOIN tb_espaco USING(idespaco) 
			INNER JOIN tb_horario USING(idhorario) 
			INNER JOIN tb_local USING(idlocal) 
			WHERE idturma = :idturma LIMIT 1", [
			':idturma'=>$idturma
		]);

		$this->setData($rows[0]);

	}

	public function getLocal()
	{
		$sql = new Sql();

		return $sql->select("
			SELECT * FROM tb_local a 
			INNER JOIN tb_espaco b ON a.idlocal = b.idlocal 
			INNER JOIN tb_turma c ON b.idespaco = c.idespaco 
			INNER JOIN tb_atividade d ON c.idativ = d.idativ 
 			WHERE b.idturma = :idturma
		", [
			':idturma'=>$this->getidturma()
		]);

	}

}

?>