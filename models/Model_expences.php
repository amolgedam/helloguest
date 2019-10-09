<?php 

class Model_expences extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function createMyExpences($data = array())
	{
		if($data) {
			// print_r($data);exit();
			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('expences', $data);
			return ($create == true) ? true : false;
		}
	}

	public function deleteExpences($id = '')
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('expences');
	}

	public function updateMyExpences($data = array())
	{
		$this->db->where('id', $data['id']);
		$update = $this->db->update('expences', $data);
		return ($update == true) ? true : false;
	}

	public function fecthDataByID($id='')
	{
		$query = $this->db->select('*')
							->from('expences')
							->where('id', $id)
							->get();
		return $query->row_array();
	}
	
	public function showAllExpencesDataWithCat()
	{
	    $query = $this->db->select('expences.id, expences.name as ename, expences.date as exp_date, expences.description, expences.amount, expences_category.name as cat_name')
							->from('expences')
							->join('expences_category', 'expences_category.id= expences.expcat_id', 'left')
							->get();
		return $query->result();
	}
	
	public function fecthAllExpencesDataWithCat()
	{
	    $query = $this->db->select('expences.id, expences.name as ename, expences.date, expences.description, expences.amount, expences_category.name as cat_name')
							->from('expences')
							->join('expences_category', 'expences_category.id= expences.expcat_id', 'left')
							->get();
		return $query->result();
	}

	public function fecthAllExpencesData()
	{
		$query = $this->db->select('*')
							->from('expences')
							->get();
		return $query->result();
	}

	public function fecthExpences()
	{
// 		$query = $this->db->select('expences.name as name, expences.date as date, expences.cheque_no, expences.amount, payment_method.name as payment_method')
// 							->from('expences')
// 							->join('payment_method', 'payment_method.id = expences.payment_method')
// 							->get();
// 		return $query->result();
		
		$query = $this->db->select('expences.name as name, expences.date as date, expences.cheque_no, expences.amount, payment_method.name as payment_method, expences_category.name as exp_catemane')
							->from('expences')
							->join('payment_method', 'payment_method.id = expences.payment_method')
							->join('expences_category', 'expences_category.id = expences.expcat_id')
							->get();
		return $query->result();
	}

	public function fecthExpencesReport($data=array())
	{
		// print_r($data); //exit();
// 		$query = $this->db->select('expences.name as name, expences.date as date, expences.cheque_no, expences.amount, payment_method.name as payment_method')
// 							->from('expences')
// 							->join('payment_method', 'payment_method.id = expences.payment_method')
// 							->where('expences.date >=', $data['from'])
// 							->where('expences.date <=', $data['to'])
// 							->get();
// 		return $query->result();
		
		$query = $this->db->select('expences.name as name, expences.date as date, expences.cheque_no, expences.amount, payment_method.name as payment_method, expences_category.name as exp_catemane')
							->from('expences')
							->join('payment_method', 'payment_method.id = expences.payment_method')
							->join('expences_category', 'expences_category.id = expences.expcat_id')
							->where('expences.date >=', $data['from'])
							->where('expences.date <=', $data['to'])
							->get();
		return $query->result();
	}

	public function fecthExpencesWiseReport($data=array())
	{
	   // echo $exp_id = $data['expences'];
	   // echo "<pre>"; print_r($data); exit;
// 		$query = $this->db->select('expences.name as name, expences.date as date, expences.cheque_no, expences.amount, payment_method.name as payment_method')
// 							->from('expences')
// 							->join('payment_method', 'payment_method.id = expences.payment_method')
// 							->where('expences.id', $data['expences'])
// 							->where('expences.date >=', $data['from'])
// 							->where('expences.date <=', $data['to'])
// 							->get();
// 		return $query->result();
		
		$query = $this->db->select('expences.name as name, expences.date as date, expences.cheque_no, expences.amount, payment_method.name as payment_method, expences_category.name as exp_catemane')
							->from('expences')
							->join('payment_method', 'payment_method.id = expences.payment_method')
							->join('expences_category', 'expences_category.id = expences.expcat_id')
							->where('expences.date >=', $data['from'])
							->where('expences.date <=', $data['to'])
							->where('expences.id', $data['expences'])
							->get();
		return $query->result();
	}
	
	public function fecthExpencesCatWiseReport($data=array())
	{
// 	    $query = $this->db->select('expences.name as name, expences.date as date, expences.cheque_no, expences.amount, payment_method.name as payment_method')
// 							->from('expences')
// 							->join('payment_method', 'payment_method.id = expences.payment_method')
// 							->where('expences.expcat_id', $data['expencescat'])
// 							->where('expences.date >=', $data['from'])
// 							->where('expences.date <=', $data['to'])
// 							->get();
// 		return $query->result();
		
		$query = $this->db->select('expences.name as name, expences.date as date, expences.cheque_no, expences.amount, payment_method.name as payment_method, expences_category.name as exp_catemane')
							->from('expences')
							->join('payment_method', 'payment_method.id = expences.payment_method')
							->join('expences_category', 'expences_category.id = expences.expcat_id')
							->where('expences.expcat_id', $data['expencescat'])
							->where('expences.date >=', $data['from'])
							->where('expences.date <=', $data['to'])
							->get();
		return $query->result();
	}

	public function fecthAllCategoryData()
	{
		$query = $this->db->select('*')
							->from('expences_category')
							->get();
		return $query->result();
	}

	public function createExpences($data = array())
	{
		if($data) {
			// print_r($data);exit();
			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('expences_category', $data);
			return ($create == true) ? true : false;
		}
	}

	public function updateExpencesCategory($data = array())
	{
		$this->db->where('id', $data['id']);
		$update = $this->db->update('expences_category', $data);
		return ($update == true) ? true : false;
	}

	public function deleteExpencesCategory($id = '')
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('expences_category');
	}
}