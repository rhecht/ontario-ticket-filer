
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Parking Ticket Form</title>

<style type="text/css">

body {

	font-family:Arial, Helvetica, sans-serif;

}

.text {

	font-size:11px;

	color:#527ab8;

	padding-left:5px;

}

.text_small {

	font-size:8px;

	color:#527ab8;

	padding-left:25px;

	padding-top:10px;

}

.para_text {

	font-size:12px;

	color:#527ab8;

	padding-left:5px;

	padding-right:5px;

	padding-top:7px;

	padding-bottom:7px;

}

.text_box {

	padding-left:5px;

}

</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/calendar.css">

<script language="JavaScript" src="<?php echo base_url(); ?>js/calendar_us.js"></script>

<script type="text/javascript" language="javascript">

function ValidateFields()

{

	//alert('fields are here');

	var frm=document.parking_ticket;

	//var i=0;



	if(frm.infractionid.value.length==0)

	{

		alert("Please Enter the Infraction Number.");

		frm.infractionid.focus();

		return false;

	}

	if(frm.Ownername.value.length==0)

	{

		alert("Please Enter the Owner's Name.");

		frm.Ownername.focus();

		return false;

	}

	if(frm.MailingAddress.value.length==0)

	{

		alert("Please Enter the Mailing Address.");

		frm.MailingAddress.focus();

		return false;

	}

//	if(frm.Suite.value.length==0)

//	{

//		alert("Please Enter the Suite.");

//		frm.Suite.focus();

//		return false;

//	}

	if(frm.City.value.length==0)

	{

		alert("Please Enter the City.");

		frm.City.focus();

		return false;

	}

	

	if(frm.Province.value.length==0)

	{

		alert("Please Enter the Province.");

		frm.Province.focus();

		return false;

	}

	if(frm.PostalCode.value.length==0)

	{

		alert("Please Enter the Postal Code.");

		frm.PostalCode.focus();

		return false;

	}

	

	if(frm.TelePhone.value.length==0)

	{

		alert("Please Enter the Day Time Telephone No.");

		frm.TelePhone.focus();

		return false;

	}

	

/*	if(frm.signature.value.length==0)

	{

		alert("Please enter your signature or full name.");

		frm.signature.focus();

		return false;

	}*/	

	/*if(frm.No.checked == false && frm.Yes.checked == false)

	{

	alert('Please Select atleast one checkbox');

	return false;

	}

	

	if(frm.English_Language.checked == false && frm.French_Language.checked == false)

	{

	alert('Please Select Language');

	return false;

	}*/

	/*if(frm.languageInterpreter.value.length==0)

	{

		alert("Please Enter the language Interpreter.");

		frm.languageInterpreter.focus();

		return false;

	}*/

	if(frm.Date_Submit.value.length==0)

	{

		alert("Please Enter the Date.");

		frm.Date_Submit.focus();

		return false;

	}

	/*if(frm.appearing.checked == false && frm.notappearing.checked == false)

	{

	alert('Please Select atlestone');

	return false;

	}*/

	/*

	if(frm.AgentName.value.length==0)

	{

		alert("Please Enter the Agent Name.");

		frm.AgentName.focus();

		return false;

	}

	if(frm.AgentMail.value.length==0)

	{

		alert("Please Enter the Agent Mail.");

		frm.AgentMail.focus();

		return false;

	}

	if(frm.AgentMailingAddress.value.length==0)

	{

		alert("Please Enter the Agent Mailing Address.");

		frm.AgentMailingAddress.focus();

		return false;

	}

	if(frm.WhiteCourt.value.length==0)

	{

		alert("Please Enter the WhiteCourt.");

		frm.WhiteCourt.focus();

		return false;

	}*/

	

	document.forms[0].submit();

	return true;

	

}









function Clickme()

	{

		//alert('hello');	

		var i = document.getElementById("office_use_only");

		

		if( i.value == "For Office Use Only")

		{	

			i.value = "";

			i.focus();

		}

	}

	

	function UnClickme()

	{

		var i = document.getElementById("office_use_only");

		

		if( i.value == "")

		{

			i.value = "For Office Use Only";

		}

	}







	function AgentNameClick()

	{


		//alert('hello');	

		var i = document.getElementById("AgentName");

		

		if( i.value == "AGENT NAME")

		{

			i.value = "";

			i.focus();

		}

	}

	

	function AgentNameUnclick()

	{

		var i = document.getElementById("AgentName");

		

		if( i.value == "")

		{

			i.value = "AGENT NAME";

		}

	}

	

	

	

	function AgentEmailClick()

	{

		//alert('hello');	

		var i = document.getElementById("AgentMail");

		

		if( i.value == "Current Mailing Address Of Agent")

		{

			i.value = "";

			i.focus();

		}

	}

	

	function AgentEmailUnclick()

	{

		var i = document.getElementById("AgentMail");

		

		if( i.value == "")

		{

			i.value = "Current Mailing Address Of Agent";

		}

	}

	

	

	

	

