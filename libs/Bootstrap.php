<?php

/*
 * Bootstrap to framework functionality
 *
 */

class Bootstrap 
{
    
    private $_url = null;

    private $_controller = null;

    private $_controllerPath = 'controllers/';
    private $_modelPath = 'models/';
    private $_defaultFile = 'index.php';
    private $_errorFile = 'error.php';
    

    /**
     * init
     *
     * starts the bootstrap
     * 
     */
    public function init()
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
     * (optional) sets a controller path for controllers
     * 
     * @param string $path 
     */
    public function setControllerPath($path)
    {
        $this->_controllerPath = trim($path, '/') . '/';
    }


    /**
     * (optional) sets a controller path for models
     * 
     * @param string $path 
     */
    public function setModelPath($path)
    {
        $this->_modelPath = trim($path, '/') . '/';
    }


    /**
     * (optional) sets a controller path for default file
     * 
     * @param string $path  use the filename only of your controller (e.g., index.php)
     */
    public function setDefaultFile($path)
    {
        $this->_defaultFile = trim($path, '/') . '/';
    }


    /**
     * (optional) sets a controller path for error file
     * 
     * @param string $path  use the filename only of your controller (e.g., error.php)
     */
    public function setErrorFile($path)
    {
        $this->_errorFile = trim($path, '/') . '/';
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
        require $this->_controllerPath . $this->_defaultFile;
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
        $file = $this->_controllerPath . $this->_url[0] . '.php';
        
        if(file_exists($file))
        {
            // the first argument will always be the controller so we can instantiate the 
            // controller like below
            require $file;
            $this->_controller = new $this->_url[0];
            
            // instantiating the controller and loading the respective model
            $this->_controller->loadModel($this->_url[0], $this->_modelPath);
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
     *         
     * example for http://localhost/{controller}/{method}/{param1}/{param2}/{param3}/
     *   
     * url[0] = controller
     * url[1] = method
     * url[2] = param1
     * url[3] = param2
     * url[4] = param3
     *
     * note: this applies for a max of 3 parameters in a GET request
     * for more than that use a POST request 
     *
     */
    private function _callControllerMethod()
    {
 
        
        // counting the number of parameters
        $length =  count($this->_url);

        if($length > 1)
        {
            // checking if method exists
            if(!method_exists($this->_controller, $this->_url[1]))
            {
                $this->_error();
            }
        }
        
        // deciding which controller to load
        switch ($length) 
        {
            case 5:
                // Controller -> Method(param1, param2, param3)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
                break;
            
            case 4:
                // Controller -> Method(param1, param2)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                break;
            
            case 3:
                // Controller -> Method(param1)
                if(method_exists($this->_controller, $this->_url[1]))
                {
                    $this->_controller->{$this->_url[1]}($this->_url[2]);
                }
                
                break;
            
            case 2:
                // Controller -> Method()
                $this->_controller->{$this->_url[1]}();
                break;
            
            default:
                $this->_controller->index();
                break;

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
        require $this->_controllerPath . $this->_errorFile;
        $this->_controller = new Error();
        $this->_controller->index();
        return;
    }
}
