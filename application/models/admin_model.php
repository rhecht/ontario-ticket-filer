<?php

 class Admin_model extends CI_Model{


/*======================================================
|	Tickets
======================================================*/

	function tickets_get_all(){

		  $data['titles']=array('Ticket ID',
		  						'Ticket Name',
								'Ticket Offence Date',
								'Ticket Type',
								'Ticket Type Name',
								'Ticket Booking Fee Status',
								'Ticket Booking Fee Status Name',
								'User ID',
								'Date Deleted',
								'Price',
								'Active',
		  );

		  
		  //Query: Get All Ticket Info
		 $this->db->select('ticket_id,
		 				ticket_name,
						ticket_offence_date,
						ticket_type,
						ticket_type_name,
						ticket_booking_fee_status,
						ticket_booking_fee_status_name,						
						user_id,
						date_deleted,
						price,
						active
						');
		 $this->db->from('vw_tickets');
		 //$where ="user_id = $user_id AND (date_deleted = '0' OR date_deleted = '')";
		 //$this->db->where($where);
		 $q=$this->db->get();
		 
		 if($q->num_rows()>0){
			 foreach($q->result() as $row){
				 $data['vars'][]=$row;
			}			
			return $data;
		}		
	}

	/*========================================================================
		Tickets Editing - Main Part
	==========================================================================*/


	function tickets_get($username='', $user_id=''){


		  $data['titles']=array('Ticket ID',
		  						'Ticket Name',
								'Ticket Offence Date',
								'Ticket Type',
								'Ticket Type Name',
								'Ticket Booking Fee Status',
								'Ticket Booking Fee Status Name',
								'User ID',
								'Date Deleted',
								'Price',
								'Active',
		  );

		//Query 1: First get User ID if username exists
		
		if($username!='' & $user_id==''){
			$user_id=$this->get_user_id_from_name($username);
		 }
		  
		  //Query 2: Get Ticket Info
		 $this->db->select('ticket_id,
		 				ticket_name,
						ticket_offence_date,
						ticket_type,
						ticket_type_name,
						ticket_booking_fee_status,
						ticket_booking_fee_status_name,						
						user_id,
						date_deleted,
						price,
						active
						');
		 $this->db->from('vw_tickets');
		 
		 $where='';
		 
		 if($user_id!=''){
		 $where="user_id = " .$user_id. " AND ";
		 }
		 $where.=" (date_deleted = '0' OR date_deleted = '')";
		 $this->db->where($where, NULL, FALSE);
		 $q=$this->db->get();
		 if($q->num_rows()>0){
			 foreach($q->result() as $row){
				 $data['vars'][]=$row;
			}			
			return $data;
		}		
	}

	function tickets_get_form_info($ticket_id){
		
		$data=array();
		  $data['titles']=array('ticket_id'=>'Ticket ID',
		  						'ticket_name'=>'Ticket Name',
								'ticket_offence_date'=>'Ticket Offence Date',
								'ticket_type'=>'Ticket Type',
								'Ticket Type Name',
								'ticket_booking_fee_status'=>'Ticket Booking Fee Status',
								'ticket_is_paid' => 'Is paid?',
								'ticket_booking_fee_status_name'=>'Ticket Booking Fee Status Name',
								'user_id'=>'User ID',
								'date_deleted'=>'Date Deleted',
								'active'=>'Active',
								'price'=>'Price',
		  );

		  //Query : Get Ticket Info
		 $this->db->select('ticket_id,
		 				ticket_name,
						ticket_offence_date,
						ticket_type,
						ticket_booking_fee_status,
						ticket_is_paid,
						user_id,
						date_deleted,
						active
						');
		 $this->db->from('t_tickets');
		 $this->db->where("ticket_id", $ticket_id);
		 $q=$this->db->get();
		 if($q->num_rows()>0){
			 foreach($q->result_array() as $row){
				 //Some variables will be made into regular values, some into arrays if there's a dropdown associated.
				 $data['vars']['ticket_id']=array($row['ticket_id'], 'hidden');
				 $data['vars']['ticket_name']=$row['ticket_name'];
				 $data['vars']['ticket_offence_date']=array($row['ticket_offence_date'], 'hidden');
				 $data['vars']['ticket_type']=$row['ticket_type'];


				 //Make the Ticket Booking Fee Status table a dropdown
				 $tbfs_details=$this->yes_or_no('dropdown');
				 $tbfs_details_vars_arr=$tbfs_details['vars'];
				 
				 $data['vars']['ticket_booking_fee_status']=array($row['ticket_booking_fee_status'], $tbfs_details_vars_arr);

				 //Make the Ticket Is Paid table a dropdown
				 $paid_ticket_details=$this->yes_or_no('dropdown');
				 $paid_ticket_details_vars_arr=$paid_ticket_details['vars'];

				 $data['vars']['ticket_is_paid']=array($row['ticket_is_paid'], $paid_ticket_details_vars_arr);
			 
				 //Make the Users table a dropdown
				 $users_details=$this->users_get_all('dropdown');
				 $users_details_vars_arr=$users_details['vars'];

				 $data['vars']['user_id']=array($row['user_id'], $users_details_vars_arr );
				 //$data['vars']['user_id']=$row['user_id'];
				 $data['vars']['date_deleted']=array($row['date_deleted'], 'hidden');
				 
				 $active_details=$this->yes_or_no('dropdown');
				 $active_details_vars_arr=$active_details['vars'];
				 $data['vars']['active']=array($row['active'], $active_details_vars_arr);
			}			
			return $data;
		}		
	}
	
	function tickets_update($ticket_id){
		
		//2012-09-04 - Where do the variables get called from??? -Rafi
		
		$data=array(
					'ticket_id'=>$ticket_id,
					'ticket_name'=>$this->input->post('ticket_name'),
					'ticket_offence_date'=>$this->input->post('ticket_offence_date'),
					'ticket_type'=>$this->input->post('ticket_type'),
					'ticket_booking_fee_status'=>$this->input->post('ticket_booking_fee_status'),
					'ticket_is_paid'=>$this->input->post('ticket_is_paid'),
					'user_id'=>$this->input->post('user_id'),
					'date_deleted'=>$this->input->post('date_deleted'),
					'active'=>$this->input->post('active'),
				);
		if($data['active']==1){
			$data['date_deleted']=NULL;
		}
			
		$this->db->where('ticket_id', $ticket_id);
		if($this->input->post('ticket_offence_date')!=''){
			$this->db->update('t_tickets', $data);
			//echo "hi there!";
			return true;
		}
		else{
			return false;
		}

	}
	function tickets_delete($ticket_id){
		$data=array(
					'ticket_id'=>$ticket_id,
					'date_deleted'=>date('Y-m-d H:i:s'),
					'active'=>0,
				);	
		$this->db->where('ticket_id', $ticket_id);
		$this->db->update('t_tickets', $data);

	}


	function tickets_details_update($ticket_id, $ticket_type_id){
		
	}
	
	/*========================================================================
		End Tickets Editing - Main Part
	==========================================================================*/

	/*======================================================
	|	Ticket Prices
	======================================================*/
	
		function ticket_prices_get_all(){
	
			  $data['titles']=array('Ticket Type ID',
									'Ticket Type Name',
									'Ticket Type Price',
									'Active',
			  );
	
			  
			  //Query: Get All Ticket Info
			 $this->db->select('ttt_id,
							ttt_type_name,
							ttt_price,
							ttt_active,
							');
			 $this->db->from('t_tickets_type');
			 //$where ="user_id = $user_id AND (date_deleted = '0' OR date_deleted = '')";
			 //$this->db->where($where);
			 $q=$this->db->get();
			 
			 if($q->num_rows()>0){
				 foreach($q->result() as $row){
					 $data['vars'][]=$row;
				}			
				return $data;
			}		
		}
		
		function ticket_price_get_form_info($ttt_id){

			$data=array();
			  $data['titles']=array('ttt_id'=>'Ticket Type ID',
									'ttt_type_name'=>'Ticket Type Name',
									'ttt_price'=>'Price',
									'ttt_active'=>'Active',
			  );
	
			  //Query : Get Ticket Info
			 $this->db->select('ttt_id,
							ttt_type_name,
							ttt_price,
							ttt_active,
							');
			 $this->db->from('t_tickets_type');
			 $this->db->where("ttt_id", $ttt_id);
			 $q=$this->db->get();
			 if($q->num_rows()>0){
				 foreach($q->result_array() as $row){
					 //Some variables will be made into regular values, some into arrays if there's a dropdown associated.
					 $data['vars']['ttt_id']=array($row['ttt_id'], 'hidden');
					 $data['vars']['ttt_type_name']=array($row['ttt_type_name'], 'hidden');
					 $data['vars']['ttt_price']=$row['ttt_price'];

					 $active=$this->yes_or_no('dropdown');
					 $active_vars_arr=$active['vars'];
	
					 $data['vars']['ttt_active']=array($row['ttt_active'], $active_vars_arr );
	
				}			
				return $data;
			}
		}
	function ticket_price_update($ttt_id){
		
		//2012-09-04 - Where do the variables get called from??? -Rafi
		
		$data=array(
					'ttt_id'=>$ttt_id,
					'ttt_type_name'=>$this->input->post('ttt_type_name'),
					'ttt_price'=>$this->input->post('ttt_price'),
					'ttt_active'=>$this->input->post('ttt_active'),
				);

		$this->db->where('ttt_id', $ttt_id);
		if(($this->input->post('ttt_type_name')!='') && ($this->input->post('ttt_active')!='')){
			$this->db->update('t_tickets_type', $data);
			//echo "hi there!";
			return true;
		}
		else{
			return false;
		}

	}


	/*======================================================
	|	End Ticket Prices
	======================================================*/

	
	//Get Booking Fee Status variables
	function ticket_booking_fee_status_get_all($form_type='dropdown'){
		  //Query: Get All User Info
		 $this->db->select('tbfs_id,
							 tbfs_name,		 
						');
		 $this->db->from('t_tickets_booking_fee_status');
		 $q=$this->db->get();
		 
		 if($q->num_rows()>0){
			 $count=0;
			 foreach($q->result_array() as $row){
				 
				 //If form type is a dropdown, then all I need here is the user ID and user name
				 if($form_type=='dropdown'){
					 $data['vars'][$count][0]=$row['tbfs_id'];
					 $data['vars'][$count][1]=$row['tbfs_name'];
					}
				$count++;
			}			
			return $data;
		}		

	}

/*========================================================================
	End Tickets Section
==========================================================================*/



	//Is paid? Get either "yes" or "no."
	function yes_or_no($form_type='dropdown'){
					 $data['vars'][0][0]=1;
					 $data['vars'][0][1]='Yes';
					 $data['vars'][1][0]='0';
					 $data['vars'][1][1]='No';					 
					 return $data;
	}

	//Is paid? Get either "yes" or "no."
	function active_inactive(){
		 $data['vars'][0][0]=1;
		 $data['vars'][0][1]='Active';
		 $data['vars'][1][0]='0';
		 $data['vars'][1][1]='Inactive';
		 return $data;
	}


/*======================================================
|	Users
======================================================*/

	function users_get_all($form_type=''){
		  $data=array();
		  $data['titles']=array('user_id'=>'User ID',
		  						'user_name'=>'Username',
								'user_fname'=>'First Name',
								'user_lname'=>'Last Name',
								'user_email_addr'=>'Email Address',
								'user_phone'=>'Phone Number',
								'user_dateadded'=>'Date Added',
								'user_datemodified'=>'Date Modified',
								'user_datedelete'=>'Date Deleted',
								'active'=>'Active',
		  );
		  
		  //Query: Get All User Info
		 $this->db->select('user_id,
		 				user_name,
						user_fname,
						user_lname,
						user_email_addr,
						user_phone,
						user_dateadded,						
						user_datemodified,
						user_datedelete,
						active
						');
		 $this->db->from('t_users');
		 $q=$this->db->get();
		 
		 if($q->num_rows()>0){
			 $count=0;
			 foreach($q->result_array() as $row){
				 
				 //If form type is a dropdown, then all I need here is the user ID and user name
				 if($form_type=='dropdown'){
					 $data['vars'][$count][0]=$row['user_id'];
					 $data['vars'][$count][1]=$row['user_name'] . " (" . $row['user_fname'] . " " . $row['user_lname'] .")";
					}
					else
				{
					 $data['vars'][$count]['user_id']=$row['user_id'];
					 $data['vars'][$count]['user_name']=$row['user_name'];
					 $data['vars'][$count]['user_fname']=$row['user_fname'];
					 $data['vars'][$count]['user_lname']=$row['user_lname'];
					 $data['vars'][$count]['user_email_addr']=$row['user_email_addr'];
					 $data['vars'][$count]['user_phone']=$row['user_phone'];
					 $data['vars'][$count]['user_dateadded']=$row['user_dateadded'];
					 $data['vars'][$count]['user_datemodified']=$row['user_datemodified'];
					 $data['vars'][$count]['user_datedelete']=$row['user_datedelete'];
					 $data['vars'][$count]['active']=$row['active'];
				 }
				//$data['vars'][]=$row;
				$count++;
			}			
			return $data;
		}		
	}	 

	function users_get_form_info($user_id){

		  $data['titles']=array('user_id'=>'User ID',
		  						'user_name'=>'Username',
								'user_fname'=>'First Name',
								'user_lname'=>'Last Name',
								'user_email_addr'=>'Email Address',
								'user_phone'=>'Phone Number',
								'user_dateadded'=>'Date Added',
								'user_datemodified'=>'Date Modified',
								'user_datedelete'=>'Date Deleted',
								'active'=>'Active',
		  );
		  
		  //Query: Get All User Info
		 $this->db->select('user_id,
		 				user_name,
						user_fname,
						user_lname,
						user_email_addr,
						user_phone,
						user_dateadded,						
						user_datemodified,
						user_datedelete,
						active
						');
		 $this->db->from('t_users');
		 $this->db->where('user_id', $user_id);
		 $q=$this->db->get();
		 
		 if($q->num_rows()>0){
			 foreach($q->result_array() as $row){
				 $data['vars']['user_id']=array($row['user_id'], 'hidden');
				 $data['vars']['user_name']=$row['user_name'];
				 $data['vars']['user_fname']=$row['user_fname'];
				 $data['vars']['user_lname']=$row['user_lname'];
				 $data['vars']['user_email_addr']=$row['user_email_addr'];
				 $data['vars']['user_phone']=$row['user_phone'];
				 $data['vars']['user_dateadded']=array($row['user_dateadded'], 'hidden');
				 $data['vars']['user_datemodified']=array($row['user_datemodified'], 'hidden');
				 $data['vars']['user_datedelete']=array($row['user_datedelete'], 'hidden');
				 
				 //Make the Users table a dropdown
				 $active_details=$this->active_inactive();
				 $active_details_vars_arr=$active_details['vars'];

				 $data['vars']['active']=array($row['active'], $active_details_vars_arr);
			}			
			return $data;
		}		
	}
	
	function get_user_id_from_name($username){
			 $this->db->select('user_id, user_name');
			 $this->db->from('t_users');
			 $this->db->where('user_name', $username);
			 $q_user=$this->db->get();
	
			 if($q_user->num_rows()>0){
					foreach ($q_user->result_array() as $row)
					{
						$user_id=$row['user_id'];
					}
					return($user_id);
			  }
	}

	function user_get_data_to_insert(){
		  $data['titles']=array(
		  						'Username',
								'First Name',
								'Last Name',
								'Email Address',
								'Phone Number',
		  );

		   $data['vars']=array(

		 				'user_name',
						'user_fname',
						'user_lname',
						'user_email_addr',
						'user_phone',
						);
			return $data;


	}

	function users_add(){
		
		//2012-09-04 - Where do the variables get called from??? -Rafi
		
		$data=array(
					'user_name'=>$this->input->post('user_name'),
					'user_fname'=>$this->input->post('user_fname'),
					'user_lname'=>$this->input->post('user_lname'),
					'user_email_addr'=>$this->input->post('user_email_addr'),
					'user_phone'=>$this->input->post('user_phone'),
					'user_dateadded'=>date('Y-m-d H:i:s'),
					'user_datemodified'=>date('Y-m-d H:i:s'),
					'active'=>1,
				);	
		if($this->input->post('user_email_addr')!=''){
			$this->db->insert('t_users', $data);
			return true;
		}
		else{
			return false;
		}

	}

	function users_update($user_id){
		
		//2012-09-04 - Where do the variables get called from??? -Rafi
		
		$data=array(
					'user_id'=>$user_id,
					'user_name'=>$this->input->post('user_name'),
					'user_fname'=>$this->input->post('user_fname'),
					'user_lname'=>$this->input->post('user_lname'),
					'user_email_addr'=>$this->input->post('user_email_addr'),
					'user_phone'=>$this->input->post('user_phone'),
					'user_datemodified'=>date('Y-m-d H:i:s'),
					'active'=>$this->input->post('active'),
				);	

		if($data['active']==1){
			$data['user_datedelete']=NULL;
		}


		$this->db->where('user_id', $user_id);
		if($this->input->post('user_email_addr')!=''){
			$this->db->update('t_users', $data);
			//echo "hi there!";
			return true;
		}
		else{
			return false;
		}

	}
	function users_delete($user_id){
		$data=array(
					'user_id'=>$user_id,
					'user_datedelete'=>date('Y-m-d H:i:s'),
					'active'=>0,
				);	
		$this->db->where('user_id', $user_id);
		
		if($user_id!=''){
			$this->db->update('t_users', $data);
			return true;
		}
		else{
			return false;
		}

	}





/*======================================================
|	Admins
======================================================*/

	function admins_get_all($form_type=''){
		  $data=array();
		  $data['titles']=array('admin_id'=>'admin ID',
		  						'admin_name'=>'Admin Name',
								'admin_fname'=>'First Name',
								'admin_lname'=>'Last Name',
								'admin_email_addr'=>'Email Address',
								'admin_phone'=>'Phone Number',
								'admin_password'=>'Password',
								'admin_dateadded'=>'Date Added',
								'admin_datemodified'=>'Date Modified',
								'admin_datedelete'=>'Date Deleted',
								'active'=>'Active',
		  );
		  
		  //Query: Get All admin Info
		 $this->db->select('admin_id,
		 				admin_name,
						admin_fname,
						admin_lname,
						admin_email_addr,
						admin_phone,
						admin_password,
						admin_dateadded,						
						admin_datemodified,
						admin_datedelete,
						active
						');
		 $this->db->from('t_admins');
		 $q=$this->db->get();
		 
		 if($q->num_rows()>0){
			 $count=0;
			 foreach($q->result_array() as $row){
				 
				 //If form type is a dropdown, then all I need here is the admin ID and admin name
				 if($form_type=='dropdown'){
					 $data['vars'][$count][0]=$row['admin_id'];
					 $data['vars'][$count][1]=$row['admin_name'] . " (" . $row['admin_fname'] . " " . $row['admin_lname'] .")";
					}
					else
				{
					 $data['vars'][$count]['admin_id']=$row['admin_id'];
					 $data['vars'][$count]['admin_name']=$row['admin_name'];
					 $data['vars'][$count]['admin_fname']=$row['admin_fname'];
					 $data['vars'][$count]['admin_lname']=$row['admin_lname'];
					 $data['vars'][$count]['admin_email_addr']=$row['admin_email_addr'];
					 $data['vars'][$count]['admin_phone']=$row['admin_phone'];
					 $data['vars'][$count]['admin_password']=$row['admin_password'];
					 $data['vars'][$count]['admin_dateadded']=$row['admin_dateadded'];
					 $data['vars'][$count]['admin_datemodified']=$row['admin_datemodified'];
					 $data['vars'][$count]['admin_datedelete']=$row['admin_datedelete'];
					 $data['vars'][$count]['active']=$row['active'];
				 }
				//$data['vars'][]=$row;
				$count++;
			}			
			return $data;
		}		
	}	 

	function admins_get_form_info($admin_id){

		  $data['titles']=array('admin_id'=>'admin ID',
		  						'admin_name'=>'Admin Name',
								'admin_fname'=>'First Name',
								'admin_lname'=>'Last Name',
								'admin_email_addr'=>'Email Address',
								'admin_phone'=>'Phone Number',
								'admin_password'=>'Password',
								'admin_dateadded'=>'Date Added',
								'admin_datemodified'=>'Date Modified',
								'admin_datedelete'=>'Date Deleted',
								'active'=>'Active',
		  );
		  
		  //Query: Get All admin Info
		 $this->db->select('admin_id,
		 				admin_name,
						admin_fname,
						admin_lname,
						admin_email_addr,
						admin_phone,
						admin_password,
						admin_dateadded,						
						admin_datemodified,
						admin_datedelete,
						active
						');
		 $this->db->from('t_admins');
		 $this->db->where('admin_id', $admin_id);
		 $q=$this->db->get();
		 
		 if($q->num_rows()>0){
			 foreach($q->result_array() as $row){
				 $data['vars']['admin_id']=array($row['admin_id'], 'hidden');
				 $data['vars']['admin_name']=$row['admin_name'];
				 $data['vars']['admin_fname']=$row['admin_fname'];
				 $data['vars']['admin_lname']=$row['admin_lname'];
				 $data['vars']['admin_email_addr']=$row['admin_email_addr'];
				 $data['vars']['admin_phone']=$row['admin_phone'];
				 $data['vars']['admin_password']=array($row['admin_password'], 'password');
				 $data['vars']['admin_dateadded']=array($row['admin_dateadded'], 'hidden');
				 $data['vars']['admin_datemodified']=array($row['admin_datemodified'], 'hidden');
				 $data['vars']['admin_datedelete']=array($row['admin_datedelete'], 'hidden');
				 
				 //Make the admins table a dropdown
				 $active_details=$this->active_inactive();
				 $active_details_vars_arr=$active_details['vars'];

				 $data['vars']['active']=array($row['active'], $active_details_vars_arr);
			}			
			return $data;
		}		
	}
	
	function get_admin_id_from_name($adminname){
			 $this->db->select('admin_id, admin_name');
			 $this->db->from('t_admins');
			 $this->db->where('admin_name', $adminname);
			 $q_admin=$this->db->get();
	
			 if($q_admin->num_rows()>0){
					foreach ($q_admin->result_array() as $row)
					{
						$admin_id=$row['admin_id'];
					}
					return($admin_id);
			  }
	}

	function admin_get_data_to_insert(){
		  $data['titles']=array(
		  						'Admin Name',
								'First Name',
								'Last Name',
								'Email Address',
								'Phone Number',
								'Password',
		  );

		   $data['vars']=array(

		 				'admin_name',
						'admin_fname',
						'admin_lname',
						'admin_email_addr',
						'admin_phone',
						'admin_password',
						);
			return $data;


	}

	function admins_add(){
		
		//2012-09-04 - Where do the variables get called from??? -Rafi
		
		$data=array(
					'admin_name'=>$this->input->post('admin_name'),
					'admin_fname'=>$this->input->post('admin_fname'),
					'admin_lname'=>$this->input->post('admin_lname'),
					'admin_email_addr'=>$this->input->post('admin_email_addr'),
					'admin_phone'=>$this->input->post('admin_phone'),
					'admin_password'=>$this->input->post('admin_password'),
					'admin_dateadded'=>date('Y-m-d H:i:s'),
					'admin_datemodified'=>date('Y-m-d H:i:s'),
					'active'=>1,
				);	
		if($this->input->post('admin_email_addr')!=''){
			$this->db->insert('t_admins', $data);
			return true;
		}
		else{
			return false;
		}

	}

	function admins_update($admin_id){
		
		//2012-09-04 - Where do the variables get called from??? -Rafi
		
		$data=array(
					'admin_id'=>$admin_id,
					'admin_name'=>$this->input->post('admin_name'),
					'admin_fname'=>$this->input->post('admin_fname'),
					'admin_lname'=>$this->input->post('admin_lname'),
					'admin_email_addr'=>$this->input->post('admin_email_addr'),
					'admin_phone'=>$this->input->post('admin_phone'),
					'admin_password'=>md5($this->input->post('admin_password')),
					'admin_datemodified'=>date('Y-m-d H:i:s'),
					'active'=>$this->input->post('active'),
				);	

		if($data['active']==1){
			$data['admin_datedelete']=NULL;
		}


		$this->db->where('admin_id', $admin_id);
		if($this->input->post('admin_email_addr')!=''){
			$this->db->update('t_admins', $data);
			//echo "hi there!";
			return true;
		}
		else{
			return false;
		}

	}
	function admins_delete($admin_id){
		$data=array(
					'admin_id'=>$admin_id,
					'admin_datedelete'=>date('Y-m-d H:i:s'),
					'active'=>0,
				);	
		$this->db->where('admin_id', $admin_id);
		
		if($admin_id!=''){
			$this->db->update('t_admins', $data);
			return true;
		}
		else{
			return false;
		}

	}



/*======================================================
|	Content
======================================================*/

	function content_get_all(){


		  $data['titles']=array('Content ID',
		  						'Content Page Name',
								'Content Block 1',
								'Content Block 2',
								'Content Block 3',
								'Content Block 4',
								'Meta Keywords',
								'Meta Description',
								'Date Created',
								'Date Modified',
								'Date Deleted',
								'Active',
		  );
		  
		  //Query: Get All Content Info
		 $this->db->select('tc_id,
		 				tc_page_name,
						tc_title,
						tc_content,
						tc_content2,
						tc_content3,
						tc_content4,
						tc_meta_keywords,
						tc_meta_description,
						tc_date_created,						
						tc_date_modified,
						tc_date_removed,
						tc_active
						');
		 $this->db->from('t_content');
		 $q=$this->db->get();
		 
		 if($q->num_rows()>0){
			 foreach($q->result() as $row){
				 $data['vars'][]=$row;
			}
		}		
			return $data;
	}


	function content_get_data_to_insert(){
		  $data['titles']=array(
		  						'Content Title',
		  						'Content Page Name',
								'Content Block 1',
								'Content Block 2',
								'Content Block 3',
								'Content Block 4',
								'Meta Keywords',
								'Meta Description',
								'Date Created',
								'Date Modified',
								'Date Deleted',
								'Active',
		  );
		   $data['vars']=array(
						'tc_title',
		 				'tc_page_name',
						'tc_content',
						'tc_content2',
						'tc_content3',
						'tc_content4',
						'tc_meta_keywords',
						'tc_meta_description',
						'tc_date_created',						
						'tc_date_modified',
						'tc_date_removed',
						'tc_active');
			return $data;
	}
	function content_add(){

		$data=array(
					'tc_title'=>$this->input->post('tc_title'),
					'tc_page_name'=>$this->input->post('tc_page_name'),					
					'tc_content'=>$this->input->post('tc_content'),
					'tc_content2'=>$this->input->post('tc_content2'),
					'tc_content3'=>$this->input->post('tc_content3'),
					'tc_content4'=>$this->input->post('tc_content4'),
					'tc_meta_keywords'=>$this->input->post('tc_meta_keywords'),
					'tc_meta_description'=>$this->input->post('tc_meta_description'),
					'tc_date_created'=>$this->input->post('tc_date_created'),
					'tc_date_modified'=>$this->input->post('tc_date_modified'),
					'tc_date_removed'=>$this->input->post('tc_date_removed'),
					'tc_active'=>$this->input->post('tc_active'),
				);
				
				echo "title: " . $this->input->post('tc_title');

		if($this->input->post('tc_title')!=''){
			$this->db->insert('t_content', $data);
			return true;
		}
		else{
			return false;
		}
	}
	
	function content_get_form_info($content_id){
		$data=array();
		  $data['titles']=array('tc_id'=>'Content ID',
		  						'tc_page_name'=>'Page Name',
								'tc_content'=>'Content Block 1',
								'tc_content2'=>'Content Block 2',
								'tc_content3'=>'Content Block 3',
								'tc_content4'=>'Content Block 4',
								'tc_meta_keywords'=>'Meta Keywords',
								'tc_meta_description'=>'Meta Description',
								'tc_date_created' => 'Date Created',
								'tc_date_modified'=>'Date Modified',
								'tc_date_removed'=>'Date Deleted',
								'tc_active'=>'Active',
		  );

		  //Query : Get Ticket Info
		 $this->db->select('tc_id,
		 				tc_page_name,
						tc_content,
						tc_content2,
						tc_content3,
						tc_content4,
						tc_meta_keywords,
						tc_meta_description,
						tc_date_created,
						tc_date_modified,
						tc_date_removed,
						tc_active,
						');
		 $this->db->from('t_content');
		 $this->db->where("tc_id", $content_id);
		 $q=$this->db->get();
		 if($q->num_rows()>0){
			 foreach($q->result_array() as $row){
				 //Some variables will be made into regular values, some into arrays if there's a dropdown associated.
				 $data['vars']['tc_id']=array($row['tc_id'], 'hidden');
				 $data['vars']['tc_page_name']=$row['tc_page_name'];
				 $data['vars']['tc_content']=array($row['tc_content'], 'textarea');
				 $data['vars']['tc_content2']=array($row['tc_content2'], 'textarea');
				 $data['vars']['tc_content3']=array($row['tc_content3'], 'textarea');
				 $data['vars']['tc_content4']=array($row['tc_content4'], 'textarea');
				 $data['vars']['tc_meta_keywords']=$row['tc_meta_keywords'];
				 $data['vars']['tc_meta_description']=$row['tc_meta_description'];
				 $data['vars']['tc_date_created']=$row['tc_date_created'];
				 $data['vars']['tc_date_modified']=$row['tc_date_modified'];
				 $data['vars']['tc_date_removed']=$row['tc_date_removed'];
				 $data['vars']['tc_active']=$row['tc_active'];
			}			
			return $data;
		}		
	}


	function content_update($tc_id){
		
		//2012-09-04 - Where do the variables get called from??? -Rafi
		
		$data=array(
					'tc_id'=>$tc_id,
					'tc_page_name'=>$this->input->post('tc_page_name'),
					'tc_content'=>$this->input->post('tc_content'),
					'tc_content2'=>$this->input->post('tc_content2'),
					'tc_content3'=>$this->input->post('tc_content3'),
					'tc_content4'=>$this->input->post('tc_content4'),
					'tc_meta_keywords'=>$this->input->post('tc_meta_keywords'),
					'tc_meta_description'=>$this->input->post('tc_meta_description'),
					'tc_date_created'=>$this->input->post('tc_date_created'),
					'tc_date_modified'=>date('Y-m-d H:i:s'),
					'tc_date_removed'=>$this->input->post('tc_date_removed'),
					'tc_active'=>$this->input->post('tc_active'),
				);	
		$this->db->where('tc_id', $tc_id);
		if($this->input->post('tc_page_name')!=''){
			$this->db->update('t_content', $data);
			return true;
		}
		else{
			return false;
		}
	}

 
 /*======================================================
|	Logs
======================================================*/

	function logs_view_all(){


		  $data['titles']=array('Logs ID',
		  						'User ID',
								'IP Address',
								'Action Description',
								'Date of Action',
		  );

		  
		  //Query: Get All Logs Info
		 $this->db->select('ul_id,
		 				ul_user_id,
						ul_ip_address,
						ul_action_description,
						ul_date_of_action,
						');
		 $this->db->from('t_users_logs');
		 $q=$this->db->get();
		 if($q->num_rows()>0){
			 foreach($q->result() as $row){
				 $data['vars'][]=$row;
			}			
			return $data;
		}		
	}
	function logs_view($user_id){
		  
		  //Query: Get All Logs Info
		 $this->db->select('ul_id,
		 				ul_user_id,
						ul_ip_address,
						ul_action_description,
						ul_date_of_action,
						');
		 $this->db->from('t_users_logs');
		 $this->db->where('user_id', $user_id);
			
		 $q=$this->db->get();
		 if($q->num_rows()>0){
			 foreach($q->result() as $row){
				 $data[]=$row;
			}			
			return $data;
		}		
	}

	function emails_view_all(){
		  $data['titles']=array('Email ID',
		  						'Email Subject',
								'Email Message',
								'Email - Date Sent',
								'From Name',
								'From Email',
								'Form Type',
								'IP Address',
								
		  );

		  //Query: Get All Emails
		 $this->db->select('email_id,
		 				email_subject,
						email_message,
						email_date_sent,
						email_from_name,
						email_from_email,
						email_form_type,
						email_ip_address,
						');
		 $this->db->from('t_emails');
			
		 $q=$this->db->get();
		 if($q->num_rows()>0){
			 foreach($q->result() as $row){
				 $data['vars'][]=$row;
			}			
			return $data;
		}		
	}










 }