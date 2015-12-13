<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plottingdosen extends CI_Controller {

	function __construct(){
			parent:: __construct();
			$this->load->helper(array('form', 'html', 'url'));
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function bukakelas()
	{
		//echo $this->session->userdata('username');
		$this->load->model('kelas_model');

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

		$data['coursesName'] = $this->kelas_model->coursesComboBox($major);
		$data['lecturersName'] = $this->kelas_model->lecturersComboBox();
		$data['roomsName'] = $this->kelas_model->roomsComboBox();

		$data['days'] = array(
			'1' => 'Senin',
			'2' => 'Selasa',
			'3' => 'Rabu',
			'4' => 'Kamis',
			'5' => 'Jumat',
			'6' => 'Sabtu',
			'7' => 'Minggu' 
		);

		$data['time'] = array(
			'06:30:00' => '06:30:00',
			'08:00:00' => '08:00:00',
			'10:30:00' => '10:30:00',
			'13:00:00' => '13:00:00',
			'15:30:00' => '15:30:00',
			'18:00:00' => '18:00:00'
		);

		$classes = $this->kelas_model->getClasses();

		if($this->input->post('insertClass')){
			$courseID = $this->input->post('coursesName');
			$lecturerID = $this->input->post('lecturersName');
			$roomID = $this->input->post('roomsName');
			$days = $this->input->post('days');
			$time = $this->input->post('time');
			$this->kelas_model->insertNewClass($courseID, $lecturerID, "2015", $days, $roomID, $time);
		}

		foreach ($classes as $class){
			if($this->input->post($class['id'])){
				//if($this->input->post('btnOk')){
					$this->kelas_model->updateClassStatus($class['id']);
				//}
			}
			$this->kelas_model->countStudents($class['id']);
		}

		/*foreach ($classes as $class){
			if($class['kelas_id'] != NULL){
				$this->kelas_model->updateCountStudents($class['id'], $class['kelas_id']);
			}
		}*/

		$order = "ASC";

		if($this->input->post('Mata_Kuliah')){
			$data['classes'] = $this->kelas_model->getSortedClassForOpenClass($major, 'm.nama', $order);
		}
		else if($this->input->post('kelas_model')){
			$data['classes'] = $this->kelas_model->getSortedClassForOpenClass($major, 'k.nama', $order);
		}
		else if($this->input->post('Ruangan')){
			$data['classes'] = $this->kelas_model->getSortedClassForOpenClass($major, 'r.nama', $order);
		}
		else if($this->input->post('Dosen')){
			$data['classes'] = $this->kelas_model->getSortedClassForOpenClass($major, 'd.nama', $order);
		}
		else if($this->input->post('Hari')){
			$data['classes'] = $this->kelas_model->getSortedClassForOpenClass($major, 'k.hari', $order);
		}
		else if($this->input->post('Jam_Mulai')){
			$data['classes'] = $this->kelas_model->getSortedClassForOpenClass($major, 'k.jam_mulai', $order);
		}
		else if($this->input->post('Jumlah_Mahasiswa')){
			$data['classes'] = $this->kelas_model->getSortedClassForOpenClass($major, 'k.jumlah_mahasiswa', $order);
		}
		else{
			$data['classes'] = $this->kelas_model->getClassForOpenClass($major);
		}

		/*if($this->input->post('insertClass')){
			$data['newClassCourseId'] = $this->input->post('');
		}*/

		$data['title'] = "Buka Tutup Kelas";
	    $this->load->view('includes/header', $data);
		$this->load->view('bukakelas', $data);
		$this->load->view('includes/footer');
	}

	public function gabungkelas(){
		$this->load->model('kelas_model');

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

		$classes = $this->kelas_model->getClasses();

		$joinStatus = FALSE;

		foreach ($classes as $class){
			if($this->input->post($class['id'])){
				$classid = $class['id'];
				$joinStatus = TRUE;
			}
		}
		if($joinStatus == TRUE){
			$data['classes'] = $this->kelas_model->getSameClassList($major, $classid);

			$data['selectedClass'] = $this->kelas_model->getCurrentClass($major, $classid);
			$data['title'] = "Gabung Kelas";
	   		$this->load->view('includes/header', $data);
			$this->load->view('daftargabungkelas', $data);
			$this->load->view('includes/footer');
		}
		else{
			if($this->input->post('sort')){
				$data['classes'] = $this->kelas_model->getSortedClassForOpenClass($major);
			}
			else{
				$data['classes'] = $this->kelas_model->getClassForOpenClass($major);
			}

			$data['title'] = "Gabung Kelas";
	    	$this->load->view('includes/header', $data);
			$this->load->view('gabungkelas', $data);
			$this->load->view('includes/footer');
		}
	}

	public function daftargabungkelas(){
		$this->load->model('kelas_model');

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

		if($this->input->post('gabungKelas')){
			
			$classes = $this->kelas_model->getClasses();
			$mainClassID = $this->input->post('mainClassID');
			$mainClassName = $this->input->post('mainClassName');

			foreach ($classes as $class){
				if($class['id'] != $mainClassID){
					if($this->input->post($class['id'])){
						$this->kelas_model->updateGabungKelas($mainClassID, $mainClassName, $class['id']);
					}
				}
			}

			/*foreach ($classes as $class){
				if($class['kelas_id'] != NULL){
					$this->kelas_model->updateCountStudents($class['id'], $class['kelas_id']);
				}
			}*/

			$data['classes'] = $this->kelas_model->getClassForOpenClass($major);

			$data['title'] = "Gabung Kelas";
	    	$this->load->view('includes/header', $data);
			$this->load->view('gabungkelas', $data);
			$this->load->view('includes/footer');
		}
		else if($this->input->post('cancel')){
			$data['classes'] = $this->kelas_model->getClassForOpenClass($major);

			$data['title'] = "Gabung Kelas";
	    	$this->load->view('includes/header', $data);
			$this->load->view('gabungkelas', $data);
			$this->load->view('includes/footer');
		}
	}

	public function pisahkelas(){
		$this->load->model('kelas_model');

		$data['semester'] = $this->kelas_model->getSemester();

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

		$data['coursesName'] = $this->kelas_model->coursesComboBox($major);
		$data['lecturersName'] = $this->kelas_model->lecturersComboBox();
		$data['roomsName'] = $this->kelas_model->roomsComboBox();
		$data['days'] = array(
			'1' => 'Senin',
			'2' => 'Selasa',
			'3' => 'Rabu',
			'4' => 'Kamis',
			'5' => 'Jumat',
			'6' => 'Sabtu',
			'7' => 'Minggu' 
		);

		$data['time'] = array(
			'06:30:00' => '06:30:00',
			'08:00:00' => '08:00:00',
			'10:30:00' => '10:30:00',
			'13:00:00' => '13:00:00',
			'15:30:00' => '15:30:00',
			'18:00:00' => '18:00:00'
		);

		$classes = $this->kelas_model->getClasses();

		$joinStatus = FALSE;

		foreach ($classes as $class){
			if($this->input->post($class['id'])){
				$classid = $class['id'];
				$joinStatus = TRUE;
			}
		}
		if($joinStatus == TRUE){
			$data['classes'] = $this->kelas_model->getSameClassList($major, $classid);

			$data['selectedClass'] = $this->kelas_model->getCurrentClass($major, $classid);
			$data['title'] = "Pisah Kelas";
	    	$this->load->view('includes/header', $data);
			$this->load->view('pemisahankelas', $data);
			$this->load->view('includes/footer');
		}
		else{
			if($this->input->post('sort')){
				$data['classes'] = $this->kelas_model->getSortedClassForOpenClass($major);
			}
			else{
				$data['classes'] = $this->kelas_model->getClassForOpenClass($major);
			}

			$data['title'] = "Pisah Kelas";
	    	$this->load->view('includes/header', $data);
			$this->load->view('pisahkelas', $data);
			$this->load->view('includes/footer');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */