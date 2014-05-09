<?php

/* 
 * Login Controller
 * 
 * (page to authenticate users)
 */

class Login extends Controller
{
    function __construct() 
    {
        parent::__construct();
        
        // debug message
        // echo 'Controllers/login.php: Login controller';
    }

    
    function index()
    {
        // rendering the view
        $this->view->render('login/index');
    }
}
