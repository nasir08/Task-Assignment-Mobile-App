<?php
	class Upload extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
		}

		function index()
		{ 
    		if ($_FILES)
    		{
      			$name = $_FILES['filename']['name'];
      			move_uploaded_file($_FILES['filename']['tmp_name'], "uploads/".$name);

      		$this->load->library('session');
			$task_id = $_SESSION['task_id'];
			$now = time() *1000;
			$date = date('Y-m-d');
			$this->db->query("INSERT INTO notes VALUES (NULL,'$name','image','$now','$task_id')");
			$this->db->query("INSERT INTO task_notifications VALUES (NULL,'$date','$task_id','image')");
			

      			redirect(base_url()."index.php/View_task_controller/task/".$task_id);
    		}
		}

	} 