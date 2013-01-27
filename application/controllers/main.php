<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of main
 *
 * @author Wesam Gerges
 */
class Main extends CI_Controller{

    public function index()
    {

        if( ! $this->authentication->logged_in() ) redirect("login"); 
        
        $this->load->model("Main_Model");
        $data['MainIcons'] = $this->Main_Model->get_Menus();
        $this->load->view("main_view",$data);
    }
}

?>
