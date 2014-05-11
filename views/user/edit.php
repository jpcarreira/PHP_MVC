<h1>User edit</h1>

<!-- form to edit a new user -->
<form method="post" action="<?php echo URL; ?>user/editSave/<?php echo $this->user['id']; ?>">
    <label>Login</label>
    <input type="text" name="login" value="<?php echo $this->user['login']; ?>" /><br />
  
    <label>Role</label>
        <select name="role">
            <option value="default" <?php if($this->user['role'] == 'default') echo 'selected'; ?>>Default</option>
            <option value="admin" <?php if($this->user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
        </select><br />
    <label>&nbsp;</label>
    <input type="submit" />
</form>