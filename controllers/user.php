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
        // user data stored in an array
        $data = array();
        $data['login'] = $_POST['login'];
        $data['password'] = md5($_POST['password']);
        $data['role'] = $_POST['role'];
        
        // @TODO: do error checking
        
        // calling the model to insert the user
        $this->model->create($data);
        
        // refreshing the page to display the new added user
        header('location: ' . URL . 'user');
    }
    
    
    public function edit($id)
    {
        
    }
    
    
    public function delete($id)
    {
        // callings the model's method responsible to delete a user
        $this->model->delete($id);
        
        // refreshing the page to display all the users
        header('location: ' . URL . 'user');
    }
    
}