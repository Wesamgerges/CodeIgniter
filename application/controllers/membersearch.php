<?php

/**
 * Description of testajax
 *
 * @author Wesam Gerges
 */

class MemberSearch extends CI_Controller{
   public function __construct() {
        parent::__construct();
       // if( ! $this->authentication->logged_in() ) redirect("login"); 
        $this->load->model("MemberSearch_Model");            
    }
   public function index()
   {
       if( ! $this->authentication->logged_in() ) redirect("login"); 
       $data['currentUser'] = $this->session->userdata('user_firstname');
       $data['title'] = "Member Search";
       $this->load->view("templates/header",$data);
       $this->load->view("MemberSearch",$data);
       $this->load->view("templates/footer",$data);
   }
   public function search()
   {
      echo $this->MemberSearch_Model->search($this->input->post("searchword"),$this->input->post("criteria"));
   }
   public function GetMemberInformation()
   {
      echo $this->MemberSearch_Model->GetMemberInformation($this->input->post("MemberId"));      
   }
}

?>
