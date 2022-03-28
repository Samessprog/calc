<?php

require_once dirname(__FILE__).'/../../config.php';

@session_start();

$rols = isset($_SESSION['roles']) ? $_SESSION['roles'] : null;

if ($rols == null) {
    include _ROOT_PATH.'/app/security/login_view.php';
    exit ();

}


?>