<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penyelia_Model extends CI_Model
{
	public function getAllPendaftar()
	{
		$query = "SELECT * from pendaftaran where role_id != 1 and status != 0  ";
		return $this->db->query($query)->result();
	}

	public function getAllPeserta($divisi)
	{
		$query = "SELECT * from pendaftaran where role_id = 3  and divisi = '$divisi'  ";
		return $this->db->query($query)->result_array();
	}

	public function getAllPesertaSuccess($divisi)
	{
		$query = "SELECT * from pendaftaran where role_id = 3 and acc = 'lolos' and divisi = '$divisi'  ";
		return $this->db->query($query)->result_array();
	}

	public function getAllPesertaById($id)
	{
		$query = "SELECT * from pendaftaran where role_id = 3 and acc = 'tidak_aktif'  and id = '$id'  ";
		return $this->db->query($query)->row_array();
	}

	public function getAllPesertaByAcc($divisi)
	{
		$query = "SELECT * from pendaftaran where role_id = 3 and acc = 'tidak_aktif'  and divisi = '$divisi'  ";
		return $this->db->query($query)->result_array();
	}

	public function getAllNilaiById($id)
	{
		$query = "SELECT * from nilai where id_peserta = '$id'  ";
		return $this->db->query($query)->result_array();
	}

	public function insertNilai($data)
	{
		$this->db->insert('nilai', $data);
	}

	public function updateStatus($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('pendaftaran', $data);
	}

	public function getKegiatan($id)
	{
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		return $query->result();
	}
}
