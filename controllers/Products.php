<?php 

class Products extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Products';

		$this->load->model('model_products');
		$this->load->model('model_category');
		$this->load->model('model_unit');
		$this->load->model('model_size');
	}
	
	public function checkPInvoice()
	{
	    $pinvoice = $_POST['invoice_no'];
	   // $pinvoice = 789;
	    
	    $pinvoice = $this->model_products->checkPInvoice($pinvoice);
	    
	    if($pinvoice)
	    {
	        $data = true;
	    }
	    else
	    {
	        $data = false;
	    }
	    
	    echo json_encode($data);
	}

	public function fecthAllProductsData()
	{
	    $data = $this->model_products->fecthAllProductsData();
	    echo json_encode($data);
	}

	public function getProductsDataByID()
	{
		// product id
		// $id = 14;
		$id = $this->input->post('product_name');
		if($id) {
			$product_data = $this->model_products->getProductsDataByID($id);
			echo json_encode($product_data);
		}
	}

	public function index()
	{
		if(!in_array('viewProduct', $this->permission)){
            redirect('dashboard', 'refresh');
        }

	    $this->data['allData'] = $this->model_products->fecthAllProductsData();
	    // echo "<pre>"; print_r($productsData); echo "</pre>"; exit();
		// $this->data['allData'] = $productsData;
	    $this->data['unit'] = $this->model_unit->fecthActiveSalesTypeData();
	    $this->data['size'] = $this->model_size->fecthActiveSalesTypeData();

		$this->render_template('admin_view/products/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createProduct', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('product_code', 'Product Code', 'required|trim');
		$this->form_validation->set_rules('name', 'Product Name', 'required|trim');
		$this->form_validation->set_rules('purchase_price', 'Purchase Price', 'required|trim');
		$this->form_validation->set_rules('hsn', 'HSN', 'required|trim');
		$this->form_validation->set_rules('gst', 'GST', 'required|trim');

		if ($this->form_validation->run() == TRUE){

			$data = array(
        		'product_code' => $this->input->post('product_code'),
        		'name' => $this->input->post('name'),
        		'category' => $this->input->post('category'),
        // 		'subcategory' => $this->input->post('subcategory'),
        		'unit' => $this->input->post('unit'),
        		'purchase_price' => $this->input->post('purchase_price'),
        		'hsn' => $this->input->post('hsn'),
        		'sales_price' => $this->input->post('sales_price'),
        		'gst' => $this->input->post('gst'),
        // 		'size' => $this->input->post('size'),
        		'status' => $this->input->post('status'),
        		'description' => $this->input->post('description'),
        	);
        	// print_r($data); exit();
        	$create = $this->model_products->create($data);

        	if($create == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('products');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('products/create');
        	}
		}
		else
		{
			$product_code =  mt_rand(11111111,99999999);

	        $this->data['category'] = $this->model_category->fecthActiveCategoryData();
	        $this->data['subcategory'] = $this->model_category->fecthAllSubCategoryActiveData();
	        $this->data['unit'] = $this->model_unit->fecthActiveSalesTypeData();
	        $this->data['size'] = $this->model_size->fecthActiveSalesTypeData();

			$this->data['product_code'] = $product_code;

			$this->render_template('admin_view/products/create', $this->data);
		}
	}

	public function updateProduct($products_id='')
	{
		$products_id = $this->uri->segment(3);

		$this->data['category'] = $this->model_category->fecthActiveCategoryData();
        $this->data['subcategory'] = $this->model_category->fecthAllSubCategoryActiveData();
        $this->data['unit'] = $this->model_unit->fecthActiveSalesTypeData();
        $this->data['size'] = $this->model_size->fecthActiveSalesTypeData();

		$this->data['productData'] = $this->model_products->fetchProductDataByID($products_id);
// 		echo "<pre>"; print_r($productData); echo "</pre>";exit();

		$this->render_template('admin_view/products/update', $this->data);
	}

	public function update()
	{
		if(!in_array('updateProduct', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('product_code', 'Product Code', 'required|trim');
		$this->form_validation->set_rules('name', 'Product Name', 'required|trim');
		$this->form_validation->set_rules('purchase_price', 'Purchase Price', 'required|trim');
		$this->form_validation->set_rules('sales_price', 'Sakes Price', 'required|trim');
		$this->form_validation->set_rules('hsn', 'HSN', 'required|trim');
		$this->form_validation->set_rules('gst', 'GST', 'required|trim');

        if ($this->form_validation->run() == TRUE) {

        	$data = array(
        		'id' => $this->input->post('product_id'),
        		'product_code' => $this->input->post('product_code'),
        		'name' => $this->input->post('name'),
        		'category' => $this->input->post('category_id'),
        // 		'subcategory' => $this->input->post('subcategory_id'),
        		'unit' => $this->input->post('unit'),
        		'purchase_price' => $this->input->post('purchase_price'),
        		'hsn' => $this->input->post('hsn'),
        		'sales_price' => $this->input->post('sales_price'),
        		'gst' => $this->input->post('gst'),
        // 		'size' => $this->input->post('size'),
        		'status' => $this->input->post('status'),
        		'description' => $this->input->post('description'),
        	);
        	// print_r($data); exit();
        	$update = $this->model_products->update($data);

        	if($update == true) {
        		
        		$this->session->set_flashdata('feedback','Data Saved Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('products');
        	}
        	else {
        		
        		$this->session->set_flashdata('feedback','Unable to Saved Data');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('products');
        	}
        }
	}

	public function delete()
	{
		if(!in_array('deleteProduct', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$id = $this->input->post('id_edit');
		$delete = $this->model_products->delete($id);	

		if($delete == true) {

    		$this->session->set_flashdata('feedback','Record Deleted Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('products');
    	}
    	else{

    		$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('products');
    	}	
	}
}	