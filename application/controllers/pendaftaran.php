<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('kota_model');
		$this->load->model('provinsi_model');
		$this->load->model('calon_mahasiswa_model');
		$this->load->model('notifikasi_model');
		$this->load->model('informasi_kurikulum_model');
		$this->load->library("form_validation");
		$this->load->library('upload');  
		$this->load->library('image_lib');
		$this->load->library('session');
    }

    public function index()
    {
		$id = "";
		$login = false;
		if ($this->session->userdata('email'))
		{
			$data = $this->calon_mahasiswa_model->getDataCalonMahasiswaByEmail($this->session->userdata('email'));
			if ($data[0]->informasi_kurikulum_id != "")
			{
				redirect("/portalmahasiswa/home", "refresh");
			}
			else
			{
				$id = $data[0]->nomor_registrasi_id;
				$login = true;
			}
		}
		else
		{
			redirect("/registration", "refresh");
		}
		
		if ($login)
		{
			$data["cetak"] = "";
			$data["title"] = "";
			
			$data["queryKota"] = $this->kota_model->selectKota();
			$data["queryProvinsi"] = $this->provinsi_model->selectProvinsi();
			$data["queryKotaSekolah"] = $this->kota_model->selectKota();
			$data["queryProvinsiSekolah"] = $this->provinsi_model->selectProvinsi();
			$data["queryKotaWali"] = $this->kota_model->selectKota();
			$data["queryProvinsiWali"] = $this->provinsi_model->selectProvinsi();
			$data["queryJurusan"] = $this->informasi_kurikulum_model->selectInformasiKurikulum();
			
			if($this->input->post("daftar") == true)
			{
				$data["namaLengkap"] = $this->input->post("namaLengkap", true);
				$data["jk"] = $this->input->post("jk", true);
				$data["tempatLahir"] = $this->input->post("tempatLahir", true);
				
				$tanggalLahir = $this->input->post("tanggalLahir", true);
				$data["tanggalLahir"] = Datetime::createFromFormat('d-m-Y', $tanggalLahir)->format('Y-m-d');
				$data["kewarganegaraan"] = $this->input->post("kewarganegaraan", true);
				$data["status_sosial"] = $this->input->post("statusSosial", true);
				$data["agama"] = $this->input->post("agama", true);
				$data["alamat"] = $this->input->post("alamat", true);
				$provinsi = explode("-", $this->input->post("provinsi", true));
				$data["provinsi"] = $provinsi[1];
				$data["kota"] = $this->input->post("kota", true);
				$data["kodePos"] = $this->input->post("kodePos", true);
				$data["noHp"] = $this->input->post("noHp", true);
				$data["foto"] = $id . "-Foto";
				$data["rapor"] = $id . "-Rapor";
				$data["nilaiMat"] = $this->input->post("nilaiMat", true);
				$data["nilaiIng"] = $this->input->post("nilaiIng", true);
				$data["akteKelahiran"] = $id . "-akteKelahiran";
				$data["kartuKeluarga"] = $id . "-kartuKeluarga";
				$data["jurusan"] = $this->input->post("jurusan", true);
				
				$data["namaSekolah"] = $this->input->post("namaSekolah", true);
				$data["alamatSekolah"] = $this->input->post("alamatSekolah", true);
				$provinsiSekolah = explode("-", $this->input->post("provinsiSekolah", true));
				$data["provinsiSekolah"] = $provinsiSekolah[1];
				
				$data["kotaSekolah"] = $this->input->post("kotaSekolah", true);
				$data["kodePosSekolah"] = $this->input->post("kodePosSekolah", true);
				$data["noTelpSekolah"] = $this->input->post("noTelpSekolah", true);
				
				$data["relasi"] = $this->input->post("relasi", true);
				$data["namaWali"] = $this->input->post("namaWali", true);
				$data["alamatWali"] = $this->input->post("alamatWali", true);
				$provinsiWali = explode("-", $this->input->post("provinsiWali", true));
				$data["provinsiWali"] = $provinsiWali[1];
				$data["kotaWali"] = $this->input->post("kotaWali", true);
				$data["kodePosWali"] = $this->input->post("kodePosWali", true);
				$data["noHpWali"] = $this->input->post("noHpWali", true);
				$data["pekerjaanWali"] = $this->input->post("pekerjaanWali", true);
				
				if(($this->calon_mahasiswa_model->updateCalonMahasiswa(
					$data["namaLengkap"], 
					$data["alamat"], 
					$data["provinsi"], 
					$data["kota"], 
					$data["kodePos"], 
					$data["noHp"], 
					$data["tempatLahir"], 
					$data["tanggalLahir"], 
					$data["jk"], 
					$data["kewarganegaraan"],
					$data["status_sosial"],
					$data["agama"], 
					$data["jurusan"], 
					$data["namaSekolah"], 
					$data["alamatSekolah"], 
					$data["provinsiSekolah"], 
					$data["kotaSekolah"], 
					$data["kodePosSekolah"], 
					$data["noTelpSekolah"], 
					$data["relasi"], $data["namaWali"], $data["alamatWali"], $data["provinsiWali"], $data["kotaWali"], $data["kodePosWali"], $data["noHpWali"], $data["pekerjaanWali"], $data["nilaiMat"], $data["nilaiIng"], $data["rapor"], $data["akteKelahiran"], $data["kartuKeluarga"], $data["foto"], $id)) > 0)
				{
					if(($this->notifikasi_model->insertNotifikasi("Belum Dikategorikan","")) > 0)
					{
						$config = array(
							'upload_path' => "./uploads/",
							'allowed_types' => "jpg|JPG|JPEG|jpeg",
							'file_name' => $id . "-Foto",
							'overwrite' => true
						);
						
						$this->upload->initialize($config);
						
						if (!$this->upload->do_upload('foto'))
						{
								$error = array('error' => $this->upload->display_errors());
								print_r($error);
						}
						else
						{
								$config = array(
									'upload_path' => "./uploads/",
									'allowed_types' => "jpg|JPG|JPEG|jpeg",
									'file_name' => $id . "-Rapor",
									'overwrite' => true
								);
								
								$this->upload->initialize($config);
								
								if (!$this->upload->do_upload('rapor'))
								{
										$error = array('error' => $this->upload->display_errors());
										print_r($error);
								}
								else
								{
										$config = array(
											'upload_path' => "./uploads/",
											'allowed_types' => "jpg|JPG|JPEG|jpeg",
											'file_name' => $id . "-kartuKeluarga",
											'overwrite' => true
										);
										
										$this->upload->initialize($config);
										
										if (!$this->upload->do_upload('kartuKeluarga'))
										{
												$error = array('error' => $this->upload->display_errors());
												print_r($error);
										}
										else
										{
												$config = array(
													'upload_path' => "./uploads/",
													'allowed_types' => "jpg|JPG|JPEG|jpeg",
													'file_name' => $id . "-akteKelahiran",
													'overwrite' => true
												);
												
												$this->upload->initialize($config);
												
												if (!$this->upload->do_upload('akteKelahiran'))
												{
														$error = array('error' => $this->upload->display_errors());
														print_r($error);
												}
												else
												{
														 $path = $_FILES['foto']['name'];
														 $ext = pathinfo($path, PATHINFO_EXTENSION);
														 $config['image_library']   = 'gd2';
														 $config['source_image']    = './uploads/'. $id . "-Foto." . $ext;
														 $config['create_thumb']    = FALSE;
														 $config['maintain_ratio']  = TRUE;
														 $config['width']           = 575;
														 $config['height']          = 475;
														 $this->image_lib->initialize($config);
														 $this->image_lib->resize();
														 $this->image_lib->clear();

														 $path1 = $_FILES['rapor']['name'];
														 $ext1 = pathinfo($path, PATHINFO_EXTENSION);
														 $config['image_library']   = 'gd2';
														 $config['source_image']    = './uploads/'. $id . "-Rapor." . $ext1;
														 $config['create_thumb']    = FALSE;
														 $config['maintain_ratio']  = TRUE;
														 $config['width']           = 575;
														 $config['height']          = 475;
														 $this->image_lib->initialize($config);
														 $this->image_lib->resize();
														 $this->image_lib->clear();
														 
														 $path2 = $_FILES['kartuKeluarga']['name'];
														 $ext2 = pathinfo($path, PATHINFO_EXTENSION);
														 $config['image_library']   = 'gd2';
														 $config['source_image']    = './uploads/'. $id . "-kartuKeluarga." . $ext2;
														 $config['create_thumb']    = FALSE;
														 $config['maintain_ratio']  = TRUE;
														 $config['width']           = 575;
														 $config['height']          = 475;
														 $this->image_lib->initialize($config);
														 $this->image_lib->resize();
														 $this->image_lib->clear();
														 
														 $path2 = $_FILES['akteKelahiran']['name'];
														 $ext2 = pathinfo($path, PATHINFO_EXTENSION);
														 $config['image_library']   = 'gd2';
														 $config['source_image']    = './uploads/'. $id . "-akteKelahiran." . $ext;
														 $config['create_thumb']    = FALSE;
														 $config['maintain_ratio']  = TRUE;
														 $config['width']           = 575;
														 $config['height']          = 475;
														 $this->image_lib->initialize($config);
														 $this->image_lib->resize();
														 $this->image_lib->clear();
													
														$data["cetak"] = "BERHASIL";
												}
										}
								}
						}
					}
				}
				else
				{
					$data["cetak"] = "GAGAL";
				}
				
				if ($data["cetak"] == "BERHASIL")
				{
					redirect("/portalmahasiswa/home", "refresh");
				}
				else
				{
					$this->load->view('pendaftaran', $data);
				}
			}
			else
			{
				$this->load->view('pendaftaran', $data);
			}
		}
    }
}