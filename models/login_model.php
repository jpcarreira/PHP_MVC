<?php

/* 
 * Login model
 * 
 * Model class to handle user authentication in the application
 * (business logic)
 */

class Login_Model extends Model
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    
    /**
     * run()
     * 
     * responsible for the login logic 
     */
    public function run()
    {
        //querying the DB
        $sth = $this->db->prepare("SELECT id, role FROM users WHERE login = :login AND password = MD5(:password)");
        
        $sth->execute(array(
                ':login' => $_POST['login'],
                ':password' => $_POST['password']
                ));
        
        // fetching some data to distinguish which user has logged in
        $data = $sth->fetch();
        
        // debug message to see the result of the query
        //print_r($data);
        //echo $sth->rowCount();
        
        // if we have a match we 'send' the user to another page
        $count = $sth->rowCount();
        if($count > 0)
        {
            // starting the session
            Session::init();
            
            // the user's role is saved in a session variable
            Session::set('role', $data['role']);
            
            // setting the session variable
            Session::set('loggedIn', true);
            
            // 'sending' the user to the dashboard
            header('location: ../dashboard');
        }
        else
        {
            header('location: ../login');
        }
        
    }
}