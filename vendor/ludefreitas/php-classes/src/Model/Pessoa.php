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


		$results = $sql->select("CALL sp_pessoa_save(:idpess, :iduser, :nomepess, :dtnasc, :sexo, :numcpf, :numrg, :numsus, :vulnsocial, :pcd, :cadunico, :nomemae, :cpfmae, :nomepai, :cpfpai, :statuspessoa, :dtinclusao, :dtalteracao)", array(
			":idpess"=>$this->getidpess(),
			":iduser"=>$this->getiduser(),
			":nomepess"=>$this->getnomepess(),
			":dtnasc"=>$this->getdtnasc(),
			":sexo"=>$this->getsexo(),
			":numcpf"=>$this->getnumcpf(),
			":numrg"=>$this->getnumrg(),
			":numsus"=>$this->getnumsus(),
			":vulnsocial"=>$this->getvulnsocial(),
			":pcd"=>$this->getpcd(),
			":cadunico"=>$this->getcadunico(),
			":nomemae"=>$this->getnomemae(),
			":cpfmae"=>$this->getcpfmae(),
			":nomepai"=>$this->getnomepai(),
			":cpfpai"=>$this->getcpfpai(),
			":statuspessoa"=>$this->getstatuspessoa(),
			":dtinclusao"=>$this->getdtinclusao(),
			":dtalteracao"=>$this->getdtalteraca()
		));	

		if (count($results) > 0) {

			$this->setData($results[0]);

			//Pessoa::updateFile();

		}
	}


	public function update($idpess)
	{
		$sql = new Sql();

		
		$results = $sql->select("CALL sp_pessoa_update(:idpess, :iduser, :nomepess, :dtnasc, :sexo, :numcpf, :numrg, :numsus, :vulnsocial, :pcd, :cadunico, :nomemae, :cpfmae, :nomepai, :cpfpai, :statuspessoa, :dtalteracao)", array(
			":idpess"=>$idpess,
			":iduser"=>$this->getiduser(),
			":nomepess"=>$this->getnomepess(),
			":dtnasc"=>$this->getdtnasc(),
			":sexo"=>$this->getsexo(),
			":numcpf"=>$this->getnumcpf(),
			":numrg"=>$this->getnumrg(),
			":numsus"=>$this->getnumsus(),
			":vulnsocial"=>$this->getvulnsocial(),
			":pcd"=>$this->getpcd(),
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
			array_push($html, '<li><a href="/pessoa/'.$row['idpess'].'">'.$row['nomepass'].'</a></li>');
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

		$results = $sql->select("
			SELECT * FROM tb_pessoa 
			WHERE numcpf = :numcpf 
			AND iduser = :iduser", [
			':numcpf'=>$numcpf,
			':iduser'=>$iduser
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

		if (count($rows) > 0) {
			$this->setData($rows[0]);
		}
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
			throw new \Exception("Esta pessoa já esta cadastrada, deseja ativar?", 1);			
		}

	}

	public static function getPage($page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_pessoa a 
			INNER JOIN tb_users b USING(iduser) 
			INNER JOIN tb_persons c USING(idperson)
			ORDER BY a.nomepess, a.numcpf
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearch($search, $page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_pessoa a 
			INNER JOIN tb_users b USING(iduser) 
			INNER JOIN tb_persons c USING(idperson)
			WHERE a.nomepess LIKE :search 
			OR a.idpess LIKE :search
			OR a.dtnasc LIKE :search
			OR a.numcpf LIKE :search
			OR c.desperson = :search 
			OR c.desemail LIKE :search 
			OR c.apelidoperson LIKE :search
			ORDER BY a.nomepess			
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

	public function getInsc()
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT * 
			FROM tb_insc a 
			INNER JOIN tb_inscstatus b USING(idinscstatus) 
			INNER JOIN tb_carts c USING(idcart)
			INNER JOIN tb_turma g USING(idturma)
			INNER JOIN tb_atividade h ON h.idativ = g.idativ
			INNER JOIN tb_espaco i ON i.idespaco = g.idespaco
			INNER JOIN tb_pessoa d ON d.idpess = c.idpess
			INNER JOIN tb_users e ON e.iduser = d.iduser
			INNER JOIN tb_persons f ON f.idperson = e.idperson
			INNER JOIN tb_temporada j USING(idtemporada)
			INNER JOIN tb_inscstatus k USING(idinscstatus)
			INNER JOIN tb_horario l USING(idhorario)
			INNER JOIN tb_local m USING(idlocal)
			WHERE d.idpess = :idpess ORDER BY a.idinsc DESC
		", [
			':idpess'=>$this->getidpess()
		]);

		return $results;

	}

	function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

     public static function checkCadunicoExist($idpess)
	{
		$sql = new Sql();

		$results = $sql->select("
			SELECT cadunico FROM tb_pessoa 
			WHERE idpess = :idpess AND (cadunico != '' || cadunico != NULL)", [
			':idpess'=>$idpess
		]);

		return $results;
	}
	
	public static function getNumCpfByIdpess($idpess)
	{
		$sql = new Sql();

		$results = $sql->select("
			SELECT numcpf FROM tb_pessoa 
			WHERE idpess = :idpess", [
			':idpess'=>$idpess
		]);

		return $results[0]['numcpf'];
	}
	
	/*
	public function setStatus(){

		$statuspessoa = 0

		$sql = new Sql();

		$results = $sql->select(
			"UPDATE tb_pessoa SET statuspessoa = :statuspessoa WHERE idpess = :pidpess", [
			':idpess'=>$this->getidpess(),
			':statuspessoa'=>$this->getstatuspessoa()			
		]);

		//$this->setData($results[0]);	

	}
	*/

}

?>