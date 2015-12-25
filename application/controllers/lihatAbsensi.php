<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LihatAbsensi extends CI_Controller {
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
		$this->load->library('m_pdf');
		$this->load->library('session');
		$this->load->helper('cookie');
		//$this->load->model('modelfb');
		
	}
	
	public function daftarKelas()
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
		$data["choosenSemesterYear"]="";
				
		$data["jurusanId"]="";
		$data["jurusanKajur"]="";
		
		//dapatin namaKajur dosen yang sedang login //skearang diisi manual dulu
		$data["nip"]=$this->session->userdata('username');
		//dapatin kajur jurusan apa
		$data["dataKajur"]=$this->dosen_modell->getDataKajur($data["nip"]);
		
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
		
		$data["arrSemesterYear"]=$this->kelas_model->getComboBoxAllYear();
		$data["selectedSemesterYear"]=$data['semester']['value'];
		$data["choosenSemesterYear"]=$data['semester']['value'];
		$data["selectedSemester"]="All";
		
		$data["table"]=$this->kelas_model->getKelas2($data['jurusanId'],$data["selectedSemesterYear"],$data["selectedSemester"]);
		
		if($this->input->post('btnChoose'))
		{
			$data["selectedSemesterYear"]=$this->input->post('ddSemesterYear');
			$data["choosenSemesterYear"]=$this->input->post('ddSemesterYear');
			$data["selectedSemester"]=$this->input->post('ddSemester');
			
			$data["table"]=$this->kelas_model->getKelas2($data['jurusanId'],$data["selectedSemesterYear"],$data["selectedSemester"]);
		
		}
		
		foreach($data["dataKajur"] as $row)
		{
			$data["namaKajur"]=$row->nama;
			$data["jurusanId"]=$row->kepala_jurusan_id;
			
		}
		
		$data["jurusanKajur"]=$this->dosen_modell->getJurusan($data["jurusanId"]);
		
			
		
		
		
		
		$data['title'] = "Sistem Informasi STTS";
		$this->load->view('includes/header', $data);
		$this->load->view('daftarKelas', $data);
		$this->load->view('includes/footer');
		
	}
	
	public function daftarAbsensi()
	{
		$data=[];
		$data["nip"]="";
		$data["dataKajur"]="";
		$data["jurusanKajur"]="";
		$data["namaKajur"]="";
		$data["id_mata_kuliah"]="";
		$data["jml_mhs"]=0;
		$data["siapa2"]=$this->input->post('txtSiapa');
		
		$data["choosenSemesterYear"]=$this->input->post('txtChoosenSemesterYear');
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
		
		
		$data['table'] = $this->kelas_model->getKelasFromId($data["siapa2"]);
		$cek =$this->kelas_model->checkGabungClass($data["siapa2"]);
		if($cek->num_rows() >0)
		{
			foreach($cek->result() as $row)
			{
				$data['jml_mhs'] += $this->kelas_mahasiswa_modell->countMahasiswa($row->id);
			}
			
			$data['jml_mhs'] += $this->kelas_mahasiswa_modell->countMahasiswa($data["siapa2"]);
			
			
			//$data['table2']= $this->kelas_mahasiswa_modell->getMahasiswa($row->id);
			$data['table2']= $this->kelas_mahasiswa_modell->getMahasiswa2($data["siapa2"]);
		}
		else
		{
			$data['jml_mhs'] = $this->kelas_mahasiswa_modell->countMahasiswa($data["siapa2"]);
			$data['table2']= $this->kelas_mahasiswa_modell->getMahasiswa($data["siapa2"]);
		}
		
		if($this->input->post('btnPrint'))
		{
			echo "<script>alert('MASUK!');</script>";
			$data["title"]="ABSENSI PERKULIAHAN";
			
			$data["siapa2"]=$this->input->post('txtSiapa2');
			//$data["choosenSemesterYear"]=$this->input->post('txtChoosenSemesterYear');
			
			$data['table'] = $this->kelas_model->getKelasFromId($data["siapa2"]);
			$cek =$this->kelas_model->checkGabungClass($data["siapa2"]);
			if($cek->num_rows() >0)
			{
				foreach($cek->result() as $row)
				{
					$data['jml_mhs'] += $this->kelas_mahasiswa_modell->countMahasiswa($row->id);
				}
				
				$data['jml_mhs'] += $this->kelas_mahasiswa_modell->countMahasiswa($data["siapa2"]);
				
				
				//$data['table2']= $this->kelas_mahasiswa_modell->getMahasiswa($row->id);
				$data['table2']= $this->kelas_mahasiswa_modell->getMahasiswa2($data["siapa2"]);
			}
			else
			{
				echo "tdk ada";
				$data['jml_mhs'] = $this->kelas_mahasiswa_modell->countMahasiswa($data["siapa2"]);
				$data['table2']= $this->kelas_mahasiswa_modell->getMahasiswa($data["siapa2"]);
			}
			$html= $this->load->view('reportDaftarAbsensi',$data,true);
			$header =$this->load->view('report/includes/headerReport', $data, TRUE);
			
			//actually, you can pass mPDF parameter on this load() function
			$pdf = $this->m_pdf->load();
			//generate the PDF!
			$pdf->WriteHTML($header.$html);
			$pdf_filename="Daftar Absensi.pdf";
			
			$pdf->Output($pdf_filename, "I");
		}

		$data['title'] = "Sistem Informasi STTS";
		$this->load->view('includes/header', $data);
		$this->load->view('daftarAbsensi', $data);
		$this->load->view('includes/footer');
	}
	
}

//Angeline /213116181
//9-11-2015
//Versi 1