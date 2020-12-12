<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Pessoa extends Model {

	const ERROR = "UserError";
	const ERROR_REGISTER = "UserErrorRegister";
	const SUCCESS = "UserSucesss";

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_pessoa a 
			INNER JOIN tb_users b
			using(iduser)
			ORDER BY a.nomepess");
	}	
	// esta função é usada para salvar e editar pessoa
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_pessoa_save(:idpess, :iduser, :nomepess, :dtnasc, :sexo, :numcpf, :numrg, :numsus, :vulnsocial, :cadunico, :nomemae, :cpfmae, :nomepai, :cpfpai, :statuspessoa, :dtalteracao)", array(
			":idpess"=>$this->getidpess(),
			":iduser"=>$this->getiduser(),
			":nomepess"=>$this->getnomepess(),
			":dtnasc"=>$this->getdtnasc(),
			":sexo"=>$this->getsexo(),
			":numcpf"=>$this->getnumcpf(),
			":numrg"=>$this->getnumrg(),
			":numsus"=>$this->getnumsus(),
			":vulnsocial"=>$this->getvulnsocial(),
			":cadunico"=>$this->getcadunico(),
			":nomemae"=>$this->getnomemae(),
			":cpfmae"=>$this->getcpfmae(),
			":nomepai"=>$this->getnomepai(),
			":cpfpai"=>$this->getcpfpai(),
			":statuspessoa"=>$this->getstatuspessoa(),
			":dtalteracao"=>$this->getdtalteraca()
		));	

		if (count($results) > 0) {

			$this->setData($results[0]);

			Pessoa::updateFile();

		}
	}

	public function get(int $idpess)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_pessoa WHERE idpess = :idpess", array(
			":idpess"=>$idpess			
		));

		if (count($results) > 0) {

			$this->setData($results[0]);

		}		
		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_pessoa WHERE idpess = :idpess", [
			':idpess'=>$this->getidpess()
		]);		

		Pessoa::updateFile();
	}

	// atualiza lista de pessoa no site (no rodapé) pessoa-menu.html
	public static function updateFile()	
	{
		$pessoa = Pessoa::listAll();

		$html = [];

		foreach ($pessoa as $row) {
			array_push($html, '<li><a href="/pessoa/'.$row['idpess'].'">'.$row['nomepess'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."pessoa-menu.html", implode('', $html));
	}

	public static function setError($msg)
	{

		$_SESSION[User::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

		User::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[User::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[User::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[User::SUCCESS]) && $_SESSION[User::SUCCESS]) ? $_SESSION[User::SUCCESS] : '';

		User::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[User::SUCCESS] = NULL;

	}

	public static function setErrorRegister($msg)
	{

		$_SESSION[User::ERROR_REGISTER] = $msg;

	}

	public static function getErrorRegister()
	{

		$msg = (isset($_SESSION[User::ERROR_REGISTER]) && $_SESSION[User::ERROR_REGISTER]) ? $_SESSION[User::ERROR_REGISTER] : '';

		User::clearErrorRegister();

		return $msg;

	}

	public static function clearErrorRegister()
	{

		$_SESSION[User::ERROR_REGISTER] = NULL;

	}

	public static function checkCpfExist($numcpf)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_pessoa WHERE numcpf = :numcpf", [
			':numcpf'=>$numcpf
		]);

		return (count($results) > 0);

	}

	public function getFromId($idpess)
	{

		$sql = new Sql();

		$rows = $sql->select(
			"SELECT * FROM tb_pessoa 
			INNER JOIN 	tb_users USING(iduser)
			
			WHERE idpess = :idpess LIMIT 1", [
			':idpess'=>$idpess
		]);

		$this->setData($rows[0]);
	}


	public function getPessoaExist()	{

		$sql = new Sql();

		$results = $sql->select(
			"SELECT * FROM tb_pessoa a
			INNER JOIN tb_users b using (iduser)
			WHERE numcpf = :numcpf AND
			iduser = :iduser", [
			':iduser'=>$this->getiduser(),
			':numcpf'=>$this->getnumcpf()
		]);

		return $results;

		if(count($results) === 0)
		{
			throw new \Exception("Pessoa já existe deseja ativar?", 1);			
		}

	}

}

?>