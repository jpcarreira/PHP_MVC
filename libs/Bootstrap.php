<?php

/*
 * Bootstrap to framework functionality
 *
 */

class Bootstrap 
{

    function __construct() 
    {
        // splitting string into controller and method
        // e.g: index/someFunction -> [0] = index and [1] = someFunction
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        print_r($url);

        // checking if file exits before instantiating the controller
        $file = 'controllers/' . $url[0] . '.php';
        if(file_exists($file))
        {
            // the first argument will always be the controller so we can instantiate the 
            // controller like below
            require $file;
            $controller = new $url[0];
        }
        else
        {
            throw new Exception('The file ' . $file . ' does not exist');
        }

        // if [2] exists then it's a value that needs to be passed to the function
        // e.g. help/doSomething/2, 2 will be the argument
        if (isset($url[2])) 
        {
            $controller->{$url[1]}($url[2]);
        } 
        else 
        {
            // if [1] exists then it's a method call so we make the controller to call 
            // that function
            if (isset($url[1])) 
            {
                $controller->{$url[1]}();
            }
        }
    }
}
