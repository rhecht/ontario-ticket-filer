<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" media="screen" charset="utf-8" />
</head>

<body>

<div id="newsletter_form">
	<h2>Sign Up for the Newsletter</h2>

	<?php		
			echo form_open('email/send');
	?>

	<?php if(1==1){ ?>
    <?php
    	$name_data=array(
			'name'=>'name',
			'id'=> 'none',
			'value' =>set_value('name')
		);
	?>
    
    <p>
    	<label for="name">Name</label>
		<?php echo form_input($name_data);?>
     </p>
     <p>
     	<label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?php echo set_value('email')?>" />
     </p>
     <p>        
        <?php echo form_submit('submit', 'Submit');?>
    </p>
<?php } ?>
    
    <?php echo form_close(); ?>
    
    <?php echo validation_errors('<p class="error">'); ?>

</div>

</body>
</html>