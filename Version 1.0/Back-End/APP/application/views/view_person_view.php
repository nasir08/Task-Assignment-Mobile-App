<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Add New Person - Task Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    </head>
    <body>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<!--View Person Modal -->
      <div id="modal_header">
        View Person
      </div>
      <div class="modal_content">
        <p>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php 
        foreach($records as $row)
        echo $row->email ?>
    	</p>
        <div class="sfooter2">
          <a href="<?php echo base_url(); ?>" id="modal_btn_r" class="btn btn-default btn-lg btn-block">Close</a>
        </div>
        </div>
      </body>
      </html>