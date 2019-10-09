<?php 

class Model_supplier extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
		public function tobeQuantity()
	{
	    $query = $this->db->select('products.id, products.name, products.quantity, products_categories.name as cname')
	                        ->from('products')
	                        ->where('quantity <=', 5)
	                        ->join('products_categories', 'products_categories.id = products.category', 'left')
	                        ->get();
	   return $query->result();
	}
	
	public function tobePaid($todayDate)
	{
	    $query = $this->db->select('supplier.name as name, orders.id, orders.invoice_no, orders.dueamount , orders.billing_date')
	                        ->from('orders')
	                        ->where('due_date', $todayDate)
	                        ->where('inventory_type', 'pi')
	                        ->join('supplier', 'supplier.id = orders.name_id', 'left')
	                        ->join('stock', 'stock.invoice_no = orders.invoice_no', 'left')
	                        ->get();
	   return $query->result();
	}
	
	public function tobeReceived($todayDate)
	{
	     $query = $this->db->select()
	                        ->from('orders')
	                        ->where('due_date', $todayDate)
	                        ->where('inventory_type', 'si')
	                        ->join('customer', 'customer.id = orders.name_id', 'left')
	                        ->join('stock', 'stock.invoice_no = orders.invoice_no', 'left')
	                        ->get();
	   return $query->result();
	}

	public function create($data = array())
	{
		if($data) {

			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('supplier', $data);
			return ($create == true) ? true : false;
		}
	}

	public function fecthAllData()
	{
		$query = $this->db->select('*')
							->from('supplier')
							->order_by('created', 'desc')
							->get();
		return $query->result();
	}

	public function fecthDataByID($id='')
	{
		$query = $this->db->select('*')
							->from('supplier')
							->where('id', $id)
							->get();
		return $query->row_array();
	}

	public function update($data = array())
	{
		$this->db->where('id', $data['id']);
		$update = $this->db->update('supplier', $data);
		return ($update == true) ? true : false;
	}

	public function delete($id = "")
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('supplier');
	}

	public function fecthPurchaseData()
	{
		$query = $this->db->select('orders.billing_date, stock.invoice_no, supplier.name, stock.quantity, orders.gross_total, orders.dueamount')
							->from('stock')
							->where('stock.inventory_type', 'pi')
							->join('orders', 'orders.invoice_no = stock.invoice_no', 'left')
							->join('supplier', 'supplier.id = orders.name_id', 'left')
							->get();
		return $query->result();
	}

	public function fecthPurchaseReport($data=array())
	{
		// print_r($data);exit();
		$query = $this->db->select()
							->from('stock')
							->where('orders.billing_date >=', $data['from'])
							->where('orders.billing_date <=', $data['to'])
							->where('stock.inventory_type', 'pi')
							->group_by('stock.invoice_no')
							->join('orders', 'orders.invoice_no = stock.invoice_no', 'left')
							->join('supplier', 'supplier.id = orders.name_id', 'left')
							->get();
		return $query->result();
	}

	public function fecthPurchaseWiseReport($data=array())
	{
		// print_r($data);exit();
		$query = $this->db->select()
							->from('stock')
							->where('supplier.id', $data['supplier'])
							->where('orders.billing_date >=', $data['from'])
							->where('orders.billing_date <=', $data['to'])
							->where('stock.inventory_type', 'pi')
							->group_by('stock.invoice_no')
							->join('orders', 'orders.invoice_no = stock.invoice_no', 'left')
							->join('supplier', 'supplier.id = orders.name_id', 'left')
							->get();
		return $query->result();
	}
	
}