<?php
// $data['pendaftaran'] = $this->db->get_where('pendaftaran', ['email' =>
//		$this->session->userdata('email')])->row_array();

if ($this->session->userdata('acc') == "belum") {
	require_once('kosong.php');
} elseif ($this->session->userdata('acc') == 'lolos') {
	require_once('tabel_history_project.php');
}
