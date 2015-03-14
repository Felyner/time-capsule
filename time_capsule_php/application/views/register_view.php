<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>User Registration</title>
</head>

<body>
	<h1>Register New User</h1>
	<?php echo validation_errors(); ?>	
	
	<?php echo form_open('verifyregistration'); ?>
		</br>
		<label for="register_username">Desired Username:</label></br>
		<input type="text" size="20" id="register_username" name="register_username"/>
		</br></br>
	
		<label for="register_password">Enter Password:</label></br>
		<input type="password" size="20" id="register_password" name="register_password"/>
		</br></br>
		
		<label for="password_conf">Re-Enter Password:</label></br>
		<input type="password" size="20" id="password_conf" name="password_conf"/></br></br>
	
		<input type="submit" value="Register"/>
	
	</form>
	
	<a href="<?php echo site_url('login/index') ?>">Back to Login</a>
	

</body>


</html>