<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->library('pagination');
		$this->load->library('email');
		$this->load->model('User_Model');
	}


	public function insertKegiatan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d G:i:s');
		$kegiatan = $this->input->post('kegiatan');
		$data = array(
			'isi_kegiatan' => $kegiatan,
			'tanggal' => $date,
			'user_id'	=> $this->session->userdata('id')
		);
		$this->User_Model->insertKegiatan($data);
		redirect('user/kegiatan');
	}

	public function deleteKegiatan($id)
	{
		$this->User_Model->deleteKegiatan($id);
		redirect('user/kegiatan');
	}
	public function edit()
	{
		$id = $this->input->post('id');
		$isi_kegiatan = $this->input->post('kegiatan');

		$data = array(
			'isi_kegiatan' => $isi_kegiatan
		);
		$this->User_Model->editKegiatan($id, $data);
		$this->session->set_flashdata('message', '<script>alert("Data Berhasil Diubah")</script>');
		redirect('user/kegiatan/');
	}

	public function updateKegiatan($id)
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['pendaftaran'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['kegiatan'] = $this->User_Model->getKegiatanById($id);
		$this->load->view('templates/auth_header', $data);
		$this->load->view('user/v_editkegiatan', $data);
		$this->load->view('dashboard/template/footer');
	}
}
