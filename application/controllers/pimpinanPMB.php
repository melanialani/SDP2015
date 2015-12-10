<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pimpinanPMB extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('modelnya');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('cookie');
		
		if($this->session->userdata('user_role') != 'dosen_pimpinanpmb'){
            redirect('/');
        }
	}
	
	public function index()
	{
		$this->home();
	}
	
	/*
	public function login()
	{
		$data["email"] = "";
		$data["password"] = "";
		
		if ($this->input->post('btnLogin')==true)
		{
			$data["email"]= $this->input->post('txtEmail',true);
			$data["password"]= $this->input->post('txtPassword',true);
			
			if ($this->modelnya->cekuser($data["email"],$data["password"]) == true)
			{
				$this->home();
			}
			else
			{
				echo "USERNAME/PASSWORD SALAH!";
				$this->load->view('viewlogin',$data);
			}
				
		}
		else{
			$data["email"]="";
			$data["nohp"]="";
			$data["password"]="";
			$this->load->view('viewlogin',$data);
		}
	}
	*/
	public function home()
	{
		$data['listUncategorized']=$this->modelnya->cekNotif();
		$this->load->view('viewhome',$data);
	}
	
	public function listCalonMahasiswa()
	{
		$this->load->library('session');
		$data["param"] = 0;
		$data["dropdownStatus"] = "";
		$data['sort']='';
		if($this->input->post('status', true)=='belum')
		{
			$data["param"] = 0;
			$this->session->set_userdata('status','0');
			$this->session->set_userdata('sts','belum');
		}
		else if ($this->input->post('status', true)=='sudah')
		{	
			$data["param"] = 1;
			$this->session->set_userdata('status','1');
			$this->session->set_userdata('sts','sudah');
		}
		$data["dropdownStatus"] = $this->input->post('status', true);
		
		$data["dropdownStatus"] = $this->session->userdata('sts');
		if($data['dropdownStatus']=='sudah'){
			$data['param']=1;
		}
		else{
			$data['param']=0;
		}
		
		if($data["param"]=='1')
		{
			$data['listCalonMahasiswa'] = $this->modelnya->listStatusCalonMahasiswa($data["param"]);
		}
		else
		{
			$data['listCalonMahasiswa'] = $this->modelnya->listStatusCalonMahasiswa($data["param"]);
			$total = 0;
			if ($this->input->post('btnSimpan')==true)
			{
				foreach($data['listCalonMahasiswa'] as $r)
				{
					if($this->input->post($r->nomor_registrasi_id)==true)
					{
						
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
						$this->email->to($r->email);  
						$this->email->subject('Pemberitahuan Kategori');
						$this->email->message('Hi, '.$r->nomor_registrasi_id.' ! '."\r\n".'Anda termasuk dalam kategori '.$this->input->post($r->nomor_registrasi_id));	

						if($this->email->send()){
							$total += $this->modelnya->updateKategori($this->input->post($r->nomor_registrasi_id),$r->nomor_registrasi_id);
							if($this->modelnya->deleteNotif()>0)
							{}
							if($this->modelnya->notifToBAU($r->nomor_registrasi_id,$this->input->post($r->nomor_registrasi_id))>0)
							{}
						}
						else{
							redirect('/pimpinanPMB/listCalonMahasiswa', 'location');
						}
					}
				}
				if($total>0){
					echo "<script>alert('".$total." Data Updated')</script>";
				}
				else{
					echo "<script>alert('No Data Updated')</script>";
				}
			}
			
			$data['listCalonMahasiswa'] = $this->modelnya->listStatusCalonMahasiswa($data["param"]);
		}
		
		//---------------------------------------------------
		//start itu di pake buat di halaman listcalon mahasiswa, buat nentuin, list yang di tampilkan di start dari index berapa sampe end nya di index berapa
		if ($this->uri->segment(3)==true)
		{
			$page =  $this->uri->segment(3);
			$data["start"] = $page*10;
			$data["end"] = (($page*10)+10);
		}
		else
		{
			$data["start"] = 0;
			$data["end"] = 10;
		}
		//---------------------------------------------------
		$this->load->view('viewlistcalonmahasiswa', $data);
	}
	
	public function listCalonMahasiswa1()
	{
		$this->load->library('session');
		if($this->session->userdata('status')==false){
			$data["param"] = 0;	
		}
		else{
			$data['param']=$this->session->userdata('status');
		}
		$data["dropdownStatus"] = "";
		$data['sort']=$this->input->post('sort');
		$field=$this->input->post('field');
		
		$data["dropdownStatus"] = $this->input->post('status');
		
		$data["dropdownStatus"] = $this->session->userdata('sts');
		if($data['dropdownStatus']=='sudah'){
			$data['param']=1;
		}
		else{
			$data['param']=0;
		}
		
		if($data["param"]=='1')
		{
			$data['listCalonMahasiswa'] = $this->modelnya->listStatusCalonMahasiswa1($data["param"],$field,$data['sort']);
		}
		else
		{
		
			$data['listCalonMahasiswa'] = $this->modelnya->listStatusCalonMahasiswa1($data["param"],$field,$data['sort']);
			$total = 0;
			if ($this->input->post('btnSimpan')==true)
			{
				foreach($data['listCalonMahasiswa'] as $r)
				{
					if($this->input->post($r->nomor_registrasi_id)==true)
					{
						$total += $this->modelnya->updateKategori($this->input->post($r->nomor_registrasi_id),$r->nomor_registrasi_id);
						if($this->modelnya->deleteNotif()>0)
						{}
						if($this->modelnya->notifToBAU($r->nomor_registrasi_id,$this->input->post($r->nomor_registrasi_id))>0)
						{}
						
						/*$config= Array(
								'protocol' => 'smtp',
								'smtp_host' => 'ssl://smtp.googlemail.com',
								'smtp_port' => 465,
								'smtp_user' => 'pmbstts@gmail.com',
								'smtp_pass' => 'sdps1infor2015'
							);
							
						$this->load->library('email',$config);
						$this->email->set_newline("\r\n");
						
						$this->email->from('pmbstts@gmail.com', 'PMB-STTS');
						$this->email->to($r->email);  
						$this->email->subject('Pemberitahuan Kategori');
						$this->email->message('Hi, '.$r->nomor_registrasi_id.' ! '."\r\n".'Anda termasuk dalam kategori '.$this->input->post($r->nomor_registrasi_id));	

						if($this->email->send()){
							echo "<script>alert('Kode Verifikasi telah dikirim, Silahkan periksa email anda.');</script>";
						}
						else{
							show_error($this->email->print_debugger());
						}*/
					}
				}
				echo "<script>alert('".$total." Data Updated')</script>";
			}
			
			$data['listCalonMahasiswa'] = $this->modelnya->listStatusCalonMahasiswa1($data["param"],$field,$data['sort']);
		}
		
		if ($this->uri->segment(3)==true)
		{
			$page =  $this->uri->segment(3);
			$data["start"] = $page*10;
			$data["end"] = (($page*10)+10);
		}
		else
		{
			$data["start"] = 0;
			$data["end"] = 10;
		}
		$this->load->view('viewlistcalonmahasiswa', $data);
	}
	
	public function laporan()
	{
		$this->load->library('session');
		$this->load->model('Modelnya');
		$data['allJurusan']=$this->Modelnya->getStatistikJurusan();
		$data['allProvinsi'] = $this->db->get('provinsi')->result();
		$data['allKota'] = $this->db->get('kota')->result();
		$data["dropdownView"] = "nomor_registrasi_id";
		$data["dropdownFilter"] = " ";
		$data["listview"] = "";
		$data["listview"] = "nomor_registrasi_id|nama|jurusan|informasi_kurikulum_id|";
		$data['sort']=$this->input->post('sort');
		$data['kanan']=$this->input->post('cbKanan');
		$data['by']='';
		$data['bywhat']='';
		if($this->input->post('listview')==true)
		{
			$data["listview"] = $this->input->post('listview');
		}
		$flag=0;
		$data["arrobj"]= $this->modelnya->laporanCalonMahasiswa($data["listview"],0,"","");
		if ($this->input->post('btnGo_add')==true)
		{
			
			$data["by"] = $this->session->userdata('by');
			if ($data["by"]=="provinsi" ||$data["by"]=="kota"||$data['by']=='jurusan') 
			{
				$data["bywhat"] = $this->session->userdata('bywhat');
				$data['kanan']=$this->session->userdata('bywhat');
			}
			$cek = explode('|',$data["listview"]);
			for($i = 0 ;$i< count($cek);$i++)
			{
				if($cek[$i]==$this->input->post('view'))
				{
					$cek[$i]="";
					$flag=1;
					break;
				}
			}
			
			$data["listview"]="";
			
			for($i = 0 ;$i< count($cek);$i++)
			{
				if($cek[$i]!="")
				{
					$data["listview"].=$cek[$i]."|";
				}
			}
			
			if($flag==0)
			{
				$data["listview"].=$this->input->post('view')."|";
			}
			$data["arrobj"]= $this->modelnya->laporanCalonMahasiswa($data["listview"],1,$this->session->userdata('by'),$this->session->userdata('bywhat'));	
			
		}
		
		if ($this->input->post('btnGo')==true)
		{
			$this->session->unset_userdata('by');
			$this->session->unset_userdata('bywhat');
			$data["by"] = $this->input->post('cbKiri');
			$this->session->set_userdata('by', $this->input->post('cbKiri'));
			if ($data["by"]=="provinsi" ||$data["by"]=="kota"||$data['by']=='jurusan') 
			{
				$data["bywhat"] = $this->input->post('cbKanan');
				$this->session->set_userdata('bywhat',$this->input->post('cbKanan'));
				$data["arrobj"]= $this->modelnya->laporanCalonMahasiswa($data["listview"],1,$data["by"],$data["bywhat"]);
			}
		}
		$this->load->view('viewlaporan', $data);
	}
	
	
	public function laporan1()
	{
		$this->load->library('session');
		$this->load->model('Modelnya');
		$data['allJurusan']=$this->Modelnya->getStatistikJurusan();
		$data['allProvinsi'] = $this->db->get('provinsi')->result();
		$data['allKota'] = $this->db->get('kota')->result();
		$data["dropdownView"] = "nomor_registrasi_id";
		$data["dropdownFilter"] = " ";
		$data["listview"] = "";
		$data["listview"] = $this->input->post('listview');
		$data['sort']=$this->input->post('sort');
		$data['kanan']=$this->input->post('kanan');
		$data['by']=$this->session->userdata('by');
		$data['bywhat']=$this->session->userdata('bywhat');
		$field=$this->input->post('field');
		if($this->input->post('listview')==true)
		{
			$data["listview"] = $this->input->post('listview');
		}
		$flag=0;
		$data["arrobj"]= $this->modelnya->laporanCalonMahasiswa($data["listview"],0,"","");
		if ($this->input->post('btnGo2')==true)
		{
			
			$this->session->unset_userdata('by');
			$this->session->unset_userdata('bywhat');
			$cek = explode('|',$data["listview"]);
			for($i = 0 ;$i< count($cek);$i++)
			{
				if($cek[$i]==$this->input->post('view'))
				{
					$cek[$i]="";
					$flag=1;
					break;
				}
			}
			
			$data["listview"]="";
			
			for($i = 0 ;$i< count($cek);$i++)
			{
				if($cek[$i]!="")
				{
					$data["listview"].=$cek[$i]."|";
				}
			}
			
			if($flag==0)
			{
				$data["listview"].=$this->input->post('view')."|";
			}
			$data["arrobj"]= $this->modelnya->laporanCalonMahasiswa($data["listview"],0,"","");			
			
		}
		
		if ($this->input->post('btnGo')==true)
		{
			$data["by"] = $this->input->post('cbKiri');
			if ($data["by"]=="provinsi" ||$data["by"]=="kota") 
			{
				$data["bywhat"] = $this->input->post('cbKanan');
				
				$data["arrobj"]= $this->modelnya->laporanCalonMahasiswa($data["listview"],1,$data["by"],$data["bywhat"]);
				
			}
			$this->session->unset_userdata('by');
			$this->session->unset_userdata('bywhat');
		
		}
		if($this->input->post('submit')==true)
		{	
			if($data['by']=='jurusan'){	
				$data["arrobj"]= $this->modelnya->laporanCalonMahasiswa1($data["listview"],1,$data['by'],$data['kanan'],$field,$data['sort']);
			}
			else{
				
				$data["arrobj"]= $this->modelnya->laporanCalonMahasiswa1($data["listview"],1,$data['by'],$data['bywhat'],$field,$data['sort']);
			}
		}
		$this->load->view('viewlaporan', $data);
		
	}
	
	public function laporan2()
	{
		$this->load->library('session');
		$this->load->model('Modelnya');
		$data['allJurusan']=$this->Modelnya->getStatistikJurusan();
		$data['allProvinsi'] = $this->db->get('provinsi')->result();
		$data['allKota'] = $this->db->get('kota')->result();
		$data["dropdownView"] = "nomor_registrasi_id";
		$data['kanan']=$this->input->post('kanan');
		$data["dropdownFilter"] = " ";
		$data["listview"] = "";
		$data['sort']=$this->input->post('sort');
		$data["listview"] = "nama|jurusan|kategori|";
		$data['by']=$this->input->post('by');
		$data['bywhat']=$this->input->post('bywhat');
		$field=$this->input->post('field');
		$this->session->set_userdata('by',$this->input->post('by'));
		$this->session->set_userdata('bywhat',$this->input->post('bywhat'));
		if($this->input->post('listview')==true)
		{
			$data["listview"] = $this->input->post('listview');
		}
		$flag=0;
		$data["arrobj"]= $this->modelnya->laporanCalonMahasiswa($data["listview"],0,"","");
		if ($this->input->post('btnGo2')==true)
		{
			
			$cek = explode('|',$data["listview"]);
			for($i = 0 ;$i< count($cek);$i++)
			{
				if($cek[$i]==$this->input->post('view'))
				{
					$cek[$i]="";
					$flag=1;
					break;
				}
			}
			
			$data["listview"]="";
			
			for($i = 0 ;$i< count($cek);$i++)
			{
				if($cek[$i]!="")
				{
					$data["listview"].=$cek[$i]."|";
				}
			}
			
			if($flag==0)
			{
				$data["listview"].=$this->input->post('view')."|";
			}
			$data["arrobj"]= $this->modelnya->laporanCalonMahasiswa($data["listview"],0,"","");				
		}
		if($this->input->post('submit')==true)
		{	
			if($data['by']=='jurusan'){
				$data["arrobj"]= $this->modelnya->laporanCalonMahasiswa($data["listview"],1,$data['by'],$data['kanan']);
			}
			else{
				$data["arrobj"]= $this->modelnya->laporanCalonMahasiswa($data["listview"],1,$data['by'],$data['bywhat']);
			}
		}
		
		$this->load->view('viewlaporan', $data);
		
	}
	public function laporanStatistik()
	{
		$this->load->model('Modelnya');
		$data['allProvinsi'] = $this->db->get('provinsi')->result();
		$data['allKota'] = $this->db->get('kota')->result();
		$data['kiri']=$this->input->post('cbKiri');
		$data['kanan']=$this->input->post('cbKanan');
		if ($data['kiri']=='all' or $data['kiri']==''){
			$parameter='provinsi';
		}
		else{
			$parameter=$data['kiri'];
		}
		$data['allJurusan']=$this->Modelnya->getStatistikJurusan();
		if($data['kiri']!='jurusan'){
			$data['allStatistik']=$this->Modelnya->getStatistik($parameter);
		}
		$data['TotalMhs']=$this->Modelnya->getTotalMhs();
		$this->load->view('viewlaporanstatistik', $data);
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

