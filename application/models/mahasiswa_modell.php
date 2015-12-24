<?php
	class Mahasiswa_modell extends CI_Model{
		/* -----------------------------------------------------
		Function __construct()
		Mengeload Inisialisasi Awal Model class_model
		Input/Output : -
		----------------------------------------------------- */
		public function __construct(){
			parent::__construct();
		}
		/* -----------------------------------------------------
		Function getAllStudent
		Mengambil data mahasiswa di tabel mahasiswa
		Input: -
		Output: Array Raw Mahasiswa
		----------------------------------------------------- */
		public function getAllStudent(){
			$sql = $this->db->get('mahasiswa');
			return $sql->result();
		}
		
		/* -----------------------------------------------------
		Function isStudent
		Mengecek apakah nrp sekian merupakan mahasiswa dari tabel mahasiswa
		Input: nrp mahasiswa
		Output: jika benar maka bernilai true, jika salah false
		----------------------------------------------------- */
		
		public function isStudent($nrp){
			$this->db->get_where('mahasiswa',array('nrp'=>$nrp));
			if($this->db->affected_rows()>0){
				return true;
			}
			else{
				return false;
			}
		}
		
		/* -----------------------------------------------------
		Function isPassword
		Mengecek apakah nrp sekian dengan password sekian apakah sama
		di tabel mahasiswa
		Input: nrp mahasiswa, pass mahasiswa
		Output: jika benar maka bernilai true, jika salah false
		----------------------------------------------------- */
		public function isPassword($nrp,$pass)
		{
			$result = $this->db->get_where('mahasiswa',array('nrp'=>$nrp));
			$row = $result->row();
			if($this->db->affected_rows()>0){
				if($row->password == $pass)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		
		
		public function getDetailStudent($nrp)
		{
			$this->db->select('*');
			$result = $this->db->get_where('mahasiswa',array('nrp'=>$nrp));
			return $result->row();
		}
		
		/* -----------------------------------------------------
		Function getStudentBasedJurusan
		Mendapatkan semua mahasiswa yang mengambil jurusan sesuai dengan parameter $idJurusan
		Input: jurusan dari Ketua Jurusan
		Output: semua mahasiswa yang berjurusan sesuai dengan paramater $idJurusan
		----------------------------------------------------- */
		public function getStudentBasedJurusan($idJurusan)
		{
			$hasil = $this->db
			->select('nrp,nama')
			->from('mahasiswa')
			->where('informasi_kurikulum_id',$idJurusan)
			->get(); 	
			return $hasil->result();
		}
		
		
		public function getStudentBasedJurusan2($jurusan, $angkatan)
		{
			$sub= substr($jurusan,0,5);
			$query3 = 'SELECT m.nrp, m.nama from mahasiswa m where informasi_kurikulum_id in 
			(select id from informasi_kurikulum where tahun_angkatan ="'.$angkatan.'" and id like "%'.$sub.'%")';
			
			return $this->db->query($query3)->result();
			
		}
		
		
	}
?>