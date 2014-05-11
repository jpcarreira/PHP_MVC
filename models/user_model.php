<?php

/* 
 * User model
 * 
 * Model class to handle CRUD operation on user's table in the database
 * (business logic)
 */

class User_Model extends Model
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    
    /**
     * userList
     * 
     * lists all users in the database
     *
     * @return array 
     */
    public function userList()
    {
        // sql statement
        $sth = $this->db->prepare('SELECT id, login, role FROM users');
        $sth->execute();
        return $sth->fetchAll();
        
    }
    
}