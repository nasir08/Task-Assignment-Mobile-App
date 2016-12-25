<?php
	class Add_new_task_model extends CI_Model
	{

		function add_task()
		{
			$desc=$_POST['description'];
			$due=$_POST['duedate'];
			$person=$_POST['person'];
			$this->db->query("INSERT INTO tasks VALUES (NULL,'$desc','$due','$person')");
			//get the id of the record that was just inserted
			$last_id = $this->db->insert_id();
			$today=date('Y-m-d');
    		$this->db->query("INSERT INTO task_notifications VALUES (NULL,'$today','$last_id','task')");

    		//get the info for the email from database
			$query = $this->db->query("SELECT email FROM people WHERE person_id='$person'");
			$row = $query->row();
			$query2 = $this->db->query("SELECT * FROM tasks WHERE task_id='$last_id'");
			$row2 = $query2->row();
			//put the info in an array
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


		function getPeople()
		{
			$this->db->select('*');
  			$this->db->from('people');
  			$query = $this->db->get();
  			if ( $query->num_rows() > 0 )
    		{
        		$data['records'] = $query->result();
        		$this->load->view('add_new_task_view',$data);
    		}
		}
	}
?>