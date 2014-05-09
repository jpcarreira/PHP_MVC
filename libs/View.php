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
        // debug message
        //echo 'libs/View: This is the main View <br/>';
    }

    
    
    /**
     * render()
     * 
     * function that renders the view
     * 
     * @param string $name      name of the corresponding view file
     * @param bool $noInclude   option to include, or not, the header and footer  
     */
    public function render($name, $noInclude = false)
    {
        if($noInclude == true)
        {
            require 'views/' . $name . '.php';
        }
        else
        {
            // to avoid code duplication in all view files we include here
            // the header.php file
            require 'views/header.php';
        
            require 'views/' . $name . '.php';
        
            // same as for header.php
            require 'views/footer.php';
        }
    }
}
