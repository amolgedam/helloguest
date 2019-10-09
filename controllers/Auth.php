<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

	    $this->load->model('model_auth');
		$this->load->model('model_company');
	}

	/* 
		Check if the login form is submitted, and validates the user credential
		If not submitted it redirects to the login page
	*/
	public function login()
	{
		$this->logged_in();
		$this->form_validation->set_rules('email', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE)
    	{
    		// check username available or not
           	$email_exists = $this->model_auth->check_email($this->input->post('email'));
    		// print_r($email_exists);exit();

    		if($email_exists == TRUE)
    		{
    			// check username and password
    			$login = $this->model_auth->login($this->input->post('email'), $this->input->post('password'));

    			// get company data for company profile
	           	$companyData = $this->model_company->getCompanyData(1);
	           	// print_r($companyData);exit();
	           	if($login)
	           	{
	           		$logged_in_sess = array(
           				'id' => $login['id'],
				        'username'  => $login['username'],
				        'email'     => $login['email'],
				        'logged_in' => TRUE,
				        'company_name' => $companyData['company_name'],
				        'companyImg' => $companyData['image']
					);

					// print_r($logged_in_sess); exit();
					$this->session->set_userdata($logged_in_sess);
					// $this->session->set_userdata($logged_in_sess);
           			redirect('dashboard');
	           	}
	           	else
	           	{
	           		$this->data['errors'] = 'Incorrect username/password combination';
           			$this->load->view('admin_view/login', $this->data);
	           	}
    		}
    		else
    		{
           		$this->data['errors'] = 'Username does not exists';
           		$this->load->view('admin_view/login', $this->data);
           	}	
    	}
    	else
    	{
			$this->load->view('admin_view/login');	
    	}
	}

	/*
		clears the session and redirects to login page
	*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

}
