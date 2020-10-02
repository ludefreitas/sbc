<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class Faixaetaria extends Model {


	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_fxetaria ORDER BY initidade");
	}	

	// esta função é usada para salvar e editar faixa etaria
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_faixaetaria_save(:idfxetaria, :descrfxetaria, :initidade, :fimidade)", array(
			":idfxetaria"=>$this->getidfxetaria(),
			":descrfxetaria"=>$this->getdescrfxetaria(),
			":initidade"=>$this->getinitidade(),
			":fimidade"=>$this->getfimidade()
		));

		$this->setData($results[0]);

		Faixaetaria::updateFile();

	}

	
	public function get($idfxetaria)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_fxetaria WHERE idfxetaria = :idfxetaria", [':idfxetaria'=>$idfxetaria 
		]);

		$this->setData($results[0]);
		
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_fxetaria WHERE idfxetaria = :idfxetaria", [
			':idfxetaria'=>$this->getidfxetaria()
		]);		

		Faixaetaria::updateFile();
	}

	// atualiza lista de faixa etária no site (no rodapé) faixaetaria-menu.html
	public static function updateFile()	
	{
		$faixaetaria = Faixaetaria::listAll();

		$html = [];

		foreach ($faixaetaria as $row) {
			array_push($html, '<li><a href="/faixaetaria/'.$row['idfxetaria'].'">'.$row['descrfxetaria'].'</a></li>');
		}
		file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."faixaetaria-menu.html", implode('', $html));
	}

}


?>