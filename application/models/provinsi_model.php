<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Provinsi_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function selectProvinsi()
	{
		$query = $this->db->select('*')
							->from('provinsi')
							->order_by('nama', 'asc')
							->get();
		return $query->result();
	}
	
	public function getProvinsiIdByNama($nama)
	{
		$this->db->where('nama', $nama);
		return $this->db->get('provinsi')->result();
	}
}