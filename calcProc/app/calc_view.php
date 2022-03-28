<?php
require_once dirname(__FILE__) . '/../config.php';
include _ROOT_PATH . '/app/security/check.php';
?>
<!DOCTYPE html>


<head lang="en">

    <title>Calculkator</title>
    <meta charset="UTF-8" />
    <meta name="description" content="Calculator idt" />
    <meta name="key-words" content="calc,rent calc" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge= 1" />

    <style>
        #p-logout {
            font-size: 20px;
            position: fixed;
            top: 0;
            right: 50px;
            margin-top: 17px;

        }

        #role {
            font-size: 25px;
            color: red;

        }


        #logout {
            text-decoration: none;
            position: relative;
            right: -20px;
            border: 2px dashed red;
            color: black;

        }

        .stopka {
            color: white;
            position: fixed;
            bottom: 0;
            font-size: 15px;

        }
    </style>

    <link rel="stylesheet" type="text/css" href="app/css/main.css" />
</head>

<body>

    <h1 class="Welcome-Name">Rent calculator</h1>

    <h2 style="font-size: 30px;">Enter your data:</h2> <br />
    <div class="m-t-50">
        <form method="post" action="<?php print(_APP_URL); ?>/app/calc_head.php">

            <label class="date-name"><i>Amount</i></label>
            <input class="calculator-date" type="number" name="Amount" placeholder="Amount" value="<?php print($Amount) ?>" min="0" />

            <label class="date-name"><i>Years:</i></label>
            <input class="calculator-date" type="number" name="time" placeholder="credit time" value="<?php print($credit_Time) ?>" />

            <label class="date-name"><i>Procent:</i></label>
            <input class="calculator-date" type="number" name="procent" placeholder="interest" value="<?php print($procent) ?>" />

            <input class="ENTER" type="submit" value="ENTER!" /> <br />

        </form>
    </div>



    <?php

    if (isset($message)) {
        if ($message > 0) {
            echo '<ol id="ErrorOl">';

            foreach ($message as $key => $msg) {
                echo '<li>' . $msg . '</li>';
            }
            echo '</ol>';
        }
    }

    if (isset($rate) && isset($year_Rate)) {
        echo <<< END
    <div class = "rate-result">
    annual installment: $year_Rate </br>
    monthly annual: $rate
    </div>
END;
    }

    echo "<div id  = roles> You are: <i id = role >" . $_SESSION['roles'] . "</i>";
    echo "<label><a href =/calcProc/app/security/login.php <input id=logout type = submit = value=logout > log out.. </a></label>";
    echo "</div>";

    ?>

    <div class="stopka"> <a href="http://localhost/calcProc/">Wszelkie prawa zastrzeżone. Projekt: Samess /PL </a> </div>

</body>

</html>