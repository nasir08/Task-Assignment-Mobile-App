<?php
	class View_person extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
		}

		function info()
		{
			$this->load->model('View_person_model');
			$pid = $this->uri->segment(3);
			$this->View_person_model->getPeopleInfo($pid);
		}
	}
?>