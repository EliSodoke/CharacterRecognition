<?php

Utilities::requireOnceFile($GLOBALS['CFG']->core . 'TDG.php');

//Mapper for DB model letters
class LetterMapper {
    //Retrieving all the records
    public static function findAll() {
        $sql = 'SELECT * FROM letters ORDER BY value ASC';
        $letters = TDG::findAll($sql, 'Letter');

        return $letters;
    }

    //Retrieve all the variations of the given letter
    public static function findByValue($value) {
        $sql = 'SELECT * FROM letters WHERE value = ?;';
        $letter = TDG::findMany($sql, array($value), 'Letter');
        
        return $letter;
    }
    
    //Getting the max id of the DB table
    public static function getMaxId(){
        $sql = 'SELECT MAX(id) FROM letters;';
        $maxId = TDG::getMaxId($sql);
        
        if($maxId == null) {
            $maxId = 0;
        }
        
        return $maxId;
    }
    
    //Insert letter to DB
    public static function insert($data) {
        $sql = 'INSERT INTO letters (id, pixels, value) VALUES (?, ?, ?);';
        TDG::insert($sql, $data);
    }
}