<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Dashboard';
		
		$this->load->model('model_supplier');
	}

	public function index()
	{
	    $todayDate = date("Y-m-d");
	    
	    $this->data['paid'] = $this->model_supplier->tobePaid($todayDate);
	    $this->data['received'] = $this->model_supplier->tobeReceived($todayDate);
	    
	    $this->data['quantity'] = $this->model_supplier->tobeQuantity();
	    
	   //   echo "<pre>"; print_r($paid); echo "</pre>"; exit;
	     
		$this->render_template('admin_view/dashboard', $this->data);
	}
}