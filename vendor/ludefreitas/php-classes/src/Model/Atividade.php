<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Atividade extends Model {

	const SESSION = "Atividade";
	const SESSION_ERROR = "AtividadeError";


	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_atividade a 
			INNER JOIN tb_fxetaria b
			using(idfxetaria)
			ORDER BY a.nomeativ");

		}	

	public static function checkList($list)
	{

		foreach ($list as &$row) {
			
			$p = new Atividade();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}
	// esta função é usada para salvar e editar Atividade
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_atividade_save(:idativ, :nomeativ, :descativ, :geneativ, :prograativ, :origativ, :tipoativ, :idfxetaria)", array(
			":idativ"=>$this->getidativ(),
			":nomeativ"=>$this->getnomeativ(),
			":descativ"=>$this->getdescativ(),
			":geneativ"=>$this->getgeneativ(),
			":prograativ"=>$this->getprograativ(),
			":origativ"=>$this->getorigativ(),
			":tipoativ"=>$this->gettipoativ(),
			":idfxetaria"=>$this->getidfxetaria()
		));

		$this->setData($results[0]);

		Atividade::updateFile();

	}

	public function get($idativ)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_atividade INNER JOIN tb_fxetaria USING(idfxetaria) WHERE idativ = :idativ", [
			':idativ'=>$idativ 
		]);

		if($results){

			$this->setData($results[0]);		

		}else{

			Atividade::setMsgError("Atividade selecionado não existe!");
			header("Location: /admin/atividade");
			exit();			
		}		
		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_Atividade WHERE idativ = :idativ", [
			':idativ'=>$this->getidativ()
		]);		

		Atividade::updateFile();
	}

	// atualiza lista de Atividade no site (no rodapé) Atividade-menu.html
	public static function updateFile()	
	{
		$atividade = Atividade::listAll();

		$html = [];

		foreach ($atividade as $row) {
			array_push($html, '<li><a href="/atividade/'.$row['idativ'].'">'.$row['nomeativ'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."atividade-menu.html", implode('', $html));
	}

	public function getFromId($idativ)
	{

		$sql = new Sql();

		$rows = $sql->select("SELECT * FROM tb_atividade INNER JOIN tb_fxetaria USING(idfxetaria) WHERE idativ = :idativ LIMIT 1", [
			':idativ'=>$idativ
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
 			WHERE b.idativ = :idativ
		", [
			':idativ'=>$this->getidativ()
		]);

	}

	public static function getPage($page = 1, $itemsPerPage = 8)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_atividade a 
			INNER JOIN tb_fxetaria b
			using(idfxetaria)
			ORDER BY a.nomeativ
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
			SELECT * 
			FROM tb_atividade a 
			INNER JOIN tb_fxetaria b
			using(idfxetaria)
			WHERE a.nomeativ LIKE :search 
			OR a.geneativ LIKE :search 
			OR a.origativ LIKE :search
			OR a.prograativ LIKE :search
			OR a.tipoativ LIKE :search
			OR b.descrfxetaria LIKE :search 
			ORDER BY a.nomeativ
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
		$_SESSION[Atividade::SESSION_ERROR] = $msg;
	}

	
	public static function getMsgError()	{

		$msg = (isset($_SESSION[Atividade::SESSION_ERROR])) ? $_SESSION[Atividade::SESSION_ERROR] : "";

		Atividade::clearMsgError();

		return $msg;
	}

	public static function clearMsgError()
	{
		$_SESSION[Atividade::SESSION_ERROR] = NULL;
	}

	public static function setMsgSuccess($msg)
	{
		$_SESSION[Atividade::SUCCESS] = $msg;
	}

	public static function getMsgSuccess()
	{
		$msg = (isset($_SESSION[Atividade::SUCCESS]) && $_SESSION[Atividade::SUCCESS]) ? $_SESSION[Atividade::SUCCESS] : '';

		Atividade::clearMsgSuccess();

		return $msg;
	}

	public static function clearMsgSuccess()
	{

		$_SESSION[Atividade::SUCCESS] = NULL;

	}

}


?>