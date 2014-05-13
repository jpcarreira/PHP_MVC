<?php

/* 
 * Note controller
 * 
 * controller for the page that is displayed when a user selects to see his 
 * notes
 */

class Note extends Controller
{

    public function __construct() 
    {
        parent::__construct();
        
        Auth::handleLoggin();
    }
    
    
    public function index()
    {
        // setting the title
        $this->view->title = 'Notes';

        // assingning notelist to the view
        $this->view->noteList = $this->model->noteList();
        
        // calling the render function
        $this->view->render('note/index');
    }
    
    
    public function create()
    {
        // user data stored in an array
        $data = array(
            'title' => $_POST['title'],
            'content' => $_POST['content']
        );
        
        // calling the model to insert the user
        $this->model->create($data);
        
        // refreshing the page to display the new added user
        header('location: ' . URL . 'note');
    }
    
    
    public function edit($id)
    {
        // fetch the individual user using the model
        // the user data is assigned to a view's variable
        $this->view->note = $this->model->noteSingleList($id);
        
        // rendering the edit view
        $this->view->render('note/edit');
    }
    
    
    public function editSave($id)
    {
        // user data stored in an array
        $data = array(
            'noteid' => $id,
            'title' => $_POST['title'],
            'content' => $_POST['content']
        );
        
        // @TODO: do error checking
        
        // calling the model to edit the user
        $this->model->editSave($data);
        
        header('location: ' . URL . 'note');
    }
    
    
    public function delete($id)
    {
        // callings the model's method responsible to delete a user
        $this->model->delete($id);
        
        // refreshing the page to display all the users
        header('location: ' . URL . 'note');
    }

}
