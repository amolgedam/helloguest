<?php 

class Damage_stock extends Admin_Controller 
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
		if(!in_array('viewDamageStock', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$inventory_type = 'ds';
	    $this->data['damageStockData'] = $this->model_stock->fecthStockData($inventory_type);
		$this->render_template('admin_view/DamageStock/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createDamageStock', $this->permission)){
            redirect('dashboard', 'refresh');
        }

	    $this->data['allData'] = $this->model_products->fecthAllProductsData();
		$this->render_template('admin_view/DamageStock/create', $this->data);
	}

	public function createDamageStock()
	{
		if(!in_array('createDamageStock', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$count_product = count($this->input->post('productName'));
		// echo $count_product; echo "<br><pre>"; print_r($_POST); echo "</pre>"; exit();

		for($x = 0; $x < $count_product; $x++)
		{
			if(!empty($this->input->post('product_id')[$x]))
			{
				// echo $this->input->post('quantity')[$x];
				$opening_stocks = array(

										'product_id' => $this->input->post('product_id')[$x],
										'quantity' => $this->input->post('quantity')[$x],
										'inventory_type' => 'ds', // opening stocks
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
			return redirect('damage_stock');
		}
		else
		{
			$this->session->set_flashdata('feedback','Unable to Saved Data');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('damage_stock');
		}
	}

	public function update()
	{
		if(!in_array('updateDamageStock', $this->permission)){
            redirect('dashboard', 'refresh');
        }

        $product_id = $this->uri->segment(3);

	    $this->data['allData'] = $this->model_products->fecthAllProductsData();

	    $this->data['damageData'] = $this->model_stock->fecthDamageDataByID($product_id);

        
		$this->render_template('admin_view/DamageStock/update', $this->data);
	}

	public function updateDamage()
	{
		if(!in_array('updateDamageStock', $this->permission)){
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
								'inventory_type' => 'ds',
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
			// echo "<pre>"; print_r($products_stocks); echo "</pre>"; exit();
			$this->model_products->updateQuantity($products_stocks);

			$this->session->set_flashdata('feedback','Data Saved Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('damage_stock');
		}
		else
		{
			$this->session->set_flashdata('feedback','Unable to Saved Data');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('damage_stock');
		}
	}
}	