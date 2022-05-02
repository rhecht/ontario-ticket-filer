<?php

class Site extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->is_logged_in();
	}
	
	function index()
	{
		/*
		$this->load->model('site_model');
		$data['records']=$this->site_model->getAll();
		$this->load->view('home', $data);
		*/
		
		$data=array();
		//$this->load->view('options_view');
		
		if($query = $this->site_model->get_records())
		{
			$data['records']=$query;
		}
		
		$this->load->view('options_view', $data);
	}

	function create(){
			$data=array(
				'site_title' => $this->input->post('title'),
				'site_content' => $this->input->post('content')
			);
			
			$this->site_model->add_record($data);
			$this->index();
	}

	function delete(){
			$data=array(
				'site_id' => $this->uri->segment(3),
				'date_deleted' => date('m-d-Y g:i a')
			);
			
			$this->site_model->delete_row($data);
			$this->index();
	}
	
	
	function members_area(){
		$data['main_content'] = 'members_area';
		$this->load->view('includes/template', $data);

	}
	
	function is_logged_in(){
		$is_logged_in= $this->session->userdata('is_logged_in');
		
		if(!isset($is_logged_in) || $is_logged_in!=true ){
			echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';
			die();
		}
	}


}
