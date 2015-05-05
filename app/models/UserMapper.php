<?php

Utilities::requireOnceFile($GLOBALS['CFG']->core . 'TDG.php');

//Mapper for DB model users
class UserMapper {

    //Retrieve all the records
    public static function findAll() {
        $sql = 'SELECT * FROM users ORDER BY id ASC;';
        $users = TDG::findAll($sql, 'User');

        return $users;
    }

    //Find a record given the email
    public static function findByEmail($email) {
        $sql = 'SELECT * FROM users WHERE email = ?;';
        $user = TDG::find($sql, array($email), 'User');

        return $user;
    }

}