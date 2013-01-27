<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of send_email
 *
 * @author Wesam Gerges
 */
class Send_email extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->model("send_email_model");
    }

    function index() 
    {
        $data['Meetings'] = $this->send_email_model->getAllMeetings();
        $data['weeklyMeetings'] = $this->send_email_model->getWeeklyMeetings($data['Meetings'][0]->Id);
        $this->load->view("sendemail", $data);
    }

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
        $this->email->message('Testing the email class.'.$this->input->post("maileditor"));	

        $this->email->send();
      //echo "I am here". $this->input->post("maileditor");
    }
}

?>
