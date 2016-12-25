<?php 
			set_time_limit(0);
			$target_dir = "../../uploads/";
			$target_file = $target_dir . basename($_FILES["Filedata"]["name"]);
    		move_uploaded_file($_FILES["Filedata"]["tmp_name"], $_FILES["Filedata"]["name"]);
    
?>