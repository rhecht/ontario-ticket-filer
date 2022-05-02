<?php

class Accounts extends CI_Controller{
	
	function index(){
		if($this->session->userdata('username')!=""){
			$data['page_title']='Accounts Panel';
			$data['main_content']='accounts/accounts_panel';
			$this->load->view('includes/template', $data);
		}
		else{
			redirect("accounts/login");
		}
	}


	function login(){
		if($this->session->userdata('username')!=""){
			redirect('tickets');
		}
		else{
			$data['page_title']='Login';
			$data['main_content']='accounts/login_form';
			$this->load->view('includes/template', $data);
		}
	}


/*
	Login/Logout/SIgnup
*/
	function validate_credentials(){

		$this->load->model('membership_model');
		$query=$this->membership_model->validate();
		
		if($query) //if user credentials validated
		{
			$uname=$this->input->post('username');
					
			if(!isset($uname)){
				$uname=$this->input->get('username', TRUE);				
			}
			
			$data = array(
			  'username' => $uname,
			  'is_logged_in' => true
			);
			
			//call the database for the friendly username (and other variables we may want)
			
			$moreStuff=$this->membership_model->get_more_member_info($data['username']);
			
			$data['friendly_name']=$moreStuff['user_fname'] . ' ' . $moreStuff['user_lname'];
			$data['user_id']=$moreStuff['user_id'];
			
			$this->session->set_userdata($data);
			//redirect('site/members_area');
			redirect('tickets');
		}
		else{
			$this->index();
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		//redirect('site/members_area');
		redirect('accounts');
	}
	
	function create_member()
	{
		$this->load->library('form_validation');
		//field name, error message, validation rules
		
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required' );
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required' );
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email' );
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[4]' );
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]' );
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]' );

		if($this->form_validation->run()==FALSE){
			$this->signup();
		}
		else{

			/*
				This is the part where we verify if the email address exists in the system.
				If not, then signup. If so, then display error message.
			*/
			$this->load->model('membership_model');
			$query=$this->membership_model->check_if_user_exists($this->input->post('username'));
			
			if($query){
				//if user credentials validated, then we cannot create the account, rather generate an error message.
					$data['page_title']='Signup Form';
					$data['main_content'] = 'accounts/signup_form';
					$data['errorMsg']=$this->config->item('account_already_exists');
					$data['form_submit'] = 'accounts/create_member';
					$this->load->view('includes/template', $data);
			}
			else{
				//Create new row in database
				if($query=$this->membership_model->create_member()){
					$data['page_title']='Signup Successful';
					$data['main_content'] = 'accounts/signup_successful';
					
					//Set session marker as the person just signed up.
					//Or, just redirect
					redirect('tickets/validate_credentials/?uname=' . $this->input->post('username'));
					//$this->load->view('includes/template', $data);
				}
				else{
					$data['page_title']='Signup Form';
					$data['main_content'] = 'accounts/signup_form';
					$data['form_submit'] = 'accounts/create_member';
					$this->load->view('includes/template', $data);
				}
			}
		}
	}
/*
	End Login/Logout
	
	Sign Up Page Form
*/
	function signup(){
		$data['page_title']='Create an Account';
		$data['main_content'] = 'accounts/signup_form';
		$data['form_submit'] = 'accounts/create_member';
		$this->load->view('includes/template', $data);		
	}
