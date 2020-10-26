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
	
	public function getTurmaPage($page = 1, $itemsPerPage = 3)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS *
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


	public function getEspaco($related = true)
	{
		$sql = new Sql();

		if ($related === true) {

			return $sql->select("
				   SELECT * FROM tb_espaco c 
					   INNER JOIN tb_horarioespaco d 
					   ON c.idespaco = d.idespaco 
					   INNER JOIN tb_horario e 
					   ON d.idhorario = e.idhorario
			           WHERE c.idespaco 
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
				SELECT * FROM tb_espaco c 
					   INNER JOIN tb_horarioespaco d 
					   ON c.idespaco = d.idespaco 
					   INNER JOIN tb_horario e 
					   ON d.idhorario = e.idhorario
			           WHERE c.idespaco 
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