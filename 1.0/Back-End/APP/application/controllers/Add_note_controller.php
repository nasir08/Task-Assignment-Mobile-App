<?php
	class Add_note_controller extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
		}

		function index()
		{ 
			$this->load->model('Add_note_model');
			$this->Add_note_model->add();
		}

	} 