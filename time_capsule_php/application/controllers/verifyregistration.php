<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class VerifyRegistration extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('user','',TRUE);
	}

	function index(){
		//This method will have the credentials validation
		$this->load->library('form_validation');
 
		$this->form_validation->set_rules('register_username', 'Username', 'trim|required|xss_clean|is_unique[users.username]');
		$this->form_validation->set_rules('register_password', 'Password', 'trim|required|matches[password_conf]|md5');
 		$this->form_validation->set_rules('password_conf', 'Password Confirmation', 'trim|required|');
 
		if($this->form_validation->run() == FALSE){
			//Failed form validation, regurn to register_view to display errors
			$this->load->view('register_view');
		}
		else{
			//Get the username and password from the request
			$username = $this->input->post('register_username');
			$password = $this->input->post('register_password');
			
			$data = array(
				'username' => $username,
				'password' => $password
			);
			
			//Insert new user into the database
			$this->db->insert('users', $data);
			
			redirect('login', 'refresh');
		}
	}
}