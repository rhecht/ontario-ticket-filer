<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>General Ticket</title>

<style type="text/css">

body {

	font-family:Arial, Helvetica, sans-serif;

	font-size:12px;

}

.text {

	font-size:11px;

	padding-left:5px;

}

.para_text {

	font-size:12px;

	padding-left:5px;

	padding-right:5px;

	padding-top:7px;

	padding-bottom:7px;

}

.text_box {

	padding-left:5px;

}
div.notice_to_appear{
	min-width:400px;
	max-width:800px;
	margin-left:auto;
	margin-right:auto;
}


</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/calendar.css">

<script language="JavaScript" src="<?php echo base_url(); ?>js/calendar_us.js"></script>

<script type="text/javascript" language="javascript">

function ValidateFields()

{

	//alert('fields are here');

	var frm=document.general;

	//var i=0;



	if(frm.Notice.value.length==0)

	{

		alert("Please enter the notice detail.");

		frm.Notice.focus();

		return false;

	}

	//alert(frm.Street.value);

	if(frm.Address.value.length==0)

	{

		alert("Please enter the current address.");

		frm.Address.focus();

		return false;

	}

	

	



	if(frm.Municiplite.value.length==0)

	{

		alert("Please enter the municipality .");

		frm.Municiplite.focus();

		return false;

	}

	if(frm.Province.value.length==0)

	{

		alert("Please enter the province.");

		frm.Province.focus();

		return false;

	}

	if(frm.PostalCode.value.length==0)

	{

		alert("Please enter the postal code.");

		frm.PostalCode.focus();

		return false;

	}

	if(frm.icon.value.length==0)

	{

		alert("Please enter the icon value.");

		frm.icon.focus();

		return false;

	}	

	if(frm.OffenceNumber.value.length==0)

	{

		alert("Please enter the offence number.");

		frm.OffenceNumber.focus();

		return false;

	}

	if(frm.OffenceDate.value.length==0)

	{

		alert("Please enter the offence date.");

		frm.OffenceDate.focus();

		return false;

	}

	/*if(frm.RepresentativeDetails.value.length==0)

	{

		alert("Please Enter the Representative Details.");

		frm.RepresentativeDetails.focus();

		return false;

	}

	if(frm.CurrentAddress1.value.length==0)

	{

		alert("Please Enter the Current Address.");

		frm.CurrentAddress1.focus();

		return false;

	}

	if(frm.Street1.value.length==0)

	{

		alert("Please Enter the Street Address.");

		frm.Street1.focus();

		return false;

	}

	if(frm.Apt1.value.length==0)

	{

		alert("Please Enter the Apt / app.");

		frm.Apt1.focus();

		return false;

	}

	if(frm.Municipality1.value.length==0)

	{

		alert("Please Enter the Municipality.");

		frm.Municipality1.focus();

		return false;

	}

	if(frm.Province1.value.length==0)

	{

		alert("Please Enter the Province.");

		frm.Province1.focus();

		return false;

	}

	if(frm.PostalCode1.value.length==0)

	{

		alert("Please Enter the PostalCode.");

		frm.PostalCode1.focus();

		return false;

	}*/

	

	document.forms[0].submit();

	return true;



}

</script>

</head>

<body>

<div class="notice_to_appear">

