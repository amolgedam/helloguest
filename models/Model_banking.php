<?php 

class Model_banking extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fecthAllAcccountData()
	{
		$query = $this->db->select('*')
							->from('accounts')
							->get();
		return $query->result();
	}

	public function fecthAcccountDataByID($id='')
	{
		$query = $this->db->select('*')
							->from('accounts')
							->where('id', $id)
							->get();
		return $query->row_array();
	}

	public function createAccount($data = array())
	{
		if($data) {
			// print_r($data);exit();
			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('accounts', $data);
			return ($create == true) ? true : false;
		}
	}

	public function updateAmount($data = array())
	{
		// print_r($data);exit();
		$this->db->where('id', $data['id']);
		$update = $this->db->update('accounts', $data);
		return ($update == true) ? true : false;
	}

	public function updateAccount($data = array())
	{
		// print_r($data);exit();
		$this->db->where('id', $data['id']);
		$update = $this->db->update('accounts', $data);
		return ($update == true) ? true : false;
	}

	public function deleteAccount($id = '')
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('accounts');
	}

	public function holderData($id = '')
	{
		// print_r($id); exit();
		$query = $this->db->select('*')
							->from('accounts')
							->where('id', $id)
							->get();
		return $query->row_array();
	}

	public function fecthSearchTransaction($data = array())
	{
		$query = $this->db->select('transactions.created, transactions.type, accounts.name, accounts.ac_number, withdraw.amount')
							->from('transactions')
							->where('transactions.created >=', $data['from'])
							->where('transactions.created <=', $data['to'])
							->where('transactions.type', $data['type'])
							->where('transactions.account_id', $data['account_id'])
							->join('accounts', 'accounts.id = transactions.account_id', 'left')
							->join('deposits', 'deposits.account_id = accounts.id', 'left')
							->join('withdraw', 'withdraw.account_id = accounts.id', 'left')
							->get();
		return $query->result();
	}

	public function fecthAllTransaction()
	{
		$query = $this->db->select('transactions.created, transactions.type, accounts.name, accounts.ac_number, transactions.amount')
							->from('transactions')
							->join('accounts', 'accounts.id = transactions.account_id', 'left')
							->join('deposits', 'deposits.account_id = accounts.id', 'left')
							->join('withdraw', 'withdraw.account_id = accounts.id', 'left')
							->get();
		return $query->result();
	}

	public function createTrasaction($data = array())
	{
		if($data) {

			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('transactions', $data);
			return ($create == true) ? true : false;
		}
	}

	public function updateTrasaction($data=array())
	{
		$this->db->where('deposite_id', $data['deposite_id']);
		$update = $this->db->update('transactions', $data);
		return ($update == true) ? true : false;
	}
	
}