<?php

/* 
 * View lib
 * 
 * Main view file
 */


class View 
{

    function __construct() 
    {
        echo 'This is the main View <br/>';
    }

    
    
    /**
     * render()
     * 
     * function that renders the view
     * 
     * @param string $name  name of the corresponding view file 
     */
    public function render($name)
    {
        require 'views/' . $name . '.php';
        
    }
}
