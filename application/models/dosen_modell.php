<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen_Modell extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//function untuk dapetin NIP dosen yang sedang login saat ini
	function getNIP($nama)
	{
		$nip="";
		
		$hasil = $this->db
		->select('nip')
		->from('dosen')
		->where('nama',$nama)
		->get(); 	
		
		foreach($hasil->result() as $row)
		{
			$nip=$row->nip;
		}
		return $nip;
		
	}
	
	//untuk dapatin kajur atau bukan
	//jika iya maka kajur jurusan apa
	function getDataKajur($nip)
	{
		$hasil = $this->db
		->select('*')
		->from('dosen')
		->where('nip',$nip)
		->get(); 	
		return $hasil->result();
	}
	
	function getJurusan($id)
	{
		$hasil = $this->db
		->select('*')
		->from('informasi_kurikulum')
		->where('id',$id)
		->get();
		
		foreach($hasil->result() as $row)
		{
			$jurusan=$row->jurusan;
		}
		
		return $jurusan;
	}
	
	
	function printing()
	{
		
	}
	
}
