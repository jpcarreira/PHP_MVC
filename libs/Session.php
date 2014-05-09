<?php

class Session 
{
    /**
     * set
     * 
     * setter method
     * 
     * @param type $key
     * @param type $value
     */
    public static function set($key, $value)
    {
        // making sure session is started     
        $_SESSION[$key] = $value;
    }
    
    
    /**
     * get
     * 
     * @param type $key
     * 
     * getter
     */
    public static function get($key)
    {
        if(isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }
    }
    
    
    /**
     * init()
     * 
     * starts a session
     */
    public static function init()
    {
        @session_start();
    }
    
    
    public static function destroy()
    {
        // TODO: unset $_SESSION;
        session_destroy();
    }
    

}