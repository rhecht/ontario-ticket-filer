	<div class="header">
    <div class="logo"><a href="#"><img src="http://projects.irisemedia.com/ttsfiler/images/admin/images/logo.gif" alt="" title="" border="0" /></a></div>
    
    <div class="right_header">Welcome Admin, <a href="#">Visit site</a> | <a href="#" class="messages">(3) Messages</a> | <a href="#" class="logout">Logout</a></div>
    <div id="clock_a"></div>
    </div>
    
    <div class="main_content">
    
    <?php
    	$this->load->view('admin/includes/menu_bar');
	?>
                    
                    
                    
                    
    <div class="center_content">  
    
    <?php
    	//$this->load->view('admin/includes/left_bar');
	?>
 
    
    <div class="right_content">
    
     <h2><?php echo $title; ?></h2>
     <?php

		 if(isset($_REQUEST['submit'])){
			if($_REQUEST['submit']=='err'){
	?>
         <div class="error_box">
            One or more errors. Please try again.
         </div>  
    <?php
			}
			else if($_REQUEST['submit']=='success'){
	?>
         <div class="valid_box">
            You have successfully updated your form.
         </div>
    <?php
			}
		}
	 ?>
         <div class="form">
         <form action="<?php echo $form_submit; ?>" method="post" class="niceform">
         
                <fieldset>
                    <?php
						$count=0;
                    	foreach($titles as $key=>$i){
					?>

                    <dl>
                        <dt><label for="email"><?php echo $titles[$key]; ?></label></dt>
                        <dd>
                        	<input type="text" value="" name="<?php echo $vars[$key]; ?>" id="<?php echo $vars[$key]; ?>" size="54" />
                        </dd>
                    </dl>                    
                    <?php
						$count++;
					 }
					 ?>

<!--                    
                    
                    <dl>
                        <dt><label for="gender">Select categories:</label></dt>
                        <dd>
                            <select size="1" name="gender" id="">
                                <option value="">Select option 1</option>
                                <option value="">Select option 2</option>
                                <option value="">Select option 3</option>
                                <option value="">Select option 4</option>
                                <option value="">Select option 5</option>
                            </select>
                        </dd>
                    </dl>
                    <dl>
                        <dt><label for="interests">Select tags:</label></dt>
                        <dd>
                            <input type="checkbox" name="interests[]" id="" value="" /><label class="check_label">Web design</label>
                            <input type="checkbox" name="interests[]" id="" value="" /><label class="check_label">Business</label>
                            <input type="checkbox" name="interests[]" id="" value="" /><label class="check_label">Simple</label>
                            <input type="checkbox" name="interests[]" id="" value="" /><label class="check_label">Clean</label>
                        </dd>
                    </dl>
                    
                    <dl>
                        <dt><label for="color">Select type</label></dt>
                        <dd>
                            <input type="radio" name="type" id="" value="" /><label class="check_label">Basic</label>
                            <input type="radio" name="type" id="" value="" /><label class="check_label">Medium</label>
                            <input type="radio" name="type" id="" value="" /><label class="check_label">Premium</label>
                        </dd>
                    </dl>
                    
                    
                    
                    <dl>
                        <dt><label for="upload">Upload a File:</label></dt>
                        <dd><input type="file" name="upload" id="upload" /></dd>
                    </dl>
                    
                    <dl>
                        <dt><label for="comments">Message:</label></dt>
                        <dd><textarea name="comments" id="comments" rows="5" cols="36"></textarea></dd>
                    </dl>
                    
                    <dl>
                        <dt><label></label></dt>
                        <dd>
                            <input type="checkbox" name="interests[]" id="" value="" /><label class="check_label">I agree to the <a href="#">terms &amp; conditions</a></label>
                        </dd>
                    </dl>
-->                    
                     <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="Submit" />
                     </dl>
                     
                     
                    
                </fieldset>
                
         </form>
         </div>

    
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
    <div class="footer">