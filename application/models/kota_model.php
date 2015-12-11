<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kota_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function selectKota()
	{
		$query = $this->db->select('*')
							->from('kota')
							->order_by('nama', 'asc')
							->get();
		return $query->result();
	}
}