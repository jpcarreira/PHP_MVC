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
        
        // variable with a specific js file for this controller
        $this->view->js = array('dashboard/js/default.js');
    }
    
    
    function index()
    {
        // calling the render function
        $this->view->render('dashboard/index');
    }
    
    
    function logout()
    {
        Session::destroy();
        header('location: ' . URL . 'login');
        exit;
    }
    
    
    /**
     * xhrInsert()
     * 
     * Ajax call to insert data into database
     */
    function xhrInsert()
    {
        // calling the model's function that will handle the logic
        $this->model->xhrInsert();
    }
    
    
    /**
     * xhrGetListings
     * 
     * Ajax call to list all inserted data 
     */
    function xhrGetListings()
    {
        $this->model->xhrGetListings();
    }
    
    /**
     * xhrDeleteListing
     * 
     * Ajax call to delete an given row from the database
     */
    function xhrDeleteListing()
    {
        $this->model->xhrDeleteListing();
    }
}