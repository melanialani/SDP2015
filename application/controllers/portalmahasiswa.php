<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portalmahasiswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('table');
		$this->load->database();
		$this->load->model('mahasiswa_model');
		$this->load->model('kota_model');
		$this->load->model('provinsi_model');
		
	}
	
	public function index()
	{
		redirect('portalmahasiswa/home');
	}
	
	public function home()
	{
		$nrp = "";
		$nomor_registrasi = "";
		$data = "";
		$kategori = 0;
		$login = false;
		$mahasiswa = false;
		
		if ($this->session->userdata('email'))
		{
			$data = $this->mahasiswa_model->getDataCalonMahasiswaByEmail($this->session->userdata('email'));
			if ($data[0]->informasi_kurikulum_id == "")
			{
				redirect("/pendaftaran", "refresh");
			}
			else
			{
				$nomor_registrasi = $data[0]->nomor_registrasi_id;
				$login = true;
				if ($data[0]->status == "0")
				{
					if($this->session->userdata('user_role') != 'mahasiswa'){
						redirect('/');
					}
				}
			}
		}
		if($this->session->userdata('user_role') == 'mahasiswa'){
            $data = $this->mahasiswa_model->getDataMahasiswaByNRP($this->session->userdata('username'));
			$nrp = $data[0]->nrp;
			$mahasiswa = true;
			$login = true;
        }
		else
		{
			redirect("/");
		}
		
		if ($login)
		{
			$param["semester"] = "";
			$param["pembayaran"] = "";
			$param["tagihan"] = "";
			$param["currentSemester"] = 1;
			$progress = 0;
			
			if ($data[0]->kategori == "0")
			{
				$this->load->view('portalmahasiswa_pending');
			}
			else
			{
				$param["sudah_notification"] = "Anda telah menyelesaikan :";
				$param["belum_notification"] = "Anda belum menyelesaikan :";
				$progress++;
				$param["sudah_notification"] .= "<br>" . $progress . ". Pendaftaran";
				
				$param["sks"] = "-";
				$tagihan = "";
				if ($nrp == "")
				{
					
				}
				else
				{
					$param['semester'] = $this->input->post('semesterKe');
					if($this->input->post('semester'))
					{
						$param['pembayaran'] = $this->mahasiswa_model->getAllPembayaran($nrp,$this->input->post('semesterKe'));
					}
					else
					{
						$param['pembayaran'] = $this->mahasiswa_model->getAllPembayaran($nrp,1);
					}
					
					$param['currentSemester'] = $data[0]->semester;
					$param['tagihan'] = $this->mahasiswa_model->getTagihan($nrp,$param['currentSemester']);
				}
				
				$param['nrp'] = $nrp;
				$param['nama'] = ucwords($data[0]->nama);
				$param['jurusan'] = $data[0]->jurusan;
				$param['kategori'] = $data[0]->kategori;
				$param['usp'] = "Rp " . number_format($data[0]->harga_usp, 2, ',', '.');
				if ($mahasiswa)
				{
					$param['sks'] = $data[0]->sks;
				}
				$param['persen'] = ($progress * 25) . "%";
				
				$paramHeader['countNewNotif'] = "";
				$this->load->view('includes/header', $paramHeader);
				$this->load->view('portalmahasiswa_home', $param);
			}
		}
		
	}
	
	public function profile()
	{
		$nrp = "";
		$nomor_registrasi = "";
		$data = "";
		$login = false;
		$mahasiswa = false;
		
		if ($this->session->userdata('email'))
		{
			$data = $this->mahasiswa_model->getFullDataCalonMahasiswaByEmail($this->session->userdata('email'));
			if ($data[0]->informasi_kurikulum_id == "")
			{
				redirect("/pendaftaran", "refresh");
			}
			else
			{
				$nomor_registrasi = $data[0]->nomor_registrasi_id;
				$login = true;
				if ($data[0]->status == "0")
				{
					if($this->session->userdata('user_role') != 'mahasiswa'){
						redirect('/');
					}
				}
			}
		}
		if($this->session->userdata('user_role') == 'mahasiswa'){
            $data = $this->mahasiswa_model->getFullDataMahasiswaByNRP($this->session->userdata('username'));
			$nrp = $data[0]->nrp;
			$mahasiswa = true;
			$login = true;
        }
		else
		{
			redirect("/");
		}
		
		if ($login)
		{
			$param["queryKota"] = $this->kota_model->selectKota();
			$param["queryProvinsi"] = $this->provinsi_model->selectProvinsi();
			
			if ($this->input->post() == true)
			{
				$data = "";
				
				$data['nrp'] = $nrp;
				$data['nomor_registrasi'] = $nomor_registrasi;
				
				$data['nama'] = $this->input->post('nama');
				$data['kewarganegaraan'] = $this->input->post('kewarganegaraan');
				$data['status_sosial'] = $this->input->post('status_sosial');
				$data['agama'] = $this->input->post('agama');
				$data['alamat'] = $this->input->post('alamat');
				
				$provinsi = $this->input->post('provinsi');
				$namaProvinsi = explode("-", $provinsi);
				$data['provinsi'] = "";
				if (count($namaProvinsi) > 1)
				{
					$data['provinsi'] = $namaProvinsi[1];
				}
				
				$data['kota'] = $this->input->post('kota');
				$data['kodepos'] = $this->input->post('kodepos');
				$data['nomor_hp'] = $this->input->post('nomor_hp');
				$data['email'] = $this->input->post('email');
				$data['nama_wali'] = $this->input->post('nama_wali');
				$data['alamat_wali'] = $this->input->post('alamat_wali');
				
				$provinsi_wali = $this->input->post('provinsi_wali');
				$namaProvinsi_wali = explode("-", $provinsi_wali);
				$data['provinsi_wali'] = "";
				if (count($namaProvinsi_wali) > 1)
				{
					$data['provinsi_wali'] = $namaProvinsi_wali[1];
				}
				
				$data['kota_wali'] = $this->input->post('kota_wali');
				$data['nomor_telp_wali'] = $this->input->post('nomor_telp_wali');
				$data['pekerjaan_wali'] = $this->input->post('pekerjaan_wali');
				
				if ($nrp == "")
				{
					$this->mahasiswa_model->updateCalonMahasiswa($data);
					$data = $this->mahasiswa_model->getFullDataCalonMahasiswaByEmail($this->session->userdata('email'));
				}
				else
				{
					$this->mahasiswa_model->updateMahasiswa($data);
					$data = $this->mahasiswa_model->getFullDataMahasiswaByNRP($nrp);
				}
			}
			
			$param['kategori'] = $data[0]->kategori;
			$param['nama'] = ucwords($data[0]->nama);
			$param['jurusan'] = $data[0]->jurusan;
			$param['jenis_kelamin'] = $data[0]->jenis_kelamin;
			if (strtolower($param['jenis_kelamin']) == 'p')
			{
				$param['jenis_kelamin'] = "Perempuan";
			}
			else
			{
				$param['jenis_kelamin'] = "Laki-laki";
			}
			
			$param['tempat_lahir'] = $data[0]->tempat_lahir;
			$param['tanggal_lahir'] = $data[0]->tanggal_lahir;
			$param['kewarganegaraan'] = $data[0]->kewarganegaraan;
			$param['status_sosial'] = $data[0]->status_sosial;
			$param['agama'] = $data[0]->agama;
			$param['alamat'] = $data[0]->alamat;
			$param['provinsi'] = $data[0]->provinsi;
			$provinsi_id = $this->provinsi_model->getProvinsiIdByNama($param['provinsi']);
			$param['provinsi_id'] = "";
			if (count($provinsi_id) > 0 )
			{
				$param['provinsi_id'] = $provinsi_id[0]->id;
			}
			$param['kota'] = $data[0]->kota;
			$param['kodepos'] = $data[0]->kodepos;
			$param['nomor_hp'] = $data[0]->nomor_hp;
			$param['email'] = $data[0]->email;
			
			$param['nama_wali'] = $data[0]->nama_wali;
			$param['alamat_wali'] = $data[0]->alamat_wali;
			$param['provinsi_wali'] = $data[0]->provinsi_wali;
			$provinsi_wali_id = $this->provinsi_model->getProvinsiIdByNama($param['provinsi_wali']);
			$param['provinsi_wali_id'] = "";
			if (count($provinsi_wali_id) > 0 )
			{
				$param['provinsi_wali_id'] = $provinsi_wali_id[0]->id;
			}
			$param['kota_wali'] = $data[0]->kota_wali;
			$param['nomor_telp_wali'] = $data[0]->nomor_telp_wali;
			$param['pekerjaan_wali'] = $data[0]->pekerjaan_wali;
			
			$paramHeader['countNewNotif'] = "";
			$this->load->view('includes/header', $paramHeader);
			$this->load->view('portalmahasiswa_profile', $param);
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata("email");
		$this->session->unset_userdata("user_role");
		$this->session->unset_userdata("username");
		delete_cookie("sdp_username");
		delete_cookie("sdp_user_role");
		redirect("/");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */