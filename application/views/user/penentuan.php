<?php
// $data['pendaftaran'] = $this->db->get_where('pendaftaran', ['email' =>
//		$this->session->userdata('email')])->row_array();

if ($konfirmasi == "belum") {
    require_once('tungguacc.php');
} elseif ($konfirmasi == 'lolos') {
    require_once('diterima.php');
} elseif ($konfirmasi == 'tidak_aktif') {
    require_once('magangselesai.php');
} else {
    require_once('ditolak.php');
}
