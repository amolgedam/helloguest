<?php 

class Payment_method extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Payment Method';

		$this->load->model('model_paymentmethod');
	}

	public function fecthDataByID()
	{
		$pmethod_id = $_POST['pmethod_id'];
		$data = $this->model_paymentmethod->fecthDataByID($pmethod_id);
		echo json_encode($data);
	}

	public function index()
	{
		if(!in_array('viewPaymentMethod', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->data['allData'] = $this->model_paymentmethod->fecthAllData();
		$this->render_template('admin_view/settings/paymentMethod', $this->data);
	}

	public function create()
	{
		if(!in_array('createPaymentMethod', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		// print_r($this->input->post());exit();
		$this->form_validation->set_rules('name', 'Payment Method', 'trim|required');
		$this->form_validation->set_rules('active', 'Active', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
        	$data = array(	
        		'name' => $this->input->post('name'),
        		'status' => $this->input->post('active'),	
        	);
        	// print_r($data); exit();
        	$create = $this->model_paymentmethod->create($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('payment_method');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('payment_method');
        	}
        }
	}

	public function update()
	{
		if(!in_array('updatePaymentMethod', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('name_edit', 'Payment Method', 'trim|required');
		$this->form_validation->set_rules('active_edit', 'Active', 'trim|required');

		// $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'id' => $this->input->post('id_edit'),
        		'name' => $this->input->post('name_edit'),
        		'active' => $this->input->post('active_edit'),	
        	);
        	// print_r($data); exit();
        	$create = $this->model_paymentmethod->update($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('payment_method');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('payment_method');
        	}
        }
	}

	public function delete()
	{
		if(!in_array('deletePaymentMethod', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$id = $this->input->post('id_edit');
		$delete = $this->model_paymentmethod->delete($id);	

		if($delete == true) {

    		$this->session->set_flashdata('feedback','Record Deleted Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('payment_method');
    	}
    	else{

    		$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('payment_method');
    	}
	}

}