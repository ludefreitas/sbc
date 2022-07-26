<?php 

use \Sbc\Model\User;
use \Sbc\Model\Saude;
use \Sbc\DB\Sql;
use \Sbc\Model\Temporada;
use \Sbc\Model\Insc;

function statusPresenca($dia, $mes, $idinsc, $idturma, $idtemporada)
{
    $statusPresenca = new Insc();
    $statusPresenca = Insc::getStatusPresencaByIdinscIdturmaIdtemporada($dia, $mes, $idinsc, $idturma, $idtemporada);

    if($statusPresenca == 0){
        return '<span style="color: red;">F</span>';
    }
    if($statusPresenca == 1){
        return '<span style="color: black;">P</span>';
    }
    if($statusPresenca == 2){
        return '<span style="color: blue;">J</span>';
    }
    if($statusPresenca == 4){
        return '-';
    }
    
}

function ControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada)
{
    $controleAnoAnt = new Temporada();
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    return $controleAnoAnt;
}

function ControleFrequenciaJan($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleJan = new Temporada();    
    $controleJan = Temporada::listAllTurmaTemporadaControleFrequenciaJan($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 1){
        return 0;
    }else{
       return $controleJan + $controleAnoAnt; 
    }
}

function ControleFrequenciaFev($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleFev = new Temporada();    
    $controleFev = Temporada::listAllTurmaTemporadaControleFrequenciaFev($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 2){
        return 0;
    }else{
       return $controleFev + $controleAnoAnt; 
    }
}

function ControleFrequenciaMar($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleMar = new Temporada();    
    $controleMar = Temporada::listAllTurmaTemporadaControleFrequenciaMar($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 3){
        return 0;
    }else{
       return $controleMar + $controleAnoAnt; 
    }
}

function ControleFrequenciaAbr($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleAbr = new Temporada();    
    $controleAbr = Temporada::listAllTurmaTemporadaControleFrequenciaAbr($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 4){
        return 0;
    }else{
       return $controleAbr + $controleAnoAnt; 
    }
}

function ControleFrequenciaMai($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleMai = new Temporada();    
    $controleMai = Temporada::listAllTurmaTemporadaControleFrequenciaMai($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 5){
        return 0;
    }else{
       return $controleMai + $controleAnoAnt; 
    }
}

function ControleFrequenciaJun($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');    
    $controleJun = new Temporada();    
    $controleJun = Temporada::listAllTurmaTemporadaControleFrequenciaJun($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 6){
        return 0;
    }else{
       return $controleJun + $controleAnoAnt; 
    }
    
}

function ControleFrequenciaJul($idturma, $idtemporada, $desctemporada)
{   
    $data = date('m'); 
    $controleJul = new Temporada();    
    $controleJul = Temporada::listAllTurmaTemporadaControleFrequenciaJul($idturma, $idtemporada, $desctemporada);    
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 7){
        return 0;
    }else{
       return $controleJul + $controleAnoAnt; 
    }
}

function ControleFrequenciaAgo($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleAgo = new Temporada();    
    $controleAgo = Temporada::listAllTurmaTemporadaControleFrequenciaAgo($idturma, $idtemporada, $desctemporada);    
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 8){
        return 0;
    }else{
       return $controleAgo + $controleAnoAnt; 
    }
}

function ControleFrequenciaSet($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleSet = new Temporada();    
    $controleSet = Temporada::listAllTurmaTemporadaControleFrequenciaSet($idturma, $idtemporada, $desctemporada);    
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 9){
        return 0;
    }else{
       return $controleSet + $controleAnoAnt; 
    }
}

function ControleFrequenciaOut($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleOut = new Temporada();    
    $controleOut = Temporada::listAllTurmaTemporadaControleFrequenciaOut($idturma, $idtemporada, $desctemporada);    
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 10){
        return 0;
    }else{
       return $controleOut + $controleAnoAnt; 
    }
}

function ControleFrequenciaNov($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleNov = new Temporada();    
    $controleNov = Temporada::listAllTurmaTemporadaControleFrequenciaNov($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 11){
        return 0;
    }else{
       return $controleNov + $controleAnoAnt; 
    }
}

/*
function ControleFrequenciaDez($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleDez = new Temporada();    
    $controleDez = Temporada::listAllTurmaTemporadaControleFrequenciaDez($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 12){
        return 0;
    }else{
       return $controleDez + $controleAnoAnt; 
    }
}
*/

function formatar_mascara($src, $mascara) {
  $campo = $src.value.length;
  $saida = $mascara.substring(0,1);
  $texto = $mascara.substring($campo);
 if($texto.substring(0,1) != $saida) {
 $src += $texto.substring(0,1);
 }
}

