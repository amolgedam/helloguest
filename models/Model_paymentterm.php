<?php 

class Model_paymentterm extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fecthActivePaymentorData()
	{
		$query = $this->db->select()
							->from('payment_term')
							->where('status', 'active')
							->get();
		return $query->result();
	}

	public function fecthAllData()
	{
		$query = $this->db->select('*')
							->from('payment_term')
							->get();
		return $query->result();
	}

	public function create($data = array())
	{
		if($data) {

			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('payment_term', $data);
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
			return $result = $this->db->update('payment_term');
		}
	}

	public function deletePaymentor($id = "")
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('payment_term');
	}

	public function statusWaiter($data = array())
	{
		if($data) {
			$this->db->set('modified','NOW()', FALSE);

			$this->db->set('status', $data['active']);

			$this->db->where('id', $data['id']);
			return $result = $this->db->update('payment_term');
		}
	}
}		