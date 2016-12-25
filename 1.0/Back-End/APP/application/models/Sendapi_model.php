<?php
	class Sendapi_model extends CI_Model
	{
		function getData()
		{
			$query = $this->db->query("SELECT * FROM people");
			$jsondata = $query->result();
			$query2 = $this->db->query("SELECT people.person_id, email, task_id, description, due_date FROM people,tasks WHERE people.person_id = tasks.person_id");
			$jsondata2 = $query2->result();

        	//sets the response format type
        	header("Content-Type: application/json");

        	//converts any PHP type to JSON string
        	echo "{\"people\":". json_encode($jsondata) . ",\"tasks\":". json_encode($jsondata2) . "}"; 
		}

		function getTaskAdds($id)
		{
			$i=$id;
			$query = $this->db->query("SELECT * FROM notes WHERE task_id='$i' ORDER BY note_id");
			$jsondata = $query->result();

        	//sets the response format type
        	header("Content-Type: application/json");

        	//converts any PHP type to JSON string
        	echo "{\"TaskAdds\":". json_encode($jsondata) . "}"; 
		}

	}
?>
