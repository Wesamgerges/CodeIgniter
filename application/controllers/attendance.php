<?php
/**
 * Description of attendance
 *
 * @author Wesam Gerges
 */
class Attendance extends CI_Controller{
    
    function index()
    {
     $this->load->model("attendance_model")   ;
     $data['persons'] = $this->attendance_model->getMembers();
     $this->load->view('easy_attendance_AR',$data);
    }
    function set_weekly_meeting(){
        
        $this->load->view('set_weekly_meeting');
    }
}

?>
