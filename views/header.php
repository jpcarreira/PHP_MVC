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
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo URL;?>public/js/custom.js"></script>
        
        <!-- checking if there is a specific js for this page -->
        <?php 
            if(isset($this->js))
            {
                // looping the array
                foreach ($this->js as $js)
                {
                    echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
                }        
            }
        
        ?>
        
        <script>
            $(function(){
                $("#test").datepicker();
            })
        </script>
        
    </head>
    
    <body>
        
        <!-- testing jquery -->
        <input id="test"/>
        
        <!-- TODO: fix this session start later-->
        <?php SESSION::init(); ?>
        
        <div id="header"> 
                
            <!-- if a user is not logged in we show only Index and Help -->
            <?php if(SESSION::get('loggedIn') == false) : ?>
                <a href="<?php echo URL;?>index">Index</a>
                <a href="<?php echo URL;?>help">Help</a>
            <?php endif; ?>
                
            <!-- displaying dashboard and logout to logged users -->
            <?php if(SESSION::get('loggedIn') == true) : ?>
                <a href="<?php echo URL;?>dashboard">Dashboard</a>
                
                <!-- only the OWNER can see the users link -->
                <?php if(SESSION::get('role') == 'owner') : ?>
                    <a href="<?php echo URL;?>user">Users</a>
                <?php endif; ?>
                
                <a href="<?php echo URL;?>dashboard/logout">Logout</a>
            
            <!-- Login is visible when no one is logged in -->    
            <?php else : ?>
                <a href="<?php echo URL;?>login">Login</a>
            <?php endif ?>
                
        </div>

        <div id="content">
           