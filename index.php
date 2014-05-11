<?php

// config files
require 'config.php';

function __autoload($class)
{
    require LIBS . $class . ".php";
}

// instantiating the bootstrap
$app = new Bootstrap();


