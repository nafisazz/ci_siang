<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuperAdmin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model', 'pendaftaran');
		$this->load->model('Penyelia_Model', 'pendaftaran2');
		$this->load->model('Penyelia_Model', 'Penyelia_Model');
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
		$this->load->view('super_admin/index', $data);
		$this->load->view('dashboard/template/footer');
	}
	public function index2()
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		// echo 'HALOO ' . $data['pendaftaran']['nama_peserta'];
		$divisi = $this->session->userdata('divisi');
		$data['pendaftaran'] = $this->pendaftaran2->getAllPeserta($divisi);
		$this->load->view('templates/auth_header', $data);
		$this->load->view('penyelia/index', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function daftar()
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['pendaftaran'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		// echo 'HALOO ' . $data['pendaftaran']['nama_peserta'];
		$this->load->view('templates/auth_header', $data);
		$this->load->view('super_admin/daftar', $data);
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
		redirect('superadmin');
	}

	public function laporan()
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['peserta'] = $this->pendaftaran->getAllPendaftarByDivisi();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('super_admin/laporan', $data);
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
		$this->load->view('super_admin/penilaian', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function peserta()
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$divisi = $this->session->userdata('divisi');
		$data['pendaftaran'] = $this->pendaftaran2->getAllPeserta($divisi);
		$this->load->view('templates/auth_header', $data);
		$this->load->view('super_admin/peserta', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function laporan2()
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$divisi = $this->session->userdata('divisi');
		$data['peserta'] = $this->pendaftaran2->getAllPesertaSuccess($divisi);

		$data['con'] = mysqli_connect('localhost', 'root', '', $this->db->database);
		// echo 'HALOO ' . $data['pendaftaran']['nama_peserta'];
		$this->load->view('templates/auth_header', $data);
		$this->load->view('super_admin/laporan', $data);
		$this->load->view('dashboard/template/footer', $data);
	}

	public function penilaian2()
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$divisi = $this->session->userdata('divisi');
		$data['pendaftaran'] = $this->pendaftaran2->getAllPesertaByAcc2();
		$data['con'] = mysqli_connect('localhost', 'root', '', $this->db->database);
		// echo 'HALOO ' . $data['pendaftaran']['nama_peserta'];
		$this->load->view('templates/auth_header', $data);
		$this->load->view('super_admin/penilaian2', $data);
		$this->load->view('dashboard/template/footer', $data);
	}

	public function detail_nilai()
	{
		$id = $this->uri->segment(3);
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$divisi = $this->session->userdata('divisi');
		$data['pendaftaran'] = $this->pendaftaran2->getAllPesertaById($id);
		$data['nilai'] = $this->pendaftaran2->getAllNilaiById($id);
		$data['con'] = mysqli_connect('localhost', 'root', '', $this->db->database);
		// echo 'HALOO ' . $data['pendaftaran']['nama_peserta'];
		$this->load->view('templates/auth_header', $data);
		$this->load->view('super_admin/detail_penilaian', $data);
		$this->load->view('dashboard/template/footer', $data);
	}

	public function insertNilai()
	{
		$user_id = $this->input->post('user_id');
		$inovasi = $this->input->post('inovasi');
		$kerja_sama = $this->input->post('kerja_sama');
		$disiplin = $this->input->post('disiplin');

		$nilai = array(
			'id_peserta' => $user_id,
			'inovasi' => $inovasi,
			'kerja_sama' => $kerja_sama,
			'disiplin' => $disiplin
		);

		$status = array(
			'acc' => 'tidak_aktif'
		);
		$this->Penyelia_Model->insertNilai($nilai);
		$this->Penyelia_Model->updateStatus($status, $user_id);
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$divisi = $this->session->userdata('divisi');
		$data['pendaftaran'] = $this->pendaftaran->getAllPeserta($divisi);
		$this->load->view('templates/auth_header', $data);
		$this->load->view('super_admin/peserta', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function getKegiatan($id)
	{
		$data['kegiatan'] = $this->Penyelia_Model->getKegiatan($id);
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		// echo 'HALOO ' . $data['pendaftaran']['nama_peserta'];
		$this->load->view('templates/auth_header', $data);
		$this->load->view('super_admin/kegiatan', $data);
		$this->load->view('dashboard/template/footer');
	}
}
