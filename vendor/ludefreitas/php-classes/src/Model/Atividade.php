<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Atividade extends Model {


	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * 
			FROM tb_atividade a 
			INNER JOIN tb_fxetaria b
			using(idfxetaria)
			ORDER BY a.nomeativ");

		}	
	// esta função é usada para salvar e editar Atividade
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_atividade_save(:idativ, :nomeativ, :descativ, :geneativ, :prograativ, :origativ, :tipoativ, :idfxetaria)", array(
			":idativ"=>$this->getidativ(),
			":nomeativ"=>$this->getnomeativ(),
			":descativ"=>$this->getdescativ(),
			":geneativ"=>$this->getgeneativ(),
			":prograativ"=>$this->getprograativ(),
			":origativ"=>$this->getorigativ(),
			":tipoativ"=>$this->gettipoativ(),
			":idfxetaria"=>$this->getidfxetaria()
		));

		$this->setData($results[0]);

		Atividade::updateFile();

	}

	public function get($idativ)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_atividade INNER JOIN tb_fxetaria USING(idfxetaria) WHERE idativ = :idativ", [
			':idativ'=>$idativ 
		]);

		$this->setData($results[0]);
		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_Atividade WHERE idativ = :idativ", [
			':idativ'=>$this->getidativ()
		]);		

		Atividade::updateFile();
	}

	// atualiza lista de Atividade no site (no rodapé) Atividade-menu.html
	public static function updateFile()	
	{
		$atividade = Atividade::listAll();

		$html = [];

		foreach ($atividade as $row) {
			array_push($html, '<li><a href="/atividade/'.$row['idativ'].'">'.$row['nomeativ'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."atividade-menu.html", implode('', $html));
	}

}


?>