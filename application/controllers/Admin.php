<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model', 'pendaftaran');
		$this->load->library('form_validation');
		if (!$this->session->userdata('email')) {
			redirect('auth');
		} else {
		}
	}


	public function index()
	{
		$data['title'] = 'Sistem Magang DPRD';
	$data['pendaftaran'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['pendaftaran'] = $this->pendaftaran->getAllPendaftarStatus();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('dashboard/template/footer');
	}
	public function daftar()
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['pendaftaran'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		// echo 'HALOO ' . $data['pendaftaran']['nama_peserta'];
		$this->load->view('templates/auth_header', $data);
		$this->load->view('admin/daftar', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function daftarDevisi($divisi)
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['judul'] = $divisi;
		$data['pendaftaran'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['divisi'] = $this->pendaftaran->getDivisi($divisi);
		$this->load->view('templates/auth_header', $data);
		$this->load->view('admin/daftar_peserta', $data);
		$this->load->view('dashboard/template/footer');
	}


	public function edit_riwayat($id)
	{
		$data = array(
			'acc' => $this->input->post('acc'),
			'alasan' => $this->input->post('alasan')
		);
		$this->db->where('id', $id);
		$this->db->update('pendaftaran', $data);
		$this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data Pendaftaran Berhasil Di Edit</div>');
		redirect('admin');
	}

	public function laporan()
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['peserta'] = $this->pendaftaran->getAllPendaftarByDivisi();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('admin/laporan', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function penilaian()
	{
		$id = $this->uri->segment(3);
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['peserta'] = $this->pendaftaran->getPesertaById($id);
		$data['penilaian'] = $this->pendaftaran->getAllPenilaianById($id);
		$this->load->view('templates/auth_header', $data);
		$this->load->view('admin/penilaian', $data);
		$this->load->view('dashboard/template/footer');
	}
}
