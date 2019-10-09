<?php 

class Purchase_return extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Purchase Return';
	}

	public function index()
	{
		if(!in_array('viewPurchaseReturn', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->render_template('admin_view/purchaseReturn/index', $this->data);
	}

	public function addInvoice()
	{
		if(!in_array('createPurchaseReturn', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->render_template('admin_view/purchaseInvoice/addInvoice', $this->data);
	}

	public function editInvoice()
	{
		if(!in_array('updatePurchaseReturn', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$this->render_template('admin_view/purchaseInvoice/editInvoice', $this->data);
	}


}	