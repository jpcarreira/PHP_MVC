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
        
    }

}