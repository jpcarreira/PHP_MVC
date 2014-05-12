<?php
/* 
 * Testing the form library
 */

require '../libs/Form.php';
?>


<?php
if(isset($_REQUEST['run']))
{
    try
    {
        $form = new Form();

        $form   ->post('name')
                ->val('minlength', 1) 
            
                ->post('age') 
                ->val('minlength', 2)
                ->val('digit')
            
                ->post('gender');
        
        $form->submit();
        
        echo 'The form passed!';
        $data = $form->fetch();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    } 
    catch (Exception $e) 
    {
        echo $e->getMessage();
    }
    
    
    
}
?>


<form method="post" action="?run">
    
    Name<input type="text" name="name" />
    Age<input type="text" name="age" />
    Gender<select name="gender">
        <option value="m" >male</option>
        <option value="f">female</option>
    </select>
    <input type="submit" />
    
</form>
