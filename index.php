<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// splitting string into controller and method
// e.g: index/someFunction -> [0] = index and [1] = someFunction
$url = $_GET['url'];
$url = rtrim($url, '/');
$url = explode('/', $url);

print_r($url);

//echo $url . '</br>';

// the first argument will always be the controller so we can instantiate the 
// controller like below
require 'controllers/' . $url[0] . '.php';
$controller = new $url[0];


// if [2] exists then it's a value that needs to be passed to the function
// e.g. help/doSomething/2, 2 will be the argument
if(isset($url[2]))
{
    $controller->{$url[1]}($url[2]);
}

else
{
    // if [1] exists then it's a method call so we make the controller to call 
    // that function
    if(isset($url[1]))
    {
        $controller->{$url[1]}();
    }
}

