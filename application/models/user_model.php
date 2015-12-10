<?php
	class User_model extends CI_Model
	{
		/* -----------------------------------------------------
		Function __construct()
		Mengeload Inisialisasi Awal Model class_model
		Input/Output : -
		----------------------------------------------------- */
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		
		public function getRole($id)
		{
			$this->db->select('peran');
			$this->db->where('id', $id);
			return $this->db->get('user')->result();
		}
	}
?>