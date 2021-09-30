<?php

namespace Sbc\Model;

use \Sbc\DB\Sql;
use \Sbc\Model;
use \Sbc\Mailer;

class User extends Model {

	const SESSION = "User";
	const SECRET = "Cursos_2020_Sbc1"; //Colocar nas "" secret com 16 caracters;
	const SECRET_IV = "Cursos_2020_Sbc1_IV"; //Colocar nas "" secret com 16 caracters + _IV;
	const ERROR = "UserError";
	const ERROR_REGISTER = "UserErrorRegister";
	const ERROR_REGISTER_SENDMAIL = "UserErrorRegisterSendmail";
	const SUCCESS = "UserSucesss";	

	public static function getFromSession()
	{

		$user = new User();

		if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 0) {

			$user->setData($_SESSION[User::SESSION]);

		}

		return $user;

	}

	public static function checkLogin($inadmin = true)
	{

		if (
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0
		) {
			//Não está logado
			return false;

		} else {

			if ($inadmin === true && (bool)$_SESSION[User::SESSION]['inadmin'] === true) {

				return true;

			} else if ($inadmin === false) {

				return true;

			} else {

				return false;

			}
		}
	}

	public static function checkLoginProf($isprof = true)
	{

		if (
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0
		) {
			//Não está logado
			return false;

		} else {

			if ($isprof === true && (bool)$_SESSION[User::SESSION]['isprof'] === true) {

				return true;

			} else if ($isprof === false) {

				return true;

			} else {

				return false;

			}
		}
	}

	public function login($login, $password)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users INNER JOIN tb_persons using(idperson) where deslogin = :LOGIN", array(
			":LOGIN"=>$login
		));

		if(count($results) === 0)
		{
			throw new \Exception("Usuário inexistente ou senha inválida!!!", 1);			
		}

		$data = $results[0];

		if(password_verify($password, $data["despassword"]) === true)
		{

			$user = new User();

			$data['desperson'] = utf8_encode($data['desperson']);

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			if(isset($_POST['lembrar']) && $_POST['lembrar'] == 'sempre' ){

				User::rememberUser($login);
				User::rememberPassword($password);				

			}

			return $user;

		}else {
			throw new \Exception("Usuário inexistente ou senha inválida!");			
		}

	}
	
	public static function verifyLogin($inadmin = true)
	{

		if (!User::checkLogin($inadmin)) {

			if ($inadmin) {
				header("Location: /login");
			} else {
				header("Location: /user-create");
			}
			exit;

		}

	}

	public static function verifyLoginProf($isprof = true)
	{

		if (!User::checkLoginProf($isprof)) {

			if ($isprof) {
				header("Location: /login");
			} else {
				header("Location: /user-create");
			}
			exit;

		}

	}

	public static function logout()
	{

		$_SESSION[User::SESSION] = NULL;

	}

	private function rememberUser($user){

		$validade = strtotime("+1 month");

		$user = base64_encode($user);

		setcookie("sisgen_user", $user, $validade, "/", "", false, true);
	}

	private function rememberPassword($pass){

		$validade = strtotime("+1 month");

		$pass = base64_encode($pass);

		setcookie("sisgen_pass", $pass, $validade, "/", "", false, true);
	}

	public function forgotUserPass(){

		$validade = time() - 3600;

		setcookie("sisgen_user", '', $validade, "/", "", false, true);
		setcookie("sisgen_pass", '', $validade, "/", "", false, true);
	}
	
	/*
	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_users a 	INNER JOIN tb_persons b using(idperson) ORDER BY b.desperson");
	
	}
	*/

	
	public static function listAllProf()
	{

		$sql = new Sql();

		return $sql->select("
			SELECT * FROM tb_users a 
			INNER JOIN tb_persons b 
			using(idperson) 
			WHERE isprof = 1;
			ORDER BY b.desperson");
	}
	
	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_users_save(:desperson, :apelidoperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin, :isprof, :statususer)", array(
			":desperson"=>utf8_decode($this->getdesperson()),
			":apelidoperson"=>$this->getapelidoperson(),
			":deslogin"=>$this->getdeslogin(),
			":despassword"=>User::getPasswordHash($this->getdespassword()),
			":desemail"=>$this->getdesemail(),
			":nrphone"=>$this->getnrphone(),
			":inadmin"=>$this->getinadmin(),
			":isprof"=>$this->getisprof(),
			":statususer"=>$this->getstatususer()
		));

		$this->setData($results[0]);
	}

	public function get($iduser)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser", array(
			":iduser"=>$iduser
		));

		if($results){

			$data = $results[0];

			$data['desperson'] = utf8_encode($data['desperson']);

			$this->setData($data);			

		}else{

			User::setError("Usuário selecionado não existe!");
			header("Location: /admin/users");
			exit();			
		}
		
	}

	public function update()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_usersupdate_save(:iduser, :desperson, :apelidoperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin, :isprof, :statususer)", array(
			":iduser"=>$this->getiduser(),
			":desperson"=>$this->getdesperson(),
			":apelidoperson"=>$this->getapelidoperson(),
			":deslogin"=>$this->getdeslogin(),
			":despassword"=>$this->getdespassword(),
			//":despassword"=>User::getPasswordHash($this->getdespassword()),
			":desemail"=>$this->getdesemail(),
			":nrphone"=>$this->getnrphone(),
			":inadmin"=>$this->getinadmin(),
			":isprof"=>$this->getisprof(),
			":statususer"=>$this->getstatususer()
		));

		$this->setData($results[0]);
	}

	public function updatePassword()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_usersupdate_save(:iduser, :desperson, :apelidoperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin, :isprof, :statususer)", array(
			":iduser"=>$this->getiduser(),
			":desperson"=>$this->getdesperson(),
			":apelidoperson"=>$this->getapelidoperson(),
			":deslogin"=>$this->getdeslogin(),
			//":despassword"=>$this->getdespassword(),
			":despassword"=>User::getPasswordHash($this->getdespassword()),
			":desemail"=>$this->getdesemail(),
			":nrphone"=>$this->getnrphone(),
			":inadmin"=>$this->getinadmin(),
			":isprof"=>$this->getisprof(),
			":statususer"=>$this->getstatususer()
		));

		$this->setData($results[0]);
	}

	public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_users_delete(:iduser)", array(
			":iduser"=>$this->getiduser()
		));
	}

	public static function getPasswordHash($password)
	{

		return password_hash($password, PASSWORD_DEFAULT, [
			'cost'=>12
		]);

	}

	public static function getForgot($email, $inadmin = true)
	{
     $sql = new Sql();
     $results = $sql->select("
         SELECT *
         FROM tb_persons a
         INNER JOIN tb_users b USING(idperson)
         WHERE a.desemail = :email;
     ", array(
         ":email"=>$email
     ));

     if (count($results) === 0)
     {

         //throw new \Exception("Não foi possível recuperar a senha.");

         User::setError("Não foi possível recuperar a senha!! Usuário ou email não cadastrado!");
		 header("Location: /login");
			exit();			

     }
     else
     {
         $data = $results[0];

         $results2 = $sql->select("CALL sp_userspasswordsrecoveries_create(:iduser, :desip)", array(
             ":iduser"=>$data['iduser'],
             ":desip"=>$_SERVER['REMOTE_ADDR']
         ));
         if (count($results2) === 0)
         {
             //throw new \Exception("Não foi possível recuperar a senha.");

             User::setError("Não foi possível recuperar a senha!! Código expirado!");
		 	header("Location: /login");
			exit();			
         }
         else
         {
             $dataRecovery = $results2[0];
             $iv = random_bytes(openssl_cipher_iv_length('aes-256-cbc'));
             $code = openssl_encrypt($dataRecovery['idrecovery'], 'aes-256-cbc', User::SECRET, 0, $iv);
             $result = base64_encode($iv.$code);
             if ($inadmin === true) {
                 $link = "http://www.cursosesportivos.com.br/admin/forgot/reset?code=$result";
             } else {
                 $link = "http://www.cursosesportivos.com.br/forgot/reset?code=$result";
             } 
             $mailer = new Mailer($data['desemail'], $data['desperson'], "Redefinir senha do Cursos Esportivos SBC", "forgot", array(
                 "name"=>$data['desperson'],
                 "link"=>$link
             )); 
             $mailer->send();
             return $link;
         }
     }
 }
 public static function validForgotDecrypt($result)
 {
     $result = base64_decode($result);
     $code = mb_substr($result, openssl_cipher_iv_length('aes-256-cbc'), null, '8bit');
     $iv = mb_substr($result, 0, openssl_cipher_iv_length('aes-256-cbc'), '8bit');;
     $idrecovery = openssl_decrypt($code, 'aes-256-cbc', User::SECRET, 0, $iv);
     $sql = new Sql();
     $results = $sql->select("
         SELECT *
         FROM tb_userspasswordsrecoveries a
         INNER JOIN tb_users b USING(iduser)
         INNER JOIN tb_persons c USING(idperson)
         WHERE
         a.idrecovery = :idrecovery
         AND
         a.dtrecovery IS NULL
         AND
         DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW();
     ", array(
         ":idrecovery"=>$idrecovery
     ));
     if (count($results) === 0)
     {
           User::setError("Não foi possível recuperar a senha!! Código expirado!");
		 	header("Location: /login");
			exit();			
     }
     else
     {
         return $results[0];
     }
 }

 	public static function setForgotUsed($idrecovery)
	{

		$sql = new Sql();

		$sql->query("UPDATE tb_userspasswordsrecoveries SET dtrecovery = NOW() WHERE idrecovery = :idrecovery", array(
			":idrecovery"=>$idrecovery
		));

	}

	public function setPassword($password)
	{

		$sql = new Sql();

		$sql->query("UPDATE tb_users SET despassword = :password WHERE iduser = :iduser", array(
			":password"=>$password,
			":password"=>User::getPasswordHash($password),
			":iduser"=>$this->getiduser()
		));

	}

	public function validaEmail($email){

		//$email = test_input($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			//$emailErr = "Invalid email format";
  			return false; // Retorno false para indicar que o e-mail é invalido	
		}else{
			return true; // Retorno true para indicar que o e-mail é valido	
		}
		
	}

	public static function getPage($page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_users a 
			INNER JOIN tb_persons b USING(idperson) 
			ORDER BY b.desperson
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageProf($page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_users a 
			INNER JOIN tb_persons b USING(idperson) 
			WHERE isprof = 1
			ORDER BY b.desperson
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
			FROM tb_users a 
			INNER JOIN tb_persons b USING(idperson)
			WHERE b.desperson LIKE :search OR b.desemail = :search OR a.deslogin LIKE :search
			ORDER BY b.desperson
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

	public static function getPageSearchProf($search, $page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_users a 
			INNER JOIN tb_persons b USING(idperson)

			WHERE isprof = 1 AND b.desperson LIKE :search OR b.desemail = :search OR a.deslogin LIKE :search
			ORDER BY b.desperson
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

	public static function getPageCliente($page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_users a 
			INNER JOIN tb_persons b USING(idperson) 
			WHERE isprof = 0 AND inadmin = 0
			ORDER BY b.desperson
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearchCliente($search, $page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_users a 
			INNER JOIN tb_persons b USING(idperson)
			WHERE isprof = 0 AND inadmin = 0 AND b.desperson LIKE :search OR b.desemail = :search OR a.deslogin LIKE :search
			ORDER BY b.desperson
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

	public static function setErrorRegisterSendmail($msg)
	{

		$_SESSION[User::ERROR_REGISTER_SENDMAIL] = $msg;

	}

	public static function getErrorRegisterSendmail()
	{

		$msg = (isset($_SESSION[User::ERROR_REGISTER_SENDMAIL]) && $_SESSION[User::ERROR_REGISTER_SENDMAIL]) ? $_SESSION[User::ERROR_REGISTER_SENDMAIL] : '';

		User::clearErrorRegisterSendmail();

		return $msg;

	}

	public static function clearErrorRegisterSendmail()
	{

		$_SESSION[User::ERROR_REGISTER_SENDMAIL] = NULL;

	}


	public static function checkLoginExist($login)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :deslogin", [
			':deslogin'=>$login
		]);

		return (count($results) > 0);

	}

	public function getPessoa()	{

		$sql = new Sql();

		$results = $sql->select(
			"SELECT * FROM tb_pessoa a
			-- INNER JOIN 	tb_users b using (iduser)
			WHERE statuspessoa = 1 AND
			iduser = :iduser", [
			':iduser'=>$this->getiduser()
		]);

		return $results;
	}

	public function getFromId($iduser)
	{

		$sql = new Sql();

		$rows = $sql->select(
			"SELECT * FROM tb_pessoa 
			INNER JOIN 	tb_users USING(iduser)
			
			WHERE iduser = :iduser ", [
			':iduser'=>$iduser
		]);

		$this->setData($rows[0]);
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
			INNER JOIN tb_temporada j ON j.idtemporada = a.idtemporada
			WHERE e.iduser = :iduser -- AND a.idinscstatus != 7
		", [
			':iduser'=>$this->getiduser()
		]);

		return $results;

	}

	function calcularIdade($dtnasc){
    $time = strtotime($dtnasc);
    if($time === false){
      return '';
    }
 
    $year_diff = '';
    $dtnasc = date('Y-m-d', $time);
    list($year,$month,$day) = explode('-',$dtnasc);
    $year_diff = date('Y') - $year;
    $month_diff = date('m') - $month;
    $day_diff = date('d') - $day;
    if ($day_diff < 0 || $month_diff < 0){
    	$year_diff;
    } 
 
    return $year_diff;

   }

   public function getTurmaTemporada($related = true, $idtemporada, $iduser)
		{
			$sql = new Sql();

			if ($related === true) {

				return $sql->select("
					SELECT * FROM tb_turmatemporada a
					INNER JOIN tb_turma 
					using(idturma)
					INNER JOIN tb_users 
					using(iduser)
					INNER JOIN tb_persons 
					using(idperson)
					INNER JOIN tb_atividade 
					using(idativ)
					INNER JOIN tb_modalidade
					using(idmodal)   
					INNER JOIN tb_fxetaria
					using(idfxetaria)             
	                INNER JOIN tb_espaco 
					using(idespaco)
					INNER JOIN tb_local 
					using(idlocal)
					INNER JOIN tb_horario 
					using(idhorario)
					-- INNER JOIN tb_turmastatus 
					-- using(idturmastatus) 				
					WHERE a.iduser = :iduser 
					AND a.idtemporada = :idtemporada
				", [
					':iduser'=>$iduser,
					':idtemporada'=>$idtemporada
				]);

			} else {

				return $sql->select("
					SELECT * FROM tb_turmatemporada a
					INNER JOIN tb_turma 
					using(idturma)
					INNER JOIN tb_users 
					using(iduser)
					-- INNER JOIN tb_persons 
					-- using(idperson)
					INNER JOIN tb_atividade 
					using(idativ)
					INNER JOIN tb_modalidade
					using(idmodal)   
					INNER JOIN tb_fxetaria
					using(idfxetaria)             
	                INNER JOIN tb_espaco 
					using(idespaco)
					INNER JOIN tb_local 
					using(idlocal)
					INNER JOIN tb_horario 
					using(idhorario)
					-- INNER JOIN tb_turmastatus 
					-- using(idturmastatus) 	
					-- WHERE a.iduser = 0 OR a.iduser is null 			
					WHERE a.iduser != :iduser  
					AND a.idtemporada = :idtemporada
				", [
					':iduser'=>$iduser,
					':idtemporada'=>$idtemporada
				]);
			}		
		}

		public function getTurmaTemporadaLocal($related = true, $idtemporada, $iduser, $idlocal)
		{
			$sql = new Sql();

			if ($related === true) {

				return $sql->select("
					SELECT * FROM tb_turmatemporada a
					INNER JOIN tb_turma 
					using(idturma)
					INNER JOIN tb_users 
					using(iduser)
					INNER JOIN tb_persons 
					using(idperson)
					INNER JOIN tb_atividade 
					using(idativ)
					INNER JOIN tb_modalidade
					using(idmodal)   
					INNER JOIN tb_fxetaria
					using(idfxetaria)             
	                INNER JOIN tb_espaco d
					using(idespaco)
					INNER JOIN tb_local e
					ON e.idlocal = d.idlocal
					INNER JOIN tb_horario 
					using(idhorario)
					-- INNER JOIN tb_turmastatus 
					-- using(idturmastatus) 				
					WHERE a.iduser = :iduser 
					AND a.idtemporada = :idtemporada
					AND e.idlocal = :idlocal
				", [
					':iduser'=>$iduser,
					':idtemporada'=>$idtemporada,
					':idlocal'=>$idlocal
				]);

			} else {

				return $sql->select("
					SELECT * FROM tb_turmatemporada a
					INNER JOIN tb_turma 
					using(idturma)
					INNER JOIN tb_users 
					using(iduser)
					-- INNER JOIN tb_persons 
					-- using(idperson)
					INNER JOIN tb_atividade 
					using(idativ)
					INNER JOIN tb_modalidade
					using(idmodal)   
					INNER JOIN tb_fxetaria
					using(idfxetaria)             
	                INNER JOIN tb_espaco d
					using(idespaco)
					INNER JOIN tb_local e
					ON e.idlocal = d.idlocal
					INNER JOIN tb_horario 
					using(idhorario)
					-- INNER JOIN tb_turmastatus 
					-- using(idturmastatus) 	
					-- WHERE a.iduser = 0 OR a.iduser is null 			
					WHERE a.iduser != :iduser  
					AND a.idtemporada = :idtemporada
					AND e.idlocal = :idlocal
				", [
					':iduser'=>$iduser,
					':idtemporada'=>$idtemporada,
					':idlocal'=>$idlocal
				]);
			}		
		}

		/*
		public function getUserInTurmaTemporada($idturma, $idtemporada){

			$sql = new Sql();

			$rows = $sql->select(
				"SELECT * FROM tb_turmatemporada 
				INNER JOIN tb_users USING(iduser)
				INNER JOIN tb_persons USING(idperson)			
				WHERE idturma = :idturma
				AND idtemporada = :idtemporada ", [
				':idturma'=>$idturma,
				':idtemporada'=>$idtemporada
			]);

			return $rows;
		}
		*/
		
		public function getIdUseInTurmaTemporada($idturma, $idtemporada){

			$sql = new Sql();

			$rows = $sql->select(
				"SELECT iduser FROM tb_turmatemporada 			
				WHERE idturma = :idturma
				AND idtemporada = :idtemporada
				-- AND iduser = :iduser ", [
				':idturma'=>$idturma,
				':idtemporada'=>$idtemporada
				//':iduser'=>$iduser
			]);

			return $rows[0];
			
		}



}




?>
