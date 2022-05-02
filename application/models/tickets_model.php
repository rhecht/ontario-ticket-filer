<?php
class Tickets_model extends CI_Model{
	
	//Database Default Select for main tickets

	function getTickets($username){

		//Query 1: First get User ID


		 $this->db->select('user_id, user_name');
		 $this->db->from('t_users');
		 $this->db->where('user_name', $username);
		 $q_user=$this->db->get();

		 if($q_user->num_rows()>0){
				foreach ($q_user->result_array() as $row)
				{
					$user_id=$row['user_id'];
				}
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
						price
						');
		 $this->db->from('vw_tickets');
		 //$this->db->where('user_id', $user_id);
		 //$this->db->where('date_deleted', "''");
		 //$this->db->or_where('date_deleted', "'0'");
		 $where ="user_id = $user_id AND (date_deleted = '0000-00-00 00:00:00')";
		 $this->db->where($where);
		 //$this->db->where('user_id', $user_id);
		 $q=$this->db->get();
		 //$q=$this->db->get('t_site');
		 
		 if($q->num_rows()>0){
			 foreach($q->result() as $row){
				 $data[]=$row;
			}			
			return $data;
		}		
	}
	
	/*------------------------------------------------------------------------
		CRUD Operations
	------------------------------------------------------------------------*/
	
		/*------------------------------------------------------------------------
			READ
		------------------------------------------------------------------------*/
	//Get regular ticket values

	function ticket_get_form_values($ticket_type_id){
		
			switch ($ticket_type_id){
				case 2:
					$ticket_offence_date=date("Y-m-d H:i:s",strtotime($this->input->post('Date_Submit')));
					//$ticket_offence_date=date('Y-m-d H:i:s');
					break;
				default:
					//Default is from Form 7
					$ticket_offence_date=date("Y-m-d H:i:s",strtotime($this->input->post('OffenceDate')));
					break;
			}	

			$data['ticket_offence_date']=$ticket_offence_date;			
			$data['ticket_type']=$ticket_type_id;
			$data['ticket_booking_fee_status']=0;
			$data['user_id']=$this->session->userdata('user_id');
			$data['date_added']=date('Y-m-d H:i:s');
			$data['active']=1;

		return $data;
	}
	
	function get_last_record_inputted($user_id){
		 $this->db->select('ticket_id');
		 $this->db->from('t_tickets');
		 $where ="user_id = $user_id";
		 $this->db->where($where);
		 $this->db->order_by('ticket_id', 'desc');
		 $this->db->limit('1', '0');
		 
		 $q=$this->db->get();
		 
		 //return $this->db->last_query();

		 if($q->num_rows()>0){
				foreach ($q->result_array() as $row)
				{
					$ticket_id=$row['ticket_id'];
				}
				return $ticket_id;
		  }
		else
		{
			return "I don't know.";
			}
	}

	//Get Value Details for General Form
	
	function ticket_get_form_values_detail_gen($formPost=true, $ticket_id=''){
		if($formPost==true){	
			//First get the variables from form
			$data_form['ttgd_fullname']=$this->input->post('Notice');
			//$data_form['ttgd_fullname']=$this->input->get('Notice');
			$data_form['ttgd_address']=$this->input->post('Address');
			$data_form['ttgd_apt']=$this->input->post('Apt');
			$data_form['ttgd_municipality']=$this->input->post('Municiplite');
			$data_form['ttgd_province_state']=$this->input->post('Province');
			$data_form['ttgd_postal_zip_code']=$this->input->post('PostalCode');
			$data_form['ttgd_icon']=$this->input->post('icon');
			$data_form['ttgd_offence_num']=$this->input->post('OffenceNumber');
			$ttgd_offence_date=strtotime($this->input->post('OffenceDate'));
			$ttgd_offence_date=date("Y-m-d H:i:s", $ttgd_offence_date);			
			$data_form['ttgd_offence_date']=$ttgd_offence_date;
			
			
			$data_form['ttgd_officer_attend_trial']=$this->input->post('officer_attend_trial');
			$data_form['ttgd_intend_to_appear_in_court']=$this->input->post('intend_to_appear');
			$data_form['ttgd_intend_to_appear_in_court_fr']=$this->input->post('fr_intend_to_appear');
			$data_form['ttgd_intend_to_appear_in_court_date']=$this->input->post('fr_date_post');

			$data_form['ttgd_languageinterpreter']=$this->input->post('languageinterpreter');
			$data_form['ttgd_fr_languageinterpreter']=$this->input->post('fr_languageinterpreter');


			$data_form['ttgd_signature']=$this->input->post('signature');
			$data_form['ttgd_signature_date']=$this->input->post('signature_date');
			
			//Rep Info
			$data_form['ttgd_rep_name']=$this->input->post('RepresentativeDetails');
			$data_form['ttgd_rep_address']=$this->input->post('CurrentAddress1');
			$data_form['ttgd_rep_apt']=$this->input->post('Apt1');
			$data_form['ttgd_rep_province_state']=$this->input->post('Province1');
			$data_form['ttgd_rep_street']=$this->input->post('Street1');
			$data_form['ttgd_rep_municipality']=$this->input->post('Municipality1');
			$data_form['ttgd_rep_postal_zip_code']=$this->input->post('PostalCode1');
			
			//Date Added
			$data_form['ttgd_date_added']=date('Y-m-d H:i:s');
			$data_form['ttgd_date_modified']=date('Y-m-d H:i:s');
		}
		else{
			$this->db->select('ttgd_ticket_id, 
			 				ttgd_fullname,
							ttgd_address,
							ttgd_apt,
							ttgd_municipality,
							ttgd_province_state,
							ttgd_postal_zip_code,
							ttgd_icon,
							ttgd_offence_num,
							ttgd_offence_date,
							ttgd_officer_attend_trial,
							ttgd_intend_to_appear_in_court,
							ttgd_intend_to_appear_in_court_fr,
							ttgd_intend_to_appear_in_court_date,
							ttgd_signature,
							ttgd_signature_date,
							ttgd_languageinterpreter,
							ttgd_fr_languageinterpreter,
							ttgd_rep_name,
							ttgd_rep_address,
							ttgd_rep_apt,
							ttgd_rep_province_state,
							ttgd_rep_street,
							ttgd_rep_municipality,
							ttgd_rep_postal_zip_code,
							ttgd_date_added,
							ttgd_date_modified							
						');
			$this->db->from('t_tickets_general_details');
			$this->db->where('ttgd_ticket_id', $ticket_id);
						
			 $q=$this->db->get();

			 if($q->num_rows()>0){
				 foreach($q->result_array() as $row){
					 $data_form[]=$row;
				}
			}
			else{				
			}
		}
			return $data_form;
	}
	
	function ticket_get_form_values_detail_redlight($formPost=true, $ticket_id=''){
		if($formPost==true){
			//First get the variables from form
			$data_form['ttrd_fullname']=$this->input->post('Notice');
			//$data_form['ttrd_fullname']=$this->input->get('Notice');
			$data_form['ttrd_address']=$this->input->post('Address');
			$data_form['ttrd_apt']=$this->input->post('Apt');
			$data_form['ttrd_municipality']=$this->input->post('Municiplite');
			$data_form['ttrd_province_state']=$this->input->post('Province');
			$data_form['ttrd_postal_zip_code']=$this->input->post('PostalCode');
			$data_form['ttrd_icon']=$this->input->post('icon');
			$data_form['ttrd_offence_num']=$this->input->post('OffenceNumber');
			
			$ttrd_offence_date=strtotime($this->input->post('OffenceDate'));
			$ttrd_offence_date=date("Y-m-d H:i:s", $ttrd_offence_date);
			$data_form['ttrd_offence_date']=$ttrd_offence_date;
			
			$data_form['ttrd_officer_attend_trial']=$this->input->post('officer_attend_trial');
			$data_form['ttrd_intend_to_appear_in_court']=$this->input->post('intend_to_appear');
			$data_form['ttrd_intend_to_appear_in_court_fr']=$this->input->post('fr_intend_to_appear');
			$data_form['ttrd_intend_to_appear_in_court_date']=$this->input->post('fr_date_post');
			
			$data_form['ttrd_signature']=$this->input->post('signature');
			$data_form['ttrd_signature_date']=$this->input->post('signature_date');
			
			//Rep Info
			$data_form['ttrd_rep_name']=$this->input->post('RepresentativeDetails');
			$data_form['ttrd_rep_address']=$this->input->post('CurrentAddress1');
			$data_form['ttrd_rep_apt']=$this->input->post('Apt1');
			$data_form['ttrd_rep_province_state']=$this->input->post('Province1');
			$data_form['ttrd_rep_street']=$this->input->post('Street1');
			$data_form['ttrd_rep_municipality']=$this->input->post('Municipality1');
			$data_form['ttrd_rep_postal_zip_code']=$this->input->post('PostalCode1');
			
			//Date Added
			$data_form['ttrd_date_added']=date('Y-m-d H:i:s');
			$data_form['ttrd_date_modified']=date('Y-m-d H:i:s');
		}
		else{
			$this->db->select('ttrd_ticket_id, 
			 				ttrd_fullname,
							ttrd_address,
							ttrd_apt,
							ttrd_municipality,
							ttrd_province_state,
							ttrd_postal_zip_code,
							ttrd_icon,
							ttrd_offence_num,
							ttrd_offence_date,
							ttrd_officer_attend_trial,
							ttrd_intend_to_appear_in_court,
							ttrd_intend_to_appear_in_court_fr,
							ttrd_intend_to_appear_in_court_date,
							ttrd_signature,
							ttrd_signature_date,
							ttrd_languageinterpreter,
							ttrd_fr_languageinterpreter,
							ttrd_rep_name,
							ttrd_rep_address,
							ttrd_rep_apt,
							ttrd_rep_province_state,
							ttrd_rep_street,
							ttrd_rep_municipality,
							ttrd_rep_postal_zip_code,
							ttrd_date_added,
							ttrd_date_modified							
						');
			$this->db->from('t_tickets_redlight_details');
			$this->db->where('ttrd_ticket_id', $ticket_id);
			 $q=$this->db->get();

			 if($q->num_rows()>0){
				 foreach($q->result_array() as $row){
					 $data_form[]=$row;
				}
			}
			else{				
			}
		}
			return $data_form;	
	}
	
	function ticket_get_form_values_detail_parking($formPost=true, $ticket_id=''){	
		if($formPost==true){
			$data_form['ttpd_parking_infraction_notice_number']=$this->input->post('infractionid');
			$data_form['ttpd_defendant_owners_name']=$this->input->post('Ownername');
			$data_form['ttpd_current_mailing_address']=$this->input->post('MailingAddress');
			$data_form['ttpd_apt_suite']=$this->input->post('Suite');
			$data_form['ttpd_city']=$this->input->post('City');
			$data_form['ttpd_province_state']=$this->input->post('Province');
			$data_form['ttpd_postal_zip_code']=$this->input->post('PostalCode');
			$data_form['ttpd_daytime_tel_num']=$this->input->post('TelePhone');
			$data_form['ttpd_intend_to_challenge_evidence']=$this->input->post('Infraction');
			$data_form['ttpd_trial_language']=$this->input->post('Language');
			$data_form['ttpd_trial_interpreter']=$this->input->post('languageInterpreter');
			$data_form['ttpd_signature']=$this->input->post('signature');
			$data_form['ttpd_signature_date']=date("Y-m-d H:i:s", strtotime($this->input->post('Date_Submit')) );
			//Agent Info
			$data_form['ttpd_agent_name']=$this->input->post('AgentName');
			$data_form['ttpd_agent_will_appear_for_defendant']=$this->input->post('appearing');
			$data_form['ttpd_agent_mailing_address']=$this->input->post('AgentMailingAddress1');
			$data_form['ttpd_agent_apt_suite']=$this->input->post('Suite1');
			$data_form['ttpd_agent_city']=$this->input->post('City1');
			$data_form['ttpd_agent_province']=$this->input->post('Province1');
			$data_form['ttpd_agent_zip_postal_code']=$this->input->post('PostalCode1');
			$data_form['ttpd_agent_daytime_tel_num']=$this->input->post('TelePhone1');
			$data_form['ttpd_agent_appearing']=$this->input->post('appearing2');
			$data_form['ttpd_pending_status']=1;

			//Date Added
			$data_form['ttpd_date_added']=date("Y-m-d H:i:s");
			$data_form['ttpd_date_modified']=date("Y-m-d H:i:s");
		}
		else{
			
			 $this->db->select('ttpd_parking_infraction_notice_number,
							ttpd_defendant_owners_name,
							ttpd_current_mailing_address,
							ttpd_apt_suite,
							ttpd_city,
							ttpd_province_state,
							ttpd_postal_zip_code,
							ttpd_daytime_tel_num,
							ttpd_intend_to_challenge_evidence,
							ttpd_trial_language,
							ttpd_trial_interpreter,
							ttpd_signature,
							ttpd_signature_date,
							ttpd_agent_name,
							ttpd_agent_will_appear_for_defendant,
							ttpd_agent_mailing_address,
							ttpd_agent_apt_suite,
							ttpd_agent_city,
							ttpd_agent_province,
							ttpd_agent_zip_postal_code,
							ttpd_agent_daytime_tel_num,
							ttpd_pending_status,
							ttpd_date_added,
							ttpd_date_modified,
							ttpd_agent_appearing
							');
			
			//$this->db->select('*');
			 $this->db->from('t_tickets_parking_details');
			 $this->db->where("ttpd_ticket_id", $ticket_id);
			 $q=$this->db->get();

			 if($q->num_rows()>0){
				 foreach($q->result_array() as $row){
					 $data_form[]=$row;
				}
			}
			else{				
			}
		}
			return $data_form;	
	}
	
	function ticket_get_form_values_for_pdf($ticket_id){

		//First get generic ticket values.

			 $this->db->select("`ticket_id` as 'ticket_id' ,
							`ticket_name` as 'ticket_name',
							`ticket_offence_date` as 'ticket_offence_date',
							`ticket_type` as 'ticket_type',
							`ticket_booking_fee_status` as 'ticket_booking_fee_status',
							`user_id` as 'user_id',
							`date_deleted` as 'date_deleted'
							");
			 $this->db->from('t_tickets');
			 $where ="`ticket_id` = $ticket_id AND (date_deleted = '0' OR date_deleted = '')";
			 $this->db->where($where);
			 $q=$this->db->get();
			 //echo $this->db->last_query();
			 //If the ticket even exists, then we can start.
			 if($q->num_rows()>0){
				 //print_r( $q->result() );				 
				 foreach($q->result_array() as $row){
					 $data[]=$row;					 
				}
				//print_r($data);
				$ticket_type=$data[0]['ticket_type'];
				//Now that that's done, let's see the ticket type to choose the next record.
				switch($ticket_type){
					case 1: //General
						$data_form=$this->ticket_get_form_values_detail_gen(false, $ticket_id);
						//print_r($data_form);
					break;
					case 2: //Parking
						$data_form=$this->ticket_get_form_values_detail_parking(false, $ticket_id);
						//print_r($data_form);
					break;
					case 3: //Redlight
						$data_form=$this->ticket_get_form_values_detail_redlight(false, $ticket_id);
					break;
					default:
						$data_form=array();
					break;
				}
				//print_r($data);
				foreach($data_form as $i){
					$data[]=$i;
				}
			
				return $data;
			}
			else{
				echo "sorry, your request revealed nothing.";
			}

		
		//Based on Ticket ID, choose data from specific table.		
	}
	
		/*------------------------------------------------------------------------
			WRITE
		------------------------------------------------------------------------*/
		
	function add_record($data, $table_name){
		$this->db->insert($table_name, $data);
	}
	
	function edit_session_marker_record($ticket_id, $tickets_sess_marker, $tickets_table){
		$data=array(
					'ticket_session_marker'=>$tickets_sess_marker,
				);
		$this->db->where('ticket_id', $ticket_id);
		$this->db->update('t_tickets', $data);
	}

		/*------------------------------------------------------------------------
			DELETE
		------------------------------------------------------------------------*/

	function ticket_delete($data){
		$this->db->where('ticket_id', $this->uri->segment(3));
		
		//Very dangerous! This is why it's commented out!!!
		//$this->db->delete('data');
		
		$this->db->update('t_tickets', $data);
	}
	
	/*----------------------------------------------------------
		PAYPAL PROCESSING FUNCTIONS
	----------------------------------------------------------*/
	function paypal_ticket_particulars($ticket_id){
		 $this->db->select('ticket_id, ticket_type_name, price from vw_tickets where ticket_id=' . $ticket_id);
		 $q=$this->db->get();

		 if($q->num_rows()>0){
			 foreach($q->result() as $row){
				 $data[]=$row;
			}			
			return $data;
		}
	}

	function paypal_mark_tickets_as_sold($marker){
		//update paypal session with Null value
			$data = array(
						   'ticket_is_paid' => '1',
						   'ticket_booking_fee_status' => '1',
						);
			
			$this->db->where('ticket_session_marker', $marker);
			$this->db->update('t_tickets', $data);
		//destroy paypal session after updating records
			//$this->session->unset_userdata('paypal_session_marker');
			
	}

	function paypal_clear_session_markers($marker){
		//update paypal session with Null value
			$data = array(
						   'ticket_session_marker' => NULL,
						   'date_modified' => date('Y-m-d H:i:s')
						);
			
			$this->db->where('ticket_session_marker', $marker);
			$this->db->update('t_tickets', $data);
		//destroy paypal session after updating records
			$this->session->unset_userdata('paypal_session_marker');
	}
}