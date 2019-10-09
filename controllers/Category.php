<?php 

class Category extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Products Category';

		$this->load->model('model_category');
	}
	
	public function fecthCategory()
	{
	    $category = $_POST['category'];
	   // $category = 'cat1';
		$data = $this->model_category->fecthCategory($category);
		echo json_encode($data);
	}
	
	public function fecthSubCategory()
	{
	   // $subcate = 'cold';
	    $subcate = $_POST['subcate'];
	   // $category = 'cat1';
		$data = $this->model_category->fecthSubCategory($subcate);
		echo json_encode($data);
	}

	public function fecthActiveSubCategoryData()
	{
		$id = $_POST['id'];
		$data = $this->model_category->fecthActiveSubCategoryData($id);
		echo json_encode($data);
	}

	public function index()
	{
		if(!in_array('viewCategory', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->data['allData'] = $this->model_category->fecthAllCategoryData();
		$this->data['category'] = $this->model_category->fecthActiveCategoryData();
		$this->data['subcategory'] = $this->model_category->fecthAllSubCategoryData();

		$this->render_template('admin_view/productsCategory/index', $this->data);
	}

	public function createCategory()
	{
		if(!in_array('createCategory', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('name', 'Category Name', 'trim|required');
		$this->form_validation->set_rules('status', 'Active', 'trim|required');

		// $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'name' => $this->input->post('name'),
        		'status' => $this->input->post('status'),	
        	);
        // 	print_r($data); exit();
        	$create = $this->model_category->create($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('category');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('category');
        	}
        }
	}

	public function updateCategory()
	{
		if(!in_array('updateCategory', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('categoryname_edit', 'Category Name', 'trim|required');
		$this->form_validation->set_rules('categoryactive_edit', 'Active', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'id' => $this->input->post('categoryid_edit'),
        		'name' => $this->input->post('categoryname_edit'),
        		'status' => $this->input->post('categoryactive_edit'),	
        	);
        	// print_r($data); exit();
        	$create = $this->model_category->updateCategory($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('category');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('category');
        	}
        }
	}

	public function deleteCategory()
	{
		if(!in_array('deleteCategory', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$id = $this->input->post('id_edit');
		$delete = $this->model_category->deleteCategory($id);	

		if($delete == true) {

    		$this->session->set_flashdata('feedback','Record Deleted Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('category');
    	}
    	else{

    		$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('category');
    	}
	}

	// subcategory start

	public function createSubCategory()
	{
		if(!in_array('createCategory', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('name', 'Sub-Category Name', 'trim|required');
		$this->form_validation->set_rules('status', 'Active', 'trim|required');
		$this->form_validation->set_rules('category', 'Active', 'trim|required');

		// $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'name' => $this->input->post('name'),
        		'category_id' => $this->input->post('category'),
        		'status' => $this->input->post('status'),	
        	);
        	// print_r($data); exit();
        	$create = $this->model_category->createSubCategory($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('category');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('category');
        	}
        }
	}

	public function updateSubCategory()
	{
		if(!in_array('updateCategory', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('subcategoryname_edit', 'Sub-Category Name', 'trim|required');
		$this->form_validation->set_rules('subcategoryactive_edit', 'Active', 'trim|required');
		$this->form_validation->set_rules('categoryid_edit', 'Active', 'trim|required');

		// $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'id' => $this->input->post('subcategoryid_edit'),
        		'name' => $this->input->post('subcategoryname_edit'),
        		'status' => $this->input->post('subcategoryactive_edit'),
        		'category_id' => $this->input->post('categoryid_edit')
        	);
        	// print_r($data); exit();
        	$create = $this->model_category->updateSubCategory($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('category');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('category');
        	}
        }
	}

	public function deleteSubCategory()
	{
		if(!in_array('deleteCategory', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$id = $this->input->post('id_edit');
		// print_r($id);exit();
		$delete = $this->model_category->deleteSubCategory($id);	
		
		if($delete == true) {

    		$this->session->set_flashdata('feedback','Record Deleted Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('category');
    	}
    	else{

    		$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('category');
    	}
	}

	


}	