<?php

/* 
 * Auth utility
 * 
 * class that provides usefull methods concerning user authentication
 */


class Auth 
{

    public static function handleLoggin()
    {
        @session_start();
        
        // making sure the user is logged and is a 'owner'
        $logged = $_SESSION['loggedIn'];
        
        if($logged == false)
        {
            session_destroy();
            header('location: ' . URL . 'error');
            exit;
        }
    }
}


