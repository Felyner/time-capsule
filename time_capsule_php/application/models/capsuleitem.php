<?php

class CapsuleItem extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function add_item($capsule_id){
		//Adds one item associated with a capsule
		$upload_data = $this->upload->data();
		$location = $upload_data['file_path'];
		$file_name = $upload_data['file_name'];
		
		$data = array(
			'capsule_id' => $capsule_id,
			'location' => $location,
			'item_name' => $file_name
			);
		$this->db->insert('capsule_item', $data);	
	}
	
	function get_items($capsule_id){
		//Gets all items associated with a capsule
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
	
	function get_resource_location($capsule_id){
		//Gets the location of an item in the filesystem.
		$this->db->select('location, item_name');
		$this->db->from('capsule_item');
		$this->db->where('capsule_id', $capsule_id);
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
		
		
}