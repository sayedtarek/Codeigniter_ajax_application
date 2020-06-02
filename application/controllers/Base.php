<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods", "GET, PUT, POST");
header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");


class Base extends CI_Controller {


	

	public function index(){
	    // load base_url 
	    $this->load->helper('url');
	   
	    //load model 
	    $this->load->model('Base_model');
	   
	    // get categories 
	    $data['categories'] = $this->Base_model->get_categories();
	   
	    // load view 
	    $this->load->view('base_view',$data); 
  	}

	
	public function subCat(){ 
	    // print_r(10); die();
	    $postData = $this->input->post();
	    
	    // load model 
	    $this->load->model('Base_model');
	    
	    // get data 
	    $data = $this->Base_model->getSubCat($postData);
	    echo json_encode($data); 
  	}


  	public function subSub(){ 
	    // POST data 
	    $postData = $this->input->post();

	    // load model 
	    $this->load->model('Base_model');
	    
	    // get data 
	    $data = $this->Base_model->getSubSub($postData);
	    echo json_encode($data); 
  	}
}
