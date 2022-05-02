<div id="login_form">
	<h1>User Login</h1>
    <?php
    echo form_open('accounts/validate_credentials');
	
		echo form_label('User Name', 'username');
    	echo form_input('username', '');
		echo form_label('Password', 'password');
		echo form_password('password', '');
		echo form_submit('submit', 'Login');
		echo anchor('accounts/signup', 'Create Account');
	?>
		<br />
	<?php
		echo anchor('accounts/lost_password', 'Forgot Password?');
	echo form_close();
	?>
    <?php echo validation_errors('<p class="error">'); ?>

</div>