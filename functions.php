<?php 

use \Sbc\Model\User;
use \Sbc\Model\Saude;
use \Sbc\DB\Sql;

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