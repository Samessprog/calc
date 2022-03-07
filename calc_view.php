
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

    <h1 class="Welcome-Name">Rent calculator</h1>

    <h2 style="font-size: 30px;">Enter your data:</h2> <br/>

    <form  action="<?php print(_APP_URL);?>/app/calc_head.php" method="post">

         <label class="date-name"><i>Amount</i></label> 
         <input class="calculator-date" type="number" name="Amount" placeholder="Amount" value="<?php print($Amount)?>" min="0"  /> 

         <label class="date-name" ><i>Time:</i></label>       
         <input  class="calculator-date"  type="number" name="time" placeholder="credit time"  value="<?php print($credit_Time)?>"  min="1" max="100" /> 

         <label class="date-name" ><i>Procent:</i></label> 
         <input  class="calculator-date"  type="number" name="procent"  placeholder="interest"  value="<?php print($procent)?>" min="0" max="100"/> 

         <input class="ENTER"  type="submit" value="ENTER!"/>  <br/>
    
    </form>



    <!-- ERRORS -->
    <?php 

    if ( isset($message)) {
        if ( $message > 0) {
            echo '<ol id="ErrorOl">';
           
	    	foreach ( $message as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';

        }
    }
    
    
    if (isset($monthly_Rate )&& isset($year_Rate)) {
ECHO <<< END
        <div class = "rate-result">
        annual installment: $year_Rate </br>
        monthly annual: $monthly_Rate
        </div>
END;
    }


?>



</body>
</html>


