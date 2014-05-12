<h1>Notes</h1>

<!-- form to add a new user -->
<form method="post" action="<?php echo URL; ?>note/create">
    <label>Title</label><input type="text" name="title" /><br />
    <label>Content</label><textarea name="content"></textarea><br/>
    <label>&nbsp;</label>
    <input type="submit" />
</form>

<hr />

<!-- table showing all users -->
<table>
<?php
    
    foreach($this->noteList as $key => $value)
    {
        echo '<tr>';
        echo '<td>' . $value['title'] . '</td>';
        echo '<td>' . $value['date_added'] . '</td>';
        echo '<td><a href="' . URL . 'note/edit/' . $value['noteid']  .'">Edit</td>';
        echo '<td><a class="delete" href="' . URL . 'note/delete/' . $value['noteid']  .'">Delete</td>';
        echo '</tr>';
    }
?>
</table>


<script>
    $(function(){
        $('.delete').click(function(e)
        {
            var c = confirm("Are you sure you want to delete?");
            if(c == false)
            {
                e.preventDefault();
                return;
            }
        });
    });
</script>
    
         