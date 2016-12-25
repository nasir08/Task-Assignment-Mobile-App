<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dashboard - Task Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <div class="wrapper">
        <div class="banner">
          <h2>Dashboard</h2>
        </div>
        <div class="content">
        <p>People</p>
          <table width="100%">
            <?php
              foreach ($records as $row) 
              {
                $this->load->database();
                echo"<tr>
                  <td align=\"left\" valign=\"middle\" id=\"dash\"><a href=\"index.php/View_person/info/$row->person_id\">$row->email
                  <span class=\"glyphicon glyphicon-triangle-right\" aria-hidden=\"true\" id=\"arrow\"></span></td>
                </tr>";
              }
            ?>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td> <a href="index.php/add_new_person" id="dashbtn" class="btn btn-default btn-lg btn-block">Add Person</a>
              </td>
            </tr>
          </table>
        </div>
        <div class="content">
        Tasks<br>
        <br>
          <table width="100%">
          <?php
            foreach ($records2 as $row2)
            {
              echo"<tr>
                <td align=\"left\" valign=\"middle\" id=\"dash\"><a href=\"index.php/View_task_controller/task/$row2->task_id\">$row2->description</a></td>
              </tr>";
            }
          ?>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td> <a href="index.php/add_new_task" id="dashbtn" class="btn btn-default btn-lg btn-block">Add Task</a>
              </td>
            </tr>
          </table>
        </div>
    </div>
  </body>
</html>
