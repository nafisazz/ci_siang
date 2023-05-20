<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('api/pendaftaran_model', 'pendaftaran_model');
		$this->load->model('api/divisi_model', 'divisi_model');
	}

	public function getPesertaById()
	{
		$userId = $this->input->get('user_id');
		echo json_encode($this->pendaftaran_model->getPesertaById($userId));
	}

	public function getAllDivisi()
	{
		echo json_encode($this->divisi_model->getAllDivisi());
	}

	public function insertFormulirPendaftaran()
	{
		$id = $this->input->post('id');

		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 5000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('file_pendaftaran')) {
			$response =  [
				'code' => 404,
				'message' => 'Format file tidak sesuai'
			];
			echo json_encode($response);
		} else {

			$data = [
				'divisi' => $this->input->post('divisi'),
				'surat_ket' =>  $this->upload->data('file_name'),
				'tgl_mulai' => $this->input->post('tgl_mulai'),
				'tgl_selesai' => $this->input->post('tgl_selesai'),
				'status' => 1
			];

			$update = $this->pendaftaran_model->update($id, $data);
			if ($update == true) {
				$response = [
					'code' => 200
				];
				echo json_encode($response);
			} else {
				$response = [
					'code' => 404,
					'message' => 'Gagal upload data'
				];
				echo json_encode($response);
			}
		}
	}
}
