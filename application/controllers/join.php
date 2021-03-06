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
    * ChurchMangementSystem Join Class
    *
    * Extends CI_Controller Class
    * 
    * The class is used to join members to the system.
    * 
    *
    * @package     ChurchMangementSystem
    * @subpackage  Controllers
    * @category    Controller
    * @author      Wesam Gerges
    * @link        
    */
    class Join extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        /**
       * Method Index
       * 
       * The main entry to the class
       * 
       * 
       * Loads main view
       * 
       * @access  public      
       */
        public function index()
        {
            $this->form_validation->set_rules('username','User Name','required');
            if($this->form_validation->run() == FALSE)
            {
                    $data['title'] = "The main Page";
                    $this->load->view('templates\header',$data);
                    $this->load->view('main');
                    $this->load->view('templates\footer');
            }
            else{
                    echo "valid";
            }
        }
        
        public function name($str)
        {
                echo $str;
        }
        
        public function save()
        {

        }
    }
?>