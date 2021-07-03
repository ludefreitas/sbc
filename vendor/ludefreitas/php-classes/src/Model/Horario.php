<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Horario extends Model {

	const SESSION = "Horario";
	const SESSION_ERROR = "HorarioError";

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_horario ORDER BY diasemana, horainicio, horatermino");
	}	

	public static function checkList($list)
	{

		foreach ($list as &$row) {
			
			$p = new Horario();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

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

		if($results){

			$this->setData($results[0]);		

		}else{

			Horario::setMsgError("Horario selecionado não encontrado!");
			header("Location: /professor/horario");
			exit();			
		}				
		
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

	public static function getPage($page = 1, $itemsPerPage = 8)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_horario
			ORDER BY diasemana
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearch($search, $page = 1, $itemsPerPage = 8)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS * 
			FROM tb_horario 
			WHERE diasemana LIKE :search 
			OR horainicio LIKE :search 
			OR horatermino LIKE :search
			OR periodo LIKE :search			
			ORDER BY diasemana
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
		$_SESSION[Horario::SESSION_ERROR] = $msg;
	}

	public static function getMsgError(){

		$msg = (isset($_SESSION[Horario::SESSION_ERROR])) ? $_SESSION[Horario::SESSION_ERROR] : "";

		Horario::clearMsgError();

		return $msg;
	}

	public static function clearMsgError()
	{
		$_SESSION[Horario::SESSION_ERROR] = NULL;
	}

	public static function setMsgSuccess($msg)
	{
		$_SESSION[Horario::SUCCESS] = $msg;
	}

	public static function getMsgSuccess()
	{
		$msg = (isset($_SESSION[Horario::SUCCESS]) && $_SESSION[Horario::SUCCESS]) ? $_SESSION[Horario::SUCCESS] : '';

		Horario::clearMsgSuccess();

		return $msg;
	}

	public static function clearMsgSuccess()
	{

		$_SESSION[Horario::SUCCESS] = NULL;

	}

}


?>