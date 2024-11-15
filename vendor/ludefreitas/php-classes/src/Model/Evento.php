<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Evento extends Model {

	const ERROR = "EventoError";

	public static function listAll(){
		$sql = new Sql();
		$results = $sql->select(
			"SELECT * FROM tb_evento a
			INNER JOIN tb_espaco b ON b.idespaco = a.idespaco
			INNER JOIN tb_local c ON c.idlocal = b.idlocal", [
		]);		
		return $results;
	}

	public static function listEventoStatus(){
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

	

	public function EventoCreate($idespaco, $idtemporada, $idstatus_evento, $iduser, $iduser2, $desc_evento, $obs_evento, $relac_equip_evento, $imagem_arquivo_evento, $pdf_regras_evento, $telef_inform_evento, $so_para_alunos, $tem_insc, $tem_premiacao, $tem_categoria_unica, $tem_imagem, $tem_regras, $tem_token, $tem_divulgacao, $tem_transporte, $tem_equipamento, $termina_mesmo_dia, $tem_hora_termino, $tipo_resultado_evento, $programa_evento, $origem_evento, $tipo_evento, $dia_inicio_evento, $dia_final_evento, $hora_inicio_evento, $hora_termino_evento, $dt_saida_transporte_evento, $dt_retorno_transporte_evento, $hora_saida_transporte_evento, $hora_retorno_transporte_evento, $dt_inicio_divulgacao_evento, $dt_final_divulgacao_evento, $dt_comeco_insc_evento, $dt_termino_insc_evento, $dt_criacao_evento)
	{

		echo '<pre>';
		var_dump($_POST);
		echo '</pre>';
		exit();
		$sql = new Sql();

		$results = $sql->select("CALL sp_evento_save(:id_evento, :idespaco, :idtemporada, :idstatus_evento, :iduser, :iduser2, :desc_evento, :obs_evento, :relac_equip_evento, :imagem_arquivo_evento, :pdf_regras_evento, :telef_inform_evento, :so_para_alunos, :tem_insc, :tem_premiacao, :tem_categoria_unica, :tem_imagem, :tem_regras, :tem_token, :tem_divulgacao, :tem_transporte, :tem_equipamento, :termina_mesmo_dia, :tem_hora_termino, :tipo_resultado_evento, :programa_evento, :origem_evento, :tipo_evento, :dia_inicio_evento, :dia_final_evento, :hora_inicio_evento, :hora_termino_evento, :dt_saida_transporte_evento, :dt_retorno_transporte_evento, :hora_saida_transporte_evento, :hora_retorno_transporte_evento, :dt_inicio_divulgacao_evento, :dt_final_divulgacao_evento, :dt_comeco_insc_evento, :dt_termino_insc_evento, :dt_criacao_evento)", array (
			":id_evento"=>$this->getid_evento(),
			":idespaco"=>$idespaco,
			":idtemporada"=>$idtemporada,
			":idstatus_evento"=>$idstatus_evento,
			":iduser"=>$iduser,
			":iduser2"=>$iduser2,
			":desc_evento"=>$desc_evento,
			":obs_evento"=>$obs_evento,	
			":relac_equip_evento"=>$relac_equip_evento,
			":imagem_arquivo_evento"=>$imagem_arquivo_evento,
			":pdf_regras_evento"=>$pdf_regras_evento,
			":telef_inform_evento"=>$telef_inform_evento,
			":so_para_alunos"=>$so_para_alunos,						
			":tem_insc"=>$tem_insc,		
			":tem_premiacao"=>$tem_premiacao,	
			":tem_categoria_unica"=>$tem_categoria_unica,	
			":tem_imagem"=>$tem_imagem,	
			":tem_regras"=>$tem_regras,				
			":tem_token"=>$tem_token,				
			":tem_divulgacao"=>$tem_divulgacao,				
			":tem_transporte"=>$tem_transporte,
			":tem_equipamento"=>$tem_equipamento,
			":termina_mesmo_dia"=>$termina_mesmo_dia,
			":tem_hora_termino"=>$tem_hora_termino,				
			":tipo_resultado_evento"=>$tipo_resultado_evento,
			":programa_evento"=>$programa_evento,
			":origem_evento"=>$origem_evento,			
			":tipo_evento"=>$tipo_evento,			
			":dia_inicio_evento"=>$dia_inicio_evento,
			":dia_final_evento"=>$dia_final_evento,
			":hora_inicio_evento"=>$hora_inicio_evento,
			":hora_termino_evento"=>$hora_termino_evento,
			":dt_saida_transporte_evento"=>$dt_saida_transporte_evento,
			":dt_retorno_transporte_evento"=>$dt_retorno_transporte_evento,
			":hora_saida_transporte_evento"=>$hora_saida_transporte_evento,
			":hora_retorno_transporte_evento"=>$hora_retorno_transporte_evento,
			":dt_inicio_divulgacao_evento"=>$dt_inicio_divulgacao_evento,
			":dt_final_divulgacao_evento"=>$dt_final_divulgacao_evento,			
			":dt_comeco_insc_evento"=>$dt_comeco_insc_evento,
			":dt_termino_insc_evento"=>$dt_termino_insc_evento,
			":dt_criacao_evento"=>$dt_criacao_evento			
		));

		var_dump($results);
		exit;

		$this->setData($results[0]);

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

	public static function atualizaStatusEventoTemporada($id_evento, $idtemporada, $status){

		$sql = new Sql();

			$sql->query("UPDATE tb_evento SET idstatus_evento = :status  WHERE idtemporada = :idtemporada AND id_evento = :id_evento", [
				'status'=>$status,
				':idtemporada'=>$idtemporada,
				':id_evento'=>$id_evento
			]);			 
	}

	public static function getCaminhoArquivoRegrasPdf($id_evento){

		$sql = new Sql();

			$results = $sql->select("SELECT pdf_regras_evento FROM tb_evento
			 WHERE id_evento = :id_evento LIMIT 1", array(
			':id_evento'=>$id_evento
		)); 
			return $results;		
	}

	public static function updateCaminhoArquivoRegrasPdf($id_evento, $caminhoarquivopdfregras){

		$sql = new Sql();

			$sql->query("UPDATE tb_evento SET pdf_regras_evento = :caminhoarquivopdfregras  WHERE id_evento = :id_evento",  [
				'caminhoarquivopdfregras'=>$caminhoarquivopdfregras,
				':id_evento'=>$id_evento
			]);			 
	}

	public static function getCaminhoArquivoImagem($id_evento){

		$sql = new Sql();

			$results = $sql->select("SELECT imagem_arquivo_evento FROM tb_evento
			 WHERE id_evento = :id_evento LIMIT 1", array(
			':id_evento'=>$id_evento
		)); 
			return $results;		
	}

	public static function updateCaminhoArquivoImagem($id_evento, $caminhoarquivoimagem){

		$sql = new Sql();

			$sql->query("UPDATE tb_evento SET imagem_arquivo_evento = :caminhoarquivoimagem  WHERE id_evento = :id_evento",  [
				'caminhoarquivoimagem'=>$caminhoarquivoimagem,
				':id_evento'=>$id_evento
			]);			 
	}

	public static function updateTemImagem($id_evento, $tem_imagem){

		$sql = new Sql();

			$sql->query("UPDATE tb_evento SET tem_imagem = :tem_imagem  WHERE id_evento = :id_evento",  [
				'tem_imagem'=>$tem_imagem,
				':id_evento'=>$id_evento
			]);			 
	}

	public static function updateTemRegras($id_evento, $tem_regras){

		$sql = new Sql();

			$sql->query("UPDATE tb_evento SET tem_regras = :tem_regras  WHERE id_evento = :id_evento",  [
				'tem_regras'=>$tem_regras,
				':id_evento'=>$id_evento
			]);			 
	}
	

	public static function getIdstatusEventoTemporada($id_evento, $idtemporada){

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

