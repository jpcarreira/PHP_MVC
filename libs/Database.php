<?php

/*
 * Database object
 * 
 * extends PDO so it is possible to work with different database
 * technologies
 * 
 */

class Database extends PDO
{

    
    function __construct($dbType, $dbHost, $dbName, $dbUser, $dbPass) 
    {
        parent::__construct($dbType . ':host='. $dbHost . ';dbname=' . $dbName, $dbUser, $dbPass);
    }

    
    
}