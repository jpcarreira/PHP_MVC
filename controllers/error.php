<?php

/* 
 * Error controller
 * 
 * handles any error like calling a non-existant controller or method
 */

class Error extends Controller
{

    function __construct() 
    {
        parent::__construct();
        
        // assigning a value to the view
        $this->view->msg = 'This page doesnt exist!';
    }
    
    
    function index()
    {
        echo 'This is an error </br>'; 
        
        // calling the render function
        $this->view->render('error/index');
    }

}

