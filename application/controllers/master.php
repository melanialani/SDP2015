<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->model('dosen_modell');
		$this->load->model('ruangan_model');
		$this->load->model('mata_kuliah_model');
		$this->load->model('kelas_model');
		$this->load->library('m_pdf');
		$this->load->library('session');
		$this->load->helper('cookie');
	}
	
	public function masterJadwalKelas()
	{
		$data['daftarRuangan']='';
		$data['selectedData']='';
		$data['selectedRuangan']='';
		$data['selectedHari']='';
		$data['selectedJam']='';
		$data['idSiapa']='';
		$data["jurusanId"]="";
		$data["jurusanKajur"]="";
		//$data["choosenSemesterYear"]="";
		
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
		//print_r ($data['semester']);
		
		$data["arrSemesterYear"]=$this->kelas_model->getComboBoxAllYear();
			
		$data["selectedSemesterYear"]=$data['semester']['value'];
		$data["choosenSemesterYear"]=$data['semester']['value'];
		
		$data['listSemester'] = $this->kelas_model->getListSemester2($data['jurusanId'],$data['semester']['value']);
		foreach($data['listSemester'] as $row)
		{
			$data['table'.$row->semester] = $this->kelas_model->getKelas($data['jurusanId'],$data['semester']['value'],$row->semester);	
		}
		
		if($this->input->post('btnChoose'))
		{
			$data["selectedSemesterYear"]=$this->input->post('ddSemesterYear');
			$data["choosenSemesterYear"]=$this->input->post('ddSemesterYear');
			$data['listSemester'] = $this->kelas_model->getListSemester2($data['jurusanId'],$data["selectedSemesterYear"]);
			foreach($data['listSemester'] as $row)
			{
				$data['table'.$row->semester] = $this->kelas_model->getKelas($data['jurusanId'],$data["selectedSemesterYear"],$row->semester);	
			}			
		}
		
		if($this->input->post('btnEdit'))
		{
			
			$data['idSiapa'] =$this->input->post('txtSiapa');
			
			$data['selectedData']=$this->kelas_model->getSelectedKelas($data['idSiapa']);
			foreach($data['selectedData'] as $row)
			{
				$data['selectedRuangan']=$row->ruangan_id;
				$data['selectedHari']=$row->hari;
				$data['selectedJam']=$row->jam_mulai;
			}
			
			$data["selectedSemesterYear"]=$this->input->post('txtChoosenSemesterYear');
			$data["choosenSemesterYear"]=$this->input->post('txtChoosenSemesterYear');
			$data['listSemester'] = $this->kelas_model->getListSemester2($data['jurusanId'],$data["selectedSemesterYear"]);
			foreach($data['listSemester'] as $row)
			{
				$data['table'.$row->semester] = $this->kelas_model->getKelas($data['jurusanId'],$data["selectedSemesterYear"],$row->semester);	
			}
		}
		
		if($this->input->post('btnCancel'))
		{	
			$data["selectedSemesterYear"]=$this->input->post('txtChoosenSemesterYear');
			$data["choosenSemesterYear"]=$this->input->post('txtChoosenSemesterYear');
			$data['listSemester'] = $this->kelas_model->getListSemester2($data['jurusanId'],$data["selectedSemesterYear"]);
			foreach($data['listSemester'] as $row)
			{
				$data['table'.$row->semester] = $this->kelas_model->getKelas($data['jurusanId'],$data["selectedSemesterYear"],$row->semester);	
			}
			$data['idSiapa'] ='';
		}

		
		if($this->input->post('btnSave'))
		{	
			$data['idSiapa'] =$this->input->post('txtSiapa');
			$data['selectedRuangan']=$this->input->post('ddRuangan');
			$data['selectedHari']=$this->input->post('ddHari');
			$data['selectedJam']=$this->input->post('txtJam');
			
			//ngecek tabrakan jadwalnya dengan kelas yang lain atau tidak
			$data["selectedSemesterYear"]=$this->input->post('txtChoosenSemesterYear');
			$data["choosenSemesterYear"]=$this->input->post('txtChoosenSemesterYear');
			$hasilCek= $this->kelas_model->checkClassSchedule($data['idSiapa'],$data['selectedRuangan'],$data['selectedHari'],$data['selectedJam'],$data["selectedSemesterYear"]);
			
			if($hasilCek == true)
			{
				echo "<script>alert('Update gagal karena jadwal bertabrakan dengan kelas yang lain!');</script>";
			}
			else
			{
			
				$this->kelas_model->updateKelas($data['idSiapa'],$data['selectedRuangan'],$data['selectedHari'],$data['selectedJam']);
				//redirect('/master/masterJadwalKelas','refresh');
				$data['idSiapa'] ='';
			}

			$data['listSemester'] = $this->kelas_model->getListSemester2($data['jurusanId'],$data["selectedSemesterYear"]);
			foreach($data['listSemester'] as $row)
			{
				$data['table'.$row->semester] = $this->kelas_model->getKelas($data['jurusanId'],$data["selectedSemesterYear"],$row->semester);	
			}
			
		}
		
		if($this->input->post('btnPrint'))
		{
			$data["title"]="Laporan Jadwal Ruang Kelas";
			
			$data["selectedSemesterYear"]=$this->input->post('txtChoosenSemesterYear');
			$data['listSemester'] = $this->kelas_model->getListSemester2($data['jurusanId'],$data["selectedSemesterYear"]);
			foreach($data['listSemester'] as $row)
			{
				$data['table'.$row->semester] = $this->kelas_model->getKelas($data['jurusanId'],$data["selectedSemesterYear"],$row->semester);	
			}
			
			$html= $this->load->view('reportJadwalKelas',$data,true);
			$header =$this->load->view('report/includes/headerReport', $data, TRUE);
			
			
			//actually, you can pass mPDF parameter on this load() function
			$pdf = $this->m_pdf->load();
			//generate the PDF!
			$pdf->WriteHTML($header.$html);
			$pdf_filename="Laporan Jadwal Ruang Kelas.pdf";
			
			$pdf->Output($pdf_filename, "I");
		}
		
		$data['daftarRuangan']=$this->ruangan_model->dropdownDaftarRuangan();
		
		$data['title'] = "Sistem Informasi STTS";
		$this->load->view('includes/header', $data);
		$this->load->view('masterJadwalKelas', $data);
		$this->load->view('includes/footer');
		
	}
	
	public function masterRuangan()
	{
		$data=[];
		$data["namaRuangan"]='';
		$data["kapasitas"]='';
		$data['idSiapa']='';
		$data['selectedData']="";
		$data['selectedNama']="";
		$data['selectedKapasitas']="";
		
		
		if($this->input->post('btnInsert'))
		{
			$data["namaRuangan"]=$this->input->post('txtNamaRuangan');
			$data["kapasitas"]=$this->input->post('txtKapasitas');
		
			$this->ruangan_model->insertRuangan($data["namaRuangan"],$data["kapasitas"]);
		}
		
		if($this->input->post('btnDelete'))
		{
			$data['idSiapa']=$this->input->post('txtSiapa');
			/*if($_GET['temp'] == true)
			{
				$this->ruangan_model->deleteRuangan($data["idSiapa"]);
				echo "<script>alert('Ruangan berhasil diDelete!');</script>";
			}*/
		}
		//echo $data["table"];
		
		if($this->input->post('btnEdit'))
		{
			$data['idSiapa'] =$this->input->post('txtSiapa');
			echo $data['idSiapa'];
			
			$data['selectedData']=$this->ruangan_model->getSelectedRuangan($data['idSiapa']);
			foreach($data['selectedData'] as $row)
			{
				$data['selectedNama']=$row->nama;
				$data['selectedKapasitas']=$row->kapasitas;
			}			
		}
		
		if($this->input->post('btnCancel'))
		{	
			$data['idSiapa'] ='';
			echo $data['idSiapa'];

		}
		
		if($this->input->post('btnSave'))
		{	
			$data['idSiapa'] =$this->input->post('txtSiapa');
			$data['selectedNama']=$this->input->post('txtNama');
			$data['selectedKapasitas']=$this->input->post('txtKapasitas');
			echo $data['idSiapa'];
			$this->ruangan_model->updateRuangan($data['idSiapa'],$data['selectedNama'],$data['selectedKapasitas']);
			echo "<script>alert('Ruangan berhasil diubah!');</script>";
			
			redirect('/master/masterRuangan','refresh');
		}
		
		$data["table"]= $this->ruangan_model->selectRuangan();
		$this->load->view('masterRuangan',$data);
	}
	
	
	
	public function masterMataKuliah()
	{
	}
	

}

//Angeline /213116181
//9-11-2015
//Versi 1