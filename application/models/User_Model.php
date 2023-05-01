<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
	//login peserta magang
	public function login_peserta($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		return $this->db->get('pendaftaran', 1);
	}

	public function getNamaPenyeliaById($id)
	{
		$this->db->select('nama_peserta');
		$this->db->where('role_id', 2);
		$this->db->where('divisi', $id);
		$this->db->from('pendaftaran');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getHistoryProject($id)
	{
		$this->db->select('*');
		$this->db->from('history_project');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getproject()
	{
		$this->db->select('*');
		$this->db->from('tugas');
		$this->db->where('user_id', $this->session->userdata('id'));
		$query = $this->db->get();
		return $query->row_array();
	}



	public function insertKegiatan($data)
	{
		$this->db->insert('kegiatan', $data);
	}

	public function inserthistoryproject($data)
	{
		$this->db->insert('history_project', $data);
	}

	public function getKegiatan()
	{
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->where('user_id', $this->session->userdata('id'));
		$query = $this->db->get();
		return $query->result();
	}

	public function updateTugas($id, $data)
	{
		$this->db->where('user_id', $id);
		$this->db->update('tugas', $data);
	}

	public function deleteHistoryProject($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('history_project');
	}


	public function getDivisi()
	{
		$this->db->select('*');
		$this->db->from('divisi');
		$query = $this->db->get();
		return $query->result();
	}


	public function deleteKegiatan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kegiatan');
	}

	public function editKegiatan($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('kegiatan', $data);
	}

	public function getKegiatanById($id)
	{
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getPesertaById($id)
	{
		$query = "SELECT * from pendaftaran where id = $id  ";
		return $this->db->query($query)->row_array();
	}

	public function getNilaiById($id)
	{
		$query = "SELECT * from nilai where id_peserta = $id  ";
		return $this->db->query($query)->result_array();
	}

	public function insertPenilaian($data)
	{
		$this->db->insert('nilai', $data);
	}

	public function register($data)
	{
		$insert = $this->db->insert('pendaftaran', $data);
		if ($insert) {
			return true;
		} else {
			return false;
		}
	}
	public function emailValidate($email)
	{
		$this->db->select('email');
		$this->db->from('pendaftaran');
		$this->db->where('email', $email);
		return $this->db->get()->result();
	}

	public function auth($email)
	{
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->where('email', $email);
		return $this->db->get()->row_array();
	}
}
