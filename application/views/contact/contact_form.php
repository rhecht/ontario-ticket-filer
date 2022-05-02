	<?php		
			echo form_open('contact/send');
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
    	<label for="name">Name*</label>
		<?php echo form_input($name_data);?>
     </p>
     <p>
     	<label for="email">Email*</label>
        <input type="text" name="email" id="email" value="<?php echo set_value('email')?>" />
     </p>
     <p>
     	<label for="email">Phone Number*</label>
        <input type="text" name="phone" id="phone" value="<?php echo set_value('phone')?>" />
     </p>
     <p>
     	<label for="email">Subject*</label>
        <input type="text" name="subject" id="subject" value="<?php echo set_value('subject')?>" />
     </p>
     <p>
     	<label for="email">Message*</label>
        <textarea name="message" id="message"><?php echo set_value('message')?></textarea>
     </p>

     <p>        
        <?php echo form_submit('submit', 'Submit');?>
    </p>
<?php } ?>
    
    <?php echo form_close(); ?>
    
    <?php echo validation_errors('<p class="error">'); ?>
