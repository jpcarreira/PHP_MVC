<?php

/* 
 * User controller
 * 
 * controller for the page that is displayed when a user with the specific role
 * of 'owner' successfully logs in in the application
 */

class User extends Controller
{

    function __construct() 
    {
        parent::__construct();
        
        // starting a session
        Session::init();
        
        // making sure the user is logged and is a 'owner'
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        
        if($logged == false || $role != 'owner')
        {
            Session::destroy();
            header('location: ' . URL . 'error');
            exit;
        }
        
        
    }
    
    
    function index()
    {
        // calling the render function
        $this->view->render('user/index');
    }
    
}