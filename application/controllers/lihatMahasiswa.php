<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LihatMahasiswa extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('table');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->model('dosen_modell');
		$this->load->model('ruangan_model');
		$this->load->model('mata_kuliah_model');
		$this->load->model('kelas_model');
		$this->load->model('kelas_mahasiswa_modell');
		$this->load->model('mahasiswa_modell');
		$this->load->library('m_pdf');
		$this->load->library('session');
		$this->load->helper('cookie');
		//$this->load->model('modelfb');
		
	}
	
	public function daftarMahasiswa()
	{
		//cek dlu kajur atau bukan klo iya dia bisa ke halaman ini
		//atau bisa juga diatur dr login dlu, klo memang kajur tab menuju ke halamn ini di visible true
		//jadi mau yang mana?
		
		//di function ini telah dianggapp bahwa memang kajur
		$data=[];
		$data["nip"]="";
		$data["dataKajur"]="";
		$data["jurusanKajur"]="";
		$data["namaKajur"]="";
		$data["id_mata_kuliah"]="";
				
		$data["jurusanId"]="";
		$data["jurusanKajur"]="";
		
		//dapatin namaKajur dosen yang sedang login //skearang diisi manual dulu
		$data["nip"]=$this->session->userdata('username');
		//dapatin kajur jurusan apa
		$data["dataKajur"]=$this->dosen_modell->getDataKajur($data["nip"]);
		foreach($data["dataKajur"] as $row)
		{
			$data["namaKajur"]=$row->nama;
			$data["jurusanId"]=$row->kepala_jurusan_id;
			
		}
		
		$data["jurusanKajur"]=$this->dosen_modell->getJurusan($data["jurusanId"]);
		
		
		$tempmajor = $this->kelas_model->getMajor($this->session->userdata('username'));

		$major = substr($tempmajor['kepala_jurusan_id'], 0, 5);

		if($major == 'S1INF'){
			$data['major'] = "S1 - Teknik Informatika";
		}
		else if($major == 'S1SIB'){
			$data['major'] = "S1 - Sistem Informasi Bisnis";
		}
		else if($major == 'S1DKV'){
			$data['major'] = "S1- Desain Komunikasi Visual";
		}
		else{
			$data['major'] = $major;
		}

		$data['semester'] = $this->kelas_model->getSemester();
		
		$data["arrAngkatan"]=$this->kelas_model->getComboBoxAngkatan($major);
		$data["selectedAngkatan"]=substr($data['semester']['value'],6,9);
		$data["table"]=$this->mahasiswa_modell->getStudentBasedJurusan2($data["jurusanId"],$data["selectedAngkatan"]);	
		
		if($this->input->post('btnChoose'))
		{
			$data["selectedAngkatan"]=$this->input->post('ddAngkatan');
			$data["table"]=$this->mahasiswa_modell->getStudentBasedJurusan2($data["jurusanId"],$data["selectedAngkatan"]);
		}
		
		$data['title'] = "Sistem Informasi STTS";
		$this->load->view('includes/header', $data);
		$this->load->view('daftarMahasiswa', $data);
		$this->load->view('includes/footer');
		
	}
	
	public function jadwalMahasiswa()
	{
		$data=[];
		$data["nip"]="";
		$data["dataKajur"]="";
		$data["jurusanId"]="";
		$data["jurusanKajur"]="";
		$data["namaKajur"]="";
		
		$data["siapa2"]=$this->input->post('txtSiapa');
		//dapatin namaKajur dosen yang sedang login //skearang diisi manual dulu
		$data["nip"]=$this->session->userdata('username');
		//dapatin kajur jurusan apa
		$data["dataKajur"]=$this->dosen_modell->getDataKajur($data["nip"]);
		foreach($data["dataKajur"] as $row)
		{
			$data["namaKajur"]=$row->nama;
			$data["jurusanId"]=$row->kepala_jurusan_id;
			
		}
		
		$data["jurusanKajur"]=$this->dosen_modell->getJurusan($data["jurusanId"]);
		
		$tempmajor = $this->kelas_model->getMajor($this->session->userdata('username'));

		$major = substr($tempmajor['kepala_jurusan_id'], 0, 5);

		if($major == 'S1INF'){
			$data['major'] = "S1 - Teknik Informatika";
		}
		else if($major == 'S1SIB'){
			$data['major'] = "S1 - Sistem Informasi Bisnis";
		}
		else if($major == 'S1DKV'){
			$data['major'] = "S1- Desain Komunikasi Visual";
		}
		else{
			$data['major'] = $major;
		}

		$data['semester'] = $this->kelas_model->getSemester();
		
		$data['table'] = $this->mahasiswa_modell->getDetailStudent($data["siapa2"]);
		$data['listSemester'] = $this->kelas_model->getListSemester($data["siapa2"]);
		
		
		foreach($data['listSemester'] as $row)
		{
			//if($this->kelas_model->getKelasBasedNRP($data["siapa2"],$row->semester)->num_rows()>0)
			//{
			$data['table'.$row->semester] = $this->kelas_model->getKelasBasedNRP($data["siapa2"],$row->semester);
			
			
		}
		
		
		

		
		if($this->input->post('btnPrint'))
		{
			$data["title"]="Printout Jadwal Mahasiswa";
			$data["siapa2"]=$this->input->post('txtSiapa2');
			
			$data['table'] = $this->mahasiswa_modell->getDetailStudent($data["siapa2"]);
			$data['listSemester'] = $this->kelas_model->getListSemester($data["siapa2"]);
			
			
			foreach($data['listSemester'] as $row)
			{
				$data['table'.$row->semester] = $this->kelas_model->getKelasBasedNRP($data["siapa2"],$row->semester);
			}
		
			$html= $this->load->view('reportJadwalMahasiswa',$data,true);
			$header =$this->load->view('report/includes/headerReport', $data, TRUE);
			
			//actually, you can pass mPDF parameter on this load() function
			$pdf = $this->m_pdf->load();
			//generate the PDF!
			$pdf->WriteHTML($header.$html);
			$pdf_filename="Laporan Jadwal Mahasiswa.pdf";
			
			$pdf->Output($pdf_filename, "I");
		}
		
		$data['title'] = "Sistem Informasi STTS";
		$this->load->view('includes/header', $data);
		$this->load->view('jadwalMahasiswa', $data);
		$this->load->view('includes/footer');
	}
	
}

//Angeline /213116181
//9-11-2015
//Versi 1