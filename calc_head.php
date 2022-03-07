<?php 

require_once dirname(__FILE__).'/../config.php';

$Amount = @$_REQUEST['Amount'];
$credit_Time = @$_REQUEST['time'];
$procent = @$_REQUEST['procent'];

//sprawdzeni czy podano dane czy ktos wpisał odręcznie link 

    if ( ! (isset($procent) && isset($credit_Time) && isset($Amount))) {
        $message [] = 'Incorrect application call!';
        
    }

    //sprawdzanie czy nie podano pustego pola!
    if ($Amount== "") {
        $message [] = 'The Amountwas not specified!';

    }
    if ($credit_Time == "") {
        $message [] = 'The time of credit time was not specifed!';

    }

    if ($procent == "") {
        $message [] = 'The percentage was not given';

    }


    //jezeni nie puste pola
    if (empty ($message)) {
        
        $Amount= intval($Amount);
        $credit_Time= floatval($credit_Time);
        $procent = floatval($procent);

        $year_result = ($Amount + ($Amount * $procent)) / $credit_Time;
        $monthly_result = (($Amount + ($Amount * $procent)) / $credit_Time)/12;

        $monthly_Rate =  number_format((float) $monthly_result, 2, '.', '');  
        $year_Rate = number_format((float) $year_result, 2, '.', '');
       
    }

    include 'calc_view.php';
?>