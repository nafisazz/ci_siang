<?php
defined('BASEPATH') or exit('No direct script access allowed');


class AuthApi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user_model');
	}
	public function register()
	{
		$email = $this->input->post('email');
		$data = [
			'nama_peserta' => $this->input->post('nama_peserta'),
			'nim' => $this->input->post('nim'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kel' => $this->input->post('jeniskel'),
			'agama' => $this->input->post('agama'),
			'asal_sekolah' => $this->input->post('asal_sekolah'),
			'alamat_sekolah' => $this->input->post('alamat_sekolah'),
			'jurusan' => $this->input->post('jurusan'),
			'email' => $email,
			'no_telp' => $this->input->post('no_telp'),
			'password' => md5($this->input->post('password')),
			'role_id' => 3,
			'image' => 'default.png',

		];

		$validateEmail = $this->user_model->emailValidate($email);
		if ($validateEmail == null) {
			$register = $this->user_model->register($data);
			if ($register == true) {
				$response = [
					'code' => 200
				];
				echo json_encode($response);
			} else {
				$response = [
					'code' => 404,
					'message' => 'Gagal register'
				];
				echo json_encode($response);
			}
		} else {
			$response = [
				'code' => 404,
				'message' => 'Email telah terdaftar'
			];
			echo json_encode($response);
		}
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$cekEmail = $this->user_model->auth($email);
		if ($cekEmail != null) {
			if ($cekEmail['password'] == md5($password)) {
				$response = [
					'code' => 200
				];
				echo json_encode($response);
			} else {
				$response = [
					'code' => 404,
					'message' => 'Password salah'
				];
				echo json_encode($response);
			}
		} else {
			$response = [
				'code' => 404,
				'message' => 'Email belum terdaftar'
			];
			echo json_encode($response);
		}
	}
}


/* End of file AuthApi.php */
/* Location: ./application/controllers/AuthApi.php */
