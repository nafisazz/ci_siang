<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Penyeliaa
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Penyelia extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('api/pendaftaran_model', 'pendaftaran_model');
		$this->load->model('api/kegiatan_model', 'kegiatan_model');
		$this->load->model('api/tugas_model', 'tugas_model');
		$this->load->model('api/nilai_model', 'nilai_model');
	}

	public function getAllPendaftarByDivisi()
	{
		$divisi = $this->input->get('divisi');
		echo json_encode($this->pendaftaran_model->getAllPendaftarByDivisi2($divisi));
	}

	public function getAllKegiatanByUserId()
	{
		$userId = $this->input->get('user_id');
		echo json_encode($this->kegiatan_model->getKegiatanByUserId($userId));
	}

	public function getTugasByDivisi()
	{
		$divisi = $this->input->get('divisi');
		echo json_encode($this->tugas_model->getTugasByDivisi($divisi));
	}

	public function getPendaftarProject()
	{
		$divisi = $this->input->get('divisi');
		echo json_encode($this->pendaftaran_model->getAllPendaftarProject($divisi));
	}

	public function insertTugas()
	{
		$userId = $this->input->post('user_id');
		$dataPendaftar = [
			'tugas' => 1
		];

		$dataTugas = [
			'user_id' => $userId,
			'divisi_id' => $this->input->post('divisi_id'),
			'judul_tugas' =>  $this->input->post('judul_tugas'),
			'deskripsi_tugas' => $this->input->post('deskripsi_tugas'),
			'tanggal_mulai' => $this->input->post('tanggal_mulai'),
			'tanggal_selesai' => $this->input->post('tanggal_selesai'),
			'date_created' => date('Y-m-d')
		];

		$trans = $this->tugas_model->insertTugas($userId, $dataTugas, $dataPendaftar);
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

	public function deleteProject()
	{
		$userId = $this->input->post('user_id');
		$dataPendaftar = [
			'tugas' => 0
		];

		$trans = $this->tugas_model->deleteTugas($userId, $dataPendaftar);
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
	public function updateProject()
	{
		$userId = $this->input->post('user_id');
		$data = [
			'judul_tugas' =>  $this->input->post('judul_tugas'),
			'deskripsi_tugas' => $this->input->post('deskripsi_tugas'),
			'tanggal_mulai' => $this->input->post('tanggal_mulai'),
			'tanggal_selesai' => $this->input->post('tanggal_selesai'),
		];
		$update = $this->tugas_model->updateTugas($userId, $data);
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

	public function getAllPendaftarActiveByDivisi()
	{
		$divisi = $this->input->get('divisi');
		echo json_encode($this->pendaftaran_model->getAllPendaftarActiveByDivisi($divisi));
	}
	public function insertPenilaian()
	{
		$userId = $this->input->post('user_id');
		$dataPenilaian = [
			'id_peserta' => $userId,
			'inovasi' => $this->input->post('inovasi'),
			'kerja_sama' => $this->input->post('kerja_sama'),
			'disiplin' => $this->input->post('disiplin'),
			'rata' => $this->input->post('rata')
		];

		$dataPendaftaran = [
			'acc' => 'tidak_aktif',
			'penilaian' => 1
		];

		$trans = $this->nilai_model->insertPenilaian($dataPenilaian, $dataPendaftaran, $userId);
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

	public function getAllPendaftarSelesai()
	{
		$divisi = $this->input->get('divisi');
		echo json_encode($this->pendaftaran_model->getAllPendaftarSelesai($divisi));
	}

	function updateProfile()
	{
		$id = $this->input->post('id');
		$data = [
			'nama_peserta' => $this->input->post('nama_peserta'),
			'alamat' => $this->input->post('alamat'),
			'password' => md5($this->input->post('password'))

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


/* End of file Penyeliaa.php */
/* Location: ./application/controllers/Penyeliaa.php */
