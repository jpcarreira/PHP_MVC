<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// TOOD: use an auto-loader

// requires for libs
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Database.php';
require 'libs/Model.php';
require 'libs/Session.php';
require 'libs/View.php';
require 'libs/Hash.php';

// config files
require 'config/paths.php';
require 'config/database.php';
require 'config/constants.php';

// instantiating the bootstrap
$app = new Bootstrap();


