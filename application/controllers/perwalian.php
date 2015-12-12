<?php
	class Perwalian extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		//Function index digunakan untuk mengecek apakah user telah login
		public function index()
		{
			//mengecek apakah user telah login
			//jika ada data2 tersebut maka tampilkan halaman sesuai keterangan
			//untuk dosen keluarkan halaman dosen, dan mahasiswa tampilkan halaman mahasiswa
			if(!$this->session->userdata('username') && !get_cookie('username')){
				redirect('home');
			}
		}
		
		//Function mahasiswa digunakan untuk mengatur aktifitas mahasiswa selama login
		public function mahasiswa()
		{
			//Mengecek apakah user pernah login atau belum
			//jika sudah masuk kedalam if disini
			if($this->session->userdata('username') or get_cookie('username'))
			{
				if($this->session->userdata('user_role') == 'mahasiswa'){
					redirect('perwalian/home');
				}
				else{ // kalau kajur atau dosen
					redirect('grade/all');
				}
			}
			else{
				redirect('home');
			}
		}
		
		public function home()
		{
			//$data['notifikasi'] = $this->notifikasi_model->getNotification();
			//$data['countNewNotif'] = $this->notifikasi_model->getCountNotification();
			//Mengset judul web lewat variable data['title'] dengan isi
			//Sistem informasi mahasiswa stts
			$data['title'] = 'Sistem Informasi Mahasiswa STTS';
			//mendapatkan nama mahasiswa, dan menyimpan kedalam variable
			//data['nameStudent']
			$data['nameStudent'] = $this->mahasiswa_model->getNameStudent($this->session->userdata('username'));
			//mendapatkan semester atau tahun ajaran yang berjalan sekarang
			$data['nowSemester'] = $this->data_umum_model->getSemester();
			//meload view header dan memasukan title kedalam view;
			$this->load->view('includes/header',$data);
			$this->load->view('contentdefault');
			
			$this->load->view('includes/footer');
		}
		
		public function frs()
		{
			//Mengambil semua notifkasi yang terdapat dalam database
			//$data['notifikasi'] = $this->notifikasi_model->getNotification();
			//$data['countNewNotif'] = $this->notifikasi_model->getCountNotification();
			//Mengset judul web lewat variable data['title'] dengan isi
			//Sistem informasi mahasiswa stts
			$data['title'] = 'Sistem Informasi Mahasiswa STTS';
			//mendapatkan nama mahasiswa, dan menyimpan kedalam variable
			//data['nameStudent']
			$data['nameStudent'] = $this->mahasiswa_model->getNameStudent($this->session->userdata('username'));
			//mendapatkan semester atau tahun ajaran yang berjalan sekarang
			$data['nowSemester'] = $this->data_umum_model->getSemester();
			//meload view header dan memasukan title kedalam view;
			$this->load->view('includes/header',$data);
			//jika menu submit saat perwalian diklik
			if($this->input->post('submit'))
			{
				//mengecek apakah count SKS sudah melebihi batas minimum persemester
				if($this->session->userdata('countSKS') > 16)
				{
					//membuat tabel jadwal kuliah
					$this->setClass();
					//mengambil nama mahasiswa
					$data['nameStudent'] = $this->mahasiswa_model->getNameStudent($this->session->userdata('username'));
					//mengambil data semester sekarang
					$data['nowSemester'] = $this->data_umum_model->getSemester();
					//mengeset judul page
					$data['title'] = 'Sistem Informasi Mahasiswa STTS';
					//membuat schedule jadwal
					$data['table']=$this->getSchedule();
					//mengirim notif ke dosen
					$this->notifikasi_model->sendNotif();
					//mengeset mahasiswa telah perwalian
					$this->mahasiswa_model->setAfterStudyPlan();
					//mengambil semester sekarang
					$data['nowSemester'] = $this->data_umum_model->getSemester();
					$this->load->view('perwalian/jadwal',$data);
				}else
				{
					//jika belum maka menampilkan error sksnya kurang dari minimum
					$this->session->set_flashdata('error','Jumlah SKS yang diambil kurang dari standart minimum');
					//diredirectkan ke mahasiswa di contoller perwalian
					redirect('perwalian/frs');
				}
			}
			else if($this->mahasiswa_model->getStatusConfirm())
			{
				//jika menekan menu perwalian maka
				//set posisi menu sekarang di frs
				$this->session->set_userdata('currentPage','frs');
				//menampilkan menu mahasiswa
				//$this->load->view('nav/navbar');
				$data['countSKS']=0;
				//set data countSKS = 0
				//jika terdapat session countSKS maka
				if($this->session->userdata('countSKS'))
				{
					//set data countSKS dengan data dari session
					$data['countSKS'] = $this->session->userdata('countSKS');
				}
				//membuat variable array yang nanti dugnakan untuk menampung
				//data matakuliah yang dibuka dan diambil hanya semester saja
				$arr= array();
				//melakukan perulangan untuk mendapatkan matakuliah yang dibuka
				foreach($this->matakuliah_model->getClassSemesterOpen() as $row)
				{
					//memasukan data semester ke dalam variable arr
					array_push($arr,$row->semester);
				}
				//mengisi data combobox dengan variable arr yang berisi semester semester saja
				$data['dataCombobox']=$arr;
				//mengeset variable user dengan '' (kosong)
				$user = '';
				//mengecek apakah username terdapat disession
				//jika ya set variable user dengan data yang ada disession
				if($this->session->userdata('username')){$user = $this->session->userdata('username');}
				//mengecek apakah username terdapat di cookie
				//jika ya set variable user dengan data yang ada di cookie
				if($this->input->cookie('username')){$user = get_cookie('username');}
				//membuat variable mahasiswa didalam variable data
				//mengset value variable tersebut dengan mengambil dari model
				//mahasiswa_model dan mendapatkan detail dari mahasiswa
				$data['mahasiswa'] = $this->mahasiswa_model->getDetailStudent($user);
				//membuat variable smtr di dalam variable data
				//kemudian memanggil function getSemesterStudent untuk mendapatkan semester sekarang
				$data['smtr'] = $this->getSemesterStudent($data['mahasiswa']->nrp);
				//membuat variable table yang nanti ditampilkan diform perwalian
				$data['table'] = array();
				//melakukan perulangan berdasarkan semester kelas yang dibuka pada tahun ajaran ini
				for($i=0;$i<count($arr);$i++){
					//mengisi array variable table dengan tabel
					//memanggil fungsi createTableCourse, memasukan input semester dan menghasilkan tabel semester tersebut
					array_push($data['table'],$this->createTableCourse($arr[$i]));
				}
				//mengload view perwalian
				$this->load->view('perwalian/perwalian',$data);
			}else
			{
				redirect('perwalian/jadwal');
			}
		}
		
		public function jadwal()
		{
			//Mengambil semua notifkasi yang terdapat dalam database
			//$data['notifikasi'] = $this->notifikasi_model->getNotification();
			//$data['countNewNotif'] = $this->notifikasi_model->getCountNotification();
			//Mengset judul web lewat variable data['title'] dengan isi
			//Sistem informasi mahasiswa stts
			$data['title'] = 'Sistem Informasi Mahasiswa STTS';
			//mendapatkan nama mahasiswa, dan menyimpan kedalam variable
			//data['nameStudent']
			$data['nameStudent'] = $this->mahasiswa_model->getNameStudent($this->session->userdata('username'));
			//mendapatkan semester atau tahun ajaran yang berjalan sekarang
			$data['nowSemester'] = $this->data_umum_model->getSemester();
			//Mengecek apakah user pernah login atau belum
			//jika sudah masuk kedalam if disini
			if($this->session->userdata('username') or get_cookie('username'))
			{
				$data['nameStudent'] = $this->mahasiswa_model->getNameStudent($this->session->userdata('username'));
				$data['nowSemester'] = $this->data_umum_model->getSemester();
				$data['title'] = 'Sistem Informasi Mahasiswa STTS';
					
				$data['table']=$this->getSchedule();
				$data['nowSemester'] = $this->data_umum_model->getSemester();
				$this->load->view('includes/header',$data );
				$this->session->userdata('currentPage','jadwal');
				//$this->load->view('nav/navbar',$data);
				$this->load->view('perwalian/jadwal',$data);
				$this->load->view('includes/footer');
			}
			//jika belum login tampilkan halaman login
			else
			{
				redirect('home/login');
			}
		}
		
		
		//FUNCTION INI DIGUNAKAN OLEH AJAX 
		//UNTUK MENDAPATKAN SKS SUATU MATA KULIAH
		public function getTotalSks(){
			$query = $this->matakuliah_model->getSKS($this->input->post('name'));
			if($this->session->userdata('getCourseNow'))
			{
				$array = $this->session->userdata('getCourseNow');
				if($this->input->post('status') == 'true')
				{
					if($this->matakuliah_model->isEmpty($this->input->post('name')))
					{
						$count = (+$this->input->post('countSKS')) + (+$query->jumlah_sks);
						$this->session->set_userdata('countSKS',$count);
						array_push($array,$this->input->post('name'));
						$this->session->set_userdata('getCourseNow',$array);
						print $query->jumlah_sks;
					}else{
						print "1";
					}
				}
				else
				{
					$count = (+$this->input->post('countSKS')) - (+$query->jumlah_sks);
					$this->session->set_userdata('countSKS',$count);
					if(($key = array_search($this->input->post('name'),$array)) !== false){
						unset($array[$key]);
					}
					$this->session->set_userdata('getCourseNow',$array);
					print $query->jumlah_sks;
				}
			}else{
				$array = array($this->input->post('name'));
				$this->session->set_userdata('getCourseNow',$array);
				$this->session->set_userdata('countSKS',$query->jumlah_sks);
				print $query->jumlah_sks;
			}
			
		}
		
		//FUNCTION INI UNTUK MEMBUAT SEBUAH DIV
		function divOpen($class = NULL, $id = NULL)
		{
			$code   = '<div ';
			$code   .= ( $class != NULL )   ? 'class="'. $class .'" '   : '';
			$code   .= ( $id != NULL )      ? 'id="'. $id .'" '         : '';
			$code   .= '>';
			return $code;
		}
	/**
     * Function : createTableCourse()
	 * digunakan untuk memubat tabel semester dengan kelas mana aja yang dibuka
     * param semester
	 * output tabel
     */
		function createTableCourse($semester){
			$matkul = $this->matakuliah_model->createFRS($this->session->userdata('username'));
			$tmpl = array ( 'table_open'  => '<table class="table table-condensed" >');
			$this->table->set_template($tmpl);
			$this->table->set_heading('Nama Matkul','SKS','Grade','Ambil');
			$semesterNow = $this->data_umum_model->getSemester();
			foreach($matkul as $row)
			{
				$hari='-';
				if($row->semester == $semester && $row->hari <> '' && $row->status == '1' && $row->tahun_ajaran == $semesterNow)
				{
					$class='info';
					if($row->hari == "1")
					{
						$hari='Senin';
					}
					else if($row->hari == "2")
					{
						$hari='Selasa';
					}
					else if($row->hari == "3")
					{
						$hari='Rabu';
					}
					else if($row->hari == "4")
					{
						$hari='Kamis';
					}
					else if($row->hari == "5")
					{
						$hari="Jum'at";
					}
					else
					{
						$class='';
					}
					$checkbox = form_checkbox(array('class'=>'checkbox','value'=>$row->nama,'name'=>'cbx'));
					
					if($this->session->userdata('getCourseNow'))
					{
						$array = $this->session->userdata('getCourseNow');
						if(in_array($row->nama,$array))
						{
							$checkbox = form_checkbox(array('class'=>'checkbox','value'=>$row->nama,'name'=>'cbx', 'checked'=>'true'));
						}
					}
					$score = $row->nilai_grade;
					if($row->nilai_grade=='A' || $this->isPass($row->id) == 'false')
					{
						$class='active';
						$checkbox = '<fieldset disabled>' .  form_checkbox(array('class'=>'checkbox','value'=>$row->nama,'name'=>'cbx')) .  '</fieldset>';
					}
					if($score == "T"){
						$score="";
					}
					$rowData = array('<a class="hovertabel" href="#" title="Informasi" data-trigger="hover" data-html="true" data-toggle="popover" data-content="Hari: '.$hari.'<br />Jam: '.substr($row->jam_mulai,0,5) .'">'.$row->nama .'</a>',$row->jumlah_sks,$score, $checkbox);
					if($row->berpraktikum == 1)
					{
						
						$rowData = array('<b><a class="hovertabel" href="#" title="Informasi" data-trigger="hover" data-html="true" data-toggle="popover" data-content="Hari: '.$hari.'<br />Jam: '.substr($row->jam_mulai,0,5) .'">'.$row->nama .'</a></b>' , '<b>'.$row->jumlah_sks .'</b>', '<b>'. $row->nilai_grade .'</b>', $checkbox);	
					}
					$this->table->add_row(array('data'=>$rowData,'class'=>$class,'data-toogle'=>'popover','data-trigger'=>'hover', 'title'=>$hari, 'data-content'=>'some' ));
				}
			}
			return $this->table->generate();
		}
	/**
     * Function : getSemesterStudent()
	 * param nrp mahasiswa
     * output semester mahasiswa
     */
		public function getSemesterStudent($nrp)
		{			
			$sql = $this->db->get_where('data_umum',array('index'=>'tahun_ajaran_sekarang'));
			$now = $sql->row();
			$addTahun = 0;
			$tahun = substr($now->value,8,2);
			if(substr($now->value,0,5) == "GASAL"){
				$addTahun = 1;
			}else{
				$addTahun=2;
			}
			$smtr = (($tahun - substr($nrp,1,2)) * 2) + $addTahun;
			return $smtr;
		}
	/**
     * Function : isPass()
	 * param kode matakuliah
     * output true jika telah lulus, false jika blm lulus
     */
		public function isPass($courseID)
		{
			$passed = 'true';
			$requirementCourse = $this->syarat_matakuliah_model->getRequirement($courseID);
			foreach($requirementCourse as $row)
			{
				if($this->kelas_mahasiswa_model->search($row->id_syarat_matakuliah) == 'false')
				{
					$passed = 'false';
					break;
				}
			}
			return $passed;
		}
			
    /**
     * Function : setClass()
     * Memasukan mahasiswa kedalam kelas yang akan diikuti
     */
		public function setClass()
		{
			//menampilkan kelas yang telah diambil sewaktu perwalian
			$listClass = $this->session->userdata('getCourseNow');
			for($i=0; $i<count($listClass); $i++)
			{
				//mengecek apakah kelas yang dibuka dengan matakuliah yang sama lebih dari 1 
				$class = $this->class_model->getClass($listClass[$i]);
				//jika lebih dari satu
				if(count($class) >1){
					//mengecek total murid dalam kelas
					$totalStudent = $this->class_model->getStudent($class[0]['id'],$class[0]['idmakul']);
					//mendapatkan student id atau nrp mahasiswa
					if($this->session->userdata('username'))
					{
						$studentID = $this->session->userdata('username');
					}
					else if(get_cookie('username'))
					{
						$studentID = get_cookie('username');
					}
					//jika ternyata total muridnya masih cukup maka masukan ke kelas pertama
					//jika tidak masukan ke kelas kedua
					if($totalStudent < 35)
					{
						$scoreID = $this->nilai_model->insert($studentID);
						$this->kelas_mahasiswa_model->insert($studentID,$class[0]['id'],$class[0]['idmakul'],'a',$scoreID);
					}
					else
					{
						$scoreID = $this->nilai_model->insert($studentID);
						$this->kelas_mahasiswa_model->insert($studentID,$class[0]['id'],$class[0]['idmakul'],'a',$scoreID);
					}
				}
				else
				{
					//mengambil nrp mahasiswa
					if($this->session->userdata('username'))
					{
						$studentID = $this->session->userdata('username');
					}
					else if(get_cookie('username'))
					{
						$studentID = get_cookie('username');
					}
					//membuat daftar nilai
					$scoreID = $this->nilai_model->insert($studentID);
					//memasukan data dalam tabel kelas mahasiswa untuk matakuliah yng diikuti
					$this->kelas_mahasiswa_model->insert($studentID,$class[0]['id'],$class[0]['idmakul'],'a',$scoreID);
				}
			}
		}
		
		
    /**
     * Function : getSchedule()
     * Membuat tabel jadwal kuliah
     * output data dalam bentuk tabel
     */
		public function getSchedule()
		{
			//mengambil nrp mahasiswa
			$studentID = $this->session->userdata('username');
			//mengambil jadwal kuliah dari database
			$schedule = $this->kelas_mahasiswa_model->getSchedule($studentID);
			//membuat tabel
			$tmpl = array ( 'table_open'  => '<table class="table">');
			$this->table->set_template($tmpl);
			$this->table->set_heading('Kode Matkul','Nama Matkul','Dosen Pengajar','Hari','Jam Mulai','Ruangan');
			//mengambil semester sekarang
			$semesterNow = $this->data_umum_model->getSemester();
			foreach($schedule as $row)
			{
				$hari='-';
				if($row->hari == "1")
				{
					$hari='Senin';
				}
				else if($row->hari == "2")
				{
					$hari='Selasa';
				}
				else if($row->hari == "3")
				{
					$hari='Rabu';
				}
				else if($row->hari == "4")
				{
					$hari='Kamis';
				}
				else if($row->hari == "5")
				{
					$hari='Jumaat';
				}
				$rowData = array($row->id,$row->nama,$row->dosen, $hari,$row->jam_mulai,$row->ruangan);
				
				if($row->berpraktikum == 1)
				{
					$rowData = array('<b>'.$row->id .'</b>','<b>'.$row->nama .'</b>' ,'<b>'.$row->dosen .'</b>', '<b>'. $hari .'</b>', '<b>'.$row->jam_mulai .'</b>', '<b>'. $row->ruangan .'</b>');	
				}
				$this->table->add_row(array('data'=>$rowData,'class'=>'table'));
			}
			//mereturn data dalam bentuk tabel
			return $this->table->generate();
		}
		
		
		public function readMessage()
		{
			$this->notifikasi_model->readAll();
			$code='';
			foreach($this->notifikasi_model->getNotification() as $row)
			{
				$code .= '<div class="notification-item">';
				$code .= '<h4 class="item-title">'. $row->judul .' - ' . $this->dosen_model->getNameLecture($row->dosen_nip) . '</h4>';
				$code .= '<p class="item-info">' . $row->isi . '</p>';
				$code .= '</div>';
			}
			print $code;
		}
	}

?>