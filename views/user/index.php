<h1>User</h1>

<!-- form to add a new user -->
<form method="post" action="<?php echo URL; ?>user/create">
    <label>Login</label>
    <input type="text" name="login" /><br />
    <label>Password</label>
    <input type="text" name="password" /><br />
    <label>Role</label>
        <select name="role">
            <option value="default">Default</option>
            <option value="admin">Admin</option>
        </select><br />
    <label>&nbsp;</label>
    <input type="submit" />
</form>

<hr />

<!-- table showing all users -->
<table>
<?php
    foreach($this->userList as $key => $value)
    {
        echo '<tr>';
        echo '<td>' . $value['id'] . '</td>';
        echo '<td>' . $value['login'] . '</td>';
        echo '<td>' . $value['role'] . '</td>';
        echo '<td>' . $value['role'] . '</td>';
        echo '<td><a href="#">Edit</a> <a href="#">Delete</a></td>';
        echo '</tr>';
    }
?>
</table>