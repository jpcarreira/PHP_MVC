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
        // setting the title
        $this->view->title = 'Help';

        // calling the rendering function to display the correct view
        $this->view->render('header');
        $this->view->render('help/index');
        $this->view->render('footer');
    }    
}
