<?php

/**
     * Church Managment System
     *
     * An online application to manage churches
     *
     * @package     Controllers
     * @author      Wesam Gerges
     * @copyright   
     * @license     
     * @link        
     * @since       Version 2.0
     * @filesource
     */
   
   // ------------------------------------------------------------------------
   
   /**
    * ChurchMangementSystem MemberSearch Class
    *
    * Extends CI_Controller Class
    * 
    * The Member Search controller
    *
    * @package     ChurchMangementSystem
    * @subpackage  Controllers
    * @category    Controller
    * @author      Wesam Gerges
    * @link        
    */

class MemberSearch extends CI_Controller{
    
    /**
     * Method Construct
     * 
     * Loads the MemberSearch_Model class
     * to be used in the rest of class 
     * 
     * @access  private
     */
   public function __construct() {
        parent::__construct();      
        $this->load->model("MemberSearch_Model");            
    }
       
     /**
      * Method Index
      * 
      * The main entery to the class
      * 
      * Checks if the user is loged in
      * 
      * Loads the search view with the header and footer
      *
      * @access  public      
      */
    public function index()
    {
       if( ! $this->authentication->logged_in() ) redirect("login"); 
       
       $data['currentUser'] = $this->session->userdata('user_firstname');
       $data['title'] = "Member Search";
       
       $this->load->view("templates/header",$data);
       $this->load->view("MemberSearch",$data);
       $this->load->view("templates/footer",$data);
   }
   // --------------------------------------------------------------------
 
     /**
      * Method search
      * 
      * Calls the search method from the MemberSearch_Model 
      * withl the searching word and criteria
      * 
      * @access  public
      * 
      * @return string The search result
      */
   public function search()
   {
      echo $this
            ->MemberSearch_Model
            ->search(
                        $this->input->post("searchword"),
                        $this->input->post("criteria")
                     );
   }
   // --------------------------------------------------------------------
 
     /**
      * Method GetMemberInformation
      * 
      * Uses the authentication library checks
      * UserName and Password
      *
      * @access  public
      * 
      */
     public function GetMemberInformation()
     {
      echo $this
            ->MemberSearch_Model
            ->GetMemberInformation(
                                    $this->input->post("MemberId")
                                  );      
    }
}

?>
