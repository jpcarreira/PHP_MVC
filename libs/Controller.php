<?php

/* 
 * Controller lib
 * 
 * This is the parent controller of all other controllers in this framework
 * (considering that we want our views to be accessible from the controllers 
 * it's easier to achieve this using this parent controller)
 */

class Controller 
{

    function __construct() 
    {
        echo 'This is the Main Controller <br/>';
    }

}