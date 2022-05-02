<h1><?php echo $page_title; ?></h1>

    <?php
		$attributes = array('class' => '', 'id' => 'login', 'name' => 'login');
    	echo form_open('login/create_member', $attributes);
	?>

<fieldset>
	<legend> Personal Information  </legend>
    
    <?php

		echo form_label('First Name', 'first_name');
		echo form_input('first_name', '');
		echo "<br />";
		echo form_label('Last Name', 'last_name');
		echo form_input('last_name', '');
		echo "<br />";
		echo form_label('Email Address', 'email_address');
		echo form_input('email_address', '');	
		echo "<br />";

	?>
    
   <?php
   /*
   echo "hi there";
    	echo form_open('login/create_member');
		
		$jsFName = 'onClick="this.first_name.value=\'\'"';		
		//echo form_input('first_name', set_value('first_name', 'First Name'), $jsFName);
		echo form_input('first_name', 'First Name', $jsFName);
		$jsLName = 'onClick="this.last_name.value=\'\'"';
		echo form_input('last_name', set_value('last_name', 'Last Name'), $jsLName);
		$jsEmail = 'onClick="this.email_address.value=\'\'"';
		echo form_input('email_address', set_value('email_address', 'Email Address'), $jsEmail);	
		*/
	?>

    
</fieldset>

<fieldset>
	<legend>
    	Login Info
    </legend>
    
    <?php
		echo form_label('User Name', 'username');
    	echo form_input('username', '');
		echo form_label('Password', 'password');
		echo form_password('password', '');
		echo form_label('Confirm Password', 'password2');
		echo form_password('password2', 'password2');
		echo form_submit('submit', 'Create Account');
	?>
    
   
    
    <?php echo validation_errors('<p class="error">'); ?>
    <?php
    	if (isset($errorMsg)){
			echo $errorMsg;
		}
	?>
    
</fieldset>
	<?php echo form_close(); ?>