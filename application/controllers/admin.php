<?php

class Admin extends CI_Controller{
	function index()
	{
			$data['main_content'] = 'admin/list';
			$this->load->view('admin/includes/template', $data);
	}

	function login(){
			$data['main_content'] = 'admin/login';
			$this->load->view('admin/includes/template', $data);
	}	

	/*===============================================================================
		Tickets Section
	===============================================================================*/	

	
	function manage_tickets(){
			
			$data=$this->admin_model->tickets_get_all();
			
			$data['title']='Tickets Panel';
			$data['main_content'] = 'admin/list';
			$data['edit_path'] = 'admin/edit_ticket';
			$data['delete_path'] = 'admin/delete_ticket';

			$data['display']['add']=false;
			$data['display']['edit']=true;
			$data['display']['delete']=true;


			$this->load->view('admin/includes/template', $data);
	}	
	function edit_ticket(){
		$id=$this->uri->segment(3);
		
		
		
		$data=$this->admin_model->tickets_get_form_info($id);
		$data['title']='Edit Ticket';
		$data['main_content'] = 'admin/form';
		$data['form_submit'] = 'edit_ticket_submit';
		$this->load->view('admin/includes/template', $data);
	}
	function edit_ticket_submit(){
		$id=$this->input->post('ticket_id');
		//echo "ID: " . $id;
		if($this->admin_model->tickets_update($id)==false){
			redirect('admin/edit_ticket/'.$id.'?submit=err');
		}
		else{
			redirect('admin/edit_ticket/'.$id.'?submit=success');
		}
	}

	function delete_ticket(){
		$id=$this->uri->segment(3);
		if($this->admin_model->tickets_delete($id)==false){
			redirect('admin/manage_tickets/'.$id.'?submit=err');
		}
		else{
			redirect('admin/manage_tickets/'.$id.'?submit=success');
		}
	}
	/*===============================================================================
		End Edit Ticket
	===============================================================================*/
	/*===============================================================================
		Edit Ticket Prices
	===============================================================================*/	

	function manage_ticket_prices(){
			$data=$this->admin_model->ticket_prices_get_all();
			$data['title']='Ticket Prices Panel';
			$data['main_content'] = 'admin/list';
			$data['edit_path'] = 'admin/edit_ticket_price';
			$data['delete_path'] = 'admin/delete_ticket_price';
			$data['add_path']= 'admin/add_ticket_price';
			
			$data['display']['add']=false;
			$data['display']['edit']=true;
			$data['display']['delete']=false;

			$this->load->view('admin/includes/template', $data);


	}
	
	function edit_ticket_price(){
		$id=$this->uri->segment(3);
		$data=$this->admin_model->ticket_price_get_form_info($id);
		$data['title']='Edit Ticket Price';
		$data['main_content'] = 'admin/form';
		$data['form_submit'] = 'edit_ticket_price_submit';
		$this->load->view('admin/includes/template', $data);
	}
	function edit_ticket_price_submit(){
		$id=$this->input->post('ttt_id');
		//echo "ID: " . $id;
		if($this->admin_model->ticket_price_update($id)==false){
			redirect('admin/edit_ticket_price/'.$id.'?submit=err');
		}
		else{
			redirect('admin/edit_ticket_price/'.$id.'?submit=success');
		}
	}

	/*===============================================================================
		End Edit Ticket Prices
	===============================================================================*/	

	/*===============================================================================
		Users Section
	===============================================================================*/	
	
	function manage_users(){
			
			$data=$this->admin_model->users_get_all();
			$data['title']='Users Panel';
			$data['main_content'] = 'admin/list';
			$data['edit_path'] = 'admin/edit_user';
			$data['delete_path'] = 'admin/delete_user';
			$data['add_path']= 'admin/add_user';
			
			$data['display']['add']=true;
			$data['display']['edit']=true;
			$data['display']['delete']=true;
			
			// print_r($data['vars']);


			$this->load->view('admin/includes/template', $data);
	}
	
	function add_user(){

		//Model User Add
		$data=$this->admin_model->user_get_data_to_insert();
		$data['title']='Add User';
		$data['main_content'] = 'admin/form_add';
		$data['form_submit'] = 'add_user_submit';
		$this->load->view('admin/includes/template', $data);		

	}

	function add_user_submit(){

		//Get User Info for Form
		$data=$this->admin_model->user_get_data_to_insert();
		
		$data['validate']=$this->admin_model->users_add();
		
		if($data['validate']){
			$data['submit']="success";
		}
		else{
			$data['submit']="err";
		}
		redirect('admin/add_user/'.$id.'?submit=' . $data['submit']);
	}

	
	function edit_user(){
		$id=$this->uri->segment(3);
		
		//Get User Info for Form
		$data=$this->admin_model->users_get_form_info($id);
		
		//Get User Tickets
		$data['data2Display']=$this->admin_model->tickets_get('', $id);
		$data['edit_path'] = 'admin/edit_ticket';
		$data['delete_path'] = 'admin/delete_ticket';

		$data['title']='Edit User';
		$data['main_content'] = 'admin/form';
		$data['form_submit'] = 'edit_user_submit';
		$this->load->view('admin/includes/template', $data);		
	}
	function edit_user_submit(){
		$id=$this->input->post('user_id');
		//echo "ID: " . $id;
		if($this->admin_model->users_update($id)==false){
			redirect('admin/edit_user/'.$id.'?submit=err');
		}
		else{
			redirect('admin/edit_user/'.$id.'?submit=success');
		}
	}
	
