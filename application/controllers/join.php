<?php
	class Join extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}
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