<?php 

class Model_customer extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create($data = array())
	{
		if($data) {

			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('customer', $data);
			return ($create == true) ? true : false;
		}
	}

	public function fecthDataByID($id='')
	{
		$query = $this->db->select('*')
							->from('customer')
							->where('id', $id)
							->get();
		return $query->row_array();
	}

	public function fecthAllData()
	{
		$query = $this->db->select('*')
							->from('customer')
							->get();
		return $query->result();
	}

	public function update($data = array())
	{
		$this->db->where('id', $data['id']);
		$update = $this->db->update('customer', $data);
		return ($update == true) ? true : false;
	}

	public function delete($id = "")
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('customer');
	}


	
}