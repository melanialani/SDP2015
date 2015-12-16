<?php

class Matakuliah extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function ambil_data($semester)
	{
		$query = $this->db->query("select * from mata_kuliah where semester = ".$semester."");
		//$this->db->query($query);
		return $query->result();
	}	
	
	function ambildata($semester)
	{
		$query = $this->db->query("select * from mata_kuliah where semester = ".$semester."");
		//$this->db->query($query);
		return $query->result_array();
	}	
	function ambil_kode($cocok)
	{
		$query = $this->db->query("select id from mata_kuliah where nama like '".$cocok."'");
		//$this->db->query($query);
		return $query->result();
	}
	
}

?>