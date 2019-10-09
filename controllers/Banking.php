<?php 

class Banking extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Banking Transaction';

		$this->load->model('model_banking');
		$this->load->model('model_category');
		$this->load->model('model_paymentmethod');	
	}

	public function holderData()
	{
		$accountholderID = $_POST['accountholderID'];
	    $accountData = $this->model_banking->holderData($accountholderID);
	    echo json_encode($accountData);
	}

	public function index()
	{
		if(!in_array('viewTransaction', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('from', 'Date From', 'required|trim');
		$this->form_validation->set_rules('to', 'Date To', 'required|trim');
		// $this->form_validation->set_rules('type', 'Transaction Type', 'required|trim');
		// $this->form_validation->set_rules('category_id', 'Category Name', 'required|trim');

		if ($this->form_validation->run() == TRUE){

			$data = array(
							'from' => $this->input->post('from'),
							'to' => $this->input->post('to'),
							'type' => $this->input->post('type'),
							// 'category_id' => $this->input->post('category_id'),
							'account_id' => $this->input->post('account_id'),
						);

			$this->data['allData'] = $this->model_banking->fecthAllAcccountData();
			$this->data['category'] = $this->model_category->fecthActiveCategoryData();

			$this->data['transactionData'] = $this->model_banking->fecthSearchTransaction($data);
			// echo "<pre>"; print_r($data); echo "</pre>"; exit();
			$this->render_template('admin_view/banking/index', $this->data);
		}
		else
		{
			$this->data['allData'] = $this->model_banking->fecthAllAcccountData();
			$this->data['category'] = $this->model_category->fecthActiveCategoryData();
			// $this->data['paymentmethod'] = $this->model_paymentmethod->fecthAllData();

			$this->data['transactionData'] = $this->model_banking->fecthAllTransaction();

			$this->render_template('admin_view/banking/index', $this->data);
		}
	}

	public function bankAccount()
	{
		if(!in_array('viewBankAccount', $this->permission)){
            redirect('dashboard', 'refresh');
        }

	    $this->data['allData'] = $this->model_banking->fecthAllAcccountData();
		$this->render_template('admin_view/banking/account/index', $this->data);
	}

	public function createAccount()
	{
		if(!in_array('createBankAccount', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('name', 'Account Name', 'required|trim');
		$this->form_validation->set_rules('type', 'Account Type', 'required|trim');
		$this->form_validation->set_rules('number', 'Account Number', 'required|trim');
		$this->form_validation->set_rules('bank_name', 'Bank Name', 'required|trim');
		$this->form_validation->set_rules('opening_balance', 'Opening Balance', 'required|trim');
		$this->form_validation->set_rules('address', 'Bank Address', 'required|trim');
		$this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'required|trim');
		$this->form_validation->set_rules('default_account', 'Default Account', 'required|trim');

		if ($this->form_validation->run() == TRUE){

			$data = array(
        		'name' => $this->input->post('name'),
        		'type' => $this->input->post('type'),
        		'ac_number' => $this->input->post('number'),
        		'bank_name' => $this->input->post('bank_name'),
        		'opening_balance' => $this->input->post('opening_balance'),
        		'amt' => $this->input->post('opening_balance'),
        		'address' => $this->input->post('address'),
        		// 'bank_account' => $this->input->post('bank_account'),
        		'ifsc' => $this->input->post('ifsc_code'),
        		'default_ac' => $this->input->post('default_account')
        	);	
        	// print_r($data); exit();
        	$create = $this->model_banking->createAccount($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('banking/bankAccount');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('banking/bankAccount');
        	}
		}
		else
		{
	    	$this->data['allData'] = $this->model_banking->fecthAllAcccountData();

			$this->render_template('admin_view/banking/account/create', $this->data);
		}
	}

	public function updateAccount()
	{
		if(!in_array('updateBankAccount', $this->permission)){
            redirect('dashboard', 'refresh');
        }

        $account_id = $this->uri->segment(3);
        // exit();
        $this->data['accountData'] = $this->model_banking->fecthAcccountDataByID($account_id);

		$this->form_validation->set_rules('name', 'Account Name', 'required|trim');
		$this->form_validation->set_rules('type', 'Account Type', 'required|trim');
		$this->form_validation->set_rules('number', 'Account Number', 'required|trim');
		$this->form_validation->set_rules('bank_name', 'Bank Name', 'required|trim');
		// $this->form_validation->set_rules('opening_balance', 'Opening Balance', 'required|trim');
		$this->form_validation->set_rules('address', 'Bank Address', 'required|trim');
		$this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'required|trim');
		$this->form_validation->set_rules('default_account', 'Default Account', 'required|trim');

		if ($this->form_validation->run() == TRUE){

			$data = array(
        		'id' => $this->input->post('id'),
        		'name' => $this->input->post('name'),
        		'type' => $this->input->post('type'),
        		'ac_number' => $this->input->post('number'),
        		'bank_name' => $this->input->post('bank_name'),
        		// 'opening_balance' => $this->input->post('edit_opbalance'),
        		'amt' => $this->input->post('opening_balance'),
        		'address' => $this->input->post('address'),
        		// 'bank_account' => $this->input->post('bank_account'),
        		'ifsc' => $this->input->post('ifsc_code'),
        		'default_ac' => $this->input->post('default_account')
        	);
        	// print_r($data); exit();
        	$create = $this->model_banking->updateAccount($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('banking/bankAccount');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('banking/bankAccount');
        	}
		}
		else
		{
			$this->render_template('admin_view/banking/account/update', $this->data);
		}
	}

	public function deleteAccount()
	{
		if(!in_array('deleteBankAccount', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$id = $this->input->post('id_edit');
		$delete = $this->model_banking->deleteAccount($id);	

		if($delete == true) {

    		$this->session->set_flashdata('feedback','Record Deleted Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');

			return redirect('banking/bankAccount');
    	}
    	else{

    		$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			
			return redirect('banking/bankAccount');
    	}	
	}


}	