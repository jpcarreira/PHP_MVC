<?php

/* 
 * Model lib
 * 
 * Main model class, the database will be added here
 */

class Model 
{

    function __construct() 
    {
        // the database should only be accessible from the model so we 
        // instantitate the DB here
        // (so the DB is accessible in every model)
        $this->db = new Database();
        
    }

}
