<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calon_mahasiswa_model extends CI_Model {

	public function updateCalonMahasiswa($nama, $alamat, $provinsi, $kota, $kodepos, $nomor_hp, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $kewarganegaraan, $status_sosial, $agama, $jurusan_id, $nama_sekolah, $alamat_sekolah, $provinsi_sekolah, $kota_sekolah, $kodepos_sekolah, $nomor_telp_sekolah, $relasi, $nama_wali, $alamat_wali, $provinsi_wali, $kota_wali, $kodepos_wali,$nomor_telp_wali, $pekerjaan_wali, $nilaimat, $nilaiing, $raport, $akte, $kk, $foto, $id)
	{
		$nilaiaverage = ($nilaimat + $nilaiing)/2;
		$this->db->where('nomor_registrasi_id', $id);
		$arrfields = [
						'nama' => $nama,
						'alamat' => $alamat,
						'provinsi' => $provinsi,
						'kota' => $kota,
						'kodepos' => $kodepos,
						'nomor_hp' => $nomor_hp,
						'tempat_lahir' => $tempat_lahir,
						'tanggal_lahir' => $tanggal_lahir,
						'jenis_kelamin' => $jenis_kelamin,
						'kewarganegaraan' => $kewarganegaraan,
						'status_sosial' => $status_sosial,
						'agama' => $agama,
						'informasi_kurikulum_id' => $jurusan_id,
						'nama_sekolah' => $nama_sekolah,
						'alamat_sekolah' => $alamat_sekolah,
						'provinsi_sekolah' => $provinsi_sekolah,
						'kota_sekolah' => $kota_sekolah,
						'kodepos_sekolah' => $kodepos_sekolah,
						'nomor_telp_sekolah' => $nomor_telp_sekolah,
						'relasi' => $relasi,
						'nama_wali' => $nama_wali,
						'alamat_wali' => $alamat_wali,
						'provinsi_wali' => $provinsi_wali,
						'kota_wali' => $kota_wali,
						'kodepos_wali' => $kodepos_wali,
						'nomor_telp_wali' => $nomor_telp_wali,
						'pekerjaan_wali' => $pekerjaan_wali,
						'nilai_mat' => $nilaimat,
						'nilai_inggris' => $nilaiing,
						'nilai_rata_rata' => $nilaiaverage,
						'foto' => $foto,
						'akte_kelahiran' => $akte,
						'kartu_keluarga' => $kk,
						'rapor' => $raport,
					];
		$this->db->update('calon_mahasiswa', $arrfields);
		
		return $this->db->affected_rows();
	}
	
	function getDataCalonMahasiswaByEmail($email)
	{
		$this->db->select('nomor_registrasi_id, informasi_kurikulum_id');
		$this->db->from('calon_mahasiswa');
		$this->db->where('email', $email);
		return $this->db->get()->result();
	}
}