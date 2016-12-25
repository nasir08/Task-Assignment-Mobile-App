<!DOCTYPE html>
<html lang="en" ng-app="">
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
<!--Add Person Modal -->
      <div id="modal_header">
        Add New Person
      </div>
      <div class="modal_content">
        <p>Email</p>
        <form name="myForm" novalidate action="<?php echo base_url(); ?>index.php/Add_new_person/add" method="post">  
        <input type="email" name="email" ng-model="email" required autofocus></input><br><br>
        <span ng-show="myForm.email.$touched && myForm.email.$invalid || myForm.email.$dirty && myForm.email.$invalid">A valid email address is required.</span>
        <div id="bspace"></div>
        <div class="sfooter">
         <button type="submit" name="addperson" id="modal_btn_g" ng-disabled='myForm.$invalid'>Add Person</button><br><br>
          <a href="<?php echo base_url(); ?>" id="modal_btn_r" class="btn btn-default btn-lg btn-block">Cancel</a>
        </div>
        </form>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
      </body>
      </html>