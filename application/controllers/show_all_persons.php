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
    * ChurchMangementSystem show_all_persons Class
    *
    * Extends CI_Controller Class
    * 
    * Dependencies: show_all_persons_model
    * 
    * The class is used to display all members in the system.
    *
    * @package     ChurchMangementSystem
    * @subpackage  Controllers
    * @category    Controller
    * @author      Wesam Gerges
    * @link        
    */
    class show_all_persons extends CI_Controller{
    /**
      * Method Index
      * 
      * The main entry to the class
      * 
      * Calls the get_all method from the show_all_persons_model
      * 
      * Passes them to the show_all_persons view
      * 
      * Loads show_all_persons view
      * 
      * @access  public      
      */
        function index()
        {
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