<table border="0" cellspacing="0" cellpadding="0" align="center">

  <tr>

    <td><form id="general" name="general" method="post" action="form_notice_to_appear_submit">

        </td>

          </tr>

          <tr>

            <td align="center"><hr /></td>

          </tr>

          <tr>

            <td align="center" style="font-size:14px;"><strong>NOTICE OF INTENTION TO APPEAR<br />

              AVIS D???INTENTION DE COMPARA??TRE</strong></td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td width="21%" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">Ontario Court Of Justice <br />

                    Cour de justice de l???Ontario <br />

                    PROVINCE OF ONTARIO <br />

                    Province de l???Ontario </td>

                  <td width="58%">&nbsp;</td>

                  <td width="21%" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><i>Form / Formule 7</i></strong><br />

                    Provincial Offences Act<br />

                    Loi sur les infractions provinciales<br />

                    Reg. / R??gl. 950</td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td align="center">&nbsp;</td>

          </tr>

          <tr>

            <td align="center">Please Print Clearly / Veuillez ??crire clairment en lettres moul??es</td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td>TAKE NOTICE THAT I

              <input type="text" name="Notice" id="Notice" style="width:633px; background: #FFFFE1;" value="" /></td>

          </tr>

          <tr>

            <td>VEUILLEZ PRENDRE AVIS QUE JE, SOUSSIGN??(E) (defendant???s name / nom du d??fendeur/de la d??fenderesse) Of </td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >

                <tr>

                  <td width="40%" class="text">Current address / adresse actuelle</td>

                  <td width="4%" class="text">&nbsp;</td>

                  <td class="text">Street / rue</td>

                </tr>

                <tr>

                  <td colspan="3" class="text_box"><input type="text" value="" name="Address" id="Address" style="width:685px; background: #FFFFE1;"/></td>

                </tr>

                <tr>

                  <td class="text">Apt. / app.</td>

                  <td class="text">&nbsp;</td>

                  <td class="text">Municipality / municipalit??</td>

                </tr>

                <tr>

                  <td class="text_box"><input type="text" name="Apt" value="" id="Apt" style="width:320px; background: #FFFFE1;"/></td>

                  <td class="text_box">&nbsp;</td>

                  <td class="text_box"><input type="text" value="" name="Municiplite" id="Municiplite" style="width:320px; background: #FFFFE1;"/></td>

                </tr>

                <tr>

                  <td class="text">Province</td>

                  <td class="text">&nbsp;</td>

                  <td class="text">Postal Code / code postal</td>

                </tr>

                <tr>

                  <td class="text_box"><input type="text" value="" name="Province" id="Province" style="width:320px; background: #FFFFE1;"/></td>

                  <td class="text_box">&nbsp;</td>

                  <td class="text_box"><input type="text"<input type="text" value="" name="PostalCode" id="PostalCode" style="width:320px; background: #FFFFE1;"/></td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">

                <tr>

                  <td width="69%" rowspan="2">wish to give notice of my intention to appear in court to enter a plea of not guilty at the time and place <br />

                  set for the trial respecting the charge set out in the Offence Notice or Parking Infraction Notice</td>

                  <td height="20">ICON: 

                  <input name="icon" type="text" id="icon" size="25" value="" style="background-color:#FFFFE1;" /></td>

                </tr>

                <tr>

                  <td width="31%">

                    <input name="OffenceNumber" type="text" id="OffenceNumber" value="" size="25" style="background-color:#FFFFE1;" />

                    <br />

                    (offence number / num??ro d???infaction)</td>

                </tr>

                <tr>

                  <td>d??sire aviser de mon intention de compara??tre devant le tribunal pour inscrire un plaidoyer de non-culpabilit?? ?? l???heure et au lieu pr??vus pour le proc??s en r??ponse ?? l???accusation ??nonc??e dans l???avis d???infraction ou l'avis d'infraction de stationnement</td>

                  <td><label>

                    <input name="OffenceDate" value="" type="text" id="OffenceDate" style=" width:182px; background-color:#FFFFE1"/>

                    <script language="JavaScript">

							new tcal ({

								// form name

								'formname': 'general',

								// input name

								'controlname': 'OffenceDate'

							});

					

						</script>

                    </label>

                    <br />

                    (offence date / date de l???infraction)</td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td><hr style="height:1px; color:#000000;"></td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td width="49%">FOR ANY OFFENCE EXCEPT s.s. 144(18.1) OF THE HTA COMPLETE THIS SECTION:</td>

                  <td width="51%"><i>POUR TOUTE INFRACTION NON VIS??E AU PARAGRAPHE 144 (18.1) DU CODE DE LA ROUTE, REMPLIR CETTE SECTION:</i></td>

                </tr>

                <tr>

                  <td>I intend to challenge the Provincial Offences Officer???s evidence. I request that the officer attend the trial</td>

                  <td><i>J???ai l???intention de contester la preuve de l???agent des infractions provinciales. Je demande que l???agent assiste au proc??s</i></td>

                </tr>

                <tr>

                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                      <tr>

                        <td width="76%">&nbsp;</td>

                        <td width="24%"><label>

                            <input type="radio" name="officer_attend_trial" id="officer_attend_trial" value="0" />

                          <strong>No / Non</strong></label></td>

                      </tr>

                    </table></td>

                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                      <tr>

                        <td width="61%"><input name="officer_attend_trial" type="radio" selected id="officer_attend_trial" checked="checked" value="1" />

                        <strong>Yes</strong> / Oui</td>

                        <td width="39%"><label></label></td>

                      </tr>

                    </table></td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td><hr style="height:1px; color:#000000;"></td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td width="49%"><strong>Note:</strong><br />

                    If you have been charged with an offence under s.s. 144(18.1) of the Highway Traffic Act (red light running/owner), s. 205.20 of the Highway Traffic Act provides that you must apply to the justice at trial if you wish to compel the attendance of the Provincial Offences Officer who issued the Certificate of Offence or who certified the photographs to be tendered at your trial.</td>

                  <td width="51%"><strong>Remarque:</strong><br />

                    <i>Si vous avez ??t?? accus??(e) d???une infraction vis??e au paragraphe 144 (18.1) du Code de la route (passage au feu rouge/propri??taire), l???article 205.20 du Code de la route pr??voit que vous devez vous adresser au juge du proc??s si vous d??sirez obtenir la comparution de l???agent des infractions provinciales qui a d??livr?? le proc??s-verbal d???infraction ou qui a certifi?? les photos qui seront pr??sent??es en preuve lors de votre proc??s.</i></td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td><hr style="height:1px; color:#000000;"></td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td width="49%"><label>

                    <input name="intend_to_appear" type="checkbox" id="intend_to_appear" value="1" checked="checked" />

                    </label>

                    I intend to appear in court to enter a plea at the time and place set for the trial and I wish that it be held in the English language</td>

                  <td width="51%"><label>

                    <input type="checkbox" name="fr_intend_to_appear" checked="checked" id="fr_intend_to_appear" value="1"/>

                    </label>

                    <i>J???ai l???intention de compara??tre devant le tribunal pour inscrire un plaidoyer ?? l???heure et au lieu pr??vus pour le proc??s et je d??sire que le proc??s se d??roule en fran??ais.</i></td>

                </tr>

                <tr>

                  <td>&nbsp;</td>

                  <td>&nbsp;</td>

                </tr>

                <tr>

                  <td>I request a

                    <label>

                    <input type="text" name="languageinterpreter" value="" id="languageinterpreter" style="background-color:#F4F4F4;"/>

                    </label>

                    language interpreter for the trial. (leave blank if inapplicable)</td>

                  <td><i>Je demande l???aide d???un interpr??te de langue

                    <label>

                    <input type="text" name="fr_languageinterpreter" id="fr_languageinterpreter" value=""  style="background-color:#F4F4F4;"/>

                    </label>

                    pour le proc??s. (?? remplir s???il y a lieu)</i></td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td><hr style="height:1px; color:#000000;"></td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">

                <tr>

                  <td width="49%"><strong>Note:</strong> If you fail to <strong>notify</strong> the court office of <strong>address changes</strong> you may not receive important notices e.g., your Notice of Trial. You may be convicted<br />

                  in your absence if you do not attend the trial.</td>

                  <td width="51%"><strong>Remarque:</strong> <i>Si vous omettez de<strong> pr??venir</strong> le greffe du tribunal de tout <strong>changement d???adresse</strong>, vous pourriez ne pas recevoir d???importants avis (par ex., votre avis de proc??s). Vous pourriez ??tre d??clar??(e) coupable en votre absence si vous n???assistez pas au proc??s.</i></td>

                </tr>

                <tr>

                  <td><label>

                    <input name="intend_to_appear_in_court" type="checkbox" id="intend_to_appear_in_court" value="1" />

                    </label>

                    I intend to appear in court to enter a plea at the time and place set for the trial and I wish that it be held in the English language.<br /></td>

                  <td><label>

                    <input type="checkbox" checked="checked" name="fr_intend_to_appear_in_court" id="fr_intend_to_appear_in_court" value="1"/>

                    </label>

                    <i>J???ai l???intention de compara??tre devant le tribunal pour inscrire un plaidoyer ?? l???heure et au lieu pr??vus pour le proc??s et je d??sire que le proc??s se d??roule en fran??ais.</i></td>

                </tr>

                <tr>

                  <td><label>

                    <input type="text" name="signature" id="signature" value="" style="width:350px;background-color:#F4F4F4;" readonly="" />

                    <br />

                    </label>

                    (signature of defendant or representative / signature du d??fendeur/de la d??fenderesse ou du repr??sentant/de la repr??sentante)</td>

                  <td valign="top"><label>

                    <input name="fr_date_post" type="text" id="fr_date_post" value="" style="background-color:#F4F4F4;"  />

                    <script language="JavaScript">

							new tcal ({

								// form name

								'formname': 'general',

								// input name

								'controlname': 'fr_date_post'

							});

					

						</script>

                    </label>

                    <br />

                    date</td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td><hr style="height:1px; color:#000000;"></td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >

                <tr>

                  <td colspan="3" class="text">Representative???s Name &amp; Address/ Nom et adresse du repr??sentant/de la repr??sentante</td>

                </tr>

                <tr>

                  <td colspan="3" class="text_box">
                  	<input disabled type="text" name="RepresentativeDetails_Disabled" id="RepresentativeDetails_Disabled" value="Ticket Time Saver" style="width:708px;background-color:#F4F4F4;" />
                    <input type="hidden" name="RepresentativeDetails" id="RepresentativeDetails" value="Ticket Time Saver" />
                  
                  </td>

                </tr>

                <tr>

                  <td width="40%" class="text">Current address / adresse actuelle</td>

                  <td width="4%" class="text">&nbsp;</td>

                  <td class="text">Street / rue</td>

                </tr>

                <tr>

                  <td class="text_box">
                  <input disabled type="text" name="CurrentAddress1_Disabled" id="CurrentAddress1_Disabled" value="875" style="width:320px;background-color:#F4F4F4;"/>
                  <input type="hidden" name="CurrentAddress1" id="CurrentAddress1" value="875 Eglinton Avenue West, Suite 210" />
                  </td>

                  <td class="text_box">&nbsp;</td>

                  <td class="text_box">
	                  <input disabled type="text" name="Street1_Disabled" id="Street1_Disabled" value="Eglinton Avenue West" style="width:320px;background-color:#F4F4F4;"/>
                  	<input type="hidden" name="Street1" id="Street1" value="Eglinton Avenue West" />
                  
                  </td>

                </tr>

                <tr>

                  <td class="text">Apt. / app.</td>

                  <td class="text">&nbsp;</td>

                  <td class="text">Municipality / municipalit??</td>

                </tr>

                <tr>

                  <td class="text_box">
                  	<input disabled type="text" name="Apt1_Disabled" id="Apt1_Disabled" value="Suite 210" style="width:320px;background-color:#F4F4F4;"/>
                  	<input type="hidden" name="Apt1" id="Apt1" value="Suite 210" />
                  </td>

                  <td class="text_box">&nbsp;</td>

                  <td class="text_box">
                  	<input disabled type="text" name="Municipality1_Disabled" id="Municipality1_Disabled" value="Toronto" style="width:320px;background-color:#F4F4F4;"/>
                  	<input type="hidden" name="Municipality1" id="Municipality1" value="Toronto" />
                  </td>

                </tr>

                <tr>

                  <td class="text">Province</td>

                  <td class="text">&nbsp;</td>

                  <td class="text">Postal Code / code postal</td>

                </tr>

                <tr>

                  <td class="text_box">
                  	<input disabled type="text" name="Province1_Disabled" id="Province1_Disabled" value="Ontario" style="width:320px;background-color:#F4F4F4;"/>
                  	<input type="hidden" name="Province1" id="Province1" value="Ontario" />
                  </td>

                  <td class="text_box">&nbsp;</td>

                  <td class="text_box">
                  	<input disabled type="text" name="PostalCode1_Disabled" id="PostalCode1_Disabled" value="M6C 3Z9" style="width:320px;background-color:#F4F4F4;"/>
                  	<input type="hidden" name="PostalCode1" id="PostalCode1" value="M6C 3Z9" />
                  </td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td align="center"><label>

              <input type="hidden" name="submit"  id="submit"/>

              <input type="submit" name="button" id="button" value="Submit" onclick="return ValidateFields();"/>

              </label></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

        </table>

      </form></td>

  </tr>

</table>

</div>

</body>

</html>

