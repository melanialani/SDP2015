<?php

/**
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Benchmark $benchmark
 * @property CI_Calendar $calendar
 * @property CI_Cart $cart
 * @property CI_Config $config
 * @property CI_Controller $controller
 * @property CI_Email $email
 * @property CI_Encrypt $encrypt
 * @property CI_Exceptions $exceptions
 * @property CI_Form_validation $form_validation
 * @property CI_Ftp $ftp
 * @property CI_Hooks $hooks
 * @property CI_Image_lib $image_lib
 * @property CI_Input $input
 * @property CI_Loader $load
 * @property CI_Log $log
 * @property CI_Model $model
 * @property CI_Output $output
 * @property CI_Pagination $pagination
 * @property CI_Parser $parser
 * @property CI_Profiler $profiler
 * @property CI_Router $router
 * @property CI_Session $session
 * @property CI_Sha1 $sha1
 * @property CI_Table $table
 * @property CI_Trackback $trackback
 * @property CI_Typography $typography
 * @property CI_Unit_test $unit_test
 * @property CI_Upload $upload
 * @property CI_URI $uri
 * @property CI_User_agent $user_agent
 * @property CI_Xmlrpc $xmlrpc
 * @property CI_Xmlrpcs $xmlrpcs
 * @property CI_Zip $zip
 *
 * Add additional libraries you wish
 * to use in your controllers here
 *
 * @property Class_model $class_model
 * @property Grade_model $grade_model
 *
 */
	class Kelas_Mahasiswa_Model extends CI_Model
	{
		/* -----------------------------------------------------
		Function __construct()
		Mengeload Inisialisasi Awal Model class_model
		Input/Output : -
		----------------------------------------------------- */
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('grade_model');
		}
		
		/* -----------------------------------------------------
		Function insert()
		Input : NRP, Kelas_id, matakuliah_id, status, nilai_id
		Output : row yang berhasil diinsert
		----------------------------------------------------- */
		public function insert($studentID,$classID,$courseID,$status,$scoreID)
		{
			$studentID = $this->session->userdata('username');
			$detailStudent = $this->mahasiswa_model->getDetailStudent($studentID);
			$semester = (+$detailStudent->semester);
			$data = array('mahasiswa_nrp'=>$studentID, 'kelas_id'=>$classID, 'mata_kuliah_id'=>$courseID,'status_ambil'=>$status,'nilai_id'=>$scoreID,'semester'=>$semester);
			$this->db->insert('kelas_mahasiswa',$data);
			return $this->db->affected_rows();
		}
		
		/* -----------------------------------------------------
		Function search()
		Input : matakuliah_id
		Output : true jika telah lulus, false jika belum lulus
		----------------------------------------------------- */
		public function search($courseID)
		{
			$nrp = $this->session->userdata('username');
			$this->db->select('nilai.nilai_grade, mata_kuliah.lulus_minimal');
			$this->db->from('mata_kuliah,kelas_mahasiswa,nilai');
			$this->db->where('mata_kuliah.id','kelas_mahasiswa.mata_kuliah_id');
			$this->db->where('nilai.id','kelas_mahasiswa.nilai_id');
			$this->db->where('kelas_mahasiswa.mahasiswa_nrp',$nrp);
			$this->db->where('kelas_mahasiswa.mata_kuliah_id',$courseID);
			$result = $this->db->get()->row();
			if($this->db->affected_rows() > 0)
			{
				if(strcmp(strtoupper($result->nilai_grade),strtoupper($result->lulus_minimal)) >= 0 )
				{
					return 'true';
				}				
			}
			return 'false';
		}
		
		/* -----------------------------------------------------
		Function getSchedule()
		Input : NRP
		Output : jadwal kuliah yang akan dilakukan disemester itu
		----------------------------------------------------- */
		public function getSchedule($studentID)
		{
			$nowSemester = $this->data_umum_model->getSemester();
			$studentID = $this->session->userdata('username');
			$detailStudent = $this->mahasiswa_model->getDetailStudent($studentID);
			$semester = (+$detailStudent->semester);
			$this->db->select('mata_kuliah.id,mata_kuliah.berpraktikum, mata_kuliah.nama,kelas.hari, kelas.jam_mulai, dosen.nama as dosen, ruangan.nama as ruangan');
			$this->db->from('kelas, kelas_mahasiswa, dosen, ruangan, mata_kuliah');
			$this->db->where('kelas.id = kelas_mahasiswa.kelas_id');
			$this->db->where('kelas.ruangan_id = ruangan.id');
			$this->db->where('kelas.dosen_nip = dosen.nip');
			$this->db->where('mata_kuliah.id = kelas.mata_kuliah_id');
			$this->db->where('kelas_mahasiswa.mahasiswa_nrp',$studentID);
			$this->db->where('kelas.tahun_ajaran',$nowSemester);
			$this->db->where('kelas_mahasiswa.semester',$semester);
			$result = $this->db->get();
			return $result->result();
		}
		
				
		public function select($nrp){
			return $this
			->db
			->get_where('kelas_mahasiswa',array('mahasiswa_nrp' => $nrp))
			->result_array();
		}
		/****
		Function : cekMataKuliahMahasiswa
		Untuk mengecek apakah mahasiswa sedang mengambil mata kuliah yang di inputkan atau tidak
		Input : nrp dan kode_matkul
		Output : 1 jika ada, 0 jika tidak ada
		****/
		public function cekMataKuliahMahasiswa($nrp,$kode_matkul){
		$this->db->get_where('kelas_mahasiswa', array('mahasiswa_nrp' => $nrp, 'mata_kuliah_id' => $kode_matkul));
		if($this->db->affected_rows() > 0){return 1;}
		return 0;
		
		}
		//Function untuk mengambil kelas yang dibuka dari table kelas (nanti pindah ke model kelas)
		public function selectKelasBuka($kode_matkul){
		return $this->db->get_where('kelas', array('mata_kuliah_id' => $kode_matkul))->row_array();
		}
		
		/****
		Nama Function : updateStatus
		Untuk menganti status matakuliah yang sedang aktif diambil mahasiswa (kode 'A') menjadi batal / drop (kode 'b' atau kode 'd') Atau menambahkan record mata kuliah yang akan ditambahkan oleh mahasiswa (kode 't'). 
		Input : nrp, kode_matkul, statusUpdate ('batal' / 'tambah' / 'drop')
		Output : -
		****/
		public function updateStatus($nrp, $kode_matkul,$statusUpdate){
		if($statusUpdate == "batal"){
		$yangDiupdate = array('status_ambil'=>"b");
		$this->db->where("mahasiswa_nrp",$nrp);
		$this->db->where("mata_kuliah_id",$kode_matkul);
		$this->db->update('kelas_mahasiswa',$yangDiupdate);
		}
		else if($statusUpdate == "tambah"){
			$cekMataKuliah = $this->cekMataKuliahMahasiswa($nrp,$kode_matkul);
			if($cekMataKuliah){
			//Mata Kuliah Ada di table kelas_mahasiswa
			//Insert ke table kelas_mahasiswa
			$yangDiupdate = array('status_ambil'=>"t");
			$this->db->where("mahasiswa_nrp",$nrp);
			$this->db->where("mata_kuliah_id",$kode_matkul);
			$this->db->update('kelas_mahasiswa',$yangDiupdate);
			}
			else{
			echo $kode_matkul;
			//Mata Kuliah tidak ada di table kelas_mahasiswa
			//Ambil salah ID_KELAS satu kelas yang dibuka dengan kode_matkul
			$kelasBaru = $this->selectKelasBuka($kode_matkul)["id"];
			print_r($kelasBaru);
			$kodeNilaiBaru = $this->grade_model->insertStudentGrade($nrp); 
			$cek = $this->insert($nrp,$kelasBaru,$kode_matkul,'t',$kodeNilaiBaru);
			if($cek){echo "Sukses Tambah";}
			else{echo "Tambah gagal";}
			}
		}
		else if($statusUpdate == "drop"){
		$yangDiupdate = array('status_ambil'=>"d");
		$this->db->where("mahasiswa_nrp",$nrp);
		$this->db->where("mata_kuliah_id",$kode_matkul);
		$this->db->update('kelas_mahasiswa',$yangDiupdate);
		}
		}
	}
?>