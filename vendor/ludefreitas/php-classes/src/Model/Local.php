<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Local extends Model {

	const SESSION = "Local";
	const SESSION_ERROR = "LocalError";

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_local a
			INNER JOIN tb_users b ON b.iduser = a.iduser
			INNER JOIN tb_persons c ON c.idperson = b.idperson
			ORDER BY apelidolocal");
	}

	public static function listAllCoord($iduser)
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_local a
			INNER JOIN tb_users b ON b.iduser = a.iduser
			INNER JOIN tb_persons c ON c.idperson = b.idperson
			WHERE a.iduser = :iduser
			ORDER BY apelidolocal", [
			'iduser'=>$iduser
		]);
	}

	public static function listAllCrecAtivo()

	{
		$statuslocalativo = 1;
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_local a
			INNER JOIN tb_users b ON b.iduser = a.iduser
			INNER JOIN tb_persons c ON c.idperson = b.idperson
			WHERE statuslocal = :statuslocalativo 
			ORDER BY apelidolocal", [
			'statuslocalativo'=>$statuslocalativo
		]);
	}		

	// esta função é usada para salvar e editar local
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_local_save(:idlocal, :apelidolocal, :nomelocal, :rua, :numero, :complemento, :bairro, :cidade, :estado, :telefone, :cep, :statuslocal, :iduser)", array(
			":idlocal"=>$this->getidlocal(),
			":apelidolocal"=>$this->getapelidolocal(),
			":nomelocal"=>$this->getnomelocal(),
			":rua"=>$this->getrua(),
			":numero"=>$this->getnumero(),
			":complemento"=>$this->getcomplemento(),
			":bairro"=>$this->getbairro(),
			":cidade"=>$this->getcidade(),
			":estado"=>$this->getestado(),
			":telefone"=>$this->gettelefone(),
			":cep"=>$this->getcep(),
			":statuslocal"=>$this->getstatuslocal(),
			":iduser"=>$this->getiduser()
		));

		$this->setData($results[0]);

		Local::updateFile();
	}

	public function get($idlocal)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_local WHERE idlocal = :idlocal", [':idlocal'=>$idlocal 
		]);

		if($results){

			$this->setData($results[0]);		

		}else{

			Local::setMsgError("Crec selecionado não encontrado!");
			header("Location: /admin/local");
			exit();			
		}		
		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_local WHERE idlocal = :idlocal", [
			':idlocal'=>$this->getidlocal()
		]);		

		Local::updateFile();
	}

	// atualiza lista de Locais etária no site (no rodapé) local-menu.html
	public static function updateFile()	
	{
		$local = Local::listAll();

		$html = [];

		foreach ($local as $row) {
			array_push($html, '<li><a href="/local/'.$row['idlocal'].'">'.$row['apelidolocal'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."local-menu.html", implode('', $html));
	}
	
	public function getTurmaLocalPage($page = 1, $itemsPerPage = 4)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_turmatemporada n 
            INNER JOIN tb_temporada o ON o.idtemporada = n.idtemporada
			INNER JOIN tb_turma a ON a.idturma = n.idturma
			INNER JOIN tb_modalidade b ON b.idmodal = a.idmodal
            INNER JOIN tb_espaco c ON c.idespaco = a.idespaco
            INNER JOIN tb_horario d ON d.idhorario = a.idhorario
            INNER JOIN tb_atividade e ON a.idativ = e.idativ
            INNER JOIN tb_fxetaria f ON e.idfxetaria = f.idfxetaria
			INNER JOIN tb_users g ON a.iduser = g.iduser
			INNER JOIN tb_persons h ON g.idperson = h.idperson
            INNER JOIN tb_espaco i ON a.idespaco = i.idespaco
			INNER JOIN tb_local j ON j.idlocal = c.idlocal
			INNER JOIN tb_turmastatus m ON m.idturmastatus = a.idturmastatus
			WHERE j.idlocal = :idlocal
			ORDER BY a.descturma
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
	
	/*
	public function getTurmaPage($page = 1, $itemsPerPage = 3)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
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
	
	public static function getPage($page = 1, $itemsPerPage = 6)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_local a
			INNER JOIN tb_users b ON b.iduser = a.iduser
			INNER JOIN tb_persons c ON c.idperson = b.idperson
			ORDER BY a.apelidolocal
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
			FROM tb_local a
			INNER JOIN tb_users b ON b.iduser = a.iduser
			INNER JOIN tb_persons c ON c.idperson = b.idperson
			WHERE apelidolocal LIKE :search 
			OR nomelocal LIKE :search 
			OR rua LIKE :search
			OR bairro LIKE :search	
			OR telefone LIKE :search
			OR cep LIKE :search		
			ORDER BY apelidolocal
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



	public function addEspaco(Espaco $espaco)
	{

		$sql = new Sql();

		$sql->query("INSERT INTO tb_espacolocal (idlocal, idespaco) VALUES(:idlocal, :idespaco)", [
			':idlocal'=>$this->getidlocal(),
			':idespaco'=>$espaco->getidespaco()
		]);

	}

	public function removeEspaco(Espaco $espaco)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_espacolocal WHERE idlocal = :idlocal AND idespaco = :idespaco", [
			':idlocal'=>$this->getidlocal(),
			':idespaco'=>$espaco->getidespaco()
		]);
	}	

	public static function setMsgError($msg)
	{
		$_SESSION[Local::SESSION_ERROR] = $msg;
	}

	public static function getMsgError(){

		$msg = (isset($_SESSION[Local::SESSION_ERROR])) ? $_SESSION[Local::SESSION_ERROR] : "";

		Local::clearMsgError();

		return $msg;
	}

	public static function clearMsgError()
	{
		$_SESSION[Local::SESSION_ERROR] = NULL;
	}

	public static function setMsgSuccess($msg)
	{
		$_SESSION[Local::SUCCESS] = $msg;
	}

	public static function getMsgSuccess()
	{
		$msg = (isset($_SESSION[Local::SUCCESS]) && $_SESSION[Local::SUCCESS]) ? $_SESSION[Local::SUCCESS] : '';

		Local::clearMsgSuccess();

		return $msg;
	}

	public static function clearMsgSuccess()
	{

		$_SESSION[Local::SUCCESS] = NULL;

	}
}


?>