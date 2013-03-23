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
    * ChurchMangementSystem Main Class
    *
    * Extends CI_Controller Class
    * 
    * This class handles the main page and the icons displayed.
    * 
    *
    * @package     ChurchMangementSystem
    * @subpackage  Controllers
    * @category    Controller
    * @author      Wesam Gerges
    * @link        
    */
class Main extends CI_Controller 
{
      /**
       * The main entry to the class
       * It loads the view for the main class
       * 
       * Loads the Main_Model 
       * 
       * Checks if a user is loged in 
       * 
       * Build the list of the icons and links that will be displayed
       * 
       * Passes them to the main_view
       * 
       * Loads the main_view
       *
       * @access  public      
       */
      public function index() 
      {
        if (!$this->authentication->logged_in())
            redirect("login");

        $this->load->model("Main_Model");
        $data['MainIcons'] = $this->Main_Model->get_Menus();
        
        if (!$this->authentication->logged_in())
            redirect("login");
        
        $data['currentUser'] = $this->session->userdata('user_firstname');
        $data['title'] = "ChMS Main";
        
        $this->load->view("templates/header", $data);
        $this->load->view("main_view", $data);
        $this->load->view("templates/footer", $data);
    }

}

?>
