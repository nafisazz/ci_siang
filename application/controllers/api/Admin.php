<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller AdminApi
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

class Admin extends CI_Controller
{

	public function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->model('api/Pendaftaran_model', 'pendaftaran_model');
		$this->load->model('api/divisi_model', 'divisi_model');
	}

	public function getAllPendaftar()
	{
		echo json_encode($this->pendaftaran_model->getAllPendaftar());
	}

	public function getDetailUser()
	{
		$userId = $this->input->get('user_id');
		echo json_encode($this->pendaftaran_model->getPesertaById($userId));
	}

	public function downloadSuratKeterangan($userId)
	{
		$surat = $this->pendaftaran_model->getPesertaById($userId)['surat_ket'];

		$path = './assets/img/' . $surat;
		header('Content-Type: application/pdf');

		// Mengatur header untuk mengunduh file
		header('Content-Disposition: attachment; filename="' . basename($path) . '"');
		header('Content-Length: ' . filesize($path));

		// Membaca dan mengirimkan file ke pengguna
		readfile($path);
	}

	public function verification()
	{
		$userId = $this->input->post('user_id');
		$data = [
			'acc' => 'lolos',
			'status' => 1,
			'alasan' => ''
		];
		$update = $this->pendaftaran_model->update($userId, $data);
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

	public function reject()
	{
		$userId = $this->input->post('user_id');

		$data = [
			'acc' => 'ditolak',
			'status' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$update = $this->pendaftaran_model->update($userId, $data);
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

	public function getAllDivisi()
	{
		echo json_encode($this->divisi_model->getAllDivisi());
	}

	public function getPesertaByDivisi()
	{
		$divisi = $this->input->get('divisi');
		echo json_encode($this->pendaftaran_model->getAllPendaftarByDivisi($divisi));
	}

	public function getPesertaAcc()
	{
		echo json_encode($this->pendaftaran_model->getAllPendaftarAcc());
	}

	function downloadLaporan($dateStart, $dateEnd)
	{
		$data = $this->pendaftaran_model->rekapPendaftaran(
			$dateStart,
			$dateEnd
		);

		$this->load->library('pdflib');
		$this->pdflib->setFileName('Laporan_transaksi.pdf');
		$this->pdflib->setPaper('A4', 'landscape');
		$data['rekap'] = $data;
		$data['date_start'] = $dateStart;
		$data['date_end'] = $dateEnd;
		$this->pdflib->loadView('v_report', $data);
	}
}


/* End of file AdminApi.php */
/* Location: ./application/controllers/AdminApi.php */
