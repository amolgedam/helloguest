<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Company Details';

		$this->load->model('model_company');
    }

    /* 
    * It redirects to the company page and displays all the company information
    * It also updates the company information into the database if the 
    * validation for each input field is successfully valid
    */
	public function index()
	{  
		if(!in_array('updateSetting', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
		$this->form_validation->set_rules('company_name', 'Company name', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			// echo "validation successfully<br>";print_r($this->input->post());exit();
			if($_FILES['img']['error'] == '0')
			{
				// echo "File found"; exit();
				$config['upload_path'] = './uploads/';
	            $config['allowed_types'] = 'jpeg|jpg|png|';
	            $config['max_size'] = 1024 * 8;

	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            // $this->upload->do_upload('img');

				if (!$this->upload->do_upload('img'))
		        {
		        	$this->session->set_flashdata('feedback','Unable to Update Profile!');
					$this->session->set_flashdata('feedback_class','alert alert-dange');
		            // exit();
        			redirect('company/index');
			    }
			    else
			    {
			    	$imgData = $this->upload->data();
			    	unlink('./uploads/'.$this->input->post('profileName'));

			    	$img = $imgData['file_name'];//exit();
			    }
			}
			else
			{
				$img = $this->input->post('profileName');
				// echo "File not found"; echo $img; exit();
			}

			// update company data
			$data = array(
                    'company_name' => $this->input->post('company_name'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                    'state' => $this->input->post('state'),
                    'city' => $this->input->post('city'),
                    'postal_code' => $this->input->post('postal_code'),
                    'gstin' => $this->input->post('gstin'),
                    'pan' => $this->input->post('pan'),
                    'phone' => $this->input->post('phone'),
                    'image' =>  $img,
                );
			// print_r($data);exit();
			// update session data
			$this->session->set_userdata('companyImg', $img);
            $this->session->set_userdata('company_name', $this->input->post('company_name'));
            // print_r($this->session->userdata['logged_in']['companyImg']); exit();
            $update = $this->model_company->update($data, 1);
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		return redirect('company/');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		return redirect('company');
        	}
		}
		else
		{
			// false case
            // $this->data['currency_symbols'] = $this->currency();
        	$this->data['company_data'] = $this->model_company->getCompanyData(1);

			$this->render_template('admin_view/company/index', $this->data);
		}        
	}

}	