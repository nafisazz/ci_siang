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
		$this->load->model('api/kegiatan_model', 'kegiatan_model');
		$this->load->model('api/tugas_model', 'tugas_model');
		$this->load->model('api/historyproject_model', 'history_project');
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

	public function getKegiatanByUserId()
	{
		$userId = $this->input->get('user_id');
		echo json_encode($this->kegiatan_model->getKegiatanByUserId($userId));
	}

	public function insertKegiatan()
	{
		$data = [
			'isi_kegiatan' => $this->input->post('isi_kegiatan'),
			'tanggal' => date('Y-m-d H:i:s'),
			'user_id' => $this->input->post('user_id')
		];

		$insert = $this->kegiatan_model->insert($data);
		if ($insert == true) {
			$response = [
				'code' => 200,
				'status' => true
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404,
				'status' => false
			];
			echo json_encode($response);
		}
	}

	public function updateKegiatan()
	{
		$id = $this->input->post('id');
		$data = [
			'isi_kegiatan' => $this->input->post('isi_kegiatan')
		];

		$update = $this->kegiatan_model->update($id, $data);
		if ($update == true) {
			$response = [
				'code' => 200,
				'status' => true
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404,
				'status' => false
			];
			echo json_encode($response);
		}
	}

	public function deleteKegiatan()
	{
		$id = $this->input->post('id');


		$delete = $this->kegiatan_model->delete($id);
		if ($delete == true) {
			$response = [
				'code' => 200,
				'status' => true
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404,
				'status' => false
			];
			echo json_encode($response);
		}
	}

	public function getTugasByUserId()
	{
		$userId = $this->input->get('user_id');
		echo json_encode($this->tugas_model->getTugasbyUserId($userId));
	}

	public function getHistoryProjectByUserId()
	{
		$userId = $this->input->get('user_id');
		echo json_encode($this->history_project->getHistoryProject($userId));
	}

	public function insertHistoryProject()
	{
		$userId = $this->input->post('user_id');
		$dataHistory = [
			'user_id' => $userId,
			'isi_kegiatan' => $this->input->post('isi_kegiatan'),
			'note' => $this->input->post('note'),
			'date_created' => date('Y-m-d H:i:s')
		];

		$dataproject = [
			'progress' => $this->input->post('progress')
		];
		$trans = $this->history_project->insertHistory($userId, $dataproject, $dataHistory);
		if ($trans == true) {
			$response = [
				'code' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404
			];
			echo json_encode($response);
		}
	}

	public function deleteHistory()
	{
		$id = $this->input->post('id');
		$delete = $this->history_project->delete($id);
		if ($delete == true) {
			$response = [
				'code' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404
			];
			echo json_encode($response);
		}
	}

	public function updateHistoryProject()
	{
		$userId = $this->input->post('user_id');
		$historyId = $this->input->post('id');

		$dataHistory = [
			'isi_kegiatan' => $this->input->post('isi_kegiatan'),
			'note' => $this->input->post('note')
		];

		$dataproject = [
			'progress' => $this->input->post('data_progress')
		];
		$trans = $this->history_project->updateHistory($historyId, $userId, $dataproject, $dataHistory);
		if ($trans == true) {
			$response = [
				'code' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404
			];
			echo json_encode($response);
		}
	}

	function updatePhotoProfile()
	{
		$id = $this->input->post('id');

		$config['upload_path']          = './assets/img/profile';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 5000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('photo')) {
			$response =  [
				'code' => 404,
				'message' => 'Format file tidak sesuai'
			];
			echo json_encode($response);
		} else {
			$data = [
				'image' => $this->upload->data('file_name')
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
					'message' => 'Gagal mengubah foto profil'
				];
				echo json_encode($response);
			}
		}
	}

	function updateProfile()
	{
		$id = $this->input->post('id');
		$data = [
			'nama_peserta' => $this->input->post('nama_peserta'),
			'alamat' => $this->input->post('alamat'),
			'asal_sekolah' => $this->input->post('asal_sekolah'),
			'jurusan' => $this->input->post('jurusan'),
			'nim' => $this->input->post('nim'),
			'alamat_sekolah' => $this->input->post('alamat_sekolah'),
			'no_telp' => $this->input->post('no_telp')

		];

		$update =  $this->pendaftaran_model->update($id, $data);
		if ($update == true) {
			$response = [
				'code' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404
			];
			echo json_encode($response);
		}
	}
}
