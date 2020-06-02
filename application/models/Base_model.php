<?php
/**
 *
 */
class Base_model extends CI_Model {

	

	public function get_categories() {
		$response = [];
		// Select record
		$this->db->select('category');
		$this->db->group_by('category');
		$q = $this->db->get('base');
		$response = $q->result_array();

    	return $response;
	}


	// Get Sub Categories
	public function getSubCat($data){
		// print_r($data['category']); die;
	    $response = [];
	 
	    // Select record
	    $this->db->select('category,sub_cat');
	    $this->db->where('category', $data['category']);
	    $this->db->group_by(['category','sub_cat']);
	    $q = $this->db->get('base');
	    $response = $q->result_array();

	    return $response;
	}

	// Get Sub_sub

	 
  	public function getSubSub($data){
	    $response = [];

	    $multipleWhere = ['category' => $data['category'], 'sub_cat' => $data['sub_cat'] ];
	    // Select record
	    $this->db->select('category,sub_cat,sub_sub');
	    $this->db->where($multipleWhere);
	    $q = $this->db->get('base');
	    $response = $q->result_array();

	    return $response;
  	}




}

?>
