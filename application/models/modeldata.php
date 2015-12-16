<?php
	/*
		Versi : 1.0
		Nama file : konfirmasiBatalTambahdrop.php
		Nama program : view batal tambah drop
		Kelompok : Perwalian
		Nama Penulis: Ricky Said
		NRP : 213116261
		input : 
		output :
		tujuan :
		Tanggal Pembuatan : 7 November 2015
		
		Penjelasan Program : 
		Model untuk proses select, update, dan insert dari database
	*/
	class modeldata extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
			
			
		}
		
		public function getlistbataltambah($id)
		{
			//select untuk table di konfirmasi bataltambahdrop
			$this->db->select('mahasiswa.nrp as nrp,mahasiswa.nama as nama_mahasiswa,mata_kuliah.nama as nama_mata_kuliah,kelas_mahasiswa.status_ambil as status_ambil');
			$this->db->from('mahasiswa, dosen, kelas , kelas_mahasiswa , mata_kuliah');
			//$this->db->where($id, 'dosen.nip');
			$this->db->where('mahasiswa.nip_dosen = dosen.nip');
			$this->db->where('mahasiswa.nrp = kelas_mahasiswa.mahasiswa_nrp');
			$this->db->where('kelas.id = kelas_mahasiswa.kelas_id');
			$this->db->where('kelas.mata_kuliah_id = mata_kuliah.id');
			$this->db->where('kelas_mahasiswa.semester = mahasiswa.semester');
			$this->db->where('dosen.nip' , $id);
			$this->db->order_by('nrp','asc');
			return $this->db->get()->result();
		}
		
		public function getlistbataltambahmhs($id)
		{
			//select untuk table di konfirmasi bataltambahdrop mahasiswa
			//list seluruh kelas yang di drop / tambah / batal oleh mahasiswa yang bersangkutan
			$this->db->select('mahasiswa.nrp as nrp,kelas_mahasiswa.kelas_id as kelas_id,mata_kuliah.semester as semester_mata_kuliah, mata_kuliah.jumlah_sks as jumlah_sks_mata_kuliah,mata_kuliah.nama as nama_mata_kuliah,kelas_mahasiswa.status_ambil as status_ambil');
			$this->db->from('mahasiswa, dosen, kelas , kelas_mahasiswa , mata_kuliah');
			//$this->db->where($id, 'dosen.nip');
			$this->db->where('mahasiswa.nip_dosen = dosen.nip');
			$this->db->where('mahasiswa.nrp = kelas_mahasiswa.mahasiswa_nrp');
			$this->db->where('kelas.id = kelas_mahasiswa.kelas_id');
			$this->db->where('kelas.mata_kuliah_id = mata_kuliah.id');
			$this->db->where('kelas_mahasiswa.semester = mahasiswa.semester');
			$this->db->where('dosen.nip' , $id);
			$this->db->where("(binary kelas_mahasiswa.status_ambil = 'b' OR binary kelas_mahasiswa.status_ambil = 't' OR binary kelas_mahasiswa.status_ambil = 'd')");
			$this->db->order_by('nrp','asc');
			return $this->db->get()->result();
		}
		

		
		public function getlisthistory($id)
		{
			//select untuk table di konfirmasi bataltambahdrop
			
			$this->db->select('mahasiswa.nrp as nrp,mahasiswa.nama as nama_mahasiswa');
			$this->db->from('mahasiswa, dosen, kelas , kelas_mahasiswa , mata_kuliah');
			//$this->db->where($id, 'dosen.nip');
			$this->db->where('mahasiswa.nip_dosen = dosen.nip');
			$this->db->where('mahasiswa.nrp = kelas_mahasiswa.mahasiswa_nrp');
			$this->db->where('kelas.id = kelas_mahasiswa.kelas_id');
			$this->db->where('kelas.mata_kuliah_id = mata_kuliah.id');
			$this->db->where('kelas_mahasiswa.semester = mahasiswa.semester');
			$this->db->where('dosen.nip' , $id);
			$this->db->where("(binary kelas_mahasiswa.status_ambil = 'x' OR binary kelas_mahasiswa.status_ambil = 'y' OR binary kelas_mahasiswa.status_ambil = 'z' OR binary kelas_mahasiswa.status_ambil = 'T' OR binary kelas_mahasiswa.status_ambil = 'D' OR binary kelas_mahasiswa.status_ambil = 'B')");
			$this->db->group_by('nrp');
			$this->db->order_by('nrp','asc');
			return $this->db->get()->result();
		}
		
		public function getlistbataltambahmahasiswa($id)
		{
			//select untuk table di konfirmasi bataltambahdrop
			
			$this->db->select('mahasiswa.nrp as nrp,mahasiswa.nama as nama_mahasiswa');
			$this->db->from('mahasiswa, dosen, kelas , kelas_mahasiswa , mata_kuliah');
			//$this->db->where($id, 'dosen.nip');
			$this->db->where('mahasiswa.nip_dosen = dosen.nip');
			$this->db->where('mahasiswa.nrp = kelas_mahasiswa.mahasiswa_nrp');
			$this->db->where('kelas.id = kelas_mahasiswa.kelas_id');
			$this->db->where('kelas.mata_kuliah_id = mata_kuliah.id');
			$this->db->where('kelas_mahasiswa.semester = mahasiswa.semester');
			$this->db->where('dosen.nip' , $id);
			$this->db->where("(binary kelas_mahasiswa.status_ambil = 't' OR binary kelas_mahasiswa.status_ambil = 'd' OR binary kelas_mahasiswa.status_ambil = 'b')");
			$this->db->group_by('nrp');
			$this->db->order_by('nrp','asc');
			return $this->db->get()->result();
		}
		
		public function getdatamahasiswa($id)
		{	//sks total yang telah diambil, untuk total sks diambil smt ini belum
			//data mahasiswa yang diklik
			$this->db->select('mahasiswa.nrp,mahasiswa.nama, mahasiswa.ipk, mahasiswa.sks as total_sks,  mahasiswa.semester');
			$this->db->from('mahasiswa');
			$this->db->where('nrp' , $id);
			return $this->db->get()->result();
		}
		
		public function getjadwal($nrp)
		{
			//jadwal yang ditampilkan : 
			//1.matkul aktif(A)
			//2.matkul request batal dan drop(b,d)
			//3.matkul yang telah disetujui tambah(T)
			//4.matkul batal dan drop yang ditolak(x,z)
			$this->db->select('kelas.mata_kuliah_id as mata_kuliah_id, mata_kuliah.nama as nama_mata_kuliah, mata_kuliah.semester as semester, mata_kuliah.jumlah_sks as sks');
			$this->db->from('kelas_mahasiswa, kelas, mata_kuliah, mahasiswa');
			$this->db->where('kelas_mahasiswa.mahasiswa_nrp',$nrp);
			$this->db->where('mahasiswa.nrp',$nrp);
			$this->db->where('kelas_mahasiswa.kelas_id = kelas.id');
			$this->db->where('kelas.mata_kuliah_id = mata_kuliah.id');
			$this->db->where('kelas_mahasiswa.semester = mahasiswa.semester');
			$this->db->where("(binary kelas_mahasiswa.status_ambil = 'A' OR binary kelas_mahasiswa.status_ambil = 'b' OR binary kelas_mahasiswa.status_ambil = 'T' OR binary kelas_mahasiswa.status_ambil = 'd' OR binary kelas_mahasiswa.status_ambil = 'z' OR binary kelas_mahasiswa.status_ambil = 'x')");
			return $this->db->get()->result();
		}
		
		public function getjadwalallstudent()
		{
			//jadwal all student untuk menghitung jumlah sks di view konfirmasiBatalTambah
			$this->db->select('kelas.mata_kuliah_id as mata_kuliah_id, mata_kuliah.nama as nama_mata_kuliah, mata_kuliah.semester as semester, mata_kuliah.jumlah_sks as sks, mahasiswa.nrp as nrp');
			$this->db->from('kelas_mahasiswa, kelas, mata_kuliah, mahasiswa');
			$this->db->where('kelas_mahasiswa.mahasiswa_nrp = mahasiswa.nrp');
			$this->db->where('kelas_mahasiswa.kelas_id = kelas.id');
			$this->db->where('kelas.mata_kuliah_id = mata_kuliah.id');
			$this->db->where('kelas_mahasiswa.semester = mahasiswa.semester');
			$this->db->where("(binary kelas_mahasiswa.status_ambil = 'A' OR binary kelas_mahasiswa.status_ambil = 'b' OR binary kelas_mahasiswa.status_ambil = 'T' OR binary kelas_mahasiswa.status_ambil = 'd' OR binary kelas_mahasiswa.status_ambil = 'z' OR binary kelas_mahasiswa.status_ambil = 'x')");
			return $this->db->get()->result();
		}
		
		public function updatekelas_mahasiswa($nrp,$kelas_id,$data)
		{
			$this->db->where('mahasiswa_nrp',$nrp);
			$this->db->where('kelas_id',$kelas_id);
			$this->db->update('kelas_mahasiswa',array('status_ambil' => $data));
			//return $this->db->get()->result();
		}
		
		public function getipsmhs($id)
		{
			//dapatkan seluruh ips mahasiswa, pengecekan semester dilakukan di controller
			$this->db->select('mahasiswa_nrp , semester , ips');
			$this->db->from('nilai_semester');
			//$this->db->where($id, 'dosen.nip');
			$this->db->where('mahasiswa_nrp',$id);
			return $this->db->get()->result();

		}
		
		public function triggerkonfirmasi()
		{
			//tambah approved
			$data = array(status_ambil => 'A');
			$this->db->where($this->db->where("(binary status_ambil = 'T')"));
			$this->db->update('kelas_mahasiswa',$data);
			//batal declined
			$data = array(status_ambil => 'A');
			$this->db->where($this->db->where("(binary status_ambil = 'x')"));
			$this->db->update('kelas_mahasiswa',$data);
			//drop declined
			$data = array(status_ambil => 'A');
			$this->db->where($this->db->where("(binary status_ambil = 'z')"));
			$this->db->update('kelas_mahasiswa',$data);
		}



		
		
		
	}



?>