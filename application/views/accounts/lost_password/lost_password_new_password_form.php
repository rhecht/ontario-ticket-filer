<div id="login_form">
	<h1>Enter New Password</h1>
    <?php
    echo form_open($form_submit);
	
		echo form_hidden('user_id', $user_id_change);
		echo form_label('New Password', 'password');
    	echo form_password('password', '');
		echo form_submit('submit', 'Change Password');
	?>
		<br />
	<?php
	echo form_close();
	?>
    <?php echo validation_errors('<p class="error">'); ?>

</div>