<?php

/* 
 * Help Controller
 * 
 * (application's help page)
 */

class Help 
{
    function __construct() 
    {
        echo 'Help page' . '</br>';
    }
    
    
    public function other($arg = false)
    {
        echo 'we are inside other' . '</br>';
        echo 'optional = ' . $arg . '</br>';
    }
    
}
