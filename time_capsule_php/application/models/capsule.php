<?php

class Capsule extends CI_Model{

	var $items = array();
	
	function __construct(){
		parent::__construct();
	}
	
	function add_capsule(){
		//Adds a capsule to the database
		$capsule = $this->input->post('capsule_name');
		$unlock = $this->input->post('unlock_date');
		$user_id = $this->session->userdata('logged_in')['id'];
			
		$insert =  array(
			'capsule_name' => $capsule,
			'ts_unlock' => $unlock,
			'user_id' => $user_id
			);
			
		$this->db->insert('capsule', $insert);
		
		return $this->db->insert_id();
	}
	
	function get_capsules($user_id){
		//gets all unlocked and locked capsules for a user
		$this->db->select('capsule_id, capsule_name, ts_unlock');
		$this->db->from('capsule');
		$this->db->where('user_id', $user_id);
		$this->db->where('ts_unlock <= ', date('Y-m-d', time()));
		$this->db->order_by('ts_unlock', 'asc');
		$unlocked = $this->db->get();
		
		$this->db->select('capsule_id, capsule_name, ts_unlock');
		$this->db->from('capsule');
		$this->db->where('user_id', $user_id);
		$this->db->where('ts_unlock >', date('Y-m-d', time()));
		$this->db->order_by('ts_unlock', 'asc');
		$locked = $this->db->get();
		
		return array(
			'unlocked' => $unlocked->result(),
			'locked' => $locked->result()
			);
	}
}



