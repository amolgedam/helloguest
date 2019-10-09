<?php 

class Model_coupon extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fecthActiveSalesTypeData()
	{
		$query = $this->db->select()
							->from('coupons')
							->where('active', 'active')
							->get();
		return $query->result();
	}

	public function fecthAllData()
	{
		$query = $this->db->select('*')
							->from('coupons')
							->get();
		return $query->result();
	}

	public function create($data = array())
	{
		if($data) {

			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('coupons', $data);
			return ($create == true) ? true : false;
		}
	}

	public function update($data = array())
	{
		// print_r($data); exit();
		if($data) {
			// $this->db->set('modified','NOW()', FALSE);

			$this->db->set('name', $data['name']);
			$this->db->set('status', $data['status']);

			$this->db->where('id', $data['id']);
			return $result = $this->db->update('coupons');
		}
	}

	public function delete($id = "")
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('coupons');
	}

	
}