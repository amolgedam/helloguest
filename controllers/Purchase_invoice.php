<?php 

class Purchase_invoice extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();	

		$this->not_logged_in();

		$this->data['page_title'] = 'Purchase Invoice';

		$this->load->model('model_products');
		$this->load->model('model_supplier');
		$this->load->model('model_paymentmethod');
		$this->load->model('model_paymentterm');
		$this->load->model('model_stock');

	}

	public function invoiceData()
	{
		// $invoice_no = '123';
		$invoice_no = $this->input->post('invoice_no');
		$data[] = $this->model_products->viewData($invoice_no);
		$data[] = $this->model_products->viewPInvoiceData($invoice_no);
        echo json_encode($data);
	}

	public function index()
	{
		if(!in_array('viewPurchaseInvoice', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->data['allData'] = $this->model_products->fecthAllPurchaseInvoice();
		// echo "<pre>"; print_r($data); echo "</pre>";exit();
		$this->render_template('admin_view/purchaseInvoice/index', $this->data);
	}

	public function addInvoice()
	{
		if(!in_array('createPurchaseInvoice', $this->permission)){
            redirect('dashboard', 'refresh');
        }

	    $this->data['allData'] = $this->model_products->fecthAllProductsData();
	    $this->data['supplier'] = $this->model_supplier->fecthAllData();
		$this->data['paymentmethod'] = $this->model_paymentmethod->fecthAllData();
		$this->data['paymentterm'] = $this->model_paymentterm->fecthAllData();

		$this->render_template('admin_view/purchaseInvoice/addInvoice', $this->data);
	}

	public function createInvoice()	
	{
		if(!in_array('createPurchaseInvoice', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
        $this->form_validation->set_rules('supplier', 'Supplier name', 'trim|required');
        $this->form_validation->set_rules('invoice_number', 'Invoice  Number', 'trim|required');
        $this->form_validation->set_rules('billing_date', 'Billing Date', 'trim|required');
        
        if ($this->form_validation->run() != TRUE){     	
        
            $this->data['allData'] = $this->model_products->fecthAllProductsData();
    	    $this->data['supplier'] = $this->model_supplier->fecthAllData();
    		$this->data['paymentmethod'] = $this->model_paymentmethod->fecthAllData();
    		$this->data['paymentterm'] = $this->model_paymentterm->fecthAllData();
    		
            $this->render_template('orders/edit', $this->data);
        }

		// echo "<pre>"; print_r($_POST); echo "</pre>"; exit();
		$count_product = count($this->input->post('productName'));

		for($x = 0; $x < $count_product; $x++)
		{
			if(!empty($this->input->post('product_id')[$x]))
			{
				$stock = array(
								'product_id' => $this->input->post('product_id')[$x],
								'quantity' => $this->input->post('quantity')[$x],
								'inventory_type' => 'pi', // purchase invoice
								'invoice_no' => $this->input->post('invoice_number'),
								'product_tax' => $this->input->post('tax_value')[$x],
								'product_total' => $this->input->post('total_value')[$x],
								'created' => $this->input->post('billing_date'),
							);

				// echo "<pre>"; print_r($stock); echo "</pre>"; //exit();
				$quantityData = $this->model_stock->create($stock);

				$updateQuantity = $quantityData['quantity'] + $this->input->post('quantity')[$x];

				$data = array(
								'id' => $this->input->post('product_id')[$x],
								'quantity' => $updateQuantity
							);
				// echo "<pre>"; print_r($data); echo "</pre>"; exit();
				$this->model_products->updateQuantity($data);

				$orderData = array(
									'invoice_no' => $this->input->post('invoice_number'),
									'name_id' => $this->input->post('supplier'),
									'billing_date ' => $this->input->post('billing_date'),
									'paymentmethod_id' => $this->input->post('paymentmethod'),
									'paymentterm_id' => $this->input->post('paymentterm'),
									'due_date' => $this->input->post('due_date'),
									'total' => $this->input->post('subtotal'),
									'tax' => $this->input->post('tax'),
									'gross_total' => $this->input->post('gross_total'),
									'paidamount' => $this->input->post('amt_paid'),
									'dueamount' => $this->input->post('due_amount'),
									'remark' => $this->input->post('remark')
								);
				// print_r($orderData);exit();
			}
		}
		$this->model_stock->createOrder($orderData);
		if($quantityData)
		{
			$this->session->set_flashdata('feedback','Record Create Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('purchase_invoice');
		}
		else
		{
			$this->session->set_flashdata('feedback','Unable to Create Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('purchase_invoice');
		}
	}

	public function editInvoice()
	{
		if(!in_array('updatePurchaseInvoice', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$invoice_no = $this->uri->segment(3);

		$this->data['viewData'] = $this->model_products->viewData($invoice_no);
		$this->data['invoiceData'] = $this->model_products->viewPInvoiceData($invoice_no);
		// echo "<pre>"; print_r($viewData); echo "</pre>";
		// echo "<pre>"; print_r($data); echo "</pre>"; exit();

	    $this->data['allData'] = $this->model_products->fecthAllProductsData();
	    $this->data['supplier'] = $this->model_supplier->fecthAllData();
		$this->data['paymentmethod'] = $this->model_paymentmethod->fecthAllData();
		$this->data['paymentterm'] = $this->model_paymentterm->fecthAllData();
		
		$this->render_template('admin_view/purchaseInvoice/editInvoice', $this->data);
	}

	public function editInvoiceData()
	{
		if(!in_array('updatePurchaseInvoice', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
        $this->form_validation->set_rules('supplier', 'Supplier name', 'trim|required');
        $this->form_validation->set_rules('invoice_number', 'Invoice  Number', 'trim|required');
        $this->form_validation->set_rules('billing_date', 'Billing Date', 'trim|required');
        
        if ($this->form_validation->run() != TRUE){     	
        
            $this->data['allData'] = $this->model_products->fecthAllProductsData();
    	    $this->data['supplier'] = $this->model_supplier->fecthAllData();
    		$this->data['paymentmethod'] = $this->model_paymentmethod->fecthAllData();
    		$this->data['paymentterm'] = $this->model_paymentterm->fecthAllData();
    		
            $this->render_template('orders/edit', $this->data);
        }

		// echo "<pre>"; print_r($_POST); echo "</pre>";// exit();
		$count_product = count($this->input->post('productName'));
		// print_r($count_product); exit();
		for($x = 0; $x < $count_product; $x++)
		{
			if(!empty($this->input->post('product_id')[$x]))
			{
				$invoice_no = $this->input->post('invoice_number');
				$product_id = $this->input->post('product_id')[$x];
				
				$checkEdit = $this->model_products->checkAvailable($invoice_no, $product_id);

				if($checkEdit)
				{
					// echo "EDIT";
					// edit
					$stock = array(
								'product_id' => $this->input->post('product_id')[$x],
								'quantity' => $this->input->post('quantity')[$x],
								'inventory_type' => 'pi', // purchase invoice
								'invoice_no' => $this->input->post('invoice_number'),
								'product_tax' => $this->input->post('tax_value')[$x],
								'product_total' => $this->input->post('total_value')[$x],
								// 'created' => $this->input->post('billing_date'),
							);
				// 	print_r($stock);exit();
					$quantityData = $this->model_stock->updateStock($stock);
					// echo $quantityData = 10; echo "<br>";
					// echo $this->input->post('oldquantity')[$x];

					if($quantityData)
					{
						$qtyDiff = $this->input->post('oldquantity')[$x] - $this->input->post('quantity')[$x];

						$updateQuantity = $quantityData['quantity'] - $qtyDiff;

						$data = array(
										'id' => $this->input->post('product_id')[$x],
										'quantity' => $updateQuantity
									);
				// 		echo "<pre>"; print_r($data); echo "</pre>"; exit();
						$this->model_products->updateQuantity($data);

						$orderData = array(
											'invoice_no' => $this->input->post('invoice_number'),
											'name_id' => $this->input->post('supplier'),
											'billing_date' => $this->input->post('billing_date'),
											'paymentmethod_id' => $this->input->post('paymentmethod_id'),
											'paymentterm_id' => $this->input->post('paymentterm_id'),
											'due_date' => $this->input->post('due_date'),
											'total' => $this->input->post('subtotal'),
											'tax' => $this->input->post('tax'),
											'gross_total' => $this->input->post('gross_total'),
											'paidamount' => $this->input->post('amt_paid'),
											'dueamount' => $this->input->post('due_amount'),
											'remark' => $this->input->post('remark')
										);
				// 		echo "<pre>"; print_r($orderData); echo "</pre>"; exit();
						$this->model_stock->updateOrder($orderData);
						// echo "<pre>"; print_r($orderData); echo "</pre>"; exit();
					}
				}
				else
				{
					// echo "<br>INSERT";
					// insert
					$stock = array(
								'product_id' => $this->input->post('product_id')[$x],
								'quantity' => $this->input->post('quantity')[$x],
								'inventory_type' => 'pi', // purchase invoice
								'invoice_no' => $this->input->post('invoice_number'),
								'product_tax' => $this->input->post('tax_value')[$x],
								'product_total' => $this->input->post('total_value')[$x],
								'created' => $this->input->post('billing_date'),
							);

					// echo "<pre>"; print_r($stock); echo "</pre>"; //exit();
					$quantityData = $this->model_stock->create($stock);
					// echo "<br>";

					if($quantityData)
					{
						$updateQuantity = $quantityData['quantity'] + $this->input->post('quantity')[$x];

						$data = array(
										'id' => $this->input->post('product_id')[$x],
										'quantity' => $updateQuantity
									);
						// echo "<pre>"; print_r($data); echo "</pre>"; exit();
						$this->model_products->updateQuantity($data);

						$orderData = array(
											'invoice_no' => $this->input->post('invoice_number'),
											'name_id' => $this->input->post('supplier'),
											'billing_date ' => $this->input->post('billing_date'),
											'paymentmethod_id' => $this->input->post('paymentmethod_id'),
											'paymentterm_id' => $this->input->post('paymentterm_id'),
											'due_date' => $this->input->post('due_date'),
											'total' => $this->input->post('subtotal'),
											'tax' => $this->input->post('tax'),
											'gross_total' => $this->input->post('gross_total'),
											'paidamount' => $this->input->post('amt_paid'),
											'dueamount' => $this->input->post('due_amount'),
											'remark' => $this->input->post('remark')
										);
						$this->model_stock->deleteOrder($orderData);
						$this->model_stock->createOrder($orderData);
					}
				}
			}
		}
		// if($orderData)
		// {
		// 	$this->model_stock->deleteOrder($orderData);
		// 	$this->model_stock->createOrder($orderData);
		// }
		
		// exit();
		if($quantityData)
		{
			$this->session->set_flashdata('feedback','Record Edit Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('purchase_invoice');
		}
		else
		{
			$this->session->set_flashdata('feedback','Unable to Edit Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('purchase_invoice');
		}
	}

	public function deleteInvoice()
	{
		if(!in_array('deletePurchaseInvoice', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		// $invoice_no = $this->uri->segment(3);

		$invoice_no = $this->input->post('id_edit');

		$stockData = $this->model_stock->getStockDataByInvoice($invoice_no);
		// echo "<pre>"; print_r($stockData); echo "</pre>";
		$countStock = count($stockData);

		for($x = 0; $x < $countStock; $x++)
		{
			$id = $stockData[$x]['product_id'];
			$productsData = $this->model_products->getProductsDataID($id);
			// echo "<pre>"; print_r($productsData); echo "</pre>";

			$newQty = $productsData['quantity'] - $stockData[$x]['quantity'];
			// exit();
			// delete stock from stock table
			$this->model_stock->delete($stockData[$x]['id']);

			$data = array(
							'id' => $stockData[$x]['product_id'],
							'quantity' => $newQty
						);
			// print_r($data);exit();
			// Minus stock to product table
			$delete =  $this->model_products->updateQuantity($data);

			if($delete)
			{
				$this->model_products->deleteOrder($stockData[$x]['invoice_no']);
			}
		}

		if($delete)
		{
			$this->session->set_flashdata('feedback','Data Delete Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('purchase_invoice');
		}
		else
		{
			$this->session->set_flashdata('feedback','Unable to Delete Data');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('purchase_invoice');
		}
	}

}	