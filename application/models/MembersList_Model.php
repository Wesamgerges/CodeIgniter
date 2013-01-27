<?php
	class MembersList_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		public function getMembersList()
		{
			$membersList = $this->db->get('person');
			return $membersList ->result_array();
		}
	}
?>