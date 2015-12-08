<?php
class Model_registration extends CI_Model {

	function __construct() {
		// load the parent constructor
		parent::__construct();
		$this->load->database();
	}
//function register
	function getNoReg() {
		$this->db->select('id, status');
		$this->db->from('nomor_registrasi');
		$query = $this->db->get()->result();
		return $query;
	}
	function getEmailCalon(){
		$this->db->select('email');
		$this->db->from('calon_mahasiswa');
		$query = $this->db->get()->result();
		return $query;
	}
	function getNomorCalonVerif(){
		$this->db->select('nomor_registrasi_id');
		$this->db->from('kode_verifikasi');
		$query = $this->db->get()->result();
		return $query;
	}
	function getVerif(){
		$this->db->select('id,nomor_registrasi_id');
		$this->db->from('kode_verifikasi');
		$query = $this->db->get()->result();
		return $query;
	}
	function getKodeVerif($noreg){
		$this->db->select('id');
		$this->db->from('kode_verifikasi');
		$this->db->where('nomor_registrasi_id',$noreg);
		$query = $this->db->get()->result();
		return $query;
	}
	function insertIdCalon($noreg,$email,$pass){
		$data= array(
			'nomor_registrasi_id'=>$noreg,
			'email'=>$email,
			'password'=>$pass
		);
		$this->db->insert('calon_mahasiswa',$data);
	}
	function insertKodeVerif($id,$noreg,$email){
		$data= array(
			'id'=>$id,
			'nomor_registrasi_id'=>$noreg,
			'email'=>$email
		);
		$this->db->insert('kode_verifikasi',$data);
	}
	public function updateNoReg($noreg){
		$this->db->where('id',$noreg);
		$this->db->update('nomor_registrasi',array('status'=>'0'));
	}
	public function updateKodeVerif($noreg,$id){
		$this->db->where('nomor_registrasi_id',$noreg);
		$this->db->update('kode_verifikasi',array('id'=>$id));
	}
	public function updateVerif($id,$noreg,$email){
		$this->db->where('nomor_registrasi_id',$noreg);
		$this->db->update('kode_verifikasi',array('id'=>$id,'email'=>$email));
	}
	function deleteVerif($noreg){
		$this->db->delete('kode_verifikasi', array('nomor_registrasi_id' => $noreg));
	}
//function login
	function getIdPassCalon() {
		$this->db->select('email, password,nama');
		$this->db->from('calon_mahasiswa');
		$query = $this->db->get()->result();
		return $query;
	}
}
?> 