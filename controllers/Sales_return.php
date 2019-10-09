<?php 

class Sales_return extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Sales';
	}

	public function index()
	{
		if(!in_array('viewSalesReturn', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->render_template('admin_view/salesReturn/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createSalesReturn', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->render_template('admin_view/salesReturn/create', $this->data);
	}

	public function update()
	{
		if(!in_array('updateSalesReturn', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$this->render_template('admin_view/salesReturn/update', $this->data);
	}



}	