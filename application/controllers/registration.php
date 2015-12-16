<?php
	class Registration extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			$this->load->library('session');
		}
		
		public function index()
		{
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('v1','var1','required|less_than[1000]');
			
			if ($this->form_validation->run() == true)
			{
				$data['v1'] = $this->input->post('v1',true);
				$data['v2'] = $this->input->post('v2',true);
				$data['hasil'] = $data['v1'] + $data['v2'];
			}
			else
			{
				$data['v1'] = 0;
				$data['v2'] = 0;
				$data['hasil'] = $data['v1'] + $data['v2'];
			}
			
			
			$this->load->view('pmb/login');
		}
		public function toLogin()
		{
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->view('pmb/login');
		}
		public function toRegister()
		{
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('Model_registration');
			$this->load->view('pmb/register');
		}
		public function cekEmail($email)
		{
			$this->load->helper('url');
			$this->load->model('Model_registration');
			$data['arrEmail']=$this->Model_registration->getEmailCalon();
			$valid=true;
			foreach($data['arrEmail'] as $r){
				if($email==$r->email){
					$valid=false;
				}
			}
			if($valid){
				return TRUE;
			}
			else{
				$this->form_validation->set_message('cekEmail','Email Sudah Terpakai');
				return FALSE;
			}		
		}
		public function cekVerif($kode,$noreg)
		{
			$this->load->helper('url');
			$this->load->model('Model_registration');
			$data['arrVerif']=$this->Model_registration->getVerif();
			$valid=false;
			foreach($data['arrVerif'] as $r){
				if($kode==$r->id and $noreg==$r->nomor_registrasi_id){
					$valid=true;
				}
			}
			if($valid){
				return TRUE;
			}
			else{
				$this->form_validation->set_message('cekVerif','Kode Verifikasi Salah');
				return FALSE;
			}		
		}
		public function cekNoReg($noreg)
		{
			$this->load->helper('url');
			$this->load->model('Model_registration');
			$data['arrNoReg']=$this->Model_registration->getNoReg();
			$ctr=1;
			foreach($data['arrNoReg'] as $r){
				if($noreg==$r->id){
					if($r->status=='0'){
						return TRUE;
						break;
					}
					else{
						$this->form_validation->set_message('cekNoReg','Nomor Registrasi sudah terpakai');
						return FALSE;
					}
					$ctr+=1;
				}
				else{
					$this->form_validation->set_message('cekNoReg','Nomor Registrasi salah');
					if($ctr>=count($data['arrNoReg'])){
						return FALSE;
					}
					$ctr+=1;	
				}
			}
		}
		public function login()
		{
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('Model_registration');
			$this->load->library('form_validation');
			$data['arrId']=$this->Model_registration->getIdPassCalon();
			$cekLog=false;
			$message=null;
			$nama=null;
			$email=$this->input->post('email');
			$pass=$this->input->post('pass');
			foreach($data['arrId'] as $r){
				if($email==$r->email){
					if($pass==$r->password){
						$cekLog=true;
						$nama=$r->nama;
						$this->session->set_userdata('email',$email);
					}
					else{
						$message='Password Salah';
					}
					break;
				}
				else{
					$message='Email Salah';
				}
			}
			if($cekLog){
				if($nama==null || $nama==""){ 
					$this->load->library('../controllers/pendaftaran');
					redirect('/pendaftaran', 'refresh');
				}
				else{
					$this->load->library('../controllers/portalmahasiswa');
					redirect('/portalmahasiswa/home', 'refresh');
				}
			}
			else{
				echo "<script>alert('".$message."');</script>";
				$this->load->view('pmb/login');
			}
			
		}
		public function resend()
		{
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('Model_registration');
			
			$data['noReg']=$this->input->post('noRegis');
			$data['email']=$this->input->post('Email');
			
			$chars = "0123456789";
			$kode = substr(str_shuffle($chars),0,6);
			
			$config= Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'pmbstts@gmail.com',
					'smtp_pass' => 'sdps1infor2015'
				);
				
			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
			
			$this->email->from('pmbstts@gmail.com', 'PMB-STTS');
			$this->email->to($data['email']);  
			$this->email->subject('Verification Kode');
			$this->email->message('Hi, '.$data['noReg'].'! '."\r\n".'Your Verification Kode is '.$kode);	

			if($this->email->send()){
				
				$this->Model_registration->updateKodeVerif($data['noReg'],$kode);
				
				$this->load->view('pmb/verifikasi',$data);
				echo "<script>alert('Kode Verifikasi telah dikirim, Silahkan periksa email anda.');</script>";
			}
			else{
				show_error($this->email->print_debugger());
			}
			
		}
		public function verif()
		{
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('Model_registration');
			$this->load->library('form_validation');
			
			$noreg=$this->input->post('noreg');
			$email=$this->input->post('email');

			$data['noReg']=$noreg;
			$data['email']=$email;
			
			$data['arrNoReg']=$this->Model_registration->getNoReg();
			$data['arrEmail']=$this->Model_registration->getEmailCalon();
			$data['arrKodeVerif']=$this->Model_registration->getNomorCalonVerif();
			
			$sudahRegister=false;
			
			foreach($data['arrKodeVerif'] as $r){
				if($r->nomor_registrasi_id==$noreg){
					$sudahRegister=true;
				}
			}
			
			//cek nomor registrasi ada dan status masih belum terpakai
			$this->form_validation->set_rules('noreg','Registration','callback_cekNoReg');
			//cek email belum terpakai
			$this->form_validation->set_rules('email','Email','required|valid_email|callback_cekEmail');
			
			$chars = "0123456789";
			$kode = substr(str_shuffle($chars),0,6);
			
			if($this->form_validation->run()==true){
				$config= Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'pmbstts@gmail.com',
					'smtp_pass' => 'sdps1infor2015'
				);
				
				$this->load->library('email',$config);
				$this->email->set_newline("\r\n");
				
				$this->email->from('pmbstts@gmail.com', 'PMB-STTS');
				$this->email->to($email);  
				$this->email->subject('Verification Kode');
				$this->email->message('Hi, '.$noreg.'! '."\r\n".'Your Verification Kode is '.$kode);	

				if($this->email->send()){	
					if($sudahRegister){
						$this->Model_registration->updateVerif($kode,$noreg,$email);
					}
					else{
						$this->Model_registration->insertKodeVerif($kode,$noreg,$email);
					}
					$this->load->view('pmb/verifikasi',$data);
					echo "<script>alert('Kode Verifikasi telah dikirim, Silahkan periksa email anda.');</script>";
				}
				else{
					show_error($this->email->print_debugger());
				}
			}
			else{
				$this->load->view('pmb/register');
			}
		}
		public function regis()
		{
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('Model_registration');
			$this->load->library('form_validation');
			
			$verif=$this->input->post('verif');
			
			$data['noReg']=$this->input->post('noRegis');
			$data['email']=$this->input->post('Email');
			
			$this->form_validation->set_rules('verif','Verification','required|callback_cekVerif['.$data['noReg'].']');
			
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$password = substr(str_shuffle($chars),0,10);
			
			if($this->form_validation->run()==true){
				$config= Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'pmbstts@gmail.com',
					'smtp_pass' => 'sdps1infor2015'
				);
				
				$this->load->library('email',$config);
				$this->email->set_newline("\r\n");
				
				$this->email->from('pmbstts@gmail.com', 'PMB-STTS');
				$this->email->to($data['email']);  
				$this->email->subject('Password Notification');
				$this->email->message('Hi, '.$data['noReg'].'! '."\r\n".'Your Password is '.$password);	

				if($this->email->send()){	
					$this->Model_registration->insertIdCalon($data['noReg'],$data['email'],$password);
					$this->Model_registration->updateNoReg($data['noReg']);
					$this->Model_registration->deleteVerif($data['noReg']);
					
					$this->load->view('pmb/login');
					echo "<script>alert('Password telah dikirim, Silahkan periksa email anda.');</script>";
				}
				else{
					show_error($this->email->print_debugger());
				}
			}
			else{
				$this->load->view('pmb/verifikasi',$data);
			}
		}
	}
?>