</script>

</head>

<body>

<form action="form_parking_submit" method="post" name="parking_ticket" id="parking_ticket">

<table width="390" border="0" cellspacing="0" cellpadding="0" align="center" style="border:solid; border-width:1px; border-color:#005595;">

  <tr>

    <td>

        <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">

          <tr>

            <td align="center"><input name="court_location" type="hidden" value="" /></td>

          </tr>

          <tr>

            <td align="center"></td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td colspan="2" align="left" class="text">Please make sure that the <strong>OWNER OF THE VEHICLE</strong> is marked as the <strong>DEFENDANT'S NAME</strong>. In addition, the <strong>ADDRESS</strong> that is <strong>REGISTERED TO THE LICENCE PLATE</strong> must be noted.</td>

    </tr>

  <tr>

   <td align="right"><!--<h2 style="margin:0; font-size:16px; color:#005595;">Court Location:</h2>--></td>

                        <td valign="top">

<!--                          <select name="court_location" id="court_location">

                          <option value="1530 Markham Rd. Scarborough">1530 Markham Rd. Scarborough</option>

                          <option value="137 Edward St. Toronto">137 Edward St. Toronto</option>

                          <option value="2700 Eglinton Ave W. Toronto">2700 Eglinton Ave W. Toronto</option>

                          <option value="50 High Tech Rd. Richmond Hill">50 High Tech Rd. Richmond Hill</option>

                          </select>-->

						  						  </td>

  </tr>

</table>

