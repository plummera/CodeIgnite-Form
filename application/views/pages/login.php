<h2><?php echo 'Login to Continue' ?></h2>

<h1>Login</h1>

<?php echo validation_errors(); ?>
<?php echo form_open('VerifyLogin'); ?>
  <label for="username">Username:</label>
  <input type="text" size="20" id="username" name="username" />
  <br />

  <label for="password">Password:</label>
  <input type="text" size="20" id="password" name="password" />
  <br />

  <input type="submit" value="login">
</form>
