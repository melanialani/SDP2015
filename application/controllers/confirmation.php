<?php
/* -----------------------------------------------------
Nama   				: confirmation.php
Pembuat 			: Nancy Yonata
Tanggal Pembuatan 	: 16 November 2015
Edit 				: 27 November 2015
Edit 				: 5 Desember 2015
Edit 				: 7 Desember 2015
Edit 				: 12 Desember 2015 (Melengkapi dokumentasi pada source code) 


----------------------------------------------------- */
class Confirmation extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('confirmation_model');
		$this->load->model('class_model');
		$this->load->helper('url');
		$this->load->library('session');
		// Mengecek session kalau yang bisa akses hanya login
        if($this->session->userdata('user_role') != 'kajur'){
            redirect('/');
        }
	}
	public function index(){
		redirect('confirmation/all');
    }
	/*===================================
	function page_prosentase untuk meload
	portal_printProsentase 	
	=====================================*/
	public function page_prosentase(){
		$data['pilihan'] = ['Prosentase Nilai Setiap Dosen', 'Prosentase Nilai Semua Mata Kuliah'];
		$data['ddYear'] = $this->class_model->getComboBoxAllYear();
		$data['selectedDdYear'] = str_replace('/','-',str_replace(' ','_',$this->class_model->getActiveTermYear()));
        
		$this->load->view('includes/header', $data);
		$this->load->view('report/portal_printProsentase', $data);
		$this->load->view('includes/footer');

	}
	/* =====================================================
	function ajax_class : 
	untuk mengambil data kelas yang ada beserta nama dosen pengajar
    bedasarkan tahun ajaran dan menampilkannya dengan data table
    pada page confirmation_portal_view	
	=======================================================*/
    public function ajax_class($yearNow =null)
    {
		if ($yearNow == null){
			/* ----------------------------------------------------------
			   Jika tidak dilakukan pemilhan pada combobox tahun ajaran maka 
			   akan mengambil tahun ajaran saat ini dari table data_umum
			------------------------------------------------------------- */
			$yearNow  = $this->class_model->getActiveTermYear();
		}
		else {
			/* ------------------------------------------------------------
			   jika tahun ajaran pada combox di pilih maka akan dilakukan 
			   replace karakter pada tahun ajaran tersebut
			---------------------------------------------------------------*/
			$yearNow  = str_replace('_',' ',$yearNow);
			$yearNow  = str_replace('-','/',$yearNow);
		}
		
		
		/*------------------------------------------------------------ 
		mengatur kolom apa saja yang akan ditampilkan pada data table,
		serta menyimpan urutannya ascending/descending   
		--------------------------------------------------------------*/
		if(isset($_POST['order'])){
			$column = ["nama_mk","nama_dosen", "sks", "hari", "nama_ruang", "status_k", "tanggal_update"];
			$orders = array ($column[$_POST['order']['0']['column']] => $_POST['order']['0']['dir']);
        }
		else {
			$orders = null;
		}
		
		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		
				
		/*---------------------------------------------------------
	 	mengambil semua data data kelas yang ada
		beserta prosentase nilai grade(A,B, C, D, E) kelas tersebut
		bedasarkan id dosen dan tahun ajaran
		------------------------------------------------------------*/
		$classes = $this->confirmation_model->getDataTableByLecturer($orders, $yearNow,$limit,$start);
		
        $output = array("recordsTotal" => $this->confirmation_model->countAll($yearNow), 
						"recordsFiltered" => $this->confirmation_model->countAll($yearNow),
						"data" => $classes);
		
        // Print Output Berupa JSON
        echo json_encode($output);
    }
	/*==============================================
	function ajax_prosentaseDosen :
	untuk mengambil prosentase nilai dari
	setiap kelas berdasarkan id dosen yang dipassingkan
	dari combobox yang berisi nama dosen  	
	=================================================*/
	public function ajax_prosentaseDosen($idDosen){
		/*------------------------------------------------- 
		   mengambil tahun ajaran yang telah dipilih pada
		   combobox tahun ajaran pada portal_printProsentase
		----------------------------------------------------*/
		$yearNow = $this->session->userdata('year');
		
		/*------------------------------------------------- 
		mengatur kolom apa saja yang akan ditampilkan pada data table,
		serta menyimpan urutannya ascending/descending   
		---------------------------------------------------*/
		if(isset($_POST['order'])){
			$column = ["kode_mk","sks","nama_mk", "A", "B", "C", "D", "E"];
			$orders = array ($column[$_POST['order']['0']['column']] => $_POST['order']['0']['dir']);
        }
		else {
			$orders = null;
		}
		
		/*-----------------------------------------------
	 	mengambil semua data data kelas yang diajar oleh dosen 
		beserta prosentase nilai grade(A,B, C, D, E) kelas tersebut
		bedasarkan id dosen dan tahun ajaran yang telah dipilih
		-------------------------------------------------*/
		$classes = $this->confirmation_model->getDataTableReportByLecturer($idDosen, $orders, $yearNow );
		
		/*------------------------------------------------- 
		menampung hasil yang akan dioutputkan dengan json ke dalam variable  $output
		--------------------------------------------------*/
		$output = array("recordsTotal" => $this->class_model->countAll($idDosen), 
						"recordsFiltered" => $this->class_model->countFiltered($idDosen, $orders , $yearNow),
						"data" => $classes);
		
        // Print Output Berupa JSON
        echo json_encode($output);		
	}
	
	/*========================================================
	function ajax_prosentaseMatkul:
	untuk menngambil data semua kelas yang ada berserta dengan
	prosentase nilai grade (A, B, C, D, E) untuk masing-masing
	kelas berdasarkan tahun ajaran yang telah dipilih pada 
	portal_printProsentase  
	==========================================================*/
	public function ajax_prosentaseMatkul()
    {
		/*------------------------------------------------- 
		   mengambil tahun ajaran yang telah dipilih pada
		   combobox tahun ajaran pada portal_printProsentase
		----------------------------------------------------*/
		$yearNow = $this->session->userdata('year');
		/*------------------------------------------------- 
		mengatur kolom apa saja yang akan ditampilkan pada data table, 
		dan serta menyimpan urutannya ascending/descending   
		---------------------------------------------------*/
		if(isset($_POST['order'])){
			$column = ["kode_mk","sks","nama_mk", "A", "B", "C", "D", "E"];
			$orders = array ($column[$_POST['order']['0']['column']] => $_POST['order']['0']['dir']);
        }
		else {
			$orders = null;
		}
		
		/*-----------------------------------------------
	 	mengambil semua data data kelas beserta prosentase nilai 
		grade(A,B, C, D, E) kelas tersebut bedasarkan tahun ajaran 
		yang telah dipilih
		-------------------------------------------------*/
		$classes = $this->confirmation_model->getDataTableForAllMatkul($orders, $yearNow);
		
		$output = array("recordsTotal" => $this->confirmation_model->countAll($yearNow), 
						"recordsFiltered" => $this->confirmation_model->countAll($yearNow),
						"data" => $classes);
		
        // Print Output Berupa JSON
        echo json_encode($output);
    }
	/* --------------------------------------------------------------
	function ajax_score($classId):
	untuk mengambil data nilai untuk semua anak yang ada pada suatu kelas
	berdasarkan id kelas
	-------------------------------------------------------------------*/
    public function ajax_score($classId){
		/* ----------------------------------------------------------------------
		 Menentukan field apa saja yang ingin ditampilkan pada data table nilai
		 -----------------------------------------------------------------------*/
        if(isset($_POST['order'])){
            $column = ["nrp","nrp","nama","uts","uas","tugas","nilai_akhir","nilai_akhir_grade","nilai_grade"];
            $orders = array ($column[$_POST['order']['0']['column']] => $_POST['order']['0']['dir']);
        }
        else {
            $orders = null;
        }
        $this->load->model('grade_model');
        
		$students = $this->grade_model->getDatatableScoreOfClass($classId,$orders);
        $output = array("recordsTotal" => $this->grade_model->countAllStudentInClass($classId),
            "recordsFiltered" => $this->grade_model->countAllStudentInClass($classId),
            "data" => $students);

        // Print Output Berupa JSON
        echo json_encode($output);
    }
	
	
    /*====================================================
      Function all :
      menampilkan data tabel yang berisi semua mata kuliah
	  yang ada berserta status penilaian dari masing-masing kelas yang ada
     =====================================================*/
    public function all(){
		$data['title'] = "Konfirmasi Penilaian";
		$this->load->helper('form');
		$data['ddYear'] = $this->class_model->getComboBoxAllYear();
		$data['selectedDdYear'] = str_replace('/','-',str_replace(' ','_',$this->data_umum_model->getSemester()));
        $this->load->view('includes/header', $data);
		$this->load->view('confirmation/confirmation_portal_view', $data);
		$this->load->view('includes/footer');
	}
	
    /*------------------------------------------------------
       Function : view()
       Mengeload Halaman Detail Kelas berdasarkan id kelas
	   dan id dosen dari kelas tersebut 
     -------------------------------------------------------*/
    public function view($class_id, $lecturer_login){
		$this->load->helper('form');
		$this->load->library('table');
		/*------------------------------------------------
		 Memeriksa apakah kelas dengan kelas id tersebut ada
		 atau tidak	
		-------------------------------------------------*/
        if (!$this->class_model->isClassExist($class_id)){
            $this->session->set_flashdata('alert_level','danger');
            $this->session->set_flashdata('alert','Tidak ditemukan kelas dengan ID tersebut!');
            redirect('confirmation/all');
        }

		/*-------------------------------------------------
		Mengambil data detail dari kelas berdasarkan 
		id kelas, dan id dosen
		-------------------------------------------------*/
		$class = $this->class_model->getClassInfoById($class_id, $lecturer_login);
		
		$data['title'] = "Konfirmasi Nilai ".$class[0];
		$data['class'] = $class;
        $this->load->model('revision_model');
        if ($class[10] == "3") {
            $this->load->model('revision_model');
            $data['revisions'] = $this->revision_model->getRevisionByClass($class_id);
        }
        $data['classId'] = $class_id;
		$data['tahun_ajaran'] = $class[11];
		
		if ($this->input->post('btnAcceptRevision')){
            $this->confirmation_model->approveRevision($this->input->post('revision_id'), $class_id);
            $this->confirmation_model->IPSCounting($class_id, $class[11]);
            $this->confirmation_model->IPKCounting($class_id);
            $this->session->set_flashdata('alert_level','success');
            $this->session->set_flashdata('alert','Berhasil Menyetujui Revisi');
            $nip = $this->class_model->getLecturerIdByClass($class_id);
            $class = $this->class_model->getClassInfoById($class_id, $nip);
            $this->notifikasi_model->sendNotification($this->session->userdata('username'),$nip, "Revisi untuk Penilaian ".$class[0].' / '.$class[3]." diterima.");
            redirect('confirmation/view/'.$class_id.'/'.$lecturer_login);
        }
        if ($this->input->post('btnRejectRevision')){
            $this->confirmation_model->rejectRevision($this->input->post('revision_id'));
            $this->session->set_flashdata('alert_level','success');
            $this->session->set_flashdata('alert','Berhasil Menolak Revisi');
            $nip = $this->class_model->getLecturerIdByClass($class_id);
            $class = $this->class_model->getClassInfoById($class_id, $nip);
            $this->notifikasi_model->sendNotification($this->session->userdata('username'),$nip, "Revisi untuk Penilaian ".$class[0].' / '.$class[3]." ditolak.");
            redirect('confirmation/view/'.$class_id.'/'.$lecturer_login);
        }
		/*--------------------------------------------
		Membuat tabel yang berisi detail dari kelas
		yang akan ditampilkan pada bagian atas dari
        page confirmation_detail_view
 		confirmation_detail_view akan ditampilkan 
		pada saat kita melakukan klik pada button view detail
		pada page confirmation_portal_view
		-----------------------------------------------*/
		
		$this->table->add_row('Mata Kuliah / Kelas / SKS :&nbsp;&nbsp;',':',$class[0].' / '.$class[3].' / '. $class[8].' SKS');
        $this->table->add_row('Jurusan / Semester &nbsp;&nbsp;',':', $class[1].' / '. $class[9]);
        $this->table->add_row('Ruang / Hari, Jam  ',':', $class[5].' / '.$class[4]);
        $this->table->add_row('Dosen  ',':', $class[7]);
        $this->table->add_row('Tahun Ajaran  ',':', $class[11]);
        $this->table->add_row('Status Penilaian ',':', $class[6]);
        $this->table->add_row('Terakhir Update ',':', $class[16]);
		$this->load->view('includes/header', $data);
		$this->load->view('confirmation/confirmation_detail_view', $data);
		$this->load->view('includes/footer');
	}
	/*==================================================
	function sendComment :
	untuk mengirim notifikasi serta menyimpan komentar kajur
    ke table kelas.	
	====================================================*/
	public function sendComment(){
		
		$comments =  $this->input->post('comment_kajur');
		$classID = $this->input->post('hidden_classId');
		$termYear = $this->input->post('hidden_tahunAjaran');
		
		
		if($this->input->post('btnKonfirmasi') == true){
			/*--------------------------------------------
			 Merubah status penilaian kelas menjadi complete
			----------------------------------------------*/
			$statusConf = 3;
			
			/* -----------------------------------------------
			 melakukan perhitungan nilai IPS untuk semua anak
			 yang ada pada kelas yang nilainya telah dikonfirmasi oleh kajur
			-------------------------------------------------*/
			$this->confirmation_model->IPSCounting($classID, $termYear);
			
			/* -----------------------------------------------
			 melakukan perhitungan nilai IPK untuk semua anak
			 yang ada pada kelas yang nilainya telah dikonfirmasi oleh kajur
			-------------------------------------------------*/
			$this->confirmation_model->IPKCounting($classID);
            $nip = $this->class_model->getLecturerIdByClass($classID);
			
            $class = $this->class_model->getClassInfoById($classID, $nip);
			// mengirim notifikasi ke dosen pengajar bahwa nilai sudah di setujui oleh kajur 
            $this->notifikasi_model->sendNotification($this->session->userdata('username'),$nip, "Penilaian ".$class[0].' / '.$class[3]." telah terkonfirmasi.");
		}
		else if($this->input->post('btnTidakSetuju') == true){
			$statusConf = 2;
            $nip = $this->class_model->getLecturerIdByClass($classID);
            $class = $this->class_model->getClassInfoById($classID, $nip);
            $this->notifikasi_model->sendNotification($this->session->userdata('username'),$nip, "Kajur tidak setuju atas penilaian ".$class[0].' / '.$class[3]);
		}
		//menyimpan commentar kajur ke database
		$this->confirmation_model->sendComment($classID, $comments, $statusConf);
		
		// kembali ke page confirmation_portal_view
		redirect('confirmation/index');
	}
	/*============================================================
	 function reportProsentase:
	 dijalankan pada saat user menekan button view report
     pada page portal_printProsentase	 
	 
	- jika pada combobox pilihan dipilih 'Prosentase Nilai Setiap Dosen'
	 akan meload page reportProsentaseDosen_view 
	
	- jika pada combobox pilihan dipilih 'Prosentase Nilai Semua Mata Kuliah'
	 akan meload reportProsentaseMatkul_view
	
	=============================================================*/
	public function reportProsentase(){
		if($this->input->post('pilihan') == "0"){
			$year  = str_replace('_',' ',$this->input->post('ddYear'));
			$yearNow  = str_replace('-','/',$year);
			$this->session->set_userdata('year', $yearNow);
			
			$arrDosen = [];
			/* mengambil semua nama dosen yang ada di tabel dosen disimpan 
			   ke associative array berdasarkan id dosen
			*/
			$allDosen = $this->confirmation_model->allDosen();
			foreach($allDosen as $row){
				$arrDosen [$row['nip']] = $row['nama'];
			}
			
			$data['Dosen'] = $arrDosen;
			$data['selectedDosen'] = '';
			
		    // load page reportProsentaseDosen_view
			$this->load->view('includes/header', $data);
			$this->load->view('report/reportProsentaseDosen_view', $data);
			$this->load->view('includes/footer');
		}
		else if($this->input->post('pilihan') == "1"){ 
			// prosentase semua nilai matkul
			// replace karakter yang ada pada tahun ajaran
			$year  = str_replace('_',' ',$this->input->post('ddYear'));
			$yearNow  = str_replace('-','/',$year);
			
			// menyimpan tahun ajaran yang dipilih dari combobox kedalam session
			$this->session->set_userdata('year', $yearNow);
			// load page reportProsentaseMatkul_view
			$this->load->view('includes/header');
			$this->load->view('report/reportProsentaseMatkul_view');
			$this->load->view('includes/footer');
			
		}
	}
	
	/*=============================================================
	 function printToPDFPercentageDosen:
	 untuk mencetak data prosentase nilai dari seorang dosen 
	 kedalam bentuk PDF 
	===============================================================*/
	
	public function printToPDFPercentageDosen(){
		
		$idDosen = $this->input->post('ddDosen');
		// set title dari file pdf
		$data['title'] = "Report Prosentase Penilaian Dosen";
		// set nama dosen yang akan ditampilkan di file pdf
		$data['namaDosen'] = $this->confirmation_model->getNamaDosen($this->input->post('ddDosen'));
		// set tahun ajaran yang akan ditampilkan di file pdf
		$data['year'] = $this->session->userdata('year');
		
		/*--------------------------------------------------------------
		  membuat data table dan menentukan field apa saja yg ingin 
		  ditampilkan pada data table
		----------------------------------------------------------------*/
		
		if(isset($_POST['order'])){
			$column = ["kode_mk","sks","nama_mk", "A", "B", "C", "D", "E"];
			$orders = array ($column[$_POST['order']['0']['column']] => $_POST['order']['0']['dir']);
		}
		else {
			$orders = null;
		}
		$allDataTable =  $this->confirmation_model->getDataTableReportByLecturer($idDosen, $orders, $data['year']);
		
		
		// membuat table yang akan di tampilkan pada file pdf 
		$table = "<table autosize='1.6' border='1' cellspacing='0' width='100%' cellpadding='5'>";
		$table.= "<thead>
					<tr style='background:yellow'>
						<td>KODE MK</td>
						<td>SKS</td>
						<td>NAMA MATA KULIAH</td>
						<td>A</td>
						<td>B</td>
						<td>C</td>
						<td>D</td>
						<td>E</td>
					</tr>
				  </thead>";
				  
		/* ----------------------------------------------------
			menambahkan baris pada table yang dibuat, data setiap
            baris yang ada di ambil dari data table 
		-------------------------------------------------------*/
		
		foreach($allDataTable as $row){
			$table .= "<tr>";
			$table .= "<td>".$row[0]."</td>";
			$table .= "<td>".$row[1]."</td>";
			$table .= "<td>".$row[2]."</td>";
			$table .= "<td>".$row[3]."%</td>";
			$table .= "<td>".$row[4]."%</td>";
			$table .= "<td>".$row[5]."%</td>";
			$table .= "<td>".$row[6]."%</td>";
			$table .= "<td>".$row[7]."%</td>";
			$table .= "</tr>";
		}
		$table .= "</table>";
		
		$data['dataTable'] = $table;
		// set tulisan yang muncul pada saat file pdf digenerate 
		$pdfFilePath = "print_report_prosentase_nilai_dosen.pdf";
		// load library pdf
		$this->load->library('m_pdf');
		$pdf = $this->m_pdf->load();

		//generate the PDF!
		$html = $this->load->view('report/report_prosentaseLecture',$data,true);
		$header =$this->load->view('report/includes/headerReport',$data,true);
		$pdf->WriteHTML($header.$html);
		$pdf->Output($pdfFilePath, "I");
	}
	
	/*=============================================================
	 function printToPDF_PercentageMatkul:
	 untuk mencetak data prosentase nilai dari semua mata kuliah yang ada
	 pada tahun ajaran tersebut kedalam bentuk PDF 
	===============================================================*/
	public function printToPDF_PercentageMatkul(){
		$yearNow = $this->session->userdata('year');
		$data['title'] = "Report Prosentase Nilai Mata Kuliah";
		$data['year'] = $yearNow;
		
			
		/*--------------------------------------------------------------
		  membuat data table dan menentukan field apa saja yg ingin 
		  ditampilkan pada data table
		----------------------------------------------------------------*/
		if(isset($_POST['order'])){
			$column = ["kode_mk","sks","nama_mk", "A", "B", "C", "D", "E"];
			$orders = array ($column[$_POST['order']['0']['column']] => $_POST['order']['0']['dir']);
        }
		else {
			$orders = null;
		}
		$allDataTable = $this->confirmation_model->getDataTableForAllMatkul($orders, $yearNow);
		
		// membuat table yang akan di tampilkan pada file pdf 
		$table = "<table autosize='1.6' border='1' cellspacing='0' width='100%' cellpadding='5'>";
		$table.= "<thead>
					<tr style='background:yellow'>
						<td>KODE MK</td>
						<td>SKS</td>
						<td>NAMA MATA KULIAH</td>
						<td>A</td>
						<td>B</td>
						<td>C</td>
						<td>D</td>
						<td>E</td>
					</tr>
				  </thead>";
		/* ----------------------------------------------------
			menambahkan baris pada table yang dibuat, data setiap
            baris yang ada di ambil dari data table 
		-------------------------------------------------------*/		  
		foreach($allDataTable as $row){
			$table .= "<tr>";
			$table .= "<td>".$row[0]."</td>";
			$table .= "<td>".$row[1]."</td>";
			$table .= "<td>".$row[2]."</td>";
			$table .= "<td>".$row[3]."%</td>";
			$table .= "<td>".$row[4]."%</td>";
			$table .= "<td>".$row[5]."%</td>";
			$table .= "<td>".$row[6]."%</td>";
			$table .= "<td>".$row[7]."%</td>";
			$table .= "</tr>";
		}
		$table .= "</table>";
		
		$data['dataTable'] = $table;
		// set tulisan yang muncul pada saat file pdf digenerate 
		$pdfFilePath = "print_report_prosentase_nilai_matkul.pdf";
		// load library pdf
		$this->load->library('m_pdf');
		$pdf = $this->m_pdf->load();

		//generate the PDF!
		$html = $this->load->view('report/report_prosentaseMatkul',$data,true);
		$header =$this->load->view('report/includes/headerReport',$data,true);
		$pdf->WriteHTML($header.$html);
		$pdf->Output($pdfFilePath, "I");
		
	}
	
}
?>