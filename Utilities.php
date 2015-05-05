<?php

/**
 * Static class containing many useful functions to be used in application
 */
class Utilities {
    const DS = DIRECTORY_SEPARATOR;
    
    /**
     * Include file if exists
     * @param $filename : The name of the file
     */
    public static function includeFile($filename) {
        if (file_exists($filename)) {
            include($filename);
        } else {
            Errors::display($filename . ' n\'existe pas !'); 
        }
    }
    
    /**
     * Perform require_once operation if file exists
     * @param $filename
     */
    public static function requireOnceFile($filename) {
        if(file_exists($filename)) {
            require_once($filename);
        } else {
            echo $filename . ' n\'existe pas !<br/>'; 
        }
    }

    /**
     * Getting value sent by a request and filter it
     * @param $var : The variable sent by the request
     * @param $requestType : The request type
     * @param $varType : The variable type
     * @param $required : Determining if it is required or not
     * @return The filtered variable
     */
    public static function getVar($var, $requestType, $varType, $required = false) {
        $varValue = '';

        //Filter the variable retrieved from request and verify if it exists
        $retrievedVar = filter_input($requestType, $var, $varType);
        if(isset($retrievedVar)) {
            $varValue = $retrievedVar;
        } else if($required == true) {
            echo 'Erreur la variable ' . $var . ' n\'a pas ete fournie';
        }

        return $varValue;
    }
}