</td>

          </tr>

          <tr>

            <td style="border-bottom:dashed; border-bottom-color:#005595; border-bottom-width:3px;">&nbsp;</td>

          </tr>

          <tr>

            <td align="right" style="padding-top:10px;"><table width="50%" border="1" cellspacing="0" cellpadding="0" style="border:solid; border-width:2px; border-color:#8aa4cc;padding-right:0px;">

                <tr>

                  <td style="border:solid; border-width:2px; border-color:#8aa4cc; height:40px;"><input name="infractionid" type="text" id="infractionid" maxlength="8" style="width:98%; height:100%; font-size:22px; background: #FFFFE1;" /></td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td align="right" style="font-family:Arial, Helvetica, sans-serif; font-size:9px; color:#527ab8; padding-right:0px;">PARKING INFRACTION NOTICE NUMBER</td>

          </tr>

          <tr>

            <td align="center" style="font-family: Arial, Helvetica, sans-serif; font-size:20px; font-weight:bold; color:#005595; padding-top:3px;">NOTICE OF INTENTION TO APPEAR</td>

          </tr>

          <tr>

            <td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#527ab8;">PURSUANT TO s.17.1 OF THE PROVINCIAL OFFENCES ACT</td>

          </tr>

          <tr>

            <td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#527ab8;">Ontario Court of Justice, Toronto Region</td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#005595; font-weight:bold; padding-bottom:5px;">Take notice that I,</td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid; border-width:2px; border-color:#005595;">

                <tr>

                  <td colspan="2" class="text">DEFENDANT/OWNER'S NAME -PLEASE PRINT</td>

                </tr>

                <tr>

                  <td colspan="2" class="text_box"><input type="text" name="Ownername" id="Ownername" style="width:360px; background: #FFFFE1;" /></td>

                </tr>

                <tr>

                  <td colspan="2" class="text">CURRENT MAILING ADDRESS</td>

                </tr>

                <tr>

                  <td colspan="2" class="text_box"><input type="text" name="MailingAddress" id="MailingAddress" style="width:360px; background: #FFFFE1;"/></td>

                </tr>

                <tr>

                  <td width="51%" class="text">APT./SUITE</td>

                  <td width="49%" class="text">CITY</td>

                </tr>

                <tr>

                  <td class="text_box"><input type="text" name="Suite" id="Suite" style="width:167px; background: #FFFFE1;"/></td>

                  <td class="text_box"><input type="text" name="City" id="City" style="width:167px; background: #FFFFE1;"/></td>

                </tr>

                <tr>

                  <td class="text">PROVINCE</td>

                  <td class="text">POSTAL CODE</td>

                </tr>

                <tr>

                  <td class="text_box"><input type="text" name="Province" id="Province" style="width:167px; background: #FFFFE1;"/></td>

                  <td class="text_box"><input type="text" name="PostalCode" id="PostalCode" style="width:167px; background: #FFFFE1;"/></td>

                </tr>

                <tr>

                  <td class="text">DAYTIME TELEPHONE NUMBER</td>

                  <td>&nbsp;</td>

                </tr>

                <tr>

                  <td colspan="2" class="text_box"><input type="text" name="TelePhone" id="TelePhone" style="width:361px; background: #FFFFE1;"/></td>

                </tr>

                <tr>

                  <td>&nbsp;</td>

                  <td>&nbsp;</td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td class="para_text">wish to give notice of my intention to appear in court for the purpose of

                entering a plea and having a trial respecting the charges set out in the

                Parking Infraction Notice noted above.</td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid; border-width:2px; border-color:#005595;">

                <tr>

                  <td class="para_text"> At the trial I intend to challenge the evidence of the Provincial OffencesOfficer who completed the Parking Infraction Notice and Certificate of Parking Infraction.</td>

                </tr>

                <tr>

                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                      <tr>

                        <td width="33%" class="text">Check <img src="<?php echo base_url(); ?>images//mark.jpg" /> One</td>

                        <td width="34%" class="text"><input  type="radio" name="Infraction" value="No"/>

                        <span style="background: #FFFFE1;">No</span> </td>

                        <td width="33%" class="text"><input name="Infraction" type="radio"  value="Yes" checked="checked" />

                        <span style="background: #FFFFE1;">Yes </span></td>

                      </tr>

                    </table></td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td><p align="justify" class="para_text"><strong>If you indicate above that you do not intend to challenge the officer's evidence, the officer may not attend and prosecution may rely on certified statements as evidence against you.</strong></p></td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid; border-width:2px; border-color:#005595;">

                <tr>

                  <td><p class="para_text" align="justify">I request that my trial be held in the</p></td>

                </tr>

                <tr>

                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                      <tr>

                        <td width="33%" class="text">Check <img src="<?php echo base_url(); ?>images/mark.jpg" alt="" /> One</td>

                        <td width="34%" class="text"><input type="radio" name="Language" checked="checked" id="Language" value="English Language" />

                        <span style="background: #FFFFE1;">English Language </span></td>

                        <td width="33%" class="text"><input type="radio" name="Language" id="Language"  value="French Language"/>

                        <span style="background: #FFFFE1;"> French Language </span></td>

                      </tr>

                    </table></td>

                </tr>

                <tr>

                  <td class="text" style="padding-top:6px;">I request a&nbsp;<input type="text" name="languageInterpreter" id="languageInterpreter" style="background-color:#F0F0F0;" /> language Interpreter</td>

                </tr>

                <tr>

                  <td class="text" style="font-size:8px; padding-left:75px; margin-top:0px;" valign="top">LEAVE BLANK IF INAPPLICABLE</td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td class="para_text"><strong>NOTE: If you fail to appear at the time and place set for your trial, you will be deemed to not dispute the charge and a conviction may be entered against you in your absence without further notice.</strong></td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td width="57%"><input type="text" style="width:200px; background: #F0F0F0;" name="signature" id="signature" readonly="readonly" /></td>

                  <td width="43%"><input name="Date_Submit" type="text" id="Date_Submit" style=" width:132px; background:#FFFFE1;" value="" />

                    <script language="JavaScript">

							new tcal ({

								// form name

								'formname': 'parking_ticket',

								// input name

								'controlname': 'Date_Submit'

							});

					

						</script>                  </td>

                </tr>

                <tr>

                  <td style="font-size:10px; color:#527ab8;">SIGNATURE OF DEFENDANT OR AGENT</td>

                  <td style="font-size:10px; color:#527ab8;">DATE</td>

                </tr>

                <tr height="5px;">

                  <td colspan="2"></td>

                </tr>				

              </table></td>

          </tr>

          <tr>

            <td style="border:solid; border-width:2px; border-color:#005595;"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">

              <tr>

                <td><table width="25%" border="0" cellpadding="0" cellspacing="0" bordercolor="#6666CC" bgcolor="#FFFFFF" style="margin-top:0px;">

  <tr>

    <td style="font-size:8px; padding-left:2px;">FOR OFFICE USE ONLY</td>

  </tr>

