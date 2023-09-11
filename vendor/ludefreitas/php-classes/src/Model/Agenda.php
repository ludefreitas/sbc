<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Agenda extends Model {

	const SESSION = "Agenda";
	const SESSION_ERROR = "AgendaError";
	const SUCCESS = "AgendaSucess";

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

	public function delete($idagen)
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_agenda WHERE idagen = :idagen", [
			':idagen'=>$idagen
		]);		

		//Agenda::updateFile();
	}
	
	public function marcarPresença($idagen)
	{
		$sql = new Sql();

		$results = $sql->select("UPDATE tb_agenda SET ispresente = 1 WHERE idagen = :idagen", [
			':idagen'=>$idagen
		]);		

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

		$statushora = 1;

		$sql = new Sql();

		$results = $sql->select("SELECT *
			FROM tb_horadiasemana 
			WHERE idlocal = :idlocal 
			AND statushora = :statushora
			AND diasemana = :diasemana
			ORDER BY horamarcadainicial", [
			':idlocal'=>$idlocal,
			':statushora'=>$statushora,
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

	public static function contaQtdAgendamPorDataEIdHora($data, $idlocal, $idhoradiasemana){

		$sql = new Sql();

		$results = $sql->select("SELECT count(*)
			FROM tb_agenda 
			WHERE dia = :data 
			AND idlocal = :idlocal
			AND idhoradiasemana = :idhoradiasemana", [
			':data'=>$data,
			':idlocal'=>$idlocal,
			':idhoradiasemana'=>$idhoradiasemana
		]);

		return $results;		
	}
	
	public static function contaQtdAgendamPorDataHorarioTitulo($data, $idlocal, $titulo, $horainicial){

		$sql = new Sql();

		$results = $sql->select("SELECT count(*)
			FROM tb_agenda 
			WHERE dia = :data 
			AND idlocal = :idlocal
			AND titulo = :titulo
			AND horainicial = :horainicial", [
			':data'=>$data,
			':idlocal'=>$idlocal,
			':titulo'=>$titulo,
			'horainicial'=>$horainicial
		]);

		return $results;		
	}
	
	public static function getAgendaExist($idpess, $idhoradiasemana, $dia, $idlocal){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_agenda a
			
			WHERE idpess = :idpess
			AND idhoradiasemana = :idhoradiasemana
			AND dia = :dia
			AND idlocal = :idlocal
			ORDER BY a.dia DESC", [
			':idpess'=>$idpess,
			':idhoradiasemana'=>$idhoradiasemana,
			':dia'=>$dia,
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
	
	public static function getAgendaByIduser($iduser, $titulo){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_agenda a
			INNER JOIN tb_pessoa b USING (idpess)
			INNER JOIN tb_users c USING (iduser)
			INNER JOIN tb_local d USING (idlocal)
			INNER JOIN tb_horadiasemana e USING (idhoradiasemana)
			WHERE c.iduser = :iduser AND a.titulo = :titulo
			ORDER BY a.dia DESC", [
			':iduser'=>$iduser,
			':titulo'=>$titulo
		]);

		return $results;		

	}
	
	public static function getAgendaAvaliacaoByIduser($iduser, $titulo){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_agenda a
			INNER JOIN tb_pessoa b USING (idpess)
			INNER JOIN tb_users c USING (iduser)
			INNER JOIN tb_local d USING (idlocal)
			INNER JOIN tb_horadiasemana e USING (idhoradiasemana)
			WHERE c.iduser = :iduser AND a.titulo = :titulo
			ORDER BY a.dia DESC", [
			':iduser'=>$iduser,
			':titulo'=>$titulo
		]);

		return $results;		

	}
	
	public static function getAgendaByLocalData($idlocal, $data, $titulo){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_agenda a
			INNER JOIN tb_pessoa b USING (idpess)
			INNER JOIN tb_users c USING (iduser)
			INNER JOIN tb_persons f USING (idperson)
			INNER JOIN tb_local d USING (idlocal)
			INNER JOIN tb_horadiasemana e USING (idhoradiasemana)
			WHERE a.idlocal = :idlocal AND a.dia = :data AND a.titulo = :titulo
			ORDER BY a.dia, a.horainicial, b.nomepess", [
			':idlocal'=>$idlocal,
			':data'=>$data,
			':titulo'=>$titulo
		]);

		return $results;		

	}
	
	public static function getAgendaPorPessoaLocalDia($idpess, $idlocal, $data){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_agenda 
			WHERE idpess = :idpess 
			AND idlocal = :idlocal 
			AND dia = :data", [
				':idpess'=>$idpess,
				':idlocal'=>$idlocal,
				':data'=>$data
			]);

		if($results){
			return true;
		}else{
			return false;
		}
	}
	
	public static function countAgendaPorPessoaLocalDia($idpess, $idlocal, $data){

		$sql = new Sql();

		$results = $sql->select("SELECT count(*) FROM tb_agenda 
			WHERE idpess = :idpess 
			AND idlocal = :idlocal 
			AND dia = :data", [
				':idpess'=>$idpess,
				':idlocal'=>$idlocal,
				':data'=>$data
			]);

		return $results;		
	}
	
	public static function countAgendaPorPessoaLocalDiaTitulo($idpess, $idlocal, $titulo){

		$sql = new Sql();

		$results = $sql->select("SELECT count(*) FROM tb_agenda 
			WHERE idpess = :idpess 
			AND idlocal = :idlocal 
			AND titulo = :titulo", [
				':idpess'=>$idpess,
				':idlocal'=>$idlocal,
				':titulo'=>$titulo
			]);

		return $results;		
	}
	
	public static function selecionaAgendaPorPessoaDiaTitulo($idpess, $titulo){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_agenda 
			WHERE idpess = :idpess 
			AND titulo = :titulo", [
				':idpess'=>$idpess,
				':titulo'=>$titulo
			]);

		return $results;		
	}
	
	public static function countAgendaPorPessoaDiaTitulo($idpess, $titulo){

		$sql = new Sql();

		$results = $sql->select("SELECT count(*) FROM tb_agenda 
			WHERE idpess = :idpess 
			AND titulo = :titulo", [
				':idpess'=>$idpess,
				':titulo'=>$titulo
			]);

		return $results;		
	}

	public static function getHoraExistenteInicial($idpess, $idlocal, $data){

		$sql = new Sql();

		$results = $sql->select("SELECT horainicial, dia FROM tb_agenda 
			WHERE idpess = :idpess 
			AND idlocal = :idlocal 
			AND dia = :data", [
				':idpess'=>$idpess,
				':idlocal'=>$idlocal,
				':data'=>$data
			]);
		
			return $results;		
	}

	public static function getHoraExistenteFinal($idpess, $idlocal, $data){

		$sql = new Sql();

		$results = $sql->select("SELECT horafinal, dia FROM tb_agenda 
			WHERE idpess = :idpess 
			AND idlocal = :idlocal 
			AND dia = :data", [
				':idpess'=>$idpess,
				':idlocal'=>$idlocal,
				':data'=>$data
			]);

			return $results;		
	}	

	public function saveMesagemAgenda()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_agendamsg_save(:idagendamsg, :idlocal, :iduser, :msgtexto, :dtinitmsg, :dtfimmsg, :dtcriacaomsg)", array(
			":idagendamsg"=>$this->getidagendamsg(),
			":idlocal"=>$this->getidlocal(),
			":iduser"=>$this->getiduser(),			
			":msgtexto"=>$this->getmsgtexto(),			
			":dtinitmsg"=>$this->getdtinitmsg(),
			":dtfimmsg"=>$this->getdtfimmsg(),
			":dtcriacaomsg"=>$this->getdtcriacaomsg()		
		));

		$this->setData($results[0]);

	}

	public static function selectAllAgendaMsgLocal($idlocal){

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_agendamsg 
			WHERE idlocal = :idlocal ", [
				':idlocal'=>$idlocal
			]);
		return $results;			
	}

	
	public static function selectAllAgendaMsg(){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_agendamsg ORDER BY dtinitmsg DESC");

		return $results;		
		
	}

	public function deleteAgendaMsg($idagendamsg)
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_agendamsg WHERE idagendamsg = :idagendamsg", [
			':idagendamsg'=>$idagendamsg
		]);		

	}

	public function saveHorarioSemana()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_horadiasemana_save(:idhoradiasemana, :idlocal, :diasemana, :horamarcadainicial, :horamarcadafinal, :vagas, :statushora)", array(
			":idhoradiasemana"=>$this->getidhoradiasemana(),
			":idlocal"=>$this->getidlocal(),
			":diasemana"=>$this->getdiasemana(),			
			":horamarcadainicial"=>$this->gethoramarcadainicial(),			
			":horamarcadafinal"=>$this->gethoramarcadafinal(),
			":vagas"=>$this->getvagas(),
			":statushora"=>$this->getstatushora()		
		));

		$this->setData($results[0]);

	}

	public static function selectAllHoradiaSemanaByLocal($idlocal){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_horadiasemana 
			WHERE idlocal = :idlocal
			ORDER BY horamarcadainicial", [
				':idlocal'=>$idlocal
			]);

		return $results;		
	}	

	public static function selectAllHoradiaSemanaByLocalDiaSemana($idlocal, $diasemana){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_horadiasemana 
			WHERE idlocal = :idlocal
			AND diasemana = :diasemana
			ORDER BY horamarcadainicial", [
				':idlocal'=>$idlocal,
				':diasemana'=>$diasemana
			]);

		return $results;			
	}

	public function atualizaQtdVagasHorarioById($idhoradiasemana, $vagas)
	{
		$sql = new Sql();

		$results = $sql->select("UPDATE tb_horadiasemana SET vagas = :vagas WHERE idhoradiasemana = :idhoradiasemana", [
			':vagas'=>$vagas,
			':idhoradiasemana'=>$idhoradiasemana
		]);	
	}

	public function atulizaStatusHorarioAgenga($idhoradiasemana, $statushora)
	{
		$sql = new Sql();

		$results = $sql->select("UPDATE tb_horadiasemana SET statushora = :statushora WHERE idhoradiasemana = :idhoradiasemana", [
			':statushora'=>$statushora,
			':idhoradiasemana'=>$idhoradiasemana
		]);	
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