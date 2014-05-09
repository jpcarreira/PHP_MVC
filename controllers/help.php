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
    }
    
    
    function index()
    {
        // calling the rendering function to display the correct view
        $this->view->render('help/index');
    }
    
    
    public function other($arg = false)
    {
        // requiring the respective model
        require 'models/help_model.php';
        $model = new Help_Model();
        
        
        $this->view->blah = $model->blah();
    }
    
}
