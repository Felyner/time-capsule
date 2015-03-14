<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyCapsule extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('capsule','',TRUE);
		$this->load->model('capsuleitem','',TRUE);
	}
	
	function index(){
		$session_data = $this->session->userdata('logged_in');
		$data = array(
			'username' => $session_data['username'],
			'error' => 'none'
			);

		//Validation for capsule name and unlock value
		$this->load->library('form_validation');
		$this->form_validation->set_rules('capsule_name', 'Capsule Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('unlock_date', 'Unlock Value', 'required');
				
		if(! $this->upload->do_upload('capsule_item') and $this->form_validation->run()){
			$data['error'] = $this->upload->display_errors();
			$this->load->view('home_view', $data);
		}
		else{
			$capsule_id = $this->capsule->add_capsule();
			$this->capsuleitem->add_item($capsule_id);
			redirect('home', 'refresh');
		}

	}
	
}

