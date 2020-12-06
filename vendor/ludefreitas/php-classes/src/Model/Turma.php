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
			INNER JOIN tb_persons c
			using(idperson)
			INNER JOIN tb_atividade d
			using(idativ)
			INNER JOIN tb_espaco e
			using(idespaco)
			INNER JOIN tb_horario f
			using(idhorario)
			INNER JOIN tb_local g
			using(idlocal)
			INNER JOIN tb_turmastatus h
			using(idturmastatus)
			INNER JOIN tb_horario i
			using(idhorario)
			INNER JOIN tb_fxetaria j
			using(idfxetaria)
			INNER JOIN tb_modalidade k         
			using(idmodal)            
			ORDER BY a.descturma");
	}

	public static function listAllTurmaTemporada()
	{
		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_turma a 
			INNER JOIN tb_users b
			using(iduser)
			INNER JOIN tb_persons c
			using(idperson)
			INNER JOIN tb_atividade d
			using(idativ)
			INNER JOIN tb_espaco e
			using(idespaco)
			INNER JOIN tb_local f
			using(idlocal)
			INNER JOIN tb_turmastatus g
			using(idturmastatus)
			INNER JOIN tb_horario h
			using(idhorario)
			INNER JOIN tb_fxetaria i
			using(idfxetaria)
            INNER JOIN tb_turmatemporada j            
			using(idturma)
            INNER JOIN tb_temporada k          
			using(idtemporada)   
            INNER JOIN tb_statustemporada l          
			using(idstatustemporada)
			INNER JOIN tb_modalidade m         
			using(idmodal)
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
		$results = $sql->select("CALL sp_turma_save(:idturma, :idativ, :idmodal, :idespaco, :idhorario, :iduser, :idturmastatus, :descturma, :vagas, :numinscritos)", array(
			":idturma"=>$this->getidturma(),			
			":idativ"=>$this->getidativ(),
			":idmodal"=>$this->getidmodal(),
			":idespaco"=>$this->getidespaco(),
			":idhorario"=>$this->getidhorario(),
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
			INNER JOIN tb_modalidade i        
			using(idmodal)
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
			INNER JOIN tb_modalidade USING(idmodal)
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
			INNER JOIN tb_horario e ON a.idhorario = e.idhorario 
 			WHERE b.idturma = :idturma
		", [
			':idturma'=>$this->getidturma()
		]);

	}

	public static function getPage($page = 1, $itemsPerPage = 8)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS * 
			FROM tb_turma a 
			INNER JOIN tb_users b
			using(iduser)
			INNER JOIN tb_persons c
			using(idperson)
			INNER JOIN tb_atividade d
			using(idativ)
			INNER JOIN tb_espaco e
			using(idespaco)
			INNER JOIN tb_local f
			using(idlocal)
			INNER JOIN tb_turmastatus g
			using(idturmastatus)
			INNER JOIN tb_horario h
			using(idhorario)
			INNER JOIN tb_fxetaria i
			using(idfxetaria)
            -- INNER JOIN tb_turmatemporada j            
			-- using(idturma)
            -- INNER JOIN tb_temporada k          
			-- using(idtemporada)   
            -- INNER JOIN tb_statustemporada l          
			-- using(idstatustemporada)
			 INNER JOIN tb_modalidade m         
			 using(idmodal)
      		-- WHERE idstatustemporada = 3
			ORDER BY a.descturma
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	
	public static function getPageSearch($search, $page = 1, $itemsPerPage = 5)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_turma a 
			INNER JOIN tb_users b
			USING(iduser)
			INNER JOIN tb_persons c
			USING(idperson)
			INNER JOIN tb_atividade d
			USING(idativ)
			INNER JOIN tb_espaco e
			USING(idespaco)
			INNER JOIN tb_local f
			USING(idlocal)
			INNER JOIN tb_turmastatus g
			USING(idturmastatus)
			INNER JOIN tb_horario h
			USING(idhorario)
			INNER JOIN tb_fxetaria i
			USING(idfxetaria) 
			-- INNER JOIN tb_turmatemporada j
			-- USING(idturma)
            -- INNER JOIN tb_temporada k
            -- USING(idtemporada)   
            -- INNER JOIN tb_statustemporada l
            -- USING(idstatustemporada)
            INNER JOIN tb_modalidade m
            USING(idmodal)
      		WHERE a.descturma LIKE :search 
			OR b.deslogin LIKE :search
			OR c.desperson LIKE :search
			OR d.descativ LIKE :search
			OR a.nomeativ LIKE :search 
			OR e.nomeespaco LIKE :search
			OR f.apelidolocal LIKE :search
			OR g.desstatus LIKE :search
			OR h.horainicio LIKE :search
			OR h.periodo LIKE :search
			OR i.descrfxetaria LIKE :search	
			OR m.descmodal LIKE :search													
			ORDER BY a.descturma
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

}

?>