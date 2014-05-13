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
        // setting the title
        $this->view->title = 'Main page';

        // rendering the view
        $this->view->render('header');
        $this->view->render('index/index'); 
        $this->view->render('footer');
    }
}

