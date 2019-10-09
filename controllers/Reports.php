<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Reports';
		
		$this->load->model('model_products');
		$this->load->model('model_supplier');
		$this->load->model('model_category');
		$this->load->model('model_size');
		$this->load->model('model_stock');
		$this->load->model('model_customer');
		$this->load->model('model_salesman');
		$this->load->model('model_expences');
    }

	public function purchase()
	{  
		if(!in_array('viewPurchaseReport', $this->permission)){
            redirect('dashboard', 'refresh');
        }

	    $this->data['customer'] = $this->model_supplier->fecthAllData();

	    $this->form_validation->set_rules('from', 'Category Name', 'required|trim');
	    $this->form_validation->set_rules('to', 'Product Name', 'required|trim');
		// $this->form_validation->set_rules('supplier', 'supplier', 'required|trim');

		if ($this->form_validation->run() == TRUE){

			// $from = date("Y-d-m", strtotime($_POST['from']));
			// $to = date("Y-d-m", strtotime($_POST['to']));

			if($_POST['supplier'] == '0')
			{
				$data = array(
							'from' => $_POST['from'],
							'to' => $_POST['to']
						);

				// print_r($data);exit();
		    	$this->data['purchaseReport'] = $this->model_supplier->fecthPurchaseReport($data);
		    	// echo "<pre>"; print_r($purchaseReport); echo "</pre>"; exit();
			}
			else
			{
				$data = array(
							'from' => $_POST['from'],
							'to' => $_POST['to'],
							'supplier' => $_POST['supplier']
						);

				// print_r($data);exit();
		    	$this->data['purchaseReport'] = $this->model_supplier->fecthPurchaseWiseReport($data);
		    	// echo "<pre>"; print_r($purchaseReport); echo "</pre>"; exit();
			}

        	$this->render_template('admin_view/reports/purchase', $this->data);
		}
		else
		{
			 $this->data['purchaseReport'] = $this->model_supplier->fecthPurchaseData();
		    // echo "<pre>"; print_r($purchaseReport); echo "</pre>"; exit();
	        $this->render_template('admin_view/reports/purchase', $this->data);
		}
	}

	public function sales()
	{
		if(!in_array('viewSalesReport', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('from', 'Date From', 'required|trim');
	    $this->form_validation->set_rules('to', 'Date To', 'required|trim');

	    $this->data['customer'] = $this->model_customer->fecthAllData();

		if ($this->form_validation->run() == TRUE){
		    
		    
		  //  print_r($_POST); exit;

			if($_POST['customer'] == 0)
			{
				$data = array(
							'from' => $_POST['from'],
							'to' => $_POST['to']
						);
				// print_r($data);exit();
				$this->data['salesReport'] = $this->model_salesman->fecthAllSalesReport($data);
				// echo "<pre>"; print_r($salesReport); echo "</pre>"; exit();
			}
			
			if ($_POST['customer'] != '0')
			{
			    
				$data = array(
							'from' => $_POST['from'],
							'to' => $_POST['to'],
							'customer' => $_POST['customer']
						);
				// print_r($data);exit();
				$this->data['salesReport'] = $this->model_salesman->fecthSalesReport($data);
			}
            // print_r($_POST); exit;
        	$this->render_template('admin_view/reports/sales', $this->data);
		}
		else
		{
			$this->data['salesReport'] = $this->model_salesman->fecthSalesData();
        	$this->render_template('admin_view/reports/sales', $this->data);
		}
	}

	public function productReport()
	{
		if(!in_array('viewSalesReport', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('product', 'Product Name', 'required|trim');
	    // $this->form_validation->set_rules('to', 'Date To', 'required|trim');

		if ($this->form_validation->run() == TRUE){

			// echo "<pre>"; print_r($_POST); //exit();
			// if($_POST['product'] == 0)
			// {
			// 	$data = array(
			// 				'from' => $_POST['from'],
			// 				'to' => $_POST['to']
			// 			);
			// 	// print_r($data);exit();
			// 	$this->data['productReport'] = $this->model_products->fecthPurchaseReport($data);
			// 	// echo "<pre>"; print_r($productReport); echo "</pre>"; exit();
			// }
			// else
			// {
			// 	$data = array(
			// 				'from' => $_POST['from'],
			// 				'to' => $_POST['to'],
			// 				'product' => $_POST['product']
			// 			);
			// 	// print_r($data);exit();
				
			// 	$this->data['productReport'] = $this->model_products->fecthAllPurchaseReport($data);
			// }

			if(empty($_POST['from']) && empty($_POST['to']) && $_POST['product'] != 0 )
            {
	    		$this->data['products'] = $this->model_products->fecthAllProductsData1();

	    		$this->data['productReport2'] = $this->model_products->fetchDataByID1($_POST['product']);
            }
			else if(!empty($_POST['from']) && !empty($_POST['to']) && $_POST['product'] != 0 )
			{
	    		$this->data['products'] = $this->model_products->fecthAllProductsData1();
	    		$this->data['productReport2'] = $this->model_products->fetchDataByID2($_POST['from'], $_POST['to'] , $_POST['product']);
			}
            else
            {
	    		$this->data['products'] = $this->model_products->fecthAllProductsData1();
	    		$this->data['productReport1'] = $this->model_products->fecthAllProductsData1();
            }

        	$this->render_template('admin_view/reports/productsWiseReport', $this->data);
		}
		else
		{	
		  //  echo "<pre>"; print_r($this->model_products->fecthProductWiseSalesReport()); exit;
	    	$this->data['products'] = $this->model_products->fecthAllProductsData1();
	    	$this->data['productReport1'] = $this->model_products->fecthAllProductsData1();

			$this->data['productReport'] = $this->model_products->fecthProductWiseSalesReport();
        	$this->render_template('admin_view/reports/productsWiseReport', $this->data);
		}
	} 

	public function expences()
	{	
		if(!in_array('viewExpencesReport', $this->permission)){
            redirect('dashboard', 'refresh');
        }

        $this->data['exp'] =$this->model_expences->fecthAllExpencesData();
        $this->data['expCategory'] =$this->model_expences->fecthAllCategoryData();

		$this->form_validation->set_rules('from', 'Date From', 'required|trim');
	    $this->form_validation->set_rules('to', 'Date To', 'required|trim');

		if ($this->form_validation->run() == TRUE){

			if($_POST['expences'] == '0' && $_POST['expencesCat'] == '0')
			{
				$data = array(
							'from' => $_POST['from'],
							'to' => $_POST['to'],
						);
				// print_r($data);exit();

				$this->data['expencesReport'] = $this->model_expences->fecthExpencesReport($data);
				// echo "<pre>"; print_r($expencesReport); echo "</pre>"; exit();
			}
			else if($_POST['expencesCat'] == '0')
			{
				$data = array(
							'from' => $_POST['from'],
							'to' => $_POST['to'],
							'expences' => $_POST['expences']
						);
				// print_r($data);exit();

				$this->data['expencesReport'] = $this->model_expences->fecthExpencesWiseReport($data);
				// echo "<pre>"; print_r($expencesReport); echo "</pre>"; exit();
			}
			else if($_POST['expences'] == '0')
			{
			    $data = array(
							'from' => $_POST['from'],
							'to' => $_POST['to'],
							'expencescat' => $_POST['expencesCat']
						);
				// print_r($data);exit();

				$this->data['expencesReport'] = $this->model_expences->fecthExpencesCatWiseReport($data);
			}
			
			
        	$this->render_template('admin_view/reports/expences', $this->data);
		}
		else
		{
			
			$this->data['expencesReport'] = $this->model_expences->fecthExpences();
			// echo "<pre>"; print_r($expencesReport); echo "</pre>"; exit();
        	$this->render_template('admin_view/reports/expences', $this->data);
		}
	}

	public function income()
	{
		if(!in_array('viewIncomeReport', $this->permission)){
            redirect('dashboard', 'refresh');
        }

		$getProducts = $this->model_products->fecthProductsDataForReports();

		$getOrders = $this->model_products->fecthOrdersDataForReports();

		// echo "<pre>"; print_r($getProducts); echo "</pre>"; //exit();
		// echo "<pre>"; print_r($getOrders); echo "</pre>"; //exit();

		foreach ($getOrders as $key => $value) {

			foreach ($getProducts as $key => $rows) {
				
				// echo "hi";
				if($rows->pid == $value->product_id)
				{
					// $income[] =  $value->gross_total;
					echo "demo<br>";
				}
			}			
		}
		// echo "<pre>"; print_r($income); echo "</pre>";
		exit();
        $this->render_template('admin_view/reports/income', $this->data);
	}

	public function inventoryReport()
	{
		if(!in_array('viewInventoryReport', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
	    $this->data['products'] = $this->model_products->fecthAllData();
	    $this->data['allData'] = $this->model_category->fecthActiveCategoryData();
	    $this->data['size'] = $this->model_size->fecthActiveSalesTypeData();

	    $this->form_validation->set_rules('category', 'Category Name', 'required|trim');
	    $this->form_validation->set_rules('product', 'Product Name', 'required|trim');
		$this->form_validation->set_rules('size', 'Size', 'required|trim');
		$this->form_validation->set_rules('stock', 'Size', 'required|trim');

		if ($this->form_validation->run() == TRUE){
			
			if($_POST['category'] == 0 && $_POST['product'] == 0 && $_POST['size'] == 0)
			{
				// echo "all stock";

				if($_POST['stock'] == 0)
				{
				    $this->data['reportData'] = $this->model_products->fecthAllProductsData();
				}
				else
				{
					$data = array(
								'stock' => $stock = $_POST['stock']
							);

					// print_r($data);exit();
					$this->data['reportData'] = $this->model_products->fecthStockData($data);
				}
			}
			elseif($_POST['category'] != 0 && $_POST['product'] == 0 && $_POST['size'] == 0)
			{
				// echo "category and all";exit();
				
				if($_POST['stock'] == '0')
				{
					$data = array(
								'category' => $stock = $_POST['category']
							);
					// print_r($data);exit();
					$this->data['reportData'] = $this->model_products->fecthCategoryReport($data);
				}
				else
				{
					$data = array(
								'category' => $stock = $_POST['category'],
								'stock' => $stock = $_POST['stock']
							);
					// print_r($data);exit();
					$this->data['reportData'] = $this->model_products->fecthCategoryWiseReport($data);
				}
			}
			elseif($_POST['category'] == 0 && $_POST['product'] != 0 && $_POST['size'] == 0)
			{
				// echo "product and all";
				if($_POST['stock'] == '0')
				{
					$data = array(
								'product' => $stock = $_POST['product']
							);
					// print_r($data);exit();
					$this->data['reportData'] = $this->model_products->fecthProductReport($data);
				}
				else
				{
					$data = array(
								'product' => $stock = $_POST['product'],
								'stock' => $stock = $_POST['stock']
							);
					// print_r($data);exit();
					$this->data['reportData'] = $this->model_products->fecthProductWiseReport($data);
				}
			}
			elseif($_POST['category'] == 0 && $_POST['product'] == 0 && $_POST['size'] != 0)
			{
				// echo "size amd all";
				if($_POST['stock'] == '0')
				{
					$data = array(
								'size' => $stock = $_POST['size']
							);
					// print_r($data);exit();
					$this->data['reportData'] = $this->model_products->fecthSizeReport($data);
				}
				else
				{
					$data = array(
								'size' => $stock = $_POST['size'],
								'stock' => $stock = $_POST['stock']
							);
					// print_r($data);exit();
					$this->data['reportData'] = $this->model_products->fecthSizeWiseReport($data);
				}
			}
			elseif($_POST['category'] != 0 && $_POST['product'] != 0 && $_POST['size'] == 0)
			{
				// echo "category and product and all";
				if($_POST['stock'] == '0')
				{
					$data = array(
								'category' => $stock = $_POST['category'],
								'product' => $stock = $_POST['product']
							);
					// print_r($data);exit();
					$this->data['reportData'] = $this->model_products->fecthCatProductReports($data);
				}
				else
				{
					$data = array(
								'category' => $stock = $_POST['category'],
								'product' => $stock = $_POST['product'],
								'stock' => $stock = $_POST['stock']
							);
					// print_r($data);exit();
					$this->data['reportData'] = $this->model_products->fecthCatProductWiseReports($data);
				}
			}
			elseif($_POST['category'] == 0 && $_POST['product'] != 0 && $_POST['size'] != 0)
			{
				// category and product data display
				// echo "product and size";
				if($_POST['stock'] == '0')
				{
					$data = array(
								'size' => $stock = $_POST['size'],
								'product' => $stock = $_POST['product']
							);
					// print_r($data);exit();
					$this->data['reportData'] = $this->model_products->fecthProductSizeReport($data);
				}
				else
				{
					$data = array(
								'size' => $stock = $_POST['size'],
								'product' => $stock = $_POST['product'],
								'stock' => $stock = $_POST['stock']
							);
					// print_r($data);exit();
					$this->data['reportData'] = $this->model_products->fecthProductSizeWiseReport($data);
				}
			}
			elseif($_POST['category'] != 0 && $_POST['product'] == 0 && $_POST['size'] != 0)
			{
				// category and product data display
				// echo "category and size";
				if($_POST['stock'] == '0')
				{
					$data = array(
								'size' => $stock = $_POST['size'],
								'category' => $stock = $_POST['category']
							);
					// print_r($data);exit();
					$this->data['reportData'] = $this->model_products->fecthCatSizeReport($data);
				}
				else
				{
					$data = array(
								'size' => $stock = $_POST['size'],
								'category' => $stock = $_POST['category'],
								'stock' => $stock = $_POST['stock']
							);
					// print_r($data);exit();
					$this->data['reportData'] = $this->model_products->fecthCatSizeWiseReport($data);
				}
			}
			else
			{
		    	$this->data['reportData'] = array();
		    	// echo "nothing";
			}
			// echo "<pre>"; print_r($data); echo "</pre>";
			// exit();

	        $this->render_template('admin_view/reports/inventoryReport', $this->data);




				// print_r($_POST);exit();
				// $product_id = $_POST['category'];
				// $size = $_POST['size'];
				// $stock = $_POST['stock'];
				// $allData = array(
				// 				'category' => $product_id = $_POST['category'],
				// 				'product' => $product_id = $_POST['product'],
				// 				'size' => $size = $_POST['size'],
				// 				'stock' => $stock = $_POST['stock']
				// 			);
				// // print_r($data);exit();
				// $reportData = $this->model_products->fecthInventoryReportData($data);
				// echo "<pre>"; print_r($reportData); echo "</pre>";exit();
	        	// $this->render_template('admin_view/reports/inventoryReport', $this->data);
			
			

			// $productData = $this->model_products->fecthProductRecords($product_id, $size_id);



			// echo "<pre>"; print_r($productData); echo "</pre>"; exit();

			// foreach ($productData as $key => $value) {
				
			// 	$result[] = $this->model_stock->inventoryReport($value->id, 'os', 'os_qty');
			// 	$result[] = $this->model_stock->inventoryReport($value->id, 'ps', 'ps_qty');
			// 	$result[] = $this->model_stock->inventoryReport($value->id, 'ic', 'ic_qty');
			// 	$result[] = $this->model_stock->inventoryReport($value->id, 'ds', 'ds_qty');
			// 	$result[] = $this->model_stock->inventoryReport($value->id, 'ss', 'ss_qty');
			// 	// $psstock = $this->model_stock->inventoryReport($value->id, 'ss', 'ss_qty');
			// }
			// echo "<pre>"; print_r($opstock); echo "</pre>";
			// echo "<pre>"; print_r($psstock); echo "</pre>";
			// echo "<pre>"; print_r($icstock); echo "</pre>";
			// echo "<pre>"; print_r($dsstock); echo "</pre>";
			// echo "<pre>"; print_r($ssstock); echo "</pre>";

			// $result = array_merge($opstock, $psstock, $icstock, $dsstock, $ssstock);
			// echo "<pre>"; print_r($result); echo "</pre>";


			// $result = array_map(function($opstock,$psstock){  

			// 	return array_merge(isset($opstock) ? $opstock : array(), isset($psstock) ? $psstock : array());

			//  	},$opstock,$psstock);  

			  
			// echo "<pre>";
			// print_r($result);exit();

			// $out = array();
			// $uni_key = array();
			// foreach($result as $key => $val){
			//     $srch = array_search($val->pid, $uni_key);
			//     if($srch > -1){
			//         // $out[$srch]['id'] .= $out[$key]['id'].", ".$val['id'];
			//     }else{
			//         array_push($uni_key, $val->pid);
			//         $out[$key] = $val;      
			//     }       
			// }

			// echo '<pre>';
			// print_r($out);
			// echo "</pre>";
			//  exit();






			// print_r($_POST);exit();
			// $productData = $this->model_products->fecthAllDataCountData();
			// // print_r($productData);exit();
			
			// foreach ($productData as $key => $value) {
				
			// 	// echo $value['pid'];
			// 	$productDataCount = $this->model_products->fecthAllDataCountData();

			// 	echo "<pre>"; print_r($productDataCount); echo "</pre>";
			// }
			// exit();


			// $productData = $this->model_products->fecthAllDataCountData();

			// // $stockData = $this->model_stock->fecthAllData();


			// // $stockDataCount = count($stockData);echo $stockDataCount; 
			// echo "<pre>"; print_r($productData); echo "</pre><br>"; //exit();

			// // foreach($productData as $rows){

			// // 	$op_stock[] = $this->model_stock->fetchStockCountOS($rows['id']); echo "<br>";
			// // }


			// // echo "<pre>"; print_r($op_stock); echo "</pre>";











			// $op_stock = $pur_stock = $cons_stock = $damage_stock = $sales_stock = 0;

			// foreach($stockData as $rows)
			// {
			// 	// sum of opening stock
			// 	$rows->inventory_type == 'os' ? $this->data['op_stock'] += $rows->quantity : '';

			// 	// sum of purchase stock
			// 	$rows->inventory_type == 'ps' ? $this->data['pur_stock'] += $rows->quantity : '';

			// 	// sum of Internal Consumption stock
			// 	$rows->inventory_type == 'ic' ? $this->data['cons_stock'] += $rows->quantity : '';

			// 	// sum of damage stock
			// 	$rows->inventory_type == 'ds' ? $this->data['damage_stock'] += $rows->quantity : '';

			// 	// sum of sales stock
			// 	$rows->inventory_type == 'ss' ? $this->data['sales_stock'] += $rows->quantity : '';
			// }
			// echo $op_stock; echo "<br>"; echo $pur_stock; echo "<br>"; echo $cons_stock; echo "<br>"; echo $damage_stock; echo "<br>"; echo $sales_stock;
			
			
	    	// $this->data['reportData'] = array();
        	// $this->render_template('admin_view/reports/inventoryReport', $this->data);

		}
		else
		{
		    $this->data['reportData'] = $this->model_products->fecthAllProductsData();
		    // print_r($reportData)
				
	        $this->render_template('admin_view/reports/inventoryReport', $this->data);
		}
	}

}