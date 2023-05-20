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

	public function getPesertaById($userId)
	{
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->where('id', $userId);
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
}

/* End of file Peserta_model.php */
/* Location: ./application/models/Peserta_model.php */
