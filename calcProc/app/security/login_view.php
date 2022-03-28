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
    <link rel="stylesheet" href="/calcProc/style/style.css" type = "text/css"/>

</head>
<body>

    <h1 class="Welcome-Name">Login</h1>


    <form action="/calcProc/app/security/login.php" method="post">
    <h2>Login to calculator</h2>
    <fieldset>

        <label>Login</label>`
        <input type="text" name="login" placeholder="login" />

        <label>Password</label>
        <input type="password" name="password" placeholder="password"  />

     </fieldset>

    <input class="ENTER"  type="submit" value="ENTER!"/>  <br/>
    </form>






    <!-- ERRORS -->
<?php 


    if ( isset($messages)) {
        if ( $messages > 0) {
            echo '<ol id="ErrorOl">';
           
	    	foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';

        }
    }
    



?>



</body>
</html>