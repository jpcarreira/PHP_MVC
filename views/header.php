<!--
    Header file that will be included in every page of this application
-->

<!doctype html>

<html>
    <head>    
            <?php if(isset($this->title)) :?>
                <title> <?php echo $this->title ?> </title>
            <?php else : ?>
                <title> <?php echo 'MVC' ?> </title>
            <?php endif ?>

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
    </head>
    
    <body>
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
                <a href="<?php echo URL;?>note">Notes</a>
                
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
           