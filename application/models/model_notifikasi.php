<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_notifikasi extends CI_Model {
	public function getNotificationDatum($field, $where, $whereValue){
		$select = $this->db->select($field)
						   ->from('notifikasi')
						   ->where($where, $whereValue)
						   ->get()->result_array();
		return $select[0][$field];
	}
	
	public function countNewMatriculant(){
        $select = $this->db->select('id')
                           ->from('notifikasi')
                           ->where('dari', 'PMB')
                           ->where('tujuan', 'BAU')
                           ->where('status_baca', '0')
                           ->get()->result();
        return count($select);
    }
    
    public function countNewStudent(){
        $select = $this->db->select('id')
                           ->from('notifikasi')
                           ->where('tujuan', 'MHSBAU')
                           ->where('status_baca', '0')
                           ->get()->result();
        return count($select);
    }
	
    public function getNewMatriculant(){
        $arrReturn = [];
        $select = $this->db->select('judul')
                           ->from('notifikasi')
                           ->where('dari', 'PMB')
                           ->where('tujuan', 'BAU')
                           ->where('status_baca', '0')
                           ->get()->result();
        foreach($select as $r){
            $arrReturn[] = $r->judul;
        }
        return $arrReturn;
    }
    
    public function getNotifMatriculant(){
        $select = $this->db->select('id')
                           ->from('notifikasi')
                           ->where('dari', 'PMB')
                           ->where('tujuan', 'BAU')
                           ->where('status_baca', '0')
                           ->get()->result_array();
        return $select;
    }
    
    public function getNewStudent(){
        $arrReturn = [];
        $select = $this->db->select('dari')
                           ->from('notifikasi')
                           ->where('tujuan', 'MHSBAU')
                           ->where('status_baca', '0')
                           ->get()->result();
        foreach($select as $r){
            $arrReturn[] = $r->dari;
        }
        return $arrReturn;
    }
    
    public function getNotifStudent(){
        $select = $this->db->select('id')
                           ->from('notifikasi')
                           ->where('tujuan', 'MHSBAU')
                           ->where('status_baca', '0')
                           ->get()->result_array();
        return $select;
    }
    
    public function setReadStatus($arr){
        $this->db->where_in('id', $arr);
        $arrUpdate = array(
            'status_baca' => '1'
        );
        $this->db->update('notifikasi', $arrUpdate);
    }
    
    public function generateNotifUPP()
    {
        $listStudent = [];
        $tempStudent = $this->model_mahasiswa->getStudentIds();
        foreach($tempStudent as $r){
            $listStudent[] = $r['nrp'];
        }
        for($a = 0; $a < count($listStudent); $a++){
            $arr = array(
                'dari' => $listStudent[$a],
                'tujuan' => 'MHSBAU',
                'judul' => 'Generate Notif UPP',
                'isi' => 'Generate NOTIF UPP',
                'tanggal_create' => date('Y').date('m').date('d'),
                'status_baca' => 0
            );
            $this->db->insert('notifikasi', $arr);
        }
    }
}

