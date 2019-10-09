<?php 

class Sales_exchange extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Sales';

		$this->load->model('model_products');
		$this->load->model('model_customer');
		$this->load->model('model_paymentmethod');
		$this->load->model('model_paymentterm');
	}

	public function index()
	{
		if(!in_array('viewSalesExchange', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->render_template('admin_view/salesExchange/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createSalesExchange', $this->permission)){
            redirect('dashboard', 'refresh');
        }

	    $this->data['allData'] = $this->model_products->fecthAllProductsData();
	    $this->data['customer'] = $this->model_customer->fecthAllData();
		$this->data['paymentmethod'] = $this->model_paymentmethod->fecthAllData();
		$this->data['paymentterm'] = $this->model_paymentterm->fecthAllData();


		$this->render_template('admin_view/salesExchange/create', $this->data);
	}

	public function update()
	{
		if(!in_array('updateSalesExchange', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
	    $this->data['allData'] = $this->model_products->fecthAllProductsData();
	    $this->data['customer'] = $this->model_customer->fecthAllData();
		$this->data['paymentmethod'] = $this->model_paymentmethod->fecthAllData();
		$this->data['paymentterm'] = $this->model_paymentterm->fecthAllData();

		
		$this->render_template('admin_view/salesExchange/update', $this->data);
	}



}	