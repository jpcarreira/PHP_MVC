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
        parent::__construct(DB_TYPE. ':host='. DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }

    
    
}