<?php

	namespace Sbc\Model;

	use \Sbc\DB\Sql;
	use \Sbc\Model;
	use \Sbc\Mailer;
	use DateTime;

	class Temporada extends Model {

		const ERROR = "TemporadaError";
		const SUCCESS = "TemporadaSucesss";	


		public static function listAll()
		{
			$sql = new Sql();

			return $sql->select("
				SELECT * 
				FROM tb_temporada
				INNER JOIN tb_statustemporada
				using(idstatustemporada)
				ORDER BY desctemporada");
		}
		
		public static function listAllTurmaTemporada($idtemporada)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE idtemporada = :idtemporada
				ORDER BY a.numinscritos DESC", [
				':idtemporada'=>$idtemporada 
			]);
		}

		public static function listAllTurmaTemporadaLocal($idtemporada, $idlocal)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE a.idtemporada = :idtemporada
				AND e.idlocal = :idlocal
				ORDER BY a.numinscritos DESC", [
				':idtemporada'=>$idtemporada,
				':idlocal'=>$idlocal
			]);
		}


		public static function listAllTurmaTemporadaProfessor($idtemporada, $iduser)
		{
			$sql = new Sql();

			return $sql->select("SELECT * 
				FROM tb_turmatemporada a 
				INNER JOIN tb_turma i            
				using(idturma)
				INNER JOIN tb_users b
				using(iduser)
				INNER JOIN tb_atividade c
				using(idativ)
				INNER JOIN tb_espaco d
				using(idespaco)
				INNER JOIN tb_local e
				using(idlocal)
				-- INNER JOIN tb_turmastatus f
				-- using(idturmastatus)
				INNER JOIN tb_horario g
				using(idhorario)
				INNER JOIN tb_fxetaria h
				using(idfxetaria)	            
	            INNER JOIN tb_temporada j           
				using(idtemporada)   
	            INNER JOIN tb_statustemporada k          
				using(idstatustemporada)
				INNER JOIN tb_modalidade l
				using(idmodal)
	            INNER JOIN tb_persons m
				using(idperson)            
				WHERE idtemporada = :idtemporada
				AND a.iduser = :iduser
				ORDER BY a.numinscritos DESC", [
				':idtemporada'=>$idtemporada ,
				':iduser'=>$iduser 
			]);
		}
				

		public static function checkList($list)
		{
			foreach ($list as &$row) {
				
				$p = new Temporada();
				$p->setData($row);
				$row = $p->getValues();

			}
			return $list;
		}

		public function temporadaExiste($desctemporada){

			$sql = new Sql();

			$results = $sql->select("SELECT desctemporada FROM tb_temporada WHERE desctemporada = :desctemporada", [
				':desctemporada'=>$desctemporada 
			]);

			if($results){
				Temporada::setError("Temporada ".$desctemporada." já existe!");
				header("Location: /admin/temporada/create");
				exit;
			}
		}

		public function temporadaStatusIniciadaExiste(){

			$idstatustemporadaMatriculasIniciadas = StatusTemporada::MATRICULAS_INICIADAS;
			$idstatustemporadaMatriculasEncerradas = StatusTemporada::MATRICULAS_ENCERRADAS;
			$idstatustemporadaInscricoesIniciadas = StatusTemporada::INSCRICOES_INICIADAS;			
			$idstatustemporadaTemporadaIniciada = StatusTemporada::TEMPORADA_INICIADA;
			$sql = new Sql();
			$results = $sql->select("
				SELECT idstatustemporada 
				FROM tb_temporada 
				WHERE idstatustemporada = :idstatustemporadaMatriculasIniciadas
				OR idstatustemporada = :idstatustemporadaMatriculasEncerradas
				OR idstatustemporada = :idstatustemporadaInscricoesIniciadas
				OR idstatustemporada = :idstatustemporadaTemporadaIniciada", [
					':idstatustemporadaMatriculasIniciadas'=>$idstatustemporadaMatriculasIniciadas,
					':idstatustemporadaMatriculasEncerradas'=>$idstatustemporadaMatriculasEncerradas,
					':idstatustemporadaInscricoesIniciadas'=>$idstatustemporadaInscricoesIniciadas,
					':idstatustemporadaTemporadaIniciada'=>$idstatustemporadaTemporadaIniciada
			]);

			if($results){
				return true;
			}else{
				return false;
			}			
		}		

		/*

		public function statusTemporadaIsIniciadaInscricao($idtemporada){

			$idstatustemporadaInscricaoIniciada = StatusTemporada::INSCRICOES_INICIADAS;

			$sql = new Sql();

			$results = $sql->select("SELECT idstatustemporada 
				FROM tb_temporada 
				WHERE idtemporada = :idtemporada
                AND idstatustemporada = :idstatustemporadaInscricaoIniciada" ,[
				':idtemporada'=>$idtemporada,
				'idstatustemporadaInscricaoIniciada'=>$idstatustemporadaInscricaoIniciada,
			]);

			if($results){
				return true;
			}else{
				return false;
			}
		}
		*/

		/*
		public function statusTemporadaIsIniciadaMatricula($idtemporada){

			$idstatustemporadaMatriculaIniciada = StatusTemporada::MATRICULAS_INICIADAS;

			$sql = new Sql();

			$results = $sql->select("SELECT idstatustemporada 
				FROM tb_temporada 
				WHERE idtemporada = :idtemporada
                AND idstatustemporada = :idstatustemporadaMatriculaIniciada" ,[
				':idtemporada'=>$idtemporada,
				'idstatustemporadaMatriculaIniciada'=>$idstatustemporadaMatriculaIniciada,
			]);

			if($results){
				return true;
			}else{
				return false;
			}
		}
		*/

		/*
		public function temporadaStatusMatriculaIniciadaExiste(){

			$idstatustemporadaMatriculaIniciada = StatusTemporada::MATRICULAS_INICIADAS;
			$sql = new Sql();
			$results = $sql->select("
				SELECT idstatustemporada 
				FROM tb_temporada 
				WHERE idstatustemporada = :idstatustemporadaMatriculaIniciada", [
					':idstatustemporadaMatriculaIniciada'=>$idstatustemporadaMatriculaIniciada
			]);
			if($results){
				return true;
			}else{
				return false;
			}			
		}	
		*/	
		/*
		public function temporadaStatusInscricaoIniciadaExiste(){
			$idstatustemporadaInscricaoIniciada = StatusTemporada::INSCRICOES_INICIADAS;
			$sql = new Sql();
			$results = $sql->select("
				SELECT idstatustemporada 
				FROM tb_temporada 
				WHERE idstatustemporada = :idstatustemporadaInscricaoIniciada", [
					':idstatustemporadaInscricaoIniciada'=>$idstatustemporadaInscricaoIniciada
			]);
			if($results){
				return true;
			}else{
				return false;
			}			
		}
		*/

		public function save()
		{		

			$sql = new Sql();

			$results = $sql->select("CALL sp_temporada_save (:idtemporada, :desctemporada, :idstatustemporada, :dtinicinscricao, :dtterminscricao, :dtinicmatricula, :dttermmatricula)", array(
				":idtemporada"=>$this->getidtemporada(),
				":desctemporada"=>$this->getdesctemporada(),
				":idstatustemporada"=>$this->getidstatustemporada(),
				":dtinicinscricao"=>$this->getdtinicinscricao(),
				":dtterminscricao"=>$this->getdtterminscricao(),
				":dtinicmatricula"=>$this->getdtinicmatricula(),
				":dttermmatricula"=>$this->getdttermmatricula()
			));
			
			$temporada = $results[0]['desctemporada'];	
			$idtemporada = $results[0]['idtemporada'];			

			//Sorteio::createTableSorteio($temporada, $idtemporada);	

			$this->setData($results[0]);

			//Temporada::updateFile();
			Temporada::updateFileAdminTemporada();
			Temporada::updateFileAdminInscricoes();
			Temporada::updateFileAdminTurmaTemporada();
			Temporada::updateFileProfInscricoes();
			Temporada::updateFileProfTurmaTemporada();
		}

		public function get($idtemporada)
		{
			$sql = new Sql();

			$results = $sql->select("
				SELECT * FROM tb_temporada a 
				INNER JOIN tb_statustemporada b ON b.idstatustemporada = a.idstatustemporada
				WHERE idtemporada = :idtemporada", [
				':idtemporada'=>$idtemporada 
			]);		

			if($results){

				$this->setData($results[0]);

			}else{

				Temporada::setError("Temporada selecionada não encontrada!");
				header("Location: /admin/temporada");
				exit;
			}
					
		}

		public function delete()
		{
			$sql = new Sql();

			$results = $sql->select("DELETE FROM tb_temporada WHERE idtemporada = :idtemporada", [
				':idtemporada'=>$this->getidtemporada()
			]);	

			//Temporada::updateFile();
			Temporada::updateFileAdminTemporada();
			Temporada::updateFileAdminInscricoes();
			Temporada::updateFileAdminTurmaTemporada();
			Temporada::updateFileProfInscricoes();
			Temporada::updateFileProfTurmaTemporada();
		}

		// atualiza lista de temporada no site (no rodapé) temporada-menu.html
		/*
		public static function updateFile()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li><a href="/temporada/'.$row['idtemporada'].'">'.$row['desctemporada'].'</a></li>');
			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."temporada-menu.html", implode('', $html));
		}
		*/

		

		public static function updateFileAdminTemporada()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
								   		<a href="/admin/turma-temporada/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Temporada - '.$row['desctemporada'].'
								   		</a>
								   		<ul class="treeview-menu">									   		
									   		<li>
									   			<a href="/admin/professor-temporada/'.$row['idtemporada'].'">
									   				<i class="fa fa-link"></i>
									   				Profs Temporada '.$row['desctemporada'].'
									   			</a>
									   		</li>
									   		<li>
									   			<a href="/admin/sorteio/'.$row['idtemporada'].'">
									   				<i class="fa fa-link"></i>
									   				Sorteio '.$row['desctemporada'].'
									   			</a>
									   		</li>
										</ul>
									</li>');

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."temporada-menu.html", implode('', $html));
		}

		public static function updateFileAdminInscricoes()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
								   		<a href="/admin/insc/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Inscrições - '.$row['desctemporada'].'
								   		</a>								   		
									</li>');

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."insc-temporada-menu.html", implode('', $html));
		}

		public static function updateFileProfInscricoes()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
								   		<a href="/prof/insc/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Inscrições - '.$row['desctemporada'].'
								   		</a>								   		
									</li>');

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."prof".DIRECTORY_SEPARATOR."insc-temporada-menu.html", implode('', $html));
		}

		public static function updateFileAdminTurmaTemporada()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
										<a href="/admin/turma-temporada/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Turmas/Temporada '.$row['desctemporada'].'
								   		</a>								   		
									</li>'
								);

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."turma-temporada-menu.html", implode('', $html));
		}

		public static function updateFileProfTurmaTemporada()	
		{
			$temporada = Temporada::listAll();

			$html = [];

			foreach ($temporada as $row) {
				array_push($html, '<li class="treeview">
										<a href="/prof/turma-temporada/'.$row['idtemporada'].'">
								   			<i class="fa fa-link"></i> 
								   			Turmas '.$row['desctemporada'].'
								   		</a>								   		
									</li>'
								);

			}
			file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."prof".DIRECTORY_SEPARATOR."turma-temporada-menu.html", implode('', $html));
		}


		public function getTurmaTemporadaPage($page = 1, $itemsPerPage = 4)
		{

			$start = ($page - 1) * $itemsPerPage;

			$sql = new Sql();

			$results = $sql->select("

				SELECT SQL_CALC_FOUND_ROWS *
				FROM tb_turma a
				INNER JOIN tb_turmatemporada b ON a.idturma = b.idturma
	            INNER JOIN tb_espaco c ON c.idespaco = a.idespaco
	            INNER JOIN tb_horario d ON d.idhorario = a.idhorario
	            INNER JOIN tb_atividade e ON a.idativ = e.idativ
	            INNER JOIN tb_fxetaria f ON e.idfxetaria = f.idfxetaria
				INNER JOIN tb_users g ON a.iduser = g.iduser
				INNER JOIN tb_persons h ON g.idperson = h.idperson
	            INNER JOIN tb_espaco i ON a.idespaco = i.idespaco
				INNER JOIN tb_local j ON j.idlocal = c.idlocal
				INNER JOIN tb_temporada k ON k.idtemporada = b.idtemporada
				INNER JOIN tb_statustemporada l ON l.idstatustemporada = k.idstatustemporada
				INNER JOIN tb_turmastatus m ON m.idturmastatus = b.idturmastatus
				WHERE k.idtemporada = :idtemporada
				ORDER BY a.numinscritos
				LIMIT $start, $itemsPerPage;
				
			", [
				':idtemporada'=>$this->getidtemporada()
			]);

			$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

			return [
				'data'=>Turma::checkList($results),
				'total'=>(int)$resultTotal[0]["nrtotal"],
				'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
			];
		}

		public function getTurma($related = true)
		{
			$sql = new Sql();

			if ($related === true) {

				return $sql->select("
					SELECT * FROM tb_turma
					INNER JOIN tb_atividade 
					using(idativ)
					-- INNER JOIN tb_turmatemporada d
					-- USING(idturma)			
					INNER JOIN tb_modalidade
					using(idmodal)   
					INNER JOIN tb_fxetaria
					using(idfxetaria)             
	                INNER JOIN tb_espaco 
					using(idespaco)
	                -- INNER JOIN tb_users 
					-- using(iduser) 
					-- INNER JOIN tb_persons 
					-- using(idperson) 
					INNER JOIN tb_local 
					using(idlocal)
					INNER JOIN tb_horario 
					using(idhorario)
					-- INNER JOIN tb_turmastatus 
					-- using(idturmastatus) 				
						WHERE idturma IN(
						SELECT a.idturma
						FROM tb_turma a
						INNER JOIN tb_turmatemporada b ON b.idturma = a.idturma
						INNER JOIN tb_turmastatus d ON d.idturmastatus = b.idturmastatus
						WHERE b.idtemporada = :idtemporada ORDER BY descturma
					);
				", [
					':idtemporada'=>$this->getidtemporada()
				]);

			} else {

				return $sql->select("
					SELECT * FROM tb_turma
					INNER JOIN tb_atividade 
					using(idativ)
					INNER JOIN tb_modalidade
					using(idmodal)   
					INNER JOIN tb_fxetaria
					using(idfxetaria)             
	                INNER JOIN tb_espaco 
					using(idespaco)
	                -- INNER JOIN tb_users 
					-- using(iduser) 
					-- INNER JOIN tb_persons 
					-- using(idperson) 
					INNER JOIN tb_local 
					using(idlocal)
					INNER JOIN tb_horario 
					using(idhorario)
					-- INNER JOIN tb_turmastatus 
					-- using(idturmastatus) 							
					WHERE idturma NOT IN(
						SELECT a.idturma
						FROM tb_turma a
						INNER JOIN tb_turmatemporada b ON a.idturma = b.idturma
						INNER JOIN tb_users c ON c.iduser = b.iduser
						INNER JOIN tb_turmastatus d ON d.idturmastatus = b.idturmastatus
						WHERE b.idtemporada = :idtemporada ORDER BY a.descturma
					);
				", [
					':idtemporada'=>$this->getidtemporada()
				]);
			}		
		}

		public function alterarStatusTemporadaParaIncricoesIniciadas($dtInicinscricao, $idtemporada){
			$hoje = date('Y-m-d H:i:s');
			$data = date($dtInicinscricao);
			$intHoje = strtotime($hoje);
			$intData = strtotime($data);

			if($intHoje > $intData){

				Temporada::updateStatusTemporadaParaInscricoesIniciadas($idtemporada);					
			}
		} 		
		public function updateStatusTemporadaParaInscricoesIniciadas($idtemporada){
			$sql = new Sql();
			$idstatustemporadaInscricoesIniciadas = StatusTemporada::INSCRICOES_INICIADAS;
			$sql->query("UPDATE tb_temporada SET idstatustemporada = :idstatustemporadaInscricoesIniciadas  WHERE idtemporada = :idtemporada", [
				'idstatustemporadaInscricoesIniciadas'=>$idstatustemporadaInscricoesIniciadas,
				':idtemporada'=>$idtemporada
			]);
		}

		/*
		public function alterarStatusTemporadaParaMatriculasIniciadas($dtTerminscricao, $idtemporada){

			$hoje = date('Y-m-d H:i:s');
			$data = date($dtTerminscricao);
			$intHoje = strtotime($hoje);
			$intData = strtotime($data);

			if($intHoje > $intData){

				Temporada::updateStatusTemporadaParaMatriculasIniciadas($idtemporada);					
			}
		} 
		*/

		// Esta função é chamada quando é realizado o sorteio (Sorteio::Sortear)
		public function updateStatusTemporadaParaMatriculasIniciadas($idtemporada){
			$sql = new Sql();
			$idstatustemporadaMatriculasIniciadas = StatusTemporada::MATRICULAS_INICIADAS;
			$sql->query("UPDATE tb_temporada SET idstatustemporada = :idstatustemporadaMatriculasIniciadas  WHERE idtemporada = :idtemporada", [
				'idstatustemporadaMatriculasIniciadas'=>$idstatustemporadaMatriculasIniciadas,
				':idtemporada'=>$idtemporada
			]);
		}

		public function alterarStatusTemporadaParaInscricoesEncerradas($dtTerminscricao, $idtemporada){
			$hoje = date('Y-m-d H:i:s');
			$data = date($dtTerminscricao);
			$intHoje = strtotime($hoje);
			$intData = strtotime($data);

			if($intHoje > $intData){
				Temporada::updateStatusTemporadaParaInscricoesEncerradas($idtemporada);				
			}
		} 
		public function updateStatusTemporadaParaInscricoesEncerradas($idtemporada){
			$sql = new Sql();
			$idstatustemporadaInscricoesEncerradas = StatusTemporada::INSCRICOES_ENCERRADAS;
			$sql->query("UPDATE tb_temporada SET idstatustemporada = :idstatustemporadaInscricoesEncerradas  WHERE idtemporada = :idtemporada", [
				'idstatustemporadaInscricoesEncerradas'=>$idstatustemporadaInscricoesEncerradas,
				':idtemporada'=>$idtemporada
			]);
		}


		public function alterarStatusTemporadaParaMatriculasEncerradas($dtTermmatricula, $idtemporada){
			$hoje = date('Y-m-d H:i:s');
			$data = date($dtTermmatricula);
			$intHoje = strtotime($hoje);
			$intData = strtotime($data);

			if($intHoje > $intData){
				Temporada::updateStatusTemporadaMatriculasEncerradas($idtemporada);
			}
		}	
		public function updateStatusTemporadaMatriculasEncerradas($idtemporada){
			$sql = new Sql();
			$idstatustemporadaMatriculasEncerradas = StatusTemporada::MATRICULAS_ENCERRADAS;
			$sql->query("UPDATE tb_temporada SET idstatustemporada = :idstatustemporadaMatriculasEncerradas  WHERE idtemporada = :idtemporada", [
				'idstatustemporadaMatriculasEncerradas'=>$idstatustemporadaMatriculasEncerradas,
				':idtemporada'=>$idtemporada
			]);
		}

		public function numMaxInscritos($idtemporada){

			$sql = new Sql();
			
			$results =  $sql->select("SELECT MAX(numinscritos) as maximoInscritos FROM tb_turmatemporada WHERE idtemporada = :idtemporada", [
				':idtemporada'=>$idtemporada
			]);

			return $results;			
		}

		public function updateNumMatriculadosMais($idturma, $idtemporada){

			$sql = new Sql();
			
			$sql->select("CALL sp_turmatemporada_update_nummatriculados_mais(:idturma, :idtemporada)", array(
				":idturma"=>$idturma,
				":idtemporada"=>$idtemporada
			));
		}
		
		public function updateNumMatriculadosMenos($idturma, $idtemporada){

			$sql = new Sql();
			
			$sql->select("CALL sp_turmatemporada_update_nummatriculados_menos(:idturma, :idtemporada)", array(
				":idturma"=>$idturma,
				":idtemporada"=>$idtemporada
			));
		}

		public function addTurma(Turma $turma)
		{
			$sql = new Sql();

			$sql->query("INSERT INTO tb_turmatemporada (idtemporada, idturma) VALUES(:idtemporada, :idturma)", [
				':idtemporada'=>$this->getidtemporada(),
				':idturma'=>$turma->getidturma()
			]);
		}

		public function removeTurma(Turma $turma)
		{
			$sql = new Sql();

			$sql->query("DELETE FROM tb_turmatemporada WHERE idtemporada = :idtemporada AND idturma = :idturma", [
				':idtemporada'=>$this->getidtemporada(),
				':idturma'=>$turma->getidturma()
			]);
		}

		public function addTurmaTemporadaUser($idtemporada, $idturma, $iduser)
		{
			$sql = new Sql();

			$sql->query("UPDATE tb_turmatemporada SET iduser = :iduser WHERE idturma = :idturma AND idtemporada = :idtemporada", [
				':idtemporada'=>$idtemporada,
				':idturma'=>$idturma,
				':iduser'=>$iduser
			]);
		}

		public function removeTurmaTemporadaUser($idtemporada, $idturma, $iduser)
		{
			$sql = new Sql();

			$sql->query("UPDATE tb_turmatemporada SET iduser = 0 WHERE idturma = :idturma AND idtemporada = :idtemporada AND iduser = :iduser", [
				':idtemporada'=>$idtemporada,
				':idturma'=>$idturma,
				':iduser'=>$iduser
			]);
		}
		
		public static function seTurmaTemporadaExiste($idtemporada)
		{
			$sql = new Sql();

			return $sql->select("
				SELECT *
				FROM tb_turmatemporada
				WHERE idtemporada = :idtemporada", [
				':idtemporada'=>$idtemporada				
			]);
		}

		public static function professorRelacionadoTurmatemporadaExiste($idtemporada, $idturma)
		{
			$sql = new Sql();

			return $sql->select("
				SELECT *
				FROM tb_turmatemporada
				WHERE idtemporada = :idtemporada 
				AND idturma = :idturma
				AND iduser != 0", [
				':idtemporada'=>$idtemporada,
				':idturma'=>$idturma								
			]);
		}

		public static function setError($msg)
		{

			$_SESSION[Temporada::ERROR] = $msg;

		}

		public static function getError()
		{

			$msg = (isset($_SESSION[Temporada::ERROR]) && $_SESSION[Temporada::ERROR]) ? $_SESSION[Temporada::ERROR] : '';

			Temporada::clearError();

			return $msg;

		}

		public static function clearError()
		{

			$_SESSION[Temporada::ERROR] = NULL;

		}

		public static function setSuccess($msg)
		{

			$_SESSION[Temporada::SUCCESS] = $msg;

		}

		public static function getSuccess()
		{

			$msg = (isset($_SESSION[Temporada::SUCCESS]) && $_SESSION[Temporada::SUCCESS]) ? $_SESSION[Temporada::SUCCESS] : '';

			Temporada::clearSuccess();

			return $msg;
		}

		public static function clearSuccess()
		{

			$_SESSION[Temporada::SUCCESS] = NULL;

		}			
	}
	?>