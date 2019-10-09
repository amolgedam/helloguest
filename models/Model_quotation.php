<?php 

class Model_quotation extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getQuotationLastID()
	{
	    $query = $this->db->select()
	                        ->from('quotation')
	                        ->order_by('id', 'desc')
	                        ->get();
	   return $query->row_array();
	}

	public function createQuotation($data=array())
	{
		if($data) {
			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('quotation', $data);
			return ($create == true) ? true : false;
		}
	}

	public function updateQuotationStock($data=array())
	{
		$this->db->where('invoice_no', $data['invoice_no']);
		$update = $this->db->update('stock', $data);
		return ($update == true) ? true : false;
	}

	public function checkAvailable($invoice_no='', $product_id='')
	{
		$query = $this->db->select('id')
							->from('stock')
							->where('inventory_type', 'qu')
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

	public function fecthAllData()
	{
		$query = $this->db->select('*')
							->from('quotation')
							->group_by('invoice_no')
							->join('customer', 'customer.id = quotation.customer_id', 'left')
							->get();
		return $query->result();
	}

	public function viewData($invoice_no = '')
	{
		$query = $this->db->select('quotation.invoice_no, quotation.date, customer.id as cid, customer.name, quotation.subtotal, quotation.tax, quotation.total, quotation.remark')
							->from('stock')
							->where('inventory_type', 'qu')
							->where('stock.invoice_no', $invoice_no)
							->join('quotation', 'quotation.invoice_no = stock.invoice_no')
							->join('customer', 'customer.id = quotation.customer_id')
							->get();
		return $query->row_array();
	}

	public function viewInvoiceData($invoice_no='')
	{
		$query = $this->db->select('products.id as pid, products.name as pname, products.gst, products.hsn, products.purchase_price as pprice, products.sales_price as sprice,, size.name as sname, stock.quantity as qty, stock.product_tax as tax, stock.product_total as total, stock.discount')
							->from('products')
							->where('stock.invoice_no', $invoice_no)
							->where('inventory_type', 'qu')
							->join('stock', 'stock.product_id = products.id', 'left')
							->join('size', 'size.id = products.size', 'left')
							->get();
		return $query->result();
	}

	public function fetchQuotation($invoice_no='')
	{
		$query = $this->db->select('*')
							->from('quotation')
							->where('invoice_no', $invoice_no)
							->get();
		return $query->row_array();
	}

	public function deleteQuotation($invoice_no='')
	{
		$this->db->where('invoice_no', $invoice_no);
		return $result=$this->db->delete('quotation');
	}

	public function deleteQuotationInvoice($invoice_no='')
	{
		// echo $invoice_no;exit();
		$this->db->where('invoice_no', $invoice_no);
		$this->db->where('inventory_type', 'qu');
		return $result=$this->db->delete('stock');
	}

}