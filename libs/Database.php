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
    
    
    // @TODO: review this select for singleUser select
    
    /**
     * select
     * 
     * performs a select query
     * 
     * @param string $sql           sql statement string
     * @param array $array          parameters to bind
     * @param constant $fetchMode   PDO fetch mode
     * @return mixed
     */
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
        $sth = $this->prepare($sql);
        
        foreach($array as $key => $value)
        {
            $sth->bindValue("$key", $value);
        }
        
        $sth->execute();
        
        return $sth->fetchAll($fetchMode);
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
        // sorting the array by key
        ksort($data);
        
        $fieldDetails = NULL;
        foreach ($data as $key => $value)
        {
            $fieldDetails .= "$key=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ', ');
        
        // sql statement
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        
        // binding key-value
        foreach($data as $key => $value)
        {
            $sth->bindValue(":$key", $value);
        }
        
        // executing
        $sth->execute();
    }
    
    
    /**
     * delete
     * 
     * deletes one row from a database table
     * 
     * @param string $table         database table name
     * @param string $where         the 'where' query part
     * @param integer $limit        limit the number of rows to be deleted
     * @return integer              affected rows
     */
    public function delete($table, $where, $limit = 1)
    {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }
}