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

/* End of file Peserta_model.php */
/* Location: ./application/models/Peserta_model.php */
