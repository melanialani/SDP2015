<?php 

class Modelnya extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	/*fungsi cekuser dan selectuser digunakan untuk pengecekan login,
	  yaitu pengecekan email dan password, apabila email dan password 
	  yang di inputkan match dengan yang di database, maka user masuk ke halaman home pimpinan, tetapi apabila email dan password tidak match makas user tidak dapat login
	*/
	
	function selectuser($email, $password)
	{
		$qry = "select email, password from dosen";
		$query = $this->db->query($qry);
		return $query->result();
	}
	
	function deleteNotif()
	{
		$this->db->delete('notifikasi',array('judul' => "belum dikategorikan"));
		return $this->db->affected_rows();
	}
	
	function cekuser($email, $password)
	{
		$datanya = $this->selectuser($email, $password);
		$flag = false;
		foreach($datanya as $d)
		{
			if (($d->email)==$email && ($d->password)==$password)
			{	
				$flag = true;
				break;
			}
		}
		
		return $flag;
	}
		
	function cekUncategorized()
	{
		$this->db->select('kategori');
		$this->db->from('calon_mahasiswa');
		$this->db->where('kategori','0');
		
		$query = $this->db->get()->result();
		
		return $query;
	}
	
	function cekNotif()
	{
		$this->db->select('judul');
		$this->db->from('notifikasi');
		$this->db->where('judul','belum dikategorikan');
		
		$query = $this->db->get()->result();
		
		return $query;
	}
	
	function listStatusCalonMahasiswa($param)
	{
		if ($param==0)
		{ $kat = "informasi_kurikulum.kategori='0'"; }
		else
		{ $kat = "informasi_kurikulum.kategori!='0'";}
		
		$qry = "select substr(calon_mahasiswa.informasi_kurikulum_id,6,2) as 'thn', calon_mahasiswa.email as 'email',calon_mahasiswa.nomor_registrasi_id,calon_mahasiswa.nama,informasi_kurikulum.jurusan, calon_mahasiswa.nilai_mat, calon_mahasiswa.nilai_inggris, calon_mahasiswa.nilai_rata_rata, informasi_kurikulum.kategori from calon_mahasiswa, informasi_kurikulum where calon_mahasiswa.informasi_kurikulum_id=informasi_kurikulum.id and " . $kat;
		
		$query = $this->db->query($qry);
		return $query->result();
		
	}
	
	function listStatusCalonMahasiswa1($param,$fieldnya,$orderby)
	{
		if ($param==0)
		{ $kat = "informasi_kurikulum.kategori='0'"; }
		else
		{ $kat = "informasi_kurikulum.kategori!='0'";}
		
		$qry = "select substr(calon_mahasiswa.informasi_kurikulum_id,6,2) as 'thn', calon_mahasiswa.email as 'email',calon_mahasiswa.nomor_registrasi_id,calon_mahasiswa.nama,informasi_kurikulum.jurusan, calon_mahasiswa.nilai_mat, calon_mahasiswa.nilai_inggris, calon_mahasiswa.nilai_rata_rata, informasi_kurikulum.kategori from calon_mahasiswa, informasi_kurikulum where calon_mahasiswa.informasi_kurikulum_id=informasi_kurikulum.id and " . $kat ." order by ".$fieldnya." ".$orderby;
		
		$query = $this->db->query($qry);
		return $query->result();
	}
	
	function laporanCalonMahasiswa($list,$flag,$by,$bywhat)
	{
		$listquery = explode("|",$list);
		$querynya = "";
		for($i=0;$i<count($listquery)-1;$i++)
		{
			if($i == (count($listquery)-2))
			{
				if ($listquery[$i]=="jurusan" || $listquery[$i]=="kategori")
				{
					$querynya .= " informasi_kurikulum.".$listquery[$i];
				}
				else{
					if($listquery[$i]=='informasi_kurikulum_id'){
						$querynya .= " substr(calon_mahasiswa.".$listquery[$i].",6,2) as 'informasi_kurikulum_id'";
					}
					else{
						$querynya .= " calon_mahasiswa.".$listquery[$i];
					}
				}
			}
			else
			{	
				if ($listquery[$i]=="jurusan" || $listquery[$i]=="kategori")
				{
					$querynya .= " informasi_kurikulum.".$listquery[$i]. ",";
				}
				else
				{
					if($listquery[$i]=='informasi_kurikulum_id'){
						$querynya .= " substr(calon_mahasiswa.".$listquery[$i].",6,2) as 'informasi_kurikulum_id',";
					}
					else{
						$querynya .= " calon_mahasiswa.".$listquery[$i].",";
					}
				}	
			}
				
		}
		
		$qry = "select".$querynya." from calon_mahasiswa, informasi_kurikulum where calon_mahasiswa.informasi_kurikulum_id=informasi_kurikulum.id";
			
		if ($flag==1 && $by!="" && $bywhat!="")
		{
			
			if ($by=="jurusan" || $by=="kategori")
			{
				if($bywhat=='all'){
					$qry = "select".$querynya." from calon_mahasiswa, informasi_kurikulum where calon_mahasiswa.informasi_kurikulum_id=informasi_kurikulum.id";
				}
				else{
					$qry = "select".$querynya." from calon_mahasiswa, informasi_kurikulum where calon_mahasiswa.informasi_kurikulum_id=informasi_kurikulum.id and informasi_kurikulum.id='".$bywhat."'";
				}
			}
			else if ($by=="provinsi")
			{
				$qry = "select".$querynya." from calon_mahasiswa, informasi_kurikulum, provinsi where calon_mahasiswa.informasi_kurikulum_id=informasi_kurikulum.id and calon_mahasiswa.provinsi=provinsi.nama and provinsi.id='".$bywhat."'";
			}
			else if ($by=="kota")
			{
				$qry = "select".$querynya." from calon_mahasiswa, informasi_kurikulum, kota where calon_mahasiswa.informasi_kurikulum_id=informasi_kurikulum.id and calon_mahasiswa.kota=kota.nama and kota.id='".$bywhat."'";
			}
			else
			{
				//$qry .= " and calon_mahasiswa.".$by."=".$bywhat;
			}	
		}
		
		$query = $this->db->query($qry);
		return $query->result();
		
	}
	
	function laporanCalonMahasiswa1($list,$flag,$by,$bywhat,$fieldnya,$orderby)
	{
		$listquery = explode("|",$list);
		$querynya = "";
		$qry='';
		for($i=0;$i<count($listquery)-1;$i++)
		{
			if($i == (count($listquery)-2))
			{
				if ($listquery[$i]=="jurusan" || $listquery[$i]=="kategori")
				{
					$querynya .= " informasi_kurikulum.".$listquery[$i];
				}
				else{
				
					if($listquery[$i]=='informasi_kurikulum_id'){
						$querynya .= " substr(calon_mahasiswa.".$listquery[$i].",6,2) as 'informasi_kurikulum_id'";
					}
					else{
						$querynya .= " calon_mahasiswa.".$listquery[$i];
					}
				}
			}
			else
			{	
				if ($listquery[$i]=="jurusan" || $listquery[$i]=="kategori")
				{
					$querynya .= " informasi_kurikulum.".$listquery[$i]. ",";
				}
				else
				{
					if($listquery[$i]=='informasi_kurikulum_id'){
						$querynya .= " substr(calon_mahasiswa.".$listquery[$i].",6,2) as 'informasi_kurikulum_id' ,";
					}
					else{
						$querynya .= " calon_mahasiswa.".$listquery[$i].',';
					}
				}	
			}
				
		}
		if ($by=="jurusan" || $by=="kategori")
		{
			if($bywhat=='all'){
				$qry .= "select".$querynya." from calon_mahasiswa, informasi_kurikulum where calon_mahasiswa.informasi_kurikulum_id=informasi_kurikulum.id";
			}
			else{
				$qry .= "select".$querynya." from calon_mahasiswa, informasi_kurikulum where calon_mahasiswa.informasi_kurikulum_id=informasi_kurikulum.id and informasi_kurikulum.id='".$bywhat."'";
			}
		}
		else if ($by=="provinsi")
		{
			$qry = "select".$querynya." from calon_mahasiswa, informasi_kurikulum, provinsi where calon_mahasiswa.informasi_kurikulum_id=informasi_kurikulum.id and calon_mahasiswa.provinsi=provinsi.nama and provinsi.id='".$bywhat."'";
		}
		else if ($by=="kota")
		{
			$qry = "select".$querynya." from calon_mahasiswa, informasi_kurikulum, kota where calon_mahasiswa.informasi_kurikulum_id=informasi_kurikulum.id and calon_mahasiswa.kota=kota.nama and kota.id='".$bywhat."'";
		}
		else
		{
			$qry = "select".$querynya." from calon_mahasiswa, informasi_kurikulum where calon_mahasiswa.informasi_kurikulum_id=informasi_kurikulum.id";
		}
		$qry .= " order by ".$fieldnya.' '.$orderby;
		
		$query = $this->db->query($qry);
		return $query->result();
		
	}
	function selectIdKurikulumCalon($noreg)
	{
		$this->db->select('informasi_kurikulum_id');
		$this->db->from('calon_mahasiswa');
		$this->db->where('nomor_registrasi_id',$noreg);
		
		$query = $this->db->get()->result();
		
		return $query;
	}
	
	function updateKategori($kat, $noreg)
	{
		$idkurikulumnya = $this->modelnya->selectIdKurikulumCalon($noreg);
		
		foreach($idkurikulumnya as  $r)
		{
			$idkurikulum = substr($r->informasi_kurikulum_id,0,7) ;
		}
		$data = array(
					'informasi_kurikulum_id' => $idkurikulum . $kat
					);
			
		$this->db->where('nomor_registrasi_id',$noreg);
		$this->db->update('calon_mahasiswa', $data);
		
		return $this->db->affected_rows();
	}
	
	function jumlahCalonMahasiswa()
	{
		$qry = "select count(calon_mahasiswa.nomor_registrasi_id) from calon_mahasiswa";
		$query = $this->db->query($qry);
		return $query->result();
	}
	function getStatistikJurusan()
	{
		$qry ="SELECT count(calon_mahasiswa.`nomor_registrasi_id`) as 'jumlah',calon_mahasiswa.`informasi_kurikulum_id` as 'kurikulum',informasi_kurikulum.`jurusan` as 'jurusan' FROM `calon_mahasiswa`,`informasi_kurikulum` WHERE calon_mahasiswa.`informasi_kurikulum_id`=informasi_kurikulum.`id` group by substr(calon_mahasiswa.`informasi_kurikulum_id`,1,5)";
		$query = $this->db->query($qry);
		return $query->result();
	}
	function getStatistik($parameter)
	{
		$qry ="SELECT count(calon_mahasiswa.`nomor_registrasi_id`) as 'jumlah',calon_mahasiswa.`informasi_kurikulum_id` as 'kurikulum',calon_mahasiswa.`".$parameter."` as 'nama',".$parameter.".`id` as 'id' FROM `calon_mahasiswa`,`".$parameter."` WHERE ".$parameter.".`nama`=calon_mahasiswa.`".$parameter."` group by `".$parameter."`";
		$query = $this->db->query($qry);
		return $query->result();
	}
	function getTotalMhs()
	{	
		return $this->db->count_all("calon_mahasiswa");
	}
	
	function NotifToBAU($noreg, $kategori)
	{
		$data = array(
				'id' => "BAU" . $noreg,
				'judul' => "Kategori Mahasiswa",
				'isi' => $kategori
					);
		
		$this->db->insert('notifikasi',$data);
		
		return $this->db->affected_rows();
	}
		
}

?>