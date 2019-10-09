<?php 

class Model_products extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_stock');
	}
	
	public function checkPInvoice($pi='')
	{
	    $query = $this->db->select()
	                        ->from('stock')
	                        ->where('invoice_no', $pi)
	                        ->where('inventory_type', 'pi')
	                        ->get();
	   return $query->row_array();
	}

	public function create($data = array())
	{
		if($data) {

			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('products', $data);
			return ($create == true) ? true : false;
		}
	}

	public function updateQuantity($data = array())
	{
		$this->db->where('id', $data['id']);
		$update = $this->db->update('products', $data);
		return ($update == true) ? true : false;
	}

	public function fetchProductDataByID($products_id='')
	{
	   // echo $products_id; exit;
		$query = $this->db->select('products.id as pid, products.product_code as pcode, products.name as pname, products.category as pcat, products.unit, products.purchase_price as pprice, products.sales_price as sprice, products.hsn, products.gst, products.size, products.status, products.description as desc, products_categories.name as cname')
							->from('products')
							->where('products.id', $products_id)
							->join('products_categories', 'products_categories.id = products.category')
				// 			->join('products_subcategories', 'products_subcategories.id = products.subcategory')
							->get();
		return $query->row_array();
	}

	public function fetchDataByID($id='')
	{
		$query = $this->db->select('*')
							->from('products')
							->where('id', $id)
							->get();
		return $query->row_array();
	}

	public function fecthAllData()
	{
		$query = $this->db->select('*')
							->from('products')
							->get();
		return $query->result_array();
	}

	public function getProductsDataByID($id='')
	{
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, products.sales_price, products.gst, products.description, products.status, products_categories.name as category, products_subcategories.id as subcategory_id, products_subcategories.name as subcategory, unit.id as unit_id, unit.name as unit, size.id as size_id, size.name as size, products.quantity')
							->from('products')
							->where('products.name', $id)
							->join('products_subcategories', 'products_subcategories.id = products.subcategory ', 'left')
							->join('products_categories', 'products_categories.id = products.category ', 'left')
							->join('unit', 'unit.id = products.unit ', 'left')
							->join('size', 'size.id = products.size ', 'left')
							->get();
		return $query->row_array();
	}

	public function fecthAllProductsData()
	{
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, products.sales_price, products.quantity , products.gst, products.description, products.status, products_categories.name as category, products_subcategories.id as subcategory_id, products_subcategories.name as subcategory, unit.id as unit_id, unit.name as unit, size.id as size_id, size.name as size')
							->from('products')
							->group_by('products.product_code')
							->join('products_subcategories', 'products_subcategories.id = products.subcategory ', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->join('unit', 'unit.id = products.unit ', 'left')
							->join('size', 'size.id = products.size ', 'left')
							->get();
		return $query->result();
	}

	public function fecthAllProductsData1()
	{
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, products.sales_price, products.quantity , products.gst, products.description, products.status, products_categories.name as category, products_subcategories.id as subcategory_id, products_subcategories.name as subcategory, unit.id as unit_id, unit.name as unit, size.id as size_id, size.name as size')
							->from('products')
							->group_by('products.product_code')
							->join('products_subcategories', 'products_subcategories.id = products.subcategory ', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->join('unit', 'unit.id = products.unit ', 'left')
							->join('size', 'size.id = products.size ', 'left')
							->get();
		return $query->result_array();
	}

	public function fecthAllPurchaseInvoice()
	{
		$query = $this->db->select('stock.invoice_no, stock.created, orders.paymentterm_id as ipterm, payment_term.name as pterm, orders.due_date, orders.gross_total, supplier.name as sname, orders.billing_date')
							->from('orders')
							->where('inventory_type', 'pi')
							->group_by('stock.invoice_no')
							->order_by('orders.id', 'desc')
							->join('stock', 'stock.invoice_no = orders.invoice_no', 'left')
							->join('supplier', 'supplier.id = orders.name_id ', 'left')
							->join('payment_term', 'payment_term.id = orders.paymentterm_id ', 'left')
							->get();
		return $query->result();
	}

	public function update($data = array())
	{
		$this->db->where('id', $data['id']);
		$update = $this->db->update('products', $data);
		return ($update == true) ? true : false;
	}

	public function delete($id = "")
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('products');
	}

	public function deleteOrder($id='')
	{
		$this->db->where('invoice_no', $id);
		return $result=$this->db->delete('orders');
	}

	public function fecthAllDataCountData()
	{
		$query = $this->db->select('id as pid, product_code as pcode, name as pname, quantity as pquantity')
							->from('products')
							->get();
		return $query->result_array();

		// if($data = $query->result_array())
		// {
		// 	// echo "<pre>"; print_r($data); echo "</pre>";
		// 	foreach ($data as $key => $value){
			 	
		// 		$opData = $this->model_stock->fetchStockCountOS($value['pid'], 'os', 'os_quantity');

		// 		$result = array();
		// 		$result[] = $value;
		// 		// echo $product_id = $value['pid'];
		// 		// echo $opData['product_id'];
		// 		if (in_array($value['pid'], $opData)) {
					
		// 			$result[] = $opData;
		// 		}
		// 		echo "<pre>"; print_r($result); echo "</pre>";

		// 	} 
		// }
		// // return $result;
		// // echo "<pre>"; print_r($result); echo "</pre>";
		// exit();
	}

	public function fecthProductRecords($product_id, $size_id)
	{
		$query = $this->db->select('*')
							->from('products')
							->where('id', $product_id)
							->where('size', $size_id)
							->get();
		return $query->result();
	}

	public function fecthInventoryReportData($data=array())
	{
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, products.sales_price, stock.quantity, products_categories.name as category')
							->from('products')
							->where('products.id', $data['product'])
							->or_where('category', $data['category'])
							->or_where('size', $data['size'])
							->or_where('stock.inventory_type', $data['stock'])
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->get();
		return $query->result();
	}

	public function fecthStockData($data=array())
	{
		// print_r($data);exit();
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, stock.inventory_type, products.sales_price, stock.quantity, products_categories.name as category')
							->from('products')
							->where('stock.inventory_type', $data['stock'])
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->get();
		return $query->result();
	}

	public function fecthCategoryReport($data=array())
	{
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, stock.inventory_type, products.sales_price, products.quantity, products_categories.name as category')
							->from('products')
							->group_by('products.product_code')
							->where('products.category', $data['category'])
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->get();
		return $query->result();
	}

	public function fecthCategoryWiseReport($data=array())
	{
		// print_r($data);exit();
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, stock.inventory_type, products.sales_price, stock.quantity, products_categories.name as category')
							->from('products')
							->group_by('products.product_code')
							->where('stock.inventory_type', $data['stock'])
							->where('products.category', $data['category'])
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->get();
		return $query->result();
	}

	public function fecthProductReport($data=array())
	{
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, stock.inventory_type, products.sales_price, products.quantity, products_categories.name as category')
							->from('products')
							->group_by('products.name')
							->where('stock.product_id', $data['product'])
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->get();
		return $query->result();
	}

	public function fecthProductWiseReport($data=array())
	{
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, stock.inventory_type, products.sales_price, stock.quantity, products_categories.name as category')
							->from('products')
							->where('stock.product_id', $data['product'])
							->where('stock.inventory_type', $data['stock'])
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->get();
		return $query->result();
	}

	public function fecthSizeReport($data=array())
	{
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, stock.inventory_type, products.sales_price, products.quantity, products_categories.name as category')
							->from('products')
							->group_by('products.name')
							->where('products.size', $data['size'])
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->get();
		return $query->result();
	}

	public function fecthSizeWiseReport($data=array())
	{
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, stock.inventory_type, products.sales_price, stock.quantity, products_categories.name as category')
							->from('products')
							->where('products.size', $data['size'])
							->where('stock.inventory_type', $data['stock'])
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->get();
		return $query->result();
	}

	public function fecthCatProductReports($data=array())
	{
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, stock.inventory_type, products.sales_price, products.quantity, products_categories.name as category')
							->from('products')
							->group_by('products.name')
							->where('stock.product_id', $data['product'])
							->where('products.category', $data['category'])
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->get();
		return $query->result();
	}

	public function fecthCatProductWiseReports($data=array())
	{
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, stock.inventory_type, products.sales_price, stock.quantity, products_categories.name as category')
							->from('products')
							->where('stock.product_id', $data['product'])
							->where('products.category', $data['category'])
							->where('stock.inventory_type', $data['stock'])
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->get();
		return $query->result();
	}

	public function fecthProductSizeReport($data=array())
	{
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, stock.inventory_type, products.sales_price, products.quantity, products_categories.name as category')
							->from('products')
							->group_by('products.name')
							->where('products.size', $data['size'])
							->where('stock.product_id', $data['product'])
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->get();
		return $query->result();
	}

	public function fecthProductSizeWiseReport($data=array())
	{
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, stock.inventory_type, products.sales_price, stock.quantity, products_categories.name as category')
							->from('products')
							->where('products.size', $data['size'])
							->where('stock.product_id', $data['product'])
							->where('stock.inventory_type', $data['stock'])
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->get();
		return $query->result();
	}

	public function fecthCatSizeReport($data=array())
	{
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, stock.inventory_type, products.sales_price, products.quantity, products_categories.name as category')
							->from('products')
							->group_by('products.name')
							->where('products.size', $data['size'])
							->where('products.category', $data['category'])
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->get();
		return $query->result();
	}

	public function fecthCatSizeWiseReport($data=array())
	{
		// print_r($data);exit();
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, stock.inventory_type, products.sales_price, stock.quantity, products_categories.name as category')
							->from('products')
							->where('products.size', $data['size'])
							->where('products.category', $data['category'])
							->where('stock.inventory_type', $data['stock'])
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('products_categories', 'products_categories.id = products.category', 'left')
							->get();
		return $query->result();
	}

	public function fecthProductsDataForReports()
	{
		$query = $this->db->select('id as pid, product_code, name, purchase_price, sales_price')
							->from('products')
							->get();
		return $query->result();
	}

	public function fecthOrdersDataForReports()
	{
		$query = $this->db->select('orders.id as oid, orders.invoice_no, name_id, orders.gross_total, stock.quantity as stock_quantity, stock.product_id, stock.inventory_type as type')
							->from('stock')
							->where('stock.inventory_type', 'ps')
							->or_where('stock.inventory_type', 'os')
							->join('orders', 'orders.invoice_no = stock.invoice_no', 'left')
							->get();
		return $query->result();
	}

	// view product invoice

	public function viewData($invoice_no = '')
	{
		$query = $this->db->select('stock.invoice_no, stock.created, orders.paymentterm_id as ipterm, payment_term.name as pterm, payment_method.name as pmethod, orders.due_date, orders.name_id as sid, orders.paymentmethod_id as pmid, orders.paymentterm_id as ptid, orders.gross_total, supplier.name as sname, orders.total, orders.tax, orders.gross_total, orders.paidamount, orders.dueamount, orders.remark')
							->from('stock')
							->where('inventory_type', 'pi')
							->where('stock.invoice_no', $invoice_no)
							->join('orders', 'orders.invoice_no = stock.invoice_no ', 'left')
							->join('supplier', 'supplier.id = orders.name_id ', 'left')
							->join('payment_term', 'payment_term.id = orders.paymentterm_id ', 'left')
							->join('payment_method', 'payment_method.id = orders.paymentmethod_id', 'left')
							->get();
		return $query->row_array();
	}

	public function viewPInvoiceData($invoice_no='')
	{
		$query = $this->db->select('products.id as pid, products.name as pname, products.gst, products.hsn, products.purchase_price as pprice, size.name as sname, stock.quantity as qty, stock.product_tax as tax, stock.product_total as total')
							->from('products')
							->where('stock.invoice_no', $invoice_no)
							->where('inventory_type', 'pi')
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('size', 'size.id = products.size', 'left')
							->get();
		return $query->result();
	}

	// edit invoice
	public function checkAvailable($invoice_no='', $product_id='')
	{
		// echo "<br>"; echo $invoice_no; echo "<br>"; 
		// echo $product_id; echo "<br>"; //exit();
		$query = $this->db->select('id')
							->from('stock')
							->where('inventory_type', 'pi')
							->where('product_id', $product_id)
							->where('invoice_no', $invoice_no)
							->get();
		if($query->row_array())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function checkSalesInvoiceAvailable($invoice_no='', $product_id='')
	{
		$query = $this->db->select('id')
							->from('stock')
							->where('inventory_type', 'si')
							->where('product_id', $product_id)
							->where('invoice_no', $invoice_no)
							->get();
		if($query->row_array())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getProductsDataID($id = '')
	{
		// echo $id;
		$query = $this->db->select('id, quantity')
							->from('products')
							->where('id', $id)
							->get();
		return $query->row_array();
	}


	public function fecthPurchaseReport($data=array())
	{
		$query = $this->db->select('orders.billing_date, products.name as pname, products.product_code, stock.quantity, products.gst, products.purchase_price as pprice, products.sales_price as sprice, orders.invoice_no, orders.paidamount, orders.dueamount')
							->from('stock')
							->where('orders.billing_date >=', $data['from'])
							->where('orders.billing_date <=', $data['to'])
							->where('inventory_type', 'si')
							->group_by('orders.invoice_no')
							->join('orders', 'orders.invoice_no = stock.invoice_no ', 'left')
							->join('supplier', 'supplier.id = orders.name_id ', 'left')
							->join('products', 'products.id = stock.product_id ', 'left')
							->get();
		return $query->result();
	}

	public function fecthAllPurchaseReport($data=array())
	{
		$query = $this->db->select('orders.billing_date, products.name as pname, products.product_code, stock.quantity, products.gst, products.purchase_price as pprice, products.sales_price as sprice, orders.invoice_no, orders.paidamount, orders.dueamount')
							->from('stock')
							->where('orders.billing_date >=', $data['from'])
							->where('orders.billing_date <=', $data['to'])
							->where('products.id', $data['product'])
							->where('inventory_type', 'si')
							->group_by('orders.invoice_no')
							->join('orders', 'orders.invoice_no = stock.invoice_no ', 'left')
							->join('supplier', 'supplier.id = orders.name_id ', 'left')
							->join('products', 'products.id = stock.product_id ', 'left')
							->get();
		return $query->result();
	}

	public function fecthProductReportSum($product_id='')
	{
		$query = $this->db->select('SUM(stock.quantity) as qty , orders.billing_date, products.name as pname, products.product_code, stock.quantity, products.gst, products.purchase_price as pprice, products.sales_price as sprice, orders.invoice_no, orders.paidamount, orders.dueamount')
							->from('stock')
							->where('inventory_type', 'pi')
							// ->group_by('orders.invoice_no')
							->where('stock.product_id', $product_id)
							->join('orders', 'orders.invoice_no = stock.invoice_no ', 'left')
							->join('supplier', 'supplier.id = orders.name_id ', 'left')
							->join('products', 'products.id = stock.product_id ', 'left')
							->get();
		return $query->row_array();
	}

	public function fecthProductWiseSalesReport()
	{
		$query = $this->db->select('orders.billing_date, products.name as pname, products.product_code, stock.quantity, products.gst, products.purchase_price as pprice, products.sales_price as sprice, orders.invoice_no, orders.paidamount, orders.dueamount')
							->from('stock')
							->where('inventory_type', 'si')
							->group_by('orders.invoice_no')
							->join('orders', 'orders.invoice_no = stock.invoice_no ', 'left')
							->join('supplier', 'supplier.id = orders.name_id ', 'left')
							->join('products', 'products.id = stock.product_id ', 'left')
							->get();
		return $query->result();
	}


	public function purchaseData($product_id='')
	{
		$query = $this->db->select('SUM(stock.quantity) as qty , stock.*, products.sales_price')
							->from('stock')
							->where('inventory_type', 'si')
							->where('product_id', $product_id)
							->join('orders', 'orders.invoice_no = stock.invoice_no ', 'left')
							->join('supplier', 'supplier.id = orders.name_id ', 'left')
							->join('products', 'products.id = stock.product_id ', 'left')
							->get();
		return $query->row_array();
	}

	public function purchaseData1($from='', $to='', $product_id='')
	{
		$query = $this->db->select('SUM(stock.quantity) as qty , stock.*, products.sales_price')
							->from('stock')
							->where('inventory_type', 'si')
							->where('product_id', $product_id)
							->where(['stock.created >=' => $from, 'stock.created <=' => $to])
							->join('orders', 'orders.invoice_no = stock.invoice_no ', 'left')
							->join('supplier', 'supplier.id = orders.name_id ', 'left')
							->join('products', 'products.id = stock.product_id ', 'left')
							->get();
		return $query->row_array();
	}

	public function fetchDataByID1($id='')
	{
		$query = $this->db->select('products.id as products_id, products.*')
							->from('products')
							->where('id', $id)
							->get();
		return $query->row_array();
	}

	public function fetchDataByID2($from='', $to='', $id='')
	{
		$query = $this->db->select('products.id as products_id, products.*')
							->from('products')
							->where('id', $id)
							->where(['created >=' => $from, 'created <=' => $to])
							->get();
		return $query->row_array();
	}
}