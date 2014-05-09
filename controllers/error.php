<?php

/* 
 * Error controller
 * 
 * handles any error like calling a non-existant controller or method
 */

class Error extends Controller
{

    function __construct() 
    {
        parent::__construct();
        
        echo 'This is an error </br>'; 
    }

}

