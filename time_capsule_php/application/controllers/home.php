<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {
 
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('download');
		$this->load->model('capsule','',TRUE);
		$this->load->model('capsuleitem','',TRUE);
	}
 
	function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');

			//Get all capsule ID's that belong to this user
			$capsules = $this->capsule->get_capsules($session_data['id']);
			$unlocked = $capsules['unlocked'];
			$locked = $capsules['locked'];
			
			//Get all of the items for unlocked capsules
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
				
			//Load the home view
			$this->load->view('home_view', $data);
		}
		else{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
 
 
 	function download_item($capsule_id){
 		//Get the file path and file name requested for download
 		$data = $this->capsuleitem->get_resource_location($capsule_id);
 		$name = $data[0]->item_name;
 		$path = $data[0]->location;
 		force_download($name, $path);
 		
 		//Set other view variables
		$session_data = $this->session->userdata('logged_in');
		$capsules = $this->capsule->get_capsules($session_data['id']);
		$unlocked = $capsules['unlocked'];
		$locked = $capsules['locked'];
			
		//Get all of items for unlocked capsules
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
			'unlocked' => array(),
			'locked' => array()
			);
 	
 		redirect('home', 'refresh');
 	}
 	
 	
	function logout(){
		//Unsets the session and destroys it
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home', 'refresh');
	}

}