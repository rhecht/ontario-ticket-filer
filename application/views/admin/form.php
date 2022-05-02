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
                    	foreach($vars as $key=>$i){
					?>

                    <dl>
                        <dt><label for="<?php echo $key; ?>"><?php echo $titles[$key]; ?></label></dt>
                        <dd>
                        <?php
                        	if(is_array($i)){
								if(is_array($i[1])){
						?>
								<select size="1" name="<?php echo $key; ?>" id="<?php echo $key; ?>">
    	                        	<option value="">Please Select</option>
						<?php
								foreach($i[1] as $j){
						?>
                                	<option value="<?php echo $j[0]; ?>" <?php if($j[0]==$i[0]){ ?> selected <?php } ?> ><?php echo $j[1]; ?></option>
						<?php
									}
						?>
                            </select>
						<?php
								}
								elseif(
									!(is_array($i[1])) &&
									$i[1]!=''
								){
									if($i[1]=='hidden'){
						?>
                        			<dd>
	                        		<input type="hidden" name="<?php echo $key; ?>" value="<?php echo $i[0]; ?>" />
                                    <label><?php echo $i[0]; ?></label>
                                    </dd>
                         <?php
						 			}
                         			elseif($i[1]=='textarea'){
						 ?>
                        			<dd>
                                    <textarea style="background:none; width:350px; height:150px; " id="<?php echo $key; ?>" name="<?php echo $key; ?>"><?php echo $i[0]; ?></textarea>
                                    </dd>
                         <?php
						 			}
                         			elseif($i[1]=='password'){
						 ?>
                        			<dd>
                                    <input type="password" id="<?php echo $key; ?>" name="<?php echo $key; ?>" value="<?php echo $i[0]; ?>" />
                                    </dd>

						<?php
									}
								}
                        	}else{
								//echo $count . "<br />";
						?>
                        <input type="text" value="<?php echo $i; ?>" name="<?php echo $key; ?>" id="" size="54" />
                        <?php } ?>
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
         
         <?php
		 	if(isset($data2Display)){
		?>



            <table id="rounded-corner" summary="">
                <thead>
                    <tr>
                        <th scope="col" class="rounded-company"></th>
                <?php
                    foreach($data2Display['titles'] as $i):
                ?>
                    <th style="max-width:100px; text-wrap:normal;" scope="col" class="rounded"><?php echo $i; ?></th>
                <?php
                    endforeach;
                ?>
                        <th scope="col" class="rounded">Edit</th>
                        <th scope="col" class="rounded-q4">Delete</th>
            
                    </tr>
                </thead>
                    <tfoot>
                    <tr>
                        <td colspan="6" class="rounded-foot-left"><em>Admin interface set up by iRISEmedia.com</em></td>
                        <td class="rounded-foot-right">&nbsp;</td>
            
                    </tr>
                </tfoot>
                <tbody>
                
                <?php
                    foreach($data2Display['vars'] as $k):
                ?>
                    <tr>
                        <td><input type="checkbox" name="" /></td>
                        <?php
                            $count=0;
                            foreach($k as $l){
                                if($count==0){
                                    $id=$l;
                                }
	                       ?>
                                <td style="max-width:100px; text-wrap:normal;"><?php echo $l; ?></td>
                        <?php
                                $count++;
							}
                        ?>
                        <td><a href="<?php echo base_url() . $edit_path; ?>/<?php echo $id; ?>"><img src="<?php echo base_url(); ?>images/admin/images/user_edit.png" alt="" title="" border="0" /></a></td>
                        <td><a href="<?php echo base_url() . $delete_path; ?>/<?php echo $id; ?>" class="ask"><img src="<?php echo base_url(); ?>images/admin/images/trash.png" alt="" title="" border="0" /></a></td>
            
                    </tr>
                <?php
                    endforeach;
                ?>
            
                </tbody>
            </table>


		<?php
			}
         ?>
    
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
    <div class="footer">