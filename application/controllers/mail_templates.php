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
    * ChurchMangementSystem mail_templates Class
    *
    * Extends CI_Controller Class
    * 
    * Dependencies: mail_templates_model
    * 
    * The class is used to manage email templates.
    * 
    *
    * @package     ChurchMangementSystem
    * @subpackage  Controllers
    * @category    Controller
    * @author      Wesam Gerges
    * @link        
    */
     
class mail_templates extends CI_Controller{
    
    /**
     * Class constructor
     * Loads the mail_templates_model to be used in the rest of the class
     * 
     * @access private
     */
    function __construct() {
        parent::__construct();
        $this->load->model("mail_templates_model"); 
    }
    //---------------------------------------------------------------------
      /**
      * Method get_email_templates
      * 
      * Calls the get_email_templates method from the attendance_model
      * 
      * 
      * Passes the templates to the view
      * 
      * Loads the view email_template_view
      *
      * @access  public      
      */
    function get_email_templates()
    {
        $data['templates'] = $this->mail_templates_model->get_email_templates();
        $this->load->view("email_template_view",$data);

    }
    //---------------------------------------------------------------------
    
      /**
      * Method SaveTemplate
      * 
      * Saves an email template
      * 
      * @access  public      
      */
    function SaveTemplate()
    {
        echo $this->mail_templates_model->SaveTemplate();
    }
    //---------------------------------------------------------------------
      /**
      * Method previewTemplate
      * 
      * Calls the get_email_templates method from the attendance_model
      * 
      *
      * @access  public      
      */
    function previewTemplate($id)
    {
        echo $this->mail_templates_model-> previewTemplate($id);
    }
    
}

?>
