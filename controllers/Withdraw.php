<?php 

class Withdraw extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Withdraw';

		$this->load->model('model_banking');
		$this->load->model('model_paymentmethod');

		$this->load->model('model_withdraw');
	}

	public function index()
	{
		if(!in_array('viewBankDeposit', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->data['allData'] = $this->model_banking->fecthAllAcccountData();
		$this->data['paymentmethod'] = $this->model_paymentmethod->fecthAllData();

		$this->data['withdrawData'] = $this->model_withdraw->fecthAllWithdrawData();

		$this->render_template('admin_view/banking/withdraw', $this->data);
	}

	public function create()
	{
		if(!in_array('createBankDeposit', $this->permission)){
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

        		'account_id' => $this->input->post('accountholder'),
        		'description' => $this->input->post('description'),
        		'amount' => $this->input->post('amount'),
        		'paymentmethod_id' => $this->input->post('payment_method'),
        		'reference' => $this->input->post('reference'),
        		'file' => $file['file_name']
    		);

    		$updateAmount = ($this->input->post('pre_amt') - $this->input->post('amount'));

    		// print_r($data); exit();

    		$create = $this->model_withdraw->create($data);

    	if($create == true) {
    		
    		$accountData = array(
    						'amt' => $updateAmount,
    						'id' => $this->input->post('account_id')
    					);

    		$this->model_banking->updateAmount($accountData);

    		$transactionData = array(
				'type' => 'withdraw',
				'account_id' => $this->input->post('accountholder'),
        		'amount' => $this->input->post('amount'),
			);

        		$this->model_banking->createTrasaction($transactionData);


    		$this->session->set_flashdata('feedback','Data Saved Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('withdraw');
    	}
    	else {
    		
    		$this->session->set_flashdata('feedback','Unable to Saved Data');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('withdraw');

		}
	}

	public function delete()
	{
		if(!in_array('deleteBankDeposit', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$id = $this->input->post('id_edit');
		$delete = $this->model_withdraw->delete($id);	

		if($delete == true) {

    		$this->session->set_flashdata('feedback','Record Deleted Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('withdraw');
    	}
    	else{

    		$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('withdraw');
    	}	
	}


}	