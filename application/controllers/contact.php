<?php


/**
	Sends Email with GMail
*/

class contact extends CI_Controller{
	function index(){
		$this->load->helper('form');
			$data['main_content']='contact/contact_form';
			$this->load->view('includes/template', $data);
	}
	function send(){
		
		$this->load->library('form_validation');
		
		//field name, error message, validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		
		if($this->form_validation->run()==FALSE){
			$data['main_content']='contact/contact_form';
			$this->load->view('includes/template', $data);
		}
		else
		{
				//validation has passed, now send email
				
				$name = $this->input->post('name');
				$toEmail = $this->input->post('email');
				$phone = $this->input->post('phone');
				$subject = $this->input->post('subject');
				$message = "Email from TTS: " . $this->input->post('message');
				
				$this->load->library('email');
				
				$this->email->set_newline("\r\n");
				$this->email->from($toEmail, $name);
				$this->email->to($this->config->item('email_email'));
				$this->email->subject($subject);
				$this->email->message($message);

				if($this->email->send()){
				$data['main_content']='contact/contact_submit';
				$this->load->view('includes/template', $data);
				//Now the fun: insert into database
				
				$this->load->model('contact_model');
				$this->contact_model->insert_email_into_table($name, $toEmail, $phone, $subject, $message);
				
				
				}
				else{
					show_error($this->email->print_debugger());
				}
		}
	}
}