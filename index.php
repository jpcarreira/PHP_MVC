<?php

// config files
require 'config.php';

// utils folder
require 'util/Auth.php';

function __autoload($class)
{
    require LIBS . $class . ".php";
}

// instantiating the bootstrap
$app = new Bootstrap();