/*
	Lost Password? Tsk tsk.....
*/
	function lost_password(){
		//display form with just the email address field
		//$data['page_title']='Lost Your Password? Tsk Tsk....';
		$data['page_title']='Lost Your Password?';
		$data['main_content'] = 'accounts/lost_password/lost_password_email_validate_form';
		$data['form_submit'] = 'accounts/lost_password_submit';
		$this->load->view('includes/template', $data);	
		
	}
	function lost_password_submit(){
		
		$this->load->model('membership_model');
		
		//first check to see if the email exists
			$email_exists=$this->membership_model->check_if_email_exists($this->input->post('email'));			

		//If it exists, then do the following:
			//echo $email_exists;
			if($email_exists!=""){				
			//Get User ID associated with email
				$user_id=$email_exists['user_id'];
				//echo $user_id;
			//generate password	key
				$password_reset_key=rand(1000000, 9999999);
			//construct dynamic URL
				$url=$this->config->item('base_url'). "index.php/accounts/lost_password_new_password/user/" . $user_id . "/key/" . $password_reset_key;

			//Not done yet:
			//Prepare Email Template


				$name = $this->input->post('email');
				$toEmail = $this->input->post('email');
				$phone = '';
				$subject = "Ticket Time Saver Password Reminder";
				$message = "Your Password Reset Link is: " . $url;
				
				$this->load->library('email');
				
				$this->email->set_newline("\r\n");
				$this->email->from($this->config->item('email_email'), 'Ticket Time Saver');
				$this->email->to($toEmail, $name);
				$this->email->subject($subject);
				$this->email->message($message);

				//Send the message
				if($this->email->send()){

					//insert password reset key into lost password keys table
						$this->membership_model->insert_lost_password_key($user_id, $password_reset_key);				


					//Now the fun: insert into database
					$this->load->model('contact_model');
					//$this->contact_model->insert_email_into_table($name, $toEmail, $phone, $subject, $message);
	
					//Then display text.
					$data['page_title']='A Reset Link Has Been Emailed to You';
					$data['main_content'] = 'accounts/lost_password/lost_password_email_validate_form';
					$data['form_submit'] = 'accounts/lost_password_submit';
					$data['reset_message']=$this->config->item('new_password_sent');
					//email dynamic URL	to email address
				}
				else{
					$data['page_title']='There was an error in the processing.';
					$data['main_content'] = 'accounts/lost_password/lost_password_email_validate_form';
					$data['form_submit'] = 'accounts/lost_password_submit';
					$data['reset_message']=$this->config->item('new_password_sent');	

					show_error($this->email->print_debugger());
				}
			}
			else{
				//If it doesn't exist, then display a message saying so, and a link to create account
				$data['page_title']='A Reset Link Has Not Been Emailed to You';
				$data['main_content'] = 'accounts/lost_password/lost_password_email_validate_form';
				$data['form_submit'] = 'accounts/lost_password_submit';
				$data['reset_message']="no form submission!";
			}
			$this->load->view('includes/template', $data);	
	}
	function lost_password_new_password(){
		
		$this->load->model('membership_model');
		
		//form to enter new password
		$data['page_title']='Reset Your Password';
		$data['user_id_change']=$this->uri->segment(4);
		$data['key_change']=$this->uri->segment(6);
		
		//Check if user ID and Key match
		
		$keycheck=$this->membership_model->validate_user_id_key_combination($data['user_id_change'], $data['key_change']);
		
		if($keycheck){
		//If they do, then display the form
			$data['main_content'] = 'accounts/lost_password/lost_password_new_password_form';
			$data['form_submit'] = 'accounts/lost_password_new_password_submit';
		}
		else{
		//If not, then display error message
			$data['main_content'] = 'accounts/lost_password/lost_password_new_password_invalid_key';
		}
		$this->load->view('includes/template', $data);

	}
	function lost_password_new_password_submit(){
		$this->load->model('membership_model');
		//Once new password is entered, validate if it's the right amount of characters or not.
		
		//If the right amount of characters is entered, do the following
			//Deactivate all other reset keys
			$this->membership_model->deactivate_password_reset_keys($this->input->post('user_id'));
			
			//Insert new password
			$new_password=$this->input->post('password');
			
			$this->membership_model->insert_new_password($this->input->post('user_id'), $this->input->post('password'));
			
			//Display Success message with Login URL.
			$data['main_content'] = 'accounts/lost_password/lost_password_new_password_success';
			$this->load->view('includes/template', $data);	
		
		//Else
			//generate error message that password entered is invalid on the new password page.
			
			//re-generate password reset URL
			
			//redirect back to that page
	}
	


/*==================================================================
//Edit Account if user so wishes so
==================================================================*/

	function account_edit(){
		
		$this->load->model('membership_model');
		
		
		$data['page_title']='Edit Account Info';
		$data['main_content'] = 'accounts/signup_form';
		$data['form_submit'] = 'accounts/account_edit_submit';
		$username=$this->session->userdata('username');
		
		$data2=$this->membership_model->get_more_member_info($username);
		
		foreach($data2 as $key=>$value){
			$data[$key]=$value;
		}		
		$this->load->view('includes/template', $data);
	}

	function account_edit_submit(){

		$this->load->library('form_validation');
		//field name, error message, validation rules
		
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required' );
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required' );
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email' );
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[4]' );
		$this->form_validation->set_rules('password', 'Password', 'trim' );
		$this->form_validation->set_rules('password2', 'Password Confirmation', '' );

		if($this->form_validation->run()==FALSE){
			//If the form validation does not go through, go back to the edit form
			$this->account_edit();
		}
		else{
			/*
				This is the part where we verify if the email address exists in the system.
				If not, then signup. If so, then display error message.
			*/
			$this->load->model('membership_model');
			//Call Session Username
			$username=$this->input->post('username');
			$query=$this->membership_model->check_if_user_exists($username);
			if($query){
				//if user credentials validated, then we can edit the account.
					$this->membership_model->update_member($username);
					$data['page_title']='Account has been edited';					
					$data['main_content'] = 'accounts/updated_successful';
					$data['form_submit'] = 'accounts/account_edit_submit';
					$data['errorMsg']='Your account has been updated';
					$this->load->view('includes/template', $data);
				//if not, generate an error message
			}
			else{
				$data['errorMsg']='Your account could not be updated.';
				$this->load->view('includes/template', $data);
			}
		}
	}

/*==================================================================
// End Edit Account
==================================================================*/


/*
    //Is the user logged in?
	
	function is_logged_in(){
		
		if(!(isset($_SESSION['is_logged_in']))){
			$_SESSION['is_logged_in']= $this->session->userdata('is_logged_in');
		}
		$is_logged_in=$_SESSION['is_logged_in'];
		
		if(!isset($is_logged_in) || $is_logged_in!=true ){
		$data['main_content'] = 'accounts/permission_denied_view';
		$this->load->view('includes/template', $data);

			//die();
		}
	}
*/
}