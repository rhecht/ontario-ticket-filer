<?php
class Tickets extends CI_Controller{

	function __construct(){
		parent::__construct();
		
		//A workaround so that PDFs can be generated. Can't figure out how to send session cookies via HTTPRequest.
		if($this->uri->segment(4)!=$this->config->item('pdf_pass')){
			//Login::is_logged_in();
			$this->_is_logged_in();
		}
	}
	
	function index(){

		$data=array();
		
		if( $this->session->userdata('username')!="" ){
			//$this->load->model('tickets_model');
			
			if($query = $this->tickets_model->getTickets($this->session->userdata('username')))
			{
				$data['records']=$query;
			}		
			
			$data['main_content'] = 'tickets/tickets_view';
			$this->load->view('includes/template', $data);
		}
	}
	
	/* ---------------------------------------------------------------
		Load Form Views
	--------------------------------------------------------------- */
	
		/* -----------------------------------
			Ticket Checkers
		 ----------------------------------- */
		
		function parking_ticket_check(){
			//First check if the date of ticket was entered.
			if($this->input->post('date_of_ticket')!=""){
				//Get date for insertion
				$parkingDateArray=$this->_thirty_day_verify($this->input->post('date_of_ticket'));
				$data['dateOfTicket']=$this->input->post('date_of_ticket');
				$data['currentDate']=$parkingDateArray['currentDate'];
				$data['errorMessage']=$parkingDateArray['error'];
				//If the date of ticket is within 30 days, redirect to selected form page.

				if($data['errorMessage']==""){
					redirect('tickets/form_parking');
				}
			}
	
			$data['main_content'] = 'tickets/30_day_check/ticket_check_parking_view';
			$data['page_title']="Parking Ticket Check";
			$this->load->view('includes/template', $data);
		}
		function redlight_ticket_check(){
			//First check if the date of ticket was entered.
			if($this->input->post('date_of_ticket')!=""){
				//Get date for insertion
				$parkingDateArray=$this->_thirty_day_verify($this->input->post('date_of_ticket'));
				$data['dateOfTicket']=$this->input->post('date_of_ticket');
				$data['currentDate']=$parkingDateArray['currentDate'];
				$data['errorMessage']=$parkingDateArray['error'];
				//If the date of ticket is within 30 days, redirect to selected form page.

				if($data['errorMessage']==""){
					redirect('tickets/form_redlight');
				}

			}
	
			$data['main_content'] = 'tickets/30_day_check/ticket_check_redlight_view';
			$data['page_title']="Redlight Ticket Check";
			$this->load->view('includes/template', $data);
		}
		function noticetoappear_check(){
			//First check if the date of ticket was entered.
			if($this->input->post('date_of_ticket')!=""){
				//Get date for insertion
				$parkingDateArray=$this->_thirty_day_verify($this->input->post('date_of_ticket'));
				$data['dateOfTicket']=$this->input->post('date_of_ticket');
				$data['currentDate']=$parkingDateArray['currentDate'];
				$data['errorMessage']=$parkingDateArray['error'];
				//If the date of ticket is within 30 days, redirect to selected form page.

				if($data['errorMessage']==""){
					redirect('tickets/form_notice_to_appear');
				}
			}	
			$data['main_content'] = 'tickets/30_day_check/ticket_check_noticetoappear_view';
			$data['page_title']="General Ticket Check";
			$this->load->view('includes/template', $data);
		}
		/*  -----------------------------------
			End Checkers
		 ----------------------------------- */

		/*  -----------------------------------
			Forms (for after the 30 day check)
		  ----------------------------------- */

		function form_notice_to_appear(){
			$ticket_id=$this->uri->segment(3);
			//If there's an ID, call values from model.
			if($ticket_id!=""){
				//Get ticket values from model
				$data=$this->tickets_model->ticket_get_form_values_for_pdf($ticket_id);
				//Once values are taken let's use to populate values in view.
				//print_r($data[1]);
				$this->load->view('tickets/forms/pdf/notice_to_appear_view', $data[1]);
			}
			else{
				$this->load->view('tickets/forms/notice_to_appear_view');
			}
		}


