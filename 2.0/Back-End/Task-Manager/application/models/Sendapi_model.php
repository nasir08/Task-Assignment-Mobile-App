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
	class Sendapi_model extends CI_Model
	{
		function getData()
		{
			$query2 = $this->db->query("SELECT task_id FROM tasks");
			$jsondata2 = $query2->result();

        	//sets the response format type
        	header("Content-Type: application/json");

        	//converts any PHP type to JSON string
        	echo json_encode($jsondata2); 
		}

		function getFullData($id)
		{
			$i=$id;
			$query2 = $this->db->query("SELECT * FROM tasks WHERE task_id='$i'");
			$jsondata2 = $query2->result();

        	//sets the response format type
        	header("Content-Type: application/json");

        	//converts any PHP type to JSON string
        	echo "{\"tasks\":". json_encode($jsondata2) . "}";
		}

		function getTaskAdds($id)
		{
			$i=$id;
			$query = $this->db->query("SELECT * FROM comments WHERE task_id='$i' ORDER BY comment_id");
			$jsondata = $query->result();

        	//sets the response format type
        	header("Content-Type: application/json");

        	//converts any PHP type to JSON string
        	echo json_encode($jsondata); 
		}

	}
?>
