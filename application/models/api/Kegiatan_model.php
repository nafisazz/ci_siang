<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Kegiatan_model
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

class Kegiatan_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	public function getKegiatanByUserId($user_id)
	{
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->where('user_id', $user_id);
		$this->db->order_by('id', 'desc');

		return $this->db->get()->result();
	}

	public function insert($data)
	{
		$insert = $this->db->insert('kegiatan', $data);
		if ($insert) {
			return true;
		} else {
			return false;
		}
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('kegiatan', $data);
		if ($update) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('kegiatan');
		if ($delete) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file Kegiatan_model.php */
/* Location: ./application/models/Kegiatan_model.php */
