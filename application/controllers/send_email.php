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
    * ChurchMangementSystem Send_email Class
    *
    * Extends CI_Controller Class
    * 
    * Dependencies: send_email_model
    * 
    * The class is used to send emails to the members in the system.
    *
    * @package     ChurchMangementSystem
    * @subpackage  Controllers
    * @category    Controller
    * @author      Wesam Gerges
    * @link        
    */
     
class Send_email extends CI_Controller {

    /**
     * Class constructor
     * 
     * Loads the email library
     * Loads the send_email_model 
     * 
     * @access private
     * 
     */
    function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->model("send_email_model");
    }
   
     /**
      * Method Index
      * 
      * The main entry to the class
      * 
      * Calls the getAllMeetings method from the send_email_model
      * 
      * Calls the getWeeklyMeetings from the send_email_model
      * 
      * Passes them to the sendemail view
      * 
      * Loads sendemail view
      * 
      * @access  public      
      */
    function index() 
    {
        $data['Meetings'] = $this->send_email_model->getAllMeetings();
        $data['weeklyMeetings'] = $this->send_email_model->getWeeklyMeetings($data['Meetings'][0]->Id);
        $this->load->view("sendemail", $data);
    }
    //---------------------------------------------------------------------
      /**
      * Method getMembers
      * 
      * Retrives the members that will be used to send emails to them
      * 
      * by calling the getabsence, getAttendees and getServants methods from the send_email_model
      * 
      * 
      * Passes the build_list to the view
      * 
      * Loads the view build_list
      *
      * @access  public      
      */
    function getMembers() {
       
        switch ($this->input->post("group")) {
            case 'Members':
                if (isset($_POST["subgroup"]["absence"])) {
                    $data['Members'] = $this->send_email_model->getabsence();
                    $this->load->view("build_list", $data);
                }

                if (isset($_POST["subgroup"]["Attenance"])) {
                    $data['Members'] = $this->send_email_model->getAttendees();
                    $this->load->view("build_list", $data);
                }

                break;
            case 'Servants':
                $data['Members'] = $this->send_email_model->getServants();
                $this->load->view("build_list", $data);
                break;
        }
    }
    //---------------------------------------------------------------------
      /**
      * Method send
      * 
      * Sends emails
      * 
      * This method sends emails using the email library
      * 
      * which loaded in the constructor
      * 
      * @access  public      
      */
    function send()
    {
        $config['protocol'] = 'SMTP';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_user'] = 'familyoflife@copticchurch.org';
        $config['smtp_pass'] = 'Family4life';
        $config['smtp_port'] = '465';
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        
        $this->email->to('wesam_rashad@yahoo.com'); 
        $this->email->from('familyoflife@copticchurch.org', 'Family Of Life');
        $this->email->subject('Email Test');
        $this->email->message($this->input->post("maileditor"));	

        $this->email->send();      
    }
}

?>
