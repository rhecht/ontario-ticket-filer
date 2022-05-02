<div id="login_form">

<?php
	if(isset($reset_message)){
		echo $reset_message;
	}
	else{
?>

	<h1>Validate Your Email</h1>
    <?php
    echo form_open($form_submit);
	
		echo form_label('Email', 'email');
    	echo form_input('email', '');
		echo form_submit('submit', 'Send Password By Email');
	?>
		<br />
	<?php
	echo form_close();
	?>
    <?php echo validation_errors('<p class="error">'); ?>

<?php
	}
?>

</div>