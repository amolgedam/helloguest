<?php 

class Quotation extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Quotation';

		$this->load->model('model_products');
		$this->load->model('model_customer');
		$this->load->model('model_quotation');
		$this->load->model('model_company');
	}

	public function index()
	{
		if(!in_array('viewQuotation', $this->permission)){
            redirect('dashboard', 'refresh');
        }

	    $this->data['allData'] = $this->model_quotation->fecthAllData();

		$this->render_template('admin_view/quotation/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createQuotation', $this->permission)){
            redirect('dashboard', 'refresh');
        }

        // $quotationCode =  mt_rand(11111111,99999999);
        // $this->data['quotationCode'] = $quotationCode;
        
        // $qu = 'qu';
        $qcode = $this->model_quotation->getQuotationLastID();
        // print_r($qcode); exit;
        if($qcode == '')
        {
            // echo "hi";
            $this->data['quotationCode'] = 'Q0001';
        }
        else
        {
            $qcode = $qcode['invoice_no'];
            
            $qcode = substr($qcode, 1); 
            
            // echo "<br>";
            $qcode = $qcode + 1;
            // echo "<br>";exit;
            $qcode = sprintf('%04d',$qcode);
            $this->data['quotationCode'] = "Q".$qcode; //exit;
        }
    
	    $this->data['allData'] = $this->model_products->fecthAllProductsData();
	    $this->data['customer'] = $this->model_customer->fecthAllData();

		$this->render_template('admin_view/quotation/create', $this->data);
	}

	public function createQuotation()
	{
		if(!in_array('createQuotation', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		// echo "<pre>"; print_r($_POST); echo "</pre>"; //exit();
		$count_product = count($this->input->post('productName'));
		// exit();
		for($x = 0; $x < $count_product; $x++)	
		{
			if(!empty($this->input->post('product_id')[$x]))
			{
				$stock = array(
								'product_id' => $this->input->post('product_id')[$x],
								'quantity' => $this->input->post('quantity')[$x],
								'inventory_type' => 'qu',
								'invoice_no' => $this->input->post('quotation_no'),
								'product_tax' => $this->input->post('tax_value')[$x],
								'product_total' => $this->input->post('total_value')[$x],
								'discount' => $this->input->post('discount')[$x],
								'created' => $this->input->post('quotation_date'),
							);
				// echo "<pre>"; print_r($stock); echo "</pre>"; //exit();
				
				$create = $this->model_stock->createQuotationStock($stock);
			}
		}

		if($create)
		{
			$quotationData = array(
									'invoice_no' => $this->input->post('quotation_no'),
									'customer_id' => $this->input->post('customer'),
									'date' => $this->input->post('quotation_date'),
									'subtotal' => $this->input->post('subtotal'),
									'tax' => $this->input->post('totaltax_amount'),
									'total' => $this->input->post('gross_total'),
									'remark' => $this->input->post('remark')
								);
			$createQuotation = $this->model_quotation->createQuotation($quotationData);

			if($createQuotation)
			{
				$this->session->set_flashdata('feedback','Record Created Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('quotation');
			}
			else
			{
				$this->session->set_flashdata('feedback','Unable to Delete Record');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('quotation');
			}
		}
		// exit();
	}

	public function viewQuoation()
	{
		if(!in_array('viewQuotation', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		// $invoice_no = '960';
		$invoice_no = $this->input->post('invoice_no');
		$data[] = $this->model_quotation->viewData($invoice_no);
		$data[] = $this->model_quotation->viewInvoiceData($invoice_no);

        echo json_encode($data);
	}

	public function update()
	{
		if(!in_array('updateQuotation', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$invoice_no = $this->uri->segment(3);
		// exit();
	    $this->data['allData'] = $this->model_products->fecthAllProductsData();
	    $this->data['customer'] = $this->model_customer->fecthAllData();

	    $this->data['data'] = $this->model_quotation->viewData($invoice_no);
		$this->data['invoicData'] = $this->model_quotation->viewInvoiceData($invoice_no);

		$this->render_template('admin_view/quotation/update', $this->data);
	}

	public function updateQuotation()
	{
		if(!in_array('updateQuotation', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		// echo "<pre>"; print_r($_POST); echo "</pre>"; //exit();
		$count_product = count($this->input->post('productName'));
		// exit();

		for($x = 0; $x < $count_product; $x++)	
		{
			if(!empty($this->input->post('product_id')[$x]))
			{
				$product_id = $this->input->post('product_id')[$x];
				$invoice_no = $this->input->post('invoice_number');

				$checkEdit = $this->model_quotation->checkAvailable($invoice_no, $product_id);

				if($checkEdit)
				{
					$stock = array(
								'product_id' => $this->input->post('product_id')[$x],
								'quantity' => $this->input->post('quantity')[$x],
								'inventory_type' => 'qu',
								'invoice_no' => $this->input->post('invoice_number'),
								'product_tax' => $this->input->post('tax')[$x],
								'product_total' => $this->input->post('total')[$x],
								'discount' => $this->input->post('discount')[$x],
								'created' => $this->input->post('billing_date'),
							);
					// echo "<pre> eDiet"; print_r($stock); echo "</pre>";//exit();
					$create = $this->model_stock->updateQuotationStock($stock);
				}
				else
				{
					$stock = array(
								'product_id' => $this->input->post('product_id')[$x],
								'quantity' => $this->input->post('quantity')[$x],
								'inventory_type' => 'qu',
								'invoice_no' => $this->input->post('invoice_number'),
								'product_tax' => $this->input->post('tax')[$x],
								'product_total' => $this->input->post('total')[$x],
								'discount' => $this->input->post('discount')[$x],
								'created' => $this->input->post('billing_date'),
							);
					// echo "<pre> Insert"; print_r($stock); echo "</pre>";//exit();
					$create = $this->model_stock->createQuotationStock($stock);

					$quotationInvoice = $this->model_quotation->fetchQuotation($invoice_no);
				}
			}
		}
		// exit();
		if($create)
		{
			$quotationData = array(
									'invoice_no' => $this->input->post('invoice_number'),
									'customer_id' => $this->input->post('cid'),
									'date' => $this->input->post('billing_date'),
									'subtotal' => $this->input->post('subtotal'),
									'tax' => $this->input->post('totaltax_amount'),
									'total' => $this->input->post('gross_total'),
									'remark' => $this->input->post('remark')
								);

			$this->model_quotation->deleteQuotation($invoice_no);

			$createQuotation = $this->model_quotation->createQuotation($quotationData);

			if($createQuotation)
			{
				$this->session->set_flashdata('feedback','Record Updated Successfully');
				$this->session->set_flashdata('feedback_class','alert alert-success');
				return redirect('quotation');
			}
			else
			{
				$this->session->set_flashdata('feedback','Unable to Updated Record');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
				return redirect('quotation');
			}
		}
	}

	public function deleteQuotation()
	{
		if(!in_array('deleteQuotation', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$invoice_no = $this->input->post('id_edit');
		// exit();
		$delete = $this->model_quotation->deleteQuotationInvoice($invoice_no);	

		if($delete) {

			$this->model_quotation->deleteQuotation($invoice_no);	

    		$this->session->set_flashdata('feedback','Record Deleted Successfully');
			$this->session->set_flashdata('feedback_class','alert alert-success');
			return redirect('quotation');
    	}
    	else{

    		$this->session->set_flashdata('feedback','Unable to Delete Record');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
			return redirect('quotation');
    	}
	}

	public function printInvoice($invoice_no='')
	{
		if($invoice_no){
			
			$company_info = $this->model_company->getCompanyData(1);
			// echo "<pre>"; print_r($company_info); echo "</pre>";

			$quotationData = $this->model_quotation->viewData($invoice_no);
			$quotationProducts = $this->model_quotation->viewInvoiceData($invoice_no);
			// echo "<pre>"; print_r($quotationData); echo "</pre>";exit();


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
					<body onload="window.print();" style="padding:7px;">
						<div class="wrapper">
							<section class="invoice">
								<!-- title row -->
							    <div class="row">
							      <div class="col-md-3">
							        <h4 class="page-header">
							          <center>'.ucwords($company_info['company_name']).'</center>
							        </h4>
							      </div>
							      <!-- /.col -->
							    </div>
							    <!-- info row -->
							    <div class="row invoice-info">
			      					<div class="col-md-3 invoice-col">
								        <b>Total items: </b> '.count($quotationProducts).' 
								        <span class="pull pull-right"> <b>Date: </b> '.$quotationData['date'].'</span><br>
								        <b>Invoice No: </b> '.$quotationData['invoice_no'].'
								        <br><br>
								    </div>
								    <!-- /.col -->
								</div>
								<!-- /.row -->
								<!-- Table row -->
							    <div class="row">
							      	<div class="col-md-3">
							        	<table width="100%">
							          		<thead>
							          			<tr>
										            <th width="25%">Name</th>
										            <th width="10%">Qty</th>
										            <th width="20%">Price</th>
										            <th width="20%">Tax</th>
										            <th width="25%">Amount</th>
									        	</tr>
									        </thead>
									        <tbody>';
									        	foreach($quotationProducts as $rows)
									        	{
									        		$html .= '<tr>
									        					<td>'.ucwords($rows->pname).'</td>
									        					<td>'.$rows->qty.'</td>
									        					<td>'.$rows->pprice.'</td>
									        					<td>'.$rows->tax.'</td>
									        					<td>'.$rows->total.'</td>
									        				</tr>';
									        	}
									    $html .= '</tbody>
							          	</table>
							        </div>
							    </div>
							    <div class="row">
							    	<div class="col-md-3">
			        					<table width="100%">
			        						<tr>
			        							<td style="width:50%">Gross Total :</td>
			        							<td>'.$quotationData['subtotal'].'</td>
			        						<tr>
			        						<tr>
			        							<td style="width:50%">Paid Amount :</td>
			        							<td>'.$quotationData['tax'].'</td>
			        						</tr>
			        						<tr>
			        							<td style="width:50%">Due Amount :</td>
			        							<td>'.$quotationData['total'].'</td>
			        						</tr>
			        					</table>
							    	</div>
							    </div>
							</section>
						</div>
					</body>
				</html>';

			echo $html;
		}
	}

}	