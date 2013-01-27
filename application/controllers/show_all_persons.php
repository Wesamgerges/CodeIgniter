<?php

class show_all_persons extends CI_Controller{
    function index(){
        $this->load->model('show_all_persons_model');
        $data['persons'] = $this->show_all_persons_model->get_all();
        $this->load->view('show_all_persons', $data);
    }
}
?>
