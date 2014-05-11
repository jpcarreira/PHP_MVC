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
        return $this->db->select('SELECT id, login, role FROM users');
    }
    
    
    public function userSingleList($id)
    {
        // @TODO: not working yet
        //return $this->db->select('SELECT id, login, role FROM users WHERE id = :id', array(':id' => $id));
        
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
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        ));
    }
    
    
    public function editSave($data)
    {
        $this->db->update('users', array(
            'login' => $data['login'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        ), "id = {$data['id']}");
    }
    
    
    public function delete($id)
    {
        $result = $this->db->select('SELECT role FROM users WHERE id = :id', array(':id' => $id));
        
        if($result[0]['role'] == 'owner')
        {
            return false;
        }
       
        $this->db->delete('users', "id = $id");
    }
}