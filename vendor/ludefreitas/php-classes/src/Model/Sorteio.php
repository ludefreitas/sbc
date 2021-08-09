<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Sorteio extends Model {

	const ERROR = "SorteioError";

	public function sortear($max, $count, $idtemporada){

		$min = 1;
		$idstatussort = SorteioStatus::FINALIZADO;

		//var_dump(Sorteio::listAll($idtemporada));
		//exit();	

		$numsGerados = range($min, $max);
		shuffle($numsGerados);

		$response = array();

		for($i=0; $i < $count; $i++) { 
			array_push($response, $numsGerados[$i]);

			$sql = new Sql();

			//var_dump($desctemporada.' - '.)

			$sql->query("INSERT INTO tb_sorteio (idtemporada, idstatussort, numerodeordem, numerosortear) VALUES(:idtemporada, :idstatussort, :numerodeordem, :numerosortear)", [
			':idtemporada'=>$idtemporada,
			':idstatussort'=>$idstatussort,
			':numerodeordem'=>$i + 1,
			':numerosortear'=>$numsGerados[$i]
			]);

		}


		// Depois de sortear altera status da temporada para matrículas iniciadas
		Temporada::updateStatusTemporadaParaMatriculasIniciadas($idtemporada);
		//var_dump($sql);
		//	exit();
		return $response;

		

	}

	public function sorteioExiste(){


	}

	public function listAll($idtemporada){

		$sql = new Sql();

		//var_dump($desctemporada);
		//exit;

		$results = $sql->select(
			"SELECT * FROM tb_sorteio			
			WHERE idtemporada = :idtemporada", [
			':idtemporada'=>$idtemporada			
		]);		

		return $results;	
	}

	public static function setError($msg)
		{

			$_SESSION[Sorteio::ERROR] = $msg;

		}

	public static function getError()
	{

		$msg = (isset($_SESSION[Sorteio::ERROR]) && $_SESSION[Sorteio::ERROR]) ? $_SESSION[Sorteio::ERROR] : '';

		Sorteio::clearError();
		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Sorteio::ERROR] = NULL;

	}

	/*

	public function createTableSorteio($temporada, $idtemporada){

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db_cursossbc";

		try {
    	$conn = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	// set the PDO error mode to exception
    	$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    	// sql to create table
    	$sql = "CREATE TABLE IF NOT EXISTS tb_sorteio".$temporada." (
		  idsorteio int(11) NOT NULL AUTO_INCREMENT,
		  idtemporada int(11) NOT NULL DEFAULT ".$idtemporada.",
		  idstatussort int(11) NOT NULL DEFAULT 1,
		  numerodeordem int(11) DEFAULT NULL,
		  numerosortear int(11) NOT NULL,
		  PRIMARY KEY (idsorteio),
		  KEY fk_sorteio".$temporada."_sorteiostatus_idx (idstatussort),
		  KEY fk_sorteio".$temporada."_sorteiotemporada_idx (idtemporada),
		  CONSTRAINT fk_sorteio".$temporada."_sorteiostatus FOREIGN KEY (idstatussort) REFERENCES tb_sorteiostatus (idstatussort) ON DELETE NO ACTION ON UPDATE NO ACTION,
		  CONSTRAINT fk_sorteio".$temporada."_sorteiotemporada FOREIGN KEY (idtemporada) REFERENCES tb_temporada (idtemporada) ON DELETE NO ACTION ON UPDATE NO ACTION
		)ENGINE=InnoDB DEFAULT CHARSET=utf8";
		

   		// use exec() because no results are returned
    	$conn->exec($sql);
    	echo "Tabela Sorteio ".$temporada." criada com sucesso";
    	
    	}
			catch(PDOException $e)
    	{
    		echo $sql . "<br>" . $e->getMessage();
    	}

		$conn = null;

	}

	*/


	/*


	public function excluiTabelaSorteio($desctemporada){

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db_cursossbc";

		try {
    	$conn = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	// set the PDO error mode to exception
    	$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    	// sql to create table
    	$sql = "DROP TABLE IF EXISTS tb_sorteio".$desctemporada."";

    	// use exec() because no results are returned
    	$conn->exec($sql);

    	    echo "Tabela sorteio".$desctemporada." excluida com sucesso";
    	
    	}
			catch(PDOException $e)
    	{
    		echo $sql . "<br> Não foi possivel excluir" . $e->getMessage();
    	}

		$conn = null;

	}

	*/	

}

?>

