<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Modalidade extends Model {


	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_modalidade a 
			INNER JOIN tb_fxetaria b
			using(idfxetaria)
			ORDER BY a.nomemodal");

		}	
	// esta função é usada para salvar e editar local
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_modalidade_save(:idmodal, :nomemodal, :descmodal, :genemodal, :programodal, :origmodal, :tipomodal, :idfxetaria)", array(
			":idmodal"=>$this->getidmodal(),
			":nomemodal"=>$this->getnomemodal(),
			":descmodal"=>$this->getdescmodal(),
			":genemodal"=>$this->getgenemodal(),
			":programodal"=>$this->getprogramodal(),
			":origmodal"=>$this->getorigmodal(),
			":tipomodal"=>$this->gettipomodal(),
			":idfxetaria"=>$this->getidfxetaria()
		));

		$this->setData($results[0]);

		//Modalidade::updateFile();

	}

	public function get($idmodal)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_modalidade WHERE idmodal = :idmodal", [
			':idmodal'=>$idmodal 
		]);

		$this->setData($results[0]);
		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_modalidade WHERE idmodal = :idmodal", [
			':idmodal'=>$this->getidmodal()
		]);		

		//Modalidade::updateFile();
	}

	// atualiza lista de modalidade no site (no rodapé) modalidade-menu.html
	public static function updateFile()	
	{
		$modalidade = Modalidade::listAll();

		$html = [];

		foreach ($modalidade as $row) {
			array_push($html, '<li><a href="/modalidade/'.$row['idmodal'].'">'.$row['nomemodal'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."modalidade-menu.html", implode('', $html));
	}

}

?>