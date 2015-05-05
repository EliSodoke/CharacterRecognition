<?php

//Library that has many useful functions
require_once 'Utilities.php';

//Configuration
Utilities::requireOnceFile('Config.php');

//Start application
Utilities::requireOnceFile('app' . Utilities::DS . 'init.php');

$app = new App;

?>