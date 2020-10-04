<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Pessoa extends Model {

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

		$results = $sql->select("CALL sp_pessoa_save(:idpess, :iduser, :nomepess, :dtnasc, :sexo, :numcpf, :numrg, :numsus, :vulnsocial, :cadunico, :nomemae, :cpfmae, :nomepai, :cpfpai, :status)", array(
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
			":status"=>$this->getstatus()
		));	

		$this->setData($results[0]);

		Pessoa::updateFile();
	}

	public function get($idpess)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * 
			FROM tb_pessoa a 
			INNER JOIN tb_users 
			USING(iduser) 
			WHERE idpess = :idpess", [
			':idpess'=>$idpess 
		]);

		$this->setData($results[0]);		
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
}

?>