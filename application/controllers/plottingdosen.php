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
	 public function index()
	{
		$this->load->model('Matakuliah');
		$this->load->model('Dosen');
		$this->load->model('Kelas');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');

		//$this->session->sess_destroy();
		$data['mata_kuliah1'] = $this->Matakuliah->ambildata(1);
		$data['mata_kuliah2'] = $this->Matakuliah->ambildata(2);
		$data['mata_kuliah3'] = $this->Matakuliah->ambildata(3);
		$data['mata_kuliah4'] = $this->Matakuliah->ambildata(4);
		$data['mata_kuliah5'] = $this->Matakuliah->ambildata(5);
		$data['mata_kuliah6'] = $this->Matakuliah->ambildata(6);
		$data['mata_kuliah7'] = $this->Matakuliah->ambildata(7);
		$data['mata_kuliah8'] = $this->Matakuliah->ambildata(8);
		
		//bagian isi array nama dosen untuk keperluan ambil dosen pengajar nya.
		$data['dosenku'] = $this->Dosen->ambildata();
		$data['arrdosen'] = [];
		$data['arrdosen']["kosong"] = "pilih satu";
		foreach($data['dosenku'] as $i)
		{
			$data['arrdosen']["'".$i['nip'].$i['nama']."'"]=$i['nama']." - ".$i['nip'];
			
		}
		
		
		//tampil tidak nya matakuliah semester 1
		if($this->input->post('hide1')==true)
		{
			if($this->session->userdata('hide1') == 1){
			$this->session->set_userdata('hide1',2);}
			else {$this->session->set_userdata('hide1',1);}
		}
		if($this->input->post('hide2')==true)
		{
			if($this->session->userdata('hide2') == 1){
			$this->session->set_userdata('hide2',2);}
			else {$this->session->set_userdata('hide2',1);}
		}
		if($this->input->post('hide3')==true)
		{
			if($this->session->userdata('hide3') == 1){
			$this->session->set_userdata('hide3',2);}
			else {$this->session->set_userdata('hide3',1);}
		}
		if($this->input->post('hide4')==true)
		{
			if($this->session->userdata('hide4') == 1){
			$this->session->set_userdata('hide4',2);}
			else {$this->session->set_userdata('hide4',1);}
		}
		if($this->input->post('hide5')==true)
		{
			if($this->session->userdata('hide5') == 1){
			$this->session->set_userdata('hide5',2);}
			else {$this->session->set_userdata('hide5',1);}
		}
		if($this->input->post('hide6')==true)
		{
			if($this->session->userdata('hide6') == 1){
			$this->session->set_userdata('hide6',2);}
			else {$this->session->set_userdata('hide6',1);}
		}
		if($this->input->post('hide7')==true)
		{
			if($this->session->userdata('hide7') == 1){
			$this->session->set_userdata('hide7',2);}
			else {$this->session->set_userdata('hide7',1);}
		}
		if($this->input->post('hide8')==true)
		{
			if($this->session->userdata('hide8') == 1){
			$this->session->set_userdata('hide8',2);}
			else {$this->session->set_userdata('hide8',1);}
		}
		
		//end part of hiden hiden nan
		
		//bagian tekan tombol simpan
		if($this->input->post('simpan')==true)
		{
			$data['kelas'] = $this->Kelas->ambildata();
			$ke = 0;
			foreach ($data['mata_kuliah1'] as $i)
			{
				//pertama check apakah ada belum, klo ada di update.. klo gak ada di insert
				$ada = "tidak ada";
				foreach ($data['kelas'] as $y)
				{
				echo $y['mata_kuliah_id']." dan ".$i['id'];
					if ($y['mata_kuliah_id'] == $i['id'])
					{
						$ada = "ada";
					}
				}
				//jika ada di update di sini,jangan lupa untuk di periksa apakah kelas nya juga
				if($ada == "ada")
				{
					if ($this->input->post('dosen11'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen11'.$ke),1,11),$i['id'],"A");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen11'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen11'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen12'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen12'.$ke),1,11),$i['id'],"B");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen12'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen12'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen13'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen13'.$ke),1,11),$i['id'],"C");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen13'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen13'.$ke),1,11),$skss);}
				}
				//jika tidak ada di insert baru
				else
				{	
					$id = "150".$i['id']."A";
					echo substr($this->input->post('dosen11'.$ke),1,11);
					if ($this->input->post('dosen11'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"A",$i['id'],substr($this->input->post('dosen11'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen11'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen11'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."B";
					if ($this->input->post('dosen12'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"B",$i['id'],substr($this->input->post('dosen12'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen12'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen12'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."C";
					if ($this->input->post('dosen13'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"C",$i['id'],substr($this->input->post('dosen13'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen13'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen13'.$ke),1,11),$skss);}
				}
				
				$ke++;
			}
			//semester 2
			$ke = 0;
			foreach ($data['mata_kuliah2'] as $i)
			{
				//pertama check apakah ada belum, klo ada di update.. klo gak ada di insert
				$ada = "tidak ada";
				foreach ($data['kelas'] as $y)
				{
				echo $y['mata_kuliah_id']." dan ".$i['id'];
					if ($y['mata_kuliah_id'] == $i['id'])
					{
						$ada = "ada";
					}
				}
				//jika ada di update di sini,jangan lupa untuk di periksa apakah kelas nya juga
				if($ada == "ada")
				{
					if ($this->input->post('dosen21'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen21'.$ke),1,11),$i['id'],"A");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen21'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen21'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen22'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen22'.$ke),1,11),$i['id'],"B");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen22'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen22'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen23'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen23'.$ke),1,11),$i['id'],"C");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen23'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen23'.$ke),1,11),$skss);}
				}
				//jika tidak ada di insert baru
				else
				{	
					$id = "150".$i['id']."A";
					echo substr($this->input->post('dosen21'.$ke),1,11);
					if ($this->input->post('dosen21'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"A",$i['id'],substr($this->input->post('dosen21'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen21'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen21'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."B";
					if ($this->input->post('dosen22'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"B",$i['id'],substr($this->input->post('dosen22'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen22'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen22'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."C";
					if ($this->input->post('dosen23'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"C",$i['id'],substr($this->input->post('dosen23'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen23'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen23'.$ke),1,11),$skss);}
				}
				
				$ke++;
			}
			//semester 3
			$ke = 0;
			foreach ($data['mata_kuliah3'] as $i)
			{
				//pertama check apakah ada belum, klo ada di update.. klo gak ada di insert
				$ada = "tidak ada";
				foreach ($data['kelas'] as $y)
				{
				echo $y['mata_kuliah_id']." dan ".$i['id'];
					if ($y['mata_kuliah_id'] == $i['id'])
					{
						$ada = "ada";
					}
				}
				//jika ada di update di sini,jangan lupa untuk di periksa apakah kelas nya juga
				if($ada == "ada")
				{
					if ($this->input->post('dosen31'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen31'.$ke),1,11),$i['id'],"A");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen31'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen31'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen32'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen32'.$ke),1,11),$i['id'],"B");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen32'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen32'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen33'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen33'.$ke),1,11),$i['id'],"C");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen3'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen33'.$ke),1,11),$skss);}
				}
				//jika tidak ada di insert baru
				else
				{	
					$id = "150".$i['id']."A";
					echo substr($this->input->post('dosen31'.$ke),1,11);
					if ($this->input->post('dosen31'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"A",$i['id'],substr($this->input->post('dosen31'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen31'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen31'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."B";
					if ($this->input->post('dosen32'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"B",$i['id'],substr($this->input->post('dosen32'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen32'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen32'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."C";
					if ($this->input->post('dosen33'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"C",$i['id'],substr($this->input->post('dosen33'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen33'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen33'.$ke),1,11),$skss);}
				}
				
				$ke++;
			}
			//semester 4
			$ke = 0;
			foreach ($data['mata_kuliah4'] as $i)
			{
				//pertama check apakah ada belum, klo ada di update.. klo gak ada di insert
				$ada = "tidak ada";
				foreach ($data['kelas'] as $y)
				{
				echo $y['mata_kuliah_id']." dan ".$i['id'];
					if ($y['mata_kuliah_id'] == $i['id'])
					{
						$ada = "ada";
					}
				}
				//jika ada di update di sini,jangan lupa untuk di periksa apakah kelas nya juga
				if($ada == "ada")
				{
					if ($this->input->post('dosen41'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen41'.$ke),1,11),$i['id'],"A");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen41'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen41'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen42'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen42'.$ke),1,11),$i['id'],"B");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen42'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen42'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen43'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen43'.$ke),1,11),$i['id'],"C");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen41'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen43'.$ke),1,11),$skss);}
				}
				//jika tidak ada di insert baru
				else
				{	
					$id = "150".$i['id']."A";
					echo substr($this->input->post('dosen41'.$ke),1,11);
					if ($this->input->post('dosen41'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"A",$i['id'],substr($this->input->post('dosen41'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen41'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen41'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."B";
					if ($this->input->post('dosen42'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"B",$i['id'],substr($this->input->post('dosen42'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen42'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen42'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."C";
					if ($this->input->post('dosen43'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"C",$i['id'],substr($this->input->post('dosen43'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen43'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen43'.$ke),1,11),$skss);}
				}
				
				$ke++;
			}
			//semester 5
			$ke = 0;
			foreach ($data['mata_kuliah5'] as $i)
			{
				//pertama check apakah ada belum, klo ada di update.. klo gak ada di insert
				$ada = "tidak ada";
				foreach ($data['kelas'] as $y)
				{
				echo $y['mata_kuliah_id']." dan ".$i['id'];
					if ($y['mata_kuliah_id'] == $i['id'])
					{
						$ada = "ada";
					}
				}
				//jika ada di update di sini,jangan lupa untuk di periksa apakah kelas nya juga
				if($ada == "ada")
				{
					if ($this->input->post('dosen51'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen51'.$ke),1,11),$i['id'],"A");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen51'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen51'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen52'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen52'.$ke),1,11),$i['id'],"B");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen52'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen52'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen53'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen53'.$ke),1,11),$i['id'],"C");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen53'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen53'.$ke),1,11),$skss);}
				}
				//jika tidak ada di insert baru
				else
				{	
					$id = "150".$i['id']."A";
					echo substr($this->input->post('dosen51'.$ke),1,11);
					if ($this->input->post('dosen51'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"A",$i['id'],substr($this->input->post('dosen51'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen51'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen51'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."B";
					if ($this->input->post('dosen52'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"B",$i['id'],substr($this->input->post('dosen52'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen52'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen52'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."C";
					if ($this->input->post('dosen53'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"C",$i['id'],substr($this->input->post('dosen53'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen51'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen53'.$ke),1,11),$skss);}
				}
				
				$ke++;
			}
			//semester 6
			$ke = 0;
			foreach ($data['mata_kuliah6'] as $i)
			{
				//pertama check apakah ada belum, klo ada di update.. klo gak ada di insert
				$ada = "tidak ada";
				foreach ($data['kelas'] as $y)
				{
				echo $y['mata_kuliah_id']." dan ".$i['id'];
					if ($y['mata_kuliah_id'] == $i['id'])
					{
						$ada = "ada";
					}
				}
				//jika ada di update di sini,jangan lupa untuk di periksa apakah kelas nya juga
				if($ada == "ada")
				{
					if ($this->input->post('dosen61'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen61'.$ke),1,11),$i['id'],"A");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen61'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen61'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen62'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen62'.$ke),1,11),$i['id'],"B");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen62'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen62'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen63'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen63'.$ke),1,11),$i['id'],"C");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen63'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen63'.$ke),1,11),$skss);}
				}
				//jika tidak ada di insert baru
				else
				{	
					$id = "150".$i['id']."A";
					echo substr($this->input->post('dosen61'.$ke),1,11);
					if ($this->input->post('dosen61'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"A",$i['id'],substr($this->input->post('dosen61'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen61'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen61'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."B";
					if ($this->input->post('dosen62'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"B",$i['id'],substr($this->input->post('dosen62'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen62'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen62'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."C";
					if ($this->input->post('dosen63'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"C",$i['id'],substr($this->input->post('dosen63'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen63'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen63'.$ke),1,11),$skss);}
				}
				
				$ke++;
			}
			//semester 7
			$ke = 0;
			foreach ($data['mata_kuliah7'] as $i)
			{
				//pertama check apakah ada belum, klo ada di update.. klo gak ada di insert
				$ada = "tidak ada";
				foreach ($data['kelas'] as $y)
				{
				echo $y['mata_kuliah_id']." dan ".$i['id'];
					if ($y['mata_kuliah_id'] == $i['id'])
					{
						$ada = "ada";
					}
				}
				//jika ada di update di sini,jangan lupa untuk di periksa apakah kelas nya juga
				if($ada == "ada")
				{
					if ($this->input->post('dosen71'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen71'.$ke),1,11),$i['id'],"A");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen71'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen71'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen72'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen72'.$ke),1,11),$i['id'],"B");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen72'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen72'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen73'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen73'.$ke),1,11),$i['id'],"C");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen73'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen73'.$ke),1,11),$skss);}
				}
				//jika tidak ada di insert baru
				else
				{	
					$id = "150".$i['id']."A";
					echo substr($this->input->post('dosen71'.$ke),1,11);
					if ($this->input->post('dosen71'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"A",$i['id'],substr($this->input->post('dosen71'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen71'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen71'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."B";
					if ($this->input->post('dosen72'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"B",$i['id'],substr($this->input->post('dosen72'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen72'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen72'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."C";
					if ($this->input->post('dosen73'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"C",$i['id'],substr($this->input->post('dosen73'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen73'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen73'.$ke),1,11),$skss);}
				}
				
				$ke++;
			}
			//semester 8
			$ke = 0;
			foreach ($data['mata_kuliah8'] as $i)
			{
				//pertama check apakah ada belum, klo ada di update.. klo gak ada di insert
				$ada = "tidak ada";
				foreach ($data['kelas'] as $y)
				{
				echo $y['mata_kuliah_id']." dan ".$i['id'];
					if ($y['mata_kuliah_id'] == $i['id'])
					{
						$ada = "ada";
					}
				}
				//jika ada di update di sini,jangan lupa untuk di periksa apakah kelas nya juga
				if($ada == "ada")
				{
					if ($this->input->post('dosen81'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen81'.$ke),1,11),$i['id'],"A");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen81'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen81'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen82'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen82'.$ke),1,11),$i['id'],"B");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen82'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen82'.$ke),1,11),$skss);}
					
					if ($this->input->post('dosen83'.$ke) != "kosong"){
					$this->Kelas->updatedata(substr($this->input->post('dosen83'.$ke),1,11),$i['id'],"C");
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen83'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen83'.$ke),1,11),$skss);}
				}
				//jika tidak ada di insert baru
				else
				{	
					$id = "150".$i['id']."A";
					echo substr($this->input->post('dosen81'.$ke),1,11);
					if ($this->input->post('dosen81'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"A",$i['id'],substr($this->input->post('dosen81'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen81'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen81'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."B";
					if ($this->input->post('dosen82'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"B",$i['id'],substr($this->input->post('dosen82'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen82'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen82'.$ke),1,11),$skss);}
					
					$id = "150".$i['id']."C";
					if ($this->input->post('dosen83'.$ke) != "kosong"){
					$this->Kelas->insertdata($id,"C",$i['id'],substr($this->input->post('dosen83'.$ke),1,11));
					$sks = $this->Dosen->ambilsks(substr($this->input->post('dosen83'.$ke),1,11));
					foreach ($sks as $j){$skss = $j['jumlah_sks_mengajar'];}
					$skss += 3;
					$this->Dosen->ubahsks(substr($this->input->post('dosen83'.$ke),1,11),$skss);}
				}
				
				$ke++;
			}
		}


		$data['title'] = "Plotting Dosen";
	    $this->load->view('includes/header', $data);
		$this->load->view('ploting', $data);
		
		
	}
	 
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
		
		$semester = $this->kelas_model->getSemester();

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
			$newClass = $this->kelas_model->insertNewClass($courseID, $lecturerID, $data['semester'], $days, $roomID, $time);
			$thisClass = $this->kelas_model->getCurrentClass($major, $newClass);
			$this->notifikasi_model->sendNotification($this->session->userdata('username'), $thisClass->idDosen, "Anda diminta untuk mengajar ".$thisClass->namaMataKuliah." Kelas ".$thisClass->namaKelas);			
		}

		foreach ($classes as $class){
			if($this->input->post($class['id'])){
				//if($this->input->post('btnOk')){
					$studentList = $this->kelas_model->getStudents($class['id']);
					$thisClass = $this->kelas_model->getCurrentClass($major, $class['id']);
					$this->notifikasi_model->sendNotification($this->session->userdata('username'), $thisClass->idDosen, $thisClass->namaMataKuliah." Kelas ".$thisClass->namaKelas." ditutup.");
					foreach($studentList as $student){
						$this->notifikasi_model->sendNotification($this->session->userdata('username'), $student['mahasiswa_nrp'], $thisClass->namaMataKuliah." Kelas ".$thisClass->namaKelas." ditutup.");
					}

					$this->kelas_model->updateClassStatus($class['id']);
				//}
			}
			$this->kelas_model->countStudents($class['id']);
		}

		foreach ($classes as $class){
			if($class['kelas_id'] != NULL){
				$this->kelas_model->updateCountStudents($class['id'], $class['kelas_id']);
			}
		}

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
			$data['classes'] = $this->kelas_model->getClassForOpenClass($major, $semester['value']);
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

		$semester = $this->kelas_model->getSemester();
		
		$classes = $this->kelas_model->getClasses();

		$joinStatus = FALSE;

		foreach ($classes as $class){
			if($this->input->post($class['id'])){
				$classid = $class['id'];
				$joinStatus = TRUE;
			}
		}
		if($joinStatus == TRUE){
			$data['classes'] = $this->kelas_model->getSameClassList($major, $classid, $semester['value']);

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
				$data['classes'] = $this->kelas_model->getClassForOpenClass($major, $semester['value']);
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
		
		$semester = $this->kelas_model->getSemester();

		if($this->input->post('gabungKelas')){
			
			$classes = $this->kelas_model->getClasses();
			$mainClassID = $this->input->post('mainClassID');
			$mainClassName = $this->input->post('mainClassName');

			$thisClass = $this->kelas_model->getCurrentClass($major, $mainClassID);

			foreach ($classes as $class){
				if($class['id'] != $mainClassID){
					if($this->input->post($class['id'])){
						$oldClass = $this->kelas_model->getCurrentClass($major, $class['id']);
						$studentList = $this->kelas_model->getStudents($class['id']);
						$this->notifikasi_model->sendNotification($this->session->userdata('username'), $thisClass->idDosen, $oldClass->namaMataKuliah." Kelas ".$oldClass->namaKelas." digabung dengan Kelas ".$thisClass->namaKelas);
						$this->notifikasi_model->sendNotification($this->session->userdata('username'), $oldClass->idDosen, $oldClass->namaMataKuliah." Kelas ".$oldClass->namaKelas." digabung dengan Kelas ".$thisClass->namaKelas);
						foreach($studentList as $student){
							//echo $student['mahasiswa_nrp'];
							//$this->kelas_model->updateGabungMurid($mainClassID, $student['mahasiswa_nrp']);
							$this->notifikasi_model->sendNotification($this->session->userdata('username'), $student['mahasiswa_nrp'], $oldClass->namaMataKuliah." Kelas ".$oldClass->namaKelas." digabung dengan Kelas ".$thisClass->namaKelas);
						}
						$this->kelas_model->updateGabungKelas($mainClassID, $mainClassName, $class['id']);
					}
				}
			}

			foreach ($classes as $class){
				if($class['kelas_id'] != NULL){
					$this->kelas_model->updateCountStudents($class['id'], $class['kelas_id']);
				}
			}

			$data['classes'] = $this->kelas_model->getClassForOpenClass($major, $semester['value']);

			$data['title'] = "Gabung Kelas";
	    	$this->load->view('includes/header', $data);
			$this->load->view('gabungkelas', $data);
			$this->load->view('includes/footer');
		}
		else if($this->input->post('cancel')){
			$data['classes'] = $this->kelas_model->getClassForOpenClass($major, $semester['value']);

			$data['title'] = "Gabung Kelas";
	    	$this->load->view('includes/header', $data);
			$this->load->view('gabungkelas', $data);
			$this->load->view('includes/footer');
		}
	}

	public function pisahkelas(){
		$this->load->model('kelas_model');

		$data['semester'] = $this->kelas_model->getSemester();

		$semester = $this->kelas_model->getSemester();
		
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
			$data['classes'] = $this->kelas_model->getSameClassList($major, $classid, $semester['value']);

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
				$data['classes'] = $this->kelas_model->getClassForOpenClass($major, $semester['value']);
			}

			$data['title'] = "Pisah Kelas";
	    	$this->load->view('includes/header', $data);
			$this->load->view('pisahkelas', $data);
			$this->load->view('includes/footer');
		}
	}

	public function pemisahankelas(){
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

		$semester = $this->kelas_model->getSemester();
		
		if($this->input->post('SplitClass')){
			$courseID = $this->input->post('idCourses');
			$lecturerID = $this->input->post('lecturersName');
			$roomID = $this->input->post('roomsName');
			$days = $this->input->post('days');
			$time = $this->input->post('time');
			$newClass = $this->kelas_model->insertNewClass($courseID, $lecturerID, $data['semester'], $days, $roomID, $time);
			$thisClass = $this->kelas_model->getCurrentClass($major, $newClass);
			$this->notifikasi_model->sendNotification($this->session->userdata('username'), $thisClass->idDosen, "Anda diminta untuk mengajar ".$thisClass->namaMataKuliah." Kelas ".$thisClass->namaKelas);

			$classes = $this->kelas_model->getClasses();

			foreach ($classes as $class){
				if($class['kelas_id'] != NULL){
					$this->kelas_model->updateCountStudents($class['id'], $class['kelas_id']);
				}
			}

			$data['classes'] = $this->kelas_model->getClassForOpenClass($major, $semester['value']);

			$data['title'] = "Pisah Kelas";
	    	$this->load->view('includes/header', $data);
			$this->load->view('pisahkelas', $data);
			$this->load->view('includes/footer');
		}
		else if($this->input->post('cancel')){
			$data['classes'] = $this->kelas_model->getClassForOpenClass($major, $semester['value']);

			$data['title'] = "Pisah Kelas";
	    	$this->load->view('includes/header', $data);
			$this->load->view('pisahkelas', $data);
			$this->load->view('includes/footer');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */