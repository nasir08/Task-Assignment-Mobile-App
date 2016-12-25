<?php
	class Dashboard_controller extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
		}

		function index()
		{
			$this->load->model('Dashboard_model');
			$this->Dashboard_model->getPeople();
		}
		
	}
?>