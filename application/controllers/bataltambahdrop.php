<?php
	/*
		Versi : 1.0
		Nama file : bataltambahdrop.php
		Nama program : controller batal tambah drop
		Kelompok : Perwalian
		Nama Penulis: Ricky Said
		NRP : 213116261
		input : 
		output :
		tujuan :
		Tanggal Pembuatan : 7 November 2015
		
		
		Penjelasan Program:
		Controller untuk batal, tambah, drop dan konfirmasi batal, tambah, drop
		Batal, tambah, drop

	
	
	*/
	class bataltambahdrop extends CI_Controller{
		function __construct(){
			//redirect bila role tidak sesuai
			parent::__construct();
			if($this->session->userdata('user_role') != 'dosen' && $this->session->userdata('user_role') != 'kajur' ){
				redirect('/');
			}
		}
		
		public function konfirmasiBatalTambah()
		{
			//load helper form untuk button, textbox, dll
			$this->load->helper('form');
			
			//load helper html & url untuk external file spt bootstrap, custom css, jquery di view
			$this->load->helper('html');
			$this->load->helper('url');
			
			//load model
			$this->load->model('modeldata');
			
			//session belum ada, untuk sementara nip dosen di fix
			$id = $this->session->userdata('username');
			//list seluruh student yang perah mengambil mata kuliah
			$liststudent['students'] = $this->modeldata->getlistbataltambah($id);
			
			//jumlah sks
			$liststudent['jadwalstudents'] = $this->modeldata->getjadwalallstudent();
			
			//list seluruh student yang sedang dalam proses batal tambah oleh dosen yang bersangkutan
			$liststudent['listallstudents'] = $this->modeldata->getlistbataltambahmahasiswa($id);
			$liststudent['listhistories'] = $this->modeldata->getlisthistory($id);
			
			$data['title'] = "Konfirmasi Batal Tambah Drop";
			$this->load->view('includes/header',$data);
			//$this->load->view('nav/navbar');
			$this->load->view('konfirmasiBatalTambah',$liststudent);
			$this->load->view('includes/footer');
		}
		
		public function konfirmasiBatalTambahMahasiswa($nrp)
		{
			//load helper form untuk button, textbox, dll
			$this->load->helper('form');
			$this->load->library('session');
			//load helper html & url untuk external file spt bootstrap, custom css, jquery di view
			$this->load->helper('html');
			$this->load->helper('url');
			
			//load model
			$this->load->model('modeldata');
			$this->load->model('notifikasi_model');
			
			//session dosen yang sedang login
			$id = $this->session->userdata('username');
			
			//list seluruh kelas yang di drop / tambah / batal oleh mahasiswa yang bersangkutan
			$liststudent['students'] = $this->modeldata->getlistbataltambahmhs($id);
			
			//list datastudent yang dipilih
			$liststudent['datastudents'] = $this->modeldata->getdatamahasiswa($nrp);
			
			//list jadwal student yang dipilih
			$liststudent['jadwalstudents'] = $this->modeldata->getjadwal($nrp);
			
			//passing nrp student
			$liststudent['nrp'] = $nrp;
			
			//ips student
			$liststudent['ipsall'] = $this->modeldata->getipsmhs($nrp);
			
			//load view
			if($this->input->post("konfirmasi"))
			{
				//bila button konfirmasi ditekan
				$this->session->set_userdata('nrp' , $nrp);
				$students = $liststudent['students'];
				foreach($students as $student)
				{
					if($student->status_ambil == 't')
					{
						$this->modeldata->updatekelas_mahasiswa($nrp,$student->kelas_id,'T');
						
						$this->notifikasi_model->sendNotification('BAA','BAU', $nrp);
					}
					else if($student->status_ambil == 'b')
					{
						$this->modeldata->updatekelas_mahasiswa($nrp,$student->kelas_id,'B');
						$this->notifikasi_model->sendNotification('BAA','BAU', $nrp);
						
					}
					else if($student->status_ambil == 'd')
					{
						$this->modeldata->updatekelas_mahasiswa($nrp,$student->kelas_id,'D');
						//$this->notifikasi_model->sendNotificationBAU('BAA','BAU', 'drop ' . $student->kelas_id);
					}
				}
				
				$this->notifikasi_model->sendNotification($this->session->userdata('username'),$nrp, 'batal tambah anda telah berhasil');
				redirect('/bataltambahdrop/konfirmasiBatalTambahMahasiswa/'.$nrp, 'refresh');				
				
			}
			else if($this->input->post("tolak"))
			{
				//bila button tolak ditekan
				$this->session->set_userdata('nrp' , $nrp);
				$students = $liststudent['students'];
				foreach($students as $student)
				{
					if($student->status_ambil == 't')
					{
						$this->modeldata->updatekelas_mahasiswa($nrp,$student->kelas_id,'x');
					}
					else if($student->status_ambil == 'b')
					{
						$this->modeldata->updatekelas_mahasiswa($nrp,$student->kelas_id,'y');
					}
					else if($student->status_ambil == 'd')
					{
						$this->modeldata->updatekelas_mahasiswa($nrp,$student->kelas_id,'z');
					}
				}
			    $this->notifikasi_model->sendNotification($this->session->userdata('username'),$nrp, 'batal tambah anda ditolak, silahkan menemui saya secepatnya');
				redirect('/bataltambahdrop/konfirmasiBatalTambahMahasiswa/'.$nrp, 'refresh');
			}
			else
			{
				$data['title'] = "Konfirmasi Batal Tambah Drop";
				$this->load->view('includes/header',$data);
				//$this->load->view('nav/navbar');
				$this->load->view('konfirmasiBatalTambahMahasiswa',$liststudent);
				$this->load->view('includes/footer');
			}

			

			
			
		}
		
		
		
		
	}


?>