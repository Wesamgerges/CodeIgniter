<?php

class show_all_persons extends CI_Controller{
    function index(){
       if( ! $this->authentication->logged_in() ) redirect("login"); 
       $this->load->model('show_all_persons_model');
       $data['persons'] = $this->show_all_persons_model->get_all();
       $data['currentUser'] = $this->session->userdata('user_firstname');

       $data['title'] = "Show ALL";
       $this->load->view("templates/header",$data);

       $this->load->view("show_all_persons",$data);
       $this->load->view("templates/footer",$data);
       
       
     
      
    }
}
?>
