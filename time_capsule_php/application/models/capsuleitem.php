<?php

class CapsuleItem extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function add_item($capsule_id){
		$upload_data = $this->upload->data();
		$location = $upload_data['file_path'];
		
		$data = array(
			'capsule_id' => $capsule_id,
			'location' => $location
			);
		$this->db->insert('capsule_item', $data);	
	}
	
	function get_items($capsule_id){
		$this->db->select('location, item_name');
		$this->db->from('capsule_item');
		$this->db->where('capsule_id', $capsule_id);
		$this->db->order_by('item_id', 'asc');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function get_resourse_location($capsule_id){
		$this->db->select('location, item_name');
		$this->db->from('capsule_item');
		$this->db->where('capsule_id', $capsule_id);
		$query = $this->db->get();
		
		return $query->result();
	}
		
}