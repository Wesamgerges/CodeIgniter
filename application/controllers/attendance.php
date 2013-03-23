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
    * ChurchMangementSystem Attendance Class
    *
    * Extends CI_Controller Class
    * 
    * Dependencies: attendance_model
    *
    * @package     ChurchMangementSystem
    * @subpackage  Controllers
    * @category    Controller
    * @author      Wesam Gerges
    * @link        
    */
class Attendance extends CI_Controller{
    
      /**
      * The main entry to the class
      * Loads the model attendance_model
      * 
      * Gets members that attend that meeting
      * 
      * Passes the memebers to the view
      * 
      * Loads the view easy_attendance_AR
      *
      * @access  public      
      */
    function index()
    {
        $this->load->model("attendance_model")   ;
        $data['persons'] = $this->attendance_model->getMembers();
        $this->load->view('easy_attendance_AR',$data);
    }
    //----------------------------------------------------------------------
    
     /**
      * The main entry to the class
      * Loads the model attendance_model
      * 
      * Loads the view set_weekly_meeting
      *
      * @access  public      
      */
    function set_weekly_meeting()
    {
        
        $this->load->view('set_weekly_meeting');
    }
}

?>
