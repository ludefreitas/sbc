<?php 

namespace Sbc\DB;

class Sql {

	const HOSTNAME = "127.0.0.1";
	const USERNAME = "root";
	const PASSWORD = "";
	//const DBNAME = "db_cursossbc";
	const DBNAME = "db_cursosesportivossbc";

	//const HOSTNAME = "50.116.86.90";
	//const USERNAME = "curs0155_db";
	//const PASSWORD = "Mysql@132419";
	//const DBNAME = "curs0155_dbcursossbc";
	//const DBNAME = "curs0155_dbcursos_sbc"

	private $conn;

	public function __construct()
	{

		
			$this->conn = new \PDO(
			"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
			Sql::USERNAME,
			Sql::PASSWORD
			);

	}

	private function setParams($statement, $parameters = array())
	{

		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);

		}

	}

	private function bindParam($statement, $key, $value)
	{

		$statement->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

	}

	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

}

 ?>