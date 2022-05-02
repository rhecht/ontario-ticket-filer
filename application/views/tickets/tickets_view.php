<h1>List of Tickets for <?php echo $this->session->userdata('friendly_name'); ?></h1>


<p>
<!--
$12.00 ea 1 ticket  |  $10.00 ea 2-5 tickets  |  $8.00 ea. 6-10 tickets  |  $6.00 ea. 11+ tickets  (+HST)
-->
1 ticket: $15.00 ea |  2-5 tickets: $15.00 ea  |  6-10 tickets: $15.00 ea. |  11+ tickets  (+HST): $15.00 ea.
</p>

<?php if(isset($records)){ ?>
<form name="tickets_form" id="tickets_form" action="<?php echo base_url(); ?>tickets/paypal_notice_booking_bulk" method="post">

<table cellspacing="0" cellpadding="0" id="FeatureMatrix">
	<tr>
    	<th  class="matrixColumn">
        	Check to Select
        </th>
        <th class="matrixColumn">
        	Ticket PDF
        </th>
    	<th class="matrixColumn">
        	Offence Date
        </th>
    	<th class="matrixColumn">
        	Type
        </th>
    	<th class="matrixColumn">
        	Booking Fee Status
        </th>
    	<th class="matrixColumn">
        	Remove
        </th>
    </tr>
    <?php if(isset($records)):foreach($records as $row):?>
    <tr>
    	<td class="matrixItem last">        
        
			<input type="checkbox" 
            	<?php
                	if(
						(strtotime($row->ticket_offence_date) < strtotime('-30 days')) ||
						($row->ticket_booking_fee_status==1)
					)
					{
						echo "disabled";
					}
				?>
                
            name="isChecked[]" value="<?php echo $row->ticket_id; ?>" id="isChecked[]"  />
            
            <?php
	          //echo  strtotime($row->ticket_offence_date) . " " . strtotime('-30 days') . " " . strtotime('-1 days');
			?>
        	
        	
        </td>
    	<td class="matrixOdd last">        	
            <?php if($row->ticket_booking_fee_status==0){ ?>
            	After payment, your PDF will be available for download
            <?php }
				else{
					//PDF Download Link Generate
					
					switch($row->ticket_type){
						case 1:
							$form_html='form_notice_to_appear';
						break;
						case 2:
							$form_html='form_parking';
						break;
						case 3:
							$form_html='form_redlight';
						break;
						default:
							$form_html='form_notice_to_appear';
						break;
					}
			?>
            	<a href="<?php echo $this->config->item('base_url') . "tickets/form_download/" . $form_html . "/". $row->ticket_id; ?>">
                	Download PDF					
                </a>
            <?php
				}
			?>
            
        </td>
    	<td class="matrixEven last">
        	<?php echo date("M d, Y", strtotime($row->ticket_offence_date)); ?>
        </td>
    	<td class="matrixOdd last">
        	<?php echo $row->ticket_type_name; ?>
        </td>
    	<td class="matrixEven last">
        	<?php echo $row->ticket_booking_fee_status_name; ?>
        </td>
    	<td class="matrixOdd last">
        	<a href="<?php echo base_url(); ?>tickets/ticket_delete/<?php echo $row->ticket_id; ?>" onClick="confirmDelete();">
        		<img src="<?php echo base_url(); ?>images/delete-red.png" alt="Delete" title="Delete" border="0" />
            </a>
        </td>
    </tr>
	    <?php endforeach; ?>
	<?php else: ?>
    	<tr>
        	<td colspan=6>
				No records were returned.
        	</td>
        </tr>
	<?php endif; ?>
</table>
</form>

<?php
		}
		else{
			echo "You have no new tickets. File one today!";
		}
?>


<br />
<div style="text-align:center;">

<!--
	<button onClick="window.location.href='tickets/form_notice_to_appear'">File Another Ticket</button>
-->
	<button onClick="toggleDisplay('tickettypes');">File Another Ticket</button>
   	<button onClick="document.tickets_form.submit();">Checkout and Pay Now</button>
</div>

<div style="clear:both; width:100%;"></div>
<br />
<div id="tickettypes" style="display:none;">
<br /><br /><br />

<h2>Which ticket would you like to request a trial date for?</h2>

    <div id="parking">
        <button onClick="window.location.href='<?php echo base_url(); ?>tickets/parking_ticket_check'">Parking</button>
    </div>
    <div id="redLightCamera">
        <button onClick="window.location.href='<?php echo base_url(); ?>tickets/redlight_ticket_check'">Red Light Camera</button>
    </div>
    <div id="generalTraffic">
        <button onClick="window.location.href='<?php echo base_url(); ?>tickets/noticetoappear_check'">General Traffic Ticket</button>
    </div>
    <div style="clear:both;"></div>
    
    <p>
    You will normally receive a Court Date within 6 to 8 months.
    </p>
    <p style="text-align:center;">
    Please help us help YOU by sending us a scanned copy or picture of your ticket(s) !!! 
    <br />
    Please email us at <a href="mailto:info@irisemedia.com">info@irisemedia.com</a> , or send fax to 416-703-9001 
    <br />
    </p>
    
    <div class="didYouKnow">
    <p>
    Did you know that we can file Traffic Tickets (issued by the police) issued to you anywhere within the Province Of Ontario within the first 15 days?
    </p>
    <p>
    That means YOU don't have to go to the courthouse and wait in any long line up, drive in bad weather, miss your lunch, take time off work! How convenient!
    </p>
    </div></div>

<script type="text/JavaScript">
 
function confirmDelete(){
var agree=confirm("Are you sure you want to delete this file?");
if (agree)
     return true;
else
     return false;
}
</script>

<style type="text/css">

#parking, #redLightCamera, #generalTraffic{
	float:left;
	margin-left:35px;
	padding-right:35px;
	width:175px;
	height: 200px;	
}

#parking{
	background: url('<?php echo base_url(); ?>images/tickets/parking_icon_top.png') no-repeat;
	background-position:center top;
}
#redLightCamera{
	background: url('<?php echo base_url(); ?>images/tickets/redlight_icon_top.png') no-repeat;
	background-position:center top;
}
#generalTraffic{
	width:180px;
	background: url('<?php echo base_url(); ?>images/tickets/notice_icon_top.png') no-repeat;
	background-position:center top;
}

#parking img, #redLightCamera img, #generalTraffic img,
{
	padding-top:155px;
	text-align:center;
}

#parking button, #redLightCamera button, #generalTraffic button{
	margin-top:135px;
}
#parking button{
	margin-left:45px;
}
#redLightCamera button{
	margin-left:25px;
}
#generalTraffic button{
	margin-left:15px;
}

div.didYouKnow{
	/*
	background-color:#FFFF99;
	*/
	background-color:#999;
	color:#fff;
	font-weight:bold;
	padding:4px;
}

</style>

    <script type="text/javascript">
        function toggleVisibility(controlId)
        {
            var control = document.getElementById(controlId);
            if(control.style.visibility == "visible" || control.style.visibility == "")
                control.style.visibility = "hidden";
            else 
                control.style.visibility = "visible";
              
        }
        function toggleDisplay(controlId)
        {
            var control = document.getElementById(controlId);
            if(control.style.display == "block" || control.style.display == "")
                control.style.display = "none";
            else 
                control.style.display = "block";
              
        }
    </script>