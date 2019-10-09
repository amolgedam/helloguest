<?php 

class Model_salesman extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getSalesInvoiceLastID($si='')
	{
	    $query = $this->db->select()
	                        ->from('stock')
	                        ->where('inventory_type', $si)
	                        ->order_by('invoice_no', 'desc')
	                        ->get();
	   return $query->row_array();
	}

	public function fecthActiveSalesTypeData()
	{
		$query = $this->db->select()
							->from('salesman')
							->where('active', 'active')
							->get();
		return $query->result();
	}

	public function fecthAllData()
	{
		$query = $this->db->select('*')
							->from('salesman')
							->get();
		return $query->result();
	}

	public function create($data = array())
	{
		if($data) {
			// print_r($data);exit();
			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('salesman', $data);
			return ($create == true) ? true : false;
		}
	}

	public function update($data = array())
	{
		// print_r($data); exit();
		if($data) {
			$this->db->set('modified','NOW()', FALSE);

			$this->db->set('name', $data['name']);
			$this->db->set('status', $data['status']);

			$this->db->where('id', $data['id']);
			return $result = $this->db->update('salesman');
		}
	}

	public function delete($id = "")
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('salesman');
	}

	public function fecthSalesData()
	{
		$query = $this->db->select('orders.billing_date, orders.invoice_no, orders.gross_total as sales_value, orders.tax, orders.dueamount as balance_amount, stock.quantity, customer.name as cname')
							->from('orders')
							->group_by('stock.invoice_no')
							->where('stock.inventory_type', 'si')
							->join('stock', 'stock.invoice_no = orders.invoice_no', 'left')
							->join('customer', 'customer.id = orders.name_id', 'left')
							->get();
		return $query->result();
	}

	public function fecthAllSalesReport($data = array())
	{
		$query = $this->db->select('orders.billing_date, orders.invoice_no, orders.gross_total as sales_value, orders.tax, orders.dueamount as balance_amount, stock.quantity, customer.name as cname')
							->from('stock')
							->where('stock.inventory_type', 'si')
							->where('orders.billing_date >=', $data['from'])
							->where('orders.billing_date <=', $data['to'])
							->group_by('stock.invoice_no')
							->join('orders', 'orders.invoice_no = stock.invoice_no', 'left')
							->join('customer', 'customer.id = orders.name_id', 'left')
							->get();
		return $query->result();
	}

	public function fecthSalesReport($data=array())
	{
// 		print_r($data);exit();
		$query = $this->db->select('orders.billing_date, orders.invoice_no, orders.gross_total as sales_value, orders.tax, orders.dueamount as balance_amount, stock.quantity, customer.name as cname')
							->from('stock')
							->where('stock.inventory_type', 'si')
							// ->where('orders.invoice_no', 'stock.invoice_no')
							->where('orders.billing_date >=', $data['from'])
							->where('orders.billing_date <=', $data['to'])
							->where('orders.name_id', $data['customer'])
							->group_by('stock.invoice_no')
							->join('orders', 'orders.invoice_no = stock.invoice_no', 'left')
							->join('customer', 'customer.id = orders.name_id', 'left')
							->get();
		return $query->result();
	}

	public function fecthSalesInvoice()
	{
		$query = $this->db->select('stock.invoice_no, stock.created, orders.paymentterm_id as ipterm, payment_term.name as pterm, orders.due_date, orders.gross_total, orders.name_id as cname, orders.billing_date')
							->from('orders')
							->where('inventory_type', 'si')
							->group_by('stock.invoice_no')
							->order_by('invoice_no', 'desc')
							->join('stock', 'stock.invoice_no = orders.invoice_no', 'left')
							->join('customer', 'customer.id = orders.name_id ', 'left')
							->join('payment_term', 'payment_term.id = orders.paymentterm_id ', 'left')
							->get();
		return $query->result();
	}

	public function viewSalesData($invoice_no = '')
	{
		$query = $this->db->select('stock.invoice_no, stock.discount, stock.created, orders.paymentterm_id as ipterm, payment_term.name as pterm, payment_method.name as pmethod, orders.due_date, orders.salesman as sid, customer.name as cname, orders.paymentmethod_id as pmid, orders.paymentterm_id as ptid, orders.gross_total, orders.total, orders.tax, orders.gross_total, orders.paidamount, orders.dueamount, salesman.name as salesmanname, orders.billing_date, orders.name_id, orders.remark')
							->from('stock')
							->where('inventory_type', 'si')
							->where('stock.invoice_no', $invoice_no)
							->join('orders', 'orders.invoice_no = stock.invoice_no ', 'left')
							->join('customer', 'customer.id = orders.name_id ', 'left')
							->join('salesman', 'salesman.id = orders.salesman ', 'left')
							->join('payment_term', 'payment_term.id = orders.paymentterm_id ', 'left')
							->join('payment_method', 'payment_method.id = orders.paymentmethod_id', 'left')
							->get();
		return $query->row_array();
	}

	public function viewSInvoiceData($invoice_no='')
	{
		$query = $this->db->select('products.id as pid, products.name as pname, products.gst, products.hsn, products.purchase_price as pprice, products.sales_price as sprice,, size.name as sname, stock.discount, stock.quantity as qty, stock.product_tax as tax, stock.product_total as total, orders.billing_date, salesman.name as sid, orders.paymentterm_id as ipterm, orders.paymentmethod_id as pmid, orders.name_id, products.quantity')
							->from('products')
							->where('stock.invoice_no', $invoice_no)
							->where('inventory_type', 'si')
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('orders', 'orders.invoice_no = stock.invoice_no', 'left')
							->join('salesman', 'salesman.id = orders.name_id', 'left')
							->join('size', 'size.id = products.size', 'left')
							->join('payment_term', 'payment_term.id = orders.paymentterm_id ', 'left')
							->join('payment_method', 'payment_method.id = orders.paymentmethod_id', 'left')
							->get();
		return $query->result();
	}
}