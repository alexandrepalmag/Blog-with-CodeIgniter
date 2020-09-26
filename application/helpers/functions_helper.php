<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function clear($string){
	$table = array(
        '/'=>'', '('=>'', ')'=>'',
    );
    // Traduz os caracteres em $string, baseado no vetor $table
    $string = strtr($string, $table);
	$string= preg_replace('/[,.;:`´^~\'"]/', null, iconv('UTF-8','ASCII//TRANSLIT',$string));
	$string= strtolower($string);
	$string= str_replace(" ", "-", $string);
	$string= str_replace("---", "-", $string);
	return $string;
}

/* function postin($string){
    
    $dia_sem= date('w', strtotime($string));

    if($dia_sem == 0){
    $semana = "Sunday";
    }elseif($dia_sem == 1){
    $semana = "Monday";
    }elseif($dia_sem == 2){
    $semana = "Tuesday";
    }elseif($dia_sem == 3){
    $semana = "Wednesday";
    }elseif($dia_sem == 4){
    $semana = "Thurday";
    }elseif($dia_sem == 5){
    $semana = "Friday";
    }else{
    $semana = "Saturday";
    }

 	$dia= date('d', strtotime($string));

	$mes_num = date('m', strtotime($string));
 	if($mes_num == 01){
    $mes= "January";
    }elseif($mes_num == 02){
    $mes = "February";
    }elseif($mes_num == 03){
    $mes = "March";
    }elseif($mes_num == 04){
    $mes = "April";
    }elseif($mes_num == 05){
    $mes = "May";
    }elseif($mes_num == 06){
    $mes = "June";
    }elseif($mes_num == 07){
    $mes = "July";
    }elseif($mes_num == 08){
    $mes = "August";
    }elseif($mes_num == 09){
    $mes = "September";
    }elseif($mes_num == 10){
    $mes = "Octuber";
    }elseif($mes_num == 11){
    $mes = "November";
    }else{
    $mes = "December";
    }

    $ano = date('Y', strtotime($string));
    $hora = date('H:i', strtotime($string));
 
    return $semana.' '.$ano.' de '.$mes.' de '.$dia.' '.$hora;
} */