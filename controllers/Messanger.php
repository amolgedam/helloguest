<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Messanger extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Compose';
    }

	public function emailConfig()
	{
		if(!in_array('createConfigEmail', $this->permission)){
            redirect('dashboard', 'refresh');
        }

        $this->render_template('admin_view/messanger/emailConfig', $this->data);
	}

	public function index()
	{
		if(!in_array('viewConfigEmail', $this->permission)){
            redirect('dashboard', 'refresh');
        }

        $this->render_template('admin_view/messanger/index', $this->data);
	}

	public function composeEmail()
	{
		if(!in_array('createComposeEmail', $this->permission)){
            redirect('dashboard', 'refresh');
        }
        
        $this->render_template('admin_view/messanger/composeEmail', $this->data);
	}

}