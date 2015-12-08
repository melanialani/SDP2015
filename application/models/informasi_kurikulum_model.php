<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informasi_kurikulum_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
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