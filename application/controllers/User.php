<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
		$this->load->library('form_validation');
		if (!$this->session->userdata('email')) {
			redirect('auth');
		} else {
		}

		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->library('pagination');
		$this->load->library('email');
		$this->load->model('User_Model');
		$this->CI = &get_instance();
		$this->load->library('dompdfgenerator');
	}

	public function index()
	{
		$data['session'] = $this->session->userdata('id');
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		
		$data['konfirmasi'] = $this->session->userdata('acc');
		$data['divisi'] = $this->User_Model->getDivisi();
		// echo 'HALOO ' . $data['pendaftaran']['nama_peserta'];
		$this->load->view('templates/auth_header', $data);
		$this->load->view('user/index', $data);
		$this->load->view('dashboard/template/footer');
	}


	public function submitform()
	{

		$data['title'] = 'Submit Form';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('divisi', 'Divisi', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header', $data);
			$this->load->view('user/index', $data);
			$this->load->view('dashboard/template/footer');
		} else {
			$data = [
				'divisi' => $this->input->post('divisi', true),
				'status' => $this->input->post('status', true),
				'surat_ket' => $this->input->post('surat_ket', true),
				'tgl_mulai' => $this->input->post('tgl_mulai', true),
				'tgl_selesai' => $this->input->post('tgl_selesai', true)
			];
			//$divisi = $this->input->post('divisi');

			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pendaftaran', $data);


			$this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Berhasil, silahkan Login kembali!
            </div>');
			$this->session->set_flashdata('success_insert');
			redirect('user');
		}
	}

	public function editprofil()
	{
		$data['title'] = 'Edit Profile';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama_peserta', 'Name', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Adress', 'required|trim');
		$this->form_validation->set_rules('asal_sekolah', 'School', 'required|trim');
		$this->form_validation->set_rules('jurusan', 'Study', 'required|trim');
		$this->form_validation->set_rules('nim', 'Study', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header', $data);
			$this->load->view('user/editprofile', $data);
			$this->load->view('dashboard/template/footer');
		} else {
			$data = [
				'email' => $this->input->post('email'),
				'nama_peserta' => htmlspecialchars($this->input->post('nama_peserta', true)),
				'alamat' => $this->input->post('alamat'),
				'asal_sekolah' => $this->input->post('asal_sekolah'),
				'jurusan' => $this->input->post('jurusan'),
				'nim' => $this->input->post('nim'),
				'alamat_Sekolah' => $this->input->post('alamat_sekolah'),
				'no_telp' => $this->input->post('no_telp')
			];


			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pendaftaran', $data);

			$this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Berhasil dirubah
            </div>');
			redirect('user/index');
		}
	}
	public function kegiatan()
	{

		$data['title'] = 'Sistem Magang DPRD';
		$data['kegiatan'] = $this->User_Model->getKegiatan();
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['session'] = $this->session->userdata('id');
		$this->load->view('templates/auth_header', $data);
		$this->load->view('user/kegiatan', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function insertKegiatan()
	{
		$date = date('Y-m-d h:i:sa');
		$kegiatan = $this->input->post('kegiatan');
		$data = array(
			'isi_kegiatan' => $kegiatan,
			'tanggal' => $date
		);
		$this->User_Model->insertKegiatan($data);
		redirect('user');
	}
	public function laporan()
	{
		$data['title'] = 'Sistem Magang DPRD';
		$data['nama'] = $this->db->get_where('pendaftaran', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('user/laporan', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function cetak_nilai()
	{
		$id = $this->uri->segment(3);
		// $id = $this->session->userdata('userid');
		$data['nilai'] = $this->User_Model->getNilaiById($id);
		$data['peserta'] = $this->User_Model->getPesertaById($id);
		$data['title'] = 'Laporan Nilai Magang';
		// filename dari pdf ketika didownload
		$file_pdf = 'Laporan Penilaian Magang';
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "portrait";
		$data['date'] = date('d F Y H:i:s');
		$html = $this->load->view('user/cetak_nilai', $data, true);
		// $this->load->view('user/cetak_nilai', $data);
		$this->dompdfgenerator->generate($html, $file_pdf, $paper, $orientation);
		// $this->load->view('invoice', $data);

	}
}
