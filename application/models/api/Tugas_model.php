<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	public function getTugasByUserId($userId)
	{
		$this->db->select('*');
		$this->db->from('tugas');
		$this->db->where('user_id', $userId);
		$this->db->order_by('', 'desc');
		return  $this->db->get()->result();
	}

	public function getTugasByDivisi($divisi)
	{
		$this->db->select('*');
		$this->db->from('tugas');
		$this->db->where('divisi_id', $divisi);
		return $this->db->get()->result();
	}

	public function insertTugas($userId, $dataTugas, $dataPendaftar)
	{
		$this->db->trans_start();

		$this->db->where('id', $userId);
		$this->db->update('pendaftaran', $dataPendaftar);

		$this->db->insert('tugas', $dataTugas);

		$this->db->trans_complete();

		if ($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteTugas($id, $dataPendaftar)
	{
		$this->db->trans_start();
		$this->db->where('user_id', $id);
		$this->db->delete('tugas');

		$this->db->where('id', $id);
		$this->db->update('pendaftaran', $dataPendaftar);

		$this->db->where('user_id', $id);
		$this->db->delete('history_project');

		$this->db->trans_complete();

		if ($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}

	public function updateTugas($userId, $data)
	{
		$this->db->where('user_id', $userId);
		$update = $this->db->update('tugas', $data);
		if ($update) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file Tugas_model.php */
/* Location: ./application/models/Tugas_model.php */
