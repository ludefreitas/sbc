<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Espaco extends Model {

	const SESSION = "Espaco";
	const SESSION_ERROR = "EspacoError";

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("
			SELECT * 
			FROM tb_espaco
			INNER JOIN tb_local
			using(idlocal)
			ORDER BY nomeespaco, apelidolocal");

	}	

	public static function checkList($list)
	{

		foreach ($list as &$row) {
			
			$p = new Espaco();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}
	
	// esta função é usada para salvar e editar Espaço
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_espaco_save(:idespaco, :idlocal, :nomeespaco, :descespaco, :observacao, :areaespaco)", array(
			":idespaco"=>$this->getidespaco(),
			":idlocal"=>$this->getidlocal(),
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

		if($results){

			$this->setData($results[0]);		

		}else{

			Espaco::setMsgError("Espaço selecionado não encontrado!");
			header("Location: /professor/espaco");
			exit();			
		}		
		
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
	/*
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
	*/

	/*
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
	

	public function checkPhoto()
	{

		if (file_exists(
			$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"img" . DIRECTORY_SEPARATOR . 
			"turma" . DIRECTORY_SEPARATOR . 
			$this->getidproduct() . ".jpg"
			)) {

			$url = "/res/site/img/turma/" . $this->getidproduct() . ".jpg";

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
			$this->getidproduct() . ".jpg";

		imagejpeg($image, $dist);

		imagedestroy($image);

		$this->checkPhoto();

	}
	*/
	public static function getPage($page = 1, $itemsPerPage = 5)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_espaco a
			-- INNER JOIN tb_horario b
			-- USING (idhorario)
			INNER JOIN tb_local c
			USING (idlocal)
			ORDER BY a.nomeespaco
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
			FROM tb_espaco a
			-- INNER JOIN tb_horario b
			-- USING (idhorario) 
			INNER JOIN tb_local c
			USING (idlocal)
			WHERE a.nomeespaco LIKE :search 
			OR a.descespaco LIKE :search 
			OR a.areaespaco LIKE :search
			-- OR b.diasemana LIKE :search	
			-- OR b.horainicio LIKE :search			
			-- OR b.horatermino LIKE :search
			OR c.apelidolocal LIKE :search										
			ORDER BY nomeespaco
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

	public static function setMsgError($msg)
	{
		$_SESSION[Espaco::SESSION_ERROR] = $msg;
	}

	public static function getMsgError(){

		$msg = (isset($_SESSION[Espaco::SESSION_ERROR])) ? $_SESSION[Espaco::SESSION_ERROR] : "";

		Espaco::clearMsgError();

		return $msg;
	}

	public static function clearMsgError()
	{
		$_SESSION[Espaco::SESSION_ERROR] = NULL;
	}

	public static function setMsgSuccess($msg)
	{
		$_SESSION[Espaco::SUCCESS] = $msg;
	}

	public static function getMsgSuccess()
	{
		$msg = (isset($_SESSION[Espaco::SUCCESS]) && $_SESSION[Espaco::SUCCESS]) ? $_SESSION[Espaco::SUCCESS] : '';

		Espaco::clearMsgSuccess();

		return $msg;
	}

	public static function clearMsgSuccess()
	{

		$_SESSION[Espaco::SUCCESS] = NULL;

	}



}
?>