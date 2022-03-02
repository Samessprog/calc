<!DOCTYPE html>
<html>

<head lang="en">

    <title>Calculkator</title>
    <meta charset="UTF-8" />
    <meta  name="description" content="Calculator idt" />
    <meta name="key-words" content="calc,rent calc"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge= 1"/>   

    <style>
 
    </style>
    <link rel="stylesheet" href="style.css" type = "text/css"/>

</head>
<body>

<?php

$number = $_POST['sum'];
$years = $_POST['years'];
$procent = $_POST['procent'] ;

if ($number == null || $years == null || $procent == null ) {
    echo "ERROR";
 

} else {

    $result =  $number * $years * $procent / 100;

echo <<<END
    
       your result is: $result
        <br/> <br/>
        <a href = 'index.php'>BACK</a>
END;
    

}


?>


</body>
</html>








