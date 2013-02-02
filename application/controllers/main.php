<?php
/**
 * Description of main
 *
 * @author Wesam Gerges
 */
class Main extends CI_Controller {

    public function index() {

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
