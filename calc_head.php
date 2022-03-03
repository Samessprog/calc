<?php 

require_once dirname(__FILE__).'/../config.php';


$number = $_REQUEST['number'];
$years = $_REQUEST['years'];
$procent = $_REQUEST['procent'];



//sprawdzeni czy podano dane czy ktos wpisał odręcznie link 

    if ( ! (isset($procent) && isset($years) && isset($number))) {
        $message [] = 'Incorrect application call!';
        
    }

    //sprawdzanie czy nie podano pustego pola!
    if ($number == "") {
        $message [] = 'The number was not specified!';

    }
    if ($years == "") {
        $message [] = 'The number of years was not specifed!';

    }

    if ($procent == "") {
        $message [] = 'The percentage was not given';

    }



    //jezeni nie puste pola
    if (empty ($message)) {
        
        $number = intval($number);
        $years = floatval($years);
        $procent = floatval($procent);

       $rate= ($number * $procent) ; 




    }






    include 'calc_view.php';
?>