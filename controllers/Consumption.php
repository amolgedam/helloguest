<?php 

class Consumption extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Internal Consumption';

		$this->load->model('model_products');
		$this->load->model('model_stock');
	}

	public function index()
	{
		if(!in_array('viewInternalConsumption', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$inventory_type = 'ic';
	    $this->data['stockData'] = $this->model_stock->fecthStockData($inventory_type);

		$this->render_template('admin_view/consumption/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createInternalConsumption', $this->permission)){
            redirect('dashboard', 'refresh');
        }

	    $this->data['allData'] = $this->model_products->fecthAllProductsData();
		$this->render_template('admin_view/consumption/create', $this->data);
	}

	public function createConsumption()
	{
		if(!in_array('createInternalConsumption', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$count_product = count($this->input->post('productName'));
		// echo $count_product; echo "<br><pre>"; print_r($_POST); echo "</pre>"; //exit();

		for($x = 0; $x < $count_product; $x++)
		{
			if(!empty($this->input->post('product_id')[$x]))
			{
				// echo $this->input->post('quantity')[$x];
				$opening_stocks = array(

										'product_id' => $this->input->post('product_id')[$x],
										'quantity' => $this->input->post('quantity')[$x],
										'inventory_type' => 'ic', // opening stocks
										'created' => $this->input->post('billing_date')
									);
				// print_r($opening_stocks);//exit();
				$quantityData = $this->model_stock->create($opening_stocks);
				// echo "<br>";

				if($quantityData)
				{
					$updateQuantity = $quantityData['quantity'] - $this->input->post('quantity')[$x];

					$data = array(
									'id' => $this->input->post('product_id')[$x],
									'quantity' => $updateQuantity
								);
					// print_r($data);exit();
					$create = $this->model_products->updateQuantity($data);
				}
			}
		}
		// exit();

		if($quantityData)
		{
			$this->session->set_flashdata('feedback','Data Saved Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('consumption');
		}
		else
		{
			$this->session->set_flashdata('feedback','Unable to Saved Data');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('consumption');
		}
	}

	public function update()
	{
		if(!in_array('updateInternalConsumption', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        $product_id = $this->uri->segment(3);
        // exit();
	    $this->data['allData'] = $this->model_products->fecthAllProductsData();

	    $this->data['consumptionData'] = $this->model_stock->fecthConsumptionDataByID($product_id);
        // print_r($consumptionData);exit();
		$this->render_template('admin_view/consumption/update', $this->data);
	}

	public function updateConsumption()
	{
		if(!in_array('updateInternalConsumption', $this->permission)){
            redirect('dashboard', 'refresh');
        }

        // echo "<pre>"; print_r($_POST); echo "</pre>"; exit();
        
		$stockQuantity = $this->input->post('oldquantity') - $this->input->post('quantity');

		$productQuantity = $this->model_products->fetchDataByID($this->input->post('product_id'));

		// echo "<pre>"; print_r($productQuantity['quantity']); echo "</pre>"; exit();

		$updateProductQuantity = $productQuantity['quantity'] + $stockQuantity;
		// exit();

		$opening_stocks = array(
								'product_id' => $this->input->post('product_id'),
								'quantity' => $this->input->post('quantity'),
								'inventory_type' => 'ic',
							);
		// echo "<pre>"; print_r($opening_stocks); echo "</pre>"; exit();
		$updateData = $this->model_stock->updateOpeningStock($opening_stocks);
		// echo "<pre>"; print_r($opening_stocks); echo "</pre>"; exit();
		
		if($updateData)	
		{
			$products_stocks = array(
								'id' => $this->input->post('product_id'),
								'quantity' => $updateProductQuantity,
							);
			// echo "<pre>"; print_r($opening_stocks); echo "</pre>"; exit();
			$this->model_products->updateQuantity($products_stocks);

			$this->session->set_flashdata('feedback','Data Saved Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('consumption');
		}
		else
		{
			$this->session->set_flashdata('feedback','Unable to Saved Data');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('consumption');
		}
	}


}	