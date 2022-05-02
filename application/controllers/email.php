<?php


/**
	Sends Email with GMail
*/

class Email extends CI_Controller{
	function index(){
		$this->load->helper('form');
		$this->load->view('newsletter');
	}
	function send(){
		
		$this->load->library('form_validation');
		
		//field name, error message, validaiton rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		
		if($this->form_validation->run()==FALSE){
			$this->load->view('newsletter');
		}
		else
		{
				//validation has passed, now send email
				
				$name = $this->input->post('name');
				$email = $this->input->post('email');

				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->from('rhecht@gmail.com', 'Rafi Hecht');
				$this->email->to($email);
				$this->email->subject('this is an email test');
				$this->email->message('It is working. Great!');
				
				$path= $this->config->item('server_root');
				
				$file = $path . '/ttsfiler/attachments/newsletter1.txt';
				
				$this->email->attach($file);
				
				if($this->email->send()){
					//echo 'Your email was sent, yay!';
					$this->load->view('signup_confirmation_view');
				}
				else{
					show_error($this->email->print_debugger());
				}


		}
	}
}