<?php

/* 
 * Form lib
 * 
 * Library responsible for form validation. It assumes the completion of a form
 * assumes the following steps:
 * 
 * - POST to PHP
 * - Sanitize
 * - Validate
 * - Return data
 * - Write to database (optional)
 * 
 */


class Form 
{

    // array with post data
    private $_postData = array();
    
    
    public function __construct() 
    {
        
    }
    
    
    /**
     * post
     * 
     * runs $_POST
     * 
     * @param type $field
     */
    public function post($field)
    {
        // setting the internal _postData no matter what the post data is
        $this->_postData[$field] = $_POST[$field];
    
        // returns the form object
        return $this;
    }
    
    
    /**
     * val
     * 
     * validates a form
     */
    public function val()
    {
        
        
        // returns the form object
        return $this;
    }
    
    
    /**
     * fetch
     * 
     * returns the posted data
     * (getter for the private array containing the post data)
     * 
     * @param mixed $fieldName
     * 
     * @return mixed string or array containing posted data
     */
    public function fetch($fieldName = false)
    {
        // if the fieldName is set we return the post data with that field name
        if($fieldName)
        {
            if(isset($this->_postData[$fieldName]))
            {
                return $this->_postData[$fieldName];
            }
            else
            {
                return false;
            }
        }
        // else we return all post data
        else
        {
            return $this->_postData;
        }
    }
}

