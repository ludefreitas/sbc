<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Saude extends Model {

	const ERROR = "SaudeError";
	const ERROR_REGISTER = "SaudeErrorRegister";
	const SUCCESS = "SaudeSucesss";

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_saude a 
			INNER JOIN tb_pessoa b
			using(idpess)
			");
	}	

	public static function listAllCid()
	{
		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_cid 			
		");
	}	

	public static function getPageCid($page = 1, $itemsPerPage = 100)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
		SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_cid 			
			ORDER BY codigo
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearchCid($search, $page = 1, $itemsPerPage = 100)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
		SELECT * 
			FROM tb_cid 			
			WHERE codigo LIKE :search 
			OR doenca LIKE :search 			
			ORDER BY doenca
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

	public static function obtemDoencaCid($codigo){

		$sql = new Sql();

		$results = $sql->select("SELECT *
			FROM tb_cid WHERE codigo = :codigo", [
			':codigo'=>$codigo			
		]);

		return $results;
	}

	public function TemDadosSaude($idpess){

		return false;
	}

	public function getSaudeExist($idpess)	{

		$sql = new Sql();

		$results = $sql->select(
			"SELECT * FROM tb_saude a
			INNER JOIN tb_pessoa b using (idpess)
			WHERE idpess = :idpess", [
			':idpess'=>$idpess			
		]);

		return $results;

	}
	// esta função é usada para salvar saude da pessoa
	public function save()
	{
		$sql = new Sql();

		//procedure sp_saude_save() foi descontinuada por conter erro
		$results = $sql->select("CALL sp_saude_save1(:idsaude, :idpess, :idcid, :defauditiva, :defvisual, :deffisica, :defintelectual, :defautismo, :deftea)", array(
			":idsaude"=>$this->getidsaude(),
			":idpess"=>$this->getidpess(),
			":idcid"=>$this->getidcid(),
			":defauditiva"=>$this->getdefauditiva(),						
			":defvisual"=>$this->getdefvisual(),						
			":deffisica"=>$this->getdeffisica(),						
			":defintelectual"=>$this->getdefintelectual(),						
			":defautismo"=>$this->getdefautismo(),						
			":deftea"=>$this->getdeftea()						
		));

		if (count($results) > 0) {

			$this->setData($results[0]);

		}
	}

	// esta função é usada para salvar saude da pessoa
	public function update($idpess)
	{
		$sql = new Sql();
		
		$results = $sql->select("UPDATE tb_saude SET idcid = :idcid, defauditiva = :defauditiva, defvisual= :defvisual, deffisica = :deffisica, defintelectual= :defintelectual, defautismo = :defautismo, deftea = :deftea WHERE idpess = :idpess", array(
			":idcid"=>$this->getidcid(),
			":defauditiva"=>$this->getdefauditiva(),						
			":defvisual"=>$this->getdefvisual(),						
			":deffisica"=>$this->getdeffisica(),						
			":defintelectual"=>$this->getdefintelectual(),						
			":defautismo"=>$this->getdefautismo(),						
			":deftea"=>$this->getdeftea(),
			":idpess"=>$idpess			
		));		
	}

	public function saveparq()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_parq_save(:idparq, :idpess, :questaoum, :questaodois, :questaotres, :questaoquatro, :questaocinco, :questaoseis, :questaosete)", array(
			":idparq"=>$this->getidparq(),
			":idpess"=>$this->getidpess(),
			":questaoum"=>$this->getquestaoum(),						
			":questaodois"=>$this->getquestaodois(),						
			":questaotres"=>$this->getquestaotres(),						
			":questaoquatro"=>$this->getquestaoquatro(),						
			":questaocinco"=>$this->getquestaocinco(),						
			":questaoseis"=>$this->getquestaoseis(),
			":questaosete"=>$this->getquestaosete()						
		));

		if (count($results) > 0) {

			$this->setData($results[0]);

		}
	}

	public function getParqUltimoByIdPess(int $idpess)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_parq WHERE dtcreateparq = (SELECT  MAX(dtcreateparq) FROM tb_parq WHERE idpess = :idpess)", array(
			":idpess"=>$idpess			
		));

		if (count($results) > 0) {

			$this->setData($results[0]);

		}		
		
	}	

	public  function getParqByIdPess($idpess)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_parq WHERE idpess = :idpess", array(
			":idpess"=>$idpess			
		));

		return $this->setData($results);

		/*

		if (count($results) > 0) {
			$this->setData($results[0]);
		}		
		*/
		
	}	

	public function getCountParqByIdPess($idpess){

		$sql = new Sql();
		
		$results = $sql->select("SELECT count(*) FROM tb_parq 
			WHERE idpess = :idpess
			", array(
			":idpess"=>$idpess
		));

		return $results[0]['count(*)'];
	}

	public function saveatestado()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_atestado_save(:idatestado, :idpess, :iduser, :dataemissao, :datavalidade, :observ)", array(
			":idatestado"=>$this->getidatestado(),
			":idpess"=>$this->getidpess(),
			":iduser"=>$this->getiduser(),						
			":dataemissao"=>$this->getdataemissao(),						
			":datavalidade"=>$this->getdatavalidade(),						
			":observ"=>$this->getobserv()
		));

		if (count($results) > 0) {

			$this->setData($results[0]);

		}
	}

	public function getAtestadoUltimoByIdPess(int $idpess)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_atestado WHERE dataatualizacao = (SELECT  MAX(dataatualizacao) FROM tb_atestado WHERE idpess = :idpess)", array(
			":idpess"=>$idpess			
		));
		
		if (count($results) > 0) {
			$this->setData($results[0]);
		}				
		
	}	

	public function getCountAtestadoByIdPess($idpess){

		$sql = new Sql();
		
		$results = $sql->select("SELECT count(*) FROM tb_atestado 
			WHERE idpess = :idpess
			", array(
			":idpess"=>$idpess
		));

		return $results[0]['count(*)'];
	}

	public function get(int $idpess)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_saude WHERE idpess = :idpess", array(
			":idpess"=>$idpess			
		));

		if (count($results) > 0) {

			$this->setData($results[0]);

		}		
		
	}

	public function getFromId($idpess)
	{

		$sql = new Sql();

		$rows = $sql->select(
			"SELECT * FROM tb_saude 
			INNER JOIN 	tb_pessoa USING(idpess)
			
			WHERE idpess = :idpess LIMIT 1", [
			':idpess'=>$idpess
		]);

		if (count($rows) > 0) {
			$this->setData($rows[0]);
		}
	}	

	public function getDoencaByidpess($idpess)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_cid a
			INNER JOIN tb_saude b ON b.idcid = a.idcid
			WHERE b.idpess = :idpess
			", array(
			":idpess"=>$idpess			
		));
		return $results;		
	}

	public function getDeficienciaByidpess($idpess)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_saude
			WHERE idpess = :idpess
			", array(
			":idpess"=>$idpess			
		));
		return $results;		
	}

	public static function setError($msg)
	{

		$_SESSION[Saude::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[Saude::ERROR]) && $_SESSION[Saude::ERROR]) ? $_SESSION[Saude::ERROR] : '';

		Saude::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Saude::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Saude::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Saude::SUCCESS]) && $_SESSION[Saude::SUCCESS]) ? $_SESSION[Saude::SUCCESS] : '';

		Saude::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Saude::SUCCESS] = NULL;

	}

	public static function setErrorRegister($msg)
	{

		$_SESSION[Saude::ERROR_REGISTER] = $msg;

	}

	public static function getErrorRegister()
	{

		$msg = (isset($_SESSION[Saude::ERROR_REGISTER]) && $_SESSION[Saude::ERROR_REGISTER]) ? $_SESSION[Saude::ERROR_REGISTER] : '';

		Saude::clearErrorRegister();

		return $msg;

	}

	public static function clearErrorRegister()
	{

		$_SESSION[Saude::ERROR_REGISTER] = NULL;

	}	

}

?>