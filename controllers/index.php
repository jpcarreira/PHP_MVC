<?php

/* 
 * Index Controller
 * 
 * (application main page)
 */

class Index extends Controller
{
    function __construct() 
    {
        parent::__construct();
        
        // debug message
        // echo 'Controllers/index.php: Index controller';  
    }
    
    
    function index()
    {
        // rendering the view
        $this->view->render('index/index'); 
    }
    
    
    // test function
    function details()
    {
        $this->view->render('index/index');
    }

}

