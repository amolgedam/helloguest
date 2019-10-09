<?php 

class Payment_term extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Transaction Type';

		$this->load->model('model_paymentterm');
	}

	public function index()
	{
		if(!in_array('viewProductUnit', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->data['allData'] = $this->model_paymentterm->fecthAllData();
		$this->render_template('admin_view/settings/paymentTerm', $this->data);
	}

	public function create()
	{
		if(!in_array('createProductUnit', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		// print_r($this->input->post());exit();
		$this->form_validation->set_rules('name', 'Paymentor Name', 'trim|required');
		$this->form_validation->set_rules('active', 'Active', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'name' => $this->input->post('name'),
        		'status' => $this->input->post('active'),	
        	);
        	// print_r($data); exit();
        	$create = $this->model_paymentterm->create($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('payment_term');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('payment_term');
        	}
        }
	}

	public function updatePaymentor()
	{
		if(!in_array('updateProductUnit', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('name_edit', 'Paymentor Name', 'trim|required');
		$this->form_validation->set_rules('active_edit', 'Active', 'trim|required');

		// $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'id' => $this->input->post('id_edit'),
        		'name' => $this->input->post('name_edit'),
        		'active' => $this->input->post('active_edit'),	
        	);
        	// print_r($data); exit();
        	$create = $this->model_paymentterm->update($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('payment_term');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('payment_term');
        	}
        }
	}

	public function deletePaymentor()
	{
		if(!in_array('deleteProductUnit', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$id = $this->input->post('id_edit');
		$delete = $this->model_paymentterm->deletePaymentor($id);	

		if($delete == true) {

    		$this->session->set_flashdata('feedback','Record Deleted Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('payment_term');
    	}
    	else{

    		$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('payment_term');
    	}
	}

}	