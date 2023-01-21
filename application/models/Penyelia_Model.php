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

	public function getPesertaKegiatan($divisi)
	{

		$this->db->select('*');
		$this->db->where('role_id', 3);
		$this->db->where('divisi', $divisi);
		$this->db->where('acc', 'lolos');
		$this->db->from('pendaftaran');
		$this->db->join('tugas', 'pendaftaran.id = tugas.user_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function getPesertaKegiatanTugas($divisi)
	{

		$this->db->select('*');
		$this->db->where('role_id', 3);
		$this->db->where('divisi', $divisi);
		$this->db->where('tugas', 0);
		$this->db->where('acc', 'lolos');
		$this->db->from('pendaftaran');
		$query = $this->db->get();
		return $query->result();
	}

	public function getHarian($divisi)
	{

		$this->db->select('*');
		$this->db->where('role_id', 3);
		$this->db->where('divisi', $divisi);
		$this->db->where('acc', 'lolos');
		$this->db->from('pendaftaran');
		$query = $this->db->get();
		return $query->result();
	}

	public function getKegiatanBy($id)
	{

		$this->db->select('*');
		$this->db->where('user_id', $id);
		$this->db->from('kegiatan');
		$query = $this->db->get();
		return $query->result();
	}




	public function getTugas()
	{

		$this->db->select('*');
		$this->db->from('tugas');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getHistoryProjectById($id)
	{
		$this->db->select('*');
		$this->db->from('history_project');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function gettugasBYID($id)
	{

		$this->db->select('*');
		$this->db->where('user_id', $id);
		$this->db->from('tugas');
		$query = $this->db->get();
		return $query->row_array();
	}


	public function insertTugas($data)
	{
		$this->db->insert('tugas', $data);
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

	public function getAllPesertaByAcc2()
	{
		$query = "SELECT * from pendaftaran where role_id = 3 and acc = 'tidak_aktif' ";
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

	public function updateProject($data, $id)
	{
		$this->db->where('user_id', $id);
		$this->db->update('tugas', $data);
	}

	public function deleteProject($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->delete('tugas');
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
