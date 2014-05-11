<?php

/* 
 * User controller
 * 
 * controller for the page that is displayed when a user with the specific role
 * of 'owner' successfully logs in in the application
 */

class User extends Controller
{

    public function __construct() 
    {
        parent::__construct();
        
        // starting a session
        Session::init();
        
        // making sure the user is logged and is a 'owner'
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        
        // if a non authenticated user or a logged user without 'onwer' role tries
        // to access this page we 'unlog' him (destroy session) and send him
        // to error page
        if($logged == false || $role != 'owner')
        {
            Session::destroy();
            header('location: ' . URL . 'error');
            exit;
        }
    }
    
    
    public function index()
    {
        // saving all users in a view variable
        $this->view->userList = $this->model->userList();
        
        // calling the render function
        $this->view->render('user/index');
    }
    
    
    public function create()
    {
        
    }
    
    
    public function edit($id)
    {
        
    }
    
    
    public function delete($id)
    {
        
    }
    
}