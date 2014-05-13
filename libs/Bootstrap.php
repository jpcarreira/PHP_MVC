<?php

/*
 * Bootstrap to framework functionality
 *
 */

class Bootstrap 
{
    
    private $_url = null;

    private $_controller = null;
    
    /**
     * __construct
     * 
     * constructs the bootstrap
     * 
     * @return boolean|string
     */
    function __construct() 
    {
        // setting the protected $_url
        $this->_getUrl();
        
        // loading default controller if no URL is set
        if(empty($this->_url[0]))
        {
            // calling the index controller in case url is empty
            // (that happens when we type /localhost/mvc)
            // if is empty we call the default controller
            $this->_loadDefaultController();
            
            // we return here to prevent the rest of the code below 
            // to be processed
            return false;
        }

        // at this point we can load the existing controller
        $this->_loadExistingController();

        // calling the controller method
        $this->_callControllerMethod();
    }
    
    
    /**
     * _getUrl
     * 
     * fetches the URL from 'url
     */
    private function _getUrl()
    {
        // splitting string into controller and method
        // e.g: index/someFunction -> [0] = index and [1] = someFunction
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }
    
    
    /**
     * _loadDefaultController
     * 
     * this loads if there is no GET parameter passed
     */
    private function _loadDefaultController()
    {
        require 'controllers/index.php';
        $this->_controller = new Index();

        // we need to call the index method to render the window
        $this->_controller->index();
    }
    
    
    /**
     * _loadExistingController
     * 
     * loads an existing controller if there is a GET parameter passed
     * 
     * @return boolean/string
     */
    private function _loadExistingController()
    {
        // if the $_url is not empty then, before instantiating the controller,
        // we check if it's file actually exists
        $file = 'controllers/' . $this->_url[0] . '.php';
        
        if(file_exists($file))
        {
            // the first argument will always be the controller so we can instantiate the 
            // controller like below
            require $file;
            $this->_controller = new $this->_url[0];
            
            // instantiating the controller and loading the respective model
            $this->_controller->loadModel($this->_url[0]);
        }
        // if that controller doesn't exist we throw an error
        else
        {
            $this->_error();
            return;
        }
    }

    /**
     * _callControllerMethod
     * 
     * if a method is passed in the GET url parameter we call that method
     */
    private function _callControllerMethod()
    {
        // if [2] exists then it's a value that needs to be passed to the function
        // e.g. help/doSomething/2, 2 will be the argument
        if (isset($this->_url[2])) 
        {
            // checking if method exists
            if(method_exists($this->_controller, $this->_url[1]))
            {
                $this->_controller->{$this->_url[1]}($this->_url[2]);
            }
            else
            {
                $this->_error();
            }
        } 
        else 
        {
            // if [1] exists then it's a method call so we make the controller to call 
            // that function
            if (isset($this->_url[1])) 
            {
                if(method_exists($this->_controller, $this->_url[1]))
                {
                    $this->_controller->{$this->_url[1]}();
                }
                else
                {
                    $this->_error();
                }
            }
            else
            {
                $this->_controller->index();
            }
        }
    }
    
    
    /**
     * _error
     * 
     * displays an error page if the page doesn't exist
     * 
     * @return boolean
     */
    private function _error()
    {
        require 'controllers/error.php';
        $this->_controller = new Error();
        $this->_controller->index();
        return;
    }
}
