<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Local extends Model {


	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_local ORDER BY apelidolocal");
	}	

	// esta função é usada para salvar e editar local
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_local_save(:idlocal, :apelidolocal, :nomelocal, :rua, :numero, :complemento, :bairro, :cidade, :estado, :telefone, :cep)", array(
			":idlocal"=>$this->getidlocal(),
			":apelidolocal"=>$this->getapelidolocal(),
			":nomelocal"=>$this->getnomelocal(),
			":rua"=>$this->getrua(),
			":numero"=>$this->getnumero(),
			":complemento"=>$this->getcomplemento(),
			":bairro"=>$this->getbairro(),
			":cidade"=>$this->getcidade(),
			":estado"=>$this->getestado(),
			":telefone"=>$this->gettelefone(),
			":cep"=>$this->getcep()
		));

		$this->setData($results[0]);

		Local::updateFile();
	}

	public function get($idlocal)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_local WHERE idlocal = :idlocal", [':idlocal'=>$idlocal 
		]);

		$this->setData($results[0]);
		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_local WHERE idlocal = :idlocal", [
			':idlocal'=>$this->getidlocal()
		]);		

		Local::updateFile();
	}

	// atualiza lista de Locais etária no site (no rodapé) local-menu.html
	public static function updateFile()	
	{
		$local = Local::listAll();

		$html = [];

		foreach ($local as $row) {
			array_push($html, '<li><a href="/local/'.$row['idlocal'].'">'.$row['apelidolocal'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."local-menu.html", implode('', $html));
	}

	public function getEspaco($related = true)
	{
		$sql = new Sql();

		if ($related === true) {

			return $sql->select("
				SELECT * 
					FROM tb_espaco 
		        	WHERE idespaco 
			    	IN( 
			    		SELECT a.idespaco
						FROM tb_espaco a
		   				INNER JOIN tb_espacolocal b 
		           		ON a.idespaco = b.idespaco
			    		WHERE b.idlocal = :idlocal ORDER BY a.nomeespaco
			    	);", [
						':idlocal'=>$this->getidlocal()
					]);

		} else {

			return $sql->select("
				SELECT * 
					FROM tb_espaco 
		        	WHERE idespaco 
			    	NOT IN( 
			    		SELECT a.idespaco
						FROM tb_espaco a
		   				INNER JOIN tb_espacolocal b 
		           		ON a.idespaco = b.idespaco
			    		WHERE b.idlocal = :idlocal ORDER BY a.nomeespaco
			    	);", [
						':idlocal'=>$this->getidlocal()
					]);
		}
	}

	public function addEspaco(Espaco $espaco)
	{

		$sql = new Sql();

		$sql->query("INSERT INTO tb_espacolocal (idlocal, idespaco) VALUES(:idlocal, :idespaco)", [
			':idlocal'=>$this->getidlocal(),
			':idespaco'=>$espaco->getidespaco()
		]);

	}

	public function removeEspaco(Espaco $espaco)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_espacolocal WHERE idlocal = :idlocal AND idespaco = :idespaco", [
			':idlocal'=>$this->getidlocal(),
			':idespaco'=>$espaco->getidespaco()
		]);
	}
}


?>