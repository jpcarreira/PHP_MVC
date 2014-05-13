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
$bootstrap = new Bootstrap();

// below is optional, use together with the config.php if you want to use other paths
// 
// $bootstrap->setDefaultFile(DEFAULT_FILE);
// $bootstrap->setErrorFile(ERROR_FILE);
// $bootstrap->setModelPath(MODEL_PATH);
// $bootstrap->setControllerPath(CONTROLLER_PATH);

$bootstrap->init();


