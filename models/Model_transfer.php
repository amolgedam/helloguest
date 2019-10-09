<?php 

class Model_transfer extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create($data = array())
	{
		if($data) {

			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('transfer', $data);
			return ($create == true) ? true : false;
		}
	}

	public function fecthAllTransferData()
	{
		$query = $this->db->select('*')
							->from('transfer')
							->get();
		return $query->result();
	}


	public function delete($id = "")
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('transfer');
	}


	
}