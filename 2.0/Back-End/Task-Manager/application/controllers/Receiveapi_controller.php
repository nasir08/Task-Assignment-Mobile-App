<?php
class Receiveapi_controller extends CI_Controller{

    function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->database();
            $this->load->model('Receiveapi_model');
        }

    function note()
    {
        $this->Receiveapi_model->addNote();
        $this->send_mail2();
    }

    function task()
    {
        $this->Receiveapi_model->addTask();
        $this->send_mail();
    }


    function send_mail()
    {
            //get the info for the email from session
            $this->load->library('session');
            $emaildata=$_SESSION['emaildata'];

            //rearranging the date format
            $due_date=$emaildata['due_date'];
            $due_date=explode('-', $due_date);
            $due_date=$due_date[2]."-".$due_date[1]."-".$due_date[0];
            $year=date('Y');
            $tasklink="https://myfuelpump.com/web/task-viewer.html?id=".$emaildata[task_id];

            //html page for the email
            $html="<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html xmlns=\"http://www.w3.org/1999/xhtml\"> <head>  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/></head><body style=\"margin: 0; padding: 0;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">  <tr>   <td style=\"padding: 30px 0 0 0;\">    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"border-collapse: collapse; border: 1px solid #cccccc;\"\">     <tr>  <td align=\"center\" height=\"60\" bgcolor=\"#70bbd9\" style=\"padding: 40px 0 30px 0; font-family: Arial, sans-serif; font-size: 24px; color:#fff;\"> The Task Manager App</td> </tr> <tr>  <td bgcolor=\"#ffffff\" style=\"padding: 40px 30px 40px 30px;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> <tr>  <td style=\"color: #153643; font-family: Arial, sans-serif; font-size: 24px;\">   Hello $emaildata[email],<br />   A new task has been assigned to you!  </td> </tr> <tr>  <td style=\"padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\">   <p><b>Description</b></p>   $emaildata[description]<br /><br /><br />   <p><b>Due Date</b></p>   $due_date<br /><br /><br />   <a href=\"$tasklink\" target=\"new\" style=\"padding: 10px 15px;    background: #4479BA;    color: #FFF;    text-decoration:none;    -webkit-border-radius: 4px;    -moz-border-radius: 4px;    border-radius: 4px;    border: solid 1px #20538D;    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);    -webkit-transition-duration: 0.2s;    -moz-transition-duration: 0.2s;    transition-duration: 0.2s;    -webkit-user-select:none;    -moz-user-select:none;    -ms-user-select:none;    user-select:none;\">Go To Task</a>  </td> </tr></table></td> </tr> <tr>  <td bgcolor=\"#ee4c50\" style=\"padding: 30px 30px 30px 30px; color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;\"\"> &copy; $year - WTFG</td></td> </tr>  </table>   </td>  </tr> </table></body></html>";

            //web browser won't understand the escape sequence so we have to replace it
            $html=str_replace("\"", "'", $html);

            //email sending begins here
            $from_email = "no-replyt@task-manager.com";
            $to_email = $emaildata['email'];
            //Load email library
            $this->load->library('email');
            $this->email->from($from_email, 'Task Manager Support');
            $this->email->to($to_email);
            $this->email->subject('Task Assignment Notification');
            $this->email->set_mailtype('html');
            $this->email->message($html);
            //Send mail
            $this->email->send();
        }


        function send_mail2()
        {
            //get the info for the email from session
            $this->load->library('session');
            $emaildata=$_SESSION['emaildata'];

            //rearranging the date format
            $due_date=$emaildata['due_date'];
            $due_date=explode('-', $due_date);
            $due_date=$due_date[2]."-".$due_date[1]."-".$due_date[0];
            $year=date('Y');
            $tasklink="https://myfuelpump.com/web/task-viewer.html?id=".$emaildata[task_id];

            //html page for the email
            $html="<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"> <html xmlns=\"http://www.w3.org/1999/xhtml\"> <head> <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" /> <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/> </head> <body style=\"margin: 0; padding: 0;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> <tr> <td style=\"padding: 30px 0 0 0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"border-collapse: collapse; border: 1px solid #cccccc;\"\"> <tr> <td align=\"center\" height=\"60\" bgcolor=\"#70bbd9\" style=\"padding: 40px 0 30px 0; font-family: Arial, sans-serif; font-size: 24px; color:#fff;\"> The Task Manager App</td> </tr> <tr> <td bgcolor=\"#ffffff\" style=\"padding: 40px 30px 40px 30px;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> <tr> <td style=\"color: #153643; font-family: Arial, sans-serif; font-size: 24px;\"> Hello $emaildata[email],<br /> A note was added to a task you were assigned to! </td> </tr> <tr> <td style=\"padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\"> <p><b>Task ID</b></p> $emaildata[task_id]<br /><br /><br /> <p><b>Due Date</b></p> $due_date<br /><br /><br /> <p><b>Task Description</b></p> $emaildata[description]<br /><br /><br /> <p><b>Note ID</b></p> $emaildata[comment_id]<br /><br /><br /> <p><b>Note Content</b></p> $emaildata[comment]<br /><br /><br /> <a href=\"$tasklink\" target=\"new\" style=\"padding: 10px 15px; background: #4479BA; color: #FFF; text-decoration:none; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; border: solid 1px #20538D; text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4); -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2); -webkit-transition-duration: 0.2s; -moz-transition-duration: 0.2s; transition-duration: 0.2s; -webkit-user-select:none; -moz-user-select:none; -ms-user-select:none; user-select:none;\">Go To Task</a> </td> </tr> </table></td> </tr> <tr> <td bgcolor=\"#ee4c50\" style=\"padding: 30px 30px 30px 30px; color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;\"\"> © $year - WTFG</td></td> </tr> </table> </td> </tr> </table></body></html>";

            //web browser won't understand the escape sequence so we have to replace it
            $html=str_replace("\"", "'", $html);

            //email sending begins here
            $from_email = "no-replyt@task-manager.com";
            $to_email = $emaildata['email'];
            //Load email library
            $this->load->library('email');
            $this->email->from($from_email, 'Task Manager Support');
            $this->email->to($to_email);
            $this->email->subject('New Note Added');
            $this->email->set_mailtype('html');
            $this->email->message($html);
            //Send mail
            $this->email->send();
        }

}
?>