<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Divisi_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	public function getAllDivisi()
	{
		$this->db->select('*');
		$this->db->from('divisi');
		return $this->db->get()->result();
	}
}
