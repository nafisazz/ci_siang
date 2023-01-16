<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
		$this->load->helper('url', 'form');
		$this->load->library(array('form_validation'));
	}

	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Halaman Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('templates/auth_footer');
		} else {
			//validasi sukses
			// $this->_login();
			$url = $this->login();
			//base_url('Auth/index');
			//redirect($url);
		}
	}

	private function login()
	{

		$email = $this->input->post('email');
		$password = md5($this->input->post('password', true));
		$validasi = $this->User_Model->login_peserta($email, $password);
		if ($validasi->num_rows() > 0) {
			$data = $validasi->row_array();
			$userid = $data['id'];
			$email = $data['email'];
			$password = $data['password'];
			$role = $data['role_id'];
			$divisi = $data['divisi'];
			$acc = $data['acc'];
			$sessdata = array(
				'id'  => $userid,
				'email' => $email,
				'password' => $password,
				'role_id' => $role,
				'divisi' => $divisi,
				'acc' => $acc
			);
			$this->session->set_userdata($sessdata);
			$this->session->set_userdata('id', $userid);
			if ($userid == $userid) {

				if ($this->session->userdata('role_id') == '3') {
					redirect('User');
				} elseif ($this->session->userdata('role_id') == '1') {
					redirect('Admin');
				} elseif ($this->session->userdata('role_id') == '2') {
					redirect('Penyelia');
				} elseif ($this->session->userdata('role_id') == '4') {
					redirect('superadmin');
				}
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert
			alert-danger" role="alert"> Password  atau Email salah</div>');
			redirect('auth');
		}
	}


	public function registrasi()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		$this->form_validation->set_rules('nama_peserta', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nim', 'Nim', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_radio('jenis_kel', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('agama', 'Agama', 'required|trim');
		$this->form_validation->set_rules('asal_sekolah', 'Asal sekolah/universitas', 'required|trim');
		$this->form_validation->set_rules('alamat_sekolah', 'Alamat Sekolah', 'required|trim');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pendaftaran.email]', [
			'is_unique' => 'Email ini sudah ada'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'password must same',
			'min_length' => 'password too short'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Form Pendaftaran Magang';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registrasi');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'nama_peserta' => htmlspecialchars($this->input->post('nama_peserta', true)),
				'nim' => $this->input->post('nim'),
				'image' => 'default.png',
				'alamat' => $this->input->post('alamat'),
				'jenis_kel' => $this->input->post('jenis_kel'),
				'agama' => $this->input->post('agama'),
				'asal_Sekolah' => $this->input->post('asal_sekolah'),
				'alamat_sekolah' => $this->input->post('alamat_sekolah'),
				'jurusan' => $this->input->post('jurusan'),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'no_telp' => $this->input->post('no_telp'),
				'password' => md5($this->input->post('password1')),
				'role_id' => 3,
				'status' => 0,
				'data_created' => time()


			];

			$this->db->insert('pendaftaran', $data);
			$this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert"> Pendaftaran sukses! Silakan login
            </div>');
			redirect('auth');
		}
	}

	public function logout()
	{

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert
        alert-success" role="alert"> Anda Berhasil Logout !
        </div>');

		redirect('auth');
	}
}