</table></td>

              </tr>

              <tr height="90px;">

        

                <td>&nbsp;</td>

              </tr>

            </table></td>

          </tr>

          <tr>

            <td style="border-bottom:dashed; border-bottom-color:#005595; border-bottom-width:3px;">&nbsp;</td>

          </tr>

          <tr>

            <td><p align="justify" class="para_text"><strong>If you are appearing as agent for the defendant, please complete the

                following:</strong></p></td>

          </tr>

          <tr>

            <td class="para_text">I,

              <input type="text" name="AgentName" id="AgentName" value="Ticket Time Saver" style="width:340px; font-size:10px; color:#527ab8; background-color:#F0F0F0;" onclick="javascript: AgentNameClick();" onblur="javascript: AgentNameUnclick();" readonly="" />

              <br />

              acknowledge that the person named as the defendant above has authorized me to file the Notice of Intention to Appear in court.</td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >

                <tr>

                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                      <tr>

                        <td width="25%" valign="top" class="para_text">Check <img src="<?php echo base_url(); ?>images/mark.jpg" alt="" /> One</td>

                        <td width="8%" align="right" valign="top" class="para_text"><input type="radio" name="appearing" id="appearing" value="I will" DISABLED/></td>

                        <td width="11%" align="left" valign="top" class="para_text">I will </td>

                        <td width="8%" valign="top" class="para_text"><input name="appearing" type="radio" id="appearing2" value="I will not be appearing" checked="checked"/></td>

                        <td width="48%" align="left" valign="top" class="para_text">I will not be appearing on behalf of the defendant.</td>

                      </tr>

                  </table></td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td style="padding-top:15px;"><table width="100%" border="0" cellspacing="0" cellpadding="0" >

                <tr>

                  <td colspan="2" class="text">CURRENT MAILING ADDRESS OF AGENT</td>

                </tr>

                <tr>

                  <td colspan="2" class="text_box"><input type="text" name="AgentMailingAddress1" id="AgentMailingAddress1" value="875 Eglinton Avenue West, Suite 210" style="width:360px;background-color:#F0F0F0;" readonly=""/></td>

                </tr>

                <tr>

                  <td width="51%" class="text">APT./SUITE</td>

                  <td width="49%" class="text">CITY</td>

                </tr>

                <tr>

                  <td class="text_box"><input type="text" name="Suite1" id="Suite1" style="width:167px;background-color:#F0F0F0;" readonly=""/></td>

                  <td class="text_box"><input type="text" name="City1" id="City1" value="Toronto" style="width:165px;background-color:#F0F0F0;" readonly=""/></td>

                </tr>

                <tr>

                  <td class="text">PROVINCE</td>

                  <td class="text">POSTAL CODE</td>

                </tr>

                <tr>

                  <td class="text_box"><input type="text" name="Province1" id="Province1" value="Ontario" style="width:167px;background-color:#F0F0F0;" readonly=""/></td>

                  <td class="text_box"><input type="text" name="PostalCode1" id="PostalCode1" value="M3B 3X9" style="width:165px;background-color:#F0F0F0;" readonly=""/></td>

                </tr>

                <tr>

                  <td class="text">DAYTIME TELEPHONE NUMBER</td>

                  <td>&nbsp;</td>

                </tr>

                <tr>

                  <td colspan="2" class="text_box"><input name="TelePhone1" type="text" id="TelePhone1" value="416-840-7749" style="width:361px;background-color:#F0F0F0;" maxlength="50" readonly=""/></td>

                </tr>

                <tr>

                  <td class="text_small">WHITE - COURT</td>

                  <td class="text_small">YELLOW - DEFENDANT</td>

                </tr>

                

              </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>



        </table>

      </td>

  </tr>

</table>

		<table width="390" border="0" cellspacing="0" cellpadding="0" align="center">

		<tr><td>&nbsp;</td></tr>

		<tr>

			<td align="center"><input type="hidden" name="submit"  id="submit"/>

			  <input type="hidden" name="goto_home"  id="goto_home" value="1"/>

              <input type="submit" name="button" id="button" value="Finish" onclick="return ValidateFields();"/>&nbsp;&nbsp;

<!--			  <input name="cmdAddMore" type="button" value="Add More" onclick="javascript: document.parking_ticket.goto_home.value='0'; alert(document.parking_ticket.goto_home.value); document.parking_ticket.submit;" />-->

			  </td>

		</tr>

		</table>

</form>

</body>

</html>

