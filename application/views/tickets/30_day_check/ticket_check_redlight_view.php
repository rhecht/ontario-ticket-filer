<?php 
	if (isset($errorMessage) && $errorMessage!=""){
	echo $errorMessage;
	}
?>

<form action="" method="post" name="get_date" id="get_date">

<table align="center" width="70%" border="0" cellspacing="2" cellpadding="2" >

  <tr>

    <td><br /><br />

	

	<table align="center" width="70%" border="0" cellspacing="2" cellpadding="2" >

  <tr>

    <td colspan="2" align="center" valign="middle" style="font-size:14px;"></td>

    </tr>

  <tr bgcolor="#E6E6E6">

    <td style="font-size:14px;">Please Enter Your Offence Date:</td>

		

	 <td><a href="#" onClick="setYears(1947, 2015); showCalender(this, 'date_of_ticket');"><input name="date_of_ticket" id="date_of_ticket" type="text" size="30" />

		

		<img src="<?php echo base_url(); ?>images/calender.png" border="0"></a></td>

	 </tr>

  <tr>

    <td colspan="2" style="font-size:14px;">&nbsp;</td>

  </tr>

  <tr>

    <td colspan="2" style="font-size:14px;">Please note: </td>

  </tr>

  <tr>

    <td colspan="2" style="font-size:14px;">



      <span style="background-color:#FFFF00">If you received your ticket more than 30 days ago, we unfortunately are unable to file it. Sorry!</span></td>

    </tr>

</table>

	<br />





	</td>

	

  </tr>

   <tr>

	 <td align="center">

	 <!-- Calender Script  --> 



    <table id="calenderTable">

        <tbody id="calenderTableHead">

          <tr>

            <td colspan="4" align="center">

	          <select onChange="showCalenderBody(createCalender(document.getElementById('selectYear').value,

	           this.selectedIndex, false));" id="selectMonth">

	              <option value="0">Jan</option>

	              <option value="1">Feb</option>

	              <option value="2">Mar</option>

	              <option value="3">Apr</option>

	              <option value="4">May</option>

	              <option value="5">Jun</option>

	              <option value="6">Jul</option>

	              <option value="7">Aug</option>

	              <option value="8">Sep</option>

	              <option value="9">Oct</option>

	              <option value="10">Nov</option>

	              <option value="11">Dec</option>

	          </select>            </td>

            <td colspan="2" align="center">

			    <select onChange="showCalenderBody(createCalender(this.value, 

				document.getElementById('selectMonth').selectedIndex, false));" id="selectYear">

				</select>			</td>

            <td align="center">

			    <a href="#" onClick="closeCalender();"><font color="#003333" size="+1">X</font></a>			</td>

		  </tr>

       </tbody>

       <tbody id="calenderTableDays">

         <tr style="">

           <td>Sun</td><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td>

         </tr>

       </tbody>

       <tbody id="calender"></tbody>

    </table>



<!-- End Calender Script  -->

	 </td>

  </tr>

  <tr>

	 <td align="center">
     <!--
     <button onclick="window.location.href='<?php echo base_url(); ?>tickets'">Back</button>
-->
     <a href="<?php echo base_url(); ?>tickets">Back</a>
     &nbsp;&nbsp;<input name="Submit" type="submit" value=" Next " onclick="return ValidateForm();"/></td>

  </tr>

</table>

</form>




<script language="javaScript" type="text/javascript" src="<?php echo base_url(); ?>js/calendar_new.js"></script>

<script language="javascript" type="text/javascript">

function ValidateForm()

{

	if(document.get_date.date_of_ticket.value=="")

	{

		document.get_date.date_of_ticket.style.border='1px solid #FF6633';

		alert('Enter your ticket date.');	

		document.get_date.date_of_ticket.focus();

		return false;

	}

	return true;

}

</script>

<link href="<?php echo base_url(); ?>css/calendar_new.css" rel="stylesheet" type="text/css">