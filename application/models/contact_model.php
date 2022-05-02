<?php

 class Contact_model extends CI_Model{

	function insert_email_into_table($fromName, $fromEmail, $phone, $subject, $message, $form_type='Contact Form'){
			$email_insert_data = array(
			'email_subject' => $subject,
			'email_message' => $message,
			'email_date_sent' => date('Y-m-d H:i:s'),
			'email_from_name' => $fromName,
			'email_from_email' =>$fromEmail,
			'email_form_type' => $form_type,
			'email_ip_address' => $this->input->ip_address(),
		);
		
		$insert=$this->db->insert('t_emails', $email_insert_data);

	}
	 
 }