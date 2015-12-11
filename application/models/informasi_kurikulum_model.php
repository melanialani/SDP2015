
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Informasi_Kurikulum_Model extends CI_Model
	{

        function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
		/****
		Function getDataKurikulum
		Mengambil Informasi kurikulum yang dijalani oleh Mahasiswa saat ini
		Input : informasi_kurikulum_id
		Output : Array of Data Kurikulum dari table informasi_kurikulum
		****/
		public function getDataKurikulum($informasi_kurikulum_id){
			return $this->db->get_where("informasi_kurikulum",array("id" => $informasi_kurikulum_id))->row_array();
		}
        public function selectInformasiKurikulum()
        {
            $query = $this->db->select('*')
                ->from('informasi_kurikulum')
                ->where("substr(id, 8, 1) = ", 0)
                ->where("substr(id, 6, 2) = ", date('y'))
                ->order_by('jurusan', 'asc')
                ->get();
            return $query->result();
        }
	}
