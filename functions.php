<?php 

use \Sbc\Model\User;

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


 ?>