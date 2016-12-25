<?php
	class Dashboard_model extends CI_Model
	{

		function getPeople()
		{
			$query = $this->db->get("people");
			$data['records'] = $query->result();
			$query2 = $this->db->get("tasks");
			$data['records2'] = $query2->result();
			$this->load->view('dashboard_view',$data);
		}
	}
?>