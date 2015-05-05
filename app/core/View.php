<?php

//This class is used by the controllers to create a view and render it
class View {

    protected $template;
    protected $file;
    protected $data = array();

    public function __construct($file, $template) {
        $this->file = $file;
        $this->template = $template;
    }

    //Transferring data from controller to view
    public function set($key, $value) {
        $this->data[$key] = $value;
    }

    //Displaying the view
    public function output() {
        if(!file_exists($this->template)) {
            throw new Exception('The file ' . $this->template . ' doesn\'t exist');
        }
        if(!file_exists($this->file)) {
            throw new Exception('The file ' . $this->file . ' doesn\'t exist.');
        }

        //Make data transferred from controller easier to access in view layer
        extract($this->data);

        //Start outputting the view
        ob_start();
        //include($this->file);
        include($this->template);
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }
	
}