<?php
	class kelas extends CI_Model
	{
		function __construct(){
			parent:: __construct();
			$this->load->database();
		}

		function getRoomsName(){
			$this->db->select('nama');
			$this->db->from('ruangan');
			$query = $this->db->get()->result_array();
			return $query;
		}

		function getLecturersName(){
			$this->db->select('nama');
			$this->db->from('dosen');
			$query = $this->db->get()->result_array();
			return $query;
		}

		/*function getCourseName($value){
			$this->db->select('m.nama, m.jumlah_sks, k.nama, k.hari, k.jam_mulai, r.nama');
			$this->db->from('mata_kuliah m, kelas k, ruangan r');
			$this->db->where('m.id = k.mata_kuliah_id', 'r.id = k.ruangan_id', 'm.jurusan', $value);
			$query = $this->db->get()->result();
			return $query;
		}*/

		function getClassForSchedule($value){
			$sql = 'SELECT m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jam_mulai, r.nama AS namaRuangan FROM mata_kuliah m, kelas k, ruangan r WHERE m.id = k.mata_kuliah_id AND r.id = k.ruangan_id AND m.jurusan = "'.$value.'";';
			$query = $this->db->query($sql);
			return $query->result();
		}

		function getClassForOpenClass($value){
			$sql = 'SELECT k.id AS idKelas, m.id AS idMataKuliah, m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jam_mulai, r.nama AS namaRuangan, d.nama AS namaDosen FROM mata_kuliah m, kelas k, ruangan r, dosen d WHERE m.id = k.mata_kuliah_id AND d.nip = k.dosen_nip AND k.status = "0" AND r.id = k.ruangan_id AND m.informasi_kurikulum_id = "'.$value.'";';
			$query = $this->db->query($sql);
			return $query->result();
		}

		function getCoursesName(){
			$this->db->select('nama');
			$this->db->from('mata_kuliah');
			$query = $this->db->get()->result_array();
			return $query;
		}

		function getClasses(){
			$this->db->select();
			$this->db->from('kelas');
			$query = $this->db->get()->result_array();
			return $query;
		}		

		function updateClassStatus($value){
			$sql = 'UPDATE kelas SET status = "1" WHERE id = "'.$value.'";';
			$query = $this->db->query($sql);	
		}

		function insertNewClass($id, $nama, $mata_kuliah_id,$dosen_nip){
			$dataa = array(
			'id' => $id,
			'nama' => $nama,
			'mata_kuliah_id' => $mata_kuliah_id,
			'dosen_nip' => $dosen_nip,
			'status' => 2
			);
			$this->db->insert('dosen',$dataa);
		}
				
		function insertClass($jika,$mata_kuliah_id,$dosen_nip){
			$dataa = array(
			'id' => $jika,
			'mata_kuliah_id' => $mata_kuliah_id,
			'dosen_nip' => $dosen_nip,
			'status' => 1
			);
			$this->db->insert('kelas',$dataa);
		}
		function is_there($kode_id)
		{
			$query = $this->db->query("select * from kelas where mata_kuliah_id = '".$kode_id."'");
			return $query->result_array();
		}
		function generate_kode()
		{
			$query = $this->db->query("select lpad(ifnull(max(substr(id,4)),0)+1,3,'0') as urut from kelas");
			$nama = $query->row();
			return "".$nama->urut;
		}
		
		
	function ambildata()
	{
		$query = $this->db->query("select * from kelas ");
		//$this->db->query($query);
		return $query->result_array();
	}
	
	function updatedata($nip,$id,$nama)
	{
		//$query = $this->db->query("update kelas set dosen_nip ='".$nip."' where mata_kuliah_id ='".$id."' and nama = '".$nama."'");
		;
		//return $query->affected_rows;
		
		$arr = ['dosen_nip'=>$nip];
		$sql = $this->db->where('mata_kuliah_id', $id);
		$sql = $this->db->where('nama', $nama);
		$sql = $this->db->update('kelas', $arr);
		return $this->db->affected_rows();
	}
	
	function insertdata($id,$nama,$matkul,$nip)
	{
		//$query = $this->db->query("insert into kelas ('id','nama','mata_kuliah_id','dosen_nip','status') values //('".$id."','".$nama."','".$matkul."','".$nip."','1')");
		//return $this->db->affected_rows();
		$dataa = array(
			'id' => $id,
			'nama' =>$nama,
			'mata_kuliah_id' => $matkul,
			'dosen_nip' => $nip,
			'status' => 1
			);
			$this->db->insert('kelas',$dataa);
	}
		
	}
?>