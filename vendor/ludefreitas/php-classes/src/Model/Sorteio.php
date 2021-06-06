<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Sorteio extends Model {


	public function sortear($min, $max, $count){

		$numsGerados = range($min, $max);
		shuffle($numsGerados);

		$response = array();

		for($i=0; $i < $count; $i++) { 
			array_push($response, $numsGerados[$i]);
		}



		return $response;
	}

	public function listAll($desctemporada){

		$sql = new Sql();

		//var_dump($desctemporada);
		//exit;

		$results =  $sql->select("SELECT * FROM tb_sorteio".$desctemporada."");

		return $results;

		/*

		if (count($results) > 0) {

			$this->setData($results[0]);

		}		
		*/
	}

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


	// para chamar a função

	

}

?>

