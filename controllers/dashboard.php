<?php

/* 
 * Dashboard controller
 * 
 * controller for the page that is displayed when a user successfully logs in
 * in the application
 */

class Dashboard extends Controller
{

    function __construct() 
    {
        parent::__construct();
        
        // starting a session
        Session::init();
        
        $logged = Session::get('loggedIn');
        if($logged == false)
        {
            Session::destroy();
            header('location: ../login');
            exit;
        }
    }
    
    
    function index()
    {
        // calling the render function
        $this->view->render('dashboard/index');
    }

}