<?php
require_once dirname(__FILE__).'/../config.php';

require_once $conf->root_path.'/app/calc_head.php';

$head = new calc_head();
$head->process();
?>