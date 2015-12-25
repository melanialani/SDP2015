<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mata_Kuliah_Model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//function untuk dapetin NIP dosen yang sedang login saat ini
	function getMataKuliah($kelas)
	{
		$where="";
		$ctr=1;
		
		foreach($kelas as $row)
		{
			if($ctr==1)
			{
				$where.="id = '".$row->mata_kuliah_id."' ";
			}
			else
			{
				$where.=" or id= '". $row->mata_kuliah_id."' ";
			}
			$ctr++;
		}
		
		$hasil = $this->db
		->select('*')
		->from('mata_kuliah')
		->where($where)
		->get(); 	
		
		return $hasil->result();
	}
	
	
	
	function printing()
	{
		
	}
	
}
