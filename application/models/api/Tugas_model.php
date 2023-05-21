<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	public function gettugasByUserId($userId)
	{
		$this->db->select('*');
		$this->db->from('tugas');
		$this->db->where('user_id', $userId);
		$this->db->order_by('', 'desc');

		return  $this->db->get()->result();
	}
}

/* End of file Tugas_model.php */
/* Location: ./application/models/Tugas_model.php */
