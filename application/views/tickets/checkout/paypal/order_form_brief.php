<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="hechtr@gmail.com">
<input type="hidden" name="currency_code" value="US">


<!-- Add records here -->

<?php
	if(isset($records)):foreach($records as $row1):
		foreach($row1 as $row):
?>

<input type="hidden" name="item_name_<?php echo $row->ticket_id; ?>" value="<?php echo $row->ticket_type_name; ?>: Ticket ID # <?php echo $row->ticket_id; ?>">
<input type="hidden" name="amount_<?php echo $row->ticket_id; ?>" value="<?php echo $row->price; ?>">
    <?php
			endforeach;
    	endforeach;
	?>
<?php else: ?>
<h2>No records were returned</h2>
<?php
	endif;
?>

<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>