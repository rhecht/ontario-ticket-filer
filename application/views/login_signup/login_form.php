<div id="login_form">
	<h1>User Login</h1>
    <?php
    echo form_open('login/validate_credentials');
	
		echo form_label('User Name', 'username');
    	echo form_input('username', '');
		echo form_label('Password', 'password');
		echo form_password('password', '');
		echo form_submit('submit', 'Login');
		echo anchor('login/signup', 'Create Account');
	echo form_close();
	?>
    <?php echo validation_errors('<p class="error">'); ?>

</div>