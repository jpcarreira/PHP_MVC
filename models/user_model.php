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
        $this->db->insert('users', array(
            'login' => $data['login'],
            'password' => Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        ));
    }
    
    
    public function editSave($data)
    {
        // sql statement
        $sth = $this->db->prepare('UPDATE users SET login = :login, password = :password, role = :role WHERE id = :id');
        $sth->execute(array(
            ':id' => $data['id'],
            ':login' => $data['login'],
            ':password' => Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
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