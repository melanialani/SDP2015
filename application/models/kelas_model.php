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

		function getClassForOpenClass($value, $value2){
			$sql = 'SELECT k.id AS idKelas, m.id AS idMataKuliah, m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jumlah_mahasiswa, k.jam_mulai, r.nama AS namaRuangan, d.nip AS idDosen, d.nama AS namaDosen FROM mata_kuliah m, kelas k, ruangan r, dosen d WHERE m.id = k.mata_kuliah_id AND d.nip = k.dosen_nip AND k.status = "1" AND k.tahun_ajaran = "'.$value2.'" AND r.id = k.ruangan_id AND LEFT(m.informasi_kurikulum_id, 5) = "'.$value.'"ORDER BY k.id ASC;';
			$query = $this->db->query($sql);
			return $query->result();
		}

		function getSortedClassForOpenClass($value, $value2, $value3){
			$sql = 'SELECT k.id AS idKelas, m.id AS idMataKuliah, m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jumlah_mahasiswa, k.jam_mulai, r.nama AS namaRuangan, d.nip AS idDosen, d.nama AS namaDosen FROM mata_kuliah m, kelas k, ruangan r, dosen d WHERE m.id = k.mata_kuliah_id AND d.nip = k.dosen_nip AND k.status = "1" AND r.id = k.ruangan_id AND LEFT(m.informasi_kurikulum_id, 5) = "'.$value.'"ORDER BY '.$value2.' '.$value3.';';
			$query = $this->db->query($sql);
			return $query->result();
		}

		function getSameClassList($value, $value2, $value3){
			$sql = 'SELECT k.id AS idKelas, m.id AS idMataKuliah, m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jumlah_mahasiswa, k.jam_mulai, r.nama AS namaRuangan, d.nip AS idDosen, d.nama AS namaDosen FROM mata_kuliah m, kelas k, ruangan r, dosen d WHERE m.id = k.mata_kuliah_id AND d.nip = k.dosen_nip AND k.status = "1" AND k.tahun_ajaran = "'.$value3.'"  AND r.id = k.ruangan_id AND k.id != "'.$value2.'" AND k.mata_kuliah_id = "'.substr($value2,3,5).'" AND LEFT(m.informasi_kurikulum_id, 5) = "'.$value.'"ORDER BY k.id ASC;';
			$query = $this->db->query($sql);
			return $query->result();
		}

		function getCurrentClass($value, $value2){
			$sql = 'SELECT k.id AS idKelas, m.id AS idMataKuliah, m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jumlah_mahasiswa, k.jam_mulai, r.nama AS namaRuangan, d.nip AS idDosen, d.nama AS namaDosen FROM mata_kuliah m, kelas k, ruangan r, dosen d WHERE m.id = k.mata_kuliah_id AND d.nip = k.dosen_nip AND k.status = "1" AND r.id = k.ruangan_id AND k.id = "'.$value2.'" AND LEFT(m.informasi_kurikulum_id, 5) = "'.$value.'";';
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
			$data = array(
				'status' => "0",
				'dosen_nip' => NULL,
				'ruangan_id' => NULL
			);	
			$this->db->where('id', $value);
			$this->db->update('kelas', $data);
		}

		function insertNewClass($courseID, $nip, $courseYear, $day, $room, $time){
			$firstDigit = Date('Y');

			if(substr($courseYear['value'],0,5) == "GASAL"){
				$semester = "1";
			}
			else{
				$semester = "0";
			}

			$this->db->select_max('nama');
			$this->db->from('kelas');
			$this->db->where('mata_kuliah_id', $courseID);
			$query = $this->db->get()->row_array();

			$className = $query;

			$asciiName = ord($className['nama']);

			$asciiName = $asciiName + 1;

			$newClassName = chr($asciiName);

			$classID = substr($firstDigit,2,2).$semester.$courseID.$newClassName;
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

			return $classID;
		}
		
		function updateGabungKelas($mainClassID, $mainClassName, $joinClassID){
			$updateNewClass = array(
				'kelas_id' => $mainClassID,
				'status' => '0',
				'dosen_nip' => NULL,
				'ruangan_id' => NULL
			);

			$this->db->where('id', $joinClassID);
			$this->db->update('kelas', $updateNewClass);
		}

		function updateGabungMurid($mainClassID, $nrp){
			$updateNewClass = array(
				'kelas_id' => $mainClassID
			);

			$this->db->where('mahasiswa_nrp', $nrp);
			$this->db->update('kelas_mahasiswa', $updateNewClass);
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

		function updateSeparatingClass($courseID, $nip, $courseYear, $day, $room, $time){
			
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

		function getStudents($value){
			$this->db->select();
			$this->db->from('kelas_mahasiswa');
			$this->db->where('kelas_id', $value);
			$query = $this->db->get()->result_array();
			return $query;
		}

		function getSKS($value){
			$this->db->select('jumlah_sks');
			$this->db->from('mata_kuliah');
			$this->db->where('id', $value);
			$query = $this->db->get()->row_array();
			return $query;
		}
		
		
		//=============ANGELINE=============//
		//function untuk dapetin mata kuliah yang diajar sama dosen yang sedang login
		function getKelasMataKuliahId($nip)
		{
			$hasil = $this->db
			->select('mata_kuliah_id')
			->from('kelas')
			->where('nip',$nip)
			->get(); 	
			
			return $hasil->result();
		}
		
		
		
		function getListSemester2($jurusan,$year)
		{
			$sub = substr($jurusan,0,5);
			$sql = 'SELECT DISTINCT m.semester
			FROM mata_kuliah m, kelas k, ruangan r
			WHERE k.tahun_ajaran ="'.$year.'" and m.id = k.mata_kuliah_id AND r.id = k.ruangan_id 
			AND m.status=1 AND k.status=1 AND k.kelas_id is NULL AND m.informasi_kurikulum_id like "%'.$sub.'%" 
			ORDER BY m.semester, m.nama, k.nama';
			
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		function getKelas($jurusan,$year,$semester)
		{
			$sub = substr($jurusan,0,5);
			$sql = 'SELECT m.semester, m.informasi_kurikulum_id,k.id, m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jam_mulai, r.nama AS namaRuangan 
			FROM mata_kuliah m, kelas k, ruangan r
			WHERE m.semester ="'.$semester.'" and k.tahun_ajaran ="'.$year.'" and m.id = k.mata_kuliah_id AND r.id = k.ruangan_id 
			AND m.status=1 AND k.status=1 AND k.kelas_id is NULL AND m.informasi_kurikulum_id like "%'.$sub.'%" 
			ORDER BY m.semester, m.nama, k.nama';
			
			$query = $this->db->query($sql);
			return $query;
		}
		
		function getKelas2($jurusan,$year,$semester)
		{
			$sub = substr($jurusan,0,5);
			if($semester== "All")
			{
				$sql = 'SELECT k.tahun_ajaran, m.semester, k.id, m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jam_mulai, r.nama AS namaRuangan 
				FROM mata_kuliah m, kelas k, ruangan r
				WHERE k.tahun_ajaran ="'.$year.'" and m.informasi_kurikulum_id like "%'.$sub.'%" and m.id = k.mata_kuliah_id AND r.id = k.ruangan_id AND k.kelas_id is NULL AND m.status=1 AND k.status=1 
				ORDER BY k.tahun_ajaran asc, m.semester, m.nama, k.nama';
			}
			else
			{
				$sql = 'SELECT k.tahun_ajaran, m.semester, k.id, m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jam_mulai, r.nama AS namaRuangan 
				FROM mata_kuliah m, kelas k, ruangan r
				WHERE m.semester ="'.$semester.'" and k.tahun_ajaran ="'.$year.'" and m.informasi_kurikulum_id like "%'.$sub.'%" and m.id = k.mata_kuliah_id AND r.id = k.ruangan_id AND k.kelas_id is NULL AND m.status=1 AND k.status=1 
				ORDER BY k.tahun_ajaran asc, m.semester, m.nama, k.nama';
			}
			
			
			
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		function getKelasFromId($id)
		{
			$sql = 'SELECT m.jumlah_sks, d.nama as namaDosen, k.id, m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jam_mulai, r.nama AS namaRuangan 
			FROM mata_kuliah m, kelas k, ruangan r, dosen d 
			WHERE k.id ="'.$id.'"'.' and m.id=k.mata_kuliah_id AND d.nip =k.dosen_nip AND r.id = k.ruangan_id';
			
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		function checkGabungClass($id)
		{
			$this->db->where('kelas_id',$id);
			return $this->db->get('kelas');
			
		}
		
		
		function getSelectedKelas($id)
		{
			$sql = 'SELECT k.ruangan_id, k.hari, k.jam_mulai
			FROM kelas k
			WHERE k.id = "'.$id.'"';
			
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		function updateKelas($id,$ruangan,$hari,$jam)
		{
			
			$sql = 'UPDATE kelas 
			SET ruangan_id= "'.$ruangan.'"'.', hari="'.$hari.'"'. ', jam_mulai="'.$jam.'"'.
			'WHERE id = "'.$id.'"';
			
			$query = $this->db->query($sql);
			return "berhasil";
		}
		
		
		
		function getListSemester($nrp)
		{
			$sql = 'SELECT DISTINCT m.semester
			FROM kelas_mahasiswa km, kelas k, mata_kuliah m, dosen d, ruangan r
			WHERE m.status=1 AND k.status=1 AND k.kelas_id is NULL AND km.mahasiswa_nrp ="'.$nrp.'" and km.kelas_id = k.id and m.id = k.mata_kuliah_id and d.nip=k.dosen_nip and r.id= k.ruangan_id
			ORDER BY m.semester, m.nama';
			
			
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		//km.semester adalh kapan mahasiswa ambil kelas tsb
		function getKelasBasedNRP($nrp,$semester)
		{
			$sql = 'SELECT m.jumlah_sks, km.status_ambil, m.semester, k.hari, k.jam_mulai, k.nama as namaKelas, m.nama as namaMataKuliah, d.nama as namaDosen, r.nama as namaRuangan
			FROM kelas_mahasiswa km, kelas k, mata_kuliah m, dosen d, ruangan r, mahasiswa ma
			WHERE km.semester= ma.semester and m.semester ="'.$semester.'" and m.status=1 AND k.status=1 AND k.kelas_id is NULL AND km.mahasiswa_nrp ="'.$nrp.'" AND ma.nrp ="'.$nrp.'" 
			and km.kelas_id = k.id and m.id = k.mata_kuliah_id and d.nip=k.dosen_nip and r.id= k.ruangan_id 
			AND (BINARY km.status_ambil="A" or BINARY km.status_ambil="T" or BINARY km.status_ambil="b")
			ORDER BY k.hari';
			
			
			$query = $this->db->query($sql);
			return $query;
		}
		
		function checkClassSchedule($id,$ruangan,$hari,$jam,$tahun_ajaran)
		{
			$sql = 'SELECT k.ruangan_id, k.id, m.nama AS namaMataKuliah, m.jumlah_sks, k.nama AS namaKelas, k.hari, k.jam_mulai, r.nama AS namaRuangan 
			FROM mata_kuliah m, kelas k, ruangan r
			WHERE k.tahun_ajaran ="'.$tahun_ajaran.'" AND m.id = k.mata_kuliah_id AND r.id = k.ruangan_id AND m.status=1 AND k.status=1 AND k.kelas_id is NULL;';
			
			$query = $this->db->query($sql);
			
			$cek = false;
			foreach($query->result() as $row)
			{
				
				if($row->ruangan_id == $ruangan && $row->hari == $hari && $row->jam_mulai == $jam && $row->id != $id )
				{
					$cek= true;
				}
			}
			
			return $cek;
		}
		
		public function getComboBoxAllYear()
		{
			$this->db->select('tahun_ajaran');
			$this->db->distinct();
			$this->db->from('kelas');
			$results = $this->db->get()->result();
			$arrComboBox = [];
			
				
			foreach ($results as $result)
			{
				$key = $result->tahun_ajaran;
				$arrComboBox[$key] = $result->tahun_ajaran;
			}
			return $arrComboBox;
		}
		
		public function getComboBoxAngkatan($jurusan)
		{
			$sub = substr($jurusan,0,5);
			
			$this->db->select('tahun_angkatan');
			$this->db->distinct();
			$this->db->like('id',$sub);
			$this->db->from('informasi_kurikulum');
			$results = $this->db->get()->result();
			$arrComboBox = [];
			
				
			foreach ($results as $result)
			{
				$key = $result->tahun_angkatan;
				$arrComboBox[$key] = $result->tahun_angkatan;
			}
			return $arrComboBox;
		}
		//=============ANGELINE=============//
	}
?>