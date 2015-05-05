<?php

Utilities::requireOnceFile($GLOBALS['CFG']->models . 'LetterMapper.php');

//Controller for the model Letters
class LettersController extends ControllerAbstract {
	
    //Displaying all the letters (filtered if argument is given)
    public function index($value = '') {
        //Verify if user is logged in
        $this->verifyLogin();

        $this->setView('Letters/index', 'mainTemplate');

        //Get all the letters from database filtered by user choice and then map them to view (for display)
        if($value != '') {
            $letters = LetterMapper::findByValue($value);
        } else {
            $letters = LetterMapper::findAll();
        }
        
        //Map variables to the view
        $this->view->set('value', $value);
        $this->view->set('letters', $letters);
        $this->view->set('title', 'Letters');
        
        return $this->view->output();
    }
    
    //Store the data from a text file to the database
    public function storePixels() {
        //Verify if user is logged in
        $this->verifyLogin();
        
        //Get the text file and start inserting data
        $lines = file($GLOBALS['CFG']->data . 'letters_order.txt');
        foreach($lines as $line) {
            $bits = explode(' ', $line);
            $value = chr(array_pop($bits) + 64);
            $pixels = implode(' ', $bits);

            LetterMapper::insert(array(LetterMapper::getMaxId() + 1, $pixels, $value));
        }
        
        $this->setView('Letters/storePixels', 'mainTemplate');
        $this->view->set('title', 'Store Pixels');
        return $this->view->output();
    }
    
    //Display page for user to draw a letter
    public function drawLetter() {
        //Verify if user is logged in
        $this->verifyLogin();
        
        $this->setView('Letters/drawLetter', 'mainTemplate');
        $this->view->set('title', 'Draw Letter');
        
        return $this->view->output();
    }
    
    //Storing the drawn letter to DB
    public function storeDrawnLetter() {
        //Getting the necessary information to store
        $pixel = Utilities::getVar('pixel', INPUT_POST, FILTER_SANITIZE_STRING, true);
        $maxId = 1 + LetterMapper::getMaxId();
        
        LetterMapper::insert(array($maxId, $pixel, null));
        
        echo 'This drawing was stored successfully in the database';
    }
}