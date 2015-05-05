<?php

//Controller dispatcher
Utilities::requireOnceFile($GLOBALS['CFG']->core . 'App.php');

//Abstract Controller
Utilities::requireOnceFile($GLOBALS['CFG']->core . 'ControllerAbstract.php');

//Class to interact with DB
Utilities::requireOnceFile($GLOBALS['CFG']->core . 'TDG.php');

//Class used by controllers to create and render view
Utilities::requireOnceFile($GLOBALS['CFG']->core . 'View.php');

//DB class
Utilities::requireOnceFile($GLOBALS['CFG']->app . 'Db.php');

?>