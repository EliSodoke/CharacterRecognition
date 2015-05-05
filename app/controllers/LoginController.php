<?php

Utilities::requireOnceFile($GLOBALS['CFG']->models . 'UserMapper.php');
Utilities::requireOnceFile($GLOBALS['CFG']->models . 'User.php');

//Controller for log in
class LoginController extends ControllerAbstract {
	
    //Log in page
    public function index() {
        $this->setView('Login/index', 'loginTemplate');
        
        $this->view->set('title', 'Log In');
        
        return $this->view->output();
    }

    //Validating user log in
    public function login() {
        //Start session
        session_start();

        //Retrieve inputted values
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
            //Validate inputted values 
            $user = UserMapper::findByEmail($email);
            if(!empty($user)) {
                    if(strcmp($user->getPassword(), sha1($password)) == 0) {
                            $_SESSION['user_id'] = $user->getId();
                            echo 'yes';
                    } else {
                            echo 'Either your email or your password is wrong. Try again<br/><br/>';
                    }
            } else {
                    echo 'Either your email or your password is wrong. Try again<br/><br/>';
            }
        } else {
            //Email is not valid
            echo 'You did not enter a valid email. Try again.';
        }
    }
}