<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Evento extends Model {

	const ERROR = "EventoError";

	public function listAll(){
		$sql = new Sql();
		$results = $sql->select(
			"SELECT * FROM tb_evento a
			INNER JOIN tb_espaco b ON b.idespaco = a.idespaco
			INNER JOIN tb_local c ON c.idlocal = b.idlocal", [
		]);		
		return $results;
	}

	public function listEventoStatus(){
		$sql = new Sql();
		$results = $sql->select(
			"SELECT * FROM tb_evento_status", [
		]);		
		return $results;
	}

	public function get($id_evento)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_evento a
			INNER JOIN tb_temporada b ON b.idtemporada = a.idtemporada
			INNER JOIN tb_espaco c ON c.idespaco = a.idespaco
			INNER JOIN tb_local d ON d.idlocal = c.idlocal
			INNER JOIN tb_users e ON e.iduser = a.iduser
			INNER JOIN tb_persons f ON f.idperson = e.idperson
			WHERE id_evento = :id_evento", [
			':id_evento'=>$id_evento 
		]);

		if($results){

			$this->setData($results[0]);		

		}
	}

	public function listEventosByIdTemporada($idtemporada){
		$sql = new Sql();
		$results = $sql->select(
			"SELECT * FROM tb_evento a
			INNER JOIN tb_temporada b ON b.idtemporada = a.idtemporada
			INNER JOIN tb_espaco c ON c.idespaco = a.idespaco
			INNER JOIN tb_local d ON d.idlocal = c.idlocal
			INNER JOIN tb_users e ON e.iduser = a.iduser
			INNER JOIN tb_persons f ON f.idperson = e.idperson
			WHERE b.idtemporada = :idtemporada", [
			':idtemporada'=>$idtemporada
		]);
		return $results;
	}

	public function listEventosByIdTemporadaIdlocal($idtemporada, $idlocal){

		$sql = new Sql();
		$results = $sql->select(
			"SELECT * FROM tb_evento a
			INNER JOIN tb_temporada b ON b.idtemporada = a.idtemporada
			INNER JOIN tb_espaco c ON c.idespaco = a.idespaco
			INNER JOIN tb_local d ON d.idlocal = c.idlocal
			INNER JOIN tb_users e ON e.iduser = a.iduser
			INNER JOIN tb_persons f ON f.idperson = e.idperson
			WHERE b.idtemporada = :idtemporada
			AND d.idlocal = :idlocal", [
			':idtemporada'=>$idtemporada,
			':idlocal'=>$idlocal 
		]);
		return $results;
	}

	public function eventoByIdEvento($id_evento){
		$sql = new Sql();
		$results = $sql->select(
			"SELECT * FROM tb_evento
			WHERE id_evento = :id_evento", [
			':id_evento'=>$id_evento,
		]);		
		return $results;
	}

	public function atualizaStatusEventoTemporada($id_evento, $idtemporada, $status){

		$sql = new Sql();

			$sql->query("UPDATE tb_evento SET idstatus_evento = :status  WHERE idtemporada = :idtemporada AND id_evento = :id_evento", [
				'status'=>$status,
				':idtemporada'=>$idtemporada,
				':id_evento'=>$id_evento
			]);			 
	}

	public function getIdstatusEventoTemporada($id_evento, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("SELECT idstatus_evento FROM tb_evento
			 WHERE id_evento = :id_evento
			 AND idtemporada = :idtemporada", [
			':id_evento'=>$id_evento,
			':idtemporada'=>$idtemporada
		]);

		if($results){
			return (int)$results[0]['idstatus_evento'];
		}else{
			return 0;
		}

	}

	public function getInscByEventoTemporadaPvs($id_evento, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_evento_insc_indiv a
			INNER JOIN tb_temporada b ON b.idtemporada = a.idtemporada
			INNER JOIN tb_evento_status_insc c ON c.idstatus_insc_evento = a.idstatus_insc_evento
			INNER JOIN tb_pessoa d ON d.numcpf = a.numcpf_evento
			INNER JOIN tb_users e ON e.iduser = a.iduser
			INNER JOIN tb_persons f ON f.idperson = e.idperson
			-- INNER JOIN tb_inscstatus g ON g.idinscstatus = a.idinscstatus		
			INNER JOIN tb_endereco h ON h.idpess = d.idpess						
			WHERE a.id_evento = :id_evento AND a.idtemporada = :idtemporada AND a.insc_evento_pvs = 1
			ORDER BY a.idinsc_evento_indiv, a.idstatus_insc_evento, a.numordem_evento;
		", [
			':id_evento'=>$id_evento,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	public function getInscByEventoTemporadaTodas($id_evento, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			
			SELECT * FROM tb_evento_insc_indiv a
			INNER JOIN tb_temporada b ON b.idtemporada = a.idtemporada
			INNER JOIN tb_evento_status_insc c ON c.idstatus_insc_evento = a.idstatus_insc_evento
			INNER JOIN tb_pessoa d ON d.numcpf = a.numcpf_evento
			INNER JOIN tb_users e ON e.iduser = a.iduser
			INNER JOIN tb_persons f ON f.idperson = e.idperson
			-- INNER JOIN tb_inscstatus g ON g.idinscstatus = a.idinscstatus		
			INNER JOIN tb_endereco h ON h.idpess = d.idpess						
			WHERE a.id_evento = :id_evento AND a.idtemporada = :idtemporada
			ORDER BY a.idinsc_evento_indiv, a.idstatus_insc_evento, a.numordem_evento;
		", [
			':id_evento'=>$id_evento,
			':idtemporada'=>$idtemporada
		]);
		
		$this->setData($results);
	}

	public function getCategoriasByEventoTemporada($id_evento, $idtemporada){

		$sql = new Sql();

		$results = $sql->select("
			SELECT * FROM tb_evento_categoria a
			INNER JOIN tb_evento b ON b.id_evento = a.id_evento
			-- INNER JOIN tb_temporada c ON c.idtemporada = b.idtemporada
			WHERE b.id_evento = :id_evento 
			AND b.idtemporada = :idtemporada
		", [
			':id_evento'=>$id_evento,
			':idtemporada'=>$idtemporada
		]);
		
		return $results;
	}



	public static function setError($msg)
		{

			$_SESSION[Evento::ERROR] = $msg;

		}

	public static function getError()
	{

		$msg = (isset($_SESSION[Evento::ERROR]) && $_SESSION[Evento::ERROR]) ? $_SESSION[Evento::ERROR] : '';

		Evento::clearError();
		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Evento::ERROR] = NULL;

	}

	

}

?>

