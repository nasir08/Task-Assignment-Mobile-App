<?php
	if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
 
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 
        exit(0);
    }


	class Receiveapi_model extends CI_Model
	{

		function addNote()
		{
			if($_SERVER ['REQUEST_METHOD'] == 'POST')
			{
				$data = explode(";", file_get_contents("php://input"));
				$time = time() *1000;
				$query = $this->db->query("INSERT INTO comments VALUES (NULL,'note','$data[0]','$time','$data[1]')");
				$last_id = $this->db->insert_id();
				$query = $this->db->query("SELECT * FROM tasks WHERE task_id='$data[1]'");
				$row = $query->row();

				$emaildata = array(
        				'email'  => $row->email,
        				'task_id'     => $data[1],
        				'description' => $row->desc,
        				'due_date' => $row->due_date,
        				'comment_id' => $last_id,
        				'comment' => $data[0]
						);
			//put the info in a session
			$this->load->library('session');
			$_SESSION['emaildata']=$emaildata;
            }
		}



		function addTask()
		{
			if($_SERVER ['REQUEST_METHOD'] == 'POST')
			{
				$data = explode(";", file_get_contents("php://input"));
				$date = explode(" ", $data[1]);
				$query = $this->db->query("INSERT INTO tasks VALUES (NULL,'$data[0]','$data[1]','$data[2]')");

				$last_id = $this->db->insert_id();

    			$query = $this->db->query("SELECT email FROM tasks WHERE task_id='$last_id'");
			$row = $query->row();
			$query2 = $this->db->query("SELECT * FROM tasks WHERE task_id='$last_id'");
			$row2 = $query2->row();

    			$emaildata = array(
        				'email'  => $row->email,
        				'task_id'     => $row2->task_id,
        				'description' => $row2->desc,
        				'due_date' => $row2->due_date
						);
			//put the info in a session
			$this->load->library('session');
			$_SESSION['emaildata']=$emaildata;


    			
            }
		}
	}
?>
