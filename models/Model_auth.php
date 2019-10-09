<?php 

class Model_auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* 
		This function checks if the email exists in the database
	*/
	public function check_email($email) 
	{
		if($email) {
			$sql = 'SELECT * FROM users WHERE email = ?';
			$query = $this->db->query($sql, array($email));
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}
		return false;
	}

	/* 
		This function checks if the email and password matches with the database
	*/
	public function login($email, $password) {
		if($email && $password) {

			$query	= $this->db->select()
							->from('users')
							->where(['email' => $email, 'password' => md5($password)])
							->get();
			return $query->row_array();

			// $sql = "SELECT * FROM users WHERE email = ? and password = ?";
			// $query = $this->db->query($sql, array($email, $password));

			// if($query->num_rows() == 1) {
			// 	$result = $query->row_array();
			// 	// // echo md5($password); echo "<br>";
			// 	// // print_r($result);exit();
			// 	// $hash_password = password_verify($password, $result['password']);
			// 	// // echo $hash_password;exit();
			// 	// if($hash_password === true) {
			// 	// 	return $result;	
			// 	// }
			// 	// else {
			// 	// 	return false;
			// 	// }
			// 	return $result;
			// }
			// else {
			// 	return false;
			// }
		}
	}
}