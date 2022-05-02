<?
if(!isset($dontdisplay['add'])){
	$dontdisplay['add']=true;
}
if(!isset($dontdisplay['edit'])){
	$dontdisplay['edit']=true;
}
if(!isset($dontdisplay['delete'])){
	$dontdisplay['delete']=true;
}
if(!isset($display['add'])){
	$display['add']=false;
}


?>

	<div class="header">
    <div class="logo"><a href="#"><img src="<?php echo base_url(); ?>images/admin/images/logo.gif" alt="" title="" border="0" /></a></div>
    
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
    
    
    <!--
    	This is the spot where SEO friendly content is done.
    -->
    
    <?php
    	if(!(isset($title))){
			$title="Title";
		}
	?>
        
    <h2><?php echo $title; ?></h2> 
                    
                    
<table id="rounded-corner" summary="">
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
    <?php
    if(isset($titles)){
		foreach($titles as $i):
	?>
        <th style="max-width:100px; text-wrap:normal;" scope="col" class="rounded"><?php echo $i; ?></th>
	<?php
		endforeach;
	?>
            <?php
            	if($display['edit']==true){
			?>
            <th scope="col" class="rounded">Edit</th>
            <?php
				}
            	if($display['delete']==true){
			?>

            <th scope="col" class="rounded-q4">Delete</th>
            <?php
				}
			?>
    <?php
	}else{
	?>
            <th scope="col" class="rounded" colspan=5>Nothing Available</th>
            <th scope="col" class="rounded-q4"></th>
    
	<?php
	}
	?>

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
    if(isset($vars)){
		foreach($vars as $i):
	?>
    	<tr>
        	<td>
            <!--
            <input type="checkbox" name="" />
            -->
            </td>
            <?php
				$count=0;
				foreach($i as $j):
					if($count==0){
						$id=$j;
					}
			?>
					<td style="max-width:100px; text-wrap:normal;"><?php echo $j; ?></td>
			<?php
					$count++;
				endforeach;
            ?>
            
            <?php
            	if($display['edit']==true){
			?>
            
            <td><a href="<?php echo base_url() . $edit_path; ?>/<?php echo $id; ?>"><img src="<?php echo base_url(); ?>images/admin/images/user_edit.png" alt="" title="" border="0" /></a></td>
            <?php
				}
            	if($display['delete']==true){
			?>
            <td><a href="<?php echo base_url() . $delete_path; ?>/<?php echo $id; ?>" class="ask"><img src="<?php echo base_url(); ?>images/admin/images/trash.png" alt="" title="" border="0" /></a></td>
            <?php
			}
			?>

        </tr>
	<?php
		endforeach;
	}
	else{?>
    
    	<tr>
            <td colspan=6>Nothing Available, Sorry</td>
        </tr>
    <?php
    	}
	?>

    </tbody>
</table>

	<?php
		if($display['add']==true){
	?>
 	 <a href="<?php echo base_url() . $add_path; ?>" class="bt_green"><span class="bt_green_lft"></span><strong>Add new item</strong><span class="bt_green_r"></span></a>
     <?php
		}
	 ?>


	<?php
	/*
    	$this->load->view('admin/includes/action_buttons');
		$this->load->view('admin/includes/pagination');
	*/
	?>
 
<!--     
     <h2>Warning Box examples</h2>
      
	<?php
    	//$this->load->view('admin/includes/warning_boxes');
	?>
           
     <h2>Nice Form example</h2>
     
	<?php
    	//$this->load->view('admin/includes/nice_form');
	?>
-->      
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
    <div class="footer">