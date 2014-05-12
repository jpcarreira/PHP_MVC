<?php
/* 
 * Testing the form library
 */

require '../libs/Form.php';
?>


<?php
if(isset($_REQUEST['run']))
{
    $form = new Form();

    $form->post('name') ->post('age') ->post('gender');

    //print_r($form);
    
    // fetches all posted data
    $a = $form->fetch();
    
    // fetches age only
    $b = $form->fetch('age');

    
    print_r($a);
    echo($b);
    
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
