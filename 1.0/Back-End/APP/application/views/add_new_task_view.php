<!DOCTYPE html>
<html lang="en" ng-app="">
  <head>
    <meta charset="utf-8">
    <title>Add Task - Task Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    </head>
    <body>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<!--Add Person Modal -->
      <div id="modal_header">
        Add New Task
      </div>
      <div class="modal_content2">
        <form name="myForm" novalidate action="<?php echo base_url(); ?>index.php/Add_new_task/add" method="post">
        <p>Description</p>  
        <textarea name="description" ng-model="description" required autofocus></textarea><br>
        <span ng-show="myForm.description.$touched && myForm.description.$invalid || myForm.description.$dirty && myForm.description.$invalid">A description is required.</span><br><br>
        <p>Due Date</p>
        <input type="date" name="duedate" ng-model="duedate" required></input><br><br>
        <span ng-show="myForm.duedate.$touched && myForm.duedate.$invalid || myForm.duedate.$dirty && myForm.duedate.$invalid">A date is required.</span><br><br>
        <p>Assign To</p>
        <select name="person">
          <?php
            foreach ($records as $row) 
            {
             echo"<option value=\"$row->person_id\">$row->email</option>";
            }
          ?>
        </select><br><br><br>
        <div class="sfooter">
         <button type="submit" name="addperson" id="modal_btn_g" ng-disabled="myForm.$invalid">Add Task</button><br><br>
          <a href="<?php echo base_url(); ?>" id="modal_btn_r" class="btn btn-default btn-lg btn-block">Cancel</a>
        </div>
        </form>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
      </body>
      </html>