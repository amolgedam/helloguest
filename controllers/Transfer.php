<?php 

class Transfer extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Transfer';

		$this->load->model('model_banking');
		$this->load->model('model_paymentmethod');
		$this->load->model('model_transfer');
	}

	public function index()
	{
		if(!in_array('viewTransfer', $this->permission)){
            redirect('dashboard', 'refresh');
        }

	    $this->data['allData'] = $this->model_banking->fecthAllAcccountData();
		$this->data['paymentmethod'] = $this->model_paymentmethod->fecthAllData();

		$this->data['transferData'] = $this->model_transfer->fecthAllTransferData();

		$this->render_template('admin_view/banking/transfer', $this->data);
	}

	public function create()
	{
		if(!in_array('createTransfer', $this->permission)){
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

	        		'accountfrom_id' => $this->input->post('accountholderfrom'),
	        		'accountfrom_name' => $this->input->post('fromname'),
	        		'accountto_id' => $this->input->post('accountholderto'),
	        		'accountto_name' => $this->input->post('toname'),
	        		'date' => $this->input->post('date'),
	        		'description' => $this->input->post('description'),
	        		'amount' => $this->input->post('amount'),
	        		'paymentmethod_id' => $this->input->post('payment_method'),
	        		'reference' => $this->input->post('reference'),
	        		'file' => $file['file_name']
        		);
		    	// print_r($data);exit();
        		$create = $this->model_transfer->create($data);

        	if($create == true) {
        		$amount = $this->input->post('amount');
        		$from = $this->input->post('fromamt');
        		$to = $this->input->post('toamt');
        		
        		$updateAmountFrom = ($this->input->post('fromamt') - $this->input->post('amount'));
        		$updateAmountTo = ($this->input->post('toamt') + $this->input->post('amount'));
        		// exit();

        		$dataFrom = array(
        							'amt' => $updateAmountFrom,
        							'id' => $this->input->post('fromid')
        						);
        		// print_r($dataFrom); echo "<br>"; //exit();
        		$this->model_banking->updateAmount($dataFrom);



        		$datato = array(
        							'amt' => $updateAmountTo,
        							'id' => $this->input->post('toid')
        						);
        		// print_r($datato); exit();
        		$this->model_banking->updateAmount($datato);


        		$transactionData = array(
        									'type' => 'transfer',
        									'account_id' => $this->input->post('accountholderfrom'),
        									'amount' => $this->input->post('amount')
        								);

        		$this->model_banking->createTrasaction($transactionData);


        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('transfer');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('transfer');
			}
	}

	public function delete()
	{
		if(!in_array('deleteTransfer', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$id = $this->input->post('id_edit');
		$delete = $this->model_transfer->delete($id);	

		if($delete == true) {

    		$this->session->set_flashdata('feedback','Record Deleted Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('transfer');
    	}
    	else{

    		$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('transfer');
    	}	
	}


}	