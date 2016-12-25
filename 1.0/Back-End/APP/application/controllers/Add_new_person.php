<?php
	class Add_new_person extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
		}

		function index()
		{
			$this->load->view('add_new_person_view');
		}

		function add()
		{
			$this->load->model('Add_new_person_model');
			$this->Add_new_person_model->add_person();
			redirect(base_url());
		}

	} 