<!--
    Header file that will be included in every page of this application
-->

<!doctype html>

<html>
    <head>
        <title>
            views/header.php: test
        </title>
        
        <link rel="stylesheet" href="<?php echo URL;?>public/css/default.css">
        
        <script type="text/javascript" src="<?php echo URL;?>public/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo URL;?>public/js/custom.js"></script>
        
    </head>
    
    <body>
        <div id="header"> 
            <a href="<?php echo URL;?>index">Index</a>
            <a href="<?php echo URL;?>help">Help</a>
            <a href="<?php echo URL;?>login">Login</a>
        </div>

        <div id="content">
           