function colorStatus($idinscstatus){

    if($idinscstatus === '1'){
       return 'style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0.8), transparent);"';
    }else if($idinscstatus === '2'){
       return 'style="background: linear-gradient(to bottom, rgba(0, 255, 0, 0.4), transparent);"'; 
    }else if($idinscstatus === '3'){
       return 'style="background: linear-gradient(to bottom, rgba( 96, 96, 192, 0.4), transparent);"'; 
    }else if($idinscstatus === '6'){
       return 'style="background: linear-gradient(to bottom, rgba(0, 0, 255, 0.4), transparent);"';    
    }else if($idinscstatus === '7'){       
       return 'style="background: linear-gradient(to bottom, rgba(0, 192, 255, 0.4), transparent);"';     
    }else if($idinscstatus === '8'){
       return 'style="background: linear-gradient(to bottom, rgba(192, 192, 192, 0.4), transparent);"'; 
    }else if($idinscstatus === '9'){
       return 'style="background: linear-gradient(to bottom, rgba(255, 0, 0, 0.4), transparent);"'; 
    }   
}

function formatCpf($cpf){

    $cpf1 = substr($cpf, 0, 4);
    $cpf2 = substr($cpf, 11, 11);

    return $cpf1."###.###".$cpf2;
}

function formatDateEng($date)
{

    return date('dd/mm/YYYY', strtotime($date));

}


function formatDate($date)
{

	return date('d/m/Y', strtotime($date));

}

function formatAnoInicial($initIdade)
{
    $anoAtual = date('Y');

    $anoInicial = $anoAtual - $initIdade;

    return $anoInicial;
}

function formatAnoFinal($fimIdade)
{
    $anoAtual = date('Y');

    $AnoFinal = $anoAtual - $fimIdade;

    return $AnoFinal;
}

function formatDateAno($date)
{

    return date('Y', strtotime($date));

}

function formatDateHour($dateHour)
{

    return date('d/m/Y H:i:s', strtotime($dateHour));

}

function checkLogin($inadmin = true)
{

	return User::checkLogin($inadmin);

}

function getUserName()
{

	$user = User::getFromSession();

	return $user->getdesperson();

}

function getUserIsProf()
{
    $user = User::getFromSession();

    $html = [];

    array_push($html, '<li class="nav-item">
                            <a href="/prof" class="nav-link">
                              <span class="text-white" style="font-weight: bold">
                                Professor
                              </span>
                            </a>
                        </li>'
                    );

    if ($user->getisprof() == 1){
        return $html[0];
    }
}

function getUserIsAdmin()
{
    $user = User::getFromSession();

    $html = [];

    array_push($html, '<li class="nav-item">
                            <a href="/admin" class="nav-link">
                              <span class="text-white" style="font-weight: bold">
                                Admin
                              </span>
                            </a>
                        </li>'
                    );

    if ($user->getinadmin() == 1){
        return $html[0];
    }
}

function getUserId()
{

    $user = User::getFromSession();

    return $user->getiduser();

}

function calcularIdade($date){
    $time = strtotime($date);
    if($time === false){
      return '';
    }
 
    $year_diff = '';
    $date = date('Y-m-d', $time);
    list($year,$month,$day) = explode('-',$date);
    $year_diff = date('Y') - $year;
    $month_diff = date('m') - $month;
    $day_diff = date('d') - $day;
    if ($day_diff < 0 || $month_diff < 0){
    	$year_diff;
    } 
 
    return $year_diff;

   }

   function idadeCerta($idade, $initIdade, $fimIdade){

        if(($idade <= $initIdade) || ($idade <= $fimIdade)){

            return false;

       }else{

            return true;
       }
    }

    /*
if(isset($_POST['cid'])){
    
$codigo = $_POST['palavra'];


        $sql = new Sql();

        $resultado_cursos = $sql->select("SELECT doenca
            FROM tb_cid WHERE codigo LIKE :codigo", [
            ':codigo'=>'%'.$codigo.'%'          
        ]);

        if(mysql_num_rows($$resultado_cursos) <= 0){
            echo "Nenhum resultado econtrado...";
        }else{
            echo "Resultado econtrado...";
        }
}

if(isset($_GET['cid'])){
    

    $codigo = $_GET['cid'];

   // var_dump($codigo);

       obtemDoencaCid($codigo);
    
}

function obtemDoencaCid($codigo){

        $sql = new Sql();

        $sql->select("SELECT doenca
            FROM tb_cid WHERE codigo = :codigo", [
            ':codigo'=>$codigo          
        ]);

        if($sql){
             
            $valores = $sql;
            return $valores;
            //$valores = implode('', $valores);
            print_r($valores);
        }else{
            $valores = "nãoEncontrado";
            return $valores;
            print_r($valores);
        }
}
*/


 ?>