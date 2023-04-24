<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
	public function getAllPendaftar()
	{
		$query = "SELECT * from pendaftaran where role_id = 3 and status != 0  ";
		return $this->db->query($query)->result_array();
	}

	public function getAllPendaftarStatus()
	{
		$query = "SELECT p.id, p. nama_peserta, p.asal_sekolah, p.jurusan, p.tgl_mulai, p.surat_ket, p.acc, p.alasan, d.divisi from pendaftaran p, divisi d where p.divisi = d.id and role_id = 3 and status != 0  ";
		return $this->db->query($query)->result_array();
	}

	public function getAllPendaftarByDivisi()
	{
		$query = "SELECT p.id, p.nama_peserta, p.asal_sekolah, p.jurusan, d.divisi, p.tgl_selesai from pendaftaran p, divisi d where d.id = p.divisi and role_id = 3 and status != 0  ";
		return $this->db->query($query)->result_array();
	}

	public function getAllPenilaianById($id)
	{
		$query = "SELECT * from nilai where id = $id  ";
		return $this->db->query($query)->result_array();
	}

	public function getDivisi($divisi)
	{
		$this->db->select('*');
		$this->db->where('divisi', $divisi);
		$this->db->where('role_id', 3);
		$this->db->from('pendaftaran');
		$query = $this->db->get();
		return $query->result();
	}

	public function getPesertaById($id)
	{
		$query = "SELECT * from pendaftaran where id = $id  ";
		return $this->db->query($query)->row_array();
	}

	public function get_divisi($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('divisi');
		$query = $this->db->get();
		return $query->row_array();
	}
}
