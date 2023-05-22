<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Nilai_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}

	public function insertPenilaian($dataNilai, $dataPendaftaran, $userId)
	{
		$this->db->trans_start();
		$this->db->insert('nilai', $dataNilai);

		$this->db->where('id', $userId);
		$this->db->update('pendaftaran', $dataPendaftaran);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE) {
			return true;
		} else {
			return false;
		}
	}
}
