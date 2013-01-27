<?php

class add_family extends CI_Controller{
    
    function index()
    {
        $this->load->view('add_family_view');
    }
    public function addfamily(){
        $this->load->model('add_family_model');
        $this->add_family_model->add_family();
    }
    
}
?>
