<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
div.inputPDF{
	background: #FFFFE1;
	display:inline-block;
	padding-left:10px;
	border-bottom:1px solid #000;
	width:320px;
}
</style>
<title>Untitled Document</title>
</head>

<body>
<table width="390" border="0" cellspacing="0" cellpadding="0" align="center" style="border:solid; border-width:1px; border-color:#005595;">
  <tr>
    <td>
        <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td align="center">
            </td>
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
   <td align="right"></td>
                        <td valign="top">
						  						  </td>
  </tr>
</table>
</td>
          </tr>
          <tr>
            <td style="border-bottom:dashed; border-bottom-color:#005595; border-bottom-width:3px;"> </td>
          </tr>
          <tr>
            <td align="right" style="padding-top:10px;"><table width="50%" border="1" cellspacing="0" cellpadding="0" style="border:solid; border-width:2px; border-color:#8aa4cc;padding-right:0px;">
                <tr>
                  <td style="border:solid; border-width:2px; border-color:#8aa4cc; background-color: #FFFFE1; font-size:22px;" cellspacing=2>
                  <div style="padding:2%; text-align:center;">
                  		<?php echo $ttpd_parking_infraction_notice_number; ?>
                  </div>
				</td>
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
            <td> </td>
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
                  <td colspan="2" class="text_box">
                  
                  <div class="inputPDF" style="width:360px; background: #FFFFE1;"><?php echo $ttpd_defendant_owners_name; ?></div>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" class="text">CURRENT MAILING ADDRESS</td>
                </tr>
                <tr>
                  <td colspan="2" class="text_box">
                  <div class="inputPDF" style="width:360px; background: #FFFFE1;"><?php echo $ttpd_current_mailing_address; ?></div>
                  </td>
                </tr>
                <tr>
                  <td width="51%" class="text">APT./SUITE</td>
                  <td width="49%" class="text">CITY</td>
                </tr>
                <tr>
                  <td class="text_box">
	                  <div class="inputPDF" style="width:167px; background: #FFFFE1;"><?php echo $ttpd_apt_suite; ?></div>
                  </td>
                  <td class="text_box">
	                  <div class="inputPDF" style="width:167px; background: #FFFFE1;"><?php echo $ttpd_city; ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="text">PROVINCE</td>
                  <td class="text">POSTAL CODE</td>
                </tr>
                <tr>
                  <td class="text_box">
	                  <div class="inputPDF" style="width:167px; background: #FFFFE1;"><?php echo $ttpd_province_state; ?></div>
                  </td>
                  <td class="text_box">
	                  <div class="inputPDF" style="width:167px; background: #FFFFE1;"><?php echo $ttpd_postal_zip_code; ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="text">DAYTIME TELEPHONE NUMBER</td>
                  <td> </td>
                </tr>
                <tr>
                  <td colspan="2" class="text_box">
	                  <div class="inputPDF" style="width:361px; background: #FFFFE1;"><?php echo $ttpd_daytime_tel_num; ?></div>
                  </td>
                </tr>
                <tr>
                  <td> </td>
                  <td> </td>
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
                        <td width="33%" class="text">Check <img src="<?php echo base_url(); ?>images/mark.jpg" /> One</td>
                        <td width="34%" class="text">
                        <?php if ($ttpd_intend_to_challenge_evidence=='No'){ ?><img src="<?php echo base_url(); ?>images/mark.jpg" /><?php } ?>
                        <span style="background: #FFFFE1;">No</span> </td>
                        <td width="33%" class="text">
                        <?php if ($ttpd_intend_to_challenge_evidence=='Yes'){ ?><img src="<?php echo base_url(); ?>images/mark.jpg" /><?php } ?>
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
            <td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid; border-width:2px; border-color:#005595;">
                <tr>
                  <td><p class="para_text" align="justify">I request that my trial be held in the</p></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="33%" class="text">Check <img src="<?php echo base_url(); ?>images/mark.jpg" alt="" /> One</td>
                        <td width="34%" class="text">
                         <?php if ($ttpd_trial_language=='English Language'){ ?><img src="<?php echo base_url(); ?>images/mark.jpg" /><?php } ?>
                        <span style="background: #FFFFE1;">English Language </span></td>
                        <td width="33%" class="text">
                         <?php if ($ttpd_trial_language=='French Language'){ ?><img src="<?php echo base_url(); ?>images/mark.jpg" /><?php } ?>
                        <span style="background: #FFFFE1;"> French Language </span></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td class="text" style="padding-top:6px;">I request a 
	                  <div class="inputPDF" style="background-color:#F0F0F0;"><?php echo $ttpd_trial_interpreter; ?></div>
                  language Interpreter</td>
                </tr>
                <tr>
                  <td class="text" style="font-size:8px; padding-left:75px; margin-top:0px;" valign="top">LEAVE BLANK IF INAPPLICABLE</td>
                </tr>
              </table>
            </td>
         </tr>
          <tr>
            <td class="para_text"><strong>NOTE: If you fail to appear at the time and place set for your trial, you will be deemed to not dispute the charge and a conviction may be entered against you in your absence without further notice.</strong></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="57%">
	                  <div class="inputPDF" style="width:200px; background: #F0F0F0;"><?php echo $ttpd_signature; ?></div>
                  </td>
                  <td width="43%">
	                  <div class="inputPDF" style=" width:132px; background:#FFFFE1;"><?php echo $ttpd_signature_date; ?></div>
                  </td>
                </tr>
                <tr>
                  <td style="font-size:10px; color:#527ab8;">SIGNATURE OF DEFENDANT OR AGENT</td>
                  <td style="font-size:10px; color:#527ab8;">DATE</td>
                </tr>
                <tr>
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
              <tr>
        
                <td style="height:90px;"> </td>
              </tr>
            </table></td>
          </tr>
          <tr>
          	<td>&nbsp;
            	
            </td>
          </tr>
          <tr>
            <td style="border-bottom:dashed; border-bottom-color:#005595; border-bottom-width:3px;"> </td>
          </tr>
          <tr>
            <td><p align="justify" class="para_text"><strong>If you are appearing as agent for the defendant, please complete the
                following:</strong></p></td>
          </tr>
          <tr>
            <td class="para_text">I,
	                  <div class="inputPDF" style="width:340px; font-size:10px; color:#527ab8; background-color:#F0F0F0;"><?php echo $ttpd_agent_name; ?></div>
              <br />
              acknowledge that the person named as the defendant above has authorized me to file the Notice of Intention to Appear in court.</td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="25%" valign="top" class="para_text">Check <img src="<?php echo base_url(); ?>images/mark.jpg" alt="" /> One</td>
                        <td width="8%" align="right" valign="top" class="para_text">
                        <?php if ($ttpd_agent_will_appear_for_defendant==0){}else{ ?><img src="<?php echo base_url(); ?>images/mark.jpg" /><?php } ?>
                        </td>
                        <td width="11%" align="left" valign="top" class="para_text">I will </td>
                        <td width="8%" valign="top" class="para_text">
                        <?php if ($ttpd_agent_will_appear_for_defendant==1){}else{ ?><img src="<?php echo base_url(); ?>images/mark.jpg" /><?php } ?>
                        </td>
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
                  <td colspan="2" class="text_box">
	                  <div class="inputPDF" style="width:360px;background-color:#F0F0F0;"><?php echo $ttpd_agent_mailing_address; ?></div>
                  </td>
                </tr>
                <tr>
                  <td width="51%" class="text">APT./SUITE</td>
                  <td width="49%" class="text">CITY</td>
                </tr>
                <tr>
                  <td class="text_box">
	                  <div class="inputPDF" style="width:167px;background-color:#F0F0F0;"><?php echo $ttpd_agent_apt_suite; ?></div>
                  </td>
                  <td class="text_box">
	                  <div class="inputPDF" style="width:165px;background-color:#F0F0F0;"><?php echo $ttpd_agent_city; ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="text">PROVINCE</td>
                  <td class="text">POSTAL CODE</td>
                </tr>
                <tr>
                  <td class="text_box">
	                  <div class="inputPDF" style="width:167px;background-color:#F0F0F0;"><?php echo $ttpd_agent_province; ?></div>
                  </td>
                  <td class="text_box">
	                  <div class="inputPDF" style="width:165px;background-color:#F0F0F0;"><?php echo $ttpd_agent_zip_postal_code; ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="text">DAYTIME TELEPHONE NUMBER</td>
                  <td> </td>
                </tr>
                <tr>
                  <td colspan="2" class="text_box">
	                  <div class="inputPDF" style="width:361px;background-color:#F0F0F0;"><?php echo $ttpd_agent_daytime_tel_num; ?></div>
                  </td>
                </tr>
                <tr>
                  <td class="text_small">WHITE - COURT</td>
                  <td class="text_small">YELLOW - DEFENDANT</td>
                </tr>
                
              </table></td>
          </tr>
          <tr>
            <td> </td>
          </tr>

        </table>
      </td>
  </tr>
</table>
</body>
</html>