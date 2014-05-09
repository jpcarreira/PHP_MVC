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

    function __construct() 
    {
        parent::__construct('mysql:host=localhost; dbname=MVC', 'root', '');
    }

    
    
}