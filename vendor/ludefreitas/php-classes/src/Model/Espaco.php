<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Espaco extends Model {


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
	// esta função é usada para salvar e editar Espaço
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_espaco_save(:idespaco, :idlocal, :idhorario, :nomeespaco, :descespaco, :observacao, :areaespaco)", array(
			":idespaco"=>$this->getidespaco(),
			":idlocal"=>$this->getidlocal(),
			":idhorario"=>$this->getidhorario(),
			":nomeespaco"=>$this->getnomeespaco(),
			":descespaco"=>$this->getdescespaco(),
			":observacao"=>$this->getobservacao(),
			":areaespaco"=>$this->getareaespaco()
		));

		$this->setData($results[0]);

		Espaco::updateFile();

	}

	public function get($idespaco)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_espaco WHERE idespaco = :idespaco", [
			':idespaco'=>$idespaco 
		]);

		$this->setData($results[0]);
		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_espaco WHERE idespaco = :idespaco", [
			':idespaco'=>$this->getidespaco()
		]);		

		Espaco::updateFile();
	}

	// atualiza lista de espaco no site (no rodapé) espaco-menu.html
	public static function updateFile()	
	{
		$espaco = Espaco::listAll();

		$html = [];

		foreach ($espaco as $row) {
			array_push($html, '<li><a href="/espaco/'.$row['idespaco'].'">'.$row['nomeespaco'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."espaco-menu.html", implode('', $html));
	}

}

?>