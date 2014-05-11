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
    
    
    public function userSingleList($id)
    {
        // sql statement
        $sth = $this->db->prepare('SELECT id, login, role FROM users WHERE id = :id');
        $sth->execute(array(
            ':id' => $id
        ));
        return $sth->fetch();
    }
    
    
    public function create($data)
    {
        // sql statement
        $sth = $this->db->prepare('INSERT INTO users (login, password, role) VALUES (:login, :password, :role)');
        $sth->execute(array(
            ':login' => $data['login'],
            ':password' => $data['password'],
            ':role' => $data['role']
        ));
    }
    
    
    public function editSave($data)
    {
        // sql statement
        $sth = $this->db->prepare('UPDATE users SET login = :login, role = :role WHERE id = :id');
        $sth->execute(array(
            ':id' => $data['id'],
            ':login' => $data['login'],
            ':role' => $data['role']
        ));
    }
    
    public function delete($id)
    {
        // sql statement
        $sth = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $sth->execute(array(
            ':id' => $id
            ));
    }
    
    
    
    
    
}