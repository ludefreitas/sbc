<?php

	namespace Sbc\Model;

	use \Sbc\DB\Sql;
	use \Sbc\Model;
	use \Sbc\Mailer;
	use DateTime;

	class Temporada extends Model {

		const ERROR = "TemporadaError";
		const SUCCESS = "TemporadaSucesss";	


		public static function listAll()
		{
			$sql = new Sql();

			return $sql->select("
				SELECT * 
				FROM tb_temporada
				INNER JOIN tb_statustemporada
				using(idstatustemporada)
				ORDER BY desctemporada DESC");
		}
		
		public static function listAllTurmaTemporada($idtemporada)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE idtemporada = :idtemporada
				ORDER BY a.idturma", [
				':idtemporada'=>$idtemporada 
			]);
		}

		public static function listAllPorOrdemHorarioTurmaTemporada($idtemporada)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE idtemporada = :idtemporada
				ORDER BY g.horainicio", [
				':idtemporada'=>$idtemporada 
			]);
		}

		public static function listAllPorOrdemHorarioEspacoTurmaTemporada($idtemporada, $idespaco)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
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
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE idtemporada = :idtemporada
				AND d.idespaco = :idespaco
				AND (f.idturmastatus = 3 OR f.idturmastatus = 6)
				ORDER BY g.horainicio", [
				':idtemporada'=>$idtemporada,
				':idespaco'=>$idespaco 
			]);
		}
		
		public static function listAllTurmaTemporadaControleFrequencia($idtemporada)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE idtemporada = :idtemporada
				ORDER BY e.apelidolocal, l.descmodal, g.diasemana, g.periodo, g.horainicio", [
				':idtemporada'=>$idtemporada 
			]);
		}
		
		public static function listAllTurmaTemporadaControleFrequenciaLocal($idtemporada, $idlocal)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE a.idtemporada = :idtemporada
				AND e.idlocal = :idlocal
				ORDER BY e.apelidolocal, l.descmodal, g.diasemana, g.periodo, g.horainicio", [
				':idtemporada'=>$idtemporada,
				':idlocal'=>$idlocal 
			]);
		}

		public static function listAllTurmaTemporadaControleFrequenciaModalidade($idtemporada, $idmodal)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE a.idtemporada = :idtemporada
				AND l.idmodal = :idmodal
				ORDER BY e.apelidolocal, l.descmodal, g.diasemana, g.periodo, g.horainicio", [
				':idtemporada'=>$idtemporada,
				':idmodal'=>$idmodal 
			]);
		}

		public static function listAllTurmaTemporadaControleFrequenciaModalLocal($idtemporada, $idmodal, $idlocal)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE a.idtemporada = :idtemporada
				AND l.idmodal = :idmodal
				AND e.idlocal = :idlocal
				ORDER BY e.apelidolocal, l.descmodal, g.diasemana, g.periodo, g.horainicio", [
				':idtemporada'=>$idtemporada,
				':idmodal'=>$idmodal,
				':idlocal'=>$idlocal
			]);
		}

		public static function listAllTurmaTemporadaControleFrequenciaModalLocalUser($idtemporada, $idmodal, $idlocal, $iduser)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE a.idtemporada = :idtemporada
				AND l.idmodal = :idmodal
				AND e.idlocal = :idlocal
				AND b.iduser = :iduser
				ORDER BY e.apelidolocal, l.descmodal, g.diasemana, g.periodo, g.horainicio", [
				':idtemporada'=>$idtemporada,
				':idmodal'=>$idmodal,
				':idlocal'=>$idlocal,
				':iduser'=>$iduser
			]);
		}
		
		public static function listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada)
		{
			$desctemporada = $desctemporada - 1;
			$sql = new Sql();
			$results = $sql->select("CALL sp_select_insc_numInscritosAnoAnt(:idturma, :idtemporada, :desctemporada)", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada,
		    ':desctemporada'=>$desctemporada 
			]);
			return (int)$results[0]['count(*)'];			
		}

		public static function listAllTurmaTemporadaControleFrequenciaJan($idturma, $idtemporada, $desctemporada)
		{
			$sql = new Sql();
			$results = $sql->select("CALL sp_select_insc_numInscritosJan(:idturma, :idtemporada, :desctemporada)", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada,
		    ':desctemporada'=>$desctemporada 
			]);

			return (int)$results[0]['count(*)'];			
		}

		public static function listAllTurmaTemporadaControleFrequenciaFev($idturma, $idtemporada, $desctemporada)
		{
			$sql = new Sql();
			$results = $sql->select("CALL sp_select_insc_numInscritosFev(:idturma, :idtemporada, :desctemporada)", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada,
		    ':desctemporada'=>$desctemporada 
			]);

			return (int)$results[0]['count(*)'];			
		}

		public static function listAllTurmaTemporadaControleFrequenciaMar($idturma, $idtemporada, $desctemporada)
		{
			$sql = new Sql();
			$results = $sql->select("CALL sp_select_insc_numInscritosMar(:idturma, :idtemporada, :desctemporada)", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada,
		    ':desctemporada'=>$desctemporada 
			]);

			return (int)$results[0]['count(*)'];			
		}

		public static function listAllTurmaTemporadaControleFrequenciaAbr($idturma, $idtemporada, $desctemporada)
		{
			$sql = new Sql();
			$results = $sql->select("CALL sp_select_insc_numInscritosAbr(:idturma, :idtemporada, :desctemporada)", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada,
		    ':desctemporada'=>$desctemporada 
			]);

			return (int)$results[0]['count(*)'];			
		}

		public static function listAllTurmaTemporadaControleFrequenciaMai($idturma, $idtemporada, $desctemporada)
		{
			$sql = new Sql();
			$results = $sql->select("CALL sp_select_insc_numInscritosMai(:idturma, :idtemporada, :desctemporada)", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada,
		    ':desctemporada'=>$desctemporada 
			]);

			return (int)$results[0]['count(*)'];			
		}

		public static function listAllTurmaTemporadaControleFrequenciaJun($idturma, $idtemporada, $desctemporada)
		{
			$sql = new Sql();
			$results = $sql->select("CALL sp_select_insc_numInscritosJun(:idturma, :idtemporada, :desctemporada)", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada,
		    ':desctemporada'=>$desctemporada 
			]);

			return (int)$results[0]['count(*)'];			
		}

		public static function listAllTurmaTemporadaControleFrequenciaJul($idturma, $idtemporada, $desctemporada)
		{
			$sql = new Sql();
			$results = $sql->select("CALL sp_select_insc_numInscritosJul(:idturma, :idtemporada, :desctemporada)", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada,
		    ':desctemporada'=>$desctemporada 
			]);

			return (int)$results[0]['count(*)'];			
		}

		public static function listAllTurmaTemporadaControleFrequenciaAgo($idturma, $idtemporada, $desctemporada)
		{
			$sql = new Sql();
			$results = $sql->select("CALL sp_select_insc_numInscritosAgo(:idturma, :idtemporada, :desctemporada)", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada,
		    ':desctemporada'=>$desctemporada 
			]);

			return (int)$results[0]['count(*)'];			
		}

		public static function listAllTurmaTemporadaControleFrequenciaSet($idturma, $idtemporada, $desctemporada)
		{
			$sql = new Sql();
			$results = $sql->select("CALL sp_select_insc_numInscritosSet(:idturma, :idtemporada, :desctemporada)", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada,
		    ':desctemporada'=>$desctemporada 
			]);

			return (int)$results[0]['count(*)'];			
		}

		public static function listAllTurmaTemporadaControleFrequenciaOut($idturma, $idtemporada, $desctemporada)
		{
			$sql = new Sql();
			$results = $sql->select("CALL sp_select_insc_numInscritosOut(:idturma, :idtemporada, :desctemporada)", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada,
		    ':desctemporada'=>$desctemporada 
			]);

			return (int)$results[0]['count(*)'];			
		}

		public static function listAllTurmaTemporadaControleFrequenciaNov($idturma, $idtemporada, $desctemporada)
		{
			$sql = new Sql();
			$results = $sql->select("CALL sp_select_insc_numInscritosNov(:idturma, :idtemporada, :desctemporada)", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada,
		    ':desctemporada'=>$desctemporada 
			]);

			return (int)$results[0]['count(*)'];			
		}

		public static function listAllTurmaTemporadaControleFrequenciaDez($idturma, $idtemporada, $desctemporada)
		{
			$sql = new Sql();
			$results = $sql->select("CALL sp_select_insc_numInscritosDez(:idturma, :idtemporada, :desctemporada)", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada,
		    ':desctemporada'=>$desctemporada 
			]);

			return (int)$results[0]['count(*)'];			
		}

		public static function listAllTurmaTemporadaLocal($idtemporada, $idlocal)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE a.idtemporada = :idtemporada
				AND e.idlocal = :idlocal
				ORDER BY a.numinscritos DESC", [
				':idtemporada'=>$idtemporada,
				':idlocal'=>$idlocal
			]);
		}

		public static function listAllTurmatemporadaDiaSemana($idtemporada, $nomeDiasemana)
		{
			if($nomeDiasemana == 'Segunda'){
				$diasemana1 = 'Segunda';
				$diasemana2 = 'Segunda e Quarta';
				$diasemana3 = 'Segunda a Sexta';
				$diasemana4 = '';
				$diasemana5 = '';
				$diasemana6 = 'Segunda a Sábado';
			}
			if($nomeDiasemana == 'Terça'){
				$diasemana1 = 'Terça';
				$diasemana2 = 'Terça e Quinta';
				$diasemana3 = 'Segunda a Sexta';
				$diasemana4 = 'Terça a Sexta';
				$diasemana5 = '';
				$diasemana6 = 'Segunda a Sábado';
			}

			if($nomeDiasemana == 'Quarta'){
				$diasemana1 = 'Quarta';
				$diasemana2 = 'Segunda e Quarta';
				$diasemana3 = 'Quarta e Sexta';
				$diasemana4 = 'Segunda a Sexta';
				$diasemana5 = 'Terça a Sexta';
				$diasemana6 = 'Segunda a Sábado';
			}
			if($nomeDiasemana == 'Quinta'){
				$diasemana1 = 'Quinta';
				$diasemana2 = 'Terça e Quinta';
				$diasemana3 = 'Segunda a Sexta';
				$diasemana4 = 'Terça a Sexta';
				$diasemana5 = '';
				$diasemana6 = 'Segunda a Sábado';
			}
			if($nomeDiasemana == 'Sexta'){
				$diasemana1 = 'Sexta';
				$diasemana2 = '';
				$diasemana3 = 'Quarta e Sexta';
				$diasemana4 = 'Segunda a Sexta';
				$diasemana5 = 'Terça a Sexta';
				$diasemana6 = 'Segunda a Sábado';
			}
			if($nomeDiasemana == 'Sábado'){
				$diasemana1 = 'Sábado';
				$diasemana2 = '';
				$diasemana3 = '';
				$diasemana4 = '';
				$diasemana5 = '';
				$diasemana6 = 'Segunda a Sábado';
			}
			if($nomeDiasemana == 'Domingo'){
				$diasemana1 = 'Domingo';
				$diasemana2 = '';
				$diasemana3 = '';
				$diasemana4 = '';
				$diasemana5 = '';
				$diasemana6 = '';
			}
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE a.idtemporada = :idtemporada
				AND (g.diasemana = :diasemana1
				OR g.diasemana = :diasemana2
				OR g.diasemana = :diasemana3
				OR g.diasemana = :diasemana4
				OR g.diasemana = :diasemana5
				OR g.diasemana = :diasemana6) 
				ORDER BY a.numinscritos DESC", [
				':idtemporada'=>$idtemporada,
				':diasemana1'=>$diasemana1,
				':diasemana2'=>$diasemana2,
				':diasemana3'=>$diasemana3,
				':diasemana4'=>$diasemana4,
				':diasemana5'=>$diasemana5,
				':diasemana6'=>$diasemana6
			]);
		}

		public static function listAllTurmatemporadaLocalDiaSemana($idtemporada, $idlocal, $nomeDiasemana)
		{
			if($nomeDiasemana == 'Segunda'){
				$diasemana1 = 'Segunda';
				$diasemana2 = 'Segunda e Quarta';
				$diasemana3 = 'Segunda a Sexta';
				$diasemana4 = '';
				$diasemana5 = '';
				$diasemana6 = 'Segunda a Sábado';
			}
			if($nomeDiasemana == 'Terça'){
				$diasemana1 = 'Terça';
				$diasemana2 = 'Terça e Quinta';
				$diasemana3 = 'Segunda a Sexta';
				$diasemana4 = 'Terça a Sexta';
				$diasemana5 = '';
				$diasemana6 = 'Segunda a Sábado';
			}

			if($nomeDiasemana == 'Quarta'){
				$diasemana1 = 'Quarta';
				$diasemana2 = 'Segunda e Quarta';
				$diasemana3 = 'Quarta e Sexta';
				$diasemana4 = 'Segunda a Sexta';
				$diasemana5 = 'Terça a Sexta';
				$diasemana6 = 'Segunda a Sábado';
			}
			if($nomeDiasemana == 'Quinta'){
				$diasemana1 = 'Quinta';
				$diasemana2 = 'Terça e Quinta';
				$diasemana3 = 'Segunda a Sexta';
				$diasemana4 = 'Terça a Sexta';
				$diasemana5 = '';
				$diasemana6 = 'Segunda a Sábado';
			}
			if($nomeDiasemana == 'Sexta'){
				$diasemana1 = 'Sexta';
				$diasemana2 = '';
				$diasemana3 = 'Quarta e Sexta';
				$diasemana4 = 'Segunda a Sexta';
				$diasemana5 = 'Terça a Sexta';
				$diasemana6 = 'Segunda a Sábado';
			}
			if($nomeDiasemana == 'Sábado'){
				$diasemana1 = 'Sábado';
				$diasemana2 = '';
				$diasemana3 = '';
				$diasemana4 = '';
				$diasemana5 = '';
				$diasemana6 = 'Segunda a Sábado';
			}
			if($nomeDiasemana == 'Domingo'){
				$diasemana1 = 'Domingo';
				$diasemana2 = '';
				$diasemana3 = '';
				$diasemana4 = '';
				$diasemana5 = '';
				$diasemana6 = '';
			}
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE a.idtemporada = :idtemporada
				AND e.idlocal = :idlocal 
				AND (g.diasemana = :diasemana1
				OR g.diasemana = :diasemana2
				OR g.diasemana = :diasemana3
				OR g.diasemana = :diasemana4
				OR g.diasemana = :diasemana5
				OR g.diasemana = :diasemana6) 
				ORDER BY a.numinscritos DESC", [
				':idtemporada'=>$idtemporada,
				':idlocal'=>$idlocal,
				':diasemana1'=>$diasemana1,
				':diasemana2'=>$diasemana2,
				':diasemana3'=>$diasemana3,
				':diasemana4'=>$diasemana4,
				':diasemana5'=>$diasemana5,
				':diasemana6'=>$diasemana6
			]);
		}

		public static function listAllTurmaTemporadaLocalByIdUser($idtemporada, $idlocal, $iduser)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE a.idtemporada = :idtemporada
				AND e.idlocal = :idlocal
				AND e.iduser = :iduser
				ORDER BY a.idturma", [
				':idtemporada'=>$idtemporada,
				':idlocal'=>$idlocal,
				':iduser'=>$iduser
			]);
		}
		
		public static function listAllTurmaTemporadaModalidade($idtemporada, $idmodal)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE a.idtemporada = :idtemporada
				AND l.idmodal = :idmodal
				ORDER BY a.idturma", [
				':idtemporada'=>$idtemporada,
				':idmodal'=>$idmodal
			]);
		}



		public static function listAllTurmaTemporadaProfessor($idtemporada, $iduser)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE idtemporada = :idtemporada
				AND (a.iduser = :iduser OR a.idestagiario = :iduser)
				ORDER BY i.descturma, i.idturma", [
				':idtemporada'=>$idtemporada ,
				':iduser'=>$iduser 
			]);
		}

		public static function listAllTurmaTemporadaProfessorLocal($idtemporada, $iduser, $idlocal)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE a.idtemporada = :idtemporada
				AND e.idlocal = :idlocal
				AND (a.iduser = :iduser OR a.idestagiario = :iduser)
				ORDER BY i.descturma, i.idturma", [
				':idtemporada'=>$idtemporada,
				':idlocal'=>$idlocal,
				':iduser'=>$iduser 
			]);
		}
		
		public static function listAllTurmaTemporadaEstagiario($idtemporada, $idestagiario)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE idtemporada = :idtemporada
				AND a.idestagiario = :idestagiario
				ORDER BY i.descturma DESC", [
				':idtemporada'=>$idtemporada,
				':idestagiario'=>$idestagiario 
			]);
		}
				

		public static function checkList($list)
		{
			foreach ($list as &$row) {
				
				$p = new Temporada();
				$p->setData($row);
				$row = $p->getValues();

			}
			return $list;
		}

		public function temporadaExiste($desctemporada){

			$sql = new Sql();

			$results = $sql->select("SELECT desctemporada FROM tb_temporada WHERE desctemporada = :desctemporada", [
				':desctemporada'=>$desctemporada 
			]);

			if($results){
				Temporada::setError("Temporada ".$desctemporada." já existe!");
				header("Location: /admin/temporada/create");
				exit;
			}
		}

		public static function temporadaStatusIniciadaExiste(){

			$idstatustemporadaMatriculasIniciadas = StatusTemporada::MATRICULAS_INICIADAS;
			$idstatustemporadaMatriculasEncerradas = StatusTemporada::MATRICULAS_ENCERRADAS;
			$idstatustemporadaInscricoesIniciadas = StatusTemporada::INSCRICOES_INICIADAS;			
			$idstatustemporadaTemporadaIniciada = StatusTemporada::TEMPORADA_INICIADA;
			$sql = new Sql();
			$results = $sql->select("
				SELECT idstatustemporada 
				FROM tb_temporada 
				WHERE idstatustemporada = :idstatustemporadaMatriculasIniciadas
				OR idstatustemporada = :idstatustemporadaMatriculasEncerradas
				OR idstatustemporada = :idstatustemporadaInscricoesIniciadas
				OR idstatustemporada = :idstatustemporadaTemporadaIniciada", [
					':idstatustemporadaMatriculasIniciadas'=>$idstatustemporadaMatriculasIniciadas,
					':idstatustemporadaMatriculasEncerradas'=>$idstatustemporadaMatriculasEncerradas,
					':idstatustemporadaInscricoesIniciadas'=>$idstatustemporadaInscricoesIniciadas,
					':idstatustemporadaTemporadaIniciada'=>$idstatustemporadaTemporadaIniciada
			]);

			if($results){
				return true;
			}else{
				return false;
			}			
		}		

		/*

		public function statusTemporadaIsIniciadaInscricao($idtemporada){

			$idstatustemporadaInscricaoIniciada = StatusTemporada::INSCRICOES_INICIADAS;

			$sql = new Sql();

			$results = $sql->select("SELECT idstatustemporada 
				FROM tb_temporada 
				WHERE idtemporada = :idtemporada
                AND idstatustemporada = :idstatustemporadaInscricaoIniciada" ,[
				':idtemporada'=>$idtemporada,
				'idstatustemporadaInscricaoIniciada'=>$idstatustemporadaInscricaoIniciada,
			]);

			if($results){
				return true;
			}else{
				return false;
			}
		}
		*/

		/*
		public function statusTemporadaIsIniciadaMatricula($idtemporada){

			$idstatustemporadaMatriculaIniciada = StatusTemporada::MATRICULAS_INICIADAS;

			$sql = new Sql();

			$results = $sql->select("SELECT idstatustemporada 
				FROM tb_temporada 
				WHERE idtemporada = :idtemporada
                AND idstatustemporada = :idstatustemporadaMatriculaIniciada" ,[
				':idtemporada'=>$idtemporada,
				'idstatustemporadaMatriculaIniciada'=>$idstatustemporadaMatriculaIniciada,
			]);

			if($results){
				return true;
			}else{
				return false;
			}
		}
		*/

		/*
		public function temporadaStatusMatriculaIniciadaExiste(){

			$idstatustemporadaMatriculaIniciada = StatusTemporada::MATRICULAS_INICIADAS;
			$sql = new Sql();
			$results = $sql->select("
				SELECT idstatustemporada 
				FROM tb_temporada 
				WHERE idstatustemporada = :idstatustemporadaMatriculaIniciada", [
					':idstatustemporadaMatriculaIniciada'=>$idstatustemporadaMatriculaIniciada
			]);
			if($results){
				return true;
			}else{
				return false;
			}			
		}	
		*/	
		/*
		public function temporadaStatusInscricaoIniciadaExiste(){
			$idstatustemporadaInscricaoIniciada = StatusTemporada::INSCRICOES_INICIADAS;
			$sql = new Sql();
			$results = $sql->select("
				SELECT idstatustemporada 
				FROM tb_temporada 
				WHERE idstatustemporada = :idstatustemporadaInscricaoIniciada", [
					':idstatustemporadaInscricaoIniciada'=>$idstatustemporadaInscricaoIniciada
			]);
			if($results){
				return true;
			}else{
				return false;
			}			
		}
		*/

		public function save()
		{		

			$sql = new Sql();

			$results = $sql->select("CALL sp_temporada_save (:idtemporada, :desctemporada, :idstatustemporada, :dtinicinscricao, :dtterminscricao, :dtinicmatricula, :dttermmatricula)", array(
				":idtemporada"=>$this->getidtemporada(),
				":desctemporada"=>$this->getdesctemporada(),
				":idstatustemporada"=>$this->getidstatustemporada(),
				":dtinicinscricao"=>$this->getdtinicinscricao(),
				":dtterminscricao"=>$this->getdtterminscricao(),
				":dtinicmatricula"=>$this->getdtinicmatricula(),
				":dttermmatricula"=>$this->getdttermmatricula()
			));
			
			$temporada = $results[0]['desctemporada'];	
			$idtemporada = $results[0]['idtemporada'];			

			//Sorteio::createTableSorteio($temporada, $idtemporada);	

			$this->setData($results[0]);

			//Temporada::updateFile();
			//Temporada::updateFileAdminTemporada();
			Temporada::updateFileAdminGradeTemporada();
			Temporada::updateFileEventoTemporada();
			Temporada::updateFileAgendaMinhaTemporada();
			Temporada::updateFileAdminInscricoesVazio();	
			Temporada::updateFileAdminInscricoes();
			Temporada::updateFileAdminTurmaTemporada();
			Temporada::updateFileAdminTurmaTemporadaHoje();
			Temporada::updateFileAdminTurmaTemporadaAudi();
			Temporada::updateFileProfInscricoes();
			Temporada::updateFileProfTurmaTemporada();
			Temporada::updateFileEstagiarioTurmaTemporada();
			Temporada::updateFileProfessorPorTemporada();
			Temporada::updateFileEstagiarioPorTemporada();
			Temporada::updateFileSorteioPorTemporada();
			Temporada::updateFileAdminControleFrequenciaTemporada();
			Temporada::updateFileAdminControleFrequenciaTemporadaAudi();
		}

		public function get($idtemporada)
		{
			$sql = new Sql();

			$results = $sql->select("
				SELECT * FROM tb_temporada a 
				INNER JOIN tb_statustemporada b ON b.idstatustemporada = a.idstatustemporada
				WHERE idtemporada = :idtemporada", [
				':idtemporada'=>$idtemporada 
			]);		

			if($results){

				$this->setData($results[0]);

			}else{

				Temporada::setError("Temporada selecionada não encontrada!");
				header("Location: /admin/temporada");
				exit;
			}
					
		}

		public function delete()
		{
			$sql = new Sql();

			$results = $sql->select("DELETE FROM tb_temporada WHERE idtemporada = :idtemporada", [
				':idtemporada'=>$this->getidtemporada()
			]);	

			//Temporada::updateFile();
			//Temporada::updateFileAdminTemporada();
			Temporada::updateFileAdminGradeTemporada();
			Temporada::updateFileEventoTemporada();
			Temporada::updateFileAgendaMinhaTemporada();
			Temporada::updateFileAdminInscricoesVazio();
			Temporada::updateFileAdminInscricoes();
			Temporada::updateFileAdminTurmaTemporada();
			Temporada::updateFileAdminTurmaTemporadaHoje();	
			Temporada::updateFileAdminTurmaTemporadaAudi();
			Temporada::updateFileProfInscricoes();
			Temporada::updateFileProfTurmaTemporada();
			Temporada::updateFileEstagiarioTurmaTemporada();
			Temporada::updateFileProfessorPorTemporada();
			Temporada::updateFileEstagiarioPorTemporada();
			Temporada::updateFileSorteioPorTemporada();
			Temporada::updateFileAdminControleFrequenciaTemporada();
			Temporada::updateFileAdminControleFrequenciaTemporadaAudi();
		}

		// atualiza lista de temporada no site (no rodapé) temporada-menu.html
		/*
		public static function updateFile()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li><a href="/temporada/'.$row['idtemporada'].'">'.$row['desctemporada'].'</a></li>');
			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."temporada-menu.html", implode('', $html));
		}
		*/

		
        /*
		public static function updateFileAdminTemporada()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
								   		<a href="/admin/turma-temporada/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Temporada - '.$row['desctemporada'].'
								   		</a>								   		
									</li>');

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."temporada-menu.html", implode('', $html));
		}
		*/

		public static function updateFileAdminInscricoes()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
								   		<a href="/admin/insc/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Inscrições - '.$row['desctemporada'].'
								   		</a>	
								   		<ul class="treeview-menu">
								   			<li class="treeview">
	            								
													<a href="/admin/insc-local/'.$row['idtemporada'].'/6">
									   					<i class="fa fa-link"></i> 
									   					Por locais
									   				</a>								   		
												</li>
	            								<li class="treeview">
	            								
													<a href="/admin/insc-pcd/'.$row['idtemporada'].'">
									   					<i class="fa fa-link"></i> 
									   					PCD`s
									   				</a>								   		
												</li>
												
			          						</ul>								   																   		
									</li>');

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."insc-temporada-menu.html", implode('', $html));
		}

		public static function updateFileAdminInscricoesVazio()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
								   		<a href="/admin/insc-pessoa-vazio/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Inscrições vazio - '.$row['desctemporada'].'
								   		</a>								   		
									</li>');

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."insc-temporada-vazio-menu.html", implode('', $html));
		}

		public static function updateFileProfInscricoes()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
								   		<a href="/prof/insc/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Inscrições - '.$row['desctemporada'].'
								   		</a>								   		
									</li>');

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."prof".DIRECTORY_SEPARATOR."insc-temporada-menu.html", implode('', $html));
		}

		public static function updateFileAdminTurmaTemporadaHoje()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
										<a href="/admin/turma-temporada-hoje/'.$row['idtemporada'].'">
								   			<i class="fa fa-reorder"></i> 
								   			Chamadas/Turmas '.$row['desctemporada'].'
								   		</a>

									   		<ul class="treeview-menu">
	            								<li class="treeview">
	            								
													<a href="/admin/turma-temporada-hoje/'.$row['idtemporada'].'/local/6">
									   					<i class="fa fa-reorder"></i> 
									   					Por Locais
									   				</a>								   		
												</li>											
			          						</ul>								   		
									</li>'
								);

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."turma-temporada-menu-hoje.html", implode('', $html));
		}

		public static function updateFileAdminGradeTemporada()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
										<a href="/admin">
								   			<i class="fa fa-link"></i> 
								   			Grades/ Temporada '.$row['desctemporada'].'
								   		</a>

									   		<ul class="treeview-menu">
	            								<li class="treeview">
	            								
													<a href="/admin/locaisgradehorario/'.$row['idtemporada'].'">
									   					<i class="fa fa-link"></i> 
									   					Grade Locais
									   				</a>								   		
												</li>
			          						</ul>								   		
									</li>'
								);

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."grade-temporada-menu.html", implode('', $html));
		}

		public static function updateFileAdminTurmaTemporada()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
										<a href="/admin/turma-temporada/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Turmas/Temporada '.$row['desctemporada'].'
								   		</a>

									   		<ul class="treeview-menu">
	            								<li class="treeview">
	            								
													<a href="/admin/turma-temporada/'.$row['idtemporada'].'/local/6">
									   					<i class="fa fa-link"></i> 
									   					Por Locais
									   				</a>								   		
												</li>
												<li class="treeview">
												
													<a href="/admin/turma-temporada/'.$row['idtemporada'].'/modalidade/1">
													
											   			<i class="fa fa-link"></i> 
											   			Por modalidades
											   		</a>										   		
												</li>
			          						</ul>								   		
									</li>'
								);

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."turma-temporada-menu.html", implode('', $html));
		}
		
		public static function updateFileAdminTurmaTemporadaAudi()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, 
									'<li class="treeview">
										<a href="/admin/turma-temporada-audi/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Turmas/Temporada '.$row['desctemporada'].'
								   		</a>

									   		<ul class="treeview-menu">
	            								<li class="treeview">
													<a href="/admin/turma-temporada-audi/'.$row['idtemporada'].'/local/6">
									   					<i class="fa fa-link"></i> 
									   					Por Locais
									   				</a>								   		
												</li>
												<li class="treeview">
													<a href="/admin/turma-temporada-audi/'.$row['idtemporada'].'/modalidade/1">
											   			<i class="fa fa-link"></i> 
											   			Por modalidades
											   		</a>										   		
												</li>
			          						</ul>								   		
									</li>'


								);

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."turma-temporada-menu-audi.html", implode('', $html));
		}
		
		public static function updateFileAdminControleFrequenciaTemporada()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, 
									'<li class="treeview">
										<a href="/admin/controle-frequencia/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Controle de Frequência '.$row['desctemporada'].'
								   		</a>

									   		<ul class="treeview-menu">
	            								<li class="treeview">
													<a href="/admin/controle-frequencia-locais/'.$row['idtemporada'].'">
									   					<i class="fa fa-link"></i> 
									   					Por Locais
									   				</a>								   		
												</li>
												<li class="treeview">
													<a href="/admin/controle-frequencia-modalidades/'.$row['idtemporada'].'">
											   			<i class="fa fa-link"></i> 
											   			Por modalidades
											   		</a>										   		
												</li>
			          						</ul>								   		
									</li>'


								);

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."controle-frequencia-menu.html", implode('', $html));
		}
		
		public static function updateFileAdminControleFrequenciaTemporadaAudi()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, 
									'<li class="treeview">
										<a href="/admin/controle-frequencia-audi/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Controle de Frequência '.$row['desctemporada'].'
								   		</a>

									   		<ul class="treeview-menu">
	            								<li class="treeview">
													<a href="/admin/controle-frequencia-locais-audi/'.$row['idtemporada'].'">
									   					<i class="fa fa-link"></i> 
									   					Por Locais
									   				</a>								   		
												</li>
												<li class="treeview">
													<a href="/admin/controle-frequencia-modalidades-audi/'.$row['idtemporada'].'">
											   			<i class="fa fa-link"></i> 
											   			Por modalidades
											   		</a>										   		
												</li>
			          						</ul>								   		
									</li>'


								);

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."controle-frequencia-menu-audi.html", implode('', $html));
		}

		public static function updateFileProfTurmaTemporada()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
										<a href="/prof/local-por-turma-temporada/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Turmas '.$row['desctemporada'].'
								   		</a>								   		
									</li>'
								);

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."prof".DIRECTORY_SEPARATOR."turma-temporada-menu.html", implode('', $html));
		}

		public static function updateFileEventoTemporada()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">						   		
									<a href="/admin/eventos-por-temporada/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Eventos - '.$row['desctemporada'].'
								   		</a> 
								   	</li>'
								);

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."evento-menu.html", implode('', $html));
		}
		
		public static function updateFileEstagiarioTurmaTemporada()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
										<a href="/estagiario/turma-temporada/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Turmas '.$row['desctemporada'].'
								   		</a>								   		
									</li>'
								);

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."prof".DIRECTORY_SEPARATOR."turma-temporada-menu-estagiario.html", implode('', $html));
		}
		
		public static function updateFileProfessorPorTemporada()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
									   			<a href="/admin/professor-temporada/'.$row['idtemporada'].'">
									   				<i class="fa fa-link"></i>
									   				Profs Temporada '.$row['desctemporada'].'
									   			</a>
									   		</li>'
								);

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."professor-temporada-menu.html", implode('', $html));
		}
		
		public static function updateFileEstagiarioPorTemporada()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
									   			<a href="/admin/estagiario-temporada/'.$row['idtemporada'].'">
									   				<i class="fa fa-link"></i>
									   				Estagiário Temporada '.$row['desctemporada'].'
									   			</a>
									   		</li>'
								);

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."estagiario-temporada-menu.html", implode('', $html));
		}

		public static function updateFileAgendaMinhaTemporada()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<a href="/minhaagenda/'.$row['desctemporada'].'">'.$row['desctemporada'].'</a> '
								);

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."minhaagenda-menu.html", implode('', $html));
		}

		public static function updateFileSorteioPorTemporada()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
									   			<a href="/admin/sorteio/'.$row['idtemporada'].'">
									   				<i class="fa fa-link"></i>
									   				Sorteio Temporada '.$row['desctemporada'].'
									   			</a>
									   		</li>'
								);

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."sorteio-temporada-menu.html", implode('', $html));
		}
		
		public function getTurmaTemporadaPage($page = 1, $itemsPerPage = 4)
		{

			$start = ($page - 1) * $itemsPerPage;

			$sql = new Sql();

			$results = $sql->select("

				SELECT SQL_CALC_FOUND_ROWS *
				FROM tb_turma a
				INNER JOIN tb_turmatemporada b ON a.idturma = b.idturma
	            INNER JOIN tb_espaco c ON c.idespaco = a.idespaco
	            INNER JOIN tb_horario d ON d.idhorario = a.idhorario
	            INNER JOIN tb_atividade e ON a.idativ = e.idativ
	            INNER JOIN tb_fxetaria f ON e.idfxetaria = f.idfxetaria
				INNER JOIN tb_users g ON a.iduser = g.iduser
				INNER JOIN tb_persons h ON g.idperson = h.idperson
	            INNER JOIN tb_espaco i ON a.idespaco = i.idespaco
				INNER JOIN tb_local j ON j.idlocal = c.idlocal
				INNER JOIN tb_temporada k ON k.idtemporada = b.idtemporada
				INNER JOIN tb_statustemporada l ON l.idstatustemporada = k.idstatustemporada
				INNER JOIN tb_turmastatus m ON m.idturmastatus = b.idturmastatus
				WHERE k.idtemporada = :idtemporada
				ORDER BY a.numinscritos
				LIMIT $start, $itemsPerPage;
				
			", [
				':idtemporada'=>$this->getidtemporada()
			]);

			$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

			return [
				'data'=>Turma::checkList($results),
				'total'=>(int)$resultTotal[0]["nrtotal"],
				'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
			];
		}

		public function getTurma($related = true)
		{
			$sql = new Sql();

			if ($related === true) {

				return $sql->select("
					SELECT * FROM tb_turma
					INNER JOIN tb_atividade 
					using(idativ)
					-- INNER JOIN tb_turmatemporada d
					-- USING(idturma)			
					INNER JOIN tb_modalidade
					using(idmodal)   
					INNER JOIN tb_fxetaria
					using(idfxetaria)             
	                INNER JOIN tb_espaco 
					using(idespaco)
	                -- INNER JOIN tb_users 
					-- using(iduser) 
					-- INNER JOIN tb_persons 
					-- using(idperson) 
					INNER JOIN tb_local 
					using(idlocal)
					INNER JOIN tb_horario 
					using(idhorario)
					-- INNER JOIN tb_turmastatus 
					-- using(idturmastatus) 				
						WHERE idturma IN(
						SELECT a.idturma
						FROM tb_turma a
						INNER JOIN tb_turmatemporada b ON b.idturma = a.idturma
						INNER JOIN tb_turmastatus d ON d.idturmastatus = b.idturmastatus
						WHERE b.idtemporada = :idtemporada ORDER BY descturma
					) ORDER BY idturma;
				", [
					':idtemporada'=>$this->getidtemporada()
				]);

			} else {

				return $sql->select("
					SELECT * FROM tb_turma
					INNER JOIN tb_atividade 
					using(idativ)
					INNER JOIN tb_modalidade
					using(idmodal)   
					INNER JOIN tb_fxetaria
					using(idfxetaria)             
	                INNER JOIN tb_espaco 
					using(idespaco)
	                -- INNER JOIN tb_users 
					-- using(iduser) 
					-- INNER JOIN tb_persons 
					-- using(idperson) 
					INNER JOIN tb_local 
					using(idlocal)
					INNER JOIN tb_horario 
					using(idhorario)
					-- INNER JOIN tb_turmastatus 
					-- using(idturmastatus) 							
					WHERE idturma NOT IN(
						SELECT a.idturma
						FROM tb_turma a
						INNER JOIN tb_turmatemporada b ON a.idturma = b.idturma
						INNER JOIN tb_users c ON c.iduser = b.iduser
						INNER JOIN tb_turmastatus d ON d.idturmastatus = b.idturmastatus
						WHERE b.idtemporada = :idtemporada ORDER BY a.descturma
					) ORDER BY idturma;
				", [
					':idtemporada'=>$this->getidtemporada()
				]);
			}		
		}

		public function alterarStatusTemporadaParaIncricoesIniciadas($dtInicinscricao, $idtemporada){
			$hoje = date('Y-m-d H:i:s');
			$data = date($dtInicinscricao);
			$intHoje = strtotime($hoje);
			$intData = strtotime($data);

			if($intHoje > $intData){

				Temporada::updateStatusTemporadaParaInscricoesIniciadas($idtemporada);					
			}
		} 		
		public function updateStatusTemporadaParaInscricoesIniciadas($idtemporada){
			$sql = new Sql();
			$idstatustemporadaInscricoesIniciadas = StatusTemporada::INSCRICOES_INICIADAS;
			$sql->query("UPDATE tb_temporada SET idstatustemporada = :idstatustemporadaInscricoesIniciadas  WHERE idtemporada = :idtemporada", [
				'idstatustemporadaInscricoesIniciadas'=>$idstatustemporadaInscricoesIniciadas,
				':idtemporada'=>$idtemporada
			]);
		}
		
		public function alterarStatusTemporadaParaMatriculasIniciadas($dtTerminscricao, $idtemporada){

			$hoje = date('Y-m-d H:i:s');
			$data = date($dtTerminscricao);
			$intHoje = strtotime($hoje);
			$intData = strtotime($data);

			if($intHoje > $intData){

				Temporada::updateStatusTemporadaParaMatriculasIniciadas($idtemporada);					
			}
		} 		

		// Esta função é chamada quando é realizado o sorteio (Sorteio::Sortear)
		public function updateStatusTemporadaParaMatriculasIniciadas($idtemporada){
			$sql = new Sql();
			$idstatustemporadaMatriculasIniciadas = StatusTemporada::MATRICULAS_INICIADAS;
			$sql->query("UPDATE tb_temporada SET idstatustemporada = :idstatustemporadaMatriculasIniciadas  WHERE idtemporada = :idtemporada", [
				'idstatustemporadaMatriculasIniciadas'=>$idstatustemporadaMatriculasIniciadas,
				':idtemporada'=>$idtemporada
			]);
		}

		public function alterarStatusTemporadaParaInscricoesEncerradas($dtTerminscricao, $idtemporada){
			$hoje = date('Y-m-d H:i:s');
			$data = date($dtTerminscricao);
			$intHoje = strtotime($hoje);
			$intData = strtotime($data);

			if($intHoje > $intData){
				Temporada::updateStatusTemporadaParaInscricoesEncerradas($idtemporada);				
			}
		} 
		public function updateStatusTemporadaParaInscricoesEncerradas($idtemporada){
			$sql = new Sql();
			$idstatustemporadaInscricoesEncerradas = StatusTemporada::INSCRICOES_ENCERRADAS;
			$sql->query("UPDATE tb_temporada SET idstatustemporada = :idstatustemporadaInscricoesEncerradas  WHERE idtemporada = :idtemporada", [
				'idstatustemporadaInscricoesEncerradas'=>$idstatustemporadaInscricoesEncerradas,
				':idtemporada'=>$idtemporada
			]);
		}


		public function alterarStatusTemporadaParaMatriculasEncerradas($dtTermmatricula, $idtemporada){
			$hoje = date('Y-m-d H:i:s');
			$data = date($dtTermmatricula);
			$intHoje = strtotime($hoje);
			$intData = strtotime($data);

			if($intHoje > $intData){
				Temporada::updateStatusTemporadaMatriculasEncerradas($idtemporada);
			}
		}	
		public function updateStatusTemporadaMatriculasEncerradas($idtemporada){
			$sql = new Sql();
			$idstatustemporadaMatriculasEncerradas = StatusTemporada::MATRICULAS_ENCERRADAS;
			$sql->query("UPDATE tb_temporada SET idstatustemporada = :idstatustemporadaMatriculasEncerradas  WHERE idtemporada = :idtemporada", [
				'idstatustemporadaMatriculasEncerradas'=>$idstatustemporadaMatriculasEncerradas,
				':idtemporada'=>$idtemporada
			]);
		}

		public function numMaxInscritos($idtemporada){

			$sql = new Sql();
			
			$results =  $sql->select("SELECT MAX(numinscritos) as maximoInscritos FROM tb_turmatemporada WHERE idtemporada = :idtemporada", [
				':idtemporada'=>$idtemporada
			]);

			return $results;			
		}

		public static function updateNumMatriculadosMais($idturma, $idtemporada){

			$sql = new Sql();
			
			$sql->select("CALL sp_turmatemporada_update_nummatriculados_mais(:idturma, :idtemporada)", array(
				":idturma"=>$idturma,
				":idtemporada"=>$idtemporada
			));
		}
		
		public static function updateNumMatriculadosMenos($idturma, $idtemporada){

			$sql = new Sql();
			
			$sql->select("CALL sp_turmatemporada_update_nummatriculados_menos(:idturma, :idtemporada)", array(
				":idturma"=>$idturma,
				":idtemporada"=>$idtemporada
			));
		}

		public static function updateNumInscritosMais($idturma, $idtemporada){

			$sql = new Sql();
			
			$sql->select("CALL sp_turmatemporada_update_numinscritos_mais(:idturma, :idtemporada)", array(
				":idturma"=>$idturma,
				":idtemporada"=>$idtemporada
			));
		}
		
		public function updateNumInscritosMenos($idturma, $idtemporada){

			$sql = new Sql();
			
			$sql->select("CALL sp_turmatemporada_update_numinscritos_menos(:idturma, :idtemporada)", array(
				":idturma"=>$idturma,
				":idtemporada"=>$idtemporada
			));
		}
		
		/*
		public function addTurma(Turma $turma)
		{
			$iduser = null;
			$idturmastatus = 3;
			$numinscritos = 0;
			$nummatriculados = 0;

			$sql = new Sql();

			/*
			$sql->query("INSERT INTO tb_turmatemporada (idtemporada, idturma) VALUES(:idtemporada, :idturma)", [
				':idtemporada'=>$this->getidtemporada(),
				':idturma'=>$turma->getidturma()
			]);
			*/
			/*

			$sql->query("CALL sp_turmatemporada_add (:idtemporada, :idturma, :iduser, :idturmastatus, :numinscritos, :nummatriculados)", [
				':idtemporada'=>$this->getidtemporada(),
				':idturma'=>$turma->getidturma(),
				':iduser'=>$iduser,
				':idturmastatus'=>$idturmastatus,
				':numinscritos'=>$numinscritos,
				':nummatriculados'=>$nummatriculados
			]);


			//var_dump($sql);
			//exit;
		}
		*/
        
		public function addTurma(Turma $turma)
		{
			$sql = new Sql();

			$sql->query("INSERT INTO tb_turmatemporada (idtemporada, idturma) VALUES(:idtemporada, :idturma)", [
				':idtemporada'=>$this->getidtemporada(),
				':idturma'=>$turma->getidturma()
			]);
		}
		

		public static function removeTurma(Turma $turma)
		{
			$sql = new Sql();

			$sql->query("SET FOREIGN_KEY_CHECKS=0; DELETE FROM tb_turmatemporada WHERE idtemporada = :idtemporada AND idturma = :idturma; SET FOREIGN_KEY_CHECKS=1;", [
				':idtemporada'=>$this->getidtemporada(),
				':idturma'=>$turma->getidturma()
			]);
		}

		public function addTurmaTemporadaUser($idtemporada, $idturma, $iduser)
		{
			$sql = new Sql();

			$sql->query("UPDATE tb_turmatemporada SET iduser = :iduser WHERE idturma = :idturma AND idtemporada = :idtemporada", [
				':idtemporada'=>$idtemporada,
				':idturma'=>$idturma,
				':iduser'=>$iduser
			]);
		}

		public function removeTurmaTemporadaUser($idtemporada, $idturma, $iduser)
		{
		    
			$sql = new Sql();

			$sql->query("UPDATE tb_turmatemporada SET iduser = 1 WHERE idturma = :idturma AND idtemporada = :idtemporada AND iduser = :iduser", [
				':idtemporada'=>$idtemporada,
				':idturma'=>$idturma,
				':iduser'=>$iduser
			]);
		}
		
		public function addTurmaTemporadaUserEstagiario($idtemporada, $idturma, $idestagiario)
		{
			$sql = new Sql();

			$sql->query("UPDATE tb_turmatemporada SET idestagiario = :idestagiario WHERE idturma = :idturma AND idtemporada = :idtemporada", [
				':idtemporada'=>$idtemporada,
				':idturma'=>$idturma,
				':idestagiario'=>$idestagiario
			]);
		}
		
		public function removeTurmaTemporadaUserEstagiario($idtemporada, $idturma, $idestagiario)
		{
			$sql = new Sql();


			$sql->query("UPDATE tb_turmatemporada SET idestagiario = 1 WHERE idturma = :idturma AND idtemporada = :idtemporada AND idestagiario = :idestagiario", [
				':idtemporada'=>$idtemporada,
				':idturma'=>$idturma,
				':idestagiario'=>$idestagiario
			]);
		}
		
		public static function seTurmaTemporadaExiste($idtemporada)
		{
			$sql = new Sql();

			return $sql->select("
				SELECT *
				FROM tb_turmatemporada
				WHERE idtemporada = :idtemporada", [
				':idtemporada'=>$idtemporada				
			]);
		}

		public static function professorRelacionadoTurmatemporadaExiste($idtemporada, $idturma)
		{
			$sql = new Sql();

			return $sql->select("
				SELECT *
				FROM tb_turmatemporada
				WHERE idtemporada = :idtemporada 
				AND idturma = :idturma
				AND iduser != 1", [
				':idtemporada'=>$idtemporada,
				':idturma'=>$idturma								
			]);
		}
		
		public static function inscRelacionadoTurmatemporadaExiste($idtemporada, $idturma)
		{
			$sql = new Sql();

			return $sql->select("
				SELECT *
				FROM tb_insc
				WHERE idtemporada = :idtemporada 
				AND idturma = :idturma", [
				':idtemporada'=>$idtemporada,
				':idturma'=>$idturma								
			]);
		}
		
		public function setNummatriculadosTemporada($idtemporada, $idturma){

				$sql = new Sql();

			$results =  $sql->select("
				SELECT nummatriculados
				FROM tb_turmatemporada
				WHERE idtemporada = :idtemporada 
				AND idturma = :idturma", [
				':idtemporada'=>$idtemporada,
				':idturma'=>$idturma								
			]);

			return $results[0];		

		}
		
		public static function selecionaTemporadaMatriEncerrada(){

			$idstatustemporada = 5;

			$sql = new Sql();
			
			$results =  $sql->select("SELECT idtemporada FROM tb_temporada WHERE idstatustemporada = :idstatustemporada;", [
				'idstatustemporada'=>$idstatustemporada
			]);

			return $results;			
		}
		
		public static function atualizaStatusTurmaTemporada($idturma, $idtemporada, $status){

			$sql = new Sql();

			$sql->query("UPDATE tb_turmatemporada SET idturmastatus = :status  WHERE idtemporada = :idtemporada AND idturma = :idturma", [
				'status'=>$status,
				':idtemporada'=>$idtemporada,
				':idturma'=>$idturma
			]);			 

		}
		
		public static function getStatusTurmaTemporada($idturma, $idtemporada){

			$sql = new Sql();

			$results = $sql->select("SELECT idturmastatus FROM tb_turmatemporada WHERE idturma = :idturma AND idtemporada = :idtemporada", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
			]);

			return (int)$results[0]['idturmastatus'];

		}

		public static function getTurmaByIdturmaTemporada($idturma, $idtemporada){

			$sql = new Sql();

			$results = $sql->select("SELECT idturma FROM tb_turmatemporada WHERE idturma = :idturma AND idtemporada = :idtemporada", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
			]);

			if($results){
				return (int)$results[0]['idturma'];
			}else{
				return 0;
			}
		}

		public static function getIduserByTurmaTemporada($idturma, $idtemporada){

			$sql = new Sql();

			$results = $sql->select("SELECT iduser 
				FROM tb_turmatemporada 
				WHERE idturma = :idturma 
				AND idtemporada = :idtemporada", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
			]);

			if($results){
				return (int)$results[0]['iduser'];
			}else{
				return 0;
			}
		}

		public static function getIdTemporadaByDesctemporada($desctemporada){

			$sql = new Sql();

			$results = $sql->select("SELECT idtemporada FROM tb_temporada WHERE desctemporada = :desctemporada", [
			':desctemporada'=>$desctemporada
			]);

			if($results){
				return (int)$results[0]['idtemporada'];
			}else{
				return 0;
			}
		}

		public static function listAllEspacoTurmaTemporada($idtemporada, $idlocal)
		{
			$sql = new Sql();

			return $sql->select("
				SELECT distinct idespaco, nomeespaco, apelidolocal
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				WHERE idtemporada = :idtemporada
                AND idlocal = :idlocal
				", [
				':idtemporada'=>$idtemporada,
				':idlocal'=>$idlocal 
			]);
		}

		public static function AlteraDataInicioInsc($idturma, $idtemporada, $novadata)
		{
			$sql = new Sql();			
			$sql->query("UPDATE tb_turmatemporada SET data_insc_inicial = :novadata WHERE idturma = :idturma AND idtemporada = :idtemporada", [
				':idturma'=>$idturma,
				':idtemporada'=>$idtemporada,
				':novadata'=>$novadata
			]);
		}

		public static function AlteraDataFimInsc($idturma, $idtemporada, $novadata)
		{
			$sql = new Sql();			
			$sql->query("UPDATE tb_turmatemporada SET data_insc_final = :novadata WHERE idturma = :idturma AND idtemporada = :idtemporada", [
				':idturma'=>$idturma,
				':idtemporada'=>$idtemporada,
				':novadata'=>$novadata
			]);
		}

		public static function AlteraDataInicioMatr($idturma, $idtemporada, $novadata)
		{
			$sql = new Sql();			
			$sql->query("UPDATE tb_turmatemporada SET data_matr_inicial = :novadata WHERE idturma = :idturma AND idtemporada = :idtemporada", [
				':idturma'=>$idturma,
				':idtemporada'=>$idtemporada,
				':novadata'=>$novadata
			]);
		}

		public static function AlteraDataFimMatr($idturma, $idtemporada, $novadata)
		{
			$sql = new Sql();			
			$sql->query("UPDATE tb_turmatemporada SET data_matr_final = :novadata WHERE idturma = :idturma AND idtemporada = :idtemporada", [
				':idturma'=>$idturma,
				':idtemporada'=>$idtemporada,
				':novadata'=>$novadata
			]);
		}

		public static function AlteraDataInicioAula($idturma, $idtemporada, $novadata)
		{
			$sql = new Sql();			
			$sql->query("UPDATE tb_turmatemporada SET data_aula_inicial = :novadata WHERE idturma = :idturma AND idtemporada = :idtemporada", [
				':idturma'=>$idturma,
				':idtemporada'=>$idtemporada,
				':novadata'=>$novadata
			]);
		}

		public static function AlteraDataFimAula($idturma, $idtemporada, $novadata)
		{
			$sql = new Sql();			
			$sql->query("UPDATE tb_turmatemporada SET data_aula_final = :novadata WHERE idturma = :idturma AND idtemporada = :idtemporada", [
				':idturma'=>$idturma,
				':idtemporada'=>$idtemporada,
				':novadata'=>$novadata
			]);
		}

		public static function setError($msg)
		{

			$_SESSION[Temporada::ERROR] = $msg;

		}

		public static function getError()
		{

			$msg = (isset($_SESSION[Temporada::ERROR]) && $_SESSION[Temporada::ERROR]) ? $_SESSION[Temporada::ERROR] : '';

			Temporada::clearError();

			return $msg;

		}

		public static function clearError()
		{

			$_SESSION[Temporada::ERROR] = NULL;

		}

		public static function setSuccess($msg)
		{

			$_SESSION[Temporada::SUCCESS] = $msg;

		}

		public static function getSuccess()
		{

			$msg = (isset($_SESSION[Temporada::SUCCESS]) && $_SESSION[Temporada::SUCCESS]) ? $_SESSION[Temporada::SUCCESS] : '';

			Temporada::clearSuccess();

			return $msg;
		}

		public static function clearSuccess()
		{

			$_SESSION[Temporada::SUCCESS] = NULL;

		}			
	}
	?>