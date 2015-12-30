<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Revision
 * Nama   				: revision.php
 * Pembuat 				: Melania Laniwati
 * Tanggal Pembuatan 	: 20 November 2015
 * Version Control		:
 * v0.1 - 20 November 2015
 * - Menambahkan fungsi revisi
 * v0.2 - 22 November 2015
 * - Menambahkan fungsi student_transcript untuk mahasiswa lihat transkrip nilai
 * - Menambahkan fungsi student_grade untuk mahasiswa lihat nilai per semester
 */

Class Revision extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->helper('cookie');
		$this->load->helper('url');
		
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('table');
		$this->load->library('m_pdf');
		
		$this->load->model('dosen_model');
		$this->load->model('mahasiswa_model');
		$this->load->model('class_model');
		$this->load->model('grade_model');
		$this->load->model('notifikasi_model');
		$this->load->model('revision_model');
	}
	
	public function revisi(){
		// get dosen information from session
		$sess_result = $this->session->userdata('to_revision');
		$data['class_id'] = $sess_result['class_id'];
		$data['lecturer_login'] = $sess_result['lecturer_login'];
		//$lecturer_login = $this->session->userdata('username');
		
		$class = $this->class_model->getClassInfoById($data['class_id'], $data['lecturer_login']);
		
		// Jika tidak cocok dengan lecturer_login atau tidak ditemukan class_id maka user akan di-redirect ke halaman /grade/all
		if ($class == false){
			$this->session->set_flashdata('alert_level','danger');
			$this->session->set_flashdata('alert','Tidak ditemukan kelas dengan ID tersebut!');
			redirect('grade/all');
		}
		
		// to indicate if revision is done and you should move to other page
		$done = FALSE;
		
		// set head title
		$data['title'] = "Revisi Penilaian";
		
		// get data from form
		$data['how_many'] = $this->input->post('how_many');
		$data['comment'] = $this->input->post('comment');
		
		// get all students
		$data['students'] = $this->revision_model->getComboBoxStudents($data['class_id']);
		
		// get class' information from database
        $this->load->model('class_model');
		$data['class'] = $this->class_model->getClassInfoById($data['class_id'], $data['lecturer_login']);
		
		// insert input from dosen (from form) into variables
		for ($i = 0; $i < $data['how_many']; $i++){
			$nrp = "combo_nrp_" . $i;
			$old_score = "old_score_" . $i;
			$new_score = "new_score_" . $i;
			
			$data['input'][$nrp] = $this->input->post($nrp); 
			$data['input'][$old_score] = $this->input->post($old_score);
			$data['input'][$new_score] = $this->input->post($new_score);
		}
		
		if ($this->input->post('add_row')){
			$data['how_many']++;
			
			// set defualt value for the added new row
			$nrp = "combo_nrp_" . ($data['how_many'] - 1);
			$old_score = "old_score_" . ($data['how_many'] - 1);
			$new_score = "new_score_" . ($data['how_many'] - 1);
			
			$data['input'][$nrp] = NULL;
			$data['input'][$old_score] = NULL;
			$data['input'][$new_score] = NULL;
		} 
		
		else if ($this->input->post('send_revision')){
			// generate new id for new data that is going to be inserted into HRevisi and DRevisi
			$hrevisi_id = $this->revision_model->generateNewIdForHrevisi();
			
			// insert into HRevisi
			$this->revision_model->insertDataToHrevisi($hrevisi_id, $data['class_id'], $data['comment']);
			
			for ($i = 0; $i < $data['how_many']; $i++) {
				$nrp = "combo_nrp_" . $i;
				$old_score = "old_score_" . $i;
				$new_score = "new_score_" . $i;
				
				// insert into DRevisi (for every nrp)
				if ($data['input'][$nrp] != "") $this->revision_model->insertDataToDrevisi($hrevisi_id, $data['input'][$nrp], $data['input'][$old_score], $data['input'][$new_score]);
			}
			
			// send notification to kajur
			$kajur_id = $this->dosen_model->getKajurId($data['class_id']);
			$this->notifikasi_model->sendNotification($this->session->userdata('username'), $kajur_id, $class[7]." telah menyelesaikan revisi penilaian ".$class[0].' / '.$class[3]);
			
			$done = TRUE;
		} 
		
		else if ($this->input->post('print')){
			//load the view, pass the variable and do not show it but "save" the output into variable
			$html = $this->load->view('report/report_revision', $data, TRUE);
			$header =$this->load->view('report/includes/headerReport', $data, TRUE);
			
			// you can pass mPDF parameter on this load() function
			$pdf = $this->m_pdf->load();
			
			// generate the PDF
			$pdf->WriteHTML($header.$html);
			
			// this the the PDF filename that user will get to download
			$pdf_filename = "Revisi Penilaian " . $data['class_id'] . ".pdf";
			
			// offer to user via browser download (PDF won't be saved on your server)
			$pdf->Output($pdf_filename, "I");
		}
		
		
		// the controller loads for the first time
		else {
			// set default value
			$data['how_many'] = 3;
			$data['comment'] = NULL;
			$data['input'] = NULL;
		}
		
		if (!$done){
			// load views
			$this->load->view('includes/header', $data);
			$this->load->view('grade/grade_revision', $data);
			$this->load->view('includes/footer');
		} else {
			redirect('grade/view/' . $data['class_id']);
		}
	}
	
}

?>