<?php

/**
 * Application default configuration
 */

//Initialize the configuration
unset($CFG);
$CFG = new stdClass();

//------------------------ database config -----------------------------
$CFG->dbHost = '127.0.0.1';        //Host
$CFG->dbName = 'characterrecognition';    //Database
$CFG->dbUser = 'root';             //User
$CFG->dbPwd = '';                  //Password
$CFG->dbType = 'mysql';            //Database type
$CFG->prefix = '';                  //Table prefix


//--------------------- other config ------------------------------------
$CFG->homePHP = dirname(__FILE__) . Utilities::DS;              //Home directory path (for PHP files)
$CFG->homeFrontEnd = '/CharacterRecognition/';                         //Home directory path (for JS and CSS files)
$CFG->app = $CFG->homePHP . 'app' . Utilities::DS;              //Application directory path
$CFG->data  = $CFG->homePHP . 'data' . Utilities::DS;             //Systems directory path
$CFG->controllers = $CFG->app . 'controllers' . Utilities::DS;  //Controllers directory path
$CFG->models = $CFG->app . 'models' . Utilities::DS;            //Models directory path
$CFG->views = $CFG->app . 'views' . Utilities::DS;              //Views directory path
$CFG->templates = $CFG->views . 'Shared' . Utilities::DS;       //Template view directory path
$CFG->core = $CFG->app . 'core' . Utilities::DS;                //Core directory path
$CFG->js = $CFG->homeFrontEnd . 'js/';                          //Javascript directory path
$CFG->css = $CFG->homeFrontEnd . 'css/';                        //CSS directory path

//Assign configuration to global scale
$GLOBALS['CFG'] = $CFG;
