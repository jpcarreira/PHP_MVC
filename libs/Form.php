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

// @TODO: move to index.php later
require 'Form/Val.php';

class Form 
{

    /**
     *
     * @var array $_currentItem     the immediatly posted item 
     */
    private $_currentItem = null;
    
    
    /**
     *
     * @var array $_postData    stores the posted data 
     */
    private $_postData = array();
    
    
    /**
     *
     * @var object $_val    the validator object 
     */
    private $_val = array();
    
    
    /**
     *
     * @var array $_error   holds the current form's validation errors 
     */
    private $_error = array();
    
    /**
     * __construct()
     * 
     * instantiates the validadtor class
     */
    public function __construct() 
    {
        // constructing the validator object
        $this->_val = new Val();
    }
    
    
    /**
     * post
     * 
     * runs $_POST
     * 
     * @param strign $field     the HTML fieldname to post
     */
    public function post($field)
    {
        // setting the internal _postData no matter what the post data is
        $this->_postData[$field] = $_POST[$field];
        
        $this->_currentItem = $field;
    
        // returns the form object
        return $this;
    }
    
    
    /**
     * val
     * 
     * function used to validate a form
     * 
     * @param string $typeOfValidator   a method from the Form/Val.php class
     * @param string $arg               a property to validate against
     * @return \Form                    Form object
     */
    public function val($typeOfValidator, $arg = null)
    {
        // passing the value of the field we're posting
        // (taking into account $arg)
        if($arg == null)
        {
            $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]);
        }
        else
        {
            $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem], $arg);
        }
        
        
        /*
         * example: 
         * 
         * $form->post('name') ->val('length') ->post('age') ->post('gender');
         * 
         * if the post of 'name' is 'John Doe'
         * 
         * the line above will call:
         * $val->length('name')
         * 
         * which means it will validate the length of posted 'name'
         * 
         */
        
        if($error)
        {
            $this->_error[$this->_currentItem] = $error;
        }
        
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
    
    
    /**
     * submit
     * 
     * handles the form and throws an exception upon error
     * 
     * @return boolean  
     * 
     * @throws Exception
     */
    public function submit()
    {
        if(empty($this->_error))
        {
            return true;
        }
        else
        {
            $str = '';
            foreach ($this->_error as $key => $value)
            {
                $str .= $key . ' => ' . $value . '\n';
            }
            
            throw new Exception($str);
        }
    }
}

