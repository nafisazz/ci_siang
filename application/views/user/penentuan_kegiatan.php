<?php
// $data['pendaftaran'] = $this->db->get_where('pendaftaran', ['email' =>
//		$this->session->userdata('email')])->row_array();

if ($this->session->userdata('acc') == "belum") {
    require_once('tungguacc_kegiatan.php');
} elseif ($this->session->userdata('acc') == 'lolos') {
    require_once('kegiatan_form.php');
} elseif ($this->session->userdata('acc') == 'tidak_aktif') {
    require_once('magangselesai.php');
} else {
    require_once('ditolak.php');
}