	function delete_user(){
		$id=$this->uri->segment(3);
		if($this->admin_model->users_delete($id)==false){
			redirect('admin/manage_users/'.$id.'?submit=err');
		}
		else{
			redirect('admin/manage_users/'.$id.'?submit=success');
		}
	}
	/*===============================================================================
		End Users Section
	===============================================================================*/




	/*===============================================================================
		Admins Section
	===============================================================================*/	
	
	function manage_admins(){
			
			$data=$this->admin_model->admins_get_all();
			$data['title']='Admins Panel';
			$data['main_content'] = 'admin/list';
			$data['edit_path'] = 'admin/edit_admin';
			$data['delete_path'] = 'admin/delete_admin';
			$data['add_path']= 'admin/add_admin';
			
			$data['display']['add']=true;
			$data['display']['edit']=true;
			$data['display']['delete']=true;
			
			// print_r($data['vars']);


			$this->load->view('admin/includes/template', $data);
	}
	
	function add_admin(){

		//Model admin Add
		$data=$this->admin_model->admin_get_data_to_insert();
		$data['title']='Add admin';
		$data['main_content'] = 'admin/form_add';
		$data['form_submit'] = 'add_admin_submit';
		$this->load->view('admin/includes/template', $data);		

	}

	function add_admin_submit(){

		//Get admin Info for Form
		$data=$this->admin_model->admin_get_data_to_insert();
		
		$data['validate']=$this->admin_model->admins_add();
		
		if($data['validate']){
			$data['submit']="success";
		}
		else{
			$data['submit']="err";
		}
		redirect('admin/add_admin/'.$id.'?submit=' . $data['submit']);
	}

	
	function edit_admin(){
		$id=$this->uri->segment(3);
		
		//Get admin Info for Form
		$data=$this->admin_model->admins_get_form_info($id);
		
		$data['title']='Edit Admin';
		$data['main_content'] = 'admin/form';
		$data['form_submit'] = 'edit_admin_submit';
		$this->load->view('admin/includes/template', $data);		
	}

	function edit_admin_submit(){
		$id=$this->input->post('admin_id');
		//echo "ID: " . $id;
		if($this->admin_model->admins_update($id)==false){
			redirect('admin/edit_admin/'.$id.'?submit=err');
		}
		else{
			redirect('admin/edit_admin/'.$id.'?submit=success');
		}
	}
	
	function delete_admin(){
		$id=$this->uri->segment(3);
		if($this->admin_model->admins_delete($id)==false){
			redirect('admin/manage_admins/'.$id.'?submit=err');
		}
		else{
			redirect('admin/manage_admins/'.$id.'?submit=success');
		}
	}
	/*===============================================================================
		End Admins Section
	===============================================================================*/










	/*===============================================================================
		Content Section
	===============================================================================*/	
	
	function manage_content(){
			
			$data=$this->admin_model->content_get_all();
			$data['title']='Content Panel';
			$data['main_content'] = 'admin/list';
			$data['edit_path'] = 'admin/edit_content';
			$data['delete_path'] = 'admin/delete_content';
			$data['add_path']= 'admin/add_content';

			$data['display']['add']=true;
			$data['display']['edit']=true;
			$data['display']['delete']=false;


			$this->load->view('admin/includes/template', $data);
	}
	function add_content(){

		//Get User Info for Form
		$data=$this->admin_model->content_get_data_to_insert();
		$data['title']='Add Content';
		$data['main_content'] = 'admin/form_add';
		$data['form_submit'] = 'add_content_submit';
		$this->load->view('admin/includes/template', $data);		

	}

	function add_content_submit(){

		//Get User Info for Form
		$data=$this->admin_model->content_get_data_to_insert();
		
		$data['validate']=$this->admin_model->content_add();
		
		if($data['validate']){
			$data['submit']="success";
		}
		else{
			$data['submit']="err";
		}
		redirect('admin/edit_user/'.$id.'?submit=' . $data['submit']);
/*
		$data['title']='Add Content Panel';
		$data['main_content'] = 'admin/form_add';
		$data['form_submit'] = 'add_content_submit';
		$this->load->view('admin/includes/template', $data);		
*/		
	}
	function edit_content(){

		$id=$this->uri->segment(3);
		
		$data=$this->admin_model->content_get_form_info($id);
		
		$data['title']='Edit Content';
		$data['main_content'] = 'admin/form';
		$data['form_submit'] = 'edit_content_submit';
		$this->load->view('admin/includes/template', $data);


	}
	function edit_content_submit(){
		$id=$this->input->post('tc_id');
		//echo "ID: " . $id;
		if($this->admin_model->content_update($id)==false){
			redirect('admin/edit_content/'.$id.'?submit=err');
		}
		else{
			redirect('admin/edit_content/'.$id.'?submit=success');
		}
		
	}

	/*===============================================================================
		End Content Section
	===============================================================================*/	
	
	function view_emails(){
			
			$data=$this->admin_model->emails_view_all();
			$data['title']='View Emails';
			$data['main_content'] = 'admin/list';
			$data['edit_path'] = 'admin/edit_email';
			$data['delete_path'] = 'admin/delete_email';

			$data['display']['add']=false;
			$data['display']['edit']=false;
			$data['display']['delete']=false;


			$this->load->view('admin/includes/template', $data);
	}
	function view_users_logs(){
			
			$data=$this->admin_model->logs_view_all();

			$data['title']='View User Logs';
			$data['main_content'] = 'admin/list';
			$data['edit_path'] = 'admin/edit_userlogs';
			$data['delete_path'] = 'admin/delete_userlogs';

			$data['display']['add']=false;
			$data['display']['edit']=false;
			$data['display']['delete']=false;


			$this->load->view('admin/includes/template', $data);

	}
	


}