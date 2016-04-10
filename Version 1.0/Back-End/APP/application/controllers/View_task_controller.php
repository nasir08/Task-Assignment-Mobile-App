<?php
	class View_task_controller extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
		}

		function task()
		{
			$id = $this->uri->segment(3);
			$this->load->model('View_task_model');
			$this->View_task_model->getTask($id);
		}
	}
?>