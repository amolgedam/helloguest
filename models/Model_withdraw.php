<?php 

class Model_withdraw extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create($data = array())
	{
		if($data) {

			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('withdraw', $data);
			return ($create == true) ? true : false;
		}
	}

	// public function fecthAllData()
	// {
	// 	$query = $this->db->select('*')
	// 						->from('deposits')
	// 						->get();
	// 	return $query->result();
	// }

	public function fecthAllWithdrawData()
	{
		$query = $this->db->select('withdraw.id as withdrawid, withdraw.description as desc, withdraw.amount, withdraw.reference, withdraw.created, withdraw.file, accounts.name as name, accounts.ac_number as acno')
							->from('withdraw')
							->join('accounts', 'accounts.id = withdraw.account_id ', 'left')
							->get();
		return $query->result();
	}

	// public function update($data = array())
	// {
	// 	$this->db->where('id', $data['id']);
	// 	$update = $this->db->update('products', $data);
	// 	return ($update == true) ? true : false;
	// }

	public function delete($id = "")
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('withdraw');
	}


	
}