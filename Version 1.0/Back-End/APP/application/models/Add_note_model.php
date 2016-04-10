<?php
	class Add_note_model extends CI_Model
	{

		function add()
		{
			$this->load->library('session');
			$task_id = $_SESSION['task_id'];
			$note = file_get_contents("php://input");
			$now = time() *1000;
			$date = date('Y-m-d');
			$this->db->query("INSERT INTO notes VALUES (NULL,'$note','note','$now','$task_id')");
			$this->db->query("INSERT INTO task_notifications VALUES (NULL,'$date','$task_id','note')");
			unset($_SESSION['task_id']);
		}
	}
?>