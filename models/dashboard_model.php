<?php

/* 
 * Dashboard model
 * 
 * Model class to handle what the Dashboard controller displays
 * (business logic)
 */

class Dashboard_Model extends Model
{

    function __construct() 
    {
        parent::__construct();
        // debug message
        //echo 'Dashboard model <br />';
    }
    
    
    function xhrInsert()
    {
        // debug message
        //echo 'dashboard model: xhrInsert()';
        //echo $_POST['text'];
    
        // inserting into database
        $text = $_POST['text'];
        
        $sth = $this->db->prepare('INSERT INTO data (text) VALUES (:text)');
        $sth->execute(array(':text' => $text));
        
        $data = array('text' => $text, 'id' => $this->db->lastInsertId());
        
        echo json_encode($data);
    }
    
    
    function xhrGetListings()
    {
        $sth = $this->db->prepare('SELECT * FROM data');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        echo json_encode($data);   
    }
    
    
    function xhrDeleteListing()
    {
        $sth = $this->db->prepare('DELETE FROM data WHERE id = ' . $_POST['id']);
        $sth->execute();
    }
}