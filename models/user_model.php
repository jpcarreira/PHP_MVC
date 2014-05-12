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
        return $this->db->select('SELECT userid, login, role FROM users');
    }
    
    
    public function userSingleList($userid)
    {
        return $this->db->select('SELECT userid, login, role FROM users WHERE userid = :userid', array(':userid' => $userid)); 
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
        ), "userid = {$data['userid']}");
    }
    
    
    public function delete($userid)
    {
        $result = $this->db->select('SELECT role FROM users WHERE userid = :userid', array(':userid' => $userid));
        
        if($result[0]['role'] == 'owner')
        {
            return false;
        }
       
        $this->db->delete('users', "userid = $userid");
    }
}