		function form_redlight(){
			$ticket_id=$this->uri->segment(3);
			//If there's an ID, call values from model.
			if($ticket_id!=""){
				//Get ticket values from model
				$data=$this->tickets_model->ticket_get_form_values_for_pdf($ticket_id);
				//Once values are taken let's use to populate values in view.
				//print_r($data[1]);
				$this->load->view('tickets/forms/pdf/red_light_ticket_form', $data[1]);
			}
			else{
				$this->load->view('tickets/forms/red_light_ticket_form');
			}
		}

		function form_parking(){
			$ticket_id=$this->uri->segment(3);
			//If there's an ID, call values from model.

			if($ticket_id!=""){
				//Get ticket values from model
				$data=$this->tickets_model->ticket_get_form_values_for_pdf($ticket_id);
				//Once values are taken let's use to populate values in view.
				$this->load->view('tickets/forms/pdf/parking_ticket_form',  $data[1]);
			}
			else{
				$this->load->view('tickets/forms/parking_ticket_form');
			}
		}
		
		//Here's to download the form as a PDF
		function form_download(){
			//Directory Structure
			$files_folder="files/users/";
			$user_id=$this->session->userdata('user_id');			
			$form_html=$this->uri->segment(3);
			$err='';
				if(
				   	$form_html!='form_notice_to_appear' && 
					$form_html!='form_redlight' && 
					$form_html!='form_parking'
				   ){
					$err='Please choose a valid form';
				}
			$ticket_prefix="ticket_";
			$ticket_id=$this->uri->segment(4);
				if($ticket_id==''){
					$err='Please choose a valid ticket';
				}
				
			if($err==''){
				//End Directory Structure
				$url=$this->config->item('base_url') . "index.php/tickets/" . $form_html . "/". $ticket_id . "/" . $this->config->item('pdf_pass');
				//filename should not have a ".pdf" in the end as _pdf_create will IY"H take care of that.
				$file_folder_name=$this->config->item('server_root') . $files_folder . $user_id . "/";
				$filename=$ticket_prefix  . $ticket_id;
				//Once we see that the PDF Create function works we will run a checker to see if the file exists. This will thereby reduce server load time.			
				$this->_pdf_create($url, $filename, $file_folder_name, true);
				//Let's assume now that the file was downloaded onto the server. Let's run an automatic download.
			}
			else{
				//echo $err; //leave this commented out or else the PDF won't be created.
			}
		}

	/* ---------------------------------------------------------------
		End Form Views
	--------------------------------------------------------------- */

	/* ---------------------------------------------------------------
		Form Submissions
	--------------------------------------------------------------- */
	
		function form_notice_to_appear_submit(){
			
			$data_form=$this->tickets_model->ticket_get_form_values_detail_gen();
			$data=$this->tickets_model->ticket_get_form_values(1);
			$this->ticket_create($data, $data_form, 't_tickets', 't_tickets_general_details', "ttgd");
		}


		function form_redlight_submit(){
			
			$data_form=$this->tickets_model->ticket_get_form_values_detail_redlight();
			$data=$this->tickets_model->ticket_get_form_values(3);			
			$this->ticket_create($data, $data_form, 't_tickets', 't_tickets_redlight_details', "ttrd");
		}

		function form_parking_submit(){
			$data_form=$this->tickets_model->ticket_get_form_values_detail_parking();
			$data=$this->tickets_model->ticket_get_form_values(2);
			//print_r($data);
			$this->ticket_create($data, $data_form, 't_tickets', 't_tickets_parking_details', "ttpd");
			
		}


	/* ---------------------------------------------------------------
		End Form Submissions
	--------------------------------------------------------------- */

	
/* ---------------------------------------------------------------
	Paypal Processor Stuff
--------------------------------------------------------------- */
	
