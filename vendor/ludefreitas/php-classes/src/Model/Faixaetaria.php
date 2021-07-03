<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Faixaetaria extends Model {

	const SESSION = "Faixaetaria";
	const SESSION_ERROR = "FaixaetariaError";


	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_fxetaria ORDER BY initidade, fimidade");
	}	

	public static function checkList($list)
	{

		foreach ($list as &$row) {
			
			$p = new Faixaetaria();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}

	// esta função é usada para salvar e editar faixa etaria
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_faixaetaria_save(:idfxetaria, :descrfxetaria, :initidade, :fimidade)", array(
			":idfxetaria"=>$this->getidfxetaria(),
			":descrfxetaria"=>$this->getdescrfxetaria(),
			":initidade"=>$this->getinitidade(),
			":fimidade"=>$this->getfimidade()
		));

		$this->setData($results[0]);

		Faixaetaria::updateFile();

	}

	
	public function get($idfxetaria)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_fxetaria WHERE idfxetaria = :idfxetaria", [':idfxetaria'=>$idfxetaria 
		]);

		if($results){

			$this->setData($results[0]);		

		}else{

			Faixaetaria::setMsgError("Faixa etária selecionada não existe!");
			header("Location: /professor/faixaetaria");
			exit();			
		}				
		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_fxetaria WHERE idfxetaria = :idfxetaria", [
			':idfxetaria'=>$this->getidfxetaria()
		]);		

		Faixaetaria::updateFile();
	}

	// atualiza lista de faixa etária no site (no rodapé) faixaetaria-menu.html
	public static function updateFile()	
	{
		$faixaetaria = Faixaetaria::listAll();

		$html = [];

		foreach ($faixaetaria as $row) {
			array_push($html, '<li><a href="/faixaetaria/'.$row['idfxetaria'].'">'.$row['descrfxetaria'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."faixaetaria-menu.html", implode('', $html));
	}

	public static function getPage($page = 1, $itemsPerPage = 8)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_fxetaria
			ORDER BY descrfxetaria
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
			FROM tb_fxetaria 
			WHERE descrfxetaria LIKE :search 
			OR initidade LIKE :search 
			OR fimidade LIKE :search
			ORDER BY descrfxetaria
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
		$_SESSION[Faixaetaria::SESSION_ERROR] = $msg;
	}

	public static function getMsgError(){

		$msg = (isset($_SESSION[Faixaetaria::SESSION_ERROR])) ? $_SESSION[Faixaetaria::SESSION_ERROR] : "";

		Faixaetaria::clearMsgError();

		return $msg;
	}

	public static function clearMsgError()
	{
		$_SESSION[Faixaetaria::SESSION_ERROR] = NULL;
	}

	public static function setMsgSuccess($msg)
	{
		$_SESSION[Faixaetaria::SUCCESS] = $msg;
	}

	public static function getMsgSuccess()
	{
		$msg = (isset($_SESSION[Faixaetaria::SUCCESS]) && $_SESSION[Faixaetaria::SUCCESS]) ? $_SESSION[Faixaetaria::SUCCESS] : '';

		Faixaetaria::clearMsgSuccess();

		return $msg;
	}

	public static function clearMsgSuccess()
	{

		$_SESSION[Faixaetaria::SUCCESS] = NULL;

	}

}


?>