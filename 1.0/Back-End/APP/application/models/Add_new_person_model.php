<?php
	class Add_new_person_model extends CI_Model
	{

		function add_person()
		{
			$email=$_POST['email'];
			$this->db->query("INSERT INTO people VALUES (NULL,'$email')");
		}
	}
?>