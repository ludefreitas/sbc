<?php 

use \Sbc\Model\User;


function formatDate($date)
{

	return date('d/m/Y', strtotime($date));

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

function professorDaTurma(){


        return alert("Esta turma não pertence a este professor");

}






 ?>