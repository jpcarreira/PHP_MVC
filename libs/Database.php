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

    
    public function __construct($dbType, $dbHost, $dbName, $dbUser, $dbPass) 
    {
        parent::__construct($dbType . ':host='. $dbHost . ';dbname=' . $dbName, $dbUser, $dbPass);
        
        //parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    
    /**
     * insert
     * 
     * function to insert data into a database table
     * 
     * @param string $table database's table to insert into
     * @param string $data  associative array
     */
    public function insert($table, $data)
    {
        // sorting the array by key
        ksort($data);
        
        $fieldNames = implode(',', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
       
        // sql statement
        $sth = $this->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");
        
        // binding key-value
        foreach($data as $key => $value)
        {
            $sth->bindValue(":$key", $value);
        }
        
        // executing
        $sth->execute();
    }
    
    
    /**
     * update
     * 
     * function to update a database table
     * 
     * @param string $table database's table name to insert into
     * @param string $data  associative array
     * @param string $where the 'where' query part
     */
    public function update($table, $data, $where)
    {
        
    }
    
    

    
    
}