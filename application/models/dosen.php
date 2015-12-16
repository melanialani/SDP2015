<?php

class Dosen extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function ambil_data()
	{
		$query = $this->db->query("select * from dosen ");
		//$this->db->query($query);
		return $query->result();
	}	
	function ambildata()
	{
		$query = $this->db->query("select * from dosen ");
		//$this->db->query($query);
		return $query->result_array();
	}
	function ambil_kode()
	{
		$query = $this->db->query("select nip from dosen ");
		//$this->db->query($query);
		return $query->result_array();
	}
	
	function ambil_nip($banding)
	{
		$query = $this->db->query("select ifnull(nip,'')as nip from dosen where nama like ".$banding."",false);
		return $query->result();
	}
	function ambilsks($nip)
	{
		$query = $this->db->query("select * from dosen where nip = '".$nip."'");
		//$this->db->query($query);
		return $query->result_array();
	}
	function ubahsks($nip,$sks)
	{
		
		$arr = ['jumlah_sks_mengajar'=>$sks];
		$sql = $this->db->where('nip', $nip);
		$sql = $this->db->update('dosen', $arr);
		return $this->db->affected_rows();
	}
}

?>