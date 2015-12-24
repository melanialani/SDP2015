<?php
	class Notifikasi_model extends CI_Model{
		/* -----------------------------------------------------
		Function __construct()
		Mengeload Inisialisasi Awal Model class_model
		Input/Output : -
		----------------------------------------------------- */
		public function __construct(){
			parent::__construct();
            $this->load->database();
		}
		public function getNotification($limit, $start)
		{
			$name = $this->session->userdata('username');
            $this->db->select('n.dari,n.tujuan,n.judul,d.nama as nama_asal, n.tanggal_create, n.isi, n.status_baca');
            $this->db->from('notifikasi n, dosen d');
            $this->db->where('d.nip = n.dari');
            $this->db->where('n.tujuan',$name);
			$this->db->limit($limit, $start);
            $this->db->order_by('tanggal_create','desc');
			$result = $this->db->get();
			return $result->result();
		}

		public function getCountNotification()
		{
			$name = $this->session->userdata('username');
			$this->db->where('tujuan',$name);
            $this->db->from('notifikasi');
			return $this->db->count_all_results();
		}

		public function sendNotif()
		{
			$lectureId = $this->mahasiswa_model->getLecture();
			$studentId = $this->session->userdata('username');
			$isi = $this->mahasiswa_model->getNameStudent($studentId) . ' telah melakukan perwalian';
			$data = array('dari'=>$studentId, 'tujuan'=>$lectureId,'judul'=>'Konfirmasi Perwalian','isi'=>$isi);
			$this->db->insert('notifikasi',$data);
		}

        public function sendNotification($asal, $tujuan, $message, $link =null){
            $data = ['dari' => $asal, 'tujuan' => $tujuan,'judul' => $message,'status_baca'=>'0'];
            if ($link != null){
                $this->db->set('isi',$link);
            }
            $this->db->set('tanggal_create','now()',false);
            $this->db->insert('notifikasi', $data);
            return $this->db->affected_rows();
        }

	}
?>