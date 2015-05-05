<?php

/**
 * This class is used to dispatch the controllers
 */
class App {
	
    //Default controller, action and parameters
    protected $controller = 'LoginController';
    protected $action = 'index';
    protected $params = [];

    public function __construct() {
        //Parse the URL
        $url = $this->parseUrl();
        
        //Get the controller and the action from the URL
        $controller = $url[0];
        $action = isset($url[1])? $url[1] : null;
        
        //Verify if the controller file exists and then creates an object of that controller
        if(file_exists($GLOBALS['CFG']->controllers . $controller . 'Controller.php')) {
            $this->controller = $controller . 'Controller';
            unset($url[0]);
        }
        require_once $GLOBALS['CFG']->controllers . $this->controller . '.php';
        $this->controller = new $this->controller;

        //Get the action from the URL
        if(isset($action)) {
            if(method_exists($this->controller, $action)) {
                $this->action = $action;
                unset($url[1]);
            }
        }

        //Get the parameters from the URL
        $this->params = $url ? array_values($url) : [];

        //Call the controller's action
        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    //Parsing the URL
    protected function parseUrl() {
        //Retrieve controller, action, and params from get request
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING);
        
        //Separate controller, action, and params into array
        if(isset($url)) {
            return $url = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));
        }
    }
}