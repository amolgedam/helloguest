<?php 

class Customer extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Customer';

		$this->load->model('model_customer');
	}

	public function index()
	{
		if(!in_array('viewCustomer', $this->permission)){
            redirect('dashboard', 'refresh');
        }

	    $this->data['allData'] = $this->model_customer->fecthAllData();
		$this->render_template('admin_view/customer/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createCustomer', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('name', 'Customer Name', 'required|trim');
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
        	$create = $this->model_customer->create($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('customer');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('customer/create');
        	}
		}
		else
		{
			$this->render_template('admin_view/customer/create', $this->data);
		}
	}
	
	// from sales invoice
    public function createCustomer()
    {
        if(!in_array('createCustomer', $this->permission)){
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('name', 'Customer Name', 'required|trim');
//      $this->form_validation->set_rules('email', 'Email Address', 'required|trim');
//      $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim');
//      $this->form_validation->set_rules('gstin', 'GSTIN Number', 'required|trim');
//      $this->form_validation->set_rules('pan', 'PAN Number', 'required|trim');
//      $this->form_validation->set_rules('address', 'Address', 'required|trim');
//      $this->form_validation->set_rules('postal_code', 'Postal Code', 'required|trim');

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
            $create = $this->model_customer->create($data);

            if($create == true) {
                
                $this->session->set_flashdata('feedback','Data Saved Successfully');
                $this->session->set_flashdata('feedback_class','alert alert-success');
                return redirect('sales_invoice/create');
            }
            else {
                
                $this->session->set_flashdata('feedback','Unable to Saved Data');
                $this->session->set_flashdata('feedback_class','alert alert-danger');
                return redirect('customer/createCustomer');
            }
        }
        else
        {
            $this->render_template('admin_view/customer/createCustomer', $this->data);
        }
    }
    
    // from Quotation
    public function createCustomerFromQuotation()
    {
        if(!in_array('createCustomer', $this->permission)){
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('name', 'Customer Name', 'required|trim');
//      $this->form_validation->set_rules('email', 'Email Address', 'required|trim');
//      $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim');
//      $this->form_validation->set_rules('gstin', 'GSTIN Number', 'required|trim');
//      $this->form_validation->set_rules('pan', 'PAN Number', 'required|trim');
//      $this->form_validation->set_rules('address', 'Address', 'required|trim');
//      $this->form_validation->set_rules('postal_code', 'Postal Code', 'required|trim');

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
            $create = $this->model_customer->create($data);

            if($create == true) {
                
                $this->session->set_flashdata('feedback','Data Saved Successfully');
                $this->session->set_flashdata('feedback_class','alert alert-success');
                return redirect('quotation');
                
            }
            else {
                
                $this->session->set_flashdata('feedback','Unable to Saved Data');
                $this->session->set_flashdata('feedback_class','alert alert-danger');
                return redirect('customer/createCustomerFromQuotation');
            }
        }
        else
        {
            $this->render_template('admin_view/customer/createCustomerFromQuotation', $this->data);
        }
    }

    public function update()
    {
        if(!in_array('updateCustomer', $this->permission)){
            redirect('dashboard', 'refresh');
        }

        $customer_id = $this->uri->segment(3);

        $this->data['customerData'] = $this->model_customer->fecthDataByID($customer_id);

        $this->render_template('admin_view/customer/update', $this->data);
    }

	public function updateCustomer()
	{
		if(!in_array('updateCustomer', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('name', 'Customer Name', 'required|trim');
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
        	$update = $this->model_customer->update($data);

        	if($update == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('customer');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('customer');
        	}
		}
	}

	public function delete()
	{
		if(!in_array('deleteCustomer', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$id = $this->input->post('id_edit');
		$delete = $this->model_customer->delete($id);	

		if($delete == true) {

    		$this->session->set_flashdata('feedback','Record Deleted Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('customer');
    	}
    	else{

    		$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('customer');
    	}	
	}
}	