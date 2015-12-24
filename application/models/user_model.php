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
        public function updateUserLogin($user){

            $this->db->select('count(n.id) as count_notification, u.last_login',false);
            $this->db->from('user u, notifikasi n');
            $this->db->where('u.id',$user);
            $this->db->where('u.id = n.tujuan');
            $this->db->where('u.last_login <= n.tanggal_create');
            $result = $this->db->get()->row();
            $this->db->set('status_baca','1');
            $this->db->where('tanggal_create <',$result->last_login);
            $this->db->where('tujuan',$user);
            $this->db->where('status_baca','0');
            $this->db->update('notifikasi');

            $this->db->set('last_login','now()',false);
            $this->db->where('id',$user);
            $this->db->update('user');
            return $result;
        }
	}
?>