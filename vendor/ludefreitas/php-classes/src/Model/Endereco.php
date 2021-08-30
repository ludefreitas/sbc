<?php 

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;

class Endereco extends Model {

	const SESSION_ERROR = "EnderecoError";
	const SUCCESS = "EnderecoSucesss";	

	/*

	public static function getNumCep($nrcep)
	{

		$nrcep = str_replace("-", "", $nrcep);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "http://viacep.com.br/ws/$nrcep/json/");

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$data = json_decode(curl_exec($ch), true);

		curl_close($ch);

		return $data;

	}
	*/

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_endereco_save(:idender, :idperson, :rua, :numero, :complemento, :bairro, :cidade, :estado, :cep, :telres, :telemer, :contato)", array(
			":idender"=>$this->getidender(),
			":idperson"=>$this->getidperson(),
			":rua"=>$this->getrua(),
			":numero"=>$this->getnumero(),
			":complemento"=>$this->getcomplemento(),
			":bairro"=>$this->getbairro(),
			":cidade"=>$this->getcidade(),
			":estado"=>$this->getestado(),
			":cep"=>$this->getcep(),
			":telres"=>$this->gettelres(),
			":telemer"=>$this->gettelemer(),
			":contato"=>$this->getcontato()
		));		

		if (count($results) > 0) {
			$this->setData($results[0]);
		}else{
			Endereco::setMsgError('Não foi possivel cadastrar endereço!');
			header("Location: /endereco");
			exit();			
		}

	}

	public function update($idperson)
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_endereco_update(:idperson, :rua, :numero, :complemento, :bairro, :cidade, :estado, :cep, :telres, :telemer, :contato)", array(			
			":idperson"=>$idperson,
			":rua"=>$this->getrua(),
			":numero"=>$this->getnumero(),
			":complemento"=>$this->getcomplemento(),
			":bairro"=>$this->getbairro(),
			":cidade"=>$this->getcidade(),
			":estado"=>$this->getestado(),
			":cep"=>$this->getcep(),
			":telres"=>$this->gettelres(),
			":telemer"=>$this->gettelemer(),
			":contato"=>$this->getcontato()
		));		

		if (count($results) > 0) {
			$this->setData($results[0]);
		}else{
			Endereco::setMsgError('Não foi possivel atualizar endereço!');
			header("Location: /user/endereco/update");
			exit();			
		}

	}

	public function seEnderecoExiste($idperson)	{

		$sql = new Sql();

		$results = $sql->select(
			"SELECT * FROM tb_endereco a
			INNER JOIN tb_persons b using (idperson)
			WHERE idperson = :idperson", [
			':idperson'=>$idperson			
		]);		

		if(count($results) === 0)
		{
			Endereco::setMsgError('Endereço não encontrado, você precisa completar o cadastro abaixo, com os dados do endereço e telefones, para cadastrar pessoas e fazer inscrição.');
			header("Location: /endereco");
			exit();			
		}

			return $results;
		
	}

	public function getEndereco($idperson)	{

		$sql = new Sql();

		$results = $sql->select(
			"SELECT * FROM tb_endereco a
			-- INNER JOIN tb_persons b using (idperson)
			WHERE idperson = :idperson", [
			':idperson'=>$idperson			
		]);			

			return $results[0];		
	}


	public static function setMsgError($msg)
	{

		$_SESSION[Endereco::SESSION_ERROR] = $msg;

	}

	public static function getMsgError()
	{

		$msg = (isset($_SESSION[Endereco::SESSION_ERROR])) ? $_SESSION[Endereco::SESSION_ERROR] : "";

		Endereco::clearMsgError();

		return $msg;

	}

	public static function clearMsgError()
	{

		$_SESSION[Endereco::SESSION_ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Endereco::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Endereco::SUCCESS]) && $_SESSION[Endereco::SUCCESS]) ? $_SESSION[Endereco::SUCCESS] : '';

		Endereco::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Endereco::SUCCESS] = NULL;

	}

}

 ?>