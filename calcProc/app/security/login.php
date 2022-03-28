<?php 
require_once dirname(__FILE__).'/../../config.php';


$form = array();
$messages = array();
getparams($form);

function getparams(&$form) {
    $form['login'] = isset ($_REQUEST ['login']) ? $_REQUEST['login'] : null;
    $form['password'] = isset ($_REQUEST ['password']) ? $_REQUEST['password'] : null;
    
}



function valilogin (&$form, &$messages) {
    if ( ! isset($form['login']) && isset($form['password'])  ) {
        return false;
        
    }

    if ($form['login'] == "") {
        $messages[] = "Login was not provided";

    }

    if ( $form['password'] == "") {
        $messages[] = "Password was not provided";

    }

    if (count($messages)  > 0) {
        return false;
    }else {

        if ($form['login'] == 'admin' && $form['password'] == 'admin') {
            session_start();
            $_SESSION['roles'] = 'admin';
            return true;
    
        } else if ($form['login'] == 'user' && $form['password'] == 'user')  {
            session_start();
            $_SESSION['roles'] = 'user';
            return true;
            
        }else{ 
            $messages[] = 'Wrong login date';
            return false;
        }
    }
}


if (! valilogin($form,$messages)) {
    include _ROOT_PATH.'/app/security/login_view.php';

}else {
    header("Location: "._APP_URL);

}


?>
