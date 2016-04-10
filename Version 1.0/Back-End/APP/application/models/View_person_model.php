<?php
	class View_person_model extends CI_Model
	{
		function getPeopleInfo($id)
		{
			$this->db->select("email");
  			$this->db->from('people');
  			$this->db->where('person_id',$id);
  			$query = $this->db->get();
  			if ( $query->num_rows() > 0 )
    		{
        		$data['records'] = $query->result();
        		$this->load->view('view_person_view',$data);
    		}
		}
	}
?>