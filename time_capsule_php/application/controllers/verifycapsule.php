<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyCapsule extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('download');
		$this->load->model('capsule','',TRUE);
		$this->load->model('capsuleitem','',TRUE);
	}
	
	function index(){
		$session_data = $this->session->userdata('logged_in');
		//Get all capsule ID's that belong to this user
		$capsules = $this->capsule->get_capsules($session_data['id']);
		$unlocked = $capsules['unlocked'];
		$locked = $capsules['locked'];
		
		//Get all of the items that belong to this capsule
		foreach($unlocked as &$capsule){
			$capsule->items = array();
			$items = $this->capsuleitem->get_items($capsule->capsule_id);
			foreach($items as $item){
				$capsule->items[] = array(
					'location' => $item->location,
					'item_name' => $item->item_name
					);
			}
		}
			
		$data = array(
			'username' => $session_data['username'],
			'error' => '',
			'unlocked' => $unlocked,
			'locked' => $locked
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
			//Form accepted, add the capsule and items to th database
			$capsule_id = $this->capsule->add_capsule();
			$this->capsuleitem->add_item($capsule_id);
			
			$capsules = $this->capsule->get_capsules($session_data['id']);
			$unlocked = $capsules['unlocked'];
			$locked = $capsules['locked'];
			foreach($unlocked as &$capsule){
				$capsule->items = array();
				$items = $this->capsuleitem->get_items($capsule->capsule_id);
				foreach($items as $item){
					$capsule->items[] = array(
						'location' => $item->location,
						'item_name' => $item->item_name
						);
				}
			}
			
			$data = array(
				'username' => $session_data['username'],
				'error' => '',
				'unlocked' => $unlocked,
				'locked' => $locked
				);
			
			//Reload the home view
			$this->load->view('home_view', $data);
		}
	}
	
}

