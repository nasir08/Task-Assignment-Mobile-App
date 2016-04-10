<?php
	class View_task_model extends CI_Model
	{
		function getTask($id)
		{
          $i=$id;
			   $query = $this->db->query("SELECT people.person_id, email, task_id, description, due_date FROM people,tasks WHERE people.person_id = tasks.person_id AND task_id='$i'");
          $data['records'] = $query->result();
          $query = $this->db->query("SELECT * FROM notes WHERE task_id='$i' ORDER BY note_id");
          $data['notes'] = $query->result();
        	$this->load->view('view_task_view',$data);
		}
	}
?>