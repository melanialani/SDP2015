<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifikasi_model extends CI_Model {
	
	function autoGenId()
	{
		$ctr = 1;
		$id = "NO" . substr(date('y'), 0, 2) . date('m') . date('d');
		
		$resultnya = $this->db
					->select('*')
					->from('notifikasi')->get();
		
		foreach($resultnya->result() as $row)
		{
			if(substr($row->id, 0, 7) == $id)
			{
				$ctr++;
			}
		}
		
		if($ctr < 10)
		{
			return $id . "000" . $ctr;
		}
		else if($ctr >= 10 && $ctr < 100)
		{
			return $id . "00" . $ctr;
		}
		else if($ctr >= 100 && $ctr < 1000)
		{
			return $id . "0" . $ctr;
		}
		else 
		{
			return $id . $ctr;
		}
	}
	
	public function insertNotifikasi($judul, $isi)
	{
		$id = $this->autoGenId();
		
		$arrfields = [
						'id' => $id,
						'dosen_nip' => "PMB",
						'judul' => $judul,
						'isi' => $isi,
					];
		
		$this->db->insert('notifikasi', $arrfields);
		
		return $this->db->affected_rows();
	}
}