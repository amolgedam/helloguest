<?php 

class Model_size extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fecthActiveSalesTypeData()
	{
		$query = $this->db->select()
							->from('size')
							->where('status', 'active')
							->get();
		return $query->result();
	}

	public function fecthAllData()
	{
		$query = $this->db->select('*')
							->from('size')
							->get();
		return $query->result();
	}

	public function create($data = array())
	{
		if($data) {
			// print_r($data);exit();
			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('size', $data);
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
			return $result = $this->db->update('size');
		}
	}

	public function delete($id = "")
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('size');
	}

	
}