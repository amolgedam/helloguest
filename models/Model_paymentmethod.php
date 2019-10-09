<?php 

class Model_paymentmethod extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fecthActivePaymentorData()
	{
		$query = $this->db->select()
							->from('payment_method')
							->where('status', 'active')
							->get();
		return $query->result();
	}

	public function fecthDataByID($id)
	{
		$query = $this->db->select('*')
							->from('payment_method')
							->where('id', $id)
							->get();
		return $query->row_array();
	}

	public function fecthAllData()
	{
		$query = $this->db->select('*')
							->from('payment_method')
							->get();
		return $query->result();
	}

	public function create($data = array())
	{
		if($data) {

			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('payment_method', $data);
			return ($create == true) ? true : false;
		}
	}

	public function update($data = array())
	{
		if($data) {
			$this->db->set('modified','NOW()', FALSE);

			$this->db->set('name', $data['name']);
			$this->db->set('status', $data['active']);

			$this->db->where('id', $data['id']);
			return $result = $this->db->update('payment_method');
		}
	}

	public function delete($id = "")
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('payment_method');
	}

	public function statusWaiter($data = array())
	{
		if($data) {
			$this->db->set('modified','NOW()', FALSE);

			$this->db->set('status', $data['active']);

			$this->db->where('id', $data['id']);
			return $result = $this->db->update('payment_method');
		}
	}
}		