<?php 

error_reporting(0);

class Sales_invoice extends Admin_Controller 
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
		$this->load->model('model_salesman');
		$this->load->model('model_company');
	}

	public function index()
	{
		if(!in_array('viewSalesInvoice', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->data['allData'] = $this->model_salesman->fecthSalesInvoice();
		// echo "<pre>"; print_r($allData); echo "</pre>"; exit();

		$this->render_template('admin_view/salesInvoice/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createSalesInvoice', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
        $si = 'si';

        // $salescode =  mt_rand(11111111,99999999);
        // $this->data['salescode'] = $salescode;
        $salescode = $this->model_salesman->getSalesInvoiceLastID($si);
        
        
        
        if($salescode == '')
        {
            // $this->data['salescode'] = 'S0001';
            $this->data['salescode'] = '0001'; //exit;
            
            $code = '0001';
        }
        else
        {
            $code = $salescode['invoice_no'];
            
            // $code = 1000;
            
            // $code = substr($code, 1);  
            
            $code = $code + 1;
            $code = sprintf('%04d',$code);
            
            $this->data['salescode'] = $code;
            
            // echo $code = $code + 1;
            // $this->data['salescode'] = $code;
            // exit;
        }
        
        
        // echo "<pre>"; print_r($code); echo "</pre>"; exit;

	    $this->data['allData'] = $this->model_products->fecthAllProductsData();
	    $this->data['customer'] = $this->model_customer->fecthAllData();
		$this->data['paymentmethod'] = $this->model_paymentmethod->fecthAllData();
		$this->data['paymentterm'] = $this->model_paymentterm->fecthAllData();
		$this->data['salesman'] = $this->model_salesman->fecthAllData();

		$this->render_template('admin_view/salesInvoice/create', $this->data);
	}

	public function salesInvoiceData()
	{
		// $invoice_no = '759';
		$code = $this->input->post('invoice_no');
		
		$invoice_no = sprintf('%04d',$code);
    		
		$data[] = $this->model_salesman->viewSalesData($invoice_no);
		$data[] = $this->model_salesman->viewSInvoiceData($invoice_no);
        echo json_encode($data);
	}

	public function createInvoice()
	{
		if(!in_array('createSalesInvoice', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
        date_default_timezone_set('Asia/Kolkata');
        $currentDateTime = date('Y-m-d H:i:s');

// 		echo "<pre>"; print_r($_POST); echo "</pre>"; // exit();
		$count_product = count($this->input->post('productName'));

		for($x = 0; $x < $count_product; $x++)
		{
			if(!empty($this->input->post('product_id')[$x]))
			{
				$stock = array(
								'product_id' => $this->input->post('product_id')[$x],
								'quantity' => $this->input->post('quantity')[$x],
								'inventory_type' => 'si', // purchase invoice
								'invoice_no' => $this->input->post('invoice_no'),
								'product_tax' => $this->input->post('tax_value')[$x],
								'product_total' => $this->input->post('total_value')[$x],
								'discount' => $this->input->post('discount')[$x],
								'created' => $currentDateTime,
							);
							
				// echo "<pre>"; print_r($stock); echo "</pre>"; exit();
							
				$orderData = array(
									'invoice_no' => $this->input->post('invoice_no'),
									'name_id' => $this->input->post('customer'),
									'salesman' => $this->input->post('salesman'),
									'billing_date ' => $this->input->post('billing_date'),
									'paymentmethod_id' => $this->input->post('pmethod'),
									'paymentterm_id' => $this->input->post('pterm'),
									'due_date' => $this->input->post('duedate'),
									'total' => $this->input->post('subtotal'),
									'tax' => $this->input->post('tax'),
									'gross_total' => $this->input->post('gross_total'),
									'paidamount' => $this->input->post('paid_amount'),
									'dueamount' => $this->input->post('due_amount'),
									'remark' => $this->input->post('remark')
								);
				// echo "<pre>"; print_r($orderData); echo "</pre>"; exit();

			
				$quantityData = $this->model_stock->create($stock);

				// if($quantityData)
				// {
					$updateQuantity = $quantityData['quantity'] - $this->input->post('quantity')[$x];

					$data = array(
									'id' => $this->input->post('product_id')[$x],
									'quantity' => $updateQuantity
								);
					// echo "<pre>"; print_r($data); echo "</pre>"; exit();
					$this->model_products->updateQuantity($data);

				
					// print_r($orderData);exit();
				// }
			}
		}

		$this->model_stock->createOrder($orderData);

		if($quantityData)
		{
			
			$this->session->set_flashdata('feedback','Record created Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
// 			return redirect('sales_invoice');
            
            $this->data['company_info'] = $this->model_company->getCompanyData(1);
            $invoice_no = $this->input->post('invoice_no');
            
            $this->data['data'] = $this->model_salesman->viewSalesData($invoice_no);
            $this->data['invoiceData'] = $this->model_salesman->viewSInvoiceData($invoice_no);            
            
            $this->render_template('admin_view/salesInvoice/confirmOrder', $this->data);
		}
		else
		{
			$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('sales_invoice');
		}
	}
	
	

	public function update()
	{
		if(!in_array('updateSalesInvoice', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$invoice_no = $this->uri->segment(3);
		// exit();

		$this->data['data'] = $this->model_salesman->viewSalesData($invoice_no);
		$this->data['invoicData'] = $this->model_salesman->viewSInvoiceData($invoice_no);
		// echo "<pre>"; print_r($data); echo "</pre>";
		// echo "<pre>"; print_r($invoicData); echo "</pre>"; exit();	

	    $this->data['allData'] = $this->model_products->fecthAllProductsData();
	    $this->data['customer'] = $this->model_customer->fecthAllData();
		$this->data['paymentmethod'] = $this->model_paymentmethod->fecthAllData();
		$this->data['paymentterm'] = $this->model_paymentterm->fecthAllData();
		$this->data['salesman'] = $this->model_salesman->fecthAllData();

		$this->render_template('admin_view/salesInvoice/update', $this->data);
	}

	public function UpdateInvoice()
	{
		if(!in_array('updateSalesInvoice', $this->permission)){
            redirect('dashboard', 'refresh');
        }

// 		echo "<pre>"; print_r($_POST); echo "</pre>"; exit();
		$count_product = count($this->input->post('productName'));
		// print_r($count_product); exit();

		for($x = 0; $x < $count_product; $x++)
		{
			if(!empty($this->input->post('product_id')[$x]))
			{
				$invoice_no = $this->input->post('po_invoice_number');
				$product_id = $this->input->post('product_id')[$x];
				
				$checkEdit = $this->model_products->checkSalesInvoiceAvailable($invoice_no, $product_id);
				
				if($checkEdit)
				{
					// echo "edit<br>";
					$stock = array(
								'product_id' => $this->input->post('product_id')[$x],
								'quantity' => $this->input->post('quantity')[$x],
								'inventory_type' => 'si', // purchase invoice
								'invoice_no' => $this->input->post('po_invoice_number'),
								'product_tax' => $this->input->post('tax_value')[$x],
								'product_total' => $this->input->post('total_value')[$x],
								'discount' => $this->input->post('discount')[$x],
								'created' => $this->input->post('billing_date'),
							);
					// echo "<pre>"; print_r($stock); echo "</pre>";
					// echo $quantityData = 10;
					$quantityData = $this->model_stock->updateSalesStock($stock);

					if($quantityData)
					{
						if($this->input->post('oldquantity')[$x] == $this->input->post('quantity')[$x])
						{
							// echo "Equal In DB<br>";
							$qtyDiff = $quantityData['quantity'];
						}
						
						if($this->input->post('oldquantity')[$x] > $this->input->post('quantity')[$x])
						{
							// echo "Add In DB<br>";
							$qtyDiff = $this->input->post('oldquantity')[$x] - $this->input->post('quantity')[$x];

							$updateQuantity = $quantityData['quantity'] - $qtyDiff;
						}
						
						if($this->input->post('oldquantity')[$x] < $this->input->post('quantity')[$x])
						{
							// echo "Minus in DB<br>";
							$qtyDiff = $this->input->post('quantity')[$x] - $this->input->post('oldquantity')[$x];
							
							// $qtyDiff = $quantityData['quantity'] - $this->input->post('quantity')[$x];
							// echo $qtyDiff = $quantityData - $this->input->post('quantity')[$x];

							$updateQuantity = $quantityData['quantity'] + $qtyDiff;
						}

						$data = array(
										'id' => $this->input->post('product_id')[$x],
										'quantity' => $updateQuantity
									);
						// echo "<pre>"; print_r($data); echo "</pre>";// exit();
						$this->model_products->updateQuantity($data);
					}
				}
				else
				{
					// echo "insert<br>";
					$stock = array(
								'product_id' => $this->input->post('product_id')[$x],
								'quantity' => $this->input->post('quantity')[$x],
								'inventory_type' => 'si', // purchase invoice
								'invoice_no' => $this->input->post('po_invoice_number'),
								'product_tax' => $this->input->post('tax_value')[$x],
								'product_total' => $this->input->post('total_value')[$x],
								'discount' => $this->input->post('discount')[$x],
								'created' => $this->input->post('billing_date'),
							);

					// echo "<pre>"; print_r($stock); echo "</pre>"; //exit();
					// $quantityData = 9;
					$quantityData = $this->model_stock->create($stock);

					if($quantityData)
					{
						$updateQuantity = $quantityData['quantity'] - $this->input->post('quantity')[$x];
						// $updateQuantity = $quantityData - $this->input->post('quantity')[$x];

						$data = array(
										'id' => $this->input->post('product_id')[$x],
										'quantity' => $updateQuantity
									);
						// echo "<pre>"; print_r($data); echo "</pre>"; //exit();
						$this->model_products->updateQuantity($data);
					}
				}
			}
		}
		// exit();

		if($quantityData)
		{
			$orderData = array(
								'invoice_no' => $this->input->post('po_invoice_number'),
								'name_id' => $this->input->post('cid'),
								'salesman' => $this->input->post('salesman_id'),
								'billing_date ' => $this->input->post('billing_date'),
								'paymentmethod_id' => $this->input->post('pmid'),
								'paymentterm_id' => $this->input->post('pid'),
								'due_date' => $this->input->post('duedate'),
								'total' => $this->input->post('subtotal'),
								'tax' => $this->input->post('tax'),
								// 'discount' => $this->input->post('discount')[$x],
								'gross_total' => $this->input->post('gross_total'),
								'paidamount' => $this->input->post('paid_amount'),
								'dueamount' => $this->input->post('due_amount'),
								'remark' => $this->input->post('remark')
							);

			$this->model_stock->deleteOrder($orderData);
			$this->model_stock->createOrder($orderData);

			$this->session->set_flashdata('feedback','Record Updated Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('sales_invoice');
		}
		else
		{
			$this->session->set_flashdata('feedback','Unable to Updated Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('sales_invoice');
		}
	}

	public function deleteSalesInvoice()
	{
		if(!in_array('deleteSalesInvoice', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        	
		$invoice_no = $this->input->post('id_edit');
		$stockData = $this->model_stock->getSalesStockDataByInvoice($invoice_no);
		// echo "<pre>"; print_r($stockData); echo "</pre>";
		$countStock = count($stockData);

		for($x = 0; $x < $countStock; $x++)
		{
			$id = $stockData[$x]['product_id'];
			$productsData = $this->model_products->getProductsDataID($id);
			// echo "<pre>"; print_r($productsData); echo "</pre>";

			$newQty = $productsData['quantity'] + $stockData[$x]['quantity'];
			// echo "<br>";
			// echo $stockData[$x]['id']; echo "<br>";

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
		// exit();
		if($delete)
		{
			$this->session->set_flashdata('feedback','Record Delete Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('sales_invoice');
		}
		else
		{
			$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('sales_invoice');
		}
	}

	public function printInvoice($invoice_no)
	{   
		if($invoice_no){
			
			$company_info = $this->model_company->getCompanyData(1);
			// echo "<pre>"; print_r($company_info); echo "</pre>";

			$orderData = $this->model_salesman->viewSalesData($invoice_no);
			$stockData = $this->model_salesman->viewSInvoiceData($invoice_no);
// 			echo "<pre>"; print_r($orderData); echo "</pre>";exit();
			
// 			$dateTime = date('d-m-Y', $orderData['created']);
			
// 			$dateTime = $order_data['created'];//exit();
// print_r($orderData);exit;
            
            if ($orderData['discount'] != '0') {
				// $discount = $this->currency_code . ' ' .$order_data['discount'];
				$discount = array_sum($orderData['discount']);
				// echo "Sum";exit;
			}
			else {
				$discount = '0'; //exit;
			}

			$html = '<!-- Main content -->
				<!DOCTYPE html>
				<html>
					<head>
						<meta charset="utf-8">
						<meta http-equiv="X-UA-Compatible" content="IE=edge">
						<title>Invoice</title>
						<!-- Tell the browser to be responsive to screen width -->
						<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
						<!-- Bootstrap 3.3.7 -->
						<link rel="stylesheet" href="'.base_url('assets/admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css').'">
						<!-- Font Awesome -->
						<link rel="stylesheet" href="'.base_url('assets/admin_assets/bower_components/font-awesome/css/font-awesome.min.css').'">
					</head>
					
					<style>
        			    .topBorder
        			    {
        			        border-top: 2px dotted #000;
        			    }
        			    .bottomBorder
        			    {
        			        border-bottom: 2px dotted #000;
        			    }
        			    
        			</style>
					<body onload="window.print();" style="padding:7px;">
						<div class="wrapper">
							<section class="invoice">
							
							    <div class="row invoice-info">
							        <div>
                			            <center>
                        			         <img src="'.base_url('assets/images/companyimg/'.$this->session->userdata['companyImg']).'" alt="'.$company_info['company_name'].'" style="width="100px"; height="70px;" />
                        			         <br>
                        			         
                        			    </center>
                        			 </div>
							        <div>
                			            <center>'.ucwords($company_info['address']).','.ucwords($company_info['city']).'</center>
                			            <div class="topBorder bottomBorder">
                			                <center> <span class="fa fa-phone"></span> '.ucwords($company_info['phone']).' for Delivery</center>
                			            </div>
                			            
                			        </div>
                			        <div style="padding-left:15px">
                    			        <span><b>Invoice No: </b>'.$orderData['invoice_no'].'</span>
                    			        <span><b> Date: </b>'.$orderData['created'].'</span><br>
                    			        <span><b> Item : </b>'.count($stockData).'</span><br>
                    			        
                    			        <br>
                			        </div>
							    
								</div>
								<!-- /.row -->
								<!-- Table row -->
							    <div class="row">
							      	<div class="col-md-3">
							        	<table id="orderTable" width="100%" cellpadding="0px" cellspacing="0px" border="0">
                    			          <thead>
                    			          <tr>
                    			            <th>Items</th>
                    			            <th>Price</th>
                    			            <th>Qty</th>
                    			            <th>Amount</th>
                    			          </tr>
                    			          </thead>
                    			          <tbody>'; 
                    			          
                    			                $tot = 0;
									        	foreach($stockData as $rows)
									        	{
									        	    $tot = $tot + $rows->total;
									        	    
									        		$html .= '<tr>
									        					<td>'.ucwords($rows->pname).'</td>
									        					<td>'.$rows->sprice.'</td>
									        					<td>'.$rows->qty.'</td>
									        					<td>'.$rows->total.'</td>
									        				</tr>';
									        	}
									        $html .= '</tbody>
							          	</table>
							          	<br>
							        </div>
							    </div>
							    <div class="row">
							    	<div class="col-md-3">
			        					<table width="100%">
			        						<tr class="topBorder">
			        							<td style="width:50%">Gross Total :</td>
			        							<td>'.$tot.'</td>
			        						<tr>
			        					</table>
							    	</div>
							    </div>
							    <div class="topBorder bottomBorder">
            			            <center><p style="font-size: 10px;">**THANK YOU FOR VISITING BOMBAY DESI **</p></center>
            			        </div>
							</section>
						</div>
					</body>
				</html>';

			echo $html;
		}
	}
}	
