<?php

/* 
 * Help Controller
 * 
 * (application's help page)
 */

class Help extends Controller
{
    function __construct() 
    {
        parent::__construct();
        
        // calling the rendering function to display the correct view
        $this->view->render('help/index');
    }
    
    
    public function other($arg = false)
    {
        echo 'we are inside other' . '</br>';
        echo 'optional = ' . $arg . '</br>';
    
        // requiring the respective model
        require 'models/help_model.php';
        $model = new Help_Model();
    }
    
}
