<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas_Mahasiswa_Modell extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function getMahasiswa($id)
	{
		$sql = 'SELECT k.mahasiswa_nrp, m.nama
		FROM kelas_mahasiswa k, mahasiswa m
		WHERE k.kelas_id ="'.$id.'"'. 'AND k.mahasiswa_nrp = m.nrp';
		
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function getMahasiswa2($id)
	{
		$gabungan_class= $this->kelas_model->checkGabungClass($id);
		
		$where="(";
		foreach($gabungan_class->result() as $row)
		{
			$where.='k.kelas_id ="'.$row->id.'" or ';
		}
		
		$where .= 'k.kelas_id="'.$id.'")';
		
		$sql = 'SELECT k.mahasiswa_nrp, m.nama
		FROM kelas_mahasiswa k, mahasiswa m
		WHERE '. $where. ' and k.mahasiswa_nrp = m.nrp';
		
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function countMahasiswa($id)
	{
		$sql = 'SELECT k.mahasiswa_nrp, m.nama
		FROM kelas_mahasiswa k, mahasiswa m
		WHERE k.kelas_id ="'.$id.'"'. 'AND k.mahasiswa_nrp = m.nrp';
		
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	
	
}
