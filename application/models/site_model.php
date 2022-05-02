<?php

 class Site_model extends CI_Model{

	function getAll(){
		
		 $this->db->select('site_id, site_title');
		 $this->db->from('t_site');
		 $this->db->where('site_id', 2);
		 $q=$this->db->get();
		 //$q=$this->db->get('t_site');
		 
		 if($q->num_rows()>0){
			 
			 foreach($q->result() as $row){
				 $data[]=$row;
			}
			
			return $data;
		}

	 }
	 
	 function get_records(){
		 $query= $this->db->get('t_site');
		 return $query->result();
	}
	
	function add_record($data)
	{
		$this->db->insert('t_site', $data);
		return;
	}
	
	function update_record($data){
		$this->db->where('id', 1);
		$this->db->update('t_site', $data);
	}
	
	function delete_row($data){
		$this->db->where('site_id', $this->uri->segment(3));
		
		//Very dangerous!
		//$this->db->delete('data');
		
		$this->db->update('t_site', $data);
	}
	 
 }