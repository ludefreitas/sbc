<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Agenda extends Model {

	const SESSION = "Agenda";
	const SESSION_ERROR = "AgendaError";

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_agenda a 
			INNER JOIN tb_pessoa b
			using(idpess)
		");

	}	

	public static function checkList($list)
	{

		foreach ($list as &$row) {
			
			$p = new Agenda();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}
	// esta função é usada para salvar e editar Agenda
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_agenda_save(:idagen, :idlocal, :idpess, :idhoradiasemana, :titulo, :dia, :horainicial, :horafinal, :observacao, :ispresente, :dtagenda)", array(
			":idagen"=>$this->getidagen(),
			":idlocal"=>$this->getidlocal(),
			":idpess"=>$this->getidpess(),			
			":idhoradiasemana"=>$this->getidhoradiasemana(),			
			":titulo"=>$this->gettitulo(),
			":dia"=>$this->getdia(),
			":horainicial"=>$this->gethorainicial(),			
			":horafinal"=>$this->gethorafinal(),			
			":observacao"=>$this->getobservacao(),		
			":ispresente"=>$this->getispresente(),		
			":dtagenda"=>$this->getdtagenda()		
		));

		$this->setData($results[0]);

		//Agenda::updateFile();

	}

	public function get($idagen)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT * 
			FROM tb_agenda 
			INNER JOIN tb_pessoa USING(idpess) 
			INNER JOIN tb_local USING(idlocal) 
			WHERE idagen = :idagen", [
			':idagen'=>$idagen
		]);

		if($results){

			$this->setData($results[0]);		

		}else{

			Agenda::setMsgError("Agenda selecionado não existe!");
			header("Location: /admin/agenda");
			exit();			
		}		
		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_agenda WHERE idagen = :idagen", [
			':idagen'=>$this->getidagen()
		]);		

		Agenda::updateFile();
	}

	// atualiza lista de Agenda no site (no rodapé) Agenda-menu.html
	public static function updateFile()	
	{
		/*
		$agenda = Agenda::listAll();

		$html = [];

		foreach ($atividade as $row) {
			array_push($html, '<li><a href="/atividade/'.$row['idativ'].'">'.$row['nomeativ'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."agenda-menu.html", implode('', $html));

		*/

		$agenda = agenda::listAll();

		$json = [];

		foreach ($agenda as $row) {
			array_push($json, '[{     
				                    "id": "'.$row['idagen'].'",
        							"title": "'.$row['titulo'].'", 
        							"description": "'.$row['observacao'].'", 
        							"start": "'.$row['dia'].'", 
        							"end": "'.$row['hora'].'"
        					    }],

				       ');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."res".DIRECTORY_SEPARATOR."site".DIRECTORY_SEPARATOR."js".DIRECTORY_SEPARATOR."agenda.json", implode('', $json));


	}

	public function getFromId($idagen)
	{

		$sql = new Sql();

		$rows = $sql->select("SELECT * 
			FROM tb_agenda 
			INNER JOIN tb_pessoa USING(idpess) 
			INNER JOIN tb_local USING(idlocal)
			WHERE idagen = :idagen LIMIT 1", [
			':idagen'=>$idagen
		]);

		$this->setData($rows[0]);

	}

	public static function temHorario($hora, $dataPost){

		$sql = new Sql();

		$rows = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_agenda 
			INNER JOIN tb_pessoa USING(idpess) 
			INNER JOIN tb_local USING(idlocal)
			WHERE hora = :hora AND dia = :dataPost", [
			':hora'=>$hora,
			':dataPost'=>$dataPost
		]);

		$rows = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [			
			'total'=>(int)$rows[0]["nrtotal"]			
		];
		
	}

	public static function getPage($page = 1, $itemsPerPage = 8)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_agenda a 
			INNER JOIN tb_pessoa b
			using(idpess)
			INNER JOIN tb_local c
			using(idlocal)
			ORDER BY b.nomepess
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
			FROM tb_agenda a 
			INNER JOIN tb_pessoa b
			using(idpess)
			INNER JOIN tb_local c
			using(idlocal)
			WHERE a.titulo LIKE :search 
			OR a.observacao LIKE :search 
			OR a.dia LIKE :search
			OR a.horainicial LIKE :search
			OR a.horafinal LIKE :search
			OR b.nomepess LIKE :search 
			OR b.idpess LIKE :search 
			OR b.numcpf LIKE :search 
			OR c.apelidolocal LIKE :search 
			OR c.idlocal LIKE :search 
			ORDER BY b.nomepess
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

	// Seleciona horários diponíveis para agendar natação livre
	public static function listAllHoraDiaSemanaLocal($idlocal, $diasemana){

		$sql = new Sql();

		$results = $sql->select("SELECT *
			FROM tb_horadiasemana 
			WHERE idlocal = :idlocal AND diasemana = :diasemana", [
			':idlocal'=>$idlocal,
			':diasemana'=>$diasemana
		]);

		return $results;
		//$this->setData($results[0]);		
		
	}

	public static function getNumeroDeVagas($idhoradiasemana){

		$sql = new Sql();

		$results = $sql->select("SELECT vagas
			FROM tb_horadiasemana 
			WHERE idhoradiasemana = :idhoradiasemana", [
			':idhoradiasemana'=>$idhoradiasemana
		]);

		return $results;		
	}

	public static function contaQtdAgendamPorData($data, $idlocal){

		$sql = new Sql();

		$results = $sql->select("SELECT count(*)
			FROM tb_agenda 
			WHERE dia = :data AND idlocal = :idlocal", [
			':data'=>$data,
			':idlocal'=>$idlocal
		]);

		return $results;		
	}

	public static function getHoraInicialDiaSemana($idhoradiasemana){

		$sql = new Sql();

		$results = $sql->select("SELECT horamarcadainicial
			FROM tb_horadiasemana 
			WHERE idhoradiasemana = :idhoradiasemana", [
			':idhoradiasemana'=>$idhoradiasemana
		]);

		return $results;		

	}

	public static function getHoraFinalDiaSemana($idhoradiasemana){

		$sql = new Sql();

		$results = $sql->select("SELECT horamarcadafinal
			FROM tb_horadiasemana 
			WHERE idhoradiasemana = :idhoradiasemana", [
			':idhoradiasemana'=>$idhoradiasemana
		]);

		return $results;		
	}

	public static function getAgendaByIduser($iduser){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_agenda a
			INNER JOIN tb_pessoa b USING (idpess)
			INNER JOIN tb_users c USING (iduser)
			INNER JOIN tb_local d USING (idlocal)
			INNER JOIN tb_horadiasemana e USING (idhoradiasemana)
			WHERE c.iduser = :iduser
			ORDER BY a.dia", [
			':iduser'=>$iduser
		]);

		return $results;		

	}

	public static function getAgendaByLocalData($idlocal, $data){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_agenda a
			INNER JOIN tb_pessoa b USING (idpess)
			INNER JOIN tb_users c USING (iduser)
			INNER JOIN tb_local d USING (idlocal)
			INNER JOIN tb_horadiasemana e USING (idhoradiasemana)
			WHERE a.idlocal = :idlocal AND a.dia = :data
			ORDER BY a.dia, a.horainicial", [
			':idlocal'=>$idlocal,
			':data'=>$data
		]);

		return $results;		

	}

	public static function getAgendaAll(){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_agenda a
			INNER JOIN tb_pessoa b USING (idpess)
			INNER JOIN tb_users c USING (iduser)
			INNER JOIN tb_local d USING (idlocal)
			INNER JOIN tb_horadiasemana e USING (idhoradiasemana)
			-- WHERE iduser = iduser
			ORDER BY a.dia"
		);

		return $results;		

	}



	public static function setMsgError($msg)
	{
		$_SESSION[Agenda::SESSION_ERROR] = $msg;
	}

	
	public static function getMsgError()	{

		$msg = (isset($_SESSION[Agenda::SESSION_ERROR])) ? $_SESSION[Agenda::SESSION_ERROR] : "";

		Agenda::clearMsgError();

		return $msg;
	}

	public static function clearMsgError()
	{
		$_SESSION[Agenda::SESSION_ERROR] = NULL;
	}

	public static function setMsgSuccess($msg)
	{
		$_SESSION[Agenda::SUCCESS] = $msg;
	}

	public static function getMsgSuccess()
	{
		$msg = (isset($_SESSION[Agenda::SUCCESS]) && $_SESSION[Agenda::SUCCESS]) ? $_SESSION[Agenda::SUCCESS] : '';

		Agenda::clearMsgSuccess();

		return $msg;
	}

	public static function clearMsgSuccess()
	{

		$_SESSION[Agenda::SUCCESS] = NULL;

	}

}


?>