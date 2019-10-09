<?php 

class Deposits extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Deposite';

		$this->load->model('model_banking');
		$this->load->model('model_paymentmethod');
		$this->load->model('model_deposit');
	}

	public function index()	
	{
		if(!in_array('viewBankDeposit', $this->permission)){
            redirect('dashboard', 'refresh');
        }

	    $this->data['allData'] = $this->model_banking->fecthAllAcccountData();
		$this->data['paymentmethod'] = $this->model_paymentmethod->fecthAllData();
	    
		$this->data['depositsData'] = $this->model_deposit->fecthAllDepostData();

		$this->render_template('admin_view/banking/deposits/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createBankDeposit', $this->permission)){
            redirect('dashboard', 'refresh');
        }

        $this->data['allData'] = $this->model_banking->fecthAllAcccountData();
		$this->data['paymentmethod'] = $this->model_paymentmethod->fecthAllData();
	    
		$this->data['depositsData'] = $this->model_deposit->fecthAllDepostData();

		$this->render_template('admin_view/banking/deposits/create', $this->data);

	}

	public function createDeposite()
	{
		if(!in_array('createBankDeposit', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		// $this->form_validation->set_rules('amount', 'Amount', 'required|trim');

		// if ($this->form_validation->run() == TRUE){

			$config['upload_path'] = './uploads/images/';
	    	$config['allowed_types'] = 'jpeg|jpg|png|';
	    	$config['max_size'] = 1024 * 8;
	    	// echo "hi";exit();

	    	$this->load->library('upload', $config);
			$this->upload->initialize($config);

		    	$this->upload->do_upload('file');

		    	$file = $this->upload->data();

		    	$data = array(

	        		'account_id' => $this->input->post('account_id'),
	        		'description' => $this->input->post('description'),
	        		'amount' => $this->input->post('amount'),
	        		'paymentmethod_id' => $this->input->post('payment_method'),
	        		'reference' => $this->input->post('reference'),
	        		'file' => $file['file_name']
        		);

        		$updateAmount = ($this->input->post('amount') + $this->input->post('pre_amt'));
        		// print_r($data); exit();

        		$deposite_id = $this->model_deposit->create($data);
        		// print_r($create);exit();
	        	if($deposite_id) {
	        		
	        		$accountData = array(
	        						'amt' => $updateAmount,
	        						'id' => $this->input->post('account_id')
	        					);

	        		$this->model_banking->updateAmount($accountData);

	        		$transactionData = array(
	        									'deposite_id' => $deposite_id,
	        									'type' => 'deposite',
	        									'account_id' => $this->input->post('accountholder'),
	        									'amount' => $this->input->post('amount'),
	        								);

	        		$this->model_banking->createTrasaction($transactionData);

	        		$this->session->set_flashdata('feedback','Data Saved Successfully');
					$this->session->set_flashdata('feedback_class','alert alert-success');
					return redirect('deposits');
	        	}
	        	else {
	        		
	        		$this->session->set_flashdata('feedback','Unable to Saved Data');
					$this->session->set_flashdata('feedback_class','alert alert-danger');
					return redirect('deposits');

				}
	}

	public function update()
	{
		if(!in_array('updateBankDeposit', $this->permission)){
            redirect('dashboard', 'refresh');
        }

        $deposite_id = $this->uri->segment(3);

        $this->data['paymentmethod'] = $this->model_paymentmethod->fecthAllData();

        $this->data['depositeData'] = $this->model_deposit->fecthDepositsByID($deposite_id);
		
		$this->render_template('admin_view/banking/deposits/update', $this->data);
    }

	public function updateDeposits()
	{
		if(!in_array('updateBankDeposit', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$config['upload_path'] = './uploads/images/';
	    	$config['allowed_types'] = 'jpeg|jpg|png|';
	    	$config['max_size'] = 1024 * 8;
	    	// echo "hi";exit();

	    	$this->load->library('upload', $config);
			$this->upload->initialize($config);

		    	$this->upload->do_upload('file');

		    	$file = $this->upload->data();

		    	$data = array(

	        		'id' => $this->input->post('editid'),
	        		// 'account_id' => $this->input->post('edit_acid'),
	        		'description' => $this->input->post('description'),
	        		'amount' => $this->input->post('edit_amount'),
	        		'paymentmethod_id' => $this->input->post('payment_method'),
	        		'reference' => $this->input->post('edit_reference'),
	        		'file' => $file['file_name']
        		);

        		$amountDiff = $this->input->post('edit_amount') - $this->input->post('old_amount');

        		// echo $updateAmount = ($this->input->post('edit_amount') + $this->input->post('pre_amt'));
        		$accountAmount = $this->model_banking->fecthAcccountDataByID($this->input->post('edit_acid'));
        		// echo $accountAmount['amt']; echo "<br>";
        		$updateAmount = $accountAmount['amt'] + $amountDiff;
        		// print_r($data); exit();

        		$create = $this->model_deposit->update($data);

	        	if($create == true) {
	        		
	        		$accountData = array(
	        						'amt' => $updateAmount,
	        						'id' => $this->input->post('edit_acid')
	        					);
	        		// print_r($accountData); exit();
	        		$this->model_banking->updateAmount($accountData);

	        		$transactionData = array(
	        									'deposite_id' => $this->input->post('editid'),
	        									'type' => 'deposite',
	        									'account_id' => $this->input->post('edit_acid'),
	        									'amount' => $this->input->post('edit_amount'),
	        								);
	        		// print_r($transactionData);exit();
	        		$this->model_banking->updateTrasaction($transactionData);

	        		$this->session->set_flashdata('feedback','Data Saved Successfully');
					$this->session->set_flashdata('feedback_class','alert alert-success');
					return redirect('deposits');
	        	}
	        	else {
	        		
	        		$this->session->set_flashdata('feedback','Unable to Saved Data');
					$this->session->set_flashdata('feedback_class','alert alert-danger');
					return redirect('deposits');

				}
	}

	public function delete()
	{
		if(!in_array('deleteBankDeposit', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$id = $this->input->post('id_edit');
		$delete = $this->model_deposit->delete($id);	

		if($delete == true) {

    		$this->session->set_flashdata('feedback','Record Deleted Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('deposits');
    	}
    	else{

    		$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('banking');
    	}	
	}


}	