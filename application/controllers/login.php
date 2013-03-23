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
    * ChurchMangementSystem Login Class
    *
    * Extends CI_Controller Class
    * 
    * The class is used to authonticate users to the system.
    * 
    * This class uses the login_model and the authentication library to handle the operations for 
    * checking the users creditials.
    *
    * @package     ChurchMangementSystem
    * @subpackage  Controllers
    * @category    Controller
    * @author      Wesam Gerges
    * @link        
    */
     
class Login extends CI_Controller{
   
     /**
      * The main entry to the class
      * It loads the view for the login
      *
      * @access  public      
      */
    public function index()
    {
        $this->load->view("Login_view");
    }
     // --------------------------------------------------------------------
 
     /**
      * Uses the authentication library checks
      * UserName and Password
      *
      * @access  public
      * 
      */
    public function logins()
    {
        echo $this->authentication->login($this->input->post("UserName"),$this->input->post("Password"));
    }
    
     // --------------------------------------------------------------------
 
     /**
      * Logs out the current user
      *
      * @access  public
      *     
      */
    function logout()
    {
        $this->authentication->logout();
        redirect("login");
    }
    
}

?>
