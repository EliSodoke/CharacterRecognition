<?php

Utilities::requireOnceFile($GLOBALS['CFG']->models . 'Letter.php');

//This class is used to interact with the DB
class TDG {

    protected static $db;

    //Retrieve all records
    public static function findAll($sql, $model) {
        //Connect to DB
        self::$db = DB::getConnection();

        //Send query
        $sth = self::$db->query($sql);

        //DB disconnection
        self::$db = null;
        
        //Return array of objects
        return $sth->fetchAll(PDO::FETCH_CLASS, $model);
    }

    //Retrieve one record
    public static function find($sql, $data, $model) {
        //Connect to DB
        self::$db = DB::getConnection();

        //Send query
        $sth = self::$db->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_CLASS, $model);
        $sth->execute($data);

        //DB disconnection
        self::$db = null;
        
        //Return the record
        return $sth->fetch();
    }
    
    //Retrieve many records
    public static function findMany($sql, $data, $model) {
        //Connect to DB
        self::$db = DB::getConnection();

        //Send query
        $sth = self::$db->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_CLASS, $model);
        $sth->execute($data);
        
        //DB disconnection
        self::$db = null;

        //Return the record
        return $sth->fetchAll();
    }
    
    //Getting the max id of a table
    public static function getMaxId($sql) {
        //Connect to DB
        self::$db = DB::getConnection();
        
        //Send query
        $sth = self::$db->query($sql);
        
        //DB disconnection
        self::$db = null;
        
        //Return the max id
        return $sth->fetchColumn(0);
    }
    
    //Insert a record to DB
    public static function insert($sql, $data) {
        //Connect to DB
        self::$db = DB::getConnection();
        
        //Send query
        $sth = self::$db->prepare($sql);
        
        //DB disconnection
        self::$db = null;
        
        $sth->execute($data);
    }
	
}