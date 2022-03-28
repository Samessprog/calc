<?php 

require_once dirname(__FILE__).'/../config.php';
include _ROOT_PATH.'/app/security/check.php';

//$Amount = @$_REQUEST['Amount'];
//$credit_Time = @$_REQUEST['time'];
//$procent = @$_REQUEST['procent'];

//getParametrs ();


require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';


/*
inne podejscie bez klas
$form = [];
$message = [];
getParametrs($form);
valiParametrs ($form, $message);

function getParametrs (&$form)  {
$form ['Amount'] =  isset ($_REQUEST['Amount']) ? $_REQUEST['Amount'] : null;
$form ['time'] =  isset ($_REQUEST['time']) ? $_REQUEST['time'] : null;
$form ['procent'] = isset ($_REQUEST['procent'])  ? $_REQUEST['procent'] : null;

}

*/




/* 
    function valiParametrs (&$form, &$message) {

        if ( ! (isset($form ['procent']) && isset($form ['time'] ) && isset($form ['Amount'] ))) {
            $message [] = 'Incorrect application call!';
            return false;
            
        }

        if ($form ['Amount'] == "") {
            $message [] = 'The Amountwas not specified!';
    
        }
        if ($form ['time'] == "") {
            $message [] = 'The time of credit time was not specifed!';
    
        }
    
        if ($form ['procent'] == "") {
            $message [] = 'The percentage was not given';
    
        }
    
        if ($form ['time'] < 0 || $form ['procent']  < 0 ) {
            $message [] = 'credit time or procent is under 0!';
    
        }

    }
   
    //sprawdzanie czy nie podano pustego pola!
   
    if (empty ($message)) {
            
        $Amount = intval($form ['Amount'] );
        $credit_Time = floatval($form ['time']);
        $procent = floatval($form ['procent']);

        if ($_SESSION['roles'] == 'user' && $Amount  > 10000) {
            $message [] = 'User cannot take more than 10k amount! ';
            

        }else {
            $years = $credit_Time * 12;
            $result = (($Amount + ($Amount * $procent)) / $credit_Time)/12;
            $rate =  number_format((float) $result, 2, '.', '');  
            $year_Rate = $rate * 12;

        }

    }
    
    */



class Calculator {
    private $msgs;
    private $form;
    private $result;
    private  $years = 0;
    private $year_Rate = 0;
    private $rate = 0;

    public function __construct(){
        $this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult(); 

    }


//pobierania parametrów
public function getParams(){
		$this->form->am = iisset ($_REQUEST['Amount']) ? $_REQUEST['Amount'] : null;
		$this->form->ti = isset ($_REQUEST['time']) ? $_REQUEST['time'] : null;
		$this->form->pro = isset($_REQUEST['procent'])  ? $_REQUEST['procent'] : null;
}





public function validate() {

    if (! (isset ( $this->form->am ) && isset ( $this->form->ti ) && isset ( $this->form->op ))) {
      
        return false; 
    }
    
    if ($this->form->am == "") {
        $this->msgs->addError('The Ammout didnt set');
    }
    if ($this->form->ti == "") {
        $this->msgs->addError('The time of credit didnt set');
    }

    if ($this->form->pro == "") {
        $this->msgs->addError('the number of procenyt didnt set');
    }


}

public function makeResult () {
    $this->getparams();

    if (count($this->validate()) > 0 ) {
        $this->form->am = intval($this->form->am);
        $this->form->ti = intval($this->form->ti);
        $this->form->pro = intval($this->form->pto);


        if (empty ($this->msgs)) {
            
            $Amount = intval($this->form['Amount'] );
            $credit_Time = floatval($this->form ['time']);
            $procent = floatval($this->form['procent']);
    
            if ($_SESSION['roles'] == 'user' && $Amount  > 10000) {
                $message [] = 'User cannot take more than 10k amount! ';
                
    
            }else {
                $this-> $years = 0; = $this->form->ti * 12;
                $this->result = (($this->form->am + ($am * $pro)) / $this->form->ti)/12;
                $this->rate =  number_format((float) $this->result, 2, '.', '');  
                $this-> $year_Rate = 0 = $this->rate  * 12;
    
            }
    
        }

      
    }

    $this->genViwe();
}
    public function genView () {
        global $conf;
        $smarty = new Smarty();
        $smarty->assign('config',$config); 

        $smarty = new Smarty();
        $smarty->assign('config',$config);
                
        $smarty->assign('msgs',$this->msgs);
        $smarty->assign('form',$this->form);
        $smarty->assign('resul',$this->result);
    
        $smarty->display($conf->root_path.'/app/CalcView.html');


    }

  
}




?>