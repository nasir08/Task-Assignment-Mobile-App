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
		<div class="fixedmenu">
        <div style="padding: 10px 0px 10px 10px;"><a href="<?php echo base_url(); ?>" class="btn btn-default btn-lg btn-block" style="width:70px; height: 40px">Back</a></div>
      <div id="modal_header">
        View Task
      </div>
      </div>
    <div class="modal_content2">
<?php
$this->load->library('session');
foreach($records as $row)
{
  $_SESSION['task_id'] = $row->task_id;
}
?>


        <p>Description</p>
        <?php foreach($records as $row) echo $row->description ?> <br><br>
        
      <table width="100%">
          <tr class="tab">
            <td>Due Date</td>
            <td><?php foreach($records as $row) echo $row->due_date ?></td>
          </tr>
          <tr class="tab">
            <td>Assigned To</td>
            <td><?php foreach($records as $row) echo $row->email ?> </td>
          </tr>
      </table>
      <br><br><br><hr>
      <center>History</center><br>
      <button>Load Previous</button><br><br><br>
      <div id="reload">
      <table width="100%">
      <?php 
        function timeDifference($current, $previous) {
    $msPerMinute = 60 * 1000;
    $msPerHour = $msPerMinute * 60;
    $msPerDay = $msPerHour * 24;
    $msPerMonth = $msPerDay * 30;
    
    $elapsed = $current - $previous;
    
    if ($elapsed < $msPerMinute) {
         return round($elapsed/1000) . ' seconds ago';   
    }
    
    elseif ($elapsed < $msPerHour) {
         return round($elapsed/$msPerMinute) . ' mins ago';   
    }
    
    elseif ($elapsed < $msPerDay ) {
         return round($elapsed/$msPerHour ) . ' hours ago';   
    }

    elseif ($elapsed < $msPerMonth) {
         return round($elapsed/$msPerDay) . ' days ago';   
    }
    
    else {
         return round($elapsed/$msPerMonth) . ' months ago';   
    }
}



        foreach($notes as $row2)
        {
          $now = time() *1000;
          $diff = timeDifference($now,$row2->timestp);
          if($row2->type == 'note')
          {
          echo "<tr>
          <td valign=\"bottom\" class=\"object\">$row2->content</td>
          <td valign=\"top\" align=\"right\" class=\"timer\">$diff</td>
        </tr>";
      }
      elseif($row2->type == 'image')
      {
        echo "<tr>
          <td valign=\"bottom\" class=\"object\"><img src=\"http://localhost/APP/uploads/$row2->content\"</td>
          <td valign=\"top\" align=\"right\" class=\"timer\">$diff</td>
        </tr>";
      }
      }
      ?>
      </table>
      <br>
      <br>
      <form name="myForm" id="myForm" ng-model="myForm" novalidate method="post">
      	<textarea name="note" id="note" ng-model="note" required style="height:50px;"></textarea>
                <span ng-show="myForm.note.$touched && myForm.note.$invalid || myForm.note.$dirty && myForm.note.$invalid">A note is required.</span><br><br>
        <button type="submit" ng-disabled="myForm.$invalid">Add Note</button>
      </form>
      <br>
      <form method="post" id="myForm2" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/Upload/">
      <input type="file" id="file" name="filename" style="width: 50%;" class="fleft"></input><button type="submit" name="upload" style="width: 50%" class="fright">Upload</button>
      
      </form>
      </div>
    </div>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function()
        {
          $(document).on('submit', '#myForm', function()
          {
  
              var note = $("#note").val();
            $.ajax({
                  type : 'POST',
                  url  : 'http://localhost/APP/index.php/Add_note_controller',
                  data : note,
                  success :  function()
                  {
                        location.reload();
                  }
                  });
              return false;
          });
            
 
        });

        </script>
      </body>
      </html>




    