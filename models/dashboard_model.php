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
        $text = $_POST['text'];
        
        $this->db->insert('data', array(
           'text' => $text 
        ));
        
        $data = array('text' => $text, 'dataid' => $this->db->lastInsertId());
        
        echo json_encode($data);
    }
    
    
    function xhrGetListings()
    {
        $result = $this->db->select('SELECT * FROM data');
        echo json_encode($result);
    }
    
    
    function xhrDeleteListing()
    {
        $this->db->delete('data', 'dataid = ' . $_POST['dataid']);
    }
}