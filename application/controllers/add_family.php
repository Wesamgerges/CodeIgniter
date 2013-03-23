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
    * ChurchMangementSystem add_family Class
    *
    * Extends CI_Controller Class
    * 
    * The class is used to add families and members to the Church Managment system.
    * 
    * This class uses the add_family_model to add new members to the church.
    * 
    * @package     ChurchMangementSystem
    * @subpackage  Controllers
    * @category    Controller
    * @author      Wesam Gerges
    * @link        
    */
    class add_family extends CI_Controller{

        /**
        * The main entry to the class
        * 
        * Loads the view add_family_view
        *
        * @access  public      
        */
        function index()
        {
            $this->load->view('add_family_view');
        }
        //----------------------------------------------------------------------
        
        /**
         * The main entry to the class
         * Loads the model add_family_model
         * 
         * Call the add_family method in the add_family_model
         *
         * @access  public      
         */
        public function addfamily(){
            $this->load->model('add_family_model');
            $this->add_family_model->add_family();
        }

    }
?>