	function paypal_notice_booking_bulk(){
		
		//Identify checked tickets based on ID, price
			$checkedValues=$this->input->post('isChecked');
			if(empty($checkedValues)){

				$data['main_content'] = 'tickets/checkout/paypal/no_tickets_selected';
				$data['page_title']="Please Select a Ticket";
				$this->load->view('includes/template', $data);
				}
			else{
				$counter=0;
				foreach($checkedValues as $ticket_id){
					//Select Ticket Type, Ticket ID, and Price
					$arr[$counter]=$this->tickets_model->paypal_ticket_particulars($ticket_id);								

			/*
				Save Data in a session for resending
				One of the session variables needs to be a random-generated marker for the Thank You page.
				Perhaps create a new table for ticket IDs, session markers and date			
			*/

					//Insert random marker into each ticket and make a session of that variable.


					if(!(isset($random_marker))){
						$random_marker=rand(1000000, 9999999);
						//Set ticket session marker
						$tickets_sess=array();
						$tickets_sess['paypal_session_marker']=$random_marker;						
						$this->session->set_userdata($tickets_sess);
					}
						//Insert Marker data into table row
						$this->tickets_model->edit_session_marker_record($ticket_id, $random_marker, 't_tickets');
					$counter++;
				}
				$data['records']=$arr;

		// Add up all values (necessary?)
		
		
		//Right now this is redirecting to the "is_paid" page until the Paypal account is activated by Ian.
		// --Rafi - 2012-10-24
				redirect('tickets/paypal_is_paid_12345');

				$this->load->view("tickets/checkout/paypal/order_form_brief", $data);
			}
	}

	//This is where Paypal will go to.	
	function paypal_is_paid_12345(){
		
		if($this->uri->segment(3)!=$this->config->item('pdf_pass')){
		
			//First Validate the session marker.
			$marker=$this->session->userdata('paypal_session_marker');
			
			//Mark the payments as paid based on what's on the session marker.
			$this->tickets_model->paypal_mark_tickets_as_sold($marker);
			
			//Once done, destroy session marker.
			//Session marker will be cleared and "paid" and "paid date" statuses will be applied to selected ticket IDs
			$this->tickets_model->paypal_clear_session_markers($marker);	
			//echo $marker;	
			
			//Once that's done, redirect to the Thank You page.
			redirect('tickets/payments_thank_you');
		}
		else{
			redirect('tickets/payments_nice_try');
		}
	}
	
	function payments_thank_you(){
			$data['main_content'] = 'tickets/checkout/paypal/thank_you';
			$this->load->view('includes/template', $data);
	}
	function payments_nice_try(){
			$data['main_content'] = 'tickets/checkout/paypal/nice_try';
			$this->load->view('includes/template', $data);
	}

/* ---------------------------------------------------------------
	End Paypal Processor Stuff
--------------------------------------------------------------- */
/*================================================================
	CRUD Operations
================================================================*/
	
	function ticket_create($data, $data_form, $tickets_table, $tickets_details_table, $table_prefix){
			//Create a new ticket with Pending marker
				$this->tickets_model->add_record($data, $tickets_table);
			//Find what the Ticket ID of the new ticket created was. Select last record of your form entries based on session user ID
				$last_ticket=$this->tickets_model->get_last_record_inputted($this->session->userdata('user_id'));				
				$data_form[$table_prefix . '_ticket_id']=$last_ticket;
			//Once that's done, insert everything into table
					$this->tickets_model->add_record($data_form, $tickets_details_table);
			//After all is said and done, redirect back to ticket main page.
				redirect('tickets');
	}
	
	function ticket_delete(){
			$data=array(
				'ticket_id' => $this->uri->segment(3),
				'date_deleted' => time()
			);
			
			$this->tickets_model->ticket_delete($data);
			//$this->index();
			redirect('tickets');
	}
	


/* ----------------------------------------
	Private "Helper" Functions
	These will never appear as pages, hence the underscore preceding each function name
   ---------------------------------------- */

    //Is the user logged in?
	
