<?php 

class Supplier extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Supplier';

		$this->load->model('model_supplier');
	}

	public function index()
	{
		if(!in_array('viewSupplier', $this->permission)){
            redirect('dashboard', 'refresh');
        }

	    $this->data['allData'] = $this->model_supplier->fecthAllData();

		$this->render_template('admin_view/supplier/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createSupplier', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('name', 'Supplier Name', 'required|trim');
// 		$this->form_validation->set_rules('email', 'Email Address', 'required|trim');
// 		$this->form_validation->set_rules('phone', 'Phone Number', 'required|trim');
// 		$this->form_validation->set_rules('gstin', 'GSTIN Number', 'required|trim');
// 		$this->form_validation->set_rules('pan', 'PAN Number', 'required|trim');
// 		$this->form_validation->set_rules('address', 'Address', 'required|trim');
// 		$this->form_validation->set_rules('postal_code', 'Postal Code', 'required|trim');

		if ($this->form_validation->run() == TRUE){

			$data = array(
        		'name' => $this->input->post('name'),
        		'email' => $this->input->post('email'),
        		'phone' => $this->input->post('phone'),
        		'gstin' => $this->input->post('gstin'),
        		'pan' => $this->input->post('pan'),
        		'address' => $this->input->post('address'),
        		'state' => $this->input->post('state'),
        		'city' => $this->input->post('city'),
        		'postal_code' => $this->input->post('postal_code'),
        		'status' => $this->input->post('status'),
        	);
        	// print_r($data); exit();
        	$create = $this->model_supplier->create($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Record Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('supplier');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Record');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('supplier/create');
        	}
		}
		else
		{
			$this->render_template('admin_view/supplier/create', $this->data);
		}
	}

    public function update()
    {
        if(!in_array('updateSupplier', $this->permission)){
            redirect('dashboard', 'refresh');
        }

        $supplier_id = $this->uri->segment(3);

        $this->data['supplierData'] = $this->model_supplier->fecthDataByID($supplier_id);

        $this->render_template('admin_view/supplier/update', $this->data);
    }

	public function updateSupplier()
	{
		if(!in_array('updateSupplier', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('name', 'Supplier Name', 'required|trim');
// 		$this->form_validation->set_rules('edit_email', 'Email Address', 'required|trim');
// 		$this->form_validation->set_rules('edit_phone', 'Phone Number', 'required|trim');
// 		$this->form_validation->set_rules('edit_gstin', 'GSTIN Number', 'required|trim');
// 		$this->form_validation->set_rules('edit_pan', 'PAN Number', 'required|trim');
// 		$this->form_validation->set_rules('edit_address', 'Address', 'required|trim');
// 		$this->form_validation->set_rules('edit_postalcode', 'Postal Code', 'required|trim');

		if ($this->form_validation->run() == TRUE) {

			$data = array(
        		'id' => $this->input->post('id'),
        		'name' => $this->input->post('name'),
        		'email' => $this->input->post('email'),
        		'phone' => $this->input->post('phone'),
        		'gstin' => $this->input->post('gstin'),
        		'pan' => $this->input->post('pan'),
        		'address' => $this->input->post('address'),
        		'state' => $this->input->post('state'),
        		'city' => $this->input->post('city'),
        		'postal_code' => $this->input->post('postal_code'),
        		'status' => $this->input->post('status'),
        	);
            // print_r($data); exit();
        	$update = $this->model_supplier->update($data);

        	if($update == true) {
        		
        		$this->session->set_flashdata('feedback','Record Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('supplier');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Record');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('supplier');
        	}
		}
	}

	public function delete()
	{
		if(!in_array('deleteSupplier', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$id = $this->input->post('id_edit');
		$delete = $this->model_supplier->delete($id);	

		if($delete == true) {

    		$this->session->set_flashdata('feedback','Record Deleted Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('supplier');
    	}
    	else{

    		$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('supplier');
    	}	
	}


}	