<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ruangan_Model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function selectRuangan()
	{
		$hasil = $this->db
		->select('*')
		->from('ruangan')
		->order_by('id','asc')
		->get(); 	
		
		/*foreach($hasil->result() as $row)
		{
			echo $row->id;
		}*/
		return $hasil->result();
		
	}
	
	function dropdownDaftarRuangan()
	{
		$hasil= $this->selectRuangan();
		
		$arrDaftar=[];
		foreach($hasil as $hasil)
		{
			$arrDaftar[$hasil->id]= $hasil->nama;
		}
		return $arrDaftar;
	}
	
	function insertRuangan($nama,$kapasitas)
	{
		$id="";
		$lastId=0;
		$id.= substr($nama,0,1);
		
		echo $id;
		
		$hasil = $this->db
		->select_max('id')
		->from('ruangan')
		->like('id', $id)
		->get(); 	
		
			
		foreach ($hasil->result() as $row)
		{
			$lastId = (substr($row->id,1,3));
		}
		
		$lastId+=1;
		
		if($lastId>=0 && $lastId<=9)
		{
			$id .= "00".$lastId;
		}
		else if($lastId>=10 && $lastId<=99)
		{
			$id .= "0".$lastId;
		}
		else
		{
			$id .= $lastId;
		}
		
		//echo $id;
		
		$data= array(
			'id' => $id,
			'nama' => $nama,
			'kapasitas' => $kapasitas
		);
		
		$this->db->insert('ruangan',$data);
		
	}
	
	function deleteRuangan($id)
	{
		$result=$this->db
		->where('id',$id)
		->delete('ruangan');
				
		return $this->db->affected_rows();
	}
	
	function updateRuangan($id,$nama,$kapasitas)
	{
		$data = array(
			'nama' => $nama,
			'kapasitas' => $kapasitas
		);

		$this->db->where('id', $id);
		$this->db->update('ruangan', $data);
				
		return $this->db->affected_rows();
	}
	
	function getSelectedRuangan($id)
	{
		$hasil = $this->db
		->select('*')
		->from('ruangan')
		->where('id',$id)
		->get(); 	
		
		return $hasil->result();
	}
	function printing()
	{
		
	}
	
}
