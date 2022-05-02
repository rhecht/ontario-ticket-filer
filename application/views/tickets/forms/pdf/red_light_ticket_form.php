<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Red Light Ticket</title>

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
	width:400px;
}

div.inputPDF{
	background: #FFFFE1;
	display:inline-block;
	padding-left:10px;
	border-bottom:1px solid #000;
	width:320px;
}

</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/calendar.css">


</head>

<body>

<div class="notice_to_appear">

<table border="0" cellspacing="0" cellpadding="0" align="center">

  <tr>

    <td><form id="redlight" name="redlight" method="post" action="form_notice_to_appear_submit">

        </td>

          </tr>

          <tr>

            <td align="center"><hr /></td>

          </tr>

          <tr>

            <td align="center" style="font-size:14px;"><strong>NOTICE OF INTENTION TO APPEAR<br />

              AVIS D’INTENTION DE COMPARAÎTRE</strong></td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td width="21%" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">Ontario Court Of Justice <br />

                    Cour de justice de l’Ontario <br />

                    PROVINCE OF ONTARIO <br />

                    Province de l’Ontario </td>

                  <td width="58%">&nbsp;</td>

                  <td width="21%" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><i>Form / Formule 7</i></strong><br />

                    Provincial Offences Act<br />

                    Loi sur les infractions provinciales<br />

                    Reg. / Règl. 950</td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td align="center">&nbsp;</td>

          </tr>

          <tr>

            <td align="center">Please Print Clearly / Veuillez écrire clairment en lettres moulées</td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td>TAKE NOTICE THAT I <div class="inputPDF" style="width:75%;"><?php echo $ttrd_fullname; ?></div>
			</td>

          </tr>

          <tr>

            <td>VEUILLEZ PRENDRE AVIS QUE JE, SOUSSIGNÉ(E) (defendant’s name / nom du défendeur/de la défenderesse) Of </td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >

                <tr>

                  <td width="40%" class="text">Current address / adresse actuelle</td>

                  <td width="4%" class="text">&nbsp;</td>

                  <td class="text">Street / rue</td>

                </tr>

                <tr>

                  <td colspan="3" class="text_box">
                  	<div class="inputPDF" style="width:100%;"><?php echo $ttrd_address; ?></div>
                  </td>

                </tr>

                <tr>

                  <td class="text">Apt. / app.</td>

                  <td class="text">&nbsp;</td>

                  <td class="text">Municipality / municipalité</td>

                </tr>

                <tr>

                  <td class="text_box"><div class="inputPDF"><?php echo $ttrd_apt; ?></div></td>

                  <td class="text_box">&nbsp;</td>

                  <td class="text_box"><div class="inputPDF"><?php echo $ttrd_municipality; ?></div></td>

                </tr>

                <tr>

                  <td class="text">Province</td>

                  <td class="text">&nbsp;</td>

                  <td class="text">Postal Code / code postal</td>

                </tr>

                <tr>

                  <td class="text_box"><div class="inputPDF"><?php echo $ttrd_province_state; ?></div></td>

                  <td class="text_box">&nbsp;</td>

                  <td class="text_box"><div class="inputPDF"><?php echo $ttrd_postal_zip_code; ?></div></td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">

                <tr>

                  <td width="69%" rowspan="2">wish to give notice of my intention to appear in court to enter a plea of not guilty at the time and place <br />

                  set for the trial respecting the charge set out in the Offence Notice or Parking Infraction Notice</td>

                  <td height="20">ICON: 

                  <div class="inputPDF" style="width:50px;"><?php echo $ttrd_icon; ?></div></td>

                </tr>

                <tr>

                  <td width="31%">

                    <div class="inputPDF" style="width:50px;"><?php echo $ttrd_offence_num; ?></div>

                    <br />

                    (offence number / numéro d’infaction)</td>

                </tr>

                <tr>

                  <td>désire aviser de mon intention de comparaître devant le tribunal pour inscrire un plaidoyer de non-culpabilité à l’heure et au lieu prévus pour le procès en réponse à l’accusation énoncée dans l’avis d’infraction ou l'avis d'infraction de stationnement</td>

                  <td><label>

                    <div class="inputPDF" style="width:182px;"><?php echo $ttrd_offence_date; ?></div>

                    </label>

                    <br />

                    (offence date / date de l’infraction)</td>

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

                  <td width="51%"><i>POUR TOUTE INFRACTION NON VISÉE AU PARAGRAPHE 144 (18.1) DU CODE DE LA ROUTE, REMPLIR CETTE SECTION:</i></td>

                </tr>

                <tr>

                  <td>I intend to challenge the Provincial Offences Officer’s evidence. I request that the officer attend the trial</td>

                  <td><i>J’ai l’intention de contester la preuve de l’agent des infractions provinciales. Je demande que l’agent assiste au procès</i></td>

                </tr>

                <tr>

                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                      <tr>

                        <td width="76%">&nbsp;</td>

                        <td width="24%"><label>

                            <?php if ($ttrd_officer_attend_trial==0){ echo "&#10003;";} ?>

                          <strong>No / Non</strong></label></td>

                      </tr>

                    </table></td>

                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                      <tr>

                        <td width="61%"><?php if ($ttrd_officer_attend_trial==1){ echo "&#10003;";} ?>

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

                    <i>Si vous avez été accusé(e) d’une infraction visée au paragraphe 144 (18.1) du Code de la route (passage au feu rouge/propriétaire), l’article 205.20 du Code de la route prévoit que vous devez vous adresser au juge du procès si vous désirez obtenir la comparution de l’agent des infractions provinciales qui a délivré le procès-verbal d’infraction ou qui a certifié les photos qui seront présentées en preuve lors de votre procès.</i></td>

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

                    <?php if ($ttrd_intend_to_appear_in_court==0){}else{ echo "&#10003;"; } ?>

                    </label>

                    I intend to appear in court to enter a plea at the time and place set for the trial and I wish that it be held in the English language</td>

                  <td width="51%"><label>

                    <?php if ($ttrd_intend_to_appear_in_court_fr==0){}else{ echo "&#10003;"; } ?>

                    </label>

                    <i>J’ai l’intention de comparaître devant le tribunal pour inscrire un plaidoyer à l’heure et au lieu prévus pour le procès et je désire que le procès se déroule en français.</i></td>

                </tr>

                <tr>

                  <td>&nbsp;</td>

                  <td>&nbsp;</td>

                </tr>

                <tr>

                  <td>I request a

                    <label>

                    <div class="inputPDF"><?php echo $ttrd_languageinterpreter; ?></div></label>

                    </label>

                    language interpreter for the trial. (leave blank if inapplicable)</td>

                  <td><i>Je demande l’aide d’un interprète de langue

                    <label>

                    <div class="inputPDF"><?php echo $ttrd_fr_languageinterpreter; ?></div>

                    </label>

                    pour le procès. (À remplir s’il y a lieu)</i></td>

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

                  <td width="51%"><strong>Remarque:</strong> <i>Si vous omettez de<strong> prévenir</strong> le greffe du tribunal de tout <strong>changement d’adresse</strong>, vous pourriez ne pas recevoir d’importants avis (par ex., votre avis de procès). Vous pourriez être déclaré(e) coupable en votre absence si vous n’assistez pas au procès.</i></td>

                </tr>

                <tr>

                  <td><label>

                    <?php if ($ttrd_intend_to_appear_in_court==1){}else{ echo "&#10003;"; }?>

                    </label>

                    I intend to appear in court to enter a plea at the time and place set for the trial and I wish that it be held in the English language.<br /></td>

                  <td><label>

                    <?php if ($ttrd_intend_to_appear_in_court_fr==1){}else{ echo "&#10003;"; }?>

                    </label>

                    <i>J’ai l’intention de comparaître devant le tribunal pour inscrire un plaidoyer à l’heure et au lieu prévus pour le procès et je désire que le procès se déroule en français.</i></td>

                </tr>

                <tr>

                  <td><label>

                    <div class="inputPDF" style="width:350px;"><?php echo $ttrd_signature; ?></div>

                    <br />

                    </label>

                    (signature of defendant or representative / signature du défendeur/de la défenderesse ou du représentant/de la représentante)</td>

                  <td valign="top"><label>

                    <div class="inputPDF"><?php echo $ttrd_signature_date; ?></div>
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

                  <td colspan="3" class="text">Representative’s Name &amp; Address/ Nom et adresse du représentant/de la représentante</td>

                </tr>

                <tr>

                  <td colspan="3" class="text_box">
                  	<div class="inputPDF" style="width:85%;">Ticket Time Saver</div>
                  
                  </td>

                </tr>

                <tr>

                  <td width="40%" class="text">Current address / adresse actuelle</td>

                  <td width="4%" class="text">&nbsp;</td>

                  <td class="text">Street / rue</td>

                </tr>

                <tr>

                  <td class="text_box">
                  <div class="inputPDF" style="width:320px;">875 Eglinton Avenue West, Suite 210</div>
                  </td>

                  <td class="text_box">&nbsp;</td>

                  <td class="text_box">
	                  <div class="inputPDF" style="width:320px;">Eglinton Avenue West</div>
                  
                  </td>

                </tr>

                <tr>

                  <td class="text">Apt. / app.</td>

                  <td class="text">&nbsp;</td>

                  <td class="text">Municipality / municipalité</td>

                </tr>

                <tr>

                  <td class="text_box">
                  	<div class="inputPDF">Suite 210</div>
                  </td>

                  <td class="text_box">&nbsp;</td>

                  <td class="text_box">
                  	<div class="inputPDF">Toronto</div>
                  </td>

                </tr>

                <tr>

                  <td class="text">Province</td>

                  <td class="text">&nbsp;</td>

                  <td class="text">Postal Code / code postal</td>

                </tr>

                <tr>

                  <td class="text_box">
                  	<div class="inputPDF">Ontario</div>
                  </td>

                  <td class="text_box">&nbsp;</td>

                  <td class="text_box">
                  	<div class="inputPDF">M6C 3Z9</div>
                  </td>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td align="center"></td>

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

