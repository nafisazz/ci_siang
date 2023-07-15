<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Peserta_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Pendaftaran_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getPesertaById2($userId)
	{
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->where('pendaftaran.id', $userId);
		return $this->db->get()->row_array();
	}

	public function getPesertaById($userId)
	{
		$this->db->select('pendaftaran.*, p.nama_peserta as nama_penyelia');
		$this->db->from('pendaftaran');
		$this->db->join('pendaftaran p', 'p.divisi = pendaftaran.divisi', 'left');
		$this->db->where('p.role_id', 2);
		$this->db->where('pendaftaran.id', $userId);
		return $this->db->get()->row_array();
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('pendaftaran', $data);

		if ($update) {
			return true;
		} else {
			return false;
		}
	}

	public function getAllPendaftar()
	{
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->where('role_id', 3);
		return $this->db->get()->result();
	}

	public function getAllPendaftarByDivisi($divisi)
	{
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->where('role_id', 3);
		$this->db->where('acc !=', 'belum');
		$this->db->where('divisi', $divisi);
		return $this->db->get()->result();
	}

	public function getAllPendaftarByDivisi2($divisi)
	{
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->where('role_id', 3);
		$this->db->where('acc !=', 'belum');
		$this->db->where('acc !=', 'ditolak');
		$this->db->where('divisi', $divisi);
		return $this->db->get()->result();
	}


	public function getAllPendaftarAcc()
	{
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->where('role_id', 3);
		$this->db->where('acc !=', 'belum');
		$this->db->where('acc !=', 'ditolak');
		$this->db->join('nilai', 'nilai.id_peserta = pendaftaran.id', 'left');

		return $this->db->get()->result();
	}

	public function getAllPendaftarProject($divisi)
	{
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->where('role_id', 3);
		$this->db->where('acc', 'lolos');
		$this->db->where('tugas !=', 1);
		$this->db->where('divisi', $divisi);
		return $this->db->get()->result();
	}

	public function getAllPendaftarActiveByDivisi($divisi)
	{
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->where('role_id', 3);
		$this->db->where('acc', 'lolos');
		$this->db->where('penilaian', 0);
		$this->db->where('divisi', $divisi);
		return $this->db->get()->result();
	}

	public function getAllPendaftarSelesai($divisi)
	{
		$this->db->select('pendaftaran.*, nilai.inovasi, nilai.kerja_sama, nilai.disiplin, nilai.rata');
		$this->db->from('pendaftaran');
		$this->db->where('role_id', 3);
		$this->db->where('acc', 'tidak_aktif');
		$this->db->where('penilaian', 1);
		$this->db->where('divisi', $divisi);
		$this->db->join('nilai', 'nilai.id_peserta = pendaftaran.id', 'left');
		return $this->db->get()->result();
	}

	function cekKuotaMagang()
	{
		$yearNow = date('Y');
		$this->db->select('id');
		$this->db->from('pendaftaran');
		$this->db->where('acc', 'lolos');
		$this->db->where('Year(tgl_mulai)', $yearNow);
		return $this->db->get()->num_rows();
	}

	function rekapPendaftaran($dateStart, $dateEnd)
	{
		$this->db->select('pendaftaran.*, divisi.divisi as nama_divisi');
		$this->db->from('pendaftaran');
		$this->db->where('Date(pendaftaran.tgl_mulai) >=', $dateStart);
		$this->db->where('Date(pendaftaran.tgl_selesai) <=', $dateEnd);
		$this->db->where('pendaftaran.role_id', 3);
		$this->db->where('pendaftaran.acc !=', 'ditolak');
		$this->db->where('pendaftaran.acc !=', 'belum');
		$this->db->join('divisi', 'divisi.id = pendaftaran.divisi', 'left');
		return $this->db->get()->result();
	}
}

/* End of file Peserta_model.php */
/* Location: ./application/models/Peserta_model.php */
