<?php

// config files
require 'config/paths.php';
require 'config/database.php';
require 'config/constants.php';

function __autoload($class)
{
    require LIBS . $class . ".php";
}

// instantiating the bootstrap
$app = new Bootstrap();


