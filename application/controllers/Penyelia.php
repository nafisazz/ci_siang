<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyelia extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Penyelia_Model', 'pendaftaran');
		$this->load->model('Penyelia_Model', 'Penyelia_Model');
		if (!$this->session->userdata('email')) {
			redirect('auth');
		} else {
		}
	}
	public function index()
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		// echo 'HALOO ' . $data['pendaftaran']['nama_peserta'];
		$divisi = $this->session->userdata('divisi');
		$data['pendaftaran'] = $this->pendaftaran->getAllPeserta($divisi);
		$this->load->view('templates/auth_header', $data);
		$this->load->view('penyelia/index', $data);
		$this->load->view('dashboard/template/footer');
	}
	public function peserta()
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$divisi = $this->session->userdata('divisi');
		$data['pendaftaran'] = $this->pendaftaran->getAllPeserta($divisi);
		$this->load->view('templates/auth_header', $data);
		$this->load->view('penyelia/peserta', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function getPesertaTugas()
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$divisi = $this->session->userdata('divisi');
		$data['pendaftaran'] = $this->pendaftaran->getPesertaKegiatan($divisi);
		$data['tugas'] = $this->pendaftaran->getTugas();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('penyelia/tugas', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function addtugas()
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$divisi = $this->session->userdata('divisi');
		$data['pendaftaran'] = $this->pendaftaran->getPesertaKegiatanTugas($divisi);
		$this->load->view('templates/auth_header', $data);
		$this->load->view('penyelia/add_tugas', $data);
		$this->load->view('dashboard/template/footer');
	}
	public function insertTugas()
	{

		$project = array(
			'user_id' => $this->input->post('user_id'),
			'judul_tugas' => $this->input->post('judul_project'),
			'deskripsi_tugas' => $this->input->post('deskripsi_project'),
			'tanggal_mulai' => $this->input->post('tgl_mulai'),
			'tanggal_selesai' => $this->input->post('tgl_selesai'),
			'date_created' => date('Y-m-d')
		);
		$tugas = array(
			'tugas' => 1
		);



		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$divisi = $this->session->userdata('divisi');
		$this->pendaftaran->insertTugas($project);
		$this->pendaftaran->updateStatus($tugas, $this->input->post('user_id'));
		$data['pendaftaran'] = $this->pendaftaran->getPesertaKegiatan($divisi);
		$data['tugas'] = $this->pendaftaran->getTugas();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('penyelia/tugas', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function updateTugas()
	{

		$project = array(
			'user_id' => $this->input->post('user_id'),
			'judul_tugas' => $this->input->post('judul_project'),
			'deskripsi_tugas' => $this->input->post('deskripsi_project'),
			'tanggal_mulai' => $this->input->post('tgl_mulai'),
			'tanggal_selesai' => $this->input->post('tgl_selesai'),
			'date_created' => date('Y-m-d')
		);
		$tugas = array(
			'tugas' => 1
		);



		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$divisi = $this->session->userdata('divisi');
		$this->pendaftaran->updateProject($project, $this->input->post('user_id'));
		$data['pendaftaran'] = $this->pendaftaran->getPesertaKegiatan($divisi);
		$data['tugas'] = $this->pendaftaran->getTugas();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('penyelia/tugas', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function deleteTugas($id)
	{


		$tugas = array(
			'tugas' => 0
		);



		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$divisi = $this->session->userdata('divisi');
		$this->pendaftaran->deleteProject($id);
		$this->pendaftaran->updateStatus($tugas, $id);
		$data['pendaftaran'] = $this->pendaftaran->getPesertaKegiatan($divisi);
		$data['tugas'] = $this->pendaftaran->getTugas();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('penyelia/tugas', $data);
		$this->load->view('dashboard/template/footer');
	}



	public function laporan()
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$divisi = $this->session->userdata('divisi');
		$data['pendaftaran'] = $this->pendaftaran->getAllPesertaSuccess($divisi);

		$data['con'] = mysqli_connect('localhost', 'root', '', $this->db->database);
		// echo 'HALOO ' . $data['pendaftaran']['nama_peserta'];
		$this->load->view('templates/auth_header', $data);
		$this->load->view('penyelia/laporan', $data);
		$this->load->view('dashboard/template/footer', $data);
	}

	public function penilaian()
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$divisi = $this->session->userdata('divisi');
		$data['pendaftaran'] = $this->pendaftaran->getAllPesertaByAcc($divisi);
		$data['con'] = mysqli_connect('localhost', 'root', '', $this->db->database);
		// echo 'HALOO ' . $data['pendaftaran']['nama_peserta'];
		$this->load->view('templates/auth_header', $data);
		$this->load->view('penyelia/penilaian', $data);
		$this->load->view('dashboard/template/footer', $data);
	}

	public function detail_nilai()
	{
		$id = $this->uri->segment(3);
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$divisi = $this->session->userdata('divisi');
		$data['pendaftaran'] = $this->pendaftaran->getAllPesertaById($id);
		$data['nilai'] = $this->pendaftaran->getAllNilaiById($id);
		$data['con'] = mysqli_connect('localhost', 'root', '', $this->db->database);
		// echo 'HALOO ' . $data['pendaftaran']['nama_peserta'];
		$this->load->view('templates/auth_header', $data);
		$this->load->view('penyelia/detail_penilaian', $data);
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
		$this->load->view('penyelia/peserta', $data);
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
		$this->load->view('penyelia/kegiatan', $data);
		$this->load->view('dashboard/template/footer');
	}
}