	function _is_logged_in(){
		//$is_logged_in= $this->session->userdata('is_logged_in');
		
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
	function _thirty_day_verify($date_of_ticket){
		
		$data['dateCheck']=$date_of_ticket;
		$data['currentDate']=date('d-m-Y');
		
		//Check if the ticket date is greater than or equal than the date 30 days ago.
		if(strtotime($date_of_ticket)>=strtotime('-30 days') ){
			$data['error']="";
		}
		else{
			$data['error']="Sorry, we are unable to file tickets after 30 days";
		}
		return $data;
		
		//Once the date issue is resolved we can then work on each individual form
		
	}
	
	
	/*
	DOMPDF is code from Google - http://code.google.com/p/dompdf/
	CodeIgniter Integration courtesy of http://sajjadhossain.com/2008/06/21/codeigniter-plugin-for-dompdf/
	*/


    function _pdf_create($url, $filename, $file_folder_name, $stream=true, $papersize = 'legal', $orientation = 'portrait')
    {
		//AJAX call the HTML file
		$html=$this->_getAJAXContent($url);		
		//$html= $this->load->view($url,'',true);
		//$html=$this->_curl_get_content($url);
		//echo $url;
		//echo $html;
		//echo $stream;
		
		
		
        require_once($this->config->item('application_root') . "libraries/dompdf/dompdf_config.inc.php");
 
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->set_paper($papersize, $orientation);
        $dompdf->render();
		
		$filename=$filename . ".pdf";
 
        if ($stream)
        {
            $options['Attachment'] = 1;
            $options['Accept-Ranges'] = 0;
            $options['compress'] = 1;
            $dompdf->stream($filename.".pdf", $options);
		}
        else
        {

				//create folder if not exists
				if(!file_exists($file_folder_name)){
					mkdir($file_folder_name, 0777);
				}
				echo $file_folder_name . $filename;


            echo "write_file($file_folder_name" . "$filename, $dompdf->output())";
        }
		//echo $html;
    }
	
	//AJAX!!!! YAY!!!!! Calling class from Google Code	
	
	function _getAJAXContent($url){
		
	require_once($this->config->item('application_root') . "libraries/httprequest/httprequest.class.php");

	  try
	  {// Perform request
	  
	  //$url=str_replace(".php", "", $url);
	  echo $url;
	  
		$request = new HTTPRequest($url, null, null, true);
		
		//Just added below line as per the recommendation of the developer
		//$request->SetHeader("Cookie", sprintf("%s=%s;", session_name('is_logged_in'), session_id($this->session->userdata('is_logged_in')) ));
		//$request->SetHeader("Cookie", sprintf("%s=%s;", session_name('is_logged_in'), session_id('1') ));
		 // Forward PHP session in request..
	    $request->SetHeader("Cookie", sprintf("%s=%s;", session_name(), session_id()));
		
		$data = $request->SendRecieve();
	  }
	  catch(HTTPSocketConnectionException $e)
	  {// Handle exception, ex. retry or fallback server.
		$data = "<h1>Error connecting to server</h1><p>{$e->getMessage()}</p>";}
	  catch(HTTPPackageParserException $e)
	  {// Handle exception..
		$data = "<h1>Parsing error.</h1><p>{$e->getMessage()}</p>";}
	  catch(Exception $e)
	  {// Unknown exception
		$data = "<h1>".get_class($e)."</h1><p>{$e->getMessage()}</p>";}
	
	  // DataOutput
	  $mydata=(string)$data->content;
	  //$mydata="test";
	  return $mydata;	
	}
	

	//Getting content through CURL. Not being used but good to have.	
	
	function _curl_get_content($url) 
	{ 
/*
		$ch = curl_init(); 
		
		curl_setopt ($ch, CURLOPT_URL, $url); 
		curl_setopt ($ch, CURLOPT_HEADER, 0); 
		
		ob_start(); 
		
		curl_exec ($ch); 
		curl_close ($ch); 
		$string = ob_get_contents(); 
		
		ob_end_clean(); 
		
		return $string; 

*/

  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
	} 

	
/* ----------------------------------------
	End Private "Helper" Functions
*/

}