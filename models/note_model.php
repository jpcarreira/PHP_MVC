<?php

/* 
 * Note model
 * 
 * Model class to handle user's notes
 * (business logic)
 */


//@TODO: needs revision

class Note_Model extends Model
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
    public function noteList()
    {
        return $this->db->select('SELECT * from notes WHERE userid = :userid', array(
            'userid' => $_SESSION['userid']
        ));
    }
    
    
    public function noteSingleList($id)
    {
        return $this->db->select('SELECT * FROM notes WHERE userid = :userid AND id = :id', array(
            ':userid' => $_SESSION['userid'],
            ':id' => $id));
    }
    
    
    public function create($data)
    {
        $this->db->insert('notes', array(
            'title' => $data['title'],
            'userid' => $_SESSION['userid'],
            'content' => $data['content'],
            //@TODO: use GMT
            'date_added' => date('Y-m-d H:m:s')
        ));
    }
    
    
    public function editSave($data)
    {
        $postData = array(
            'title' => $data['title'],
            'content' => $data['content'],
        );
        
        $this->db->update('notes', $postData, "id = {$data['id']} AND userid = {$_SESSION['userid']}");
    }
    
    
    public function delete($id)
    {
        $this->db->delete('notes', "id = {$data['id']} AND userid = {$_SESSION['userid']}");
    }
}