<?php
	class Receiveapi_model extends CI_Model
	{

		function addNote()
		{
			if($_SERVER ['REQUEST_METHOD'] == 'POST')
			{
				$data = explode(";", file_get_contents("php://input"));
				$time = time() *1000;
				$query = $this->db->query("INSERT INTO notes VALUES (NULL,'$data[0]','note','$time','$data[1]')");

				$today=date('Y-m-d');
    			$this->db->query("INSERT INTO task_notifications VALUES (NULL,'$today','$data[1]','note')");
            }
		}



		function addTask()
		{
			if($_SERVER ['REQUEST_METHOD'] == 'POST')
			{
				$data = explode(";", file_get_contents("php://input"));
				$query = $this->db->query("INSERT INTO tasks VALUES (NULL,'$data[0]','$data[1]','$data[2]')");

				$today=date('Y-m-d');
				$last_id = $this->db->insert_id();
    			$this->db->query("INSERT INTO task_notifications VALUES (NULL,'$today','$last_id','task')");

    			$query = $this->db->query("SELECT email FROM people WHERE person_id='$data[2]'");
			$row = $query->row();
			$query2 = $this->db->query("SELECT * FROM tasks WHERE task_id='$last_id'");
			$row2 = $query2->row();

    			$emaildata = array(
        				'email'  => $row->email,
        				'task_id'     => $row2->task_id,
        				'description' => $row2->description,
        				'due_date' => $row2->due_date
						);
			//put the info in a session
			$this->load->library('session');
			$_SESSION['emaildata']=$emaildata;


    			
            }
		}


		function addPerson()
		{
			if($_SERVER ['REQUEST_METHOD'] == 'POST')
			{
				$data = file_get_contents("php://input");
				$query = $this->db->query("INSERT INTO people VALUES (NULL,'$data')");
            }
		}

	}
?>
