<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model HistoryProject_model
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

class HistoryProject_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	public function getHistoryProject($userId)
	{
		$this->db->select('*');
		$this->db->from('history_project');
		$this->db->where('user_id', $userId);
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result();
	}

	public function insertHistory($userId, $dataProject, $dataHistory)
	{
		$this->db->trans_start();

		$this->db->where('user_id', $userId);
		$this->db->update('tugas', $dataProject);

		$this->db->insert('history_project', $dataHistory);

		$this->db->trans_complete();
		if ($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('history_project');

		if ($delete) {
			return true;
		} else {
			return false;
		}
	}

	public function updateHistory($historyId, $userId, $dataProject, $dataHistory)
	{
		$this->db->trans_start();

		$this->db->where('user_id', $userId);
		$this->db->update('tugas', $dataProject);

		$this->db->where('id', $historyId);
		$this->db->update('history_project', $dataHistory);


		$this->db->trans_complete();
		if ($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file HistoryProject_model.php */
/* Location: ./application/models/HistoryProject_model.php */
