<?php

//Controller for Dashboard
class DashboardController extends ControllerAbstract {
    
    public function index() {
        //Verify if user is logged in
        $this->verifyLogin();
        
        //Render the view and display it
        $this->setView('Dashboard/index', 'mainTemplate');
        $this->view->set('title', 'Dashboard');
        
        return $this->view->output();
    }
    
}