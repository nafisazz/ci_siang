<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SendEmail extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('email'));
		$this->load->library(array('email'));


		// Load library form validation dan helper form
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->model('Admin_Model', 'Admin_Model');
	}


	public function index($id)
	{

		$data = array(
			'acc' => $this->input->post('acc'),
			'alasan' => $this->input->post('alasan')
		);
		$this->db->where('id', $id);
		$this->db->update('pendaftaran', $data);

		$user = $this->Admin_Model->getPesertaById($id);


		$nama_peserta = $user['nama_peserta'];
		$email = $user['email'];
		$asal_sekolah = $user['asal_sekolah'];
		$nim = $user['nim'];
		$getDivisi = $this->Admin_Model->get_divisi($user['divisi']);
		$divisi = $getDivisi['divisi'];
		$tanggal_mulai = $user['tgl_mulai'];
		$tanggal_selesai = $user['tgl_selesai'];
		$alasan = $user['alasan'];
		$jurusan = $user['jurusan'];

		if ($this->input->post('acc') == 'lolos') {
			// Konfigurasi email
			$subject = 'Persetujuan Pendaftaran Magang DPRD Jawa Tengah';
			$message =
				"
		<center><p>Halo $nama_peserta,</p></center>
		<p>Kami telah mengirimkan email ini untuk memberitahukan bahwa anda telah diterima menjadi peserta magang DPRD Jawa Tengah.</p>

		<p>Nama Lengkap : <b>$nama_peserta</b></p>
		<p>Nim : <b>$nim</b></p>
		<p>Jurusan : <b>$jurusan<b></p>
		<p>Asal Universitas/sekolah : <b>$asal_sekolah</b></p>
		<p>Divisi : <b>$divisi</b></p>
		<p>Pelaksanaan Magang : <b>$tanggal_mulai - $tanggal_selesai</b></p>
		<br><br>
		<p>Untuk itu kami mengharapkan anda untuk dapat hadir pada tanggal <b>$tanggal_mulai</b> di Gedung DPRD Jawa Tengah.</p>
		<p>Salam Hangat</p>
		<br>
		<b>Admin Magang DPRD Jawa Tengah</b>
		";
		} else {
			// Konfigurasi email
			$subject = 'Penolakan Pendaftaran Magang DPRD Jawa Tengah';
			$message =
				"
			<center><p>Halo $nama_peserta,</p></center>
			<p>Kami telah mengirimkan email ini untuk memberitahukan bahwa permohonan anda untuk menjadi peserta magang DPRD Jawa Tengah <b>ditolak</b>, dikarenakan $alasan.</p>
	
			<p>Nama Lengkap : <b>$nama_peserta</b></p>
			<p>Nim : <b>$nim</b></p>
			<p>Jurusan : <b>$jurusan<b></p>
		<p>Asal Universitas/sekolah : <b>$asal_sekolah</b></p>
			<p>Divisi : <b>$divisi</b></p>
			<p>Pelaksanaan Magang : <b>$tanggal_mulai - $tanggal_selesai</b></p>
			<br><br>
			<p>Anda dapat mengajukan kembali permohonan anda pada tahun depan.</p>
			<p>Salam Hangat</p>
			<br>
			<b>Admin Magang DPRD Jawa Tengah</b>
			";
		}





		$this->sendEmail($message, $subject, $email, $email);
	}
	function sendEmail($message, $subject, $email, $username)
	{

		// Config email
		$this->load->library('PHPMailer_load'); //Load Library PHPMailer
		$mail = $this->phpmailer_load->load(); // Mendefinisikan Variabel Mail
		$mail->isSMTP();  // Mengirim menggunakan protokol SMTP
		$mail->Host = 'smtp.gmail.com'; // Host dari server SMTP
		$mail->SMTPAuth = true; // Autentikasi SMTP
		$mail->Username = 'sarapanapp@gmail.com';
		$mail->Password = 'rfwrxdjqmfbthrxp';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->setFrom('Siang@gmail.com', 'SIANG-DPRD-JATENG'); // Sumber email
		$mail->addAddress($email, $username); // Alamat tujuan
		$mail->Subject = $subject; // Subjek Email

		$mail->msgHtml($message);

		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
			// $this->session->set_flashdata('send_email', 'Email gagal dikirim!');
			// redirect('admin/index');
		} else {
			$this->session->set_flashdata('send_email', 'Email berhasil dikirim!');
			redirect('admin/index');
		}
	}
}
