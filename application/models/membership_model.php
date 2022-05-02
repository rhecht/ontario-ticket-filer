<?php

class Membership_model extends CI_Model{
	function validate(){
		//access database

		$this->db->where('user_name', strtolower($this->input->post('username')) );
		$this->db->where('user_password', md5($this->input->post('password')));
		//find table
		$query=$this->db->get('t_users');
		
		//If one row was returned then we know that there is a record and the member exists and we can create a session.
		if($query->num_rows==1){
			return true;
		}
	}
	
	function check_if_user_exists($username){
		//access database

		//$this->db->where('user_name', strtolower($this->input->post('username')) );
		$this->db->where('user_name', strtolower($username) );
		
		
		//find table
		$query=$this->db->get('t_users');
		
		//If one row was returned then we know that there is a record and the member exists.
		if($query->num_rows==1){
			return true;
		}

	}

	function get_more_member_info($username){
		
		$data=array();

		 $this->db->select('user_id, user_name, user_fname, user_lname, user_email_addr');
		 $this->db->from('t_users');
		 $this->db->where('user_name', $username);
		 $q_user=$this->db->get();

		 if($q_user->num_rows()>0){
				foreach ($q_user->result_array() as $row)
				{
					$data['user_id']=$row['user_id'];
					$data['user_name']=$row['user_name'];
					$data['user_fname']=$row['user_fname'];
					$data['user_lname']=$row['user_lname'];
					$data['user_email_addr']=$row['user_email_addr'];
				}
		  }
		return $data;
	}
	
	function get_user_fancyname_info($user_id){
		$data=array();

		 $this->db->select('user_id, user_name, user_fname, user_lname, user_email_addr');
		 $this->db->from('t_users');
		 $this->db->where('user_id', $user_id);
		 $q_user=$this->db->get();

		 if($q_user->num_rows()>0){
				foreach ($q_user->result_array() as $row)
				{
					$data['user_id']=$row['user_id'];
					$data['user_name']=$row['user_name'];
					$data['user_fname']=$row['user_fname'];
					$data['user_lname']=$row['user_lname'];
					$data['user_email_addr']=$row['user_email_addr'];
				}
		  }		
		return $data;
	}
	
	function create_member(){
			$new_member_insert_data = array(
			'user_fname' => $this->input->post('first_name'),
			'user_lname' => $this->input->post('last_name'),
			'user_email_addr' => $this->input->post('email_address'),
			'user_name' => $this->input->post('username'),
			'user_password' => md5($this->input->post('password')),
			'user_dateadded' => date('Y-m-d H:i:s'),
		);
		
		$insert=$this->db->insert('t_users', $new_member_insert_data);
		return $insert;
	}
	
	function update_member($data){
		
		$user_id=$this->session->userdata('user_id');
		$ip_addr = $this->input->ip_address();

			$edit_member_data = array(
			'user_fname' => $this->input->post('first_name'),
			'user_lname' => $this->input->post('last_name'),
			'user_email_addr' => $this->input->post('email_address'),
			'user_name' => $this->input->post('username'),
			'user_datemodified' => date('Y-m-d H:i:s'),
		);

		//Check if password exists. If not then we will not update it.
		
		if($this->input->post('password')!=''){		
			$edit_member_data['user_password'] = md5($this->input->post('password'));
		}


		//$insert=$this->db->insert('t_users', $new_member_insert_data);
		$this->db->where('user_id', $user_id);
		$this->db->update('t_users', $edit_member_data);
		
		$this->insert_logs($user_id,  $ip_addr, $this->input->post('username'), 'Modified Info');
/*
			$logs_insert_data = array(
			'ul_user_id' => $user_id,
			'ul_ip_address' => $ip_addr,
			'ul_action_description' => 'User ' .$this->input->post('username'). ' Modified Info',			
			'ul_date_of_action' => date('Y-m-d H:i:s'),
		);
		$this->db->insert('t_users_logs', $logs_insert_data);
*/
}

/*==============================================
Lost Password Segment
==============================================*/
	function check_if_email_exists($email){
		//access database

		$this->db->where('user_email_addr', strtolower($email) );
		//find table
		$query=$this->db->get('t_users');
		
		//If one row was returned then we know that there is a record and the member exists.
		if($query->num_rows>=1){
			//Why not? Let's already get the user id!
			foreach ($query->result_array() as $row){
					$data['user_id']=$row['user_id'];
			}
			return $data;
		}
		else{
			return "";
		}

	}
	
	function insert_lost_password_key($user_id, $password_reset_key){
			$key_insert_data = array(
			'uprk_user_id' => $user_id,
			'uprk_key' => $password_reset_key,
			'uprk_date_added' => date('Y-m-d H:i:s'),
			'uprk_ip_added'=>$this->input->ip_address(),
			'uprk_active' => 1,
		);
		$this->db->insert('t_users_password_reset_keys', $key_insert_data);
	}





	function validate_user_id_key_combination($user_id_change, $key_change){
		$this->db->where('uprk_user_id', $user_id_change );
		$this->db->where('uprk_key', $key_change );
		$this->db->where('uprk_active', 1 );
		//find table
		$query=$this->db->get('t_users_password_reset_keys');
		
		//If one row was returned then we know that there is a record and the member exists.
		if($query->num_rows>=1){
			return true;
		}
		else{
			return false;
		}
	}



	function deactivate_password_reset_keys($user_id){
		$data=array(
					'uprk_active'=>0,
					'uprk_date_used'=> date('Y-m-d H:i:s'),
					'uprk_ip_used'=>$this->input->ip_address(),
				);
		$this->db->where('uprk_user_id', $user_id);
		$this->db->update('t_users_password_reset_keys', $data);
	}
	
	function insert_new_password($user_id, $password){
		$data=array(
					'user_password'=>md5($password),
					'user_datemodified'=> date('Y-m-d H:i:s'),
				);
		$this->db->where('user_id', $user_id);
		$this->db->update('t_users', $data);

		//Highly experimental - Get User Info
			//$username=$this->get_user_fancyname_info($user_id)[''];
			$fancy_info=$this->get_user_fancyname_info($user_id);
			
			$username=$fancy_info['user_name'];
			$ip_addr=$this->input->ip_address();
		
		$this->insert_logs($user_id,  $ip_addr, $username, 'Reset Password');
	}		
	//}
	
/*==============================================
End Lost Password Segment
==============================================*/


/*=================================================
	User Logs
=================================================*/

	function insert_logs($user_id,  $ip_addr, $username, $action){

			$logs_insert_data = array(
			'ul_user_id' => $user_id,
			'ul_ip_address' => $ip_addr,
			'ul_action_description' => 'User ' . $username . ' ' . $action,			
			'ul_date_of_action' => date('Y-m-d H:i:s'),
		);
		$this->db->insert('t_users_logs', $logs_insert_data);
	}
}