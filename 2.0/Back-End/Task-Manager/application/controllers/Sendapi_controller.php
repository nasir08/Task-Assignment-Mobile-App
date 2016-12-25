<?php
class Sendapi_controller extends CI_Controller{

    function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->database();
            $this->load->model('Sendapi_model');
        }


    function data()
    {
        
        $this->Sendapi_model->getData();   
    }

    function fulldata()
    {
        
        $id = $this->uri->segment(3);
        $this->Sendapi_model->getFullData($id);   
    }

    function taskAdds()
    {
        $id = $this->uri->segment(3);
        $this->Sendapi_model->getTaskAdds($id);
    }




}
?>