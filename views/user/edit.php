<h1>User edit</h1>

<!-- form to edit a new user -->
<form method="post" action="<?php echo URL; ?>user/editSave/<?php echo $this->user[0]['userid']; ?>">
    <label>Login</label>
    <input type="text" name="login" value="<?php echo $this->user[0]['login']; ?>" /><br />
    <label>Password</label>
    <input type="text" name="password"/><br />
  
    <label>Role</label>
        <select name="role">
            <option value="default" <?php if($this->user[0]['role'] == 'default') echo 'selected'; ?>>Default</option>
            <option value="admin" <?php if($this->user[0]['role'] == 'admin') echo 'selected'; ?>>Admin</option>
        </select><br />
    <label>&nbsp;</label>
    <input type="submit" />
</form>