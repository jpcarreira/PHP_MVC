<?php

/* 
 * Controller lib
 * 
 * This is the parent controller of all other controllers in this framework
 * (considering that we want our views to be accessible from the controllers 
 * it's easier to achieve this using this parent controller)
 */

class Controller 
{

    function __construct() 
    {
        // debug message
        //echo 'libs/Controller: This is the Main Controller <br/>';
        
        // the main controller is the one that will instantiate the view
        // (ensuring that all other controllers will have a view as well)
        $this->view = new View();
        
        
    }
    
    /**
     * loadModel
     * 
     * this function picks the model child classes and 
     * 
     * @param string $name  name of the model class
     */
    public function loadModel($name)
    {
        // path to the child model class
        $path = 'models/' . $name . '_model.php';
        
        // making the models include themselves if they exist
        // (as a model is always inside a controller we should enable it here)
        if(file_exists($path))
        {
            require 'models/' . $name . '_model.php';
            
            // instantiting the model class
            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }

}