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
       $this->load->view("MemberSearch");
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
