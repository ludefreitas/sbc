<?php 

use \Sbc\Model\User;


function colorStatus($idinscstatus){

    if($idinscstatus === '1'){
       return 'style="background: linear-gradient(to bottom, rgba(192, 192, 192, 0.8), transparent);"';
    }else if($idinscstatus === '2'){
       return 'style="background: linear-gradient(to bottom, rgba(0, 255, 0, 0.4), transparent);"';
    }else if($idinscstatus === '6'){
       return 'style="background: linear-gradient(to bottom, rgba(0, 0, 255, 0.4), transparent);"';
    }else if($idinscstatus === '7'){
       return 'style="background: linear-gradient(to bottom, rgba(255, 0, 0, 0.4), transparent);"';      
    }
}


function formatDate($date)
{

	return date('d/m/Y', strtotime($date));

}

function formatDateHour($dateHour)
{

    return date('d/m/Y - H:i:s', strtotime($dateHour));

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