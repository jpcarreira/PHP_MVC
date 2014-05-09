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
    
    
    function run()
    {
        // as we're in the controller we can 'talk' to model and call run() 
        // method in the model (which will handle the login process)
        // (the controller only calls the model's function)
        $this->model->run();
    }
}
