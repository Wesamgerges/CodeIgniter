<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mail_templates
 *
 * @author Wesam Gerges
 */
class mail_templates extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model("mail_templates_model"); 
    }
    
    function get_email_templates()
    {
        $data['templates'] = $this->mail_templates_model->get_email_templates();
        $this->load->view("email_template_view",$data);

    }
    function SaveTemplate()
    {
        echo $this->mail_templates_model->SaveTemplate();
    }
    function previewTemplate($id)
    {
        echo $this->mail_templates_model-> previewTemplate($id);
    }
}

?>
