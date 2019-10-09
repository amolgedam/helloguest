<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Coupons extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Coupon';

		$this->load->model('model_coupon');
    }

	public function index()
	{
        if(!in_array('viewCoupon', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->data['allData'] = $this->model_coupon->fecthAllData();
        $this->render_template('admin_view/coupons/index', $this->data);
	}

	public function create()
	{
        if(!in_array('createCoupon', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('name', 'Coupon Name', 'trim|required');
		$this->form_validation->set_rules('off', 'Offer', 'trim|required');
		$this->form_validation->set_rules('start', 'Starting Slot', 'trim|required');
		$this->form_validation->set_rules('end', 'Ending Slot', 'trim|required');
		$this->form_validation->set_rules('status', 'Active', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'name' => $this->input->post('name'),
        		'description' => $this->input->post('description'),
        		'off_type' => $this->input->post('off_type'),
        		'off' => $this->input->post('off'),	
        		'starting_slot' => $this->input->post('start'),	
        		'ending_slot' => $this->input->post('end'),	
        		'status' => $this->input->post('status'),	
        	);
        	// print_r($data); exit();
        	$create = $this->model_coupon->create($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('coupons');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('coupons');
        	}
        }
	}

	public function update($id = null)
	{
        if(!in_array('updateCoupon', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('name_edit', 'Coupon Name', 'trim|required');
		$this->form_validation->set_rules('off_edit', 'Offer', 'trim|required');
		$this->form_validation->set_rules('start_edit', 'Starting Slot', 'trim|required');
		$this->form_validation->set_rules('end_edit', 'Ending Slot', 'trim|required');
		$this->form_validation->set_rules('status_edit', 'Active', 'trim|required');

		if ($this->form_validation->run() == TRUE){

        	$data = array(
        		'id' => $this->input->post('id_edit'),
        		'name' => $this->input->post('name_edit'),
        		'description' => $this->input->post('description_edit'),
        		'off_type' => $this->input->post('off_type_edit'),
        		'off' => $this->input->post('off_edit'),	
        		'starting_slot' => $this->input->post('start_edit'),	
        		'ending_slot' => $this->input->post('end_edit'),	
        		'status' => $this->input->post('status_edit'),	
        	);
			// print_r($data); exit();

        	$update = $this->model_coupon->update($data);
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('coupons/');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('coupons/update/'.$id);
        	}
        }	
	}

	public function delete()
	{
        if(!in_array('deleteCoupon', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$id = $this->input->post('id_edit');
		$delete = $this->model_coupon->delete($id);	

		if($delete == true) {

    		$this->session->set_flashdata('feedback','Record Deleted Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('coupons');
    	}
    	else{

    		$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('coupons');
    	}	
	}
}	