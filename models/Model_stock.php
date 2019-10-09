<?php 

class Model_stock extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function updateStock($data=array())
	{
		$this->db->where('inventory_type', 'pi');
		$this->db->where('product_id', $data['product_id']);
		$this->db->where('invoice_no', $data['invoice_no']);
		$update = $this->db->update('stock', $data);
		// return ($update == true) ? true : false;

		if($update == true)
		{
			$query = $this->db->select('quantity')
									->from('products')
									->where('id', $data['product_id'])
									->get();
				return $query->row_array();
		}
		else
		{
			return false;
		}
	}

	public function updateOpeningStock($data=array())
	{
		$this->db->where('product_id', $data['product_id']);
		$this->db->where('inventory_type', $data['inventory_type']);

		$update = $this->db->update('stock', $data);
		return ($update == true) ? true : false;
	}

	public function updateConsumptionStock($data=array())
	{
		$this->db->where('product_id', $data['product_id']);
		$this->db->where('inventory_type', $data['inventory_type']);

		$update = $this->db->update('stock', $data);
		return ($update == true) ? true : false;
	}

	public function updateSalesStock($data=array())
	{
		$this->db->where('inventory_type', 'si');
		$this->db->where('product_id', $data['product_id']);
		$this->db->where('invoice_no', $data['invoice_no']);
		$update = $this->db->update('stock', $data);
		// return ($update == true) ? true : false;

		if($update == true)
		{
			$query = $this->db->select('quantity')
									->from('products')
									->where('id', $data['product_id'])
									->get();
				return $query->row_array();
		}
		else
		{
			return false;
		}
	}

	public function delete($id = "")
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('stock');
	}

	public function create($data = array())	
	{
		if($data) {
			// print_r($data);exit();
			$create = $this->db->insert('stock', $data);
			// return ($create == true) ? true : false;

			if($create == true)
			{
				$query = $this->db->select('quantity')
									->from('products')
									->where('id', $data['product_id'])
									->get();
				return $query->row_array();

				// if($query->row_array() == true)
			}
			else
			{
				return false;
			}
		}
	}

	public function createQuotationStock($data=array())
	{
		if($data) {
			// $this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('stock', $data);
			return ($create == true) ? true : false;
		}
	}

	public function updateQuotationStock($data=array())
	{
		$this->db->where('invoice_no', $data['invoice_no']);
		$this->db->where('product_id', $data['product_id']);
		$this->db->where('inventory_type', 'qu');
		$update = $this->db->update('stock', $data);
		return ($update == true) ? true : false;
	}

	public function getStockDataByInvoice($invoice_no='')
	{
		$query = $this->db->select()
							->from('stock')
							->where('inventory_type', 'pi')
							->where('invoice_no', $invoice_no)
							->get();
		return $query->result_array();
	}

	public function getSalesStockDataByInvoice($invoice_no='')
	{
		$query = $this->db->select()
							->from('stock')
							->where('inventory_type', 'si')
							->where('invoice_no', $invoice_no)
							->get();
		return $query->result_array();
	}

	public function createOrder($data = array())
	{
		if($data) {
			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('orders', $data);
			return ($create == true) ? true : false;
		}
	}

	public function deleteOrder($data=array())
	{
		$this->db->where('invoice_no', $data['invoice_no']);
		return $result=$this->db->delete('orders');
	}

	public function updateOrder($data = array())
	{
		// print_r($data); exit();
		$this->db->where('invoice_no', $data['invoice_no']);
		$update = $this->db->update('orders', $data);
		return ($update == true) ? true : false;
	}

	public function fecthStockData($type)
	{	
		// echo $type; exit();
		$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, products.sales_price, products.gst, products.description, products.status, products_categories.name as category, products_subcategories.id as subcategory_id, products_subcategories.name as subcategory, unit.id as unit_id, unit.name as unit, size.id as size_id, size.name as size, stock.quantity')
							->from('products')
							->where('stock.inventory_type', $type)
							->join('products_subcategories', 'products_subcategories.id = products.subcategory ', 'left')
							->join('stock', 'stock.product_id = products.id ', 'left')
							->join('products_categories', 'products_categories.id = products_subcategories.category_id ', 'left')
							->join('unit', 'unit.id = products.unit ', 'left')
							->join('size', 'size.id = products.size ', 'left')
							->get();
		return $query->result();
	}

	public function fecthAllData()
	{
		$query = $this->db->select('*')
							->from('stock')
							->get();
		return $query->result();
	}

	public function fetchStockCountOS($id='', $type, $name)
	{
		// echo $id; echo $type;
		// echo "$id<br>";
		$query = $this->db->select_sum('quantity', $name)
							->select('product_id')
							->from('stock')
							->where('inventory_type', $type)
							->where('product_id', $id)
							->get();
		return $query->row_array();
	}

	// public function getProductsDataByID($id='')
	// {
	// 	$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, products.sales_price, products.gst, products.description, products.status, products_categories.name as category, products_subcategories.id as subcategory_id, products_subcategories.name as subcategory, unit.id as unit_id, unit.name as unit, size.id as size_id, size.name as size')
	// 						->from('products')
	// 						->where('products.id', $id)
	// 						->join('products_subcategories', 'products_subcategories.id = products.subcategory ', 'left')
	// 						->join('products_categories', 'products_categories.id = products_subcategories.category_id ', 'left')
	// 						->join('unit', 'unit.id = products.unit ', 'left')
	// 						->join('size', 'size.id = products.size ', 'left')
	// 						->get();
	// 	return $query->row_array();
	// }

	// public function fecthAllProductsData()
	// {
	// 	$query = $this->db->select('products.id as products_id, products.product_code, products.name as pname, products.purchase_price, products.hsn, products.sales_price, products.gst, products.description, products.status, products_categories.name as category, products_subcategories.id as subcategory_id, products_subcategories.name as subcategory, unit.id as unit_id, unit.name as unit, size.id as size_id, size.name as size')
	// 						->from('products')
	// 						->join('products_subcategories', 'products_subcategories.id = products.subcategory ', 'left')
	// 						->join('products_categories', 'products_categories.id = products_subcategories.category_id ', 'left')
	// 						->join('unit', 'unit.id = products.unit ', 'left')
	// 						->join('size', 'size.id = products.size ', 'left')
	// 						->get();
	// 	return $query->result();
	// }

	public function update($data = array())
	{
		// print_r($data); exit();
		$this->db->where('id', $data['product_id']);
		$update = $this->db->update('products', $data);
		return ($update == true) ? true : false;
	}



	// public function delete($id = "")
	// {
	// 	$this->db->where('id', $id);
	// 	return $result=$this->db->delete('products');
	// }

	public function inventoryReport($id='', $type='', $name='')
	{
		$query = $this->db->select('products.id as pid, products.product_code as pcode, products.name as pname, products.quantity as pquantity')
							->select_sum('stock.quantity', $name)
							->from('products')
							->where('products.id', $id)
							->where('stock.inventory_type', $type)
							->join('stock', 'stock.product_id = products.id', 'left')
							->get();
		return $query->result();
	}

	public function fecthStockByID($id='')
	{
		$query = $this->db->select('products.id as products_id, products.quantity as pquantity, products.product_code, products.name as pname, products.purchase_price, products.hsn, products.sales_price, products.gst, products.description, products.status, products_categories.name as category, products_subcategories.id as subcategory_id, products_subcategories.name as subcategory, unit.id as unit_id, unit.name as unit, size.id as size_id, size.name as size, stock.id as stock_id, stock.quantity')
							->from('products')
							->where('stock.product_id', $id)
							->join('stock', 'stock.product_id = products.id ', 'left')
							->join('products_subcategories', 'products_subcategories.id = products.subcategory ', 'left')
							->join('products_categories', 'products_categories.id = products_subcategories.category_id ', 'left')
							->join('unit', 'unit.id = products.unit ', 'left')
							->join('size', 'size.id = products.size ', 'left')
							->get();
		return $query->row_array();
	}

	public function fecthOpeningStockByID($id='')
	{
		$query = $this->db->select('products.id as products_id, products.quantity as pquantity, products.product_code, products.name as pname, products.purchase_price, products.hsn, products.sales_price, products.gst, products.description, products.status, products_categories.name as category, products_subcategories.id as subcategory_id, products_subcategories.name as subcategory, unit.id as unit_id, unit.name as unit, size.id as size_id, size.name as size, stock.id as stock_id, stock.quantity')
							->from('products')
							->where('stock.product_id', $id)
							->where('stock.inventory_type', 'os')
							->join('stock', 'stock.product_id = products.id ', 'left')
							->join('products_subcategories', 'products_subcategories.id = products.subcategory ', 'left')
							->join('products_categories', 'products_categories.id = products_subcategories.category_id ', 'left')
							->join('unit', 'unit.id = products.unit ', 'left')
							->join('size', 'size.id = products.size ', 'left')
							->get();
		return $query->row_array();
	}

	public function fecthConsumptionDataByID($id='')
	{
		$query = $this->db->select('products.id as products_id, products.quantity as pquantity, products.product_code, products.name as pname, products.purchase_price, products.hsn, products.sales_price, products.gst, products.description, products.status, products_categories.name as category, products_subcategories.id as subcategory_id, products_subcategories.name as subcategory, unit.id as unit_id, unit.name as unit, size.id as size_id, size.name as size, stock.id as stock_id, stock.quantity')
							->from('products')
							->where('stock.product_id', $id)
							->where('stock.inventory_type', 'ic')
							->join('stock', 'stock.product_id = products.id ', 'left')
							->join('products_subcategories', 'products_subcategories.id = products.subcategory ', 'left')
							->join('products_categories', 'products_categories.id = products_subcategories.category_id ', 'left')
							->join('unit', 'unit.id = products.unit ', 'left')
							->join('size', 'size.id = products.size ', 'left')
							->get();
		return $query->row_array();
	}

	public function fecthDamageDataByID($id='')
	{
		$query = $this->db->select('products.id as products_id, products.quantity as pquantity, products.product_code, products.name as pname, products.purchase_price, products.hsn, products.sales_price, products.gst, products.description, products.status, products_categories.name as category, products_subcategories.id as subcategory_id, products_subcategories.name as subcategory, unit.id as unit_id, unit.name as unit, size.id as size_id, size.name as size, stock.id as stock_id, stock.quantity')
							->from('products')
							->where('stock.product_id', $id)
							->where('stock.inventory_type', 'ds')
							->join('stock', 'stock.product_id = products.id ', 'left')
							->join('products_subcategories', 'products_subcategories.id = products.subcategory ', 'left')
							->join('products_categories', 'products_categories.id = products_subcategories.category_id ', 'left')
							->join('unit', 'unit.id = products.unit ', 'left')
							->join('size', 'size.id = products.size ', 'left')
							->get();
		return $query->row_array();
	}

	
}