<?php

//Abstract class for all controllers in application
class ControllerAbstract {
	
    protected $view; //The view layer linked to specific controller

    //Link controller to given view
    protected function setView ($view, $template) {
        $this->view = new View($GLOBALS['CFG']->views . $view . '.php', $GLOBALS['CFG']->templates . $template . '.php');
    }

    //Verifying if the user is logged in
    protected function verifyLogin() {
        session_start();
        if(empty($_SESSION['user_id'])) {
            //Redirect user to log in page
            header('Location: ' . $GLOBALS['CFG']->homeFrontEnd . 'Login/index');
        }
    }
    
}