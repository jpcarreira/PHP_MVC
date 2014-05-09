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
    
        // rendering the view
        $this->view->render('index/index');
    }

}

