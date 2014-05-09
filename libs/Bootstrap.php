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
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        // uncomment below to debug $url
        //print_r($url);

        // calling the index controller in case url is empty
        // (that happens when we type /localhost/mvc)
        if(empty($url[0]))
        {
            require 'controllers/index.php';
            $controller = new Index();
            // we return here to prevent the rest of the code below 
            // to be processed
            return false;
        }
        
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
            require 'controllers/error.php';
            $controller = new Error();
            return false;
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
