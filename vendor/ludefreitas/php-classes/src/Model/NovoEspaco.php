<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class NovoEspaco extends Model {


	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_novoespaco ORDER BY nomeespaco");

	}	
	/*
	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_espaco a 
			INNER JOIN tb_local b
			using(idlocal)
			INNER JOIN tb_horario c
			using(idhorario)
			ORDER BY a.nomeespaco");

		}	  
	*/
	// esta função é usada para salvar e editar Espaço
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_novoespaco_save(:idespaco, :nomeespaco, :descespaco, :observacao, :areaespaco)", array(
			":idespaco"=>$this->getidespaco(),
			":nomeespaco"=>$this->getnomeespaco(),
			":descespaco"=>$this->getdescespaco(),
			":observacao"=>$this->getobservacao(),
			":areaespaco"=>$this->getareaespaco()
		));

		$this->setData($results[0]);

		NovoEspaco::updateFile();

	}

	public function get($idespaco)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_novoespaco WHERE idespaco = :idespaco", [
			':idespaco'=>$idespaco 
		]);

		$this->setData($results[0]);
		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_novoespaco WHERE idespaco = :idespaco", [
			':idespaco'=>$this->getidespaco()
		]);		

		NovoEspaco::updateFile();
	}

	// atualiza lista de espaco no site (no rodapé) espaco-menu.html
	public static function updateFile()	
	{
		$espaco = NovoEspaco::listAll();

		$html = [];

		foreach ($espaco as $row) {
			array_push($html, '<li><a href="/novoespaco/'.$row['idespaco'].'">'.$row['nomeespaco'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."novoespaco-menu.html", implode('', $html));
	}

}

?>