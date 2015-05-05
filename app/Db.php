<?php

Utilities::requireOnceFile('Config.php');

class DB {
    
    protected static $db;

    private function __construct() {
        try {
            //Connect to DB
            self::$db = new PDO(
                    'mysql:host=' . $GLOBALS['CFG']->dbHost . ';dbname=' . $GLOBALS['CFG']->dbName . '', 
                    $GLOBALS['CFG']->dbUser, $GLOBALS['CFG']->dbPwd);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
    }

    //Connecting to DB
    public static function getConnection() {
        //Verifying if connection was already made
        if(!self::$db) {
            new DB();
        }

        return self::$db;
    }
    
}

?>