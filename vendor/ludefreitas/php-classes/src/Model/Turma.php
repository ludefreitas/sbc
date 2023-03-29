<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Turma extends Model {

	const SESSION = "Turma";
	const SESSION_ERROR = "TurmaError";
	const ERROR = "TurmaError";
	const ERROR_REGISTER = "TurmaErrorRegister";
	const SUCCESS = "TurmaSucesss";	

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_turma a 
			INNER JOIN tb_users b
			using(iduser)
			INNER JOIN tb_persons c
			using(idperson)
			INNER JOIN tb_atividade d
			using(idativ)
			INNER JOIN tb_espaco e
			using(idespaco)
			INNER JOIN tb_local f
			using(idlocal)
			-- INNER JOIN tb_turmastatus g
			-- using(idturmastatus)
			INNER JOIN tb_horario h
			using(idhorario)
			INNER JOIN tb_fxetaria i
			using(idfxetaria)
			INNER JOIN tb_modalidade J         
			using(idmodal)            
			ORDER BY a.descturma");
	}

	/*
	public static function listAllTurmaTemporada()

	{
		$idStatusTemporadaTemporadaIniciada = StatusTemporada::TEMPORADA_INICIADA;
		$idStatusTemporadaInscricaoIniciada = StatusTemporada::INSCRICOES_INICIADAS;
		$idStatusTemporadaMatriculaIniciada = StatusTemporada::MATRICULAS_INICIADAS;
		$idStatusTemporadaMatriculasEncerradas = StatusTemporada::MATRICULAS_ENCERRADAS;
		$idStatusTemporadaInscricoesEncerradas = StatusTemporada::INSCRICOES_ENCERRADAS;

		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_turmatemporada a 
			INNER JOIN tb_turma j            
			using(idturma)
			INNER JOIN tb_users b
			using(iduser)
			INNER JOIN tb_persons c
			using(idperson)
			INNER JOIN tb_atividade d
			using(idativ)
			INNER JOIN tb_espaco e
			using(idespaco)
			INNER JOIN tb_local f
			using(idlocal)
			INNER JOIN tb_turmastatus g
			using(idturmastatus)
			INNER JOIN tb_horario h
			using(idhorario)
			INNER JOIN tb_fxetaria i
			using(idfxetaria)
            INNER JOIN tb_temporada k          
			using(idtemporada)   
            INNER JOIN tb_statustemporada l          
			using(idstatustemporada)
			INNER JOIN tb_modalidade m         
			using(idmodal)
      		WHERE k.idstatustemporada = :idStatusTemporadaInscricaoIniciada 
      		OR k.idstatustemporada = :idStatusTemporadaMatriculaIniciada
      		OR k.idstatustemporada = :idStatusTemporadaMatriculaIniciada
      		OR k.idstatustemporada = :idStatusTemporadaMatriculasEncerradas
			-- ORDER BY a.descturma
			ORDER BY RAND()", [
				':idStatusTemporadaInscricaoIniciada'=>$idStatusTemporadaInscricaoIniciada,
				':idStatusTemporadaMatriculaIniciada'=>$idStatusTemporadaMatriculaIniciada,
				':idStatusTemporadaTemporadaIniciada'=>$idStatusTemporadaTemporadaIniciada,
				':idStatusTemporadaTemporadaIniciada'=>$idStatusTemporadaMatriculasEncerradas
			]);
	}
	*/


	/*
	public static function getPageTurmaTemporada($page = 1, $itemsPerPage = 50)
	{
		$idStatusTemporadaTemporadaIniciada = StatusTemporada::TEMPORADA_INICIADA;
		$idStatusTemporadaInscricaoIniciada = StatusTemporada::INSCRICOES_INICIADAS;
		$idStatusTemporadaMatriculaIniciada = StatusTemporada::MATRICULAS_INICIADAS;
		$idStatusTemporadaMatriculasEncerradas = StatusTemporada::MATRICULAS_ENCERRADAS;
		$idStatusTemporadaInscricoesEncerradas = StatusTemporada::INSCRICOES_ENCERRADAS;

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_turmatemporada a 
			INNER JOIN tb_turma j            
			using(idturma)
			INNER JOIN tb_users b
			using(iduser)
			INNER JOIN tb_persons c
			using(idperson)
			INNER JOIN tb_atividade d
			using(idativ)
			INNER JOIN tb_espaco e
			using(idespaco)
			INNER JOIN tb_local f
			using(idlocal)
			INNER JOIN tb_turmastatus g
			using(idturmastatus)
			INNER JOIN tb_horario h
			using(idhorario)
			INNER JOIN tb_fxetaria i
			using(idfxetaria)
            INNER JOIN tb_temporada k          
			using(idtemporada)   
            INNER JOIN tb_statustemporada l          
			using(idstatustemporada)
			INNER JOIN tb_modalidade m         
			using(idmodal)
			WHERE k.idstatustemporada = :idStatusTemporadaInscricaoIniciada 
      		OR k.idstatustemporada = :idStatusTemporadaMatriculaIniciada
      		OR k.idstatustemporada = :idStatusTemporadaMatriculaIniciada
      		OR k.idstatustemporada = :idStatusTemporadaMatriculasEncerradas
			LIMIT $start, $itemsPerPage;
			", [
				':idStatusTemporadaInscricaoIniciada'=>$idStatusTemporadaInscricaoIniciada,
				':idStatusTemporadaMatriculaIniciada'=>$idStatusTemporadaMatriculaIniciada,
				':idStatusTemporadaTemporadaIniciada'=>$idStatusTemporadaTemporadaIniciada,
				':idStatusTemporadaTemporadaIniciada'=>$idStatusTemporadaMatriculasEncerradas
			]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}
	*/

	public static function getPageTurmaTemporada()
	{
		$idStatusTemporadaTemporadaIniciada = StatusTemporada::TEMPORADA_INICIADA;
		$idStatusTemporadaInscricaoIniciada = StatusTemporada::INSCRICOES_INICIADAS;
		$idStatusTemporadaMatriculaIniciada = StatusTemporada::MATRICULAS_INICIADAS;
		$idStatusTemporadaMatriculasEncerradas = StatusTemporada::MATRICULAS_ENCERRADAS;
		$idStatusTemporadaInscricoesEncerradas = StatusTemporada::INSCRICOES_ENCERRADAS;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_turmatemporada a 
			INNER JOIN tb_turma j            
			using(idturma)
			INNER JOIN tb_users b
			using(iduser)
			INNER JOIN tb_persons c
			using(idperson)
			INNER JOIN tb_atividade d
			using(idativ)
			INNER JOIN tb_espaco e
			using(idespaco)
			INNER JOIN tb_local f
			using(idlocal)
			-- INNER JOIN tb_turmastatus g
			-- using(idturmastatus)
			INNER JOIN tb_horario h
			using(idhorario)
			INNER JOIN tb_fxetaria i
			using(idfxetaria)
            INNER JOIN tb_temporada k          
			using(idtemporada)   
            INNER JOIN tb_statustemporada l          
			using(idstatustemporada)
			INNER JOIN tb_modalidade m         
			using(idmodal)
      		WHERE b.iduser != 1 
      		AND (k.idstatustemporada = :idStatusTemporadaMatriculasEncerradas 
      		OR k.idstatustemporada = :idStatusTemporadaInscricaoIniciada 
      		OR k.idstatustemporada = :idStatusTemporadaMatriculaIniciada
      		OR k.idstatustemporada = :idStatusTemporadaTemporadaIniciada
      		OR k.idstatustemporada = :idStatusTemporadaInscricoesEncerradas)
      		ORDER BY a.numinscritos, RAND()
			", [
				':idStatusTemporadaMatriculasEncerradas'=>$idStatusTemporadaMatriculasEncerradas,
				':idStatusTemporadaInscricaoIniciada'=>$idStatusTemporadaInscricaoIniciada,
				':idStatusTemporadaMatriculaIniciada'=>$idStatusTemporadaMatriculaIniciada,
				':idStatusTemporadaTemporadaIniciada'=>$idStatusTemporadaTemporadaIniciada,
				':idStatusTemporadaInscricoesEncerradas'=>$idStatusTemporadaInscricoesEncerradas
			]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"]
			//'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];
	}

	public static function getPageSearchTurmaTemporada($search, $page = 1, $itemsPerPage = 50)
	{
		$idStatusTemporadaTemporadaIniciada = StatusTemporada::TEMPORADA_INICIADA;
		$idStatusTemporadaInscricaoIniciada = StatusTemporada::INSCRICOES_INICIADAS;
		$idStatusTemporadaMatriculaIniciada = StatusTemporada::MATRICULAS_INICIADAS;
		$idStatusTemporadaMatriculasEncerradas = StatusTemporada::MATRICULAS_ENCERRADAS;
		$idStatusTemporadaInscricoesEncerradas = StatusTemporada::INSCRICOES_ENCERRADAS;

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_turmatemporada a 
			INNER JOIN tb_turma j            
			ON j.idturma = a.idturma
			INNER JOIN tb_users b
			using(iduser)
			INNER JOIN tb_persons c
			using(idperson)
			INNER JOIN tb_atividade d
			using(idativ)
			INNER JOIN tb_espaco e
			using(idespaco)
			INNER JOIN tb_local f
			using(idlocal)
			-- INNER JOIN tb_turmastatus g
			-- using(idturmastatus)
			INNER JOIN tb_horario h
			using(idhorario)
			INNER JOIN tb_fxetaria i
			using(idfxetaria)
            INNER JOIN tb_temporada k          
			using(idtemporada)   
            INNER JOIN tb_statustemporada l          
			using(idstatustemporada)
			INNER JOIN tb_modalidade m         
			using(idmodal)
      		WHERE ( b.iduser != 1 AND (
      			k.idstatustemporada = :idStatusTemporadaMatriculasEncerradas  
      			OR k.idstatustemporada = :idStatusTemporadaInscricaoIniciada 
      			OR k.idstatustemporada = :idStatusTemporadaMatriculaIniciada
      			OR k.idstatustemporada = :idStatusTemporadaTemporadaIniciada
      			OR k.idstatustemporada = :idStatusTemporadaInscricoesEncerradas)
      		) AND (
      			j.descturma LIKE :search
				OR d.descativ LIKE :search
				OR d.origativ LIKE :search
				OR d.tipoativ LIKE :search
				OR d.prograativ LIKE :search
				OR c.desperson LIKE :search
				OR e.nomeespaco LIKE :search
				OR f.apelidolocal LIKE :search 
				-- OR g.desstatus LIKE :search
				OR h.horainicio LIKE :search
				OR h.diasemana LIKE :search
				OR h.periodo LIKE :search
				OR i.descrfxetaria LIKE :search	
				OR m.descmodal LIKE :search
			)	
			ORDER BY a.numinscritos, RAND()											
			-- ORDER BY a.descturma
			-- LIMIT $start, $itemsPerPage;
		", [
			':idStatusTemporadaMatriculasEncerradas'=>$idStatusTemporadaMatriculasEncerradas,
			':idStatusTemporadaInscricaoIniciada'=>$idStatusTemporadaInscricaoIniciada,
			':idStatusTemporadaMatriculaIniciada'=>$idStatusTemporadaMatriculaIniciada,
			':idStatusTemporadaTemporadaIniciada'=>$idStatusTemporadaTemporadaIniciada,
			':idStatusTemporadaInscricoesEncerradas'=>$idStatusTemporadaInscricoesEncerradas,
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function listAllTurmaTemporadaModalidade($idmodal)
	{
		$idStatusTemporadaTemporadaIniciada = StatusTemporada::TEMPORADA_INICIADA;
		$idStatusTemporadaInscricaoIniciada = StatusTemporada::INSCRICOES_INICIADAS;
		$idStatusTemporadaMatriculaIniciada = StatusTemporada::MATRICULAS_INICIADAS;
		$idStatusTemporadaMatriculasEncerradas = StatusTemporada::MATRICULAS_ENCERRADAS;
		$idStatusTemporadaInscricoesEncerradas = StatusTemporada::INSCRICOES_ENCERRADAS;

		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_turmatemporada a 
			INNER JOIN tb_turma j            
			using(idturma)
			INNER JOIN tb_users b
			using(iduser)
			INNER JOIN tb_persons c
			using(idperson)
			INNER JOIN tb_atividade d
			using(idativ)
			INNER JOIN tb_espaco e
			using(idespaco)
			INNER JOIN tb_local f
			using(idlocal)
			-- INNER JOIN tb_turmastatus g
			-- using(idturmastatus)
			INNER JOIN tb_horario h
			using(idhorario)
			INNER JOIN tb_fxetaria i
			using(idfxetaria)
            INNER JOIN tb_temporada k          
			using(idtemporada)   
            INNER JOIN tb_statustemporada l          
			using(idstatustemporada)
			INNER JOIN tb_modalidade m         
			using(idmodal)
      		WHERE j.idmodal = :idmodal
            AND ( b.iduser != 1 AND (
            k.idstatustemporada = :idStatusTemporadaMatriculasEncerradas 
            OR k.idstatustemporada = :idStatusTemporadaTemporadaIniciada 
            OR k.idstatustemporada = :idStatusTemporadaInscricaoIniciada 
            OR k.idstatustemporada = :idStatusTemporadaMatriculaIniciada 
            OR k.idstatustemporada = :idStatusTemporadaInscricoesEncerradas))
      		ORDER BY a.numinscritos, RAND()", [
      			':idmodal'=>$idmodal,
				':idStatusTemporadaMatriculasEncerradas'=>$idStatusTemporadaMatriculasEncerradas,
				':idStatusTemporadaTemporadaIniciada'=>$idStatusTemporadaTemporadaIniciada,
				':idStatusTemporadaInscricaoIniciada'=>$idStatusTemporadaInscricaoIniciada,
				':idStatusTemporadaMatriculaIniciada'=>$idStatusTemporadaMatriculaIniciada,
				':idStatusTemporadaInscricoesEncerradas'=>$idStatusTemporadaInscricoesEncerradas
				
			]);
	}

	public static function listAllTurmaTemporadaModalidadeLocal($idmodal, $idlocal)
	{
		$idStatusTemporadaTemporadaIniciada = StatusTemporada::TEMPORADA_INICIADA;
		$idStatusTemporadaInscricaoIniciada = StatusTemporada::INSCRICOES_INICIADAS;
		$idStatusTemporadaMatriculaIniciada = StatusTemporada::MATRICULAS_INICIADAS;
		$idStatusTemporadaMatriculasEncerradas = StatusTemporada::MATRICULAS_ENCERRADAS;
		$idStatusTemporadaInscricoesEncerradas = StatusTemporada::INSCRICOES_ENCERRADAS;

		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_turmatemporada a 
			INNER JOIN tb_turma j            
			using(idturma)
			INNER JOIN tb_users b
			using(iduser)
			INNER JOIN tb_persons c
			using(idperson)
			INNER JOIN tb_atividade d
			using(idativ)
			INNER JOIN tb_espaco e
			using(idespaco)
			INNER JOIN tb_local f
			using(idlocal)
			-- INNER JOIN tb_turmastatus g
			-- using(idturmastatus)
			INNER JOIN tb_horario h
			using(idhorario)
			INNER JOIN tb_fxetaria i
			using(idfxetaria)
            INNER JOIN tb_temporada k          
			using(idtemporada)   
            INNER JOIN tb_statustemporada l          
			using(idstatustemporada)
			INNER JOIN tb_modalidade m         
			using(idmodal)
      		WHERE j.idmodal = :idmodal AND f.idlocal = :idlocal
            AND ( b.iduser != 1 AND (
            k.idstatustemporada = :idStatusTemporadaMatriculasEncerradas 
            OR k.idstatustemporada = :idStatusTemporadaTemporadaIniciada 
            OR k.idstatustemporada = :idStatusTemporadaInscricaoIniciada 
            OR k.idstatustemporada = :idStatusTemporadaMatriculaIniciada 
            OR k.idstatustemporada = :idStatusTemporadaInscricoesEncerradas))
      		ORDER BY a.numinscritos, RAND()", [
      			':idlocal'=>$idlocal,
      			':idmodal'=>$idmodal,
				':idStatusTemporadaMatriculasEncerradas'=>$idStatusTemporadaMatriculasEncerradas,
				':idStatusTemporadaTemporadaIniciada'=>$idStatusTemporadaTemporadaIniciada,
				':idStatusTemporadaInscricaoIniciada'=>$idStatusTemporadaInscricaoIniciada,
				':idStatusTemporadaMatriculaIniciada'=>$idStatusTemporadaMatriculaIniciada,
				':idStatusTemporadaInscricoesEncerradas'=>$idStatusTemporadaInscricoesEncerradas
				
			]);
	}

	public static function listAllTurmaTemporadaLocal($idlocal)

	{
		$idStatusTemporadaTemporadaIniciada = StatusTemporada::TEMPORADA_INICIADA;
		$idStatusTemporadaInscricaoIniciada = StatusTemporada::INSCRICOES_INICIADAS;
		$idStatusTemporadaMatriculaIniciada = StatusTemporada::MATRICULAS_INICIADAS;
		$idStatusTemporadaMatriculasEncerradas = StatusTemporada::MATRICULAS_ENCERRADAS;
		$idStatusTemporadaInscricoesEncerradas = StatusTemporada::INSCRICOES_ENCERRADAS;

		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_turmatemporada a 
			INNER JOIN tb_turma j            
			using(idturma)
			INNER JOIN tb_users b
			using(iduser)
			INNER JOIN tb_persons c
			using(idperson)
			INNER JOIN tb_atividade d
			using(idativ)
			INNER JOIN tb_espaco e
			ON e.idespaco = j.idespaco
			INNER JOIN tb_local f
			ON f.idlocal = e.idlocal
			-- INNER JOIN tb_turmastatus g
			-- using(idturmastatus)
			INNER JOIN tb_horario h
			using(idhorario)
			INNER JOIN tb_fxetaria i
			using(idfxetaria)            
            INNER JOIN tb_temporada k          
			using(idtemporada)   
            INNER JOIN tb_statustemporada l          
			using(idstatustemporada)
			INNER JOIN tb_modalidade m         
			using(idmodal)
      		WHERE e.idlocal = :idlocal
            AND ( b.iduser != 1 AND (
            k.idstatustemporada = :idStatusTemporadaMatriculasEncerradas
            OR k.idstatustemporada = :idStatusTemporadaTemporadaIniciada 
            OR k.idstatustemporada = :idStatusTemporadaInscricaoIniciada 
            OR k.idstatustemporada = :idStatusTemporadaMatriculaIniciada
            OR k.idstatustemporada = :idStatusTemporadaInscricoesEncerradas))
      		ORDER BY a.numinscritos, RAND()", [
      			':idlocal'=>$idlocal,
				':idStatusTemporadaMatriculasEncerradas'=>$idStatusTemporadaMatriculasEncerradas,
				':idStatusTemporadaTemporadaIniciada'=>$idStatusTemporadaTemporadaIniciada,
				':idStatusTemporadaInscricaoIniciada'=>$idStatusTemporadaInscricaoIniciada,
				':idStatusTemporadaMatriculaIniciada'=>$idStatusTemporadaMatriculaIniciada,
				':idStatusTemporadaInscricoesEncerradas'=>$idStatusTemporadaInscricoesEncerradas
			]);
	}

	public static function checkList($list)
	{

		foreach ($list as $row) {
			
			$p = new Turma();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}

	// esta função é usada para salvar e editar turma
	public function save()
	{
		$sql = new Sql();
		$results = $sql->select("CALL sp_turma_save(:idturma, :idativ, :idmodal, :idespaco, :idhorario, :descturma, :obs, :vagas, :vagaslaudo, :vagaspcd, :vagaspvs, :token)", array(
			":idturma"=>$this->getidturma(),			
			":idativ"=>$this->getidativ(),
			":idmodal"=>$this->getidmodal(),
			":idespaco"=>$this->getidespaco(),
			":idhorario"=>$this->getidhorario(),
			//":idturmastatus"=>$this->getidturmastatus(),
			":descturma"=>$this->getdescturma(),
			":obs"=>$this->getobs(),
			":vagas"=>$this->getvagas(),
			":vagaslaudo"=>$this->getvagaslaudo(),
			":vagaspcd"=>$this->getvagaspcd(),
			":vagaspvs"=>$this->getvagaspvs(),
			":token"=>$this->gettoken()	
		));	

		$this->setData($results[0]);

		Turma::updateFile();
	}

	public function get($idturma)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * 
			FROM tb_turma a 
			-- INNER JOIN tb_users b
			-- using(iduser)
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
			INNER JOIN tb_modalidade i        
			using(idmodal)
			WHERE idturma = :idturma", [
			':idturma'=>$idturma 
		]);

		if($results){

			$this->setData($results[0]);		

		}else{

			Turma::setMsgError("Turma selecionada não existe!");
			header("Location: /admin/turma");
			exit();			
		}		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_turma WHERE idturma = :idturma", [
			':idturma'=>$this->getidturma()
		]);		

		Turma::updateFile();
	}

	// atualiza lista de turma no site (no rodapé) turma-menu.html
	public static function updateFile()	
	{
		$turma = Turma::listAll();

		$html = [];

		foreach ($turma as $row) {
			array_push($html, '<li><a href="/turma/'.$row['idturma'].'">'.$row['descturma'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."turma-menu.html", implode('', $html));
	}
	/*
	public function getTurmaPage($page = 1, $itemsPerPage = 3)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT *
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

	public function checkPhoto()
	{

		if (file_exists(
			$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"img" . DIRECTORY_SEPARATOR . 
			"turma" . DIRECTORY_SEPARATOR . 
			$this->getidturma() . ".jpg"
			)) {

			$url = "/res/site/img/turma/" . $this->getidturma() . ".jpg";

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
			$this->getidturma() . ".jpg";

		imagejpeg($image, $dist);

		imagedestroy($image);

		$this->checkPhoto();

	}

	public function getFromId($idturma)
	{

		$sql = new Sql();

		$rows = $sql->select(
			"SELECT * FROM tb_turma 
			INNER JOIN 	tb_users USING(iduser)
			INNER JOIN 	tb_persons USING(idperson)	
			INNER JOIN tb_atividade USING(idativ) 
			INNER JOIN tb_fxetaria USING(idfxetaria)
			INNER JOIN tb_espaco USING(idespaco) 
			INNER JOIN tb_horario USING(idhorario) 
			INNER JOIN tb_local USING(idlocal)
			INNER JOIN tb_modalidade USING(idmodal)
			WHERE idturma = :idturma LIMIT 1", [
			':idturma'=>$idturma
		]);

		$this->setData($rows[0]);

	}

	public function getFromIdTurmaTemporada($idturma, $idtemporada)
	{

		$sql = new Sql();

		$rows = $sql->select(
			"SELECT * FROM tb_turmatemporada
			INNER JOIN tb_turma a USING(idturma)
			INNER JOIN 	tb_users USING(iduser)
			INNER JOIN 	tb_persons USING(idperson)	
			INNER JOIN tb_atividade USING(idativ) 
			INNER JOIN tb_fxetaria USING(idfxetaria)
			INNER JOIN tb_espaco USING(idespaco) 
			INNER JOIN tb_horario USING(idhorario) 
			INNER JOIN tb_local USING(idlocal)
			INNER JOIN tb_modalidade USING(idmodal)
			INNER JOIN tb_temporada USING(idtemporada)
			WHERE idturma = :idturma
			AND idtemporada = :idtemporada LIMIT 1
			", [
			':idturma'=>$idturma,
			':idtemporada'=>$idtemporada
		]);

		if (count($rows) > 0) {

			$this->setData($rows[0]);

		}else{
			Turma::setMsgError("Desculpe, não foi possível selecionar esta turma e/ou temporada! Selecione outra.");
			header("Location: /turma/".$idturma."/".$idtemporada."");
		}	

		//$this->setData($rows[0]);

	}

	/*
	public function getFromIdTurmaModalidade($idmodal, $idtemporada)
	{

		$sql = new Sql();

		$rows = $sql->select(
			"SELECT *
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
			WHERE b.idmodal = :idmodal AND n.idtemporada = :idtemporada
			", [			
			':idmodal'=>$idmodal,
			':idtemporada'=>$idtemporada
		]);

		/*
		echo '<pre>';
		print_r($rows);
		echo '</pre>';
		exit();
		*//*
		

		$this->setData($rows);

	}
	*/

	public function getLocal()
	{
		$sql = new Sql();

		return $sql->select("
			SELECT * FROM tb_local a 
			INNER JOIN tb_espaco b ON a.idlocal = b.idlocal 
			INNER JOIN tb_turma c ON b.idespaco = c.idespaco 
			INNER JOIN tb_atividade d ON c.idativ = d.idativ 
 			WHERE b.idturma = :idturma
		", [
			':idturma'=>$this->getidturma()
		]);

	}

	public static function getVagasByIdTurma($idturma)
	{
		$sql = new Sql();

		$results = $sql->select("
			SELECT vagas FROM tb_turma
 			WHERE idturma = :idturma", [
			':idturma'=>$idturma
		]);

		return $results[0]['vagas'];
	}

	public static function getVagasLaudoByIdTurma($idturma)
	{
		$sql = new Sql();

		$results = $sql->select("
			SELECT vagaslaudo FROM tb_turma
 			WHERE idturma = :idturma", [
			':idturma'=>$idturma
		]);

		return $results[0]['vagaslaudo'];
	}

	public static function getVagasPcdByIdTurma($idturma)
	{
		$sql = new Sql();

		$results = $sql->select("
			SELECT vagaspcd FROM tb_turma
 			WHERE idturma = :idturma", [
			':idturma'=>$idturma
		]);

		return $results[0]['vagaspcd'];
	}

	public static function getVagasPvsByIdTurma($idturma)
	{
		$sql = new Sql();

		$results = $sql->select("
			SELECT vagaspvs FROM tb_turma
 			WHERE idturma = :idturma", [
			':idturma'=>$idturma
		]);

		return $results[0]['vagaspvs'];
	}

	public static function getSomaVagasByTurmaIdmodal($desctemporada, $idmodal)
	{
		$sql = new Sql();

		$results =  $sql->select("SELECT SUM(vagas) as qtdvagas 
			FROM tb_turmatemporada a
			INNER JOIN tb_turma b USING(idturma)
			INNER JOIN tb_temporada c USING(idtemporada)
            INNER JOIN tb_modalidade d USING(idmodal)			
			WHERE c.desctemporada = :desctemporada 
			AND d.idmodal = :idmodal", [
			':desctemporada'=>$desctemporada,
			':idmodal'=>$idmodal
		]);		

		return $results[0]['qtdvagas'];
	}

	public static function getSomaVagasByDescTemporada($desctemporada)
	{
		$sql = new Sql();

		$results =  $sql->select("SELECT SUM(vagas) as qtdvagas 
			FROM tb_turmatemporada a
			INNER JOIN tb_turma b USING(idturma)
			INNER JOIN tb_temporada c USING(idtemporada)
            -- INNER JOIN tb_modalidade d USING(idmodal)			
			WHERE c.desctemporada = :desctemporada 
			-- AND d.idmodal = :idmodal", [
			':desctemporada'=>$desctemporada
			//':idmodal'=>$idmodal
		]);		

		return $results[0]['qtdvagas'];
	}

	public static function getPage($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_turma a 
			-- INNER JOIN tb_users b 
			-- USING(iduser)
			-- INNER JOIN tb_turmatemporada k
			-- USING(iduser)			
			-- INNER JOIN tb_persons c
			-- USING(idperson)
			INNER JOIN tb_atividade d
			USING(idativ)
			INNER JOIN tb_espaco e
			USING(idespaco)
			INNER JOIN tb_local f
			USING(idlocal)
			-- INNER JOIN tb_turmastatus g
			-- USING(idturmastatus)
			INNER JOIN tb_horario h
			USING(idhorario)
			INNER JOIN tb_fxetaria i
			USING(idfxetaria) 
            INNER JOIN tb_modalidade 
            USING(idmodal)
			ORDER BY f.apelidolocal,a.descturma, h.diasemana, h.periodo, h.horainicio
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearch($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_turma a 
			-- INNER JOIN tb_users b
			-- USING(iduser)
			-- INNER JOIN tb_turmatemporada k
			-- USING(idtemporada)			
			-- INNER JOIN tb_persons c
			-- USING(idperson)
			INNER JOIN tb_atividade d
			USING(idativ)
			INNER JOIN tb_espaco e
			USING(idespaco)
			INNER JOIN tb_local f
			USING(idlocal)
			-- INNER JOIN tb_turmastatus g
			-- USING(idturmastatus)
			INNER JOIN tb_horario h
			USING(idhorario)
			INNER JOIN tb_fxetaria i
			USING(idfxetaria) 
            INNER JOIN tb_modalidade j
            USING(idmodal)
      		WHERE a.idturma LIKE :search 
      		OR a.descturma LIKE :search
			-- OR b.deslogin LIKE :search
			-- OR c.desperson LIKE :search
			-- OR c.apelidoperson LIKE :search
			OR d.descativ LIKE :search
			OR d.origativ LIKE :search
			OR d.tipoativ LIKE :search
			OR d.prograativ LIKE :search
			OR d.descativ LIKE :search
			OR e.nomeespaco LIKE :search
			OR f.apelidolocal LIKE :search 
			-- OR g.desstatus LIKE :search
			OR h.horainicio LIKE :search
			OR h.periodo LIKE :search
			OR i.descrfxetaria LIKE :search	
			OR j.descmodal LIKE :search										
			ORDER BY f.apelidolocal,a.descturma, h.diasemana, h.periodo, h.horainicio
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

	/*
	public static function atualizaNumInscritos($idturma)
	{

		$sql = new Sql();

		$sql->query("UPDATE tb_turmatemporada SET numinscritos = numinscritos + 1 WHERE idturma = :idturma", array(
			":idturma"=>$idturma
		));

	}
	*/


	public static function setMsgError($msg)
	{
		$_SESSION[Turma::SESSION_ERROR] = $msg;
	}

	public static function getMsgError()	{

		$msg = (isset($_SESSION[Turma::SESSION_ERROR])) ? $_SESSION[Turma::SESSION_ERROR] : "";

		Turma::clearMsgError();

		return $msg;
	}

	public static function clearMsgError()
	{
		$_SESSION[Turma::SESSION_ERROR] = NULL;
	}

	public static function setMsgSuccess($msg)
	{
		$_SESSION[Turma::SUCCESS] = $msg;
	}

	public static function getMsgSuccess()
	{
		$msg = (isset($_SESSION[Turma::SUCCESS]) && $_SESSION[Turma::SUCCESS]) ? $_SESSION[Turma::SUCCESS] : '';

		Turma::clearMsgSuccess();

		return $msg;
	}

	public static function clearMsgSuccess()
	{

		$_SESSION[Turma::SUCCESS] = NULL;

	}

	public function saveToken2($idturma, $numcpf, $token, $isused)
	{
		$sql = new Sql();
		$results = $sql->query("INSERT INTO tb_tokenturma (idturma, numcpf, token, isused, creator) VALUES(:idturma, :numcpf, :token, :isused)", array(
			":idturma"=>$idturma,
			":numcpf"=>$numcpf,
			":token"=>$token,
			":isused"=>$isused,		
			":creator"=>$creator			
		));

		if($results){
			echo "<script>alert('Token ".$turma->gettoken()." criado com sucesso!');";
			echo "javascript:history.go(-1)</script>";
		}else{

			echo "<script>alert('Não foi possível criar o token!');";
			echo "javascript:history.go(-1)</script>";
    	}		
		
	}

	public function saveToken()
	{
		$sql = new Sql();
		$results = $sql->select("CALL sp_tokenturma_save(:idtoken, :idturma, :numcpf, :token, :isused, :creator, :dtcriacao, :dtuso)", array(
			":idtoken"=>$this->getidtoken(),			
			":idturma"=>$this->getidturma(),
			":numcpf"=>$this->getnumcpf(),
			":token"=>$this->gettoken(),
			":isused"=>$this->getisused(),
			":creator"=>$this->getcreator(),
			":dtcriacao"=>$this->getdtcriacao(),
			":dtuso"=>$this->getdtuso()
		));	

		$this->setData($results[0]);
	}

	public function turmatemToken($idturma){

		$temtoken = 1;

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_turma WHERE idturma = :idturma AND token = :temtoken", [
			':idturma'=>$idturma,
			':temtoken'=>$temtoken
		]);

		if (count($results) > 0) {

		return true;

		}
	}

	public function temTokenCpf($idturma, $numcpf){

		$isused = 0;

		$sql = new Sql();

		$results = $sql->select("SELECT * 
			FROM tb_tokenturma 
			WHERE idturma = :idturma 
			AND numcpf = :numcpf 
			AND isused = :isused", [
			':idturma'=>$idturma,
			':numcpf'=>$numcpf,
			':isused'=>$isused
		]);

		if (count($results) > 0) {

			return true;
		}
	}

	public function comparaCpfToken($idturma, $token, $numcpf){

		$isused = 0;

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_tokenturma 
			WHERE idturma = :idturma 
			AND token = :token
			AND numcpf = :numcpf 
			AND isused = :isused", [
			':idturma'=>$idturma,
			':token'=>$token,
			':numcpf'=>$numcpf,
			':isused'=>$isused
		]);

		if (count($results) > 0) {
			return true;
		}
	}

	public function tokemValido($token, $idturma){

		$sql = new Sql();

		$results = $sql->select("SELECT * 
			FROM tb_tokenturma 
			WHERE token = :token 
			AND idturma = :idturma 
			AND isused = 0", [
			':token'=>$token,
			':idturma'=>$idturma
		]);

		if (count($results) > 0) {

				return true;

		}
	}

	public function tokenValidoCpf($token, $idturma, $numcpf){

		$isused = 0;

		$sql = new Sql();

		$results = $sql->select("SELECT * 
			FROM tb_tokenturma 
			WHERE token = :token 
			AND idturma = :idturma 
			AND isused = :isused
			AND numcpf = :numcpf", [
			':token'=>$token,
			':idturma'=>$idturma,
			'isused'=>$isused,
			':numcpf'=>$numcpf
		]);

		if (count($results) > 0) {

		return true;

		}
	}
	
	public function listAlltokenTurma($idturma){

		$sql = new Sql();

		$results = $sql->select("SELECT * 
			FROM tb_tokenturma 
			WHERE idturma = :idturma
			ORDER BY numcpf", [
			':idturma'=>$idturma
		]);

		return $results;
	}

	public function setUsedToken($idturma, $token){

		$isused = 1;

		$sql = new Sql();
		$sql->query("UPDATE tb_tokenturma 
			SET isused = :isused, dtuso = current_timestamp() 
			WHERE idturma = :idturma 
			AND token = :token", array(
			":isused"=>$isused,
			":idturma"=>$idturma,
			":token"=>$token
		));
	}

	public function setUsedTokenCpf($idturma, $tokencpf){

		$isused = 1;

		$sql = new Sql();
		$sql->query("UPDATE tb_tokenturma 
			SET isused = :isused, dtuso = current_timestamp() 
			WHERE idturma = :idturma 
			AND token = :tokencpf", array(
			":isused"=>$isused,
			":idturma"=>$idturma,
			":tokencpf"=>$tokencpf
		));
	}
	
	public static function listTokenTurma($idturma)
	{
		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_tokenturma WHERE idturma = :idturma", array(
			":idturma"=>$idturma,
		));
			
	}

	public static function getTokenPorCpfeTurma($numcpf, $idturma)
	{
		$sql = new Sql();

		$results = $sql->select("
			SELECT token
			FROM tb_tokenturma 
			WHERE numcpf = :numcpf
			AND idturma = :idturma
			AND isused = 0", array(
			":numcpf"=>$numcpf,
			":idturma"=>$idturma,
		));

		if($results){
			return true;
		}else{
			return false;
		}

		//return $results[0]['token'];	

		
	}		

}

?>