<?php 

class Salesman extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Salesman';
		$this->load->model('model_salesman');

	}

	public function index()
	{
		if(!in_array('viewSalesman', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->data['allData'] = $this->model_salesman->fecthAllData();
		$this->render_template('admin_view/settings/salesman', $this->data);
	}

	public function create()
	{
		if(!in_array('createSalesman', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('name', 'Unit Name', 'trim|required');
		$this->form_validation->set_rules('active', 'Active', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'name' => $this->input->post('name'),
        		'status' => $this->input->post('active'),	
        	);
        	// print_r($data); exit();
        	$create = $this->model_salesman->create($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('salesman');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('salesman');
        	}
        }
	}

	public function update()
	{
		if(!in_array('updateSalesman', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('name_edit', 'Salesman Name', 'trim|required');
		$this->form_validation->set_rules('active_edit', 'Active', 'trim|required');

		// $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'id' => $this->input->post('id_edit'),
        		'name' => $this->input->post('name_edit'),
        		'status' => $this->input->post('active_edit'),	
        	);
        	// print_r($data); exit();
        	$create = $this->model_salesman->update($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('salesman');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('salesman');
        	}
        }
	}

	public function delete()
	{
		if(!in_array('deleteSalesman', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$id = $this->input->post('id_edit');
		$delete = $this->model_salesman->delete($id);	

		if($delete == true) {

    		$this->session->set_flashdata('feedback','Record Deleted Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('salesman');
    	}
    	else{

    		$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('salesman');
    	}
	}

}