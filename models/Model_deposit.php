<?php 

class Model_deposit extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create($data = array())
	{
		if($data) {

			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('deposits', $data);
			// return ($create == true) ? true : false;
			$insert_id = $this->db->insert_id();
			return $insert_id;
		}
	}

	

	// public function fecthAllData()
	// {
	// 	$query = $this->db->select('*')
	// 						->from('deposits')
	// 						->get();
	// 	return $query->result();
	// }

	public function fecthAllDepostData()
	{
		$query = $this->db->select('deposits.id as depositid, deposits.description as deposit_desc, deposits.amount, deposits.reference, deposits.created, deposits.file, accounts.name as holdername, accounts.ac_number as acno, accounts.id as acid')
							->from('deposits')
							->join('accounts', 'accounts.id = deposits.account_id ', 'left')
							->get();
		return $query->result();
	}

	public function fecthDepositsByID($id='')
	{
		$query = $this->db->select('deposits.id as depositid, deposits.description as deposit_desc, deposits.amount, deposits.reference, deposits.created, deposits.file, deposits.paymentmethod_id as pmethod, accounts.name as holdername, accounts.ac_number as acno, accounts.id as acid')
							->from('deposits')
							->where('deposits.id', $id)
							->join('accounts', 'accounts.id = deposits.account_id ', 'left')
							->get();
		return $query->row_array();
	}


	public function update($data = array())
	{
		$this->db->where('id', $data['id']);
		$update = $this->db->update('deposits', $data);
		return ($update == true) ? true : false;
	}

	public function delete($id = "")
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('deposits');
	}


	
}