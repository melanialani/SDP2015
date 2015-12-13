<?php
	class kelas_model extends CI_Model
	{
		function __construct(){
			parent:: __construct();
			$this->load->database();
		}

		function getRooms(){
			$this->db->select();
			$this->db->from('ruangan');
			$query = $this->db->get()->result();
			return $query;
		}

		function roomsComboBox(){
			$roomsName = $this->getRooms();
			$rooms=[];
			foreach($roomsName as $roomName)
			{
				$rooms[$roomName->id]= $roomName->nama;
			}
			return $rooms;
		}

		function getLecturers(){
			$this->db->select();
			$this->db->from('dosen');
			$query = $this->db->get()->result();
			return $query;
		}

		function lecturersComboBox(){
			$lecturersName = $this->getLecturers();
			$lecturers=[];
			foreach($lecturersName as $lecturerName)
			{
				$lecturers[$lecturerName->nip]= $lecturerName->nama;
			}
			return $lecturers;
		}

		function getClassForSchedule($value){
			$sql = 'SELECT m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jumlah_mahasiswa, k.jam_mulai, r.nama AS namaRuangan FROM mata_kuliah m, kelas k, ruangan r WHERE m.id = k.mata_kuliah_id AND r.id = k.ruangan_id AND LEFT(m.informasi_kurikulum_id) = "'.$value.'";';
			$query = $this->db->query($sql);
			return $query->result();
		}

		function getClassForOpenClass($value){
			$sql = 'SELECT k.id AS idKelas, m.id AS idMataKuliah, m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jumlah_mahasiswa, k.jam_mulai, r.nama AS namaRuangan, d.nama AS namaDosen FROM mata_kuliah m, kelas k, ruangan r, dosen d WHERE m.id = k.mata_kuliah_id AND d.nip = k.dosen_nip AND k.status = "1" AND r.id = k.ruangan_id AND LEFT(m.informasi_kurikulum_id, 5) = "'.$value.'"ORDER BY k.id ASC;';
			$query = $this->db->query($sql);
			return $query->result();
		}

		function getSortedClassForOpenClass($value, $value2, $value3){
			$sql = 'SELECT k.id AS idKelas, m.id AS idMataKuliah, m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jumlah_mahasiswa, k.jam_mulai, r.nama AS namaRuangan, d.nama AS namaDosen FROM mata_kuliah m, kelas k, ruangan r, dosen d WHERE m.id = k.mata_kuliah_id AND d.nip = k.dosen_nip AND k.status = "1" AND r.id = k.ruangan_id AND LEFT(m.informasi_kurikulum_id, 5) = "'.$value.'"ORDER BY '.$value2.' '.$value3.';';
			$query = $this->db->query($sql);
			return $query->result();
		}

		function getSameClassList($value, $value2){
			$sql = 'SELECT k.id AS idKelas, m.id AS idMataKuliah, m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jumlah_mahasiswa, k.jam_mulai, r.nama AS namaRuangan, d.nama AS namaDosen FROM mata_kuliah m, kelas k, ruangan r, dosen d WHERE m.id = k.mata_kuliah_id AND d.nip = k.dosen_nip AND k.status = "1" AND r.id = k.ruangan_id AND k.id != "'.$value2.'" AND k.mata_kuliah_id = "'.substr($value2,2,5).'" AND LEFT(m.informasi_kurikulum_id, 5) = "'.$value.'"ORDER BY k.id ASC;';
			$query = $this->db->query($sql);
			return $query->result();
		}

		function getCurrentClass($value, $value2){
			$sql = 'SELECT k.id AS idKelas, m.id AS idMataKuliah, m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jumlah_mahasiswa, k.jam_mulai, r.nama AS namaRuangan, d.nama AS namaDosen FROM mata_kuliah m, kelas k, ruangan r, dosen d WHERE m.id = k.mata_kuliah_id AND d.nip = k.dosen_nip AND k.status = "1" AND r.id = k.ruangan_id AND k.id = "'.$value2.'" AND LEFT(m.informasi_kurikulum_id, 5) = "'.$value.'";';
			//$fuc = "SELECT babi from kewan where {$babi} = {$array['nama1']}";
			$query = $this->db->query($sql);
			return $query->row();
		}

		function getCourses($value){
			$this->db->select();
			$this->db->from('mata_kuliah');
			$this->db->where('LEFT(informasi_kurikulum_id, 5) =', $value, true);
			$query = $this->db->get()->result();
			return $query;
		}

		function coursesComboBox($value){
			$coursesName = $this->getCourses($value);
			$courses=[];
			foreach($coursesName as $courseName)
			{
				$courses[$courseName->id]= $courseName->nama;
			}
			return $courses;
		}

		function getClasses(){
			$this->db->select();
			$this->db->from('kelas');
			$query = $this->db->get()->result_array();
			return $query;
		}		

		function updateClassStatus($value){
			$sql = 'UPDATE kelas SET status = "0" WHERE id = "'.$value.'";';
			$query = $this->db->query($sql);	
		}

		function insertNewClass($courseID, $nip, $courseYear, $day, $room, $time){
			$firstDigit = Date('Y');

			$this->db->select_max('nama');
			$this->db->from('kelas');
			$this->db->where('mata_kuliah_id', $courseID);
			$query = $this->db->get()->row_array();

			$className = $query;

			$asciiName = ord($className['nama']);

			$asciiName = $asciiName + 1;

			$newClassName = chr($asciiName);

			$classID = substr($firstDigit,2,2).$courseID.$newClassName;
			$insertClass = array(
				'id' => $classID,
				'mata_kuliah_id' => $courseID,
				'dosen_nip' => $nip,
				'ruangan_id' => $room,
				'hari' => $day,
				'jam_mulai' => $time,
				'status' => '1',
				'nama' => $newClassName
			);

			$this->db->insert('kelas', $insertClass);
		}
		
		function updateGabungKelas($mainClassID, $mainClassName, $joinClassID){
			$updateNewClass = array(
				'kelas_id' => $mainClassID,
				'status' => '0'
			);

			$this->db->where('id', $joinClassID);
			$this->db->update('kelas', $updateNewClass);
		}

		function countStudents($classID){
			$this->db->select();
			$this->db->from('kelas_mahasiswa');
			$this->db->where('kelas_id', $classID);
			$query = $this->db->count_all_results();

			$studentsNumber = array(
				'jumlah_mahasiswa' => $query
			);

			$this->db->where('id', $classID);
			$this->db->update('kelas', $studentsNumber);
		}

		function updateCountStudents($classID, $mainClassID){
			$this->db->select('jumlah_mahasiswa');
			$this->db->from('kelas');
			$this->db->where('id', $mainClassID);
			$query2 = $this->db->get()->result_array();

			$jumlahMahasiswaOld = $query2;


			$this->db->select();
			$this->db->from('kelas_mahasiswa');
			$this->db->where('kelas_id', $classID);
			$query = $this->db->count_all_results();
			$jumlahMahasiswaNew = $query;

			$jumlahMahasiswa = intval($jumlahMahasiswaOld[0]['jumlah_mahasiswa']) + $jumlahMahasiswaNew;

			$studentsNumber = array(
				'jumlah_mahasiswa' => $jumlahMahasiswa
			);

			$this->db->where('id', $mainClassID);
			$this->db->update('kelas', $studentsNumber);			
		}

		function updateSeparatingClass($classID){
		
		}

		function getSemester(){
			$this->db->select('value');
			$this->db->from('data_umum');
			$this->db->where('index', 'tahun_ajaran_sekarang');
			$query = $this->db->get()->row_array();
			return $query;
		}

		function getMajor($value){
			$this->db->select('kepala_jurusan_id');
			$this->db->from('dosen');
			$this->db->where('nip', $value);
			$query = $this->db->get()->row_array();
			return $query;
		}
	}
?>