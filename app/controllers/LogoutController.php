<?php

//Controller for log out
class LogoutController extends ControllerAbstract {
	
    //User log out of system
    public function index() {
        //Destroy the session and redirect user to login page
        session_start();
        if(!empty($_SESSION['user_id']))
        {
                unset($_SESSION['user_id']);
                session_destroy();
        }
        header('Location: ' . $GLOBALS['CFG']->homeFrontEnd . 'Login/index');
    }
	
}